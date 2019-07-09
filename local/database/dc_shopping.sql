-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2018 lúc 06:28 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

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
(8, 1, 7, 2, 900000, 'Size: 36, màu: Cam', '2018-08-23 16:30:09', '2018-08-23 16:30:09'),
(9, 2, 8, 1, 70000, 'Size: S, màu: Đen', '2018-09-05 16:37:25', '2018-09-05 16:37:25'),
(10, 126, 9, 1, 6200000, 'Size: 12mm, màu: Trắng', '2018-10-16 04:27:00', '2018-10-16 04:27:00'),
(11, 95, 10, 1, 600000, 'Size: 1 chỗ, màu: Đen', '2018-10-16 04:27:32', '2018-10-16 04:27:32'),
(12, 75, 10, 1, 1130000, 'Size: 1.5 lít, màu: Đen', '2018-10-16 04:27:32', '2018-10-16 04:27:32');

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
(7, 15, 4, 1, 2, 1, 4, 21950000, '2018-08-23', '2018-08-23 16:30:09', '2018-08-23 16:30:09'),
(8, 14, 5, 1, 2, 1, 1, 70000, '2018-09-05', '2018-09-05 16:37:25', '2018-09-05 16:37:25'),
(9, 15, 3, 1, 2, 1, 1, 6200000, '2018-10-16', '2018-10-16 04:27:00', '2018-10-16 04:27:00'),
(10, 15, 3, 1, 2, 1, 1, 1730000, '2018-10-16', '2018-10-16 04:27:32', '2018-10-16 04:27:32');

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
(3, 'inch', 'inches'),
(4, 'Size kính', 'tính theo mm'),
(5, 'Chu vi cổ tay', 'Tính theo cm'),
(6, 'Diện tích sức chứa', 'Chiều dai * chiều rộng *chiều cao'),
(7, 'Kích thước máy lạnh(HP)', 'Chiều dài,chiều rộng,chiều cao'),
(8, 'Kích thước máy tinh', 'Inch màn hình,diện tích máy'),
(9, 'Diện tích ', 'Chiều dai * chiều rộng'),
(10, 'Kích thước điện thoại', 'Chiều dài,chiều rộng,chiều cao');

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
(38, 3, 'ExAY_tivi-led-asanzo-50inch-2.jpg'),
(39, 6, 'Ao_tennis_Danco_Black.jpg'),
(41, 5, 'Quan_dai_Kaki_Danco_Black.jpg'),
(43, 7, 'Quan_soc_Kaki_Danco_Orange.jpg'),
(44, 8, 'LEK044.jpg'),
(45, 9, 'vay_dam_xoe_co_tru_tay_dai.jpg'),
(46, 10, 'Đầm_dạ_hội_dự_tiệc.jpg'),
(47, 11, 'Đầm_chiffon.jpg'),
(48, 12, 'Đầm_xòe_cánh bướm.jpg'),
(49, 13, 'Goldsun-T16E-G1.jpg'),
(50, 14, 'Goldsun-VNGS217003.jpg'),
(51, 15, 'Goldsun-VNGS217025.jpg'),
(52, 16, 'Goldsun-VNGS217029.jpg'),
(53, 17, 'Goldsun-VNGS217053.jpg'),
(54, 18, 'nibosi-1985-torre-T1s.jpg'),
(55, 19, 'nibosi-1985-torre-T3s.jpg'),
(56, 20, 'nibosi-1985-torre-T5s.jpg'),
(57, 21, 'nibosi-1985-torre-T7s.jpg'),
(58, 22, 'nibosi-1985-torre-T13.jpg'),
(59, 23, 'Túi_xách_Carlo Rino_màu_xanh_nhạt_kèm_charm hình_trái_tim.jpg'),
(60, 24, 'Túi_xách_nữ_Carlo_Rino_4_màu_hồng_kèm_charm_hình_con_ngựa.jpg'),
(61, 25, 'Túi_xách_nữ_Carlo_Rino_màu_beige.jpg'),
(62, 26, 'Túi_xách_nữ_Carlo_Rino_màu_đen.jpg'),
(63, 27, 'GIẦY_QUAI_SẮT_CÔNG_SỞ_MÀU_COFFEE.jpg'),
(64, 28, 'giay_co_lung_nam_cong_so.jpg'),
(65, 29, 'giay_buoc_day_cong_so.jpg'),
(66, 30, 'giay_luoi_cong_so.jpg'),
(67, 31, 'giay_booth_nam_cong_so.jpg'),
(68, 32, 'giay_bup_be.jpg'),
(69, 33, 'giay_xinh.png'),
(70, 34, 'gy0184.jpg'),
(71, 35, 'gy0186.jpg'),
(72, 36, 'giay_ngu.jpg'),
(73, 39, 'tivi_lef_sony_32-inch.jpg'),
(74, 38, 'tivi_leb_panasonic_42inch.jpg'),
(75, 37, 'tivi_led_panasonic_43inch.jpg'),
(76, 40, 'tu-mat-sanaky-VH-1000HP.jpg'),
(77, 41, 'tu-mat-sanaky-2-cua-lc-743db.jpg'),
(78, 42, 'TuMat_SANAKY-VH-1500HY.jpg'),
(79, 43, 'tu-mat-nam-ngang-alaska.jpg'),
(80, 44, 'TuMat_SANAKY-VH-1200HPV.jpg'),
(81, 45, 'ac-9wa.jpg'),
(82, 46, 'ac-9wi.png'),
(83, 47, 'may-lanh-ap-tran-af-30l-01.jpg'),
(84, 48, 'ac-9wi2.png'),
(85, 49, 'may-lanh-am-tran-af-24c-05.jpg'),
(86, 50, 'WASHING-MACHINE_XQB90-903.jpg'),
(87, 51, 'may-giat-xqb90-909.jpg'),
(88, 52, 'pubg-1.png'),
(89, 53, 'may-tinh-gia-dinh.png'),
(90, 54, 'may-tinh-ke-toan.png'),
(91, 55, 'may-tinh-van-phong-6.png'),
(92, 56, 'may-tinh-the-he-moi.png'),
(93, 57, 'Dell-XPS-15-9570-New-2018.jpg'),
(94, 58, 'New-Dell-Precision-7530.jpeg'),
(95, 59, 'New-Dell-Latitude-E7290.jpg'),
(96, 60, 'New-Dell-Latitude-E5280.jpg'),
(97, 61, 'mouse-v7.jpg'),
(98, 62, 'HDD-WESTERM-DIGITAL-320Gb.jpg'),
(99, 63, 'o-cung-hdd-1tb-wd-wd10ezex-5.jpg'),
(100, 64, 'Mouse-Gaming.jpg'),
(101, 65, 'tai_nghe.jpg\r\n'),
(102, 66, 'Bếp-OKIO-đôi-kính-cường-lực.jpg'),
(103, 67, 'BẾP-OKIO-KI-626G.jpg'),
(104, 68, 'Bếp-gas-mặt-kính-Soho-550SL-W.jpg'),
(105, 69, 'Bếp-Soho-GiamG.jpg'),
(106, 70, 'Nồi-cơm-điện-tử-Panasonic-PANC-SR-ZS185TRAM.jpg'),
(107, 71, 'Nồi-cơm-điện-Panasonic-PANC-SR-GA321LRA-3.2L-(Bạc).jpg'),
(108, 72, 'Nồi-cơm-điện-Panasonic-PANC-SR-MEV10HRA.jpg'),
(109, 73, 'Nồi-cơm-điện-cao-tần-Panasonic-SR-AFM181WRA-1.8L.jpg'),
(110, 74, 'Nồi-cơm-điện-tử-Panasonic-PANC-SR-ZX185KRAM.jpg'),
(111, 75, '583_lo_nuong_sunhouse_shd4226__3_.jpg'),
(112, 76, '580_lo_nuong_sunhouse_shd4200__2_.jpg'),
(113, 77, '582_lo_nuong_sunhouse_shd4222__2_.jpg'),
(114, 78, 'Lò-vi-sóng-Panasonic-NN-GF574MYUE-27-lít.jpg'),
(115, 79, 'Lò-vi-sóng-Panasonic-PALM-NN-CT655MYUE-27-lít.jpg'),
(116, 80, 'Lò-vi-sóng-Panasonic-NN-GD371MYUE-23-lít.jpg'),
(117, 81, 'Lò-vi-sóng-Panasonic-PALM-NN-GT353MYUE-23-lít.jpg'),
(118, 82, 'Lò-vi-sóng-Panasonic-PALM-NN-SM332MYUE-25L.jpg'),
(119, 83, 'Máy-pha-cà-phê-Lelit-PL042EMI-Italy.jpg'),
(120, 84, 'Máy-pha-cafe-Casadio-Dieci-A3-(Italy).jpg'),
(121, 85, 'Máy-pha-cà-phê-Nuova-Simonelli-Appia-II-2-Group.jpg'),
(122, 86, 'Máy-hút-bụi-Panasonic-PAHB-MC-CL455KN46-2000-W.jpg'),
(123, 87, 'Máy-hút-bụi-Panasonic-PAHB-MC-CG240DN46-850W.jpg'),
(124, 88, 'Máy-húr-bụi-Panasonic-PAHB-MC-YL631RN46.jpg'),
(125, 89, 'Máy-hút-bụi-Panasonic-PAHB-MC-CL240DN46-1400W.jpg'),
(126, 90, 'Máy-hút-bụi-Panasonic-MC-CL563RN46-(Đỏ).jpg'),
(127, 91, 'bep-doi-dien-tu-hong-ngoai-SHB-EI02.jpg'),
(128, 92, '605_6800_06.jpg'),
(129, 93, 'bep-doi-dien-tu-sunhouse-shb-di02.jpg'),
(131, 95, '598_bep_hong_ngoai_sunhouse_shd6015_2.jpg'),
(132, 96, '599_bep_hong_ngoai_sunhouse_shd6016.jpg'),
(133, 97, '597_bep_hong_ngoai_sunhouse_shd6014_2.jpg'),
(134, 98, 'Asus-ZenFone-5-ZE620KL.jpg'),
(135, 99, 'Asus-ZenFone-3.jpg'),
(136, 100, 'ASUS-ZenFone-3-Ultra.jpg'),
(137, 102, 'y7-prime-2018-logo-oplungphukien.jpg'),
(138, 101, 'Huawei-P10-Lite-32GB-WAS-LX3-Octa-Core-3GB-RAM-International-Version-LTE-(Gold).jpg'),
(139, 103, 'Huawei-P20-Pro-128GB.jpg'),
(140, 104, 'Huawei-P10-32GB.jpg'),
(141, 105, 'iPhone-5BlackSlate16gb.jpg'),
(142, 106, 'iPhone-5s-Silver-64gb.jpg'),
(143, 107, 'iPhone-6s-Space-Grey-64gb.jpg'),
(144, 108, 'iPhone-SE-Rose-Gold-64gb.jpg'),
(145, 109, 'iPhone-6-Plus-Silver-128gb.jpg'),
(146, 110, 'Nokia-6-TA-1000-64GB-Black,-Dual-Sim.jpg'),
(147, 111, 'Nokia-6.1-(2018)-Android-One-(Oreo)-32GB.jpg'),
(148, 112, 'Nokia-3.1--Android-One-(Oreo)-6GB.jpg'),
(149, 113, 'Nokia-2-Android-8GBy.jpg'),
(150, 114, 'Nokia-7-Plus-(TA-1062)-64GB-Black-Copper.jpg'),
(151, 115, 'OPPO-A71.jpeg'),
(152, 116, 'OPPO-F1S-(4GB,64GB).jpeg'),
(153, 117, 'OPPO-A57.jpeg'),
(154, 118, 'OPPO-F3.jpeg'),
(155, 119, 'OPPO-F3-Plus.jpeg'),
(156, 120, 'Samsung-Galaxy-Note-3-Docomo.jpg'),
(157, 121, 'Samsung-Galaxy-J7-Prime-(32GB).jpg'),
(158, 122, 'Get-Samsung-Galaxy-J7-in-Lagos.png'),
(160, 124, 'samsun-galaxy-a3.jpg'),
(161, 125, 'Sony-Xperia-XA1-G3123-32GB.jpg'),
(162, 126, 'data-sony-m4-aqua-glass-sony-m4-aqua-02-1000x1000.jpg'),
(163, 127, 'Xiaomi-Redmi-Note-5-64GB.jpg');

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
(14, 3, '50\'\''),
(15, 6, 'S'),
(16, 6, 'M'),
(17, 6, 'L'),
(18, 6, 'XL'),
(19, 6, 'XXL'),
(20, 6, 'XXXL'),
(21, 5, '29'),
(22, 5, '30'),
(23, 5, '31'),
(24, 5, '32'),
(25, 5, '33'),
(26, 5, '34'),
(27, 7, '29'),
(28, 7, '30'),
(29, 7, '31'),
(30, 7, '32'),
(31, 7, '33'),
(32, 7, '34'),
(33, 8, 'S'),
(34, 8, 'M'),
(35, 8, 'L'),
(36, 8, 'XL'),
(37, 9, 'S'),
(38, 9, 'M'),
(39, 9, 'L'),
(40, 9, 'XL'),
(41, 10, 'S'),
(42, 10, 'M'),
(43, 10, 'L'),
(44, 10, 'XL'),
(45, 11, 'S'),
(46, 11, 'M'),
(47, 11, 'L'),
(48, 11, 'XL'),
(49, 12, 'S'),
(50, 12, 'M'),
(51, 12, 'L'),
(52, 12, 'XL'),
(53, 18, '38mm'),
(54, 18, '40mm'),
(55, 18, '42mmm'),
(56, 18, '45mm'),
(57, 19, '38mm'),
(58, 19, '40mm'),
(59, 19, '42mm'),
(60, 19, '45mm'),
(61, 20, '38mm'),
(62, 20, '40mm'),
(63, 20, '42mm'),
(64, 20, '45mm'),
(65, 21, '38mm'),
(66, 21, '40mm'),
(67, 21, '42mm'),
(68, 21, '45mm'),
(69, 22, '38mm'),
(70, 22, '40mm'),
(71, 17, '42mm'),
(72, 17, '45mm'),
(73, 13, '55mm'),
(74, 13, '58mm'),
(75, 13, '62mm'),
(76, 14, '55mm'),
(77, 14, '58mm'),
(78, 14, '62mm'),
(79, 15, '55mm'),
(80, 15, '58mm'),
(81, 15, '62mm'),
(82, 16, '55mm'),
(83, 16, '58mm'),
(84, 16, '62mm'),
(85, 17, '55mm'),
(86, 17, '58mm'),
(87, 17, '62mm'),
(88, 23, 'Nhỏ'),
(89, 23, 'Vừa'),
(90, 23, 'Lớn'),
(91, 24, 'Nhỏ'),
(92, 24, 'Vừa'),
(93, 24, 'Lớn'),
(94, 25, 'Nhỏ'),
(95, 25, 'Vừa'),
(96, 25, 'Lớn'),
(97, 26, 'Nhỏ'),
(98, 26, 'vừa'),
(99, 26, 'Lớn'),
(100, 27, '36'),
(101, 27, '38'),
(102, 27, '40'),
(103, 27, '42'),
(104, 27, '43'),
(105, 28, '36'),
(106, 28, '40'),
(107, 28, '42'),
(108, 28, '43'),
(109, 29, '36'),
(110, 29, '38'),
(111, 29, '40'),
(112, 29, '42'),
(113, 29, '43'),
(114, 30, '36'),
(115, 31, '38'),
(116, 31, '40'),
(117, 32, '42'),
(118, 32, '44'),
(119, 32, '36'),
(120, 32, '40'),
(121, 31, '42'),
(122, 31, '44'),
(123, 30, '38'),
(124, 30, '40'),
(125, 30, '42'),
(126, 30, '44'),
(127, 33, '36'),
(128, 33, '38'),
(129, 33, '40'),
(130, 33, '42'),
(131, 33, '44'),
(132, 34, '36'),
(133, 34, '38'),
(134, 34, '40'),
(135, 34, '42'),
(136, 34, '44'),
(137, 35, '38'),
(138, 35, '40'),
(139, 35, '42'),
(140, 35, '44'),
(141, 36, '36'),
(142, 36, '38'),
(143, 36, '40'),
(144, 36, '42'),
(145, 36, '44'),
(146, 37, '14\'\''),
(147, 38, '15\'\''),
(148, 39, '15\'\''),
(149, 40, '200 lít'),
(150, 41, '120 lít'),
(151, 42, '300 lit'),
(152, 43, '50 lít'),
(153, 44, '150 lit'),
(154, 45, '1 ngựa'),
(155, 45, '2 ngựa'),
(156, 46, '1 ngựa'),
(157, 46, '2 ngựa'),
(158, 47, '1 ngựa'),
(159, 47, '2 ngựa'),
(160, 48, '1 ngựa'),
(161, 48, '2 ngựa'),
(162, 49, '1 ngựa'),
(163, 49, '2 ngựa'),
(164, 50, '50 lít'),
(165, 51, '50 lít'),
(166, 52, '15\'\''),
(167, 53, '15\'\''),
(168, 54, '15\'\''),
(169, 55, '15\'\''),
(170, 56, '15\'\''),
(171, 57, '15\'\''),
(172, 58, '15\'\''),
(173, 59, '15\'\''),
(174, 60, '15\'\''),
(175, 61, 'chuột có dây'),
(176, 61, 'Chuột không dây'),
(177, 62, '320gb'),
(178, 63, '1tb'),
(179, 64, 'Chuột không dây'),
(180, 64, 'Chuột có dây'),
(181, 65, 'Tai nghe có dây'),
(182, 65, 'Tai nghe không dây'),
(183, 66, '2 nồi'),
(184, 67, '2 nồi'),
(185, 68, '2 nồi'),
(186, 69, '2 nồi'),
(187, 70, '5 lit'),
(188, 71, '5 lít'),
(189, 72, '5 lít'),
(190, 73, '5 lít'),
(191, 74, '5 lít'),
(192, 75, '1.5 lít'),
(193, 76, '0.5 lít'),
(194, 77, '1.5 lít'),
(195, 78, '3 lít'),
(196, 79, '3 lít'),
(197, 80, '3 lit'),
(198, 81, '3 lít'),
(199, 82, '3 lít'),
(200, 83, '2 vòi pha'),
(201, 84, '3 vòi pha'),
(202, 85, '3 vòi pha'),
(203, 86, '10 lít'),
(204, 87, '10 lit'),
(205, 88, '10 lít'),
(206, 89, '10 lít'),
(207, 90, '10 lít'),
(208, 91, '2 chỗ'),
(209, 92, '2 chỗ'),
(210, 93, '2 chỗ'),
(211, 95, '1 chỗ'),
(212, 96, '1 chỗ'),
(213, 97, '1 chỗ'),
(214, 98, '6.0mm'),
(215, 99, '10mm'),
(216, 100, '10mm'),
(217, 101, '8mm'),
(218, 102, '8mm'),
(219, 103, '9mm'),
(220, 104, '11mm'),
(221, 105, '15mm'),
(222, 106, '13mm'),
(223, 107, '18mm'),
(224, 108, '10mm'),
(225, 108, '10mmm'),
(226, 109, '10mm'),
(227, 110, '10mm'),
(228, 111, '15mm'),
(229, 112, '13mm'),
(230, 113, '14mm'),
(231, 114, '9mm'),
(232, 115, '15mm'),
(233, 116, '12mm'),
(234, 117, '10mm'),
(235, 118, '10mm'),
(236, 119, '10mm'),
(237, 120, '12mm'),
(238, 121, '10mm'),
(239, 122, '12mm'),
(240, 124, '15mm'),
(241, 125, '12mm'),
(242, 126, '12mm'),
(243, 127, '10mm');

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
(23, 38, '#000000', 'Đen'),
(24, 39, '#000000', 'Đen'),
(25, 41, '#000000', 'Đen'),
(26, 43, '	\r\n#d50000', 'Đỏ'),
(27, 44, '#660000', 'Nâu'),
(28, 45, '#9966CC', 'Tím Nhạt'),
(29, 46, '#FFFFFF', 'Trắng'),
(30, 47, '#33ff99', 'Xanh lá nhạt'),
(31, 48, '#006600', 'Xanh lá đậm'),
(32, 49, '#aaaaaa', 'Xám'),
(33, 50, '#FFFFFF', 'Trắng'),
(34, 51, '#000000', 'Đen'),
(35, 52, '#ffccff', 'Hồng nhạt'),
(36, 53, '#000000', 'Đen'),
(37, 54, '#ffffff', 'Trắng'),
(38, 55, '#0033cc', 'Xanh dương'),
(39, 56, '#ff9933', 'Cam'),
(40, 57, '#000000', 'Đen'),
(41, 58, '#660000', 'Nâu'),
(42, 59, '#33ffff', 'Xanh Nhạt'),
(43, 60, '#ffccff', 'Hông Nhạt'),
(44, 61, '#ffffff', 'Trắng'),
(45, 62, '#000000', 'Đen'),
(46, 63, '#660000', 'Nâu'),
(47, 64, '#660000', 'Nâu'),
(48, 65, '#000000', 'Đen'),
(49, 66, '#000000', 'Đen'),
(50, 67, '#660000', 'Nâu'),
(51, 68, '#000000', 'Đen'),
(52, 68, '#000000', 'Đen'),
(53, 69, '#d50000', '	\r\nĐỏ'),
(54, 69, '#000000', 'Đen'),
(55, 70, '#000000', 'Đen'),
(56, 71, '#660000', 'Nâu'),
(57, 72, '#9966CC', 'Tím Nhạt'),
(58, 73, '#000000', 'Đen'),
(59, 74, '#aaaaaa', 'Xám'),
(60, 75, '#000000', 'Đen'),
(61, 76, '#ffffff', 'Trắng'),
(62, 77, '#ffffff', 'Trắng'),
(63, 78, '#ffffff', 'Trắng'),
(64, 79, '#0000a0', 'Xanh chạng vạng'),
(65, 80, '#0000a0', 'Xanh chạng vạng'),
(66, 81, '#ffffff', 'Trắng'),
(67, 82, '#ffffff', 'Trắng'),
(68, 83, '#ffffff', 'Trắng'),
(69, 84, '#ffffff', 'Trắng'),
(70, 85, '#ffffff', 'Trắng'),
(71, 86, '#ffffff', 'Trắng'),
(72, 87, '#000000', 'Đen'),
(73, 88, '#000000', 'Đen'),
(74, 89, '#000000', 'Đen'),
(75, 90, '#000000', 'Đen'),
(76, 91, '#000000', 'Đen'),
(77, 92, '#000000', 'Đen'),
(78, 93, '#000000', 'Đen'),
(79, 94, '#000000', 'Đen'),
(80, 95, '#000000', 'Đen'),
(81, 96, '#000000', 'Đen'),
(82, 97, '#000000', 'Đen'),
(83, 98, '#000000', 'Đen'),
(84, 99, '#000000', 'Đen'),
(85, 100, '#000000', 'Đen'),
(86, 101, '#000000', 'Đen'),
(87, 102, '#000000', 'Đen'),
(88, 103, '#000000', 'Đen'),
(89, 104, '#ffffff', 'Trắng'),
(90, 105, '#000000', 'Đen'),
(91, 106, '#660000', 'Nâu'),
(92, 107, '#ffffff', 'Trắng'),
(93, 108, '#ffffff', 'Trắng'),
(94, 109, '#ffffff', 'Trắng'),
(95, 110, '#ffffff', 'Trắng'),
(96, 111, '#000000', 'Đen'),
(97, 112, '#d50000', 'Đỏ'),
(98, 113, '#d50000', 'Đỏ'),
(99, 114, '#ffffff', 'Trắng'),
(100, 115, '#ffffff', 'Trắng'),
(101, 116, '#ffffff', 'Trắng'),
(102, 117, '#ffffff', 'Trắng'),
(103, 118, '#ffffff', 'Trắng'),
(104, 119, '#ffffff', 'Trắng'),
(105, 120, '#ffffff', 'Trắng'),
(106, 121, '#000000', 'Đen'),
(107, 122, '#000000', 'Đen'),
(108, 123, '#ff8000', 'Cam'),
(109, 124, '#000000', 'Đen'),
(110, 125, '#ff8000', 'Cam'),
(111, 126, '#d50000', 'Đỏ'),
(112, 127, '#000000', 'Đen'),
(113, 128, '#000000', 'Đen'),
(114, 129, '#000000', 'Đen'),
(115, 131, '#000000', 'Đen'),
(116, 132, '#000000', 'Đen'),
(117, 133, '#000000', 'Đen'),
(118, 134, '#ffffff', 'Trắng'),
(119, 135, '#000000', 'Đen'),
(120, 136, '#ffccff', 'Hồng'),
(121, 137, '#01579B', 'Xanh dương'),
(122, 138, '#ffffff', 'Trắng'),
(123, 139, '#000000', 'Đen'),
(124, 140, '#000000', 'Đen'),
(125, 141, '#000000', 'Đen'),
(126, 143, '#BDBDBD', 'Xám'),
(127, 142, '#ffffff', 'Trắng'),
(128, 144, '#ffccff', 'Hồng'),
(129, 145, '#BDBDBD', 'Xám'),
(130, 146, '#000000', 'Đen'),
(131, 147, '#000000', 'Đen'),
(132, 148, '#000000', 'Đen'),
(133, 149, '#ff8000', 'Cam'),
(134, 150, '#000000', 'Đen'),
(135, 151, '#ffffff', 'Trắng'),
(136, 152, '#000000', 'Đen'),
(137, 153, '#000000', 'Đen'),
(138, 154, '#000000', 'Đen'),
(139, 155, '#000000', 'Đen'),
(140, 156, '#000000', 'Đen'),
(141, 157, '#ffccff', 'Hồng'),
(142, 158, '#000000', 'Đen'),
(143, 160, '#FFFFFF', 'Trắng'),
(144, 161, '#000000', 'Đen'),
(145, 162, '#FFFFFF', 'Trắng'),
(146, 163, '#ffccff', 'Hồng');

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
(14, 2, 'Nguyễn Văn A', 'abc@gmail.com', '$2y$10$VIaD422hYOXsmDdC7fD6JOyFgxnrxBXRDAntAhKOgZ7x7EPwHLVS2', 'tHhcIXY7nrLj4RkjOgE6dQXpGdWEGTZ0AK6DyaZbCjCK7BdJURdB1YsnJgDN', '2018-07-29 03:07:34', '2018-09-07 17:01:03'),
(15, 2, 'Mai Lâm Tấn Đạt', '1551010024.dat@gmail.com', '$2y$10$JZ4RK8T52K5B0TvuRHn1BOcoHMAqCUwlvdXw2jT9seJVYvVnVrKum', 'uWHvNfEac0BACoOthzWU2zUUbkQyDGKxW476tJnaWeklABte1LJcxGGi4wHb', '2018-08-16 16:57:55', '2018-10-16 04:13:10'),
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
(3, 'Nike', 'Q1', '0121325556', 'pDWP_nike.png', 'ON'),
(4, 'Goldsun', 'Quận 1', '0123456789', '1.jpg', 'ON'),
(5, 'nibosi', 'Quận 4', '0123456789', '2.jpg', 'ON'),
(6, 'Carlo-Rino', 'Quận Bình Tân', '0123456789', '3.jpg', 'ON'),
(7, 'APUCHINO HAND MADE', 'Quận 5', '0123456789', '4.jpg', 'ON'),
(8, 'Venus House', 'quận 2', '0123456789', '5.jpg', 'ON'),
(9, 'dienmaysaigon', 'Quận Bình Chánh', '123456789', '6.jpg', 'ON'),
(10, 'Sanaky', 'Quận 7', '0123456789', '8.jpg', 'ON'),
(11, 'Alaska', 'Quận 1', '0123456789', '7.jpg', 'ON'),
(12, 'Phong Vũ', 'Quận 3', '0123456789', '10.jpg', 'ON'),
(13, 'Sun house', 'Quận 1', '0123456789', '9.jpg', 'ON'),
(14, 'Nokia', 'Quấn 1', '0123456789', '11.jpg', 'ON'),
(15, 'Oppo', 'Quận 4', '012345678', '13.jpg', 'ON'),
(16, 'thế giới di động', 'Quận Bình Thạnh', '0123456789', '14.jpg', 'ON');

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
(4, 'F9', 0, 9000000, 11000000, '', 3, 41, 2, 1, 2, 2, 'ON', '2018-08-21 05:40:11', '2018-08-21 05:59:00'),
(5, 'Quần Dài Kaki Danco Xanh Navy Nam ', 100, 539000, 669000, '+  Chất liệu: cotton cao cấp\r\n+  Phom quần: dáng trẻ\r\n+  Đặc tính: chất liệu co dãn, siêu nhẹ, thấm hút mồ hôi thiết kế với phong cách trẻ trung, nam tính, màu sắc tinh tế, tính năng co dãn 2 chiều, là mẫu quần lý tưởng cho người chơi golf, văn phòng & đi dã ngoại.', 1, 12, 1, 1, 1, 2, 'ON', '2018-07-08 17:00:00', '2018-09-01 17:00:00'),
(6, 'Áo tennis Danco Polo', 100, 439000, 459000, 'Danco chuyên cung cấp đồng phục thể thao với giá ưu đãi\r\n+  Chất liệu: vải vừng cao cấp\r\n+  Phom áo: suông\r\n+  Trọng lượng: siêu nhẹ - thoát mồ hôi siêu tốc\r\nvới phong cách năng động, trẻ trung & màu sắc tinh tế, là mẫu áo lý tưởng cho người chơi tennis & vận động cường độ mạnh.\r\n', 1, 12, 1, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-03 17:00:00'),
(7, 'Quần Sóc Kaki Danco Cam Nam', 100, 449000, 559000, '+  Chất liệu: cotton cao cấp\r\n+  Phom quần: dáng trẻ\r\n+  Đặc tính: chất liệu co dãn, siêu nhẹ, thấm hút mồ hôi\r\nthiết kế với phong cách trẻ trung, nam tính, màu sắc tinh tế, tính năng co dãn 2 chiều, là mẫu quần lý tưởng cho người chơi golf & đi dã ngoại.', 1, 12, 1, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-01 17:00:00'),
(8, 'Váy len nữ thu đông pong cách Hàn Quốc', 50, 500000, 520000, 'Đặc điểm nổi bật của BST áo, váy len tại Samdo.vn là các thiết kế đa dạng về kiểu cách, từ dáng dài đến dáng ngắn, ôm eo, eo suông, cổ cao, cổ thuyền, cổ V,…đều liên tục được cập nhật.\r\n Hầu hết các mẫu Freesize kết hợp chất len co giãn tốt, dễ mặc và lên dáng rất chuẩn, giúp tôn dáng người mặc hơn bao giờ hết;\r\nChất len mịn, êm, không dặm, không cộm, có thể giặt máy thoải mái, dễ làm sạch và bảo quản, không nhất thiết phải giặt khô như một số sản phẩm trên thị trường;', 2, 13, 1, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-01 17:00:00'),
(9, 'Váy đầm xòe cổ trụ tay lỡ', 200, 600000, 650000, 'Mô tả chung về váy đầm xòe cổ trụ tay lỡ:\r\nVáy đầm xòe cổ trụ tay lỡ bằng chất liệu voan lụa mềm tay áo dài cổ cao thân váy hai lớp kiểu midi tôn dáng kiêu sa\r\n\r\nVáy đầm xòe tay lỡ cổ trụ sử dụng những chất liệu từ voan lụa mềm thân thiện với cơ thể:\r\nVáy đầm xòe tay lỡ cổ trụ sử dụng nguyên liệu voan lụa mềm sẽ đem đến trạng thái thư giãn và dễ chịu cho cơ thể.\r\n\r\nThoát nhiệt tự nhiên của cơ thể qua váy đầm xòe tay lỡ cổ trụ\r\nVáy đầm xòe cổ trụ tay lỡ sử dụng kiểu liên kết nguyên liệu từ voan lụa mỏng không ảnh hưởng đến sóng bức xạ nhiệt và truyền nhiệt tự nhiên từ cơ thể ra môi trường xung quanh giúp làn da mát mẻ.\r\n\r\nMột số lưu ý khi chọn váy đầm xòe cổ trụ tay lỡ:\r\nGiá sản phẩm Váy đầm xòe tay lỡ cổ trụ là giá tại kho của Cuộc sống vàng và chưa có gồm có phí giao hàng cũng như phí thu tiền tại nhà COD (phí ship hàng do công ty chuyển phát nhanh thu).\r\n\r\nQuá trình vận chuyển, lưu kho làm Váy đầm xòe cổ trụ tay lỡ dễ bị nếp gấp bẩn hoặc nhăn nhàu, bạn cần giặt sạch và ủi trước khi mặc lên mình để xác định Váy đầm xòe tay lỡ cổ trụ phù hợp mô tả kiểu dáng và vật liệu bởi Cổng phân phối sỉ Cuocsongvang.\r\n\r\nCổng phân phối sỉ Cuộc sống vàng rất vui nếu bạn gợi cảm hơn với thiết kế Váy đầm xòe tay lỡ cổ trụ cung cấp bởi Cổng phân phối sỉ Cuộc sống vàng. Nếu các nàng không hài lòng hoặc lấy kích thước cơ thể nhầm hay mặc trông không đẹp các nàng có thể gọi 0909.521.499 đề nghị đổi Váy đầm xòe cổ trụ tay lỡ trong vòng 7 ngày kể từ khi nhận được hàng với bất kỳ lý do gì.\r\n\r\nVáy đầm xòe tay lỡ cổ trụ gửi đổi cần phải còn nguyên tem nhãn, sạch sẽ, không qua giặt tẩy. bạn sẽ cần phải trả cước ship hàng hóa khi đổi hàng do đó bạn nên lấy số đo và chọn Size chuẩn nhé.\r\n\r\nBảng số đo Cổng phân phối sỉ Cuộc sống vàng khuyến nghị khi chọn váy đầm xòe cổ trụ tay lỡ:\r\n + Cân nặng của bạn <46Kg: chọn size S ( Vòng ngực / eo váy 84/68cm - Ngang vai / dài tay 34/50cm - Dài váy 120cm)\r\n+ Cân nặng của bạn 47 -> 51kg: chọn size M ( Vòng ngực / eo váy 88/72cm - Ngang vai / dài tay 35/51cm - Dài váy 121cm)\r\n+ Cân nặng của bạn 52 -> 56kg: chọn size L ( Vòng ngực / eo váy 92/76cm - Ngang vai / dài tay 36/52cm - Dài váy 122cm)\r\n+ Cân nặng của bạn 57 ->61kg: chọn size XL ( Vòng ngực / eo váy 96/80cm - Ngang vai / dài tay 37/53cm - Dài váy 123cm)\r\n+ Cân nặng của bạn 62 -> 66kg: chọn size 2XL ( Vòng ngực / eo váy 100/84cm - Ngang vai / dài tay 38/54cm - Dài váy 124cm)\r\n\r\n#cáchchọnsizequầnáonữ :  #sizequầnáonữ <1m52 - 1 = #sizequầnáonữchuẩn  theo cân nặng = #sizequầnáonữ >1m68  - 1\r\n\r\nBảng Size cho người trung bình mặc vừa, các bạn muốn mặc rộng thì chọn +1 Size, Các bạn thấp <1m52 +1 Size, Các bạn cao >1m68  chọn +1 Size nhé.\r\n\r\n+ Kích thước sản phẩm có thể sai lệch ±2cm. Sản phẩm khi chụp dưới điều kiện sáng/tối, xem bằng các loại màn hình khác nhau hay giữa các lô hàng khác nhau màu sắc có thể đậm lợt một chút là bình thường các bạn nhéMô tả chung về váy đầm xòe cổ trụ tay lỡ:\r\nVáy đầm xòe cổ trụ tay lỡ bằng chất liệu voan lụa mềm tay áo dài cổ cao thân váy hai lớp kiểu midi tôn dáng kiêu sa\r\n\r\nVáy đầm xòe tay lỡ cổ trụ sử dụng những chất liệu từ voan lụa mềm thân thiện với cơ thể:\r\nVáy đầm xòe tay lỡ cổ trụ sử dụng nguyên liệu voan lụa mềm sẽ đem đến trạng thái thư giãn và dễ chịu cho cơ thể.\r\n\r\nThoát nhiệt tự nhiên của cơ thể qua váy đầm xòe tay lỡ cổ trụ\r\nVáy đầm xòe cổ trụ tay lỡ sử dụng kiểu liên kết nguyên liệu từ voan lụa mỏng không ảnh hưởng đến sóng bức xạ nhiệt và truyền nhiệt tự nhiên từ cơ thể ra môi trường xung quanh giúp làn da mát mẻ.\r\n\r\nMột số lưu ý khi chọn váy đầm xòe cổ trụ tay lỡ:\r\nGiá sản phẩm Váy đầm xòe tay lỡ cổ trụ là giá tại kho của Cuộc sống vàng và chưa có gồm có phí giao hàng cũng như phí thu tiền tại nhà COD (phí ship hàng do công ty chuyển phát nhanh thu).\r\n\r\nQuá trình vận chuyển, lưu kho làm Váy đầm xòe cổ trụ tay lỡ dễ bị nếp gấp bẩn hoặc nhăn nhàu, bạn cần giặt sạch và ủi trước khi mặc lên mình để xác định Váy đầm xòe tay lỡ cổ trụ phù hợp mô tả kiểu dáng và vật liệu bởi Cổng phân phối sỉ Cuocsongvang.\r\n\r\nCổng phân phối sỉ Cuộc sống vàng rất vui nếu bạn gợi cảm hơn với thiết kế Váy đầm xòe tay lỡ cổ trụ cung cấp bởi Cổng phân phối sỉ Cuộc sống vàng. Nếu các nàng không hài lòng hoặc lấy kích thước cơ thể nhầm hay mặc trông không đẹp các nàng có thể gọi 0909.521.499 đề nghị đổi Váy đầm xòe cổ trụ tay lỡ trong vòng 7 ngày kể từ khi nhận được hàng với bất kỳ lý do gì.\r\n\r\nVáy đầm xòe tay lỡ cổ trụ gửi đổi cần phải còn nguyên tem nhãn, sạch sẽ, không qua giặt tẩy. bạn sẽ cần phải trả cước ship hàng hóa khi đổi hàng do đó bạn nên lấy số đo và chọn Size chuẩn nhé.\r\n\r\nBảng số đo Cổng phân phối sỉ Cuộc sống vàng khuyến nghị khi chọn váy đầm xòe cổ trụ tay lỡ:\r\n + Cân nặng của bạn <46Kg: chọn size S ( Vòng ngực / eo váy 84/68cm - Ngang vai / dài tay 34/50cm - Dài váy 120cm)\r\n+ Cân nặng của bạn 47 -> 51kg: chọn size M ( Vòng ngực / eo váy 88/72cm - Ngang vai / dài tay 35/51cm - Dài váy 121cm)\r\n+ Cân nặng của bạn 52 -> 56kg: chọn size L ( Vòng ngực / eo váy 92/76cm - Ngang vai / dài tay 36/52cm - Dài váy 122cm)\r\n+ Cân nặng của bạn 57 ->61kg: chọn size XL ( Vòng ngực / eo váy 96/80cm - Ngang vai / dài tay 37/53cm - Dài váy 123cm)\r\n+ Cân nặng của bạn 62 -> 66kg: chọn size 2XL ( Vòng ngực / eo váy 100/84cm - Ngang vai / dài tay 38/54cm - Dài váy 124cm)\r\n\r\n#cáchchọnsizequầnáonữ :  #sizequầnáonữ <1m52 - 1 = #sizequầnáonữchuẩn  theo cân nặng = #sizequầnáonữ >1m68  - 1\r\n\r\nBảng Size cho người trung bình mặc vừa, các bạn muốn mặc rộng thì chọn +1 Size, Các bạn thấp <1m52 +1 Size, Các bạn cao >1m68  chọn +1 Size nhé.\r\n\r\n+ Kích thước sản phẩm có thể sai lệch ±2cm. Sản phẩm khi chụp dưới điều kiện sáng/tối, xem bằng các loại màn hình khác nhau hay giữa các lô hàng khác nhau màu sắc có thể đậm lợt một chút là bình thường các bạn nhé', 2, 13, 1, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-01 17:00:00'),
(10, 'Đầm dạ hội, dự tiệc', 150, 1095000, 1195000, 'Đầm được may bằng vải gấm kết hợp với áo khoác giả bằng voan tạo nên sự quý phái, sang trọng, nữ tính cho phái đẹp. Chi tiết hoa và cò độc đáo kết hợp với nền vải gấm trắng trẻ trung, đem lại cho người mặc một phong cách lịch lãm và thanh lịch. Rất hợp cho những buổi dạ hội, dự tiệc, dạo phố hay đi chơi cùng bạn bè.', 2, 13, 1, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-01 17:00:00'),
(11, 'Đầm chiffon', 100, 995000, 1100000, 'Đầm chiffon DV42 – size S~2XL -hàng nhập Đài Loan Đầm dài màu xanh họa tiết lá pha trắng sang trọng, quý phái. Đầm suông nhẹ nhàng dài chấm gót chân. Chất liệu cao cấp nhẹ nhàng thoát mát với kích thước từ size S~2XL dễ dàng lựa chọn phù hợp với nhiều vóng dáng.', 2, 13, 1, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-01 17:00:00'),
(12, 'Đầm xòe cánh bướm', 130, 1195000, 1250000, 'Đầm xòe cánh bướm -hàng nhập Đài Loan Đầm dài màu xanh lá cây họa tiết lá pha xanh sang trọng, quý phái. Đầm xòe cánh bướm nhẹ nhàng . Chất liệu cao cấp, nhẹ nhàng thoát mát với kích thước từ size S~2XL dễ dàng lựa chọn phù hợp với nhiều vóng dáng.', 2, 13, 1, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-01 17:00:00'),
(13, 'Goldsun-T16E-G1', 20, 1200000, 1300000, 'Mắt kính Việt đông vui như lễ hội Tròng kính Essilor Crizal Prevencia lọc chống ánh sáng xanh,được thiết kế sang trọng và thanh lịch. ', 4, 14, 4, 1, 1, 2, 'ON', '2018-09-01 17:00:00', '2018-09-02 17:00:00'),
(14, 'Goldsun-VNGS217003', 30, 1200000, 1300000, 'Mắt kính Việt đông vui như lễ hội Tròng kính Essilor Crizal Prevencia lọc chống ánh sáng xanh,được thiết kế sang trọng và thanh lịch. ', 4, 14, 4, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(15, 'Goldsun-VNGS217025', 10, 1200000, 1300000, 'Mắt kính Việt đông vui như lễ hội Tròng kính Essilor Crizal Prevencia lọc chống ánh sáng xanh,được thiết kế sang trọng và thanh lịch. ', 4, 14, 4, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(16, 'Goldsun-VNGS217029', 20, 1100000, 1200000, 'Mắt kính Việt đông vui như lễ hội Tròng kính Essilor Crizal Prevencia lọc chống ánh sáng xanh,được thiết kế sang trọng và thanh lịch. ', 4, 14, 4, 1, 2, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(17, 'Goldsun-VNGS217053', 60, 800000, 900000, 'Mắt kính Việt đông vui như lễ hội Tròng kính Essilor Crizal Prevencia lọc chống ánh sáng xanh,được thiết kế sang trọng và thanh lịch. ', 4, 14, 4, 1, 2, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(18, 'nibosi-1985-torre-T1s', 100, 1590000, 690000, 'Đồng hồ chuẩn men NIBOSI 1985 Torre được thiết kế phù hợp cho thanh thiếu niên và đàn ông dưới 40 tuổi. Torre có kiểu dáng nam tính trẻ trung hiện đại nhưng vẫn giữ được nét sang trọng cổ điển. Chiếc đồng hồ có đường kính mặt 44mm cùng viền mỏng làm tôn lên vẻ đẹp sang trọng cho người đàn ông thế kỷ 21. Đồng hồ NIBOSI 1985 chính hãng thiết kế bởi Italy có xuất xứ thương hiệu từ Hồng Kông kèm thẻ bảo hành quốc tế, nhập khẩu và phân phối bởi NIBOSI Việt Nam.', 5, 15, 5, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(19, 'nibosi-1985-torre-T3s', 2000, 1590000, 690000, 'Đồng hồ chuẩn men NIBOSI 1985 Torre được thiết kế phù hợp cho thanh thiếu niên và đàn ông dưới 40 tuổi. Torre có kiểu dáng nam tính trẻ trung hiện đại nhưng vẫn giữ được nét sang trọng cổ điển. Chiếc đồng hồ có đường kính mặt 44mm cùng viền mỏng làm tôn lên vẻ đẹp sang trọng cho người đàn ông thế kỷ 21. Đồng hồ NIBOSI 1985 chính hãng thiết kế bởi Italy có xuất xứ thương hiệu từ Hồng Kông kèm thẻ bảo hành quốc tế, nhập khẩu và phân phối bởi NIBOSI Việt Nam.', 5, 15, 5, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(20, 'nibosi-1985-torre-T5s', 300, 1590000, 690000, 'Đồng hồ chuẩn men NIBOSI 1985 Torre được thiết kế phù hợp cho thanh thiếu niên và đàn ông dưới 40 tuổi. Torre có kiểu dáng nam tính trẻ trung hiện đại nhưng vẫn giữ được nét sang trọng cổ điển. Chiếc đồng hồ có đường kính mặt 44mm cùng viền mỏng làm tôn lên vẻ đẹp sang trọng cho người đàn ông thế kỷ 21. Đồng hồ NIBOSI 1985 chính hãng thiết kế bởi Italy có xuất xứ thương hiệu từ Hồng Kông kèm thẻ bảo hành quốc tế, nhập khẩu và phân phối bởi NIBOSI Việt Nam.', 5, 15, 5, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(21, 'nibosi-1985-torre-T7s', 100, 1300000, 1100000, 'Đồng hồ chuẩn men NIBOSI 1985 Torre được thiết kế phù hợp cho thanh thiếu niên và đàn ông dưới 40 tuổi. Torre có kiểu dáng nam tính trẻ trung hiện đại nhưng vẫn giữ được nét sang trọng cổ điển. Chiếc đồng hồ có đường kính mặt 44mm cùng viền mỏng làm tôn lên vẻ đẹp sang trọng cho người đàn ông thế kỷ 21. Đồng hồ NIBOSI 1985 chính hãng thiết kế bởi Italy có xuất xứ thương hiệu từ Hồng Kông kèm thẻ bảo hành quốc tế, nhập khẩu và phân phối bởi NIBOSI Việt Nam.', 5, 15, 5, 1, 2, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(22, 'nibosi-1985-torre-T13', 400, 900000, 1200000, 'Đồng hồ chuẩn men NIBOSI 1985 Torre được thiết kế rất nam tính, trẻ trung, sang trọng và hiện đại. Chiếc đồng hồ có đường kính mặt khoảng 44mm cùng viền mỏng làm tôn lên vẻ đẹp sang trọng và hiện đại cho người đàn ông thế kỷ 21. Phiên bản Torre rất phù hợp cho nam giới tuổi dưới 40 và những người thích sư phô trương thường xuyên chăm chút vẻ bề ngoài. Đồng hồ NIBOSI 1985 chính hãng được nhập khẩu từ Hồng Kông kèm thẻ bảo hành quốc tế.', 5, 15, 5, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(23, 'Túi_xách_Carlo Rino_màu_xanh_nhạt_kèm_charm hình_trái_tim', 20, 2150000, 2550000, 'Túi xách nữ thiết kế tinh xảo phù hợp các phụ nữ sang trọng quí phái.Được sử dụng trong các lần đi shopping hay mua sắm.Chất liệu nhẹ nhàng ,tốt.', 2, 16, 6, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(24, 'Túi_xách_nữ_Carlo_Rino_4_màu_hồng_kèm_charm_hình_con_ngựa', 50, 3390000, 2712000, 'Túi xách nữ thiết kế tinh xảo phù hợp các phụ nữ sang trọng quí phái.Được sử dụng trong các lần đi shopping hay mua sắm.Chất liệu nhẹ nhàng ,tốt.', 2, 16, 6, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(25, 'Túi_xách_nữ_Carlo_Rino_màu_beige', 70, 3690000, 2583000, 'Túi xách nữ thiết kế tinh xảo phù hợp các phụ nữ sang trọng quí phái.Được sử dụng trong các lần đi shopping hay mua sắm.Chất liệu nhẹ nhàng ,tốt.', 2, 16, 6, 1, 2, 1, 'oN', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(26, 'Túi_xách_nữ_Carlo_Rino_màu_đen', 60, 3490000, 2433000, 'Túi xách nữ thiết kế tinh xảo phù hợp các phụ nữ sang trọng quí phái.Được sử dụng trong các lần đi shopping hay mua sắm.Chất liệu nhẹ nhàng ,tốt.', 2, 16, 6, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(27, 'GIẦY QUAI SẮT CÔNG SỞ APUCHINO HANDMADE LIMITED MÀU COFFEE - R033-1', 10, 5889000, 6000000, 'Kiểu dáng: giày nam đế cao, giày Monstrap, giày tây có khóa gài nâng chiều cao\r\nPhong cách: công sở, hội nghị, tiệc tùng, đàm phán, đám cưới, đấu giá\r\nMàu sắc: màu nâu đen cà phê\r\nKiểu dáng mũi: mũi tròn\r\nChất liệu da: da bò thật chất lì vân da biểu bì động vật\r\nChất liệu đế: đế cao su phủ da tạo hình khối gờ kiểu tổ ong chống trơn trượt (sàn đá nhẵn, sàn gương kính)', 1, 17, 7, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(28, 'GIẦY CỔ LỬNG NAM CÔNG SỞ APCN HANDMADE MÀU COFFEE - KBF8180-A19', 5, 1799000, 2100000, 'Kiểu dáng: giày nam đế cao, giày Chukka Boot, giày tây cổ lửng buộc dây nâng chiều cao\r\nPhong cách: công sở, hội nghị, tiệc tùng, đàm phán, đám cưới, đấu giá\r\nMàu sắc: màu nâu cà phê\r\nKiểu dáng mũi: mũi tù\r\nChất liệu da: da bò thật chất lì vân men sứ rạn\r\nChất liệu đế: đế cao su phối da tạo hình khối gờ kiểu tổ ong chống trơn trượt (sàn đá nhẵn, sàn gương kính)', 1, 17, 7, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(29, 'GIẦY BUỘC DÂY CÔNG SỞ APUCHINO HAND MADE LIMITED XANH MŨI ĐEN', 20, 5990000, 6400000, 'Kiểu dáng: giày nam đế cao, giày Derby, giày tây buộc dây tăng chiều cao\r\nPhong cách: công sở, hội nghị, tiệc tùng, đàm phán, đám cưới, đấu giá\r\nMàu sắc: màu xanh đen\r\nKiểu dáng mũi: mũi tròn\r\nChất liệu da: da bò thật chất lì vân da biểu bì động vật\r\nChất liệu đế: đế cao su phủ da tạo hình khối gờ chống trơn trượt (sàn đá nhẵn, sàn gương kính)', 1, 17, 7, 1, 2, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(30, 'GIẦY LƯỜI CÔNG SỞ APUCHINO HAND MADE - 14278B', 50, 1599000, 2000000, 'Kiểu dáng: giày tây lười tăng chiều cao\r\nPhong cách: công sở | giày Loafer\r\nMàu sắc: Đen lì\r\nKiểu dáng mũi: mũi tròn\r\nChất liệu da: da bò thật\r\nChất liệu đế: đế cao su phối da', 1, 17, 7, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(31, 'GIẦY BOOTH NAM CÓ CỔ CÔNG SỞ APUCHINO HANDMADE - 39910K-G', 1000, 1799000, 2500000, 'Phong cách: công sở, hội nghị, tiệc tùng, đàm phán, đám cưới, đấu giá\r\nMàu sắc: màu đen/cà phê\r\nKiểu dáng mũi: mũi tù đục lỗ Brogues họa tiết hình cánh bướm\r\nChất liệu da: da bò thật chất lì vân da biểu bì động vật\r\nChất liệu đế: đế cao su phối da tạo hình khối gờ kiểu tổ ong chống trơn trượt (sàn đá nhẵn, sàn gương kính)', 1, 17, 7, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(32, 'Giày Búp Bê nữ đính nơ FC037-WB màu đen mờ', 100, 520000, 300000, 'Giày búp bê dành cho những người đi làm .Chất liệu tốt ,bền thuận tiện cho việc đi lại .', 1, 18, 8, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(33, 'GIAY-XINHNU', 200, 50000, 99000, 'Giày được thiết kế sang trọng quí phái cho những người phụ nữ.Dùng cho các sự kiện hay lễ hội,dám cưới.Chất liệu bền ,màu sắc bắt mắt,được thiết kế bởi nhà thiết kế nổi tiếng.', 1, 18, 8, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(34, 'Giày cao gót màu đen ', 100, 2100000, 3000000, 'Giày được thiết kế sang trọng quí phái cho những người phụ nữ.Dùng cho các sự kiện hay lễ hội,dám cưới.Chất liệu bền ,màu sắc bắt mắt,được thiết kế bởi nhà thiết kế nổi tiếng.', 1, 18, 8, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(35, 'Giày cao gót mau`1 trắng', 100, 3300000, 4000000, 'Giày được thiết kế sang trọng quí phái cho những người phụ nữ.Dùng cho các sự kiện hay lễ hội,dám cưới.Chất liệu bền ,màu sắc bắt mắt,được thiết kế bởi nhà thiết kế nổi tiếng.', 1, 18, 8, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(36, 'Giày ngủ', 500, 50000, 100000, 'Giày thoáng mát được thiết kế đi trong nhà .Chất liệu làm bằng cao su tỗng hợp,nhẹ nhàng,thoáng mát phù hợp với trẻ con.', 1, 18, 8, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(37, 'TIVI LED PANASONIC TH-43C400 43 INCH', 10, 8090000, 9100000, 'Màn hình 43 Inch\r\nChiếu dai: 50cm\r\nchiều cao:30cm\r\nHình ảnh rõ nét ,sống động,chất lượng như hình ảnh thật,thu hút khiến người xem lạc vào thế giới phim ảnh.\r\nBảo hành 12 tháng\r\nVận chuyễn :miễn phí trong toàn quốc', 3, 23, 4, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(38, 'Tivi LED LG 42LB582T 42 inch (có internet, Wifi', 3, 9100000, 10200000, 'Màn hình 42 Inch\r\nChiếu dai: 1m\r\nchiều cao:30cm\r\nHình ảnh rõ nét ,sống động,chất lượng như hình ảnh thật,thu hút khiến người xem lạc vào thế giới phim ảnh.\r\nKết nối với internet,wifi \r\nCó thể coi được bất kì kênh truyền hình khi có wifi\r\nBảo hành 12 tháng\r\nVận chuyễn :miễn phí trong toàn quốc', 3, 23, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(39, 'tivi LED 32 inch Sony KDL-32R300B giá rẻ', 20, 6450000, 7000000, 'Màn hình 32 Inch\r\nChiếu dai: 70m\r\nchiều cao:50cm\r\nHình ảnh rõ nét ,sống động,chất lượng như hình ảnh thật,thu hút khiến người xem lạc vào thế giới phim ảnh.\r\nBảo hành 12 tháng\r\nVận chuyễn :miễn phí trong toàn quốc', 3, 23, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(40, 'Tủ mát Sanaky VH-1000HP', 100, 22690000, 23000000, 'Thiết kế 2 cánh mở 2 bên\r\nQuạt lồng sóc lạnh nhanh & sâu\r\nGiàn lạnh bằng ống đồng\r\nDùng bảo quản thực phẩm mát', 6, 24, 10, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(41, 'Tủ mát 2 cửa Alaska LC-743DB- 450Lit', 250, 10490000, 12000000, 'Loại tủ: 2 cánh cửa kính trên dưới\r\nDung tích: 450lít\r\nĐiện năng tiêu thụ: 280w\r\nKích thước: 600 x 580 x 1.960 mm\r\nThiết kế 2 cánh mở 2 bên\r\nQuạt lồng sóc lạnh nhanh & sâu\r\nGiàn lạnh bằng ống đồng\r\nDùng bảo quản thực phẩm mát', 6, 24, 10, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(42, 'Tủ mát Sanaky VH-1500HY', 10, 29500000, 30490000, 'Thiết kế 3 cánh mở\r\nDung tích lớn tương đương 1500 lít\r\nGiàn lạnh bằng ống đồng\r\nDùng bảo quản thực phẩm mát', 6, 24, 10, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(43, 'Giới Thiệu Tủ mát nằm ngang Alaska LC-450B', 20, 24690000, 26790000, 'Thiết kế 2 cánh mở 2 bên\r\nLớp foam dày, giữ lạnh tốt\r\nGiàn lạnh bằng ống đồng\r\nDùng bảo quản thực phẩm mát', 6, 24, 10, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(44, 'TuMat_SANAKY-VH-1200HPV', 25, 24590000, 26000000, 'Tủ mát nằm ngang Alaska LC-450B là loại tủ mát nằm ngang của Alaska. Với dung tích 450 lít, 2 kệ và giỏ đựng sẽ giúp cho khách hàng sắp xếp được nhiều hàng hóa, tạo khoảng cách để hơi lạnh len lỏi đến thực phẩm. Tủ dùng cho các siêu thị, bách hóa, cửa hàng tự chọn, căng tin...có nhu cầu bảo quản mát và trưng bày các loại đồ uống, rau củ, quả...', 6, 24, 10, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(45, 'Máy lạnh ac-9wa', 10, 2400000, 3000000, 'Công suất 1 Hp (9000Btu/h).\r\nTận hưởng bầu không khí mát mẻ ngay tại nhà.\r\nVới máy lạnh AC-9WA giúp Làm lạnh nhanh chóng.\r\nChế độ gió và hoạt động đa dạng.\r\nCó tính năng dành riêng cho giấc ngủ.\r\nMang đến không gian sạch, tươi mới với tính năng tạo ion.', 7, 25, 11, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(46, 'Máy lạnh AC-9WI', 12, 2700000, 3300000, 'CÔNG NGHỆ INVERTER GIÚP TIẾT KIỆM ĐIỆN\r\nTận hưởng bầu không khí mát mẻ ngay tại nhà.\r\nVới máy lạnh AC-9WI giúp Làm lạnh nhanh chóng.\r\nChế độ gió và hoạt động đa dạng.\r\nCó tính năng dành riêng cho giấc ngủ.\r\nMang đến không gian sạch, tươi mới với tính năng tạo ion.\r\nSử dụng gas R410a, thân thiện với môi trường', 7, 25, 11, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(47, 'MÁY LẠNH ÁP TRẦN AF-50L', 25, 1300000, 1700000, 'Lắp đặt được ở cả trên trần và dưới sàn nhà.\r\nCó tính thẩm mỹ cao.\r\nTiết kiệm không gian lắp đặt.\r\nSức gió thồi mạnh.\r\nLàm lạnh không gian nhanh.\r\nhích hợp lắp đặt ở những nơi đông người.', 7, 25, 11, 1, 1, 5, 'ON', '2018-09-16 17:00:00', '2018-09-16 17:00:00'),
(48, 'MÁY LẠNH AC-9WI2', 27, 2900000, 3500000, 'Công nghệ INVERTER, tiết kiệm điện năng.\r\nTận hưởng bầu không khí mát mẻ ngay tại nhà.\r\nVới máy lạnh AC-9WI2 giúp Làm lạnh nhanh chóng.\r\nChế độ gió và hoạt động đa dạng.\r\nCó tính năng dành riêng cho giấc ngủ.\r\nMang đến không gian sạch, tươi mới với tính năng tạo ion.\r\nTiết kiệm điễn', 7, 25, 11, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(49, 'MÁY LẠNH AF-24C', 19, 5200000, 6900000, 'Công suất 2.5 Hp (24000Btu/h)\r\nGam màu tươi sáng.\r\nThiết kế âm trần mang tính thẩm mỹ cao.\r\nTiết kiệm không gian, diện tích.\r\nSức gió thổi mạnh.\r\nCó khả năng làm lạnh không gian rộng nhanh.\r\nSử dụng Gas R410A.', 7, 25, 11, 1, 2, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(50, 'WASHING MACHINE XQB90-903', 10, 10900000, 12000000, '- vật liệu bên trong bồn tắm: thép không gỉ\r\n- Nắp: ABS + Kính cường lực + Gấp\r\n- Vật liệu động cơ: Đồng\r\n- Loại điều khiển: Điều khiển máy tính\r\n- Kiểm soát mực nước:\r\n- Mực nước điện tử\r\n- chức năng đặc biệt: rửa nhiệt', 6, 26, 11, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(51, 'MÁY GIẶT XQB90-909', 10, 8900000, 10000000, '- vật liệu bên trong bồn tắm: thép không gỉ\r\n- Nắp: ABS + Kính cường lực + Gấp\r\n- Vật liệu động cơ: Đồng\r\n- Loại điều khiển: Điều khiển máy tính\r\n- Kiểm soát mực nước:\r\n- Mực nước điện tử\r\n- chức năng đặc biệt: rửa nhiệt', 6, 26, 11, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(52, 'Máy tính chơi PUBG', 5, 13300000, 15000000, 'STT	LINH KIỆN	THÔNG SỐ\r\n1	CPU	        i3-7100 3.9Ghz\r\n2	Mainboard	Asus H110 MK\r\n3	RAM	        DDR4 kingmax 8G 2400\r\n4	Ổ Cứng HDD	HDD Seagate 500G\r\n5	Ổ Cứng SSD	Chưa bao gồm SSD\r\n6	Card Màn Hình	Vga 1050 2gb 128 bit\r\n7	Màn Hình LCD	LCD 22 Led\r\n8	Vỏ Case  	Case SP\r\n9	Nguồn    	Jetek G400 chính hãng\r\n10	Bảo Hành	36 Tháng', 8, 19, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(53, 'Máy Tính Gia Đình', 20, 5700000, 7300000, 'STT	LINH KIỆN	THÔNG SỐ\r\n1	CPU	        G2030 3.0GHz\r\n2	Mainboard	H61\r\n3	RAM	        DDR3 Kingmax 4G 1600\r\n4	Ổ Cứng HDD	HDD Seagate 500G\r\n5	Ổ Cứng SSD	Chưa bao gồm SSD\r\n6	Card Màn Hình	Vga onboard 1Gb\r\n7	Màn Hình LCD	LCD ViewSonic 19 inch VA190\r\n8	Vỏ Case  	Case SP\r\n9	Nguồn	        Jetek Y600t chính hãng\r\n10	Bảo Hành	36 Tháng', 8, 19, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(54, 'Máy tính Kế toán viên', 20, 7800000, 9000000, 'STT	LINH KIỆN	THÔNG SỐ\r\n1	CPU	        Intel Core i3 4130 3.4Ghz\r\n2	Mainboard	Asus H81 MK\r\n3	RAM      	DDR3 Kingmax 4G 1600\r\n4	Ổ Cứng HDD	Không bao gồm.\r\n5	Ổ Cứng SSD	SSD Kingmax 120G\r\n6	Card Màn Hình	Vga onboard 1Gb\r\n7	Màn Hình LCD	LCD ViewSonic 19 inch VA190\r\n8	Vỏ Case	        Case SP\r\n9	Nguồn	        Jetek D650T Fan 12\r\n10	Bảo Hành	36 Tháng', 8, 19, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(55, 'Máy tính văn phòng Thế hệ 6', 10, 8050000, 9000000, 'STT	LINH KIỆN	THÔNG SỐ\r\n1	CPU	        i3-6100 3.7Ghz\r\n2	Mainboard	H110 chipset intel\r\n3	RAM      	DDR4 kingmax 4G 2400\r\n4	Ổ Cứng HDD	HDD Seagate 500G\r\n5	Ổ Cứng SSD	Chưa bao gồm SSD\r\n6	Card Màn Hình	Vga onboard 1Gb\r\n7	Màn Hình LCD	LCD ViewSonic 19 inch VA190\r\n8	Vỏ Case	        Case SP\r\n9	Nguồn    	Jetek D650T Fan 12\r\n10	Bảo Hành	36 Tháng', 8, 19, 12, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(56, 'Máy tính Văn phòng thế hệ mới', 10, 6900000, 8000000, 'STT	LINH KIỆN	THÔNG SỐ\r\n1	CPU	        Intel G4400 3.3Ghz\r\n2	Mainboard	Asus H110 MK\r\n3	RAM	        DDR4 kingmax 4G 2400\r\n4	Ổ Cứng HDD	HDD Seagate 500G\r\n5	Ổ Cứng SSD	Chưa bao gồm SSD\r\n6	Card Màn Hình	Vga onboard 1Gb\r\n7	Màn Hình LCD	LCD ViewSonic 19 inch VA190\r\n8	Vỏ Case	        Case SP\r\n9	Nguồn	        Jetek Y600t chính hãng\r\n10	Bảo Hành	36 Tháng', 7, 19, 12, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(57, 'Dell XPS 15 9570 New 2018', 10, 41900000, 45000000, 'Core i7 8750H 15.6 inch GeForce® GTX 1050Ti Windows 10 RAM 16GB / SSD 256GB / FHD\r\nCPU: 8th Gen Intel® Core™ i7 8750H Processor 2.20 GHz (upto 4.10GHz, 9MB Cache)\r\nRAM: 16GB RAM DDR4 2666MHz\r\nĐĩa cứng: 256 SSD M.2 2280 PCIe Solid State Drive\r\nMàn hình: InfinityEdge display 15.6 inch 1920X1080 IPS ANTI-GLARE DISPLAY\r\nCard đồ họa: NVIDIA GTX 1050TI GDDR5 4GB', 8, 20, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(58, 'New Dell Precision 7530 ', 10, 19900000, 23000000, '15.6 inch HD Windowns 10 Core i5-8400H / RAM 8GB / HDD 500GB / FHD / NVIDIA Quadro P1000\r\nCPU: 8th Gen Intel® Core™ Processor i5-8400H (4 Core, 8M Cache, 2.50GHz, 4.2GHz Turbo, 35W), vPro\r\nRAM: 8GB DDR4-2666MHz\r\nĐĩa cứng: 2.5\" 500GB 7200RPM SATA Hard Drive\r\nMàn hình: 15.6\" FHD IPS 1920x1080 AG non-touch, No Mic, 45% color gamut\r\nCard đồ họa: NVIDIA Quadro P1000 w/4GB GDDR5', 8, 20, 12, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(59, 'New Dell Latitude E7290', 10, 24900000, 27000000, '12.5inch HD Windows 10 Pro Core i5 8250U / RAM 8GB / SSD 256GB\r\nCPU: 8th Gen Intel® Core™ i5-8250U Processor (Quad Core, 6M Cache, 1.6GHz,15W, vPro) up to 3.4GHz\r\nRAM: 8GB DDR4 2400MHz\r\nĐĩa cứng: M.2 256GB SATA Class 20 Solid State Drive\r\nMàn hình: Anti-Glare Display 12.5 inch HD (1366 x 768)\r\nCard đồ họa: Share Intel® HD Graphics 620', 8, 20, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(60, 'New Dell Latitude E5280', 10, 16990000, 18000000, 'Core i5-7300U 8GB 128GB SSD 12.5 inch Windows 10 Pro\r\nCPU: 7th Gen Intel® Core™ i5 7300U (Dual Core, 2.6GHz, 3M cache, 15W, vPro)\r\nRAM: 8GB DDR4 2400MHz\r\nĐĩa cứng: SSD 128GB Up to 500 MB/s(SATA 6Gb/s)\r\nMàn hình: Anti Glare (16:9) WLED 12.5 inch 1920 x 1080 ( Full HD )\r\nCard đồ họa: Share Intel® HD Graphics 620', 8, 20, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(61, 'mouse-v7', 100, 100000, 150000, 'Chuột có dây sử dụng cho máy bàn vs laptop.\r\nGiới hạn của chuột : 100000lan62 bấm`\r\nKích thước 7cm*3cm\r\nBảo hành : 3 tháng', 9, 21, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(62, 'HDD-WESTERM-DIGITAL-320Gb', 10, 1500000, 1800000, 'Ổ cúng có dung lượng 320 GB.Dùng cho máy tính để bàn .Nhằm tăng dung lượng bộ nhớ máy tính', 9, 21, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(63, 'o-cung-hdd-1tb', 10, 5000000, 6000000, 'Ổ cúng có dung lượng 1TB.Dùng cho máy tính để bàn .Nhằm tăng dung lượng bộ nhớ máy tính được sử dụng chó các máy tính cần dung lượng lớn để lưu trử dữ liệu.Thường dùng cho các mày server', 9, 21, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(64, 'Mouse-Gaming', 20, 200000, 250000, 'Chuột dành cho việc chơi game đồ họa.Được thiết kế tinh xảo và đẹp mắt.Thường sủ dụng cho các tiệm net để thu hút khách.Chuột có nhiều tính năng hơn do có nhiều phím bấm.', 9, 22, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(65, 'tai_nghe', 10, 100000, 150000, 'Âm lượng thanh nghe : 1000mHZ->2000MZ\r\nCó thể kết nối vào laptop', 9, 21, 12, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(66, 'Bếp OKIO đôi kính cường lực', 10, 1100000, 1500000, 'Mặt bếp kính cường lực chịu nhiệt.\r\nMặt kính màu xanh, đen họa tiết nhẹ nhàng tạo vẻ sang trọng cho căn bếp.\r\nDễ dàng vệ sinh khi sử dụng.\r\nHọng inox siêu bền, dễ dàng tháo rời để vệ sinh.\r\nHệ thống đánh lửa bằng Magneto siêu bền.\r\nKiềng bếp bằng hợp kom tráng men chịu nhiệt, có vòng chắn gió, không bị tắt lửa khi có gió. \r\nThông số kỹ thuật\r\n- Kích thước : 600 x 380 x 100 mm\r\n- Trọng lượng: 8 kg\r\n- Gas tiêu thụ: 0,21 kg\r\n- Bảo hành: 24 tháng.', 9, 27, 9, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(67, 'BẾP OKIO KI-626G', 10, 1180000, 1550000, 'Mặt bếp kính cường lực chịu nhiệt.\r\nMặt kính màu xanh, đen họa tiết nhẹ nhàng tạo vẻ sang trọng cho căn bếp.\r\nDễ dàng vệ sinh khi sử dụng.\r\nHọng inox siêu bền, dễ dàng tháo rời để vệ sinh.\r\nHệ thống đánh lửa bằng Magneto siêu bền.\r\nKiềng bếp bằng hợp kom tráng men chịu nhiệt, có vòng chắn gió, không bị tắt lửa khi có gió. \r\nThông số kỹ thuật\r\n- Kích thước : 600 x 380 x 100 mm\r\n- Trọng lượng: 8 kg\r\n- Gas tiêu thụ: 0,21 kg\r\n- Bảo hành: 24 tháng.', 9, 27, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(68, 'Bếp gas mặt kính Soho 550SL W', 10, 1400000, 1800000, 'Mặt bếp kính cường lực chịu nhiệt.\r\nMặt kính màu xanh, đen họa tiết nhẹ nhàng tạo vẻ sang trọng cho căn bếp.\r\nDễ dàng vệ sinh khi sử dụng.\r\nHọng inox siêu bền, dễ dàng tháo rời để vệ sinh.\r\nHệ thống đánh lửa bằng Magneto siêu bền.\r\nKiềng bếp bằng hợp kom tráng men chịu nhiệt, có vòng chắn gió, không bị tắt lửa khi có gió. \r\nThông số kỹ thuật\r\n- Kích thước : 600 x 380 x 100 mm\r\n- Trọng lượng: 8 kg\r\n- Gas tiêu thụ: 0,21 kg\r\n- Bảo hành: 24 tháng.', 9, 27, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(69, 'Bếp Soho GiamG', 10, 2100000, 2500000, 'Mặt bếp kính cường lực chịu nhiệt.\r\nMặt kính màu xanh, đen họa tiết nhẹ nhàng tạo vẻ sang trọng cho căn bếp.\r\nDễ dàng vệ sinh khi sử dụng.\r\nHọng inox siêu bền, dễ dàng tháo rời để vệ sinh.\r\nHệ thống đánh lửa bằng Magneto siêu bền.\r\nKiềng bếp bằng hợp kom tráng men chịu nhiệt, có vòng chắn gió, không bị tắt lửa khi có gió. \r\nThông số kỹ thuật\r\n- Kích thước : 600 x 380 x 100 mm\r\n- Trọng lượng: 8 kg\r\n- Gas tiêu thụ: 0,21 kg\r\n- Bảo hành: 24 tháng.', 9, 27, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(70, 'Nồi cơm điện tử Panasonic PANC-SR-ZS185TRAM', 10, 2660000, 2800000, 'Thương hiệu: Panasonic Xuất xứ: Nhật BảnSản xuất tại: Malaysia\r\nNồi cơm điện tử Panasonic PANC-SR-ZS185TRAM được thiết kế với kiểu dáng nhỏ gọn cùng màu sắc tinh tế giúp bạn tạo được điểm nhấn nổi bật cho không gian sử dụng. \r\nThông tin sản phẩm:\r\nModel:         PANC-SR-ZS185TRAM\r\nBảo hành       12 tháng\r\nDung tích    : 1.8 Lít\r\nĐiện áp: 220 - 240V,50~60Hz \r\nTrọng lượng:   3kg\r\nKích thước:    KT thùng: 261 x 385 x 241 mm\r\nMàu Nâu\r\nThương hiệu:   Panasonic (Nhật Bản)\r\nXuất xứ:       Nhật Bản', 9, 28, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(71, 'Nồi cơm điện Panasonic PANC-SR-GA321LRA 3.2L (Bạc)', 10, 1410000, 1700000, 'Thương hiệu: Panasonic Xuất xứ: Nhật BảnSản xuất tại: Hàn Quốc\r\nNồi cơm điện Panasonic PANC-SR-GA321LRA 3.2L (Bạc) thích hợp nấu cơm cho hơn 6 người ăn. Nắp nồi bằng thép không gỉ và có tay cầm thuận tiện trong sử dụng. Bộ gia nhiệt lớn và tốt cho cơm chín nhanh và đều, giữ được các vitamin đinh dưỡng của gạo.\r\nThông tin sản phẩm:\r\nLoại nồi: Cơ\r\nDung tích: 3.2 L\r\nCông suất: 1025\r\nChất liệu lòng nồi: Nhôm hợp kim\r\nChế độ nấu: Cơm thường\r\nMàn hình hiển thị: Không\r\nKhay hấp thực phẩm: Không \r\nKích thước thùng: 420x420x240 mm\r\nKhối lượng thùng (kg): 6.2 kg\r\nThương hiệu: Panasonic (Nhật Bản)\r\nXuất xứ: Nhật Bản - Ấn Độ', 9, 28, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(72, 'Nồi cơm điện Panasonic PANC-SR-MEV10HRA', 10, 1150000, 1300000, 'Thương hiệu: Panasonic Xuất xứ: Nhật BảnSản xuất tại: Malaysia\r\nNồi cơm điện Panasonic PANC-SR-MEV10HRA 1L có lòng nồi được làm bằng chất liệu hợp kim nhôm dày dặn, có khả năng hấp thu nhiệt tốt, lan tỏa nhiệt đều giúp cơm được nấu chín đều. Ngoài ra, lòng nồi được phủ lớp chống dính giúp bạn thuận tiện hơn khi nấu và chùi rửa.\r\nThông tin sản phẩm:\r\nLoại nồi:           Nồi cơm nắp gài\r\nDung tích:          1 L \r\nModel:              PANC-SR-MEV10HRA\r\nKích thước:         274 x 255 x 248 mm\r\nChất liệu vỏ:       Nhựa\r\nChất liệu lòng nồi: Hợp kim nhôm chống dính\r\nKhối lượng:         2,5 (kg)\r\nThời hạn bảo hành   12 (tháng)\r\nĐiện áp             220 (V)\r\nCông suất:          450 (W)\r\nChế độ nấu:         Cơm, hâm cơm\r\nXuất xứ:            Nhật Bản - Malaysia', 9, 28, 9, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(73, 'Nồi cơm điện cao tần Panasonic SR-AFM181WRA 1.8L', 10, 10530000, 12000000, 'Thương hiệu: Panasonic Xuất xứ: Nhật BảnSản xuất tại: Nhật Bản\r\nSản phẩm nồi cơm điện cao tần Panasonic SR-AFM181WRA cao cấp đến từ Nhật Bản, với thiết kế thanh lịch và tinh tế, cùng công nghệ cảm ứng từ 2 lớp, menu tích hợp nhiều tính năng chỉ trong một sản phẩm, phía trong là nồi thép không rỉ được phủ hoạt tính, đảm bảo sức khỏe tuyệt đối và mang đến bữa cơm tròn vị, ấm áp cho gia đình bạn.\r\nThông tin sản phẩm:\r\n- Xuất xứ: Nhật Bản\r\n- Thương hiệu: Panasonic\r\n- Quy cách: Nồi 1.8 lít\r\nĐiểm nổi bật của nồi cơm điện cao tần Panasonic SR-AFM181WRA:\r\n- Thiết kế hiện đại, tinh tế và thanh lịch, bảng điều khiển cảm ứng phẳng mịn, giúp thao tác thêm đơn giản, dễ sử dụng.\r\n- Nồi tự làm nóng với 2 lớp cảm ứng mạnh mẽ (từ nắp và đáy của nồi), giúp các hạt gạo được chính đều với nhiệt độ hoàn hảo, giữ được hương vị ngọt dẻo và thơm ngoan hoàn hảo của từng hạt gạo.\r\n- Với dung tích lớn, 1.8 lít, thích hợp cho gia đình cho từ 3 đến 6 thành viên.\r\n- Lòng nồi được phủ than hoạt tính, giúp cho sự truyền nhiệt hiệu quả và tốt hơn, hơn nữa, bảo vệ sức khỏe tuyệt đối cho người sử dụng.\r\n- Sở hữu “Hạt bi thông minh”, khi nhiệt độ tăng lên, hơi nóng sẽ đẩy hạt bi thông minh ở nắp chống tràn lên trên, giúp nồi điều chỉnh nhiệt độ trong nồi hoàn hảo, mang đến những hạt cơm tơi xốp, thơm ngon hơn bội phần.\r\nThông số của nồi cơm điện cao tần Panasonic SR-AFM181WRA:\r\n- Dung tích: 1,8 lít\r\n- Kích thước: 276 x 404 x 243 mm\r\n- Trọng lượng: 6.2 kg\r\n- Hiển thị: Bảng điều khiển cảm ứng mặt kính\r\n- Thời gian giữ ấm: 12 giờ\r\n- Cài đặt bộ hẹn giờ: 24 giờ', 9, 28, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(74, 'Nồi cơm điện tử Panasonic PANC-SR-ZX185KRAM', 10, 4290000, 4500000, 'Thương hiệu: Panasonic Xuất xứ: Nhật BảnSản xuất tại: Malaysia\r\nNồi cơm điện tử Panasonic PANC-SR-ZX185KRAM với công nghệ dập nổi đáy nồi giúp nấu cơm ngon, nhanh và tiết kiệm điện\r\nThông tin chi tiết:\r\nDung tích:                        1.8 L\r\nThương hiệu:                      Panasonic \r\nModel:                            PANC-SR-ZX185KRAM\r\nTrọng lượng vận chuyển (gram):    3000\r\nSản xuất tại:                     Nhật Bản - Malaysia', 9, 28, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(75, 'Lò nướng điện 26 lít Sunhouse SHD4226', 10, 1360000, 1130000, 'Lò nướng điện 26 lít Sunhouse SHD4226 hoạt động với công suất 1500W, 6 chế độ nướng, bảng điều khiển núm xoay dễ sử dụng, không sinh ra khói, gọn nhẹ , nhiều màu sắc để bạn lựa chọn.', 6, 29, 9, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(76, 'Lò nướng điện Sunhouse SHD4200', 10, 1040000, 900000, 'Lò nướng điện Sunhouse SHD4200 chế độ hẹn giờ, điều chỉnh nhiệt độ thông minh, với luồng không khí nóng quay tròn trong lò thức ăn chín nhanh hơn, đều hơn, công suất 800W, không sinh ra khói', 6, 29, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(77, 'Lò nướng điện 22 lít Sunhouse SHD4222', 10, 1130000, 1050000, 'Lò nướng điện 22 lít Sunhouse SHD4222 nhiều chế độ nướng khác nhau với công suất 1380W, chức năng hẹn giờ thông minh, bảng điều khiển núm xoay dễ sử dụng với nhiều màu sắc phù hợp với không gian nhà bếp.', 6, 29, 9, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(78, 'Lò vi sóng Panasonic NN-GF574MYUE 27 lít', 10, 5990000, 5800000, 'Thương hiệu: Panasonic\r\nLò vi sóng Panasonic NN-GF574MYUE sản xuất theo công nghệ Nhật Bản thiết kế đẹp mắt, chất lượng tốt, dùng bền, nấu ăn ngon.\r\nThời gian bảo hành: 12 tháng\r\nLoại lò: Có nướng\r\nDung tích: 27 Lít\r\nCông suất: 950 W\r\nCông suất nướng: 1000 W\r\nChức năng chính: Hâm, nấu, rã đông, nướng\r\nCông nghệ Inverter: Có\r\nBảng điều khiển: Điện tử\r\nĐĩa xoay: Có\r\nHẹn giờ: Có\r\nChuông báo: Có\r\nMàn hình hiển thị: LED\r\nChức năng khác: 23 menu tự động nấu\r\nKích thước thùng: 529x236x422 mm\r\nKhối lượng thùng (kg): 12.7 kg\r\nXuất xứ: Nhật Bản - China\r\nThương hiệu: Panasonic (Nhật Bản)', 6, 30, 9, 1, 2, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(79, 'Lò vi sóng Panasonic PALM-NN-CT655MYUE 27 lít', 10, 5540000, 3200000, 'Thương hiệu: Panasonic\r\nLò vi sóng Panasonic NN-GF574MYUE sản xuất theo công nghệ Nhật Bản thiết kế đẹp mắt, chất lượng tốt, dùng bền, nấu ăn ngon.\r\nThời gian bảo hành: 12 tháng\r\nLoại lò: Lò vi sóng có nướng\r\nDung tích: 27 lít\r\nCông suất: 900 - 1400 W\r\nChức năng chính: Rã đông, hâm, nấu, nướng\r\nTiện ích: Khoang lò có đèn, Khoá bảng điều khiển, Hẹn giờ nấu, Chuông báo khi nấu xong\r\nBảng điều khiển: Nút nhấn điện tử có tiếng Việt kèm màn hình hiển thị\r\nChức năng khác: Thực đơn nấu tự động, Rã đông theo trọng lượng, Nướng đối lưu, Rã đông theo thời gian\r\nChất liệu khoang lò: Thép không gỉ sang trọng\r\nKích thước, trọng lượng: Dài 51.9 cm - Rộng 39.2 cm - Cao 30.6 cm, 19.1 kg\r\nXuất xứ: Nhật Bản - China\r\nThương hiệu: Panasonic (Nhật Bản)', 6, 30, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(80, 'Lò vi sóng Panasonic NN-GD371MYUE 23 lít', 10, 4220000, 3200000, 'Thương hiệu: Panasonic\r\nLò vi sóng Panasonic PALM-NN-GT353MYUE dung tích lớn, thiết kế với nhiều công năng, giúp bạn tiết kiệm thời gian nấu ăn.\r\nThông tin sản phẩm:\r\nLoại lò: Lò vi sóng có nướng\r\nDung tích: 23 lít\r\nCông suất: 950 - 1000 W\r\nChức năng chính: Rã đông, hâm, nấu, nướng\r\nTiện ích: Khoá bảng điều khiển, Inverter tiết kiệm điện\r\nBảng điều khiển: Nút nhấn điện tử, nút vặn, màn hình hiển thị\r\nChức năng khác: Thực đơn nấu tự động\r\nChất liệu khoang lò: Thép tráng men\r\nKích thước, trọng lượng: Dài 48.8 cm - Rộng 39.5 cm - Cao 27.9 cm , 11.1kg\r\nBảo hành 12 tháng\r\nXuất xứ: Nhật Bản - China\r\nThương hiệu: Panasonic (Nhật Bản)', 6, 30, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(81, 'Lò vi sóng Panasonic PALM-NN-GT353MYUE 23 lít', 10, 3300000, 2100000, 'Thương hiệu: Panasonic\r\nLò vi sóng Panasonic PALM-NN-GT353MYUE thương hiệu Nhật Bản nhỏ gọn, lắp đặt ở mọi vị trí mà không chiếm nhiều diện tích\r\nThông tin sản phẩm:\r\nLoại lò: Lò vi sóng có nướng\r\nDung tích: 23 lít\r\nCông suất: 800 - 1000 W\r\nChức năng chính: Rã đông, hâm, nấu, nướng\r\nTiện ích: Khoang lò có đèn, Khoá bảng điều khiển, Hẹn giờ nấu, Chuông báo khi nấu xong\r\nBảng điều khiển: Nút nhấn điện tử kèm màn hình hiển thị\r\nChức năng khác: Thực đơn nấu tự động, Rã đông nhanh\r\nChất liệu khoang lò: Thép tráng men\r\nKích thước, trọng lượng: Dài 48.8 cm - Rộng 40.5 cm - Cao 22.9 cm, 13.4 kg\r\nXuất xứ: Nhật Bản - China\r\nThương hiệu: Panasonic (Nhật Bản)', 6, 30, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(82, 'Lò vi sóng Panasonic PALM-NN-SM332MYUE 25L', 10, 2670000, 2300000, 'Thương hiệu: Panasonic\r\nLò vi sóng Panasonic NN-SM332MYUE được sản xuất theo công nghệ Nhật Bản nhập khẩu chính hãng của Panasonic nên người dùng hoàn toàn yên tâm về uy tín và chất lượng.\r\nThông tin sản phẩm:\r\nLoại lò: Lò vi sóng thường\r\nDung tích: 25 lít\r\nCông suất: 800 W\r\nChức năng chính: Rã đông, hâm, nấu\r\nTiện ích: Hẹn giờ nấu, Khoang lò có đèn, Chuông báo khi nấu xong\r\nBảng điều khiển: Nút vặn\r\nChức năng khác: Không có\r\nChất liệu khoang lò: Thép tráng men\r\nKích thước, trọng lượng: Dài 48.5 cm - Rộng 40 cm - Cao 28.7 cm, 12.5 kg\r\nBảo hành 12 tháng\r\nXuất xứ: Nhật Bản - China\r\nThương hiệu: Panasonic (Nhật Bản)', 6, 30, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(83, 'Máy pha cà phê Lelit PL042EMI – Italy', 10, 28750000, 26650000, 'Máy pha Lelit PL042EMI là dòng máy pha đến từ thương hiệu Lelit nổi tiếng của Ý. Máy được tích hợp cả máy xay tiện dụng với chất lượng xay rất tốt giúp tiết kiệm không gian quán cũng như tiết kiệm tối đa thao tác pha chế. Đây là model mới nhất của của hãng Lelit đối với máy pha phân khúc này, thích hợp sử dụng cho gia đình, văn phòng hay những quán cà phê nhỏ', 2, 31, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(84, 'Máy pha cafe Casadio Dieci A3 (Italy)', 10, 136600000, 130000000, 'Tiếp nối những thành công của Máy pha cà phê chuyên nghiệp Casadio Dieci A1 – I Group, nhà sản xuất lừng danh đến từ nước Ý cho ra đời dòng máy lên tới 03 vòi pha Casadio Dieci A3 – III Group.', 2, 31, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(85, 'Máy pha cà phê Nuova Simonelli Appia II 2 Group', 10, 105000000, 100000000, 'Tiếp nối những thành công của Máy pha cà phê chuyên nghiệp Casadio Dieci A1 – I Group, nhà sản xuất lừng danh đến từ nước Ý cho ra đời dòng máy lên tới 02 vòi pha Casadio Dieci A2 – II Group.\r\n\r\nĐây là dòng máy pha công nghiệp chuyên dành cho các quán cà phê, nhà hàng, công ty có lượng người dùng lớn, công suất liên tục. Sản phẩm điển hình dành cho mô hình cà phê hiện đại: Espresso, Specialty…', 2, 31, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(86, 'Máy hút bụi Panasonic PAHB-MC-CL455KN46 2000 W', 10, 3880000, 3580000, 'Máy hút bụi Panasonic PAHB-MC-CL455KN46 2000 W thiết kế sang trọng, hiện đại, tiết kiệm điện năng thao tác hút bụi linh hoạt, nhanh chóng.\r\nThông tin sản phẩm:\r\nCông suất hoạt động: 2000 W\r\nCông suất hút bụi: 400 W\r\nKhoang chứa bụi: Dùng hộp chứa bụi 1.2 lít\r\nBộ lọc: Bộ lọc Hepa kháng khuẩn\r\nTiện ích: Điều chỉnh được lực hút, Cảm biến phát hiện bụi, Bánh xe tiện di chuyển, Dây điện tự thu gọn, Thân máy nhỏ gọn\r\nChiều dài dây điện: 6 mét\r\nThương hiệu: Panasonic (Nhật Bản)\r\nXuất xứ: Nhật Bản - Malaysia\r\nKích thước, khối lượng: Dài 48.5 cm - Rộng 32 cm - Cao 34.5 cm, 4.5 kg\r\nBảo hành 12 tháng', 6, 32, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(87, 'Máy hút bụi Panasonic PAHB-MC-CG240DN46 850 W', 10, 1570000, 1500000, 'Máy hút bụi Panasonic PAHB-MC-CG240DN46 850 W gọn nhẹ, linh hoạt, cho người dùng sự tiện dụng cao nhất khi vệ sinh nhà cửa, văn phòng.\r\nCông suất hoạt động: 850 W\r\nCông suất hút bụi: 250 W\r\nKhoang chứa bụi: Dùng túi chứa bụi 1.4 lít\r\nBộ lọc: Bộ lọc thường\r\nĐộ ồn: Hãng không công bố\r\nTiện ích: Có đèn báo đầy bụi\r\nChiều dài dây điện: 5 mét\r\nKích thước, khối lượng:Dài 31 cm - Rộng 25.5 cm - Cao 22 cm\r\nThương hiệu: Panasonic (Nhật Bản)\r\nXuất xứ: Nhật Bản - Malaysia', 6, 32, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(88, 'Máy hút bụi Panasonic PAHB-MC-YL631RN46', 10, 3179000, 3100000, 'Máy hút bụi Panasonic PAHB-MC-YL631RN46 hoạt động với công suất 1700W giúp rút ngắn thời gian làm việc đồng thời giúp tiết kiệm điện năng tiêu thụ mang lại sự tiện dụng cho bạn.\r\nThông tin sản phẩm:\r\nModel: MC-CL565KN46\r\nKiểu máy hút bụi: Nằm ngang\r\nCông suất: 2000 W\r\nDung tích chứa bụi: 2 Lít\r\nBộ lọc: HEPA\r\nChiều dài dây điện: 5 m\r\nKích thước thùng: 267x400x250 mm\r\nKhối lượng thùng (kg): 5.1 kg\r\nBảo hành 12 tháng\r\nXuất xứ: Nhật Bản - Malaysia\r\nThương hiệu: Panasonic (Nhật Bản)\r\n', 6, 32, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(89, 'Máy hút bụi Panasonic PAHB-MC-CL240DN46 1400W', 10, 2350000, 2700000, 'Máy hút bụi Panasonic PAHB-MC-CL240DN46 1400W có chức năng thổi, hút hiện đại, là một trong những lựa chọn lý tưởng dành cho bạn bất cứ khi nào có nhu cầu dọn dẹp nhà cửa. \r\nThông tin sản phẩm:\r\nMàu sắc:    Cam\r\nModel:     PAHB-MC-CL240DN46\r\nCông suất đầu vào: 1400 W\r\nCông suất hút:    350 W\r\nCông suất chứa bụi    : 0,6 L\r\nBộ lọc:    Bình thường\r\nMáy thổi:    Có\r\nỐng:     Nhựa x 2\r\nLoại ống hút:    Đơn\r\nChiều dài dây nguồn:    5,0 m\r\nPhụ kiện:     2 lối (khe và quét bụi)\r\nKích thước:    50 x 20 x 20 (cm)\r\nTrọng lượng    3,6 (kg)\r\nCông suất    1.400 (W)\r\nBảo hành 12 tháng\r\nThương hiệu: Panasonic (Nhật Bản)\r\nXuất xứ: Nhật Bản - Malaysia ', 6, 32, 9, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(90, 'Máy hút bụi Panasonic MC-CL563RN46 (Đỏ)', 10, 2990000, 2800000, 'Máy hút bụi Panasonic MC-CL563RN46 (Đỏ) với công nghệ lọc hiên đại tiết kiệm điện giúp bạn lọc đến 99.97% bụi bẩn đi qua, đem lại cho gia đình bạn một bầu không khí thật trong lành.\r\nThông tin sản phẩm:\r\nModel: MC-CL563RN46\r\nMàu sắc: Đỏ\r\nTính năng máy hút bụi\r\nKiểu máy hút bụi: Nằm ngang\r\nCông suất: 1800 W\r\nDung tích chứa bụi: 2 Lít\r\nBộ lọc: HEPA\r\nChiều dài dây điện: 5 m\r\nKích thước thùng: 267x400x250 mm\r\nKhối lượng thùng (kg): 4.9 kg\r\nBảo hành 12 tháng\r\nXuất xứ: Nhật Bản - Malaysia\r\nThương hiệu: Panasonic (Nhật Bản)', 6, 32, 9, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(91, 'Bếp hai vùng nấu điện từ hồng ngoại Sunhouse SHB-EI02', 10, 7580000, 4290000, 'Bếp đôi điện từ hồng ngoại Sunhouse SHB-EI02 đến từ thương hiệu Sunhouse với phong cách Tây Ban Nha, bàn phím trượt, mặt kính mài vát tiện dụng. Đặc biệt mâm từ 100% dây đồng tăng tuổi thọ cho bếp, vi mạch cao cấp tích điều khiển chung 2 bếp tiện lợi, chế độ làm nóng nhanh gấp 2 lần so với bếp thường', 9, 33, 13, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(92, 'Bếp từ cảm ứng Sunhouse SHD6800', 10, 1027000, 729000, 'Bếp từ cảm ứng Sunhouse SHD6800  nấu ăn nhanh và an toàn, tốt cho sức khỏe, mặt kính siêu bền chịu được nhiệt lên đến 600 độ C, bếp được thiết kế siêu mỏng với 39mm siêu nhẹ bạn có thể đem đi du lịch hay di chuyển mọi nơi trong nhà tiện dụng', 9, 33, 13, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(93, 'Bếp từ đôi Sunhouse SHB-DI02', 10, 7996000, 4290000, 'Bếp đôi điện từ Sunhouse SHB-DI02 là dòng sản phẩm cao cấp từ thương hiệu Sunhouse, mặt kính chịu lực bền đẹp sáng bóng, viền được làm bằng chất liệu inox không gỉ. Mặt kính vát sang trọng, mâm từ 100% tăng tuổi thọ của bếp bền hơn, đã thê chức năng hẹn giờ nấu tiện lợi', 9, 33, 13, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(95, 'Bếp hồng ngoại cảm ứng Sunhouse SHD6015', 10, 699000, 600000, 'Bếp hồng ngoại cảm ứng Sunhouse SHD6015 có mặt kính siêu bền chịu nhiệt lên đến 800 độ C cùng với phím cảm ứng siêu nhạy, các phím điều khiển được ghi bằng tiếng việt dễ dùng', 9, 34, 13, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(96, 'Bếp hồng ngoại cảm ứng Sunhouse SHD6016', 10, 969000, 780000, 'Bếp hồng ngoại cảm ứng Sunhouse SHD6016 sử dụng mặt kính siêu bền chịu nhiệt tốt cùng phím cảm ứng dễ sử dụng, an toàn. Với công suất 2000W nấu thức ăn nhanh hơn và có thể nấu được tất cả các loại nồi.', 9, 34, 13, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00');
INSERT INTO `sanpham` (`sp_id`, `sp_ten`, `sp_so_luong_ton_kho`, `sp_gia_niem_yet`, `sp_gia_ban`, `sp_mo_ta`, `sp_don_vi_tinh_id`, `sp_danh_muc_id`, `sp_nsx_id`, `sp_kho_hang_id`, `sp_muc_thue_id`, `sp_khuyen_mai_id`, `trang_thai`, `created_at`, `updated_at`) VALUES
(97, 'Bếp hồng ngoại SUNHOUSE SHD 6014', 10, 806000, 690000, 'Bếp hồng ngoại SUNHOUSE SHD 6014 bạn có thể nấu được cho mọi loại nồi, với công suất 2000W nấu thức ăn nhanh hơn, thức ăn sẽ thơm ngon bổ dưỡng hơn.', 9, 34, 13, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(98, 'Asus ZenFone 5 64GB', 10, 8250000, 8700000, 'Dual Nano-SIM (4G + 4G); 3G WCDMA B1 / B2 / B3 / B5 / B6 / B8 / B19; 4G LTE B1 / B2 / B3 / B5 / B7 / B8 / B18 / B19 / B28 / B38 / B39 / B41; 4G LTE không hoạt động ở Hoa Kỳ; 3G hoạt động với các hãng vận tải GSM AT & T và AT & T; KHÔNG làm việc với Sprint, Verizon, US Cellular và tất cả các mạng di động CDMA khác; Khả năng tương thích LTE: Đây là chứng khoán quốc tế, thay đổi theo nhà cung cấp dịch vụ (đảm bảo kiểm tra với nhà cung cấp của bạn trước khi mua)\r\nQualcomm SDM636 Snapdragon 636 CPU Kryo 260 của Octa-core; ROM 64 GB, RAM 4GB; Hỗ trợ microSD, tối đa 2 TB (sử dụng khe cắm SIM 2); Pin 3300 mAh.\r\nCamera chính: Dual: 12 MP (f / 1.8, 24 mm, 1 / 2.55 \", 1.4 μm, PDAF) + (12 mm, 120 °), lấy nét tự động lấy nét pha, OIS, đèn flash LED, Camera trước: 8 MP (f /2.0, 24 mm).\r\nMàn hình cảm ứng điện dung IPS LCD 6,2 inch, 16 triệu màu.\r\nNội dung gói: ASUS ZenFone 5 (ZE620KL), tai nghe ASUS ZenEar Pro Hi-Res với micrô, cáp USB Type-C, pin Ejector (kim khay SIM), bộ đổi nguồn USB (10W), Tài liệu, Đệm mềm rõ ràng. XIN LƯU Ý: đây là phiên bản quốc tế của điện thoại không có bảo hành ở Hoa Kỳ.', 10, 35, 2, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(99, 'Asus ZenFone 3', 10, 5200000, 5500000, '5.2 inches, Super IPS+ capacitive touchscreen, 16M colors. Dual SIM; Qualcomm MSM8953 Snapdragon 625, Octa-core 2.0 GHz Cortex-A53 CPU. 32GB ROM, 3GB RAM; Supports Micro-SD up to 128GB, Main Camera: 16 MP, f/2.0, laser/phase detection autofocus, OIS (4-axis), dual-LED (dual tone) flash; Front Camera: 8 MP.\r\nUnlocked cell phones are compatible with GSM carriers such as AT&T and T-Mobile, but are not compatible with CDMA carriers such as Verizon and Sprint.\r\nPlease check if your GSM cellular carrier supports the bands for this model before purchasing, LTE may not be available in the US as this is the imported international model: 2G bands: GSM 850 / 900 / 1800 / 1900 - SIM 1 & SIM 2, 3G bands: HSDPA 850 / 900 / 1900 / 2100 / 800, 4G bands: LTE band 1(2100), 2(1900), 3(1800), 5(850), 7(2600), 8(900), 18(800), 19(800), 26(850), 28(700), 38(2600), 39(1900), 40(2300), 41(2500).\r\nThis device may not include a US warranty as some manufacturers do not honor warranties for international items Please contact the seller for specific warranty information.\r\nThe box contains: Your new device, USB cable, Charger (may be foreign) If so, a FREE US adapter will be included, Documentation.\r\n', 10, 35, 2, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(100, 'ASUS ZenFone 3 Ultra ', 10, 5000000, 5500000, 'Qualcomm MSM8976 Snapdragon 652, CPU Cortex-A72 1,8 GHz 4 nhân\r\nMàn hình cảm ứng điện dung IPS LCD 6,8 inch, 16 triệu màu\r\nCamera chính: 23 MP, f / 2.0, lấy nét tự động lấy nét bằng laser / pha, đèn flash OIS (4 trục), đèn LED kép (âm kép); Camera trước: 8 MP.\r\n4G LTE Dual SIM; AT & T, T-Mobile và các hãng di động GSM khác; Khả năng tương thích LTE: Đây là chứng khoán quốc tế, thay đổi theo nhà cung cấp dịch vụ (đảm bảo kiểm tra với nhà cung cấp của bạn trước khi mua); KHÔNG làm việc với Sprint, Verizon, US Cellular và tất cả các mạng di động CDMA khác.\r\nROM 64 GB, RAM 4GB; Hỗ trợ Micro-SD lên đến 200GB', 10, 35, 2, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(101, 'Huawei P10 Lite 32GB WAS-LX3 Octa Core 3GB RAM International Version LTE (Gold)', 10, 5000000, 5500000, '4G LTE đã mở khóa bất kỳ nhà cung cấp dịch vụ di động GSM Nano Sim nào (không phải Verizon Sprint Net10 hoặc bất kỳ nhà cung cấp dịch vụ CDMA nào)\r\nBăng tần 4G LTE: 2/4/5/7/28 3G: 1/2/4/5/8 2g: 850/900/1800/1900 Mhz\r\nOcta-core (4x2,1 GHz Cortex-A53 và 4x1,7 GHz Cortex-A53) GPU Mali-T830MP2\r\nBộ nhớ LCD 5,2 \"/ 32Gb (người dùng 28Gb) 3 GB RAM / 12 MP, đèn flash LED kép và Máy ảnh sau 8Mp\r\nAndroid 7.0 (Nougat) / Vân tay (gắn phía sau), gia tốc kế, khoảng cách, la bàn', 10, 40, 16, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(102, 'Huawei Y7 (2017)', 10, 4539000, 5000000, 'Công nghệ mạng GSM / HSPA / LTE\r\nLAUNCH công bố năm 2017, tháng 5\r\nTrạng thái có sẵn. Phát hành 2017, tháng 7\r\nKích thước BODY 153,6 x 76,4 x 8,4 mm (6,05 x 3,01 x 0,33 in)\r\nTrọng lượng 165 g (5,82 oz)\r\nXây dựng kính phía trước, thân nhôm\r\nSIM đơn hoặc SIM kép kép\r\nMàn hình cảm ứng điện dung IPS LCD loại DISPLAY, 16 triệu màu\r\nKích thước 5,5 inch, 83,4 cm2 (~ 71,1% tỷ lệ màn hình so với thân máy)\r\nĐộ phân giải 720 x 1280 pixel, tỷ lệ 16: 9 (mật độ ~ 267 ppi)\r\nMultitouch Có\r\n - EMUI 5.1\r\nPLATFORM OS Android 7.0 (Nougat)\r\nChipset Qualcomm MSM8940 Snapdragon 435\r\nCPU Octa-core 1,4 GHz Cortex-A53\r\nGPU Adreno 505\r\nKhe cắm thẻ nhớ microSD, tối đa 256 GB (sử dụng khe cắm SIM 2)\r\nBộ nhớ trong 16 GB, 2 GB\r\nMáy ảnh chính 12 MP (f / 2.2, 1 / 2.9 ″, 1.25 µm), lấy nét tự động lấy nét pha, đèn flash LED\r\nTính năng Gắn thẻ địa lý, lấy nét cảm ứng, dò tìm khuôn mặt, HDR, ảnh toàn cảnh\r\nVideo 1080p @ 30fps\r\nTrung học 8 MP, f / 2.0\r\nSOUND Các loại cảnh báo Rung; Nhạc chuông MP3, WAV\r\nLoa Có\r\nGiắc cắm 3,5 mm\r\n - Hủy tiếng ồn chủ động với micrô chuyên dụng\r\nCOMMS WLAN Wi-Fi 802.11 b / g / n, Wi-Fi Direct, điểm phát sóng\r\nBluetooth v4.1, A2DP, LE\r\nGPS Có, với A-GPS, GLONASS\r\nĐài FM radio\r\nUSB microUSB phiên bản 2.0, USB On-The-Go\r\nCác tính năng Cảm biến Gia tốc kế, con quay hồi chuyển, khoảng cách, la bàn\r\nNhắn tin SMS (chế độ xem luồng), MMS, Email, Email Push\r\nHTML5 trình duyệt\r\n - Trình phát MP4 / H.264\r\n- Trình phát MP3 / eAAC + / WAV / Flac\r\n- Trình chỉnh sửa ảnh / video\r\n- Trình chỉnh sửa tài liệu\r\nPIN Pin Li-Ion 4000 mAh không thể tháo rời\r\nMàu sắc của MISC Xám / Uy tín, Vàng / Bạc', 10, 40, 16, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(103, 'Huawei P20 Pro 128G', 10, 21680000, 23000000, 'Công nghệ mạng GSM / HSPA / LTE\r\nLAUNCH công bố năm 2018, tháng 3\r\nTrạng thái có sẵn. Phát hành năm 2018, tháng 4\r\nKích thước BODY 155 x 73,9 x 7,8 mm (6,10 x 2,91 x 0,31 in)\r\nTrọng lượng 180 g (6,35 oz)\r\nSIM đơn (Nano-SIM) hoặc SIM kép (Nano-SIM, chế độ chờ kép)\r\n - Chứng nhận IP67 - chống bụi / nước (lên tới 1m trong 30 phút)\r\nDISPLAY Loại Màn hình cảm ứng điện dung AMOLED, 16 triệu màu\r\nKích thước 6,1 inch, 93,9 cm2 (~ 82,0% tỷ lệ màn hình so với thân máy)\r\nĐộ phân giải 1080 x 2240 pixel, tỷ lệ 18,7: 9 (mật độ ~ 408 ppi)\r\nMultitouch Có\r\n - EMUI 8.1\r\nPLATFORM OS Android 8.1 (Oreo)\r\nChipset Hisilicon Kirin 970\r\nCPU Octa-core (4 × 2,4 GHz Cortex-A73 & 4 × 1,8 GHz Cortex-A53)\r\nGPU Mali-G72 MP12\r\nKhe thẻ MEMORY Không\r\nBộ nhớ trong 128 GB, 6 GB\r\nCAMERA Primary Triple: 40 MP (f / 1.8, 27mm, 1 / 1.7 ″, OIS) + 20 MP B / W (f / 1.6, 27mm) + 8 MP (f / 2.4, 80mm), quang học Leica, zoom quang 3x , phát hiện pha và tự động lấy nét bằng laser, đèn flash LED, chất lượng kiểm tra\r\nTính năng Gắn thẻ địa lý, lấy nét cảm ứng, dò tìm khuôn mặt, HDR, ảnh toàn cảnh\r\nVideo 2160p @ 30fps, 1080p @ 30 / 60fps, 720p @ 960fps, kiểm tra chất lượng\r\nTrung học 24 MP, f / 2.0, 720p\r\nSOUND Các loại cảnh báo Rung; Nhạc chuông MP3, WAV\r\nLoa Có\r\nGiắc 3,5 mm Không\r\n - Âm thanh 32 bit / 384kHz\r\n- Hủy tiếng ồn chủ động với micrô chuyên dụng\r\n- Bộ đổi nguồn tai nghe USB-C 3,5 mm.\r\nCOMMS WLAN Wi-Fi 802.11 a / b / g / n / ac, băng tần kép, WiFi Direct, điểm phát sóng\r\nBluetooth 4.2, A2DP, LE, EDR, aptX HD\r\nGPS Có, với A-GPS, GLONASS\r\nNFC Có\r\nCổng hồng ngoại\r\nRadio No\r\nUSB 3.1, đầu nối có thể đảo ngược Type-C 1.0\r\nĐẶC ĐIỂM Cảm biến vân tay (mặt trước), gia tốc kế, con quay hồi chuyển, khoảng cách, la bàn, phổ màu\r\nNhắn tin SMS (chế độ xem luồng), MMS, Email, Email Push, IM\r\nHTML5 trình duyệt\r\n - Sạc pin nhanh 4.5V / 5A (58% trong 30 phút)\r\n- Trình phát XviD / MP4 / H.264 / WMV\r\n- Trình phát MP3 / eAAC + / WMA / WAV / Flac\r\n- Trình xem tài liệu\r\n- Trình chỉnh sửa ảnh / video\r\nPin Li-Po 4000 mAh không thể tháo rời\r\nMàu sắc MISC Chạng vạng, Đen, Nửa đêm xanh, Vàng hồng\r\nTESTS Hệ điều hành hiệu suất OS II: 3565 / OS OS II 2.0: 3252\r\nDấu X: 39945\r\nHiển thị tỷ lệ tương phản: Vô hạn (danh nghĩa), 4.087 (ánh sáng mặt trời)\r\nMáy ảnh ảnh / Video\r\nGiọng nói 71dB / Tiếng ồn 69dB / Vòng 91dB\r\nChất lượng âm thanh tiếng ồn -92.1dB / Crosstalk -92.1dB\r\nTuổi thọ pin Độ bền của độ bền 89h', 10, 40, 16, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(104, 'Huawei P10 32GB', 10, 12000000, 13000000, 'Công nghệ mạng GSM / HSPA / LTE\r\nLAUNCH công bố năm 2017, tháng 2\r\nTrạng thái có sẵn. Phát hành 2017, tháng 3\r\nKích thước BODY 145,3 x 69,3 x 7 mm (5,72 x 2,73 x 0,28 in)\r\nTrọng lượng 145 g (5,11 oz)\r\nXây dựng kính phía trước, khung nhôm và trở lại\r\nSIM đơn SIM (Nano-SIM) hoặc SIM kép kép (Nano-SIM, chế độ chờ kép)\r\nMàn hình cảm ứng điện dung LCD IPS-NEO kiểu hiển thị, 16 triệu màu\r\nKích thước 5,1 inch, 71,7 cm2 (~ 71,2% tỷ lệ màn hình so với thân máy)\r\nĐộ phân giải 1080 x 1920 pixel, tỷ lệ 16: 9 (mật độ ~ 432 ppi)\r\nMultitouch Có\r\nBảo vệ Corning Gorilla Glass 5\r\n - Giao diện người dùng cảm xúc 5.1\r\nPLATFORM OS Android 7.0 (Nougat), đã lên kế hoạch nâng cấp lên Android 8.0 (Oreo)\r\nChipset HiSilicon Kirin 960\r\nCPU Octa-core (4 × 2,4 GHz Cortex-A73 & 4 × 1,8 GHz Cortex-A53)\r\nGPU Mali-G71 MP8\r\nKhe cắm thẻ nhớ microSD, tối đa 256 GB (sử dụng khe cắm SIM 2)\r\nBộ nhớ trong 32 GB, 4 GB\r\nCAMERA Primary Dual 20 MP + 12 MP, ống kính f / 2.2, OIS, Leica, zoom 2x không mất, phát hiện pha và lấy nét tự động bằng laser, đèn flash kép (âm kép), kiểm tra chất lượng\r\nTính năng Gắn thẻ địa lý, lấy nét cảm ứng, dò tìm khuôn mặt, HDR, ảnh toàn cảnh\r\nVideo 2160p @ 30fps, 1080p @ 60fps, chất lượng kiểm tra\r\nTrung học 8 MP, f / 1.9\r\nSOUND Các loại cảnh báo Rung; Nhạc chuông MP3, WAV\r\nLoa Có\r\nGiắc cắm 3,5 mm\r\n - Âm thanh 24 bit / 192kHz\r\n- Hủy tiếng ồn chủ động với micrô chuyên dụng\r\nCOMMS WLAN Wi-Fi 802.11 a / b / g / n / ac, băng tần kép, DLNA, WiFi Direct, điểm phát sóng\r\nBluetooth 4.2, A2DP, LE\r\nGPS Có, với A-GPS, GLONASS, BDS, GALILEO\r\nNFC Có\r\nRadio No\r\nĐầu nối có thể đảo ngược USB 2.0, Type-C 1.0\r\nĐẶC ĐIỂM Cảm biến vân tay (mặt trước), gia tốc kế, con quay hồi chuyển, khoảng cách, la bàn\r\nNhắn tin SMS (chế độ xem luồng), MMS, Email, Push Mail, IM\r\nHTML5 trình duyệt\r\nJava No\r\n - Sạc pin nhanh\r\n- Trình phát XviD / MP4 / H.265\r\n- Trình phát MP3 / eAAC + / WAV / Flac\r\n- Trình xem tài liệu\r\n- Trình chỉnh sửa ảnh / video\r\nPIN Pin Li-Ion 3200 mAh không thể tháo rời\r\nMàu sắc MISC Mystic Silver, Vàng hồng, Graphite Đen, Vàng rực rỡ, Xanh rực rỡ, Cây xanh\r\nTESTS Hệ điều hành hiệu suất OS II: 3393 / Basemark OS II 2.0: 2910\r\nDấu X: 39433\r\nHiển thị tỷ lệ tương phản: 1423: 1 (danh nghĩa), 3.379 (ánh sáng mặt trời)\r\nMáy ảnh ảnh / Video\r\nLoa bằng giọng nói 67dB / Tiếng ồn 70dB / Vòng 83dB\r\nChất lượng âm thanh Noise -93.0dB / Crosstalk -93.5dB\r\nTuổi thọ pin Độ bền của pin 75h', 10, 40, 16, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(105, 'iPhone 5 Black/Slate 16gb', 10, 6150000, 5500000, 'Apple iPhone 5 được trang bị bộ xử lý lõi kép Apple A6 1.3GHz và nó đi kèm với RAM 1GB. Theo như các máy ảnh được quan tâm, A pple iPhone 5 gói một máy ảnh chính 8 megapixel ở phía sau và một game bắn súng phía trước 1,2 megapixel cho selfies.\r\nMàn hình LCD IPS backlit 4 inch, màn hình cảm ứng điện dung, 16 triệu màu\r\n  Chip Apple A6\r\n  Các mệnh lệnh và ngôn ngữ tự nhiên của Siri\r\n  3,5 Jack cắm tai nghe\r\n  Wi-Fi 802.11\r\n  Độ phân giải 640 x 1136 pixel, tỷ lệ 16: 9\r\n  8 MP, f / 2.4, 33mm, tự động lấy nét, đèn flash LED\r\n  Quay video 1080p @ 30fps\r\n  iMessage, SMS (chế độ xem luồng), MMS, Email, Email đẩy', 10, 42, 16, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(106, 'iPhone 5s Silver 64gb', 10, 10900000, 12500000, 'Các 5s iPhone là lần đầu tiên trong loạt Apple sử dụng ID cảm ứng này cho phép mở khóa bằng cách thiết lập một ngón tay in có nghĩa là bạn có thể nhận được vào điện thoại của bạn nhanh hơn. Máy ảnh tự động lấy nét 8 MP có cảm biến lớn hơn và đèn flash LED kép, và sẵn sàng tận dụng những cải tiến đáng chú ý nhất - chip A7 64 bit.\r\nMàn hình cảm ứng điện dung IPS 4 inch 16M màu LED backlit IPS\r\n  Chip Apple A7\r\n  Các mệnh lệnh và ngôn ngữ tự nhiên của Siri\r\n  Quay video 1080p @ 30fps\r\n  iMessage, SMS (chế độ xem luồng), MMS, Email, Email đẩy\r\n  Sim nano\r\n  640 x 1136 pixel, tỷ lệ 16: 9\r\n  8 MP, f / 2.2, 29mm, tự động lấy nét, đèn flash kép LED\r\n  Cảm biến vân tay (gắn phía trước)\r\n  3,5 Jack cắm tai nghe\r\n  Wi-Fi 802.11\r\n', 10, 42, 16, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(107, 'iPhone 6s Space Grey 64gb', 10, 18900000, 20500000, 'Màn hình Retina HD 4,7 inch với 3D Touch. Vỏ nhôm 7000 và nắp kính mạnh hơn. Một chip A9 với kiến trúc 64-bit. Camera iSight 12 megapixel hoàn toàn mới với Live Photos và ổn định hình ảnh quang học cho ảnh tĩnh và video. Chạm vào ID. LTE 4G nhanh hơn và Wi-Fi. Thời lượng pin dài. Và iOS 9 và iCloud. Tất cả trong một thiết kế unibody trơn tru, liên tục.\r\nMàn hình Retina HD 4,7 inch (đường chéo) có độ phân giải 1334x750\r\n  Chip A9 tích hợp bộ xử lý chuyển động M9\r\n  Quay video 4K ở tốc độ 30 khung hình / giây và quay video chuyển động chậm ở 1080p ở tốc độ 120 khung hình / giây\r\n  ID cảm ứng thế hệ thứ hai\r\n  iOS và iCloud\r\n  3D Touch\r\n  Camera iSight 12 megapixel với Pixel Focus, đèn flash True Tone, Live Photos và ổn định hình ảnh quang học\r\n  Camera HD FaceTime 5 megapixel với Retina Flash\r\n  4G LTE Nâng cao và 802.11a / b / g / n / ac và Wi-Fi với MIMO\r\n  Có sẵn bằng bạc, vàng, không gian màu xám hoặc vàng hồng', 10, 42, 16, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(108, 'iPhone SE Rose Gold 64gb', 10, 13500000, 15000000, 'iPhone SE có màn hình Retina 4 inch, chip A9 với kiến trúc máy tính để bàn 64-bit, cảm biến vân tay Touch ID, camera iSight 12 megapixel, camera FaceTime HD với Retina Flash, Live Photos, 4G LTE 1 và Wi-Fi nhanh, iOS 9 và iCloud.\r\nMàn hình Retina 4 inch (đường chéo) có độ phân giải 1136x640\r\n  Máy ảnh iSight 12 megapixel với Pixel tiêu điểm và đèn flash True Tone\r\n  Camera HD FaceTime 1.2 megapixel với Retina Flash\r\n  4G LTE 1 và 802.11a / b / g / n / ac Wi-Fi\r\n  Có sẵn bằng vàng hồng, bạc, vàng và xám\r\n  Chip A9 tích hợp bộ xử lý chuyển động M9\r\n  Quay video 4K ở tốc độ 30 khung hình / giây và quay video chuyển động chậm ở tốc độ 240 khung hình / giây\r\n  Cảm biến vân tay ID cảm ứng\r\n  iOS 9 và iCloud', 10, 42, 16, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(109, 'iPhone 6 Plus Silver 32gb', 10, 10500000, 13000000, 'IPhone 6 Plus di chuyển đến một hình dạng hoàn toàn mới, các cạnh liền mạch cảm thấy tuyệt vời trong lòng bàn tay của bạn. Với kích thước màn hình lớn hơn thậm chí làm cho việc lướt internet hoặc chỉnh sửa ảnh Instagram dễ dàng hơn bao giờ hết. Màn hình là tính năng xác định của iPhone 6 Plus nhưng một bản cập nhật quan trọng khác là việc thêm Ổn định hình ảnh quang học vào máy ảnh.\r\n\r\nMàn hình cảm ứng điện dung TFT màn hình cảm ứng điện dung TFT 5,5 inch 16 triệu màu\r\n  Chip Apple A8\r\n  Các mệnh lệnh và ngôn ngữ tự nhiên của Siri\r\n  Quay video 1080p @ 30fps\r\n  iMessage, SMS (chế độ xem luồng), MMS, Email, Email đẩy\r\n  Sim nano\r\n  640 x 1136 pixel, tỷ lệ 16: 9\r\n  8 MP, f / 2.2, 29mm, tự động lấy nét, đèn flash kép LED\r\n  Cảm biến vân tay ID cảm ứng được tích hợp vào nút trang chủ\r\n  3,5 Jack cắm tai nghe\r\n  Wi-Fi 802.11', 10, 42, 16, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(110, 'Nokia 6 TA-1000 64GB Black', 10, 15500000, 17500000, 'Nokia 6 TA-1000 (kiểu Trung Quốc). Màn hình: 5,5 inch, Bộ nhớ: ROM 64 GB, RAM 4GB, Dual Sim, Hệ điều hành: Hệ điều hành Android, v7.1.1 (Nougat), CPU: Octa-core 1,4 GHz Cortex-A53, Camera: 16 MP, f / 2.0, phát hiện pha tự động lấy nét, đèn flash dual-LED (hai tông màu), Thứ hai: 8 MP, Vân tay (mặt trước), gia tốc, con quay, khoảng cách, la bàn, Khe cắm thẻ nhớ: microSD, tối đa 256 GB (sử dụng khe cắm SIM 2).\r\nĐiện thoại di động mở khóa tương thích với các mạng di động GSM như AT & T và T-Mobile, nhưng không tương thích với các nhà cung cấp dịch vụ di động CDMA như Verizon và Sprint.\r\nVui lòng kiểm tra xem nhà cung cấp dịch vụ di động GSM của bạn có hỗ trợ các băng tần cho mẫu này trước khi mua hay không, LTE có thể không khả dụng ở tất cả các khu vực: GSM: 850/900/1800/1900 MHz, WCDMA: 850/900/1900/2100 MHz, CDMA: CDMA 2000 / EVDO Rev. A (BC0) TD-SCDMA: Băng tần 34,39 FDD LTE: Băng tần 1, 3,5 TDD LTE: Băng 38,39,40,41.\r\nThiết bị này có thể không bao gồm bảo hành của Hoa Kỳ vì một số nhà sản xuất không tôn trọng bảo hành cho các mặt hàng quốc tế. Vui lòng liên hệ với người bán để biết thông tin bảo hành cụ thể.\r\nHộp chứa: Thiết bị mới của bạn, cáp USB, Bộ sạc, Tài liệu.', 10, 38, 14, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(111, 'Nokia 6.1 (2018) - Android One (Oreo) ', 10, 10900000, 11500000, 'Được làm từ một khối nhôm cứng 6000, với các cạnh cắt kim cương anodized hai tông màu đặc biệt\r\nAndroid One đảm bảo rằng bạn có Android thuần túy, an toàn và cập nhật\r\nNền tảng di động Qualcomm Snapdragon 630 thế hệ mới nhất với bộ nhớ RAM 3GB và 32GB. Hiệu suất: Octa-core, 2,2 GHz\r\nMàn hình full-hd 5,5 inch sáng, có độ tương phản cao trong màn hình Compact với tỷ lệ cơ thể cao hơn với kính Corning Gorilla\r\nSạc nhanh USB Type-C giúp bạn giảm 50% chỉ trong 30 phút. Wi-Fi 802.11 a / b / g / n\r\nCamera chính 16MP với quang học ZEISS và đèn flash hai tông màu cho hình ảnh tự nhiên và sống động', 10, 38, 14, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(112, 'Nokia 3.1- Android One (Oreo) - 16 GB', 10, 5500000, 4500000, 'Thiết kế cao cấp với các mặt nhôm cắt kim cương và màn hình điêu khắc\r\nYếu tố hình thức hàng đầu với màn hình hiển thị kính 1840 9 \"1440x720 HD + Gorilla\r\nAndroid One đảm bảo rằng bạn có Android thuần túy, an toàn và cập nhật\r\nNền tảng di động 1,25 GHz Octa-Core Mediatek 6750 với RAM 2GB và bộ nhớ 16 GB\r\nKỷ niệm hoàn hảo với camera 13MP', 10, 38, 14, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(113, 'Nokia 2 - Android - 8GB', 10, 4200000, 4000000, 'Độ bền theo thiết kế: khung gia công chính xác từ một khối nhôm cộng với kính Corning Gorilla cho một cái nhìn cao cấp và bền.\r\nCông nghệ đáng tin cậy: Bộ xử lý lõi tứ Qualcomm Snapdragon cho hiệu suất đáng tin cậy.\r\nGiải trí cả ngày: tận hưởng khi bạn đi, tuổi thọ pin dài cùng với một màn hình tuyệt vời cho trải nghiệm giải trí tuyệt vời.\r\nAndroid nougat: sạch, lộn xộn Android miễn phí khó khăn ra khỏi hộp mang các tính năng Android mới nhất.', 10, 38, 14, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(114, 'Nokia 7 Plus (TA-1062) 64GB Black Copper,', 10, 14800000, 16400000, 'Dual Nano-SIM (4G + 3G); 4G LTE có thể không hoạt động ở Hoa Kỳ; 3G hoạt động với các hãng vận tải GSM AT & T và AT & T; KHÔNG làm việc với Sprint, Verizon, US Cellular và tất cả các mạng di động CDMA khác; Khả năng tương thích LTE: Đây là chứng khoán quốc tế, khác nhau trên mỗi nhà cung cấp dịch vụ (đảm bảo kiểm tra với nhà cung cấp dịch vụ của bạn trước khi mua)\r\nCPU Qualcomm SDM660 Snapdragon 660 Octa-core (4x2.2 GHz Kryo 260 & 4x1.8 GHz Kryo 260); ROM 64 GB, RAM 4GB; Hỗ trợ microSD, tối đa 256 GB (sử dụng khe cắm SIM 2); Pin 3800 mAh.\r\nCamera chính: Dual: 12 MP (f / 1,75, 1,4 µm) + 13 MP (f / 2,6, 1,0 µm), lấy nét tự động lấy nét hai điểm ảnh, zoom quang 2x, thấu kính Carl Zeiss, đèn flash dual-tone dual-LED; Camera trước: 16 MP, thấu kính Carl Zeiss.\r\nMàn hình cảm ứng điện dung IPS LCD 6.0 inch, 16 triệu màu.\r\nNội dung gói: Nokia 7 Plus (TA-1062), Sạc / cáp dữ liệu, Bộ sạc USB-C Nokia, Hướng dẫn nhanh, Phím cửa SIM. XIN LƯU Ý: đây là phiên bản quốc tế của điện thoại không có bảo hành ở Hoa Kỳ.', 10, 38, 14, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(115, 'OPPO A71', 10, 6500000, 7500000, 'Các cạnh mượt mà và bộ vi xử lý mạnh mẽ làm cho Oppo A71 trở thành một chiếc điện thoại thông minh mang tính thẩm mỹ và đáng tin cậy. Pin dài hạn giúp điện thoại của bạn hoạt động cả ngày. Chronicling cuộc sống của bạn trong hình ảnh là thú vị với 13 MP phía sau của điện thoại và 5 MP camera phía trước. Oppo A71 được cấp nguồn để chạy các ứng dụng mới nhất, tải các trò chơi lớn nhất và đơn giản hóa cách bạn tương tác với các thiết bị thông minh.\r\nKiểu dáng đẹp Unibody\r\nCông nghệ mạ điện tử và công nghệ nano bạc làm tăng độ bóng của thiết bị di động và làm cho cơ thể bạn cảm thấy tinh tế khi chạm vào.\r\nCạnh mảnh mai của nó được lấy cảm hứng từ các đường lưng của cá heo, và mang lại cho chiếc điện thoại một cái nhìn mỏng manh. Đường viền kết nối tất cả các nút, lỗ và giao diện để cung cấp cho điện thoại một cái nhìn lành mạnh.\r\nMất bản thân để cảm giác hồi hộp khi chơi game hoặc xem video trên màn hình 13,20 cm (5.2).\r\nChuyển đổi giao diện người dùng liền mạch, đa nhiệm và chuyển đổi giữa các ứng dụng có thể được thực hiện bởi bộ xử lý Octa-core 64 bit MT6750, với bộ nhớ RAM 3 GB.\r\nPhát nhạc, xem video hoặc chụp bao nhiêu ảnh tùy thích, vì pin 3000 mAh mang lại cho bạn sức mạnh cả ngày, khi được sạc đầy.\r\nCông nghệ Denoising Multi-frame giảm tiếng ồn để bạn có thể nhấp vào hình ảnh rõ ràng ngay cả trong cài đặt ánh sáng yếu. Kích thước cảm biến 1 / 3.06 và kích thước pixel 1,4 um cho bạn hình ảnh sắc nét vào ban đêm. Bạn muốn chụp chuỗi hành động chuyển động nhanh? Công nghệ PDAF cho phép bạn tập trung nhanh hơn để bạn không bao giờ bỏ lỡ bất kỳ khoảnh khắc nào.\r\nMáy ảnh này, kết hợp với công nghệ làm đẹp độc đáo của Oppo, mang đến cho bạn những bức ảnh rất chi tiết. Vui chơi với ảnh tự chụp của bạn với nhiều bộ lọc, ảnh toàn cảnh chụp ảnh tự sướng và hiệu ứng bokeh.\r\nHệ điều hành màu 3.1 Dựa trên Android 7.1\r\nCho dù ứng dụng mới ra mắt hay tải các trò chơi lớn nhất, mọi thứ đều nhanh chóng và dễ dàng trên điện thoại này. Nó thậm chí còn đóng gói chế độ chia màn hình cho phép bạn xem video trên YouTube và trò chuyện trên WhatsApp cùng một lúc. Để giảm mỏi mắt khi sử dụng điện thoại trong môi trường tối, hãy bật tính năng chắn đêm.\r\nLưu trữ\r\nChiếc điện thoại này cung cấp một ROM 16 GB mở rộng cho các tập tin media của bạn, có thể mở rộng lên tới 256 GB.', 10, 41, 15, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(116, 'OPPO F1S (4GB, 64GB)', 10, 4560000, 5500000, 'Gặp gỡ chuyên gia chụp ảnh tự sướng - F1 Oppo. Được trang bị camera phía trước 16 MP tuyệt đẹp và camera phía sau 13 MP, điện thoại thông minh này là thiết bị phải có trong mọi tay của những người đam mê ảnh.\r\nCamera trước 16 MP\r\nLàm đẹp ảnh tự chụp của bạn\r\nẢnh tự chụp toàn cảnh\r\nCamera phía sau 13 MP\r\nMột vẻ đẹp để xem và giữ\r\nMở khóa vân tay\r\nTrình tìm kiếm ứng dụng One-Touch\r\nHiệu suất mạnh mẽ\r\nKhe cắm thẻ SIM kép và SD riêng lẻ', 10, 41, 15, 1, 2, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(117, 'OPPO A57', 10, 3590000, 4500000, 'Tình yêu chụp ảnh tự sướng? OPPO A57, với các máy ảnh ấn tượng và các tính năng sáng tạo, chắc chắn sẽ làm tăng niềm đam mê của bạn cho ảnh tự chụp hơn bao giờ hết.\r\nCamera chụp ảnh tự sướng\r\nẢnh tự chụp ổn định\r\nThông thường, việc bấm nút máy ảnh trở nên khó khăn khi chụp ảnh tự sướng và sẽ càng khó khăn hơn khi bạn đang dùng ‘nhóm nhảy’. Vì điện thoại thông minh này có chức năng chụp màn trập của OPPO để chụp ảnh tự sướng, bạn không phải đối mặt với sự bất tiện đó. Tất cả những gì bạn cần làm là cử chỉ ở phía trước màn hình bằng tay để chụp ảnh ổn định.\r\nCamera sau\r\nCamera sau 13 MP của OPPO A57 tận dụng công nghệ cảm biến hình ảnh CMOS tự động lấy nét và công nghệ lấy nét tự động (PDAF) của Sony, vì vậy bạn sẽ có được những bức ảnh hoàn hảo ngay khi bạn bật camera của điện thoại di động.\r\nĐầu đọc vân tay\r\nVới đầu đọc dấu vân tay rắn, OPPO A57 mở ra khi chạm nhẹ vào ngón tay của bạn. Đầu đọc dấu vân tay có bề mặt zirconium kỵ nước, vì vậy bạn có thể mở điện thoại ngay cả khi ngón tay của bạn bị ướt. Tính năng này không chỉ giúp mở khóa điện thoại của bạn chính xác và nhanh chóng mà còn đảm bảo rằng dữ liệu cá nhân của bạn vẫn an toàn và bảo mật.\r\nPin lâu dài\r\nPin 2900 mAh của điện thoại thông minh này truyền cảm hứng cho sự tự tin. Dù bạn làm gì, dù bạn đi đâu, thiết bị này sẽ không gọi nó là một ngày cho đến khi bạn làm. Pin dài hạn cung cấp tới 11 giờ phát lại video liên tục, tối đa 23 giờ đàm thoại và có thể kéo dài tới 13,5 giờ với mức sử dụng liên tục khác nhau.\r\nThiết kế tuyệt đẹp\r\nChiếc unibody kiểu dáng đẹp của điện thoại thông minh này có màn hình IPS 13,2 cm. Màn hình cảm ứng Gorilla Glass 4 được bảo vệ rất cứng và chống trầy xước.\r\nHiệu suất mạnh mẽ\r\nVới bộ vi xử lý octa-core Qualcomm, RAM 3 GB và GPU Adreno 505, OPPO A57 thể hiện chất lỏng và hiệu suất nhanh.\r\nLưu trữ\r\nBộ nhớ trong 32 GB của điện thoại thông minh này có thể chứa nhiều ảnh, video, bài hát và hơn thế nữa. Bộ nhớ trên bo mạch có thể được mở rộng thêm 256 GB bằng thẻ nhớ microSD vào điện thoại.\r\nColorOS 3.0\r\nHệ điều hành này dựa trên Android 6.0, giúp điện thoại đáp ứng liên tục. Nó cũng tối ưu hóa pin, làm cho nó kéo dài hơn.', 10, 41, 15, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(118, 'OPPO F3', 10, 5000000, 5900000, 'Nhân đôi niềm vui\r\nOppo F3 đi kèm với một camera selfie kép (16 MP + 8 MP). Một cho selfies tiêu chuẩn, và một cho selfies nhóm. Với camera selfie nhóm, bạn có thể chắc chắn để có được toàn bộ nhóm của bạn trong một khung hình duy nhất. Bây giờ, bạn không phải ép vào nhau trong khi chụp ảnh.\r\nCamera phía sau ấn tượng\r\nCamera phía sau 13 MP của Oppo F3 cho phép bạn chụp một số bức ảnh đẹp, nhờ vào nhiều tính năng mà nó cung cấp. Thậm chí còn có tùy chọn chụp ảnh ở chế độ Ultra HD.\r\n13 MP\r\nMáy ảnh\r\nChống\r\nLắc\r\nChuyên gia\r\nchế độ\r\nVẻ đẹp kim loại\r\nOppo F3 chắc chắn là một turner đầu, nhờ cơ thể kim loại của nó. Hai đường mỏng ở phía sau ánh sáng mặt trời trong ánh sáng mặt trời, đảm bảo rằng tất cả các mắt ở lại trên bạn.\r\nHiển thị tuyệt đẹp\r\nMàn hình lớn 13,97 cm, màn hình HD đầy đủ trên điện thoại hoàn hảo cho những người yêu thích phim và khung bezel siêu mỏng đảm bảo rằng thái độ của điện thoại không bị xâm phạm. Bạn cũng có được hình ảnh sáng hơn nhờ công nghệ hiển thị trong ô.\r\nCon thú trong vẻ đẹp\r\nVới Oppo F3, bạn có bộ vi xử lý 64-bit, octa-core mạnh mẽ có thể xử lý nhiều tác vụ mà bạn ném vào đó. Điều này sau đó được hỗ trợ thêm bởi số lượng RAM lớn (4 GB) để tạo ra một thiết bị thực sự sẵn sàng cho bất cứ điều gì.\r\nLõi Octa\r\nbộ vi xử lý\r\n4 GB\r\nRAM\r\nLuôn có không gian\r\nBạn hầu như không bao giờ tìm thấy chính mình trong nhu cầu về không gian với Oppo F3 Plus, nhờ vào dung lượng lưu trữ nội bộ 64 GB. Điều này, kết hợp với tùy chọn lưu trữ mở rộng (lên đến 128 GB), có nghĩa là sẽ luôn có không gian cho hình ảnh, trò chơi, ứng dụng, video và hơn thế nữa.\r\nMarathon Runner\r\nVới pin 3200 mAh lớn, bạn sẽ có thể tận dụng tối đa khả năng của Oppo F3 suốt cả ngày.\r\nHai SIM và bộ nhớ\r\nVới Oppo F3, bạn không phải đối phó với các khe cắm SIM lai. Điện thoại đi kèm với hai khe cắm SIM cũng như khe cắm thẻ nhớ microSD riêng biệt. Vì vậy, bạn có thể thưởng thức có hai SIM cũng như thẻ microSD', 10, 41, 16, 1, 1, 1, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(119, 'OPPO F3 Plus', 10, 8890000, 10500000, 'Thiết kế kim loại đẹp\r\nOPPO mang đến cho bạn F3 Plus trong đó có một unibody kim loại. Tuy nhiên, thay vì sử dụng đường dây ăng-ten dày, công ty sử dụng hai bộ ba dòng siêu tệp trên mỗi đầu của điện thoại. Họ đo 0,3 mm mỗi cái, làm tăng thêm vẻ tươi mới của điện thoại.\r\nPin lớn, sạc nhanh\r\nChiếc điện thoại này không chỉ đi kèm với một pin 4000 mAh lớn, mà còn với giải pháp sạc nhanh của riêng công ty. Điều này cung cấp hơn hai giờ đàm thoại chỉ với một khoản phí 5 phút. Hơn nữa, công nghệ sạc nhanh VOOC cũng đảm bảo rằng điện thoại vẫn mát mẻ trong khi sạc.\r\nHiệu suất đóng gói điện\r\nOPPO F3 Plus có bộ xử lý octa-core Qualcomm Snapdragon MSM8976 Pro 653 mạnh mẽ và GPU Adreno 510. Điều này, được ghép nối với số lượng RAM cao (6 GB), có nghĩa là bạn sẽ có thể chạy hầu hết các ứng dụng và trò chơi một cách mượt mà trên thiết bị.\r\n6 GB\r\nRAM\r\nSnapdragon\r\n653\r\nBảo mật cho Max\r\nOPPO F3 Plus có cảm biến vân tay trạng thái rắn đủ nhạy để đánh thức điện thoại chỉ bằng một lần chạm. Cảm biến này cũng đi kèm với một màng kỵ nước cung cấp một tỷ lệ thành công cao khi sử dụng các ngón tay ẩm ướt.\r\nSelfie Expert\r\nOPPO F3 Plus thể thao hai camera ở mặt trước. Máy ảnh 16 MP được sử dụng cho ảnh tự chụp tiêu chuẩn, trong khi camera 8 MP có ống kính góc rộng 120 độ và có nghĩa là chụp ảnh tự sướng nhóm. Điều này có nghĩa là bạn có thể đưa tất cả bạn bè của bạn vào khung một cách dễ dàng.\r\nHai\r\ncamera phía trước\r\n120 độ\r\ngóc rộng\r\nCamera phía sau ấn tượng\r\nMặc dù máy ảnh mặt trước kép của OPPO F3 Plus có thể là điểm nổi bật của điện thoại, camera phía sau 16 MP cũng không bị ảnh hưởng. Nó thể thao một ống kính khẩu độ lớn (f / 1.7) cho phép trong ánh sáng hơn, cho phép bạn chụp ảnh sáng hơn trong điều kiện ánh sáng yếu.\r\nTo và đẹp\r\nOPPO F3 Plus tồn tại tên của nó với màn hình FHD được bảo vệ bởi Corning Gorilla Glass 5.\r\nFull HD\r\ntrưng bày\r\nGorilla Glass\r\n5\r\n5,2 cm\r\nmàn\r\nNhiều không gian\r\nOPPO F3 Plus cung cấp nhiều bộ nhớ cho ứng dụng, trò chơi, ảnh, video cũng như các tệp khác của bạn. Tuy nhiên, nếu không đủ, bạn có thể mở rộng bộ nhớ trong 64 GB hơn nữa bằng thẻ nhớ microSD.', 10, 41, 15, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(120, 'Samsung Gusto 3, Royal Navy Blue (Verizon Wireless Prepaid)', 10, 900000, 850000, 'Tương thích với dịch vụ di động trả trước Verizon. KHÔNG tương thích với PagePlus. Không tương thích với dịch vụ Verizon trả sau cho đến khi điện thoại được kích hoạt trên tài khoản trả trước trong 6 tháng\r\nĐiện thoại flip kiểu dáng đẹp được đóng gói với các tính năng tiện lợi và dễ sử dụng. Tăng kích thước văn bản để dễ xem, sử dụng bàn phím lớn để quay số và xem thông tin trên màn hình 2 inch. Cộng với Samsung Gusto 3 vừa vặn trong túi của bạn.\r\nĐa nhiệm dễ dàng và bàn tay của bạn bằng cách sử dụng Bluetooth để kết nối với tai nghe không dây (bán riêng). Với Bluetooth, bạn có thể thực hiện và thực hiện cuộc gọi mà không cần liên lạc với điện thoại của mình.\r\nSamsung Gusto 3 không chỉ để gọi. Cập nhật tin tức, thời tiết và điểm số thể thao bằng Web di động. Ngoài ra, hãy truy cập email của bạn trên điện thoại cơ bản để bạn có thể đọc, viết và trả lời khi đang ở xa máy tính.\r\nMáy ảnh 1,3 megapixel luôn sẵn sàng ghi lại sự kiện đặc biệt đó.', 10, 36, 16, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(121, 'Samsung Galaxy J7 Prime (32GB) ', 10, 6750000, 8500000, 'Màn hình full HD 1080 x 1920 pixel (~ 401 ppi pixel) IPS LCD\r\nROM 32 GB, RAM 3 GB, microSD, tối đa 256 GB (khe cắm chuyên dụng), Android 6.0.1 Marshmallow, Máy quét vân tay, Tất cả thân máy bằng kim loại\r\nCamera chính 13 MP f / 1.9, 28mm, Camera trước 8MP, Exynos 7870 Octa-core 1.6 GHz Cortex-A53\r\n3G HSDPA 850/900/1700 (AWS) / 1900/2100, băng tần 4G LTE 1 (2100), 3 (1800), 5 (850), 7 (2600), 8 (900), 20 (800), 38 ( 2600), 40 (2300) - 3G / 4G H + chỉ ở Hoa Kỳ.\r\nĐiện thoại kiểu quốc tế, sẽ hoạt động với hầu hết các thẻ SIM GSM ở Hoa Kỳ và thế giới Bao gồm AT & T, T-Mobile, MetroPCS, Vv. Không có bảo hành của Hoa Kỳ. Sẽ KHÔNG làm việc với các hãng CDMA như Verizon, Sprint, Boost.', 10, 36, 16, 1, 1, 3, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(122, 'Samsung Galaxy J7', 20, 8500000, 9500000, 'Key Features\r\nDisplay: 5.50″\r\nProcessor: 1.6GHz octa-core\r\nFront Camera: 13-megapixel\r\nResolution: 1080×1920 pixels\r\nRAM: 3GB\r\nOperating System: Android 7.0\r\nStorage: 16GB\r\nRear Camera: 13-megapixel\r\nBattery Capacity: 3600mAh', 10, 36, 16, 1, 1, 5, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(124, 'Samsung Galaxy A3 (2017)/A320', 20, 5520000, 6200000, 'Công nghệ mạng GSM / HSPA / LTE\r\nLAUNCH công bố năm 2017, tháng 1\r\nTrạng thái có sẵn. Phát hành 2017, tháng 1\r\nKích thước BODY 135,4 x 66,2 x 7,9 mm (5,33 x 2,61 x 0,31 in)\r\nTrọng lượng 135 g (4,76 oz)\r\nSIM đơn (Nano-SIM) hoặc SIM kép (Nano-SIM, chế độ chờ kép)\r\n - Samsung Pay\r\n- Chứng nhận IP68 - chống bụi / nước trên 1,5 mét và 30 phút\r\nDISPLAY Loại màn hình cảm ứng điện dung Super AMOLED, 16 triệu màu\r\nKích thước 4,7 inch (~ 67,9% tỷ lệ màn hình so với thân máy)\r\nĐộ phân giải 720 x 1280 pixel (mật độ pixel ~ 312 ppi)\r\nMultitouch Có\r\nBảo vệ Corning Gorilla Glass 4\r\n - Màn hình luôn bật\r\nPLATFORM OS Hệ điều hành Android, v6.0.1 (Marshmallow)\r\nChipset Exynos 7870 Octa\r\nCPU Octa-core 1.6 GHz Cortex-A53\r\nGPU Mali-T830\r\nKhe cắm thẻ nhớ microSD, tối đa 256 GB (khe cắm chuyên dụng) - SIM đơn\r\nmicroSD, tối đa 256 GB (sử dụng khe cắm SIM 2) - SIM kép\r\nBộ nhớ trong 16 GB, 2 GB\r\nMáy ảnh chính 13 MP, f / 1.9, tự động lấy nét, đèn flash LED, kiểm tra chất lượng\r\nTính năng gắn thẻ địa lý, lấy nét cảm ứng, nhận diện khuôn mặt, ảnh toàn cảnh\r\nVideo 1080p @ 30fps, kiểm tra chất lượng\r\nTrung học 8 MP, f / 1.9\r\nSOUND Các loại cảnh báo Rung; Nhạc chuông MP3, WAV\r\nLoa Có\r\nGiắc cắm 3,5 mm\r\n - Hủy tiếng ồn chủ động với micrô chuyên dụng\r\nCOMMS WLAN Wi-Fi 802.11 a / b / g / n / ac, băng tần kép, WiFi Direct, điểm phát sóng\r\nBluetooth v4.2, A2DP, LE\r\nGPS Có, với A-GPS, GLONASS / BDS (phụ thuộc vào thị trường)\r\nNFC Có\r\nĐài FM radio\r\nĐầu nối đảo ngược USB Type-C 1.0\r\nĐẶC ĐIỂM Cảm biến vân tay (mặt trước), gia tốc kế, con quay hồi chuyển, khoảng cách, la bàn, phong vũ biểu\r\nNhắn tin SMS (chế độ xem luồng), MMS, Email, Push Mail, IM\r\nHTML5 trình duyệt\r\nJava No\r\n - Hỗ trợ ANT +\r\n- Trình phát MP4 / WMV / H.265\r\n- Trình phát MP3 / WAV / WMA / eAAC + / FLAC\r\n- Trình chỉnh sửa ảnh / video\r\n- Trình xem tài liệu\r\nPIN Pin Li-Ion 2350 mAh không thể tháo rời\r\nMàu sắc MISC Black Sky, Cát vàng, Blue Mist, Peach Cloud\r\nSAR EU 0,35 W / kg (đầu) 1,38 W / kg (cơ thể)\r\nKIỂM TRA THỬ NGHIỆM XÁC NHẬN QUẢNG CÁO OS II 2.0: 999 / Dấu X: 5160\r\nHiển thị tỷ lệ tương phản: Vô hạn (danh nghĩa), 3.688 (ánh sáng mặt trời)\r\nMáy ảnh ảnh / Video\r\nLoa giọng nói 66dB / tiếng ồn 66dB / Ring 75dB\r\nChất lượng âm thanh tiếng ồn -94.7dB / Crosstalk -92.3dB\r\nTuổi thọ pin Độ bền độ bền 93h', 10, 36, 16, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(125, 'Sony-Xperia-XA1-G3123-32GB', 10, 5000000, 6500000, 'HSDPA 850/900/1700 (AWS) / 1900/2100 - Băng tần LTE 2 (1900), 4 (1700/2100), 5 (850), 7 (2600), 12 (700), 13 (700), 17 ( 700), 28 (700), 29 (700), 66 (1700/2100) ... XIN KIỂM TRA TƯƠNG THÍCH VỚI NGƯỜI ĐÀO TẠO CỦA BẠN CHO CÁC TẦN SỐ NÀY.\r\nSIM đơn (Nano-SIM) - Công nghệ tăng cường hình ảnh HD 720p, 5 \"- USB Type-C ™\r\nOcta-core - 32 GB, RAM 3 GB - microSD, tối đa 256 GB - 23 MP, f / 2.0, 24mm, phát hiện pha và lấy nét tự động bằng laser, đèn flash LED - Video: 1080p @ 30fps, HDR\r\nHiệu suất mạnh mẽ với bộ xử lý hiệu quả năng lượng, bạn sẽ có trải nghiệm người dùng nhanh hơn và mượt mà hơn, cho dù bạn duyệt web, xem video hay chơi trò chơi yêu thích của mình. Mọi thứ trong 4G siêu nhanh.\r\nNhà máy Điện thoại di động mở khóa tương thích với các mạng di động GSM như AT & T và T-Mobile, nhưng không tương thích với các nhà cung cấp dịch vụ CDMA như Verizon và Sprint. - Phiên bản quốc tế.', 10, 37, 16, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(126, 'Điện thoại Sony Xperia M4 Aqua Dual', 10, 5900000, 6200000, 'Sony Xperia M4 Aqua Dual tự hào là chiếc máy đầu tiên của Sony chống nước mà không cần nắp che cổng USB, song với đó là thiết kế Sony Omni Balance truyền thống đi kèm nhiều công nghệ, tính năng nổi bật không kém.\r\nLưu giữ từng khoảng khắc với camera chất lượng tốt\r\n\r\nSở hữu cặp đôi camera trước và sau chất lượng cao mang lại cho người dùng những bức ảnh trong trẻo, rực rỡ mọi lúc mọi nơi ngay cả trong điều kiện thiếu sáng.', 10, 37, 16, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00'),
(127, 'Xiaomi Redmi Note 5 64GB ', 10, 4900000, 6500000, '3G HSDPA: 850/900/1900/2100 - 4G LTE: B1 / 3/7/8/20/38/40 - Hybrid Dual SIM (Nano-SIM, chế độ chờ kép)\r\n5,99 inch, 2160 x 1080 FHD +, 403 PPI - Kính Gorilla thủy tinh\r\nRAM 64 GB + 4GB - microSD, tối đa 256 GB (sử dụng khe cắm SIM 2) - Snapdragon 636, octa-core - Vân tay (gắn phía sau) - Pin Li-Po 4000 mAh không thể tháo rời\r\nCamera lùi kép: 12 MP (f / 2.2, 1.25µm) + 5 MP (f / 2.0, 1.12µm) - Camera trước 13 MP, Selfie-Light\r\nNhà máy Điện thoại di động mở khóa tương thích với hầu hết các mạng di động GSM như AT & T và T-Mobile, nhưng không tương thích với các nhà cung cấp dịch vụ CDMA như Verizon và Sprint.', 10, 39, 16, 1, 1, 2, 'ON', '2018-09-02 17:00:00', '2018-09-02 17:00:00');

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
  MODIFY `ctdh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `dh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhangdoi_tra`
--
ALTER TABLE `donhangdoi_tra`
  MODIFY `dhdt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `donvitinh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

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
  MODIFY `size_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

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
  MODIFY `mau_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

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
  MODIFY `nsx_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  MODIFY `pgg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phieugiaohang`
--
ALTER TABLE `phieugiaohang`
  MODIFY `pgh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phuongxa`
--
ALTER TABLE `phuongxa`
  MODIFY `px_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `qh_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `sanphamyeuthich`
--
ALTER TABLE `sanphamyeuthich`
  MODIFY `spyt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `tp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tinhtrangdonhang`
--
ALTER TABLE `tinhtrangdonhang`
  MODIFY `tinh_trang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
