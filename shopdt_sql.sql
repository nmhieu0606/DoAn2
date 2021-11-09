-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2021 at 05:47 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdt`
--

-- --------------------------------------------------------

--
-- Table structure for table `baohanh`
--

CREATE TABLE `baohanh` (
  `id` int(11) NOT NULL,
  `thoigianbaohanh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `baohanh`
--

INSERT INTO `baohanh` (`id`, `thoigianbaohanh`) VALUES
(4, '6 tháng'),
(5, '12 tháng'),
(6, '24 tháng'),
(7, '36 tháng');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) NOT NULL,
  `tenchucvu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `tenchucvu`) VALUES
(1, 'Quản lý'),
(3, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'IOS'),
(2, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `ngaydathang` date NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dathang_chitiet`
--

CREATE TABLE `dathang_chitiet` (
  `dathang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cmnd` int(12) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tendangnhap` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `hovaten`, `gioitinh`, `sdt`, `cmnd`, `ngaysinh`, `diachi`, `email`, `tendangnhap`, `matkhau`) VALUES
(6, 'hieu', 0, '1561515', 56414441, '2021-10-08', 'long xuyên', '08698870741@gmail.com', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `nhanhieu`
--

CREATE TABLE `nhanhieu` (
  `id` int(11) NOT NULL,
  `nhanhieu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `nhanhieu`
--

INSERT INTO `nhanhieu` (`id`, `nhanhieu`) VALUES
(4, 'IPHONE'),
(8, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cmnd` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chucvu_id` int(11) NOT NULL,
  `tendangnhap` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `hovaten`, `gioitinh`, `ngaysinh`, `diachi`, `sdt`, `cmnd`, `chucvu_id`, `tendangnhap`, `matkhau`, `email`) VALUES
(1, 'Nguyễn Minh Hiếu', 0, '2021-10-01', 'long xuyên', '0123456789', '56414441', 1, 'admin', '$2y$10$ECu1YAMahvY/DMPcyaelsu3FhekyRK5dfjf16U5gqPJFKF/LMYezO', 'nmhieu_19pm@student.agu.edu.vn'),
(3, 'hieu1', 0, '2021-10-14', 'long xuyên', '0123456789', '56414441', 1, 'hieu', '123', 'nmhieu_19pm@student.agu.edu.vn'),
(4, 'hieu1123', 0, '2021-10-02', 'long xuyên', '0123456789', '56414441', 3, 'user', '123', '08698870741@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gianhap` float NOT NULL,
  `giaxuat` float NOT NULL,
  `nhanhieu_id` int(11) NOT NULL,
  `xuatxu_id` int(11) NOT NULL,
  `baohanh_id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `chitiet` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `anh`, `soluong`, `gianhap`, `giaxuat`, `nhanhieu_id`, `xuatxu_id`, `baohanh_id`, `danhmuc_id`, `chitiet`) VALUES
(21, 'iphone12', '1633241836-sanpham.jpg', 10, 2000, 3000, 4, 4, 6, 1, '<p>asdasd</p>'),
(22, 'samsung A30', '1633241914-sanpham.jpg', 20, 2000000, 3000000, 8, 6, 6, 2, '<p>dasdasdddasd</p>'),
(23, 'iphone7', '1633321570-sanpham.jpg', 12, 2000, 4000, 4, 1, 6, 1, '<p>asdads</p>');

-- --------------------------------------------------------

--
-- Table structure for table `xuatxu`
--

CREATE TABLE `xuatxu` (
  `id` int(11) NOT NULL,
  `xuatxu` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `xuatxu`
--

INSERT INTO `xuatxu` (`id`, `xuatxu`) VALUES
(1, 'VN'),
(4, 'US'),
(6, 'KOREAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`);

--
-- Indexes for table `dathang_chitiet`
--
ALTER TABLE `dathang_chitiet`
  ADD KEY `dathang_id` (`dathang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chucvu_id` (`chucvu_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanhieu_id` (`nhanhieu_id`),
  ADD KEY `xuatxu_id` (`xuatxu_id`),
  ADD KEY `baohanh_id` (`baohanh_id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baohanh`
--
ALTER TABLE `baohanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhanhieu`
--
ALTER TABLE `nhanhieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dathang_chitiet`
--
ALTER TABLE `dathang_chitiet`
  ADD CONSTRAINT `dathang_chitiet_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_chitiet_ibfk_2` FOREIGN KEY (`dathang_id`) REFERENCES `dathang` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`chucvu_id`) REFERENCES `chucvu` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`xuatxu_id`) REFERENCES `xuatxu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`baohanh_id`) REFERENCES `baohanh` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`nhanhieu_id`) REFERENCES `nhanhieu` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
