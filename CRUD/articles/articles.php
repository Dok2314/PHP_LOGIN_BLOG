<?php
include "../../core.php";
use application\connect\Database;
$db = new Database();
$articles = $db->paginate('posts', 2);
$total_pages = $db->totalPages('posts', 2);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статьи</title>
    <?php include "../../application/includes/assets.php"; ?>
</head>
<body>
<!--Header ---------------------------------------------------->
<?php include "../../application/includes/header.php"; ?>

<div class="container">
    <table class="table mb-10">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Название</th>
            <th scope="col">Статья</th>
            <th scope="col">Фото</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($articles as $article): ?>
        <tr>
            <th scope="row"><?php echo $article['id'];?></th>
            <td><?php echo $article['user_id'];?></td>
            <td><?php echo $article['title'];?></td>
            <td><?php echo $article['post'];?></td>
            <td><img src="/uploads/<?php echo $article['img'];?>" width="300px" height="200px"></td>
            <td><button class="btn btn-danger">Удалить</button></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <ul class="pagination">
        <?php for ($page = 1; $page <= $total_pages ; $page++):?>
            <li class="page-item">
                <a class="page-link" href="<?php echo "articles.php?page=$page"; ?>">
                    <?php  echo $page; ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

<!--Header ---------------------------------------------------->
<?php include "../../application/includes/footer.php"; ?>
</body>
</html>