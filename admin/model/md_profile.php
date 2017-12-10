<?php 
	include_once("config.php");
	function el_get_giao_vien($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM giaovien gv, login_gv lg WHERE gv.IDGV = lg.IDGV and gv.XOA = '0' and gv.IDGV = '$id'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>