<?php include_once("config.php");
	  include_once("check_login.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $elearning['HOST']; ?>/" />
  	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
  	<script src="../js/jquery-3.2.1.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap-select.min.css">
	<link href="../css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<script type="text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
	<link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default" style="border: none;">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">VLUTE Elearning</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Trang chủ</a></li>
		  <li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Quản lý sinh viên
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu" style="box-shadow: none;border: 1px solid #e8e8e8;">
	          <li><a href="#">Toàn bộ sinh viên</a></li>
	          <li><a href="#">Sinh viên theo học kỳ năm học</a></li>
	          <li><a href="#">Sinh viên theo lớp</a></li>
	        </ul>
	      </li>
	      <li><a href="#">Học kỳ - Năm học</a></li>
	      <li><a href="#">Bài học</a></li>
		  <li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Điểm
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu" style="box-shadow: none;border: 1px solid #e8e8e8;">
	          <li><a href="#">Điểm theo môn học</a></li>
	          <li><a href="#">Điểm theo môn học</a></li>
	        </ul>
	      </li>
	      <li><a href="#">Thống kê</a></li>
	    </ul>
		<ul class="nav navbar-nav navbar-right">
	      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Tài khoản</a></li>
	    </ul>
	  </div>
	</nav>
</body>
</html>
<script src="nonti/bootstrap-notify.min.js"></script>