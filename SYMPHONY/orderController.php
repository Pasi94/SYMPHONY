<?php

include_once('./DBConnection.php');

function getMostDownloads() {

    $sql = "SELECT Album_albumID,count(Album_albumID) as count FROM orderdetail ORDER BY count LIMIT 5";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    if ($stmt->fetchColumn() == 6) {
        $result = $stmt->fetchAll();
        return $result;
    }
}

function getOrderDetails($order) {

    $sql = "SELECT * FROM orderdetail WHERE Order_id='$order'";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function placeOrder($user, $items) {
    $db = mySQlConnection();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $db->beginTransaction();
        $date = date("Y-m-d");
        $sql1 = "INSERT INTO `order` (`date`,userName) 
    VALUES ('$date','$user')";

        $stmt1 = $db->prepare($sql1);

        $stmt1->execute();
        $sql = "SELECT id FROM `order` ORDER BY id Desc Limit 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $val = $stmt->fetch();
        foreach ($items as $value) {
            $sql2 = "INSERT INTO orderdetail 
    VALUES ($val[0],'$value',(SELECT price FROM album where albumID='$value'))";
            $stmt2 = $db->prepare($sql2);            
            $stmt2->execute();  
            
            $sql3="DELETE FROM ShoppingCart WHERE userName='$user'";
            $stmt3 = $db->prepare($sql3);
            $stmt3->execute();
        }
        $db->commit();
        return $val;
    } catch (Exception $e) {
        $db->rollback();
        echo $e->getMessage();
        return -1;
    }
}
