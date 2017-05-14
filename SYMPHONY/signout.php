<?php

include_once('./shoppingCartcontroller.php');
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}

if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}
foreach ($_SESSION['cart_Items'] as $value) {
    addToCart($_SESSION['username'], $value);
}
unset($_SESSION['cart_Items']);
unset($_SESSION['username']);
header('Location: index.php');
