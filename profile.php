<?php
include "core.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="application/assets/css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: black">
<div class="neon">
    <span class="text" data-text="<?=$_SESSION['name'];?>"><?=$_SESSION['name'];?></span>
    <span class="gradient"></span>
    <span class="spotlight"></span>
</div>
<iframe style="position:absolute; top: 10px" width="350" height="200" src="https://www.youtube.com/embed/VpSe5v6HORs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<a href="/" style="position: absolute; top: 500px;"><button class="btn btn-danger">Выйти Из Зоны Комфорта</button></a>

<script src="application/assets/js/profile.js"></script>
</body>
</html>