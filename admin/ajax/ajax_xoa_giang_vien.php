<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if ($ketnoi->tontai("SELECT * FROM giaovien gv, khoahoc kh, gv_kh gk WHERE gk.IDGV = gv.IDGV AND gk.IDKH = kh.IDKH AND (CURRENT_DATE() BETWEEN kh.TGBATDAU AND kh.TGKETTHUC) AND gv.IDGV = '".$id."'")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> không thể xóa giáo viên khi giáo viên đang giảng dạy khóa học!\")</script>";
			exit();
		}
		if ($ketnoi->tontai("SELECT * FROM giaovien gv, khoahoc kh, gv_kh gk WHERE gk.IDGV = gv.IDGV AND gk.IDKH = kh.IDKH AND (CURRENT_DATE() > kh.TGKETTHUC) AND gv.IDGV = '".$id."'")) {
			$hoi = "
				UPDATE `giaovien` SET `XOA`=b'1' WHERE `IDGV` = '$id'
			";
			if(mysqli_query($conn,$hoi) === TRUE)
				return true;
			else
				return false;
		}
		if ($ketnoi->tontai("SELECT * FROM giaovien gv, khoahoc kh, gv_kh gk WHERE gk.IDGV = gv.IDGV AND gk.IDKH = kh.IDKH AND (CURRENT_DATE() < kh.TGBATDAU) AND gv.IDGV = '".$id."'")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> giảng viên đang chuẩn bị giảng dạy khóa học mới! Vui lòng đổi giảng viên giảng dạy trước khi xóa giảng viên này!\")</script>";
			exit();
		}
		$hoi = "
			DELETE FROM `giaovien` WHERE `IDGV` = '$id'
		";
		$hoimk = "
			DELETE FROM `login_gv` WHERE `login_gv`.`IDLG` = '$id'
		";
		if(mysqli_query($conn,$hoimk) === TRUE && mysqli_query($conn,$hoi) === TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xóa</strong> giáo viên thành công!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
		exit();
	}
 ?>