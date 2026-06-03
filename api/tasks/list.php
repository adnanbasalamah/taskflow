<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../helpers/auth.php';

require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    error_response('Method not allowed', 405);
}

$user_id = current_user_id();
$state_filter = isset($_GET['state']) && in_array($_GET['state'], ['todo', 'doing', 'delegate', 'done'])
    ? $_GET['state']
    : null;
$search_query = isset($_GET['q']) && trim($_GET['q']) !== ''
    ? trim($_GET['q'])
    : null;

$sql = "SELECT DISTINCT t.id, t.title, t.content, t.state, t.created_at, t.updated_at FROM tasks t WHERE t.user_id = ?";
$params = [$user_id];
$types = 'i';

if ($state_filter) {
    $sql .= " AND t.state = ?";
    $params[] = $state_filter;
    $types .= 's';
}

if ($search_query) {
    $keyword = '%' . $search_query . '%';
    $sql .= " AND (t.title LIKE ? OR t.content LIKE ? OR EXISTS (
        SELECT 1 FROM task_labels tl
        JOIN labels l ON l.id = tl.label_id
        WHERE tl.task_id = t.id AND l.name LIKE ?
    ))";
    $params[] = $keyword;
    $params[] = $keyword;
    $params[] = $keyword;
    $types .= 'sss';
}

$sql .= " ORDER BY t.created_at DESC";

$stmt = $db->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $row['labels'] = [];
    $tasks[] = $row;
}

// Batch load labels for all tasks
if (!empty($tasks)) {
    $ids = array_column($tasks, 'id');
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $types = str_repeat('i', count($ids));
    $stmt = $db->prepare(
        "SELECT tl.task_id, l.id, l.name, l.color FROM task_labels tl
         JOIN labels l ON l.id = tl.label_id
         WHERE tl.task_id IN ($placeholders)"
    );
    $stmt->bind_param($types, ...$ids);
    $stmt->execute();
    $labelsResult = $stmt->get_result();
    $labelsByTask = [];
    while ($row = $labelsResult->fetch_assoc()) {
        $labelsByTask[$row['task_id']][] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'color' => $row['color']
        ];
    }
    foreach ($tasks as &$task) {
        if (isset($labelsByTask[$task['id']])) {
            $task['labels'] = $labelsByTask[$task['id']];
        }
    }
    unset($task);
}

success_response($tasks, 'OK');
