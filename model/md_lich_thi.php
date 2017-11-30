<?php 
	function el_lich_thi(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT lt.IDLT, lt.IDGV, lt.TENLT,lt.NOIDUNG,lt.TOMTAT,lt.NGAYDANG,lt.ANHIEN FROM lichthi lt, giaovien gv WHERE lt.IDGV = gv.IDGV ORDER BY lt.IDLT DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>