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
	function el_them_khoa_hoc($m, $t, $gt, $tdn, $dc, $sdt, $_mail, $hinh, $loai,$mt){
		if (empty($m)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mã giáo viên được trống!\")</script>";
			exit();
		}
		if (empty($t)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($dc)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> địa chỉ giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($sdt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> số điện thoại giáo viên không được trống!\")</script>";
			exit();
		}
		if (empty($_mail)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> mail giáo viên không được trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if ($ketnoi->tontai("SELECT IDGV FROM login_gv WHERE (BINARY login_gv.TenDangNhap = N'".$tdn."')")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập đã tồn tại!\")</script>";
			exit();
		}
		if ($ketnoi->tontai("SELECT IDGV FROM `giaovien` WHERE(BINARY MAIL = N'".$_mail."')")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Lỗi</strong> tên đăng nhập đã tồn tại!\")</script>";
			exit();
		}
		$hoi = "
			INSERT INTO `giaovien`(`MAGV`, `TENGV`, `GIOITINH`, `DIACHI`, `SDT`, `MAIL`, `HINHANH`, `LOAITAIKHOAN`,`MOTA`) VALUES ('$m','$t','$gt','$dc','$sdt','$_mail','$hinh', '$loai','$mt')
		";
		mysqli_query($conn, $hoi);
		$hoi_idgv = "SELECT IDGV FROM `giaovien` WHERE(BINARY MAIL = N'".$_mail."')";
		$ex = mysqli_query($conn,$hoi_idgv);
		$row = mysqli_fetch_array($ex);
		
		$so = $row['IDGV'];
		$mk = matkhau();
		$mk_md5 = md5($mk);
		$hoi_lg = "INSERT INTO `login_gv`(`IDGV`, `TenDangNhap`, `MatKhau`) VALUES ('$so','$tdn','$mk_md5')";
		
		include_once ("../mail/functions.php");   
		$title = 'VLUTE - ELEARNING | ĐĂNG KÝ GIẢNG VIÊN';
		$content = '
		<table style="max-width:555px;background-color:#eff3f2;border-style:none;margin:0 auto;height:255px;">
				<tbody>
					<tr>
						<th colspan="2" style="height: 20px;font-size: 24px;background:#009085;color:#fff;text-align:inherit;border-left: 9px solid #23746e;padding-left: 10px;">ĐĂNG KÍ GIẢNG VIÊN</th>
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
						<td style="width: 170px;font-weight: bold;padding: 0;padding-left:10px;">Mật khâu: </td>
						<td>'.$mk.'</td>
					</tr>
					<tr>
						<td colspan="2" style="background-color:bisque;height: 20px;text-align:end;padding-right:15px;border-right:9px solid #c6955b;"><b><i>Gửi từ | VLUTE ELEARNING</i></b></td>
					</tr>
				</tbody>
			</table>
		';
		$nTo = $t;
		$mTo = $_mail;
		$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
		if(mysqli_query($conn,$hoi_lg) === TRUE)
			return true;
		else
			return false;
	}
	if (el_them_khoa_hoc($_POST['m'],$_POST['t'],$_POST['gt'],$_POST['tdn'],$_POST['dc'],$_POST['sdt'],$_POST['mail'], $_POST['hinh'], $_POST['loai'],$_POST['mt'])) {
		echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> giáo viên đã được thêm!\")</script>";
		exit();
	}
	else{
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
		exit();
	}
 ?>