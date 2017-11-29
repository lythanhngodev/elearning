<?php 
	include_once("admin/config.php");
	include_once("model/md_login.php");
	if (isset($_POST['usernamedn']) && isset($_POST['passworddn'])) {
		if(el_login($_POST['usernamedn'],$_POST['passworddn'])){
			session_start();
			$_SESSION['use'] = $_POST['usernamedn'];
			$_SESSION['pase'] = $_POST['passworddn'];
			header("Location: http://localhost/elearning");
		}
		else{
			header("Location: http://localhost/elearning");
		}
	}
	else{
		header("Location: http://localhost/elearning");
	}
 ?>