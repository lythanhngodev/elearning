<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($m, $t, $mt, $tgbdkh, $tgktkh, $tgbddk, $tgktdk, $hinh,$mtct,$tgt){
		if (empty($m)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> mã khóa học không được trống!\")</script>";
			exit();
		}
		if (empty($t)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> tên khóa học không được trống!\")</script>";
			exit();
		}
		if (empty($mt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> mô tả khóa học không được trống!\")</script>";
			exit();
		}
		if (empty($tgbdkh)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> <u>thời gian bắt đầu</u> khóa học không được trống!\")</script>";
			exit();
		}
		if (empty($tgktkh)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> <u>thời gian kết thúc</u> khóa học không được trống!\")</script>";
			exit();
		}
		if (empty($tgbddk)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> <u>thời gian bắt đầu đăng ký</u> khóa học không được trống!\")</script>";
			exit();
		}
		if (empty($tgktdk)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> <u>thời gian kết thúc đăng ký</u> khóa học không được trống!\")</script>";
			exit();
		}
		if (empty($tgt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> <u>thời gian thi</u> không được trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `khoahoc`(`MAKH`, `TENKH`, `MOTAKH`, `TGBATDAU`, `TGKETTHUC`, `TGBDDK`, `TGKTDK`, `HINHANH`,`MOTACTKH`,`TGTHI`) VALUES ('$m','$t','$mt','$tgbdkh','$tgktkh','$tgbddk','$tgktdk','$hinh','$mtct','$tgt')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['m'],$_POST['t'],$_POST['mt'],$_POST['tgbdkh'],$_POST['tgktkh'],$_POST['tgbddk'],$_POST['tgktdk'], $_POST['hinh'],$_POST['mtct'],$_POST['tgt'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> khóa học đã được thêm!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
		exit();
	}
 ?>