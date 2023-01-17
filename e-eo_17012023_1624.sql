-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 09:23 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-eo`
--

-- --------------------------------------------------------

--
-- Table structure for table `modul_katagori`
--

CREATE TABLE `modul_katagori` (
  `id` int(11) NOT NULL,
  `nama_katagori` varchar(100) NOT NULL,
  `function` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `modul_katagori`
--

INSERT INTO `modul_katagori` (`id`, `nama_katagori`, `function`, `icon`, `order_by`) VALUES
(1, 'Administrator', 'administrator', '<i class="nc-icon nc-bank"></i>', 2),
(2, 'Master', 'master', '<i class="nc-icon nc-bank"></i>', 3),
(3, 'Transaksi', 'transaksi', '<i class="nc-icon nc-bank"></i>', 4),
(4, 'Report', 'report', '<i class="nc-icon nc-bank"></i>', 5),
(5, 'Dashboard', 'dashboard', '<i class="nc-icon nc-bank"></i>', 1),
(6, 'Logout', 'login/logout', '<i class="nc-icon nc-bank"></i>', 6);

-- --------------------------------------------------------

--
-- Table structure for table `modul_menu`
--

CREATE TABLE `modul_menu` (
  `id` int(11) NOT NULL,
  `id_katagori` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `function` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul_menu`
--

INSERT INTO `modul_menu` (`id`, `id_katagori`, `nama_menu`, `function`, `icon`, `order_by`) VALUES
(1, 2, 'Perusahaan', 'mstrperusahaan', '<i class="nc-icon nc-air-baloon"></i>', 0),
(2, 2, 'Jabatan', 'mstrjabatan', '<i class="nc-icon nc-album-2"></i>', 0),
(3, 2, 'Bank', 'mstrbank', '<i class="nc-icon nc-bold"></i>', 0),
(4, 2, 'Branch of Bank', 'mstrbranchbank', '<i class="nc-icon nc-bold"></i>', 0),
(5, 2, 'Rekening Bank', 'mstrrekbank', '<i class="nc-icon nc-bold"></i>', 0),
(6, 2, 'Rekening Bank Perusahaan', 'mstrrekbankcomp', '<i class="nc-icon nc-bold"></i>', 0),
(7, 2, 'Marketing', 'mstrmarketing', '<i class="nc-icon nc-bold"></i>', 0),
(8, 2, 'Jenis Kendaraan', 'mstrjeniskendaraan', '<i class="nc-icon nc-bold"></i>', 0),
(9, 2, 'Brand', 'mstrbrand', '<i class="nc-icon nc-bold"></i>', 0),
(10, 2, 'M-code', 'mstrmcode', '<i class="nc-icon nc-bold"></i>', 0),
(11, 2, 'Customer', 'mstrcustomer', '<i class="nc-icon nc-bold"></i>', 0),
(12, 2, 'Lokasi', 'mstrlokasi', '<i class="nc-icon nc-bold"></i>', 0),
(13, 2, 'Area', 'mstrarea', '<i class="nc-icon nc-bold"></i>', 0),
(14, 2, 'Jenis Project', 'mstrjenisproject', '<i class="nc-icon nc-bold"></i>', 0),
(15, 2, 'Barang Dekorasi', 'mstrbrgdekorasi', '<i class="nc-icon nc-bold"></i>', 0),
(16, 2, 'Jenis Dekorasi', 'mstrjenisdekorasi', '<i class="nc-icon nc-bold"></i>', 0),
(17, 2, 'Dekorasi', 'mstrdekorasi', '<i class="nc-icon nc-bold"></i>', 0),
(18, 2, 'Dekorasi Detail', 'mstrdekordetail', '<i class="nc-icon nc-bold"></i>', 0),
(19, 1, 'Role User', 'role', '<i class="nc-icon nc-album-2"></i>', 0),
(20, 2, 'Marketing Customer', 'mstrmarketingcustomer', '<i class="nc-icon nc-bold"></i>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_area`
--

CREATE TABLE `tbl_mstr_area` (
  `id` int(11) NOT NULL,
  `kode_area` varchar(50) NOT NULL,
  `nama_area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_bank`
--

CREATE TABLE `tbl_mstr_bank` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_bank`
--

INSERT INTO `tbl_mstr_bank` (`id`, `nama`) VALUES
(1, 'BCA'),
(2, 'Mandiri'),
(3, 'BRI'),
(5, 'Mega');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_branchbank`
--

CREATE TABLE `tbl_mstr_branchbank` (
  `id` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_branchbank`
--

INSERT INTO `tbl_mstr_branchbank` (`id`, `id_bank`, `nama`, `lokasi`) VALUES
(1, 1, 'BCA cabang Batununggal', 'Jl.Batununggal III/23'),
(2, 2, 'Mandiri Cabang  Sukarno Hatta', 'Jl.Sukarno Hatta'),
(3, 3, 'BRI Cabang Tegallega', 'Jl.Tegallega'),
(4, 1, 'Koppo edit', 'taman koppo'),
(5, 5, 'Mega Sudirman edit', 'Jl.Sudirman '),
(6, 3, 'BRi Dewi Sartika', 'Jl.Dewi Sartika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_brand`
--

CREATE TABLE `tbl_mstr_brand` (
  `id` int(11) NOT NULL,
  `kode_brand` varchar(50) NOT NULL,
  `nama_brand` varchar(100) NOT NULL,
  `id_jnskendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_brand`
--

INSERT INTO `tbl_mstr_brand` (`id`, `kode_brand`, `nama_brand`, `id_jnskendaraan`) VALUES
(1, 'WUL', 'Wuling', 2),
(2, 'HND', 'Honda', 2),
(3, 'SZK', 'Suzuki', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_brgdekorasi`
--

CREATE TABLE `tbl_mstr_brgdekorasi` (
  `id` int(11) NOT NULL,
  `kode_brgdekorasi` varchar(50) NOT NULL,
  `nama_brgdekorasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_customer`
--

CREATE TABLE `tbl_mstr_customer` (
  `id` int(11) NOT NULL,
  `kode_customer` varchar(50) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `nama_alias` varchar(100) NOT NULL,
  `alamat_customer` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `NPWP` varchar(25) NOT NULL,
  `alamat_NPWP` text NOT NULL,
  `nama_pic` varchar(50) NOT NULL,
  `no_hp_pic` varchar(15) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `email_pic` varchar(50) NOT NULL,
  `up_surat` varchar(50) NOT NULL,
  `jabatan_up_surat` int(11) NOT NULL,
  `email_up_surat` varchar(50) NOT NULL,
  `id_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_customer`
--

INSERT INTO `tbl_mstr_customer` (`id`, `kode_customer`, `nama_customer`, `nama_alias`, `alamat_customer`, `no_telp`, `NPWP`, `alamat_NPWP`, `nama_pic`, `no_hp_pic`, `id_jabatan`, `email_pic`, `up_surat`, `jabatan_up_surat`, `email_up_surat`, `id_brand`) VALUES
(1, 'WUL-MMSTBD', 'PT. MAJU GLOBAL MOTOR', 'Dealer Wuling MM - Setiabudi', 'Jl. Dr. Setiabudi No. 43, Pasteur Kec.Sukajadi Kota Bandung, Jawa Barat 40161', '(022) 588-23456', '1056665556555', 'Jl. Dr. Setiabudi No. 43, Pasteur Kec.Sukajadi Kota Bandung, Jawa Barat 40161', 'Ibu Christina', '0815656655', 3, 'christina@gmail.com', 'Anton', 4, 'anton@gmail.com', 1),
(2, 'SZK-SUTA', 'PT. Jaya Abadi Otomotif', 'Dealer Mobil Suzuki Soekarno Hatta', 'Jl. Soekarno Hatta 288', '022-98333334', '12345678', 'Jl.Griya Timur barat 222', 'Bpk.Dedi', '08312232323', 3, 'dedi@gmail.com', 'Ibu Ane', 2, 'ane@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_jabatan`
--

CREATE TABLE `tbl_mstr_jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_jabatan`
--

INSERT INTO `tbl_mstr_jabatan` (`id`, `nama`) VALUES
(1, 'Direktur'),
(2, 'Sekretaris Direksi edit'),
(3, 'Kepala Cabang'),
(4, 'Project Manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_jnskendaraan`
--

CREATE TABLE `tbl_mstr_jnskendaraan` (
  `id` int(11) NOT NULL,
  `kode_jenis` varchar(5) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_jnskendaraan`
--

INSERT INTO `tbl_mstr_jnskendaraan` (`id`, `kode_jenis`, `nama_jenis`) VALUES
(2, 'PC', 'Passangers Car'),
(3, 'CV', 'Comersil Cars-Truk     ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_lokasi`
--

CREATE TABLE `tbl_mstr_lokasi` (
  `id` int(11) NOT NULL,
  `kode_lokasi` varchar(50) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `alamat_lokasi` text NOT NULL,
  `telp_lokasi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_marketing`
--

CREATE TABLE `tbl_mstr_marketing` (
  `id` int(11) NOT NULL,
  `kode_marketing` varchar(10) NOT NULL,
  `nama_marketing` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_marketing`
--

INSERT INTO `tbl_mstr_marketing` (`id`, `kode_marketing`, `nama_marketing`, `id_jabatan`, `no_hp`, `email`) VALUES
(1, 'HRD-01', 'Hendra Tan', 4, '081223434343', 'hendra@gmail.com'),
(2, 'SDR-02', 'Sudirman Tjo', 3, '0821343433', 'dirman@gmail.com'),
(5, 'LINA-03', 'LIna Marlina', 2, '0811123232', 'lina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_marketingcustomer`
--

CREATE TABLE `tbl_mstr_marketingcustomer` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_marketing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_marketingcustomer`
--

INSERT INTO `tbl_mstr_marketingcustomer` (`id`, `id_customer`, `id_marketing`) VALUES
(1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_mcode`
--

CREATE TABLE `tbl_mstr_mcode` (
  `id` int(11) NOT NULL,
  `kode_mcode` varchar(10) NOT NULL,
  `nama_mcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_mcode`
--

INSERT INTO `tbl_mstr_mcode` (`id`, `kode_mcode`, `nama_mcode`) VALUES
(1, '021', 'M-Code 021'),
(2, '022', 'M-Code 022'),
(3, '023', 'M-Code 023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_perusahaan`
--

CREATE TABLE `tbl_mstr_perusahaan` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `alamat_npwp` text NOT NULL,
  `alamat_workshop` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_perusahaan`
--

INSERT INTO `tbl_mstr_perusahaan` (`id`, `kode`, `nama`, `npwp`, `alamat_npwp`, `alamat_workshop`, `no_telp`, `no_hp`, `email`, `penanggung_jawab`, `id_jabatan`) VALUES
(6, '019029102', 'Perusahaan A edit', '09302.3209302.321', 'Jl. Sukasari 2988, bandung', 'Jl.Peta  78 BKR bandung', '022-87891111', '08123434343', 'perusahaana@gmail.com', 'Bpk Darmadji', 1),
(7, 'ttt', 'ddd edit', '555 ediy', 'hhhh edit', 'hhhh ', '02289999898', '0812323232323', 't@gmail.com', 'rr', 2),
(8, 'ss', 'ter', '777', 'tes456', '', '', '', '', '', 2),
(9, 'dd', 'namad edit', '90833 2', 'alamat tes d edit2', '', '', '', '', '', 2),
(10, 'coba', 'coba saja', '8999292', 'jl.coba', 'jl.coba2', '454545', '34344', 'a@gmail.com', 'rrtt', 1),
(11, 'teten', 'Perusahana teten', '90022222', 'tes jln', 'tes juga', '0225656565', '08172323232', 'tes@gmail.com', 'Bpk Corenl Simanjuntak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_project`
--

CREATE TABLE `tbl_mstr_project` (
  `id` int(11) NOT NULL,
  `kode_project` varchar(5) NOT NULL,
  `nama_project` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_rekening_perusahaan`
--

CREATE TABLE `tbl_mstr_rekening_perusahaan` (
  `id` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_rek_bankbranch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_rekening_perusahaan`
--

INSERT INTO `tbl_mstr_rekening_perusahaan` (`id`, `id_perusahaan`, `id_rek_bankbranch`) VALUES
(1, 6, 3),
(2, 9, 2),
(3, 8, 3),
(4, 7, 1),
(5, 10, 8),
(6, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mstr_rek_bankbranch`
--

CREATE TABLE `tbl_mstr_rek_bankbranch` (
  `id` int(11) NOT NULL,
  `id_branchbank` int(11) NOT NULL,
  `no_rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mstr_rek_bankbranch`
--

INSERT INTO `tbl_mstr_rek_bankbranch` (`id`, `id_branchbank`, `no_rekening`) VALUES
(1, 1, '115622248999'),
(2, 2, '26626333445889'),
(3, 1, '7777799965'),
(6, 5, '66777755555'),
(7, 1, '22222311334'),
(8, 6, '89965555111');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_bankbranch`
--
CREATE TABLE `view_bankbranch` (
`id` int(11)
,`nama` varchar(100)
,`nama_bank` varchar(50)
,`lokasi` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_bankbranch2`
--
CREATE TABLE `view_bankbranch2` (
`id` int(11)
,`id_bank` int(11)
,`nama` varchar(100)
,`nama_bank` varchar(50)
,`lokasi` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rekeningbankcabang`
--
CREATE TABLE `view_rekeningbankcabang` (
`id` int(11)
,`nama_bank` varchar(50)
,`id_branchbank` int(11)
,`nama_bankcabang` varchar(100)
,`no_rekening` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rekeningperusahaan`
--
CREATE TABLE `view_rekeningperusahaan` (
`id` int(11)
,`id_perusahaan` int(11)
,`id_rek_bankbranch` int(11)
,`nama` varchar(100)
,`nama_bank` varchar(50)
,`nama_bankcabang` varchar(100)
,`no_rekening` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_bankbranch`
--
DROP TABLE IF EXISTS `view_bankbranch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bankbranch`  AS  select `tbl_mstr_branchbank`.`id` AS `id`,`tbl_mstr_branchbank`.`nama` AS `nama`,`tbl_mstr_bank`.`nama` AS `nama_bank`,`tbl_mstr_branchbank`.`lokasi` AS `lokasi` from (`tbl_mstr_branchbank` join `tbl_mstr_bank` on((`tbl_mstr_branchbank`.`id_bank` = `tbl_mstr_bank`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_bankbranch2`
--
DROP TABLE IF EXISTS `view_bankbranch2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bankbranch2`  AS  select `tbl_mstr_branchbank`.`id` AS `id`,`tbl_mstr_branchbank`.`id_bank` AS `id_bank`,`tbl_mstr_branchbank`.`nama` AS `nama`,`tbl_mstr_bank`.`nama` AS `nama_bank`,`tbl_mstr_branchbank`.`lokasi` AS `lokasi` from (`tbl_mstr_branchbank` join `tbl_mstr_bank` on((`tbl_mstr_branchbank`.`id_bank` = `tbl_mstr_bank`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_rekeningbankcabang`
--
DROP TABLE IF EXISTS `view_rekeningbankcabang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rekeningbankcabang`  AS  select `tbl_mstr_rek_bankbranch`.`id` AS `id`,`tbl_mstr_bank`.`nama` AS `nama_bank`,`tbl_mstr_rek_bankbranch`.`id_branchbank` AS `id_branchbank`,`tbl_mstr_branchbank`.`nama` AS `nama_bankcabang`,`tbl_mstr_rek_bankbranch`.`no_rekening` AS `no_rekening` from ((`tbl_mstr_rek_bankbranch` join `tbl_mstr_branchbank` on((`tbl_mstr_rek_bankbranch`.`id_branchbank` = `tbl_mstr_branchbank`.`id`))) join `tbl_mstr_bank` on((`tbl_mstr_branchbank`.`id_bank` = `tbl_mstr_bank`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_rekeningperusahaan`
--
DROP TABLE IF EXISTS `view_rekeningperusahaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rekeningperusahaan`  AS  select `a`.`id` AS `id`,`a`.`id_perusahaan` AS `id_perusahaan`,`a`.`id_rek_bankbranch` AS `id_rek_bankbranch`,`b`.`nama` AS `nama`,`e`.`nama` AS `nama_bank`,`d`.`nama` AS `nama_bankcabang`,`c`.`no_rekening` AS `no_rekening` from ((((`tbl_mstr_rekening_perusahaan` `a` join `tbl_mstr_perusahaan` `b` on((`a`.`id_perusahaan` = `b`.`id`))) join `tbl_mstr_rek_bankbranch` `c` on((`a`.`id_rek_bankbranch` = `c`.`id`))) join `tbl_mstr_branchbank` `d` on((`c`.`id_branchbank` = `d`.`id`))) join `tbl_mstr_bank` `e` on((`d`.`id_bank` = `e`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modul_katagori`
--
ALTER TABLE `modul_katagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul_menu`
--
ALTER TABLE `modul_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_area`
--
ALTER TABLE `tbl_mstr_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_bank`
--
ALTER TABLE `tbl_mstr_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_branchbank`
--
ALTER TABLE `tbl_mstr_branchbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_brand`
--
ALTER TABLE `tbl_mstr_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_brgdekorasi`
--
ALTER TABLE `tbl_mstr_brgdekorasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_customer`
--
ALTER TABLE `tbl_mstr_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_jabatan`
--
ALTER TABLE `tbl_mstr_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_jnskendaraan`
--
ALTER TABLE `tbl_mstr_jnskendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_lokasi`
--
ALTER TABLE `tbl_mstr_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_marketing`
--
ALTER TABLE `tbl_mstr_marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_marketingcustomer`
--
ALTER TABLE `tbl_mstr_marketingcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_mcode`
--
ALTER TABLE `tbl_mstr_mcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_perusahaan`
--
ALTER TABLE `tbl_mstr_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_project`
--
ALTER TABLE `tbl_mstr_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_rekening_perusahaan`
--
ALTER TABLE `tbl_mstr_rekening_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mstr_rek_bankbranch`
--
ALTER TABLE `tbl_mstr_rek_bankbranch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modul_katagori`
--
ALTER TABLE `modul_katagori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `modul_menu`
--
ALTER TABLE `modul_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_mstr_area`
--
ALTER TABLE `tbl_mstr_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mstr_bank`
--
ALTER TABLE `tbl_mstr_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_mstr_branchbank`
--
ALTER TABLE `tbl_mstr_branchbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_mstr_brand`
--
ALTER TABLE `tbl_mstr_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_mstr_brgdekorasi`
--
ALTER TABLE `tbl_mstr_brgdekorasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mstr_customer`
--
ALTER TABLE `tbl_mstr_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mstr_jabatan`
--
ALTER TABLE `tbl_mstr_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_mstr_jnskendaraan`
--
ALTER TABLE `tbl_mstr_jnskendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mstr_lokasi`
--
ALTER TABLE `tbl_mstr_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mstr_marketing`
--
ALTER TABLE `tbl_mstr_marketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_mstr_marketingcustomer`
--
ALTER TABLE `tbl_mstr_marketingcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_mstr_mcode`
--
ALTER TABLE `tbl_mstr_mcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_mstr_perusahaan`
--
ALTER TABLE `tbl_mstr_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_mstr_project`
--
ALTER TABLE `tbl_mstr_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mstr_rekening_perusahaan`
--
ALTER TABLE `tbl_mstr_rekening_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_mstr_rek_bankbranch`
--
ALTER TABLE `tbl_mstr_rek_bankbranch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
