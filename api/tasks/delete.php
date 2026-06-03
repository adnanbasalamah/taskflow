<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../helpers/auth.php';

require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    error_response('Method not allowed', 405);
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['id'])) {
    error_response('Task ID is required');
}

$user_id = current_user_id();
$task_id = (int) $input['id'];

$stmt = $db->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
$stmt->bind_param('ii', $task_id, $user_id);
$stmt->execute();

if ($stmt->affected_rows === 0) {
    error_response('Task not found', 404);
}

success_response(null, 'Task deleted');
