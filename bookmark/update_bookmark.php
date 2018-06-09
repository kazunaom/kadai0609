<?php
include("functions.php");
$id = $_POST["id"];
$title = $_POST["title"];
$url = $_POST["url"];
$memo = $_POST["memo"];
$tag = $_POST["tag"];

$pdo = db_con();

$sql = 'UPDATE book_table SET title=:title,url=:url,memo=:memo,tag=:tag WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title',  $title,  PDO::PARAM_STR);
$stmt->bindValue(':url',  $url,  PDO::PARAM_STR);
$stmt->bindValue(':memo',  $memo,  PDO::PARAM_STR);
$stmt->bindValue(':tag',  $tag,  PDO::PARAM_STR);
$stmt->bindValue(':id',  $id,  PDO::PARAM_INT); 
$status = $stmt->execute();


if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  header("Location: bookmark.php");
  exit;

}

?>