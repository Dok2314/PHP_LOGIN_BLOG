<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">Главная</a></li>
                <li><a href="faq.php" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <?php if(isset($_SESSION['name'])): ?>
                    <a href="logout.php"><button type="button" class="btn btn-outline-light me-2">Выйти</button></a>
                    <a href="profile.php"><button type="button" class="btn btn-warning">Мой Кабинет</button></a>
                    <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                        <a href="admin.php"><button type="button" class="btn btn-warning">Админка</button></a>
                    <?php endif;?>
                <?php else: ?>
                    <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Вход</button></a>
                    <a href="register.php"><button type="button" class="btn btn-warning">Регистрация</button></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>