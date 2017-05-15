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