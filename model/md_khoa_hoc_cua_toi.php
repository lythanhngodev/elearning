<?php 
	function el_lich_thi(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT lt.IDTB, lt.IDGV, lt.TENTB,lt.NOIDUNG,lt.TOMTAT,lt.NGAYDANG,lt.ANHIEN,gv.TENGV FROM thongbao lt, giaovien gv WHERE lt.IDGV = gv.IDGV and lt.ANHIEN = '0' ORDER BY lt.IDTB DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>