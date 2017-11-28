<?php 
	include_once("../admin/config.php");
	function el_get_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT IDKH, TENKH FROM khoahoc";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>