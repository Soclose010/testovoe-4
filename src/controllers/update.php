<?php

require "funcs.php";

$db = connection();
$id = $_SESSION['user']['id'];
if (!empty($_POST['name']))
{
    updateColumn($db, $id, 'name', $_POST['name']);
    Header("Location: /src/views/profile.php");
}

if (!empty($_POST['phone']))
{
    updateColumn($db, $id, 'phone', $_POST['phone']);
    Header("Location: /src/views/profile.php");
}

if (!empty($_POST['email']))
{
    updateColumn($db, $id, 'email', $_POST['email']);
    Header("Location: /src/views/profile.php");
}

if (!empty($_POST['password-old']))
{
    $stmt = "SELECT password FROM Users WHERE id = {$id}";
    $stmt = $db->query($stmt)->fetchColumn();
    if (password_verify($_POST['password-old'],$stmt))
    {
        updateColumn($db, $id, 'password', password_hash($_POST['password-new'],PASSWORD_DEFAULT));
        unset($_SESSION['user']);
        Header("Location: /src/views/authorization.php");
    }
    else
    {
        $_SESSION['error'] = 'Неверный текущий пароль';
        Header("Location: /src/views/profile.php");
    }

}
die();