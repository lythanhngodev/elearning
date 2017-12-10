<?php 
	if (isset($_GET["p"]) && !empty($_GET["p"])) {
		switch ($_GET["p"]) {
			case 'giaovien':
				include_once("control/ctrl_giao_vien.php");
				break;
			case 'diem':
				include_once("control/ctrl_diem.php");
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
			case 'lichnhapdiem':
				include_once("control/ctrl_lich_nhap_diem.php");
				break;
			case 'toanbosinhvien':
				include_once("control/ctrl_toan_bo_sinh_vien.php");
				break;
			case 'exsinhvienkhoahoc':
				include_once("control/ctrl_du_lieu_sinh_vien_khoa_hoc.php");
				break;
			case 'exketquakhongdat':
				include_once("control/ctrl_du_lieu_sinh_vien_khong_dat_khoa_hoc.php");
				break;
			case 'exketquadat':
				include_once("control/ctrl_du_lieu_sinh_vien_dat_khoa_hoc.php");
				break;
			case 'ketquahoctap':
				include_once("control/ctrl_du_lieu_ket_qua_hoc_tap.php");
				break;
			case 'top5':
				include_once("control/ctrl_du_lieu_top_5.php");
				break;
			case 'profile':
				include_once("control/ctrl_profile.php");
				break;
			default:
				# code...
				break;
		}
	}
	else
		include_once("control/ctrl_trang_chu.php");
 ?>