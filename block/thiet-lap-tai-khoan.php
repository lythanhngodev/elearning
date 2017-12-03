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
      <a class="nav-link" data-toggle="tab" href="#lichsu" role="tab">Lịch sử khóa học</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="thongtin" role="tabpanel">
        <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Họ tên đệm</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" id="id-ho" value="<?php echo $row['HOSV'] ?>" placeholder="..." >
          </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Tên</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="<?php echo $row['TENSV'] ?>" placeholder="..." id="id-ten">
          </div>
        </div>
        <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Tên đăng nhập</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="<?php echo $row['TENDANGNHAP'] ?>" placeholder="..." id="id-tdn">
          </div>
        </div>
        <div class="form-group row">
             <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Giới tính</label>
             <div class="col-sm-7 gioi-tinh">
                <select id="id-gioi-tinh" class="form-control">
                 <?php 
                 if ($row['GIOITINH']=='Nam') { ?>
                    <option value="Nam" selected>Nam</option>
                    <option value="Nữ">Nữ</option>
                 <?php } else { ?>
                    <option value="Nữ" selected>Nữ</option>
                    <option value="Nam">Nam</option>
                 <?php } ?>
               </select>
             </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Ngày sinh</label>
            <div class='input-group date col-sm-7'>
                <input type='date' class="form-control" id="id-ngay-sinh" value="<?php echo $row['NGAYSINH'] ?>" />
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
         <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Email</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="<?php echo $row['MAIL'] ?>" placeholder="..." id="id-mail">
          </div>
        </div>
         <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Số điện thoại</label>
          <div class="col-sm-7">
            <input class="form-control" type="text" value="<?php echo $row['SDT'] ?>" placeholder="..." id="id-sdt">
          </div>
        </div>
         <div class="form-group row">
          <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Địa chỉ</label>
          <div class="col-sm-7">
            <textarea class="form-control" id="id-dia-chi" placeholder="..." rows="3"><?php echo $row['DIACHI'] ?></textarea>
          </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class="col-sm-7">
                <input type="reset" class="btn btn-secondary btn-default">
                <button class="btn btn-primary" id="id-xac-nhan-thong-tin">Xác nhận</button>
            </div>
        </div>
    </div> <!-- END TAB PANE THONG TIN -->
    <div class="tab-pane" id="hinhdaidien" role="tabpanel">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="col-md-12 cls-hinh-anh-dai-dien" style="background-image: url('<?php echo $row['HINHANH'] ?>');"></div>
            <br><br>
            <div class="col-md-12">
              <button class="btn btn-primary " id="thay-doi-anh-dai-dien">Thay đổi ảnh đại diện</button>
              <button class="btn btn-danger">Xóa</button>
            </div>
          </div>
            
        </div>
    </div>
    <!-- BEGIN PASSWORD -->
    <div class="tab-pane" id="matkhau" role="tabpanel">
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Mật khẩu cũ</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" value="" placeholder="..." id="mk">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Mật khẩu mới</label>
            <div class="col-sm-7">
               <input class="form-control" type="text" value="" placeholder="..." id="mk-m">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-text-input" class="col-sm-3 col-form-label text-sm-right">Nhập lại mật khẩu</label>
            <div class="col-sm-7">
               <input class="form-control" type="text" value="" placeholder="..." id="mk-m-m">
            </div>
        </div>
       <div class="row">
           <div class="col-sm-3"></div>
           <div class="col-sm-7">
                <input type="reset" class="btn btn-default">
                <button class="btn btn-primary" id="id-doi-mat-khau">Xác nhận</button>
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
  </div>
  <a href="?p=thong-tin-ca-nhan" class="red-thong-tin-ca-nhan"><i class="fa fa-chevron-right"> Thông tin cá nhân</i></a>
</div>
<script type="text/javascript">
  $("#id-xac-nhan-thong-tin").click(function(){
    $.ajax({
      url : "ajax/ajax_thiet_lap_tai_khoan_hoc_vien.php",
      type : "post",
      dataType:"text",
      data : {
        ho: $("#id-ho").val().trim(),
        ten: $("#id-ten").val().trim(),
        tdn: $("#id-tdn").val().trim(),
        mail: $("#id-mail").val().trim(),
        sdt: $("#id-sdt").val().trim(),
        gt: $("#id-gioi-tinh").val().trim(),
        ns: $("#id-ngay-sinh").val().trim(),
        dc: $("#id-dia-chi").val().trim(),
        idsv: <?php echo $idofsv; ?>
      },
      success : function (data){
          $("body").append(data);
      }
    });
  });
  $("#id-doi-mat-khau").click(function(){
    $.ajax({
      url : "ajax/ajax_doi_mat_khau_hoc_vien.php",
      type : "post",
      dataType:"text",
      data : {
        mk1: $("#mk").val().trim(),
        mk2: $("#mk-m").val().trim(),
        mk3: $("#mk-m-m").val().trim(),
        idsv: <?php echo $idofsv; ?>
      },
      success : function (data){
          $("body").append(data);
      }
    });
  });
</script>