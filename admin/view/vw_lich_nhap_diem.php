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
            url : "ajax/ajax_danh_sach_lich_nhap_diem_reload.php",
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
        Lịch nhập điểm
        
      </h1>
      <label> - Quản lý thời gian giảng viên nhập điểm khóa học cho sinh viên!</label>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-ms-3">
          <div class="form-group" style="border: 1px solid #d4d4d4;border-radius: 4px;padding: 15px 15px 16px 15px;">
            <label>Lịch nhập điểm theo khóa học</label>
            <select id="ma-khoa-hoc" class="form-control selectpicker" data-live-search="true" title="chọn khóa học">
              <?php while ($row = mysqli_fetch_assoc($khoahoc)) {
              ?>
                <option data-tokens="<?php echo $row['IDKH']." ".$row['TENKH']; ?>" value="<?php echo $row['IDKH']; ?>"><?php echo $row['IDKH']." - ".$row['TENKH']; ?></option>
              <?php } ?>
            </select><br><br>
            <button id="xem-lich-thi-khoc-hoc" class="btn btn-primary  form-control">Xem danh sách</button>
          </div>
          <div class="form-group" style="border: 1px solid #d4d4d4;border-radius: 4px;padding: 15px 15px 16px 15px;">
            <label>Thêm lịch nhập điểm</label>
            <select id="ma-khoa-hoc-them" class="form-control selectpicker ngap-nhap-lieu" data-live-search="true" title="chọn khóa học">
              <?php while ($row = mysqli_fetch_assoc($khoahoc1)) {
              ?>
                <option data-tokens="<?php echo $row['IDKH']." ".$row['TENKH']; ?>" value="<?php echo $row['IDKH']; ?>"><?php echo $row['IDKH']." - ".$row['TENKH']; ?></option>
              <?php } ?>
            </select>
            <input type="date" class="form-control ngap-nhap-lieu" id="ngay-bat-dau-nhap" placeholder="ngày bắt đầu nhập .." name="" style="margin-top: 10px;" >
            <input type="date" class="form-control ngap-nhap-lieu" id="ngay-ket-thuc-nhap" placeholder="ngày kết thúc nhập .." name="" style="margin-top: 10px;" >
            <br>
            <button id="them-lich-nhap-diem" class="btn btn-primary form-control">Thêm lịch nhập điểm</button>
          </div>
        </div>
      <div class="windows-table col-md-9">
        <label>Danh sách lịch nhập điểm</label>
        <div class="line"></div>
          <div id="du-lieu">
            <table id="qltv-loai-sach" class="table table-striped">
                <thead>
                      <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                        <th class="giua">STT</th>
                        <th class="giua">MÃ KHÓA HỌC</th>
                        <th class="giua">TÊN KHÓA HỌC</th>
                        <th class="giua">TG BẮT ĐẦU NHẬP</th>
                        <th class="giua">TG KẾT THÚC NHẬP</th>
                        <th class="giua">THAO TÁC</th>
                      </tr>
                </thead>
                <tbody>
                <?php 
                  $stt = 1;
                  while ($row = mysqli_fetch_assoc($nhapdiem)) {
                    ?>
                      <tr>
                        <th class="giua"><?php echo $stt; ?></th>
                        <td><?php echo $row['MAKH']; ?></td>
                        <td><?php echo $row['TENKH']; ?></td>
                        <td class="giua"><?php echo $row['NGAYBDN']; ?></td>
                        <td class="giua"><?php echo $row['NGAYKTN']; ?></td>
                        <td class="giua">
                          <div class="nut nam-giua">
                            <a class="btn btn-danger" title="Xóa" onclick="xoa('<?php echo $row['IDND']; ?>')" ><i class="fa fa-trash" aria-hidden="true"></i></a>
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

<script type="text/javascript">
    document.title = "VLUTE Elearning | Xác nhận Sinh viên - Khóa học";
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#lichnhapdiem").addClass("active");
  });
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
    function xoa(id){
      if (confirm('Bạn có chắc xóa lịch nhập điểm này không?')) {
        $.ajax({
          url : "ajax/ajax_lich_nhap_diem.php",
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

    $("#xem-lich-thi-khoc-hoc").click(function(){
      $.ajax({
        url : "ajax/ajax_danh_sach_lich_thi_khoa_hoc.php",
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
    $("#them-lich-nhap-diem").click(function(){
      $.ajax({
        url : "ajax/ajax_them_lich_thi_khoa_hoc.php",
        type : "post",
        dataType:"text",
        data : {
          kh: $("#ma-khoa-hoc-them").val(),
          nbd: $("#ngay-bat-dau-nhap").val(),
          nkt: $("#ngay-ket-thuc-nhap").val()
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