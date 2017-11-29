<script type="text/javascript">
      function thanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOut'
              },
              placement: {
                from: 'bottom',
                align: 'right'
              },
              type: 'success',
              delay: 2000
            });
           $(".modal-login").removeClass('show');
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 2000);
      }
      function khongthanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOut'
              },
              placement: {
                from: 'bottom',
                align: 'right'
              },
              type: 'danger',
              delay: 2000
            });
      }
</script>
<div class="row">
	<div class="chi-tiet-khoa-hoc">
		<div class="col-sm-12">
			<h3 class="tieu-de"><?php echo $row['TENKH']; ?></h3>
			<hr>
		</div>
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-4"><img src="../<?php echo $row['HINHANHkh']; ?>" style="width:100%;min-height:192px"></div>
				<div class="col-sm-8">
					<div><strong>Mô tả: </strong><?php echo $row['MOTAKH']; ?></div>
					<div><strong>Tổng số bài học:</strong> <?php echo $row['SOBAIHOC']; ?></div>
					<div><strong>Ngày bắt đầu khóa học:</strong> <?php echo $row['TGBATDAU']; ?></div>
					<div><strong>Ngày kết thúc khóa học:</strong> <?php echo $row['TGKETTHUC']; ?></div>
					<div><strong>Ngày thi:</strong> </div>
					<div class="thong-tin-khoa-hoc">
						<i class="fa fa-eye"> 2633</i>
					</div>
					<hr>
					<div class="btn btn-primary">Bắt đầu học</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="tab-khoa-hoc">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="tab" href="#motachitiet" role="tab">Mô tả chi tiết</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="tab" href="#noidungkhoahoc" role="tab">Nội dung khóa học</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="tab" href="#giangvien" role="tab">Giảng viên</a>
	  </li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  	<div class="tab-pane active" id="motachitiet" role="tabpanel">
	  		<div class="row">
				<div class="col-sm-12">
					<div class="mo-ta-chi-tiet">
						<h4><?php echo $row['TENKH']; ?></h4>
						<p><?php echo $row['MOTACTKH']; ?></p>
					</div>
				</div>
			</div>
	  	</div>
	  	<div class="tab-pane" id="noidungkhoahoc" role="tabpanel">
			<div class="row">
				<div class="col-sm-12">
					<div class="danh-sach-bai-hoc">
						<h4>DANH SÁCH BÀI HỌC BAO GỒM :</h4>
						<ul type=none>
							<li><a href="">Bài 1: Giới thiệu về OOP và .NET Framework</a></li>
							<li><a href="">Bài 2: Các khái niệm căn bản và viết chương trình đầu tiên</a></li>
							<li><a href="">Bài 3: Biến và kiểu dữ liệu trong C#</a></li>
							<li><a href="">Bài 4: Cách chuyển đổi kiểu dữ liệu trong C#</a></li>
							<li><a href="">Bài 5: Các toán tử trong C#</a></li>
							<li><a href="">Bài 6: Cấu trúc rẽ nhánh trong #</a></li>
							<li><a href="">Bài 7: Cách sử dụng vòng lặp</a></li>
							<li><a href="">Bài 8: Đóng gói dữ liệu</a></li>
							<li><a href="">Bài 9: Cách sử dụng phương thức</a></li>
							<li><a href="">Bài 10: Kiểu Nullable trong C#</a></li>
							<li><a href="">Bài 11: Cách sử dụng mảng trong C#</a></li>
							<li><a href="">Bài 12: Chuỗi và cách sử dụng chuỗi trong C#</a></li>
							<li><a href="">Bài 13: Kiểu cấu trúc trong C#</a></li>
							<li><a href="">Bài 14: Khai báo và sử dụng kiểu liệt kê Enum</a></li>
						</ul>
					</div>
				</div>
			</div>
	  	</div>
	 	<div class="tab-pane" id="giangvien" role="tabpanel">
	 		<div class="row">
	 			<div class="col-sm-12">
	 				<div class="thong-tin-giang-vien">
	 					<h4>THÔNG TIN GIẢNG VIÊN</h4>
	 					<br>
	 					<div class="row">
	 					 	<div class="col-sm-4"><strong>Họ tên</strong></div>
	 					 	<div class="col-sm-8">Võ Hoàng Thảo Quyên</div>
	 					</div>
	 					<hr>
	 					<div class="row">
	 					 	<div class="col-sm-4"><strong>Ảnh đại diện</strong></div>
	 					 	<div class="col-sm-8"><img src="../img/tq.jpg" alt=""></div>
	 					</div>
	 					<hr>
	 					<div class="row">
	 					 	<div class="col-sm-4"><strong>Tiểu sử</strong></div>
	 					 	<div class="col-sm-8">
	 					 		<p>Nghề nghiệp: FONTEND</p>
	 					 		<p>Sở thích: Ca hát, lập trình và đọc sách</p>
	 					 	</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	</div> <!-- END TAB CONTENT -->
</div>
<div class="row">
	<div class="danh-sach-khoa-hoc-cung-chu-de danh-sach-khoa-hoc">
		<p class="tieu-de-khoa-hoc">KHÓA HỌC KHÁC</p>
		<?php while($row = mysqli_fetch_array($khoahockhac)){ ?>
		<div class="col-sm-4">
			<div class="khoa-hoc">
				<div class="hinh-anh">
					<img src="<?php echo $row['HINHANH'] ?>" alt="">
				</div>
				<div class="noi-dung">
					<div class="thong-tin">
						<a class="ngay-dang"><i class="fa fa-calendar"></i> <?php echo $row['TGBATDAU'] ?></a>
						<a class="luot-xem"><i class="fa fa-eye"></i> <?php echo $row['LUOTXEM'] ?></a>
					</div>
					<a href="" class="tieu-de"><?php echo $row['TENKH'] ?></a>
					<div class="giang-vien">
						Giảng viên: <a href=""><?php echo $row['TENGV'] ?></a>
					</div>
					<div class="bat-dau-hoc" >
						<?php if (!$dangnhap){ ?>
							<button href="" class="ghi-danh ghi-danh-chua-dang-nhap">Ghi danh</button>
						<?php }else { ?>
							<button href="" class="ghi-danh ghi-danh-da-dang-nhap" data-el="<?php echo $row['IDKH']; ?>">Ghi danh</button>
						<?php } ?>
						<button class="vao-khoa-hoc"><a href="?p=chi-tiet-khoa-hoc&id=<?php echo $row['IDKH']; ?>">Xem khóa học</a></button>
					</div>
				</div>
			</div> 
		</div> <!-- end col-khoa-hoc -->
		<?php } ?>
	</div>
</div> <!-- END danh-sach-khoa-hoc-cung-chu-de danh-sach-khoa-hoc -->
<script type="text/javascript">
	$(document).ready(function(){
		$(".ghi-danh-chua-dang-nhap").click(function(){
			$(".modal-login").addClass('show');
			khongthanhcong('Bạn cần phải đăng nhập để ghi danh!');
		});
		$(".ghi-danh-da-dang-nhap").click(function(){
	      $.ajax({
	        url : "ajax/ajax_dang_ky_hoc_vien_khoa_hoc.php",
	        type : "post",
	        dataType:"text",
	        data : {
	        	id: <?php echo $idofsv; ?>,
	        	kh: $(this).attr("data-el")
	        },
	        success : function (data){
	            $("body").append(data);
	        }
	      });		
	  });
	});
</script>