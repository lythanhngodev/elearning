<?php 
	include_once("../config.php");
	function matkhau() {
	    $bangchucai = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $matkhauduoctao = array();
	    $chieudaimang = strlen($bangchucai) - 1;
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $chieudaimang);
	        $matkhauduoctao[] = $bangchucai[$n];
	    }
	    return implode($matkhauduoctao); //turn the array into a string
	}
	function el_them_khoa_hoc($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		
		$mk = matkhau();
		$mk_md5 = md5($mk);
		$hoi = "
			UPDATE login_gv SET MatKhau = '$mk_md5' WHERE IDGV = '$id'
		";
		if (mysqli_query($conn,$hoi)) {
			$hoi = "Select mail, TenDangNhap, TenGV from giaovien gv, login_gv lg WHERE gv.IDGV=lg.IDGV and gv.IDGV = '$id'";
			$ex  = mysqli_query($conn,$hoi);
			$row = mysqli_fetch_array($ex);
			$__mail = $row[0];
			$tdn = $row[1];
			$t = $row[2];
			include_once ("../mail/functions.php");   
			$title = 'VLUTE - ELEARNING | ĐĂNG KÝ GIẢNG VIÊN';
			$content = '
			<table style="max-width:555px;background-color:#eff3f2;border-style:none;margin:0 auto;height:255px;">
					<tbody>
						<tr>
							<th colspan="2" style="height: 20px;font-size: 24px;background:#009085;color:#fff;text-align:inherit;border-left: 9px solid #23746e;padding-left: 10px;">RESET MẬT KHẨU GIẢNG VIÊN</th>
						</tr>
						<tr style="font-size: 20px;height: 20px;">
							<td style="width: 170px;font-weight: bold;padding: 0;padding-left:10px;">Tên giảng viên: </td>
							<td style="
				    padding: 0;padding-right:10px;
				">'.$t.'</td>
						</tr>
						<tr style="font-size: 20px;height: 20px;">
							<td style="width: 170px;font-weight: bold;padding: 0;padding-left:10px;">Tên đăng nhập: </td>
							<td>'.$tdn.'</td>
						</tr>
						<tr style="font-size: 20px;height: 20px;">
							<td style="width: 170px;font-weight: bold;padding: 0;padding-left:10px;">Mật khâu reset: </td>
							<td>'.$mk.'</td>
						</tr>
						<tr>
							<td colspan="2" style="background-color:bisque;height: 20px;text-align:end;padding-right:15px;border-right:9px solid #c6955b;"><b><i>Gửi từ | VLUTE ELEARNING</i></b></td>
						</tr>
					</tbody>
				</table>
			';
			$nTo = $t;
			$mTo = $__mail;
			$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
			if($mail)
				return true;
			else
				return false;
		}
		return false;
	}
	if (el_them_khoa_hoc($_POST['id'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã reset mật khẩu cho giáo viên!</strong>\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Có lỗi trong quá trình reset</strong>\")</script>";
		exit();
	}
 ?>