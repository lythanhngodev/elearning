<?php 
	if (isset($_GET["p"]) && !empty($_GET["p"])) {
		switch ($_GET["p"]) {
			case 'khoahoc':
				include_once("control/ctrl_khoa_hoc.php");
				break;
			case 'baigiang':
				include_once("control/ctrl_bai_giang.php");
				break;
			case 'toanbosinhvien':
				include_once("control/ctrl_toan_bo_sinh_vien.php");
				break;
			default:
				# code...
				break;
		}
	}
	else
		include_once("control/ctrl_trang_chu.php");
 ?>