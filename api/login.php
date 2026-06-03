<?php

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../helpers/validate.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    error_response('Method not allowed', 405);
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    error_response('Invalid JSON body');
}

$error = validate_required($input, ['username', 'password']);
if ($error) {
    error_response($error);
}

$username = sanitize_string($input['username']);
$password = $input['password'];

$stmt = $db->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    error_response('Invalid username or password', 401);
}

$user = $result->fetch_assoc();

if (!password_verify($password, $user['password'])) {
    error_response('Invalid username or password', 401);
}

$_SESSION['user_id'] = (int) $user['id'];

success_response(['user_id' => $user['id']], 'Login successful');
