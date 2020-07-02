<?php
include '../core/init.php';
// セッションに格納、　ログイン中のユーザーデータを取得
$user_id  = $_SESSION['user_id'];
$user     = $getFromU->userData($user_id);

if(isset($_GET['step']) === true && empty($_GET['step'] === false )) {
  if(isset($_POST['next'])) {
    $username = $getFromU->checkInput($_POST['username']);

    if(!empty($username)) {

      if(strlen($username) > 20 ) {
        $error = 'Username must be between in 6-20 choose';
      } else if($getFromU->checkUsername($username) === true) {
        $error = 'Username is already teken';
      } else {
        $getFromU->update('users',$user_id,array('username' => $username));
        header('Location: signup.php?step=2');
      }

    } else {
      $error = 'Please enter your username to choose';
    }
  }
  ?>
<!doctype html>
<html>
	<head>
		<title>twitter</title>
		<meta charset="UTF-8" />
 		<link rel="stylesheet" href="assets/css/font/css/font-awesome.css"/>
		<link rel="stylesheet" href="../assets/css/style-complete.css"/>
	</head>
	<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- nav wrapper -->
<div class="nav-wrapper">

	<div class="nav-container">
		<div class="nav-second">
			<ul>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div><!-- nav second ends-->
	</div><!-- nav container ends -->

</div><!-- nav wrapper end -->

<!---Inner wrapper-->
<div class="inner-wrapper">
	<!-- main container -->
	<div class="main-container">
		<!-- step wrapper-->

    <?php if($_GET['step'] === '1') : ?>
 		<div class="step-wrapper">
		    <div class="step-container">
				<form method="post">
					<h2>ユーザー名を入力してください。</h2>
					<h4>後から変更が可能です。</h4>
					<div>
						<input type="text" name="username" placeholder="Username"/>
					</div>
					<div>
						<ul>
						  <li><?php if(isset($error)){ echo $error;}?></li>
						</ul>
					</div>
					<div>
						<input type="submit" name="next" value="Next"/>
					</div>
				 </form>
			</div>
		</div>
    <?php endif; ?>

    <?php if($_GET['step'] === '2') : ?>
      <div class='lets-wrapper'>
        <div class='step-letsgo'>
          <h2>ようこそ、 <?php echo $user->screenName;?>さん！</h2>
          <p>Tweetyは、クールで最も重要なニュース、メディア、スポーツ、テレビ、会話など、あなたのためだけに作られたストリームを常に更新しています。</p>
          <br/>
          <p>
          お好きなものを教えていただければ、セットアップのお手伝いをさせていただきます。
          </p>
          <span>
            <a href='../home.php' class='backButton'>Let's go!</a>
          </span>
        </div>
      </div>
    <?php endif; ?>

	</div><!-- main container end -->

</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->

</body>
</html>

<?php
}
