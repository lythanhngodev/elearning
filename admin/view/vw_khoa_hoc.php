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
        Khóa học
        <div class="line"></div>
      </h1>
      <label> - Thông tin về các khóa học dành cho sinh viên</label>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm khóa học</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã khóa học</th>
                    <th class="giua">Tên khóa học</th>
                    <th class="giua">Mô tả</th>
                    <th class="giua">TG bắt đầu</th>
                    <th class="giua">TG kết thúc</th>
                    <th class="giua">TG bắt đầu ĐK</th>
                    <th class="giua">TG kết thúc ĐK</th>
                    <th class="giua">TG thi</th>
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
                    <td class="giua" id="id-ma-khoa-hoc-<?php echo $row['IDKH']; ?>"><a><?php echo $row['MAKH']; ?></a></td>
                    <td id="id-ten-khoa-hoc-<?php echo $row['IDKH']; ?>"><?php echo $row['TENKH']; ?></td>
                    <td id="id-mo-ta--<?php echo $row['IDKH']; ?>"><?php
                          $mang = explode(' ', $row['MOTAKH']);
                          if (count($mang)>8) {
                            for ($i=0; $i <8; $i++) { 
                              echo $mang[$i]." ";
                            } echo "...";
                          }
                          else echo $row['MOTAKH'];
                        ?></td>
                    <td id="id-mo-ta-<?php echo $row['IDKH']; ?>" hidden="hidden" ><?php echo $row['MOTAKH']; ?></td>
                    <td id="id-thoi-gian-bat-dau-<?php echo $row['IDKH']; ?>" class="giua" id=""><span class="xam" ><?php echo $row['TGBATDAU']; ?></span></td>
                    <td id="id-thoi-gian-ket-thuc-<?php echo $row['IDKH']; ?>" class="giua"><span class="xam"><?php echo $row['TGKETTHUC']; ?></span></td>
                    <td id="id-thoi-gian-bat-dau-dang-ky-<?php echo $row['IDKH']; ?>" class="giua"><span class="xam" ><?php echo $row['TGBDDK']; ?></span></td>
                    <td id="id-thoi-gian-ket-thuc-dang-ky-<?php echo $row['IDKH']; ?>" class="giua"><span class="xam"><?php echo $row['TGKTDK']; ?></span></td>
                    <td id="id-thoi-gian-thi-<?php echo $row['IDKH']; ?>" class="giua"><span class="xam"><?php echo $row['TGTHI']; ?></span></td>
                    <td class="giua"><div class="nut nam-giua"><a class="btn btn-primary btn-sua-khoa-hoc" data-el="<?php echo $row['IDKH']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-khoa-hoc" title="Xóa"
                        data-el="<?php echo $row['IDKH']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" id="id-hinh-anh-<?php echo $row['IDKH']; ?>" name="" value="<?php echo $row['HINHANH']; ?>">
                    <input type="text" hidden="hidden" id="id-mo-ta-ct-<?php echo $row['IDKH']; ?>" name="" value="<?php echo $row['MOTACTKH']; ?>">
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
<div class="modal anil in" id="qltv-modal-them-khoa-hoc" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm khóa học</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã khhóa học</label>
          <input type="text" class="form-control" name="" id="ma-khoa-hoc-them" placeholder="mã khóa học" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên khóa học</label>
          <input type="text" class="form-control" name="" id="ten-khoa-hoc-them" placeholder="tên khóa học" required autocomplete="on">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Mô tả khóa học</label>
              <textarea class="form-control" id="mo-ta-khoa-hoc-them" rows="5"></textarea>
            </div>
          </div>  
          <div class="col-md-6">
            <div class="form-group">
              <label>Mô tả chi tiết khóa học</label>
              <textarea class="form-control" id="mo-ta-chi-tiet-khoa-hoc-them" rows="5"></textarea>
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian bắt đầu khóa học</label>
              <input type="date" class="form-control" name="" id="thoi-gian-bat-dau-them" required autocomplete="on">
            </div>
          </div>  
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian kết thúc khóa học</label>
              <input type="date" class="form-control" name="" id="thoi-gian-ket-thuc-them" required autocomplete="on">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian bắt đầu đăng ký</label>
              <input type="date" class="form-control" name="" id="thoi-gian-dang-ky-them" required autocomplete="on">
            </div>
          </div>  
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian kết thúc đăng ký</label>
              <input type="date" class="form-control" name="" id="thoi-gian-ket-thuc-dang-ky-them" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian thi</label>
              <input type="date" class="form-control" name="" id="thoi-gian-thi-them" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <button class="btn btn-default" onclick="BrowseServer()">Chọn hình ảnh khóa học ...</button>
              <img src="" id="hinh-anh-hoc-ky-them" style="width: 100%;">
            </div>
            <input type="text" id="hinh-anh-hoc-ky-them-src" hidden="hidden" name="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-khoa-hoc">Thêm khóa học</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm khóa học -->

<!-- Modal: Sửa khóa học -->
<div class="modal anil in" id="qltv-modal-sua-khoa-hoc" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa khóa học</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã khhóa học</label>
          <input type="text" class="form-control" name="" id="ma-khoa-hoc-sua" placeholder="mã khóa học" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên khóa học</label>
          <input type="text" class="form-control" name="" id="ten-khoa-hoc-sua" placeholder="tên khóa học" required autocomplete="on">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Mô tả khóa học</label>
              <textarea class="form-control" id="mo-ta-khoa-hoc-sua" rows="5"></textarea>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <label>Mô tả chi tiết khóa học</label>
              <textarea class="form-control" id="mo-ta-chi-tiet-khoa-hoc-sua" rows="5"></textarea>
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian bắt đầu khóa học</label>
              <input type="date" class="form-control" name="" id="thoi-gian-bat-dau-sua" required autocomplete="on">
            </div>
          </div>  
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian kết thúc khóa học</label>
              <input type="date" class="form-control" name="" id="thoi-gian-ket-thuc-sua" required autocomplete="on">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian bắt đầu đăng ký</label>
              <input type="date" class="form-control" name="" id="thoi-gian-dang-ky-sua" required autocomplete="on">
            </div>
          </div>  
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian kết thúc đăng ký</label>
              <input type="date" class="form-control" name="" id="thoi-gian-ket-thuc-dang-ky-sua" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Thời gian thi</label>
              <input type="date" class="form-control" name="" id="thoi-gian-thi-sua" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <button class="btn btn-default" onclick="BrowseServerSua()">Chọn hình ảnh khóa học ...</button>
              <img src="" id="hinh-anh-hoc-ky-sua" style="width: 100%;">
            </div>
            <input type="text" id="hinh-anh-hoc-ky-sua-src" hidden="hidden" name="">
          </div>
          <input type="text" hidden="hidden" name="" value="" id="id-khoa-hoc-sua">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-khoa-hoc">Hoàn tất</button>
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
		$("#khoahoc").addClass("active");
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
      document.getElementById('hinh-anh-hoc-ky-them').src = fileUrl;
      var host = "<?php echo $elearning['HOSTGOC']; ?>";
      host = host.substr(0,host.lastIndexOf("\/"));
      document.getElementById('hinh-anh-hoc-ky-them-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
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
    	$("#qltv-modal-them-khoa-hoc").modal("show");
    });
    $("#nut-them-khoa-hoc").click(function(){
      $.ajax({
        url : "ajax/ajax_them_khoa_hoc.php",
        type : "post",
        dataType:"text",
        data : {
          m: $("#ma-khoa-hoc-them").val(),
          t: $("#ten-khoa-hoc-them").val(),
          mt: $("#mo-ta-khoa-hoc-them").val(),
          mtct: $("#mo-ta-chi-tiet-khoa-hoc-them").val(),
          tgbdkh: $("#thoi-gian-bat-dau-them").val(),
          tgktkh: $("#thoi-gian-ket-thuc-them").val(),
          tgbddk: $("#thoi-gian-dang-ky-them").val(),
          tgktdk: $("#thoi-gian-ket-thuc-dang-ky-them").val(),
          tgt: $("#thoi-gian-thi-them").val(),
          hinh: $("#hinh-anh-hoc-ky-them-src").val()
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
      $("#mo-ta-chi-tiet-khoa-hoc-sua").val($("#id-mo-ta-ct-"+id).val().trim());
      $("#hinh-anh-hoc-ky-sua").attr('src', "../"+$("#id-hinh-anh-"+id).val().trim());
      $("#hinh-anh-hoc-ky-sua-src").val($("#id-hinh-anh-"+id).val().trim());
      $("#thoi-gian-bat-dau-sua").val($("#id-thoi-gian-bat-dau-"+id).text().trim());
      $("#thoi-gian-ket-thuc-sua").val($("#id-thoi-gian-ket-thuc-"+id).text().trim());
      $("#thoi-gian-dang-ky-sua").val($("#id-thoi-gian-bat-dau-dang-ky-"+id).text().trim());
      $("#thoi-gian-thi-sua").val($("#id-thoi-gian-thi-"+id).text().trim());
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
          mtct: $("#mo-ta-chi-tiet-khoa-hoc-sua").val(),
          tgbdkh: $("#thoi-gian-bat-dau-sua").val(),
          tgktkh: $("#thoi-gian-ket-thuc-sua").val(),
          tgbddk: $("#thoi-gian-dang-ky-sua").val(),
          tgktdk: $("#thoi-gian-ket-thuc-dang-ky-sua").val(),
          hinh: $("#hinh-anh-hoc-ky-sua-src").val(),
          tgt: $("#thoi-gian-thi-sua").val(),
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