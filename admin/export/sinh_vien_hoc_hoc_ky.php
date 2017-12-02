<?php 
	session_start();
	include_once("../config.php");
	$kh = $_POST['kh'];
	function el_sinh_vien_hoc_khoa_hoc($kh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT sv.IDSV, sv.HOSV, sv.TENSV,sv.GIOITINH,sv.NGAYSINH,sv.MAIL,sv.SDT,sv.DIACHI,kh.TENKH FROM khoahoc kh, sinhvien sv, sv_dk_khoahoc sd WHERE sd.IDSV = sv.IDSV AND sd.IDKH = kh.IDKH AND sd.XACNHAN = b'0' AND sv.TRANGTHAI = b'0' AND sd.IDKH = '$kh' ORDER BY sv.TENSV ASC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
			include_once("../Classes/PHPExcel.php");
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			// tiêu đề
			$sheet = $objPHPExcel->getActiveSheet()->setTitle("DANH SÁCH SINH VIÊN"); // tiêu đề
			$sheet->getColumnDimension('A')->setAutoSize(true);
			$sheet->getColumnDimension('B')->setAutoSize(true);
			$sheet->getColumnDimension('C')->setAutoSize(true);
			$sheet->getColumnDimension('D')->setAutoSize(true);
			$sheet->getColumnDimension('E')->setAutoSize(true);
			$sheet->getColumnDimension('F')->setAutoSize(true);
			$sheet->getColumnDimension('G')->setAutoSize(true);
			$sheet->getColumnDimension('H')->setAutoSize(true);
			$sheet->getColumnDimension('I')->setAutoSize(true);
			$sheet->getColumnDimension('J')->setAutoSize(true);
			// GỌP CỘT
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:J3');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A4:A5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B4:B5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C4:C5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('D4:D5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E4:E5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F4:F5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('G4:G5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H4:H5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('I4:I5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('J4:J5');
			// Tieu đề A1
			$ten = 'DANH SÁCH SINH VIÊN KHÓA HỌC ';
			$tenkh = "";
			
			// Canh giữa A1:H4
			$sheet->getStyle('A1:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A1:J4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			// Cỡ chữ A1
			$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(16);
			// In đậm tiêu đề
			$objPHPExcel->getActiveSheet()->getStyle("A1:J4")->getFont()->setBold(true);
			$rowCount=4;
			$sheet->setCellValue('A'.$rowCount,'STT');
			$sheet->setCellValue('B'.$rowCount,'MÃ SỐ');
			$sheet->setCellValue('C'.$rowCount,'HỌ LÓT');
			$sheet->setCellValue('D'.$rowCount,'TÊN');
			$sheet->setCellValue('E'.$rowCount,'GIỚI TÍNH');
			$sheet->setCellValue('F'.$rowCount,'NGÀY SINH');
			$sheet->setCellValue('G'.$rowCount,'MAIL');
			$sheet->setCellValue('H'.$rowCount,'SỐ ĐIỆN THOẠI');
			$sheet->setCellValue('I'.$rowCount,'ĐỊA CHỈ');
			$sheet->setCellValue('J'.$rowCount,'GHI CHÚ');
			$rowCount++;
		  	// lệnh sql
			$rul=el_sinh_vien_hoc_khoa_hoc($kh);
			while ($row=mysqli_fetch_array($rul)) {
				$rowCount++;
				$sheet->setCellValue('A'.$rowCount,$rowCount-5);
				$sheet->setCellValue('B'.$rowCount,$row[0]);
				$sheet->setCellValue('C'.$rowCount,$row[1]);
				$sheet->setCellValue('D'.$rowCount,$row[2]);
				$sheet->setCellValue('E'.$rowCount,$row[3]);
				$sheet->setCellValue('F'.$rowCount,$row[4]);
				$sheet->setCellValue('G'.$rowCount,$row[5]);
				$sheet->setCellValue('H'.$rowCount,$row[6]);
				$sheet->setCellValue('I'.$rowCount,$row[7]);
				$tenkh = $row[8];
			}
			$sheet->setCellValue('A1',"DANH SÁCH SINH VIÊN $tenkh");
			// Đường viền
			$sheet->getStyle('A4:' . 'J'.$rowCount)
				            ->applyFromArray(array(
				                'borders' => array(
				                    'allborders' => array(
				                        'style' => PHPExcel_Style_Border::BORDER_THIN
				                    )
				                )
							));
		  // Canh giữa số thứ tự
		  $sheet->getStyle('A5:A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  $sheet->getStyle('B5:B'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  $sheet->getStyle('E5:E'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  // Canh lề ngày nhập
		  //$sheet->getStyle('E5:E'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  // Canh lề tên đăng nhập, họ tên
		  //$sheet->getStyle('B6:C'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$filename = "$ten.xlsx";
			$objWriter->save($filename);
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
			header('Content-Length: ' . filesize($filename));
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate');
			header('Pragma: no-cache');
			readfile($filename);
			return;
 ?>