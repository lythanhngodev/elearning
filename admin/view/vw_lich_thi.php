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
           $("#qltv-modal-sua-lich-thi").modal("hide");
           $("#qltv-modal-xoa-tb").modal("hide");
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 3000);
      }
      function dongsua() {
        $("#qltv-modal-sua-khoa-hoc").modal("hide");
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
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thông báo
        <div class="line"></div>
      </h1>
      <label> - Thông tin thông báo của trung tâm Elearning. Thông báo lịch thi. Thông báo lớp khai giảng.</label>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-play"></i> Thêm thông báo</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Tiêu đề</th>
                    <th class="giua">Ngày đăng</th>
                    <th class="giua">Tóm tắt</th>
                    <th class="giua">Ẩn</th>
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
                    <td id="id-ten-tb-<?php echo $row['IDTB']; ?>"><?php echo $row['TENTB']; ?></td>
                    <td id="id-ngay-dang-<?php echo $row['IDTB']; ?>"><?php echo $row['NGAYDANG']; ?></td>
                    <td id="id-tom-tat-tb-<?php echo $row['IDTB']; ?>"><?php echo $row['TOMTAT']; ?></td>
                    <td class="giua">
                    	<?php if ($row['ANHIEN']==0) { ?>
                    		<input type="checkbox" name="" id="id-an-hien-<?php echo $row['IDTB'] ?>" onclick="anhien('<?php echo $row['IDTB'] ?>')" style="width: 20px;height: 20px;">
                    	<?php } ?>
                    	<?php if ($row['ANHIEN']==1){ ?>
                        <input type="checkbox" name="" checked id="id-an-hien-<?php echo $row['IDTB'] ?>" onclick="anhien('<?php echo $row['IDTB'] ?>')" style="width: 20px;height: 20px;">
                    	<?php } ?>
                    </td>
                    <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-tb" data-el="<?php echo $row['IDTB']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-tb" title="Xóa"
                        data-el="<?php echo $row['IDTB']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <textarea id="id-noi-dung-tb-<?php echo $row['IDTB']; ?>" hidden=""><?php echo $row['NOIDUNG'] ?></textarea>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm thông báo -->
<div class="modal anil in" id="qltv-modal-them-giao-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm thông báo</h4>
      </div>
      <div class="modal-body">
	        <div class="form-group">
	          <label>Tiêu đề thông báo</label>
	          <input type="text" class="form-control" name="" id="tieu-de-thong-bao-them" placeholder="tiêu đề thông báo" required autocomplete="on">
	        </div>
          <div class="form-group">
            <label>Tóm tắt thông báo</label>
            <textarea class="form-control" name="" id="tom-tat-thong-bao-them" placeholder="tóm tắt thông báo" required rows="5"></textarea>
          </div>
          <div class="form-group">
            <label>Nội dung thông báo</label>
            <textarea class="form-control" id="noi-dung-thong-bao-them"></textarea>
          </div>
        <p class="help-block"> (<b>*</b>) Có thể ẩn hoặc hiển thị thông báo ngay sau khi thêm thành công thông báo.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-thong-bao">Xác nhận thêm</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm thông báo -->

<!-- Modal: Sửa thông báo -->
<div class="modal anil in" id="qltv-modal-sua-lich-thi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa thông báo</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Tiêu đề thông báo</label>
            <input type="text" class="form-control" name="" id="tieu-de-thong-bao-sua" placeholder="tiêu đề thông báo" required autocomplete="on">
          </div>
          <div class="form-group">
            <label>Tóm tắt thông báo</label>
            <textarea class="form-control" name="" id="tom-tat-thong-bao-sua" placeholder="tóm tắt thông báo" required rows="5"></textarea>
          </div>
          <div class="form-group">
            <label>Nội dung thông báo</label>
            <textarea class="form-control" id="noi-dung-thong-bao-sua"></textarea>
          </div>
          <input type="text" hidden id="id-thong-bao-sua" name="">
        <p class="help-block"> (<b>*</b>) Có thể ẩn hoặc hiển thị thông báo ngay sau khi thêm thành công thông báo.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-thong-bao">Xác nhận thêm</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa thông báo -->

<!-- Modal: Xóa khoa -->
<div class="modal anil in" id="qltv-modal-xoa-tb" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Xóa thông báo</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" style="margin: 0;">Bạn có chắc muốn xóa thông báo này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="id-thong-bao-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-tb">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa khoa -->
<script>
    CKEDITOR.replace( 'noi-dung-thong-bao-them', {
      filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
        CKEDITOR.replace( 'noi-dung-thong-bao-sua', {
        filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
      });
</script>
<script type="text/javascript">
    document.title = "VLUTE Elearning | Lịch thi";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#lichthi").addClass("active");
	});
  function anhien(id){
    var hien = 1;
    if(document.getElementById('id-an-hien-'+id).checked)
      hien=0;
      $.ajax({
        url : "ajax/ajax_an_hien_thong_bao.php",
        type : "post",
        dataType:"text",
        data : {
          hienan: hien,
          id: id
        },
        success : function (data){
            $("body").append(data);
        }
      });
  }
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $("#themloaisach").click(function(){
    	$("#qltv-modal-them-giao-vien").modal("show");
    });
    $("#nut-them-thong-bao").click(function(){
      $.ajax({
        url : "ajax/ajax_them_thong_bao.php",
        type : "post",
        dataType:"text",
        data : {
          td: $("#tieu-de-thong-bao-them").val(),
          tt: $("#tom-tat-thong-bao-them").val(),
          nd: CKEDITOR.instances['noi-dung-thong-bao-them'].getData(),
          id: <?php echo $idofgv; ?>
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    
    $(".btn-sua-tb").click(function(){
      var id = $(this).attr("data-el");
      $("#tieu-de-thong-bao-sua").val($("#id-ten-tb-"+id).text().trim());
      $("#tom-tat-thong-bao-sua").val($("#id-tom-tat-tb-"+id).text().trim());
      CKEDITOR.instances['noi-dung-thong-bao-sua'].setData($("#id-noi-dung-tb-"+id).val().trim());
      $("#id-thong-bao-sua").val(id);
      $("#qltv-modal-sua-lich-thi").modal("show");
    });
    $("#nut-sua-thong-bao").click(function(){
      $.ajax({
        url : "ajax/ajax_sua_thong_bao.php",
        type : "post",
        dataType:"text",
        data : {
          td: $("#tieu-de-thong-bao-sua").val(),
          tt: $("#tom-tat-thong-bao-sua").val(),
          nd: CKEDITOR.instances['noi-dung-thong-bao-sua'].getData(),
          idtb: $("#id-thong-bao-sua").val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
    $(".btn-xoa-tb").click(function(){
      $("#id-thong-bao-xoa").val($(this).attr("data-el"));
      $("#qltv-modal-xoa-tb").modal("show");
    });
    $("#nut-xoa-tb").click(function(){
      $.ajax({
        url : "ajax/ajax_xoa_thong_bao.php",
        type : "post",
        dataType:"text",
        data : {
          id: $("#id-thong-bao-xoa").val().trim()
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