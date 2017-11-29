<?php 
	function el_login($username, $password){
		//$password = md5($password);	
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		// 0 là bật, 1 là tắt
		$password = md5($password);
		$hoi = "select * from sinhvien sv WHERE (BINARY TENDANGNHAP = '$username' AND MATKHAU = '$password') OR (BINARY MAIL = '$username' AND MATKHAU = '$password')";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0)
			return true;
		else
			return false;
	}
 ?>