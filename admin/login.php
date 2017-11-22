<?php include_once("config.php"); ?>
<?php
	include_once("model/md_login.php");
	if (isset($_POST['username']) && isset($_POST['password'])) {
		if(el_login($_POST['username'],$_POST['password'])){
			session_start();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['LAST_ACTIVITY'] = time();
			header("Location: index.php");
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $elearning['HOST']; ?>/" />
	<link href="../css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
  	<script src="../js/jquery-3.2.1.min.js"></script>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
	<!--//webfonts-->
</head>
<body style="background: #ececec;">
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Người dùng đăng nhập</h1>
				<div class="head">
					<img src="images/user.png" alt=""/>
				</div>
				<form href="" method="post">
						<input type="text" class="text nutnhap" name="username" value="" placeholder="tên đăng nhập" >
						<input type="password" class="nutnhap" value="" name="password" placeholder="mật khẩu">
						<div class="submit">
							<input type="submit" value="ĐĂNG NHẬP" >
					</div>	
					<p><a href="#">Quên mật khẩu?</a></p>
				</form>
		</div>
	</div>
</body>
</html>