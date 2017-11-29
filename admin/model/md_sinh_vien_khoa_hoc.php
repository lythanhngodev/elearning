<?php 
	include_once("config.php");
	function el_get_sinh_vien(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT svkh.IDSVKH, svkh.IDSV,svkh.IDKH,svkh.XACNHAN, sv.HOSV, sv.TENSV, kh.TENKH,sv.MAIL, XACNHAN FROM sv_dk_khoahoc svkh, sinhvien sv, khoahoc kh WHERE svkh.IDSV = sv.IDSV and svkh.IDKH = kh.IDKH";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_sinh_vien_1(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT svkh.IDSVKH, svkh.IDSV,svkh.IDKH,svkh.XACNHAN, sv.HOSV, sv.TENSV, kh.TENKH,sv.MAIL FROM sv_dk_khoahoc svkh, sinhvien sv, khoahoc kh WHERE svkh.IDSV = sv.IDSV and svkh.IDKH = kh.IDKH and XACNHAN = '1'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH,kh.TENKH FROM khoahoc kh";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>