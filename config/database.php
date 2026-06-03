<?php

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: 'RSAtolong313';
$db_name = getenv('DB_NAME') ?: 'taskflow_db';

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
