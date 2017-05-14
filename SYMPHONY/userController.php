<?php

include_once('./DBConnection.php');

function addNewRegisteredUser($userName, $fName, $lName, $email, $password, $contact) {
    $db = mySQlConnection();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $db->beginTransaction();
        $sql1 = "INSERT INTO User 
    VALUES ('$email','$fName','$lName')";
        $sql2 = "INSERT INTO RegisteredUser 
    VALUES ('$userName',(SELECT PASSWORD('$password')),'$contact','$email')";
        $stmt1 = $db->prepare($sql1);
        $stmt1->execute();
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();
        $db->commit();
        return 1;
    } catch (Exception $e) {
        $db->rollback();
        echo $e->getMessage();
        return 0;
    }
}

function signIn($name, $password) {
    $sql = "SELECT * FROM RegisteredUser WHERE (userName='$name' OR email='$name') AND password=(SELECT PASSWORD('$password'))";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    if (!empty($row)) {
        return 1;
    } else {
        return 0;
    }
}
    function getUserData($userName) {
        $sql = "SELECT * FROM User WHERE email=(SELECT email FROM RegisteredUser WHERE userName='$userName')";
        $stmt = mySQlConnection()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }


