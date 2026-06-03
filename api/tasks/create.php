<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../helpers/validate.php';
require_once __DIR__ . '/../../helpers/auth.php';

require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    error_response('Method not allowed', 405);
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    error_response('Invalid JSON body');
}

$error = validate_required($input, ['content']);
if ($error) {
    error_response($error);
}

$user_id = current_user_id();
$title = isset($input['title']) ? sanitize_string($input['title']) : '';
$content = sanitize_string($input['content']);
$state = isset($input['state']) && in_array($input['state'], ['todo', 'doing', 'delegate', 'done'])
    ? $input['state']
    : 'todo';

$stmt = $db->prepare("INSERT INTO tasks (user_id, title, content, state) VALUES (?, ?, ?, ?)");
$stmt->bind_param('isss', $user_id, $title, $content, $state);
$stmt->execute();

$task_id = $stmt->insert_id;

success_response(['id' => $task_id, 'user_id' => $user_id, 'title' => $title, 'content' => $content, 'state' => $state, 'created_at' => date('c'), 'updated_at' => date('c')], 'Task created', 201);
