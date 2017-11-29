<?php 
if (isset($_GET["p"]) && !empty($_GET["p"])) {
	switch ($_GET["p"]) {
		case 'chi-tiet-khoa-hoc':
			//require '../modal/md_trangchu.php';
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