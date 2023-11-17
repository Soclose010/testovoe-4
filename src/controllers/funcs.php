<?php

session_start();
function connection()
{
    $connect = null;
    $db_config = require "../config/db.php";
    $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};port={$db_config['port']}";
    try {
        $connect = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $connect;
}

function updateColumn($db , $id, $columnName, $value)
{
    $stmt = "UPDATE Users SET {$columnName} = ? WHERE id = {$id}";
    $stmt = $db->prepare($stmt);
    if ($stmt->execute([$value]))
        $_SESSION['user'][$columnName] = $value;

}

function botCheck()
{
    if (isset($_POST['g-recaptcha-response']))
    {
        $captcha_config = require "../config/reCAPTCHA.php";
        $secret = $captcha_config['secret'];
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $url.= "?secret={$secret}&";
        $url.= "response={$_POST['g-recaptcha-response']}";
        $response = json_decode(file_get_contents($url), true);
        return $response['success'] && $response['score'] > 0.5;
    }
    return false;
}