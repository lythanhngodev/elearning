<?php 
	function el_chi_tiet_lich_thi($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT lt.IDTB, lt.IDGV, lt.TENTB,lt.NOIDUNG,lt.TOMTAT,lt.NGAYDANG,lt.ANHIEN,gv.TENGV FROM thongbao lt, giaovien gv WHERE lt.IDGV = gv.IDGV and lt.ANHIEN = '0' and lt.IDTB='$id' ORDER BY lt.IDTB DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_lich_thi_lien_quan($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT lt.IDTB,lt.TENTB FROM thongbao lt, giaovien gv WHERE lt.IDGV = gv.IDGV and lt.ANHIEN = '0' and (lt.IDTB NOT IN (SELECT IDTB FROM thongbao WHERE IDTB = '$id')) ORDER BY lt.IDTB DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>