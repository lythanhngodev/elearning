<?php 
	include_once("admin/config.php");
	function el_get_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT IDKH, TENKH, TGBATDAU FROM khoahoc WHERE CURRENT_DATE() <= TGBDDK OR CURRENT_DATE() <= TGKTDK";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_all_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH, kh.TENKH, kh.TGBATDAU, kh.HINHANH, gv.TENGV, kh.LUOTXEM FROM khoahoc kh, giaovien gv, gv_kh g WHERE g.IDGV = gv.IDGV AND g.IDKH = kh.IDKH ORDER BY kh.IDKH";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>