-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2018 at 04:51 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kiemtrachinh`
--

CREATE TABLE IF NOT EXISTS `kiemtrachinh` (
  `ms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kiemtrachinh`
--

INSERT INTO `kiemtrachinh` (`ms`, `thoigian`) VALUES
('1027', '2018-09-08 12:32:26'),
('1028', '2018-09-08 12:32:27'),
('1003', '2018-09-09 12:08:20'),
('1005', '2018-09-09 12:08:27'),
('1133', '2018-09-09 12:08:31'),
('1133', '2018-09-09 12:08:34'),
('1133', '2018-09-09 12:08:35'),
('1133', '2018-09-09 12:08:37'),
('1133', '2018-09-09 12:08:38'),
('1133', '2018-09-09 12:08:39'),
('1133', '2018-09-09 12:08:40'),
('1133', '2018-09-09 12:08:41'),
('1133', '2018-09-09 12:08:42'),
('1028', '2018-09-09 12:08:47'),
('1028', '2018-09-09 12:08:49'),
('1028', '2018-09-09 12:08:51'),
('1028', '2018-09-09 12:08:52'),
('1028', '2018-09-09 16:35:14'),
('1028', '2018-09-09 16:35:16'),
('1028', '2018-09-09 16:35:17'),
('1003', '2018-09-09 16:35:18'),
('1005', '2018-09-09 16:35:22'),
('1028', '2018-09-09 16:35:30'),
('1028', '2018-09-09 16:35:31'),
('1028', '2018-09-09 16:35:33'),
('1028', '2018-09-09 16:35:35'),
('1028', '2018-09-09 16:35:46'),
('1028', '2018-09-09 16:35:50'),
('1133', '2018-09-09 16:35:56'),
('1003', '2018-09-09 17:24:31'),
('1003', '2018-09-09 17:24:34'),
('1028', '2018-09-09 17:24:39'),
('1028', '2018-09-09 17:24:41'),
('1003', '2018-09-09 17:24:42'),
('1003', '2018-09-09 11:50:05'),
('1003', '2018-09-09 11:50:07'),
('1003', '2018-09-09 11:50:08'),
('1028', '2018-09-09 11:50:11'),
('1028', '2018-09-09 11:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `kiemtraphu`
--

CREATE TABLE IF NOT EXISTS `kiemtraphu` (
  `ms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kiemtraphu`
--

INSERT INTO `kiemtraphu` (`ms`, `thoigian`) VALUES
('1027', '2018-09-08 12:32:26'),
('1028', '2018-09-08 12:32:27'),
('1003', '2018-09-09 12:08:20'),
('1005', '2018-09-09 12:08:27'),
('1133', '2018-09-09 12:08:31'),
('1133', '2018-09-09 12:08:34'),
('1133', '2018-09-09 12:08:35'),
('1133', '2018-09-09 12:08:37'),
('1133', '2018-09-09 12:08:38'),
('1133', '2018-09-09 12:08:39'),
('1133', '2018-09-09 12:08:40'),
('1133', '2018-09-09 12:08:41'),
('1133', '2018-09-09 12:08:42'),
('1028', '2018-09-09 12:08:47'),
('1028', '2018-09-09 12:08:49'),
('1028', '2018-09-09 12:08:51'),
('1028', '2018-09-09 12:08:52'),
('1028', '2018-09-09 16:35:14'),
('1028', '2018-09-09 16:35:16'),
('1028', '2018-09-09 16:35:17'),
('1003', '2018-09-09 16:35:18'),
('1005', '2018-09-09 16:35:22'),
('1028', '2018-09-09 16:35:30'),
('1028', '2018-09-09 16:35:31'),
('1028', '2018-09-09 16:35:33'),
('1028', '2018-09-09 16:35:35'),
('1028', '2018-09-09 16:35:46'),
('1028', '2018-09-09 16:35:50'),
('1133', '2018-09-09 16:35:56'),
('1003', '2018-09-09 17:24:31'),
('1003', '2018-09-09 17:24:34'),
('1028', '2018-09-09 17:24:39'),
('1028', '2018-09-09 17:24:41'),
('1003', '2018-09-09 17:24:42'),
('1003', '2018-09-09 11:50:05'),
('1003', '2018-09-09 11:50:07'),
('1003', '2018-09-09 11:50:08'),
('1028', '2018-09-09 11:50:11'),
('1028', '2018-09-09 11:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE IF NOT EXISTS `nhanvien` (
  `ms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subdep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tentochuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `finish` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`ms`, `hoten`, `dep`, `subdep`, `maloai`, `tentochuc`, `start`, `finish`) VALUES
('1003', 'HOANG THI THU LIEN', 'HR', 'HR', '1', NULL, NULL, NULL),
('1005', 'NGUYEN THI KIEU DIEM', 'SALES', 'SALES', '1', NULL, NULL, NULL),
('1006', 'PHAM HANG HAI', 'SALES', 'SALES', '1', NULL, NULL, NULL),
('1007', 'QUACH CHUNG THINH PHAT', 'SALES', 'SALES', '1', NULL, NULL, NULL),
('1011', 'DANG THI MY THIEN', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1012', 'NGUYEN MONG KY DUYEN', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1013', 'BUI QUANG TAN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1014', 'NGUYEN THI CONG DIEM', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1015', 'NGUYEN PHU THANH', 'PROJECT MANAGEMENT', 'PROJECT MANAGEMENT', '1', NULL, NULL, NULL),
('1016', 'LAM VAN VUONG', 'IT', 'IT', '1', NULL, NULL, NULL),
('1017', 'TRAN THANH TIEN', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1018', 'MAI HOANG ANH', 'PRODUCTION', 'assembly blokset', '1', NULL, NULL, NULL),
('1020', 'LE DUC LOI', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1023', 'DANG VAN SANG', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1024', 'LE QUANG KHANG', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1027', 'TRAN NHU NHAN', 'R&D', 'R&D', '1', NULL, NULL, NULL),
('1028', 'DANG PHUOC DUC', 'R&D', 'R&D', '1', NULL, NULL, NULL),
('1030', 'LE VAN TOAI', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1032', 'LE VAN CHUONG', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1036', 'TRUONG THI KIEU TRAM', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1039', 'HO MINH HOI', 'R&D', 'R&D', '1', NULL, NULL, NULL),
('1040', 'NGUYEN TAN THANH', 'R&D', 'R&D', '1', NULL, NULL, NULL),
('1042', 'HOANG VAN TRONG', 'R&D', 'Internship', '1', NULL, NULL, NULL),
('1047', 'LE THANH HIEN', 'R&D', 'R&D', '1', NULL, NULL, NULL),
('1052', 'TRUONG TRUNG DUC', 'R&D', 'R&D', '1', NULL, NULL, NULL),
('1053', 'LEONARDUS LUMBANTORUAN', 'CEO', 'CEO', '1', NULL, NULL, NULL),
('1054', 'NGUYEN THANH LUU', 'QC', 'QC', '1', NULL, NULL, NULL),
('1055', 'PHAN VAN BEO', 'PRODUCTION', 'assembly blokset', '1', NULL, NULL, NULL),
('1058', 'VO VAN DANH', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1059', 'LE MINH TAM', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1060', 'LE HUU TAI', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1063', 'TRAN CONG THANH', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1064', 'NGUYEN THI THUONG', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1066', 'TRINH VAN VINH', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1068', 'TRUONG VAN NGUU', 'QC', 'QC', '1', NULL, NULL, NULL),
('1070', 'NGUYEN NGOC TAN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1075', 'PHAN THI HONG', 'HR', 'Cleaner', '1', NULL, NULL, NULL),
('1079', 'TRAN VAN VIET', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1080', 'PHAM VAN THAM', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1090', 'HUYNH VAN HAN', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1102', 'NGUYEN THI PHUONG', 'PRODUCTION', 'Cleaner', '1', NULL, NULL, NULL),
('1104', 'NGUYEN THI BE NGOC', 'PRODUCTION', 'Cleaner', '1', NULL, NULL, NULL),
('1110', 'DO VAN THUONG', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1117', 'NGUYEN THI SUONG GIANG', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1118', 'NGUYEN VAN HIEU', 'SERVICE MANAGER', 'SERVICE MANAGER', '1', NULL, NULL, NULL),
('1123', 'TRAN THI THU THAO', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1125', 'LE DINH LINH', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1126', 'VU THANH PHA', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1131', 'PHUNG NGOC DE', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1133', 'LUU CONG THANH', 'GENERAL DIRECTOR', 'GENERAL DIRECTOR', '1', NULL, NULL, NULL),
('1134', 'NGUYEN THI TRUC MAI', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1135', 'NGUYEN THI NGOC THAO', 'PROJECT MANAGEMENT', 'PROJECT MANAGEMENT', '1', NULL, NULL, NULL),
('1137', 'LE QUANG TRUNG', 'PRODUCTION', 'Assistance - Electrical', '1', NULL, NULL, NULL),
('1140', 'PHAN NHAT NAM', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1144', 'DO THI TUYET NHUNG', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1147', 'NGUYEN THANH THUONG', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1149', 'PHAM XUAN HAN', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1156', 'LE VAN DAI', 'QC', 'QC', '1', NULL, NULL, NULL),
('1157', 'NGUYEN NGOC TOAN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1158', 'DOAN GIANG TINH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1159', 'DAO VIET LONG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1160', 'TRAN XUAN VINH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1162', 'TRAN QUOC QUAN', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1163', 'DANG MINH SANG', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1164', 'LE BA THINH', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1167', 'TRAN VAN HIEU', 'QC', 'QC', '1', NULL, NULL, NULL),
('1171', 'HO VI TINH', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1174', 'NGUYEN DUY THANG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1176', 'TONG TRUONG TU HAO', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1178', 'NGUYEN THI THANH TUYET', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1179', 'NGUYEN THANH TRI', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1189', 'BUI MAI DUNG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1191', 'NGUYEN NGOC TU', 'PRODUCTION', 'assembly DB', '1', NULL, NULL, NULL),
('1200', 'TRAN THI THU THUY', 'FINANCE', 'FINANCE', '1', NULL, NULL, NULL),
('1203', 'NGUYEN THI THUY HUONG', 'FINANCE', 'FINANCE', '1', NULL, NULL, NULL),
('1204', 'QUANG THI PHUOC THUYET', 'LOGISTIC', 'LOGISTIC', '1', NULL, NULL, NULL),
('1207', 'LUU HOAI NAM', 'TECH ADVISOR', 'Technician', '1', NULL, NULL, NULL),
('1209', 'VO THI THANH TRUC', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1211', 'VO THI MY HONG', 'PURCHASING', 'PURCHASING', '1', NULL, NULL, NULL),
('1212', 'LE VAN CHUC', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1214', 'NGUYEN CHANH TRUNG', 'Driver', 'Driver', '1', NULL, NULL, NULL),
('1217', 'PHAN THANH LAM', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1220', 'VO THANH KHIEM', 'QC', 'QC', '1', NULL, NULL, NULL),
('1221', 'HUYNH MINH TRI', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1222', 'LE HUU DUC', 'QC', 'QC', '1', NULL, NULL, NULL),
('1223', 'NGUYEN DUC NHA', 'PRODUCTION', 'TRaining in QC', '1', NULL, NULL, NULL),
('1225', 'NGUYEN VAN HAP', 'QC', 'QC', '1', NULL, NULL, NULL),
('1226', 'PHAN THI HA', 'QC', 'QC', '1', NULL, NULL, NULL),
('1229', 'NGUYEN THAI NHAT ANH', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1230', 'LAM VAN CONG', 'PRODUCTION', 'ELectrical', '1', NULL, NULL, NULL),
('1233', 'LE THANH TU', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1241', 'TRAN HA DUC', 'DEPUTY GENERAL DIRECTOR', 'DEPUTY GENERAL DIRECTOR', '1', NULL, NULL, NULL),
('1247', 'VU VAN KIEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1249', 'VO TRUNG KIEN', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1250', 'TRINH VAN LANH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1253', 'NGUYEN THE VINH', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1256', 'HUYNH TU ANH', 'PURCHASING', 'PURCHASING', '1', NULL, NULL, NULL),
('1257', 'TRAN THI THU VAN', 'HR', 'RECEPTIONIST', '1', NULL, NULL, NULL),
('1259', 'PHAM THI TUYET NGAN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1260', 'LE VAN QUANG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1266', 'TRAN VAN QUI', 'PRODUCTION', 'Assistance', '1', NULL, NULL, NULL),
('1269', 'DANH THI THUY NGUYEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1274', 'THACH MINH TRUONG', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1275', 'NGUYEN KIM TU', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1276', 'VO VAN CHIEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1277', 'HOANG KIM DINH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1278', 'VO VAN NGOC', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1279', 'NGUYEN HOANG THAI', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1283', 'TRUONG HOANG GIANG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1285', 'PHAM MINH PHUNG', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1288', 'HUYNH VAN QUOC TIN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1289', 'NGUYEN MINH KHOA', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1295', 'VU VAN BINH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1299', 'HUYNH KIM HUONG', 'FINANCE', 'FINANCE', '1', NULL, NULL, NULL),
('1302', 'NGUYEN NGOC XUAN', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1303', 'VAN THI THUC UYEN', 'PURCHASING', 'PURCHASING', '1', NULL, NULL, NULL),
('1304', 'NGUYEN THI THUY DUONG', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1306', 'HUYNH VAN NHO', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1315', 'VU LAM THIEN', 'PRODUCTION', 'Electrical ', '1', NULL, NULL, NULL),
('1316', 'PHAM DINH TUONG', 'PRODUCTION', 'Electrical ', '1', NULL, NULL, NULL),
('1317', 'MAI THANH TUAN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1319', 'BUI NGOC NIEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1322', 'LE QUOC TOAN', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1323', 'BUI VAN THANH', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1324', 'LY THANH NHAN', 'PRODUCTION', 'assembly DB', '1', NULL, NULL, NULL),
('1325', 'TRAN VAN TINH', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1328', 'THAI VAN PHONG', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1329', 'LUONG THANH NHAN', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1330', 'TRAN VU CA', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1331', 'VAN HIEN QUI', 'PRODUCTION', 'Electrical Training for QC', '1', NULL, NULL, NULL),
('1332', 'CHU THE ANH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1333', 'TRAN THANH PHAT', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1339', 'HUYNH THI QUYNH NHU', 'PURCHASING', 'PURCHASING', '1', NULL, NULL, NULL),
('1341', 'LE HOANG MY', 'FINANCE', 'FINANCE', '1', NULL, NULL, NULL),
('1342', 'NGUYEN VAN VO', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1343', 'DANG NHU HOANG NGHIA', 'PRODUCTION', 'assembly', '1', NULL, NULL, NULL),
('1346', 'TRAN THI GAI', 'LOGISTIC', 'LOGISTIC', '1', NULL, NULL, NULL),
('1353', 'NGUYEN THI KIEU TRINH', 'PURCHASING', 'PURCHASING', '1', NULL, NULL, NULL),
('1354', 'NGUYEN VAN DUOC', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1355', 'HOANG VAN DUNG', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1356', 'VO HOANG THIEN', 'PRODUCTION MANAGER', 'PRODUCTION MANAGER', '1', NULL, NULL, NULL),
('1361', 'NGUYEN THANH VO', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1363', 'NGUYEN DOAN SANG', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1368', 'TRAN NGOC CUONG', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1369', 'TRAN ANH TUAN', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1370', 'PHAM NGOC TIEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1371', 'DANG VAN VIET', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1372', 'VO TRONG DUC', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1373', 'NGUYEN CONG HUY', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1376', 'VY THI BE', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1377', 'TRAN QUOC CHIEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1378', 'LE MANH HUNG', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1381', 'TRAN THI HONG THAM', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1382', 'NGUYEN THI NHAT TOI', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1384', 'VO THI DIEU HUYEN', 'PRODUCTION', 'Secretary', '1', NULL, NULL, NULL),
('1391', 'HUYNH THI THUY', 'PRODUCTION', 'Secretary', '1', NULL, NULL, NULL),
('1393', 'NGAN VAN BINH', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1394', 'HO THI HIEN', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1395', 'BACH VU SON', 'R&D', 'R&D', '1', NULL, NULL, NULL),
('1404', 'TRUONG MINH HAI', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1405', 'LUU VAN NHAT', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1409', 'MAY PHONE THIT', 'PROJECT MANAGEMENT', 'PROJECT MANAGEMENT', '1', NULL, NULL, NULL),
('1421', 'TRAN VAN GO', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1427', 'TRAN MINH TAM', 'PRODUCTION', 'Assembly DB', '1', NULL, NULL, NULL),
('1429', 'HO SI DUC', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1431', 'MAI THI THUY KIEU', 'HR', 'HR', '1', NULL, NULL, NULL),
('1440', 'TRAN THI UY', 'FINANCE', 'LAWS', '1', NULL, NULL, NULL),
('1441', 'NGUYEN PHUOC TOAN', 'PROJECT MANAGEMENT', 'PROJECT MANAGEMENT', '1', NULL, NULL, NULL),
('1442', 'NGUYEN AN PHU', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1443', 'BUI PHU CUONG', 'PRODUCTION', 'Packing', '1', NULL, NULL, NULL),
('1445', 'HOANG DUY TAN', 'QC', 'QC', '1', NULL, NULL, NULL),
('1451', 'NGUYEN CHI LINH', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1452', 'LE THI PHUONG', 'HR', 'Cleaner', '1', NULL, NULL, NULL),
('1455', 'PHAN THANH SANG', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1461', 'DANG XUAN GIANG', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1462', 'LE VAN PHONG', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1467', 'TO VAN DUC', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1474', 'DUONG THANH TRUNG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1480', 'PHAM MINH TIEN', 'QC', 'QC', '1', NULL, NULL, NULL),
('1486', 'PHYO WAI OO', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1487', 'ARKAR PHYO', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1488', 'VU DINH NAM', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1492', 'LY XUAN DAT', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1494', 'LE DINH DUNG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1501', 'NGUYEN DUC LENH', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1503', 'PHAN THANH HUY', 'PRODUCTION', 'Internship', '1', NULL, NULL, NULL),
('1504', 'HO VAN NAM', 'PRODUCTION', 'Internship', '1', NULL, NULL, NULL),
('1506', 'DANH BAL', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1507', 'PHAM VAN MUN', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1512', 'NGUYEN LAM QUOC HUY', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1514', 'TRAN THAI NGUYEN', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1516', 'NGUYEN VAN PHUNG', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1517', 'TRAN THI NHAN', 'PURCHASING', 'PURCHASING', '1', NULL, NULL, NULL),
('1520', 'NGUYEN VAN MANH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1521', 'DINH VAN TUAN EM', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1525', 'NGUYEN VAN NGOC', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1527', 'DOAN VAN HUE', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1528', 'LAC THI THANH NGA', 'HR', 'Cleaner', '1', NULL, NULL, NULL),
('1529', 'VU MINH HA', 'HR', 'Cleaner', '1', NULL, NULL, NULL),
('1530', 'TRAN THI OANH', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1538', 'VU NGOC HONG THY', 'PURCHASING', 'PURCHASING', '1', NULL, NULL, NULL),
('1540', 'NGUYEN HUU NHAN', 'PROJECT MANAGEMENT', 'PROJECT MANAGEMENT', '1', NULL, NULL, NULL),
('1541', 'PHAN XUAN LAP', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1542', 'VO THANH BACH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1543', 'NGUYEN THI THANH THUY', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1544', 'LE VAN CUONG', 'PRODUCTION', 'assembly', '1', NULL, NULL, NULL),
('1547', 'KHUC TUNG DUONG', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1548', 'NGUYEN HUY DANG', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1549', 'NGUYEN VAN CUONG', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1554', 'TRAN THI HONG THANH', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1555', 'QUACH THI HONG THUY', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1558', 'LAM HOANG', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1559', 'DANG VAN SEN', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1560', 'LE PHAM THI DUYEN', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1561', 'NGUYEN DUC TUAN', 'PRODUCTION', 'Mechanical Eng', '1', NULL, NULL, NULL),
('1562', 'LE MINH DE', 'PRODUCTION', 'Packing', '1', NULL, NULL, NULL),
('1565', 'LE MINH DUC', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1574', 'NGO THI SINH', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1576', 'NGUYEN NGOC LAN', 'SERVICE', 'Secretary', '1', NULL, NULL, NULL),
('1577', 'NGUYEN THI HONG KIM', 'PRODUCTION', 'Label', '1', NULL, NULL, NULL),
('1578', 'NGUYEN HOAI DUY', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1579', 'NGUYEN KHAC PHUC', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1581', 'LE VAN BAT', 'PRODUCTION', 'Busbar', '1', NULL, NULL, NULL),
('1584', 'TRINH DUC ANH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1585', 'NGUYEN BACH LONG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1586', 'LE VAN TIEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1587', 'HO DINH THINH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1589', 'NGUYEN VAN RI', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1590', 'LE VAN HUYNH', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1592', 'NGUYEN VAN THANH', 'PRODUCTION', 'Welding', '1', NULL, NULL, NULL),
('1593', 'LE VAN NHAT', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1594', 'NGUYEN TRUONG GIANG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1595', 'LE VAN HIEP', 'QC', 'QC', '1', NULL, NULL, NULL),
('1596', 'LE HUU CHIEN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1597', 'LE HUU THANG', 'QC', 'QC', '1', NULL, NULL, NULL),
('1598', 'CAO QUANG CHAU', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1599', 'NGUYEN TUAN NGOC', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1601', 'LAM VAN PHUOC', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1602', 'TRUONG THANH THAO', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1603', 'TRAN VINH KY', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1604', 'TRAN HOANG THAI', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1607', 'DOAN TRUNG CAP', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1608', 'TRUONG LE MINH THUY', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1610', 'PHAN THIEN AN', 'DESIGN', 'DESIGN', '1', NULL, NULL, NULL),
('1613', 'PHAN VAN HAI', 'PRODUCTION', 'Assembly', '1', NULL, NULL, NULL),
('1614', 'LE THI NHU LIEN', 'SERVICE', 'Secretary', '1', NULL, NULL, NULL),
('1616', 'LE HIEU LIEM', 'PRODUCTION', 'CNC', '1', NULL, NULL, NULL),
('1617', 'LE QUY NHAN', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1620', 'NGO DO BAO KHANH', 'TENDER', 'TENDER', '1', NULL, NULL, NULL),
('1621', 'NGUYEN THANH TOAN', 'PRODUCTION', 'Warehouse', '1', NULL, NULL, NULL),
('1622', 'CAO VAN BI', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1624', 'NGUYEN THI TUONG VI', 'FINANCE', 'FINANCE', '1', NULL, NULL, NULL),
('1625', 'NGO TAN THAN', 'PRODUCTION', 'assembly', '1', NULL, NULL, NULL),
('1626', 'LE DINH NHON', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1627', 'LE THANH KY', 'PRODUCTION', 'assembly', '1', NULL, NULL, NULL),
('1628', 'CAO CHI PHUONG', 'PRODUCTION', 'Electrical', '1', NULL, NULL, NULL),
('1629', ' TRAN VAN MUONG', 'PRODUCTION', 'Painting', '1', NULL, NULL, NULL),
('1630', 'QUACH THAO TRANG', 'HR', 'RECEPTIONIST', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phanloai`
--

CREATE TABLE IF NOT EXISTS `phanloai` (
  `maloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phanloai`
--

INSERT INTO `phanloai` (`maloai`, `ten`) VALUES
('1', 'nhanvien'),
('2', 'khach'),
('3', 'sinhvien');

-- --------------------------------------------------------

--
-- Table structure for table `quanly`
--

CREATE TABLE IF NOT EXISTS `quanly` (
  `msquanly` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanly`
--

INSERT INTO `quanly` (`msquanly`, `password`, `msloai`, `loai`, `ten`, `sdt`) VALUES
('1', 'hainam', '1', 'admin', NULL, NULL),
('2', 'hainam', '2', 'tiep tan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quanlyngoaile`
--

CREATE TABLE IF NOT EXISTS `quanlyngoaile` (
  `ms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quanlyngoaile`
--

INSERT INTO `quanlyngoaile` (`ms`) VALUES
('1028'),
('1042'),
('1053'),
('1133'),
('1241'),
('1356');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kiemtrachinh`
--
ALTER TABLE `kiemtrachinh`
  ADD KEY `kiemtrachinh_fk_idx` (`ms`);

--
-- Indexes for table `kiemtraphu`
--
ALTER TABLE `kiemtraphu`
  ADD KEY `kiemtraphu_fk_idx` (`ms`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ms`),
  ADD KEY `maloai_fk_idx` (`maloai`);

--
-- Indexes for table `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`msquanly`);

--
-- Indexes for table `quanlyngoaile`
--
ALTER TABLE `quanlyngoaile`
  ADD KEY `quanlyngoaile_fk_idx` (`ms`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kiemtrachinh`
--
ALTER TABLE `kiemtrachinh`
  ADD CONSTRAINT `kiemtrachinh_fk` FOREIGN KEY (`ms`) REFERENCES `nhanvien` (`ms`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kiemtraphu`
--
ALTER TABLE `kiemtraphu`
  ADD CONSTRAINT `kiemtraphu_fk` FOREIGN KEY (`ms`) REFERENCES `nhanvien` (`ms`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `maloai_fk` FOREIGN KEY (`maloai`) REFERENCES `phanloai` (`maloai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quanlyngoaile`
--
ALTER TABLE `quanlyngoaile`
  ADD CONSTRAINT `quanlyngoaile_fk` FOREIGN KEY (`ms`) REFERENCES `nhanvien` (`ms`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
