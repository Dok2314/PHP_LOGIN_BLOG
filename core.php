<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "vendor/autoload.php";
session_start();

define('APP_ROOT', __DIR__ . '/');

function checkAuth() {
    if (!isset($_SESSION['id'])) {
        header('Location: /');
        die;
    }
}

