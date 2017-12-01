<?php 
	include_once("config.php");
	function el_get_lich_thi(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT lt.IDTB, lt.IDGV,TENTB, lt.NOIDUNG, lt.TOMTAT, lt.NGAYDANG, lt.ANHIEN, gv.TENGV FROM giaovien gv, thongbao lt WHERE lt.IDGV = gv.IDGV";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>