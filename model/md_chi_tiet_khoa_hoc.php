<?php 
	include_once("admin/config.php");
	function el_get_chi_tiet_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH, kh.TENKH, kh.MOTAKH, kh.LUOTXEM, kh.MOTACTKH, gv.TENGV, gv.HINHANH as HINHANHgv,kh.HINHANH as HINHANHkh, TGBATDAU, TGKETTHUC, gv.MOTA, SOBAIHOC FROM khoahoc kh, giaovien gv, gv_kh gk WHERE gk.IDKH = kh.IDKH AND kh.IDKH = '$id'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH, TENKH, TGBATDAU, kh.HINHANH, gv.TENGV, kh.LUOTXEM FROM khoahoc kh, giaovien gv, gv_kh gk WHERE ((CURRENT_DATE() <= TGBDDK) OR (CURRENT_DATE() <= TGKTDK)) AND (kh.IDKH = gk.IDKH AND gv.IDGV = gk.IDGV) AND (kh.IDKH NOT IN (SELECT ll.IDKH FROM khoahoc ll WHERE ll.IDKH = '$id')) limit 0,3";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_danh_sach_bai_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM baigiang WHERE IDKH = '1' AND BATTAT = '0' ORDER BY IDBG ASC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_thong_tin_giao_vien($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT gv.IDGV, TENGV, gv.HINHANH, gv.MOTA FROM khoahoc kh, giaovien gv, gv_kh gk WHERE kh.IDKH = '$id' and gk.IDGV = gv.IDGV AND kh.IDKH = gk.IDKH";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>