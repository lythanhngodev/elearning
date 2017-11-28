<div class="thiet-lap-tai-khoan">
  <h4>THIẾT LẬP TÀI KHOẢN</h4>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#thongtin" role="tab">Thông tin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#hinhdaidien" role="tab">Hình đại diện</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#matkhau" role="tab">Mật khẩu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#lichsu" role="tab">Lịch sử</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#khac" role="tab">Khác</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="thongtin" role="tabpanel">
        <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Họ tên đệm</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="" placeholder="..." id="example-text-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Tên</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="" placeholder="..." id="example-text-input">
          </div>
        </div>
        <div class="form-group row">
             <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Giới tính</label>
             <div class="col-sm-7 gioi-tinh">
                 <label class="custom-control custom-radio">
                  <input id="radio1" name="radio" type="radio" class="custom-control-input" checked>
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"> Nam</span>
                </label>
                <label class="custom-control custom-radio">
                  <input id="radio2" name="radio" type="radio" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"> Nữ</span>
                </label>
             </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Ngày sinh</label>
            <div class='input-group date col-sm-7'>
                <input type='text' class="form-control" id="datetimepicker2"/>
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
         <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Email</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="" placeholder="..." id="example-text-input">
          </div>
        </div>
         <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Số điện thoại</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="" placeholder="..." id="example-text-input">
          </div>
        </div>
         <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Địa chỉ</label>
          <div class="col-sm-7">
            <textarea class="form-control" id="exampleTextarea" placeholder="..." rows="3"></textarea>
          </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class="col-sm-7">
                <input type="reset" class="btn btn-secondary btn-sm">
                <input type="submit" class="btn btn-primary btn-sm" value="Xác nhận">
            </div>
        </div>
    </div> <!-- END TAB PANE THONG TIN -->
    <div class="tab-pane" id="hinhdaidien" role="tabpanel">
        <div class="row">
            <img src="../img/tq.jpg" class="mb-1" alt="" style="width:360px;height:460px">
        </div>
        <div class="row">
            <a href="#" class="btn btn-primary btn-sm thay-doi-anh-dai-dien">Thay đổi ảnh đại diện</a>
            <a href="#" class="btn btn-danger btn-sm">Xóa</a>
        </div>
    </div>
    <!-- BEGIN PASSWORD -->
    <div class="tab-pane" id="matkhau" role="tabpanel">
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Mật khẩu cũ</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="" placeholder="..." id="example-text-input">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Mật khẩu mới</label>
            <div class="col-sm-7">
               <input class="form-control" type="text" value="" placeholder="..." id="example-text-input">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Nhập lại mật khẩu</label>
            <div class="col-sm-7">
               <input class="form-control" type="text" value="" placeholder="..." id="example-text-input">
            </div>
        </div>
       <div class="row">
           <div class="col-sm-3"></div>
           <div class="col-sm-7">
                <input type="reset" class="btn btn-secondary btn-sm">
                <a href="#" class="btn btn-primary btn-sm">Xác nhận</a>
           </div>
        </div>
    </div> <!-- END PASSWORD -->
    <!-- BEGIN LICH SU -->
    <div class="tab-pane" id="lichsu" role="tabpanel">
        <table class="table lich-su">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên khóa học</th>
              <th>Ngày bắt đầu - kết thúc</th>
              <th>Kết quả</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Lập trình C# căn bản</td>
              <td>10/10/2017 - 12/12/2017</td>
              <td><span class="ket-qua-dat">HOÀN THÀNH</span></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Lập trình PHP</td>
              <td>10/10/2017 - 12/12/2017</td>
              <td><span class="ket-qua-dat">HOÀN THÀNH</span></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Hệ điều hành</td>
              <td>10/10/2017 - 12/12/2017</td>
              <td><span class="ket-qua-khong-dat">KHÔNG ĐẠT</span></td>
            </tr>
          </tbody>
        </table>
    </div> <!-- END LICH SU -->
     <div class="tab-pane" id="khac" role="tabpanel">
        
     </div>
  </div>
  <a href="" class="red-thong-tin-ca-nhan"><i class="fa fa-chevron-right"> Thông tin cá nhân</i></a>
</div>