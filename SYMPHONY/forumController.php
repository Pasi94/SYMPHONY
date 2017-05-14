<?php

include_once('./DBConnection.php');

function addComment($userName, $title, $comment, $rating) {
    $day = date("Y-m-d");
    $sql = "INSERT INTO Forum (email,title,comment,rating,date) VALUES ((SELECT email FROM registereduser WHERE userName='$userName'),'$title','$comment',$rating,'$day')";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
}

function addGuestComment($email, $fname, $lname, $title, $comment, $rating) {
    $db = mySQlConnection();

    $sql1 = "INSERT INTO user (email,fname,lname) VALUES ('$email','$fname','$lname')        
            ON DUPLICATE KEY UPDATE email='$email'";
    $stmt1 = $db->prepare($sql1);
    echo $sql1;
    $stmt1->execute();

    $day = date("Y-m-d");
    $sql2 = "INSERT INTO Forum (email,title,comment,rating,date) VALUES ('$email','$title','$comment',$rating,'$day')";
    $stmt2 = $db->prepare($sql2);
    echo $sql2;
    $stmt2->execute();
}

function getLatestComments() {
    $sql = "SELECT Forum.title,Forum.comment,Forum.rating,user.fName,user.lName,Forum.date FROM Forum INNER JOIN user ON user.email = Forum.email GROUP BY Forum.title,Forum.comment,Forum.rating,user.fName,user.lName ORDER BY Forum.id LIMIT 5";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
