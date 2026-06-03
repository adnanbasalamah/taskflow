<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../helpers/validate.php';
require_once __DIR__ . '/../../helpers/auth.php';

require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    error_response('Method not allowed', 405);
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['id'])) {
    error_response('Task ID is required');
}

$user_id = current_user_id();
$task_id = (int) $input['id'];

$stmt = $db->prepare("SELECT id FROM tasks WHERE id = ? AND user_id = ?");
$stmt->bind_param('ii', $task_id, $user_id);
$stmt->execute();
if ($stmt->get_result()->num_rows === 0) {
    error_response('Task not found', 404);
}

$updates = [];
$params = [];
$types = '';

if (isset($input['title'])) {
    $title = sanitize_string($input['title']);
    $updates[] = "title = ?";
    $params[] = $title;
    $types .= 's';
}

if (isset($input['content'])) {
    $content = sanitize_content($input['content']);
    $updates[] = "content = ?";
    $params[] = $content;
    $types .= 's';
}

if (isset($input['state'])) {
    $state = $input['state'];
    if (!in_array($state, ['todo', 'doing', 'delegate', 'done'])) {
        error_response('Invalid state');
    }
    $updates[] = "state = ?";
    $params[] = $state;
    $types .= 's';
}

if (empty($updates)) {
    error_response('No fields to update');
}

$params[] = $task_id;
$types .= 'i';

$sql = "UPDATE tasks SET " . implode(', ', $updates) . " WHERE id = ? AND user_id = ?";
$params[] = $user_id;
$types .= 'i';

$stmt = $db->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();

success_response(null, 'Task updated');
