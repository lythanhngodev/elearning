<?php 
	include_once("../admin/config.php");
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$idbg = $_POST['idbg'];
	$idsv = $_POST['idsv'];
	$kh = $_POST['kh'];
	$query = "SELECT DISTINCT bg.IDBG, bg.TENBAI,bg.TOMTAT,bg.NOIDUNG,bg.NGAYDANG,bg.IDKH FROM sv_dk_khoahoc sdk, baigiang bg, khoahoc kh WHERE sdk.IDSV = '$idsv' AND sdk.IDKH = '$kh' AND bg.IDKH = sdk.IDKH AND kh.IDKH = sdk.IDKH AND kh.TRANGTHAI = b'0' AND bg.IDBG = '$idbg'  AND bg.BATTAT=b'0' limit 0,1";
	$result = mysqli_query($conn, $query);
	$row_top_1 = mysqli_fetch_array($result);
 ?>
 			<div class="col-sm-12">
				<h3 class="tieu-de-khoa-hoc" id="tieu-de-khoa-hoc" style="border-bottom: 1px solid #ececec;"><?php echo $row_top_1['TENBAI'] ?></h3>
				<span>
					<i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $row_top_1['NGAYDANG'] ?>&nbsp;&nbsp;
				</span>
				<div class="tom-tat-noi-dung-bai-hoc"><?php echo $row_top_1['TOMTAT'] ?></div>
				<iframe width="100%" height="440px" src="https://drive.google.com/file/d/<?php echo $row_top_1['NOIDUNG'] ?>/preview?autoplay=1" frameborder="0" allowfullscreen="1"></iframe>
			</div>
<script type="text/javascript">
	$(document).find(".active").removeClass("active");
	$(document).find("#id-list-bai-<?php echo $idbg ?>").addClass("active");
</script>