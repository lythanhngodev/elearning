<?php 
	include_once("../config.php");
	function el_them_hoc_vien($mkc,$mkm,$mkmx,$idgv){
		if (empty($mkc)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu cũ không được trống!\")</script>";
			exit();
		}
		if (empty($mkm)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu mới không được trống!\")</script>";
			exit();
		}
		if (empty($mkmx)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu xác nhận không được trống!\")</script>";
			exit();
		}
		if ($mkm!=$mkmx) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu xác nhận chưa trùng khớp!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$mk1 = md5($mk1);
		if (!($ketnoi->tontai("SELECT * FROM login_gv WHERE IDGV = '".$idgv."' AND MatKhau = '".md5($mkc)."'"))) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Mật khẩu cũ chưa chính xác!\")</script>";
			exit();
		}
		// kiểm tra tên đăng nhập
		$mkm = md5($mkm);
		$hoi = "
			UPDATE `login_gv` SET `MatKhau`= '$mkm' WHERE `IDGV` = '$idgv'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_hoc_vien($_POST['mkc'],$_POST['mkm'],$_POST['mkmx'],$_POST['idgv'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã đổi mật khẩu thành công</strong>!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Đổi mật khẩu chưa thành công</strong> kiểm tra lại thông tin!\")</script>";
		exit();
	}
 ?>
