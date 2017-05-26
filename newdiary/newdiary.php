<?php 
session_start();
require('../dbconnect.php');

$_SESSION['login_member_id'] = 1;

$title = '';
$contents = '';

$errors = array();
//確認ボタンが押された時
if (!empty($_POST)){
    $title = $_POST['title'];
    $contents = $_POST['contents'];

    if ($title == ''){
      $errors['title'] = '空';
    }
    if($contents == ''){
      $errors = '空';
    }
    if(empty($errors)){
      $_SESSION['Diary'] = $_POST;
      header('Location: check.php');
      exit();
    }
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form method="POST" action="">
    <p>タイトル</p>
    <input type="newdiary" name="title" value="<?php echo $title; ?>">
    <p>日記</p>
    <textarea name="contents" cols="40" rows="5" value="<?php echo $contents; ?>"></textarea>
    <br>
    <input type="submit" value="確認">
  </form>
</body>
</html>
