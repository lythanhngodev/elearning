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
	function el_danh_sach_bai_hoc($id,$kh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT bg.IDBG, bg.TENBAI,bg.TOMTAT,bg.NOIDUNG,bg.NGAYDANG,bg.IDKH FROM sv_dk_khoahoc sdk, baigiang bg, khoahoc kh WHERE sdk.IDSV = '$id' AND sdk.IDKH = '$kh' AND bg.IDKH = sdk.IDKH AND kh.IDKH = sdk.IDKH AND kh.TRANGTHAI = b'0' AND bg.BATTAT=b'0'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_danh_sach_bai_hoc_top_1($id,$kh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT bg.IDBG, bg.TENBAI,bg.TOMTAT,bg.NOIDUNG,bg.NGAYDANG,bg.IDKH FROM sv_dk_khoahoc sdk, baigiang bg, khoahoc kh WHERE sdk.IDSV = '$id' AND sdk.IDKH = '$kh' AND bg.IDKH = sdk.IDKH AND kh.IDKH = sdk.IDKH AND kh.TRANGTHAI = b'0'  AND bg.BATTAT=b'0' limit 0,1";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>