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
</style>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý điểm sinh viên
        
      </h1>
      <label> - Thông tin điểm số của sinh viên theo từng khóa học!</label>
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
        <label>Danh sách sinh viên theo học kỳ</label>
        <div class="line"></div>
          <div id="du-lieu">
            <table id="qltv-loai-sach" class="table table-striped">
                <thead>
                      <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                        <th class="giua">STT</th>
                        <th class="giua" style="width: 60px;">SỐ SV</th>
                        <th class="giua">HỌ TÊN SV</th>
                        <th class="giua" style="width: 60px;">ĐIỂM</th>
                        <th class="giua" style="width: 80px;">GHI CHÚ</th>
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
    document.title = "VLUTE Elearning | Điểm";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#diem").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
	function luudiem(id){
    var d = [];
    var kh;
    var sv = [];
    var gc = [];
    parseFloat(d)
    for (var i = 1; i <= id; i++) {
      var kt = document.getElementById('id-nhap-diem-'+i).value;
      if(parseFloat(kt)>=0.0 && parseFloat(kt)<=10.0){
        d[i] = kt;
        kh=$("#id-nhap-diem-"+i).attr("data-el-hk");
        gc[i] = document.getElementById('id-ghi-chu-'+i).value;
        sv[i]=$("#id-nhap-diem-"+i).attr("data-el-sv");
      }
      else{
        khongthanhcong('Điểm phải lớn hơn 0.0 và điểm không quá 10.0');
        return;
      }
    }
		$.ajax({
			url : "ajax/ajax_nhap_diem_cho_sinh_vien_theo_hoc_ky.php",
			type : "post",
			dataType:"text",
			data : {
			  d: d,
			  kh: kh,
        sv: sv,
        gc: gc
			},
			success : function (data){
			    $("body").append(data);
			}
		});
	}
  $(document).ready(function() {
    $("#xem-ds-sv-hk").click(function(){
      $.ajax({
        url : "ajax/ajax_danh_sach_sinh_vien_hoc_hoc_ky.php",
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