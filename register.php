<?php include "application/controllers/users.php";?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регестрация</title>
    <link rel="stylesheet" href="application/assets/css/style.css">
    <?php include "application/includes/assets.php"; ?>
</head>
<body>
<!--Header ---------------------------------------------------->
<?php include "application/includes/header.php"; ?>

<!-- Content   -->
    <h1 class="alert alert-info">Регистрация</h1>
    <div class="container">
        <form action="register.php" method="POST" class="form-reg">
            <div class="err">
                <?php if(isset($errMess)): ?>
                    <?=$errMess;?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="name">Ваше Имя:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?=$oldName;?>">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?=$oldEmail;?>">
            </div>
            <div class="form-group">
                <label for="pass-first">Пароль</label>
                <input type="password" name="pass-first" id="pass-first" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass-second">Повторите Пароль</label>
                <input type="password" name="pass-second" id="pass-second" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="add-user">Зарегестрироватся</button>
        </form>
        <br>
    </div>

<!--Footer ----------------------------------------------------------------------------->
<?php include "application/includes/footer.php"; ?>
</body>
</html>