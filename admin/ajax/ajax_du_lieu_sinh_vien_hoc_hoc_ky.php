<?php 
	include_once("../config.php");
	$kh = $_POST['kh'];
	settype($kh, 'int');
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$query = "SELECT DISTINCT sd.IDSVKH,sv.IDSV,sv.HOSV, sv.TENSV, sv.MAIL, kh.TENKH,sv.GIOITINH,sv.DIACHI,sv.SDT,sv.NGAYSINH,sv.TENDANGNHAP FROM khoahoc kh, sinhvien sv, sv_dk_khoahoc sd WHERE sd.IDSV = sv.IDSV AND sd.IDKH = kh.IDKH AND sd.XACNHAN = b'0' AND sv.TRANGTHAI = b'0' AND sd.IDKH = '$kh'";
	$result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
	if ($count == 0) {
		echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Không có dữ liệu.</strong>\")</script>"; ?>
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
            <form action="export/sinh_vien_hoc_hoc_ky.php" method="POST">
              <input type="text" hidden="hidden" name="kh" value="<?php echo $kh ?>">
              <input class="btn btn-warning nut-export" type="submit" value="Tải xuống Excel" style="
                  width: fit-content;
                  height: 34px;
                  padding: 0px 10px;
                  margin: 0px 0px 14px 0px;
                  font-size: 14px;" target="_blank">
            </form>
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
                        <td class="giua"><?php echo $row['GIOITINH']; ?></td>
                        <td class="giua"><?php echo $row['NGAYSINH']; ?></td>
                        <td><?php echo $row['MAIL']; ?></td>
                        <td><?php echo $row['SDT']; ?></td>
                        <td><?php echo $row['DIACHI']; ?></td>
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