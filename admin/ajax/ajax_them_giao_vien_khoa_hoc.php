<?php 
	include_once("../config.php");
	function el_sua_khoa_hoc($gv,$kh){
		if (empty($gv)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> bạn chưa chọn giáo viên!\")</script>";
			exit();
		}
		if (empty($kh)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> bạn chưa chọn khóa học!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if ($ketnoi->tontai("SELECT * FROM gv_kh g WHERE (g.IDGV = '$gv' AND IDKH = '$kh') OR (IDKH = '$kh')")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> khóa học này đã được phân công trước đó!\")</script>";
			exit();
		}
		$hoi = "
			INSERT INTO `gv_kh`(`IDGV`, `IDKH`) VALUES ('$gv','$kh')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_sua_khoa_hoc($_POST['gv'],$_POST['kh'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã thêm giảng dạy thành công!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> không thể phân công!\")</script>";
		exit();
	}
 ?>