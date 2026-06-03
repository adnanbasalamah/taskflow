<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../helpers/validate.php';
require_once __DIR__ . '/../helpers/auth.php';

require_login();

$user_id = current_user_id();
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    if (isset($_GET['task_id'])) {
        $task_id = (int) $_GET['task_id'];
        $stmt = $db->prepare(
            "SELECT l.id, l.name, l.color FROM labels l
             JOIN task_labels tl ON tl.label_id = l.id
             WHERE tl.task_id = ? AND l.user_id = ?"
        );
        $stmt->bind_param('ii', $task_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $labels = [];
        while ($row = $result->fetch_assoc()) $labels[] = $row;
        success_response($labels);
    } else {
        $stmt = $db->prepare("SELECT id, name, color FROM labels WHERE user_id = ? ORDER BY name");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $labels = [];
        while ($row = $result->fetch_assoc()) $labels[] = $row;
        success_response($labels);
    }
}
elseif ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) error_response('Invalid JSON body');

    $name = sanitize_string($input['name'] ?? '');
    $color = $input['color'] ?? '#6366f1';

    if (strlen($name) < 1 || strlen($name) > 50) error_response('Label name must be 1-50 chars');

    $stmt = $db->prepare("INSERT INTO labels (user_id, name, color) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $user_id, $name, $color);
    try {
        $stmt->execute();
        success_response(['id' => $stmt->insert_id, 'name' => $name, 'color' => $color], 'Label created', 201);
    } catch (Exception $e) {
        error_response('Label name already exists', 409);
    }
}
elseif ($method === 'PUT') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input || !isset($input['id'])) error_response('Label ID required');

    $label_id = (int) $input['id'];
    $name = isset($input['name']) ? sanitize_string($input['name']) : null;
    $color = $input['color'] ?? null;

    $stmt = $db->prepare("SELECT id FROM labels WHERE id = ? AND user_id = ?");
    $stmt->bind_param('ii', $label_id, $user_id);
    $stmt->execute();
    if ($stmt->get_result()->num_rows === 0) error_response('Label not found', 404);

    $updates = []; $params = []; $types = '';
    if ($name) { $updates[] = "name = ?"; $params[] = $name; $types .= 's'; }
    if ($color) { $updates[] = "color = ?"; $params[] = $color; $types .= 's'; }
    if (empty($updates)) error_response('No fields to update');
    $params[] = $label_id; $types .= 'i';

    $stmt = $db->prepare("UPDATE labels SET " . implode(', ', $updates) . " WHERE id = ?");
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    success_response(null, 'Label updated');
}
elseif ($method === 'DELETE') {
    $input = json_decode(file_get_contents('php://input'), true);
    $label_id = isset($input['id']) ? (int) $input['id'] : (isset($_GET['id']) ? (int) $_GET['id'] : 0);
    if (!$label_id) error_response('Label ID required');

    $stmt = $db->prepare("DELETE FROM labels WHERE id = ? AND user_id = ?");
    $stmt->bind_param('ii', $label_id, $user_id);
    $stmt->execute();
    if ($stmt->affected_rows === 0) error_response('Label not found', 404);
    success_response(null, 'Label deleted');
}
elseif ($method === 'PATCH' && isset($_GET['toggle'])) {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input || !isset($input['task_id']) || !isset($input['label_id'])) error_response('task_id and label_id required');

    $task_id = (int) $input['task_id'];
    $label_id = (int) $input['label_id'];

    $stmt = $db->prepare("SELECT id FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param('ii', $task_id, $user_id);
    $stmt->execute();
    if ($stmt->get_result()->num_rows === 0) error_response('Task not found', 404);

    $stmt = $db->prepare("SELECT task_id FROM task_labels WHERE task_id = ? AND label_id = ?");
    $stmt->bind_param('ii', $task_id, $label_id);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $stmt = $db->prepare("DELETE FROM task_labels WHERE task_id = ? AND label_id = ?");
        $stmt->bind_param('ii', $task_id, $label_id);
        $stmt->execute();
        success_response(['attached' => false], 'Label removed');
    } else {
        $stmt = $db->prepare("INSERT INTO task_labels (task_id, label_id) VALUES (?, ?)");
        $stmt->bind_param('ii', $task_id, $label_id);
        $stmt->execute();
        success_response(['attached' => true], 'Label added');
    }
}
else {
    error_response('Method not allowed', 405);
}
