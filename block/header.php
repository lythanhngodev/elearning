<div class="container">
		<div class="header-top">
			<div class="row">
				<div class="col-2 logo-cang-le">
					<a href="" class="logo"><img src="../img/logovlute.png" class="logoVLUTE"></a>
				</div>
				<div class="col-10">
					<h2>TRƯỜNG ĐẠI HỌC SƯ PHẠM KỸ THUẬT VĨNH LONG</h2>
					<h3>ELEARNING - VLUTE</h3>
				</div>
			</div>
		</div>
	</div> <!--  END HEADER-TOP -->
	<nav class="navbar navbar-light menu">
		<div class="container">
			<div class="menu-top">
				<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2"></button>
				<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
				 <ul class="nav navbar-nav">
				   <li class="nav-item active">
				     <a class="nav-link" href="#">Danh sách khóa học</a>
				   <li class="nav-item ">
				     <a class="nav-link" href="#">Lịch khai giảng</a>
				   </li>
				   <li class="nav-item ">
				     <a class="nav-link" href="#">Lịch thi</a>
				   </li>
				    <li class="nav-item ">
				     <a class="nav-link" href="#">Hỗ trợ</a>
				   </li>
				   <?php
			   	 	if (!isset($_SESSION['use'])||!isset($_SESSION['pase'])){ ?>
					   <li class="nav-item icon-dangnhap">
					     <a class="nav-link" href="#modalLogin" id="btn-dang-nhap"><i class="fa fa-user-circle"></i></a>
					     <!-- BEGIN MODAL CHƯA LOGIN -->
							<?php require 'modal-login.php' ?>
					   </li>
				   <?php } else{ ?>
					   <li class="nav-item icon-dangnhap">
					     <a class="nav-link" href="#modalLogin" id="btn-thong-tin-ca-nhan" style="background: url('../img/tq.jpg');  background-size: cover;"></a>
					     <!-- BEGIN MODAL ĐÃ LOGIN -->
							<?php $dangnhap=true;require 'info.php' ?>
					   </li>
				   	<?php } ?>
				 </ul>
				</div>
			</div>
		</div> <!-- END MENU-TOP
	</nav>	<!-- END MENU -->