<?php
if(isset($_POST['login']) && !empty($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($email) or !empty($password)) {

    $email = $getFromU->checkInput($email);
    $password = $getFromU->checkInput($password);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = '無効な形式です。';
    } else {
      if($getFromU->login($email,$password) === false) {
        $error = "メールアドレス又はパスワードが間違っています。";
      }
    }

  } else {
    $error = 'ユーザー名とパスワードを入力してください。';
  }
}
?>
<div class="login-div">
<form method="post">
	<ul>
		<li>
		  <input type="text" name="email" placeholder="メールアドレス"/>
		</li>
		<li>
		  <input type="password" name="password" placeholder="パスワード"/><input type="submit" name="login" value="ログイン"/>
		</li>
		<li>
		  <input type="checkbox" Value="Remember me">保存する
		</li>
<?php
if(isset($error)) {
  echo "<li class='error-li'>
        <div class='span-fp-error'>{$error}</div>
      </li>";
  }
?>
	</ul>
	</form>
</div>
