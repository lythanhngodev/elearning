<div class="row">
	<div class="col-sm-3 danh-muc-khoa-hoc-cang-le">
	<div class="danh-muc-khoa-hoc">
		<h6>DANH MỤC KHÓA HỌC</h6>
		<ul type=none>
			<?php while ($row = mysqli_fetch_array($dulieu)) { ?>
				<li><a href="?p=chi-tiet-khoa-hoc&id=<?php echo $row['IDKH']; ?>"><?php echo $row['TENKH'] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="col-sm-9">
	<div class="danh-sach-khoa-hoc">
	<div class="row">
		<?php while ($row = mysqli_fetch_array($dulieu_all)) { ?>
		<div class="col-sm-4">
			<div class="khoa-hoc">
				<div class="hinh-anh">
					<img src="../<?php echo $row['HINHANH'] ?>" alt="">
				</div>
				<div class="noi-dung">
					<div class="thong-tin">
						<a class="ngay-dang" title="Ngày bắt đầu học"><i class="fa fa-calendar"></i> <?php echo $row['TGBATDAU'] ?></a>
						<a class="luot-xem"><i class="fa fa-eye"></i> <?php echo $row['LUOTXEM'] ?></a>
					</div>
					<a href="" class="tieu-de"><?php echo $row['TENKH'] ?></a>
					<div class="giang-vien">
						Giảng viên: <a href=""><?php echo $row['TENGV'] ?></a>
					</div>
					<div class="bat-dau-hoc" >
						<button href="" class="ghi-danh">Ghi danh</button>
						<button href="" class="vao-khoa-hoc">Vào khóa học</button>
					</div>
				</div>
			</div> 
		</div> <!-- end col-khoa-hoc -->
		<?php } ?>

	</div>
</div>
</div>
</div>