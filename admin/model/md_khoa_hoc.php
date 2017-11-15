<?php 
	include_once("config.php");
	function el_get_khoa_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `KHOAHOC`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>