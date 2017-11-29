<?php 
if (isset($_GET["p"]) && !empty($_GET["p"])) {
	switch ($_GET["p"]) {
		case 'chi-tiet-khoa-hoc':
			require 'model/md_chi_tiet_khoa_hoc.php';
			$id = $_GET['id'];
			settype($id, 'int');
			$khoahoc = el_get_chi_tiet_khoa_hoc($id);
			$row = mysqli_fetch_array($khoahoc);
			$khoahockhac = el_get_khoa_hoc($id);
			require 'block/chi-tiet-khoa-hoc.php';
			break;
		
		default:
			require 'model/md_trangchu.php';
			$dulieu = el_get_khoa_hoc();
			require 'block/trangchu.php';
			break;
	}
}
else{
	
	require 'model/md_trangchu.php';
	$dulieu = el_get_khoa_hoc();
	$dulieu_all = el_get_all_khoa_hoc();
	require 'block/trangchu.php';
}
?>