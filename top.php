<?php 
session_start();
require('dbconnect.php');

if (isset($_SESSION['login_member_id'])) {
    $sql='SELECT * FROM `members` WHERE `member_id`=?';
    $data = array($_SESSION['login_member_id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $members = $stmt->fetch(PDO::FETCH_ASSOC);
}
$diary = '';


if (!empty($_POST)) {  // SQL 順番は削除 → 取得の順番
    $sql = 'DELETE FROM `diary` WHERE `diary_id`=?';
    $data = array($_REQUEST['diary_id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
}

$diary_sql='SELECT * FROM `diary` WHERE `user_id`=? ORDER BY `created` DESC';
$diary_data = array($_SESSION['login_member_id']);
$stmt = $dbh->prepare($diary_sql);
$stmt->execute($diary_data);

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
            <?php echo $members['nick_name']; ?>さん
          </p>
        </div>
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
      <div class="col-xs-9">
        <?php while ($diary = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="main">
          <form method="POST" action="">
            <p><?php echo $diary['title']; ?></p>
            <p><?php echo $diary['created']; ?></p>

           <!--  <input type="button" value="削除" onClick="deleteConfirm('$diary_id')"> -->
            <div id="deleteConfirmMessage"/>
            <a href="" onClick="return confirm('削除します。\nよろしいですか？');"><input type="submit" value="削除"></a>
            <input type="hidden" name="diary_id" value="<?php echo $diary['diary_id']; ?>">
            </div>
          </form>
        </div>
        <?php endwhile; ?>
      </div>
    </div>

<!-- フッター -->
    <div class="footer">Copyright &copy; NexSeed inc All Rights Reserved.</div>
  </div>  <!-- conrainer-->

<script type="text/javascript">
  
</script>
</body>
</html>













