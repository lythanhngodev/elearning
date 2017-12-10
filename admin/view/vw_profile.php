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
           $("#qltv-modal-them-giao-vien").modal("hide");
           $("#qltv-modal-sua-giao-vien").modal("hide");
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 3000);
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
              delay: 3000
            });
      }
</script>
<script src="ckfinder/ckfinder.js"></script>
<div class="container" style="width: 100%;">
    <section class="content-header">
      <h1>
        Thông tin cá nhân
        <div class="line"></div>
      </h1>
      <label> - Thông tin tài khoản cá nhân</label>
    </section>
      <div class="row">
        <div class="col-md-12">
    <!-- Main content -->
            <div class="col-md-12 khung-tin-bu khung-chua-bai">
              <!-- Cột trái -->
              <div class="col-md-8">
                <div class="col-md-4 hinh-anh-user">
                  <div class="col-md-12">
                    <img id="id-hinhanh" src="../<?php echo $row['HINHANH'] ?>" style="width: 100%;height: auto;margin-bottom: 10px;">
                    <input type="text" hidden="hidden" value="<?php echo $row['HINHANH'] ?>" id="id-hinhanh-ct" name="anhdaidien">
                  </div>
                  <div class="col-md-12">
                    <input type="button" class="btn btn-info col-md-12 col-ms-12" onclick="BrowseServer()" value="Chọn ảnh đại diện">
                    <p class="help-block">Nên chọn hình ảnh có tỉ lệ 1:1 để có ảnh đại diện đẹp nhất!</p>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Tên giáo viên</label>
                    <input type="text" class="form-control" id="ten" placeholder="Tên thành viên" required="" autocomplete="on" value="<?php echo $row['TENGV'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" class="form-control" id="ten-dang-nhap" placeholder="Tên đăng nhập" required="" autocomplete="on" value="<?php echo $row['TenDangNhap'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Giới tính</label>
                    <select id="gioi-tinh" class="form-control">
                      <option value="Nam" <?php if ($row['GIOITINH']=="Nam") { echo "selected=\"selected\""; } ?>>Nam</option>
                      <option value="Nữ" <?php if ($row['GIOITINH']=="Nữ") { echo "selected=\"selected\""; } ?>>Nữ</option>
                      <option value="Khác" <?php if ($row['GIOITINH']=="Khác") { echo "selected=\"selected\""; } ?>>Khác</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Mô tả bản thân</label>
                    <textarea class="form-control" id="mo-ta" rows="5"><?php echo $row['MOTA'] ?></textarea>
                    
                  </div>
                </div>
              </div>
              <!-- Cột phải -->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" id="dia-chi" placeholder="Facebook" autocomplete="on" value="http://fb.com/ly.ngothanh">
                </div>
                <div class="form-group">
                  <label>Địa chỉ mail</label>
                  <input type="text" class="form-control" id="mail" placeholder="mail" autocomplete="on" value="<?php echo $row['MAIL'] ?>">
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại" autocomplete="on" value="<?php echo $row['SDT'] ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="cach"></div>
                  <button type="submit" class="btn btn-primary" id="luu-thong-tin">Lưu thông tin</button>
                <div class="cach"></div>
              </div>
            </div>

          <div class="row"><div class="col-md-12"><div class="cach"></div></div></div>
          <div class="line"></div>
          <div class="col-md-8">
            <section class="content-header">
              <h1>
                Đổi mật khẩu
                <div class="line"></div>
              </h1>
              <label> - Thay đổi mật khẩu cá nhân</label>
            </section>
          </div>

            <div class="col-md-8 khung-tin-mk">
              <div class="form-group">
                  <label>Mật khẩu cũ</label>
                  <input type="password" class="form-control" id="mkc" placeholder="Mật khẩu cũ" required="" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Mật khẩu mới</label>
                  <input type="password" class="form-control" id="mkm" placeholder="Mật khẩu mới" required="" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Xác nhận mật khẩu mới</label>
                  <input type="password" class="form-control" id="mkmx" placeholder="Xác nhận mật khẩu mới" required="" autocomplete="off">
              </div>
              <button id="nut-doi-mat-khau" class="btn btn-primary" >Đổi mật khẩu</button>
              <div class="cach"></div>
            </div>
          </div>
      </div>
    </div>
<script type="text/javascript">
  var finder = new CKFinder();
  function BrowseServer() {
      finder.selectActionFunction = SetFileField;
      finder.popup();
  }
  function SetFileField(fileUrl) {
      document.getElementById('id-hinhanh').src = fileUrl;
      var host = "<?php echo $elearning['HOSTCON']; ?>";
      host = host.substr(0,host.lastIndexOf("\/"));
      document.getElementById('id-hinhanh-ct').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#luu-thong-tin").click(function(){
      $.ajax({
        url : "ajax/ajax_sua_thong_tin_ca_nhan.php",
        type : "post",
        dataType:"text",
        data : {
          t: $("#ten").val(),
          tdn: $("#ten-dang-nhap").val(),
          gt: $("#gioi-tinh").val(),
          mt: $("#mo-ta").val(),
          dc: $("#dia-chi").val(),
          sdt: $("#sdt").val(),
          mail: $("#mail").val(),
          hinh: $("#id-hinhanh-ct").val(),
          idgv: <?php echo $idofgv; ?>
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $("#nut-doi-mat-khau").click(function(){
      $.ajax({
        url : "ajax/ajax_doi_mat_khau_ca_nhan.php",
        type : "post",
        dataType:"text",
        data : {
          mkc: $("#mkc").val(),
          mkm: $("#mkm").val(),
          mkmx: $("#mkmx").val(),
          idgv: <?php echo $idofgv; ?>
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
  });
</script>

<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
