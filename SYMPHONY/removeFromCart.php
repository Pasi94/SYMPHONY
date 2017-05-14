<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}
if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}

if (($key = array_search($_GET['albumID'], $_SESSION['cart_Items'])) !== false) {
    unset($_SESSION['cart_Items'][$key]);
}
header('Location: shoppingCart.php');