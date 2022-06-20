-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 16, 2022 lúc 09:54 AM
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
-- Cơ sở dữ liệu: `ql_tour_dulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgia`
--

CREATE TABLE `chitietgia` (
  `maPhieuTour` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maTour` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doTuoi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `thanhTien` bigint(20) NOT NULL,
  `donVi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietgia`
--

INSERT INTO `chitietgia` (`maPhieuTour`, `maTour`, `doTuoi`, `soLuong`, `thanhTien`, `donVi`) VALUES
('PT1468', 'Tour1', '1', 1, 150000, ''),
('PT1468', 'Tour1', '2', 2, 500000, ''),
('PT1468', 'Tour1', '3', 3, 420000, ''),
('PT6763', 'Tour4', '1', 1, 64451, ''),
('PT6763', 'Tour4', '2', 2, 24854, ''),
('PT6763', 'Tour4', '3', 3, 13603935, ''),
('PT7191', 'TOUR-00116ETPAO', '1', 1, 147000, ''),
('PT7191', 'TOUR-00116ETPAO', '2', 1, 190000, ''),
('PT7191', 'TOUR-00116ETPAO', '3', 2, 360000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doitac`
--

CREATE TABLE `doitac` (
  `id` int(11) NOT NULL,
  `maCongTy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenCongTy` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0,
  `linkXacMinhEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiGianXacMinhEmail` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doitac`
--

INSERT INTO `doitac` (`id`, `maCongTy`, `tenCongTy`, `hinhAnh`, `soDienThoai`, `email`, `diaChi`, `password`, `tinhTrang`, `linkXacMinhEmail`, `thoiGianXacMinhEmail`) VALUES
(1, 'Cty1', 'CongTy1', NULL, '0211615616', 'congty1@gmail.com', 'Hà Nội', '123456', 1, '', NULL),
(2, 'Cty2', 'Công Ty 2', NULL, '0211615617', 'congty2@gmail.com', 'Hà Đông', '123456', 1, '', NULL),
(3, 'DT3N7412', 'Công ty du lịch ABC', NULL, '021451614147', 'congminhth3@gmail.com', 'Hà Đông', '$2y$10$ifZ/APZNk8RS.wfnThgs1eO5m2Dx6Xcb14Ku/Funn2gMw.Ki8jX.6', 0, 'ccfd430a1dbebcf572b7417d6187842a6885', NULL),
(4, 'DT4N514', 'Công ty du lịch ABC', NULL, '021451614465', 'congminh61th3@gmail.com', 'Hà Đông', '$2y$10$Y.aXD65XHBXFjH8Q8vi8aetOSzoN/maXNOkh4XWI.tNc74ili0ZAW', 1, '3c094dc97909311e0ad043c5bffedf0e8504', '2022-01-15 02:41:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giatour`
--

CREATE TABLE `giatour` (
  `maTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doTuoi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moTa` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` bigint(20) NOT NULL,
  `donVi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giatour`
--

INSERT INTO `giatour` (`maTour`, `doTuoi`, `moTa`, `gia`, `donVi`) VALUES
('TOUR-00116ETPAO', '1', '4 - 12 tuổi', 147000, 'VNĐ'),
('TOUR-00116ETPAO', '2', 'Trên 12 tuổi', 190000, 'VNĐ'),
('TOUR-00116ETPAO', '3', 'Trên 60 tuổi', 180000, 'VNĐ'),
('Tour1', '1', 'Trẻ em', 150000, ''),
('Tour1', '2', 'Người lớn', 250000, ''),
('Tour1', '3', 'Người Già', 140000, ''),
('Tour2', '1', 'Trẻ em', 448896, ''),
('Tour2', '2', 'Trung Niên', 1424456, ''),
('Tour2', '3', 'Người Già', 974945, ''),
('Tour3', '1', 'Thiếu Nhi', 461432, ''),
('Tour3', '2', 'Người Lớn', 142424, ''),
('Tour3', '3', 'Người Già', 545547, ''),
('Tour4', '1', 'Thiếu nhi', 64451, ''),
('Tour4', '2', 'Trung niên', 12427, ''),
('Tour4', '3', 'Người Lớn', 4534645, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `maNguoiDung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoVaTen` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soCMT` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0,
  `linkXacMinhEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiGianXacMinhEmail` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `maNguoiDung`, `hoVaTen`, `hinhAnh`, `ngaySinh`, `gioiTinh`, `soDienThoai`, `email`, `diaChi`, `soCMT`, `password`, `tinhTrang`, `linkXacMinhEmail`, `thoiGianXacMinhEmail`) VALUES
(1, '1', 'Lê Công Minh', NULL, '2001-07-01', 'Nam', '02116156163', 'cmza@gmail.com', 'Hà Đông Hà Nội', '00145464646', '123', 1, '', NULL),
(4, 'KH4N2911', 'Lê Hoàng Minh', NULL, '2022-01-21', 'Nam', '021451614465', 'congminhlei4@gmail.com', '170 Tây Sơn Đống Đa', '12354644646', '$2y$10$Yyup8nRG.laOx9/l4WiKL.9IvTy/s439c8UYGAUkpXYoSld/Pywua', 1, '857734c6c6494c1179348c7780cbe9b7121', '2022-01-06 07:06:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `maNhanVien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoVaTen` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `maNhanVien`, `hoVaTen`, `hinhAnh`, `ngaySinh`, `gioiTinh`, `soDienThoai`, `email`, `username`, `password`, `tinhTrang`) VALUES
(10, 'NV01', 'Dương Văn Công', NULL, '2001-12-04', 'Nam', '0373785045', 'duongcong0412hc@gmail.com', 'duongcong', '$2y$10$zAyKGLbyTmsS0Y7mSRLNH.lOBBbI0M/G5QvASdU1e60bOY8Vr1ns6', 1),
(11, 'NV02', 'Administrator', NULL, '1998-05-06', 'Nam', '0354789541', 'administrator@gmail.com', 'admin', '$2y$10$46g0HbyyyKxlsbs1gLn63.u9OvjvacO4fJwLmjfJG1FLg1K8J7Jm2', 1),
(12, 'NV03', 'Cong', NULL, '2001-12-04', 'Nam', '0346987541', 'cong@gmail.com', 'cong', '$2y$10$16tqLjepw0ItUvlv8nY9f.MtbYwplMHbjgALvsOZy5/UCa0Ju4J0u', 1),
(13, 'NV04', 'Admin 2', NULL, '1995-03-16', 'Nữ', '09874512369', 'admin2@gmail.com', 'admin2', '$2y$10$.dWR.fUf3bu0LtJhTnfU5..MwTKwerAYsi2LQ0y8wLqVlaRxladUW', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudangkitour`
--

CREATE TABLE `phieudangkitour` (
  `maPhieuTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maNguoiDung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soKhach` int(11) NOT NULL,
  `maTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiGianDat` datetime NOT NULL,
  `hinhThucThanhToan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0,
  `tongTien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudangkitour`
--

INSERT INTO `phieudangkitour` (`maPhieuTour`, `maNguoiDung`, `soKhach`, `maTour`, `thoiGianDat`, `hinhThucThanhToan`, `tinhTrang`, `tongTien`) VALUES
('PT1468', 'KH4N2911', 6, 'Tour1', '2022-01-16 04:33:58', 'Chuyển Khoản', 0, 1070000),
('PT6763', 'KH4N2911', 6, 'Tour4', '2022-01-16 05:07:14', 'Chuyển Khoản', 0, 13693240),
('PT7191', 'KH4N2911', 4, 'TOUR-00116ETPAO', '2022-01-16 09:21:42', 'Chuyển Khoản', 0, 697000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `maTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenTour` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayKhoiHanh` date NOT NULL,
  `ngayKetThuc` date NOT NULL,
  `diemKhoiHanh` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diemKetThuc` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaiHinh` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moTa` varchar(7000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maCongTy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `maTour`, `tenTour`, `hinhAnh`, `ngayKhoiHanh`, `ngayKetThuc`, `diemKhoiHanh`, `diemKetThuc`, `loaiHinh`, `moTa`, `maCongTy`, `tinhTrang`) VALUES
(1, 'Tour1', 'Hà Nam Lạng Sơn', 'Tour1.jpg', '2022-07-13', '2022-07-19', 'Hà Nam', 'Lạng Sơn', 'Miền Bắc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', 'Cty1', 1),
(2, 'Tour2', 'Hà Nội Hà Nam', 'Tour2.jpg', '2022-07-06', '2022-07-20', 'Hà Nội', 'Hà Nam', 'Leo núi', 'lore jansfjasifn oan osafnjoasujdsaoi jaso jj ioaj dọi a ạ psaj psaj dpa jp japsdjp ad', 'Cty2', 1),
(3, 'Tour3', 'Hà Nội Hà Bắc', 'Tour3.jpg', '2022-05-13', '2022-06-20', 'Hà Nội', 'Hà Bắc', 'Mạo hiểm', 'Tour Sài Gòn – Đà Lạt ĐÃ QUAY TRỞ LẠI và đồng hành hàng tuần suốt năm cùng quý khách hàng thân yêu. Đà Lạt muôn sắc hoa luôn là tuyến tour thu hút lượng khách du lịch đông đảo nhất. Không chỉ bởi không khí se lạnh, mát mẻ của Đà Lạt; mà ở đó còn là nơi trăm hoa đua sắc. Hãy cùng Puolo Trip khám phá Đà Lạt với lịch trình vô cùng hấp dẫn, đặc sắc, mới mẻ cùng nhiều quà tặng kèm theo nhé !!!', 'Cty1', 1),
(4, 'Tour4', 'Hà Đông Hội An', 'Tour4.jpg', '2022-03-06', '2022-04-20', 'Hà Đông', 'Hội An', 'Miền Bắc', 'Bên cạnh đó Vũng Chùa – Đảo yến là một nơi linh thiêng mà ai cũng biết đến,đó là nơi an nghỉ của Đại Tướng Võ Nguyên Giáp , một vị tương tài của dân tộc tộc , một người con ưu tú của mảnh đất Quảng Bình.Nằm trên con đường thiên lý Bắc-Nam cách Đèo Ngang 7 km Vũng Chùa Đảo Yến đã đón hàng triệu lượt du khách hướng về Đại tướng.', 'Cty2', 1),
(10, 'TOUR-00116ETPAO', 'Suối mơ 1 ngày', 'TOUR-00116ETPAO.jpg', '2022-01-16', '2022-01-16', 'Đồng Nai', 'Đồng Nai', 'Suối nước nóng', 'LỊCH TRÌNH: TP.HCM - KDL SUỐI MƠ - VƯỜN CA CAO (Ăn sáng, trưa)\r\nBuổi sáng: Xe và HDV du lịch Kỷ Nguyên Tourist đón khách tại điểm hẹn khởi hành đi Đồng Nai.\r\n- Quý khách dùng điểm tâm sáng tại nhà hàng gần khu vực Dầu Giây.\r\n- Trên đường đi xe ngang qua chiêm ngưỡng Khu danh thắng Đá Ba Chồng Định Quán.\r\n- Đến khu du lịch Suối Mơ tổng diện tích hơn 300,000 m2. Sắc xanh của cây và màu trắng từ những bọt nước của những con suối đổ xuống tạo nên một không gian vô cùng hữu tình và rất thơ mộng.\r\n- Suối Mơ Park được ví như thiên đường \"biển trên rừng\" mặt nước trong xanh quanh năm chảy ra từ các mạch nước ngầm, Thỏa sức check in với các cảnh đẹp “ảo tung chảo” miễn phí như: khu vườn hồng hạc, khu ống trượt, cầu tình yêu, và các đầm sen quanh khuôn viên của công viên…\r\n- Đến với Công viên Suối Mơ, bạn và gia đình sẽ vô cùng thích thú khi lội xuống dòng suối trong vắt, chạm đến những viên đá mát lạnh dưới chân và đây cũng là hồ tắm thiên nhiên duy nhất mà bạn có thể nhìn thấy những viên sỏi dưới chân, ngắm cá bơi lội…Hồ nước ngọt tự nhiên được chặn dòng tạo thành hồ tắm lớn nhất trong khu vực Đông Nam Bộ\r\n- Đặc biệt, bạn có thể thử sức tham gia các hoạt động vui chơi như: đạp xe trên nước, cầu trượt nước, mô tô nước, ô tô nước, cá bú bình, massage cá,… hay nằm nghỉ ngơi thư giãn tận hưởng không gian tại khu mái chòi… (chi phí trò chơi và thuê áo phao tự túc)\r\nBuổi trưa: Quý khách dùng cơm trưa tại nhà hàng KDL Suối Mơ..\r\n- Đoàn tập trung ra xe khởi hành về TP.HCM. Dừng chân nghỉ ngơi tại Vườn Ca Cao Trọng Đức, Quý khách có thể mua các sản phẩm làm từ cacao về cho người thân (chi phí tham quan vườn tự túc)\r\nDự kiến khoảng 17h30: Về đến TP.HCM, Kỷ Nguyên Tourist chào tạm biệt, hẹn gặp lại Quý Khách.', 'DT4N514', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD PRIMARY KEY (`maPhieuTour`,`maTour`,`doTuoi`),
  ADD KEY `maTour` (`maTour`,`doTuoi`);

--
-- Chỉ mục cho bảng `doitac`
--
ALTER TABLE `doitac`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maCongTy` (`maCongTy`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `giatour`
--
ALTER TABLE `giatour`
  ADD PRIMARY KEY (`maTour`,`doTuoi`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maNguoiDung` (`maNguoiDung`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `diaChi` (`diaChi`),
  ADD UNIQUE KEY `soCMT` (`soCMT`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maNhanVien` (`maNhanVien`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD PRIMARY KEY (`maPhieuTour`),
  ADD KEY `maTour` (`maTour`),
  ADD KEY `maNguoiDung` (`maNguoiDung`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maTour` (`maTour`),
  ADD KEY `maCongTy` (`maCongTy`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `doitac`
--
ALTER TABLE `doitac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD CONSTRAINT `chitietgia_ibfk_1` FOREIGN KEY (`maPhieuTour`) REFERENCES `phieudangkitour` (`maPhieuTour`),
  ADD CONSTRAINT `chitietgia_ibfk_2` FOREIGN KEY (`maTour`,`doTuoi`) REFERENCES `giatour` (`maTour`, `doTuoi`);

--
-- Các ràng buộc cho bảng `giatour`
--
ALTER TABLE `giatour`
  ADD CONSTRAINT `giatour_ibfk_1` FOREIGN KEY (`maTour`) REFERENCES `tour` (`maTour`);

--
-- Các ràng buộc cho bảng `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD CONSTRAINT `phieudangkitour_ibfk_1` FOREIGN KEY (`maTour`) REFERENCES `tour` (`maTour`),
  ADD CONSTRAINT `phieudangkitour_ibfk_2` FOREIGN KEY (`maNguoiDung`) REFERENCES `nguoidung` (`maNguoiDung`);

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`maCongTy`) REFERENCES `doitac` (`maCongTy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
