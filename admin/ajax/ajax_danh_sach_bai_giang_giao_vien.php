<?php 
	include_once("../config.php");
	$kh = $_POST['kh'];
  $id = $_POST['id'];
	settype($kh, 'int');
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$query = "SELECT bg.IDBG, bg.IDGV, bg.TENBAI,bg.TOMTAT,bg.NOIDUNG, bg.NGAYDANG,bg.IDKH, bg.BATTAT,kh.TENKH FROM baigiang bg, khoahoc kh WHERE bg.IDGV = '$id' AND bg.IDKH = kh.IDKH and kh.IDKH = '$kh'";
  echo "<script type=\"text/javascript\">thanhcong(\"<strong>Dữ liệu đã nạp xong!</strong>\")</script>";
	$result = mysqli_query($conn, $query);
 ?>
      <table id="qltv-loai-sach" class="table table-striped">
          <thead>
                <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                  <th class="giua">STT</th>
                  <th class="giua">TÊN BÀI</th>
                  <th class="giua">TÓM TẮT</th>
                  <th class="giua">ID NỘI DUNG</th>
                  <th class="giua">NGÀY ĐĂNG</th>
                  <th class="giua">KHÓA HỌC</th>
                  <th class="giua">BẬT</th>
                  <th class="giua">XÓA</th>
                </tr>
          </thead>
          <tbody>
          <?php 
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
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
                      <a class="btn btn-danger btn-xoa" title="Xác nhận"
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
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>