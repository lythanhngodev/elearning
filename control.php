<?php 
if (isset($_GET["p"]) && !empty($_GET["p"])) {
	switch ($_GET["p"]) {
		case 'chi-tiet-lich-thi':
			$id = 0;
			if (!isset($_GET['id'])) {
				echo "<h1>404 NOT FOUND !</h1><br><a href><< Quay lại trang chủ</a>";
				exit();
			}
			$id = $_GET['id'];
			require 'model/md_chi_tiet_lich_thi.php';
			$chitiet = el_chi_tiet_lich_thi($id);
			$row = mysqli_fetch_array($chitiet);
			$ltlq = el_lich_thi_lien_quan($id);
			$dem = mysqli_num_rows($chitiet);
			if ($dem==0) {
				echo "<h1>404 NOT FOUND !</h1><br><a href><< Quay lại trang chủ</a>";
				exit();
			}
			require 'block/chi-tiet-lich-thi.php';
			break;
		case 'lich-thi':
			require 'model/md_lich_thi.php';
			$dulieu = el_lich_thi();
			require 'block/lich-thi.php';
			break;
		case 'noi-dung-khoa-hoc':
			$id = 0;
			if (!isset($_GET['id'])) {
				echo "<h1>404 NOT FOUND !</h1><br><a href><< Quay lại trang chủ</a>";
				exit();
			}
			$id = $_GET['id'];
			require 'model/md_noi_dung_khoa_hoc.php';
			if (!el_check_sv_dk_kh($idofsv,$id)) {
				echo "Bạn không có quyền truy cập trang này!<br><a href><< Quay lại trang chủ</a>";
				exit();
			}
			$baihoc = el_danh_sach_bai_hoc($idofsv,$id);
			$dem = mysqli_num_rows($baihoc);
			if ($dem==0) {
				echo "<h1>Hiện chưa có bài học!</h1><br><a href><< Quay lại trang chủ</a>";
				exit();
			}
			$top1 = el_danh_sach_bai_hoc_top_1($idofsv,$id);
			$row_top_1 = mysqli_fetch_array($top1);
			require 'block/noi-dung-khoa-hoc.php';
			break;
		case 'chi-tiet-khoa-hoc':
			require 'model/md_chi_tiet_khoa_hoc.php';
			$id = $_GET['id'];
			settype($id, 'int');
			$khoahoc = el_get_chi_tiet_khoa_hoc($id);
			$row = mysqli_fetch_array($khoahoc);
			$khoahockhac = el_get_khoa_hoc($id);
			$danhsachbaihoc = el_get_danh_sach_bai_hoc($id);
			$giaovien = el_thong_tin_giao_vien($id);
			$rowgv = mysqli_fetch_array($giaovien);
			require 'block/chi-tiet-khoa-hoc.php';
			break;
		
		default:
			require 'model/md_trangchu.php';
			$dulieu = el_get_khoa_hoc();
			$dulieu_all = el_get_all_khoa_hoc();
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