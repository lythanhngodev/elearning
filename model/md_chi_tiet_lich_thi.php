<?php 
	function el_chi_tiet_lich_thi($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT lt.IDLT, lt.IDGV, lt.TENLT,lt.NOIDUNG,lt.TOMTAT,lt.NGAYDANG,lt.ANHIEN,gv.TENGV FROM lichthi lt, giaovien gv WHERE lt.IDGV = gv.IDGV and lt.IDLT='$id' ORDER BY lt.IDLT DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_lich_thi_lien_quan($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT lt.IDLT,lt.TENLT FROM lichthi lt, giaovien gv WHERE lt.IDGV = gv.IDGV and (lt.IDLT NOT IN (SELECT IDLT FROM lichthi WHERE IDLT = '$id')) ORDER BY lt.IDLT DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>