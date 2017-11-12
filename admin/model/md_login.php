<?php 
	function el_login($username, $password){
		//$password = md5($password);	
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		// 0 là bật, 1 là tắt
		$hoi = "SELECT gv.MaGV FROM login_gv lg, giaovien gv WHERE lg.MaGV = gv.MaGV AND gv.TrangThai = b'0' AND gv.XacNhan = b'0' AND (BINARY `TenDangNhap` = '$username') AND `MatKhau` = '$password'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0)
			return true;
		else
			return false;
	}
 ?>