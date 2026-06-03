<?php

require_once __DIR__ . '/config/database.php';

$username = 'admin';
$password = password_hash('abuya313500', PASSWORD_BCRYPT);

$stmt = $db->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE username = ?");
    $stmt->bind_param('ss', $password, $username);
    $stmt->execute();
    echo "User 'admin' updated with new password.\n";
} else {
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    echo "User 'admin' created.\n";
}

echo "Password: abuya313500\n";
echo "Done. You can now login at login.html\n";
