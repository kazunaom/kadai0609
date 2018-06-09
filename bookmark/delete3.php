<?php

include("functions.php");
$id = $_GET["id"];

$pdo = db_con();

$sql = 'DELETE FROM book_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


if($status==false){
    querryError($stmt);
}else{
    header("Location: bookmark.php");
    exit;
}



?>