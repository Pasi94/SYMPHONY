<?php

include_once('./DBConnection.php');

function addToCart($userName, $albumID) {
    $sql = "INSERT INTO ShoppingCart  VALUES ('$userName','$albumID')";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
}

function getCartData($name) {
    $sql = "SELECT albumID FROM ShoppingCart WHERE userName='$name'";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function deleteCartData($user) {
    $sql= "DELETE FROM ShoppingCart WHERE userName='$user'";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
}
