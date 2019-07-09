-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 23, 2018 lúc 06:43 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dc_shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `bl_id` int(10) UNSIGNED NOT NULL,
  `bl_kh_id` int(10) UNSIGNED NOT NULL,
  `bl_sp_id` int(10) UNSIGNED NOT NULL,
  `bl_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ctdh_id` int(10) UNSIGNED NOT NULL,
  `ctdh_sp_id` int(10) UNSIGNED NOT NULL,
  `ctdh_dh_id` int(10) UNSIGNED NOT NULL,
  `ctdh_so_luong` int(11) NOT NULL,
  `ctdh_gia_ban` double NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ctdh_id`, `ctdh_sp_id`, `ctdh_dh_id`, `ctdh_so_luong`, `ctdh_gia_ban`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(5, 2, 7, 4, 70000, 'Size: S, màu: Xám', '2018-08-23 16:30:09', '2018-08-23 16:30:09'),
(6, 3, 7, 1, 8855000, 'Size: 50\'\', màu: Đen', '2018-08-23 16:30:09', '2018-08-23 16:30:09'),
(7, 4, 7, 1, 11000000, 'Size: 6.3, màu: Đỏ ánh dương', '2018-08-23 16:30:09', '2018-08-23 16:30:09'),
(8, 1, 7, 2, 900000, 'Size: 36, màu: Cam', '2018-08-23 16:30:09', '2018-08-23 16:30:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cuocphivanchuyen`
--

CREATE TABLE `cuocphivanchuyen` (
  `cpvc_id` int(10) UNSIGNED NOT NULL,
  `cpvc_tp_id` int(10) UNSIGNED NOT NULL,
  `cpvc_gia_cuoc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cuocphivanchuyen`
--

INSERT INTO `cuocphivanchuyen` (`cpvc_id`, `cpvc_tp_id`, `cpvc_gia_cuoc`) VALUES
(1, 1, 0),
(4, 2, 15000),
(5, 3, 100000),
(6, 4, 15000),
(7, 5, 30000),
(8, 6, 50000),
(9, 7, 55000),
(10, 8, 17000),
(11, 9, 10000),
(12, 10, 25000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `dmsp_id` int(10) UNSIGNED NOT NULL,
  `dmsp_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`dmsp_id`, `dmsp_ten`, `parent`, `trang_thai`) VALUES
(1, 'Thời trang và phụ kiện', 0, 'ON'),
(2, 'Máy tính', 0, 'ON'),
(3, 'Điện máy', 0, 'ON'),
(4, 'Điện gia dụng', 0, 'ON'),
(5, 'Điện thoại di động', 0, 'ON'),
(12, 'Thời trang nam', 1, 'ON'),
(13, 'Thời trang nữ', 1, 'ON'),
(14, 'Mắt kính', 1, 'ON'),
(15, 'Đồng hồ', 1, 'ON'),
(16, 'Túi xách', 1, 'ON'),
(17, 'Giày & dép nam', 1, 'ON'),
(18, 'Giày & dép nữ', 1, 'ON'),
(19, 'Máy tính để bàn', 2, 'ON'),
(20, 'Laptop', 2, 'ON'),
(21, 'Linh kiện máy để bàn', 2, 'ON'),
(22, 'Linh kiện Laptop', 2, 'ON'),
(23, 'Tivi', 3, 'ON'),
(24, 'Tủ lạnh', 3, 'ON'),
(25, 'Máy lạnh', 3, 'ON'),
(26, 'Máy giặt', 3, 'ON'),
(27, 'Bếp gas', 4, 'ON'),
(28, 'Nồi cơm điện', 4, 'ON'),
(29, 'Lò nướng', 4, 'ON'),
(30, 'Lò vi sóng', 4, 'ON'),
(31, 'Máy pha cà phê', 4, 'ON'),
(32, 'Máy hút bụi', 4, 'ON'),
(33, 'Bếp điện từ', 4, 'ON'),
(34, 'Bếp hồng ngoại', 4, 'ON'),
(35, 'Asus', 5, 'ON'),
(36, 'Samsung', 5, 'ON'),
(37, 'Sony', 5, 'ON'),
(38, 'Nokia', 5, 'ON'),
(39, 'Xiaomi', 5, 'ON'),
(40, 'Huawei', 5, 'ON'),
(41, 'Oppo', 5, 'ON'),
(42, 'iPhone', 5, 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuctintuc`
--

CREATE TABLE `danhmuctintuc` (
  `dmtt_id` int(10) UNSIGNED NOT NULL,
  `dmtt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuctintuc`
--

INSERT INTO `danhmuctintuc` (`dmtt_id`, `dmtt_ten`, `trang_thai`) VALUES
(1, 'Thời trang', 'ON'),
(2, 'Công Nghệ', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachigiaohang`
--

CREATE TABLE `diachigiaohang` (
  `dcgh_id` int(10) UNSIGNED NOT NULL,
  `dcgh_kh_id` int(10) UNSIGNED NOT NULL,
  `dcgh_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dcgh_phuong_xa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dcgh_quan_huyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dcgh_thanh_pho` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachigiaohang`
--

INSERT INTO `diachigiaohang` (`dcgh_id`, `dcgh_kh_id`, `dcgh_dia_chi`, `dcgh_phuong_xa`, `dcgh_quan_huyen`, `dcgh_thanh_pho`) VALUES
(3, 15, '574/3/24/2A - Kinh Dương Vương', '1', '1', '1'),
(4, 15, 'AAA', '51', '4', '2'),
(5, 14, 'QQQ', '21', '2', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `dh_id` int(10) UNSIGNED NOT NULL,
  `dh_kh_id` int(10) UNSIGNED NOT NULL,
  `dh_dia_chi_id` int(11) NOT NULL,
  `dh_pgg_id` int(10) UNSIGNED NOT NULL,
  `dh_ltt_id` int(10) UNSIGNED NOT NULL,
  `dh_tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `dh_cpvc_id` int(10) UNSIGNED NOT NULL,
  `dh_tong_tien` double NOT NULL,
  `dh_ngay_dat_hang` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`dh_id`, `dh_kh_id`, `dh_dia_chi_id`, `dh_pgg_id`, `dh_ltt_id`, `dh_tinh_trang_id`, `dh_cpvc_id`, `dh_tong_tien`, `dh_ngay_dat_hang`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 1, 1, 1, 4, 65000, '0000-00-00', NULL, '2018-08-19 06:46:36'),
(7, 15, 4, 1, 2, 1, 4, 21950000, '2018-08-23', '2018-08-23 16:30:09', '2018-08-23 16:30:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangdoi_tra`
--

CREATE TABLE `donhangdoi_tra` (
  `dhdt_id` int(10) UNSIGNED NOT NULL,
  `dhdt_kh_id` int(10) UNSIGNED NOT NULL,
  `dhdt_dh_id` int(10) UNSIGNED NOT NULL,
  `dhdt_ngay_doi_tra` datetime NOT NULL,
  `dhdt_thao_tac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dhdt_ly_do` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dhdt_tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangdoi_tra`
--

INSERT INTO `donhangdoi_tra` (`dhdt_id`, `dhdt_kh_id`, `dhdt_dh_id`, `dhdt_ngay_doi_tra`, `dhdt_thao_tac`, `dhdt_ly_do`, `dhdt_tinh_trang_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2018-08-20 00:00:00', 'Trả hàng', 'Like a shit', 1, '2018-08-19 07:28:43', '2018-08-19 07:54:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `donvitinh_id` int(10) UNSIGNED NOT NULL,
  `donvitinh_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitinh`
--

INSERT INTO `donvitinh` (`donvitinh_id`, `donvitinh_ten`, `chu_thich`) VALUES
(1, 'Size số', 'Size theo số của Việt Nam'),
(2, 'Size chữ', 'Size theo chữ'),
(3, 'inch', 'inches');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `emailnhantinkhuyenmai`
--

CREATE TABLE `emailnhantinkhuyenmai` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `emailnhantinkhuyenmai`
--

INSERT INTO `emailnhantinkhuyenmai` (`id`, `email`) VALUES
(4, '1551010024.dat@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanhvi`
--

CREATE TABLE `hanhvi` (
  `hv_id` int(10) UNSIGNED NOT NULL,
  `hv_kh_id` int(10) UNSIGNED NOT NULL,
  `hv_sp_id` int(10) UNSIGNED NOT NULL,
  `hv_so_lan_xem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hv_rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhsanpham`
--

CREATE TABLE `hinhanhsanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `hasp_sp_id` int(10) UNSIGNED NOT NULL,
  `hasp_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhsanpham`
--

INSERT INTO `hinhanhsanpham` (`id`, `hasp_sp_id`, `hasp_ten`) VALUES
(7, 2, 'ao-thun-tron-den-nam.jpg'),
(8, 2, 'bEwt_ao-thun-tron-do-nam.jpg'),
(9, 2, 'ao-thun-tron-tim-nam.jpg'),
(11, 2, 'ao-thun-tron-trang-nam.jpg'),
(12, 2, 'ao-thun-tron-xam-nam.jpg'),
(13, 2, 'ao-thun-tron-xanh-nam.jpg'),
(25, 4, 'V6ap_oppo-f9-2.jpg'),
(26, 4, 'bYGu_Oppo-F9.jpg'),
(27, 4, '1DnX_OPPO-F9-Pro-25MP.jpg'),
(28, 4, '7IuO_oppo-f9-3.jpg'),
(29, 1, '3Xyz_bitis-hunterX-lifeflex-cam-1.jpg'),
(30, 1, 'LsSe_bitis-hunterX-lifeflex-cam-2.jpg'),
(31, 1, 'S9iW_bitis-hunterX-lifeflex-cam-3.jpg'),
(32, 1, 'BQ16_bitis-hunterX-lifeflex-cam-4.jpg'),
(33, 1, '16Bf_bitis-hunterX-lifeflex-cam-5.jpg'),
(34, 1, 'tS4z_bitis-hunterX-lifeflex-cam-6.jpg'),
(35, 3, 'Lz7N_tivi-led-asanzo-50inch.jpg'),
(36, 3, 'XHaP_tivi-led-asanzo-50inch-1.jpg'),
(37, 3, 'Bp4G_tivi-led-asanzo-50inch-3.jpg'),
(38, 3, 'ExAY_tivi-led-asanzo-50inch-2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_id` int(10) UNSIGNED NOT NULL,
  `kh_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_ngay_sinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_gioi_tinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_sdt` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `kh_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`kh_id`, `kh_ten`, `kh_ngay_sinh`, `kh_gioi_tinh`, `kh_sdt`, `kh_email`, `created_at`, `updated_at`) VALUES
(14, 'Nguyễn Văn A', 'null/null/null', 'Nam', '0123456789', 'abc@gmail.com', '2018-07-29 03:07:34', '2018-07-29 03:07:34'),
(15, 'Mai Lâm Tấn Đạt', '4/11/1997', 'Nam', '01647439597', '1551010024.dat@gmail.com', '2018-08-16 23:57:55', '2018-08-23 05:36:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khohang`
--

CREATE TABLE `khohang` (
  `khohang_id` int(10) UNSIGNED NOT NULL,
  `khohang_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khohang`
--

INSERT INTO `khohang` (`khohang_id`, `khohang_ten`, `trang_thai`) VALUES
(1, '269 Nguyễn Kiệm, Gò Vấp', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kichthuoc`
--

CREATE TABLE `kichthuoc` (
  `size_id` int(10) UNSIGNED NOT NULL,
  `size_sp_id` int(10) UNSIGNED NOT NULL,
  `size_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kichthuoc`
--

INSERT INTO `kichthuoc` (`size_id`, `size_sp_id`, `size_ten`) VALUES
(1, 2, 'S'),
(2, 2, 'M'),
(3, 2, 'L'),
(4, 2, 'XL'),
(5, 2, 'XXL'),
(6, 2, '3XL'),
(8, 4, '6.3'),
(9, 1, '36'),
(10, 1, '37'),
(11, 1, '40'),
(12, 1, '42'),
(13, 1, '45'),
(14, 3, '50\'\'');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhuyenmai`
--

CREATE TABLE `loaikhuyenmai` (
  `km_id` int(10) UNSIGNED NOT NULL,
  `km_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `km_gia` double NOT NULL,
  `km_ngay_bat_dau` datetime NOT NULL,
  `km_ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaikhuyenmai`
--

INSERT INTO `loaikhuyenmai` (`km_id`, `km_ten`, `km_gia`, `km_ngay_bat_dau`, `km_ngay_ket_thuc`, `trang_thai`) VALUES
(1, 'Flash Sales', 30, '2018-07-25 00:00:00', '2019-08-10 15:00:00', 'ON'),
(2, 'Không khuyến mãi', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ON'),
(3, 'Xả kho', 45, '2018-08-02 00:00:00', '2019-08-08 00:00:00', 'ON'),
(5, 'Buồn thì xả', 70, '2018-08-01 00:00:00', '2018-08-15 00:00:00', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `lnd_id` int(10) UNSIGNED NOT NULL,
  `lnd_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loainguoidung`
--

INSERT INTO `loainguoidung` (`lnd_id`, `lnd_ten`) VALUES
(1, 'Admin'),
(2, 'Khách hàng'),
(3, 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `lnv_id` int(10) UNSIGNED NOT NULL,
  `lnv_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lnv_luong_co_ban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loainhanvien`
--

INSERT INTO `loainhanvien` (`lnv_id`, `lnv_ten`, `lnv_luong_co_ban`) VALUES
(1, 'Nhân viên vận chuyển', 5000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithanhtoan`
--

CREATE TABLE `loaithanhtoan` (
  `ltt_id` int(10) UNSIGNED NOT NULL,
  `ltt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ltt_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaithanhtoan`
--

INSERT INTO `loaithanhtoan` (`ltt_id`, `ltt_ten`, `ltt_hinh_anh`, `trang_thai`) VALUES
(1, 'Thanh toán khi nhận hàng', '5r1B_thanh-toan-khi-nhan-hang.png', 'ON'),
(2, 'Thanh toán trực tuyến', 'GhI0_thanh-toan-truc-tuyen.png', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaithue`
--

CREATE TABLE `loaithue` (
  `loai_thue_id` int(10) UNSIGNED NOT NULL,
  `loai_thue_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chu_thich` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaithue`
--

INSERT INTO `loaithue` (`loai_thue_id`, `loai_thue_ten`, `chu_thich`, `trang_thai`) VALUES
(1, 'Thuế VAT', 'Thuế giá trị gia tăng', 'ON'),
(2, 'Miễn thuế', 'Không tính thuế', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `mau_id` int(10) UNSIGNED NOT NULL,
  `mau_ha_id` int(10) UNSIGNED NOT NULL,
  `mau_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mau_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`mau_id`, `mau_ha_id`, `mau_code`, `mau_ten`) VALUES
(1, 7, '#000000', 'Đen'),
(2, 8, '#d50000', 'Đỏ'),
(3, 9, '#4A148C', 'Tím'),
(4, 11, '#FFFFFF', 'Trắng'),
(5, 12, '#BDBDBD', 'Xám'),
(6, 13, '#01579B', 'Xanh'),
(10, 25, '#fa0548', 'Đỏ ánh dương'),
(11, 26, '#0000a0', 'Xanh chạng vạng'),
(12, 27, '#fa0548', 'Đỏ ánh dương'),
(13, 28, '#0000a0', 'Xanh chạng vạng'),
(14, 29, '#ff8000', 'Cam'),
(15, 30, '#ff8000', 'Cam'),
(16, 31, '#ff8000', 'Cam'),
(17, 32, '#ff8000', 'Cam'),
(18, 33, '#ff8000', 'Cam'),
(19, 34, '#ff8000', 'Cam'),
(20, 35, '#000000', 'Đen'),
(21, 36, '#000000', 'Đen'),
(22, 37, '#000000', 'Đen'),
(23, 38, '#000000', 'Đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mucthue`
--

CREATE TABLE `mucthue` (
  `mt_id` int(10) UNSIGNED NOT NULL,
  `mt_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mt_muc_thue` int(11) NOT NULL,
  `mt_loai_thue` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mucthue`
--

INSERT INTO `mucthue` (`mt_id`, `mt_ten`, `mt_muc_thue`, `mt_loai_thue`, `created_at`, `updated_at`) VALUES
(1, 'VAT', 10, 1, NULL, '2018-08-19 15:25:13'),
(2, 'Miễn thuế', 0, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nd_id` int(10) UNSIGNED NOT NULL,
  `nd_lnd_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`nd_id`, `nd_lnd_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 2, 'Nguyễn Văn A', 'abc@gmail.com', '$2y$10$Rrs0biPgMtUHm8/zTsmX9.i5LwpbcVod6/79Sg8FcVnvsYUyt1BOy', 'Zr7iBX3xqZzF8b89rMRBy7gNRG8am9EJVa9YZqstnBF3SNF8jiP5b2BmwpDr', '2018-07-29 03:07:34', '2018-07-29 03:07:34'),
(15, 2, 'Mai Lâm Tấn Đạt', '1551010024.dat@gmail.com', '$2y$10$vYqcA/sWvBTBszCBot.DQuFODP1PyJX6dn7AzlKJHYJq2d1jk9KEK', 'uWHvNfEac0BACoOthzWU2zUUbkQyDGKxW476tJnaWeklABte1LJcxGGi4wHb', '2018-08-16 16:57:55', '2018-08-16 16:57:55'),
(17, 1, 'Đạt - Cường', 'dcshopping@gmail.com', '$2y$10$cL/ixO9SNSuSkULkKTvOgeNnLhzcFKIYM4..3tYAvh3LMwRHxe54a', 'WrEA7U0LCd2iiA1qoIlLVmY28uUtuIOMzWi1fmiX6sV05d9GhZ3vW5DIcEjw', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nv_id` int(10) UNSIGNED NOT NULL,
  `nv_lnv_id` int(10) UNSIGNED NOT NULL,
  `nv_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_sdt` int(11) NOT NULL,
  `nv_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_so_ngay_nghi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`nv_id`, `nv_lnv_id`, `nv_ten`, `nv_sdt`, `nv_dia_chi`, `nv_email`, `nv_so_ngay_nghi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyễn Tấn D', 123456789, 'dsda', 'ntd@gmail.com', 0, '2018-08-20 02:18:14', '2018-08-20 02:29:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `nsx_id` int(10) UNSIGNED NOT NULL,
  `nsx_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx_dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx_sdt` varchar(11) CHARACTER SET utf8 NOT NULL,
  `nsx_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`nsx_id`, `nsx_ten`, `nsx_dia_chi`, `nsx_sdt`, `nsx_hinh_anh`, `trang_thai`) VALUES
(1, 'Biti\'s', 'Q1', '0123456789', 'i25e_bitis.png', 'ON'),
(2, 'Asus', 'Q2', '0123456789', 'GucN_Asus.jpg', 'ON'),
(3, 'Nike', 'Q1', '0121325556', 'pDWP_nike.png', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieugiamgia`
--

CREATE TABLE `phieugiamgia` (
  `pgg_id` int(10) UNSIGNED NOT NULL,
  `pgg_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pgg_giam_gia` double NOT NULL,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieugiamgia`
--

INSERT INTO `phieugiamgia` (`pgg_id`, `pgg_ten`, `pgg_giam_gia`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`) VALUES
(1, 'Không có', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieugiaohang`
--

CREATE TABLE `phieugiaohang` (
  `pgh_id` int(10) UNSIGNED NOT NULL,
  `pgh_dh_id` int(10) UNSIGNED NOT NULL,
  `pgh_nv_id` int(10) UNSIGNED NOT NULL,
  `pgh_ngay_giao_hang` date NOT NULL,
  `pgh_tinh_trang_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieugiaohang`
--

INSERT INTO `phieugiaohang` (`pgh_id`, `pgh_dh_id`, `pgh_nv_id`, `pgh_ngay_giao_hang`, `pgh_tinh_trang_id`) VALUES
(1, 1, 1, '2018-08-22', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongxa`
--

CREATE TABLE `phuongxa` (
  `px_id` int(10) UNSIGNED NOT NULL,
  `px_qh_id` int(10) UNSIGNED NOT NULL,
  `px_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuongxa`
--

INSERT INTO `phuongxa` (`px_id`, `px_qh_id`, `px_ten`, `trang_thai`) VALUES
(1, 1, 'Phường An Lạc', 'ON'),
(2, 1, 'Phường An Lạc A', 'ON'),
(3, 1, 'Phường Bình Hưng Hòa', 'ON'),
(4, 1, 'Phường Bình Hưng Hòa A', 'ON'),
(5, 1, 'Phường Bình Hưng Hòa B', 'ON'),
(6, 1, 'Phường Bình Trị Đông', 'ON'),
(7, 1, 'Phường Bình Trị Đông A', 'ON'),
(8, 1, 'Phường Bình Trị Đông B', 'ON'),
(9, 1, 'Phường Tân Tạo', 'ON'),
(10, 1, 'Phường Tân Tạo A', 'ON'),
(11, 2, 'Phường 1', 'ON'),
(12, 2, 'Phường 2', 'ON'),
(13, 2, 'Phường 3', 'ON'),
(14, 2, 'Phường 4', 'ON'),
(15, 2, 'Phường 5', 'ON'),
(16, 2, 'Phường 6', 'ON'),
(17, 2, 'Phường 7', 'ON'),
(18, 2, 'Phường 8', 'ON'),
(19, 2, 'Phường 9', 'ON'),
(20, 2, 'Phường 10', 'ON'),
(21, 2, 'Phường 11', 'ON'),
(22, 2, 'Phường 12', 'ON'),
(23, 2, 'Phường 13', 'ON'),
(24, 2, 'Phường 14', 'ON'),
(25, 2, 'Phường 15', 'ON'),
(26, 2, 'Phường 16', 'ON'),
(27, 3, 'Phường 1', 'ON'),
(28, 3, 'Phường 2', 'ON'),
(29, 3, 'Phường 3', 'ON'),
(30, 3, 'Phường 4', 'ON'),
(31, 3, 'Phường 5', 'ON'),
(32, 3, 'Phường 6', 'ON'),
(33, 3, 'Phường 7', 'ON'),
(34, 3, 'Phường 8', 'ON'),
(35, 3, 'Phường 9', 'ON'),
(36, 3, 'Phường 10', 'ON'),
(37, 3, 'Phường 11', 'ON'),
(38, 3, 'Phường 12', 'ON'),
(39, 3, 'Phường 13', 'ON'),
(40, 3, 'Phường 14', 'ON'),
(41, 3, 'Phường 15', 'ON'),
(42, 3, 'Phường 16', 'ON'),
(43, 3, 'Phường 17', 'ON'),
(44, 4, 'Thị trấn An Phú', 'ON'),
(45, 4, 'Thị trấn Long Bình', 'ON'),
(46, 4, 'Thị trấn An Phú', 'ON'),
(47, 4, 'Xã Đa Phước', 'ON'),
(48, 4, 'Xã Khánh An', 'ON'),
(49, 4, 'Xã Khánh Bình', 'ON'),
(50, 4, 'Xã Nhơn Hội', 'ON'),
(51, 4, 'Xã Phú Hội', 'ON'),
(52, 4, 'Xã Phú Hữu', 'ON'),
(53, 4, 'Xã Phước Hưng', 'ON'),
(54, 4, 'Xã Quốc Thái', 'ON'),
(55, 4, 'Xã Vĩnh Hậu', 'ON'),
(56, 4, 'Xã Vĩnh Hội Đông', 'ON'),
(57, 4, 'Xã Vĩnh Lộc', 'ON'),
(58, 4, 'Xã Vĩnh Trường', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `qh_id` int(10) UNSIGNED NOT NULL,
  `qh_tp_id` int(10) UNSIGNED NOT NULL,
  `qh_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`qh_id`, `qh_tp_id`, `qh_ten`, `trang_thai`) VALUES
(1, 1, 'Quận Bình Tân', 'ON'),
(2, 1, 'Quận 11', 'ON'),
(3, 1, 'Quận Gò Vấp', 'ON'),
(4, 2, 'Huyện An Phú', 'ON'),
(5, 2, 'Huyện Châu Phú', 'ON'),
(6, 2, 'Huyện Châu Thành', 'ON'),
(7, 2, 'Huyện Chợ Mới', 'ON'),
(8, 2, 'Huyện Phú Tân', 'ON'),
(9, 2, 'Huyện Tân Châu', 'ON'),
(10, 2, 'Huyện Thoại Sơn', 'ON'),
(11, 2, 'Huyện Tịnh Biên', 'ON'),
(12, 2, 'Huyện Tri Tôn', 'ON'),
(13, 2, 'Thành phố Long Xuyên', 'ON'),
(14, 2, 'Thị xã Châu Đốc', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_id` int(10) UNSIGNED NOT NULL,
  `sp_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sp_so_luong_ton_kho` int(11) NOT NULL,
  `sp_gia_niem_yet` double NOT NULL,
  `sp_gia_ban` double NOT NULL,
  `sp_mo_ta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sp_don_vi_tinh_id` int(10) UNSIGNED NOT NULL,
  `sp_danh_muc_id` int(10) UNSIGNED NOT NULL,
  `sp_nsx_id` int(10) UNSIGNED NOT NULL,
  `sp_kho_hang_id` int(10) UNSIGNED NOT NULL,
  `sp_muc_thue_id` int(10) UNSIGNED NOT NULL,
  `sp_khuyen_mai_id` int(10) UNSIGNED NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sp_id`, `sp_ten`, `sp_so_luong_ton_kho`, `sp_gia_niem_yet`, `sp_gia_ban`, `sp_mo_ta`, `sp_don_vi_tinh_id`, `sp_danh_muc_id`, `sp_nsx_id`, `sp_kho_hang_id`, `sp_muc_thue_id`, `sp_khuyen_mai_id`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Giày thể thao Nam - Nữ Bitis Hunter X Liteflex (Cam)', 10, 810000, 900000, '<p>Tem TPU định hình và trợ lực gót chân. Mũ quai liteknit dệt có độ co dãn, thoáng khí tối đa. Đế lót kháng khuẩn công nghệ 6 điểm giúp massage lòng bàn chân. Đế tiếp đất cao su cấu trúc chia rãnh và gồ ghề đảm bảo tính ma sát tốt nhất trên mọi địa hình.</p>', 1, 17, 1, 1, 2, 2, 'ON', '2018-06-30 17:00:00', '2018-08-21 13:31:08'),
(2, 'Áo thun trơn nam form rộng phong cách hàn quốc', 10, 60000, 70000, '<p>Chất liệu thun mềm mại co giãn tốt , thoáng mát Thiết kế thời trang phù hợp xu hướng hiện nay Kiểu dáng đa phong cách Đường may tinh tế sắc sảo Size XS cho người 25-35 kg (Đủ các size) Áo thun được thiết kế vể đẹp trẻ trung năng động nhưng khô</p>', 2, 12, 1, 1, 2, 2, 'ON', '2018-07-31 17:00:00', '2018-08-21 05:01:16'),
(3, 'Tivi LED Asanzo 50 inch', 5, 9900000, 8855000, '<p>Màn hình 50inch Full HD. Công nghệ LED tiên tiến. Tích hợp công nghệ DVB-T2 - xem 40 kênh KTS miễn phí. Thiết kế tinh tế và sang trọng.</p>', 3, 23, 1, 1, 1, 1, 'ON', '2018-06-30 17:00:00', '2018-08-21 13:36:48'),
(4, 'F9', 0, 9000000, 11000000, '', 3, 41, 2, 1, 2, 2, 'ON', '2018-08-21 05:40:11', '2018-08-21 05:59:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamyeuthich`
--

CREATE TABLE `sanphamyeuthich` (
  `spyt_id` int(10) UNSIGNED NOT NULL,
  `spyt_kh_id` int(10) UNSIGNED NOT NULL,
  `spyt_sp_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `tp_id` int(10) UNSIGNED NOT NULL,
  `tp_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`tp_id`, `tp_ten`, `trang_thai`) VALUES
(1, 'Thành phố Hồ Chí Minh', 'ON'),
(2, 'An Giang', 'ON'),
(3, 'Bạc Liêu', 'ON'),
(4, 'Bà Rịa-Vũng Tàu', 'ON'),
(5, 'Bắc Giang', 'ON'),
(6, 'Bắc Kạn', 'ON'),
(7, 'Bắc Ninh', 'ON'),
(8, 'Bến Tre', 'ON'),
(9, 'Bình Dương', 'ON'),
(10, 'Bình Định', 'ON');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrangdonhang`
--

CREATE TABLE `tinhtrangdonhang` (
  `tinh_trang_id` int(10) UNSIGNED NOT NULL,
  `tinh_trang_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrangdonhang`
--

INSERT INTO `tinhtrangdonhang` (`tinh_trang_id`, `tinh_trang_ten`) VALUES
(1, 'Đang xử lý'),
(2, 'Bắt đầu vận chuyển'),
(3, 'Hoàn thành'),
(4, 'Yêu cầu hủy đơn hàng'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `tt_id` int(10) UNSIGNED NOT NULL,
  `tt_ltt_id` int(10) UNSIGNED NOT NULL,
  `tt_hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tt_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tt_mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tt_noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`tt_id`, `tt_ltt_id`, `tt_hinh_anh`, `tt_tieu_de`, `tt_mo_ta`, `tt_noi_dung`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 1, 'wx4T_ao-thun-tron-xam-nam.jpg', 'dsdsaa', '<p>ssss</p>', '<p>aaaaa</p>', 'Bật', '2018-08-20 08:31:36', '2018-08-20 08:51:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`bl_id`),
  ADD KEY `binhluan_bl_kh_id_foreign` (`bl_kh_id`),
  ADD KEY `binhluan_bl_sp_id_foreign` (`bl_sp_id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ctdh_id`),
  ADD KEY `chitietdonhang_ctdh_sp_id_foreign` (`ctdh_sp_id`),
  ADD KEY `chitietdonhang_ctdh_dh_id_foreign` (`ctdh_dh_id`);

--
-- Chỉ mục cho bảng `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  ADD PRIMARY KEY (`cpvc_id`),
  ADD KEY `cuocphivanchuyen_cpvc_tp_id_foreign` (`cpvc_tp_id`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`dmsp_id`);

--
-- Chỉ mục cho bảng `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  ADD PRIMARY KEY (`dmtt_id`);

--
-- Chỉ mục cho bảng `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD PRIMARY KEY (`dcgh_id`),
  ADD KEY `diachigiaohang_dcgh_kh_id_foreign` (`dcgh_kh_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`dh_id`),
  ADD KEY `donhang_dh_kh_id_foreign` (`dh_kh_id`),
  ADD KEY `donhang_dh_cpvc_id_foreign` (`dh_cpvc_id`),
  ADD KEY `donhang_dh_pgg_id_foreign` (`dh_pgg_id`),
  ADD KEY `donhang_dh_ltt_id_foreign` (`dh_ltt_id`),
  ADD KEY `donhang_dh_tinh_trang_id_foreign` (`dh_tinh_trang_id`);

--
-- Chỉ mục cho bảng `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  ADD PRIMARY KEY (`dhdt_id`),
  ADD KEY `donhangdoi_tra_dhdt_kh_id_foreign` (`dhdt_kh_id`),
  ADD KEY `donhangdoi_tra_dhdt_dh_id_foreign` (`dhdt_dh_id`),
  ADD KEY `donhangdoi_tra_dhdt_tinh_trang_id_foreign` (`dhdt_tinh_trang_id`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`donvitinh_id`);

--
-- Chỉ mục cho bảng `emailnhantinkhuyenmai`
--
ALTER TABLE `emailnhantinkhuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hanhvi`
--
ALTER TABLE `hanhvi`
  ADD PRIMARY KEY (`hv_id`),
  ADD KEY `hanhvi_hv_kh_id_foreign` (`hv_kh_id`),
  ADD KEY `hanhvi_hv_sp_id_foreign` (`hv_sp_id`);

--
-- Chỉ mục cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhanhsanpham_hasp_sp_id_foreign` (`hasp_sp_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_id`);

--
-- Chỉ mục cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`khohang_id`);

--
-- Chỉ mục cho bảng `kichthuoc`
--
ALTER TABLE `kichthuoc`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `kichthuoc_size_sp_id_foreign` (`size_sp_id`);

--
-- Chỉ mục cho bảng `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  ADD PRIMARY KEY (`km_id`);

--
-- Chỉ mục cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`lnd_id`);

--
-- Chỉ mục cho bảng `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`lnv_id`);

--
-- Chỉ mục cho bảng `loaithanhtoan`
--
ALTER TABLE `loaithanhtoan`
  ADD PRIMARY KEY (`ltt_id`);

--
-- Chỉ mục cho bảng `loaithue`
--
ALTER TABLE `loaithue`
  ADD PRIMARY KEY (`loai_thue_id`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`mau_id`),
  ADD KEY `mausac_mau_ha_id_foreign` (`mau_ha_id`);

--
-- Chỉ mục cho bảng `mucthue`
--
ALTER TABLE `mucthue`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `mucthue_mt_loai_thue_foreign` (`mt_loai_thue`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nd_id`),
  ADD KEY `nguoidung_nd_lnd_id_foreign` (`nd_lnd_id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_id`),
  ADD KEY `nhanvien_nv_lnv_id_foreign` (`nv_lnv_id`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`nsx_id`);

--
-- Chỉ mục cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  ADD PRIMARY KEY (`pgg_id`);

--
-- Chỉ mục cho bảng `phieugiaohang`
--
ALTER TABLE `phieugiaohang`
  ADD PRIMARY KEY (`pgh_id`),
  ADD KEY `phieugiaohang_pgh_dh_id_foreign` (`pgh_dh_id`),
  ADD KEY `phieugiaohang_pgh_nv_id_foreign` (`pgh_nv_id`),
  ADD KEY `phieugiaohang_pgh_tinh_trang_id_foreign` (`pgh_tinh_trang_id`);

--
-- Chỉ mục cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  ADD PRIMARY KEY (`px_id`),
  ADD KEY `phuongxa_px_qh_id_foreign` (`px_qh_id`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`qh_id`),
  ADD KEY `quanhuyen_qh_tp_id_foreign` (`qh_tp_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `sanpham_sp_don_vi_tinh_id_foreign` (`sp_don_vi_tinh_id`),
  ADD KEY `sanpham_sp_danh_muc_id_foreign` (`sp_danh_muc_id`),
  ADD KEY `sanpham_sp_nsx_id_foreign` (`sp_nsx_id`),
  ADD KEY `sanpham_sp_kho_hang_id_foreign` (`sp_kho_hang_id`),
  ADD KEY `sanpham_sp_muc_thue_id_foreign` (`sp_muc_thue_id`),
  ADD KEY `sanpham_sp_khuyen_mai_id_foreign` (`sp_khuyen_mai_id`);

--
-- Chỉ mục cho bảng `sanphamyeuthich`
--
ALTER TABLE `sanphamyeuthich`
  ADD PRIMARY KEY (`spyt_id`),
  ADD KEY `sanphamyeuthich_spyt_kh_id_foreign` (`spyt_kh_id`),
  ADD KEY `sanphamyeuthich_spyt_sp_id_foreign` (`spyt_sp_id`);

--
-- Chỉ mục cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`tp_id`);

--
-- Chỉ mục cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  ADD PRIMARY KEY (`tinh_trang_id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tt_id`),
  ADD KEY `tintuc_tt_ltt_id_foreign` (`tt_ltt_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `bl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `ctdh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  MODIFY `cpvc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `dmsp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  MODIFY `dmtt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  MODIFY `dcgh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `dh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  MODIFY `dhdt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `donvitinh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `emailnhantinkhuyenmai`
--
ALTER TABLE `emailnhantinkhuyenmai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hanhvi`
--
ALTER TABLE `hanhvi`
  MODIFY `hv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `kh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `khohang`
--
ALTER TABLE `khohang`
  MODIFY `khohang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `kichthuoc`
--
ALTER TABLE `kichthuoc`
  MODIFY `size_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  MODIFY `km_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `lnd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loainhanvien`
--
ALTER TABLE `loainhanvien`
  MODIFY `lnv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loaithanhtoan`
--
ALTER TABLE `loaithanhtoan`
  MODIFY `ltt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaithue`
--
ALTER TABLE `loaithue`
  MODIFY `loai_thue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `mau_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `mucthue`
--
ALTER TABLE `mucthue`
  MODIFY `mt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `nsx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  MODIFY `pgg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phieugiaohang`
--
ALTER TABLE `phieugiaohang`
  MODIFY `pgh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  MODIFY `px_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `qh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanphamyeuthich`
--
ALTER TABLE `sanphamyeuthich`
  MODIFY `spyt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `tp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `tinh_trang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_bl_kh_id_foreign` FOREIGN KEY (`bl_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `binhluan_bl_sp_id_foreign` FOREIGN KEY (`bl_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ctdh_dh_id_foreign` FOREIGN KEY (`ctdh_dh_id`) REFERENCES `donhang` (`dh_id`),
  ADD CONSTRAINT `chitietdonhang_ctdh_sp_id_foreign` FOREIGN KEY (`ctdh_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Các ràng buộc cho bảng `cuocphivanchuyen`
--
ALTER TABLE `cuocphivanchuyen`
  ADD CONSTRAINT `cuocphivanchuyen_cpvc_tp_id_foreign` FOREIGN KEY (`cpvc_tp_id`) REFERENCES `thanhpho` (`tp_id`);

--
-- Các ràng buộc cho bảng `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD CONSTRAINT `diachigiaohang_dcgh_kh_id_foreign` FOREIGN KEY (`dcgh_kh_id`) REFERENCES `khachhang` (`kh_id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_dh_cpvc_id_foreign` FOREIGN KEY (`dh_cpvc_id`) REFERENCES `cuocphivanchuyen` (`cpvc_id`),
  ADD CONSTRAINT `donhang_dh_kh_id_foreign` FOREIGN KEY (`dh_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `donhang_dh_ltt_id_foreign` FOREIGN KEY (`dh_ltt_id`) REFERENCES `loaithanhtoan` (`ltt_id`),
  ADD CONSTRAINT `donhang_dh_pgg_id_foreign` FOREIGN KEY (`dh_pgg_id`) REFERENCES `phieugiamgia` (`pgg_id`),
  ADD CONSTRAINT `donhang_dh_tinh_trang_id_foreign` FOREIGN KEY (`dh_tinh_trang_id`) REFERENCES `tinhtrangdonhang` (`tinh_trang_id`);

--
-- Các ràng buộc cho bảng `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  ADD CONSTRAINT `donhangdoi_tra_dhdt_dh_id_foreign` FOREIGN KEY (`dhdt_dh_id`) REFERENCES `donhang` (`dh_id`),
  ADD CONSTRAINT `donhangdoi_tra_dhdt_kh_id_foreign` FOREIGN KEY (`dhdt_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `donhangdoi_tra_dhdt_tinh_trang_id_foreign` FOREIGN KEY (`dhdt_tinh_trang_id`) REFERENCES `tinhtrangdonhang` (`tinh_trang_id`);

--
-- Các ràng buộc cho bảng `hanhvi`
--
ALTER TABLE `hanhvi`
  ADD CONSTRAINT `hanhvi_hv_kh_id_foreign` FOREIGN KEY (`hv_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `hanhvi_hv_sp_id_foreign` FOREIGN KEY (`hv_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Các ràng buộc cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `hinhanhsanpham_hasp_sp_id_foreign` FOREIGN KEY (`hasp_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Các ràng buộc cho bảng `kichthuoc`
--
ALTER TABLE `kichthuoc`
  ADD CONSTRAINT `kichthuoc_size_sp_id_foreign` FOREIGN KEY (`size_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Các ràng buộc cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD CONSTRAINT `mausac_mau_ha_id_foreign` FOREIGN KEY (`mau_ha_id`) REFERENCES `hinhanhsanpham` (`id`);

--
-- Các ràng buộc cho bảng `mucthue`
--
ALTER TABLE `mucthue`
  ADD CONSTRAINT `mucthue_mt_loai_thue_foreign` FOREIGN KEY (`mt_loai_thue`) REFERENCES `loaithue` (`loai_thue_id`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_nd_lnd_id_foreign` FOREIGN KEY (`nd_lnd_id`) REFERENCES `loainguoidung` (`lnd_id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_nv_lnv_id_foreign` FOREIGN KEY (`nv_lnv_id`) REFERENCES `loainhanvien` (`lnv_id`);

--
-- Các ràng buộc cho bảng `phieugiaohang`
--
ALTER TABLE `phieugiaohang`
  ADD CONSTRAINT `phieugiaohang_pgh_dh_id_foreign` FOREIGN KEY (`pgh_dh_id`) REFERENCES `donhang` (`dh_id`),
  ADD CONSTRAINT `phieugiaohang_pgh_nv_id_foreign` FOREIGN KEY (`pgh_nv_id`) REFERENCES `nhanvien` (`nv_id`),
  ADD CONSTRAINT `phieugiaohang_pgh_tinh_trang_id_foreign` FOREIGN KEY (`pgh_tinh_trang_id`) REFERENCES `tinhtrangdonhang` (`tinh_trang_id`);

--
-- Các ràng buộc cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  ADD CONSTRAINT `phuongxa_px_qh_id_foreign` FOREIGN KEY (`px_qh_id`) REFERENCES `quanhuyen` (`qh_id`);

--
-- Các ràng buộc cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD CONSTRAINT `quanhuyen_qh_tp_id_foreign` FOREIGN KEY (`qh_tp_id`) REFERENCES `thanhpho` (`tp_id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_sp_danh_muc_id_foreign` FOREIGN KEY (`sp_danh_muc_id`) REFERENCES `danhmucsanpham` (`dmsp_id`),
  ADD CONSTRAINT `sanpham_sp_don_vi_tinh_id_foreign` FOREIGN KEY (`sp_don_vi_tinh_id`) REFERENCES `donvitinh` (`donvitinh_id`),
  ADD CONSTRAINT `sanpham_sp_kho_hang_id_foreign` FOREIGN KEY (`sp_kho_hang_id`) REFERENCES `khohang` (`khohang_id`),
  ADD CONSTRAINT `sanpham_sp_khuyen_mai_id_foreign` FOREIGN KEY (`sp_khuyen_mai_id`) REFERENCES `loaikhuyenmai` (`km_id`),
  ADD CONSTRAINT `sanpham_sp_muc_thue_id_foreign` FOREIGN KEY (`sp_muc_thue_id`) REFERENCES `mucthue` (`mt_id`),
  ADD CONSTRAINT `sanpham_sp_nsx_id_foreign` FOREIGN KEY (`sp_nsx_id`) REFERENCES `nhasanxuat` (`nsx_id`);

--
-- Các ràng buộc cho bảng `sanphamyeuthich`
--
ALTER TABLE `sanphamyeuthich`
  ADD CONSTRAINT `sanphamyeuthich_spyt_kh_id_foreign` FOREIGN KEY (`spyt_kh_id`) REFERENCES `khachhang` (`kh_id`),
  ADD CONSTRAINT `sanphamyeuthich_spyt_sp_id_foreign` FOREIGN KEY (`spyt_sp_id`) REFERENCES `sanpham` (`sp_id`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_tt_ltt_id_foreign` FOREIGN KEY (`tt_ltt_id`) REFERENCES `danhmuctintuc` (`dmtt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
