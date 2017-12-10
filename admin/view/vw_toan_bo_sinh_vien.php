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
          setTimeout(function(){ 
            $("#qltv-modal-sua-sinh-vien").modal("hide");
          }, 1000);
           
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
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Số sinh viên</th>
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
                    <td class="giua" id="id-ma-sinh-vien-<?php echo $row['IDSV']; ?>"><a><?php echo $row['IDSV']; ?></a></td>
                    <td id="id-ho-sinh-vien-<?php echo $row['IDSV']; ?>"><?php echo $row['HOSV']; ?></td>
                    <td id="id-ten-sinh-vien-<?php echo $row['IDSV']; ?>"><?php echo $row['TENSV']; ?></td>
                    <td id="id-ten-dang-nhap-<?php echo $row['IDSV']; ?>"><?php echo $row['TENDANGNHAP']; ?></td>
                    <td id="id-so-dien-thoai-<?php echo $row['IDSV']; ?>"><?php echo $row['SDT']; ?></td>
                    <td id="id-mail-<?php echo $row['IDSV']; ?>"><?php echo $row['MAIL']; ?></td>
                    <td id="id-dia-chi-<?php echo $row['IDSV']; ?>"><?php echo $row['DIACHI']; ?></td>
                    <td id="id-gioi-tinh-<?php echo $row['IDSV']; ?>">
                    	<select id="id-gioi-tinh-<?php echo $row['IDSV']; ?>" data-el="<?php echo $row['IDSV']; ?>" class="form-control chon doigioitinh" style="height: 28px;" >
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
                    	<select id="id-trang-thai-<?php echo $row['IDSV']; ?>" data-el="<?php echo $row['IDSV']; ?>" class="form-control chon doitrangthai" style="height: 28px;">
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
                    <td class="giua"><div class="nut nam-giua">
                      <a class="btn btn-primary btn-sua-sinh-vien" data-el="<?php echo $row['IDSV']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" title="Xóa" onclick="xoa('<?php echo $row['IDSV']; ?>')" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" id="id-hinh-anh-<?php echo $row['IDSV']; ?>" name="" value="<?php echo $row['HINHANH']; ?>">
                    <input type="text" hidden="hidden" id="id-ngay-sinhh-<?php echo $row['IDSV']; ?>" name="" value="<?php echo $row['NGAYSINH']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Sửa khóa học -->
<div class="modal fade in" id="qltv-modal-sua-sinh-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa sinh viên</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Họ sinh viên</label>
	          <input type="text" class="form-control" name="" id="ho-sinh-vien-sua" placeholder="" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên sinh viên</label>
	          <input type="text" class="form-control" name="" id="ten-sinh-vien-sua" placeholder="" required autocomplete="on">
	        </div>
          </div>
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Tên đăng nhập</label>
	          <input type="text" class="form-control" name="" id="ten-dang-nhap-sua" placeholder="" required autocomplete="on">
	        </div>
          </div>
		  <div class="col-md-6">
            <div class="form-group">
              <label>Số điện thoại</label>
              <textarea class="form-control" id="so-dien-thoai-sua" rows="1"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
	        <div class="form-group">
	          <label>Mail</label>
	          <input type="text" class="form-control" name="" id="mail-sua" placeholder="" required autocomplete="on">
	        </div>
          </div>  
          <div class="col-md-6">
  	        <div class="form-group">
  	          <label>Địa chỉ</label>
  	          <input type="text" class="form-control" name="" id="dia-chi-sua" placeholder="" required autocomplete="on">
  	        </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Ngày sinh</label>
              <input type="date" class="form-control" name="" id="ngay-sinh-sua" placeholder="" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <button class="btn btn-default" onclick="BrowseServer()">Chọn ảnh đại diện ...</button>
              <img src="" id="hinh-anh-dai-dien-sua" style="width: 108px;">
            </div>
            <input type="text" id="hinh-anh-dai-dien-sua-src" hidden="hidden" name="">
            <input type="text" value="" hidden="hidden" id="id-sinh-vien-sua" name="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-sinh-vien"><i id="nut-load"></i> Xác nhận sửa</button>
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
    $("#tbsv").addClass("active");
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
      document.getElementById('hinh-anh-dai-dien-sua').src = fileUrl;
      var host = "<?php echo $elearning['HOSTGOC']; ?>";
      host = host.substr(0,host.lastIndexOf("\/"));
      document.getElementById('hinh-anh-dai-dien-sua-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
  }
  function xoa(id){
    if (confirm('Bạn có chắc xóa sinh viên này?\nToàn bộ dữ liệu của sinh viên này sẽ bị xóa khỏi hệ thống!')) {
      $.ajax({
        url : "ajax/ajax_xoa_sinh_vien.php",
        type : "post",
        dataType:"text",
        data : {
          id: id
        },
        success : function (data){
            $("body").append(data);
        }
      });
    }
  }
  $(document).ready(function() {
    $("#themloaisach").click(function(){
    	$("#qltv-modal-them-giao-vien").modal("show");
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
    $(".doitrangthai").change(function(){
      $.ajax({
        url : "ajax/ajax_doi_trang_thai_sinh_vien.php",
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
    $(".btn-sua-sinh-vien").click(function(){
      var id = $(this).attr("data-el");
      $("#ho-sinh-vien-sua").val($("#id-ho-sinh-vien-"+id).text().trim());
      $("#ten-sinh-vien-sua").val($("#id-ten-sinh-vien-"+id).text().trim());
      $("#ten-dang-nhap-sua").val($("#id-ten-dang-nhap-"+id).text().trim());
      $("#so-dien-thoai-sua").val($("#id-so-dien-thoai-"+id).text().trim());
      $("#ngay-sinh-sua").val($("#id-ngay-sinhh-"+id).val().trim());
      $("#hinh-anh-dai-dien-sua").attr('src', "../"+$("#id-hinh-anh-"+id).val().trim());
      $("#hinh-anh-dai-dien-sua-src").val($("#id-hinh-anh-"+id).val());
      $("#mail-sua").val($("#id-mail-"+id).text().trim());
      $("#dia-chi-sua").val($("#id-dia-chi-"+id).text().trim());
      $("#id-sinh-vien-sua").val(id);
      $("#qltv-modal-sua-sinh-vien").modal("show");
    });
    $("#nut-sua-sinh-vien").click(function(){
      $("#nut-load").addClass("fa fa-circle-o-notch fa-spin");
      setTimeout(function(){
        $.ajax({
          url : "ajax/ajax_sua_sinh_vien.php",
          type : "post",
          dataType:"text",
          data : {
            tl: $("#ho-sinh-vien-sua").val(),
            t: $("#ten-sinh-vien-sua").val(),
            tdn: $("#ten-dang-nhap-sua").val(),
            sdt: $("#so-dien-thoai-sua").val(),
            h: $("#hinh-anh-dai-dien-sua-src").val(),
            m: $("#mail-sua").val(),
            dc: $("#dia-chi-sua").val(),
            ns: $("#ngay-sinh-sua").val(),
            id: $("#id-sinh-vien-sua").val()
          },
          success : function (data){
            $("#nut-load").removeClass("fa fa-circle-o-notch fa-spin");
            $("#nut-sua-sinh-vien").removeClass("btn-primary");
            $("#nut-sua-sinh-vien").addClass("btn-success");
            $("#nut-load").addClass("fa fa-check");
            $("body").append(data);
          }
        });
      }, 500);

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