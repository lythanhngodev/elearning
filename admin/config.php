<?php 
	$elearning = array(
		'HOST' => 'http://localhost/elearning/admin/',
		'HOSTCON' => 'http://localhost/elearning/',
		'HOSTGOC' => 'http://localhost/elearning/'
	);
	class clsKetnoi
	{
		private $maychu ="localhost";
		private $tendangnhap="root";
		private $matkhau="";
		private $csdl="elearning";

		public function ketnoi(){
			$conn=@mysqli_connect($this->maychu, $this->tendangnhap, $this->matkhau);
			mysqli_select_db($conn, $this->csdl);
			mysqli_query($conn, "SET character_set_results=utf8");
			mb_language('uni');
			mb_internal_encoding('UTF-8');
			mysqli_query($conn, "set names 'utf8'");
			return $conn;
		}
		public function tontai($hoi){
			$conn = $this->ketnoi();
			$ex  = mysqli_query($conn,$hoi);
			$dem = mysqli_num_rows($ex);
			if ($dem>0)
				return true;
			else
				return false;
		}
	}
	
 ?>