<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($td, $tt, $nd,$idtb){
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
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `thongbao` 
				SET 
					`TENTB`='$td',
					`NOIDUNG`='$nd',
					`TOMTAT`='$tt' 
				WHERE 
					`IDTB` = '$idtb'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['td'],$_POST['tt'],$_POST['nd'],$_POST['idtb'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Xong!</strong> thông báo đã được cập nhật!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Xong!</strong> có lỗi trong quá trình cập nhật!\")</script>";
		exit();
	}
 ?>