<?php 
	function el_thong_tin_ca_nhan($idsv){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "
			SELECT `IDSV`, `MASV`, `HOSV`, `TENSV`, `HINHANH`, `GIOITINH`, `DIACHI`, `SDT`, `MAIL`, `NGAYSINH`, `TENDANGNHAP`, `NGAYDANGKY`, `TRANGTHAI` FROM `sinhvien` WHERE `IDSV` = '$idsv'
		";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>