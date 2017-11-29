<?php 
	include_once("model/md_bai_giang.php");
	$khoahoc = el_get_khoa_hoc_cua_giao_vien($idofgv);
	$baigiang = el_get_tat_ca_bai_giang($idofgv);
	include_once("view/vw_bai_giang.php");
 ?>