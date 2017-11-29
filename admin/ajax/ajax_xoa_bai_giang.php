<?php 
	include_once("../config.php");
	function el_sua_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `sv_dk_khoahoc` 
			SET 
				`XACNHAN` = b'1'
			WHERE 
				`sv_dk_khoahoc`.`IDSVKH` = '$id'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_sua_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xác nhận!!</strong>\");thanhcong(\"<strong>Đang cập nhật!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> không xác nhận!\")</script>";
		exit();
	}
 ?>