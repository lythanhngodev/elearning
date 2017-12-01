
<div class="chi-tiet-lich-thi">
	<div class="row">
		<div class="col-sm-12 tieu-de-lich-thi">
			<a><?php echo $row['TENTB'] ?></a>
		</div>
		<div class="col-sm-12 thong-tin-bai-dang">
			<i>Người đăng </i><strong><?php echo $row['TENGV'] ?></strong> ngày <strong><?php echo $row['NGAYDANG'] ?></strong>
		</div>
		<div class="col-sm-12 nhan-gui">
			<?php echo $row['NOIDUNG'] ?>
		</div>
		<!--<div class="col-sm-12 thong-tin-lich-thi">
			<strong>LỊCH THI: </strong><a href="#"><i>Xem chi tiết tại đây</i></a>
		</div>
		<div class="col-sm-12 luu-y">
			<p><em>* Các múi giờ trên là giờ bắt đầu tính giờ làm bài và kết thúc thu bài. Vì vậy, yêu cầu sinh viên có mặt trước giờ thi 15 phút để Giám thị gọi vào phòng thi. Ví dụ: 08h00 – 09h00 là 1 múi giờ thi, thì 07h45' sinh viên phải có mặt tại phòng thi.</em> </p>
			<p><em>* Yêu cầu sinh viên mang theo thẻ sinh viên, CMTND hoặc giấy tờ tùy thân có dán ảnh. Sinh viên mang theo các dụng cụ thi theo quy định (bút chì, tẩy…).</em></p>
			<p><em>* Phòng Hội đồng thi – Văn phòng Trung tâm Đào tạo E-Learning. </em></p>
			<p><em>* Sinh viên cần thực hiện nghiêm túc qui chế thi </em></p>
		</div>-->
	</div>
	<div class="row">
		<div class="col-sm-12 lich-thi-lien-quan">
		<h6>BÀI VIẾT LIÊN QUAN</h6>
			<ul>
				<?php while($row = mysqli_fetch_array($ltlq)) {
				?>
					<li><a href="?p=chi-tiet-lich-thi&id=<?php echo $row['IDTB'] ?>"><?php echo $row['TENTB'] ?></a></li>
				<?php	
				} ?>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#lich-thi").addClass("active");
</script>