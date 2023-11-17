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
        <h3>Авторизация</h3>
    </div>
    <?php if (isset($_SESSION['error'])):?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'] ?>
        </div>
        <?php unset($_SESSION['error']);
    endif;?>
    <div class="row mt-4">
        <form action="../controllers/login.php" class="d-flex flex-column justify-center" id="auth-form" method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Телефон/Почта</label>
                <input type="text" class="form-control" name="login" id="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="g-recaptcha btn btn-primary"
                    data-sitekey="6LfT2hEpAAAAABjrsRqXB1ijhp9j9HOadGIYMCPZ"
                    data-callback='onSubmit'
                    data-action='submit'>Войти
            </button>
        </form>
    </div>
    <div class="row px-2">
        <a href="/src/views/index.php" class="btn btn-info mt-5 text-white">Нет аккаунта?</a>
    </div>
</div>
</body>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("auth-form").submit();
    }
</script>
</html>