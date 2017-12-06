<?php 
	include_once("../config.php");
	function el_doi_gioi_tinh_giao_vien($idgv,$idkh, $idgvkh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE gv_kh 
			SET 
				IDGV= '$idgv' ,
				IDKH= '$idkh' 
			WHERE 
				IDGVKH = '$idgvkh'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (el_doi_gioi_tinh_giao_vien($_POST['idgv'],$_POST['idkh'],$_POST['idgvkh'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Xong!</strong> đã đổi giáo viên cho khóa học!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình đổi!\")</script>";
		exit();
	}
 ?>