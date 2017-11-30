<?php 
	include_once("../config.php");
	function el_sua_khoa_hoc($hienan,$id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi="";
		if ($hienan=='0')
			$hoi="UPDATE `lichthi` SET `ANHIEN` = b'1' WHERE `lichthi`.`IDLT` = '$id'";
		else
			$hoi="UPDATE `lichthi` SET `ANHIEN` = b'0' WHERE `lichthi`.`IDLT` = '$id'";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_sua_khoa_hoc($_POST['hienan'],$_POST['id'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Trạng thái bài được cập nhật!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> không thể cập nhật trạng thái!\")</script>";
		exit();
	}
 ?>