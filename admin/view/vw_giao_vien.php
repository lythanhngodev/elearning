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
              delay: 5000
            });
      }
</script>
<script src="ckfinder/ckfinder.js"></script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Giảng viên
        <div class="line"></div>
      </h1>
      <label> - Thông tin giảng viên của VLUTE Elearning</label>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm giảng viên</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã giảng viên</th>
                    <th class="giua">Tên giảng viên</th>
                    <th class="giua">Tên đăng nhập</th>
                    <th class="giua">SĐT</th>
                    <th class="giua">MAIL</th>
                    <th class="giua">Địa chỉ</th>
                    <th class="giua">Giới tính</th>
                    <th class="giua">Trạng thái</th>
                    <th class="giua">Loại tài khoản</th>
                    <th class="giua">Thao tác</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($dulieu)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <td class="giua" id="id-ma-giao-vien-<?php echo $row['IDGV']; ?>"><a><?php echo $row['MAGV']; ?></a></td>
                    <td id="id-ten-giao-vien-<?php echo $row['IDGV']; ?>"><?php echo $row['TENGV']; ?></td>
                    <td id="id-ten-dang-nhap-<?php echo $row['IDGV']; ?>"><?php echo $row['TenDangNhap']; ?></td>
                    <td id="id-so-dien-thoai-<?php echo $row['IDGV']; ?>"><?php echo $row['SDT']; ?></td>
                    <td id="id-mail-<?php echo $row['IDGV']; ?>"><?php echo $row['MAIL']; ?></td>
                    <td id="id-dia-chi-<?php echo $row['IDGV']; ?>"><?php echo $row['DIACHI']; ?></td>
                    <td id="id-gioi-tinh-<?php echo $row['IDGV']; ?>">
                    	<select id="id-gioi-tinh-<?php echo $row['IDGV']; ?>" data-el="<?php echo $row['IDGV']; ?>" class="form-control chon doigioitinh" style="height: 28px;">
                    	<?php if ($row['GIOITINH']=='Nam') { ?>
                    		<option value="Nam" selected >Nam</option>
                    		<option value="Nữ">Nữ</option>
                    		<option value="Khác">Khác</option>
                    	<?php } ?>
                    	<?php if ($row['GIOITINH']=='Nữ') { ?>
                    		<option value="Nam">Nam</option>
                    		<option value="Nữ" selected >Nữ</option>
                    		<option value="Khác">Khác</option>
                    	<?php } ?>
                    	<?php if ($row['GIOITINH']=='Khác'){ ?>
                    		<option value="Nam">Nam</option>
                    		<option value="Nữ" >Nữ</option>
                    		<option value="Khác" selected>Khác</option>            		
                    	<?php } ?>
                    	</select>
                    </td>
                    <td class="giua">
                    	<select id="id-trang-thai-<?php echo $row['IDGV']; ?>" data-el="<?php echo $row['IDGV']; ?>" class="form-control chon doitrangthai" style="height: 28px;">
                    	<?php if ($row['TRANGTHAI']==0) { ?>
                    		<option value="0" selected >Bình thường</option>
                    		<option value="1">Bị cấm</option>
                    	<?php } ?>
                    	<?php if ($row['TRANGTHAI']==1) { ?>
                    		<option value="0">Bình thường</option>
                    		<option value="1" selected >Bị cấm</option>
                    	<?php } ?>
                    	</select>
                    </td>
                    <td id="id-loai-tai-khoan-<?php echo $row['IDGV']; ?>">
                    	<select id="id-loai-tai-khoan-<?php echo $row['IDGV']; ?>" data-el="<?php echo $row['IDGV']; ?>" class="form-control chon doiloaitaikhoan" style="height: 28px;">
                    	<?php if ($row['LOAITAIKHOAN']==1) { ?>
                    		<option value="1" selected>ADMIN</option>
                    		<option value="2">GIÁO VIÊN</option>
                    	<?php } ?>
                    	<?php if ($row['LOAITAIKHOAN']==2) { ?>
                    		<option value="2" selected>GIÁO VIÊN</option>
                    		<option value="1">ADMIN</option>
                    	<?php } ?>
                    	</select>

                    </td>
                    <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-giao-vien" data-el="<?php echo $row['IDGV']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-giao-vien" title="Xóa"
                        data-el="<?php echo $row['IDGV']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" id="id-hinh-anh-<?php echo $row['IDGV']; ?>" name="" value="<?php echo $row['HINHANH']; ?>">
                    <input type="text" hidden="hidden" id="id-mo-ta-<?php echo $row['IDGV']; ?>" name="" value="<?php echo $row['MOTA']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm khóa học -->
<div class="modal anil in" id="qltv-modal-them-giao-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm giảng viên</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Mã giảng viên</label>
	          <input type="text" class="form-control" name="" id="ma-giao-vien-them" placeholder="mã giảng viên" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên giảng viên</label>
	          <input type="text" class="form-control" name="" id="ten-giao-vien-them" placeholder="tên giảng viên" required autocomplete="on">
	        </div>
          </div>
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên đăng nhập</label>
	          <input type="text" class="form-control" name="" id="ten-dang-nhap-them" placeholder="tên đăng nhập giảng viên" required autocomplete="on">
	        </div>
          </div>
		  <div class="col-md-6">
            <div class="form-group">
              <label>Địa chỉ giảng viên</label>
              <textarea class="form-control" id="dia-chi-giao-vien-them" rows="1" placeholder="địa chỉ giảng viên"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Số điện thoại</label>
	          <input type="text" class="form-control" name="" id="so-dien-thoai-them" placeholder="số điện thoại giảng viên" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Mail</label>
	          <input type="text" class="form-control" name="" id="mail-them" placeholder="mail giảng viên" required autocomplete="on">
	        </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            	<label>Loại tài khoản</label>
            	<select id="loai-tai-khoan-them" class="form-control">
            		<option value="1">Admin</option>
            		<option value="2" selected>Giáo viên</option>
            	</select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Giới tính</label>
              <select id="gioi-tinh-them" class="form-control">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác" selected>Khác</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Mô tả</label>
              <textarea type="text" class="form-control" name="" id="mo-ta-them" placeholder="mô tả thêm" required autocomplete="on" rows="4"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <button class="btn btn-default" onclick="BrowseServer()">Chọn ảnh đại diện ...</button>
              <img src="" id="hinh-anh-dai-dien-them" style="width: 100%;">
            </div>
            <input type="text" id="hinh-anh-dai-dien-them-src" hidden="hidden" name="">
          </div>
        </div>
        <p class="help-block"> (<b>*</b>) Mật khẩu tự động sẽ được gửi đến mail của giáo viên.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-giao-vien"><i id="nut-load"></i> Xác nhận thêm</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm khóa học -->

<!-- Modal: Sửa giáo viên -->
<div class="modal anil in" id="qltv-modal-sua-giao-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa giảng viên</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <label>Mã giảng viên</label>
            <input type="text" class="form-control" name="" id="ma-giao-vien-sua" placeholder="mã giảng viên" required autocomplete="on">
          </div>
          </div>  
          <div class="col-md-6">
          <div class="form-group">
            <label>Tên giảng viên</label>
            <input type="text" class="form-control" name="" id="ten-giao-vien-sua" placeholder="tên giảng viên" required autocomplete="on">
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" name="" id="ten-dang-nhap-sua" placeholder="tên đăng nhập giảng viên" required autocomplete="on">
          </div>
          </div>
      <div class="col-md-6">
            <div class="form-group">
              <label>Địa chỉ giảng viên</label>
              <textarea class="form-control" id="dia-chi-giao-vien-sua" rows="1" placeholder="địa chỉ giảng viên"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="" id="so-dien-thoai-sua" placeholder="số điện thoại giảng viên" required autocomplete="on">
          </div>
          </div>  
          <div class="col-md-6">
          <div class="form-group">
            <label>Mail</label>
            <input type="text" class="form-control" name="" id="mail-sua" placeholder="mail giảng viên" required autocomplete="on">
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <button class="btn btn-default" onclick="BrowseServerSua()">Chọn ảnh đại diện ...</button>
              <img src="" id="hinh-anh-dai-dien-sua" style="width: 100px;">
            </div>
            <input type="text" id="hinh-anh-dai-dien-sua-src" hidden="hidden" name="">
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Mô tả</label>
              <textarea type="text" class="form-control" name="" id="mo-ta-sua" placeholder="mô tả sửa" required autocomplete="on" rows="4"></textarea>
            </div>
          </div>
        </div>
        <p class="help-block"> (<b>*</b>) Mật khẩu khi reset sẽ được gửi tự động đến mail của giảng viên.</p>
      </div>
      <input type="text" name="" id="id-id-giao-vien-sua" hidden="hidden" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-warning" id="nut-reset-giao-vien"><i id="loading-reset"></i> Reset mật khẩu</button>
        <button type="button" class="btn btn-primary" id="nut-sua-giao-vien">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa giảng viên -->

<!-- Modal: Xóa khoa -->
<div class="modal anil in" id="qltv-modal-xoa-giao-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Xóa giảng viên</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" style="margin: 0;">Bạn có chắc muốn xóa giảng viên này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="id-giang-vien-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-giang-vien">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa khoa -->

<script type="text/javascript">
    document.title = "VLUTE Elearning | Giảng viên";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#giaovien").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  var finder = new CKFinder();
  function BrowseServer() {
      finder.selectActionFunction = SetFileField;
      finder.popup();
  }
  function SetFileField(fileUrl) {
      document.getElementById('hinh-anh-dai-dien-them').src = fileUrl;
      var host = "<?php echo $elearning['HOSTCON']; ?>";
      host = host.substr(0,host.lastIndexOf("\/"));
      document.getElementById('hinh-anh-dai-dien-them-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
  }
  function BrowseServerSua() {
      finder.selectActionFunction = SetFileFieldSua;
      finder.popup();
  }
  function SetFileFieldSua(fileUrl) {
      document.getElementById('hinh-anh-dai-dien-sua').src = fileUrl;
      var host = "<?php echo $elearning['HOSTCON']; ?>";
      host = host.substr(0,host.lastIndexOf("\/"));
      document.getElementById('hinh-anh-dai-dien-sua-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
  }
  function themload(){
    $("#nut-load").addClass("fa fa-circle-o-notch fa-spin");
  }
  $(document).ready(function() {
    $("#themloaisach").click(function(){
    	$("#qltv-modal-them-giao-vien").modal("show");
    });
    $("#nut-them-giao-vien").click(function(){
      themload();
      $.ajax({
        url : "ajax/ajax_them_giao_vien.php",
        type : "post",
        dataType:"text",
        data : {
          m: $("#ma-giao-vien-them").val(),
          t: $("#ten-giao-vien-them").val(),
          tdn: $("#ten-dang-nhap-them").val(),
          mt: $("#mo-ta-them").val(),
          dc: $("#dia-chi-giao-vien-them").val(),
          sdt: $("#so-dien-thoai-them").val(),
          mail: $("#mail-them").val(),
          gt: $("#gioi-tinh-them").val(),
          hinh: $("#hinh-anh-dai-dien-them-src").val(),
          loai: $("#loai-tai-khoan-them").val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $(".doigioitinh").change(function(){
      $.ajax({
        url : "ajax/ajax_doi_gioi_tinh_giao_vien.php",
        type : "post",
        dataType:"text",
        data : {
          ma: $(this).attr("data-el"),
          gt: $(this).val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $(".doitrangthai").change(function(){
      $.ajax({
        url : "ajax/ajax_doi_trang_thai_giao_vien.php",
        type : "post",
        dataType:"text",
        data : {
          ma: $(this).attr("data-el"),
          tt: $(this).val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $(".doiloaitaikhoan").change(function(){
      $.ajax({
        url : "ajax/ajax_doi_loai_tai_khoan_giao_vien.php",
        type : "post",
        dataType:"text",
        data : {
          ma: $(this).attr("data-el"),
          ltk: $(this).val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $(".btn-sua-giao-vien").click(function(){
      var id = $(this).attr("data-el");
      $("#ma-giao-vien-sua").val($("#id-ma-giao-vien-"+id).text().trim());
      $("#ten-giao-vien-sua").val($("#id-ten-giao-vien-"+id).text().trim());
      $("#ten-dang-nhap-sua").val($("#id-ten-dang-nhap-"+id).text().trim());
      $("#hinh-anh-dai-dien-sua").attr('src', "../"+$("#id-hinh-anh-"+id).val().trim());
      $("#hinh-anh-dai-dien-sua-src").val($("#id-hinh-anh-"+id).val().trim());
      $("#dia-chi-giao-vien-sua").val($("#id-dia-chi-"+id).text().trim());
      $("#mo-ta-sua").val($("#id-mo-ta-"+id).val().trim());
      $("#so-dien-thoai-sua").val($("#id-so-dien-thoai-"+id).text().trim());
      $("#mail-sua").val($("#id-mail-"+id).text().trim());
      $("#id-id-giao-vien-sua").val(id);
      $("#qltv-modal-sua-giao-vien").modal("show");
    });
    $("#nut-sua-giao-vien").click(function(){
      $.ajax({
        url : "ajax/ajax_sua_giao_vien.php",
        type : "post",
        dataType:"text",
        data : {
          m: $("#ma-giao-vien-sua").val(),
          t: $("#ten-giao-vien-sua").val(),
          tdn: $("#ten-dang-nhap-sua").val(),
          mt: $("#mo-ta-sua").val(),
          hinh: $("#hinh-anh-dai-dien-sua-src").val(),
          dc: $("#dia-chi-giao-vien-sua").val(),
          sdt: $("#so-dien-thoai-sua").val(),
          mail: $("#mail-sua").val(),
          idgv: $("#id-id-giao-vien-sua").val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $("#nut-reset-giao-vien").click(function(){
      if (confirm('Bạn có chắc Reset mật khẩu cho giảng viên này?')) {
        $("#loading-reset").addClass("fa fa-circle-o-notch fa-spin");
        $.ajax({
          url : "ajax/ajax_reset_mat_khau_giang_vien.php",
          type : "post",
          dataType:"text",
          data : {
            id: $("#id-id-giao-vien-sua").val()
          },
          success : function (data){
              $("body").append(data);
          }
        });
      }
    });
    $(".btn-xoa-giao-vien").click(function(){
      var id = $(this).attr("data-el");
      $("#id-giang-vien-xoa").val(id);
      $("#qltv-modal-xoa-giao-vien").modal("show");
    });
    $("#nut-xoa-giang-vien").click(function(){
      $.ajax({
        url : "ajax/ajax_xoa_giang_vien.php",
        type : "post",
        dataType:"text",
        data : {
          id: $("#id-giang-vien-xoa").val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>
<style type="text/css">
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
	    padding: 5px;
	}
</style>