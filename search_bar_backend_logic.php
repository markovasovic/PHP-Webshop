<?php
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$searchbar = $_REQUEST['input_search'];
$_SESSION['searchbar'] = $searchbar;
header("location: http://localhost/Web_shop/index2.php");

?>