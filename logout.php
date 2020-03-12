<?php

session_start();

if (isset($_SESSION['login_username'])) {
    unset($_SESSION['login_username']);
    header("location: http://localhost/Web_shop/index2.php");
}

