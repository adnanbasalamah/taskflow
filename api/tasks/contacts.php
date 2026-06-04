<?php

require_once __DIR__ . '/../../config/app.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/response.php';
require_once __DIR__ . '/../../helpers/validate.php';
require_once __DIR__ . '/../../helpers/auth.php';

require_login();

$method = $_SERVER['REQUEST_METHOD'];
$user_id = current_user_id();

if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) error_response('Invalid JSON body');

    $error = validate_required($input, ['task_id', 'name', 'phone']);
    if ($error) error_response($error);

    $task_id = (int) $input['task_id'];
    $name = sanitize_string($input['name']);
    $phone = sanitize_string($input['phone']);

    $stmt = $db->prepare("SELECT id FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param('ii', $task_id, $user_id);
    $stmt->execute();
    if ($stmt->get_result()->num_rows === 0) error_response('Task not found', 404);

    $stmt = $db->prepare("SELECT tc.id, tc.name FROM task_contacts tc JOIN tasks t ON t.id = tc.task_id WHERE t.user_id = ? AND tc.phone = ?");
    $stmt->bind_param('is', $user_id, $phone);
    $stmt->execute();
    $existing = $stmt->get_result()->fetch_assoc();
    if ($existing && $existing['name'] !== $name) error_response('tidak bisa disimpan, kontak sdh ada');

    $stmt = $db->prepare("INSERT INTO task_contacts (task_id, name, phone) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $task_id, $name, $phone);
    $stmt->execute();

    success_response(['id' => $stmt->insert_id], 'Contact added', 201);
}
elseif ($method === 'GET' && isset($_GET['task_id'])) {
    $task_id = (int) $_GET['task_id'];

    $stmt = $db->prepare("SELECT id, name, phone FROM task_contacts WHERE task_id = ?");
    $stmt->bind_param('i', $task_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $contacts = [];
    while ($row = $result->fetch_assoc()) $contacts[] = $row;
    success_response($contacts);
}
elseif ($method === 'GET' && isset($_GET['search'])) {
    $keyword = sanitize_string($_GET['search']);
    $like = '%' . $keyword . '%';

    $stmt = $db->prepare("
        SELECT tc.id, tc.name, tc.phone
        FROM task_contacts tc
        JOIN tasks t ON t.id = tc.task_id
        WHERE t.user_id = ? AND tc.name LIKE ?
        LIMIT 10
    ");
    $stmt->bind_param('is', $user_id, $like);
    $stmt->execute();
    $result = $stmt->get_result();

    $contacts = [];
    while ($row = $result->fetch_assoc()) $contacts[] = $row;
    success_response($contacts);
}
elseif ($method === 'DELETE') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input || !isset($input['id'])) error_response('Contact ID required');

    $contact_id = (int) $input['id'];
    $stmt = $db->prepare("DELETE tc FROM task_contacts tc JOIN tasks t ON t.id = tc.task_id WHERE tc.id = ? AND t.user_id = ?");
    $stmt->bind_param('ii', $contact_id, $user_id);
    $stmt->execute();
    if ($stmt->affected_rows === 0) error_response('Contact not found', 404);
    success_response(null, 'Contact deleted');
}
else {
    error_response('Method not allowed', 405);
}
