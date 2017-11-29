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
          <div id="du-lieu">
            <table id="qltv-loai-sach" class="table table-striped">
                <thead>
                      <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                        <th class="giua">STT</th>
                        <th class="giua">TÊN BÀI</th>
                        <th class="giua">TÓM TẮT</th>
                        <th class="giua">ID NỘI DUNG</th>
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
                        <td><?php echo $row['TENBAI']; ?></td>
                        <td><?php echo $row['TOMTAT']; ?></td>
                        <td><?php echo $row['NOIDUNG']; ?></td>
                        <td><?php echo $row['NGAYDANG']; ?></td>
                        <td><?php echo $row['TENKH']; ?></td>
                        <td class="giua">
	                        <?php 
	                        if ($row['BATTAT']==1) { ?>
	                        <input type="checkbox" name="" checked id="bat-tat-<?php echo $row['IDBG']; ?>" onclick="battat('<?php echo $row['IDBG']; ?>')">
	                        <?php } else{ ?>
	                        <input type="checkbox" name="" id="bat-tat-<?php echo $row['IDBG']; ?>" onclick="battat('<?php echo $row['IDBG']; ?>')">
	                        <?php } ?>
                        </td>
                        <td class="giua"><div class="nut nam-giua">
                        	<a class="btn btn-primary btn-sua" title="Sửa"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a class="btn btn-danger btn-xoa" title="Xóa"
                           onclick="xoa('<?php echo $row['IDBG'] ?>')" ><i class="fa fa-trash" aria-hidden="true"></i></a>
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
		$("#baigiang").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
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