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

$error = validate_string_length($username, 3, 50);
if ($error) {
    error_response('Username ' . $error);
}

if (strlen($password) < 6) {
    error_response('Password must be at least 6 characters');
}

$stmt = $db->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    error_response('Username already taken', 409);
}

$hashed = password_hash($password, PASSWORD_BCRYPT);

$stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param('ss', $username, $hashed);
$stmt->execute();

success_response(['user_id' => $stmt->insert_id], 'Registration successful', 201);
