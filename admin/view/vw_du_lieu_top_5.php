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
#qltv-loai-sach {
    background: #ececec;
    border: 1px solid #bbbbbb;
    font-size: 12px;
}
</style>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thống kê TOP 5 sinh viên có điểm cao nhất
      </h1>
      <label> - Thông tin kết quả học tập sinh viên theo từng khóa học.<br> - Sinh viên đăng ký khóa học và được xác nhận thì mới có trong danh sách này!</label>
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
            <button id="xem-ds-sv-hk" class="btn btn-primary">Xem danh sách</button>
          </div>
        </div>
      <div class="windows-table col-md-9">
        <label>Danh sách sinh viên</label>
        <div class="line"></div>
          <div id="du-lieu">
            <table id="qltv-loai-sach" class="table table-striped">
                <thead>
                      <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                        <th class="giua">STT</th>
                        <th class="giua">SỐ SV</th>
                        <th class="giua">HỌ TÊN SV</th>
                        <th class="giua">GIỚI TÍNH</th>
                        <th class="giua">NGÀY SINH</th>
                        <th class="giua">MAIL</th>
                        <th class="giua">SĐT</th>
                        <th class="giua">ĐỊA CHỈ</th>
                        <th class="giua">ĐIỂM</th>
                      </tr>
                </thead>
            </table>  
          </div>
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
      <input type="text" hidden="hidden" name="" id="id-khoa-hoc-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-khoa-hoc">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa khoa -->

<script type="text/javascript">
    document.title = "VLUTE Elearning | Thống kê";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#thongke").addClass("active");
    $("#top-5").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $("#xem-ds-sv-hk").click(function(){
      $.ajax({
        url : "ajax/ajax_du_lieu_top_5.php",
        type : "post",
        dataType:"text",
        data : {
          kh: $("#ma-khoa-hoc").val()
        },
        success : function (data){
            $("#du-lieu").html(data);
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