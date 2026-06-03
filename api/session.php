<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../helpers/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    error_response('Method not allowed', 405);
}

if (!is_logged_in()) {
    json_response(['authenticated' => false]);
}

$user_id = current_user_id();

$stmt = $db->prepare("SELECT id, username, display_name, created_at FROM users WHERE id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

json_response([
    'authenticated' => true,
    'user' => $user
]);
