<?php

require "funcs.php";

if (botCheck())
{
    $data = [
        'login' => $_POST['login'],
        'password' => $_POST['password'],
    ];
    $db = connection();
    $stmt = "SELECT * FROM Users WHERE `email` LIKE :login OR `phone` LIKE :login";
    $stmt = $db->prepare($stmt);
    $stmt->execute(['login' => $data['login']]);
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        if (password_verify($data['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            unset($_SESSION['user']['password']);
            Header("Location: /src/views/profile.php");
            die();
        }
    }
    $_SESSION['error'] = 'Пользователь с таким логином и паролем не найден';
    Header("Location: /src/views/authorization.php");
    die();
}
else
{
    Header("Location: /src/views/index.php");
    die();
}


