<?php 
	include_once("config.php");
	function el_get_sinh_vien_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT gk.IDGVKH,kh.IDKH,gv.IDGV, gv.MAGV,gv.TENGV, gv.MAIL, kh.TENKH FROM gv_kh gk, giaovien gv, khoahoc kh WHERE gk.IDGV = gv.IDGV AND gk.IDKH = kh.IDKH";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_giao_vien(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM giaovien where trangthai = b'0'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		//$query = "SELECT DISTINCT kh.IDKH,kh.TENKH FROM khoahoc kh WHERE ((CURRENT_DATE() <= TGBDDK) or (CURRENT_DATE() <= TGKTDK)) AND (IDKH NOT IN (SELECT IDKH FROM gv_kh))";
		$query = "SELECT DISTINCT kh.IDKH,kh.TENKH FROM khoahoc kh";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	
 ?>