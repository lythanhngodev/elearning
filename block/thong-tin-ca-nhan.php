<div class="thong-tin-ca-nhan">
	<div class="row">
		<div class="col-sm-12 mb-1">
			<h4>THÔNG TIN THÀNH VIÊN</h4>
		</div>
		<div class="col-sm-3">
			<div class=" col-md-12 cls-hinh-anh-dai-dien" style="background-image: url('<?php echo $row['HINHANH'] ?>');" alt="Ảnh đại diện">
			</div>
		</div>
		<div class="col-sm-9 thong-tin-thanh-vien">
			<div><i class="fa fa-chevron-right"></i> Tài khoản: <strong><?php echo $row['TENDANGNHAP'] ?></strong> (<?php echo $row['MAIL'] ?>)</div>
			<div><i class="fa fa-chevron-right"></i> Ngày đăng ký: <?php echo $row['NGAYDANGKY'] ?></div>
		</div>
	</div>
</div>
<div class="thong-tin-chi-tiet">
	<table class="table table-striped">
		<tbody>
			<tr>
				<th>Họ Tên</th>
				<td><?php echo $row['HOSV']." ".$row['TENSV']; ?></td>
			</tr>
			<tr>
				<th>Ngày tháng năm sinh</th>
				<td><?php echo $row['NGAYSINH'] ?></td>
			</tr>
			<tr>
				<th>Giới tính</th>
				<td><?php echo $row['GIOITINH'] ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $row['MAIL'] ?></td>
			</tr>
			<tr>
				<th>Ngày tham gia</th>
				<td><?php echo $row['NGAYDANGKY'] ?></td>
			</tr>
			<tr>
				<th>Sớ điện thoại</th>
				<td><?php echo $row['SDT'] ?></td>
			</tr>
			<tr>
				<th>Địa chỉ</th>
				<td><?php echo $row['DIACHI'] ?></td>
			</tr>
		</tbody>
	</table>
</div>
<a href="?p=thiet-lap-tai-khoan"><i class="fa fa-chevron-right"></i> Thiết lập tài khoản</a>
