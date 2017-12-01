<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($td, $tt, $nd,$id){
		if (empty($td)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>tiêu đề không được trống!\")</script>";
			exit();
		}
		if (empty($tt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong> tóm tắt không được trống!\")</script>";
			exit();
		}
		if (empty($nd)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong> nội dung không được trống!\")</script>";
			exit();
		}
		if (empty($id)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong> phải đăng nhập để thực hiện!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `thongbao`(`IDGV`, `TENTB`, `NOIDUNG`, `TOMTAT`, `NGAYDANG`) VALUES ('$id','$td','$nd','$tt',CURRENT_DATE())
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['td'],$_POST['tt'],$_POST['nd'],$_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> khóa học đã được thêm!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
		exit();
	}
 ?>