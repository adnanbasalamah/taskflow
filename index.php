<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);

$page = $_GET['page'] ?? 'dashboard';

if ($page === 'logout') {
    session_destroy();
    header('Location: /');
    exit;
}

if ($page === 'task' && !$isLoggedIn) {
    $page = 'login';
}

if (!$isLoggedIn && $page !== 'login') {
    $page = 'login';
}

$validPages = ['login', 'dashboard', 'task', '404'];
if (!in_array($page, $validPages)) {
    http_response_code(404);
    $page = '404';
}

switch ($page) {
    case 'login': $pageTitle = 'TaskFlow — Login'; break;
    case 'dashboard': $pageTitle = 'TaskFlow — Dashboard'; break;
    case 'task': $pageTitle = 'TaskFlow — Task'; break;
    case '404': $pageTitle = 'TaskFlow — 404'; break;
    default: $pageTitle = 'TaskFlow'; break;
}

$viewFile = __DIR__ . '/views/' . $page . '.php';
if (!file_exists($viewFile)) {
    http_response_code(404);
    $viewFile = __DIR__ . '/views/404.php';
    $pageTitle = 'TaskFlow — 404';
}

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');

require __DIR__ . '/views/layout.php';
