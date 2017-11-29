<?php 
	include_once("../config.php");
	function el_sua_khoa_hoc($id,$tt){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi="";
		if ($tt=='0')
			$hoi="UPDATE `baigiang` SET `BATTAT` = b'0' WHERE `baigiang`.`IDBG` = '$id'";
		else
			$hoi="UPDATE `baigiang` SET `BATTAT` = b'1' WHERE `baigiang`.`IDBG` = '$id'";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_sua_khoa_hoc($_POST['id'],$_POST['tt'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Trạng thái bài được cập nhật!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> không thể cập nhật trạng thái!\")</script>";
		exit();
	}
 ?>