<?php 
	include_once("config.php");
	function el_get_lich_thi(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT lt.IDLT, lt.IDGV,TENLT, lt.NOIDUNG, lt.TOMTAT, lt.NGAYDANG, lt.ANHIEN, gv.TENGV FROM giaovien gv, lichthi lt WHERE lt.IDGV = gv.IDGV";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>