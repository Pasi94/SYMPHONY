<?php

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}

include_once('./forumController.php');
$title = $_GET['title'];
$msg = $_GET['msg'];
$rating = $_GET['rate'];

if(empty($rating)){
    $rating=0;
}

if (isset($_GET['msg']) && !empty($_GET['msg'])) {
    if (!empty($_SESSION['username'])) {
        addComment($_SESSION['username'], $title, $msg, $rating);
    } elseif (isset($_GET['email']) && !empty($_GET['email']) &&
            isset($_GET['fName']) && !empty($_GET['fName']) &&
            isset($_GET['lName']) && !empty($_GET['lName'])) {
        addGuestComment($_GET['email'], $_GET['fName'], $_GET['lName'], $title, $msg, $rating);
    }
}

header('Location: contact.php');


