<?php

require_once __DIR__ . '/config/app.php';

echo "TaskFlow Installer\n";
echo "=================\n\n";

$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}

$sql = file_get_contents(__DIR__ . '/migrations/001_create_tables.sql');

if ($conn->multi_query($sql)) {
    echo "Database and tables created successfully.\n";
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
} else {
    echo "Error: " . $conn->error . "\n";
}

$conn->close();
echo "\nInstallation complete.\n";
