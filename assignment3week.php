<?php 

if (date("H") >= 6 and date("H") <= 11) {
  echo "<p>おはようございます。</p>\n";
} elseif (date("H") >= 12 and date("H") <= 17) {
  echo "<p>こんにちは。</p>\n";
} else {
  echo "<p>こんばんは。</p>\n";
}

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
        <div class="hello">こんにちは、ゲストさん</div>
        <p>
          <a class="month">2016年10月の日記</a><br>
          <a class="month">2016年11月の日記</a><br>
          <a class="month">2016年12月の日記</a><br>
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