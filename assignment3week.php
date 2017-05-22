<?php 
session_start();
require('dbconnect.php');

// $_SESSION['page'] = 1;

// // ページング機能
// $page = '';
// // パラメータのページ番号を取得
// if (isset($_REQUEST['page'])) {
//   $page = $_REQUEST['page'];
// }

// // パラメーターが存在しない場合はページ番号を1とする
// if ($page == '') {
//   $page = 1;
// }
// // 1以下のイレギュラーな数値が入ってきた場合はページ番号を1とする
// $page = max($page, 1);

// // データの件数から最大ページ数を計算する
// $sql = 'SELECT count(*) AS `cnt` FROM `title`';
// $data = array();
// $stmt = $dbh->prepare($sql);

// $stmt->execute();
// $record = $stmt->fetch(PDO::FETCH_ASSOC);
// $max_page = ceil($record['cnt'] / 5); // 小数点以下切り上げ

// // 取得データ件数が0だったら、ページ数を1にする（検索対応）
// if ($max_page == 0) {
//   $max_page = 1;
// }

// // パラメータのベージ番号が最大ページ数を超えていれば、最後のページ数とする
// $page = min($page, $max_page);

// // 1ページに表示する件数分だけデータを取得する
// $page = ceil($page);
// $start = ($page-1) * 5;



// $stmt = $dbh->prepare($sql);
// $stmt->execute();

//空の配列を定義
$posts = array();

// while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
//   // whileの外に用意した配列に入れる
//   $posts[] = $record;
//   // 配列名の後に[]をつけると最後の段を指定する]
// }

// // 縦書きにする関数
// function tateGaki($title) {
//   $matches = preg_split("//u", $title, -1, PREG_SPLIT_NO_EMPTY);
//   $v_title = '';
//   foreach ($matches as $letter) {
//     $v_title .= $letter . "<br>";
//   }
//   return rtrim($v_title, "<br>");
// }
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
          、ゲストさん</div>
         
           <!-- 今月 -->
          <a class="month"><?php echo date('Y年m月'); ?></a><br>

           <!-- 先月 -->
          <a class="month"><?php echo date('Y年m月', strtotime(date('Y-m-1').' -1 month')); ?></a><br>

           <!-- 2ヶ月前 -->
          <a class="month"><? echo date('Y年m月', strtotime(date('Y-m-1').' -2 month')); ?></a><br>
        </p>
      </div>


<!-- メイン -->
      <div class="col-xs-9">
        <div class="main">
                    <!-- 繰り返し処理 -->
          <?php  ($_SESSIONS as $_SESSION)  ?>

            <!-- パラメーター設定 -->
            <?php $member_id = $_SESSION['member_id'] ?>
            <?php $nick_name = $_SESSION['nick_name'] ?>
            <?php $user_picture_path = $_SESSION['user_picture_path'] ?>
            <?php $created = $_SESSION['created'] ?>
            <?php $title = $_SESSION['title'] ?>
            <?php $contents = $_SESSION['contents'] ?>
 

            <?php
              // Diaryの取得
              $sql = 'SELECT * FROM `members` LEFT JOIN `diary` ON members.member_id=diary.user_id';
                // WHERE `member_id`=? ORDER BY c.created DESC'
              $data = array($member_id);
              $stmt = $dbh->prepare($sql);
              $stmt->execute($data);

              // 空の配列を定義
              $title = array();

              while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // whileの外に用意した配列に入れる
                $comments[] = $record;
                // 配列名の後に[]をつけると最後の段を指定する]
              }

              // コメント件数の取得
              $num_comment = count($comments);
            ?>
          <a class="moji.php?user_id=><?php echo $title ?>"></a>
          <p><?php echo $created ?></p>
        </div>
        <div class="main">
          <a class="moji">こんにちは</a>
          <p>2016年10月10日</p>
        </div>
        <div class="main">
          <a class="moji">こんにちは</a>
          <p>2016年10月10日</p>
        </div>
        <div class="main">
          <a class="moji">こんにちは</a>
          <p>2016年10月10日</p>
        </div>
        <div class="main">
          <a class="moji">こんにちは</a>
          <p>2016年10月10日</p>
        </div>
        <div class="main">
          <a class="moji">こんにちは</a>
          <p>2016年10月10日</p>
        </div>
        <div class="main">
          <a class="moji">こんにちは</a>
          <p>2016年10月10日</p>
        </div>



       </div>
    </div>  <!-- row-->
  </div>

<!-- フッター -->
      <div class="footer">Copyright &copy; NexSeed inc All Rights Reserved.</div>






</div>  <!-- conrainer-->


</body>
</html>