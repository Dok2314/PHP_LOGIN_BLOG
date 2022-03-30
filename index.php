<?php
include "core.php";
use application\connect\Database;
$db = new Database();
$articles = $db->approvedPosts('posts',1);
$categories = $db->paginate('categories', 5);


if(isset($_POST['find']))
{
    $query = $_POST['query'];
    if($query != ""){
        $searchedArticles = $db->search($query);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "application/includes/assets.php"; ?>
    <link rel="stylesheet" href="/application/assets/css/search.css">
</head>
<body>
<!--Header ---------------------------------------------------->
<?php include "application/includes/header.php"; ?>
<!--Content ----------------------------------------------------------------------------->

<div class="container">
    <div class="row">
         <div class="col-md-8">
             <h1 class="alert alert-info">Популярные посты:</h1>
                  <table class="table">
                      <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Название</th>
                          <th scope="col">Пост</th>
                          <th scope="col">Создан</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($articles as $article): ?>
                      <tr>
                          <th scope="row"><?php echo $article['id']; ?></th>
                          <td><?php echo $article['title']; ?></td>
                          <td><?php echo $article['post']; ?></td>
                          <td><?php echo $article['created_at']; ?></td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
         </div>
        <div class="col-md-4">
            <ul class="list-group">
                <div class="container">
                    <form class="from-control" name="search" method="post" action="index.php">
                        <h1 class="alert alert-info">Поиск Статьи</h1>
                        <input type="search" name="query" class="form-control form-control-dark" placeholder="Поиск...">
                        <button style="margin-top: 10px;" name="find" type="submit" class="btn btn-primary">Найти</button>
                    </form>
                </div>
                <?php if(isset($searchedArticles)): ?>
                    <h4 style="text-align: center">Найденые записи:</h4>
                    <?php foreach ($searchedArticles as $article):?>
                        <a class="sear" href="/article.php?slug=<?php echo $article['slug'];  ?>"><h6><?php echo $article['title']; ?></h6></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>


<!--Footer ----------------------------------------------------------------------------->
<?php include "application/includes/footer.php"; ?>
</body>
</html>
