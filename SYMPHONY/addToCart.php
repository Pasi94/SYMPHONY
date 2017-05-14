<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}
if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}

if (!empty($_SESSION['username']) && isset($_GET['albumID']) && !empty($_GET['albumID'])) {
   array_push($_SESSION['cart_Items'],$_GET['albumID']);
    header('Location: shoppingCart.php');
} else {
    echo "<script>alert('Please login before using cart.');"
    . "window.location.href='SignInForm.php';</script>";
   
}
                
