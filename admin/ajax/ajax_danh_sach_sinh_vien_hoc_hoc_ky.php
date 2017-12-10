<?php 
	include_once("../config.php");
	$kh = $_POST['kh'];
	settype($kh, 'int');
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$query = "SELECT DISTINCT sd.IDSVKH,sv.IDSV,kh.IDKH, sv.HOSV, sv.TENSV, sv.MAIL, kh.TENKH, XACNHAN FROM khoahoc kh, sinhvien sv, sv_dk_khoahoc sd WHERE sd.IDSV = sv.IDSV AND sd.IDKH = kh.IDKH AND sd.XACNHAN = b'0' AND sd.IDKH = '$kh'";
	$result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
	if ($count == 0) {
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Không có dữ liệu.</strong>\")</script>"; ?>
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
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>
		<?php exit();
	}
	echo "<script type=\"text/javascript\">thanhcong(\"<strong>Dữ liệu được nạp.</strong>\")</script>";
 ?>
            <button class="btn btn-success" onclick="luudiem('<?php echo $count ?>')">Lưu nhập điểm</button>
            <br><br>
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
                <tbody>
                <?php 
                  $stt = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <th class="giua"><?php echo $stt; ?></th>
                        <td><a><?php echo $row['IDSV']; ?></a></td>
                        <td><?php echo $row['HOSV']." ".$row['TENSV']; ?></td>
                        <?php
                          $_idkh = $row['IDKH'];
                          $_idsv = $row['IDSV']; 
                          $_query = "SELECT * FROM diemkhoahoc d WHERE d.IDKH = '$_idkh' AND d.IDSV = '$_idsv'";
                          $_re = mysqli_query($conn, $_query);
                          $_kq = mysqli_fetch_array($_re);
                          $_count = mysqli_num_rows($_re);
                          if ($_count > 0) { ?>
                          <td><input type="text" name="" value="<?php echo $_kq['DIEM'] ?>" class="form-control giua" style="width: 60px;height: 28px;" data-el-hk="<?php echo $_idkh ?>" data-el-sv="<?php echo $_idsv ?>" id="id-nhap-diem-<?php echo $stt; ?>" ></td>
                          <td class="giua"><input type="text" name="" value="<?php echo $_kq['GHICHU'] ?>" class="form-control" style="width: 230px;height: 28px;" data-el-hk="<?php echo trim($_idkh) ?>" data-el-sv="<?php echo trim($_idsv) ?>" id="id-ghi-chu-<?php echo $stt; ?>" ></td>
                          <?php } else{ ?>
                          <td><input type="text" name="" value="" class="form-control giua" style="width: 60px;" data-el-hk="<?php echo $_idkh ?>" data-el-sv="<?php echo $_idsv ?>" id="id-nhap-diem-<?php echo $stt; ?>" ></td>
                          <td class="giua"><input type="text" name="" value="" class="form-control" style="width: 230px;" data-el-hk="<?php echo trim($_idkh) ?>" data-el-sv="<?php echo trim($_idsv) ?>" id="id-ghi-chu-<?php echo $stt; ?>" ></td>
                          <?php } ?>
                        
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