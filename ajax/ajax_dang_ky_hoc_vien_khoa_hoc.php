<?php 
	include_once("../admin/config.php");
	function el_them_hoc_vien($id,$kh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		// kiểm tra tên đăng nhập
		if ($ketnoi->tontai("SELECT * FROM `sv_dk_khoahoc` WHERE IDSV = '$id' AND IDKH = '$kh'")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> bạn đã đăng ký học môn này rồi!\")</script>";
			exit();
		}
		$hoi = "
				INSERT INTO `sv_dk_khoahoc`(`IDSV`, `IDKH`) VALUES ('$id','$kh')
		";
		echo $hoi;
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_hoc_vien($_POST['id'],$_POST['kh'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Ghi danh thành công!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Ghi danh chưa thành công</strong> kiểm tra lại thông tin!\")</script>";
		exit();
	}
 ?>
