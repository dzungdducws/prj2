-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 01, 2022 lúc 10:12 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `prj2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuongtrinh`
--

CREATE TABLE `chuongtrinh` (
  `ID_chuong_trinh` int(11) NOT NULL,
  `ten_chuong_trinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `anh_minh_hoa` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `thong_tin_chuong_trinh` varchar(1000) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `gia_ve` double NOT NULL,
  `ngay_chieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuongtrinh`
--

INSERT INTO `chuongtrinh` (`ID_chuong_trinh`, `ten_chuong_trinh`, `anh_minh_hoa`, `thong_tin_chuong_trinh`, `gia_ve`, `ngay_chieu`) VALUES
(1, 'CHÚA TỂ RỪNG XANH', 'product-1.jpg', 'Là chương trình biểu diễn xiếc kết hợp nghệ thuật sân khấu kịch và ca nhạc dành cho thiếu nhi được dàn dựng KÌ CÔNG và MÃN NHÃN NHẤT từ trước tới nay, vở diễn “Chúa tể rừng xanh” đã mang tới cho các khán giả nhí Thủ Đô hàng chục suất chiếu bùng nổ tiếng cười và những tràng vỗ tay hoan hô nhiệt liệt.', 100000, '2022-08-02'),
(2, 'Xiếc Việt Nam', 'haaland.jpg', ' Ở Việt Nam suốt thời gian dài từ những năm trước Cách mạng tháng Tám và mãi về sau này. Nhiều người vẫn chỉ coi xiếc là một thứ làm trò , làm xiếc để mua vui cho thiên hạ . Những năm gần đây cùng với sự trưởng thành của ngành Xiếc Việt Nam. Với sự tồn tại và hiện diện của liên đoàn xiếc Việt Nam suốt 40 năm qua. Với tài năng của các nghệ sĩ, Xiếc Việt Nam không những được đông đảo khán giả và nghệ sĩ trong nước công nhận, hâm mộ mà còn được cả nước ngoài hoan nghênh. Thậm chí  được tặng các giải cao trong các Festivan xiếc quốc tế … Nghệ thuật xiếc Việt Nam đã nghiễm nhiên gia nhập đại gia đình nghệ thuật sân khấu VN .', 200000, '2022-08-07'),
(3, 'Nhiều cơ hội mới cho nghệ thuật biểu diễn', 'product-1.jpg', 'Phát triển công nghiệp văn hóa Thủ đô Hà Nội giai đoạn 2021 - 2025, định hướng đến năm 2030, tầm nhìn đến năm 2045”', 50000, '2022-08-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghe`
--

CREATE TABLE `ghe` (
  `ID_ghe` int(11) NOT NULL,
  `hang` int(11) NOT NULL,
  `cot` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `gia` double NOT NULL,
  `ID_hoa_don` int(11) NOT NULL,
  `ID_chuong_trinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ghe`
--

INSERT INTO `ghe` (`ID_ghe`, `hang`, `cot`, `trang_thai`, `gia`, `ID_hoa_don`, `ID_chuong_trinh`) VALUES
(1, 1, 2, 0, 200000, 1, 2),
(2, 1, 4, 0, 200000, 1, 2),
(3, 1, 6, 0, 200000, 1, 2),
(4, 3, 4, 0, 200000, 2, 2),
(5, 4, 5, 0, 200000, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoa_don` int(11) NOT NULL,
  `so_ve` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `id_khach_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_hoa_don`, `so_ve`, `trang_thai`, `id_khach_hang`) VALUES
(1, 3, 1, 1),
(2, 2, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `ID_khuyen_mai` int(11) NOT NULL,
  `ma` varchar(15) NOT NULL,
  `gia_tri` double NOT NULL,
  `ngay_het_han` date NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`ID_khuyen_mai`, `ma`, `gia_tri`, `ngay_het_han`, `so_luong`) VALUES
(1, 'dzungdducws', 50, '2022-07-22', 10),
(2, 'khonggiamgica', 90, '2022-08-07', 20),
(3, '0987654321q', 20, '2022-08-07', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ten` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ID_tai_khoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ten`, `sdt`, `email`, `ID_tai_khoan`) VALUES
('Dũng', '0369852285', 'dzungdducws@gmail.com', 2),
('Admin', '0123456789', 'net@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `tai_khoan` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `loai_tai_khoan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `tai_khoan`, `mat_khau`, `loai_tai_khoan`) VALUES
(1, 'admin', 'admin', 1),
(2, 'dzung', 'dzung', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `ID_thanh_toan` int(11) NOT NULL,
  `tong_tien` double NOT NULL,
  `ngay_tao` date NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`ID_thanh_toan`, `tong_tien`, `ngay_tao`, `anh`) VALUES
(1, 600000, '2022-07-31', 'product-1.jpg'),
(2, 400000, '2022-08-01', 'product-1.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuongtrinh`
--
ALTER TABLE `chuongtrinh`
  ADD PRIMARY KEY (`ID_chuong_trinh`);

--
-- Chỉ mục cho bảng `ghe`
--
ALTER TABLE `ghe`
  ADD PRIMARY KEY (`ID_ghe`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hoa_don`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`ID_khuyen_mai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`ID_thanh_toan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuongtrinh`
--
ALTER TABLE `chuongtrinh`
  MODIFY `ID_chuong_trinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ghe`
--
ALTER TABLE `ghe`
  MODIFY `ID_ghe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `ID_khuyen_mai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `ID_thanh_toan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
