<?php
    include "application/controllers/users.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <link rel="stylesheet" href="application/assets/css/style.css">
    <?php include "application/includes/assets.php"; ?>
</head>
<body>
<!--Header ---------------------------------------------------->
<?php include "application/includes/header.php"; ?>

<!-- Content   -->
<h1 class="alert alert-info">Вход</h1>
<div class="container">
    <form action="login.php" method="POST">
        <div class="err">
            <?php if(isset($errMess)): ?>
                <?=$errMess;?>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="name@example.com" id="email" class="form-control" value="<?=$oldEmail;?>">
        </div>
        <div class="form-group">
            <label for="pass">Пароль</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="login-user">Войти</button>
    </form>
    <br>
    <hr>
    <h1 style="text-align: center">Востановление Пароля</h1>
    <form action="" class="row g-3" method="post">
        <div class="col-md-6 offset-md-3">
            <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="email"
                placeholder="name@example.com">
                <label for="email" class="required">E-mail</label>
            </div>
        </div>
        <div class="col-md-6 offset-md-3">
            <button type="submit" name="recover" class="btn btn-danger">Отправить</button>
        </div>
    </form>
    <br>
</div>

<!--Footer ----------------------------------------------------------------------------->
<?php include "application/includes/footer.php"; ?>
</body>
</html>