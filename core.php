<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "vendor/autoload.php";
session_start();

function checkAuth() {
    if (!isset($_SESSION['id'])) {
        header('Location: /');
        die;
    }
}
/*
 * $limit = 10; //кол-во записей на странице пагинации
 * $page = $_GET['page'] ?? 1; //<a href="articles.php?page=1
 * $offset = $limit * ($page - 1);
 *
 * SELECT * FROM articles
 * LIMIT 10
 * OFFSET 20
 */

