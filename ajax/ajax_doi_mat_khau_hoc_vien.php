<?php 
	include_once("../admin/config.php");
	function el_them_hoc_vien($mk1,$mk2,$mk3,$idsv){
		if (empty($mk1)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu cũ không được trống!\")</script>";
			exit();
		}
		if (empty($mk2)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu mới không được trống!\")</script>";
			exit();
		}
		if (empty($mk3)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu xác nhận không được trống!\")</script>";
			exit();
		}
		if ($mk2!=$mk3) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu xác nhận chưa trùng khớp!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$mk1 = md5($mk1);
		if (!($ketnoi->tontai("SELECT IDSV FROM `sinhvien` WHERE IDSV = '".$idsv."' AND MATKHAU = '".$mk1."'"))) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu cũ chưa chính xác!\")</script>";
			exit();
		}
		// kiểm tra tên đăng nhập
		$mk2 = md5($mk2);
		$hoi = "
			UPDATE `sinhvien` SET `MATKHAU`= '$mk2' WHERE `IDSV` = '$idsv'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_hoc_vien($_POST['mk1'],$_POST['mk2'],$_POST['mk3'],$_POST['idsv'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã đổi mật khẩu thành công</strong>!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Đăng ký chưa thành công</strong> kiểm tra lại thông tin!\")</script>";
		exit();
	}
 ?>
