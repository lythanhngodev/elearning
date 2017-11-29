<?php 
	include_once("../config.php");
	$kh = $_POST['kh'];
	settype($kh, 'int');
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$query = "SELECT DISTINCT sd.IDSVKH, sv.HOSV, sv.TENSV, sv.MAIL, kh.TENKH, XACNHAN FROM khoahoc kh, sinhvien sv, sv_dk_khoahoc sd WHERE sd.IDSV = sv.IDSV AND sd.IDKH = kh.IDKH AND sd.IDKH = '$kh'";
	$result = mysqli_query($conn, $query);
	/*if (el_doi_gioi_tinh_giao_vien($_POST['ma'],$_POST['gt'])) {
		echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã lưu</strong> giới tính GV đã được cập nhật!\")</script>";
		exit();
	}*/
	//echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật giới tính!\")</script>";
 ?>
      <table id="qltv-loai-sach" class="table table-striped">
          <thead>
                <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                  <th class="giua">STT</th>
                  <th class="giua">Họ & Tên</th>
                  <th class="giua">MAIL</th>
                  <th class="giua">TÊN KHÓA HỌC</th>
                  <th class="giua">ĐÃ ĐÓNG</th>
                </tr>
          </thead>
          <tbody>
          <?php 
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <th class="giua"><?php echo $stt; ?></th>
                  <td><?php echo $row['HOSV']." ".$row['TENSV']; ?></td>
                  <td><?php echo $row['MAIL']; ?></td>
                  <td><?php echo $row['TENKH']; ?></td>
	                <td class="giua"><div class="nut nam-giua">
	                <?php if ($row['XACNHAN']==1){ ?>
	                    <a class="btn btn-danger btn-xac-nhan" title="Xác nhận"
	                     onclick="xacnhan(<?php echo $row['IDSVKH']; ?>)" ><i class="fa fa-close" aria-hidden="true"></i></a>
	                <?php } else{ ?>
	                    <a class="btn btn-success btn-xac-nhan" title="Xác nhận"
	                    onclick="huyxacnhan(<?php echo $row['IDSVKH']; ?>)" ><i class="fa fa-check" aria-hidden="true"></i></a>
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
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>