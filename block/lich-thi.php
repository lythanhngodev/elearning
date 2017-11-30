<h4 style="width: fit-content;padding: 6px 6px;margin-bottom: 0px;text-shadow: 2px 0px 3px #d4d4d4;">DANH SÁCH LỊCH THI</h4>
    <hr style="margin-top: 0px;height: 10px;">
<div class="row">
<?php while($row = mysqli_fetch_array($dulieu)) { ?>
	<div class="col-md-6">
		<div class="lich-thi">
			<div class="row">
					<div class="col-sm-12">
						<div class="tieu-de-lich-thi">
							<a href="?p=chi-tiet-lich-thi&id=<?php echo $row['IDLT'] ?>"><?php echo $row['TENLT'] ?></a>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="thong-tin-nguoi-dang">
							<?php echo $row['NGAYDANG'] ?> | <?php echo $row['TENGV'] ?>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="thong-tin-lich-thi">
							<?php echo $row['TOMTAT'] ?>
						</div>
					</div>
			</div>
		</div>
	</div>
<?php
}
?>
</div>
<script type="text/javascript">
	$("#lich-thi").addClass('active');
</script>