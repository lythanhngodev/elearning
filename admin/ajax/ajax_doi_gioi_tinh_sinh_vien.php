<?php 
	include_once("../config.php");
	function el_doi_gioi_tinh_sinh_vien($ma, $gt){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `sinhvien` SET `GIOITINH` = '$gt' WHERE `sinhvien`.`IDSV` = '$ma'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_doi_gioi_tinh_sinh_vien($_POST['ma'],$_POST['gt'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã lưu</strong> giới tính SV đã được cập nhật!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong> Trong quá trình cập nhật giới tính!\")</script>";
		exit();
	}
 ?>