<?php 
	include_once("../config.php");
	$d = $_POST['d'];
	$kh = $_POST['kh'];
	$sv = $_POST['sv'];
	$gc = $_POST['gc'];
	$tongso = sizeof($d)-1;
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$query = "SELECT * FROM nhapdiem nd WHERE nd.IDKH = '$kh' AND (CURRENT_DATE() BETWEEN nd.NGAYBDN AND nd.NGAYKTN)";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Hiện tại chưa đến thời điểm nhập điểm cho khóa học này.</strong>\")</script>";
		exit();
	}
	for ($i=1; $i <= sizeof($d)-1; $i++) { 
		// kiem tra diem co nhap hay chua
		$_query = "SELECT * FROM diemkhoahoc d WHERE d.IDKH='".$kh."' AND d.IDSV='".$sv[$i]."'";
		$_result = mysqli_query($conn, $_query);
		$_count = mysqli_num_rows($_result);
		if(empty($d[$i])) $d[$i] = 0;
		if ($_count == 0) {
			$_query = "INSERT INTO `diemkhoahoc`(`IDKH`, `IDSV`, `DIEM`, `GHICHU`) VALUES ('".$kh."','".$sv[$i]."','".$d[$i]."','".$gc[$i]."')";
			$_result = mysqli_query($conn, $_query);
			echo "<script type=\"text/javascript\">thanhcong(\"<strong>Điểm đã được cập nhật.</strong>\")</script>";
			exit();
		}else{
			$_query = "
					UPDATE diemkhoahoc
					SET 
						DIEM='".$d[$i]."',
						GHICHU='".$gc[$i]."' 
					WHERE 
						(`IDKH` = '".$kh."' AND `IDSV` = '".$sv[$i]."')";
			$_result = mysqli_query($conn, $_query);
			echo "<script type=\"text/javascript\">thanhcong(\"<strong>Điểm đã được cập nhật.</strong>\")</script>";
			exit();
		}
		// cap nhat diem

	}
 ?>