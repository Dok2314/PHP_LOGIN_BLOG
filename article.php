<?php
include "core.php";
use application\connect\Database;
$db = new Database();
$slug = $_GET['slug'];
$article = $db->selectOne('posts', ['slug' => $slug]);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $article['title'];?></title>
</head>
<body>

<img src="/uploads/<?php echo $article['img'];?>" alt="">
</body>
</html>