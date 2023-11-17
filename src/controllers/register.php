<?php

require "funcs.php";

if ($_POST['password'] !== $_POST['password-confirmation'])
{
    $_SESSION['error'] = 'Пароли не совпадают';
    Header("Location: /src/views/index.php");
    die();
}
$data = [
    'name' => $_POST['name'],
    'phone' => $_POST['phone'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
];
$db = connection();
$stmt = "SELECT count(*) from Users WHERE `email` LIKE ? OR `phone` LIKE ?";
$stmt = $db->prepare($stmt);
$stmt->execute([$data['email'], $data['phone']]);
if ($stmt->fetchColumn() >= 1)
{
    $_SESSION['error'] = 'Пользователь с такой почтой/телефоном уже существует';
    Header("Location: /src/views/index.php");
    die();
}

$stmt = 'INSERT INTO Users (`name`, `phone`, `email`, `password`) VALUES (:name, :phone, :email, :password)';
$stmt = $db->prepare($stmt);
if ($stmt->execute($data))
    Header("Location: /src/views/authorization.php");
else
{
    $_SESSION['error'] = 'Ошибка при регистрации';
    Header("Location: /src/views/index.php");
}
