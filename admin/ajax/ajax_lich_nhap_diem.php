<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			DELETE FROM `nhapdiem` WHERE `IDND` = '$id'
		";
		if(mysqli_query($conn,$hoi) === TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xóa</strong> lịch nhập điểm thành công!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
		exit();
	}
 ?>