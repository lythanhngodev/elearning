<?php 
	include_once("../config.php");
	function el_sua_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			DELETE FROM `baigiang` WHERE `IDBG` = '$id'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_sua_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai('0');thanhcong(\"<strong>Đã xóa thành công!!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> không xác nhận!\")</script>";
		exit();
	}
 ?>