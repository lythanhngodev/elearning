<?php 
	include_once("../admin/config.php");
	function el_them_hoc_vien($ten,$hodem,$tdn,$mk,$mk2,$mail,$sdt,$gt,$ns,$dc){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên không được trống!\")</script>";
			exit();
		}
		if (empty($hodem)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> họ đệm không được trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập không được trống!\")</script>";
			exit();
		}
		if (empty($mk)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mật khẩu không được trống!\")</script>";
			exit();
		}
		if (empty($mk2)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mật khẩu xác nhận không được trống!\")</script>";
			exit();
		}
		if ($mk!=$mk2) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mật khẩu xác nhận chưa trùng khớp không được trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mail không được trống!\")</script>";
			exit();
		}
		if (empty($sdt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> số điện thoại không được trống!\")</script>";
			exit();
		}
		if (empty($ns)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> ngày sinh không được trống!\")</script>";
			exit();
		}
		if (empty($dc)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> địa chỉ không được trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		// kiểm tra tên đăng nhập
		if ($ketnoi->tontai("select IDSV from sinhvien where (binary TENDANGNHAP = N'".$tdn."')")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập đã tồn tại!\")</script>";
			exit();
		}
		// kiểm tra mail
		if ($ketnoi->tontai("select IDSV from sinhvien where (binary Mail = N'".$mail."')")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mail đã tồn tại!\")</script>";
			exit();
		}
		$dc = Addslashes($dc);
		$mk = md5($mk);
		$hoi = "
				INSERT INTO `sinhvien`(`HOSV`, `TENSV`, `GIOITINH`, `DIACHI`, `SDT`, `MAIL`, `NGAYSINH`, `TENDANGNHAP`, `MATKHAU`) VALUES ('$hodem','$ten','$gt','$dc','$sdt','$mail','$ns','$tdn','$mk')
		";
		echo $hoi;
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_hoc_vien($_POST['ten'],$_POST['hodem'],$_POST['tdn'],$_POST['mk'],$_POST['mk2'],$_POST['mail'],$_POST['sdt'], $_POST['gt'],$_POST['ns'],$_POST['dc'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đăng ký thành công</strong>!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Đăng ký chưa thành công</strong> kiểm tra lại thông tin!\")</script>";
		exit();
	}
 ?>
