<?php 
	include_once("../config.php");
	function el_them_khoa_hoc($td, $tt, $idv, $nd,$makh,$id){
		if (empty($td)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>Tiêu đề không được trống!\")</script>";
			exit();
		}
		if (empty($tt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>Tóm tắt không được trống!\")</script>";
			exit();
		}
		if (empty($nd)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>Nội dung không được trống!\")</script>";
			exit();
		}
		if (empty($id)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>Phải đăng nhập để thực hiện!\")</script>";
			exit();
		}
		if (empty($idv)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>ID VIDEO không được bỏ trống!\")</script>";
			exit();
		}
		if (empty($makh)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong>Bạn chưa chọn khóa học!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if ($ketnoi->tontai("SELECT * FROM khoahoc WHERE CURRENT_DATE() > TGKETTHUC")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi! </strong> khóa học này đã kết thúc!\")</script>";
			exit();
		}

		$hoi = "
			INSERT INTO `baigiang`(`IDGV`, `TENBAI`, `TOMTAT`, `IDVIDEO`, `NOIDUNG`, `NGAYDANG`, `IDKH`) VALUES ('$id','$td','$tt','$idv','$nd',CURRENT_DATE(),'$makh') 
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['td'],$_POST['tt'],$_POST['idv'],$_POST['nd'],$_POST['makh'],$_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai('".$_POST['makh']."');thanhcong(\"<strong>Đã lưu</strong> khóa học đã được thêm!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
		exit();
	}
 ?>