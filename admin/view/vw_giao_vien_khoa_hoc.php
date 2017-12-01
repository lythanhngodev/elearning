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
        Phân công giảng dạy
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-ms-3">
        <div class="form-group">
          <label>Giảng viên viên</label>
          <select id="ma-giao-vien" class="form-control selectpicker" data-live-search="true" title="chọn giảng viên">
            <?php while ($row = mysqli_fetch_assoc($sinhvien)) {
            ?>
              <option data-tokens="<?php echo $row['IDGV']." ".$row['TENGV']; ?>" value="<?php echo $row['IDGV']; ?>"><?php echo $row['IDGV']." - ".$row['TENGV']; ?></option>
            <?php } ?>
          </select>
        </div>
        </div>
        <div class="col-md-3 col-ms-3">
        <div class="form-group">
          <label>Khóa học</label>
          <select id="ma-khoa-hoc" class="form-control selectpicker" data-live-search="true" title="chọn giảng viên">
            <?php while ($row = mysqli_fetch_assoc($khoahoc)) {
            ?>
              <option data-tokens="<?php echo $row['IDKH']." ".$row['TENKH']; ?>" value="<?php echo $row['IDKH']; ?>"><?php echo $row['IDKH']." - ".$row['TENKH']; ?></option>
            <?php } ?>
          </select><br><br>
          <button id="them-gv-kh" class="btn btn-primary">Thêm giáo viên vào kháo học</button>
        </div>
        </div>
      <div class="windows-table col-md-6">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Họ & Tên GV</th>
                    <th class="giua">MAIL GV</th>
                    <th class="giua">TÊN KHÓA HỌC</th>
                    <th class="giua">Đổi/Xóa</th>
                  </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($dulieu)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <td id="id-ten-<?php echo $row['IDGVKH']; ?>"><?php echo $row['TENGV']; ?></td>
                    <td id="id-mail-<?php echo $row['IDGVKH']; ?>"><?php echo $row['MAIL']; ?></td>
                    <td id="id-ten-khoa-hoc-<?php echo $row['IDGVKH']; ?>"><?php echo $row['TENKH']; ?></td>
                    <td class="giua"><div class="nut nam-giua">
                        <a class="btn btn-primary btn-doi-giao-vien" title="Đổi giáo viên giảng dạy"
                        data-el="<?php echo $row['IDGVKH']; ?>" data-el-kh="<?php echo $row['IDKH']; ?>" ><i class="fa fa-refresh" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-giao-vien" title="Xóa"
                        data-el="<?php echo $row['IDGVKH']; ?>" data-el-kh="<?php echo $row['IDKH']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
      </div>
    </section>

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
      <input type="text" hidden="hidden" name="" id="id-giao-vien-khoa-hoc-xoa">
      <input type="text" hidden="hidden" name="" id="id-khoa-hoc-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-giao-vien-khoa-hoc">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa khoa -->

<script type="text/javascript">
    document.title = "VLUTE Elearning | Khóa học";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#giaovienkhoahoc").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $("#them-gv-kh").click(function(){
      $.ajax({
        url : "ajax/ajax_them_giao_vien_khoa_hoc.php",
        type : "post",
        dataType:"text",
        data : {
          gv: $("#ma-giao-vien").val(),
          kh: $("#ma-khoa-hoc").val()
        },
        success : function (data){
            $("body").append(data);
        }
      });
    });

    $(".btn-xoa-giao-vien").click(function(){
      $("#id-khoa-hoc-xoa").val($(this).attr("data-el-kh"));
      $("#id-giao-vien-khoa-hoc-xoa").val($(this).attr("data-el"));
      $("#qltv-modal-xoa-khoa-hoc").modal("show");
    });
    $("#nut-xoa-giao-vien-khoa-hoc").click(function(){
      $.ajax({
        url : "ajax/ajax_xoa_giao_vien_khoa_hoc.php",
        type : "post",
        dataType:"text",
        data : {
          idgvkh: $("#id-giao-vien-khoa-hoc-xoa").val(),
          idkh: $("#id-khoa-hoc-xoa").val()
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
</script>
<style type="text/css">
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
	    padding: 5px;
	}
</style>