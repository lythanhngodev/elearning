<?php
	session_start();
	include_once("model/md_login.php");
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!el_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: ".$elearning['HOST']."/login.php");
			//'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
		}
	}
	else
		header("Location: login.php");
	/*if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
	    // last request was more than 30 minutes ago
	    session_unset();     // unset $_SESSION variable for the run-time 
	    session_destroy();   // destroy session data in storage
	}*/
	$_SESSION['LAST_ACTIVITY'] = time();
	$ketnoi = new clsKetnoi();
	$hoi_user = "SELECT gv.IDGV, gv.LOAITAIKHOAN FROM login_gv lg, giaovien gv WHERE lg.IDGV = gv.IDGV AND gv.TrangThai = b'0' AND (BINARY `TenDangNhap` = '".$_SESSION['username']."') AND `MatKhau` = '".$_SESSION['password']."'";
	$thucthi_user = mysqli_query($ketnoi->ketnoi(), $hoi_user);
	$row_user = mysqli_fetch_assoc($thucthi_user);
	$idofgv = $row_user['IDGV'];
	$loaitk = $row_user['LOAITAIKHOAN'];
	/*$manv = $row_user['MaNV'];
	$tennv = $row_user['TenNV'];
	$tendn = $row_user['TenDangNhap'];
	$diachi = $row_user['DiaChiNV'];
	$mail = $row_user['Mail'];
	$hspc = $row_user['HeSoPhuCap'];*/
 ?>
