<div class="col-sm-12 khoa-hoc">
	<div class="row">
		<div class="col-sm-3 danh-sach-khoa-hoc-cang-le">
			<div class="danh-sach-khoa-hoc">
				<h5>DANH SÁCH BÀI HỌC</h5>
				<ul type=none id='listlist' class="danh-sach-bai-hoc">
					<?php 
					$stt = 1;
					while ($row = mysqli_fetch_array($baihoc)) { 
						if($stt==1) { ?>
						<li id="id-list-bai-<?php echo $row['IDBG'] ?>" class="active" onclick="chonbai('<?php echo $row['IDBG'] ?>')"><a><?php echo $row['TENBAI'] ?></a></li>
					<?php } else {?>
						<li id="id-list-bai-<?php echo $row['IDBG'] ?>" onclick="chonbai('<?php echo $row['IDBG'] ?>')"><a><?php echo $row['TENBAI'] ?></a></li>
					<?php } $stt++;
					} ?>
				</ul>
			</div>
		</div>
		<div id="noi-dung-bai-hoc" class="col-sm-9">
			<div class="col-sm-12">
				<h3 class="tieu-de-khoa-hoc" id="tieu-de-khoa-hoc" style="border-bottom: 1px solid #ececec;"><?php echo $row_top_1['TENBAI'] ?></h3>
				<span>
					<i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $row_top_1['NGAYDANG'] ?>&nbsp;&nbsp;
				</span>
				<div class="tom-tat-noi-dung-bai-hoc"><?php echo $row_top_1['TOMTAT'] ?></div>
				<iframe width="100%" height="440px" src="https://drive.google.com/file/d/<?php echo $row_top_1['IDVIDEO'] ?>/preview?autoplay=1" frameborder="0" allowfullscreen="1"></iframe>
				<br>
				<div class="col-sm-12"><?php echo $row_top_1['NOIDUNG']; ?></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function chonbai(idbg) {
      $.ajax({
        url : "ajax/ajax_xem_tiep_bai_giang.php",
        type : "post",
        dataType:"text",
        data : {
          idbg: idbg,
          idsv: <?php echo $idofsv; ?>,
       	  kh: <?php echo $id; ?>
        },
        success : function (data){
            $("#noi-dung-bai-hoc").html(data);
        }
      });
	}
</script>