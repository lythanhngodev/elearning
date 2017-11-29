<?php 
	include_once("../config.php");
	function el_sua_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if ($ketnoi->tontai("SELECT * FROM sv_dk_khoahoc sd, khoahoc kh WHERE sd.IDKH = kh.IDKH AND sd.XACNHAN = '1' AND (CURRENT_DATE() >= kh.TGBATDAU) AND sd.IDSVKH = '$id'")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> không thể hủy khi khóa học này đang diễn ra!\")</script>";
			exit();
		}
		$hoi = "
			UPDATE `sv_dk_khoahoc` 
			SET 
				`XACNHAN` = b'0'
			WHERE 
				`sv_dk_khoahoc`.`IDSVKH` = '$id'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_sua_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xác nhận!</strong>\");thanhcong(\"<strong>Đang cập nhật!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> không xác nhận!\")</script>";
		exit();
	}
 ?>