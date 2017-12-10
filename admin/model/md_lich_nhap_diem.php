<?php 
	include_once("config.php");
	function el_get_nhap_diem_1(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT nd.IDND,nd.IDKH,nd.NGAYBDN,nd.NGAYKTN,kh.MAKH,kh.TENKH FROM nhapdiem nd, khoahoc kh WHERE nd.IDKH = kh.IDKH AND kh.TRANGTHAI = b'0'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH,kh.TENKH FROM khoahoc kh WHERE TRANGTHAI=b'0'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>