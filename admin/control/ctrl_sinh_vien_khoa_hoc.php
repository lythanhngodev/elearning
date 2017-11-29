<?php 
	include_once("model/md_sinh_vien_khoa_hoc.php");
	$sinhvien = el_get_sinh_vien(); // chưa xác nhận
	$sinhvien_1 = el_get_sinh_vien_1(); // đã xác nhận
	$khoahoc = el_get_khoa_hoc();
	include_once("view/vw_sinh_vien_khoa_hoc.php");
 ?>