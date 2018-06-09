<?php
include("functions.php");

if(
    !isset($_POST["title"]) || $_POST["title"]=="" ||
    !isset($_POST["url"]) || $_POST["url"]=="" ||
    !isset($_POST["memo"]) || $_POST["memo"]=="" ||
    !isset($_POST["tag"]) || $_POST["tag"]==""
){
    exit('ParamError');
}

$title = $_POST["title"];
$url = $_POST["url"];
$memo = $_POST["memo"];
$tag = $_POST["tag"];

$pdo = db_con();


$stmt = $pdo->prepare("INSERT INTO book_table(id, title, url, memo, tag, indate)
VALUES(NULL, :title, :url, :memo, :tag, sysdate())");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
$status = $stmt->execute();

if($status == false){
    queryError($stmt);
}else{

    header("Location: bookmark.php");
    exit;
}



?>