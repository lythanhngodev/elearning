<?php 
	include_once("../admin/config.php");
	function el_them_hoc_vien($ten,$ho,$tdn,$mail,$sdt,$gt,$ns,$dc,$idsv){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên không được trống!\")</script>";
			exit();
		}
		if (empty($ho)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> họ đệm không được trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập không được trống!\")</script>";
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
		if ($ketnoi->tontai("select IDSV from sinhvien where (binary TENDANGNHAP = N'".$tdn."') AND (IDSV NOT IN (SELECT IDSV FROM sinhvien WHERE BINARY IDSV = '".$idsv."'))")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập đã tồn tại!\")</script>";
			exit();
		}
		// kiểm tra mail
		if ($ketnoi->tontai("select IDSV from sinhvien where (binary Mail = N'".$mail."') AND (IDSV NOT IN (SELECT IDSV FROM sinhvien WHERE IDSV = '".$idsv."'))")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mail đã tồn tại!\")</script>";
			exit();
		}
		$dc = Addslashes($dc);
		$hoi = "
			UPDATE `sinhvien` 
			SET 
				`HOSV`='$ho',
				`TENSV`='$ten',
				`GIOITINH`='$gt',
				`DIACHI`='$dc',
				`SDT`='$sdt',
				`MAIL`='$mail',
				`NGAYSINH`='$ns',
				`TENDANGNHAP`='$tdn'
			WHERE IDSV = '$idsv'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_hoc_vien($_POST['ten'],$_POST['ho'],$_POST['tdn'],$_POST['mail'],$_POST['sdt'], $_POST['gt'],$_POST['ns'],$_POST['dc'],$_POST['idsv'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Thông tin đã được cập nhật</strong>!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! Chưa lưu.</strong> Kiểm tra lại thông tin!\")</script>";
		exit();
	}
 ?>
