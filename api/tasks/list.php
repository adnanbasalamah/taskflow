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

$sql = "SELECT id, content, state, created_at, updated_at FROM tasks WHERE user_id = ?";
$params = [$user_id];
$types = 'i';

if ($state_filter) {
    $sql .= " AND state = ?";
    $params[] = $state_filter;
    $types .= 's';
}

$sql .= " ORDER BY created_at DESC";

$stmt = $db->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

success_response($tasks, 'OK');
