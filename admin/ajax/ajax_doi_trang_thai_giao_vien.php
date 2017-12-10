<?php 
	include_once("../config.php");
	function el_doi_gioi_tinh_giao_vien($ma, $tt){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `giaovien` SET `TRANGTHAI`=b'1' WHERE `IDGV` = '$ma'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_doi_gioi_tinh_giao_vien($_POST['ma'],$_POST['tt'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã lưu</strong> trạng thái GV đã được cập nhật!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật trạng thái!\")</script>";
		exit();
	}
 ?>