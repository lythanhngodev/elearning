<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($kh, $nbd, $nkt){
		if (empty($kh)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>chưa chọn khóa học!\")</script>";
			exit();
		}
		if (empty($nbd)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong> chưa nhập ngày bắt đầu!\")</script>";
			exit();
		}
		if (empty($nkt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong> chưa nhập ngày kết thúc!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			INSERT INTO `nhapdiem`(`IDKH`, `NGAYBDN`, `NGAYKTN`) VALUES ('$kh','$nbd','$nkt')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['kh'],$_POST['nbd'],$_POST['nkt'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Xong!</strong> đã thêm lịch nhập điểm!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Xong!</strong>đã thêm lịch nhập điểm!\")</script>";
		exit();
	}
 ?>