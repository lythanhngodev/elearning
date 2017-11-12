<?php
	session_start();
	include_once("model/md_login.php");
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!el_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: login.php");
			//'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
		}
	}
	else
		header("Location: login.php");
	/*$ketnoi = new clsKetnoi();
	$hoi_user = "SELECT * FROM `nhanvien` WHERE BINARY `TenDangNhap` = '".$_SESSION['username']."' and `MatKhau` = '".md5($_SESSION['password'])."' and trangthainv='1'";
	$thucthi_user = mysqli_query($ketnoi->ketnoi(), $hoi_user);
	$row_user = mysqli_fetch_assoc($thucthi_user);
	$id = $row_user['Id'];
	$manv = $row_user['MaNV'];
	$tennv = $row_user['TenNV'];
	$tendn = $row_user['TenDangNhap'];
	$diachi = $row_user['DiaChiNV'];
	$mail = $row_user['Mail'];
	$hspc = $row_user['HeSoPhuCap'];*/
 ?>
