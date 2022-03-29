<?php
    include "../../core.php";
    use application\connect\Database;
    $db = new Database();
    $categories = $db->paginate('categories', 5);
    $total_pages = $db->totalPages('categories', 5);
    if(isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $db->delete('categories', $category_id);
        header('Location: /CRUD/categories/categories.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Категории</title>
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
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $category): ?>
                <tr>
                    <th scope="row"><?php echo $category['id']; ?></th>
                    <td><?php echo $category['title']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td><a href="?category_id=<?php echo $category['id'];?>"><button class="btn btn-danger">Удалить</button></a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <ul class="pagination">
            <?php for($page = 1; $page < $total_pages; $page++): ?>
            <li class="page-item <?php echo $page == ($_GET['page'] ?? 1) ? 'active' : '' ?>">
                <a class="page-link" href="<?php echo "categories.php?page=$page"; ?>">
                    <?php echo $page; ?>
                </a>
            </li>
            <?php endfor; ?>
        </ul>

    </div>


<!--Header ---------------------------------------------------->
<?php include "../../application/includes/footer.php"; ?>
</body>
</html>