<?php 
	include_once("../config.php");
	function el_xoa_khoa_hoc($idkh,$idgvkh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		// kiểm tra khóa học đã bắt đầu học hay chưa
		// nếu đã hjc thì ko thể xóa
		// mà chỉ gợi ý đổi giao viên
		$_hoi = "SELECT * FROM khoahoc WHERE idkh = '$idkh' AND (CURRENT_DATE() BETWEEN TGBATDAU AND TGKETTHUC)";
		$_query = mysqli_query($conn, $_hoi);
		$_count = mysqli_num_rows($_query);
		if ($_count == 0) {
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Không thể xóa khi khóa học đang diễn ra!</strong>!\")</script>";
		exit();
		}
///////////////////////////
		exit();

		$hoi = "
			DELETE FROM `khoahoc`
			WHERE 
				`IDKH` = '$idkh'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_xoa_khoa_hoc($_POST['idkh'],$_POST['idgvkh'])) {
		echo "<script type=\"text/javascript\">tailai();dongsua();thanhcong(\"<strong>Đã xóa</strong> khóa học!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
		exit();
	}
 ?>