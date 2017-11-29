<?php 
	function el_check_sv_dk_kh($id,$kh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM sv_dk_khoahoc sdk WHERE IDSV = '$id' AND IDKH = '$kh' AND XACNHAN = b'0'";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		if ($count > 0)
			return true;
		else
			return false;
	}
	function el_danh_sach_bai_hoc(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT kh.IDKH, kh.TENKH, kh.TGBATDAU, kh.HINHANH, gv.TENGV, kh.LUOTXEM FROM khoahoc kh, giaovien gv, gv_kh g WHERE g.IDGV = gv.IDGV AND g.IDKH = kh.IDKH ORDER BY kh.IDKH";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>