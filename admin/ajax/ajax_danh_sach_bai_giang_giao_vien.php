<?php 
	include_once("../config.php");
	$kh = $_POST['kh'];
  $id = $_POST['id'];
	settype($kh, 'int');
	$ketnoi = new clsKetnoi();
	$conn = $ketnoi->ketnoi();
	$query = "SELECT bg.IDBG, bg.IDGV, bg.TENBAI,bg.TOMTAT,bg.NOIDUNG, bg.NGAYDANG,bg.IDKH, bg.BATTAT,kh.TENKH FROM baigiang bg, khoahoc kh WHERE bg.IDGV = '$id' AND bg.IDKH = kh.IDKH and kh.IDKH = '$kh'";
  
	$result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if ($count==0) {
    echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Không tìm thấy dữ liệu!</strong>\")</script>"; ?>
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
                  <th class="giua">XÓA</th>
                </tr>
          </thead>
      </table>
      <script type="text/javascript">
        $('#qltv-loai-sach').DataTable();
      </script>
  <?php  
    exit();
  }
  echo "<script type=\"text/javascript\">thanhcong(\"<strong>Dữ liệu đã nạp xong!</strong>\")</script>";
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
                  <th class="giua">TẮT</th>
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
                  <td><?php echo $row['TENBAI']; ?></td>
                        <td><?php
                          $mang = explode(' ', $row['TOMTAT']);
                          if (count($mang)>20) {
                            for ($i=0; $i <20; $i++) { 
                              echo $mang[$i]." ";
                            } echo "...";
                          }
                          else echo $row['TOMTAT'];
                        ?></td>
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
                    <a class="btn btn-primary btn-sua" title="Sửa" onclick="sua('<?php echo $row['IDBG'] ?>')"><i class="fa fa-edit" aria-hidden="true"></i></a>
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
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>