<script type="text/javascript">
      function thanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOut'
              },
              placement: {
                from: 'bottom',
                align: 'left'
              },
              type: 'success',
              delay: 2000
            });
           $(".modal-login").removeClass('show');
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 2000);
      }
      function dongsua() {
        $("#qltv-modal-sua-khoa-hoc").modal("hide");
      }
      function dongxoa(){
        $("#qltv-modal-xoa-dg").modal("hide");
      }
      function khongthanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOut'
              },
              placement: {
                from: 'bottom',
                align: 'left'
              },
              type: 'danger',
              delay: 2000
            });
      }
</script>
<div class="nen-den"></div>
<div id="id-modal-login" class="modal-login">
	<a class="nutx" style="right: 10px;"><i class="fa fa-close"></i></a>
	<ul class="nav nav-tabs" role="tablist" style="padding-top: 10px;">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="tab" href="#dangnhap" role="tab">Đăng nhập</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="tab" href="#dangky" role="tab">Đăng ký</a>
	  </li>
	</ul>
	<div class="tab-content">
	    <div class="tab-pane active" id="dangnhap" role="tabpanel">
	  	<!-- BEGIN FORM LOGIN -->
	  	<form action="login.php" method="post">
		 	<div class="alert alert-warning mt-1" role="alert">
			  Đăng nhập học viên để trải nghiệm đầy đủ các tiện ích trên trang
			</div>
		  	<div class="input-group mb-1">
			  	<span class="input-group-addon"><i class="fa fa-user"></i></span>
			  	<input type="text" class="form-control" id="ten-dang-nhap-mail" placeholder="Tên đăng nhập hoặc địa chỉ Email" aria-describedby="basic-addon1" required name="usernamedn">
			</div>
			<div class="input-group">
			  	<span class="input-group-addon"><i class="fa fa-key"></i></span>
			  	<input type="password" class="form-control" placeholder="Mật khẩu" aria-describedby="basic-addon1" required name="passworddn">
			</div>
			<input type="submit" class="btn btn-primary mt-1 mb-1" id="nut-dang-nhap" value="Đăng nhập" >
	  	</form>

			<a href="" class="quenpass">Quên mật khẩu?</a>
		</div>
	  	<!-- END FORM LOGIN -->
	  	<!-- BEGIN FORM REGISTER -->
	   <div class="tab-pane" id="dangky" role="tabpanel">
		 		<div class="alert alert-warning mt-1" role="alert">
				  Để đăng ký học viên, bạn cần khai báo đầy đủ thông tin bên dưới
				</div>
				<input type="text" class="form-control mb-1" id="ten" placeholder="Tên" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" id="ho-dem" placeholder="Họ tên đệm" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" id="ten-dang-nhap" placeholder="Tên đăng nhập" aria-describedby="basic-addon1">
			  	<input type="password" class="form-control mb-1" id="mat-khau" placeholder="Mật khẩu" aria-describedby="basic-addon1">
			  	<input type="password" class="form-control mb-1" id="mat-khau-2" placeholder="Nhập lại mật khẩu" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" id="mail" placeholder="Email" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" id="so-dien-thoai" placeholder="Số điện thoại" aria-describedby="basic-addon1">
			  	<div class="form-group">
				    <select class="form-control" id="gioi-tinh">
				      <option value="Nam">Nam</option>
				      <option value="Nữ">Nữ</option>
				      <option value="Khác">Khác</option>
				    </select>
				</div>
                <div class="form-group">
	                <div class='input-group date' >
	                    <input type='date' class="form-control ngay-sinh" id=""/>
	                    <span class="input-group-addon">
	                        <span class="fa fa-calendar"></span>
	                    </span>
	                </div>
	            </div>
	            <textarea class="form-control mb-1" placeholder="Địa chỉ" rows="4" id="dia-chi"></textarea>
                <button class="btn btn-primary d-inline mb-1" name="" id="nut-dang-ky">Đăng ký học viên</button>
	   </div>
		 <!-- END REGISTER -->
	</div>
</div>
<!-- END MODEL LOGIN -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#nut-dang-ky").click(function(){
	      $.ajax({
	        url : "ajax/ajax_dang_ky_hoc_vien.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ten: $("#ten").val().trim(),
	          hodem: $("#ho-dem").val().trim(),
	          tdn: $("#ten-dang-nhap").val().trim(),
	          mk: $("#mat-khau").val().trim(),
	          mk2: $("#mat-khau-2").val().trim(),
	          mail: $("#mail").val().trim(),
	          sdt: $("#so-dien-thoai").val().trim(),
	          gt: $("#gioi-tinh").val().trim(),
	          ns: $(".ngay-sinh").val().trim(),
	          dc: $("#dia-chi").val().trim()
	        },
	        success : function (data){
	            $("body").append(data);
	        }
	      });
		});
	});
</script>
