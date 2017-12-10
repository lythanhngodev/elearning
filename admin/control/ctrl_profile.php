<?php 
	include_once("model/md_profile.php");
	$gv = el_get_giao_vien($idofgv);
	$row = mysqli_fetch_array($gv);
	include_once("view/vw_profile.php");
 ?>