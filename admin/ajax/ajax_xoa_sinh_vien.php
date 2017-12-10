<?php 
	include_once("../config.php");
	function el_sua_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			DELETE FROM sinhvien WHERE IDSV = '$id'
		";
		$hoi1="DELETE FROM diemkhoahoc WHERE IDSV = '$id'";
		$hoi2="DELETE FROM `sv_dk_khoahoc` WHERE IDSV = '$id'";
		$_e=mysqli_query($conn, $hoi1);
		$_e2=mysqli_query($conn, $hoi2);
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_sua_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai('0');thanhcong(\"<strong>Đã xóa thành công!!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> không xóa được!\")</script>";
		exit();
	}
 ?>