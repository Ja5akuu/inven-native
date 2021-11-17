-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2021 pada 03.28
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbptm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_atm`
--

CREATE TABLE `ms_atm` (
  `id_atm` int(6) NOT NULL,
  `kode_atm` varchar(100) DEFAULT NULL,
  `ip_atm` varchar(100) DEFAULT NULL,
  `nama_atm` varchar(100) DEFAULT NULL,
  `alamat_atm` text,
  `keterangan_atm` text,
  `status_atm` enum('Active','Non Active') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ms_atm`
--

INSERT INTO `ms_atm` (`id_atm`, `kode_atm`, `ip_atm`, `nama_atm`, `alamat_atm`, `keterangan_atm`, `status_atm`) VALUES
(1, '19050401', '192.168.2.11', 'ATM Mandiri 19050401', 'JL. Kolonel Bustomi Burhanudin No. 05', '-', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_barang`
--

CREATE TABLE `ms_barang` (
  `id_barang` int(6) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(120) DEFAULT NULL,
  `keterangan_barang` text,
  `harga_suplier` varchar(20) DEFAULT NULL,
  `harga_diskon` varchar(10) DEFAULT NULL,
  `data_ppn` varchar(10) DEFAULT NULL,
  `status_barang` enum('Active','Non Active') NOT NULL DEFAULT 'Active',
  `kode_merk` char(3) DEFAULT NULL,
  `principal_barang` varchar(50) DEFAULT NULL,
  `kode_type` char(3) DEFAULT NULL,
  `stok_barang` int(6) DEFAULT NULL,
  `kategori_barang` varchar(50) DEFAULT NULL,
  `harga_penawaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ms_barang`
--

INSERT INTO `ms_barang` (`id_barang`, `kode_barang`, `nama_barang`, `keterangan_barang`, `harga_suplier`, `harga_diskon`, `data_ppn`, `status_barang`, `kode_merk`, `principal_barang`, `kode_type`, `stok_barang`, `kategori_barang`, `harga_penawaran`) VALUES
(23, 'FS0315', 'ST-FEED ROLLER RUBBER (NEW SPARE)', '', NULL, NULL, NULL, 'Active', '001', 'Part', '012', 80, NULL, ''),
(24, '0031-2 ', 'MAIN ROLLER RUBBER (NEW SPARE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 80, NULL, ''),
(25, '1071', 'S3M 44T GEAR', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 12, NULL, ''),
(26, 'SET-NF0003', 'NF-44T TORQUE GEAR ASS Y (WHITE COLOR) ( GEAR  CORE  BEARING )', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 16, NULL, ''),
(27, 'SET-NF0004-1', 'NF-KICKER MOTOR ASS Y(M) (KICKER MOTOR  HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(28, 'EC0231', 'EC-S3M 16T GEAR', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 70, NULL, ''),
(29, 'SET-NF0005-1', 'NF-MAIN MOTOR ASS Y(M) (MAIN MOTOR HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 6, NULL, ''),
(30, '1078', 'SUB MOTOR  DRIVING PULLEY (S3M18T)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 70, NULL, ''),
(31, '1072', 'MAIN DRIVING PULLEY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 260, NULL, ''),
(32, 'EC0306', 'EC-MD ROLLER 2 SHAFT (SHAFT+ROLLER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 6, NULL, ''),
(33, 'SET-FS0018', 'ST-REJECT SENSOR HOUSING ASSY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 8, NULL, ''),
(34, 'SET-FS0031', 'ST-PM SENSOR HOUSING ASS Y ( WHITE )', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(36, 'FS0255', 'ST-PM1 HOUSING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(37, 'FS0025-1', 'ST-PM 1 BOARD (WHITE)(NEW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(38, 'NF1700', 'NF-MEMBRANE (ST-150NF) FOR ON ENGLISH', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(39, 'SET-1006 ', '2P-HOPPER SENSOR BOARD (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(40, 'NF1300', 'NF-CIS SENSOR BOTTOM (QSWM2R216X-7040)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 6, NULL, ''),
(41, 'SET-NF0013 ', 'NF-DMOS CIS  BOT HARNESS ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 14, NULL, ''),
(42, 'EC0305', 'EC-MD ROLLER 1 SHAFT (SHAFT+ROLLER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 14, NULL, ''),
(43, '0046', 'BEARING (LF-1680ZZ)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 20, NULL, ''),
(44, 'NF0203', 'NF-21T JOIN GEAR (WHITE COLOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 27, NULL, ''),
(45, 'FS2701-2 ', 'ST-TOP CIS SENSOR(SWL2R216X-7041)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 6, NULL, ''),
(46, 'SET-NF0012 ', 'NF-DMOS CIS TOP HARNESS ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 20, NULL, ''),
(47, 'EC0304', 'EC-STOPPER ROLLER ASS Y (SHAFT + WITH CORE + RUBBER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 20, NULL, ''),
(48, '1130', 'MAIN POCKET ROLLER 19-5', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 8, NULL, ''),
(49, '0019-1 ', 'SPLIT ROTARY BOLT + CAP (2POCKET)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 8, NULL, ''),
(50, 'SET-NF0006 ', 'NF-SWING SELECTOR( SOLENOID) ASS Y (Solenoid + Harness)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 14, NULL, ''),
(51, 'IH0013', '15-ZYNQ CAM SENSOR BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(52, 'FS0201', 'ST-PRISM 56', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 10, NULL, ''),
(53, '1219', 'REJECT POCKET WING SPRING (L R)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 12, NULL, ''),
(54, 'SET-NF0007-1', 'NF-STACKER MOTOR ASS Y(M) (STACKER MOTOR + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(55, '0177', 'ENCODER ASS Y(CN7) (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 10, NULL, ''),
(56, 'NF0005', 'NF-MOTOR DRIVE BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(57, 'NF1100', 'NF-SMPS (ST135T)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 4, NULL, ''),
(58, 'SET-NF0014 ', 'NF-TDS BODY ASS Y(NF)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 6, NULL, ''),
(59, 'NF0001', 'NF-TDS BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 6, NULL, ''),
(60, 'LCD001', 'NEW LCD EXT DISPLAY ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 2, NULL, ''),
(61, '0027-3', 'KICKER ROLLER RUBBER(FEED ROLLER RUBBER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 28, NULL, ''),
(62, '1121-2', 'BITE ROLLER RUBBER V3.0', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 28, NULL, ''),
(63, 'SET-1019', 'SPLIT ROLLER ASSEMBLY + HEXA SOCKET SET SCREW (M5X6) V3.0', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 10, NULL, ''),
(64, 'SSET-1019-2', 'NEW SPLIT TENSION ROLLER ASSEMBLY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 40, NULL, ''),
(65, '0010', 'GUIDE ROLLER (WITH BEARING(685ZZ) AND CORE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 160, NULL, ''),
(66, '1129', 'ADDITION TENSION ROLLER WITH BEARING(685ZZ)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 72, NULL, ''),
(68, 'MP-1130', 'MAIN POCKET  ROLLER (WITH BEARING(F685ZZ) AND CORE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 80, NULL, ''),
(69, '1267', 'CIS SENSOR(WHITE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 4, NULL, ''),
(71, '1146', 'SORTING BELT', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 32, NULL, ''),
(72, '1001', 'MAIN BOARD ASSEMBLY(S-RAM X)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 4, NULL, ''),
(73, 'SET-1040', 'CF FRONT SENSOR BOARD ASSEMBLY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(74, 'SET-1041', 'CF REAR SENSOR BOARD ASSEMBLY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(75, 'SET-1046', 'IR FRONT BOARD ASSEMBLY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(76, 'SET-1047', 'IR REAR BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(77, 'SSET-1076', 'IR TENSION ROLLER SHAFT ASSEMBLY-V2.0', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(79, 'MDP-1072', 'MAIN DRIVING PULLEY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(80, '1078-1', 'MAIN MOTOR (DRIVING) PULLEY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(81, '1115-2', 'REJECT POCKET RIGHT WING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(82, '1115-3', 'REJECT POCKET left WING ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(84, 'RPWS-1219', 'REJECT POCKET WING SPRING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(85, 'SSET-1074', 'SORTING TENSION ROLLER SHAFT ASSEMBLY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(87, 'DP-1078', 'SUB MOTOR DRIVING PULLEY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 0, NULL, ''),
(88, 'SSET-1073', 'TURNOVER TENSION ROLLER SHAFT ASSEMBLY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 2, NULL, ''),
(89, 'GP-1261', 'GRAPHIC LCD V2.0', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 4, NULL, ''),
(90, '1002', 'LCD DISPLAY BOARD ASSEMBLY V2.0', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 4, NULL, ''),
(91, 'SET-029', 'SLIDING GUIDE ROLLER BEARING(F685ZZ)  AND CORE(NEW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 116, NULL, ''),
(92, '1265', 'SMPS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 4, NULL, ''),
(94, 'K0027-3', 'FEED ROLLER RUBBER (NEW) SPARE (=KICKER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 60, NULL, ''),
(97, 'MR0031-2', 'MAIN ROLLER RUBBER(NEW)SPARE', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 60, NULL, ''),
(98, 'SET-EC0001', 'EC-KICKER MOTOR ASS Y (KICKER MOTOR + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(100, 'EC16T-0231', 'EC-S3M 16T GEAR', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 60, NULL, ''),
(101, 'SET-EC0002', 'EC-MAIN MOTOR ASS Y (MAIN MOTOR + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(102, 'X101-1', 'X - MAIN MOTOR PULLEY (S3M15T)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 60, NULL, ''),
(103, 'DP-1072', 'MAIN DRIVING PULLEY (1Pê³µ ìš©)(22T)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 40, NULL, ''),
(105, 'EC0306-01', 'EC-MD ROLLER 2 SHAFT (SHAFT+ROLLER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 6, NULL, ''),
(106, 'FS0237-01', 'ST-REJECT SENSOR HOUSING ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(107, 'FS0011-01', 'ST-REJECT SENSOR BOARD (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(108, 'FS0226-01', 'ST-PM2 HOUSING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(109, 'FS0025-01', 'ST-PM 1 BOARD (WHITE) (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(110, 'EC1000-01', 'EC-TFT LCD 4.3INCH', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(111, 'EC0001-01', 'MERLIN DSP BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(112, 'EF1700-01', 'EF-MEMBRANE (ST-150F) FOR ONE', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 2, NULL, ''),
(114, 'SET-1006-01', '2P-HOPPER SENSOR BOARD (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(115, 'EC0305-01', 'EC-MD ROLLER 1 SHAFT (SHAFT+ROLLER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 6, NULL, ''),
(116, 'SET-EC0003-01', 'EC-UV DOWN SENSOR UNIT ASS Y (PCB+BRACKET+PORON+SCREW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(117, 'FS0215-01', 'ST-CS HOUSING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(118, 'EC0010-01', 'EC-COUNT SENSOR Board (WHITE) (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(119, 'EC1300-01', 'EC-CIS SENSOR (LC2R216EC)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 4, NULL, ''),
(120, 'EC0014-01', 'EC-CIS CONNECTOR BOARD (PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 2, NULL, ''),
(121, 'EC0928', '21 EC-CIS CONNECTOR HARNESS(FFC)-22P', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 2, NULL, ''),
(122, 'EC0923-01', '16 EC-CIS SENSOR HARNESS-12P', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 2, NULL, ''),
(123, 'SET-EC0004-01', 'EC-UV UP SENSOR UNIT ASSY (PCB+BRACKET+PORON+SCREW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(124, 'EC0003-01', 'EC-ARGOS BOARD (PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(125, 'SET-EC0005-01', 'EC-CENTER MG SENSOR ASS Y (PLATE+SENSOR+HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(126, 'SET-EC0006-01', 'EC-LEFT SIDE MG SENSOR BOARD (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '012', 0, NULL, ''),
(127, 'SET-EC0007-01', 'EC-RIGHT SIDE MG SENSOR BOARD (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(128, 'EC1301-01', 'EC-IR Bar (LU216EC)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(129, '1130-01', 'MAIN POCKET ROLLER 19-5', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(130, 'EC0304-01', 'STOPPER ROLLER ASS Y (SHAFT + WITH CORE + RUBBER)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(131, 'EC0300-01', 'EC-MAIN POCKET ROLLER 32', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 20, NULL, ''),
(132, 'EC0217-01', 'EC-STACKER SENSOR PRISM', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 4, NULL, ''),
(133, 'FS0009-01', 'ST-HOPPER BOARD (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 4, NULL, ''),
(134, 'EC1100-01', 'EC-SMPS (ST110TX) (PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 2, NULL, ''),
(135, 'SET-EC0008-01', 'EC-CAM ASSY (CAM+SHAFT)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(136, 'SET-EC0012-01', 'EC-SWING SELECTOR(=SOLENOID) ASS Y (Solenoid + Harness)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 60, NULL, ''),
(137, '0177-01', 'ENCODER ASS Y(CN7) (SENSOR+PCB+CONNECTOR)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 20, NULL, ''),
(138, 'EC0307-01', 'EC-REJECT TENSION ROLLER ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(139, 'FS0201-01', 'ST-PRISM 56', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 20, NULL, ''),
(140, 'FS0222-01', 'ST-PRISM CLIP', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 20, NULL, ''),
(141, '1219-01', 'REJECT POCKET SPRING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 20, NULL, ''),
(142, 'EC0239-01', 'EC-HOLDER-JOINT-ROLLER', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(143, 'EC0237-01', 'EC-ARM-ROLLER-GUIDE-L', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(144, 'EC0238-01', 'EC-ARM-ROLLER-GUIDE-R', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(145, 'EC0809', 'EC-SPRING-JOINT-R', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(146, 'EC0810-01', 'EC-SPRING-JOINT-L', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(147, 'FS1002-01', 'ST-BEARING(L-1680ZZ)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 100, NULL, ''),
(148, 'SET-EC0009-01', 'EC-STACKER MOTOR ASS Y (STACKER MOTOR + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 0, NULL, ''),
(149, 'EC0004-01', 'EC-MOTOR DRIVE BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '015', 2, NULL, ''),
(150, 'FSN0002 ', 'ST-DMIR BOARD(N)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 16, NULL, ''),
(151, 'SET-FSN0001-1', 'ST-OS SUIT BOARD ASS Y(N)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 2, NULL, ''),
(152, 'FS0001-01', 'MAIN BOARD ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(153, 'FS2700-2', 'ST-CIS SENSOR BOTTOM (QSWM2R216X-7042)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 16, NULL, ''),
(155, 'FS2701-2-350', 'ST-CIS SENSOR TOP (SWL2R216X-7041)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 22, NULL, ''),
(156, 'FS0642-350', 'CIS TOP SENSOR HARNESS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 40, NULL, ''),
(157, 'SET-NF0013-350', 'NF-DMOS CIS BOT HARNESS ASSY (28 PIN)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 30, NULL, ''),
(158, 'FSN0620 -350', 'ST-DMIR TO OS SUIT HARNESS(N) ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 6, NULL, ''),
(159, 'FSN0618-350', 'ST-COMMUNICATION HARNESS(N) ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(160, 'SET-FS0010-350', 'TDS BODY ASSY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 20, NULL, ''),
(161, 'FS1004-350', 'RF-1980ZZ ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 20, NULL, ''),
(162, 'FS0125-350', 'TDS WASHER', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 40, NULL, ''),
(163, 'FS0148-350', 'TDS ROLLER SHAFT', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(164, 'FS0118-350', 'BITE ROLLER RING UNIT (WITH SCREW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 20, NULL, ''),
(165, '1072-350', 'MAIN DRIVING PULLEY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 686, NULL, ''),
(166, 'SET-FS0011-1-350', 'PM1 SENSOR HOUSING ASS Y (RED)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 10, NULL, ''),
(167, 'SET-FS0025-1', 'PM1 SENSOR HOUSING ASS Y (BLUE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 2, NULL, ''),
(168, 'SET-FS0003', 'TRANS T/R SHAFT ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 66, NULL, ''),
(169, 'FS0308', 'MD ROLLER SHAFT 1 ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 16, NULL, ''),
(170, '0046-01', 'LF-1680ZZ ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 96, NULL, ''),
(171, 'FS0804-350', 'S3M 414 ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 12, NULL, ''),
(172, 'FS0501', 'TENSION ROLLER SPRING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 296, NULL, ''),
(173, 'FS0503-350', 'MD TENSION SPRING ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 266, NULL, ''),
(174, 'FS060', 'MG / TDS HARNESS ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 10, NULL, ''),
(175, 'SET-FS0013-350', 'MG SENSOR ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 2, NULL, ''),
(176, 'FS0605-350', 'MD MODULE HARNESS ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(177, 'FS0009-350', 'HOPPER SENSOR B/D (BLUE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 8, NULL, ''),
(178, 'FS020', 'S2M 60T PULLEY ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 14, NULL, ''),
(179, '0027-3-350', 'KICKER ROLLER RUBBER ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 80, NULL, ''),
(180, 'FS0314-350', 'BITE ROLLER RUBBER ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 84, NULL, ''),
(181, 'FS0307-350', 'PRI ROLLER SHAFT ASS Y ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(182, 'FS0606-350', 'KICKER MODULE HARNESS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 12, NULL, ''),
(183, 'FS0302-350', 'SPLIT ROLLER ASS Y ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(184, 'FS0017-350', 'KICKER ENCORDER B/D (RED)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 8, NULL, ''),
(185, 'FS2302-1-350', 'KICKER MOTOR ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 8, NULL, ''),
(186, 'FS2301-350', 'MAIN MOTOR ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 0, NULL, ''),
(187, 'FS3100-350', 'S2M 15T PULLEY ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 18, NULL, ''),
(188, 'FS0908-350', 'ST-BELT (S2M 142-6)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 24, NULL, ''),
(189, 'FS0204-350', 'BL MOTOR PULLEY ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 60, NULL, ''),
(190, 'SET-FS0004-350', 'BITE TENSION ROLLER SHAFT ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(191, '0012-4', 'MODULE SPRING (28mm)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 110, NULL, ''),
(192, 'FS0013', 'COUNTER SENSOR B/D (YELLOW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(193, 'FS0012', 'COUNTER LED B/D (BLUE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 8, NULL, ''),
(194, 'FS0215', 'CS HOUISNG ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 8, NULL, ''),
(196, 'SET-FS0031-350N', 'ST-PM2 HOUSING ASS Y (WHITE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 10, NULL, ''),
(197, 'SET-FS0014-350N', 'ST-PM2 HOUSING ASS Y (RED)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 18, NULL, ''),
(198, 'SET-FS0028-350N', 'ST-PM2 HOUSING ASS Y (BLUE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 2, NULL, ''),
(199, 'SET-FS0029-350N', 'ST-PM2 HOUSING ASS Y (YELLOW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 2, NULL, ''),
(200, 'SET-FS0015-350N', 'GUIDE T/R SHAFT ASS Y ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 18, NULL, ''),
(201, 'SET-FS0034-350N', 'LCD MODULE ASS Y ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 6, NULL, ''),
(202, 'SET-FS0016 -350N', 'STACKER MOTOR (WITH HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 6, NULL, ''),
(203, '1219-350N', 'REJECT POCKET WING SPRING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 24, NULL, ''),
(204, 'SET-FS0021-350N', 'SWING SELECTOR ASS Y(SOLENOID)(WITH HARNESS)(GREEN)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 8, NULL, ''),
(205, 'SET-FS0032-350N', 'ST-PM2 SENSOR HOUSING ASS Y (GREEN)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 10, NULL, ''),
(206, 'FS0617-350N', 'TRANSFER MODULE HARNESS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(207, 'FS0205-350N', 'S3M 16T PULLEY ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 44, NULL, ''),
(208, 'FS0609-350N', 'POWER 1 HARNESS ', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 6, NULL, ''),
(209, 'SET-FS0018-350', 'REJECT SENSOR HOUSING ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 4, NULL, ''),
(210, 'FS0303-350N', 'REJECT POCKET SLIDING ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 6, NULL, ''),
(211, 'FS0305-350N', 'SORTING SLIDING SHAFT 2 ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 2, NULL, ''),
(212, 'FS0303-1-350N', 'REJECT POCKET SLIDING RUBBER', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 48, NULL, ''),
(213, 'FS0242-350N', 'T/R HOUSING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 24, NULL, ''),
(214, 'FS0114-350N', 'SORTING TENSION ROLLER SHAFT', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 24, NULL, ''),
(215, 'FS1001-350N', 'R-1450', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 24, NULL, ''),
(216, 'SET-FS0012-350N', 'SMPS ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '016', 2, NULL, ''),
(217, 'FS0315-ih110', 'ST-FEED ROLLER RUBBER (NEW)(SPARE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 20, NULL, ''),
(218, '1071-350N', 'S3M 44T GEAR (1P, 2P)(1-1)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(219, 'IH0315-ih110', 'IH-MAIN ROLLER RUBBER (SPARE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 20, NULL, ''),
(220, 'IH0302-ih110', '15-STOPPER ROLLER ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(221, '1129-ih110', 'ADDITION TENSION ROLLER (Ã˜21-5)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(222, 'SET-IH0006-ih110', 'IH-FRONT BOARD ASS Y (pcb+metal dome)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(223, 'SET-IH0014-ih110', 'IH-HOPPER SENSOR BOARD ASS Y (pcb+sensor)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(224, 'IH1001-ih110', 'IH-TOUCH TFT LCD (4.3)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(225, 'SET-IH0017-ih110', 'IH-KICKER MOTOR ASS Y(M) (KICKER MOTOR + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(226, 'IH1403-ih110', '15F-3516T', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 10, NULL, ''),
(227, 'SET-IH0018-ih110', 'IH-MODULE MOTOR ASS Y(M) (MODULE MOTOR + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(228, 'IH1404-ih110', '15F-3518T', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 10, NULL, ''),
(229, 'SET-FS0018-ih110', 'ST-REJECT SENSOR HOUSING ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(230, 'IH0303-ih110', '15-MODULE SHAFT 1 ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(231, 'IH0226-ih110', '15- 3622TL', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 10, NULL, ''),
(232, 'IHV0300', '15V-MODULE SHAFT 2 ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(233, 'IH0225-ih110', '15-3622TS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 10, NULL, ''),
(234, 'IH0224-ih110', '15-2625T', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 10, NULL, ''),
(235, 'IH0305-1', '15-MODULE SHAFT 3 ASS Y(NEW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(236, 'IH0306-ih110', '15-MODULE SHAFT 4 ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(237, 'IH1200-ih110', 'IH-CIS SENSOR BOTTOM-19', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 2, NULL, ''),
(238, 'SET-IH0021-ih110', 'IH-MAIN-CIS UPPER HARENSS ASS Y(330mm)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 4, NULL, ''),
(239, '15F-UV-ih110', '15F-UV SENSOR BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(245, 'IH0012-ih110-1', '15-JAM SENSOR BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(246, 'NV0301-ih110-01', 'NV-TDS TENSION ROLLER (ï¿ 16)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(247, 'M-TENSION-ih110', 'M-TENSION ROLLER ASSY 4', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(248, '15V-TDS-ih110', '15V-TDS ASSY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(249, 'SET-IV0002-ih110', 'IH-MG SENSOR ASS Y(SPARE) (MG SENSOR+BOARD+MG GUIDE BLOCK +BOLT)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(251, 'FS0201-ih110-1', 'ST-PRISM 56', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(252, 'SET-IH0003-ih110-1', 'IH-LOWER REJECT ROLLER ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(253, 'IH0307-ih110', '15-LOWER RETURN ROLLER SHAFT ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(254, 'FS0255-ih110', 'ST-PM1 HOUSING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(255, 'FS0025-1-ih110', 'ST-PM 1 BOARD (WHITE)(NEW)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(256, 'SET-IH0016-ih110', 'IH-CAM ASS Y (WITH SHAFT)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 2, NULL, ''),
(257, 'SET-IH0020-1-ih110', 'IH-SOLENOID ASS Y (NEW) (SOLENOID + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 2, NULL, ''),
(258, 'IH0013-ih110', '15-ZYNQ CAM SENSOR BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 2, NULL, ''),
(259, 'SET-IH0019-ih110', 'IH-STACKER MOTOR ASS Y(M) (STACKER MOTOR + HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(260, 'IH1100-ih110', 'IH-SMPS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 2, NULL, ''),
(261, 'FS0224-ih110', 'ST-FRISM 30', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 4, NULL, ''),
(262, 'IF0001-ih110', '15F-MAIN BOARD (WITH HEATSINK)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 0, NULL, ''),
(263, 'std-1012', 'MAIN BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(264, 'std-1008', 'ENCORDER SENSOR', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(265, 'std-1017', 'MOTOR BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(266, 'std-1020', 'MOTOR PULLEY', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(267, 'std-2002', 'HOPPER SENSOR PCB(WITH HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(268, 'std-2003', 'LED BOARD (WITH HARNESS)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(269, 'std-2004', 'MEMBRANE', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(270, 'std-7001', 'FEED ROLLER ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(271, 'std-7005', 'FEED RUBBER', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(272, 'std-8004', 'KICKER ROLLER RUBBER', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(273, 'std-9001', 'TRANSFER ROLLER SHAFT', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(274, 'std-9003', 'GUIDE ROLLER PULLEY GEAR(WITH CLUTCH BEARING)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(275, 'std-10001', 'ACCELERATOR ROLLER SHAFT', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(276, 'std-13002', 'UPPER TX SENSOR', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(277, 'std-18002', 'GEARED MOTOR', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(278, 'std-19002', 'SMPS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(279, 'std-21001', 'TIMING BELT S3M237', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(280, 'std-21002', 'TIMING BELT S3M267', '', NULL, NULL, NULL, 'Active', '002', 'Part', '018', 0, NULL, ''),
(1426, 'IV269C0451', '', 'BACK UP U/ CENTRAL KUTA MONEY CHANGER\r\n', NULL, NULL, NULL, 'Active', '002', 'MHU Box', '019', 3, NULL, ''),
(1427, 'IF269DS002', '', 'Back Up untuk PT WHS Global Mandiri', NULL, NULL, NULL, 'Active', '002', 'MHU Box', '019', 2, NULL, ''),
(1428, 'NF269C0595', '', 'Back up untuk BCA Pangkalan Bun', NULL, NULL, NULL, 'Active', '002', 'MHU Box', '009', 4, NULL, ''),
(1429, 'NF269C0596', '', 'Back up untuk BCA KCU Bekasi', NULL, NULL, NULL, 'Active', '002', 'MHU Box', '009', 6, NULL, ''),
(1430, 'IV269J0116', '', 'BCA BNS (PPS) - Jakarta', NULL, NULL, NULL, 'Active', '002', 'MHU Box', '019', 5, NULL, ''),
(1431, 'IV269J0117', '', 'ICBC Pasar Atom Mall - Surabaya', NULL, NULL, NULL, 'Active', '002', 'MHU Box', '019', 7, NULL, ''),
(1632, 'C-BIB-01', 'BIG BARE', '0', '0', '0', '0', 'Active', '001', 'Purchasing', '001', 0, 'Fresh', ''),
(1633, 'C-BAK-04', 'BATTERY RECHARGE 3,7 V', '0', '0', '0', '0', 'Active', '001', 'Purchasing', '001', 0, 'Fresh', ''),
(1635, 'C-BAK-03', 'C-BAK-03', '0', '0', '0', '0', 'Active', '001', 'Purchasing', '001', 0, 'Fresh', ''),
(1636, 'C-BAK-02', 'BATTERY ALKALINE KRB KCL ISI 6', '0', '0', '0', '0', 'Active', '001', 'Purchasing', '001', 0, 'Fresh', ''),
(1637, 'C-BAK-01', 'BATTERY ALKALINE KRB BSR ISI 2', '0', '0', '0', '0', 'Active', '001', 'Purchasing', '001', 0, 'Fresh', ''),
(1638, 'C-ATO-01', 'ATONIK', '0', '0', '0', '0', 'Active', '001', 'Purchasing', '001', 0, 'Fresh', ''),
(1639, 'C-AIG-01', 'AIRFRESHNER GALLON', '0', '0', '0', '0', 'Active', '001', 'Purchasing', '001', 0, 'Fresh', ''),
(1640, 'IH0256', '15-STACKER SENSOR HOUSING', '', NULL, NULL, NULL, 'Active', '002', 'Part', '017', 4, NULL, ''),
(1643, '1003', '(NEW) MOTOR DRIVE BOARD ASSEMBLY V2.0', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 4, NULL, ''),
(1645, 'SET-1006-Ihunter', 'HOPPER SENSOR BOARD(CN4)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 4, NULL, ''),
(1646, 'GRAPHIC LCD V2.0', '1261', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 2, NULL, ''),
(1647, 'SET-1031', 'SORTING CAM (WITH SHAFT) V2.0', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 2, NULL, ''),
(1648, '1131-1', 'MR CHAIN ROLLER  (WITH CORE)', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 10, NULL, ''),
(1649, 'NF0002', 'NF-DMOS BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '014', 3, NULL, ''),
(1650, 'FS0002', 'ST-DM BOARD', '', NULL, NULL, NULL, 'Active', '002', 'Part', '020', 2, NULL, ''),
(1651, 'SET-FS0005', 'ST-UV-F HOUSING ASS Y', '', NULL, NULL, NULL, 'Active', '002', 'Part', '020', 2, NULL, ''),
(1652, 'FS0607', 'ST-DM HARNESS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '020', 2, NULL, ''),
(1653, 'FS2700', 'ST-CIS SENSOR BOTTOM', '', NULL, NULL, NULL, 'Active', '002', 'Part', '020', 6, NULL, ''),
(1654, 'FS2701', 'ST-CIS SENSOR TOP', '', NULL, NULL, NULL, 'Active', '002', 'Part', '020', 6, NULL, ''),
(1655, 'FS0642', 'CIS TOP SENSOR HARNESS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '020', 4, NULL, ''),
(1656, 'FS0643', 'CIS BOTTOM SENSOR HARNESS', '', NULL, NULL, NULL, 'Active', '002', 'Part', '020', 4, NULL, ''),
(1660, 'C-AIC-01', 'AIRFRESHNER CANE (Stella 250 ML)', 'Rp11,300 \r\n', 'Rp11,300  ', 'Rp- ', 'Rp- ', 'Active', '001', 'Purchasing', '016', 0, 'Botol', ' Rp32,000 '),
(1662, 'C-AIC-02', 'AIRFRESHNER CANE REFILL (300 ML)', ' Rp32,900 \r\n', ' Rp32,900 ', '-', '-', 'Active', '001', 'Purchasing', '016', 0, 'Inch', ' Rp40,000 '),
(1663, 'C-GRA-01', 'GRAMAXONE', 'Rp103,000 \r\n', 'Rp103,000 ', '-', '-', 'Active', '001', 'Purchasing', '016', 2, 'Inch', ' Rp120,000 '),
(1665, 'C-POR-01', 'PORSTEX 1000 ML', 'Rp18,000 \r\n', 'Rp18,000 ', '0', '0', 'Active', '001', 'Purchasing', '016', 0, 'Inch', ' Rp25,000 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_customer`
--

CREATE TABLE `ms_customer` (
  `kode_customer` char(5) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` text NOT NULL,
  `telp_customer` varchar(25) NOT NULL,
  `keterangan_customer` text NOT NULL,
  `status_customer` enum('Active','Non Active') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ms_customer`
--

INSERT INTO `ms_customer` (`kode_customer`, `nama_customer`, `alamat_customer`, `telp_customer`, `keterangan_customer`, `status_customer`) VALUES
('CU002', 'PT ISM Bogasari Cilincing', '', '-', '', 'Active'),
('CU003', 'PT ISM Bogasari Cibitung', '', '-', '', 'Active'),
('CU004', 'PT ISM Bogasari Tangerang', '', '-', '', 'Active'),
('CU005', 'ICBP Cikupa', '', '-', '', 'Active'),
('CU006', 'PT Karunia Kreasi Cemerlang', '', '-', '', 'Active'),
('CU007', 'PT IAP HO', '', '-', '', 'Active'),
('CU008', 'PT IAP Jatake', '', '-', '', 'Active'),
('CU009', 'PT IAP Bogor', '', '-', '', 'Active'),
('CU010', 'NICI', '', '-', '', 'Active'),
('CU011', 'PT SDM Harmoni', '', '-', '', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_layanan`
--

CREATE TABLE `ms_layanan` (
  `kode_layanan` char(5) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `keterangan_layanan` text,
  `status_layanan` enum('Active','Non Active') NOT NULL,
  `kembali_layanan` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ms_layanan`
--

INSERT INTO `ms_layanan` (`kode_layanan`, `nama_layanan`, `keterangan_layanan`, `status_layanan`, `kembali_layanan`) VALUES
('LY002', 'Purnama', '-', 'Active', 'Y'),
('LY003', 'Roni Mubarak', '-', 'Active', 'Y'),
('LY004', 'Tri Mulyono', '-', 'Active', 'Y'),
('LY005', 'Sumanto', '-', 'Active', 'Y'),
('LY006', 'Sugianto', '-', 'Active', 'Y'),
('LY007', 'Burhan', '-', 'Active', 'Y'),
('LY008', 'Pepen', '-', 'Active', 'Y'),
('LY009', 'Adi Winata', '', 'Active', 'Y'),
('LY010', 'Imam', '', 'Active', 'Y'),
('LY011', 'Joko Yatino', '', 'Active', 'Y'),
('LY012', 'Joko Lukmanul', '', 'Active', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_merk`
--

CREATE TABLE `ms_merk` (
  `kode_merk` char(3) NOT NULL,
  `nama_merk` varchar(50) DEFAULT NULL,
  `keterangan_merk` text,
  `status_merk` enum('Active','Non Active') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ms_merk`
--

INSERT INTO `ms_merk` (`kode_merk`, `nama_merk`, `keterangan_merk`, `status_merk`) VALUES
('001', 'Chemical', '-', 'Active'),
('002', 'CHEMICAL PEST', '-', 'Active'),
('003', 'NON-CHEMICAL', '-', 'Active'),
('004', 'Non Chemical pest', '-', 'Active'),
('008', 'TOOLS', '-', 'Active'),
('009', 'TOOLS PEST', '-', 'Active'),
('010', 'UNIFORM', '-', 'Active'),
('011', 'UNIFORM PEST', '-', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_toko`
--

CREATE TABLE `ms_toko` (
  `nama_toko` varchar(100) NOT NULL,
  `moto_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `telp_toko` varchar(50) NOT NULL,
  `email_toko` varchar(50) NOT NULL,
  `keterangan_toko` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ms_toko`
--

INSERT INTO `ms_toko` (`nama_toko`, `moto_toko`, `alamat_toko`, `telp_toko`, `email_toko`, `keterangan_toko`) VALUES
('EASY INVENTORY', 'Sistem Aplikasi Inventory', 'Jl. RS. Fatmawati Raya No.15, RT.5/RW.3, Blok J No.34, Cilandak Barat, Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12420', '(021) 27656365', 'helpdesk@arthatechselaras.co, technical@arthatechs', 'Saran & Keluhan Hub : ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_type`
--

CREATE TABLE `ms_type` (
  `kode_type` char(3) NOT NULL,
  `nama_type` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_kodsup` varchar(50) NOT NULL,
  `nama_pic` varchar(120) NOT NULL,
  `alamat_sup` varchar(150) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `sup_note` varchar(150) NOT NULL,
  `keterangan_type` text NOT NULL,
  `status_type` enum('Active','Non Active') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ms_type`
--

INSERT INTO `ms_type` (`kode_type`, `nama_type`, `nama_kodsup`, `nama_pic`, `alamat_sup`, `no_telepon`, `sup_note`, `keterangan_type`, `status_type`) VALUES
('016', 'CV. Berkat Anugerah Jaya', 'CL-009', 'Ibu Kiky', 'Jl. Pamularsih I No. 3', 'Hp. 08112940977', 'C-Noil', 'Barang', 'Active'),
('017', 'PT. Dwimitra Multi Pratama', 'CL-008', 'Ibu Icha', 'Rukan Citra Graha Jl Panjang No. 26 Rt 006  Rw. 001 Kel. Kedoya Selatan Kec. Kebon Jeruk Jarta Barat', 'Hp. 081297111391', 'Bubuk Pembersih', 'Barang', 'Active'),
('018', 'CV Makmur Abadi', 'CL-007', 'Ibu Dewi', 'Jl. Gajah 68 B Kel. Gayamsari Kec Gayamsari Semarang', 'HP. 0817293832', 'Pembersih Lantai', 'Barang', 'Active'),
('019', 'PT. Sinergi Pangan Sawargi (Baru)', 'CL-005', 'Bpk. Dede', 'Ruko Sinergi Antapani Kav. 17, Jl. Parakan Saat, Bandung', 'Hp. 082218267596', 'Chemical C-Noil', 'Barang', 'Active'),
('020', 'PT. Dua Berlian . (distributor Sc Johson & Son)', 'CL-002', 'Bpk. Ronny Jackson', 'Jl. Rawa Gelam IV No. 14 Kawasan Industri Polu Gadung Jakarta - Timur', 'T. 021-4602666,', 'Chemical Jhonson ', 'Barang', 'Active'),
('021', 'PT. Dinamika Maju Usaha', 'CL-003', 'Bpk. Hasiando', 'Jl. Cacing Kampung Baru KM. 2 Rt. 007 Rw. 008 ', 'T. 021-5222172', 'Chemical Fresha NC, NF', 'Barang', 'Active'),
('022', 'JNI Mitrajaya (Sby)', 'CL-004', 'Ibu Kristine Sunny', 'Jl. Greges Jaya II Kav. 8B, A23  Surabaya 60193', 'T. 031-7495605', 'Tissue & Chemical', 'Barang', 'Active'),
('023', 'PT. Indonesia Industri Perkasa', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user`
--

CREATE TABLE `ms_user` (
  `kode_user` char(5) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `telp_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `kelamin_user` enum('Pria','Wanita') NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(150) NOT NULL,
  `status_user` enum('Active','Non Active') NOT NULL,
  `user_group` int(3) NOT NULL,
  `jenis_user` enum('Admin','Teknisi') DEFAULT 'Admin'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ms_user`
--

INSERT INTO `ms_user` (`kode_user`, `nama_user`, `telp_user`, `alamat_user`, `email_user`, `kelamin_user`, `username_user`, `password_user`, `status_user`, `user_group`, `jenis_user`) VALUES
('U0001', 'Administrator', '081220209020', 'Jaksel', 'info@grabit.web.id', 'Pria', 'admin', '0192023a7bbd73250516f069df18b500', 'Active', 1, NULL),
('U0005', 'Yandi Syafitra', '', 'Jl. Griya Tirtayasa', '', 'Pria', 'Yandi', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 3, 'Teknisi'),
('U0006', 'Erni Sumirat', '', '', '', 'Wanita', 'erni', 'af6b3aa8c3fcd651674359f500814679', 'Active', 3, 'Teknisi'),
('U0007', 'M Taufik Akbar', '', '', '', 'Pria', 'taufik', '70f32b0989903de63dde4ea96d5d4000', 'Active', 3, 'Teknisi'),
('U0008', 'Nurcahyadi', '', '', '', 'Pria', 'Nurcahyadi', '53d951605e0267f7e10b5567c6644571', 'Active', 3, 'Teknisi'),
('U0009', 'Leonardus Ariondo', '', '', '', 'Pria', 'yudhi', '0c074ab2a292a45bf4b19f0786aa989a', 'Active', 3, 'Teknisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_akses`
--

CREATE TABLE `sys_akses` (
  `akses_id` int(4) NOT NULL,
  `akses_group` int(3) NOT NULL,
  `akses_submenu` int(3) NOT NULL,
  `akses_dibuat` datetime NOT NULL,
  `akses_diubah` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data untuk tabel `sys_akses`
--

INSERT INTO `sys_akses` (`akses_id`, `akses_group`, `akses_submenu`, `akses_dibuat`, `akses_diubah`) VALUES
(5, 0, 0, '2017-11-27 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 0, '2017-11-27 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 0, '2017-11-27 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 0, '2017-11-27 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 0, '2017-11-27 00:00:00', '0000-00-00 00:00:00'),
(10, 0, 0, '2017-11-27 00:00:00', '0000-00-00 00:00:00'),
(227, 1, 23, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(226, 1, 19, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(225, 1, 17, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(224, 1, 33, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(223, 1, 32, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(222, 1, 31, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(221, 1, 11, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(220, 1, 9, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(219, 1, 30, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(218, 1, 29, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(217, 1, 26, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(216, 1, 8, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(215, 1, 7, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(214, 1, 6, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(213, 1, 13, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(212, 1, 4, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(240, 3, 36, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(239, 3, 23, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(237, 2, 37, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(236, 2, 33, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(235, 2, 32, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(238, 3, 31, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(211, 1, 3, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(210, 1, 2, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(228, 1, 34, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(229, 1, 35, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(230, 1, 36, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(231, 1, 37, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(232, 1, 38, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(233, 1, 39, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(234, 1, 40, '2019-05-25 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_group`
--

CREATE TABLE `sys_group` (
  `group_id` int(3) NOT NULL,
  `group_nama` varchar(35) NOT NULL,
  `group_keterangan` text NOT NULL,
  `group_status` enum('Active','Non Active') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `sys_group`
--

INSERT INTO `sys_group` (`group_id`, `group_nama`, `group_keterangan`, `group_status`) VALUES
(1, 'Administrator', '-', 'Active'),
(2, 'Approval', '', 'Active'),
(3, 'Teknisi', '', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_menu`
--

CREATE TABLE `sys_menu` (
  `menu_id` int(3) NOT NULL,
  `menu_nama` varchar(40) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_urutan` int(2) NOT NULL,
  `menu_dibuat` datetime NOT NULL,
  `menu_diubah` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `sys_menu`
--

INSERT INTO `sys_menu` (`menu_id`, `menu_nama`, `menu_icon`, `menu_urutan`, `menu_dibuat`, `menu_diubah`) VALUES
(1, 'Setting', '', 1, '2017-11-26 00:00:00', '2017-11-26 00:00:00'),
(2, 'Master', '', 2, '2017-11-26 00:00:00', '2017-11-26 00:00:00'),
(3, 'Purchasing', '', 3, '2017-11-26 00:00:00', '2017-11-26 00:00:00'),
(4, 'HRGA Pusat', '', 4, '2017-12-29 00:00:00', '2017-12-29 00:00:00'),
(5, 'HRGA BATAM', '', 5, '2018-05-25 00:00:00', '0000-00-00 00:00:00'),
(6, 'Report', '', 6, '2018-05-26 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_submenu`
--

CREATE TABLE `sys_submenu` (
  `submenu_id` int(3) NOT NULL,
  `submenu_nama` varchar(50) NOT NULL,
  `submenu_menu` int(3) NOT NULL,
  `submenu_link` varchar(100) NOT NULL,
  `submenu_urutan` int(3) NOT NULL,
  `submenu_dibuat` datetime NOT NULL,
  `submenu_diubah` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `sys_submenu`
--

INSERT INTO `sys_submenu` (`submenu_id`, `submenu_nama`, `submenu_menu`, `submenu_link`, `submenu_urutan`, `submenu_dibuat`, `submenu_diubah`) VALUES
(2, 'Data Pengguna', 1, '?page=datauser', 3, '2017-11-26 00:00:00', '2017-12-24 00:00:00'),
(3, 'Data Menu & Modul', 1, '?page=datamodul', 4, '2017-11-26 00:00:00', '2017-12-24 00:00:00'),
(4, 'Data Group Akses', 1, '?page=datagroup', 2, '2017-11-26 00:00:00', '2017-12-24 00:00:00'),
(33, 'Data Approval', 4, '?page=dtappmhuout', 4, '2019-05-25 00:00:00', '2019-05-26 00:00:00'),
(6, 'Data Project', 2, '?page=datacustomer', 5, '2017-11-26 00:00:00', '2020-11-23 00:00:00'),
(7, 'Data PIC', 2, '?page=datalayanan', 6, '2017-11-26 00:00:00', '2020-11-25 00:00:00'),
(8, 'Data Suplier', 2, '?page=datatype', 3, '2017-12-24 00:00:00', '2020-11-23 00:00:00'),
(9, 'Data Barang', 3, '?page=dtmdm', 1, '2017-12-24 00:00:00', '2020-11-23 00:00:00'),
(11, 'Data Stok Masuk', 3, '?page=dtmdmin', 2, '2017-12-24 00:00:00', '2019-05-25 00:00:00'),
(13, 'Pengaturan', 1, '?page=confstore', 1, '2017-12-24 00:00:00', '2019-04-29 00:00:00'),
(17, 'Data HRGA PUSAT', 4, '?page=dtmhu', 1, '2017-12-29 00:00:00', '2021-01-18 00:00:00'),
(19, 'Data Stok Masuk', 4, '?page=dtmhuin', 2, '2017-12-29 00:00:00', '2019-05-26 00:00:00'),
(23, 'Data Stok Keluar', 4, '?page=dtmhuout', 3, '2017-12-29 00:00:00', '2019-05-26 00:00:00'),
(26, 'Data Kategori', 2, '?page=datamerk', 2, '2017-12-30 00:00:00', '2020-11-23 00:00:00'),
(31, 'Data Stok Keluar', 3, '?page=dtmdmout', 3, '2019-05-10 00:00:00', '2019-05-25 00:00:00'),
(32, 'Data Approval', 3, '?page=dtappmdmout', 4, '2019-05-10 00:00:00', '2019-05-25 00:00:00'),
(34, 'Data HRGA Batam', 5, '?page=dtpart', 1, '2019-05-25 00:00:00', '2021-01-18 00:00:00'),
(35, 'Data Stok Masuk', 5, '?page=dtpartin', 2, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(36, 'Data Stok Keluar', 5, '?page=dtpartout', 3, '2019-05-25 00:00:00', '0000-00-00 00:00:00'),
(37, 'Data Approval', 5, '?page=dtapppartout', 4, '2019-05-25 00:00:00', '2019-05-25 00:00:00'),
(38, 'Laporan Stok Item', 6, '?page=rptstock', 1, '2019-05-25 00:00:00', '2019-05-29 00:00:00'),
(39, 'Laporan Stok Masuk', 6, '?page=rptin', 2, '2019-05-25 00:00:00', '2019-05-29 00:00:00'),
(40, 'Laporan Stok Keluar', 6, '?page=rptout', 3, '2019-05-25 00:00:00', '2019-05-29 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_in`
--

CREATE TABLE `tr_in` (
  `kode_in` char(10) NOT NULL,
  `tgl_in` date NOT NULL,
  `kode_user` char(5) NOT NULL,
  `principal` varchar(50) NOT NULL,
  `keterangan_in` text NOT NULL,
  `status_in` enum('Open','Close') NOT NULL DEFAULT 'Open',
  `created_in` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tr_in`
--

INSERT INTO `tr_in` (`kode_in`, `tgl_in`, `kode_user`, `principal`, `keterangan_in`, `status_in`, `created_in`) VALUES
('1905050001', '2019-05-05', 'U0001', '', 'Penerimaan uesin untuk diperbaiki', 'Close', '2019-05-05 11:50:48'),
('1905050002', '2019-05-05', 'U0001', '', '', 'Close', '2019-05-05 12:37:27'),
('2102160001', '2021-02-16', 'U0001', 'Purchasing', 'Pembelian', 'Open', '2021-02-16 10:17:12'),
('2002110001', '2020-02-11', 'U0001', 'Part', '', 'Open', '2020-02-11 19:59:10'),
('2001100001', '2020-01-10', 'U0001', 'MHU Box', '', 'Open', '2020-01-10 15:09:48'),
('2002040001', '2020-02-04', 'U0001', 'MHU Box', 'STOCK', 'Open', '2020-02-04 12:03:57'),
('2002110002', '2020-02-11', 'U0001', 'Part', 'Ihunter', 'Open', '2020-02-11 20:07:01'),
('2002110003', '2020-02-11', 'U0001', 'Part', 'ST-150F', 'Open', '2020-02-11 20:19:09'),
('2002110004', '2020-02-11', 'U0001', 'Part', 'ih-110', 'Open', '2020-02-11 20:26:15'),
('2002110005', '2020-02-11', 'U0001', 'Part', '', 'Open', '2020-02-11 20:33:58'),
('2002110006', '2020-02-11', 'U0001', 'Part', 'ST-350N', 'Open', '2020-02-11 21:02:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_in_item`
--

CREATE TABLE `tr_in_item` (
  `id` int(11) NOT NULL,
  `kode_in` char(10) NOT NULL,
  `id_barang` char(7) NOT NULL,
  `jumlah_in` int(10) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tr_in_item`
--

INSERT INTO `tr_in_item` (`id`, `kode_in`, `id_barang`, `jumlah_in`, `keterangan`) VALUES
(2, '1905050001', '23', 1, NULL),
(3, '1905050002', '23', 1, 'backup'),
(1112, '2102160001', '1660', 5, NULL),
(1111, '2102160001', '1663', 3, NULL),
(938, '2002110001', '25', 6, NULL),
(937, '2002110001', '28', 35, NULL),
(936, '2002110001', '42', 4, NULL),
(940, '2002110001', '27', 2, NULL),
(939, '2002110001', '26', 8, NULL),
(929, '2001100001', '1426', 1, NULL),
(930, '2001100001', '1427', 1, NULL),
(931, '2001100001', '1428', 1, NULL),
(932, '2001100001', '1429', 1, NULL),
(933, '2001100001', '1429', 1, NULL),
(934, '2001100001', '1431', 1, NULL),
(935, '2002040001', '1426', 2, NULL),
(941, '2002110001', '24', 40, NULL),
(942, '2002110001', '23', 40, NULL),
(943, '2002110001', '29', 3, NULL),
(944, '2002110001', '30', 35, NULL),
(945, '2002110001', '31', 130, NULL),
(946, '2002110001', '32', 3, NULL),
(947, '2002110001', '33', 4, NULL),
(948, '2002110001', '34', 2, NULL),
(949, '2002110001', '36', 2, NULL),
(950, '2002110001', '37', 2, NULL),
(951, '2002110001', '38', 2, NULL),
(952, '2002110001', '39', 2, NULL),
(953, '2002110001', '40', 3, NULL),
(954, '2002110001', '41', 7, NULL),
(955, '2002110001', '42', 1, NULL),
(956, '2002110001', '43', 1, NULL),
(957, '2002110001', '44', 1, NULL),
(958, '2002110001', '45', 3, NULL),
(959, '2002110001', '46', 10, NULL),
(960, '2002110001', '47', 10, NULL),
(961, '2002110001', '48', 4, NULL),
(962, '2002110001', '49', 4, NULL),
(963, '2002110001', '50', 7, NULL),
(964, '2002110001', '51', 1, NULL),
(965, '2002110001', '52', 5, NULL),
(966, '2002110001', '53', 6, NULL),
(967, '2002110001', '54', 2, NULL),
(968, '2002110001', '51', 1, NULL),
(969, '2002110001', '55', 5, NULL),
(970, '2002110001', '56', 2, NULL),
(971, '2002110001', '57', 2, NULL),
(972, '2002110001', '58', 3, NULL),
(973, '2002110001', '59', 3, NULL),
(974, '2002110001', '42', 4, NULL),
(975, '2002110001', '43', 9, NULL),
(976, '2002110002', '1648', 5, NULL),
(977, '2002110002', '1647', 1, NULL),
(978, '2002110002', '92', 2, NULL),
(979, '2002110002', '91', 58, NULL),
(980, '2002110002', '90', 2, NULL),
(981, '2002110002', '89', 2, NULL),
(982, '2002110002', '1645', 2, NULL),
(983, '2002110002', '1643', 2, NULL),
(984, '2002110002', '72', 2, NULL),
(985, '2002110002', '71', 16, NULL),
(986, '2002110002', '69', 2, NULL),
(987, '2002110002', '68', 40, NULL),
(988, '2002110002', '66', 36, NULL),
(989, '2002110002', '65', 80, NULL),
(990, '2002110002', '64', 20, NULL),
(991, '2002110002', '63', 5, NULL),
(992, '2002110002', '62', 14, NULL),
(993, '2002110002', '61', 14, NULL),
(994, '2002110003', '149', 1, NULL),
(995, '2002110003', '147', 50, NULL),
(996, '2002110003', '141', 10, NULL),
(997, '2002110003', '140', 10, NULL),
(998, '2002110003', '139', 10, NULL),
(999, '2002110003', '136', 20, NULL),
(1000, '2002110003', '137', 10, NULL),
(1001, '2002110003', '136', 20, NULL),
(1002, '2002110003', '134', 1, NULL),
(1003, '2002110003', '133', 2, NULL),
(1004, '2002110003', '132', 2, NULL),
(1005, '2002110003', '131', 10, NULL),
(1006, '2002110003', '119', 2, NULL),
(1007, '2002110003', '115', 3, NULL),
(1008, '2002110003', '112', 1, NULL),
(1009, '2002110003', '105', 3, NULL),
(1010, '2002110003', '103', 20, NULL),
(1011, '2002110003', '102', 30, NULL),
(1012, '2002110003', '100', 20, NULL),
(1013, '2002110003', '100', 10, NULL),
(1014, '2002110003', '97', 30, NULL),
(1015, '2002110003', '94', 30, NULL),
(1016, '2002110004', '1640', 2, NULL),
(1017, '2002110004', '261', 2, NULL),
(1018, '2002110004', '260', 1, NULL),
(1019, '2002110004', '258', 1, NULL),
(1020, '2002110004', '257', 1, NULL),
(1021, '2002110004', '256', 1, NULL),
(1022, '2002110004', '238', 2, NULL),
(1023, '2002110004', '237', 1, NULL),
(1024, '2002110004', '234', 5, NULL),
(1025, '2002110004', '233', 5, NULL),
(1026, '2002110004', '231', 5, NULL),
(1027, '2002110004', '228', 5, NULL),
(1028, '2002110004', '226', 5, NULL),
(1029, '2002110004', '219', 10, NULL),
(1030, '2002110004', '217', 10, NULL),
(1031, '2002110005', '1656', 2, NULL),
(1032, '2002110005', '1655', 2, NULL),
(1033, '2002110005', '1654', 3, NULL),
(1034, '2002110005', '1653', 2, NULL),
(1035, '2002110005', '1653', 1, NULL),
(1036, '2002110005', '1652', 1, NULL),
(1037, '2002110005', '1651', 1, NULL),
(1038, '2002110005', '1650', 1, NULL),
(1039, '2002110006', '185', 3, NULL),
(1040, '2002110006', '185', 1, NULL),
(1041, '2002110006', '184', 4, NULL),
(1042, '2002110006', '183', 2, NULL),
(1043, '2002110006', '182', 6, NULL),
(1044, '2002110006', '181', 2, NULL),
(1045, '2002110006', '180', 42, NULL),
(1046, '2002110006', '178', 7, NULL),
(1047, '2002110006', '179', 40, NULL),
(1048, '2002110006', '177', 4, NULL),
(1049, '2002110006', '176', 2, NULL),
(1050, '2002110006', '175', 1, NULL),
(1051, '2002110006', '174', 5, NULL),
(1052, '2002110006', '173', 133, NULL),
(1053, '2002110006', '172', 148, NULL),
(1054, '2002110006', '169', 7, NULL),
(1055, '2002110006', '171', 6, NULL),
(1056, '2002110006', '170', 48, NULL),
(1057, '2002110006', '169', 1, NULL),
(1058, '2002110006', '168', 1, NULL),
(1059, '2002110006', '166', 4, NULL),
(1060, '2002110006', '167', 1, NULL),
(1061, '2002110006', '166', 1, NULL),
(1062, '2002110006', '165', 343, NULL),
(1063, '2002110006', '164', 10, NULL),
(1064, '2002110006', '163', 2, NULL),
(1065, '2002110006', '162', 20, NULL),
(1066, '2002110006', '161', 10, NULL),
(1067, '2002110006', '160', 10, NULL),
(1068, '2002110006', '159', 1, NULL),
(1069, '2002110006', '159', 1, NULL),
(1070, '2002110006', '158', 3, NULL),
(1071, '2002110006', '157', 15, NULL),
(1072, '2002110006', '156', 20, NULL),
(1073, '2002110006', '155', 11, NULL),
(1074, '2002110006', '153', 8, NULL),
(1075, '2002110006', '152', 2, NULL),
(1076, '2002110006', '151', 1, NULL),
(1077, '2002110006', '150', 8, NULL),
(1078, '2002110006', '187', 9, NULL),
(1079, '2002110006', '188', 12, NULL),
(1080, '2002110006', '189', 30, NULL),
(1081, '2002110006', '190', 2, NULL),
(1082, '2002110006', '191', 55, NULL),
(1083, '2002110006', '192', 2, NULL),
(1084, '2002110006', '193', 4, NULL),
(1085, '2002110006', '194', 4, NULL),
(1086, '2002110006', '196', 1, NULL),
(1087, '2002110006', '197', 1, NULL),
(1088, '2002110006', '198', 1, NULL),
(1089, '2002110006', '196', 4, NULL),
(1090, '2002110006', '197', 8, NULL),
(1091, '2002110006', '199', 1, NULL),
(1092, '2002110006', '200', 9, NULL),
(1093, '2002110006', '201', 3, NULL),
(1094, '2002110006', '202', 3, NULL),
(1095, '2002110006', '203', 12, NULL),
(1096, '2002110006', '204', 4, NULL),
(1097, '2002110006', '205', 5, NULL),
(1098, '2002110006', '206', 2, NULL),
(1099, '2002110006', '207', 22, NULL),
(1100, '2002110006', '208', 3, NULL),
(1101, '2002110006', '209', 2, NULL),
(1102, '2002110006', '210', 3, NULL),
(1103, '2002110006', '211', 1, NULL),
(1104, '2002110006', '212', 24, NULL),
(1105, '2002110006', '213', 12, NULL),
(1106, '2002110006', '214', 12, NULL),
(1107, '2002110006', '215', 12, NULL),
(1108, '2002110006', '216', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_in_tmp`
--

CREATE TABLE `tr_in_tmp` (
  `id` int(3) NOT NULL,
  `id_barang` char(7) NOT NULL,
  `jumlah_in` int(10) NOT NULL,
  `kode_user` char(5) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_out`
--

CREATE TABLE `tr_out` (
  `kode_out` char(10) NOT NULL,
  `tgl_out` date NOT NULL,
  `kode_user` char(5) NOT NULL,
  `keterangan_out` text NOT NULL,
  `kode_customer` char(5) DEFAULT NULL,
  `principal` varchar(50) DEFAULT NULL,
  `kode_layanan` char(5) DEFAULT NULL,
  `id_atm` varchar(50) DEFAULT NULL,
  `kode_teknisi` varchar(50) DEFAULT NULL,
  `ip_atm` varchar(50) DEFAULT NULL,
  `file_csr` varchar(150) DEFAULT NULL,
  `file_image_1` varchar(150) DEFAULT NULL,
  `file_image_2` varchar(150) DEFAULT NULL,
  `status_out` enum('Open','Close','Draft') DEFAULT 'Open',
  `tgl_kembali` date DEFAULT NULL,
  `tgl_pengerjaan` date DEFAULT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `created_out` datetime DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `alamat_pelanggan` text,
  `lokasi_pengerjaan` varchar(50) DEFAULT NULL,
  `lokasi_lainnya` varchar(50) DEFAULT NULL,
  `kategori_pengerjaan` varchar(50) NOT NULL,
  `status_pengarjaan` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tr_out`
--

INSERT INTO `tr_out` (`kode_out`, `tgl_out`, `kode_user`, `keterangan_out`, `kode_customer`, `principal`, `kode_layanan`, `id_atm`, `kode_teknisi`, `ip_atm`, `file_csr`, `file_image_1`, `file_image_2`, `status_out`, `tgl_kembali`, `tgl_pengerjaan`, `tgl_pengiriman`, `created_out`, `nama_pengirim`, `nama_penerima`, `alamat_pelanggan`, `lokasi_pengerjaan`, `lokasi_lainnya`, `kategori_pengerjaan`, `status_pengarjaan`) VALUES
('2002040001', '2020-02-04', 'U0001', '', 'CU004', 'MHU Box', 'LY006', NULL, 'U0001', NULL, '', '', '', 'Open', NULL, NULL, '2020-02-03', '2020-02-04 11:50:04', 'Reva', '', 'Kebon Sirih', 'MOBILE BRANCH', '', '', NULL),
('2001100001', '2019-11-20', 'U0001', '', 'CU017', 'MHU Box', 'LY006', NULL, 'U0001', NULL, '', '', '', '', NULL, NULL, '2019-11-21', '2020-01-10 15:26:47', 'Reva', 'Bapak Gunawan', 'Jl. Sunset Road 168 - Bali', 'KANTOR CABANG', '', '', NULL),
('2002040003', '2020-02-04', 'U0001', '', 'CU003', 'MHU Box', 'LY005', NULL, 'U0001', NULL, '2002040003_NF265K0431 BANJARAN.jpeg', '2002040003_NF265K0431 BANJARAN.jpeg', '', '', NULL, NULL, '2020-02-03', '2020-02-04 12:05:01', 'REVA', 'HUSNI', '', 'KANTOR CABANG', '', '', NULL),
('2102160001', '2021-02-16', 'U0001', '', 'CU003', 'Purchasing', 'LY007', '', 'U0005', 'Pepen', '', '', NULL, 'Close', '0000-00-00', '2021-02-16', NULL, '2021-02-16 10:37:37', NULL, NULL, '', 'Dari Kantor Pusat', '', 'ATM OFF SITE', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_out_item`
--

CREATE TABLE `tr_out_item` (
  `id` int(6) NOT NULL,
  `kode_out` char(10) NOT NULL,
  `id_barang` int(6) NOT NULL,
  `jumlah_out` int(10) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tr_out_item`
--

INSERT INTO `tr_out_item` (`id`, `kode_out`, `id_barang`, `jumlah_out`, `keterangan`) VALUES
(23, '2002040001', 1427, 1, NULL),
(19, '1908040001', 19, 1, NULL),
(22, '2001100001', 1426, 1, NULL),
(29, '2102160001', 1660, 5, NULL),
(25, '2002040003', 1426, 1, NULL),
(28, '2102160001', 1663, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_out_tmp`
--

CREATE TABLE `tr_out_tmp` (
  `id` int(5) NOT NULL,
  `id_barang` char(7) NOT NULL,
  `jumlah_out` int(6) NOT NULL,
  `kode_user` char(5) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_atm`
--
ALTER TABLE `ms_atm`
  ADD PRIMARY KEY (`id_atm`) USING BTREE;

--
-- Indexes for table `ms_barang`
--
ALTER TABLE `ms_barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE,
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `ms_customer`
--
ALTER TABLE `ms_customer`
  ADD PRIMARY KEY (`kode_customer`) USING BTREE;

--
-- Indexes for table `ms_layanan`
--
ALTER TABLE `ms_layanan`
  ADD PRIMARY KEY (`kode_layanan`) USING BTREE;

--
-- Indexes for table `ms_merk`
--
ALTER TABLE `ms_merk`
  ADD PRIMARY KEY (`kode_merk`) USING BTREE;

--
-- Indexes for table `ms_type`
--
ALTER TABLE `ms_type`
  ADD PRIMARY KEY (`kode_type`) USING BTREE;

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`kode_user`) USING BTREE;

--
-- Indexes for table `sys_akses`
--
ALTER TABLE `sys_akses`
  ADD PRIMARY KEY (`akses_id`) USING BTREE;

--
-- Indexes for table `sys_group`
--
ALTER TABLE `sys_group`
  ADD PRIMARY KEY (`group_id`) USING BTREE;

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`menu_id`) USING BTREE;

--
-- Indexes for table `sys_submenu`
--
ALTER TABLE `sys_submenu`
  ADD PRIMARY KEY (`submenu_id`) USING BTREE;

--
-- Indexes for table `tr_in`
--
ALTER TABLE `tr_in`
  ADD PRIMARY KEY (`kode_in`) USING BTREE;

--
-- Indexes for table `tr_in_item`
--
ALTER TABLE `tr_in_item`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tr_in_tmp`
--
ALTER TABLE `tr_in_tmp`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tr_out`
--
ALTER TABLE `tr_out`
  ADD PRIMARY KEY (`kode_out`) USING BTREE;

--
-- Indexes for table `tr_out_item`
--
ALTER TABLE `tr_out_item`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tr_out_tmp`
--
ALTER TABLE `tr_out_tmp`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_atm`
--
ALTER TABLE `ms_atm`
  MODIFY `id_atm` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ms_barang`
--
ALTER TABLE `ms_barang`
  MODIFY `id_barang` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1666;
--
-- AUTO_INCREMENT for table `sys_akses`
--
ALTER TABLE `sys_akses`
  MODIFY `akses_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT for table `sys_group`
--
ALTER TABLE `sys_group`
  MODIFY `group_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `menu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sys_submenu`
--
ALTER TABLE `sys_submenu`
  MODIFY `submenu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tr_in_item`
--
ALTER TABLE `tr_in_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;
--
-- AUTO_INCREMENT for table `tr_in_tmp`
--
ALTER TABLE `tr_in_tmp`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1108;
--
-- AUTO_INCREMENT for table `tr_out_item`
--
ALTER TABLE `tr_out_item`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tr_out_tmp`
--
ALTER TABLE `tr_out_tmp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
