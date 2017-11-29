<?php 
	require 'admin/config.php';
	$dangnhap = false;
	session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>VLUTE | Elearning</title>
	<base href="<?php echo $elearning['HOSTCON']; ?>/" />
	<script type="text/javascript" src="1libs/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="1libs/boostrap/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="1libs/boostrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="1libs/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="1libs/themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="1libs/breadscrums.css">
	<link rel="stylesheet" type="text/css" href="public/css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="1libs/datetimepicker/build/jquery.datetimepicker.min.css">
	<link rel="stylesheet" href="public/css/chi-tiet-khoa-hoc.css">
	<link rel="stylesheet" type="text/css" href="public/css/thong-tin-ca-nhan.css">
	<link rel="stylesheet" type="text/css" href="public/css/thiet-lap-tai-khoan.css">
	<link rel="stylesheet" type="text/css" href="public/css/khoa-hoc.css">
	<link rel="stylesheet" type="text/css" href="public/css/lich-thi.css">
	<link rel="stylesheet" type="text/css" href="public/css/chi-tiet-lich-thi.css">
</head>
<body>
<!-- BEGIN HEADER -->
<header>
	<?php require ('block/header.php') ?>	
</header> <!-- END HEADER -->

<div class="bar-shadow"></div> 
<!-- CONTENT -->
<div class="container">
	<?php require 'control.php'; ?>
	<!--  -->
</div> <!-- END CONTENT -->

<!-- BEGIN FOOTER -->
<footer>
	<?php require 'block/footer.php' ?>
</footer> <!-- END FOOTER -->
</body>
</html>
<!-- LOAD JS  -->
<script type="text/javascript" src="1libs/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="public/js/function.js"></script>
<script src="nonti/bootstrap-notify.min.js"></script>
