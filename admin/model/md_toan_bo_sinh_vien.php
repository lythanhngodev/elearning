<?php 
	include_once("config.php");
	function el_get_toan_bo_sinh_vien(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM sinhvien sv";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>