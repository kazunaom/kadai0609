<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ブックマーク追加</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default"><a href="bookmark.php" style="color:#000; font-size:20px">HOME</a></nav>
</header>

<form name="form1" action="insert_bookmark.php" method="post">
書籍名:<input type="text" name="title" />
書籍URL:<input type="text" name="url" />
ラベル:<input type="text" name="tag" />
メモ:<input type="text" name="memo" />
<button data-action="bookmark.php">ブックマークを追加</button>

</form>


</body>
</html>