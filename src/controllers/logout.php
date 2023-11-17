<?php
require "funcs.php";
if (isset($_SESSION['user']))
    unset($_SESSION['user']);
Header("Location: /src/views/index.php");
die();