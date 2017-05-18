<?php 
require('dbconnect.php');
require('funvtion.php');

//日記データの取得
$sql = 'SELECT * FROM `diary` WHERE `title` , `coments` , 'created';
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