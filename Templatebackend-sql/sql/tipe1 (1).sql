-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 30, 2019 lúc 03:26 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tipe1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadons`
--

DROP TABLE IF EXISTS `chitiethoadons`;
CREATE TABLE IF NOT EXISTS `chitiethoadons` (
  `idhoadon` int(10) NOT NULL,
  `idsanpham` int(10) NOT NULL,
  `soluong` int(100) NOT NULL,
  `gia` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idhoadon`,`idsanpham`) USING BTREE,
  KEY `cthd_sanpham_id_fk_1` (`idsanpham`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadons`
--

INSERT INTO `chitiethoadons` (`idhoadon`, `idsanpham`, `soluong`, `gia`, `created_at`, `updated_at`) VALUES
(69, 10, 1, 5000000, '2019-05-29 00:45:38', '2019-05-29 00:45:38'),
(69, 42, 1, 25000000, '2019-05-29 00:45:38', '2019-05-29 00:45:38'),
(69, 65, 2, 6000000, '2019-05-29 00:45:38', '2019-05-29 00:45:38'),
(69, 102, 1, 590000, '2019-05-29 00:45:38', '2019-05-29 00:45:38'),
(70, 42, 1, 25000000, '2019-05-29 00:46:02', '2019-05-29 00:46:02'),
(70, 65, 2, 6000000, '2019-05-29 00:46:02', '2019-05-29 00:46:02'),
(70, 102, 1, 590000, '2019-05-29 00:46:02', '2019-05-29 00:46:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

DROP TABLE IF EXISTS `hang`;
CREATE TABLE IF NOT EXISTS `hang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idloai` int(10) NOT NULL,
  `ma` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma` (`ma`),
  KEY `hang_loai_fkid_1` (`idloai`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`id`, `idloai`, `ma`, `ten`) VALUES
(1, 1, 'ip', 'IPHONE'),
(2, 1, 'ss', 'SAMSUNG'),
(3, 1, 'op', 'OPPO'),
(4, 1, 'hw', 'HUAWEI'),
(5, 1, 'xm', 'XIAOMI'),
(6, 1, 'nk', 'NOKIA'),
(7, 1, 'vv', 'VIVO'),
(8, 1, 'rm', 'REALME'),
(9, 1, 'vm', 'VSMART'),
(10, 1, 'as', 'ASUS'),
(12, 2, 'dl', 'DELL'),
(13, 2, 'hp', 'HP'),
(15, 2, 'mb', 'MACBOOK'),
(16, 2, 'ac', 'ACER'),
(17, 2, 'ln', 'LENOVO'),
(18, 2, 'msi', 'MSI'),
(19, 3, 'son', 'Son'),
(20, 3, 'nh', 'Nước hoa'),
(21, 3, 'kd', 'Kem dưỡng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE IF NOT EXISTS `hinhanh` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idsanpham` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hinhanh_sanpham_id_fk_1` (`idsanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `img`, `idsanpham`) VALUES
(4, 'images.jpg', 2),
(5, 'images (2).jpg', 2),
(6, 'images (1).jpg', 2),
(7, 'iphone-7-plus-256gb1-1.jpg', 3),
(8, 'iphone-7-plus-256gb4-1.jpg', 3),
(9, 'iphone-7-plus-256gb6-1.jpg', 3),
(10, 'iphone-8-plus-256gb2-1.jpg', 4),
(11, 'iphone-8-plus-256gb-h1-1.jpg', 4),
(12, 'iphone-8-plus-256gb-vang-7-1.jpg', 4),
(13, 'ava_800x450.jpg', 5),
(14, 'apple-iphone-2017-20170912-11670_800x450.jpg', 5),
(15, 'apple-iphone-2017-20170912-11620_800x450.jpg', 5),
(16, 'iphone-xr-256gb-a12.jpg', 6),
(17, 'iphone-xr-256gb-7.jpg', 6),
(18, 'iphone-xr-256gb-6.jpg', 6),
(19, 'iphone-xs-256gb-8.jpg', 7),
(20, 'iphone-xs-256gb-7.jpg', 7),
(21, 'iphone-xs-256gb-5.jpg', 7),
(22, 'iphone-xs-max-512gb-gold-10.jpg', 8),
(23, 'iphone-xs-max-512gb-gold-7.jpg', 8),
(24, 'iphone-xs-max-512gb-gold-2.jpg', 8),
(25, 'asus-zenfone-max-pro-m1-gold-1.jpg', 9),
(26, 'asus-zenfone-max-pro-m1-gold-5.jpg', 9),
(27, 'asus-zenfone-max-pro-m1-gold-8.jpg', 9),
(28, 'huawei-nova-3i2.jpg', 10),
(29, 'huawei-nova-3i8.jpg', 10),
(30, 'huawei-nova-3i10.jpg', 10),
(31, 'huawei-y9-2019-11.jpg', 11),
(32, 'huawei-y9-2019-7.jpg', 11),
(33, 'huawei-y9-2019-1-1.jpg', 11),
(34, 'huawei-y7-pro-2019-10.jpg', 12),
(35, 'huawei-y7-pro-2019-9.jpg', 12),
(36, 'huawei-y7-pro-2019-1-1.jpg', 12),
(37, 'huawei-y6-prime5.jpg', 13),
(38, 'huawei-y6-prime3.jpg', 13),
(39, 'huawei-y6-prime2.jpg', 13),
(40, 'huawei-p30-pro9.jpg', 14),
(41, 'huawei-p30-pro5.jpg', 14),
(42, 'huawei-p30-pro2.jpg', 14),
(43, 'huawei-p30-pro1.jpg', 14),
(46, 'nokia-21-3.jpg', 24),
(47, 'nokia-21-4.jpg', 24),
(48, 'nokia-212.jpg', 24),
(49, 'nokia-31-plus3.jpg', 25),
(50, 'nokia-31-plus5.jpg', 25),
(51, 'nokia-31-plus6.jpg', 25),
(52, 'nokia-61-plus-2-1.jpg', 26),
(53, 'nokia-61-plus-4.jpg', 26),
(54, 'nokia-61-plus-10.jpg', 26),
(55, 'nokia-8-pro-man-hinh.jpg', 27),
(56, 'nokia-8-pro-khung-vien.jpg', 27),
(57, 'nokia-210-3.jpg', 28),
(58, 'nokia-210-4.jpg', 28),
(59, 'nokia-210-005.jpg', 28),
(60, 'nokia-230-3-1.jpg', 29),
(61, 'nokia-230-7.jpg', 29),
(62, 'nokia-230-9.jpg', 29),
(63, 'nokia-8110-4g-2.jpg', 30),
(64, 'nokia-8110-4g-5.jpg', 30),
(65, 'nokia-8110-4g-6.jpg', 30),
(66, 'oppo-r17-pro-3-3.jpg', 31),
(67, 'oppo-r17-pro-4-3.jpg', 31),
(68, 'oppo-r17-pro-8-1.jpg', 31),
(69, 'oppo-find-x-7-1.jpg', 32),
(70, 'oppo-find-x-9-1.jpg', 32),
(71, 'oppo-find-x-13-3.jpg', 32),
(72, 'oppo-f11-pro3.jpg', 33),
(73, 'oppo-f11-pro4.jpg', 33),
(74, 'oppo-f11-pro6.jpg', 33),
(75, 'dtdd-oppo-f9-3.jpg', 34),
(76, 'oppo-f9-red-1.jpg', 34),
(77, 'oppo-f9-red-7.jpg', 34),
(78, 'oppo-a7-2.jpg', 35),
(79, 'oppo-a7-5.jpg', 35),
(80, 'oppo-a7-8.jpg', 35),
(81, 'oppo-f71.jpg', 36),
(82, 'oppo-f73.jpg', 36),
(83, 'oppo-f74.jpg', 36),
(84, 'oppo-a3s-32gb-do-7-org-1.jpg', 37),
(85, 'oppo-a3s-32gb-do-8-org-1.jpg', 37),
(86, 'oppo-a3s-do-4-org-1.jpg', 37),
(87, 'realme-3-64gb-tgdd-6.jpg', 38),
(88, 'realme-3-64gb-tgdd-7.jpg', 38),
(89, 'realme-3-64gb-tgdd-9.jpg', 38),
(90, 'realme-c1-2-1.jpg', 39),
(91, 'realme-c1-7.jpg', 39),
(92, 'realme-c1-8.jpg', 39),
(93, 'realme-2-pro-blue-1.jpg', 40),
(94, 'realme-2-pro-blue-8.jpg', 40),
(95, 'realme-2-pro-blue-9.jpg', 40),
(96, 'realme-2-8-1.jpg', 41),
(97, 'realme-2-10-1.jpg', 41),
(98, 'realme-2-12-1.jpg', 41),
(99, 'samsung-galaxy-s10-plus-512gb-white-1.jpg', 42),
(100, 'samsung-galaxy-s10-plus-512gb-white-2.jpg', 42),
(101, 'samsung-galaxy-s10-plus-512gb-white-11.jpg', 42),
(102, 'samsung-galaxy-s9-plus-64gb-vang-do.jpg', 43),
(103, 'samsung-galaxy-s9-plus-64gb-vang-do-3.jpg', 43),
(104, 'samsung-galaxy-s9-plus-64gb-vang-do-9.jpg', 43),
(105, 'z764740566215_8c972c312d8bddcc08180c8590a87824-_2560x1920-800-resize.jpg', 44),
(106, 'z764741534567_c7686e1d5bdbcd1a1a365182240bd1fd-_2560x1920-800-resize.jpg', 44),
(107, 'z764741713755_8ea6cef957ab32285c205ed57a066367-_2560x1920-800-resize.jpg', 44),
(108, 'galaxy-note-9-6.jpg', 45),
(109, 'samsung-galaxy-note-9-12-1.jpg', 45),
(110, 'samsung-galaxy-note-9-13.jpg', 45),
(111, 'samsung-galaxy-a9-2018-4-1.jpg', 46),
(112, 'samsung-galaxy-a9-2018-7-1.jpg', 46),
(113, 'samsung-galaxy-a9-2018-9-1.jpg', 46),
(114, 'samsung-galaxy-a8-star-review-15.jpg', 47),
(115, 'samsung-galaxy-a8-star-review-15.jpg', 47),
(116, 'samsung-galaxy-a8-star-review-19.jpg', 47),
(117, 'samsung-galaxy-a70-1.jpg', 48),
(118, 'samsung-galaxy-a70-2.jpg', 48),
(119, 'samsung-galaxy-a70-3.jpg', 48),
(120, 'samsung-galaxy-a50-128gb-black-8.jpg', 49),
(121, 'samsung-galaxy-a50-128gb-black-10.jpg', 49),
(122, 'samsung-galaxy-a50-128gb-black-11.jpg', 49),
(123, 'vivo-v15-005.jpg', 50),
(124, 'vivo-v15-006.jpg', 50),
(125, 'vivo-v15-008.jpg', 50),
(126, 'dtdd-vivo-v11i-4.jpg', 51),
(127, 'vivo-v11i-6-1.jpg', 51),
(128, 'vivo-v11i-7-1.jpg', 51),
(129, 'vivo-y85-2-3.jpg', 52),
(130, 'vivo-y85-4-3.jpg', 52),
(131, 'vivo-y85-7-1.jpg', 52),
(132, 'vivo-y91c001-1.jpg', 53),
(133, 'vivo-y91c-19.jpg', 53),
(134, 'vivo-y91c-29.jpg', 53),
(135, 'vivo-y91-1-1.jpg', 54),
(136, 'vivo-y91-2-1.jpg', 54),
(137, 'vivo-y91-8-1.jpg', 54),
(138, 'vivo-y713.jpg', 55),
(139, 'vivo-y715.jpg', 55),
(140, 'vivo-y716.jpg', 55),
(141, 'vsmart-active-1-plus-1-1.jpg', 56),
(142, 'vsmart-active-1-plus-3.jpg', 56),
(143, 'vsmart-joy-1-4-2.jpg', 57),
(144, 'vsmart-joy-1-5-2.jpg', 57),
(145, 'vsmart-joy-1-8-2.jpg', 57),
(146, 'vsmart-joy-1-plus-3-2.jpg', 58),
(147, 'vsmart-joy-1-plus-6-1.jpg', 58),
(148, 'vsmart-joy-1-plus-9-1.jpg', 58),
(149, 'xiaomi-redmi-go-black-1.jpg', 59),
(150, 'xiaomi-redmi-go-black-2.jpg', 59),
(151, 'xiaomi-redmi-go-black-3.jpg', 59),
(152, 'xiaomi-redmi-7-tgdd-3.jpg', 60),
(153, 'xiaomi-redmi-7-tgdd-4.jpg', 60),
(154, 'xiaomi-redmi-7-tgdd-9.jpg', 60),
(155, 'xiaomi-redmi-note-7-tgdd-1.jpg', 61),
(156, 'xiaomi-redmi-note-7-tgdd-2.jpg', 61),
(157, 'xiaomi-redmi-note-7-tgdd-4.jpg', 61),
(158, 'xiaomi-redmi-note-6-pro-2-1.jpg', 62),
(159, 'xiaomi-redmi-note-6-pro-6-2.jpg', 62),
(160, 'xiaomi-redmi-note-6-pro-7-1.jpg', 62),
(161, 'xiaomi-mi-8-4.jpg', 63),
(162, 'xiaomi-mi-8-10.jpg', 63),
(163, 'xiaomi-mi-8-12.jpg', 63),
(164, 'xiaomi-mi-a2-lite4.jpg', 64),
(165, 'xiaomi-mi-a2-lite7.jpg', 64),
(166, 'xiaomi-mi-a2-lite9.jpg', 64),
(207, 'acer-aspire-a314-31-c2ux-nxgnssv008-cauhinh-tgdd.jpg', 65),
(208, 'acer-aspire-a314-31-c2ux-nxgnssv008-congketnoi-tgdd.jpg', 65),
(209, 'acer-aspire-a314-31-c2ux-nxgnssv008-manhinh-tgdd-1.jpg', 65),
(210, 'acer-aspire-a515-53-3153-i3-8145u-4gb-1gb-win10-n-33397-conent-manhinh.jpg', 66),
(211, 'acer-aspire-a515-53-3153-i3-8145u-4gb-1gb-win10-n-33397-conent-thietketgdd.jpg', 66),
(212, 'acer-aspire-a515-53-3153-i3-8145u-4gb-1gb-win10-n-33397-thumb-600x600.jpg', 66),
(213, 'acer-aspire-e5-576g-88ep-nxgwnsv001-tgdd-bp.jpg', 67),
(214, 'acer-aspire-e5-576g-88ep-nxgwnsv001-tgdd-ch-1.jpg', 67),
(215, 'acer-aspire-e5-576g-88ep-nxgwnsv001-tgdd-mh.jpg', 67),
(216, 'acer-swift-sf314-54-51ql-nxgxzsv001-3-4.jpg', 68),
(217, 'acer-swift-sf314-54-51ql-nxgxzsv001-4-4.jpg', 68),
(218, 'acer-swift-sf314-54-51ql-nxgxzsv001-dai-dien-450x300-1-450x300-450x300-600x600.jpg', 68),
(219, 'acer-spin-3-sp314-51-39wk-i3-7130u-nxguwsv001-bv-tgdd-6-1.jpg', 69),
(220, 'acer-spin-3-sp314-51-39wk-i3-7130u-nxguwsv001-bv-tgdd-7.jpg', 69),
(221, 'acer-spin-3-sp314-51-39wk-i3-7130u-nxguwsv001-cava-600x600.jpg', 69),
(222, 'acer-swift-sf114-32-p2sg-n5000-4gb-64gb-win10-nxg-3-1.jpg', 70),
(223, 'acer-swift-sf114-32-p2sg-n5000-4gb-64gb-win10-nxg-6-1.jpg', 70),
(224, 'acer-swift-sf114-32-p2sg-n5000-4gb-64gb-win10-nxg-6-1.jpg', 70),
(225, 'dell-inspiron-3567-p63f002n67t-tgdd-ch.jpg', 71),
(226, 'dell-inspiron-3567-p63f002n67t-tgdd-mh.jpg', 71),
(227, 'dell-inspiron-3567-p63f002n67t-tgdd-tk.jpg', 71),
(228, 'dell-vostro-3468-i3-7020u-70161069-tgdd-ch.jpg', 72),
(229, 'dell-vostro-3468-i3-7020u-70161069-tgdd-ckn.jpg', 72),
(230, 'dell-vostro-3468-i3-7020u-70161069-tgdd-mh.jpg', 72),
(231, 'dell-vostro-3568-vti32072w-tgdd-at.jpg', 73),
(232, 'dell-vostro-3568-vti32072w-tgdd-ch.jpg', 73),
(233, 'dell-vostro-3568-vti32072w-tgdd-ckn.jpg', 73),
(234, 'dell-inspiron-5570-m5i5238w-office365-33397-cauhinh.jpg', 74),
(235, 'dell-inspiron-5570-m5i5238w-office365-33397-congketnoi.jpg', 74),
(236, 'dell-inspiron-5570-m5i5238w-office365-dai-dien-450x300-600x600.jpg', 74),
(237, 'dell-inspiron-7373-i5-8250u-8gb-256gb-win10-office-10.jpg', 75),
(238, 'dell-inspiron-7373-i5-8250u-c3ti501ow-1.jpg', 75),
(239, 'dell-inspiron-7373-i5-8250u-c3ti501ow-5-1.jpg', 75),
(240, 'hp-15-da0054tu-4me68pa-33397-thietke.jpg', 76),
(241, 'hp-15-da0054tu-4me68pa-33397-touchpad.jpg', 76),
(242, 'hp-15-da0054tu-4me68pa-thumbnail-600x600.jpg', 76),
(243, 'hp-15-da0055tu-4na89pa-33397-banphim.jpg', 77),
(244, 'hp-15-da0055tu-4na89pa-33397-cauhinh.jpg', 77),
(245, 'hp-15-da0055tu-4na89pa-33397-congketnoi.jpg', 77),
(246, 'hp-15-da0048tu-4me63pa-2-4.jpg', 78),
(247, 'hp-15-da0048tu-4me63pa-5-4.jpg', 78),
(248, 'hp-15-da0048tu-4me63pa-33397-ava1-600x600.jpg', 78),
(249, 'hp-pavilion-14-ce1011tu-i3-8145u-4gb-1tb-win10-5j-33397-content-amthanh.jpg', 79),
(250, 'hp-pavilion-14-ce1011tu-i3-8145u-4gb-1tb-win10-5j-33397-content-cauhinhtgdd.jpg', 79),
(251, 'hp-pavilion-14-ce1011tu-i3-8145u-4gb-1tb-win10-5j-33397-content-manhinhtgdd.jpg', 79),
(252, 'hp-pavilion-x360-cd1018tu-i3-8145u-4gb-1tb-14-touc-6.jpg', 80),
(253, 'hp-pavilion-x360-cd1018tu-i3-8145u-4gb-1tb-14-touc-6-2.jpg', 80),
(254, 'hp-pavilion-x360-cd1018tu-i3-8145u-4gb-1tb-14-touc-8-22.jpg', 80),
(255, 'hp-15-da0443tx-i3-7020u-4gb-1tb-mx110-win10-5sl06-33397-manhinhtgdd.jpg', 81),
(256, 'hp-15-da0443tx-i3-7020u-4gb-1tb-mx110-win10-5sl06-33397-content-conketnoi.jpg', 81),
(257, 'hp-15-da0443tx-i3-7020u-4gb-1tb-mx110-win10-5sl06-33397-cauhinhtgdd.jpg', 81),
(258, 'hp-15-da1023tu-i5-8265u-4gb-1tb-win10-5nk81pa-content-cauhinhtgdd.jpg', 82),
(259, 'hp-15-da1023tu-i5-8265u-4gb-1tb-win10-5nk81pa-content-congketnoi.jpg', 82),
(260, 'hp-15-da1023tu-i5-8265u-4gb-1tb-win10-5nk81pa-content-thietketgdd.jpg', 82),
(261, 'lenovo-ideapad-130-14ikb-i3-7020u-4gb-1tb-81h6001-2-2.jpg', 83),
(262, 'lenovo-ideapad-130-14ikb-i3-7020u-4gb-1tb-81h6001-3-2.jpg', 83),
(263, 'lenovo-ideapad-130-14ikb-i3-7020u-4gb-1tb-81h6001-5-1.jpg', 83),
(264, 'lenovo-ideapad-330-15ikbr-7020u-81de00ldvn-amthanh.jpg', 84),
(265, 'lenovo-ideapad-330-15ikbr-i3-7020u-4gb-1tb-156-win-congketnoi.jpg', 84),
(266, 'lenovo-ideapad-330-15ikbr-i3-7020u-4gb-1tb-156-win-hinhchitiet-600x600.jpg', 84),
(267, 'lenovo-ideapad-330-15ikbr-81de01kwvn-tgdd-bp.jpg', 85),
(268, 'lenovo-ideapad-330-15ikbr-81de01kwvn-tgdd-ch.jpg', 85),
(269, 'lenovo-ideapad-330-15ikbr-81de01kwvn-tgdd-tk.jpg', 85),
(270, 'lenovo-ideapad-330s-14ikbr-i5-8250u-4gb-1tb-win10-33397-content-thietketgdd.jpg', 86),
(271, 'lenovo-ideapad-330s-14ikbr-i5-8250u-4gb-1tb-win10-33397-content-manhinhtgdd.jpg', 86),
(272, 'lenovo-ideapad-330s-14ikbr-i5-8250u-4gb-1tb-win10-33397-content-congketnoi.jpg', 86),
(273, 'lenovo-ideapad-530s-14ikb-i7-8550u-8gb-256gb-win10-content-33397-amthanh.jpg', 87),
(274, 'lenovo-ideapad-530s-14ikb-i7-8550u-8gb-256gb-win10-content-33397-cauhinhdmx.jpg', 87),
(275, 'lenovo-ideapad-530s-14ikb-i7-8550u-8gb-256gb-win10-content-33397-manhinhtgdd.jpg', 87),
(276, 'lenovo-ideapad-yoga-530-14ikb-7130u-33397-cauhinhtgdd.jpg', 88),
(277, 'lenovo-ideapad-yoga-530-14ikb-7130u-33397-conketnoi.jpg', 88),
(278, 'lenovo-ideapad-yoga-530-14ikb-7130u-33397-manhinhtgdd.jpg', 88),
(279, 'apple-macbook-air-mqd32sa-a-i5-5350u-kn.jpg', 89),
(280, 'apple-macbook-air-mqd32sa-a-i5-5350u-tk.jpg', 89),
(281, 'apple-macbook-air-mree2sa-a-i5-8gb-128gb-133-gold-content-cauhinhtgdd.jpg', 90),
(282, 'apple-macbook-air-mree2sa-a-i5-8gb-128gb-133-gold-content-manhinhtgdd.jpg', 90),
(283, 'apple-macbook-air-mree2sa-a-i5-8gb-128gb-133-gold-content-vantaytgdd.jpg', 90),
(284, 'apple-macbook-pro-touch-mr9q2sa-a-2018-display.jpg', 91),
(285, 'apple-macbook-pro-touch-mr9q2sa-a-2018-9.jpg', 91),
(286, 'apple-macbook-pro-touch-mr9q2sa-a-2018-display.jpg', 91),
(287, 'msi-prestige-ps42-i5-8250u-4gb-256gb-14-win10-33397-cauhinhtgdd.jpg', 92),
(288, 'msi-prestige-ps42-i5-8250u-4gb-256gb-14-win10-33397-gap180-1.jpg', 92),
(289, 'msi-prestige-ps42-i5-8250u-4gb-256gb-14-win10-33397-manhinhtgdd.jpg', 92),
(290, 'msi-gf63-8rd-221vn-33397-cauhinh.jpg', 93),
(291, 'msi-gf63-8rd-i7-8750h-tgdd-mh.jpg', 93),
(292, 'msi-gf63-8rd-i7-8750h-tgdd-tk.jpg', 93),
(293, 'OqdgYN_simg_d0daf0_800x1200_max.jpg', 96),
(294, '3zglfE_simg_de2fe0_500x500_maxb.jpg', 97),
(295, '4YpEUX_simg_d0daf0_800x1200_max.jpg', 97),
(296, 'AKLtqW_simg_d0daf0_800x1200_max.jpg', 98),
(297, 'gK06JQ_simg_d0daf0_800x1200_max.jpg', 98),
(298, 'UOeSK5_simg_d0daf0_800x1200_max.png', 98),
(299, 'sxyWJa_simg_d0daf0_800x1200_max.jpg', 99),
(300, '0CvSsD_simg_d0daf0_800x1200_max.jpg', 99),
(301, '4OXmrP_simg_d0daf0_800x1200_max.jpg', 100),
(302, 'RNlUEC_simg_d0daf0_800x1200_max.jpg', 100),
(303, 'S5ZHRd_simg_d0daf0_800x1200_max.jpg', 101),
(304, '1ss4.jpg', 102),
(305, '1q5.jpg', 103),
(306, '1q6.jpg', 103),
(307, '15.jpg', 103),
(308, 'by3.jpg', 104),
(309, 'charme.jpg', 104),
(310, 'charme3.jpg', 104),
(311, 'beautiful3.jpg', 105),
(312, '35d90e49677d8523dc6c(2).jpg', 106),
(313, '5.jpg', 107),
(314, 'queen4.jpg', 107),
(315, 'queen5.jpg', 107),
(316, 'son-mac-lucky-in-love_1024x1024.png', 108),
(317, 'mau_mac_proud_to_be_canadian_a94bbb9a9ac54eb684174ce8551f4c31_1024x1024.jpg', 109),
(318, 'mac-see-sheer-limited_1024x1024.jpg', 110),
(319, 'bang-mau-mac-powder-kiss-lipstick-vo-nham_1024x1024.jpg', 111),
(320, 'mac-powder-kiss-lipstick-vo-nham_1024x1024.jpg', 111),
(321, 'mac-powder-kiss-lipstick-vo-nham_1024x1024.jpg', 112),
(322, 'bang-mau-mac-powder-kiss-lipstick-vo-nham_1024x1024.jpg', 112),
(323, 'bang-mau-mac-powder-kiss-lipstick-vo-nham_1024x1024.jpg', 113),
(324, 'mac-powder-kiss-lipstick-vo-nham_1024x1024.jpg', 113),
(325, 'mau-son-mac-308-mandrin-o_1024x1024.jpg', 113);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ma` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idnguoidung` int(10) NOT NULL,
  `trangthai` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma` (`ma`),
  KEY `hoadon_nguoidung_id_fk_1` (`idnguoidung`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `ma`, `idnguoidung`, `trangthai`, `created_at`, `updated_at`) VALUES
(69, '1403257326', 3, '0', '2019-05-29 00:45:38', '2019-05-29 00:45:38'),
(70, '432039386', 3, '0', '2019-05-29 00:46:02', '2019-05-29 00:46:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ma` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ma` (`ma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id`, `ma`, `ten`) VALUES
(1, 'dt', 'Điện Thoại'),
(2, 'lt', 'Laptop'),
(3, 'mp', 'Mỹ Phẩm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` char(11) NOT NULL,
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenshop` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` char(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `username`, `password`, `ten`, `sdt`, `email`, `tenshop`, `avatar`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'DAT', '123', 'PHAT', '707477369', 'PHAT@GMAIL,COM', '', NULL, NULL, NULL, NULL),
(2, 'sss', '123', '', '707565', 'sadsa', '', NULL, NULL, NULL, NULL),
(3, 'admin', '$2y$10$3zUQP6BCidMbEsa5XGc/kOo7LwMTvbpt2L30et/kG6gIAxN9M3LlW', 'phat datmguye', '0707477686', 'thongoc_dangyeu1982@yahoo.com', 'admin123', 'admin_2.jpg', NULL, NULL, 'RMXvJsxiZ839hHOaXhFs2HhJUTt33oYeW35k6R7kDbCFcVrNDufcHWeN9v3X');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphams`
--

DROP TABLE IF EXISTS `sanphams`;
CREATE TABLE IF NOT EXISTS `sanphams` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ma` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `mota` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idnguoidung` int(10) NOT NULL,
  `idloai` int(10) NOT NULL,
  `idhang` int(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sanpham_hang_id_fk_1` (`idhang`),
  KEY `sanpham_loai_id_fk_2` (`idloai`),
  KEY `sanpham_nguoidung_id_fk_3` (`idnguoidung`),
  KEY `ma` (`ma`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanphams`
--

INSERT INTO `sanphams` (`id`, `ma`, `ten`, `avatar`, `gia`, `mota`, `idnguoidung`, `idloai`, `idhang`, `updated_at`, `created_at`) VALUES
(2, '6splus', 'iphone 6splus 32gb', 'iphone-6s-plus-32gb-400x460.png', 8000000, '-Camera được cải tiến:Điện thoại iPhone 6s Plus 32 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng. Chất lượng ảnh trong các điều kiện chụp khác nhau tốt.\r\n\r\n-Cảm ứng 3D Touch độc đáo:3D Touch là tính năng hoàn toàn mới trên iPhone 6s Plus 32 GB, cho phép người dùng xem trước được các tùy chọn nhanh dựa vào lực nhấn mạnh hay nhẹ mà không cần phải nhấp vào ứng dụng.', 1, 1, 1, NULL, NULL),
(3, '7plus', 'iphone 7plus 32gb', 'iphone-7-plus-gold-400x460.png', 12000000, '-Chiếc điện thoại sở hữu camera kép đầu tiên của Apple: iPhone 7 Plus là chiếc iPhone đầu tiên được trang bị camera kép có cùng độ phân giải 12 MP, đem lại khả năng chụp ảnh ở hai tiêu cự khác nhau.\r\n\r\n-Camera chính chụp hình góc rộng, còn camera phụ có tiêu cự phù hợp để chụp chân dung, có tính năng chụp chân dung xóa phông (làm mờ hậu cảnh). \r\n\r\n-Với 1 chạm nhanh chóng bạn có thể chuyển đổi giữa chế độ 1x và zoom 2x, hoặc bạn có thể kéo thanh trượt hay dùng 2 ngón tay đến zoom. Apple đã thêm tính năng zoom kỹ thuật số lên đến 10x.\r\n\r\n-Màn hình Retina sắc nét:Màn hình Retina trên 7 Plus hỗ trợ DCI-P3 gam màu rộng, nghĩa là chúng có khả năng tái tạo màu sắc trong phạm vi của sRGB. Nói đơn giản, chúng có thể hiển thị sống động hơn, sắc thái hình ảnh tốt hơn trước đó. Độ phân giải, mật độ điểm ảnh và kích thước màn hình vẫn giữ nguyên so với iPhone 6s Plus.\r\n\r\nIPhone 7 Plus theo bản thân đánh giá là một sự  lựa chọn hợp lý trong tầm giá:\r\n\r\n+Ưu điểm:\r\n-Hiệu năng rất cao\r\n-Camera trước sau rất tuyệt vời\r\n-Thời lượng pin tốt\r\n+Nhược điểm:\r\n-Loại bỏ jack 3.5mm\r\n-Không thay đổi thiết kế quá nhiều mặc dù đã 3 năm\r\n-Phím Home cần thời gian để làm quen\r\n\r\n\r\n', 1, 1, 1, NULL, NULL),
(4, '8plus', 'iphone 8 plus 256gb ', 'iphone-8-plus-256gb-gold-400x460.png', 25000000, '•Thiết kế quen thuộc vốn có của dòng iPhone Apple\r\n-Thay đổi lớn nhất chính là Apple đã chuyển từ thiết kế kim loại nguyên khối sang mặt lưng kính nhằm mang tính năng sạc không dây lên 8 Plus.\r\n•Màn hình rộng và sắc nét\r\n-iPhone 8 Plus sở hữu màn hình kích thước 5.5 inch độ phân giải Full HD (1080 x 1920 pixels) đem lại khả năng hiển thị sắc nét.\r\n•Camera chất lượng hàng đầu\r\n-So với iPhone 7 Plus thì iPhone 8 Plus đã có những cải tiến rõ rệt về chất lượng ảnh chụp. Về phần cứng thì máy vẫn sử dụng bộ đôi camera chính và phụ đều có độ phân giải 12 MP và giờ đây Apple đã tích hợp thêm một con chip xử lý hình ảnh để nâng cao chất lượng ảnh chụp.\r\n\r\n', 1, 1, 1, NULL, NULL),
(5, 'x256', 'iphone x 256gb', 'iphone-x-256gb-silver-400x460.png', 27000000, '•iPhone X được đã được Apple cho ra mắt ngày 12/9 vừa rồi đánh dấu chặng đường 10 năm lần đầu tiên iPhone ra đời. iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp.\r\n•Màn hình điện thoại iPhone X được phủ kín gần như toàn bộ ở mặt trước và vẫn chừa lại một phần màn hình cho loa, camera và các cảm biến ở phía trên.\r\n•	Thay vì sử dụng công nghệ TrueTone HD thì màn hình OLED 5.8 inch của iPhone X được trang bị công nghệ Super Retina cho mật độ điểm ảnh lên tới 458 dpi. \r\n•Cấu hình mạnh mẽ, ổn định vượt bậc với chip Apple A11\r\n-Đi kèm với màn hình chất lượng đó thì chúng ta sẽ có Chip A11 Bionic. Một cái tên gì đó nghe có vẻ rất là \"Chất\". Và chip này có 6 lõi, cho hiệu suất hoạt động tốt hơn 25% so với A10.\r\n•Nhận diện khuôn mặt Face ID trong mọi điều kiện\r\n-Vẫn là vấn đề cũ, không có Touch ID thì mở khóa bằng... mặt. Giờ đây chúng ta đã có Face ID để làm điều đó. Với công nghệ vô cùng đặc biệt này, bạn có thể mở khóa bằng khuôn mặt của mình dù là ngoài trời nắng hay trong bóng đêm, kể cả chưa cạo râu hay mới cắt tóc,... Face ID chấp hết.\r\n\r\n', 1, 1, 1, NULL, NULL),
(6, 'xr256', 'iphone xr 256gb', 'iphone-xr-256gb-white-400x460.png', 23000000, '•Mượt mà mọi trải nghiệm nhờ chip Apple A12\r\n-Với mỗi lần ra mắt, Apple lại giới thiệu một con chip mới và Apple A12 Bionic là con chip đầu tiên sản xuất với tiến trình 7nm được tích hợp trên iPhone Xr.\r\n-Apple A12 được tích hợp trí tuệ thông minh nhân tạo, mọi phản hồi trên máy đều nhanh chóng và gần như là ngay lập tức, kể cả khi bạn chơi game hay thao tác bình thường.\r\n•Dàn loa cho âm thanh đa chiều\r\n-Trước đây để trải nghiệm tối đa âm thanh thì tai nghe là thiết bị không thể thiếu. Nhưng với iPhone thế hệ mới, công nghệ âm thanh đa chiều từ loa sẽ giúp bạn hoà vào âm nhạc cũng như các bộ phim thú vị hay chơi game hào hứng nhất.\r\n•Màn hình tràn viền công nghệ LCD - True Tone\r\n-Khác với iPhone Xs hay Xs Max, chiếc smartphone này sở hữu màn hình LCD\r\n•Camera với hiệu ứng bokeh cực đẹp\r\n-Nếu ai đó khẳng định chỉ camera kép mới xoá phông thì đó là một sai lầm. iPhone Xr có khả năng tạo hiệu ứng bokeh tuyệt đỉnh, làm nổi bật chân dung người chụp mà hình ảnh vẫn rất sắc nét, chi tiết\r\n\r\n', 1, 1, 1, NULL, NULL),
(7, 'xs256', 'iphone xs 256gb', 'iphone-xs-256gb-white-400x460.png', 32000000, '•Tích hợp chip Apple A12 hiệu năng mạnh mẽ bậc nhất\r\n-iPhone Xs tích hợp con chip mới của Apple với những hiệu năng mạnh mẽ đến vượt trội.\r\n-Apple A12 Bionic được xây dựng trên tiến trình 7nm đầu tiên của hãng với 6 nhân giúp điện thoại iPhone Xs có thể chiến được mọi loại game cũng như thao tác thường ngày với khả năng tiết kiệm điện so với thế hệ trước.\r\n•Màn hình Super Retina độc quyền cực sắc nét\r\n-So với đàn anh iPhone X thì iPhone Xs được chăm chút hơn về khả năng hiển thị khi được trang bị hàng loạt các công nghệ cao cấp.\r\n•Hệ thống âm thanh cải tiến\r\n-iPhone Xs sở hữu hệ thống âm thanh 2 chiều cực kì tuyệt vời được Apple tinh chỉnh mang lại dải âm rộng và chi tiết hơn.\r\n\r\n', 1, 1, 1, NULL, NULL),
(8, 'xsmax512', 'iphone xs max 512gb', 'iphone-xs-max-512gb-gold-400x460.png', 39000000, '•Màn hình OLED chất lượng cao rộng 6.5 inch đầu tiên của Apple\r\n -Với công nghệ Super Retina kết hợp tấm nền OLED trên iPhone XS Max đem lại dải màu sắc cực kì sống động và sắc nét đến từng chi tiết\r\n•Camera kép tích hợp trí tuệ nhân tạo\r\n-Dù không sở hữu thông số camera khủng nhưng iPhone XS Max luôn cho thấy sự đẳng cấp của mình về khả năng nhiếp ảnh với cụm camera kép có cảm biến chính 12 MP và cảm biến phụ tele 12 MP.\r\n•Hiệu năng mạnh mẽ tột đỉnh với chip Apple A12 Bionic\r\n-iPhone XS Max được Apple trang bị cho con chip mới toanh hàng đầu của hãng mang tên Apple A12 Bionic.\r\n\r\n', 1, 1, 1, NULL, NULL),
(9, 'asusmaxpro', 'Asus zenfone maxpro m1', 'asus-zenfone-max-pro-m1-blue-400x460.png', 3000000, 'ASUS Zenfone Max Pro M1 là chiếc smartphone tiếp theo trong phân khúc tầm trung mà Asus đã nâng cấp về thiết kế và hiệu năng nhằm bắt kịp xu thế mới, cũng như để cạnh tranh với các đối thủ của nó.\r\n•Thay đổi trong thiết kế\r\n-ASUS Zenfone Max Pro M1 sở hữu một thiết kế khá sang trọng, hiện đại đến từ chất liệu hợp kim nhôm với cụm camera kép đặt dọc như trên iPhone X, đây được xem như là một xu thế mới trong năm 2018.\r\n•Xu hướng màn hình 18:9\r\n-Asus cũng đã biết cách tự làm mới mình từ việc trang bị cho Zenfone Max Pro M1 một màn hình 6 inch với tỉ lệ 18:9 đem lại một không gian hiển thị rộng rãi và sẽ làm bạn cảm thấy hài lòng hơn khi xem phim hay lướt web.\r\n\r\n', 1, 1, 10, NULL, NULL),
(10, 'Nova3i', 'Điện thoại Huawei Nova 3i', 'huawei-nova-3i-trang-400x460.png', 5000000, 'Thiết kế bắt mắt với mặt lưng chuyển màu\r\n•	Nova 3i sở hữu mặt lưng kính chuyển màu gradient kiểu như điện thoại Huawei P20 Pro, nhờ thiết kế mặt lưng kính ấn tượng đã đem lại cho máy một thiết kế hiện đại và tinh tế.\r\nCụm camera được nâng cấp\r\n•	Chiếc điện thoại Huawei này sở hữu cụm camera kép ở mặt lưng với cảm biến chính 16 MP và cảm biến phụ 2 MP có khả năng lấy nét rất nhanh.\r\n•	Khả năng xóa phông của máy cũng được cải thiện đáng kể, màu sắc bắt mắt và mang lại những bức ảnh sống ảo đẹp mắt cho người dùng.\r\n•	Máy cũng có cụm camera selfie kép gồm thấu kính chính 24 MP và thấu kính phụ 2 MP có hỗ trợ chế độ AR Stickers kết hợp khả năng làm đẹp, cho bạn thoải mái tự sướng với bạn bè.\r\nMàn hình rất đẹp với \"tai thỏ\" tỉ lệ mới\r\n•	Nova 3i sở hữu một màn hình có tai thỏ tỉ lệ 19.5:9, với kích thước 6.3 inch, độ phân giải Full HD+ với màu sắc tươi tắn, độ sáng khá cao\r\nMở khóa khuôn mặt ấn tượng\r\n•	Mở khóa khuôn mặt đang là trào lưu khá hot hiện nay trên các dòng điện thoại thông minh và với Huawei Nova 3i thì tất nhiên cũng không thể thiếu công nghệ này.\r\n', 1, 1, 4, NULL, NULL),
(11, 'HuaweiY9', 'Điện thoại Huawei Y9 (2019)', 'huawei-y9-2019-blue-400x460.png', 4000000, 'Thiết kế thu hút từ cái nhìn đầu tiên\r\n•	Rất nhanh chóng thì Huawei đã mang lên chiếc Y9 (2019) thiết kế độc đáo với mặt lưng có thể thay đổi màu sắc trong môi trường và điều kiện khác nhau.\r\nMàn hình \"tai thỏ\" FullView kích thước lớn\r\n•	Huawei Y9 (2019) sở hữu màn hình FullView kích thước 6.5 inch độ phân giải Full HD+ cho góc nhìn tốt, màu sắc thể hiện trung thực.\r\nCamera chụp ảnh chất lượng tốt\r\n•	Huawei Y9 2019 mang trong mình tới 4 camera bao gồm camera kép phía trước độ phân giải 16 MP (chính) + 2 MP (phụ) và camera kép phía sau là 13 MP (chính) + 2 MP (phụ), cả hai cụm camera đều tích hợp với công nghệ chụp ảnh AI (trí tuệ nhân tạo).\r\nHiệu năng tốt, thoải mái chiến game\r\n•	Cung cấp sức mạnh cho Huawei Y9 là vi xử lý Kirin 710, RAM tùy chọn 4 GB, bộ nhớ trong 64 GB cho bạn thoải mái lưu trữ dữ liệu.\r\n•	Theo Huawei thì với AI Power 7.0 Huawei Y9 (2019) sẽ mang đến cho người dùng hiệu suất mạnh mẽ và thời gian sử dụng lâu hơn.\r\n', 1, 1, 4, NULL, NULL),
(12, 'Y7pro', 'Điện thoại Huawei Y7 Pro (2019)', 'huawei-y7-pro-2019-400x460.png', 3000000, 'Màn hình hiển thị giọt nước cực lớn\r\n•	Y7 Pro (2019) được trang bị màn hình rộng lên đến 6.26 inch, với độ phân giải HD+\r\nMặt lưng chuyển màu gradient cao cấp\r\n•	Tưởng rằng mặt lưng gradient chỉ áp dụng cho các dòng sản phẩm tầm trung hoặc cao cấp, thì nay với Y7 Pro (2019) bạn đã có thể sở hữu được một thiết bị có thiết kế đầy nổi bật với cá tính.\r\nKhả năng nhiếp ảnh thông minh\r\n•	Với camera kép mặt sau tích hợp trí tuệ nhân tạo AI bao gồm thấu kính chính 13 MP + thấu kính phụ 2 MP, Y7 Pro (2019) có thể dễ dàng nhận ra các vật thể, lấy nét tốt với ánh sáng hợp lý hơn nhờ khẩu độ f/1.8.\r\n\r\nDung lượng pin lớn 4000 mAh\r\n•	So với Y7 Pro (2018) có viên pin chỉ 3000 mAh thì phiên bản 2019 này đã có sự cải thiện tới 4000 mAh.\r\n', 1, 1, 4, NULL, NULL),
(13, 'Y6Prime', 'Điện thoại Huawei Y6 Prime (2018)', 'huawei-y6-prime-2018-1-1-400x460.png', 2000000, 'Thiết kế cứng cáp\r\n•	Huawei tiếp tục mang lên một chiếc smartphone giá rẻ của mình màn hình tràn viền 18:9 với kích thước 5.7 inch.\r\nHiệu năng khá\r\n•	Huawei Y6 Prime sở hữu chip Snapdragon 425 cùng RAM 2 GB. Tuy cấu hình không cao nhưng vẫn đảm bảo giúp bạn có những trải nghiệm tốt nhất, đáp ứng được nhu cầu sử dụng đơn giản cơ bản hằng ngày.\r\nCamera chất lượng\r\n•	Sở hữu camera chính độ phân giải 13 MP với khả năng lấy nét nhanh cho phép bạn bắt trọn mọi khoảnh khắc đáng nhớ. Ngoài ra máy còn hỗ trợ chế độ Time-Lapse giúp bạn ghi lại những khoảnh khắc thú vị.\r\nTính năng khác\r\n•	Pin của máy có dung lượng là 3.000 mAh đủ đáp ứng nhu cầu sử dụng trong khoảng 1 ngày.\r\n', 1, 1, 4, NULL, NULL),
(14, 'P30Pro', 'Điện thoại Huawei P30 Pro', 'huawei-p30-pro-1-400x460.png', 20000000, 'Định nghĩa lại camera phone\r\n•	Camera là điểm nhấn trên Huawei P30 Pro với camera chính SuperSpectrum độ phân giải 40 MP.\r\n•	Cảm biến SuperSpectrum sử dụng cấu trúc RYYB (Red Yellow Yellow Black), trái ngược với RGB (Red Green Black), thay thế các pixel màu xanh lá cây bằng màu vàng, theo Huawei cho phép cảm biến cho ánh sáng nhiều hơn.\r\nHiệu năng hàng đầu thế giới smartphone\r\n•	Cung cấp sức mạnh cho máy là bộ xử lý Hisilicon Kirin 980 8 nhân 64-bit kết hợp với 8 GB RAM và 256 GB bộ nhớ trong đem lại cho bạn hiệu năng vượt trội.\r\nNhững trang bị cao cấp chỉ có trên P30 Pro\r\n•	Trên Huawei P30 Pro thì bạn sẽ không còn thấy sự xuất hiện của loa thoại và Huawei đã sử dụng công nghệ truyền âm thanh qua màn hình rất độc đáo.\r\n•	Bên cạnh đó vẫn là cảm biến được đặt ngay bên dưới màn hình nên bạn sẽ không phải hi sinh bất cứ bộ phận nào trên thiết kế để sử dụng tính năng này.\r\n', 1, 1, 4, NULL, NULL),
(24, 'Nokia21', 'Điện thoại Nokia 2.1', 'nokia-21-1.jpg', 1500000, 'Thiết kế đơn giản nhưng tinh tế\r\n•	Thiết kế của máy trông thanh thoát và sang hơn hẳn phiên bản cũ. Và bật mí thêm là máy có đến 2 loa ngoài được đặt ở mặt trước.\r\n•	Mặt lưng của điện thoại Nokia 2.1 được làm từ nhựa Polycarbonate nhám giúp máy hạn chế bám vân tay khi sử dụng.\r\n\r\nMàn hình hiển thị ở mức khá\r\n•	Nokia 2.1 sẽ sở hữu màn hình 5.5 inch độ phân giải HD, lớn hơn 0.5 inch so với mẫu Nokia 2 trước đó.\r\nHiệu năng đáp ứng được nhu cầu giải trí đơn giản\r\n•	Nokia 2.1 cũng sở hữu một cấu hình được nâng cấp hơn hẳn, nhờ chạy Android thuần nên máy sẽ được những ưu tiên hỗ trợ từ Google.\r\nCamera đủ dùng để lưu lại những khoảnh khắc\r\n•	Nokia 2.1 sở hữu camera sau độ phân giải 8 MP và camera trước 5 MP.\r\nPin vẫn là điểm sáng\r\n•	Nokia 2.1 chạy Android Go Edition và sẽ cho bạn thời lượng pin lên tới 2 ngày nhờ vào viên pin lên tới 4.000 mAh\r\n\r\n', 1, 1, 6, NULL, NULL),
(25, 'Nokia31', 'Điện thoại Nokia 3.1 ', 'nokia-31-plus1.jpg', 2000000, 'Thiết kế nam tính chắc chắn\r\n•	Chiếc điện thoại Nokia này mang trong mình một ngôn ngữ thiết kế gần giống với những chiếc điện thoại flagship cách đây 1 hay 2 năm\r\nMàn hình tràn viền nhỏ gọn\r\n•	Khá bất ngờ khi màn hình của máy đạt 5.2 inch, nhỏ hơn cả mẫu Nokia 2.1 có mức giá rẻ hơn.\r\nHiệu năng phù hợp với tầm giá\r\n•	Hiệu năng của Nokia 3.1 được thiết kế cao hơn 30% so với chiếc Nokia 3 năm ngoái.\r\nCamera có khả năng lấy nét nhanh\r\n•	Nokia 3.1 sở hữu camera chính độ phân giải 13 MP với khả năng lấy nét khá nhanh, giúp bạn bắt trọn khoảnh khắc đẹp trong cuộc sống.\r\n', 1, 1, 6, NULL, NULL),
(26, '61Plus', 'Điện thoại Nokia 6.1 Plus ', 'nokia-61-plus-3-400x460.png', 5000000, 'Sự phá cách trong thiết kế\r\n•	Sự kết hợp giữa khung kim loại và kính cao cấp đã tạo nên một chiếc điện thoại Nokia với một dáng vẻ trông khá sang trọng và uyển chuyển trong thân hình có phần hơi nữ tính.\r\nMàn hình tai thỏ sắc nét chất lượng\r\n•	Nhờ vào tỷ lệ màn hình 19:9 thời thượng cùng tai thỏ quyến rũ đã giúp cho Nokia 6.1 Plus có một không gian trải nghiệm vô cùng thoải mái trên kích thước màn hình 5.8 inch nhưng cũng rất vừa vặn khi cầm trên tay.\r\nHiệu năng ấn tượng và mạnh mẽ\r\n•	Ngoài việc có một thiết kế đẹp, Nokia 6.1 Plus còn có một hiệu năng mạnh mẽ đến từ con chip Qualcomm Snapdragon 636, 4 GB RAM cùng 64 GB bộ nhớ trong.\r\nCamera với độ chuyên nghiệp cao\r\n•	Nokia 6.1 Plus sở hữu cụm camera kép ở mặt sau với độ phân giải chính 16 MP và phụ 5 MP hỗ trợ chụp xóa phông cùng khả năng quay phim FullHD 1080p@30fps.\r\nDung lượng pin khá\r\n•	Với dung lượng pin 3060 mAh trên một kích thước màn hình lớn thì thời gian trải nghiệm của máy chỉ ở mức khá nhưng vẫn đáp ứng khá ổn cho bạn trong 1 ngày làm việc cũng như giải trí một cách thoải mái nhất\r\n', 1, 1, 6, NULL, NULL),
(27, 'nokia81', 'Điện thoại Nokia 8.1 ', 'nokia-81-silver-18thangbh-400x460.png', 7000000, 'Thiết kế hướng tới người dùng nam giới\r\n•	Nokia 8.1 có thiết kế viền kim loại cứng cáp bao quanh, tạo sự nam tính, mạnh mẽ.\r\n•	Mặt lưng trước và sau đều là kính, gợi nên sự bóng bẩy và tinh tế (Máy vẫn bám vân tay nhẹ, nhưng được đánh giá là hạn chế khá nhiều, không quá trơn tuột và rõ vết bám, so với các dòng máy 2 mặt kính khác).\r\nCamera trang bị ống kính ZEISS\r\n•	Nokia 8.1 không có độ phân giải camera cao, nhưng có ưu điểm rất lớn là được trang bị ống kính ZEISS cao cấp - 1 trong những hãng chuyên - và - tiên phong trong công nghệ chụp ảnh.\r\n•	Máy cho khả năng bắt nét và tốc độ chụp nhanh. Chất lượng hình ảnh kể cả khi chụp thiếu sáng vẫn rất ổn và lấy đủ mọi chi tiết.\r\nViên pin khủng 3500 mAh có sạc nhanh 18W\r\n•	Nokia 8.1 chỉ tốn khoảng hơn 90 phút để sạc đầy pin, và với 30 phút sạc đầu, máy đã được nạp khoảng 40% dung lượng\r\n', 1, 1, 6, NULL, NULL),
(28, 'nokia210', 'Điện thoại Nokia 210 ', 'nokia-210-gray-1-400x460.png', 700000, 'Thiết kế nhỏ gọn tinh tế\r\n•	Chiếc điện thoại Nokia 210 có thiết kế nhỏ gọn với hai đường cong ở hai bên thân máy cho cảm giác thoải mái khi sử dụng.\r\nSử dụng đơn giản và bền bỉ\r\n•	Người dùng thường hay sử dụng điện thoại phím giống như Nokia 210 để nghe, gọi là chính. \r\nViên pin cho thời lượng sử dụng lâu hơn\r\n•	Nokia 210 có dung lượng pin 1020 mAh khá cao trong dòng điện thoại phím của Nokia. Với dung lượng này người dùng có thể sử dụng máy hai hoặc ba ngày với các tác vụ cơ bản. \r\n', 1, 1, 6, NULL, NULL),
(29, 'nokia230', 'Điện thoại Nokia 230 ', 'nokia-230-khong-the-blue-400x460.png', 1000000, 'Thiết kế tỉ mỉ hơn của Nokia 230 Dual SIM\r\n•	Điểm nổi bật nhất trên chiếc điện thoại Nokia này là mặt lưng được làm từ nhôm nhìn khá đẹp mắt, tạo sự cứng cáp và tinh tế hơn cho máy.\r\nCamera selfie có cả đèn Flash hỗ trợ\r\n•	Nokia đã làm một điều mà rất ít hãng nào làm, đó là mang đèn Flash trợ sáng cho camera trước cho điện thoại bàn phím cơ bản, một chi tiết khá đáng giá trên máy.\r\nDễ dàng sử dụng hơn\r\n-	Để kiểm tra âm thanh, bạn hãy gắn sim vào máy và ấn gọi 900 (miễn phí) để nghe thử âm thanh có phù hợp với ý bạn chưa.\r\n- Bạn có thể điều chỉnh để kiểm soát thời gian gọi của máy.\r\n-	Để làm, bạn gắn sim vào máy, vào cài đặt > cài đặt cước > kiểm soát cuộc gọi > kiểm tra thời lượng.\r\n', 1, 1, 6, NULL, NULL),
(30, 'nokia8110', 'Điện thoại Nokia 8110 4G ', 'nokia-8110-4g-gold-400x460.png', 900000, 'Thiết kế thú vị\r\n-	Điểm nổi bật chính trên thiết kế của Nokia 8110 4G là đường cong hình \"trái chuối\" lạ mắt. Đặc biệt bàn phím của máy có nắp đậy dạng trượt trông khá \"ngầu\".\r\nHiệu năng phổ thông\r\n-	Sức mạnh của máy được cung cấp bởi con chip Snapdragon 205 với RAM 512 MB sử dụng nền tảng phần mềm KaiOS gọn nhẹ giúp máy ổn định và mượt hơn.\r\nNhiều tính năng nổi bật\r\n-	Nokia 8110 4G sẽ làm bạn ngạc nhiên khi có khả năng kháng nước, kháng bụi chuẩn IP52 giúp máy sống sót khi vô tình đánh rơi xuống nước hay làm việc trong môi trường khói bụi.\r\nDung lượng pin 1500 mAh\r\n-	Với dung lượng pin như trên cho thời gian sử dụng để nghe nhạc, gọi điện khá dư giả trong 2 ngày. Bên cạnh đó máy có thiết kế pin rời nên việc thay thế khi pin khi bị hỏng trở nên dễ dàng hơn.\r\n', 1, 1, 6, NULL, NULL),
(31, 'r17pro', 'Điện thoại OPPO R17 Pro ', 'oppo-r17-pro-2-400x460.png', 13000000, 'Thiết kế thời trang, phá cách\r\n-	OPPO R17 Pro sở hữu cho mình lối thiết kế mới sẽ khiến bạn phải mê mẩn đến từ chiếc tai thỏ hình giọt nước vô cùng quyến rũ.\r\nĐiểm nhấn đặc biệt về camera\r\n-	OPPO luôn cho thấy sự chịu chơi của mình khi trang bị cho R17 Pro cụm camera với 3 thấu kính có độ phân giải lần lượt là 20 MP, 12 MP và TOF 3D.\r\nCông nghệ SuperVOOC sạc siêu nhanh\r\n-	OPPO R17 Pro được ưu ái tích hợp chuẩn sạc nhanh SuperVOOC với công suất lên đến 50W cho phép bạn sạc từ 0% đến 40% chỉ trong 10 phút.\r\n \r\n', 1, 1, 3, NULL, NULL),
(32, 'findx', 'Điện thoại OPPO Find X ', 'oppo-find-x-1-400x460-400x460.png', 17000000, 'Thiết kế đến từ tương lai\r\n-	Chiếc điện thoại OPPO mới đã tạo nên sự khác biệt cho riêng mình nhờ lối thiết kế dạng trượt phần camera giúp không gian hiển thị mặt trước chiếm gần như là trọn vẹn.\r\nHiệu năng hàng đầu hiện nay\r\n-	Sức mạnh đến từ con chip Snapdragon 845 cùng 8 GB RAM sẽ là thông số đáng mơ ước trên một chiếc smartphone và nay đã có mặt trên OPPO Find X\r\nHệ thống camera đỉnh cao\r\n-	Cụm camera kép ở phía sau của máy bao gồm một ống kính chính 16 MP và một ống kính phụ 20 MP.\r\n-	Nhiều công nghệ chụp ảnh hiện đại nhất như: zoom quang học, chụp ảnh xóa phông cũng được tích hợp trên bộ đôi camera kép của máy.\r\nCông nghệ sạc nhanh VOOC độc quyền\r\n-	OPPO Find X được trang bị công nghệ sạc nhanh VOOC do hãng phát triển đáp ứng thời gian sạc nhanh chóng chỉ rơi vào khoảng 30 phút.\r\n \r\n', 1, 1, 3, NULL, NULL),
(33, 'f11pro', 'Điện thoại OPPO F11 Pro 128GB ', 'oppo-f11-pro2.jpg', 8000000, 'Màn hình tràn viền không khuyết điểm\r\n-	Không “tai thỏ”, không “nốt ruồi” giúp cho OPPO F11 Pro 128GB khác biệt hoàn toàn với nhiều smartphone trên thị trường hiện nay\r\nCamera selfie trượt ấn tượng\r\n-	F11 Pro 128GB là máy sở hữu camera selfie 16 MP có cơ chế “ thò thụt” khá độc đáo và tiện lợi cho người dùng.\r\nCamera sau lên đến 48 MP\r\n-	Không chỉ có camera trước mà OPPO F11 Pro 128còn sở hữu camera chính với độ phân giải lên đến 48 MP và nhiều tính năng chụp hình thú vị khác.\r\nPin \"siêu khủng\" kèm công nghệ VOOC\r\n-	OPPO F11 Pro được nâng cấp công nghệ sạc nhanh VOOC 3.0 giúp máy có thể được sạc đầy chỉ trong vòng 80 phút.\r\n', 1, 1, 3, NULL, NULL),
(34, 'f9oppo', 'Điện thoại OPPO F9 ', 'oppo-f9-6gb-red-400x460.png', 6000000, 'Sạc VOOC nhanh đột phá\r\n•	Trong những giây phút gay cấn như chơi game điện thoại báo hết pin hay sáng dậy đi làm nhưng phát hiện quên sạc pin thì bộ sạc của OPPO F9 sẽ đem lại sự cứu trợ ngay lập tức.\r\n•	Với sạc VOOC 5V/AA, tốc độ sạc trở nên nhanh chóng so với các bộ sạc thông thường.\r\nThiết kế độc đáo với sự chuyển màu phá cách\r\n•	Những mặt lưng đơn sắc đã quá quen thuộc, thì thiết kế mới của OPPO F9 như một sự phá cách trong phân khúc giá với mức giá hấp dẫn.\r\nMàn hình tràn viền giọt nước\r\n•	OPPO F9 đem lại cho người dùng một chiếc điện thoại đầu tiên có thiết kế khung viền hình giọt nước, thay vì thiết kế tai thỏ đã dần trở nên phổ biến.\r\nĐột phá chụp ảnh chân dung với A.I Beauty 2.1\r\n•	Xu hướng selfie và chia sẻ trên các phương tiện xã hội đã trở thành một thói quen không thể thiếu. Hiểu được điều đó tính năng camera của OPPO F9 luôn được cải thiện.\r\n•	Camera trước của máy có độ phân giải 25 MP, tích hợp chế độ chụp ảnh chân dung cùng các hiệu ứng ánh sáng tuỳ chỉnh và công nghệ trí tuệ nhân tạo A.I Beauty 2.1.\r\n', 1, 1, 3, NULL, NULL),
(35, 'a7oppo', 'Điện thoại OPPO A7', 'oppo-a7-400x460.png', 5000000, 'Thiết kế cực chất với mặt lưng 3D dạng lưới\r\n•	OPPO A7 được tạo nên nhờ với một ngôn ngữ thiết kế mới lạ, bắt mắt khi có phần mặt lưng phản chiếu 3D vân lưới ánh sáng cực đẹp và thu hút.\r\nHiệu năng mạnh mẽ với 4 GB RAM đi kèm\r\n•	Sức mạnh cung cấp cho OPPO A7 đến từ con chip Qualcomm Snapdragon 450 có hiệu năng ổn định trong việc xử lý các tác vụ cơ bản thường ngày.\r\nẤn tượng về khả năng chụp ảnh selfie siêu đẹp\r\n•	Điểm mạnh trên OPPO A7 không thể không kể đến khả năng chụp ảnh selfie tuyệt đẹp với nhiều chế độ chụp ảnh chuyên nghiệp đi kèm.\r\nSử dụng bền bỉ với dung lượng pin cực khủng\r\n•	OPPO A7 sở hữu viên pin 4230 mAh và được tích hợp chế độ quản lý pin thông minh, hứa hẹn sẽ cho bạn một thời gian trải nghiệm thoải mái cũng như tự động tiết kiệm pin mỗi khi cần thiết.\r\n', 1, 1, 3, NULL, NULL),
(36, 'oppof7', 'Điện thoại OPPO F7', 'oppo-f7-red-mtp-400x460.png', 4000000, 'Thiết kế tai thỏ độc đáo\r\n•	OPPO F7 vẫn đi theo thiết kế \"tai thỏ\" mà Apple đã từng làm trên iPhone X.\r\nCamera độ phân giải cao\r\n•	Điện thoại OPPO F7 sẽ sở hữu một máy ảnh phía trước độ phân giải 25 MP.\r\nHiệu năng ổn định\r\n•	OPPO F7 sẽ được trang bị con chip tới từ MediaTek Helio P60 với 8 nhân cùng 4 GB RAM và 64 GB bộ nhớ trong.\r\nBảo mật khuôn mặt\r\n•	OPPO vẫn sẽ nhắm đến các trào lưu đang hot hiện nay như bảo mật khuôn mặt với khả năng nhận diện rất nhanh.\r\n', 1, 1, 3, NULL, NULL),
(37, 'oppoa3s', 'Điện thoại OPPO A3s ', 'oppo-a3s-32gb-400x460.png', 4000000, 'Thiết kế thời trang với màu sắc sang trọng\r\n•	OPPO A3s sở hữu cho mình vẻ bề ngoài sang trọng và tinh tế không kém gì các thiết bị cao cấp.\r\nMàn hình tai thỏ cao cấp\r\n•	Điểm ấn tượng đầu tiên trên chiếc điện thoại OPPO này chính là phần phần tai thỏ bên trên màn hình tương tự như chiếc iPhone X tới từ Apple.\r\nCamera kép xoá phông chất lượng\r\n•	OPPO A3s 32GB sở hữu hệ thống camera kép độc đáo với độ phân giải của hai camera lần lượt là 13 MP (ống kính chính) và 2 MP (ống kính phụ).\r\nHiệu năng đủ để giải trí đơn giản\r\n•	OPPO A3s 32GB được trang bị vi xử lý Snapdragon 450 với 8 nhân đảm bảo thỏa mãn đa số nhu cầu sử dụng hằng ngày và chơi game thông dụng ở mức cấu hình thấp.\r\nDung lượng pin tốt\r\n•	Viên pin có dung lượng 4230 mAh giúp bạn sử dụng máy khá thoải mái trong khoảng hơn một ngày.\r\n', 1, 1, 3, NULL, NULL),
(38, 'realme3', 'Điện thoại Realme 3 64GB', 'realme-3-64gb-black-isaac-400x460.png', 4000000, 'Thiết kế đẹp, ấn tượng trong phân khúc\r\n•	Ngay khi nhìn bên ngoài của chiếc điện thoại Realme, chúng ta đã thấy một nâng cấp lớn trong thiết kế của máy so với các thế hệ trước đó - cao cấp hơn.\r\nCấu hình tốt, thoải mái chiến game \"ngon\"\r\n•	Chiếc smartphone này có cấu hình rất ấn tượng khi được được trang bị vi xử lý MediaTek Helio P60 8 nhân 64-bit, một con chip thường thấy trên các sản phẩm tầm trung.\r\nCamera selfie nổi bật trong tầm giá\r\n•	Điểm mạnh trên Realme 3 64 GB không thể không kể đến khả năng chụp ảnh selfie tuyệt đẹp với nhiều chế độ chụp ảnh chuyên nghiệp đi kèm.\r\n', 1, 1, 8, NULL, NULL),
(39, 'Realme C1', 'Điện thoại Realme C1', 'oppo-realme-c1-1-400x460.png', 2000000, 'Màn hình tai thỏ kích thước lớn\r\n•	Với một mức giá rẻ nhưng Realme C1 vẫn được trang bị màn hình có kích thước lên tới 6.2 inch cho không gian thoải mái để chơi game hay xem phim.\r\nCamera kép cho chất lượng ảnh tốt\r\n•	Camera kép với 13 MP dành cho ống kính chính + 2 MP dành cho ống kính phụ ở mặt sau chính là một điểm cộng lớn nữa dành cho Realme C1 khi ở phân khúc này ít có smartphone sở hữu camera kép.\r\nCamera trước hỗ trợ mở khóa khuôn mặt\r\n•	Camera selfie 5 MP với chế độ làm đẹp \"trứ danh\" sẽ cho bạn những bức ảnh tự nhiên và chi tiết tốt.\r\nDung lượng pin khủng trong phân khúc\r\n•	Smartphone mới này của dòng Realme có dung lượng pin lên tới 4.230 mAh cho bạn sử dụng thoải mái lên tới 2 ngày.\r\nHiệu năng đủ đáp ứng nhu cầu cơ bản\r\n•	Cung cấp sức mạnh cho máy là con chip Qualcomm Snapdragon 450 8 nhân 64-bit đủ đáp ứng hầu hết các nhu cầu như lướt web hay chơi các tựa game trung bình\r\n', 1, 1, 8, NULL, NULL),
(40, '2Propr', 'Điện thoại Realme 2 Pro 4GB/64GB', 'oppo-realme-2-pro-black-400x460.png', 5000000, 'Camera selfie vẫn là điểm mạnh của máy\r\n•	Cụm camera kép mà Realme 2 Pro sở hữu có độ phân giải 16 MP dành cho cảm biến chính và 2 MP dành cho cảm biến chiều sâu để hỗ trợ chụp ảnh xóa phông.\r\nMạnh mẽ hơn với hiệu năng được nâng cấp\r\n•	Phiên bản Realme 2 Pro này được nâng cấp lên con chip Qualcomm Snapdragon 660 8 nhân cùng mức RAM 4 GB.\r\nThiết kế bắt mắt với màn hình giọt nước\r\n•	Realme 2 Pro sở hữu thiết kế màn hình giọt nước đúng theo xu hướng của các smartphone mới nhất hiện nay.\r\nCảm biến vân tay vẫn được duy trì\r\n•	Realme 2 Pro vẫn sở hữu cho mình cảm biến vân tay ở mặt lưng với tốc độ nhận diện rất nhanh và chính xác.\r\n', 1, 1, 8, NULL, NULL),
(41, '2prorm', 'Điện thoại Realme 2 4GB/64GB', 'realme-2-black-1-400x460.png', 3000000, 'Được nâng cấp lên camera kép\r\n•	Nếu trên Realme 1 người dùng chỉ có một camera đơn thì ở phiên bản kế nhiệm hãng đã mang lên hệ thống camera kép sau với ống kính chính 13 MP khẩu độ f/ 2.2 và cảm biến chiều sâu 2 MP khẩu độ f/2.4 hỗ trợ chụp ảnh xoá phông ở chế độ chân dung.\r\nMượt mà và lưu trữ thoải mái hơn với RAM 4 GB, ROM 64 GB\r\n•	Realme 2 sở hữu hai phiên bản và bản cao cấp nhất có RAM 4 GB và bộ nhớ trong 64 GB, giúp các thao tác đa nhiệm trở nên mượt mà hơn cũng như lưu trữ hình ảnh, video, âm nhạc thoải mái nhất.\r\nDung lượng pin khủng tới 4230 mAh\r\n•	Realme 2 được nâng cấp dung lượng pin với 4.230 mAh (dung lượng pin lớn hơn 24% Realme 1) kết hợp với tính năng AI Power Manager hứa hẹn thời gian sử dụng lâu dài.\r\nSự xuất hiện trở lại của cảm biến vân tay\r\n•	Để cắt giảm chi phí thì trên Realme 1 người dùng đã bị loại bỏ đi tính năng mở khóa bằng vân tay vốn được rất nhiều người dùng yêu thích.\r\nMở khóa khuôn mặt cực nhanh\r\n•	Tính năng mở khóa bằng khuôn mặt trên Realme 2 chỉ mất 0.1 giây để có thể nhận diện và mở khóa smartphone khi đang ở màn hình khóa\r\n', 1, 1, 8, NULL, NULL),
(42, 'sss10', 'Điện thoại Samsung Galaxy S10+ (512GB)', 'samsung-galaxy-s10-plus-512gb-ceramic-black-400x460.png', 25000000, 'Khác biệt tới từ màn hình Infinity-O\r\n•	Samsung Galaxy S10+ (512GB) đi theo kiểu thiết kế màn hình Infinity-O với phần camera được đặt phía trong màn hình rất độc đáo.\r\nCamera được nâng lên tầm cao mới\r\n•	Những chiếc Galaxy S tới từ Samsung luôn được người dùng đánh giá cao về camera và với Samsung Galaxy S10+ (512GB) cũng không phải là một ngoại lệ.\r\nSở hữu con chip mạnh mẽ nhất năm 2019\r\n•	Con chip Exynos 9820 kết hợp với 8 GB RAM đủ sức cho bạn có thể sử dụng tất cả game và ứng dụng nặng nhất hiện nay một cách mượt mà, bất kể là Liên Quân Mobile, Free Fire hay PUBG.\r\nNhiều tính năng cao cấp khác\r\n•	Trên Samsung Galaxy S10+ còn có một tính năng mới được rất nhiều người yêu thích đó chính là khả năng sạc ngược không dây cho smartphone khác (PowerShare).\r\n', 1, 1, 2, NULL, NULL),
(43, 'sss964', 'Điện thoại Samsung Galaxy S9+ 64GB Vang Đỏ', 'samsung-galaxy-s9-plus-64gb-vang-do-400x460.png', 17000000, 'Lộng lẫy mùa lễ hội với sắc đỏ quyến rũ\r\n•	Samsung Galaxy S9+ Vang Đỏ nổi bật với sắc màu độc đáo mà ít dòng máy khác hướng đến. Màu đỏ quyến rũ kết hợp với thiết kế khung kim loại và hai mặt kính cường lực đem lại cho S9+ một vẻ bề ngoài bắt mắt và đẳng cấp nhất.\r\nCamera kép điều chỉnh khẩu độ\r\n•	Galaxy S9+ không đua theo xu hướng độ phân giải khủng nhưng những công nghệ tích hợp trong camera thì ít hãng nào sánh bằng.\r\nTrang bị đầy đủ mọi bảo mật cao cấp\r\n•	Ba loại bảo mật nổi nhất hiện nay là quét mống mắt cao cấp, nhận diện khuôn mặt và cảm biến vân tay đều có trọn vẹn trên chiếc smartphone này. Bạn có thể lựa chọn loại bảo mật tiện và phù hợp nhất để an toàn thông tin, mở khoá máy nhanh chóng.\r\nChống nước chống bụi và nhiều tính năng hỗ trợ khác\r\n•	S9+ được trang bị khả năng chống nước chống bụi chuẩn IP68 giúp máy an toàn trong những điều kiện bất khả kháng.\r\n', 1, 1, 2, NULL, NULL),
(44, 'note8', 'Điện thoại Samsung Galaxy Note 8', 'samsung-galaxy-note8-black-400x460.png', 11000000, 'Màn hình vô cực hiện đại tiên tiến\r\n•	Dù được giới thiệu là màn hình lên tới 6.3 inch nhưng thực sự khi cầm điện thoại Note 8 trên tay rất nhỏ gọn nhờ vào công nghệ \"màn hình vô cực\" tiên tiến nhất hiện nay của Samsung.\r\nCamera kép xoá phông chuẩn xác\r\n•	Camera kép xóa phông trên Note 8 có cùng độ phân giải 12 MP với ống kính chính góc rộng 12 MP và một ống kính 12 MP còn lại dùng để zoom quang, có thể nói là ... cảm giác như mình đang sử dụng một chiếc máy ảnh thực thụ vậy.\r\nSự đặc biệt ở SPen thần thánh\r\n•	Suýt nữa thì quên không nhắc tới S-Pen thần thánh, chiếc bút đã làm nên thương hiệu của dòng Note.\r\n', 1, 1, 2, NULL, NULL),
(45, 'note9', 'Điện thoại Samsung Galaxy Note 9 512GB', 'samsung-galaxy-note-9-512gb-blue-400x460.png', 22000000, 'Bút S-Pen cải tiến đến vi diệu\r\n•	Một sự thay đổi khiến bạn phải thích thú có lẽ là chiếc bút S-Pen đi kèm theo điện thoại với nhiều màu sắc nổi bật.\r\nHiệu năng luôn ở đỉnh cao\r\n•	Là một flagship cao cấp nên những gì mạnh mẽ nhất đều được hội tụ trên Galaxy Note 9 với con chip Snapdragon 845 hoặc Exynos 9810 tùy vào từng thị trường khác nhau.\r\nCamera thay đổi khẩu độ dễ dàng và tích hợp AI\r\n•	Galaxy Note 9 sở hữu bộ đôi camera kép với cùng độ phân giải 12 MP có khả năng thay đổi khẩu độ như Galaxy S9+ và được tích hợp thêm công nghệ AI giúp chất lượng ảnh chụp đẹp hơn đáng kể.\r\nDung lượng pin được cải tiến\r\n•	Sau những gì mà người dùng mong mỏi thì nay Note 9 đã có một viên pin to hơn, mạnh mẽ và bền bỉ hơn với dung lượng lên đến 4000 mAh.\r\n', 1, 1, 2, NULL, NULL),
(46, 'ssa9', 'Điện thoại Samsung Galaxy A9 (2018)', 'samsung-galaxy-a9-2018-blue-400x460.png', 8000000, 'Thiết kế cao cấp với mặt lưng chuyển màu sắc\r\n•	Samsung Galaxy A9 (2018) được thừa hưởng nhiều nét đẹp từ những người đàn anh của mình với thân hình mảnh mai, uyển chuyển.\r\nHiệu năng mạnh mẽ với Snapdragon 660\r\n•	Không thể phủ nhận những gì mà con chip Snapdragon 660 mang đến cho Galaxy A9 (2018) là vô cùng mạnh mẽ khi nó được tối ưu hiệu suất để xử lý các tác vụ nặng hiện nay.\r\nẤn tượng về camera\r\n•	Không phải là hai, ba mà là bốn thấu kính cho cụm camera phía sau đã giúp Galaxy A9 (2018) trở thành chiếc điện thoại đầu tiên sở hữu con số này.\r\nHỗ trợ nhiều tính năng độc quyền\r\n•	Cùng với đó Galaxy A9 (2018) còn được trang bị Samsung Bixby, một trợ lý ảo thông minh để bạn có thể tương tác trong việc tìm kiếm thông tin hay điều khiển máy một cách dễ dàng.\r\n•	Chưa hết, tính năng Always On Display cũng xuất hiện trên máy giúp bạn đơn giản hơn trong việc xem giờ và thông báo mà không cần mở sáng màn hình, hay hỗ trợ cả hai loại bảo mật vân tay và khuôn mặt.\r\n', 1, 1, 2, NULL, NULL),
(47, 'ssa8', 'Điện thoại Samsung Galaxy A8 Star', 'samsung-galaxy-a8-star-black-400x460.png', 7000000, 'Thiết kế mang vẻ đẹp hiện đại\r\n•	Điện thoại Samsung mới sở hữu thiết kế vẫn khá quen thuộc với thân hình có phần nam tính, mạnh mẽ và hiện đại, đan xen một chút mềm mại đến từ các góc cạnh và mặt lưng của máy.\r\nHiệu năng mạnh mẽ\r\n•	Sức mạnh của A8 Star khá ấn tượng đến từ Snapdragon 660 mạnh mẽ mang lại khả năng xử lý các tác vụ mượt mà và nhanh chóng.\r\nCamera chất lượng cao\r\n•	Một trong những điểm mạnh của A8 Star phải kể đến đó chính là camera sau có độ phân giải cao, với ống kính chính 16 MP và phụ 24 MP, tích hợp nhiều công nghệ chụp ảnh hiện đại và xoá phông tuyệt đỉnh.\r\nDung lượng pin khủng\r\n•	Máy được trang bị viên pin 3700 mAh có hỗ trợ công nghệ sạc nhanh, hứa hẹn sẽ cho bạn một thời gian sử dụng tương đối thoải mái trong khoảng 1 ngày với các tác vụ cơ bản.\r\n', 1, 1, 2, NULL, NULL),
(48, 'ssa7', 'Điện thoại Samsung Galaxy A7 (2018) 128GB', 'samsung-galaxy-a70-black-400x460.png', 6000000, 'Mượt mà hơn với nâng cấp RAM 6 GB và chip Exynos 7885\r\n•	Sức mạnh cung cấp cho Galaxy A7 (2018) 128 GB chính là con chip Exynos 7885, đáp ứng mượt mà cho các nhu cầu giải trí hằng ngày của bạn.\r\nMới lạ hơn với thiết kế vân tay cạnh bên\r\n•	Samsung Galaxy A7 (2018) 128GB sở hữu lối thiết kế nguyên khối với khung kim loại chắc chắn cùng vân tay ở cạnh bên\r\nChiếc điện thoại Samsung đầu tiên trang bị 3 camera mặt sau\r\n•	Samsung Galaxy A7 (2018) 128GB là chiếc smartphone đầu tiên của Samsung được trang bị cụm camera với 3 thấu kính có độ phân giải lần lượt là 24 MP, 8 MP và 5 MP\r\n \r\n', 1, 1, 2, NULL, NULL),
(49, 'ssa50', 'Điện thoại Samsung Galaxy A50 128GB', 'samsung-galaxy-a50-128gb-blue-400x460.png', 7000000, 'Thiết kế màn hình Infinity-U độc đáo\r\n•	Samsung Galaxy A50 là mẫu smartphone đầu tiên mà Samsung sử dụng màn hình Infinity-U với phần notch nhỏ gọn hình giọt nước.\r\nCông nghệ cảm biến vân tay tiên tiến\r\n•	Samsung mới chỉ sử dụng công nghệ cảm biến vân tay trong màn hình trên bộ đôi siêu phẩm Galaxy S10 và S10+ vừa ra mắt trước đó nhưng trên Galaxy A50 Samsung cũng đã ưu ái trang bị công nghệ này.\r\nMàn hình kích thước lớn thoải mái sử dụng\r\n•	Samsung Galaxy A50 128GB sở hữu màn hình có kích thước lên tới 6.4 inch, tương đương với màn hình của chiếc Samsung Galaxy Note 9 hay Galaxy S10+.\r\nCamera chính phục bóng đêm\r\n•	Camera cũng là một điểm sáng trên Samsung Galaxy A50 128GB với cụm 3 camera ở mặt sau với camera chính 25 MP và hai cảm biến phụ 8 MP, 5 MP.\r\n', 1, 1, 2, NULL, NULL),
(50, 'vivov15', 'Điện thoại Vivo V15 128GB', 'vivo-v15-quanghai-400x460.png', 7000000, 'Thiết kế tràn viền hoàn hảo\r\n•	Vivo V15 sẽ cho bạn cảm nhận màn hình đúng nghĩa tràn viền bởi trên mặt trước của máy không hề có vị trí nào cho camera selfie mà thay vào đó camera sẽ được giấu kín với cơ chế pop-up (khi sử dụng thì dịch chuyển ra).\r\nCamera sefie pop-up 32 MP\r\n•	Bạn sẽ rất ngạc nhiên với chiếc camera sefie có cơ chế \"ẩn - hiện\" này có độ phân giải khủng lên đến 32 MP hơn cả độ phân giải của camera sau.\r\nHiệu năng ổn định với chip MediaTek Helio P70\r\n•	Không giống như phiên bản V15 Pro, chiếc điện thoại Vivo V15 được trang bị con chíp xử lí MediaTek Helio P70 8 nhân đi cùng với RAM 6 GB và bộ nhớ trong 128 GB tạo không gian bộ nhớ rộng rãi để thiết bị chạy các ứng dụng trơn tru mượt mà hơn.\r\nNăng lượng kéo dài\r\n•	Cung cấp năng lượng cho Vivo V15 là viên pin có dung lượng 4000 mAh giúp kéo dài thời gian sử dụng của thiết bị để trải nghiệm được trọn vẹn hơn.\r\n', 1, 1, 7, NULL, NULL),
(51, 'vivov11i', 'Điện thoại Vivo V11i', 'vivo-v11i-blue-400x460.png', 5000000, 'Thiết kế đến từ tương lai\r\n•	Vivo V11i sở hữu cho mình lối thiết kế tuyệt đẹp với thân hình thanh thoát, uyển chuyển bởi các đường cong mềm mại đan xen một chút mạnh mẽ.\r\nHiệu năng đáp ứng mượt mà\r\n•	Dù sở hữu cấu hình không quá mạnh nhưng với con chip Helio P60 mà máy được trang bị cũng đủ để làm hài lòng bạn trong những thao tác cơ bản trở nên ổn định và mượt mà.\r\n•	Bên cạnh đó, kết hợp với 4G RAM cùng 128 GB bộ nhớ trong giúp bạn thoái chạy đa nhiệm các ứng dụng cũng như lưu trữ dữ liệu cá nhân\r\nCamera kép chuyên nghiệp\r\n•	Về khả năng nhiếp ảnh, Vivo V11i đem lại cho bạn một chất lượng ảnh rất tuyệt nhờ hệ thống camera kép: cảm biến chính có độ phân giải 16 MP + 5 MP dành cho cảm biến phụ, được hỗ trợ nhiều tính năng chụp ảnh hiện đại.\r\nTích hợp nhiều tính năng hiện đại\r\n•	Trợ lý ảo Jovi cũng được xuất hiện trên V11i với những thuật toán thông minh giúp bạn rút ngắn thời gian trong việc tìm kiếm thông tin hay điều khiển máy một cách dễ dàng.\r\n•	Kèm với tính năng mở khoá bằng khuôn mặt hiện đại cùng bảo mật vân tay cho bạn sự lựa chọn đa dạng hơn trong sử dụng.\r\n \r\n', 1, 1, 7, NULL, NULL),
(52, 'vvy85', 'Điện thoại Vivo Y85', 'vivo-y85-1-3.jpg', 3000000, 'Thiết kế theo xu thế\r\n•	Đầu năm 2018 dường như là thời gian ra mắt của một loạt smartphone thiết kế “tai thỏ”, và Vivo Y85 cũng không phải ngoại lệ.\r\nMàn hình kích thước lớn\r\n•	Màn hình của máy có kích thước 6.22 inch, sử dụng tấm nền IPS LCD.\r\nHiệu năng ổn định\r\n•	Vivo Y85 dự kiến được cung cấp sức mạnh xử lý bởi con chip mới MediaTek MT6762, RAM 4 GB, bộ nhớ trong 32 GB.\r\nCamera chất lượng tốt\r\n•	Vivo Y85 sở hữu hệ thống camera kép 13 MP (cảm biến chính) + 2 MP (cảm biến phụ) ở mặt lưng, có cùng khẩu độ f/2.0 hứa hẹn mang đến cho người dùng những bức ảnh chân dung, xóa phông đẹp mắt.\r\n', 1, 1, 7, NULL, NULL),
(53, 'vvy91c', 'Điện thoại Vivo Y91C', 'vivo-y91c-400x460.png', 2000000, 'Thiết kế thời trang cuốn hút\r\n•	Vivo Y91C đi theo xu hướng với lối thiết kế unibody phong cách cùng điểm nhấn về màu sắc gây mê mẩn người dùng.\r\nMàn hình kiểu \"giọt nước\" thích mắt\r\n•	Chiếc smartphone của Vivo này ấn tượng người dùng bởi kiểu hiển thị màn hình khuyết hình giọt nước xinh xắn và đáng yêu\r\nHiệu năng ổn định đủ trải nghiệm\r\n•	Chiếc điện thoại Vivo Y91C có cấu hình tầm trung được trang bị con chip xử lí MediaTek 6762R (bản nâng cấp của Helio P22) chạy trên hệ điều hành Android 8.1 (Oreo) kết hợp với giao diện FunTouch giúp máy có được độ mượt mà để trải nghiệm được tốt nhất.\r\nChụp hình chất lượng với nhiều tính năng hấp dẫn\r\n•	Camera sau của điện thoại Vivo Y91C có độ phân giải 13 MP có chức năng chụp ảnh bằng giọng nói và cử chỉ giúp bạn có thể thuận tiện trong chụp nhóm từ xa mà không cần phải ngại ngùng đi nhờ người chụp hộ.\r\nDung lượng pin khủng\r\n•	Viên pin của Vivo Y91C có dung lượng tới 4030 mAh đây là con số khá khủng giúp thời gian trải nghiệm của máy được lâu hơn, bền bỉ hơn.\r\n \r\n', 1, 1, 7, NULL, NULL),
(54, 'vvy91', 'Điện thoại Vivo Y91', 'vivo-y91-400x460.png', 3000000, 'Thiết kế thời trang đầy phong cách hiện đại\r\n•	Đi theo xu hướng mới, Vivo Y91 sở hữu cho mình lối thiết kế unibody tuyệt đẹp, được tô điểm bởi những sắc màu trẻ trung, năng động và quyến rũ.\r\nHiệu năng mượt mà với chip MediaTek MT6762\r\n•	Dù không được trang bị cấu hình quá mạnh nhưng với con chip MediaTek MT6762R kết hợp 3 GB RAM cũng đã đủ để cho Vivo Y91 có được những trải nghiệm mượt mà và ổn định nhất.\r\nCamera kép chất lượng có AI đi kèm\r\n•	Dù sở hữu thông số camera sau không quá ấn tượng khi có độ phân giải chỉ là 13 MP (ống kính chính) và 2 MP (ống kính phụ) nhưng bạn sẽ cảm thấy ngạc nhiên về khả năng nhiếp ảnh của máy.\r\nTrải nghiệm thật lâu với dung lượng pin cực khủng\r\n•	Vivo Y91 sở hữu cho mình viên pin có dung lượng 4030 mAh, tuy chưa là khủng nhất nhưng mọi trải nghiệm của bạn giờ đây sẽ không còn bị giới hạn bởi 2 từ \"pin yếu\" nữa.\r\n', 1, 1, 7, NULL, NULL),
(55, 'vvy71', 'Điện thoại Vivo Y71', 'vivo-y711.jpg', 2000000, 'Thiết kế theo xu thế\r\n•	Đã là năm 2018 rồi mà smartphone không sử dụng màn hình 18:9 thì \"thật khó chấp nhận\" và chiếc điện thoại Vivo này là một chiếc máy đi theo thời đại.\r\nHiệu năng khá với chip Snapdragon 425\r\n•	Vivo Y71 được Vivo sử dụng con chip Snapdragon 425 kết hợp với RAM 3 GB và tuy nhiên bộ nhớ trong chỉ có 16 GB, điều này sẽ khiến bạn cần đến sự hỗ trợ của khe cắm thẻ nhớ microSD.\r\nCamera chất lượng\r\n•	Đối với những chiếc máy giá rẻ thì camera vẫn luôn là một điểm yếu khi không được các nhà sản xuất chú trọng đầu tư nhiều.\r\nPin khá với dung lượng 3360 mAh\r\n•	Vivo Y71 được trang bị một viên pin có dung lượng là 3.360 mAh đem lại một thời lượng sử dụng pin thực tế ở mức tốt.\r\n', 1, 1, 7, NULL, NULL),
(56, 'vsa1', 'Điện thoại Vsmart Active 1+', 'vsmart-active-1-plus-blue-400x460.png', 4000000, 'Thiết kế đi cùng xu thế mới\r\n•	Vsmart Active 1+ nổi bật với ngôn ngữ thiết kế unibody hiện đại kết hợp với màn hình tai thỏ độc đáo đang trở thành xu thế hiện nay.\r\nHiệu năng vượt trội với Snapdragon 660\r\n•	Nếu xét về cấu hình Active 1+ không hề kém cạnh so với bất kì đối thủ nào của nó khi được trang bị con chip Snapdragon 660 mạnh mẽ kết hợp với 6 GB RAM đi kèm.\r\nChất lượng với cụm camera 2 thấu kính.\r\n•	Vsmart Active 1+ sở hữu cụm camera kép phía sau có cảm biến chính 12 MP và cảm biến thứ hai 24 MP đáp ứng nhanh chóng cho nhu cầu chụp ảnh xóa phông của bạn.\r\n•	Bên cạnh đó máy còn hỗ trợ khả năng quay phim lên đến 4K 2160p@30fps hứa hẹn sẽ cho ra những thước phim ấn tượng với độ phân giải cao\r\nDung lượng pin khủng, có sạc nhanh theo kèm\r\n•	Bên trong thân máy là viên pin có dung lượng 3650 mAh đáp ứng khá thoải mái và bền bỉ cho mọi nhu cầu giải trí thường ngày của bạn.\r\n', 1, 1, 9, NULL, NULL),
(57, 'vsjoy1', 'Điện thoại Vsmart Joy 1 32GB', 'vsmart-joy-1-black-400x460.png', 2000000, 'Thiết kế đầy trẻ trung, năng động\r\n•	Dù thuộc phân khúc smartphone giá rẻ nhưng Vsmart Joy 1 vẫn được chăm chút khá kỹ lưỡng về ngoại hình khi sở hữu lối thiết kế unibody tuyệt đẹp.\r\nMàn hình rộng rãi trên kích thước 5.45 inch\r\n•	Nhờ được trang bị màn hình tỷ lệ 18:9 nên bạn sẽ được một không gian vô cùng rộng rãi để thưởng thức những bộ phim hay.\r\nHiệu năng vượt trội trong tầm giá\r\n•	So với các đối thủ của nó, Vsmart Joy 1 có một cấu hình mạnh mẽ khi sở hữu con chip Snapdragon 435 đi kèm 3 GB RAM cùng 32 GB bộ nhớ trong.\r\nChất lượng với chỉ một camera sau\r\n•	Tuy không có cụm camera kép như các đàn anh của nó nhưng Vsmart Joy 1 vẫn có khả năng chụp hình ấn tượng với một camera có độ phân giải 13 MP.\r\nDung lượng pin khá\r\n•	Vsmart Joy 1 sở hữu cho mình viên pin có dung lượng 3000 mAh, đáp ứng thoải mái cho nhu cầu xem phim, lướt web hay chơi game của bạn trong khoảng 1 ngày.\r\n', 1, 1, 9, NULL, NULL),
(58, 'vsjoy', 'Điện thoại Vsmart Joy 1+ 32GB', 'vsmart-joy-1-plus-black-400x460.png', 2000000, 'Thiết kế tinh xảo cùng xu thế màn hình tai thỏ\r\n•	Điểm gây ấn tượng nhất cho bạn khi nhìn ngắm Vsmart Joy 1+ có lẽ đến từ chiếc tai thỏ độc đáo được cách điệu trong một không gian trải nghiệm rộng rãi với kích thước 6.18 inch.\r\nHiệu năng mượt mà, ổn định\r\n•	Vsmart Joy 1+ được cung cấp một sức mạnh ở mức vừa phải với con chip Snapdragon 430nhưng với mọi tác vụ thường ngày của bạn máy vẫn xử lý một cách trơn tru, mượt mà.\r\n•	Máy chiến được các loại game nổi tiếng hiện nay như Liên Quân khá mượt với cấu hình tinh chỉnh về mức tầm trung hay các game giải trí khác như Plants vs. Zombies, Clash of Clans.\r\nSelfie ảo diệu với cụm camera trước siêu khủng\r\n•	Có thể thấy, Vsmart Joy 1+ sinh ra để đáp ứng cho các tín đồ đam mê chụp ảnh selfie khi nó được trang bị độ phân giải lên đến 16 MP hỗ trợ thêm đèn flash trợ sáng.\r\n•	Nhờ thế mà, mỗi bức ảnh tự sướng cho ra luôn ấn tượng với độ sáng cao, màu sắc hài hòa, tự nhiên ngay cả khi bạn chụp trong điều kiện thiếu sáng.\r\nDung lượng pin khủng\r\n•	Vsmart Joy 1+ mang trong mình viên pin có dung lượng 4000 mAh, ắt hẳn bạn sẽ có những phút giây trải nghiệm vô tư, thoải mái trong 1 ngày sử dụng.\r\n', 1, 1, 9, NULL, NULL),
(59, 'xxgo', 'Điện thoại Xiaomi Redmi Go', 'xiaomi-redmi-go-black-400x460.png', 1000000, 'Chạy hệ điều hành Android Go\r\n•	Android Go là phiên bản rút gọn của Android One - dự án phần mềm mới của Google dành cho các smartphone cấu hình giới hạn hoặc RAM 1 GB trở xuống.\r\nXiaomi Redmi Go chạy trên hệ điều hành này được tối ưu hoá và tinh chỉnh lại các ứng dụng, để phù hợp và chạy mượt mà hơn.\r\nThiết kế đơn giản, đa dạng màu sắc\r\n•	Redmi Go có thiết kế nguyên khối đơn giản cùng 2 màu sắc thời trang là xanh dương hoặc đen.\r\nDung lượng pin lớn 3000 mAh\r\n•	Thông thường với các smartphone giá rẻ, dung lượng pin chỉ khoảng 2000 mAh, nhưng với Redmi Go, máy được ưu ái có viên pin lên tới 3000 mAh.\r\nHỗ trợ mạng di động 4G\r\n•	Redmi Go hỗ trợ 2 SIM 2 sóng và hỗ trợ cả mạng 4G. Bạn hoàn toàn có thể sử dụng kết nối mạng nhanh chóng để thoả mãn được nhu cầu lướt web hằng ngày.\r\n', 1, 1, 5, NULL, NULL),
(60, 'xxredmi7', 'Điện thoại Xiaomi Redmi 7 32GB', 'xiaomi-redmi-7-red-docquyen-400x460.png', 3000000, 'Camera kép xoá phông tốt\r\n•	Nếu như cấu hình vẫn chưa đủ làm bạn hài lòng thì Redmi 7 còn sở hữu cho mình cụm camera kép ở mặt lưng với khả năng chụp ảnh xóa phông khá ảo diệu.\r\nNgoại hình bắt mắt và nổi bật\r\n•	Bên trong tốt là thế nhưng ngoại hình của máy vẫn rất được chú ý với kiểu hoàn thiện bóng bẩy và thời trang.\r\niên pin khủng đến 4000 mAh\r\n•	Để người dùng có được trải nghiệm \"hoàn hảo\" nhất thì nhà sản xuất cũng đã rất cố gắng khi mang đến viên pin dung lượng lên tới 4000 mAh.\r\n', 1, 1, 5, NULL, NULL),
(61, 'xxnote7', 'Điện thoại Xiaomi Redmi Note 7 64GB', 'xiaomi-redmi-note-7-400x460.png', 4000000, 'Hiệu năng mạnh mẽ trải nghiệm game mượt mà\r\n•	Redmi Note 7 xứng đáng là một trong những chiếc smartphone có hiệu năng tốt, với điểm Antutu đo được khoảng 137586.\r\nThiết kế hiện đại, theo xu thế\r\n•	Chiếc điện thoại Xiaomi mới là một sự lột xác hoàn toàn về thiết kế so với các dòng Redmi trước đây.\r\nMàn hình giọt nước thích mắt\r\n•	Xiaomi Redmi Note 7 sở hữu màn hình 6.3 inch của có tỷ lệ khung hình 19.5:9, độ phân giải Full HD+ (2.340 x 1.080 pixel).\r\nCamera chất lượng tốt trong tầm giá\r\n•	Xiaomi Redmi Note 7 trở thành chiếc điện thoại có camera \"khủng\" giá rẻ nhất trên thị trường hiện nay với \"số chấm\" lên tới  48 MP.\r\nDung lượng pin khủng\r\n•	Xiaomi Redmi Note 7 được trang bị viên pin có dung lượng lên tới 4000 mAh cho bạn sử dụng thoải mái cả ngày dài.\r\n', 1, 1, 5, NULL, NULL),
(62, 'xxnote6', 'Điện thoại Xiaomi Redmi Note 6 Pro 64GB', 'xiaomi-redmi-note-6-pro-black-1-400x460.png', 5000000, 'Thiết kế theo xu hướng\r\n•	Xiaomi Redmi Note 6 Pro mang đến cho bạn một cái nhìn thân thuộc đến từ thiết kế của máy trông có phần giống như chiếc điện thoại iPhone X.\r\n\r\nMàn hình rộng chuẩn Full HD+\r\n•	Redmi Note 6 Pro sở hữu màn hình kích thước lên đến 6.26 inch với tấm nền IPS đảm bảo cho bạn có những khung hình sắc nét, sống động và một góc nhìn rộng.\r\nHiệu năng ổn định với Snapdragon 636\r\n•	Sức mạnh cung cấp cho Redmi Note 6 Pro chính là con chip Snapdragon 636 mạnh mẽ đi kèm với 4 GB RAM.\r\nCamera kép cả trước và sau\r\n•	Redmi Note 6 Pro được trang bị cụm camera kép phía sau với độ phân giải 12 MP (cảm biến chính) và 5 MP (cảm biến phụ) đáp ứng nhanh chóng cho nhu cầu chụp ảnh xóa phông của bạn\r\nDung lượng pin khủng\r\n•	Với viên pin 4000 mAh hứa hẹn sẽ cho bạn thời gian sử dụng vô cùng thoải mái mỗi khi thưởng thức những bộ phim hay mà không cần phải quan tâm đến việc sạc pin cho máy.\r\n \r\n', 1, 1, 5, NULL, NULL),
(63, 'xxmi8', 'Điện thoại Xiaomi Mi 8 Lite', 'xiaomi-mi-8-black-400x460.png', 5000000, 'Thiết kế bắt mắt, thu hút mọi ánh nhìn\r\n•	Điểm nhấn trên chiếc điện thoại Xiaomi này chính là phần mặt lưng với chất liệu kính với hiệu ứng gradient biến đổi màu sắc tùy theo mức độ ánh sáng chiếu vào. Nó thực sự đẹp mắt và ấn tượng mỗi khi nhìn vào.\r\nCamera chất lượng không kém các máy cao cấp\r\n•	Camera kép phía sau của Xiaomi Mi 8 Lite gồm ống kính chính độ phân giải 12 MP có khẩu độ f/1.9 + cảm biến chiều sâu 5 MP với khẩu độ f/2.0, có thể tùy chỉnh độ mờ phông nền và đi kèm với tính năng AI Scene Recognition.\r\nHiệu năng mạnh mẽ trong phân khúc\r\n•	Mi 8 Lite dùng chip Snapdragon 660 AIE (chuyên xử lý các tác vụ liên quan đến trí tuệ nhân tạo) được sản xuất trên quy trình FinFET 10 nm, kết hợp với nhân đồ họa Adreno 512.\r\nMàn hình tai thỏ đẹp hơn\r\n•	Giống như các người anh em của mình, Xiaomi Mi 8 Lite cũng có notch ở phía trên màn hình nhưng kích thước đã được tinh giản tới mức tối thiểu.\r\n', 1, 1, 5, NULL, NULL);
INSERT INTO `sanphams` (`id`, `ma`, `ten`, `avatar`, `gia`, `mota`, `idnguoidung`, `idloai`, `idhang`, `updated_at`, `created_at`) VALUES
(64, 'xxmia2', 'Điện thoại Xiaomi Mi A2 Lite', 'xiaomi-mi-a2-lite-gold-400x460.png', 3000000, 'Màn hình tai thỏ thời thượng\r\n•	Nếu như bạn là một người dùng thích một smartphone có \"tai thỏ\", một màn hình mang hơi hướng của iPhone X thì chiếc điện thoại Xiaomi này sẽ là sự lựa chọn hợp lý dành cho bạn.\r\nThiết kế kim loại nguyên khối chắc chắn\r\n•	Một thiết kế kim loại nguyên khối quen thuộc và chắc chắn là điểm cộng khá lớn của Xiaomi Mi A2 Lite so với các đối thủ trong phân khúc.\r\nHiệu năng là lợi thế\r\n•	Cung cấp sức mạnh cho máy là con chip Snapdragon 625 8 nhân 64-bit với hiệu năng khá ấn tượng tới từ Qualcomm đi kèm với 3 GB RAM đáp ứng tốt hầu hết nhu cầu sử dụng của người dùng.\r\nCamera tích hợp trí tuệ nhân tạo AI\r\n•	Xiaomi Mi A2 Lite gây ấn tượng bởi hệ thống camera kép gồm 2 cảm biến với cảm biến chính 12 MP + 5 MP cảm biến chiều sâu được tích hợp sẵn AI.\r\nDung lượng pin lớn\r\n•	Viên pin 4.000 mAh giúp bạn có thể sử dụng máy khá thoải mái trong khoảng hơn 1 ngày.\r\n', 1, 1, 5, NULL, NULL),
(65, 'a31431', 'Laptop Acer Aspire A314 31 C2UX N3350 (NX.GNSSV.008)', 'acer-aspire-a314-31-c2ux-nxgnssv008-ava-1-600x600.jpg', 6000000, '-Máy tính văn phòng phục vụ nhu cầu cơ bản, nhu cầu học tập thiết yếu, giải trí nhẹ nhàng\r\n-Acer Aspire A314 31 C2UX N3350 (NX.GNSSV.008) được trang bị cấu hình với RAM DDR3L 2 GB, ổ cứng HDD 500 GB cho bạn thoải mái lưu trữ dữ liệu cần thiết.\r\n\r\n-Thiết kế máy đơn giản, cùng trọng lượng 1.6 kg cho việc di chuyển máy dễ dàng hơn\r\n•	Acer Aspire A314 31 C2UX N3350 với thiết kế mang tính đặc trưng của một sản phẩm laptop thuộc phân khúc học tập - văn phòng, chất liệu vỏ nhựa có độ dày 20.15 mm.\r\n-Chuột cảm ứng đa chạm tiện lợi khi sử dụng\r\n•	Với chuột cảm ứng có diện tích lớn, nhạy và dễ dàng nhận tín hiệu từ các thao tác tay, cho người dùng sử dụng tiện lợi khi làm việc, giải trí.\r\n-Cổng kết nối đáp ứng nhu cầu sử dụng cơ bản, sao chép dữ liệu, kết nối máy chiếu, kết nối dây mạng\r\n•	Acer Aspire A314 31 C2UX N3350 (NX.GNSSV.008) nổi bật với việc được trang bị cổng kết nối USB 3.0 giúp sao chép, truyền tải dữ liệu nhanh, cổng HDMI cho phép laptop kết nối với tivi, máy chiếu để truyền tải hình ảnh, âm thanh một cách tiện lợi. Bên cạnh đó, máy còn được trang bị cổng LAN RJ45tiện dụng kết nối trực tiếp với dây mạng khi tín hiệu đường truyền wifi có chất lượng không ổn định.\r\n', 1, 2, 16, NULL, NULL),
(66, 'a51553', 'Laptop Acer Aspire A515 53 3153 i3 ', 'acer-aspire-a515-53-3153-i3-8145u-4gb-1gb-win10-n-33397-conent-cauhinhtgdd.jpg', 12000000, 'Thiết kế trang nhã nhưng cũng không kém phần năng động\r\n•	Laptop Acer Aspire A515 (NX.H6BSV.005) được gia công tỉ mỉ và hoàn thiện từ chất liệu nhựa với hai tông màu chủ đạo là đen và bạc cùng với đó là 4 góc cạnh được bo tròn nhẹ tạo nên vẻ đẹp năng động nhưng cũng không kém phần trang nhã cho sản phẩm. Bên cạnh đó, với trọng lượng 2 Kg giúp cho bạn khá thuận tiện khi mang theo sản phẩm đến trường hoặc công ty mà không cảm thấy mệt mỏi.\r\nXử lý hình ảnh sắc nét đến từng chi tiết\r\n•	Sản phẩm được trang bị màn hình khá lớn 15.6 inch kết hợp với độ phân giải Full HD (1920 x 1080)cùng với công nghệ màn hình chống chói Acer ComfyView giúp cho người dùng có thể thoải mái trải nghiệm hình ảnh sắc nét ở điều kiện ngược sáng với cảm giác tuyệt vời nhất.\r\nCấu hình xử lý tốt các thao tác đồ họa cơ bản\r\n•	Máy tính xách tay Acer Aspire A515 (NX.H6BSV.005) được trang bị bộ vi xử lý mạnh mẽ Intel core i3 8145U kết hợp cùng 4GB Ram DDR4 giúp đem lại khả năng xử lý mượt mà các ứng dụng văn phòng cũng như các ứng dụng đồ họa cơ bản như photoshop, AI,...\r\nHỗ trợ khe cắm SSD M.2 PCIe\r\n•	Nhà sản xuất đã khá ưu ái cho đứa con của mình khi đã tích hợp chuẩn kết nối SSD M.2 PCIe giúp người dùng có thể dễ dàng nâng cấp ổ cứng SSD M.2 tốc độ cao, mang lại trải nghiệm tuyệt vời hơn khi sử dụng.\r\nCổng kết nối USB Type C, USB 3.0 truyền dữ liệu nhanh chóng\r\n•	Ngoài những cổng kết nối căn bản thì laptop Acer Aspire A515 (NX.H6BSV.005) còn được tích hợp sẵn cổng kết nối Type C và USB 3.0  giúp bạn có thể truyền dữ liệu một cách nhanh chóng.\r\nTích hợp bàn phím số tiện lợi\r\n•	Bàn phím của laptop Acer Aspire A515 (NX.H6BSV.005) đã được nhà sản xuất tích hợp thêm Numpad giúp cho người dùng có thể thao tác dễ dàng hơn, nhất là với những ai thường xuyên phải làm việc với những con số.\r\n \r\n', 1, 2, 16, NULL, NULL),
(67, 'e5576g', 'Laptop Acer Aspire E5 576G ', 'acer-aspire-e5-576g-88ep-nxgwnsv001-33397-thumb333-600x600.jpg', 16000000, 'Hiệu năng tối ưu hơn với Intel Optane 16 GB\r\n•	Acer Aspire E5 576G 88EP sở hữu cấu hình vô cùng mạnh mẽ với bộ vi xử lí Intel Core i7 Kabylake Refresh thế hệ thứ 8, laptop có bộ nhớ Intel Optane 16 GB được trang bị giúp sàn lọc và lưu trữ dữ liệu cần thiết của các phần mềm, ứng dụng hay sử dụng góp phần hỗ trợ khởi động nhanh các ứng dụng ở những lần sử dụng sau. Bên cạnh đó, những tác vụ thông thường sẽ hoạt động vô cùng trơn tru, thao tác chuyên về xử lý đồ họa, kĩ thuật cũng sẽ có hiệu năng mượt mà không kém với card đồ họa rời NVIDIA Geforce MX130, 2GB được tích hợp.\r\n•	Ngoài ra, ổ cứng HDD với dung lượng lên đến 1 TB, cho người dùng thoải mái lưu trữ, từ các dữ liệu học tập, làm việc cho đến dữ liệu các tựa game.\r\nThiết kế cứng cáp chắc chắn\r\n•	Laptop Acer Aspire E5 576G 88EP có thiết kế với chất liệu vỏ nhựa cứng cáp, các góc cạnh vuông vức chắc chắn. Máy với trọng lượng chỉ 2.23 kg, không quá bất tiện cho người dùng mang máy theo sử dụng.\r\nMàn hình Full HD 15.6 inch\r\n•	Máy sở hữu màn hình 15.6 inch cùng độ phân giải Full HD kết hợp công nghệ ACER CineCrystal LED Backlit cho hình ảnh sắc nét, sống động ở từng góc nhìn mang đến không gian thoải mái khi làm việc, học tập, cũng như xem phim, lướt web.\r\nBàn phím và TouchPad thông minh\r\n•	Bàn phím với các phím bấm to, có độ nảy tốt, được bố trí hợp lý hỗ trợ nhập dữ liệu nhanh chóng. Multi TouchPad đa chạm thông minh, nhận diện chuẩn xác các thao tác từ ngón tay, thuận tiện hơn trong học tập và làm việc\r\nÂm thanh sống động\r\n•	Acer Aspire E5 576G được trang bị loa kép kết hợp Acer TrueHarmony cho âm thanh chân thực, sống động trong từng chất âm phát ra cho trải nghiệm chất lượng âm thanh khi xem phim, nghe nhạc tuyệt vời hơn.\r\nCổng kết nối đa dạng\r\n•	Máy được trang bị đầy đủ các cổng kết nối như USB 2.0, USB 3.0, LAN...Đặc biệt là cổng USB Type-C cho tốc độ truyền dữ liệu nhanh hơn nhiều lần so với các cổng truyền thống. Cổng HDMI giúp truy xuất hình ảnh từ laptop ra máy chiếu, tivi tiện lợi hơn trong những cuộc họp, thuyết trình.\r\n', 1, 2, 16, NULL, NULL),
(68, 'sf314', 'Laptop Acer Swift SF314 54 51QL i5 ', 'acer-swift-sf314-54-51ql-nxgxzsv001-1-4.jpg', 15000000, 'Thiết kế máy hiện đại, tinh tế\r\n•	Laptop Acer Swift SF314 có thiết kế chất liệu vỏ  kim loại sang trọng, cao cấp phù hợp cho mọi người. Chiếc máy này có độ mỏng 18.7 mm cho khả năng mang vác tiện dụng hơn.\r\nCấu hình được cải tiến công nghệ mới\r\n•	Laptop Acer được trang bị Intel Core i5 8250U với phiên bản nâng cấp mới nhất hiện tại là Kabylake Refresh (được gọi là thế hệ thứ 8). RAM trang bị trên máy là chuẩn DDR4 4 GB, ổ cứng HDD 1 TBthoải mái lưu trữ dữ liệu và một card đồ họa tích hợp Intel UHD Graphics 620.\r\nMàn hình 14 inch Full HD sắc nét\r\n•	Acer Core i5 được trang bị màn hình 14 inches kèm theo độ phân giải Full HD (1920 x 1080) cùng được trang bị tấm nền IPS và viền màn hình mỏng giúp cho hình ảnh to rõ hơn, sắc nét sống động hơn.\r\nNhiều tính năng kèm theo thú vị\r\n•	Thuộc dòng sản phẩm trung cao, Acer Swift SF314 được tích hợp khá nhiều tính năng nâng cao trải nghiệm như bảo mật vân tay, đèn bàn phím để dùng buổi đêm, micro kép để thu âm thanh tốt hơn hay công nghệ Acer TrueHarmony tăng chất lượng âm thanh.\r\nCổng kết nối đa dạng\r\n•	Laptop này trang bị đầy đủ các chuẩn kết nối thế hệ mới, thích hợp với nhiều loại thiết bị ngoại vi hiện tại như: USB 2.0, USB 3.0, HDMI. Ngoài ra, máy còn có cổng USB Type-C cho tốc độ truyền tải dữ liệu rất nhanh.\r\n', 1, 2, 16, NULL, NULL),
(69, 'sp314', 'Laptop Acer Spin 3 SP314 51 39WK i3 ', 'acer-spin-3-sp314-51-39wk-i3-7130u-nxguwsv001-bv-tgdd-1.jpg', 11000000, 'Thiết kế, kiểu dáng tùy cơ ứng biến\r\n•	Acer Spin 3 có kiểu thiết kế vỏ nhựa, các cạnh máy cong và bo tròn nhẹ nhàng dựa trên tổng thể thiết kế vuông vức, nhìn rất sang trọng. Máy chỉ có độ dày 20.8 mm, trọng lượng 1.7 kg nên bạn có thể dễ dàng mang theo để sử dụng mọi lúc, mọi nơi\r\nMàn hình đa chức năng\r\n•	Như đã kể trên thì ngoài khả năng xoay 360 độ, màn hình của laptop Acer Core i3 này cũng có trang bị màn hình cảm ứng cực tiện lợi. Thêm nữa, thông số màn hình nổi bật bởi một vài đặc điểm như có kích thước 14 inch khá gọn, độ phân giải Full HD cùng tấm nền IPS và trang bị công nghệ chống chói Acer ComfyView mang lại khả năng hiển thị màu sắc tuyệt vời, xem nhiều góc độ khác nhau mà không biến đổi sắc màu.\r\nCấu hình khá\r\n•	Máy sử dụng chip Intel Core i3 Kabylake giúp mang lại hiệu năng hoạt động ổn định và nhanh hơn so với nhiều dòng cùng với mức chạy Core i3 thế hệ trước. Kết hợp thêm thanh RAM DDR4 4 GB giúp máy xử lý đa tác vụ thật tốt. Ngoài ra, Intel® HD Graphics 620 cũng đủ để giải mã các ứng dụng đồ họa căn bản và đa phần các game hot hiện nay.\r\nTouchpad đa cách điều khiển thông minh\r\n•	Laptop 2 trong 1 Acer Spin 3 hỗ trợ Multi TouchPad thông minh giúp sử dụng các thao tác cơ bản và có thể không dùng tới chuột rời\r\nÂm thanh độc quyền \r\n•	TrueHarmony là công nghệ âm thanh do hãng Acer phát triển với màng loa được làm từ giấy tổng hợp cho chất lượng âm thanh tốt, độ ngân và rung trung thực hơn so với màng loa thông thường. Công nghệ này giúp trải nghiệm khi xem phim, nghe nhạc sẽ tuyệt vời hơn nhờ chất lượng âm thanh sống động như thật.\r\n\r\nCổng kết nối đa dạng\r\n•	Cổng kết nối trên Acer Spin 3 SP314 51 39WK (NX.GUWSV.001) được trang bị đầy đủ các chuẩn mới nhất để sử dụng thuận tiện hơn. Bao gồm các loại cổng: khe cắm thẻ SD, USB 2.0, 2 x USB 3.0 cho khả năng sao chép dữ liệu rất tốt.\r\n', 1, 2, 16, NULL, NULL),
(70, 'sf114', 'Laptop Acer Swift SF114 32 P2SG N5000', 'acer-swift-sf114-32-p2sg-n5000-4gb-64gb-win10-nxg-2-1.jpg', 10000000, 'Thiết kế mỏng nhẹ, chắc chắn\r\n•	Laptop Acer Swift 1 được hoàn thiện từ nhôm nguyên khối, đảm bảo sự sang trọng và chắc chắn. Với trọng lượng chỉ 1.3Kg cùng độ mỏng 15mm, Swift 1 sẽ là mẫu laptop gọn gàng, thuận tiện để luôn mang theo bên mình.\r\nMàn hình tràn viền, sắc nét\r\n•	Màn hình của Laptop Acer Swift SF114 có độ phân giải FullHD độ nét cao, cùng với tấm nền IPS cho góc nhìn rộng, không bị sai màu khi nhìn từ góc nghiêng. Bên ngoài màn hình phủ một lớp chống chói thuận tiện hơn để sử dụng trong môi trường ngoài trời hoặc ánh sáng phức tạp.\r\nThời lượng pin lên đến 20 giờ\r\n•	Làm việc và học tập trên Laptop Acer Swift 1 sẽ ít bị gián đoạn hơn với thời lượng pin ấn tượng, lên đến 20 giờ sử dụng (theo hãng công bố). Bạn dễ dàng mang máy đi để sử dụng ở mọi nơi mà không lo hết pin giữa chừng.\r\nBản lề 180 độ\r\n•	Bản lề của Laptop Acer Swift SF114 32 có thể mở được một góc lên đến 180 độ, dễ dàng chia sẻ thông tin trong các cuộc họp, học nhóm...\r\nCảm biến vân tay tiện lợi\r\n•	Acer Swift 1 trang bị cảm biến vân tay giúp bạn khóa máy an toàn và mở máy nhanh chóng hơn chỉ với một chạm.\r\nCấu hình cơ bản, đủ dùng\r\n•	Mẫu laptop Acer được trang bị CPU Intel Pentium, 4GB RAM cùng ổ cứng eMMC 64 GB. Đủ dùng để xử lí các công việc văn phòng trên Word, Excel, PowerPoint, Photoshop đơn giản... hoặc dùng lướt web, giải trí.\r\n', 1, 2, 16, NULL, NULL),
(71, 'del3567', 'Laptop Dell Inspiron 3567 i3 ', 'dell-inspiron-3576-i3-7020u-450-600x600.png', 11000000, 'Thiết kế đơn giản cứng cáp\r\n•	Máy tính Dell Inspiron 3567 mang trên mình vẻ ngoài với thiết kế giống những laptop khác trong cùng phân khúc với chất liệu nhựa kết hợp tông màu đen mang đến sự cứng cáp, chắc chắn. Trọng lượng của máy không quá nặng chỉ vào khoảng 2.3 kg, người dùng vẫn có thể mang máy theo sử dụng mọi nơi.\r\nHiệu năng ổn định trong tầm giá\r\n•	Máy được trang bị bộ vi xử lí Core i3 Kabylake thế hệ thứ 7, cùng thanh RAM DDR4 (2 khe) 4 GB đáp ứng tốt yêu cầu của các tác vụ cơ bản như soạn thảo văn bản, nhập liệu, cũng như nhu cầu giải trí, xem phim, lướt web nhẹ nhàng.\r\n•	Bên cạnh đó, việc lưu trữ dữ liệu cũng sẽ trở nên thoải mái hơn với ổ cứng HDD lên đến 1 TB được trang bị máy.\r\nMàn hình Full HD 15.6 inch lớn hơn\r\n•	Laptop Dell sở hữu màn hình với kích thước lớn 15.6 inch với độ phân giải Full HD (1920 x 1080), kết hợp cùng công nghệ màn hình TrueLife LED-Backlit Display cho chất lượng hình ảnh hiển thị sắc nét, chân thực trong từng góc nhìn, đem đến tầm nhìn thoải mái khi học tập, làm việc cũng như giải trí.\r\nCác cổng kết nối đa dạng\r\n•	Máy được trang bị đầy đủ các cổng kết nối thường thấy trên các laptop trong cùng phân khúc như: USB 2.0, U2 x USB 3.0 hỗ trợ việc sao chép dữ liệu, cổng HDMI cho phép truy xuất hình ảnh, âm thanh từ laptop sang các màn hình lớn như máy chiếu, tivi một cách tiện lợi trong các buổi thuyết trình, hội thảo.\r\n', 1, 2, 12, NULL, NULL),
(72, 'dell3468', 'Laptop Dell Vostro 3468 i3 ', 'dell-vostro-3468-i3-7020u-70161069-ava-600x600.jpg', 11000000, 'Thiết kế truyền thống\r\n•	Laptop Dell Vostro 3468 i3 7020U có thiết kế vỏ nhựa chắc chắn, chống bám bụi bẩn, vân tay, chịu lực va chạm tốt. Độ mỏng của máy chỉ 23.4 mm và khối lượng là 1.76 kg nên rất dễ để mang máy đi sử dụng ở nhiều nơi.\r\nHiệu suất ổn định\r\n•	Máy được trang bị chip Intel Core i3 hệ thứ 7 tốc độ 2.3 GHz cho hiệu năng mượt mà, công suất hoạt động ổn định, xử lí nhanh với các tác vụ cơ bản cho học tập - công việc như: soạn thảo văn bản, lướt web hay check mail...Thanh RAM DDR4 4 GB hỗ trợ nâng cấp lên 8 GB cùng ổ cứng HDD dung lượng 1 TB đáp ứng tốt các yêu cầu cơ bản, hỗ trợ việc lưu trữ nhiều dữ liệu.\r\nMàn hình 14 inch, màu sắc chân thực\r\n•	Dell Vostro 3468 i3 có màn hình l14 inch, độ phân giải HD (1366 x 768 pixels) cho không gian làm việc lớn. Công nghệ màn hình TrueLife LED-Backlit Display giúp hình ảnh, màu sắc hiển thị chân thực sống động hơn.\r\nBàn phím và TouchPad\r\n•	Bàn phím của Dell Vostro 3468 có thiết kế truyền thống với khoảng cách giữa các phím hợp lí, vừa phải cho trải nghiệm tốt khi gõ phím. TouchPad có diện tích khá rộng và hỗ trợ đa chạm, nhờ đó máy cho một không gian thao tác lớn để thực hiện các thao tác.\r\nCổng kết nối đa dạng\r\n•	Máy được trang bị tất cả các kết nối cơ bản như cổng USB 2.0 và cổng USB 3.0 hay cổng LAN để kết nối mạng khi wifi yếu. Ngoài ra còn cổng VGA/ HDMI kết nối để xuất hình ảnh lên máy chiếu, tivi.\r\n', 1, 2, 12, NULL, NULL),
(73, 'del3568', 'Laptop Dell Vostro 3568 i3 ', 'dell-inspiron-3576-vti32072w-450-600x600.png', 11000000, 'Thiết kế truyền thống\r\n•	Laptop Dell Vostro 3568 có độ mỏng chỉ 23.65 mm và nặng 2.18 kg nên rất dễ để mang máy đi sử dụng ở nhiều nơi, rất tiện lợi và hợp xu hướng ngày nay.\r\nHiệu suất ổn định\r\n•	Máy đang trang bị chip Intel Core i3 thứ hệ thứ 6 cho hiệu năng mượt mà, tốc độ 2.0 GHz mang lại công suất hoạt động ổn định, xử lí nhanh với các tác vụ như: soạn thảo văn bản, lướt web hay check mail cho phản hồi nhanh chóng.\r\nMàn hình 15.6 inch thoải mái làm việc\r\n•	Dell Vostro này có màn hình lên tới 15.6 inch, độ phân giải HD (1366 x 768 pixels) cho chất lượng hiển thị tốt. Công nghệ màn hình TrueLife LED-Backlit Display giúp hình ảnh, màu sắc hiển thị chân thực sống động.\r\nCổng kết nối đa dạng\r\n•	Dell Core i3 được thiết kế khá mỏng nhưng vẫn còn trang bị ổ đĩa DVD để bạn cài win hoặc học ngoại ngữ, và có tất cả các kết nối cơ bản như cổng USB 2.0 và cổng USB 3.0, kết nối không dây Bluetooth để bạn sử dụng các thiết bị không dây như chuột, tai nghe. Ngoài ra còn cổng VGA/ HDMI kết nối máy chiếu, tivi, jack tai nghe tích hợp mic.\r\n \r\n', 1, 2, 12, NULL, NULL),
(74, 'del5770', 'Laptop Dell Inspiron 5570 i5 ', 'dell-inspiron-5570-m5i5238w-office365-33397-banphim.jpg', 16000000, 'Thiết kế tinh tế, đẳng cấp\r\n•	Tổng thể Dell Inspiron 5570 được hoàn thiện từ chất liệu vỏ nhựa nhưng nhìn khá giống với vỏ kim loại sang trọng. Máy chỉ mỏng 22.7 mm và nặng 2.3 kg cũng không quá khó khăn trong việc mang máy di chuyển.\r\nCấu hình vượt trội\r\n•	Có ngoại hình mảnh mai nhưng bên trong laptop Dell là một cơ bắp khỏe mạnh. Máy được trang bị CPU Intel Core i5 thế hệ thứ 8 nhanh hơn khi sử dụng bộ xử lý thế hệ 7, cùng với 4 GB RAM DDR4, ổ cứng HDD 1 TB có khả năng nâng cấp ổ cứng SSD M.2.\r\nMàn hình\r\n•	Bạn sẽ được thưởng thức các chi tiết hiển thị sắc nét trên Dell Core i5 với màn hình 15,6 inch Full HDvà tính năng chống chói để xem mọi thứ tốt hơn, đặc biệt là bên ngoài trời hoặc trong ánh sáng chói chang.\r\nChiếu sáng công việc của bạn\r\n•	Máy tính xách tay Dell Inspiron N5570 tích hợp bàn phím có đèn nền, cho phép bạn gõ thuận tiện trong môi trường ánh sáng yếu.\r\nOffice 365 tích hợp hỗ trợ công việc văn phòng của bạn\r\n•	Với bộ office 365 được tích hợp sẵn, bạn có thể sử dụng miễn phí 1 năm các ứng dụng văn phòng cần thiết word, excel, powerpoint,.. với nhiều tính năng mới được Microsoft cập nhật, thuận tiện công việc văn phòng hằng ngày của bạn\r\nCổng kết nối phong phú\r\n•	Mẫu máy tính này vẫn trang bị đầy đủ cổng kết nối như 2 x USB 3.0 truy xuất dữ liệu tốc độ cao, 1 x USB 2.0, HDMI truyền màn hình sắc nét.\r\n', 1, 2, 12, NULL, NULL),
(75, 'dell7373', 'Laptop Dell Inspiron 7373 ', 'dell-inspiron-7373-i5-8250u-8gb-256gb-win10-office-450-600x600.jpg', 26000000, 'Sử dụng miễn phí Office 365 trong 1 năm\r\n•	Bộ office 365 được tích hợp sẵn, bạn có thể sử dụng miễn phí 1 năm các ứng dụng văn phòng cần thiết word, excel, powerpoint,... Một bổ sung nhỏ nhưng cần thiết cho công việc hằng ngày của bạn. Không cần phải lo bị lỗi khi mở file bằng các phần mềm crack.\r\nThiết kế nhỏ gọn và mạnh mẽ\r\n•	Dell Inspiron 7373 có 4 viền bo tròn nhẹ và những đường cắt kim cương sắc cạnh làm tăng vẻ mạnh mẽ và lịch lãm. Máy được thiết kế bằng vật liệu vỏ nhôm nguyên khối, độ mỏng chỉ có 15.2 mm và trọng lượng 1.6 kg, kết hợp khả năng xoay gập 360 độ giúp tăng sự linh động, tiện lợi cho người dùng.\r\nMàn hình cảm ứng cực đã\r\n•	Bắt kịp với xu hướng công nghệ, Dell 7373 trang bị cho máy màn hình Full HD cực kỳ sắc nét với tấm nền IPS cho màu sắc chân thật, không gây ảo rực rỡ hay thiếu chi tiết. \r\nTouchpad rộng và đa cách sử dụng\r\n•	Touchpad thông minh có đầy đủ cách thao tác vuốt chạm giúp bạn sử dụng thoải mái trong quá trình giải trí, lướt web.\r\nBảo mật cao cấp với Windows Hello\r\n•	Được tích hợp camera hồng ngoại hoạt động kết hợp với Windows Hello có sẵn trong Windows 10 bản quyền nên Dell Inspiron 7373 i5 có thể bảo mật bằng nhận diện khuôn mặt thông minh, giúp người dùng mở khóa máy hiện đại hơn và không lo máy tính bị xâm nhập.\r\n', 1, 2, 12, NULL, NULL),
(76, 'hpda0054', 'Laptop HP 15 da0054TU i3 ', 'hp-15-da0054tu-4me68pa-33397-manhinh.jpg', 10000000, 'Thiết kế sang trọng tinh tế\r\n•	HP 15 da0054TU sở hữu thiết kế đơn giản, nhưng cũng không kém phần sang trọng và tinh tế với chất liệu từ nhựa cùng họa tiết vân tròn đồng tâm đẹp mắt. Máy với độ dày chỉ 22.5 mm cùng trọng lượng chỉ 1.77 kg tiện lợi cho người dùng mang máy theo sử dụng.\r\nCấu hình Intel Core i3 Kabylake thế hệ 7\r\n•	Được trang bị bộ vi xử lý Intel Core i3 Kabylake đảm bảo hệ thống vận hành mượt mà. Bộ nhớ Ram DDR4 4GB cho phép đa nhiệm nhiều chương trình một cách ổn định. Bên cạnh đó, laptop HP được trang bị ổ cứng HDD 500 GB  đáp ứng tốt nhu cầu lưu trữ dữ liệu thoải mái.\r\nThoải mái làm việc, học tập với màn hình 15.6 inch\r\n•	HP 15 da0054TU được trang bị màn hình kích thước 15.6 inch với độ phân giải Full HD, công nghệ màn hình HD BrightView LED-backlit cho khả năng hiển thị tuyệt vời, màu sắc trung thực, góc nhìn rộng.\r\nTouchPad đa chạm thông minh\r\n•	Multi TouchPad nhận diện nhiều tác động cùng lúc lên TouchPad và máy tính có thể hiểu được các tác động này để đưa ra các xử lý đúng yêu cầu.\r\nBàn phím to rõ, độ nảy tốt\r\n•	Bàn phím của máy tính văn phòng HP 15 da0054TU có độ nảy tốt, các phím to, rõ dễ dàng thao tác, phục vụ tốt nhu cầu thường xuyên phải soạn thảo và truy nhập dữ liệu cho người dùng như giáo viên, kế toán.\r\n', 1, 2, 13, NULL, NULL),
(77, 'hpda0055', 'Laptop HP 15 da0055TU i3 ', 'hp-15-da0055tu-4na89pa-600x600.jpg', 10000000, 'Thiết kế đơn giản, cứng cáp\r\n•	Vẫn là sự tối giản truyền thống trong thiết kế giống như các laptop trong cùng phân khúc của HP, máy với độ dày chỉ 22.5 mm, cùng với trọng lượng 1.8 kg khá thuận tiện mang theo sử dụng cho người dùng.\r\nHiệu năng ổn định\r\n•	Với chip Core i3 thế hệ thứ 7 kết hợp 4 GB RAM được tích hợp, HP 15 da0055TU (4NA89PA) cho hiệu năng ổn định mượt mà đối với các tác vụ như soạn thảo, nhập liệu.... Ổ cứng HDD lên đến 1 TB cho người dùng thoải mái lưu trữ dữ liệu không lo hết dung lượng.\r\nMàn hình lớn thoải mái làm việc, học tập\r\n•	Sở hữu màn hình 15.6 inch rộng hơn cùng công nghệ màn hình HD BrightView LED Backlit kết hợp với card đồ họa tích hợp Intel® HD Graphics 620 cho chất lượng hình ảnh hiển thị tươi sáng, rõ nét hơn.\r\nBàn phím có độ nảy tốt\r\n•	Các phím bấm trên HP 15 da0055TU được bố trí hợp lí, có độ nảy tốt, thích hợp cho người thường xuyên soạn thảo hay nhập liệu như giáo viên, văn thư, học sinh - sinh viên.\r\nKết nối tiện ích đa dạng\r\n•	Giống như những laptop trong cùng tầm giá khác từ HP, laptop HP 15 da0055TU cũng được trang bị các cổng kết nối truyền thống như USB 2.0, USB 3.1 hỗ trợ việc sao chép dữ liệu. Cổng HDMI cho phép trình chiếu hình ảnh, âm thanh từ máy tính sang màn hình lớn như tivi, máy chiếu trong các buổi thuyết trình hoặc hội thảo.\r\n \r\n', 1, 2, 13, NULL, NULL),
(78, 'hpda0048', 'Laptop HP 15 da0048TU ', 'hp-15-da0048tu-4me63pa-1-5.jpg', 7000000, 'Thiết kế truyền thống\r\n•	Máy vẫn mang thiết kế truyền thống của các mẫu laptop phổ thông khác với phần khung nhựa cứng cáp, bền bỉ. Tuy nhiên HP cũng khéo léo mang lại vẻ cao cấp cho chiếc laptop của mình bằng việc sử dụng màu sắc vàng đồng bắt mắt, phần kê tay được in vân cách điệu giúp chiếc laptop trông đẹp và thu hút hơn.\r\nCấu hình ổn định\r\n•	Sử dụng vi xử lý Intel Pentium N5000 cùng với 4 GB RAM DDR4 giúp máy thực hiện tốt và trơn tru các tác vụ cơ bản như lướt web, xem video, chỉnh sửa ảnh cơ bản, nghe nhạc. Tuy rằng vi xử lý có tốc độ thấp như N5000 không phù hợp để chơi game nhưng nó lại có khả năng tiết kiệm điện khá tốt và giúp máy có một mức giá hợp lý hơn. Nếu chỉ sử dụng những nhu cầu phổ thông, bạn hãy yên tâm là N5000 vẫn có thể đáp ứng tốt, ngoài ra máy có thể chơi được một số các game nhẹ nhàng khá tốt.\r\nMàn hình lớn 15.6 inch\r\n•	Điểm nổi bật nhất trên máy chính là màn hình lên đến 15.6 inch độ phân giải HD đáp ứng tốt những nhu cầu về giải trí, xem phim, học tập, làm việc trên máy. Laptop HP có thể đáp ứng hầu hết các nhu cầu cơ bản của người dùng phổ thông nhưng lại cần một chiếc laptop có màn hình to để giải quyết công việc cũng như giải trí tốt hơn, không gặp tình trạng chữ hay hình ảnh hiển thị quá nhỏ, gây hại mắt.\r\nBàn phím tích hợp dãy số\r\n•	Bàn phím của những chiếc HP 15 da0048TU  luôn có độ nảy tốt, khoảng cách phím hợp lý giúp người dùng văn phòng hay người thường xuyên sử dụng bàn phím cho tốc độ gõ phím nhanh, không bị mỏi tay khi sử dụng trong thời gian dài. Bàn phím số bên phải phù hợp với kế toán hoặc người có nhu cầu thao tác nhiều với những con số.\r\nCổng kết nối đa dụng\r\n•	Máy tích hợp 3 cổng USB, 1 cổng HDMI để xuất hình lên máy chiếu hay màn hình tivi tiện lợi, 1 cổng LAN để kết nối mạng dây và một ổ đĩa quang.\r\n \r\n', 1, 2, 13, NULL, NULL),
(79, 'hp14ce', 'Laptop HP Pavilion 14 ce1011TU i3 ', 'hp-pavilion-14-ce1011tu-i3-8145u-4gb-1tb-win10-5j-600x600.jpg', 13000000, 'Laptop HP Pavilion 14 ce1011TU (5JN17PA) được gia công tỉ mỉ, hoàn thiện từ chất liệu nhựa với 4 cạnh được bo cong nhẹ mang đến cho sản phẩm một vẻ đẹp tinh tế và trang nhã. Bên cạnh đó, đây là mẫu laptop nhỏ gọn với trọng lượng nhẹ chỉ 1.53 kg, cực kì thoải mái và thuận tiện khi di chuyển đến trường học hoặc công ty cùng với chiếc laptop HP.\r\nHình ảnh hiển thị sắc nét\r\n•	Sản phẩm được trang bị màn hình 14 inch Full HD (1920 x 1080) kết hợp cùng công nghệ LED Backlit giúp cho hình ảnh hiển thị sắc nét, chân thật đến từng chi tiết. Cùng với đó, Laptop HP Pavilion 14 ce1011TU (5JN17PA) sở hữu thiết kế viền màn hình mỏng giúp tăng diện tích hiển thị, mang lại trải nghiệm tốt nhất cho người dùng.\r\n\r\nCấu hình xử lý tốt đồ họa cơ bản\r\n•	Laptop văn phòng HP Pavilion 14 ce1011TU (5JN17PA) được trang bị vi xử lý Intel core i3 thế hệ thứ 8 mạnh mẽ kết hợp cùng 4GB Ram DDR4 giúp chạy mượt mà các ứng dụng văn phòng cũng như xử lý tốt các thao tác kéo thả trong photoshop, AI,...\r\nThoải mái lưu trữ cùng dung lượng bộ nhớ lớn\r\n•	Với dung lượng bộ nhớ trong lên đến 1TB giúp cho người dùng có thể lưu trữ những tài liệu quan trọng, những bài nhạc, những bộ phim hay những tựa game yêu thích một cách thoải mái và tiện lợi nhất.\r\nCổng USB Type C và USB 3.0 giúp truyền dữ liệu nhanh chóng\r\n•	Laptop HP Pavilion 14 ce1011TU (5JN17PA) ngoài các cổng kết nối cơ bản thì sản phẩm còn được trang bị thêm cổng USB Type C và USB 3.0 giúp truyền dữ liệu nhanh chóng, tiết kiệm thời gian chờ.\r\n\r\n', 1, 2, 13, NULL, NULL),
(80, 'hpx360', 'Laptop HP Pavilion x360 cd1018TU i3 ', 'hp-pavilion-x360-cd1018tu-i3-8145u-4gb-1tb-14-touc-600x600.jpg', 13000000, 'Laptop 2 trong 1, màn hình gập xoay 360 tiện lợi\r\n•	Chỉ cần xoay màn hình ra phía sau và hô biến! Bạn đã có một chiếc tablet HP Pavilion! Nhờ vào cấu trúc bản lề linh hoạt và chắc chắn, bạn không cần lo ngại màn hình sẽ bị lỏng lẻo khi gập nhiều lần.\r\nMàn hình 14 inch viền mỏng, bút cảm ứng đi kèm\r\n•	Thiết kế, vẽ hay điều khiển các slide thuyết trình đơn giản hơn với màn hình cảm ứng, đi kèm với bút giúp các thao tác và đường vẽ chính xác hơn. Viền màn hình mỏng cho cảm giác nhìn đã mắt, choáng ngợp.\r\nHệ thống âm thanh cao cấp\r\n•	Phần cứng âm thanh cao cấp cùng công nghệ HP Audio Boost, kết hợp với các chuyên gia từ B&O cho trải nghiệm nghe nhạc, xem phim có chiều sâu và sống động hơn.\r\nThanh lịch và gọn nhẹ, cùng bạn đến bất cứ nơi đâu\r\n•	Độ dày vừa phải 20.5mm và trọng lượng chỉ 1.66 kg của Laptop HP Pavilion x360 cd1018TU i3 giúp bạn thoải mái đồng hành cùng chiếc laptop 2 trong 1 này đến mọi nơi.\r\nCấu hình đủ dùng văn phòng, thiết kế đơn giản\r\n•	Với cấu hình ổn: CPU Core i3, RAM 4GB (có khe gắn thêm) bạn có thể thoải mái sử dụng máy soạn thảo văn bản, lướt web, hay sáng tạo các bức vẽ 2D trên laptop HP Pavilion x360 cd1018TU i3.\r\n', 1, 2, 13, NULL, NULL),
(81, 'hpda0443', 'Laptop HP 15 da0443TX i3 ', 'hp-15-da0443tx-i3-7020u-4gb-1tb-mx110-win10-5sl06-33397-thumb-600x600.jpg', 11000000, 'Thiết kế thuận tiện di chuyển\r\n•	Được hoàn thiện từ chất liệu nhựa, khớp nối giữa màn hình và thân máy chắc chắn, các cạnh được bo cong nhẹ tạo sự hài hoà. Trọng lượng máy khoảng 2 kg không quá nặng để bạn có thể mang theo bên mình đến trường học, công ty.\r\nMàn hình lớn, sắc nét làm việc và giải trí chân thật\r\n•	Laptop HP 15 da0443TX (5SL06PA) trang bị màn hình lớn 15.6 inch, độ phân giải Full HD (1920 x 1080) với công nghệ màn hình Led Blacklit giúp bạn xem những bộ phim bom tấn chất lượng ảnh chân thực và sắc nét.\r\nChạy tốt ứng dụng đồ hoạ\r\n•	Hướng tới khách hàng là sinh viên, nhân viên văn phòng là chủ yếu nhưng chiếc laptop HP vẫn được trang bị cấu hình mạnh mẽ với chíp xử lý core i3 thế hệ 7, 4GB RAM và card đồ hoạ rời GeForce MX110 2GB cho khả năng xử lý đồ hoạ ứng photoshop, Ai,... mượt mà.\r\nKhe cắm SSD M.2 Sata 3 giúp bạn có thể nâng cấp lên ổ cứng SSD tối ưu khả năng hoạt động của máy.\r\nÂm thanh to, rõ nghe nhạc chất lượng cao\r\n•	Laptop HP 15 da0443TX (5SL06PA)  cho âm thanh to và rõ, âm bass được nâng cao giúp bạn nghe những bài nhạc EDM sống động, hỗ trợ giải trí sau những ngày làm việc mệt mỏi.\r\nUSB 3.1 và HDMI 1.4 - Truyền dữ liệu và xuất hình ảnh nhanh chóng\r\n•	Bên cạnh các cổng kết nối cơ bản, máy được trang bị 2 cổng USB 3.1 và 1 cổng HDMI 1.4 vừa giúp bạn truyền file nặng qua USB nhanh chóng với tốc độ tối đa mà cổng này hỗ trợ lên đến 600Mb/s, vừa xuất hình ảnh chất lượng cao qua máy chiếu, màn hình thuận tiện cho công việc văn phòng của bạn. \r\n \r\n', 1, 2, 13, NULL, NULL),
(82, 'hp1023', 'Laptop HP 15 da1023TU i5 ', 'hp-15-da1023tu-i5-8265u-4gb-1tb-win10-5nk81pa-33397-thumb-600x600.jpg', 14000000, 'Thiết kế hài hoà, phù hợp di chuyển\r\n•	Được hoàn thiện từ chất liệu nhựa, pin liền, các cạnh bo cong nhẹ làm tổng quan chiếc laptop HP trở nên cứng cáp. Khớp nối giữa màn hình và thân máy chắc chắn. Tuy không thuộc các dòng máy tính mỏng nhẹ, trọng lượng máy khoảng hơn 2 kg, nhưng bạn vẫn có thể mang theo bên mình hằng ngày đến trường, công ty mà không quá mệt mỏi.\r\nMàn hình to lớn, sắc nét - Xem phim HD chất lượng cao\r\n•	Độ phân giải Full HD (1920 x 1080) trên màn hình lớn 15.6 inch, kết hợp cùng công nghệ LED Backlit giúp chiếc Laptop HP 15 da1023TU (5NK81PA) có khả năng phân giải hình ảnh sắc nét, xem phim chất lượng cao.\r\nXử lý đồ hoạ cơ bản\r\n•	Chip xử lý core i5 thế hệ 8, kết hợp 4GB RAM ngoài khả năng chạy mượt mà các ứng dụng văn phòng word, excel, powerpoint. Laptop HP 15 da1023TU (5NK81PA) cho xử lý các tác vụ trong photoshop, Ai,... ở mức khá.\r\nNghe nhạc chất lượng cao\r\n•	Công nghệ âm thanh Realtek High Definition Audio - Một công nghệ phổ biến trên các dòng laptop HP giúp tối ưu âm treble, nghe những bài nhạc EDM sống động. Hỗ trợ bạn giải trí sau những giờ làm mệt mỏi.\r\nUSB 3.0 truyền dữ liệu nhanh chóng\r\n•	Bên cạnh các cổng kết nối truyền thống HDMI, LAN,... Laptop văn phòng HP 15 da1023TU (5NK81PA) hỗ trợ 2 cổng USB 3.0 tiết kiệm thời gian chờ khi truyền dữ liệu, với tốc độ tối đa mà cổng này hỗ trợ lên đến 600Mb/s. \r\n \r\n', 1, 2, 13, NULL, NULL),
(83, 'ln130', 'Laptop Lenovo Ideapad 130 14IKB ', 'lenovo-ideapad-130-14ikb-i3-7020u-4gb-1tb-81h6001-1-600x600.jpg', 8000000, 'Thiết kế đơn giản, gọn gàng\r\n•	Laptop Lenovo Ideapad 130 được làm từ chất liệu nhựa màu đen vân nhám. Khối lượng nhẹ 1.6 Kg dễ dàng cho vào balo mang vác khắp nơi. Cạnh bên của laptop có trang bị khe đọc thẻ nhớ SD tiện lợi để kết nối thẻ nhớ máy ảnh, quay phim.\r\nMàn hình 14 inch, mở rộng đến 180 độ\r\n•	Màn hình HD 14 inch của Ideapad 130 (81H60016VN) hiển thị ổn. Bản lề có thể mở rộng đến 180 độ, thoải mái sử dụng ở nhiều tư thế ngồi.\r\nCấu hình vừa đủ học tập, văn phòng.\r\n•	Laptop Lenovo Ideapad 130 được trang bị CPU Intel Core i3 7020U, RAM 4 GB, có thể nâng cấp lên 8GB. Cấu hình này giúp máy chạy mượt các tác vụ Word, Excel, Chrome, Youtube, chỉnh sửa cơ bản bằng Photoshop.\r\nBàn phím và TouchPad\r\n•	Ideapad 130 có TouchPad nhạy, hỗ trợ sử dụng nhiều ngón tay để cuộn trang, thu phóng ảnh. Bàn phím có khoảng cách phím hợp lý, độ nảy cao cho cảm giác gõ thoải mái, độ chính xác cao.\r\nCông nghệ âm thanh vòm\r\n•	Bên cạnh hệ thống loa kép, bên trong Laptop Lenovo Ideapad 130 trang bị công nghệ âm thanh Dolby Home Theater, cho chất âm phát ra được chuẩn xác và chân thực hơn.\r\nCông kết nối đầy đủ\r\n•	Lenovo Ideapad 130 81H60016VN trang bị các cổng kết nối thông dụng như khe thẻ nhớ máy ảnh, cổng mạng LAN, cổng HDMI dùng cho trình chiếu. Máy cũng sở hữu 2 cổng USB 3.0 cho tốc độ truyền tải dữ liệu nhanh chóng.\r\n', 1, 2, 17, NULL, NULL),
(84, 'ln330', 'Laptop Lenovo Ideapad 330 15IKBR ', 'lenovo-ideapad-330-15ikbr-7020u-81de00ldvn-33397-manhinh1.jpg', 9000000, 'Màn hình 15.6 inch hiển thị rõ nét các chi tiết\r\n•	Laptop Lenovo Ideapad 330 15IKBR i3 7020U được trang bị card đồ hoạ Intel® HD Graphics 620 kết hợp cùng màn hình chống chói 15.6 inch, độ phân giải HD (1366 x 768), hiển thị hình ảnh tươi sáng và rõ nét.\r\nCấu hình đủ khoẻ chạy ứng dụng văn phòng, đồ hoạ cơ bản\r\n•	Được sự kết hợp từ chíp xử lý core i3 thế hệ 7 và 4GB RAM DDR4 giúp laptop Lenovo Ideapad 330 15IKBR 7020U chạy mượt các ứng dụng văn phòng: word, excel, powerpoint,... Thời gian phản hồi các thao tác kéo thả trong photoshop nhanh chóng.\r\nBàn phím to, rõ thuận tiện nhập dữ liệu\r\n•	Bàn phím trên laptop Lenovo Ideapad 330 15IKBR được bố trí hợp lý tích hợp bàn phím số, với kích thước to, khoảng cách các phím phù hợp thuận lợi cho nhân viên văn phòng phải thường xuyên thao tác nhập dữ liệu.\r\nCông nghệ âm thanh Dolby Audio™ Premium nâng cao chất lượng âm thanh\r\n•	Âm thanh Dolby Audio™ Premium mang chất âm to, rõ giúp bạn có những giây phút giải trí tuyệt vời. Xem các phim hành động với chất âm tốt, và âm bass chắc chắn trong những bài nhạc lossless.\r\nCổng USB Type C và USB 3.0 truyền dữ liệu nhanh chóng\r\n•	Bên cạnh các cổng kết nối cơ bản, laptop Lenovo Ideapad 330 15IKBR 7020U được trang bị 2 cổng USB 3.0 và 1 cổng USB Type C tiết kiệm thời gian chờ khi truyền dữ liệu với băng thông tối đa lên đến 600MB/s.\r\n', 1, 2, 17, NULL, NULL),
(85, 'ln330', 'Laptop Lenovo IdeaPad 330 ', 'lenovo-ideapad-330-15ikbr-81de01kwvn-450-600x600.jpg', 11000000, 'Thiết kế đơn giản, tinh tế\r\n•	Được làm bằng vỏ nhựa tinh tế và đơn giản, Laptop Lenovo Ideapad đem lại cảm giác mạnh mẽ, cứng cáp. Máy có trọng lượng 2,2 kg, không quá nặng để mang đi.\r\nCấu hình mạnh chạy được hầu hết tất cả các ứng dụng văn phòng và học tập\r\n•	Lenovo IdeaPad 330 được trang bị CPU intel core i5, RAM 4GB, hỗ trợ RAM lên đến 16 GB giúp máy chạy tốt hầu hết các ứng dụng như Word, Excel, Photoshop cơ bản…\r\nMàn hình Full HD, bản lề mở rộng đến 180 độ\r\n•	Với màn hình laptop 15,6 inch, Full HD (1920 x 1080), sản phẩm mang lại chất lượng hình ảnh đẹp, sắc nét, ngoài ra, chiếc laptop này còn được trang bị thêm công nghệ chống chói giúp hình ảnh luôn rõ nét cả trong điều kiện ngược sáng. Bên cạnh đó, bản lề của máy có thể mở rộng đến 180 độ, thuận tiện cho mọi tư thế sử dụng.\r\nÂm thanh tuyệt hảo\r\n•	Với công nghệ âm thanh Dolby Audio, chiếc laptop Lenovo IdeaPad 330 đem lại trải nghiệm âm thanh trầm ấm, chi tiết và sống động hơn.\r\nBàn phím có hàng phím số riêng biệt thuận tiện cho việc nhập liệu, kế toán\r\n•	Bàn phím của chiếc laptop Lenovo IdeaPad 330 được thiết kế thuận tiện cho việc nhập liệu và kế toán với hàng phím số riêng biệt, đặc biệt thích hợp với giới văn phòng thường xuyên soạn thảo và nhập liệu.\r\n', 1, 2, 17, NULL, NULL),
(86, 'ln330s', 'Laptop Lenovo Ideapad 330S 14IKBR ', 'lenovo-ideapad-330s-14ikbr-i5-8250u-4gb-1tb-win10-33397-thumb-600x600.jpg', 12000000, 'Thiết kế thời trang, tiện lợi di chuyển\r\n•	Được hoàn thiện từ chất liệu nhựa, trọng lượng máy chỉ 1.67kg và mỏng 18.9 mm phù hợp cho việc di chuyển hằng ngày của bạn cùng chiếc máy tính xách tay. Các khớp nối màn hình và thân máy cứng cáp, bo cong nhẹ ở các cạnh tạo sự thanh thoát, hiện đại trong thiết kế.\r\nMàn hình xem phim tươi sáng, sắc nét\r\n•	Kích thước màn hình 14 inch trên Laptop Lenovo Ideapad 330S 14IKBR (81F400NLVN) với độ phân giải Full HD (1920 x 1080) cho chất lượng ảnh sắc nét ở từng chi tiết. Tấm nền IPS giúp bạn mở rộng góc nhìn, xem phim cùng bạn bè ở nhiều vị trí khác nhau nhưng không bị mờ hay nhoà.\r\nHiệu năng xử lý tốt ứng dụng văn phòng\r\n•	Với chip xử lý core i5 thế hệ 8, cùng 4GB RAM DDR4 giúp chiếc laptop Lenovo chạy tốt các ứng dụng văn phòng như word, excel, powerpoint. Cho phản hồi các thao tác kéo thả trong photoshop nhanh chóng.\r\n•	Việc hỗ trợ khe cắm SSD M.2 PCIe sẽ cho phép bạn nâng cấp ổ cứng SSD giúp bạn khởi động máy, vào ứng dụng nhanh chóng\r\nNghe nhạc to, rõ\r\n•	Công nghệ âm thanh Dolby Audio Premium giúp bạn nghe nhạc to, rõ. Âm thanh được khuếch tán nhiều hướng, bạn có thể giải trí tại nhà sau những giờ làm việc mệt mỏi.\r\nCổng USB 3.1, USB Type C truyền dữ liệu nhanh chóng\r\n•	Bên cạnh các cổng kết nối cơ bản, chiếc laptop văn phòng được trang bị 2 cổng USB 3.1 và USB Type C giúp bạn truyền dữ liệu nhanh chóng với tốc độ tối đa mà cổng này hỗ trợ lên đến 600MB/s. \r\n \r\n', 1, 2, 17, NULL, NULL),
(87, 'ln530s', 'Laptop Lenovo Ideapad 530S 14IKB ', 'lenovo-ideapad-530s-14ikb-i7-8550u-8gb-256gb-win10-33397-thumb-600x600.jpg', 20000000, '•	Thiết kế mỏng nhẹ, trang nhã\r\nMáy tính xách tay Lenovo Ideapad 530S (81EU00P5VN) được gia công mỉ từ chất liệu nhựa, cùng với 4 góc được bo tròn nhẹ, tạo nên một sự thanh lịch, trang nhã. Bên cạnh đó là một thiết kế mỏng nhẹ với trọng lượng chỉ 1.54Kg, giúp cho người dùng có thể dễ dàng mang theo laptop đến bất kì đâu mà không cảm thấy mệt mỏi.\r\n•	Trải nghiệm hình ảnh sắc nét, chân thật\r\nLaptop Lenovo Ideapad 530S (81EU00P5VN) được trang bị màn hình chống chói 14 inch có độ phân giải FHD (1920 x 1080) giúp mang lại hình ảnh sắc nét, chân thật, tạo cho người dùng cảm giác tuyệt với nhất khi sử dụng kể cả khi sản phẩm đang được sử dụng ở điều kiện bị ngược sáng.\r\n•	Cấu hình đáp ứng tốt nhu cầu đồ họa cơ bản\r\nSản phẩm được tích hợp chip xử lý Intel Core i7 thế hệ thứ 8 tiết kiệm điện năng, mạnh mẽ. Cùng với sự kết hợp của 8GB RAM DDR4 giúp máy có thể chạy mượt mà các ứng dụng văn phòng cũng như xử lý khá tốt các ứng dụng đồ họa cơ bản như photoshop, AI\r\n•	Tiện lợi khi làm việc vào ban đêm cùng đèn nền bàn phím\r\nViệc tích hợp đèn nền bàn phím sẽ giúp cho người dùng hạn chế tối đa việc gõ sai phím trong điều kiện thiếu sáng cũng như tối ưu khả năng làm việc tại nhà vào ban đêm.\r\n•	Trải nghiệm âm thanh trong trẻo, rõ ràng và chân thật\r\nSản phẩm được tích hợp công nghệ âm thanh Dolby Audio Premium giúp mang đến âm thanh phong phú, rõ ràng, trong trẻo và mạnh mẽ. Bên cạnh đó là tính năng giả lập âm thanh vòm giúp cho bạn có thể trải nghiệm chất lượng âm thanh chất lượng cao trong những bộ phim bom tấn mà không cần phải đến rạp chiếu phim.\r\n•	Truyền tải dữ liệu nhanh hơn với cổng USB 3.0\r\nLaptop Lenovo Ideapad 530S (81EU00P5VN) được trang bị khá đầy đủ các cổng kết nối cơ bản, ngoài ra còn được tích hợp thêm 2 cổng USB 3.0 giúp cho việc truyền dữ liệu trở nên nhanh chóng.\r\n \r\n', 1, 2, 17, NULL, NULL),
(88, 'lnyoga', 'Laptop Lenovo Ideapad YOGA 530 14IKB ', 'laptop-lenovo-ideapad-yoga-530-14ikb-7130u-600x600.jpg', 12000000, '•	Màn hình 14 inch xem phim chân thực và sắc nét\r\nMáy được trang bị màn hình 14 inch, độ phân giải HD (1366 x 768) hiển thị sắc nét các chi tiết nhỏ giúp bạn xem phim, giải trí chân thật.\r\n•	Cấu hình xử lý đồ hoạ cơ bản\r\nLà chiếc laptop sinh viên - Lenovo Ideapad Yoga 530 14IKB được trang bị sức mạnh đủ khoẻ để chạy các ứng dụng văn phòng, đồ hoạ cơ bản với CPU core i3 7130U kết hợp cùng 4GB RAM DDR4 các phản hồi thao tác kéo thả trong photoshop không có độ trễ.\r\n\r\n•	Ổ cứng SSD khởi động máy, ứng dụng nặng nhanh chóng\r\nỔ cứng SSD 128GB trên laptop Lenovo Ideapad Yoga 530 14IKB  ngoài việc khởi động nhanh các ứng dụng nặng, còn giúp bạn khởi động máy nhanh chóng giúp nâng cao hiệu quả làm việc.\r\n•	Cổng USB Type C tiết kiệm thời gian chuyển dữ liệu\r\nNgoài các cổng kết nối cơ bản, máy được trang bị cổng USB type C và 2 cổng USB 3.0 cải thiện thời gian chờ khi chuyển file nặng với tốc độ tối đa lên đến 600MB/s. \r\n', 1, 2, 17, NULL, NULL),
(89, 'apple2017', 'Laptop Apple Macbook Air 2017 i5 ', 'apple-macbook-air-mqd32sa-a-i5-5350u-400-1-450x300-600x600.jpg', 21000000, '•	Thiết kế siêu mỏng và nhẹ\r\nVới thiết kế đặc trưng của dòng MacBook Air, phiên bản này chỉ mỏng 1.7 cm và trọng lượng là 1.35 kg, rất tiện lợi và dễ dàng để bạn luôn mang theo bên mình.\r\n•	Hiệu năng mượt mà\r\nMacbook Air MQD32SA/A i5 5350U có bộ xử lý Intel Core i5 Broadwell tốc độ 1.80 GHz, card đồ họa tích hợp Intel HD Graphics 6000, bộ nhớ RAM 8 GB, cùng ổ cứng lưu trữ SSD 128 GB giúp máy chạy mượt mà các thao tác sử dụng.\r\n•	Cổng Thunderbolt hiện đại\r\nMacbook Air MQD32SA/A i5 5350U còn được trang bị cổng Thunderbolt thế hệ 2 cho tốc độ truyền tải dữ liệu cao hơn gấp đôi so với Thunderbolt 1, đồng thời còn có thể xuất hình ảnh độ phân giải cao ra màn hình 4K.\r\n•	Màn hình\r\nMacbook Air MQD32SA/A có màn hình rộng 13.3 inch, độ phân giải là WXGA+(1440 x 900) sử dụng công nghệ màn hình LED Backlit, hình ảnh hiển thị khá chất lượng, tươi sáng.\r\n•	Thời lượng pin lên đến 12 giờ sử dụng\r\nVấn đề pin luôn là một trăn trở khi dùng các máy laptop mỏng, nhưng với Macbook Air MQD32SA/A i5 thời gian khoảng 12 tiếng sử dụng sau một lần sạc đầy là một ưu điểm rất xứng đáng để người dùng lựa chọn.\r\n', 1, 2, 15, NULL, NULL),
(90, 'apple2018', 'Laptop Apple Macbook Air 2018 ', 'apple-macbook-air-mree2sa-a-i5-8gb-128gb-133-gold-600x600.jpg', 31000000, '•	Đáp ứng tuyệt vời nhu cầu văn phòng\r\nDung lượng RAM 8 GB của Macbook Air 2018 cho phép bạn sử dụng cùng lúc nhiều ứng dụng, mở nhiều tab trình duyệt mà không bị đứng, giật.\r\nChiếc laptop Apple sở hữu ổ cứng SSD cho tốc độ khởi chạy các ứng dụng trong chớp mắt, dung lượng 128 GB là đủ dùng với nhu cầu lưu trữ tài liệu, hình ảnh, bài thuyết trình...\r\nMẫu Macbook 2018 còn cho phép bạn có thể sử dụng mượt mà các ứng dụng thiết kế chuyên nghiệp như Photoshop, AI,... \r\n•	Màn hình Retina độ phân giải cao và sắc nét \r\nMàn hình của Macbook Air 2018 là điểm cải tiến nổi bật nhất so với thế hệ trước. Viền màn hình mỏng hơn 50% cùng độ phân giải cao 2K Retina mang lại trải nghiệm hình ảnh sắc nét, chân thực hơn, cho bạn yêu hơn những gì bạn thấy. \r\n•	Thiết kế sang trọng, độ mỏng ấn tượng\r\nMacbook Air 2018 được làm từ 100% là nhôm tái chế. Đặc biệt, với cân nặng chỉ 1,25kg và mỏng 15,6mm giúp bạn dễ dàng mang theo mọi lúc, mọi nơi.\r\n•	Pin dùng được cả ngày\r\nThời lượng pin trên Macbook Air 2018 lên đến 12 giờ trong điều kiện sử dụng bình thường. 7 - 8 giờ khi sử dụng hỗn hợp các tác vụ Chrome, Photoshop, ứng dụng văn phòng… Thoải mái cho một ngày làm việc.\r\n•	Cảm biến vân tay, bảo mật cao \r\nDòng Macbook Air 2018 được cải biến với cảm biến vân tay Touch ID tích hợp thẳng vào nút nguồn. Chip bảo mật riêng Apple T2 nhận dạng chính xác và giúp mở khóa nhanh chóng.\r\n•	Tích hợp nhiều tính năng cao cấp từ Macbook Pro\r\nLoa âm thanh nổi cung cấp âm trầm gấp đôi và âm lượng lớn hơn 25 phần trăm so với thế hệ trước.  Âm thanh nổi rộng sống động cho bạn đắm mình vào các bài hát, bộ phim,...\r\nBàn di chuột cảm ứng lực Force Touch cho phép bạn tương tác với máy Mac của mình theo nhiều cách khác nhau. Bàn phím Butterfly giúp ít phát ra âm thanh khi gõ, đèn nền LED với cảm biến ánh sáng cho bạn có thể sử dụng Macbook trong điều kiện thiếu sáng thoải mái hơn.\r\n', 1, 2, 15, NULL, NULL),
(91, 'applepro', 'Laptop Apple Macbook Pro Touch MR9Q2SA', 'apple-macbook-pro-touch-mr9q2sa-a-2018-thumb-1-600x600.jpg', 43000000, '•	Thiết kế vỏ nhôm nguyên khối cao cấp\r\nLà một chiếc máy tính thuộc dòng sản phẩm cao đến từ Apple, Macbook Pro 13 inch 2018 được trang bị lớp vỏ nhôm nguyên khối Unibody sang trọng, tinh tế và chắc chắn, bên cạnh đó máy với trọng lượng chỉ 1.37 kg, người dùng có thể mang máy theo sử dụng mọi lúc mọi nơi.\r\n•	Xử lý đồ họa - kĩ thuật chuyên nghiệp\r\nApple Macbook Pro 2018 13 inch được trang bị một cấu hình mạnh mẽ với vi xử lý Core i5 tốc độ 2.3 GHz, 8 GB RAM và bộ nhớ SSD 256 GB cho hiệu năng hoạt động mượt mà khi chạy đa nhiệm các tác vụ thông thường đến xử lý đồ họa - kĩ thuật phức tạp.\r\n•	\r\nMàn hình Retina siêu sắc nét\r\nMàn hình Retina siêu sắc nét độc quyền của Apple với độ phân giải (2560 x 1600) cho trải nghiệm hình ảnh sống động, chân thật, rực rỡ, màu sắc hình ảnh hiển thị với độ tương phản cao là sự lựa chọn phù hợp với người dùng chuyên về thiết kế đồ họa.\r\n•	Cổng Thunderbolt hiện đại\r\nMacbook Pro Touchbar 2018 13 inch được Apple trang bị lên đến 4 cổng Thunderbolt 3 (USB-C) cho phép truyền dữ liệu lên tới 40Gbps, cao gấp đôi so với Thunderbolt 2 chỉ 20Gbps trong khi điện năng tiêu thụ thì chỉ bằng phân nửa.\r\n•	Bàn phím với đèn nền tiện lợi\r\nVới cơ chế bàn phím bướm thế hệ thứ ba khác biệt với các phiên bản khác, Macbook Pro 2018 cho khả năng gõ linh hoạt và yên tĩnh hơn. Cùng với đèn nền được trang bị trên bàn phím hỗ trợ người dùng làm việc thoải mái, dễ dàng thao tác hơn vào ban đêm cũng như đặc thù công việc ở nơi có điều kiện thiếu ánh sáng.\r\n•	Touch bar và cảm biến Touch ID tiện ích\r\nGiống như phiên bản Macbook Pro 2017, Touchbar được đặt phía trên bàn phím và thay thế các phím chức năng ở hàng đầu của bàn phím. Tùy vào ứng dụng và công việc mà bạn đang thao tác trên Macbook mà Touchbar sẽ hiển thị các phím tắt khác nhau.\r\n•	Âm thanh sống động\r\nLoa trên MacBook Pro 2018 13 đã được căn chỉnh và thay đổi để dải đáp ứng rộng hơn, bass mạnh hơn cho chất lượng cao hơn, cân bằng và chi tiết hơn. Đáp ứng mọi nhu cầu làm việc cũng như giải trí thư giãn của người dùng.\r\n', 1, 2, 15, NULL, NULL),
(92, 'msips42', 'Laptop MSI Prestige PS42 ', 'msi-prestige-ps42-i5-8250u-4gb-256gb-14-win10-33397-thumb-123-600x600.jpg', 19000000, '•	Thiết kế sang trọng, dễ dàng di chuyển\r\nLaptop văn phòng MSI Prestige PS42 được hoàn thiện từ chất liệu kim loại nguyên khối, các cạnh bo cong vừa phải mang đến vẻ đẹp vừa sang trọng vừa mạnh mẽ. Độ dày 15.9 mm và trọng lượng chỉ 1.18kg rất phù hợp cho việc di chuyển hàng ngày đến cơ quan, gặp đối tác\r\n•	Khả năng gập 180 độ hiện đại\r\nBên cạnh chức năng tô thêm vẻ đẹp cho thiết kế hiện đại, khả năng gập 180 độ trên laptop MSI Prestige PS42 sẽ giúp bạn mở rộng góc nhìn khi bị phản sáng và hạn chế gãy bản lề khi lỡ tay dùng lực quá mạnh trong lúc mở rộng màn hình.\r\n•	Màn hình sắc nét từng chi tiết\r\nSở hữu màn hình 14 inch chống chói, độ phân giải FullHD (1290 x 1080) chất lượng ảnh tươi sáng và sắc nét. Tấm nền IPS cho góc hình rộng giúp bạn giải trí, xem phim cùng bạn bè sau giờ làm việc mệt mỏi với chất lượng ảnh chân thực.\r\n•	Cấu hình xử lý tốt đồ hoạ cơ bản\r\nMSI Prestige PS42 được trang bị chip xử lý core i5 8250U hế hệ 8 kết hợp cùng 4GB RAM DDR4 cho phản hồi các thao tác kéo thả trong các ứng dụng đồ hoạ: photoshop, Ai,... nhanh chóng.\r\nMáy được trang bị ổ cứng SSD 256GB NVMe PCIe, bên cạnh khả năng mở máy nhanh còn tối ưu khả năng mở các ứng dụng nặng, tiết kiệm thời gian chờ và nâng cao hiệu suất công việc của bạn.\r\n•	Mở khoá vân tay hiện đại và nhanh chóng\r\nTích hợp công nghệ mở khoá vân tay hiện đại. Giờ đây bạn không cần phải nhập mật khẩu rườm rà, dữ liệu sẽ được bảo mật cao hơn\r\n \r\n', 1, 2, 18, NULL, NULL),
(93, 'msi8750', 'Laptop MSI GF63 8RD ', 'msi-gf63-8rd-221vn-thumb-600x600.jpg', 26000000, '•	Thiết kế chuẩn Gaming hiện đại, tinh tế\r\nMSI GF63 8RD được thiết kế với chất liệu chủ đạo là nhôm phay xước và mặt thông gió chữ X mang lại cho chiếc laptop chơi game này sự cân bằng hoàn hảo giữa thiết kế và hiệu suất. Dù vậy máy khá mỏng nhẹ và tinh tế với trọng lượng chỉ 1.86 kg và kích thước chỉ 21.7 mm. \r\n•	Cấu hình mạnh mẽ\r\nMáy được trang bị chip Intel Core i7 Coffee Lake 6 nhân với tốc độ CPU là 2.2 GHz đem lại một hiệu suất tuyệt vời. RAM DDR4 8 GB có thể nâng cấp lên tới 32 GB mang đến khả năng đa nhiệm tốt. Ổ cứng kết hợp HDD: 1 TB + SSD: 128 GB vừa đáp ứng nhu cầu lưu trữ thoải mái vừa đáp ứng tốc độ truyền dữ liệu. Đặc biệt, máy còn có card đồ hoạ rời NVIDIA GeForce GTX 1050Ti, 4 GB với hiệu năng vô cùng mạnh mẽ, xử lý các game đòi hỏi cấu hình, đồ hoạ cao cực tốt.\r\n•	Màn hình IPS viền siêu mỏng\r\nMSI GF63 8RD với viền màn hình siêu mỏng 4.9 mm sẽ đem lại một trải nghiệm chơi game choáng ngợp từ mọi góc độ. Màn hình lớn 15.6 inch với độ phân giải Full HD (1920x1080) cùng tấm nền IPS mang đến hình ảnh sống động, tạo ra sự rõ ràng và tương phản rực rỡ.\r\n•	Nahimic 3 - Quản lý âm thanh hoàn hảo\r\nPhần mềm Nahimic 3 độc quyền của MSI trên MSI GF63 8RD giúp tăng cường chất lượng âm thanh vòm 3D trong trò chơi và kiểm soát hữu hạn âm nhạc, phim và cuộc gọi hội nghị của bạn. Bộ khuếch đại âm thanh Audio Boost và giắc âm thanh được mạ vàng giúp nâng cao mọi chi tiết âm thanh lên 30%.\r\n•	\r\nBàn phím có đèn nền\r\nBàn phím từ hãng Steelseries nổi tiếng có thiết kế kích thước phím lớn cũng như từng phím được viền đỏ xung quanh để nổi bật hơn khi bật đèn nền bàn phím cũng có tông màu đỏ, hành trình phím khá ngắn sẽ phần nào hạn chế thao tác chơi game nhưng bù lại game thủ sẽ có tốc độ soạn văn bản là rất nhanh và thoải mái.\r\n•	Hệ thống tản nhiệt\r\nCác hốc tản nhiệt phụ cũng được làm cách điệu hình học kích thước lớn làm lộ các linh kiện phần cứng bên trong. Bốn chân đế cao su cùng nhiều đường gân nhựa cách điệu nhô cao lên để tăng diện tích tiếp xúc giữa máy và bề mặt giúp việc lấy gió từ bên ngoài vào hiệu quả hơn. Công nghệ Cooler Boost trang bị giúp cho hệ thống tỏa nhiệt nhanh hơn khi chơi game đồ họa nặng.\r\n•	Các cổng kết nối\r\nMáy được trang bị đầy đủ các cổng kết nối cơ bản như HDMI 1.4, 3 x USB 3.1, LAN (RJ45). Cổng USB Type-C cho phép truyền dữ liệu nhanh và tiện lợi hơn gấp nhiều lần.\r\n', 1, 2, 18, NULL, NULL);
INSERT INTO `sanphams` (`id`, `ma`, `ten`, `avatar`, `gia`, `mota`, `idnguoidung`, `idloai`, `idhang`, `updated_at`, `created_at`) VALUES
(96, 'kdtvc01', 'KEM DƯỠNG TRẮNG VICHY', 'NaV3TY_simg_d0daf0_800x1200_max.jpg', 360000, '•	Giữ ẩm, mang lại sự mềm mại, mịn màng.\r\n•	Ngăn ngừa sự hình thành hắc tố gây sạm da.\r\n•	Cho làn da luôn trắng sáng và đều màu\r\n•	Dung Dịch Dưỡng Trắng Da & Giảm Thâm Nám Từ Sâu Bên Trong Vichy Ideal White Meta Whitening Emulsion (50ml) với công thức chứa hàm lượng cao các dưỡng chất như cafein, Tyrosinase, LHA... sẽ tạo một lớp bảo vệ cực mỏng phủ lên làn da, giúp giữ ẩm, mang lại sự mềm mại, mịn màng ngay sau khi thoa, ngăn ngừa sự hình thành hắc tố gây sạm da, làm giảm thâm nám, cho làn da luôn trắng sáng và đều màu.\r\n•	Thành phần và công dụng\r\n•	CAFFEIN: Kích thích lưu thông vòng tuần hoàn máu. Giúp thúc đẩy quá trình trao đổi chất. Giảm mệt mỏi\r\n•	PHE-RESORCINOL: Hoạt chất Làm trắng số 1, giảm sự hoạt động của Tyrosinase (men kích thích)\r\n•	LHA: Loại bỏ tế bào chết  chứa melanin gây tối màu da\r\n•	ADENOSINE: Thấm sâu vào lớp hạ bì. Giảm các khiếm khuyết trên da. Chống lại các dấu hiệu lão hóa\r\n•	Kết quả khảo sát trên 51 phụ nữ châu Á từ 36 đến 59 tuổi, sau 8 tuần sử dụng:\r\n•	94% đồng ý da khỏe mạnh\r\n•	88% đồng ý da sáng hơn\r\n•	88% đồng ý da ít bị sậm màu\r\n•	86% đồng ý da căng mịn\r\n•	81% đồng ý kết hợp tinh chất làm giảm quá trình tối màu da.\r\n•	Loại da phù hợp\r\n•	Phù hợp với da nhạy cảm, không chứa Paraben, được kiểm nghiệm 100% trên làn da Châu Á nhạy cảm\r\n•	Hướng dẫn sử dụng\r\n•	Thoa sáng & tối\r\n•	Thích hợp hơn khi thoa vào buổi sáng làm kem lót trang điểm\r\n', 1, 3, 21, NULL, NULL),
(97, 'kddvc01', 'KEM DƯỠNG DA VICHY', '3zglfE_simg_d0daf0_800x1200_max.jpg', 400000, '•	Công thức dịu nhẹ\r\n•	Loại bỏ và ngăn chặn dầu nhờn\r\n•	Mang đến làn da sáng mịn\r\n•	Kem Dưỡng Giúp Giảm Mụn, Giảm Bóng Dầu, Dưỡng Ẩm Normaderm TRI-ACTIV Vichy\r\n•	Thuộc dòng sản phẩm Normaderm - Dành cho Khách hàng có bề mặt da có nhiều bóng dầu và mụn, lỗ chân lông bị tắc nghẽn. Nam và nữ độ tuổi từ 18 - 35 gặp các vấn đề về tuyến dầu hoạt động mạnh dễ thu hút bụi bẩn, kết hợp với tế bào chết tích tụ. Lỗ chân lông bị bít tắc là lúc vi khuẩn gây mụn càng sinh sôi nảy nở dẫn đến kích ứng và nhiễm trùng da từ đó gây nên mụn.\r\n•	Kem Dưỡng Giúp Giảm Mụn, Giảm Bóng Dầu, Dưỡng Ẩm TRI-ACTIV Vichy dưỡng ẩm hiệu quả với công thức dịu nhẹ loại bỏ và ngăn chặn dầu nhờn trên làn da của bạn. Mang đến làn da sáng mịn, không còn sạm lại vì dầu nhờn giúp bạn rạng rỡ suốt cả ngày dài.\r\n•	Độ an toàn\r\n•	- 100% dễ chịu.\r\n•	- Không paraben, không kích ứng da, không tạo nhân mụn.\r\n•	- Giàu nước khoáng Vichy, phù hợp da nhạy cảm.\r\n•	Thành phần\r\n•	- Sự kết hợp độc đáo của 3 hoạt chất lột nhẹ [LHA + axit Salicylic + axit Glycolic] tác động toàn diện lên lớp biểu bì, giúp loại sạch bụi bẩn và bã nhờ dư thừa, se khít lỗ chân lông, ngăn ngừa vi khuẩn gây mụn. Ngoài ra, Glycerin & các loại dầu nhẹ giúp dưỡng ẩm suốt 24h.\r\n•	Hiệu quả\r\n•	- Giảm mụn: 64% sau 4 tuần.\r\n•	- Thu nhỏ/ Thông thoáng lỗ chân lông: 80% phụ nữ nhận thấy.\r\n•	- Giảm bóng nhờn: 86% phụ nữ nhận thấy.\r\n•	- Giảm mẩn đỏ: 69% phụ nữ nhận thấy.\r\n•	- Mờ vết thâm: 68% sau 4 tuần.\r\n•	- Làn da láng mịn hơn: 87% phụ nữ nhận thấy.\r\n•	Hướng dẫn sử dụng\r\n•	- Lấy sản phẩm bằng 1 hạt bắp chấm lên 5 điểm : trán, mũi, cằm & 2 bên má. Thoa ngang từ trong ra ngoài & từ trên xuống dưới.\r\n•	- Sử dụng buổi sáng.\r\n•	- Loại da: Phù hợp mọi loại da.\r\n•	- Dung tích: 50ml.\r\n•	Bảo quản:\r\n•	- Để sản phẩm ở nhiệt độ phòng, nơi khô ráo, thoáng mát.\r\n•	- Tránh ánh nắng trực tiếp và những nơi gần nguồn nhiệt, ẩm mốc.\r\n•	- Tránh xa tầm với của trẻ em.\r\n', 1, 3, 21, NULL, NULL),
(98, 'kdddabo', 'Kem dưỡng trắng da DABO lô hội Aloe Stem-rich Cream', '01LCSi_simg_de2fe0_500x500_maxb.jpg', 260000, 'Công dụng:\r\n- chiết xuất từ tinh chất Lô hội có tác dụng kỳ diệu trong việc làm đẹp, không chỉ làm trắng da, sản sinh các tế bào mới,mà còn phục hồi làn da bị hư tổn.\r\n- kháng khuẩn, nuôi dưỡng và tạo độ ẩm sâu cho da, cung cấp những dưỡng chất và bảo vệ ADN màng tế bào, phân hủy nhanh các hắc tố Melanin giúp làm mờ dần các vết nám trên da\r\nHướng dẫn sử dụng:\r\n- sử dụng kem dưỡng ở bước chăm sóc da sau cùng\r\n- lấy một lượng kem vừa đủ xoa đều và vỗ nhẹ đến khi kem được hấp thu hoàn toàn. \r\n- nếu là lần đầu, nên dùng thử 3-4 lần vào vùng da cổ dưới tai, tránh bôi vào mắt, vết thương hở.\r\n- để nơi khô ráo thoáng mát, tránh xa tầm tay trẻ em\r\n', 1, 3, 21, NULL, NULL),
(99, 'kemdabo', 'KEM MASSAGE Hàn Quốc DABO', 'pfoO2l_simg_d0daf0_800x1200_max.jpg', 510000, 'GREEN TEA MASSAGE CREAM\r\n- chiết xuất từ tinh chất trà xanh có tác dụng diệt khuẩn, sạch mụn, giảm mỡ, săn chắc da nhờ tác dụng vô cùng lành tính của trà xanh\r\n- vì trà xanh không những là một loại thức uống bổ dưỡng cho sức khỏe, trà xanh còn được biết đến là một phương thức dưỡng da vô cùng tuyệt vời dành cho phái đẹp, vì nó sẽ mang lại cho bạn làn da mịn màng, đầy sức sống. \r\n- Tinh chất trà xanh trong kem chứa rất nhiều các chất chống oxy hóa và kháng khuẩn rất có lợi cho da. \r\n- Những thành phần tự nhiên có trong lá trà xanh sẽ là một phương thức hữu hiệu giúp làm sạch sâu và đặc trị mụn cho làn da của bạn, có tác dụng diệt khuẩn, rất an toàn, lành tính. \r\n- Kem còn rất hiệu quả trong việc lấy đi những tế bào da chết, từ đó kích thích tái tạo làn da mới, một phương thức làm đẹp tuyệt vời từ thiên nhiên.\r\n\r\nALOE MASSAGE CREAM\r\n- Chiết xuất từ tinh chất cây lô hội có tác dụng làm giảm các vết thâm nám, làm trắng da, giảm nếp nhăn, tái tạo tế bào da, tinh chất lô hội chứa nhiều Vitamin A, C, E, B1, khoáng chất can-xi, natri, kẽm giúp loại bỏ lớp bụi bẩn và bã nhờn, tạo độ ẩm cho da, giúp da dễ đàn hồi, se khít lỗ chân lông. \r\n- Dùng kem mát-xa Lô hội DABO hàng ngày còn giúp giảm các lớp mỡ thừa dưới da, giảm béo không gây nhờn da, dùng để massage mặt, bụng, đùi...hiệu quả \r\n- giúp chăm sóc da một cách tự nhiên cho bạn làn da mịn màng, săn chắc bằng cách kích thích sự liên kết của cấu trúc da.\r\n', 1, 3, 21, NULL, NULL),
(100, 'kdber110', 'Serum dưỡng trắng Bergamo 110ml - HQ2', 'X7gDQ7_simg_d0daf0_800x1200_max.jpg', 720000, 'Serum dưỡng trắng Bergamo 110ml Nâng cơ chống lão hóa Hỗ trợ dưỡng da trắng sáng, hồng hào, căng tràn sức sống.\r\n– Giúp bổ sung collagen có tác dụng làm căng da, mịn da, mờ nếp nhăn.\r\n– Làm trắng sáng da hiệu quả lại an toàn\r\n– Giúp se khít lỗ chân lông và làm mờ vết thâm nám.\r\n– Dưỡng chất từ thiên nhiên thấm sâu vào da, giúp nuôi dưỡng làn da từ sâu bên trong.\r\n– Cân bằng độ ẩm, cho bạn làn da tươi sáng, mịn màng không tì vết.\r\n– Làm trắng hồng tự nhiên, làm mờ đốm nâu chống lại quá trình lão hóa sớm.\r\nCông dụng của Serum dưỡng trắng Bergamo 110ml \r\n– Serum dưỡng trắng Bergamo 110ml Nâng cơ chống lão hóa Hỗ trợ dưỡng da trắng sáng, hồng hào, căng tràn sức sống.\r\n– Giúp bổ sung collagen có tác dụng làm căng da, mịn da, mờ nếp nhăn.\r\n– Làm trắng sáng da hiệu quả lại an toàn\r\n– Giúp se khít lỗ chân lông và làm mờ vết thâm nám.\r\n– Dưỡng chất từ thiên nhiên thấm sâu vào da, giúp nuôi dưỡng làn da từ sâu bên trong.\r\n– Cân bằng độ ẩm, cho bạn làn da tươi sáng, mịn màng không tì vết.\r\n– Làm trắng hồng tự nhiên, làm mờ đốm nâu chống lại quá trình lão hóa sớm.\r\n– Ngoài ra, serum Bergamo còn làm giảm thiểu tối đa những nếp nhăn xuất hiện do các nguyên nhân gây lão hóa, khoanh vùng và cắt đứt ngăn ngừa sự hội tụ liên kết của sắc tố melanin là nguyên nhân gây sạm nám, tàn nhang, đồi mồi. Làm mềm, căng mịn và trắng sáng làn da của bạn.\r\n– Giúp ngăn chặn sự xuất hiện của sắc tố melanin là nguyên nhân gây nám da, sạm da, giúp bạn có được làn da trắng hồng, đẹp không tỳ vết.\r\n– Phù hợp ngay cả với da nhạy cảm, tổn thương. Không chứa dầu khoáng và Paraben gây hại cho da, không gây nhờn rít, không gây kích ứng da.\r\n', 1, 3, 21, NULL, NULL),
(101, 'py07', 'Tinh dầu dưỡng da Sortie Nobline Wrinkle Free Facial Oil 40ml - sortie_py07', '9x9m2T_simg_d0daf0_800x1200_max.jpg', 520000, 'Thành phần: Argania Spinosa Kernel Oil, Calendula Officinalis Flower Extract, Olea Europaea (Olive) Fruit Oil, Helianthus Annuus (Sunflower) Seed Oil...\r\nTinh dầu dưỡng da Sortie Nobline Wrinkle Free Facial Oil chứa hỗn hợp tinh dầu chiết xuất từ thực vật tự nhiên như dầu Argan, dầu hoa cúc xu xi, dầu hạt hướng dương, tinh dầu ô liu... có tác dụng cung cấp độ ẩm và dưỡng chất, giúp da láng mịn, mềm mại và sáng bóng. Đồng thời, với Coenzyme Q10, sản phẩm giúp tăng độ đàn hồi của da, làm căng mịn da, giảm nếp nhăn, mang đến sức sống tươi trẻ cho làn da.\r\nSản phẩm được Hiệp hội Ecocert (Pháp) chứng nhận về độ an toàn, thích hợp với mọi loại da.\r\nHướng dẫn sử dụng và bảo quản\r\nBước 1: Rửa mặt sạch và dùng nước hoa hồng hoặc sữa dưỡng da\r\nBước 2: Lấy 1 - 2 giọt tinh dầu thoa đều lên da và vỗ nhẹ để tăng độ thẩm thấu\r\nBước 3: Sử dụng hàng ngày vào buổi sáng và buổi tối\r\nBảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và nhiệt độ cao\r\nChú ý: Để xa tầm tay trẻ em\r\nSortie là thương hiệu mỹ phẩm nổi tiếng đã và đang được đón nhận, tin tưởng và yêu thích tại Việt Nam. Sản phẩm có thành phần tự nhiên phù hợp với làn da của người phụ nữ phương Đông. Hiện nay, Sortie luôn không ngừng nghiên cứu để đưa ra được các sản phẩm tốt đáp ứng nhu cầu làm đẹp của khách hàng.\r\n', 1, 3, 21, NULL, NULL),
(102, 'crss01', 'CHARME SO SEXY 100ML', '1ss1.jpg', 590000, '•	Lấy cảm hứng từ sự kết hợp các hương hoa yêu thích của dòng Charme chai nước hoa Charme So Sexy mang đến một mùi hương tươi mát và sảng khoái với sự kết hợp hài hòa của các thành phần hương như hương quýt nhật yuzu, hương hoa mộc lan, hoa sen và hoa mẫu đơn, bên cạnh đó còn có thành phần hương ấm áp của xạ hương và cổ phách.\r\n•	Charme So Sexy đem đến một khởi đầu khá tươi mát với hỗn hợp trái thanh yên và lưu đông lạnh. Tiếp đến, hoa mẫu đơn, hoa linh lan, hoa sen và trái mâm xôi dần được đưa vào cuộc chơi. Khi dần kết thúc, hỗn hợp gỗ mahoganu, hổ phách thực vật và xạ hương trắng cùng hòa quyện, mang tới những trải nghiệm đầy ấm áp và quyến rũ.\r\n•	Mẫu chai được thiết kế với tông màu đỏ tươi trong suốt cùng những đường nét đầy tinh tế, gợi lên nét gợi cảm và ngọt ngào giống như mùi hương. Charme So Sexy mang đến mùi hương cực kỳ gợi cảm và thu hút, và chắc chắn sẽ không bao giờ phải làm bạn thất vọng. Chai nước hoa sẽ là một món quà tuyệt vời và tinh tế vì hương thơm tươi mát, sảng khoái, có chút cổ điển pha lẫn bí ẩn mà chính bạn có thể “tự thưởng” cho bản thân mình.\r\n•	Độ lưu hương và tỏa hương của Charme so sexy sẽ khiến cánh nam giới say mê và chìm đắm trước bất kỳ một cô gái nào mang hương thơm này. Charme so sexy thích hợp dùng cho ban ngày, vào các mùa xuân hè nóng ẩm đầu năm để nước hoa có thể phát huy tác dụng tốt nhất.\r\n', 1, 3, 20, NULL, NULL),
(103, 'crgr01', 'NƯỚC HOA CHARME GOOD GIRL 100ML', '1q2.jpg', 680000, '•	Charme Good Girl nhanh chóng trở thành từ khoá được tìm kiếm nhiều nhất trên mạng xã hội. Nằm trong top những chai nước hoa bán chạy nhất mùa thu đông và được phái đẹp vô cùng yêu thích ngay từ khi  ra mắt.\r\n•	Good Girl là một sự kết hợp đầy mới lạ, tạo một phong cách độc đáo riêng biệt dành cho người dùng bởi những thành phần là hoa huệ, đậu Tonka tinh khiết, nồng nàn, khéo léo thể hiện tính cách của người phụ nữ. Hoa nhài Sambac trắng và cacao cũng là những thành phần mang đến vị ngọt đậm đà quyến rũ cho Good Girl. Với slogan \"It\'s so good to be bad\", Good Girl hứa hẹn là một mùi hương đầy khiêu khích, gợi cảm giúp các nàng tỏa sáng giữa đám đông.\r\n•	Tầng hương đầu mang hơi thở của hạnh nhân pha lẫn hương cà phê thoang thoảng, nhẹ nhàng như khúc dạo đầu của một bài hát êm đềm, tạo nên sự tò mò, muốn khám phá của người xung quanh.\r\nTầng hương thứ hai giúp bạn cuốn hút và nổi bật hơn nhờ sự lan tỏa của một làn sóng các loài hoa trắng Sambac, hoa nhài và hoa huệ. Hương thơm ngọt ngào kèm theo sự khiêu khích và gợi cảm khó cưỡng đầy nữ tính.\r\nTầng hương cuối với đậu Tonka và ca cao tương phản với hoa nhài, hoa huệ càng khiến cho bạn thêm bí ẩn, sâu sắc. Đây cũng là bí quyết khiến cho Charme trở thành một mùi hương đầy sáng tạo và gây nghiện. Good Girl - đem đến cảm giác ly kỳ; huyền bí khiến mọi người khám phá nó cho thỏa tò mò.\r\n•	Độ lưu hương có thể lên đến 12 tiếng khi bạn sử dụng đúng cách, phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Nếu bạn là cô nàng mạnh mẽ, yêu thích sự lạc quan hay muốn tìm một mùi nước hoa khẳng định đẳng cấp quyến rũ của bản thân, thì Charme Good Girl chính là một sự lựa chọn đẳng cấp bạn không thể bỏ qua\r\n', 1, 3, 20, NULL, NULL),
(104, 'crbc01', 'NƯỚC HOA CHARME BY CHARME 50ML', 'by2.jpg', 550000, '•	Nước hoa nữ Charme BY CHARME phù hợp với người trên 25 tuổi. Dòng nước hoa này có độ lưu hương lâu - 7 giờ đến 12 giờ, với độ tỏa hương thuộc dạng rất gần - thoang thoảng trên làn da và phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân\r\n•	Charme BY CHARME mang mùi hương thể hiện sự tự tin và nữ tính với thiết kế hiện đại, sang trọng cùng hương thơm thanh mát nhẹ nhàng và cuốn hút dành cho những cô gái làm chủ được cuộc sống của chính mình.\r\n•	Hương thơm của Charme BY CHARME phù hợp cho cả ngày lẫn đêm với mùi hương nhẹ nhàng, thanh thoát đầy tinh tế. Độ tỏa hương vừa phải cùng thiết kế chai trang nhã cũng là điểm mạnh của chai nước hoa này. Nước hoa nữ Charme BY CHARME như một khúc hát tươi trẻ và năng động với ba tầng hương: đầu, giữa và cuối đã tạo nên sức cuốn hút, sự tò mò và chú ý của người khác phái.\r\n•	Đến với hương thơm của Charme BY CHARME, ngay từ đầu bạn sẽ bắt gặp ngay hương thơm ngọt ngào của cam Bergamot. Hương thơm cam bergamot chưa hết thì liên tiếp là sự nổi lên của mùi hương thơm ngát từ hoa ngọc lan tây, hoa huệ Casablanca và chút hương vị nồng cay từ hoa cam, đưa bạn như lạc vào giữa vườn hoa mà không tìm được lối ra. Cuối cùng, lưu lại trên da là hương thơm ấm áp, nhẹ nhàng của hổ phách, gỗ đàn hương và hương vani Tahiti.\r\n•	Nước hoa Charme by CHARME  thể hiện đẳng cấp của một cô gái cá tính và năng động, vừa sang trọng vừa quý phái. Với thiết kế dạng hình chữ nhật vuông vức, độ tinh tế cao với màu vàng nhạt cho ta cảm giác nhẹ nhàng, dễ chịu và thanh thoát; phối hợp với chai lọ thủy tinh trong suốt tạo sự cuốn hút bí ẩn mà gợi cảm.\r\n•	Chỉ cần nhìn tổng quát có thể cảm nhận được sự ngọt ngào, nữ tính, sự quyến rũ nồng nàn và sự tươi mát ngay từ ánh nhìn đầu tiên. Tất cả đã tạo nên sự hài hòa cho một siêu phẩm của dòng nước hoa Charme.\r\n', 1, 3, 20, NULL, NULL),
(105, 'crbt01', 'NƯỚC HOA CHARME BEAUTIFUL 50ML', 'beautiful4.jpg', 450000, '•	Charme Perfume đã cho ra dòng sản phẩm cao cấp Charme Beautiful với mùi hương riêng biệt không theo bất cứ tông mùi của các thương hiệu nổi tiếng khác trên thế giới. Với thiết kế chai với tông màu vàng đầy sang trọng, cùng những mặt đa giác óng ánh tạo nên sức hút khó cưỡng cho bất cứ cô gái nào sở hữu sản phẩm nước hoa này.\r\n•	Charme Beautiful được thiết kế như một viên ngọc mặt trời lấp lánh phản chiếu lại những gì mà hương thơm bên trong chai nước hoa này muốn lan toả. Mùi hương phảng phất sự hoà quyện bởi hương thơm citrus tươi tắn sánh đôi cùng các nốt hương tích cực mang đến sức sống tràn đầy năng lượng như táo, bưởi, quýt,...\r\n•	Nước hoa Charme Beautiful với mùi hương dịu dàng lan tỏa, bật lên vẻ sang trọng, gợi cảm và quyến rũ. Charme Beautiful là một chuỗi những mùi hương vô cùng quyến rũ như hoa lài và hoa táo hòa trộn với những nốt hương tươi mát của hoa nhài, hoa táo và sau đó dịu đi với hổ phách, xạ hương và vani.\r\n \r\n', 1, 3, 20, NULL, NULL),
(106, 'crmp01', 'NƯỚC HOA CHARME MONOPOLY 50ML', 'mono2.jpg', 390000, '•	Nước hoa Charme MONOPOLY là dòng sản phẩm dành cho nữ được sản xuất theo tiêu chuẩn và công nghệ hoàn toàn từ PHÁP có độ lưu hương rất lâu, mùi hương sang trọng hiện đại, tinh tế và vô cùng gợi cảm. Tạo nên sự tự tin quyến rũ và cuốn hút cho phái đẹp. Sản phẩm tôn vinh sự độc quyền nổi bật khi sử dụng . \r\n•	Nước hoa Charme Monopoly thu hút mọi ánh mắt nữ giới ngay từ cái nhìn đầu tiên, sự cá tính và tinh nghịch được thể hiện qua hình ảnh chai và nắp chai với các mặt hình lục giác óng ánh. Kết hợp với hương hoa ngọt nhẹ xen lẫn hương trái cây tươi mát, mang lại cho nữ giới niềm say mê, sự dịu dàng, nữ tính nhưng không kém phần thu hút, sang trọng.\r\n. Bằng cách thể hiện đầy tinh nghịch đáng yêu nhưng cũng không kém phần bí ẩn, Charme Monopoly dễ dàng du dương khướu giác của mọi người xung quanh chìm vào không khí lãng mạn ngọt ngào được tạo nên từ hoa cỏ, trái cây và mùi thơm kẹo ngọt.\r\n', 1, 3, 20, NULL, NULL),
(107, 'crq01', 'NƯỚC HOA CHARME QUEEN 100ML', 'queen2.jpg', 720000, '•	Charme Queen Eau de Parfum đại diện cho sự nồng nhiệt với một sự tươi mát “đầy phấn khích” và thành phần hoa mang cảm giác gợi cảm. Accord của hoa hồng giúp cho bạn trở nên quyến rũ mãnh liệt hơn bao giờ hết, với hỗn hợp của mâm xôi, mật ong và bổ sung thêm haze lnut sẽ tạo ra một mùi hương đầy lôi cuốn và quyến rũ\r\n•	Charme Queen liên tưởng đến một nữ hoàng của sắc đẹp và nữ hoàng của quyền lực lôi cuốn. Và không thể chối cãi, khi khoác lên hương thơm của Queen, nó đem đến cho bạn một cảm giác tỏa sáng, áp đảo, mạnh mẽ nhưng đầy quyến rũ và hấp dẫn.\r\n•	Charme Queen là mùi hương khá gợi cảm đầy phấn khích, là sự kết hợp tươi mới của các mùi hương dâu rừng, hoa hồng, mật ong và gỗ thơm, phù hợp với phong cách cá tính, năng động của những cô nàng hiện đại.\r\n•	Với điểm mạnh là sự kết hợp hài hoà giữa thành phần là hương hoa cỏ trái cây, mang lại một hương thơm tưởng quen nhưng lạ. Độ lưu hương cực tốt khiến các nàng tự tin suốt ngày dài và dễ dàng ghi điểm với các chàng trai. \r\n', 1, 3, 20, NULL, NULL),
(108, 'smlill01', 'Son Mac Lucky In Love Lunar ( Limited New Year 2019)', 'mac-spring-2019-lunar-new-year_1024x1024.jpg', 649000, '- M.A.C. Lunar New Year Collection 2019 bộ sưu tập tràn ngập sắc đỏ may mắn cho năm mới thực sự là quà \"lì xì\" đầu năm tuyệt vời mà MAC dành riêng cho thị trường Châu Á. Với sắc đỏ tươi cùng những thiết kế lấy cảm hứng từ hoa đào, từ câu đối... bộ sưu tập được xem là món quà \"lì xì\" đầu năm tuyệt vời cho bất kỳ cô gái nào.\r\n- Son Mac Lucky In Love là màu son hồng ngả nhẹ sang tông đất san hô với tone màu ấm mềm mượt với chất Satin. Son Mac Lucky In Love lan tỏa bầu không khí ấm áp và quyến rũ đến mọi trái tim yêu son cùng chung nhịp đập. Màu son này đặc biệt thích hợp với những bạn gái thích tông màu nhẹ nhàng nhưng vẫn lôi cuốn\r\n- Son Môi MAC còn có rất nhiều màu sắc cho các Nàng lựa chọn từ tông màu tươi nhất cho đến trầm nhất MAC đều có. Và có thể nói MAC là một trong những thương hiệu mà có nhiều màu son nhất hiện nay.\r\n- Thiết kế vỏ ngoài truyền thống của MAC là kiểu hình viên đạn, nhưng hàng năm MAC vẫn hay kết hợp với nghệ sĩ nổi tiếng trên Thế Giới để tạo ra những thỏi son MAC độc đáo và rất riêng theo từng Nghệ Sĩ mà MAC hợp tác.\r\n- Ngoài ra Son MAC cũng là dòng son được thường xuyên sử dụng trong các show diễn thời trang, ca nhạc… lớn trên Thế Giới.\r\n\r\n \r\n', 1, 3, 19, NULL, NULL),
(109, 'smptbc01', 'Son MAC Màu Proud To Be Canadian ( Limited)', 'mac_proud_to_be_canadian_29fe6c97f09240d1b553044ba5cb51f7_1024x1024.jpg', 499000, 'Son MAC Proud To Be Canadian - limited edition màu son đỏ không thể thiếu của các quý cô sang trọng, cũng như những bạn trẻ hiện đại. Lấy cảm hứng 150 năm thành lập của đất nước Canada, MAC đã tạo ra bộ sưu tập Proud To Be Canada, sản phẩm có bao bì ấn bản đặc biệt từ lá cờ của Canada với màu sắc chủ đạo là màu đỏ chuẩn.\r\n- Son MAC là loại son chuyên nghiệp với nhiều màu sắc trung thực, rất thích hợp cho mọi lứa tuổi. Với Son MAC bạn sẽ cho bạn một đôi môi gợi cảm, quyến rũ say đắm lòng người.\r\n- Son MAC với nhiều màu sắc quyến rũ, lên màu rất chuẩn và  độ giữ màu lâu.\r\n\r\n- Son MAC còn là dòng son chuyên nghiệp, được dùng để trang điểm cho các người mẫu trong các show thời trang lớn trên thế giới\r\n', 1, 3, 19, NULL, NULL),
(110, 'smss01', 'Son Mac Màu See Sheer ( Phiên Bản Giới Hạn 2019)', '52592638_1305298946274544_2524824120118476800_o-min_1024x1024.jpg', 649000, 'Son Mac See Sheer mang tông hồng sáng, không quá rực nhưng chẳng hề trầm. Một sắc hồng trung tính chẳng lạnh cũng chẳng quá ấm nên không hề sợ tương phản lại màu da của bạn. Ngược lại MAC See Sheer còn làm đẹp cho mọi tông da, rất dễ dùng khi lên môi.\r\n- Son MAC thỏi son mà khi nhắc đến hầu hết các Bạn Trẻ đều biết đến, bởi những ưu điềm của MAC như có giá thành bình dân, màu đẹp và độ giữ màu khỏi chê.\r\n- Son Môi MAC còn có rất nhiều màu sắc cho các Nàng lựa chọn từ tông màu tươi nhất cho đến trầm nhất MAC đều có. Và có thể nói MAC là một trong những thương hiệu mà có nhiều màu son nhất hiện nay.\r\n- Thiết kế vỏ ngoài truyền thống của MAC là kiểu hình viên đạn, nhưng hàng năm MAC vẫn hay kết hợp với nghệ sĩ nổi tiếng trên Thế Giới để tạo ra những thỏi son MAC độc đáo và rất riêng theo từng Nghệ Sĩ mà MAC hợp tác.\r\n- Ngoài ra Son MAC cũng là dòng son được thường xuyên sử dụng trong các show diễn thời trang, ca nhạc… lớn trên Thế Giới.\r\n', 1, 3, 19, NULL, NULL),
(111, 'smpkl301', 'Son MAC Powder Kiss Lipstick Màu 301 A Little Tamed', 'mac-a-little-tamed-min_1024x1024.jpg', 540000, 'Son MAC A Little Tamed 301 – Powder Kiss Lipstick mang màu hồng nhẹ nhàng, nữ tính tựa cánh hoa đào thuộc dòng lì mới toanh Powder Kiss với chất son lì mịn như lụa, độ dưỡng mềm môi, không khô môi như chất cũ nữa, chất mới dòng mới vô cùng mượt môi luôn.\r\n- Dòng son lì mới toanh mang tên Powder Kiss của MAC chắc hẳn là \"siêu phẩm\" son đang khiến các tín đồ làm đẹp yêu thích MAC. MAC Powder Kiss bao gồm 16 tông màu với dải màu khá rộng, trải dài từ các gam nude với đủ mọi sắc độ be, hồng cho đến các gam màu tươi tắn, dễ dùng như hồng, đỏ, cam. Trong 16 gam, có đến hơn 10 gam hợp với làn da châu Á, cho thấy MAC thực sự ưu tiên cho các tín đồ làm đẹp nơi đây.\r\n', 1, 3, 19, NULL, NULL),
(112, 'smpkl306', 'Son MAC Powder Kiss Lipstick Màu 306 Shocking Revelation', 'mac-shocking-revelation-306_1024x1024.jpg', 540000, 'Son MAC 306 Shocking Revelation – Powder Kiss Lipstick mang tông màu hồng ánh đỏ quyến rũ. MAC Powder Kiss Lipstick 306 thuộc dòng lì mới toanh Powder Kiss với chất son lì mịn như lụa, độ dưỡng mềm môi, không khô môi như chất cũ nữa, chất mới dòng mới vô cùng mượt môi luôn.\r\n- Dòng son lì mới toanh mang tên Powder Kiss của MAC chắc hẳn là \"siêu phẩm\" son đang khiến các tín đồ làm đẹp yêu thích MAC. MAC Powder Kiss bao gồm 16 tông màu với dải màu khá rộng, trải dài từ các gam nude với đủ mọi sắc độ be, hồng cho đến các gam màu tươi tắn, dễ dùng như hồng, đỏ, cam. Trong 16 gam, có đến hơn 10 gam hợp với làn da châu Á, cho thấy MAC thực sự ưu tiên cho các tín đồ làm đẹp nơi đây.\r\n', 1, 3, 19, NULL, NULL),
(113, 'smpkl308', 'Son MAC Powder Kiss Lipstick Màu 308 Mandarin O', 'thiet-ke-mac-mandarin-o_1024x1024.jpg', 540000, 'Son MAC 308 Mandarin O – Powder Kiss Lipstick mang tông hồng san hô ngọt ngào, nữ tính, nhẹ nhàng. Với màu MAC 308 rất hợp với những cô nàng \"bánh bèo\" thích makeup theo phong cách Hàn Quốc.\r\n- Dòng son lì mới toanh mang tên Powder Kiss của MAC chắc hẳn là \"siêu phẩm\" son đang khiến các tín đồ làm đẹp yêu thích MAC. MAC Powder Kiss bao gồm 16 tông màu với dải màu khá rộng, trải dài từ các gam nude với đủ mọi sắc độ be, hồng cho đến các gam màu tươi tắn, dễ dùng như hồng, đỏ, cam. Trong 16 gam, có đến hơn 10 gam hợp với làn da châu Á, cho thấy MAC thực sự ưu tiên cho các tín đồ làm đẹp nơi đây.\r\n', 1, 3, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongso`
--

DROP TABLE IF EXISTS `thongso`;
CREATE TABLE IF NOT EXISTS `thongso` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idloai` int(10) NOT NULL,
  `idsanpham` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `thongso_loai_fkid_1` (`idloai`),
  KEY `thongso_sanpham_fkid_2` (`idsanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `thongso`
--

INSERT INTO `thongso` (`id`, `idloai`, `idsanpham`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 1, 11),
(11, 1, 12),
(12, 1, 13),
(13, 1, 14),
(14, 1, 24),
(15, 1, 25),
(16, 1, 26),
(17, 1, 27),
(18, 1, 28),
(19, 1, 29),
(20, 1, 30),
(21, 1, 31),
(22, 1, 32),
(23, 1, 33),
(24, 1, 34),
(25, 1, 35),
(26, 1, 36),
(27, 1, 37),
(28, 1, 38),
(29, 1, 39),
(30, 1, 40),
(31, 1, 41),
(32, 1, 42),
(33, 1, 43),
(34, 1, 44),
(35, 1, 45),
(36, 1, 46),
(37, 1, 47),
(38, 1, 48),
(39, 1, 49),
(40, 1, 50),
(41, 1, 51),
(42, 1, 52),
(43, 1, 53),
(44, 1, 54),
(45, 1, 55),
(46, 1, 56),
(47, 1, 57),
(48, 1, 58),
(49, 1, 59),
(50, 1, 60),
(51, 1, 61),
(52, 1, 62),
(53, 1, 63),
(54, 1, 64),
(55, 2, 65),
(56, 2, 66),
(57, 2, 67),
(58, 2, 68),
(59, 2, 69),
(139, 2, 70),
(140, 2, 71),
(141, 2, 72),
(142, 2, 73),
(143, 2, 73),
(144, 2, 74),
(145, 2, 75),
(146, 2, 76),
(147, 2, 77),
(148, 2, 78),
(149, 2, 79),
(150, 2, 80),
(151, 2, 81),
(152, 2, 82),
(153, 2, 83),
(154, 2, 84),
(155, 2, 85),
(156, 2, 86),
(157, 2, 87),
(158, 2, 88),
(159, 2, 89),
(160, 2, 90),
(161, 2, 91),
(162, 2, 92),
(163, 2, 93),
(164, 3, 96),
(165, 3, 97),
(166, 3, 98),
(167, 3, 99),
(168, 3, 100),
(169, 3, 101),
(170, 3, 102),
(171, 3, 103),
(172, 3, 104),
(173, 3, 105),
(174, 3, 106),
(175, 3, 107),
(176, 3, 108),
(177, 3, 109),
(178, 3, 110),
(179, 3, 111),
(180, 3, 112),
(181, 3, 113);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tsdienthoai`
--

DROP TABLE IF EXISTS `tsdienthoai`;
CREATE TABLE IF NOT EXISTS `tsdienthoai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idthongso` int(10) NOT NULL,
  `cameratruoc` double NOT NULL,
  `camerasau` double NOT NULL,
  `bonhotrong` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tsdienthoai_thongso_fkid_1` (`idthongso`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tsdienthoai`
--

INSERT INTO `tsdienthoai` (`id`, `idthongso`, `cameratruoc`, `camerasau`, `bonhotrong`) VALUES
(1, 1, 5, 12, 32),
(2, 2, 7, 12, 32),
(3, 3, 7, 12, 64),
(4, 4, 7, 12, 256),
(5, 5, 7, 12, 256),
(6, 6, 7, 12, 256),
(7, 7, 7, 12, 512),
(8, 8, 8, 13, 32),
(14, 9, 24, 16, 128),
(15, 10, 16, 13, 64),
(16, 11, 16, 13, 32),
(17, 12, 8, 13, 16),
(18, 13, 32, 40, 256),
(139, 14, 5, 8, 8),
(140, 15, 13, 8, 32),
(141, 16, 16, 16, 64),
(142, 17, 12, 20, 64),
(143, 18, 0, 3, 0),
(144, 19, 0, 2, 0),
(145, 20, 0, 2, 4),
(146, 21, 25, 12, 128),
(147, 22, 25, 16, 256),
(148, 23, 16, 48, 128),
(149, 24, 25, 16, 64),
(150, 25, 16, 13, 64),
(151, 26, 25, 16, 64),
(152, 27, 8, 13, 32),
(153, 28, 13, 13, 64),
(154, 29, 5, 13, 16),
(155, 30, 16, 16, 64),
(156, 31, 8, 13, 64),
(157, 32, 10, 12, 512),
(158, 33, 8, 12, 64),
(159, 34, 8, 12, 64),
(160, 35, 8, 12, 512),
(161, 36, 24, 24, 128),
(162, 37, 24, 16, 64),
(163, 38, 24, 24, 128),
(164, 39, 25, 25, 128),
(165, 40, 32, 12, 128),
(166, 41, 25, 16, 128),
(167, 42, 8, 13, 32),
(168, 43, 5, 13, 32),
(169, 44, 8, 13, 64),
(170, 45, 5, 13, 16),
(171, 46, 20, 12, 64),
(172, 47, 5, 12, 32),
(173, 48, 16, 13, 32),
(174, 49, 5, 8, 8),
(175, 50, 8, 12, 32),
(176, 51, 13, 48, 64),
(177, 52, 20, 12, 64),
(178, 53, 24, 12, 64),
(180, 54, 5, 12, 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tslaptop`
--

DROP TABLE IF EXISTS `tslaptop`;
CREATE TABLE IF NOT EXISTS `tslaptop` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idthongso` int(10) NOT NULL,
  `hedieuhanh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ram` int(50) NOT NULL,
  `ocung` int(50) NOT NULL,
  `manhinh` int(50) NOT NULL,
  `carddohoa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pin` int(50) NOT NULL,
  `trongluong` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tslaptop_thongso_fkid_1` (`idthongso`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tslaptop`
--

INSERT INTO `tslaptop` (`id`, `idthongso`, `hedieuhanh`, `cpu`, `ram`, `ocung`, `manhinh`, `carddohoa`, `pin`, `trongluong`) VALUES
(45, 55, 'Windows 10 Home SL', 'Intel Celeron, N3350, 1.10 GHz', 4, 500, 14, 'Card đồ họa tích hợp, Intel® HD Graphics', 6, 2),
(46, 56, 'Windows 10 Home SL', 'Intel Core i3 Coffee Lake, 8145U, 2.10 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 6, 2),
(47, 57, 'Windows 10 Home SL', 'Intel Core i7 Kabylake Refresh, 8550U, 1.80 GHz', 4, 1000, 14, 'Card đồ họa rời, NVIDIA Geforce MX130, 2GB', 6, 2),
(48, 58, 'Windows 10 Home SL', 'Intel Core i5 Kabylake Refresh, 8250U, 1.60 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 6, 2),
(49, 59, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7130U, 2.70 GHz', 4, 500, 14, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(50, 139, 'Windows 10 Home SL', 'Intel Pentium, N5000, 1.10 GHz', 4, 250, 14, 'Card đồ họa tích hợp, Intel® UHD Graphics 605', 4, 2),
(99, 140, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(100, 141, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(101, 142, 'Windows 10 Home SL', 'Intel Core i3 Skylake, 6006U, 2.00 GHz', 4, 1000, 15, 'Card đồ họa tích hợp, Intel® HD Graphics 520', 4, 2),
(102, 143, 'Windows 10 Home SL', 'Intel Core i5 Kabylake Refresh, 8250U, 1.60 GHz', 4, 1000, 15, 'Card đồ họa rời, AMD Radeon 530, 2 GB', 4, 2),
(103, 144, 'Windows 10 Home SL', 'Intel Core i5 Kabylake Refresh, 8250U, 1.60 GHz', 8, 256, 13, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 4, 2),
(104, 145, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 500, 15, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(105, 146, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 500, 15, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(106, 147, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 1000, 15, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(107, 148, 'Windows 10 Home SL', 'Intel Pentium, N5000, 1.10 GHz', 4, 500, 15, 'Card đồ họa tích hợp, Intel® HD Graphics', 4, 2),
(108, 149, 'Windows 10 Home SL', 'Intel Core i3 Coffee Lake, 8145U, 2.10 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 4, 2),
(109, 150, 'Windows 10 Home SL', 'Intel Core i3 Coffee Lake, 8145U, 2.10 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 4, 2),
(110, 151, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 1000, 15, 'Card đồ họa rời, NVIDIA GeForce MX110, 2GB', 4, 2),
(111, 152, 'Windows 10 Home SL', 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', 4, 1000, 15, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(112, 153, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 4, 2),
(113, 154, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', 4, 1000, 15, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(114, 155, 'Windows 10 Home SL', 'Intel Core i5 Coffee Lake, 8250U, 1.60 GHz', 4, 1000, 15, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 4, 2),
(115, 156, 'Windows 10 Home SL', 'Intel Core i5 Coffee Lake, 8250U, 1.60 GHz', 4, 1000, 14, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(116, 157, 'Windows 10 Home SL', 'Intel Core i7 Coffee Lake, 8550U, 1.80 GHz', 4, 256, 14, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 4, 2),
(117, 158, 'Windows 10 Home SL', 'Intel Core i3 Kabylake, 7130U, 2.70 GHz', 4, 128, 14, 'Card đồ họa tích hợp, Intel® UHD Graphics 620', 4, 2),
(118, 159, 'Windows 10 Home SL', 'Intel Core i5 Broadwell, 1.80 GHz', 8, 128, 13, 'Card đồ họa tích hợp, Intel HD Graphics 6000', 4, 2),
(119, 160, 'Mac OS', 'Intel Core i5 Coffee Lake, 1.60 GHz', 8, 128, 13, 'Card đồ họa tích hợp, Intel UHD Graphics 617', 4, 2),
(120, 161, 'Mac OS', 'Intel Core i5 Kabylake Refresh, 2.30 GHz', 8, 256, 13, 'Card đồ họa tích hợp, Intel Iris Plus Graphics 655', 4, 2),
(121, 162, 'Windows 10 Home SL', 'Intel Core i5 Kabylake Refresh, 8250U, 1.60 GHz', 4, 256, 14, 'Card đồ họa tích hợp, Intel® HD Graphics 620', 4, 2),
(122, 163, 'Windows 10 Home SL', 'Intel Core i7 Coffee Lake, 8750H, 2.20 GHz', 8, 1000, 15, 'Card đồ họa rời, NVIDIA GeForce GTX 1050Ti, 4GB', 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tsmypham`
--

DROP TABLE IF EXISTS `tsmypham`;
CREATE TABLE IF NOT EXISTS `tsmypham` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idthongso` int(10) NOT NULL,
  `thuonghieu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xuatxu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trongluong` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tsmypham_thongso_fkid_1` (`idthongso`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tsmypham`
--

INSERT INTO `tsmypham` (`id`, `idthongso`, `thuonghieu`, `xuatxu`, `trongluong`) VALUES
(19, 164, 'VICHY', 'Pháp', 50),
(20, 165, 'VICHY', 'Pháp', 50),
(21, 166, 'DABO ', 'Hàn Quốc', 50),
(22, 167, 'DABO ', 'Hàn Quốc', 200),
(23, 168, 'Bergamo', 'Hàn Quốc', 110),
(24, 169, 'Sortie ', 'Hàn Quốc', 40),
(25, 170, 'CHARME ', 'Việt Nam', 100),
(26, 171, 'CHARME ', 'Việt Nam', 100),
(27, 172, 'CHARME ', 'Việt Nam', 50),
(28, 173, 'CHARME ', 'Việt Nam', 50),
(29, 174, 'CHARME ', 'Việt Nam', 50),
(30, 175, 'CHARME ', 'Việt Nam', 100),
(31, 176, 'MAC ', 'Canada', 3),
(32, 177, 'MAC ', 'Canada', 3),
(33, 178, 'MAC ', 'Canada', 3),
(34, 179, 'MAC ', 'Ý', 3),
(35, 180, 'MAC ', 'Ý', 3),
(36, 181, 'MAC ', 'Ý', 3);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadons`
--
ALTER TABLE `chitiethoadons`
  ADD CONSTRAINT `cthd_hoadon_id_fk_1` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthd_sanpham_id_fk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanphams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hang`
--
ALTER TABLE `hang`
  ADD CONSTRAINT `hang_loai_fkid_1` FOREIGN KEY (`idloai`) REFERENCES `loai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_sanpham_id_fk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanphams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_nguoidung_id_fk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  ADD CONSTRAINT `sanpham_hang_id_fk_1` FOREIGN KEY (`idhang`) REFERENCES `hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_loai_id_fk_2` FOREIGN KEY (`idloai`) REFERENCES `loai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_nguoidung_id_fk_3` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongso`
--
ALTER TABLE `thongso`
  ADD CONSTRAINT `thongso_loai_fkid_1` FOREIGN KEY (`idloai`) REFERENCES `loai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thongso_sanpham_fkid_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanphams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tsdienthoai`
--
ALTER TABLE `tsdienthoai`
  ADD CONSTRAINT `tsdienthoai_thongso_fkid_1` FOREIGN KEY (`idthongso`) REFERENCES `thongso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tslaptop`
--
ALTER TABLE `tslaptop`
  ADD CONSTRAINT `tslaptop_thongso_fkid_1` FOREIGN KEY (`idthongso`) REFERENCES `thongso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tsmypham`
--
ALTER TABLE `tsmypham`
  ADD CONSTRAINT `tsmypham_thongso_fkid_1` FOREIGN KEY (`idthongso`) REFERENCES `thongso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
