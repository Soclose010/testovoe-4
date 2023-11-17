<?php
session_start();
if (!isset($_SESSION['user']))
{
    Header("Location: /src/views/index.php");
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-5 w-25">
    <div class="row">
        <h3>Профиль</h3>
    </div>
    <?php if (isset($_SESSION['error'])):?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'] ?>
        </div>
        <?php unset($_SESSION['error']);
    endif;?>
    <div class="row mt-4">
        <h3>Привет, <?=$_SESSION['user']['name']?>!</h3>
        <a href="../controllers/logout.php" class="btn btn-danger">Выйти</a>
        <ul>
            <li>
                <form class="d-flex flex-column justify-center mt-5" method="post" action="../controllers/update.php">
                    <h4>Сменить имя</h4>
                    <div class="mb-3">
                        <label for="name" class="form-label">Новое имя</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Сменить</button>
                </form>
            </li>
            <li>
                <form class="d-flex flex-column justify-center mt-5" method="post" action="../controllers/update.php">
                    <h4>Сменить телефон</h4>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Новый телефон</label>
                        <input type="tel" pattern="[0-9]{11}" class="form-control" name="phone" id="phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Сменить</button>
                </form>
            </li>
            <li>
                <form class="d-flex flex-column justify-center mt-5" method="post" action="../controllers/update.php">
                    <h4>Сменить почту</h4>
                    <div class="mb-3">
                        <label for="email" class="form-label">Новая почта</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <button type="submit" class="btn btn-primary">Сменить</button>
                </form>
            </li>
            <li>
                <form class="d-flex flex-column justify-center mt-5" method="post" action="../controllers/update.php">
                    <h4>Сменить пароль</h4>
                    <div class="mb-3">
                        <label for="password-old" class="form-label">Старый пароль</label>
                        <input type="password" class="form-control" name="password-old" id="password-old">
                    </div>
                    <div class="mb-3">
                        <label for="password-new" class="form-label">Новый пароль</label>
                        <input type="password" class="form-control" name="password-new" id="password-new">
                    </div>
                    <button type="submit" class="btn btn-primary">Сменить</button>
                </form>
            </li>
        </ul>

    </div>
</div>

</body>
</html>