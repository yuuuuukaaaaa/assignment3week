<?php 
session_start();
require('../dbconnect.php');
$_SESSION['login_member_id']=1;

if (!isset($_SESSION['Diary'])) {
  header('Location:newdiary.php');
  exit();
}

//登録ボタンが押された時
if (!empty($_POST)) {
  // $diary_id = $_SESSION['Diary']['diary_id'];
  // $user_id = $_SESSION['Diary']['user_id'];
  $title = $_SESSION['Diary']['title'];
  $contents = $_SESSION['Diary']['contents'];

    try{
      $sql = 'INSERT INTO `Diary` SET `diary_id`=?,`user_id`=?,`title`=?,`contents`=?, `created`=NOW()';
      $data = array($diary_id,$_SESSION['login_member_id'],$title,$contents);
      $stmt = $dbh->prepare($sql);
      $stmt->execute($data);

      unset($_SESSION['Diary']);

      header('Location: thanks.php');
      exit();

    } catch(PDOExceptopn $e){
      echo 'SQL文実行時エラー:' . $e->getMessage();
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
      タイトル<br>
    <?php echo $_SESSION['Diary']['title']; ?>
    <p>日記</p>
    <?php echo $_SESSION['Diary']['contents']; ?>
    <br>
    <input type="hidden" name="hoge" value="fuga">
    <input type="submit" value="登録">
  </form>
</body>
</html>