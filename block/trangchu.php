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
	<div class="col-sm-3 danh-muc-khoa-hoc-cang-le">
		<div class="danh-muc-khoa-hoc">
			<h6>KHÓA HỌC ĐANG MỞ</h6>
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
		</div>
	</div>
</div>
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