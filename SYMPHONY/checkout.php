<?php

session_start();
include_once('./orderController.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}
if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}

$val = placeOrder($_SESSION['username'], $_SESSION['cart_Items']);
if($val[0]!=-1){
        unset($_SESSION['cart_Items']);
}       
header("Location: ./orderSummary.php?val=" . $val[0]."&albums=".$_SESSION['cart_Items']);

