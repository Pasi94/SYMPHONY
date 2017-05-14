<?php

include_once('./DBConnection.php');

function getAllAlbums($limit) {

    $sql = "SELECT albumID,name,price,url,artistName FROM Album ORDER BY albumID DESC ".$limit;
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}

function getRawCount() {
    $sql = "SELECT COUNT(albumID) FROM Album";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

function getRawCountByCategory($category) {
    $sql = "SELECT COUNT(albumID) FROM Album WHERE Category_id='$category'";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
} 

function getAllAlbumsByCategory($limit,$category) {

    $sql = "SELECT albumID,name,price,url,artistName FROM Album WHERE Category_id='$category' ORDER BY albumID DESC ".$limit;
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}
function getRawCountForSearch($keyword) {
    $sql = "SELECT COUNT(albumID) FROM Album WHERE name LIKE '%$keyword%'";
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
} 

function getAllAlbumsForSearch($limit,$keyword) {

    $sql = "SELECT albumID,name,price,url,artistName FROM Album WHERE name LIKE '%$keyword%' ORDER BY albumID DESC ".$limit;
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}
function getAlbumDetails($albumID) {
    $sql = "SELECT * FROM Album WHERE albumID=".$albumID;
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

function getAlbumSongs($albumID) {
    $sql = "SELECT * FROM Song WHERE Album_albumID=".$albumID;
    $stmt = mySQlConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}