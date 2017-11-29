<?php 
	if (isset($_GET["p"]) && !empty($_GET["p"])) {
		switch ($_GET["p"]) {
			case 'giaovien':
				include_once("control/ctrl_giao_vien.php");
				break;
			case 'giaovienkhoahoc':
				include_once("control/ctrl_giao_vien_khoa_hoc.php");
				break;
			case 'sinhvienkhoahoc':
				include_once("control/ctrl_sinh_vien_khoa_hoc.php");
				break;
			case 'khoahoc':
				include_once("control/ctrl_khoa_hoc.php");
				break;
			case 'baigiang':
				include_once("control/ctrl_bai_giang.php");
				break;
			case 'lichthi':
				include_once("control/ctrl_lich_thi.php");
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