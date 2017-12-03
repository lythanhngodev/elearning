-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2017 lúc 01:47 SA
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `elearning`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baigiang`
--

CREATE TABLE `baigiang` (
  `IDBG` int(11) NOT NULL,
  `IDGV` int(11) NOT NULL,
  `TENBAI` varchar(200) NOT NULL,
  `TOMTAT` text NOT NULL,
  `IDVIDEO` varchar(1000) DEFAULT NULL,
  `NOIDUNG` text NOT NULL,
  `NGAYDANG` date NOT NULL,
  `IDKH` int(11) NOT NULL,
  `BATTAT` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `baigiang`
--

INSERT INTO `baigiang` (`IDBG`, `IDGV`, `TENBAI`, `TOMTAT`, `IDVIDEO`, `NOIDUNG`, `NGAYDANG`, `IDKH`, `BATTAT`) VALUES
(2, 1, 'Học C# căn bản', 'C# là một ngôn ngữ lập trình đơn giản, hiện đại, mục đích tổng quát, hướng đối tượng được phát triển bởi Microsoft bên trong phần khởi đầu .NET của họ, được phát triển chủ yếu bởi Anders Hejlsberg, một kiến trúc sư phần mềm nổi tiếng với các sản phẩm Turbo Pascal, Delphi, J++, WFC. Loạt bài hướng dẫn này sẽ cung cấp cho bạn kiến thức cơ bản về lập trình C# qua các khái niệm từ cơ bản đến nâng cao liên quan tới ngôn ngữ lập trình C#.', '1XA1MGp8kT4upN8qI1DHC83s-tAyX0twe', 'Nội dung', '2017-11-28', 1, b'0'),
(3, 1, 'Học C# căn bản (BAI 2)', 'Bài thứ 1 về C# căn bản', '1XA1MGp8kT4upN8qI1DHC83s-tAyX0twe', 'Nội dung', '2017-11-28', 1, b'0'),
(10, 2, 'test', 'rreer', 'rerererer', '<p>r&ecirc;rer</p>\n', '2017-12-03', 3, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemkhoahoc`
--

CREATE TABLE `diemkhoahoc` (
  `IDDIEM` int(11) NOT NULL,
  `IDKH` int(11) NOT NULL,
  `IDSV` int(11) NOT NULL,
  `DIEM` float NOT NULL,
  `GHICHU` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `diemkhoahoc`
--

INSERT INTO `diemkhoahoc` (`IDDIEM`, `IDKH`, `IDSV`, `DIEM`, `GHICHU`) VALUES
(1, 1, 2, 10, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `IDGV` int(11) NOT NULL,
  `MAGV` varchar(11) NOT NULL,
  `TENGV` varchar(100) NOT NULL,
  `GIOITINH` varchar(4) NOT NULL DEFAULT 'Khác',
  `DIACHI` varchar(200) NOT NULL,
  `SDT` varchar(100) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `HINHANH` varchar(100) NOT NULL,
  `MOTA` text,
  `TRANGTHAI` bit(1) NOT NULL DEFAULT b'0',
  `LOAITAIKHOAN` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`IDGV`, `MAGV`, `TENGV`, `GIOITINH`, `DIACHI`, `SDT`, `MAIL`, `HINHANH`, `MOTA`, `TRANGTHAI`, `LOAITAIKHOAN`) VALUES
(1, 'GV01', 'Lê Thị Hoàng Yến', 'Nữ', 'Vĩnh Long', '0192819287', 'yenlth@vlute.edu.vn\r\n', 'images/sinh-vien.ico', 'Chưa có mô tả', b'0', 1),
(2, 'GV02', 'Ngô Thanh Lý', 'Nam', 'Long Hồ Vĩnh Long', '01214967197', 'lythanhngodev@gmail.com', 'images/sinh-vien.ico', NULL, b'0', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gv_kh`
--

CREATE TABLE `gv_kh` (
  `IDGVKH` int(11) NOT NULL,
  `IDGV` int(11) NOT NULL,
  `IDKH` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `gv_kh`
--

INSERT INTO `gv_kh` (`IDGVKH`, `IDGV`, `IDKH`) VALUES
(1, 1, 1),
(4, 2, 3),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `IDKH` int(11) NOT NULL,
  `MAKH` varchar(10) NOT NULL,
  `TENKH` varchar(100) DEFAULT NULL,
  `MOTAKH` text NOT NULL,
  `MOTACTKH` text,
  `TGBATDAU` date DEFAULT NULL,
  `TGKETTHUC` date DEFAULT NULL,
  `TGBDDK` date DEFAULT NULL,
  `TGKTDK` date DEFAULT NULL,
  `TGTHI` date DEFAULT NULL,
  `HINHANH` varchar(200) DEFAULT NULL,
  `LUOTXEM` bigint(20) NOT NULL DEFAULT '0',
  `SOBAIHOC` int(11) NOT NULL DEFAULT '0',
  `TRANGTHAI` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`IDKH`, `MAKH`, `TENKH`, `MOTAKH`, `MOTACTKH`, `TGBATDAU`, `TGKETTHUC`, `TGBDDK`, `TGKTDK`, `TGTHI`, `HINHANH`, `LUOTXEM`, `SOBAIHOC`, `TRANGTHAI`) VALUES
(1, 'KH1', 'Lập trình căn bản', 'Dạy học lập trình căn bản', 'Mô tả khóa học', '2017-12-01', '2018-02-01', '2017-11-20', '2018-01-06', NULL, 'images/lap-trinh-csharp.jpg', 10, 16, b'0'),
(2, 'KH02', 'Lập Trình PHP Căn Bản', 'Khóa học php căn bản', 'Đây không đơn thuần là khóa học giúp các bạn làm dự án hay làm project thực tế mà nó còn bao gồm các kiến thức và kỹ năng giúp các bạn làm việc chuyên nghiệp trong môi trường công ty phần mềm. Để giúp các bạn không bị lạc lõng trong giai đoạn đầu bước vào nghề lập trình, mình đã thiết kế lên khóa học này dựa trên các kinh nghiệm và kỹ năng được đúc kết trong quá trình học tập và làm việc qua các dự án và công ty khác nhau.\n\n						Ngoài kiến thức phổ quát về công nghệ đến các kiến thức chuyên sâu về .NET mà mình muốn truyền đạt lại cho các bạn. Khóa học cũng sẽ giúp các bạn có thêm các kỹ năng như quản lý source code với Git, Unit testing, phân tích thiết kế code và cơ sở dữ liệu. Đưa các giải pháp cho các vấn đề khác nhau mà chúng ta gặp trong dự án.\n\n						Với một khóa học tổng hợp và chuyên sâu các kỹ năng cần thiết để làm dự án các bạn được học cả backend với C#, Entity Framework, các design pattern đồng thời cả những kiến thức frontend như Jquery, AngularJs. Ngoài ra mình cũng sẽ nói thêm về SQL Server cho các bạn còn chưa có nhiền kinh nghiệm và kiến thức về nó.\n\n						Với mong muốn tạo ra giá trị cao nhất cho các bạn khi tham gia khóa học này, mình đã cố gắng đưa những best practices vào dự án giúp các bạn dễ dàng thích nghi với môi trường công việc, dễ dàng mở rộng cũng như đáp ứng các nhu cầu khác nhau của khách hàng trong tương lai.', '2017-11-02', '2018-01-17', '2017-10-26', '2017-10-30', NULL, 'images/webserver-php-apache-mysql.jpg', 14, 16, b'0'),
(3, 'JAVACB01', 'Khóa học JAVA căn bản', 'Học JAVA căn bản', 'Đây không đơn thuần là khóa học giúp các bạn làm dự án hay làm project thực tế mà nó còn bao gồm các kiến thức và kỹ năng giúp các bạn làm việc chuyên nghiệp trong môi trường công ty phần mềm. Để giúp các bạn không bị lạc lõng trong giai đoạn đầu bước vào nghề lập trình, mình đã thiết kế lên khóa học này dựa trên các kinh nghiệm và kỹ năng được đúc kết trong quá trình học tập và làm việc qua các dự án và công ty khác nhau.\n\n						Ngoài kiến thức phổ quát về công nghệ đến các kiến thức chuyên sâu về .NET mà mình muốn truyền đạt lại cho các bạn. Khóa học cũng sẽ giúp các bạn có thêm các kỹ năng như quản lý source code với Git, Unit testing, phân tích thiết kế code và cơ sở dữ liệu. Đưa các giải pháp cho các vấn đề khác nhau mà chúng ta gặp trong dự án.\n\n						Với một khóa học tổng hợp và chuyên sâu các kỹ năng cần thiết để làm dự án các bạn được học cả backend với C#, Entity Framework, các design pattern đồng thời cả những kiến thức frontend như Jquery, AngularJs. Ngoài ra mình cũng sẽ nói thêm về SQL Server cho các bạn còn chưa có nhiền kinh nghiệm và kiến thức về nó.\n\n						Với mong muốn tạo ra giá trị cao nhất cho các bạn khi tham gia khóa học này, mình đã cố gắng đưa những best practices vào dự án giúp các bạn dễ dàng thích nghi với môi trường công việc, dễ dàng mở rộng cũng như đáp ứng các nhu cầu khác nhau của khách hàng trong tương lai.', '2017-12-10', '2018-02-10', '2017-11-29', '2017-12-09', NULL, 'images/java1.jpg', 100, 16, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_gv`
--

CREATE TABLE `login_gv` (
  `IDGV` int(11) NOT NULL,
  `TenDangNhap` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `login_gv`
--

INSERT INTO `login_gv` (`IDGV`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'hoangyen', '1234567'),
(2, 'lythanhngo', '1234567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapdiem`
--

CREATE TABLE `nhapdiem` (
  `IDND` int(11) NOT NULL,
  `IDKH` int(11) NOT NULL,
  `NGAYBDN` date NOT NULL,
  `NGAYKTN` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhapdiem`
--

INSERT INTO `nhapdiem` (`IDND`, `IDKH`, `NGAYBDN`, `NGAYKTN`) VALUES
(1, 1, '2017-11-30', '2017-12-10'),
(3, 1, '2017-11-30', '2017-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `IDSV` int(11) NOT NULL,
  `MASV` varchar(11) DEFAULT NULL,
  `HOSV` varchar(100) DEFAULT NULL,
  `TENSV` varchar(100) DEFAULT NULL,
  `HINHANH` varchar(100) DEFAULT 'images/sinh-vien.ico',
  `GIOITINH` varchar(5) NOT NULL DEFAULT 'Khác',
  `DIACHI` varchar(100) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `TENDANGNHAP` varchar(100) NOT NULL,
  `MATKHAU` varchar(100) NOT NULL,
  `NGAYDANGKY` datetime NOT NULL,
  `TRANGTHAI` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`IDSV`, `MASV`, `HOSV`, `TENSV`, `HINHANH`, `GIOITINH`, `DIACHI`, `SDT`, `MAIL`, `NGAYSINH`, `TENDANGNHAP`, `MATKHAU`, `NGAYDANGKY`, `TRANGTHAI`) VALUES
(1, 'SV001', 'Ngô Thanh', 'Lý', NULL, 'Nam', 'Vĩnh Long', '+841214967197', 'lythanhngodev@gmail.com', '1995-11-14', 'hihi', 'e10adc3949ba59abbe56e057f20f883e', '2017-12-01 00:00:00', b'0'),
(2, NULL, 'Nguyễn Hoàng', 'Phương', 'images/sinh-vien.ico', 'Nam', 'Vĩnh Long', '0123456789', 'hoangphuong@gmail.com', '1995-11-29', 'hoangphuong', 'e10adc3949ba59abbe56e057f20f883e', '2017-12-01 00:00:00', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv_dk_khoahoc`
--

CREATE TABLE `sv_dk_khoahoc` (
  `IDSVKH` int(11) NOT NULL,
  `IDSV` int(11) NOT NULL,
  `IDKH` int(11) NOT NULL,
  `XACNHAN` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sv_dk_khoahoc`
--

INSERT INTO `sv_dk_khoahoc` (`IDSVKH`, `IDSV`, `IDKH`, `XACNHAN`) VALUES
(1, 2, 1, b'0'),
(7, 2, 3, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `IDTB` int(11) NOT NULL,
  `IDGV` int(11) NOT NULL,
  `TENTB` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `NOIDUNG` text CHARACTER SET utf8,
  `TOMTAT` text CHARACTER SET utf8,
  `NGAYDANG` date DEFAULT NULL,
  `ANHIEN` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`IDTB`, `IDGV`, `TENTB`, `NOIDUNG`, `TOMTAT`, `NGAYDANG`, `ANHIEN`) VALUES
(1, 1, 'NGÀY THI 19/11/2017 - CHƯƠNG TRÌNH TOPICA: LỊCH & DANH SÁCH THI', '<div>\n<p>Trung t&acirc;m Đ&agrave;o tạo E-learning th&ocirc;ng b&aacute;o đến c&aacute;c sinh vi&ecirc;n đang học Đại học hệ từ xa phương thức eLearning lịch thi (thi lại) ng&agrave;y 19 th&aacute;ng 11 năm 2017 của c&aacute;c lớp/kh&oacute;a đang đ&agrave;o tạo như sau:</p>\n</div>\n\n<div><strong>LỊCH THI: </strong><a href="#"><em>Xem chi tiết tại đ&acirc;y</em></a></div>\n\n<div>\n<p><em>* C&aacute;c m&uacute;i giờ tr&ecirc;n l&agrave; giờ bắt đầu t&iacute;nh giờ l&agrave;m b&agrave;i v&agrave; kết th&uacute;c thu b&agrave;i. V&igrave; vậy, y&ecirc;u cầu sinh vi&ecirc;n c&oacute; mặt trước giờ thi 15 ph&uacute;t để Gi&aacute;m thị gọi v&agrave;o ph&ograve;ng thi. V&iacute; dụ: 08h00 &ndash; 09h00 l&agrave; 1 m&uacute;i giờ thi, th&igrave; 07h45&#39; sinh vi&ecirc;n phải c&oacute; mặt tại ph&ograve;ng thi.</em></p>\n\n<p><em>* Y&ecirc;u cầu sinh vi&ecirc;n mang theo thẻ sinh vi&ecirc;n, CMTND hoặc giấy tờ t&ugrave;y th&acirc;n c&oacute; d&aacute;n ảnh. Sinh vi&ecirc;n mang theo c&aacute;c dụng cụ thi theo quy định (b&uacute;t ch&igrave;, tẩy&hellip;).</em></p>\n\n<p><em>* Ph&ograve;ng Hội đồng thi &ndash; Văn ph&ograve;ng Trung t&acirc;m Đ&agrave;o tạo E-Learning. </em></p>\n\n<p><em>* Sinh vi&ecirc;n cần thực hiện nghi&ecirc;m t&uacute;c qui chế thi </em></p>\n</div>\n', 'Trung tâm Đào tạo E-learning thông báo đến các sinh viên đang học Đại học hệ từ xa phương thức eLearning lịch thi (thi lại) ngày 19 tháng 11 năm 2017 của các lớp/khóa đang đào tạo như sau: LỊCH THI: Xem chi tiết tại đây Lưu ý: * Các múi …', '2017-11-30', b'0'),
(4, 1, 'tieu de sua', '<p>noi dung sua</p>\n', 'tom tat sua', '2017-11-30', b'0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baigiang`
--
ALTER TABLE `baigiang`
  ADD PRIMARY KEY (`IDBG`);

--
-- Chỉ mục cho bảng `diemkhoahoc`
--
ALTER TABLE `diemkhoahoc`
  ADD PRIMARY KEY (`IDDIEM`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`IDGV`);

--
-- Chỉ mục cho bảng `gv_kh`
--
ALTER TABLE `gv_kh`
  ADD PRIMARY KEY (`IDGVKH`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`IDKH`);

--
-- Chỉ mục cho bảng `login_gv`
--
ALTER TABLE `login_gv`
  ADD PRIMARY KEY (`IDGV`);

--
-- Chỉ mục cho bảng `nhapdiem`
--
ALTER TABLE `nhapdiem`
  ADD PRIMARY KEY (`IDND`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`IDSV`);

--
-- Chỉ mục cho bảng `sv_dk_khoahoc`
--
ALTER TABLE `sv_dk_khoahoc`
  ADD PRIMARY KEY (`IDSVKH`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`IDTB`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baigiang`
--
ALTER TABLE `baigiang`
  MODIFY `IDBG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `diemkhoahoc`
--
ALTER TABLE `diemkhoahoc`
  MODIFY `IDDIEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `IDGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `gv_kh`
--
ALTER TABLE `gv_kh`
  MODIFY `IDGVKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `IDKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `nhapdiem`
--
ALTER TABLE `nhapdiem`
  MODIFY `IDND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `IDSV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `sv_dk_khoahoc`
--
ALTER TABLE `sv_dk_khoahoc`
  MODIFY `IDSVKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `IDTB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
