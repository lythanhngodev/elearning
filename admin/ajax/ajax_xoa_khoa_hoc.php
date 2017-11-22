<?php 
	include_once("../config.php");
	function el_xoa_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			DELETE FROM `khoahoc`
			WHERE 
				`IDKH` = '$id'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_xoa_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();dongsua();thanhcong(\"<strong>Đã xóa</strong> khóa học!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
		exit();
	}
 ?>