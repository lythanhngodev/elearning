<?php 
	include_once("config.php");
	function el_get_tat_ca_bai_giang($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT bg.IDBG, bg.IDGV, bg.TENBAI,bg.TOMTAT,bg.NOIDUNG, bg.NGAYDANG,bg.IDKH, bg.BATTAT,kh.TENKH,bg.IDVIDEO FROM baigiang bg, khoahoc kh WHERE bg.IDGV = '$id' AND bg.IDKH = kh.IDKH";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_get_khoa_hoc_cua_giao_vien($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH, kh.MAKH, kh.TENKH FROM giaovien gv, gv_kh gk, khoahoc kh WHERE gk.IDKH = kh.IDKH AND gk.IDGV = gv.IDGV AND gv.IDGV = '$id'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>