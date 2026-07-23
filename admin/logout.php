<?php
require __DIR__ . '/../includes/functions.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    $sessionDir = __DIR__ . '/../data/sessions';
    if (!is_dir($sessionDir)) {
        mkdir($sessionDir, 0775, true);
    }
    session_save_path($sessionDir);
    session_start();
}
session_destroy();
header('Location: login.php');
exit;
?>
