-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2021 at 09:02 AM
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
-- Database: `dbin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_atm`
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
-- Dumping data for table `ms_atm`
--

INSERT INTO `ms_atm` (`id_atm`, `kode_atm`, `ip_atm`, `nama_atm`, `alamat_atm`, `keterangan_atm`, `status_atm`) VALUES
(1, '19050401', '192.168.2.11', 'ATM Mandiri 19050401', 'JL. Kolonel Bustomi Burhanudin No. 05', '-', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ms_barang`
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
-- Dumping data for table `ms_barang`
--

INSERT INTO `ms_barang` (`id_barang`, `kode_barang`, `nama_barang`, `keterangan_barang`, `harga_suplier`, `harga_diskon`, `data_ppn`, `status_barang`, `kode_merk`, `principal_barang`, `kode_type`, `stok_barang`, `kategori_barang`, `harga_penawaran`) VALUES
(1946, 'C-AIC-01', 'AIRFRESHNER CANE (Stella 250 ML)', ' Rp11,300 ', ' Rp11.300 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '', 43, 'BOTOL', ' Rp32.000 '),
(1947, 'C-AIC-02', 'AIRFRESHNER CANE REFILL (300 ML)', ' Rp32,900 ', ' Rp32.900 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '062', 37, 'Can/Kaleng', 'Rp.45.000'),
(1948, 'C-ATO-01', 'ATONIK', ' Rp85.000 ', ' Rp85.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '051', 5, 'BOTOL', ' Rp100.000 '),
(1949, 'C-BAK-01', 'BATTERY ALKALINE KRB BSR ISI 2', ' Rp3.333 ', ' Rp3.333 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '050', 38, 'PCS', ' Rp5.000 '),
(1950, 'C-BIB-01', 'BIG BARE', ' Rp162.900 ', ' Rp162.900 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '039', 4, 'GALON', ' Rp162.900 '),
(1951, 'C-BPB-01', 'BUBUK PEMBERSIH BOTOL 500 GRAM', ' Rp14.403 ', ' Rp14.548 ', ' Rp1.455 ', ' Rp1.309 ', 'Active', '001', 'Purchasing', '076', 68, 'Botol', 'Rp.25.000'),
(1952, 'C-BPR-01', 'BUBUK PEMBERSIH REFILL', ' Rp10.213 ', ' Rp10.316 ', ' Rp1.032 ', ' Rp928 ', 'Active', '001', 'Purchasing', '040', 74, 'PCS', ' Rp15.000 '),
(1953, 'C-BRP-01', 'BRITE PLUS', ' Rp63.309 ', ' Rp62.900 ', ' Rp5.347 ', ' Rp5.755 ', 'Active', '001', 'Purchasing', '039', 15, 'GALON', ' Rp62.900 '),
(1954, 'C-BRU-01', 'BREAK -UP', ' Rp139.602 ', ' Rp138.700 ', ' Rp11.790 ', ' Rp12.691 ', 'Active', '001', 'Purchasing', '039', 9, 'GALON', ' Rp138.700 '),
(1955, 'C-BUD-03', 'BUBUK DETERGENT 900 GRAM', ' Rp13.440 ', ' Rp12.727 ', ' Rp509 ', ' Rp1.222 ', 'Active', '001', 'Purchasing', '', 141, 'KG', ' Rp28.000 '),
(1956, 'C-CCM-01', 'CREAM CLEANSER 3M', ' Rp110.501 ', ' Rp100.455 ', ' Rp- ', ' Rp10.046 ', 'Active', '001', 'Purchasing', '043', 8, 'BOTOL', ' Rp190.000 '),
(1957, 'C-CRD-01', 'CONQ R DUST (MINYAK LOBBY)', ' Rp195.563 ', ' Rp194.300 ', ' Rp16.516 ', ' Rp17.778 ', 'Active', '001', 'Purchasing', '039', 14, 'GALON', ' Rp194.300 '),
(1958, 'C-CUR-01', 'CURACRON', ' Rp71.500 ', ' Rp65.000 ', ' Rp- ', ' Rp6.500 ', 'Active', '001', 'Purchasing', '051', 7, 'BOTOL', ' Rp85.000 '),
(1959, 'C-ENC-01', 'EXPOSE NATURAL CLEANER', ' Rp103.871 ', ' Rp103.200 ', ' Rp8.772 ', ' Rp9.443 ', 'Active', '001', 'Purchasing', '039', 18, 'GALON', ' Rp103.200 '),
(1960, 'C-FOC-01', 'FORWARD CLEANER', ' Rp85.251 ', ' Rp84.700 ', ' Rp7.200 ', ' Rp7.750 ', 'Active', '001', 'Purchasing', '039', 16, 'GALON', ' Rp84.700 '),
(1961, 'C-FRE-01', 'FREEDOM', ' Rp156.108 ', ' Rp155.100 ', ' Rp13.184 ', ' Rp14.192 ', 'Active', '001', 'Purchasing', '039', 12, 'GALON', ' Rp155.100 '),
(1962, 'C-FRP-01', 'FRESH PHONE', ' Rp27.742 ', ' Rp26.000 ', ' Rp780 ', ' Rp2.522 ', 'Active', '001', 'Purchasing', '042', 49, 'BOTOL', ' Rp35.000 '),
(1963, 'C-GGC-01', 'GLANCE GLASS CLEANER', ' Rp52.841 ', ' Rp52.500 ', ' Rp4.463 ', ' Rp4.804 ', 'Active', '001', 'Purchasing', '039', 30, 'GALON', ' Rp52.500 '),
(1964, 'C-GMP-01', 'GLO METAL POLISH', ' Rp324.194 ', ' Rp322.100 ', ' Rp27.379 ', ' Rp29.472 ', 'Active', '001', 'Purchasing', '039', 6, 'GALON', ' Rp322.100 '),
(1965, 'C-GOG-01', 'GO GETTER', ' Rp59.182 ', ' Rp58.800 ', ' Rp4.998 ', ' Rp5.380 ', 'Active', '001', 'Purchasing', '039', 23, 'GALON', ' Rp58.800 '),
(1966, 'C-GPU-01', 'GLADE PENYEGAR UDARA', ' Rp105.984 ', ' Rp105.300 ', ' Rp8.951 ', ' Rp9.635 ', 'Active', '001', 'Purchasing', '039', 30, 'GALON', ' Rp105.300 '),
(1967, 'C-GRA-01', 'GRAMAXONE', ' Rp103.000 ', ' Rp103.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '051', 13, 'BOTOL', ' Rp120.000 '),
(1968, 'C-HEL-01', 'HELIOS / SHINE UP', ' Rp149.465 ', ' Rp148.500 ', ' Rp12.623 ', ' Rp13.588 ', 'Active', '001', 'Purchasing', '039', 4, 'GALON', ' Rp148.500 '),
(1969, 'C-HSO-04', 'HAND SANITIZER', ' Rp96.121 ', ' Rp95.500 ', ' Rp8.118 ', ' Rp8.738 ', 'Active', '001', 'Purchasing', '039', 14, '', ' Rp95.500 '),
(1970, 'C-HSO-05', 'HAND SOAP ALL VARIANT (Fresha Nc  Nf)', ' Rp79.750 ', ' Rp72.500 ', ' Rp- ', ' Rp7.250 ', 'Active', '001', 'Purchasing', '038', 0, 'GALON', ' Rp72.500 '),
(1971, 'C-HSO-06', 'HANDSOAP SOFT CARE', ' Rp87.465 ', ' Rp86.900 ', ' Rp7.387 ', ' Rp7.951 ', 'Active', '001', 'Purchasing', '039', 2, 'GALON', ' Rp86.900 '),
(1972, 'C-HSO-07', 'HAND SOAP C-NOIL', ' Rp143.880 ', ' Rp130.800 ', ' Rp- ', ' Rp13.080 ', 'Active', '001', 'Purchasing', '020', 29, 'GALON', ' Rp130.800 '),
(1973, 'C-HSO-08', 'J-80 SANITIZER', ' Rp73.978 ', ' Rp73.500 ', ' Rp6.248 ', ' Rp6.725 ', 'Active', '001', 'Purchasing', '039', 14, 'GALON', ' Rp73.500 '),
(1974, 'C-KAG-01', 'KAMPER GANTUNG', ' Rp9.405 ', ' Rp9.000 ', ' Rp450 ', ' Rp855 ', 'Active', '001', 'Purchasing', '', 237, 'PCS', ' Rp15.000 '),
(1975, 'C-KBT-01', 'KAMPER BOLA TENIS ISI 5', ' Rp18.800 ', ' Rp18.800 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '024', 12, 'PCS', ' Rp30.000 '),
(1976, 'C-KBT-03', 'KAMPER BOLA BESAR', ' Rp17.700 ', ' Rp17.700 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '024', 12, 'PCS', ' Rp25.000 '),
(1977, 'C-MAC-01', 'MARBLE CLEAN', ' Rp94.248 ', ' Rp100.800 ', ' Rp6.552', ' Rp10.080 ', 'Active', '001', 'Purchasing', '039', 26, 'Galon', ' Rp121.968'),
(1978, 'C-MWB-01', 'MULTIPURPOSE WAIST BAG', ' Rp99.000 ', ' Rp120.000 ', ' Rp30.000 ', ' Rp9.000 ', 'Active', '001', 'Purchasing', '047', 16, 'PCS', ' Rp120.000 '),
(1979, 'C-NCF-01', 'NEW COMPLETE FOR FLOORS', ' Rp273.020', ' Rp292.000', ' Rp18.980 ', ' Rp29.200', 'Active', '001', 'Purchasing', '039', 6, 'Galon', ' Rp353.320 '),
(1980, 'C-NES-01', 'NEW STREAM', ' Rp86.768 ', ' Rp92.800 ', ' Rp6.032 ', ' Rp9.280 ', 'Active', '001', 'Purchasing', '039', 2, '', ' Rp102.080'),
(1981, 'C-NIF-01', 'NICE & FRESH', ' Rp56.658', ' Rp60.500 ', ' Rp3.932', ' Rp6.050', 'Active', '001', 'Purchasing', '039', 2, 'Galon', ' Rp66.550'),
(1982, 'C-NPK-01', 'NPK', ' Rp14.091 ', ' Rp14.000 ', ' Rp1.190 ', ' Rp1.281 ', 'Active', '001', 'Purchasing', '051', 16, 'PAK', ' Rp20.000 '),
(1983, 'C-OLI-03', 'OLI 2 TAK MERK CASTROL ACTIVE', ' Rp32.000 ', ' Rp32.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '', 16, 'BOTOL', ' Rp35.000 '),
(1984, 'C-PET-01', 'PEMBERSIH TOILET 450 ML', ' Rp14.000 ', ' Rp14.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '019', 1, 'BOTOL', ' Rp17.000 '),
(1985, 'C-PET-02', 'PEMBERSIH TOILET 800 GRAM', ' Rp19.500 ', ' Rp19.500 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '019', 1, 'BOTOL', ' Rp25.000 '),
(1986, 'C-POR-01', 'PORSTEX 1000 ML', ' Rp18.000 ', ' Rp18.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '019', 11, '', ' Rp25.000 '),
(1987, 'C-PUP-03', 'PUPUK UREA', ' Rp8.000 ', ' Rp8.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '051', 18, 'KRNG', ' Rp15.000 '),
(1988, 'C-REF-01', 'REFRESH', ' Rp175.406', ' Rp187.600 ', ' Rp12.194', ' Rp18.760', 'Active', '001', 'Purchasing', '039', 0, '', ' Rp.226.996'),
(1989, 'C-ROU-01', 'ROUND UP', ' Rp125.000 ', ' Rp125.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '051', 5, 'BOTOL', ' Rp150.000 '),
(1990, 'C-RUG-01', 'RUGBEE (SHAMPOO CARPET)', ' Rp131.274', ' Rp140.400', ' Rp 9.126', ' Rp14.040', 'Active', '001', 'Purchasing', '039', 5, '', ' Rp140.400'),
(1991, 'C-SPP-01', 'SABUN CUCI CAIR 800 ML', ' Rp13.230 ', ' Rp12.027 ', ' Rp- ', ' Rp1.203 ', 'Active', '001', 'Purchasing', '038', 15, 'PCS', ' Rp18.000 '),
(1992, 'C-WAS-01', 'WAX STRIP', 'Rp. 75.454', 'Rp. 80.700', 'Rp.  5.245', 'Rp. 8.070', 'Active', '001', 'Purchasing', '039', 2, 'Galon', 'Rp.97.647'),
(1993, 'C-ANT-01', 'ANTRACOL 250 GR ', ' Rp51.000 ', ' Rp51.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '051', 3, 'PAK', ' Rp75.000 '),
(1994, 'C-FPH-02', 'FURNITURE POLISH 450ML (REFIL)', ' Rp145,000 ', ' Rp14.500 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '019', 3, 'BOTOL', ' Rp25.000 '),
(1995, 'CP-FUR-01', 'FURADAN', ' Rp33,000 ', ' Rp33.000 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '051', 4, 'PAK', ' Rp45.000 '),
(1996, 'CP-LET-01', 'LEM TIKUS CAP GAJAH', ' Rp13,508 ', ' Rp13.508 ', ' Rp- ', ' Rp- ', 'Active', '001', 'Purchasing', '019', 0, 'PCS', ' Rp25.000 '),
(1997, 'N-AMK-02', 'AMPLAS KERTAS HALUS', ' Rp7,000 ', ' Rp7.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '028', 1, 'PCS', ' Rp15.000 '),
(1998, 'N-BAP-01', 'BATU APUNG', ' Rp12,000 ', ' Rp12.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '035', 5, 'PCS', ' Rp20.000 '),
(1999, 'N-CEL-01', 'CELEMEK', ' Rp49,000 ', ' Rp49.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '055', 0, 'PCS', ' Rp60.000 '),
(2000, 'N-FDM-01', 'FRAME DUST MOP 60CM', ' Rp41,250 ', ' Rp50.000 ', ' Rp12.500 ', ' Rp3.750 ', 'Active', '003', 'Purchasing', '052', 11, 'PCS', ''),
(2001, 'N-FDM-02', 'FRAME DUST MOP 80CM', ' Rp53,625 ', ' Rp65.000 ', ' Rp16.250 ', ' Rp4.875 ', 'Active', '003', 'Purchasing', '052', 9, 'PCS', ''),
(2002, 'N-HMO-01', 'HEAD MOP', ' Rp26,400 ', ' Rp32.000 ', ' Rp8.000 ', ' Rp2.400 ', 'Active', '003', 'Purchasing', '052', 0, 'PCS', ' Rp40.000 '),
(2003, 'N-KAM-02', 'KAINMOP COTTON WITH BAND 350GR', ' Rp30,525 ', ' Rp37.000 ', ' Rp9.250 ', ' Rp2.775 ', 'Active', '003', 'Purchasing', '052', 44, 'PCS', ' Rp35.000 '),
(2004, 'N-KAN-01', 'KANEBO/LAP CHAMOIS ART RACING', ' Rp20,000 ', ' Rp20.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '055', 14, 'PCS', ' Rp38.500 '),
(2005, 'N-KAR-01', 'KARUNG UK  75 X 110', ' Rp4,000 ', ' Rp4.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '023', 0, 'PCS', ' Rp7.000 '),
(2006, 'N-KES-01', 'KESET ANYAM', ' Rp3,500 ', ' Rp3.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '027', 11, 'PCS', ' Rp15.000 '),
(2007, 'N-KRO-02', 'KABEL ROLL 50 M', ' Rp640,000 ', ' Rp640.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '', 1, 'ROL', ' Rp725.000 '),
(2008, 'N-KSH-01', 'KANTONG SAMPAH HITAM 40X50CM', ' Rp20,000 ', ' Rp20.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '058', 124, 'KG', ' Rp32.000 '),
(2009, 'N-KSH-02', 'KANTONG SAMPAH HITAM 90 X 120', ' Rp15,900 ', ' Rp15.900 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '058', 146, 'KG', ' Rp39.000 '),
(2010, 'N-KSH-03', 'KANTONG SAMPAH HITAM 60X100CM', ' Rp15,900 ', ' Rp15.900 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '058', 125, 'KG', ' Rp31.000 '),
(2011, 'N-LAH-03', 'LAP HANDUK BIRU UK 30 X 30', ' Rp5,000 ', ' Rp5.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '056', 59, 'PCS', ' Rp7.000 '),
(2012, 'N-LAH-04', 'LAP HANDUK MERAH UK 30 X 30', ' Rp5,000 ', ' Rp5.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '056', 107, 'PCS', ' Rp7.000 '),
(2013, 'N-LAK-03', 'LAP KOTAK CAP GUNTING', ' Rp3,500 ', ' Rp3.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '055', 112, 'PCS', ' Rp6.000 '),
(2014, 'N-LAM-01', 'LAP MAJUN', ' Rp4,500 ', ' Rp4.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '060', 102, 'PCS', ' Rp15.000 '),
(2015, 'N-LAP-01', 'LAP PEL', ' Rp3,333 ', ' Rp3.333 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '055', 13, 'PCS', ' Rp7.000 '),
(2016, 'N-MAK-01', 'MASKER KAIN (BISA CUCI)', ' Rp4,167 ', ' Rp4.167 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '023', 650, 'PCS', ' Rp7.000 '),
(2017, 'N-MAK-02', 'MASKER KAIN 3M UK STANDARD', ' Rp650,000 ', ' Rp650.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '043', 150, 'PCS', ' Rp800.000 '),
(2018, 'N-MAK-03', 'MASKER BIASA', ' Rp49,500 ', ' Rp45.000 ', ' Rp- ', ' Rp4.500 ', 'Active', '003', 'Purchasing', '', 4425, 'PCS', ' Rp50.000 '),
(2019, 'T-FCS-01', 'FACE SHIELD', ' Rp3,500 ', ' Rp3.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '034', 18, 'PCS', ' Rp10.000 '),
(2020, 'N-MIC-01', 'MICROFIBER CLOTH', ' Rp26,250 ', ' Rp31.818 ', ' Rp7.955 ', ' Rp2.386 ', 'Active', '003', 'Purchasing', '052', 0, 'PCS', ' Rp80.000 '),
(2021, 'N-PAD-01', 'PAD 16\' COKLT (BONGKR SEALANT)', ' Rp350,000 ', ' Rp318.182 ', ' Rp- ', ' Rp31.818 ', 'Active', '003', 'Purchasing', '043', 46, 'PCS', ' Rp350.000 '),
(2022, 'N-PAD-02', 'PAD 16\' MERAH (KRISTALISASI)', ' Rp220,000 ', ' Rp200.000 ', ' Rp- ', ' Rp20.000 ', 'Active', '003', 'Purchasing', '043', 51, 'PCS', ' Rp260.000 '),
(2023, 'N-PAD-03', 'PAD 16\' PUTIH (PMELIHARA HARI)', ' Rp205,000 ', ' Rp186.364 ', ' Rp- ', ' Rp18.636 ', 'Active', '003', 'Purchasing', '043', 91, 'PCS', ' Rp260.000 '),
(2024, 'N-PAD-04', 'PAD 17\' MERAH', ' Rp269,500 ', ' Rp245.000 ', ' Rp- ', ' Rp24.500 ', 'Active', '003', 'Purchasing', '043', 30, 'PCS', ' Rp330.000 '),
(2025, 'N-PAD-05', 'PAD 17\' PUTIH', ' Rp269,500 ', ' Rp245.000 ', ' Rp- ', ' Rp24.500 ', 'Active', '003', 'Purchasing', '043', 34, 'PCS', ' Rp330.000 '),
(2026, 'N-PAD-06', 'PAD 17\' COKLAT', ' Rp375,000 ', ' Rp340.909 ', ' Rp- ', ' Rp34.091 ', 'Active', '003', 'Purchasing', '043', 10, 'PCS', ' Rp390.000 '),
(2027, 'N-PAD-07', 'PAD 20\' MERAH', ' Rp440,000 ', ' Rp400.000 ', ' Rp- ', ' Rp40.000 ', 'Active', '003', 'Purchasing', '043', 14, 'PCS', ' Rp450.000 '),
(2028, 'N-PAD-08', 'PAD 20\' PUTIH', ' Rp440,000 ', ' Rp400.000 ', ' Rp- ', ' Rp40.000 ', 'Active', '003', 'Purchasing', '043', 16, 'PCS', ' Rp450.000 '),
(2029, 'N-PAD-09', 'PAD 20\' COKLAT', ' Rp440,000 ', ' Rp400.000 ', ' Rp- ', ' Rp40.000 ', 'Active', '003', 'Purchasing', '043', 10, 'PCS', ' Rp535.000 '),
(2030, 'N-PIK-01', 'PAKAN IKAN', ' Rp10,000 ', ' Rp10.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '035', 15, 'PAK', ' Rp15.000 '),
(2031, 'N-POL-08', 'POLYBAG UK 25X25', ' Rp35,000 ', ' Rp35.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '051', 0, 'PAK', ' Rp45.000 '),
(2032, 'N-POL-09', 'POLYBAG UK 30X30', ' Rp35,000 ', ' Rp35.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '051', 10, 'PAK', ' Rp45.000 '),
(2033, 'N-POL-10', 'POLYBAG UK 35X35', ' Rp35,000 ', ' Rp35.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '051', 4, 'PAK', ' Rp45.000 '),
(2034, 'N-POT-03', 'POT TANAMAN UK  35', ' Rp19,500 ', ' Rp19.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '050', 3, 'PCS', ' Rp30.000 '),
(2035, 'N-POT-04', 'POT TANAMAN UK  15', ' Rp15,500 ', ' Rp15.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'PCS', ' Rp25.000 '),
(2036, 'N-POT-06', 'POT TANAMAN UK  17', ' Rp7,500 ', ' Rp7.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'PCS', ' Rp28.000 '),
(2037, 'N-PUP-01', 'PUPUK KANDANG', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'KRNG', ' Rp25.000 '),
(2038, 'N-PUP-02', 'PUPUK KOMPOS', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'KRNG', ' Rp25.000 '),
(2039, 'N-PUP-03', 'PUPUK UREA', ' Rp8,000 ', ' Rp8.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'KRNG', ' Rp20.000 '),
(2040, 'N-PUP-04', 'PUPUK GANDASIL B', ' Rp55,000 ', ' Rp55.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'PAK', ' Rp60.000 '),
(2041, 'N-PUP-05', 'PUPUK GANDASIL D', ' Rp51,000 ', ' Rp51.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 4, 'PAK', ' Rp60.000 '),
(2042, 'C-VTM-01', 'VITAMIN B1 500ML', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'PAK', ' Rp85.000 '),
(2043, 'C-MTM-01', 'MEDIA TANAM', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '049', 0, 'KRG', ' Rp35.000 '),
(2044, 'N-ROV-02', 'ROUND FILE 4 MM', ' Rp14,278 ', ' Rp12.980 ', ' Rp- ', ' Rp1.298 ', 'Active', '003', 'Purchasing', '041', 8, 'PCS', ' Rp27.000 '),
(2045, 'N-RPP-01', 'RANTAI PEMBATAS PLASTIK', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '', 0, 'METER', ' Rp25.000 '),
(2046, 'N-SAS-01', 'SABUT SPON', ' Rp3,000 ', ' Rp3.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '055', 17, 'PCS', ' Rp15.000 '),
(2047, 'N-SCS-001', 'SABUT CUCI STAINLESS', ' Rp4,000 ', ' Rp4.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '055', 1, 'PCS', ' Rp12.000 '),
(2048, 'N-SKK-02', 'STECKER STOP KONTAK 2 LUBANG', ' Rp20,000 ', ' Rp20.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '026', 0, 'PCS', ' Rp35.000 '),
(2049, 'N-SLA-01', 'SELANG AIR 3/4\" TRANSP  100M', ' Rp11,500 ', ' Rp11.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '', 0, 'METER', ' Rp16.000 '),
(2050, 'N-STK-01', 'SARUNG TANGAN KAIN', ' Rp1,375 ', ' Rp1.375 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '', 195, 'PCS', ' Rp8.000 '),
(2051, 'N-STK-02', 'SARUNG TANGAN KARET', ' Rp10,833 ', ' Rp10.833 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '036', 36, 'PCS', ' Rp28.000 '),
(2052, 'N-STK-03', 'SARUNG TANGAN LAS', ' Rp20,000 ', ' Rp20.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '', 5, 'PCS', ' Rp28.000 '),
(2053, 'N-STK-04', 'SARUNG TANGAN SENS GLOVES', ' Rp89,650 ', ' Rp81.500 ', ' Rp- ', ' Rp8.150 ', 'Active', '003', 'Purchasing', '036', 0, 'PSG', ' Rp120.000 '),
(2054, 'N-TAP-01', 'TAPAS', ' Rp1,600 ', ' Rp1.600 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '055', 108, 'PCS', ' Rp14.000 '),
(2055, 'N-TIH-01', 'TISSUE HAND TOWEL', ' Rp145,000 ', ' Rp131.818 ', ' Rp- ', ' Rp13.182 ', 'Active', '003', 'Purchasing', '045', 500, 'PCS', ' Rp167.000 '),
(2056, 'N-TIJ-02', 'TISSUE ROL JUMBO 800 GR Merk Kris', ' Rp32,450 ', ' Rp32.450 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '037', 18, 'ROL', ' Rp55.000 '),
(2057, 'N-TIK-01', 'TISSUE KOTAK (REFILL)', ' Rp365,000 ', ' Rp331.818 ', ' Rp- ', ' Rp33.182 ', 'Active', '003', 'Purchasing', '045', 129, 'PCS', ' Rp379.000 '),
(2058, 'N-TIR-03', 'TISSUE ROL 70 / 85 GR', ' Rp152,999 ', ' Rp139.090 ', ' Rp- ', ' Rp13.909 ', 'Active', '003', 'Purchasing', '045', 1470, 'ROL', ' Rp161.000 '),
(2059, 'N-TKK-01', 'TALI KLAIM KUNING', ' Rp50,000 ', ' Rp50.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '023', 0, 'ROL', ' Rp55.000 '),
(2060, 'N-TTP-05', 'TALI TAMBANG PLASTIK 16 MM', ' Rp8,000 ', ' Rp8.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '', 0, 'METER', ' Rp17.000 '),
(2061, 'N-WSQ-02', 'WINDOW SQUEEGE 45 CM REFILL', ' Rp18,750 ', ' Rp25.000 ', ' Rp6.250 ', ' Rp- ', 'Active', '003', 'Purchasing', '052', 10, 'PCS', ' Rp35.000 '),
(2062, 'N-WSQ-03', 'WINDOW SQUEEGE 105 CM REFILL', ' Rp30,000 ', ' Rp40.000 ', ' Rp10.000 ', ' Rp- ', 'Active', '003', 'Purchasing', '052', 7, 'PCS', ' Rp60.000 '),
(2063, 'N-WWR-01', 'WINDOW WASHER 35 CM REFILL', ' Rp17,250 ', ' Rp23.000 ', ' Rp5.750 ', ' Rp- ', 'Active', '003', 'Purchasing', '052', 9, 'PCS', ' Rp32.000 '),
(2064, 'N-WWR-02', 'WINDOW WASHER 45 CM REFILL', ' Rp21,375 ', ' Rp28.500 ', ' Rp7.125 ', ' Rp- ', 'Active', '003', 'Purchasing', '052', 2, 'PCS', ' Rp35.000 '),
(2065, 'N-KSG-01', 'KIKIR SEGITIGA GERGAJI 6 INC', ' Rp35,000 ', ' Rp35.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '057', 2, 'PCS', ' Rp35.000 '),
(2066, 'N-PBB-01', 'PLASTIK BENING BAJU (LEM)', ' Rp250,000 ', ' Rp250 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '023', 0, 'PCS', ' Rp1.000 '),
(2067, 'NP-GBU-01', 'GLUE BOARD UV', ' Rp10,000 ', ' Rp10.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '018', 0, 'PCS', ' Rp30.000 '),
(2068, 'NP-GTM-01', 'GLUE TRAP MOUSE', ' Rp19,500 ', ' Rp19.500 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '018', 0, 'PCS', ' Rp40.000 '),
(2069, 'CP-CNT-01', 'CONTRACT', ' Rp143,000 ', ' Rp130.000 ', ' Rp- ', ' Rp13.000 ', 'Active', '003', 'Purchasing', '047', 0, 'KG', ' Rp150.000 '),
(2070, 'NP-SDT-01', 'SEDOTAN PLASTIK', ' Rp13,000 ', ' Rp13.000 ', ' Rp- ', ' Rp- ', 'Active', '003', 'Purchasing', '023', 0, 'PAK', ' Rp21.000 '),
(2071, 'T-ARI-01', 'ARIT', ' Rp20,000 ', ' Rp20.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 5, 'PCS', ' Rp25.000 '),
(2072, 'T-BHS-01', 'Botol Hand Soap', ' Rp13,000 ', ' Rp13.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '', 12, 'BOTOL', ' Rp25.000 '),
(2073, 'T-BLA-01', 'BLANCONG', ' Rp100,000 ', ' Rp100.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 2, 'PCS', ' Rp120.000 '),
(2074, 'T-BLA-03', 'GAGANG BLANCONG', ' Rp25,000 ', ' Rp25.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 2, 'PCS', ' Rp40.000 '),
(2075, 'T-BOS-01', 'BOTTLE SPRAYER 500 ML', ' Rp12,500 ', ' Rp12.500 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '', 22, 'BOTOL', ' Rp27.000 '),
(2076, 'T-BUS-01', 'BUCKET STANDARD 6 LITER', ' Rp79,500 ', ' Rp106.000 ', ' Rp26.500 ', ' Rp- ', 'Active', '008', 'Purchasing', '046', 0, 'PCS', ' Rp106.000 '),
(2077, 'T-CAN-03', 'CANGKUL BESAR', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 3, 'PCS', ' Rp85.000 '),
(2078, 'T-CAR-01', 'CARBINER', ' Rp162,000 ', ' Rp162.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '033', 0, 'PCS', ' Rp200.000 '),
(2079, 'T-COG-01', 'CONGKELAN GULMA', ' Rp22,000 ', ' Rp22.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '051', 0, 'PCS', ' Rp30.000 '),
(2080, 'T-DMA-01', 'DUSTMOP ACRYLIC/BIRU 60CM TPT', ' Rp42,075 ', ' Rp51.000 ', ' Rp12.750 ', ' Rp3.825 ', 'Active', '008', 'Purchasing', '052', 31, 'PCS', ' Rp80.000 '),
(2081, 'T-DMA-03', 'DUSTMOP ACRYLIC/BIRU 80 CM TPT', ' Rp49,500 ', ' Rp60.000 ', ' Rp15.000 ', ' Rp4.500 ', 'Active', '008', 'Purchasing', '052', 51, 'PCS', ' Rp93.000 '),
(2082, 'T-DMC-02', 'DUSTMOP COTTON 60CM TP TANGKAI', ' Rp43,725 ', ' Rp53.000 ', ' Rp13.250 ', ' Rp3.975 ', 'Active', '008', 'Purchasing', '052', 39, 'PCS', ' Rp90.000 '),
(2083, 'T-DMC-03', 'DUSTMOP COTTON 80CM TP TANGKAI', ' Rp121,500 ', ' Rp162.000 ', ' Rp40.500 ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 19, 'PCS', ' Rp135.000 '),
(2084, 'T-EAP-01', 'EAR PLUG', ' Rp5,000 ', ' Rp5.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '036', 45, 'PCS', ' Rp20.000 '),
(2085, 'T-EMB-03', 'EMBER 6 GALON ELEGANT', ' Rp50,583 ', ' Rp50.583 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '', 15, 'PCS', ' Rp70.000 '),
(2086, 'T-ENC-01', 'EMBER COR 18 Liter', ' Rp11,666 ', ' Rp11.666 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '059', 0, 'PCS', ' Rp35.000 '),
(2087, 'T-ENC-02', 'EMBER COR HITAM ANTI PECAH 22 Liter', ' Rp11,666 ', ' Rp11.666 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '030', 13, 'PCS', ' Rp35.000 '),
(2088, 'T-FLM-01', 'FLAT MOP FRAME 60CM COMPLETE', ' Rp187,500 ', ' Rp250.000 ', ' Rp62.500 ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 3, 'PCS', ' Rp215.000 '),
(2089, 'T-FLM-02', 'FLAT MOP 60CM REFILL', ' Rp101,200 ', ' Rp115.000 ', ' Rp23.000 ', ' Rp9.200 ', 'Active', '008', 'Purchasing', '052', 0, 'PCS', ' Rp115.000 '),
(2090, 'T-FLO-01', 'FLOOR SCRUBBER WITHOUT HANDLE', ' Rp138,750 ', ' Rp185.000 ', ' Rp46.250 ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 0, 'PCS', ' Rp170.000 '),
(2091, 'T-FSQ-01', 'FLOOR SQUEGEE 55CM WITH HANDLE', ' Rp86,625 ', ' Rp105.000 ', ' Rp26.250 ', ' Rp7.875 ', 'Active', '008', 'Purchasing', '052', 1, 'PCS', ' Rp145.000 '),
(2092, 'T-FSQ-02', 'FLOOR SQUEGEE KAYU 45 CM', ' Rp27,166 ', ' Rp27.166 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 44, 'PCS', ' Rp50.000 '),
(2093, 'T-FSQ-03', 'FLOOR SQUEGEE 75CM', ' Rp107,250 ', ' Rp130.000 ', ' Rp32.500 ', ' Rp9.750 ', 'Active', '008', 'Purchasing', '052', 4, 'PCS', ' Rp165.000 '),
(2094, 'T-GAC-01', 'GAGANG CANGKUL', ' Rp10,000 ', ' Rp10.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 8, 'PCS', ' Rp20.000 '),
(2095, 'T-GAY-01', 'GAYUNG', ' Rp9,166 ', ' Rp9.166 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 13, 'PCS', ' Rp17.000 '),
(2096, 'T-GER-01', 'GERGAJI', ' Rp32,500 ', ' Rp32.500 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 6, 'PCS', ' Rp55.000 '),
(2097, 'T-GKT-01', 'GARUKAN TANAH TANPA GAGANG', ' Rp20,000 ', ' Rp20.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 5, 'PCS', ' Rp30.000 '),
(2098, 'T-GKT-02', 'GARUKAN TANAH/CANGKRANG KECIL', ' Rp9,000 ', ' Rp9.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 1, 'PCS', ' Rp25.000 '),
(2099, 'T-GKT-03', 'CANGKRANG SEDANG', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 7, 'PCS', ' Rp80.000 '),
(2100, 'T-GOL-01', 'GOLOK', ' Rp50,000 ', ' Rp50.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 2, 'PCS', ' Rp60.000 '),
(2101, 'T-GPT-01', 'GARPU TANAH', ' Rp88,000 ', ' Rp88.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 0, 'PCS', ' Rp120.000 '),
(2102, 'T-GSR-01', 'GEROBAK SORONG RODA SATU', ' Rp340,000 ', ' Rp340.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '', 0, 'PCS', ' Rp450.000 '),
(2103, 'T-GUD-02', 'GUNTING DAHAN', ' Rp20,000 ', ' Rp20.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '054', 13, 'PCS', ' Rp37.500 '),
(2104, 'T-GUK-01', 'GUNTING KAIT', ' Rp125,000 ', ' Rp125.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '054', 0, 'PCS', ' Rp135.000 '),
(2105, 'T-GUP-02', 'GUNTING PANGKASTANGAN DUA', ' Rp46,000 ', ' Rp46.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '054', 4, 'PCS', ' Rp70.000 '),
(2106, 'T-KAG-02', 'KACAMATA GOOGLE BERTALI', ' Rp28,000 ', ' Rp28.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '036', 8, 'PCS', ' Rp40.000 '),
(2107, 'T-KAP-01', 'KAPE 2 5\'', ' Rp4,000 ', ' Rp4.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '054', 24, 'PCS', ' Rp15.000 '),
(2108, 'T-KAS-01', 'KACAMATA SAFETY', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '036', 10, 'PCS', ' Rp35.000 '),
(2109, 'T-KEB-02', 'KEMOCENG BULU DOMBA', ' Rp69,900 ', ' Rp69.900 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '037', 19, 'PCS', ' Rp120.000 '),
(2110, 'T-KER-01', 'KEMOCENG RAFIAH KAWAT', ' Rp7,000 ', ' Rp7.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 15, 'PCS', ' Rp33.000 '),
(2111, 'T-KOP-01', 'KOP WC', ' Rp15,666 ', ' Rp15.666 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 9, 'PCS', ' Rp25.000 '),
(2112, 'T-KUA-02', 'KUAS CAT 2 1/2\"', ' Rp4,000 ', ' Rp4.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '026', 0, 'PCS', ' Rp10.000 '),
(2113, 'T-KUL-01', 'KUNCI L', ' Rp150,000 ', ' Rp150.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '026', 0, 'PCS', ' Rp175.000 '),
(2114, 'T-PAA-01', 'PAD ABRASIVE', ' Rp45,000 ', ' Rp54.545 ', ' Rp13.636 ', ' Rp4.091 ', 'Active', '008', 'Purchasing', '046', 2, 'PCS', ' Rp65.000 '),
(2115, 'T-PEK-02', 'PENGKI PLASTIK', ' Rp20,833 ', ' Rp20.833 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 10, 'PCS', ' Rp40.000 '),
(2116, 'T-PEK-04', 'PENGKI PLASTIK BESAR', ' Rp21,250 ', ' Rp21.250 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 7, 'PCS', ' Rp60.000 '),
(2117, 'T-RAC-03', 'RANTAI CHAINSAW 40 CM (MS 180)', ' Rp126,760 ', ' Rp115.236 ', ' Rp- ', ' Rp11.524 ', 'Active', '008', 'Purchasing', '041', 0, 'PCS', ' Rp130.000 '),
(2118, 'T-RBN-01', 'RACK BALL NILON', ' Rp30,833 ', ' Rp30.833 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 0, 'PCS', ' Rp80.000 '),
(2119, 'T-SAH-01', 'SAFETY HELMET (GSA)', ' Rp28,000 ', ' Rp28.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '036', 9, 'PCS', ' Rp50.000 '),
(2120, 'T-SAL-01', 'SAPU LIDI', ' Rp3,500 ', ' Rp3.500 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 69, 'PCS', ' Rp10.000 '),
(2121, 'T-SAN-01', 'SAPU NILON', ' Rp17,500 ', ' Rp17.500 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 17, 'METER', ' Rp40.000 '),
(2122, 'T-SEA-01', 'SEMPROTAN AIR', ' Rp60,000 ', ' Rp60.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '', 12, 'PCS', ' Rp75.000 '),
(2123, 'T-SEK-04', 'SEKOP KECIL', ' Rp9,000 ', ' Rp9.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '061', 22, 'PCS', ' Rp15.000 '),
(2124, 'T-SIC-02', 'SIKAT CLOSET & TEMPAT', ' Rp14,000 ', ' Rp14.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 30, 'PCS', ' Rp25.000 '),
(2125, 'T-SIK-01', 'SIKAT KAWAT', ' Rp12,000 ', ' Rp12.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '031', 23, 'PCS', ' Rp12.000 '),
(2126, 'T-SIN-01', 'SIKAT NILON TANGAN / ETERNA', ' Rp3,500 ', ' Rp3.500 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 7, 'PCS', ' Rp20.000 '),
(2127, 'T-SIN-02', 'SIKAT NILON TANGKAI', ' Rp27,083 ', ' Rp27.083 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 42, 'PCS', ' Rp62.000 '),
(2128, 'T-SIN-03', 'SIKAT NILON GAGANG', ' Rp12,250 ', ' Rp12.250 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 71, 'PCS', ' Rp25.000 '),
(2129, 'T-SPR-01', 'SPRINGKLER', ' Rp60,000 ', ' Rp60.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '051', 3, 'PCS', ' Rp85.000 '),
(2130, 'T-SPR-02', 'SPRINGKLER BESI BULAT', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '051', 0, 'PCS', ' Rp90.000 '),
(2131, 'T-TAC-01', 'TALI CARMANTEL', ' Rp30,000 ', ' Rp30.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '', 0, 'PCS', ' Rp40.000 '),
(2132, 'T-TAN-03', 'TANG POTONG', ' Rp30,000 ', ' Rp30.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '026', 1, 'PCS', ' Rp40.000 '),
(2133, 'T-TES-01', 'TEMPAT SAMPAH', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 3, 'PCS', ' Rp30.000 '),
(2134, 'T-TET-02', 'TEMPAT TISSUE KOTAK', ' Rp12,000 ', ' Rp12.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '032', 0, 'PCS', ' Rp30.000 '),
(2135, 'T-TMC-01', 'TANGKAI MOP (ALUMINIUM)', ' Rp30,525 ', ' Rp37.000 ', ' Rp9.250 ', ' Rp2.775 ', 'Active', '008', 'Purchasing', '052', 12, 'PCS', ' Rp60.000 '),
(2136, 'T-WSQ-01', 'WINDOW SQUEGEE 35 CM', ' Rp42,750 ', ' Rp57.000 ', ' Rp14.250 ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 36, 'PCS', ' Rp60.000 '),
(2137, 'T-WSQ-02', 'WINDOW SQUEGEE 45 CM', ' Rp51,000 ', ' Rp68.000 ', ' Rp17.000 ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 0, 'PCS', ' Rp80.000 '),
(2138, 'T-WWA-01', 'WINDOW WASHER 35 CM', ' Rp28,875 ', ' Rp38.500 ', ' Rp9.625 ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 32, 'PCS', ' Rp53.000 '),
(2139, 'T-WWA-02', 'WINDOW WASHER 45  CM', ' Rp32,625 ', ' Rp43.500 ', ' Rp10.875 ', ' Rp- ', 'Active', '008', 'Purchasing', '052', 0, 'PCS', ' Rp60.000 '),
(2140, 'T-SAP-02', 'SAPU + PENGKI TUTUP 742', ' Rp47,500 ', ' Rp47.500 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '055', 0, 'PCS', ' Rp255.000 '),
(2141, 'T-KMH-01', 'KACAMATA HITAM BIASA', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '036', 12, 'PCS', ' Rp30.000 '),
(2142, 'TP-GEU-03', 'GELAS UKUR 1 LITER', ' Rp25,000 ', ' Rp25.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '032', 4, 'PCS', ' Rp35.000 '),
(2143, 'TP-GEU-04', 'GELAS UKUR 2 LITER', ' Rp35,000 ', ' Rp35.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '032', 1, 'PCS', ' Rp45.000 '),
(2144, 'TP-JAK-01', 'JARING KUCING', ' Rp160,000 ', ' Rp160.000 ', ' Rp- ', ' Rp- ', 'Active', '008', 'Purchasing', '', 0, 'PCS', ' Rp200.000 '),
(2145, 'U-BJB-01', 'BAJU BLAZER KUNING UK S 1 STEL', ' Rp150,000 ', ' Rp150.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '017', 0, 'PSG', ' Rp200.000 '),
(2146, 'U-BJB-02', 'BAJU BLAZER KUNING UK L 1 STEL', ' Rp150,000 ', ' Rp150.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '017', 0, 'PSG', ' Rp200.000 '),
(2147, 'U-JAS-01', 'JAS HUJAN', ' Rp153,450 ', ' Rp155.000 ', ' Rp15.500 ', ' Rp13.950 ', 'Active', '010', 'Purchasing', '044', 0, 'PCS', ' Rp170.000 '),
(2148, 'U-KPS-01', 'KAOS POLO SHIRT UKURAN M', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp90.000 '),
(2149, 'U-KPS-02', 'KAOS POLO SHIRT UKURAN L', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp90.000 '),
(2150, 'U-KPS-03', 'KAOS POLO SHIRT UK  XL', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp90.000 '),
(2151, 'U-KPS-04', 'KAOS POLO SHIRT UK S', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp90.000 '),
(2152, 'U-KPS-05', 'KAOS POLO SHIRT UK XXL', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp90.000 '),
(2153, 'U-KPS-06', 'KAOS POLO PANJANG UK  M', ' Rp67,500 ', ' Rp67.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp95.000 '),
(2154, 'U-KPS-07', 'KAOS POLO PANJANG UK  L', ' Rp67,500 ', ' Rp67.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp95.000 '),
(2155, 'U-KPS-08', 'KAOS POLO PANJANG UK  XL', ' Rp67,500 ', ' Rp67.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp95.000 '),
(2156, 'U-KPS-09', 'KAOS POLO PANJANG UK  XXL', ' Rp67,500 ', ' Rp67.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp95.000 '),
(2157, 'U-KPS-12', 'KAOS POLO SHIRT UK L WARNA PUTIH', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp95.000 '),
(2158, 'U-KPS-13', 'KAOS POLO SHIRT UK  XL WARNA PUTIH', ' Rp65,000 ', ' Rp65.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp90.000 '),
(2159, 'U-ROJ-01', 'ROMPI JARING', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '036', 9, 'PCS', ' Rp30.000 '),
(2160, 'U-ROS-01', 'ROMPI SAFETY', ' Rp15,000 ', ' Rp15.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '036', 1, 'PCS', ' Rp30.000 '),
(2161, 'U-SAS-03', 'SAFETY SHOES KENT 78106 BLACK', ' Rp189,305 ', ' Rp312.900 ', ' Rp140.805', ' Rp17.210 ', 'Active', '010', 'Purchasing', '044', 0, 'PSG', ' Rp312.900 '),
(2162, 'U-SAS-06', 'SAFETY SHOES KENT 78106 BROWN', ' Rp189,305 ', ' Rp312.900 ', ' Rp140.805', ' Rp17.210 ', 'Active', '010', 'Purchasing', '044', 0, 'PSG', ' Rp312.900 '),
(2163, 'U-SCS-01', 'SERAGAM CELANA STAF Uk  29', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp130.000 '),
(2164, 'U-SCS-02', 'SERAGAM CELANA STAF Uk  30', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp130.000 '),
(2165, 'U-SCS-03', 'SERAGAM CELANA STAF Uk  31', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp130.000 '),
(2166, 'U-SCS-05', 'SERAGAM CELANA STAF Uk  33', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp130.000 '),
(2167, 'U-SCS-07', 'SERAGAM CELANA STAF Uk  35', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp130.000 '),
(2168, 'U-SCS-08', 'SERAGAM CELANA STAF Uk  36', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp130.000 '),
(2169, 'U-SCS-10', 'SERAGAM CELANA STAF Uk  38', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp130.000 '),
(2170, 'U-SDC-01', 'SEPATU DAVIS CANVAS BLACK', ' Rp137,500 ', ' Rp125.000 ', ' Rp- ', ' Rp12.500 ', 'Active', '010', 'Purchasing', '048', 0, 'PSG', ' Rp150.000 '),
(2171, 'U-SKB-01', 'SERAGAM OPR LIST BATIK UK-S', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2172, 'U-SKB-02', 'SERAGAM OPR LIST BATIK UK-M', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2173, 'U-SKB-03', 'SERAGAM OPR LIST BATIK UK-L', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2174, 'U-SKB-04', 'SERAGAM OPR LIST BATIK UK-XL', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2175, 'U-SKJ-11', 'SERAGAM KEMEJA PENDEK UK-13 5', ' Rp135,000 ', ' Rp135.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '022', 0, 'PCS', ' Rp160.000 '),
(2176, 'U-SKJ-02', 'SERAGAM KEMEJA PENDEK UK-14 5', ' Rp135,000 ', ' Rp135.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '022', 0, 'PCS', ' Rp160.000 '),
(2177, 'U-SKJ-04', 'SERAGAM KEMEJA PENDEK UK-15 5', ' Rp135,000 ', ' Rp135.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '022', 0, 'PCS', ' Rp160.000 '),
(2178, 'U-SOB+01', 'SERAGAM OPERATOR BAJU UK-S', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2179, 'U-SOB-02', 'SERAGAM OPERATOR BAJU UK-M', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2180, 'U-SOB-03', 'SERAGAM OPERATOR BAJU UK-L', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2181, 'U-SOB-04', 'SERAGAM OPERATOR BAJU UK-XL', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2182, 'U-SOB-05', 'SERAGAM OPERATOR BAJU UK-XXL', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2183, 'U-SOB-06', 'SERAGAM OPERATOR BAJU UK-XXXL', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2184, 'U-SOB-08', 'SERAGAM OPR BAJU UK-M (TLD)', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2185, 'U-SOB-09', 'SERAGAM OPR BAJU UK-L (TLD)', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2186, 'U-SOB-10', 'SERAGAM OPR BAJU UK-XL (TLD)', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2187, 'U-SOB-11', 'SERAGAM OPR BAJU UK-XXL (TLD)', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2188, 'U-SOB-12', 'SERAGAM OPR BAJU UK-XXXL (TLD)', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2189, 'U-SOC-01', 'SERAGAM OPR CELANA UK  27', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2190, 'U-SOC-02', 'SERAGAM OPR CELANA UK  28', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2191, 'U-SOC-03', 'SERAGAM OPR CELANA UK  29', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2192, 'U-SOC-04', 'SERAGAM OPR CELANA UK  30', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2193, 'U-SOC-05', 'SERAGAM OPR CELANA UK  31', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2194, 'U-SOC-06', 'SERAGAM OPR CELANA UK  32', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2195, 'U-SOC-07', 'SERAGAM OPR CELANA UK  33', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2196, 'U-SOC-08', 'SERAGAM OPR CELANA UK  34', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2197, 'U-SOC-09', 'SERAGAM OPR CELANA UK  35', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2198, 'U-SOC-10', 'SERAGAM OPR CELANA UK  36', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2199, 'U-SOC-11', 'SERAGAM OPR CELANA UK  37', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2200, 'U-SOC-12', 'SERAGAM OPR CELANA UK  38', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2201, 'U-SOC-14', 'SERAGAM OPR CELANA UK  40', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2202, 'U-SOC-15', 'SERAGAM OPR CELANA UK  41', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2203, 'U-SOC-17', 'SERAGAM OPR CELANA UK  43', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2204, 'U-SOC-20', 'SERAGAM OPR CELANA UK  46', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2205, 'U-SPB-02', 'SEPATU BOOTS ', ' Rp100.000 ', ' Rp80.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '036', 0, 'PSG', ''),
(2206, 'U-SSB-02', 'SERAGAM SPV BAJU UK-M', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2207, 'U-SSB-03', 'SERAGAM SPV BAJU UK-L', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2208, 'U-SSB-04', 'SERAGAM SPV BAJU UK-XL', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2209, 'U-SSB-05', 'SERAGAM SPV BAJU UK-XXL', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2210, 'U-SSB-06', 'SERAGAM SPV BAJU UK-XXXL', ' Rp82,500 ', ' Rp82.500 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '016', 0, 'PCS', ' Rp100.000 '),
(2211, 'U-TOP-01', 'TOPI BIASA', ' Rp22,000 ', ' Rp22.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp35.000 '),
(2212, 'U-TOP-02', 'TOPI GARDENER', ' Rp22,000 ', ' Rp22.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp35.000 '),
(2213, 'U-TOP-03', 'TOPI SANGGUL JALA', ' Rp27,000 ', ' Rp27.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp35.000 '),
(2214, 'U-TOP-04', 'TOPI KUPLUK / SEBO', ' Rp22,000 ', ' Rp22.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '053', 0, 'PCS', ' Rp35.000 '),
(2215, 'U-WEA-01', 'SERAGAM WEARPAK UK S', ' Rp180,000 ', ' Rp180.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '029', 0, 'PCS', ' Rp200.000 '),
(2216, 'U-WEA-02', 'SERAGAM WEARPAK UK  M', ' Rp180,000 ', ' Rp180.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '029', 0, 'PCS', ' Rp200.000 '),
(2217, 'U-WEA-03', 'SERAGAM WEARPAK UK  L', ' Rp180,000 ', ' Rp180.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '029', 0, 'PCS', ' Rp200.000 '),
(2218, 'U-WEA-04', 'SERAGAM WEARPAK UK  XL', ' Rp180,000 ', ' Rp180.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '029', 0, 'PCS', ' Rp200.000 '),
(2219, 'U-WEA-05', 'SERAGAM WEARPAK UK  XXL', ' Rp180,000 ', ' Rp180.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '029', 0, 'PCS', ' Rp200.000 '),
(2220, 'U-CPP-01', 'SERAGAM CELANA PUTIH PJG UK 30', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2221, 'U-CPP-03', 'SERAGAM CELANA PUTIH PJG UK 32', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2222, 'U-CPP-04', 'SERAGAM CELANA PUTIH PJG UK 33', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2223, 'U-CPP-07', 'SERAGAM CELANA PUTIH PJG UK 36', ' Rp70,000 ', ' Rp70.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp90.000 '),
(2224, 'UP-SOP-02', 'SERAGAM OPERATOR PEST UK L', ' Rp95,000 ', ' Rp95.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '025', 0, 'PCS', ' Rp120.000 '),
(2225, 'UP-WEP-02', 'WEARPACK PEST UK L', ' Rp195,000 ', ' Rp195.000 ', ' Rp- ', ' Rp- ', 'Active', '010', 'Purchasing', '029', 0, '', ''),
(2227, 'C-HSO-11', 'HAND SOAP FRESHA APPLE', 'Rp.79.750', 'Rp.72.500', 'Rp.-', 'Rp.7.250', 'Active', '001', 'Purchasing', '038', 44, 'Galon', 'Rp.105.000'),
(2228, 'C-HSO-12', 'HAND SOAP FRESHA NPNC', 'Rp.79.750', 'Rp.72.500', 'Rp.-', 'Rp.7.250', 'Active', '001', 'Purchasing', '038', 7, 'Galon', 'Rp.105.000'),
(2229, 'N-KAM-03', 'MOP COTTON BAND 350GR - RED', 'Rp.16.500', 'Rp.16.500', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '074', 35, 'PCS', ''),
(2230, 'N-KAM-04', 'MOP COTTON BAND 350GR - BLUE', 'Rp.16.500', 'Rp.16.500', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '074', 13, 'PCS', ''),
(2231, 'T-EMB-02', 'EMBER 4 GALON EXELENT', 'Rp.24.000', 'Rp.24.000', 'Rp.-', 'Rp.-', 'Active', '008', 'Purchasing', '055', 16, 'PCS', 'Rp.54.000'),
(2232, 'T-SEK-01', 'SEKOP BESAR PERSEGI', 'Rp.45.000', 'Rp.45.000', 'Rp.-', 'Rp.-', 'Active', '008', 'Purchasing', '054', 1, 'PCS', ''),
(2233, 'C-TSP-01', 'TSP', 'Rp.8.000', 'Rp.8.000', 'Rp.-', 'Rp.-', 'Active', '001', 'Purchasing', '049', 10, 'Kg', 'Rp.15.000'),
(2234, 'T-CAN-02', 'CANGKUL SEDANG', 'Rp.25.000', 'Rp.25.000', 'Rp.-', 'Rp.-', 'Active', '008', 'Purchasing', '054', 12, 'PCS', 'Rp.40.000'),
(2235, 'N-POL-11', 'POLYBAG UK. 15 x 15', 'Rp.25.000', 'Rp.25.000', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '049', 5, 'Kg', ''),
(2236, 'N-POL-12', 'POLYBAG UK. 20 x 20', 'Rp.27.000', 'Rp.27.000', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '049', 9, 'Kg', ''),
(2237, 'N-HMB-01', 'HEAD MOP BIRU', 'Rp.16.500', 'Rp.16.500', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '074', 19, 'PCS', ''),
(2238, 'N-HMM-01', 'HEAD MOP MERAH', 'Rp.16.500', 'Rp.16.500', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '074', 41, 'PCS', ''),
(2239, 'T-BUS-02', 'BUCKET STD. 6 LITER MERAH', 'Rp.72.100', 'Rp.93.636', 'Rp.28.090', 'Rp.6.554', 'Active', '008', 'Purchasing', '046', 9, 'PCS', 'Rp.205.000'),
(2240, 'T-BUS-03', 'BUCKET STD. 6 LITER BIRU', 'Rp.72.100', 'Rp.93.636', 'Rp.28.090', 'Rp.6.554', 'Active', '008', 'Purchasing', '046', 7, 'PCS', 'Rp.205.000'),
(2241, 'T-BUS-04', 'BUCKET STD. 6 LITER KUNING', 'Rp.72.100', 'Rp.93.636', 'Rp.28.090', 'Rp.6.554', 'Active', '008', 'Purchasing', '046', 0, 'PCS', 'Rp.205.000'),
(2242, 'U-SAB-01', 'SEPATU AP BOOTS HIJAU - 39', 'Rp.85.000', 'Rp.85.000', 'Rp.-', 'Rp.-', 'Active', '010', 'Purchasing', '083', 1, 'PSG', 'Rp.85.000'),
(2243, 'U-SAB-02', 'SEPATU AP BOOTS HIJAU - 40', 'Rp.85.000', 'Rp.85.000', 'Rp.-', 'Rp.-', 'Active', '010', 'Purchasing', '083', 2, 'PSG', 'Rp.85.000'),
(2244, 'U-SAB-03', 'SEPATU AP BOOTS HIJAU - 41', 'Rp.85.000', 'Rp.85.000', 'Rp.-', 'Rp.-', 'Active', '010', 'Purchasing', '083', 1, 'PSG', 'Rp.85.000'),
(2245, 'U-SAB-04', 'SEPATU AP BOOTS HIJAU - 42', 'Rp.85.000', 'Rp.85.000', 'Rp.-', 'Rp.-', 'Active', '010', 'Purchasing', '083', 5, 'PSG', 'Rp.85.000'),
(2246, 'T-FLS-01', 'FLOOR SIGN \"CAUTION WET FLOOR\"', 'Rp.53.800', 'Rp.48.909', 'Rp.-', 'Rp.4.890', 'Active', '008', 'Purchasing', '037', 7, 'PCS', 'Rp.130.000'),
(2247, 'T-FSQ-04', 'FLOOR SQUEGEE BESI 100CM', 'Rp.56.000', 'Rp.56.000', 'Rp.-', 'Rp.-', 'Active', '008', 'Purchasing', '074', 3, 'PCS', 'Rp.240.000'),
(2248, 'N-BMR-01', 'BUSI MESIN POTONG RUMPUT', 'Rp.37.000', 'Rp.33.636', 'Rp.-', 'Rp.3.363', 'Active', '003', 'Purchasing', '041', 18, 'PCS', 'Rp.33.636'),
(2249, 'N-POT-07', 'POT TANAMAN UK. 20', 'Rp.3.000', 'Rp.3.000', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '085', 30, 'PCS', 'Rp.3.000'),
(2250, 'N-POT-05', 'POT TANAMAN UK.40/45', 'Rp.16.000', 'Rp.16.000', 'Rp.-', 'Rp.-', 'Active', '003', 'Purchasing', '086', 3, 'PCS', 'Rp.16.000'),
(2251, 'T-MLI-001', 'MESIN LAS INVERTER 200A', 'Rp.1.375.000', 'Rp.1.250.000', 'Rp.1.250.0', 'Rp.125.000', 'Active', '008', 'Purchasing', '087', 1, 'PCS', 'Rp.2.500.000'),
(2252, 'T-PEK-01', 'PENGKI KALENG', 'Rp.16.000', 'Rp.16.000', 'Rp.-', 'Rp.-', 'Active', '008', 'Purchasing', '074', 40, 'PCS', 'Rp.18.000'),
(2253, 'T-TSL-01', 'TANGKAI SAPU LIDI', 'Rp.3.500', 'Rp.3.500', 'Rp.-', 'Rp.-', 'Active', '008', 'Purchasing', '061', 43, 'PCS', 'Rp.5.000');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE `ms_customer` (
  `kode_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` text,
  `telp_customer` varchar(25) NOT NULL,
  `keterangan_customer` text,
  `status_customer` enum('Active','Non Active') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`kode_customer`, `nama_customer`, `alamat_customer`, `telp_customer`, `keterangan_customer`, `status_customer`) VALUES
('CTM002', 'PT ISM Bogasari Cilincing', '', '-', '', 'Active'),
('CTM003', 'PT ISM Bogasari Cibitung (Existing)', '', '-', '', 'Active'),
('CTM004', 'PT ISM Bogasari Tangerang', '', '-', '', 'Active'),
('CTM005', 'ICBP Cikupa', '', '-', '', 'Active'),
('CTM006', 'PT Karunia Kreasi Cemerlang', '', '-', '', 'Active'),
('CTM007', 'PT IAP HO', '', '-', '', 'Active'),
('CTM008', 'PT IAP Jatake', '', '-', '', 'Active'),
('CTM009', 'PT IAP Bogor', '', '-', '', 'Active'),
('CTM010', 'NICI', '', '-', '', 'Active'),
('CTM011', 'PT SDM Harmoni', '', '-', '', 'Active'),
('CTM012', 'PT SDM Karawaci', '', '-', '', 'Active'),
('CTM013', 'PT ISM Bogasari Cibitung (Mill CD)', '', '-', '', 'Active'),
('CTM014', 'Plaza Mutiara', '', '-', '', 'Active'),
('CTM015', 'PT PTM Pusat', '', '-', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ms_layanan`
--

CREATE TABLE `ms_layanan` (
  `kode_layanan` char(5) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `keterangan_layanan` text,
  `status_layanan` enum('Active','Non Active') NOT NULL,
  `kembali_layanan` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ms_layanan`
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
('LY012', 'Joko Lukmanul', '', 'Active', 'Y'),
('LY013', 'Tri Wahyudi', '', 'Active', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ms_merk`
--

CREATE TABLE `ms_merk` (
  `kode_merk` varchar(20) NOT NULL,
  `nama_merk` varchar(50) DEFAULT NULL,
  `keterangan_merk` text,
  `status_merk` enum('Active','Non Active') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ms_merk`
--

INSERT INTO `ms_merk` (`kode_merk`, `nama_merk`, `keterangan_merk`, `status_merk`) VALUES
('MRK001', 'Chemical\r\n', '-', 'Active'),
('MRK002', 'CHEMICAL PEST\r\n', '-', 'Active'),
('MRK003', 'NON-CHEMICAL\r\n', '-', 'Active'),
('MRK004', 'Non Chemical pest\r\n', '-', 'Active'),
('MRK008', 'TOOLS', '-', 'Active'),
('MRK009', 'TOOLS PEST\r\n', '-', 'Active'),
('MRK010', 'UNIFORM\r\n', '-', 'Active'),
('MRK011', 'UNIFORM PEST', '-', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ms_toko`
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
-- Dumping data for table `ms_toko`
--

INSERT INTO `ms_toko` (`nama_toko`, `moto_toko`, `alamat_toko`, `telp_toko`, `email_toko`, `keterangan_toko`) VALUES
('EASY INVENTORY', 'Sistem Aplikasi Inventory', 'Jl. RS. Fatmawati Raya No.15, RT.5/RW.3, Blok J No.34, Cilandak Barat, Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12420', '(021) 27656365', 'helpdesk@arthatechselaras.co, technical@arthatechs', 'Saran & Keluhan Hub : ');

-- --------------------------------------------------------

--
-- Table structure for table `ms_type`
--

CREATE TABLE `ms_type` (
  `kode_type` varchar(20) NOT NULL,
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
-- Dumping data for table `ms_type`
--

INSERT INTO `ms_type` (`kode_type`, `nama_type`, `nama_kodsup`, `nama_pic`, `alamat_sup`, `no_telepon`, `sup_note`, `keterangan_type`, `status_type`) VALUES
('SPL016', 'AGAZHIA', 'CL-009', 'Ibu Kiky', 'Jl. Pamularsih I No. 3', 'Hp. 08112940977', 'C-Noil', 'Barang', 'Active'),
('SPL017', 'AZKIA TANAH ABANG\r\n', 'CL-008', 'Ibu Icha', 'Rukan Citra Graha Jl Panjang No. 26 Rt 006  Rw. 001 Kel. Kedoya Selatan Kec. Kebon Jeruk Jarta Barat', 'Hp. 081297111391', 'Bubuk Pembersih', 'Barang', 'Active'),
('SPL018', 'BERKAH JAYA SENTOSA\r\n', 'CL-007', 'Ibu Dewi', 'Jl. Gajah 68 B Kel. Gayamsari Kec Gayamsari Semarang', 'HP. 0817293832', 'Pembersih Lantai', 'Barang', 'Active'),
('SPL019', 'CAREFOUR\r\n', 'CL-005', 'Bpk. Dede', 'Ruko Sinergi Antapani Kav. 17, Jl. Parakan Saat, Bandung', 'Hp. 082218267596', 'Chemical C-Noil', 'Barang', 'Active'),
('SPL020', 'CV BERKAT ANUGERAH JAYA\r\n', 'CL-002', 'Bpk. Ronny Jackson', 'Jl. Rawa Gelam IV No. 14 Kawasan Industri Polu Gadung Jakarta - Timur', 'T. 021-4602666,', 'Chemical Jhonson ', 'Barang', 'Active'),
('SPL021', 'CV SANHA SUKSES\r\n', 'CL-003', 'Bpk. Hasiando', 'Jl. Cacing Kampung Baru KM. 2 Rt. 007 Rw. 008 ', 'T. 021-5222172', 'Chemical Fresha NC, NF', 'Barang', 'Active'),
('SPL022', 'DNL TANAH ABANG\r\n', 'CL-004', 'Ibu Kristine Sunny', 'Jl. Greges Jaya II Kav. 8B, A23  Surabaya 60193', 'T. 031-7495605', 'Tissue & Chemical', 'Barang', 'Active'),
('SPL023', 'GUNA PLASTIK\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL024', 'INDOGROSIR\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL025', 'IRA BUSANA\r\n\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL026', 'JASMINE TOKO BESI\r\n\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL028', 'JEMBATAN BESI\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL027', 'JOKER\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL029', 'KALAPETONG\r\n\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL030', 'KURNIA JAYA\r\n\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL031', 'MILLERS', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL074', 'CV MITRA MULIA SEJAHTERA', 'TS-017', 'BPK ROY', 'JL. PISANGAN BARU TENGAH NO. 33 RT 013 RW 008, KEL. PISANGAN BARU, KEC. MATRAMAN, JAKARTA TIMUR', '021-8507888', '', 'Barang', 'Active'),
('SPL033', 'OUTDOOR STATION\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL034', 'PAK ROWAN\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL035', 'PAKAN IKAN KEMAYORAN\r\n\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL036', 'PD SELAMET\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL037', 'PT ACE HARDWARE\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL038', 'PT DINAMIKA MAJU USAHA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL039', 'PT DUA BERLIAN\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL076', 'PT DWIMITRA MULTI PRATAMA', 'CL-008', 'IBU ICHA', 'RUKAN CITRA GRAHA JL PANJANG NO. 26 RT 006 RW 001, KEL. KEDOYA SELATAN, KEC. KEBON JERUK JAKARTA BARAT ', '081297111391', '', 'Barang', 'Active'),
('SPL041', 'PT INDOKITA MAKMUR\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL042', 'PT INDONESIA INDUSTRI PERKASA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL073', 'PT INTIKARYA SUKSES ABADI', 'TS-012', 'BPK ALVIN', 'JL JELAMBAR UTARA RAYA NO. 19 C JAKARTA 11460', '081266757889', '', 'Barang', 'Active'),
('SPL044', 'PT JALY INDONESIA UTAMA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL045', 'PT JAYASEGAR BERKAT MANDIRI\r\n\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL046', 'PT PENTA PRIMA GEMILANG\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL079', 'PT SEGORO INTERNASIONAL', 'PC-009', 'IBU PIA', 'JL SUCI NO.10 RT 001 RW 003 SUSUKAN CIRACAS', '021-29835944', '', 'Barang', 'Active'),
('SPL049', 'UD TANI \r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL050', 'VISTA JAYA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL051', 'TRUBUS\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL052', 'UD PASIFIC MENTARI\r\n\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL053', 'TUSIMA VENDOR\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL054', 'TOKO UTAMA PS JATINEGARA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL055', 'TOKO UTAMA JEMBATAN LIMA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL056', 'TOKO SINAR MANGGA DUA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL057', 'TOKO SETIA \r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL058', 'TOKO LARIS PS PETOKO\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL059', 'TOKO KELVIN\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL060', 'TOKO JEMBATAN LIMA', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL061', 'TOKO AMIN JATINEGARA\r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL062', 'PT. ACE HARDWARE \r\n', 'CL-006', 'Ibu Kristina', 'Jl. MT. Haryono Kav. 23 Rt 008 Rw 009 Tebet Timur Jakarta Selatan', 'HP. 081231454120', 'Chemical', 'Barang', 'Active'),
('SPL063', 'PT SEHO MAKMUR INDUSTRI', 'SS-002', 'IBU HERLINA', 'RULO KEBUN JERUK BARU BLOK A - 18 JL. ARJUNA SELATAN, JAKARTA BARAT 11530', '021-5349737', '', 'Barang', 'Active'),
('SPL064', 'PT MITRA JAYA PERSADA', 'TS-004', 'BPK WAWAN', 'JL. RAYA PENGGILINGAN NO. 16, RT 007 RW 001, CAKUNG BARAT, JAKARTA TIMUR', '085776715268', 'DISTRIBUTOR TISSUE TESSA UNTUK AREA JAKARTA UTARA, CAKUNG DAN BEKASI', 'Barang', 'Active'),
('SPL065', 'PT JERINDO JAYA ABADI', 'TS-006', 'IBU TITIN ', 'JL. RAYA SEDATI WARU, KOMP PERGUDANGAN 88 B.1 - B.23 KEL. PABEAN,KEC. SEDATI - SURABAYA', '081331494771', 'DISTRIBUTOR TISSUE LIVI UNTUK AREA SURABAYA', 'Barang', 'Active'),
('SPL066', 'PT UNIRAMA DUTA NIAGA', 'TS-007', 'IBU YAYUK', 'JL. KELAPA DUA WETAN NO. 09, KELAPA DUA WETAN, CIRACAS JAKARTA SELATAN', '081390404743', 'DISTRIBUTOR TISSUE LIVI UNTUK AREA SEMARANG', 'Barang', 'Active'),
('SPL067', 'PT AGUNG MANDIRI SENTOSA', 'TS-008', 'BPK SIGIT', 'RUKO PERMATA ANCOL BLOK I, JL. RE MARTADINATA, JAKARTA UTARA 14420', '08888958218', '', 'Barang', 'Active'),
('SPL068', 'JNI MITRAJAYA', 'CL-004', 'IBU RUSTY', 'JL. GREGES JAYA II KAV. 8B, A23 SURABAYA 60193', '081231740419', 'DISTRIBUTOR CHEMICAL JHONSON AREA SURABAYA', 'Barang', 'Active'),
('SPL069', 'CV. MAKMUR ABADI', 'CL-007', 'IBU DWEI', 'JL. GAJAH 68 B KEL, GAYAMSARI KEC, GAYAMSARI SEMARANG', '0817293832', '', 'Barang', 'Active'),
('SPL070', 'PT MATRA DUTA', 'TS-003', 'IBU NANIK', 'JL. LET JEND SUPRAPTO JAKARTA PUSAT', '08112906779', '', 'Barang', 'Active'),
('SPL071', 'UD SUMBER ARTHA LANGGENG', 'TS-011', 'IBU GRACIA', 'JL. RAYA DAAN MOGOT NO. 10 A, JAKARTA BARAT 11460', '08111894138', '', 'Barang', 'Active'),
('SPL072', 'PT ALIF KHADAFI INDONESIA', 'TS-016', 'BPK ANTON', 'JL. PAHLAWAN KOMP TAMAN JUANDA BLOK P2 NO. 10 RT 009 RW 004 KEL, DUREN JAYA, KEC. BEKASI TIMUR', '0813811115645', '', 'Barang', 'Active'),
('SPL075', 'PT GRAHA ESA', 'PC-004', 'BPK TRIADI', 'KOMPLEK GADING BUKIT INDAH BLOK TA 16 KELAPA GADING JAKARTA UTARA', '021-29451101', '', 'Barang', 'Active'),
('SPL077', 'PT DWIMITRA AGRITECH HUTAMA', 'PC-006', 'BPK IRVAN', 'JL TAMAN TEKNO BSD SEKTOR XI BLOK A/21, KEL. SETU KEC. SETU KOTA TANGERANG SELATAN', '021-755875390', '', 'Barang', 'Active'),
('SPL078', 'PT BENTZ JAZ INDONESIA', 'PC-007', 'BPK TAUFIK', 'KOMP RUKO GRAHA MAS BLOK B NO. 24 JL RAYA PERJUANGAN NO. 01 RT 003 JAKARTA BARAT', '021-5303770', '', 'Barang', 'Active'),
('SPL080', 'CV WINA MULYO LESTARI', 'PC-010', 'IBU WULAN', 'JL ANGKASA NO. 18 GD PELNI LT 3 KEL. GUNUNG SAHARI, KEMAYORAN JAKARTA PUSAT', '021-68787164', '', 'Barang', 'Active'),
('SPL081', 'PT PRAKARSA ZETA MANDIRI', 'PC-011', 'BPK AGUNG', 'VILLA MUTIARA PLUIT BLOK F NO. 3B RT 003 RW 009 KEL. PRIUK KEC PRIUK KOTA TANGERANG', '08128327876', '', 'Barang', 'Active'),
('SPL082', 'PT UICCP INDONESIA', 'DT-001', 'IBU IKA', 'RUKO NEW JASMINE BLOK HA 16 NO. 7-8 GADING SERPONG TANGERANG, BANTEN 15810', '021-22225070', '', 'Barang', 'Active'),
('SPL083', 'SUGI MANDIRI', 'PB-001', 'AYU', 'LTC Glodok GF 1 Blok 11 No.7', '021-62320061', '', 'Barang', 'Active'),
('SPL084', 'DEPOTEKNIK DUTA PERKAKAS', 'PB-002', 'MEY', '', '021-6255333', '', 'Part', 'Active'),
('SPL085', 'TOKO ARIES 167', 'PB-003', '', 'Jakarta', '021-6344524', '', 'Barang', 'Active'),
('SPL086', 'BIG BEN GROSIR', 'PB-004', '', 'Jakarta', '08561116918', '', 'Barang', 'Active'),
('SPL087', 'PT. MENTARI JASINDO SENTOSA', 'PB-005', 'IREN', 'Jl. Mangga Besar I No.165E, RT.10/RW.1, Mangga Besar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11180', '081316726782', '', 'Barang', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
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
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`kode_user`, `nama_user`, `telp_user`, `alamat_user`, `email_user`, `kelamin_user`, `username_user`, `password_user`, `status_user`, `user_group`, `jenis_user`) VALUES
('U0001', 'Administrator', '0812202090201', 'Jaksel', 'info@grabit.web.id', 'Wanita', 'admin', '0192023a7bbd73250516f069df18b500', 'Active', 1, 'Admin'),
('U0005', 'Yandi Syafitra', '', 'Jl. Griya Tirtayasa', '', 'Pria', 'Yandi', '81dc9bdb52d04dc20036dbd8313ed055', 'Active', 3, 'Teknisi'),
('U0006', 'Erni Sumirat', '', '', '', 'Wanita', 'erni', 'af6b3aa8c3fcd651674359f500814679', 'Active', 3, 'Teknisi'),
('U0007', 'M Taufik Akbar', '', '', '', 'Pria', 'taufik', '70f32b0989903de63dde4ea96d5d4000', 'Active', 3, 'Teknisi'),
('U0008', 'Nurcahyadi', '', '', '', 'Pria', 'Nurcahyadi', '53d951605e0267f7e10b5567c6644571', 'Active', 3, 'Teknisi'),
('U0009', 'Leonardus Ariondo', '', '', '', 'Pria', 'yudhi', '0c074ab2a292a45bf4b19f0786aa989a', 'Active', 3, 'Teknisi'),
('U0010', 'Ahmad Ahwan Natadiredja ', '021', 'Pusat', 'ahwan.natadiredja@prima.my.id', 'Pria', 'aan', '63ec5adac223d78919b0f2d759f9cd80', 'Active', 1, 'Admin'),
('U0011', 'Stevi Novianty', '021', 'Jl. Alaydrus No.62 A-B, RT.10/RW.2, Petojo Utara\r\nAddress Line 2', 'stevi.novianti@prima.my.id', 'Wanita', 'Stevi', '52653d337b7c196a49518110e50218f4', 'Active', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sys_akses`
--

CREATE TABLE `sys_akses` (
  `akses_id` int(4) NOT NULL,
  `akses_group` int(3) NOT NULL,
  `akses_submenu` int(3) NOT NULL,
  `akses_dibuat` datetime NOT NULL,
  `akses_diubah` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `sys_akses`
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
-- Table structure for table `sys_group`
--

CREATE TABLE `sys_group` (
  `group_id` int(3) NOT NULL,
  `group_nama` varchar(35) NOT NULL,
  `group_keterangan` text NOT NULL,
  `group_status` enum('Active','Non Active') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_group`
--

INSERT INTO `sys_group` (`group_id`, `group_nama`, `group_keterangan`, `group_status`) VALUES
(1, 'Administrator', '-', 'Active'),
(2, 'Approval', '', 'Active'),
(3, 'Teknisi', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
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
-- Dumping data for table `sys_menu`
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
-- Table structure for table `sys_submenu`
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
-- Dumping data for table `sys_submenu`
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
-- Table structure for table `tr_in`
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
-- Dumping data for table `tr_in`
--

INSERT INTO `tr_in` (`kode_in`, `tgl_in`, `kode_user`, `principal`, `keterangan_in`, `status_in`, `created_in`) VALUES
('2109080001', '2021-09-01', 'U0010', 'Purchasing', 'Stock Awal', 'Open', '2021-09-08 10:08:39'),
('2109100002', '2021-09-08', 'U0010', 'Purchasing', 'Pembelian Stock', 'Open', '2021-09-10 11:30:26'),
('2109100003', '2021-09-03', 'U0010', 'Purchasing', '', 'Open', '2021-09-10 10:55:00'),
('2109100004', '2021-09-02', 'U0010', 'Purchasing', 'Pembelian Stock', 'Open', '2021-09-10 10:42:54'),
('2108310001', '2021-08-31', 'U0001', 'Purchasing', '', 'Open', '2021-08-31 09:11:41'),
('2109100005', '2021-09-01', 'U0010', 'Purchasing', 'Stock Awal', 'Open', '2021-09-10 10:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `tr_in_item`
--

CREATE TABLE `tr_in_item` (
  `id` int(11) NOT NULL,
  `kode_in` char(10) NOT NULL,
  `id_barang` char(7) NOT NULL,
  `jumlah_in` int(10) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tr_in_item`
--

INSERT INTO `tr_in_item` (`id`, `kode_in`, `id_barang`, `jumlah_in`, `keterangan`) VALUES
(2, '1905050001', '23', 1, NULL),
(3, '1905050002', '23', 1, 'backup'),
(1387, '2109080001', '2106', 8, NULL),
(1386, '2109080001', '1946', 47, NULL),
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
(1108, '2002110006', '216', 1, NULL),
(1113, '2108310001', '1951', 5, NULL),
(1114, '2108310001', '1946', 1, NULL),
(1115, '2108310001', '1947', 10, NULL),
(1385, '2109080001', '1947', 40, NULL),
(1384, '2109080001', '1993', 3, NULL),
(1383, '2109080001', '1948', 5, NULL),
(1382, '2109080001', '1949', 38, NULL),
(1381, '2109080001', '1950', 4, NULL),
(1380, '2109080001', '1951', 68, NULL),
(1379, '2109080001', '1952', 74, NULL),
(1378, '2109080001', '1953', 15, NULL),
(1377, '2109080001', '1954', 9, NULL),
(1376, '2109080001', '1955', 150, NULL),
(1375, '2109080001', '1956', 8, NULL),
(1374, '2109080001', '1957', 14, NULL),
(1373, '2109080001', '1958', 7, NULL),
(1372, '2109080001', '1959', 22, NULL),
(1371, '2109080001', '1960', 16, NULL),
(1370, '2109080001', '1994', 3, NULL),
(1369, '2109080001', '1961', 12, NULL),
(1368, '2109080001', '1962', 49, NULL),
(1367, '2109080001', '1963', 33, NULL),
(1366, '2109080001', '1964', 6, NULL),
(1365, '2109080001', '1965', 23, NULL),
(1364, '2109080001', '1966', 30, NULL),
(1363, '2109080001', '1967', 13, NULL),
(1362, '2109080001', '1968', 4, NULL),
(1361, '2109080001', '1969', 14, NULL),
(1360, '2109080001', '2228', 26, NULL),
(1359, '2109080001', '2227', 44, NULL),
(1358, '2109080001', '1971', 2, NULL),
(1357, '2109080001', '1972', 29, NULL),
(1356, '2109080001', '1973', 14, NULL),
(1355, '2109080001', '1974', 237, NULL),
(1354, '2109080003', '1975', 38, NULL),
(1353, '2109080001', '1976', 12, NULL),
(1352, '2109080001', '1977', 26, NULL),
(1351, '2109080001', '1978', 16, NULL),
(1350, '2109080001', '1979', 6, NULL),
(1349, '2109080001', '1980', 2, NULL),
(1348, '2109080001', '1981', 2, NULL),
(1347, '2109080001', '1982', 16, NULL),
(1346, '2109080001', '1983', 16, NULL),
(1345, '2109080001', '1984', 1, NULL),
(1344, '2109080001', '1985', 1, NULL),
(1343, '2109080001', '1986', 11, NULL),
(1342, '2109080001', '1987', 9, NULL),
(1341, '2109080001', '1989', 5, NULL),
(1340, '2109080001', '1990', 5, NULL),
(1339, '2109080001', '1991', 17, NULL),
(1338, '2109080001', '1992', 2, NULL),
(1337, '2109080001', '1995', 4, NULL),
(1336, '2109080001', '1997', 1, NULL),
(1335, '2109080001', '1998', 5, NULL),
(1334, '2109080001', '2000', 11, NULL),
(1333, '2109080001', '2001', 9, NULL),
(1332, '2109080001', '2003', 44, NULL),
(1331, '2109080001', '2229', 35, NULL),
(1330, '2109080001', '2230', 13, NULL),
(1329, '2109080001', '2004', 29, NULL),
(1328, '2109080001', '2006', 11, NULL),
(1327, '2109080001', '2007', 1, NULL),
(1326, '2109080001', '2065', 2, NULL),
(1325, '2109080001', '2008', 144, NULL),
(1324, '2109080001', '2009', 65, NULL),
(1323, '2109080001', '2010', 80, NULL),
(1322, '2109080001', '2011', 6, NULL),
(1321, '2109080001', '2012', 47, NULL),
(1320, '2109080001', '2013', 112, NULL),
(1319, '2109080001', '2014', 115, NULL),
(1318, '2109080001', '2015', 30, NULL),
(1317, '2109080001', '2016', 650, NULL),
(1316, '2109080001', '2017', 150, NULL),
(1315, '2109080001', '2018', 5100, NULL),
(1314, '2109080001', '2021', 46, NULL),
(1313, '2109080001', '2022', 51, NULL),
(1312, '2109080001', '2023', 91, NULL),
(1311, '2109080001', '2024', 30, NULL),
(1310, '2109080001', '2025', 34, NULL),
(1309, '2109080001', '2026', 10, NULL),
(1308, '2109080001', '2027', 14, NULL),
(1307, '2109080001', '2028', 16, NULL),
(1306, '2109080001', '2029', 10, NULL),
(1305, '2109080001', '2030', 15, NULL),
(1304, '2109080001', '2235', 5, NULL),
(1303, '2109080001', '2236', 9, NULL),
(1302, '2109080001', '2032', 10, NULL),
(1301, '2109080001', '2033', 4, NULL),
(1300, '2109080001', '1987', 9, NULL),
(1299, '2109080001', '2041', 4, NULL),
(1298, '2109080001', '2044', 8, NULL),
(1297, '2109080001', '2046', 17, NULL),
(1296, '2109080001', '2047', 4, NULL),
(1295, '2109080001', '2050', 199, NULL),
(1294, '2109080001', '2051', 36, NULL),
(1293, '2109080001', '2052', 5, NULL),
(1292, '2109080001', '2054', 112, NULL),
(1291, '2109080001', '2055', 600, NULL),
(1290, '2109080001', '2056', 18, NULL),
(1289, '2109080001', '2057', 130, NULL),
(1288, '2109080001', '2058', 1600, NULL),
(1287, '2109080001', '2061', 10, NULL),
(1286, '2109080001', '2062', 7, NULL),
(1285, '2109080001', '2063', 9, NULL),
(1284, '2109080001', '2064', 2, NULL),
(1283, '2109080001', '2071', 5, NULL),
(1282, '2109080001', '2072', 12, NULL),
(1281, '2109080001', '2073', 2, NULL),
(1280, '2109080001', '2074', 2, NULL),
(1279, '2109080001', '2075', 24, NULL),
(1278, '2109080001', '2077', 3, NULL),
(1277, '2109080001', '2080', 31, NULL),
(1276, '2109080001', '2081', 51, NULL),
(1275, '2109080001', '2082', 39, NULL),
(1274, '2109080001', '2083', 19, NULL),
(1273, '2109080001', '2084', 71, NULL),
(1272, '2109080001', '2085', 15, NULL),
(1271, '2109080001', '2231', 16, NULL),
(1270, '2109080001', '2087', 13, NULL),
(1269, '2109080001', '2019', 18, NULL),
(1268, '2109080001', '2088', 3, NULL),
(1267, '2109080001', '2091', 1, NULL),
(1266, '2109080001', '2092', 44, NULL),
(1265, '2109080001', '2093', 4, NULL),
(1264, '2109080001', '2094', 8, NULL),
(1263, '2109080001', '2095', 13, NULL),
(1262, '2109080001', '2096', 6, NULL),
(1261, '2109080001', '2097', 5, NULL),
(1260, '2109080001', '2098', 1, NULL),
(1259, '2109080001', '2099', 7, NULL),
(1258, '2109080001', '2100', 2, NULL),
(1257, '2109080001', '2103', 13, NULL),
(1256, '2109080001', '2105', 4, NULL),
(1388, '2109080001', '2107', 29, NULL),
(1389, '2109080001', '2108', 10, NULL),
(1390, '2109080001', '2109', 25, NULL),
(1391, '2109080001', '2110', 15, NULL),
(1392, '2109080001', '2141', 12, NULL),
(1393, '2109080001', '2111', 9, NULL),
(1394, '2109080001', '2114', 7, NULL),
(1395, '2109080001', '2115', 10, NULL),
(1396, '2109080001', '2116', 7, NULL),
(1397, '2109080001', '2118', 18, NULL),
(1398, '2109080001', '2119', 9, NULL),
(1399, '2109080001', '2234', 12, NULL),
(1400, '2109080001', '2233', 10, NULL),
(1401, '2109080001', '2232', 1, NULL),
(1402, '2109080001', '2160', 1, NULL),
(1403, '2109080001', '2159', 9, NULL),
(1404, '2109080001', '2120', 75, NULL),
(1405, '2109080001', '2121', 43, NULL),
(1406, '2109080001', '2122', 12, NULL),
(1407, '2109080001', '2123', 22, NULL),
(1408, '2109080001', '2124', 30, NULL),
(1409, '2109080001', '2125', 23, NULL),
(1410, '2109080001', '2126', 7, NULL),
(1411, '2109080001', '2127', 42, NULL),
(1412, '2109080001', '2128', 71, NULL),
(1413, '2109080001', '2129', 3, NULL),
(1414, '2109080001', '2132', 1, NULL),
(1415, '2109080001', '2133', 3, NULL),
(1416, '2109080001', '2135', 12, NULL),
(1417, '2109080001', '2136', 37, NULL),
(1418, '2109080001', '2138', 33, NULL),
(1419, '2109080001', '2142', 4, NULL),
(1420, '2109080001', '2143', 1, NULL),
(1421, '2109100005', '2238', 41, NULL),
(1422, '2109100005', '2237', 19, NULL),
(1423, '2109100005', '2239', 9, NULL),
(1424, '2109100005', '2240', 7, NULL),
(1425, '2109100005', '2246', 7, NULL),
(1426, '2109100005', '2242', 1, NULL),
(1427, '2109100005', '2243', 2, NULL),
(1428, '2109100005', '2244', 1, NULL),
(1429, '2109100005', '2245', 5, NULL),
(1430, '2109100005', '2247', 3, NULL),
(1431, '2109100004', '1975', 2, NULL),
(1432, '2109100004', '2012', 60, NULL),
(1433, '2109100004', '2011', 84, NULL),
(1434, '2109100003', '1975', 45, NULL),
(1435, '2109100002', '2010', 50, NULL),
(1436, '2109100002', '2009', 125, NULL),
(1437, '2109100002', '2034', 3, NULL),
(1438, '2109100002', '2250', 3, NULL),
(1439, '2109100002', '2249', 30, NULL),
(1440, '2109100002', '2251', 1, NULL),
(1441, '2109100005', '2248', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_in_tmp`
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
-- Table structure for table `tr_out`
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
-- Dumping data for table `tr_out`
--

INSERT INTO `tr_out` (`kode_out`, `tgl_out`, `kode_user`, `keterangan_out`, `kode_customer`, `principal`, `kode_layanan`, `id_atm`, `kode_teknisi`, `ip_atm`, `file_csr`, `file_image_1`, `file_image_2`, `status_out`, `tgl_kembali`, `tgl_pengerjaan`, `tgl_pengiriman`, `created_out`, `nama_pengirim`, `nama_penerima`, `alamat_pelanggan`, `lokasi_pengerjaan`, `lokasi_lainnya`, `kategori_pengerjaan`, `status_pengarjaan`) VALUES
('2002040001', '2020-02-04', 'U0001', '', 'CU004', 'MHU Box', 'LY006', NULL, 'U0001', NULL, '', '', '', 'Open', NULL, NULL, '2020-02-03', '2020-02-04 11:50:04', 'Reva', '', 'Kebon Sirih', 'MOBILE BRANCH', '', '', NULL),
('2001100001', '2019-11-20', 'U0001', '', 'CU017', 'MHU Box', 'LY006', NULL, 'U0001', NULL, '', '', '', '', NULL, NULL, '2019-11-21', '2020-01-10 15:26:47', 'Reva', 'Bapak Gunawan', 'Jl. Sunset Road 168 - Bali', 'KANTOR CABANG', '', '', NULL),
('2002040003', '2020-02-04', 'U0001', '', 'CU003', 'MHU Box', 'LY005', NULL, 'U0001', NULL, '2002040003_NF265K0431 BANJARAN.jpeg', '2002040003_NF265K0431 BANJARAN.jpeg', '', '', NULL, NULL, '2020-02-03', '2020-02-04 12:05:01', 'REVA', 'HUSNI', '', 'KANTOR CABANG', '', '', NULL),
('2109140002', '2021-09-02', 'U0010', '', 'CU004', 'Purchasing', 'LY005', '', 'U0009', 'Sumanto', '', '', NULL, 'Close', '0000-00-00', '2021-09-02', NULL, '2021-09-14 08:08:00', NULL, NULL, 'Jl. Manis Kiri, Jati Uwu - Tanggerang', 'Dari Kantor Pusat', '', '', ''),
('2109140001', '2021-09-03', 'U0010', '', 'CU003', 'Purchasing', 'LY007', '', 'U0009', 'Burhan', '', '', NULL, 'Open', '0000-00-00', '2021-09-03', NULL, '2021-09-14 09:05:11', NULL, NULL, 'Jl. Selayar Blok D, No. 9 MM 2100 - Cibitung', 'Dari Kantor Pusat', '', '', ''),
('2109130002', '2021-09-02', 'U0010', '', 'CU005', 'Purchasing', 'LY006', '', 'U0008', 'Sugianto', '', '', NULL, 'Close', '0000-00-00', '2021-09-02', NULL, '2021-09-13 10:15:37', NULL, NULL, 'Jl. Raya Serang Km. 11 Bitung Jaya, Cikupa, Tangerang', 'Dari Kantor Pusat', '', '', ''),
('2109130003', '2021-09-02', 'U0010', '', 'CU012', 'Purchasing', 'LY013', '', 'U0009', 'Tri Wahyudi', '', '', NULL, 'Close', '0000-00-00', '0000-00-00', NULL, '2021-09-13 10:43:57', NULL, NULL, 'Jl. Ecopolis Cipta Raya Blok P 01 No.201 R, Boulevard\r\nPanongan Mekar Bakti, Panongan, Cikupa - Tangerang', 'Dari Kantor Pusat', '', '', ''),
('2111090001', '2021-11-09', 'U0001', '', 'CU003', 'Purchasing', 'LY007', '', 'U0009', 'Burhan', '', '', NULL, 'Open', '0000-00-00', '2021-11-09', NULL, '2021-11-09 14:23:15', NULL, NULL, '', 'Dari Kantor Pusat', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tr_out_item`
--

CREATE TABLE `tr_out_item` (
  `id` int(6) NOT NULL,
  `kode_out` char(10) NOT NULL,
  `id_barang` int(6) NOT NULL,
  `jumlah_out` int(10) NOT NULL,
  `keterangan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tr_out_item`
--

INSERT INTO `tr_out_item` (`id`, `kode_out`, `id_barang`, `jumlah_out`, `keterangan`) VALUES
(23, '2002040001', 1427, 1, NULL),
(19, '1908040001', 19, 1, NULL),
(22, '2001100001', 1426, 1, NULL),
(149, '2109140001', 2248, 1, NULL),
(25, '2002040003', 1426, 1, NULL),
(148, '2109140001', 1946, 2, NULL),
(147, '2109140001', 1955, 5, NULL),
(33, '2109130002', 2009, 15, NULL),
(34, '2109130002', 2010, 5, NULL),
(35, '2109130002', 1975, 36, NULL),
(36, '2109130002', 1947, 8, NULL),
(37, '2109130002', 2228, 8, NULL),
(38, '2109130003', 2011, 1, NULL),
(39, '2109130003', 2138, 1, NULL),
(40, '2109130003', 2136, 1, NULL),
(41, '2109130003', 1991, 1, NULL),
(42, '2109130003', 2057, 1, NULL),
(146, '2109140001', 1951, 1, NULL),
(145, '2109140001', 2084, 20, NULL),
(144, '2109140001', 1975, 33, NULL),
(143, '2109140001', 2014, 10, NULL),
(142, '2109140001', 2008, 20, NULL),
(141, '2109140001', 2009, 25, NULL),
(140, '2109140001', 2114, 5, NULL),
(139, '2109140001', 2058, 130, NULL),
(138, '2109140001', 2055, 100, NULL),
(137, '2109140001', 2228, 9, NULL),
(136, '2109140001', 2011, 30, NULL),
(135, '2109140001', 2015, 17, NULL),
(134, '2109140001', 2004, 12, NULL),
(133, '2109140001', 2107, 5, NULL),
(132, '2109140001', 2121, 21, NULL),
(131, '2109140001', 2118, 18, NULL),
(130, '2109140001', 2018, 675, NULL),
(129, '2109140002', 2009, 4, NULL),
(128, '2109140002', 1959, 4, NULL),
(127, '2109140002', 2228, 2, NULL),
(126, '2109140002', 1963, 3, NULL),
(125, '2109140002', 2050, 4, NULL),
(124, '2109140002', 1951, 1, NULL),
(123, '2109140002', 1946, 2, NULL),
(122, '2109140002', 1991, 1, NULL),
(121, '2109140002', 2054, 4, NULL),
(120, '2109140002', 1955, 4, NULL),
(119, '2109140002', 2084, 6, NULL),
(118, '2109140001', 1975, 4, NULL),
(117, '2109140001', 2075, 2, NULL),
(116, '2109140001', 2121, 5, NULL),
(115, '2109140001', 2109, 6, NULL),
(114, '2109140001', 2047, 3, NULL),
(113, '2109140001', 2120, 6, NULL),
(112, '2109140001', 2253, 6, NULL),
(111, '2109140001', 2004, 3, NULL),
(110, '2109140001', 2248, 1, NULL),
(109, '2109140001', 2014, 3, NULL),
(108, '2109140001', 2252, 2, NULL),
(150, '2111090001', 1946, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_out_tmp`
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
  MODIFY `id_barang` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2255;

--
-- AUTO_INCREMENT for table `sys_akses`
--
ALTER TABLE `sys_akses`
  MODIFY `akses_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `sys_group`
--
ALTER TABLE `sys_group`
  MODIFY `group_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1445;

--
-- AUTO_INCREMENT for table `tr_in_tmp`
--
ALTER TABLE `tr_in_tmp`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1526;

--
-- AUTO_INCREMENT for table `tr_out_item`
--
ALTER TABLE `tr_out_item`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tr_out_tmp`
--
ALTER TABLE `tr_out_tmp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
