<div class="nen-den"></div>
<div class="modal-login">
	<a href="" class="nutx"><i class="fa fa-close"></i></a>
	<ul class="nav nav-tabs" role="tablist">
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
			<form method="POST" action="exemple.com">
			 	<div class="alert alert-warning mt-1" role="alert">
				  Đăng nhập thành viên để trải nghiệm đầy đủ các tiện ích trên trang
				</div>
			  	<div class="input-group mb-1">
				  	<span class="input-group-addon"><i class="fa fa-user"></i></span>
				  	<input type="text" class="form-control" placeholder="Tên đăng nhập hoặc địa chỉ Email" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  	<span class="input-group-addon"><i class="fa fa-key"></i></span>
				  	<input type="text" class="form-control" placeholder="Tên đăng nhập hoặc địa chỉ Email" aria-describedby="basic-addon1">
				</div>
				<input type="submit" class="btn btn-primary mt-1 mb-1" value="Đăng nhập">
				<a href="" class="quenpass">Quên mật khẩu?</a>
   	     	</form>
		</div>
	  	<!-- END FORM LOGIN -->
	  	<!-- BEGIN FORM REGISTER -->
	   <div class="tab-pane" id="dangky" role="tabpanel">
		 	<form>
		 		<div class="alert alert-warning mt-1" role="alert">
				  Để đăng ký thành viên, bạn cần khai báo đầy đủ thông tin bên dưới
				</div>
			  	<input type="text" class="form-control mb-1 mt-1" placeholder="Tên đăng nhập hoặc địa chỉ Email" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" placeholder="Tên đăng nhập" aria-describedby="basic-addon1">
			  	<input type="password" class="form-control mb-1" placeholder="Mật khẩu" aria-describedby="basic-addon1">
			  	<input type="password" class="form-control mb-1" placeholder="Nhập lại mật khẩu" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" placeholder="Email" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" placeholder="Tên" aria-describedby="basic-addon1">
			  	<input type="text" class="form-control mb-1" placeholder="Họ tên đệm" aria-describedby="basic-addon1">
			  	<div class="form-group">
				    <select class="form-control" id="exampleSelect1">
				      <option>Nam</option>
				      <option>Nữ</option>
				    </select>
				</div>
                <div class="form-group">
	                <div class='input-group date' >
	                    <input type='text' class="form-control" id="datetimepicker1"/>
	                    <span class="input-group-addon">
	                        <span class="fa fa-calendar"></span>
	                    </span>
	                </div>
	            </div>
	            <textarea class="form-control mb-1" placeholder="Địa chỉ" rows="4" id="comment"></textarea>
                <input type="submit" class="btn btn-primary d-inline mb-1" name="" value="Đăng ký thành viên">
                <input type="reset" class="btn btn-secondary d-inline mb-1" name="" value="Thiết lập lại">
			</form> 	
	   </div>
		 <!-- END REGISTER -->
	</div>
</div>
<!-- END MODEL LOGIN -->
