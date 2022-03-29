<?php
include "core.php";
use application\connect\Database;
$db = new Database();
$slug = $_GET['slug'];
$category = $db->selectOne('categories', ['slug' => $slug]);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $category['title'];?></title>
</head>
<body>

<p><?php echo $category['description'];?></p>
</body>
</html>