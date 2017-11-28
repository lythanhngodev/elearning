<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($m, $t, $gt, $tdn, $dc, $sdt, $mail, $hinh, $loai){
		if (empty($m)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> mã giáo viên được trống!\")</script>";
			exit();
		}
		if (empty($t)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> tên giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> tên đăng nhập giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($dc)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> địa chỉ giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($sdt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> số điện thoại giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> mail giáo viên không được trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			INSERT INTO `giaovien`(`MAGV`, `TENGV`, `GIOITINH`, `DIACHI`, `SDT`, `MAIL`, `HINHANH`, `LOAITAIKHOAN`) VALUES ('$m','$t','$gt','$dc','$sdt','$mail','$hinh', '$loai')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['m'],$_POST['t'],$_POST['gt'],$_POST['tdn'],$_POST['dc'],$_POST['sdt'],$_POST['mail'], $_POST['hinh'], $_POST['loai'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> khóa học đã được thêm!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
		exit();
	}
 ?>