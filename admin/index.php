<?php include_once("config.php");
	  include_once("check_login.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>VLUTE Elearning</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $elearning['HOST']; ?>">
  	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap-select.min.css">
	<link href="../css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<script src="../js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" style="border: none;">
	  <div class="container-fluid" style="border-bottom: 1px solid #e7e7e7;">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#"><b>VLUTE Elearning</b></a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li id="trangchu"><a href="#">Trang chủ</a></li>
	      <?php 
	      // tài khoản admin cao nhất
	      if ($loaitk == 1) { ?>
	      <li id="giaovien"><a href="?p=giaovien">Giảng viên</a></li>
	      <li id="giaovienkhoahoc"><a href="?p=giaovienkhoahoc">Phân công giảng dạy</a></li>
	      <li class="dropdown" id="toanbosinhvien">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sinh viên
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu" style="box-shadow: none;border: 1px solid #e8e8e8;">
	          <li id="tbsv"><a href="?p=toanbosinhvien">Toàn bộ sinh viên</a></li>
	          <li id="svkh"><a href="?p=sinhvienkhoahoc">Sinh viên - Khóa học</a></li>
	        </ul>
	      </li>
	      <li id="khoahoc"><a href="?p=khoahoc">Khóa học</a></li>
	      <li id="lichnhapdiem"><a href="?p=lichnhapdiem">Lịch nhập điểm</a></li>
	      <li id="lichthi"><a href="?p=lichthi">Thông báo</a></li>
	      <li class="dropdown" id="thongke">
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Thống kê
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu" style="box-shadow: none;border: 1px solid #e8e8e8;">
	          <!--<li><a href="?p=toanbosinhvien">Toàn bộ sinh viên</a></li>-->
	          <li id="ex-sv-kh"><a href="?p=exsinhvienkhoahoc">Sinh viên - Khóa học</a></li>
	          <li id="kqht"><a href="?p=ketquahoctap">Kết quả học tập</a></li>
	          <li id="ex-kq-d"><a href="?p=exketquadat">Sinh viên có kết quả đạt</a></li>
	          <li id="ex-kq-kd"><a href="?p=exketquakhongdat">Sinh viên có kết quả không đạt</a></li>
	          <li id="top-5"><a href="?p=top5">Top 5 sinh viên - Khóa học</a></li>
	        </ul>
	      </li>
	      <?php } ?>
	      <?php if ($loaitk == 2) { ?>
	      <li id="baigiang"><a href="?p=baigiang">Bài giảng</a></li>
		  <li id="diem"><a href="?p=diem">Điểm</a></li>
	       <?php } ?>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown" id="quanlythongtin">
	          <a class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Thông tin<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="?p=profile">Sửa thông tin</a></li>
	            <li><a href="logout.php">Đăng xuất</a></li>
	          </ul>
	        </li>
	    </ul>
	  </div>
	</nav>
	<div id="khung-trang-admin" class="container" style="width: 99%;">
	  <?php 
	    include_once("public_control.php");
	   ?>
	</div>
</body>
</html>
<script src="nonti/bootstrap-notify.min.js"></script>