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
           $("#qltv-modal-them-bai-giang").modal("hide");
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
<style type="text/css">
  .line{
      width: 100%;
      height: 2px;
      float: left;
      background: #ececec;
      margin-bottom: 10px;
  }
  .nut .btn {
    padding: 0px 5px;
}
</style>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bài giảng
        
      </h1>
      <label> - Thông tin các bài giảng của giảng viên!</label>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-ms-3">
          <div class="form-group">
            <label>Khóa học</label>
            <select id="ma-khoa-hoc" class="form-control selectpicker" data-live-search="true" title="chọn khóa học">
              <?php while ($row = mysqli_fetch_assoc($khoahoc)) {
              ?>
                <option data-tokens="<?php echo $row['IDKH']." ".$row['TENKH']; ?>" value="<?php echo $row['IDKH']; ?>"><?php echo $row['IDKH']." - ".$row['TENKH']; ?></option>
              <?php } ?>
            </select><br><br>
            <button id="xem-ds-bg-gv" class="btn btn-primary">Xem danh sách</button>
          </div>
        </div>
      <div class="windows-table col-md-9">
        <label>Danh sách bài giảng của giáo viên</label>
        <div class="line"></div>
          <br><button class="btn btn-success" onclick="thembaigiang()"><i class="fa fa-play"></i> Thêm bài giảng</button><br><br>
          <div id="du-lieu">
            <table id="qltv-loai-sach" class="table table-striped">
                <thead>
                      <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                        <th class="giua">STT</th>
                        <th class="giua">TÊN BÀI</th>
                        <th class="giua">TÓM TẮT</th>
                        <th class="giua">ID VIDEO</th>
                        <th class="giua">NGÀY ĐĂNG</th>
                        <th class="giua">KHÓA HỌC</th>
                        <th class="giua">TẮT</th>
                        <th class="giua">THAO TÁC</th>
                      </tr>
                </thead>
                <tbody>
                <?php 
                  $stt = 1;
                  while ($row = mysqli_fetch_assoc($baigiang)) {
                    ?>
                      <tr>
                        <th class="giua"><?php echo $stt; ?></th>
                        <td id="id-ten-bai-<?php echo $row['IDBG'] ?>"><?php echo $row['TENBAI']; ?></td>
                        <td><?php
                          $mang = explode(' ', $row['TOMTAT']);
                          if (count($mang)>20) {
                            for ($i=0; $i <20; $i++) { 
                              echo $mang[$i]." ";
                            } echo "...";
                          }
                          else echo $row['TOMTAT'];
                        ?></td>
                        <td id="id-id-video-<?php echo $row['IDBG'] ?>"><?php echo $row['IDVIDEO']; ?></td>
                        <td><?php echo $row['NGAYDANG']; ?></td>
                        <td><?php echo $row['TENKH']; ?></td>
                        <td class="giua">
	                        <?php 
	                        if ($row['BATTAT']==1) { ?>
	                        <input type="checkbox" name="" checked id="bat-tat-<?php echo $row['IDBG']; ?>" onclick="battat('<?php echo $row['IDBG']; ?>')">
	                        <?php } else { ?>
	                        <input type="checkbox" name="" id="bat-tat-<?php echo $row['IDBG']; ?>" onclick="battat('<?php echo $row['IDBG']; ?>')">
	                        <?php } ?>
                        </td>
                        <td class="giua"><div class="nut nam-giua">
                        	<a class="btn btn-primary btn-sua" title="Sửa" onclick="sua('<?php echo $row['IDBG'] ?>')"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a class="btn btn-danger btn-xoa" title="Xóa"
                           onclick="xoa('<?php echo $row['IDBG'] ?>')" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </div>
                        </td>
                        <textarea hidden="hidden" id="id-tom-tat-<?php echo $row['IDBG']; ?>"><?php echo $row['TOMTAT']; ?></textarea>
                        <textarea hidden="hidden" id="id-noi-dung-<?php echo $row['IDBG']; ?>"><?php echo $row['NOIDUNG']; ?></textarea>
                        <input type="text" hidden="hidden" id="id-ma-khoa-hoc-<?php echo $row['IDBG']; ?>" name="" value="<?php echo $row['IDKH']; ?>">
                    </tr>
                    <?php
                    $stt++;
                  }
                ?>
                </tbody>
            </table>  
          </div>
        </div>
      </div>
    </section>

<!-- Modal: Thêm bài giảng -->
<div class="modal anil in" id="qltv-modal-them-bai-giang" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm bài giảng</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Tên bài giảng</label>
            <input type="text" class="form-control" name="" id="tieu-de-them" placeholder="tên bài giảng" required autocomplete="on">
          </div>
          <div class="form-group">
            <label>Tóm tắt</label>
            <textarea class="form-control" name="" id="tom-tat-them" placeholder="tóm tắt" required rows="5"></textarea>
          </div>
          <div class="form-group">
            <label>ID VIDEO</label>
            <input type="text" class="form-control" name="" id="id-video-them" placeholder="id video từ gooogle drive" required autocomplete="on" data-toggle="tooltip" data-placement="bottom" title="id video lấy từ id video của bạn trên gooogle drive">
          </div>
          <div class="form-group">
            <label>Chọn khóa học</label>
            <select id="ma-khoa-hoc-them" class="form-control selectpicker" data-live-search="true" title="chọn khóa học">
              <?php while ($row = mysqli_fetch_assoc($khoahoc_1)) {
              ?>
                <option data-tokens="<?php echo $row['IDKH']." ".$row['TENKH']; ?>" value="<?php echo $row['IDKH']; ?>"><?php echo $row['IDKH']." - ".$row['TENKH']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nội dung bài giảng</label>
            <textarea class="form-control" id="noi-dung-them"></textarea>
          </div>
        <p class="help-block"> (<b>*</b>) Có thể bật hoặc tắt bài giảng ngay sau khi thêm thành công bài giảng.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-bai-giang">Xác nhận thêm</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm bài giảng -->

<!-- Modal: Sửa bài giảng -->
<div class="modal anil in" id="qltv-modal-sua-bai-giang" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm bài giảng</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Tên bài giảng</label>
            <input type="text" class="form-control" name="" id="tieu-de-sua" placeholder="tên bài giảng" required autocomplete="on">
          </div>
          <div class="form-group">
            <label>Tóm tắt</label>
            <textarea class="form-control" name="" id="tom-tat-sua" placeholder="tóm tắt" required rows="5"></textarea>
          </div>
          <div class="form-group">
            <label>ID VIDEO</label>
            <input type="text" class="form-control" name="" id="id-video-sua" placeholder="id video từ gooogle drive" required autocomplete="on" data-toggle="tooltip" data-placement="bottom" title="id video lấy từ id video của bạn trên gooogle drive">
          </div>
          <div class="form-group">
            <label>Chọn khóa học</label>
            <select id="ma-khoa-hoc-sua" class="form-control selectpicker" data-live-search="true" title="chọn khóa học">
              <?php while ($row = mysqli_fetch_assoc($khoahoc_2)) {
              ?>
                <option data-tokens="<?php echo $row['IDKH']." ".$row['TENKH']; ?>" value="<?php echo $row['IDKH']; ?>"><?php echo $row['IDKH']." - ".$row['TENKH']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nội dung bài giảng</label>
            <textarea class="form-control" id="noi-dung-sua"></textarea>
          </div>
        <p class="help-block"> (<b>*</b>) Có thể bật hoặc tắt bài giảng ngay sau khi thêm thành công bài giảng.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-bai-giang">Xác nhận sửa</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa bài giảng -->

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
    document.title = "VLUTE Elearning | Bài giảng";
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<script>
    CKEDITOR.replace( 'noi-dung-them', {
      filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    CKEDITOR.replace( 'noi-dung-sua', {
      filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
      filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
      filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#baigiang").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  function tailai(kh){
    $.ajax({
      url : "ajax/ajax_danh_sach_bai_giang_giao_vien.php",
      type : "post",
      dataType:"text",
      data : {
        kh: kh,
        id: <?php echo $idofgv; ?>
      },
      success : function (data){
          $("#du-lieu").html(data);
      }
    });
  }
  function thembaigiang(){
    $("#qltv-modal-them-bai-giang").modal("show");
  }
	function battat(id){
		var tt=0;
		if(document.getElementById('bat-tat-'+id).checked)
			tt=1;
		$.ajax({
			url : "ajax/ajax_bat_tat_bai_giang.php",
			type : "post",
			dataType:"text",
			data : {
			  id: id,
			  tt: tt
			},
			success : function (data){
			    $("body").append(data);
			}
		});
	}
  function sua(id){
    $("#tieu-de-sua").val($("#id-ten-bai-"+id).text().trim()),
    $("#tom-tat-sua").val($("#id-tom-tat-"+id).text().trim());
    $("#id-video-sua").val($("#id-id-video-"+id).text().trim());
    alert($("#id-ma-khoa-hoc-"+id).val().trim());
    //$("#ma-khoa-hoc-sua").val('3');
    //CKEDITOR.instances['noi-dung-sua'].setData($("#id-noi-dung-"+id).text().trim());
    //$("#qltv-modal-sua-bai-giang").modal("show");
  }
	function xoa(id){
		if (confirm('Bạn có chắc chắn xóa bài giảng này không?')) {
			$.ajax({
				url : "ajax/ajax_xoa_bai_giang.php",
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
    $("#nut-them-bai-giang").click(function(){
      $.ajax({
        url : "ajax/ajax_them_bai_giang.php",
        type : "post",
        dataType:"text",
        data : {
          td: $("#tieu-de-them").val(),
          tt: $("#tom-tat-them").val(),
          idv: $("#id-video-them").val(),
          makh: $("#ma-khoa-hoc-them").val(),
          nd: CKEDITOR.instances['noi-dung-them'].getData(),
          id: <?php echo $idofgv; ?>
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });
  $(document).ready(function() {
    $("#xem-ds-bg-gv").click(function(){
      $.ajax({
        url : "ajax/ajax_danh_sach_bai_giang_giao_vien.php",
        type : "post",
        dataType:"text",
        data : {
          kh: $("#ma-khoa-hoc").val(),
          id: <?php echo $idofgv; ?>
        },
        success : function (data){
            $("#du-lieu").html(data);
        }
      });
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
<script src="../bootstrap/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
  $('#qltv-loai-sach-1').DataTable();
</script>
<style type="text/css">
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
	    padding: 5px;
	}
</style>