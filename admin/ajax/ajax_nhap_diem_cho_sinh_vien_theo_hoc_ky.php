<?php 
	$d = $_POST['d'];
	for ($i=1; $i <= sizeof($d)-1; $i++) { 
		echo "nhan du lieu tu ben kia ".$d[$i];
	}
 ?>