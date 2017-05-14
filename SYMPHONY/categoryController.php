<?php

include_once('./DBConnection.php');

function getAllCategories() {

    $sql = "SELECT * FROM Category";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}

function getCategoryName($id) {
    $sql = "SELECT name FROM Category WHERE id='$id'";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}