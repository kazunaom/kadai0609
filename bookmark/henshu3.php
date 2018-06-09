<?php
include("functions.php");

$id = $_GET["id"];

$pdo = db_con();

$sql = "SELECT * FROM book_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = "";
if($status==false){
  queryError($stmt);
}else{
    $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
 
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bookmark.php" style="color:#000; font-size:20px">HOME</a></div>
    </div>
  </nav>
</header>

<form method="post" action="update_bookmark.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク</legend>
     <label>書籍名：<input type="text" name="title" value="<?=$row["title"]?>"></label><br>
     <label>書籍url：<input type="text" name="url" value="<?=$row["url"]?>"></label><br>
     <label>メモ：<input type="text" name="memo" value="<?=$row["memo"]?>"></label><br>
     <label>tag：<input type="text" name="tag" value="<?=$row["tag"]?>"></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="保存">
    </fieldset>
  </div>
</form>


</body>
</html>
