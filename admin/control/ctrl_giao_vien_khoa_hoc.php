<?php 
	include_once("model/md_giao_vien_khoa_hoc.php");
	$dulieu = el_get_sinh_vien_khoa_hoc();
	$sinhvien = el_get_giao_vien();
	$khoahoc = el_get_khoa_hoc();
	include_once("view/vw_giao_vien_khoa_hoc.php");
 ?>