<?php
session_start();
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
        <h3>Регистрация</h3>
    </div>
    <?php if (isset($_SESSION['error'])):?>
    <div class="alert alert-danger" role="alert">
       <?= $_SESSION['error'] ?>
    </div>
    <?php unset($_SESSION['error']);
    endif;?>
    <div class="row mt-4">
        <form class="d-flex flex-column justify-center" method="post" action="../controllers/register.php">
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Иван">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="tel" pattern="[0-9]{11}" class="form-control" name="phone" id="phone" placeholder="88005553535">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Почта</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ivan@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" name="password-confirmation" id="password-confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
    <div class="row px-2">
        <a href="/src/views/authorization.php" class="btn btn-info mt-5 text-white">Уже есть аккаунт?</a>
    </div>
</div>

</body>
</html>