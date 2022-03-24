<?php
include "../../core.php";
include "../../application/controllers/articles.php";
use application\connect\Database;
$db = new Database();
$categories = $db->selectAll('categories');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление Статьи</title>
    <?php include "../../application/includes/assets.php"; ?>
    <link rel="stylesheet" href="../../application/assets/css/style.css">
</head>
<body>
<!--Header ---------------------------------------------------->
<?php include "../../application/includes/header.php"; ?>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <form action="create.php" method="POST" class="form-group" enctype="multipart/form-data">
        <div class="err">
            <?php if($errMess): ?>
                <?php echo $errMess; ?>
            <?php endif; ?>
        </div>
        <div class="form-group pb-4">
            <label for="title">Название Статьи</label>
            <input type="text" name="title" id="title" class="form-control" value="<?=$oldTitle;?>">
        </div>
        <div class="form-group pb-4">
            <label for="post">Статья</label>
            <textarea name="post" id="post" cols="30" rows="10" class="form-control"><?=$oldPost;?></textarea>
        </div>
        <div class="form-group pb-4">
            <label for="img">Фото</label>
            <input type="file" name="img" id="img" class="form-control">
        </div>
        <div class="form-group pb-4">
            <label for="category">Категория</label>
            <select name="category" id="category" class="form-control">
                <?php foreach($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="appr">Approved?</label>
            <input type="hidden" name="appr" value="0">
            <input type="checkbox" name="appr" value="1" id="appr">
        </div>
        <br>
        <button class="btn btn-success" name="add-article">Создать</button>
    </form>
</div>

<!--Footer ----------------------------------------------------------------------------->
<?php include "../../application/includes/footer.php"; ?>
</body>
</html>