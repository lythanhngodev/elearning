<?php 
	session_start();
	session_destroy();
	include_once("config.php");
	header("Location: ".$elearning['HOST']."/login.php");
 ?>