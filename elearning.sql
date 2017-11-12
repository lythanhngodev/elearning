-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2017 lúc 07:23 SA
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
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `MaGV` varchar(10) NOT NULL,
  `TenGV` varchar(100) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `SDT` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `TrangThai` bit(1) NOT NULL DEFAULT b'0',
  `XacNhan` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`MaGV`, `TenGV`, `DiaChi`, `SDT`, `Mail`, `TrangThai`, `XacNhan`) VALUES
('GV0001', 'Lê Thị Hoàng Yến', 'Vĩnh Long', '0192819287', 'yenlth@vlute.edu.vn\r\n', b'0', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_gv`
--

CREATE TABLE `login_gv` (
  `MaGV` varchar(10) NOT NULL,
  `TenDangNhap` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `login_gv`
--

INSERT INTO `login_gv` (`MaGV`, `TenDangNhap`, `MatKhau`) VALUES
('GV0001', 'hoangyen', '1234567');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`MaGV`);

--
-- Chỉ mục cho bảng `login_gv`
--
ALTER TABLE `login_gv`
  ADD PRIMARY KEY (`MaGV`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `login_gv`
--
ALTER TABLE `login_gv`
  ADD CONSTRAINT `lk_gv_vs_logingv` FOREIGN KEY (`MaGV`) REFERENCES `giaovien` (`MaGV`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
