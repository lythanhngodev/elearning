<?php 
	include_once("../config.php");
	$kh = $_POST['kh'];
	settype($kh, 'int');
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$query = "SELECT nd.IDND,nd.IDKH,nd.NGAYBDN,nd.NGAYKTN,kh.MAKH,kh.TENKH FROM nhapdiem nd, khoahoc kh WHERE nd.IDKH = kh.IDKH AND kh.TRANGTHAI = b'0' AND kh.IDKH = '$kh' ORDER BY NGAYKTN DESC";
	$result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
    echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Không có dữ liệu.</strong>\")</script>"; ?>
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
            </table>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>
    <?php exit();
  }
  echo "<script type=\"text/javascript\">thanhcong(\"<strong>Dữ liệu được nạp.</strong>\")</script>";
 ?>
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
                  while ($row = mysqli_fetch_assoc($result)) {
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
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>