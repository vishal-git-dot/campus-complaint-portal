<?php require_once __DIR__ . '/../config.php'; ?>
<!doctype html><html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= e($page_title ?? 'CampusCare') ?> · CampusCare</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
<link rel="icon" href="assets/icons/favicon.ico" sizes="any">
<link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32.png">
<link rel="icon" type="image/png" sizes="512x512" href="assets/icons/favicon-512.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-touch-icon.png">
<link rel="stylesheet" href="assets/css/style.css">
<script>document.documentElement.dataset.theme=localStorage.getItem('campus-theme')||'light';</script>
</head><body>
<div class="app-shell">
<header class="topbar"><a class="brand" href="<?= ($_SESSION['user']['role'] ?? '')==='admin'?'admin.php':'dashboard.php' ?>"><span class="brand-mark">✦</span><span>Campus<span>Care</span></span></a>
<nav class="top-actions"><button class="theme-toggle" id="themeToggle" type="button"><span id="themeIcon">☀</span><span id="themeText">Light Mode</span></button><?php if (!empty($_SESSION['user'])): ?><span class="user-chip"><span class="avatar"><?= e(strtoupper(substr($_SESSION['user']['name'],0,1))) ?></span><?= e($_SESSION['user']['name']) ?></span><a class="btn btn-ghost btn-small" href="logout.php">Log out</a><?php endif; ?></nav></header>
<div class="layout">
<?php if (!empty($_SESSION['user'])): ?><aside class="sidebar"><a class="nav-item <?= (($_SESSION['user']['role']==='admin' && basename($_SERVER['PHP_SELF'])==='admin.php') || ($_SESSION['user']['role']!=='admin' && basename($_SERVER['PHP_SELF'])==='dashboard.php'))?'active':'' ?>" href="<?= $_SESSION['user']['role']==='admin'?'admin.php':'dashboard.php' ?>">⌂ <span>Dashboard</span></a><?php if ($_SESSION['user']['role']==='student'): ?><a class="nav-item <?= basename($_SERVER['PHP_SELF'])==='submit_complaint.php'?'active':'' ?>" href="submit_complaint.php">＋ <span>Report Issue</span></a><a class="nav-item <?= basename($_SERVER['PHP_SELF'])==='my_complaints.php'?'active':'' ?>" href="my_complaints.php">▤ <span>My Complaints</span></a><?php else: ?><a class="nav-item <?= in_array(basename($_SERVER['PHP_SELF']),['manage_complaints.php','update_status.php'])?'active':'' ?>" href="manage_complaints.php">▦ <span>Operations</span></a><?php endif; ?><div class="sidebar-bottom"><div class="help-card"><b>CampusCare</b><span>Make campus better, one issue at a time.</span></div></div></aside><?php endif; ?>
<main class="main-content">
