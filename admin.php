<?php
include "core.php";
checkAuth();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$_SESSION['name'];?></title>
    <?php include "application/includes/assets.php"; ?>
    <link rel="stylesheet" href="application/assets/css/sidebar.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>

<nav class='sidebar sidebar-menu-collapsed'>
    <a href='#' id='justify-icon'>
        <span class='glyphicon glyphicon-align-justify'></span>
    </a>
    <ul>
        <li class='active'>
            <a class='expandable' href='/' title='Dashboard'>
                <span class='glyphicon glyphicon-home collapsed-element'></span>
                <span class='expanded-element'>Главная</span>
            </a>
        </li>
        <li>
            <a class='expandable' href='CRUD/articles/create.php' title='APIs'>
                <span class='glyphicon glyphicon-wrench collapsed-element'></span>
                <span class='expanded-element'>Создать Статью</span>
            </a>
        </li>
        <li>
            <a class='expandable' href='CRUD/categories/create.php' title='APIs'>
                <span class='glyphicon glyphicon-wrench collapsed-element'></span>
                <span class='expanded-element'>Создать Категорию</span>
            </a>
        </li>
        <li>
            <a class='expandable' href='#' title='Account'>
                <span class='glyphicon glyphicon-user collapsed-element'></span>
                <span class='expanded-element'>Пользователи</span>
            </a>
        </li>
    </ul>
    <a href='logout.php' id='logout-icon' title='Logout'>
        <span class='glyphicon glyphicon-off'></span>
    </a>
</nav>
<div class="container">
    <h1 style="background: rgb(214, 243, 251); padding: 20px; border-radius: 10px;margin-bottom: 20px">Добро пожаловать величайший <span style="color: green; font-weight: bolder; z-index: 0;"><?=$_SESSION['name'];?></span>
            <a href="profile.php"><button type="button" class="btn btn-warning" style="margin-left: 420px;">Мой Кабинет</button></a>
        </h1>
</div>

<!--Footer ----------------------------------------------------------------------------->
<?php include "application/includes/footer.php"; ?>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script src="application/assets/js/sidebar.js"></script>
</body>
</html>
