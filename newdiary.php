<?php 
session_start();
require('dbconnectphp');

     //DBへの登録処理
         $sql = 'INSERT INTO `diary` SET `title`=?,`coments`=?,`user_id`=?,`created`=NOW()';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form   <form method="POST" action="index.php">
      タイトル<br>
    <input type="newdiary" name="newdiary">
    <p>新規入力画面</p>
    <textarea name="content" cols="40" rows="5"></textarea>
    <br>
    <input type="submit" value="登録">
  </form>
</body>
</html>
