-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2021 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_fastfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `id` int(11) NOT NULL,
  `DatHang_id` int(11) DEFAULT NULL,
  `SanPham_id` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `tongTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`id`, `DatHang_id`, `SanPham_id`, `gia`, `soLuong`, `tongTien`) VALUES
(7, 3, 1, 60000, 10, 600000),
(8, 4, 2, 12000, 10, 120000),
(9, 4, 1, 60000, 11, 660000),
(10, 5, 1, 60000, 1, 60000),
(11, 5, 2, 12000, 5, 60000),
(12, 5, 3, 44000, 1, 44000),
(13, 5, 6, 46000, 1, 46000),
(14, 6, 1, 60000, 6, 360000),
(15, 6, 3, 44000, 1, 44000),
(16, 7, 2, 12000, 5, 60000),
(17, 7, 1, 60000, 1, 60000),
(18, 7, 3, 44000, 1, 44000),
(19, 7, 6, 46000, 1, 46000),
(20, 8, 1, 60000, 20, 1200000),
(21, 8, 2, 12000, 5, 60000),
(22, 8, 3, 44000, 2, 88000),
(23, 8, 6, 46000, 2, 92000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `id` int(11) NOT NULL,
  `hoTen` varchar(50) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `diaChi` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `ngayDat` datetime DEFAULT NULL,
  `trangThai` int(11) DEFAULT NULL,
  `tongTien` int(11) DEFAULT 0,
  `co` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`id`, `hoTen`, `sdt`, `diaChi`, `note`, `ngayDat`, `trangThai`, `tongTien`, `co`) VALUES
(3, 'NVM', NULL, NULL, NULL, '2021-11-18 02:56:39', 1, 600000, 0),
(4, 'NDD', NULL, NULL, NULL, '2021-11-18 02:57:05', 1, 780000, 0),
(5, 'Nghĩa ', NULL, NULL, NULL, '2021-11-18 02:57:20', 1, 310000, 0),
(6, 'Thao', NULL, NULL, NULL, '2022-11-18 02:58:15', 1, 404000, 0),
(7, 'Nhật', NULL, NULL, NULL, '2022-08-18 02:58:34', 1, 210000, 0),
(8, 'Mạnh', NULL, NULL, NULL, '2021-03-18 02:59:00', 1, 1480000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `Malsp` int(11) NOT NULL,
  `tenlsp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`Malsp`, `tenlsp`) VALUES
(1, 'Chicken'),
(2, 'Burger'),
(3, 'Noodles'),
(4, 'Cơm'),
(5, 'Drinks');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacc`
--

CREATE TABLE `nhacc` (
  `maNcc` int(11) NOT NULL,
  `tenNcc` varchar(50) NOT NULL,
  `diaChincc` varchar(200) NOT NULL,
  `sdtNcc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacc`
--

INSERT INTO `nhacc` (`maNcc`, `tenNcc`, `diaChincc`, `sdtNcc`) VALUES
(1, 'Dao Van Nguyen', 'Hai Duong', '0346724546'),
(2, 'Tong Thi Giang', 'Nam Dinh', '0977368123'),
(3, 'Nguyễn văn b', 'Long An', '0975467356'),
(4, 'Đỗ văn Long', 'Hà Nội', '0866453867'),
(5, 'Nguyễn Thị Huế', 'TPHCM', '0373455377'),
(6, 'Đào văn Nguyên', 'Phú Thọ', '0966845123'),
(7, 'Lưu Thanh Huyền', 'Hà Nội', '0455367888'),
(8, 'Trịnh Viết Khải', 'Thanh Hóa', '0966734567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapkho`
--

CREATE TABLE `nhapkho` (
  `maNl` int(11) NOT NULL,
  `tenNl` varchar(50) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `tenNcc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhapkho`
--

INSERT INTO `nhapkho` (`maNl`, `tenNl`, `soLuong`, `tenNcc`) VALUES
(1, 'Hanh', 30, 'Dao Van Nguyen'),
(2, 'Thit bo', 100, 'Tong Thi Giang'),
(3, 'Xà lách', 20, 'Nguyễn Văn b'),
(4, 'Gà, thịt lợn', 30, 'Đỗ Văn Long'),
(5, 'Bánh mì', 143, 'Trịnh Viết Khải'),
(6, 'Mỳ', 53, 'Lưu Thanh Huyền'),
(7, 'Cải bắp', 60, 'Đỗ Văn Long'),
(8, 'Sả, Tiêu', 10, 'Dao Van Nguyen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qlsanpham`
--

CREATE TABLE `qlsanpham` (
  `masp` int(11) NOT NULL,
  `malsp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `gia` float NOT NULL,
  `mota` text NOT NULL,
  `hinhanh` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `qlsanpham`
--

INSERT INTO `qlsanpham` (`masp`, `malsp`, `tensp`, `gia`, `mota`, `hinhanh`) VALUES
(1, 1, 'Ga ran', 60000, 'Ngon gion', 'https://ameovat.com/wp-content/uploads/2016/05/cach-lam-ga-ran.jpg'),
(2, 5, 'Coca', 12000, 'Nước có ga', 'https://lmt.com.vn/wp-content/uploads/2014/12/tao-mot-lon-coca-cola-su-dung-adobe-photoshop-0.jpg'),
(3, 2, 'Burger phô mai', 44000, 'Bò phô mai đặc biệt', 'https://mcdonalds.vn/uploads/2018/food/burgers/cheese-burger-deluxe.png'),
(6, 4, 'Cơm thịt nướng', 46000, 'Combo phần ăn cơm, thịt nướng, coca', 'https://mcdonalds.vn/uploads/2018/food/rice/MEAL_porkrice.png'),
(20, 2, 'Burger bò', 59000, 'Burger bò khoai giòn tràn phô mai', 'https://burgerking.vn/media/catalog/product/cache/1/small_image/300x/9df78eab33525d08d6e5fb8d27136e95/c/r/crunchy_bg-min_1.jpg'),
(40, 3, 'Mỳ ý', 35000, 'Sợi mỳ dai ngon khó cưỡng', 'https://i.ytimg.com/vi/qOxkj4Tm14U/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Ma` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Que` varchar(255) NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `Ngaysinh` datetime NOT NULL,
  `cmnd` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `tentk` varchar(50) NOT NULL,
  `mk` varchar(50) NOT NULL,
  `ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Ma`, `HoTen`, `Que`, `GioiTinh`, `Ngaysinh`, `cmnd`, `sdt`, `tentk`, `mk`, `ID`) VALUES
(2, 'Nguyễn Thị Hằng', 'Ha Noi', '1', '2003-11-03 16:06:20', '44456748953', '0321456833', 'Nhanvien1', '12345678', 2),
(7, '', '', '', '0000-00-00 00:00:00', '', '', 'Nghia123', '123', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SanPham_id` (`SanPham_id`),
  ADD KEY `DatHang_id` (`DatHang_id`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`Malsp`);

--
-- Chỉ mục cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  ADD PRIMARY KEY (`maNcc`);

--
-- Chỉ mục cho bảng `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD PRIMARY KEY (`maNl`);

--
-- Chỉ mục cho bảng `qlsanpham`
--
ALTER TABLE `qlsanpham`
  ADD PRIMARY KEY (`masp`,`malsp`),
  ADD KEY `malsp` (`malsp`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Ma`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `Malsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  MODIFY `maNcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nhapkho`
--
ALTER TABLE `nhapkho`
  MODIFY `maNl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `qlsanpham`
--
ALTER TABLE `qlsanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
