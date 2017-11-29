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
					<a href="?p=noi-dung-khoa-hoc&id=<?php echo $id; ?>" class="btn btn-primary">Bắt đầu học</a>
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
						<?php 
							$stt=1;
							while ($row = mysqli_fetch_array($danhsachbaihoc)) { ?>
							<li><a href="#"><?php echo $stt.". ".$row['TENBAI'] ?></a></li>
						<?php $stt++;} ?>
							
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
	 					 	<div class="col-sm-8"><?php echo $rowgv['TENGV'] ?></div>
	 					</div>
	 					<hr>
	 					<div class="row">
	 					 	<div class="col-sm-4"><strong>Ảnh đại diện</strong></div>
	 					 	<div class="col-sm-8"><img src="<?php echo $rowgv['HINHANH'] ?>" alt="" style="width: 135px;height: auto;"></div>
	 					</div>
	 					<hr>
	 					<div class="row">
	 					 	<div class="col-sm-4"><strong>Tiểu sử</strong></div>
	 					 	<div class="col-sm-8">
	 					 		<p>
	 					 			<?php echo $rowgv['MOTA'] ?>
	 					 		</p>
	 					 	</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	</div> <!-- END TAB CONTENT -->
</div>
<div class="row">
	<div class="danh-sach-khoa-hoc-cung-chu-de danh-sach-khoa-hoc col-md-12">
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