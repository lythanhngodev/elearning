<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($t, $tdn, $gt, $mt, $dc, $sdt, $mail, $hinh, $idgv){
		if (empty($t)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($dc)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> địa chỉ giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($sdt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> số điện thoại giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mail giáo viên không được trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoitdn = "UPDATE `login_gv` SET `TenDangNhap`='$tdn' WHERE `IDGV` = '$idgv'";
		$hoi = "
			UPDATE `giaovien` 
			SET 
				`TENGV`='$t',
				`DIACHI`='$dc',
				`SDT`='$sdt',
				`MAIL`='$mail',
				`HINHANH`='$hinh',
				`MOTA`='$mt',
				`GIOITINH`='$gt'
			WHERE 
				IDGV = '$idgv'
		";
		if(mysqli_query($conn, $hoi)===TRUE && mysqli_query($conn, $hoitdn)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['t'],$_POST['tdn'],$_POST['gt'],$_POST['mt'],$_POST['dc'],$_POST['sdt'],$_POST['mail'], $_POST['hinh'],$_POST['idgv'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> thông tin giáo viên!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Có lỗi trong quá trình lưu!\")</script>";
		exit();
	}
 ?>