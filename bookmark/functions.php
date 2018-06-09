<?php
/** 共通で使うものを別ファイルにしておきましょう。*/

//DB接続関数（PDO）
function db_con(){
  // $dbname='mitsuyabu_gs_db';
  $dbname='php_kadai2';
  try {
    // $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=mysql719.db.sakura.ne.jp','mitsuyabu','matsui55');
    $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function queryError($stmt){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function chkssid(){
  if(!isset($_SESSION["chk_ssid"]) ||
  $_SESSION["chk_ssid"] != session_id()
){
  exit("Login error.");
}
}


?>
