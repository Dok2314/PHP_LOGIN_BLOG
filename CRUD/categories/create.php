<?php
    include "../../core.php";
    include "../../application/controllers/categories.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "../../application/includes/assets.php"; ?>
    <link rel="stylesheet" href="../../application/assets/css/style.css">
</head>
<body>
    <?php include "../../application/includes/header.php"; ?>

        <h1 style="text-align: center; margin-top: 20px;">Добавление Статьи:</h1>
        <div class="container">
            <form action="create.php" method="POST" class="form-control mb-5">
                <div class="err">
                    <?php if($errMess): ?>
                        <?php echo $errMess; ?>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?=$oldTitle;?>">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?=$oldDescription;?></textarea>
                </div>
                <br>
                <button type="submit" name="add-category" class="btn btn-success">Создать</button>
            </form>
        </div>


    <?php include "../../application/includes/footer.php"; ?>
</body>
</html>