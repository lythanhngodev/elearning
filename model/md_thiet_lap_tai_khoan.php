<?php 
	function el_thong_tin_ca_nhan($idsv){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "
			SELECT `IDSV`, `MASV`, `HOSV`, `TENSV`, `HINHANH`, `GIOITINH`, `DIACHI`, `SDT`, `MAIL`, `NGAYSINH`, `TENDANGNHAP`, `NGAYDANGKY`, `TRANGTHAI` FROM `sinhvien` WHERE `IDSV` = '$idsv' and TRANGTHAI = b'0'
		";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function el_lich_su_khoc_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT kh.TENKH, kh.TGBATDAU,kh.TGKETTHUC,d.DIEM FROM khoahoc kh, sv_dk_khoahoc sd, sinhvien sv, diemkhoahoc d WHERE sv.IDSV = sd.IDSV AND sd.IDKH = kh.IDKH AND d.IDKH = kh.IDKH AND d.IDSV = sv.IDSV AND sd.XACNHAN = '0' AND sv.IDSV = '$id'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>