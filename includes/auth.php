<?php
require_once __DIR__ . '/../config.php';

function require_login() {
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

function require_admin() {
    require_login();
    if (($_SESSION['user']['role'] ?? '') !== 'admin') {
        http_response_code(403);
        exit('Access denied.');
    }
}

function redirect_by_role() {
    header('Location: ' . (($_SESSION['user']['role'] ?? '') === 'admin' ? 'admin.php' : 'dashboard.php'));
    exit;
}

function status_badge($s) {
    $s = (string)$s;
    $cls = strtolower(trim(str_replace(' ', '-', $s)));
    return '<span class="status ' . e($cls) . '">' . e($s) . '</span>';
}
