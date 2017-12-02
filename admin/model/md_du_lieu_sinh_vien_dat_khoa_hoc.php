<?php 
	include_once("config.php");
	function el_get_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH, kh.MAKH, kh.TENKH FROM khoahoc kh";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_sinh_vien_cua_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT kh.IDKH, sv.IDSV, sv.HOSV, sv.TENSV FROM sinhvien sv, sv_dk_khoahoc sd, khoahoc kh WHERE sd.IDSV = sv.IDSV AND sd.IDKH = kh.IDKH AND XACNHAN = '0' AND sv.TRANGTHAI = '0' AND kh.IDKH = '$id'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>