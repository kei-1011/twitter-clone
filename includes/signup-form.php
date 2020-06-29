<?php
if(isset($_POST['signup'])) {
  $screenName = $_POST['screenName'];
  $password   = $_POST['password'];
  $email      = $_POST['email'];
  $error      = '';

  if(empty($screenName) or empty($password) or empty($email)) {
    $error = '全てのフィールドは必須です。';
  } else {
    $email = $getFromU->checkInput($email);
    if(!filter_var($email)){
      $error = 'メールアドレスの形式で入力してください。';
    } else if(strlen($screenName) > 20 ) {
      $error = '名前は20文字以内で入力してください。';
    } else if(strlen($password) < 5) {
      $error = 'パスワードは５文字以上で入力してください。';
    } else {
      if($getFromU->checkEmail($email) === true) {
        $error = 'このメールアドレスは既に使用されています。';
      } else {
        $getFromU->create('users', array(
          'username' => 'kou',
          'email' => $email,
          'password' => md5($password),
          'screenName' => $screenName,
          'profileImage' => '/assets/images/defaultProfileImage.png',
          'profileCover' => '/assets/images/defaultCoverImage.png',
          'following' => '0',
          'follower' => '0',
          'bio' => '',
          'country' => '',
          'website' => '',
        ));
        header('Location: includes/signup.php?step=1');
      }
    }
  }
}
?>
<form method="post">
<div class="signup-div">
	<h3>サインアップ</h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="ユーザー名"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="メールアドレス"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="パスワード"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="サインアップ">
		</li>
    <?php
    if(isset($error)) {
      echo "
      <li class='error-li'>
      <div class='span-fp-error'>{$error}</div>
      </li>";
    }
    ?>
	</ul>

</div>
</form>
