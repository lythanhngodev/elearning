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
           $("#qltv-modal-them-khoa-hoc").modal("hide");
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
              delay: 2000
            });
      }
</script>
<script src="ckfinder/ckfinder.js"></script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Toàn bộ sinh viên
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm sinh viên</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã sinh viên</th>
                    <th class="giua">Họ</th>
                    <th class="giua">Tên</th>
                    <th class="giua">Tên đăng nhập</th>
                    <th class="giua">SĐT</th>
                    <th class="giua">MAIL</th>
                    <th class="giua">Địa chỉ</th>
                    <th class="giua">Giới tính</th>
                    <th class="giua">Trạng thái</th>
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
                    <td class="giua" id="id-ma-giao-vien-<?php echo $row['IDSV']; ?>"><a><?php echo $row['MASV']; ?></a></td>
                    <td id="id-ho-sinh-vien-<?php echo $row['IDSV']; ?>"><?php echo $row['HOSV']; ?></td>
                    <td id="id-ten-sinh-vien-<?php echo $row['IDSV']; ?>"><?php echo $row['TENSV']; ?></td>
                    <td id="id-ten-dang-nhap-<?php echo $row['IDSV']; ?>"><?php echo $row['TENDANGNHAP']; ?></td>
                    <td id="id-so-dien-thoai-<?php echo $row['IDSV']; ?>"><?php echo $row['SDT']; ?></td>
                    <td id="id-mail-<?php echo $row['IDSV']; ?>"><?php echo $row['MAIL']; ?></td>
                    <td id="id-dia-chi-<?php echo $row['IDSV']; ?>"><?php echo $row['DIACHI']; ?></td>
                    <td id="id-gioi-tinh-<?php echo $row['IDSV']; ?>">
                    	<select id="id-gioi-tinh-<?php echo $row['IDSV']; ?>" data-el="<?php echo $row['IDSV']; ?>" class="form-control chon doigioitinh">
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
                    	<select id="id-trang-thai-<?php echo $row['IDSV']; ?>" data-el="<?php echo $row['IDSV']; ?>" class="form-control chon">
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
                    <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-giao-vien" data-el="<?php echo $row['IDSV']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-giao-vien" title="Xóa"
                        data-el="<?php echo $row['IDSV']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" id="id-hinh-anh-<?php echo $row['IDSV']; ?>" name="" value="<?php echo $row['HINHANH']; ?>">
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
        <h4 class="modal-title">Thêm giáo viên</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Mã giáo viên</label>
	          <input type="text" class="form-control" name="" id="ma-giao-vien-them" placeholder="mã giáo viên" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên giáo viên</label>
	          <input type="text" class="form-control" name="" id="ten-giao-vien-them" placeholder="tên giáo viên" required autocomplete="on">
	        </div>
          </div>
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên đăng nhập</label>
	          <input type="text" class="form-control" name="" id="ten-dang-nhap-them" placeholder="tên đăng nhập giáo viên" required autocomplete="on">
	        </div>
          </div>
		  <div class="col-md-6">
            <div class="form-group">
              <label>Địa chỉ giáo viên</label>
              <textarea class="form-control" id="dia-chi-giao-vien-them" rows="1" placeholder="địa chỉ giáo viên"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Số điện thoại</label>
	          <input type="text" class="form-control" name="" id="so-dien-thoai-them" placeholder="số điện thoại giáo viên" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Mail</label>
	          <input type="text" class="form-control" name="" id="mail-them" placeholder="mail giáo viên" required autocomplete="on">
	        </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            	<label>Loại tài khoản</label>
            	<select id="gioi-tinh-them" class="form-control">
            		<option value="1">Admin</option>
            		<option value="2" selected>Giáo viên</option>
            	</select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <button class="btn btn-default" onclick="BrowseServer()">Chọn ảnh đại diện ...</button>
              <img src="" id="hinh-anh-dai-dien-them" style="width: 100%;">
            </div>
            <input type="text" id="hinh-anh-dai-dien-them-src" hidden="hidden" name="">
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
        </div>
        <p class="help-block"> (<b>*</b>) Mật khẩu mặc định là <b>1234567</b>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-giao-vien">Xác nhận thêm</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm khóa học -->

<!-- Modal: Sửa khóa học -->
<div class="modal anil in" id="qltv-modal-sua-giao-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm giáo viên</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Mã giáo viên</label>
	          <input type="text" class="form-control" name="" id="ma-giao-vien-sua" placeholder="mã khóa học" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên giáo viên</label>
	          <input type="text" class="form-control" name="" id="ten-giao-vien-sua" placeholder="tên khóa học" required autocomplete="on">
	        </div>
          </div>
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên đăng nhập</label>
	          <input type="text" class="form-control" name="" id="ten-dang-nhap-sua" placeholder="tên khóa học" required autocomplete="on">
	        </div>
          </div>
		  <div class="col-md-6">
            <div class="form-group">
              <label>Địa chỉ giáo viên</label>
              <textarea class="form-control" id="dia-chi-giao-vien-sua" rows="1"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Số điện thoại</label>
	          <input type="text" class="form-control" name="" id="so-dien-thoai-sua" placeholder="số điện thoại" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Mail</label>
	          <input type="text" class="form-control" name="" id="mail-sua" placeholder="mail" required autocomplete="on">
	        </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <button class="btn btn-default" onclick="BrowseServer()">Chọn ảnh đại diện ...</button>
              <img src="" id="hinh-anh-dai-dien-sua" style="width: 100%;">
            </div>
            <input type="text" id="hinh-anh-dai-dien-sua-src" hidden="hidden" name="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-khoa-hoc">Xác nhận sửa</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa khóa học -->

<!-- Modal: Xóa khoa -->
<div class="modal anil in" id="qltv-modal-xoa-khoa-hoc" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Xóa khóa học</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" style="margin: 0;">Bạn có chắc muốn xóa khóa học này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="id-khoa-hoc-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-khoa-hoc">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa khoa -->

<script type="text/javascript">
    document.title = "VLUTE Elearning | Khóa học";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#toanbosinhvien").addClass("active");
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
      var host = "<?php echo $elearning['HOSTGOC']; ?>";
      host = host.substr(0,host.lastIndexOf("\/"));
      document.getElementById('hinh-anh-dai-dien-them-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
  }
  function BrowseServerSua() {
      finder.selectActionFunction = SetFileFieldSua;
      finder.popup();
  }
  function SetFileFieldSua(fileUrl) {
      document.getElementById('hinh-anh-hoc-ky-sua').src = fileUrl;
      var host = "<?php echo $elearning['HOSTGOC']; ?>";
      host = host.substr(0,host.lastIndexOf("\/"));
      document.getElementById('hinh-anh-hoc-ky-sua-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
  }
  $(document).ready(function() {
    $("#themloaisach").click(function(){
    	$("#qltv-modal-them-giao-vien").modal("show");
    });
    $("#nut-them-giao-vien").click(function(){
      $.ajax({
        url : "ajax/ajax_them_sinh_vien.php",
        type : "post",
        dataType:"text",
        data : {
          m: $("#ma-giao-vien-them").val(),
          t: $("#ten-giao-vien-them").val(),
          tdn: $("#ten-dang-nhap-them").val(),
          dc: $("#dia-chi-giao-vien-them").val(),
          sdt: $("#so-dien-thoai-them").val(),
          mail: $("#mail-them").val(),
          gt: $("#gioi-tinh-them").val(),
          hinh: $("#hinh-anh-dai-dien-them-src").val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $(".doigioitinh").change(function(){
      $.ajax({
        url : "ajax/ajax_doi_gioi_tinh_sinh_vien.php",
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

    $(".btn-sua-khoa-hoc").click(function(){
      var id = $(this).attr("data-el");
      $("#ma-khoa-hoc-sua").val($("#id-ma-khoa-hoc-"+id).text().trim());
      $("#ten-khoa-hoc-sua").val($("#id-ten-khoa-hoc-"+id).text().trim());
      $("#mo-ta-khoa-hoc-sua").val($("#id-mo-ta-"+id).text().trim());
      $("#hinh-anh-hoc-ky-sua").attr('src', "../"+$("#id-hinh-anh-"+id).val().trim());
      $("#hinh-anh-hoc-ky-sua-src").val($("#id-hinh-anh-"+id).val().trim());
      $("#thoi-gian-bat-dau-sua").val($("#id-thoi-gian-bat-dau-"+id).text().trim());
      $("#thoi-gian-ket-thuc-sua").val($("#id-thoi-gian-ket-thuc-"+id).text().trim());
      $("#thoi-gian-dang-ky-sua").val($("#id-thoi-gian-bat-dau-dang-ky-"+id).text().trim());
      $("#thoi-gian-ket-thuc-dang-ky-sua").val($("#id-thoi-gian-ket-thuc-dang-ky-"+id).text().trim());
      $("#id-khoa-hoc-sua").val(id);
      $("#qltv-modal-sua-khoa-hoc").modal("show");
    });
    $("#nut-sua-khoa-hoc").click(function(){
      $.ajax({
        url : "ajax/ajax_sua_khoa_hoc.php",
        type : "post",
        dataType:"text",
        data : {
          m: $("#ma-khoa-hoc-sua").val(),
          t: $("#ten-khoa-hoc-sua").val(),
          mt: $("#mo-ta-khoa-hoc-sua").val(),
          tgbdkh: $("#thoi-gian-bat-dau-sua").val(),
          tgktkh: $("#thoi-gian-ket-thuc-sua").val(),
          tgbddk: $("#thoi-gian-dang-ky-sua").val(),
          tgktdk: $("#thoi-gian-ket-thuc-dang-ky-sua").val(),
          hinh: $("#hinh-anh-hoc-ky-sua-src").val(),
          id: $("#id-khoa-hoc-sua").val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $(".btn-xoa-khoa-hoc").click(function(){
      var id = $(this).attr("data-el");
      $("#id-khoa-hoc-xoa").val(id);
      $("#qltv-modal-xoa-khoa-hoc").modal("show");
    });
    $("#nut-xoa-khoa-hoc").click(function(){
      $.ajax({
        url : "ajax/ajax_xoa_khoa_hoc.php",
        type : "post",
        dataType:"text",
        data : {
          id: $("#id-khoa-hoc-xoa").val()
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