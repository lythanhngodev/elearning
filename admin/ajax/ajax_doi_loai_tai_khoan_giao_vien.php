<?php 
	include_once("../config.php");
	function el_doi_gioi_tinh_giao_vien($ma, $ltk){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `giaovien` SET `LOAITAIKHOAN` = '$ltk' WHERE `giaovien`.`IDGV` = '$ma';
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_doi_gioi_tinh_giao_vien($_POST['ma'],$_POST['ltk'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã lưu</strong> loại tài khoản GV đã được cập nhật!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật loại tài khoản!\")</script>";
		exit();
	}
 ?>