<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($m, $t, $tdn,$mt, $dc, $sdt, $mail, $hinh, $idgv){
		if (empty($m)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mã giáo viên được trống!\")</script>";
			exit();
		}
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
		$hoi = "
			UPDATE `giaovien` 
			SET 
				`MAGV`='$m',
				`TENGV`='$t',
				`DIACHI`='$dc',
				`SDT`='$sdt',
				`MAIL`='$mail',
				`HINHANH`='$hinh',
				`MOTA`='$mt'
			WHERE 
				IDGV = '$idgv'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['m'],$_POST['t'],$_POST['tdn'],$_POST['mt'],$_POST['dc'],$_POST['sdt'],$_POST['mail'], $_POST['hinh'],$_POST['idgv'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> thông tin giáo viên!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Có lỗi trong quá trình lưu!\")</script>";
		exit();
	}
 ?>