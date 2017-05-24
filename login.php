<?php
session_start();
require('dbconnect.php');

$email = '';
$password = '';
  
$errors = array();
  
// 自動ログイン機能
if (isset($_COOKIE['email']) && $_COOKIE['email'] != '') {
    // クッキーが保存されていれば、$_POSTをクッキーの情報から生成
    $_POST['email'] = $_COOKIE['email'];
    $_POST['password'] = $_COOKIE['password'];
    $_POST['save'] = 'on';
}

  // ログインボタンが押されたとき
  if (!empty($_POST)) {
      $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email != '' && $password != '') {
        // 入力されたメールアドレスとパスワードの組み合わせがデータベースに登録されているかチェック
        $sql = 'SELECT * FROM `members` WHERE `email`=? AND `password`=?';
        $data = array($email, sha1($password));
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data); // データが1件か0件か
 
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
 
        if ($record == false) {
            // そうでなければエラーメッセージ
            // echo 'ログイン処理失敗';
            $errors['login'] = 'failed';
        } else {
            // されていればログイン処理
              // echo 'ログイン処理成功';
              $_SESSION['login_member_id'] = $record['member_id'];
              $_SESSION['time'] = time();

            // 自動ログイン設定
            if ($_POST['save'] == 'on') {
                // クッキーにログイン情報を保存
                setcookie('email', $email, time() + 60*60*24*30);
                setcookie('password', $password, time() + 60*60*24*30);
                // setcookie(キー, 値, 保存期間);
                // $_COOKIE['キー'] → 値
            }

              // ログインした際の時間をセッションに保存
              header('Location: top.php');
              exit();
        }
    } else {
        // 入力フォームが空だった場合の処理
        $errors['login'] = 'blank';
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <h1>ログイン</h1>
  <form method="POST" action="">
    <div>
      <label>メールアドレス</label><br>
      <input type="email" name="email" value="<?php echo $email; ?>">
      <?php if(isset($errors['login']) && $errors['login'] == 'blank'): ?> <!-- コロン構文 -->
        <p style="color: red; font-size: 10px; margin-top: 2px;">
          メールアドレスとパスワードを入力してください
        </p>
      <?php endif; ?>
 
      <?php if(isset($errors['login']) && $errors['login'] == 'failed'): ?> <!-- コロン構文 -->
        <p style="color: red; font-size: 10px; margin-top: 2px;">
          ログインに失敗しました。再度正しい情報でログインしてください
        </p>
      <?php endif; ?>
    </div>
    <div>
        <label>パスワード</label><br>
        <input type="password" name="password" value="<?php echo $password; ?>">
      </div>
    <div>
      自動ログイン設定 <input type="checkbox" name="save" value="on">
      <!-- $_POST['save'] = 'on'; -->
    </div>
      
      <input type="submit" value="ログイン">
    </form>
</body>
</html>
