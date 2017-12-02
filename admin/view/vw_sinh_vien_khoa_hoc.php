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
        setTimeout(function(){ 
          $.ajax({
            url : "ajax/ajax_danh_sach_sinh_dk_vien_khoa_hoc_reload.php",
            type : "post",
            dataType:"text",
            data : {
              a: 'null'
            },
            success : function (data){
                $("#du-lieu").html(data);
            }
          });
        }, 3000);
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
        Xác nhận đăng ký khóa học của sinh viên
        
      </h1>
      <label> - Sau khi sinh viên đăng ký thành công trên phần mêm, sinh viên hoàn thành việc đóng học phí, người quản trị tích vào vô đã xác nhận để sinh viên có thể được học!</label>
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
            <button id="xem-ds-sv-kh" class="btn btn-primary">Xem danh sách</button>
          </div>
        </div>
      <div class="windows-table col-md-9">
        <label>Danh sách đã & chưa đóng học phí</label>
        <div class="line"></div>
          <div id="du-lieu">
            <table id="qltv-loai-sach" class="table table-striped">
                <thead>
                      <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                        <th class="giua">STT</th>
                        <th class="giua">Họ & Tên</th>
                        <th class="giua">MAIL</th>
                        <th class="giua">TÊN KHOÁ HỌC</th>
                        <th class="giua">XÁC NHẬN</th>
                      </tr>
                </thead>
                <tbody>
                <?php 
                  $stt = 1;
                  while ($row = mysqli_fetch_assoc($sinhvien)) {
                    ?>
                      <tr>
                        <th class="giua"><?php echo $stt; ?></th>
                        <td><?php echo $row['HOSV']." ".$row['TENSV']; ?></td>
                        <td><?php echo $row['MAIL']; ?></td>
                        <td><?php echo $row['TENKH']; ?></td>
                        <td class="giua"><div class="nut nam-giua">
                        <?php if ($row['XACNHAN']==1){ ?>
                            <a class="btn btn-danger btn-xac-nhan" title="Xác nhận"
                           onclick="xacnhan('<?php echo $row['IDSVKH'] ?>')" ><i class="fa fa-close" aria-hidden="true"></i></a>
                        <?php } else{ ?>
                            <a class="btn btn-success btn-xac-nhan" title="Xác nhận"
                           onclick="huyxacnhan('<?php echo $row['IDSVKH'] ?>')" ><i class="fa fa-check" aria-hidden="true"></i></a>
                        <?php } ?>
                          </div>
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
    document.title = "VLUTE Elearning | Xác nhận Sinh viên - Khóa học";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#toanbosinhvien").addClass("active");
    $("#svkh").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
    function xacnhan(id){
      $.ajax({
        url : "ajax/ajax_xac_nhan.php",
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
    function huyxacnhan(id){
      $.ajax({
        url : "ajax/ajax_huy_xac_nhan.php",
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
  $(document).ready(function() {

    $("#xem-ds-sv-kh").click(function(){
      $.ajax({
        url : "ajax/ajax_danh_sach_sinh_dk_vien_khoa_hoc.php",
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