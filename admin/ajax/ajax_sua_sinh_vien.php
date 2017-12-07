<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($tl, $t, $tdn,$sdt, $h, $m, $dc, $dc, $id){
		if (empty($tl)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên lót được trống!\")</script>";
			exit();
		}
		if (empty($t)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên không được trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập không được trống!\")</script>";
			exit();
		}
		if (empty($sdt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> số điện thoại không được trống!\")</script>";
			exit();
		}
		if (empty($m)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mail không được trống!\")</script>";
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
	if (el_them_khoa_hoc($_POST['tl'],$_POST['t'],$_POST['tdn'],$_POST['sdt'],$_POST['h'],$_POST['m'],$_POST['dc'], $_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> thông tin giáo viên!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi!</strong> Có lỗi trong quá trình lưu!\")</script>";
		exit();
	}
 ?>