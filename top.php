<?php 
session_start();
require('dbconnect.php');
$_SESSION['login_member_id']=1;

$sql='SELECT * FROM `members` WHERE `member_id`=?';
$data = array($_SESSION['login_member_id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);
$members = $stmt->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($members);
echo '</pre>';

$sql='SELECT * FROM `diary` WHERE `user_id`=?';
$data = array($_SESSION['login_member_id']);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);
// $diarys = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">
<head >
  <meta charset="utf-8">
  <title></title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/abc.css">

</head>
<body>


<!-- ヘッター -->
  <div class="name">NexSeed Diary
  </div>

  <div class="container">
    <div class="row">

<!-- 左サイドバー -->
      <div class="diary col-xs-3">

        <div class="hello">
        <p>
          <?php 
          if (date("H") >= 6 and date("H") <= 11) {
            echo "おはようございます\n";
          } elseif (date("H") > 11 and date("H") < 18) {
            echo "こんにちは\n";
          } else {
            echo "こんばんは\n";}?>
          <?php echo $members['nick_name']; ?>さん</div>
         
           <!-- 今月 -->
          <a class="month"><?php echo date('Y年m月'); ?></a><br>

           <!-- 先月 -->
          <a class="month"><?php echo date('Y年m月', strtotime(date('Y-m-1').' -1 month')); ?></a><br>

           <!-- 2ヶ月前 -->
          <a class="month"><? echo date('Y年m月', strtotime(date('Y-m-1').' -2 month')); ?></a><br>
        </p>
        <a href="newdiary/newdiary.php">日記新規登録</a>
      </div>


<!-- メイン -->
      <?php while ($diarys = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

      <div class="col-xs-9 ">
        <div class="main">
          <a class="moji"><?php echo $diarys['title']; ?></a>
          <p><?php echo $diarys['created']; ?></p>
        </div>
      </div>
     <?php endwhile; ?>
    </div>  <!-- row-->
  </div>

<!-- フッター -->
      <div class="footer">Copyright &copy; NexSeed inc All Rights Reserved.</div>






</div>  <!-- conrainer-->


</body>
</html>