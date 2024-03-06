-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 03:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` varchar(100) NOT NULL,
  `nama_gallery` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama_gallery`, `ket`, `file`, `tgl_upload`) VALUES
('2854bf67-6f53-11ee-8d63-93f0fa14750d', 'Creambath', 'Jasa creambath ini menyegarkan rambut kering sehingga kilau alami dan rambut terasa lebih sehat.', 'c83c86a26a3adc376ddc7f98e371ec54.jpeg', '2023-12-03 14:32:18'),
('32007824-6f53-11ee-8d63-93f0fa14750d', 'Catok & Cuci', 'Jasa catok untuk tampilan rambut rapi dan stylish. Hasil cepat dan tahan lama.', '683ad0c0698a718b7a800aea77fdeb78.jpg', '2023-12-03 14:34:19'),
('3c26117d-6f53-11ee-8d63-93f0fa14750d', 'Menicure', 'Jasa manicure ini menghadirkan kelembutan pada tangan Anda dengan perawatan teliti.', '10b7305245ffcce4ed6a771849d7bda1.jpg', '2023-12-03 14:29:57'),
('bce15815-91e9-11ee-a7c1-704d7b67aaac', 'Eyelash Extension', 'Jasa eyelash ini menciptakan mata memukau dengan ekstensi bulu mata yang indah dan hasil natural', 'b302c5bcff069096bc2fcc5d79014ea9.jpg', '2023-12-03 14:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`) VALUES
('a0506332-8c23-11ee-bfa4-704d7b67aaac', 'Ilma Ilana', '--', 'Batam', '1999-10-12', 'Tanjung Uban', '087521456496'),
('cc6bc220-8c23-11ee-bfa4-704d7b67aaac', 'Tree Evryanti', 'P', 'Tanjung Pinang', '1994-12-25', 'Teluk Sasah', '08121565156'),
('f2c0ab40-8c23-11ee-bfa4-704d7b67aaac', 'Surya Miranti', 'P', 'Kawal', '1992-09-12', 'Sungai Kecil', '08126419684'),
('f4099419-6f48-11ee-8d63-93f0fa14750d', 'Nina Firda', 'P', 'Tanjung Pinang', '1995-02-20', 'Tanjung Permai', '081245863547');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('00c82ed7-8c23-11ee-bfa4-704d7b67aaac', 'Pedicure'),
('51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 'Eyelash Extentsion'),
('bbba07f5-6f55-11ee-8d63-93f0fa14750d', 'Lashlift'),
('c16aaf50-6f55-11ee-8d63-93f0fa14750d', 'Hair Treatment'),
('c7eda182-6f55-11ee-8d63-93f0fa14750d', 'Body Treatment'),
('cca5c67a-8c22-11ee-bfa4-704d7b67aaac', 'Nail Art'),
('cfb74822-8c22-11ee-bfa4-704d7b67aaac', 'Waxing'),
('fe9f0cb4-8c22-11ee-bfa4-704d7b67aaac', 'Menicure');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `no_hp`, `subject`, `pesan`) VALUES
('794a0ad3-9efd-11ee-a091-e8f40802874d', 'Test', '09870708709', 'Komplain', 'test'),
('7e8d5d3e-91ea-11ee-a7c1-704d7b67aaac', 'Amira', '085421654651', 'Nice', 'Terimakasih');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `username`, `password`, `role`) VALUES
('10d7c418-8c26-11ee-bfa4-704d7b67aaac', 'Briza', 'P', 'Batam', '2023-11-26', 'Batam', '02160515', 'Briza', 'ce3aae8bb11fa7e2fecea21b4bd3b927', 1),
('b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'Ferdy', 'L', 'Tanjung Pinang', '2001-11-19', 'Tanjung Permai', '081245863547', 'Ferdy', '25edb9a3d0a91e2732a71d20c2b38f58', 1),
('e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'Syarif Firdaus', 'L', 'Tabalong', '2023-10-21', 'Handil Bakti', '081348286276', 'syarif26', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
('dioqoinda23w12e', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` varchar(100) NOT NULL,
  `nama_service` varchar(100) NOT NULL,
  `id_kategori` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  `durasi` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `nama_service`, `id_kategori`, `biaya`, `durasi`, `file`) VALUES
('01e6459d-91eb-11ee-a7c1-704d7b67aaac', 'Waxing Brazillian', 'cfb74822-8c22-11ee-bfa4-704d7b67aaac', 250000, '30 Menit', 'ca3869f27bc994242cd5cbe9b6a8e079.jpg'),
('07a3c267-91ec-11ee-a7c1-704d7b67aaac', 'Ear Candle', 'c7eda182-6f55-11ee-8d63-93f0fa14750d', 50000, '30 Menit', 'cc406647c06f08fea6c8b5afef7b9674.jpg'),
('09d76ddf-91ee-11ee-a7c1-704d7b67aaac', 'Russian Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 255000, '1 Jam', '5584cf323ea816f74ad42d61bd981a03.jpg'),
('14f2206b-91ed-11ee-a7c1-704d7b67aaac', 'Nails Extension', 'cca5c67a-8c22-11ee-bfa4-704d7b67aaac', 100000, '1 Jam', '4b74cc3c1d2655df17bf1937aed9a4b2.jpg'),
('152d96ab-91eb-11ee-a7c1-704d7b67aaac', 'Waxing Full Kaki', 'cfb74822-8c22-11ee-bfa4-704d7b67aaac', 270000, '30 Menit', '5c1fa12f3294f831787a069494718b98.jpg'),
('17979044-91ee-11ee-a7c1-704d7b67aaac', 'Wispey Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 135000, '1 Jam', '771d1efa2db3a0b3d93ffffd1dc51d3b.jpg'),
('2015dedb-91ec-11ee-a7c1-704d7b67aaac', 'Hand Scrub', 'c7eda182-6f55-11ee-8d63-93f0fa14750d', 40000, '30 Menit', '6e334a339a7f904bb592ee2c29cc483f.jpg'),
('2497f041-91ed-11ee-a7c1-704d7b67aaac', 'Fake Nails', 'cca5c67a-8c22-11ee-bfa4-704d7b67aaac', 50000, '1 Jam', '4a5c2b0f046914617d884ea902fdda54.jpg'),
('2a7cd51f-8c25-11ee-bfa4-704d7b67aaac', 'Doll Eye Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 120000, '1 Jam', 'd78e350e2b77be7f2153c92fe79262a4.jpg'),
('2c2bf835-91eb-11ee-a7c1-704d7b67aaac', 'Waxing Full Tangan', 'cfb74822-8c22-11ee-bfa4-704d7b67aaac', 150000, '30 Menit', 'cb58aaf23cf3db10d30ab564d65a7db7.jpg'),
('3a65586e-91eb-11ee-a7c1-704d7b67aaac', 'Waxing Ketiak', 'cfb74822-8c22-11ee-bfa4-704d7b67aaac', 50000, '30 Menit', '894c11679b495f9f2b775c0f73845d29.jpg'),
('4d682909-91eb-11ee-a7c1-704d7b67aaac', 'Waxing Perut', 'cfb74822-8c22-11ee-bfa4-704d7b67aaac', 80000, '30 Menit', '4f4c4a479c42747f359dc955fb1beb87.jpg'),
('5776d4f2-91ed-11ee-a7c1-704d7b67aaac', 'Basic Lashlift', 'bbba07f5-6f55-11ee-8d63-93f0fa14750d', 60000, '30 Menit', '9014c9c64be404934fed0ec4efc49761.jpg'),
('5b5f7cc8-8c26-11ee-bfa4-704d7b67aaac', 'Catok', 'c16aaf50-6f55-11ee-8d63-93f0fa14750d', 50000, '1 jam', 'c9fb69a41074fb87e8d389b90c784764.jpg'),
('610c7712-91ec-11ee-a7c1-704d7b67aaac', 'Hair Spa', 'c16aaf50-6f55-11ee-8d63-93f0fa14750d', 100000, '1.5 jam', 'e94a855556d71ebe0140c23d671e41a7.jpg'),
('6aadf0f0-91ed-11ee-a7c1-704d7b67aaac', 'Lashlift Tint & Keratin', '--Pilih kategori--', 80000, '1 Jam', '7d00a80bfba6d0e9cee49bd13884ba84.jpg'),
('790e556d-8c26-11ee-bfa4-704d7b67aaac', 'Cuci & Catok', 'c16aaf50-6f55-11ee-8d63-93f0fa14750d', 55000, '1.5 jam', '7308c85ca1d558203819d72003d244a9.jpg'),
('8d7bd209-8c26-11ee-bfa4-704d7b67aaac', 'Creambath', 'c16aaf50-6f55-11ee-8d63-93f0fa14750d', 70000, '1 jam', 'cc2e30372f59e8e148e48e97ff40e4cb.jpg'),
('933c8ce4-8c24-11ee-bfa4-704d7b67aaac', 'Cat Eye Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 90000, '1.5 jam', 'd84b9fa5217c142c1ca63c297a515748.jpg'),
('969a42b8-91ed-11ee-a7c1-704d7b67aaac', 'Natural Lashes', 'bbba07f5-6f55-11ee-8d63-93f0fa14750d', 120000, '1 Jam', 'ecdc4e7768a17e0de0bb2a617f53c7f8.jpg'),
('9a5a57c4-8c25-11ee-bfa4-704d7b67aaac', 'Double Lashes', '--Pilih kategori--', 100000, '1 jam', '3323971eb98a14e9e3fb16376f4daf46.jpg'),
('a393caa9-91ed-11ee-a7c1-704d7b67aaac', 'Bloom Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 165000, '1 Jam', 'e2131aa8de06553cc531ac7f0c2cfddb.jpg'),
('a5a44ec0-91eb-11ee-a7c1-704d7b67aaac', 'Menicure', 'fe9f0cb4-8c22-11ee-bfa4-704d7b67aaac', 70000, '1 jam', 'd0b33471d69853a67d524dd1d5e0e984.jpg'),
('ab3b69ae-8c25-11ee-bfa4-704d7b67aaac', 'Double Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 100000, '1 jam', '3855681076079a8060dd878528e1b281.jpg'),
('b1049891-91ed-11ee-a7c1-704d7b67aaac', 'Brown Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 125000, '1 Jam', 'b4d65283b7b457795c7a95f568a2dfe4.jpg'),
('b514fb88-91eb-11ee-a7c1-704d7b67aaac', 'Pedicure', '00c82ed7-8c23-11ee-bfa4-704d7b67aaac', 80000, '1 jam', 'd641beb01c7d1d9a09bd451a8c30a98d.jpg'),
('c0fef3a6-91ed-11ee-a7c1-704d7b67aaac', 'Double Brown Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 165000, '1 Jam', '12f2cfff0a8b1c09e7c34cfd501f84c3.jpg'),
('cb57cbe9-91ec-11ee-a7c1-704d7b67aaac', 'Nail Art Gel Polos', 'cca5c67a-8c22-11ee-bfa4-704d7b67aaac', 80000, '1 Jam', '1134f989d010dae73afd2155abd33b02.jpg'),
('d3ca24b4-91ed-11ee-a7c1-704d7b67aaac', 'Double WIspey Lashes', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 170000, '1 Jam', '302c66a36ba27613173e40882c9782a9.jpg'),
('dd9286f8-91ec-11ee-a7c1-704d7b67aaac', 'Nailart Gel Halal', 'cca5c67a-8c22-11ee-bfa4-704d7b67aaac', 90000, '1 Jam', 'bfd894131767e1919772a31978f3b681.jpg'),
('eb727c66-91ed-11ee-a7c1-704d7b67aaac', 'Remover', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 50000, '30 Menit', '65351e82c7a9cb969185b0940eeacebf.jpg'),
('f0fd1762-91ec-11ee-a7c1-704d7b67aaac', 'Nailart Gel Color & Art', 'cca5c67a-8c22-11ee-bfa4-704d7b67aaac', 90000, '1 Jam', '611a2f2ce99a24e2a07c85faaca6dc23.jpg'),
('fc1804d0-91ed-11ee-a7c1-704d7b67aaac', 'Retouch', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 50000, '30 Menit', '9e50cb35efea593cd03115391b603fc7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` varchar(100) NOT NULL,
  `nama_testimoni` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `tgl_testimoni` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama_testimoni`, `ket`, `tgl_testimoni`) VALUES
('b0c997a6-6f54-11ee-8d63-93f0fa14750d', 'Ika', ' \"Wow! Saya benar-benar terkesan dengan pengalaman waxing di sini. Prosesnya cepat dan higienis, dan', '2023-12-03 14:21:14'),
('d1c3067e-6f54-11ee-8d63-93f0fa14750d', 'Ica', '\"Saya sangat senang dengan hasil eyelash extension dari jasa ini! Para ahli di sini benar-benar meng', '2023-12-03 14:20:14'),
('db3e13b1-6f54-11ee-8d63-93f0fa14750d', 'Dini', '\"Saya benar-benar terkesan dengan hasil dari jasa hair treatment ini. Rambut saya yang sebelumnya ke', '2023-12-03 14:19:36'),
('deb7f46e-6f54-11ee-8d63-93f0fa14750d', 'Arimbi', '\"Saya sangat senang dengan pelayanan dari jasa nail art ini! Mereka tidak hanya mahir dalam mencipta', '2023-12-03 14:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_service` varchar(100) NOT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `tgl_booking` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_transaksi`, `tgl_transaksi`, `id_service`, `bukti`, `status`, `tgl_booking`) VALUES
('1ccbd0b9-8c26-11ee-bfa4-704d7b67aaac', '10d7c418-8c26-11ee-bfa4-704d7b67aaac', 'BS2607PN1Z82023362111', '2023-11-26', '2a7cd51f-8c25-11ee-bfa4-704d7b67aaac', NULL, 1, '2023-11-28'),
('27a1e5ad-9908-11ee-8f1d-704d7b67aaac', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS1205RN5CU2023043912', '2023-12-12', '5b5f7cc8-8c26-11ee-bfa4-704d7b67aaac', '47b2715c81446453ce2c6679b4a1179a.jpg', 2, '2023-12-31'),
('28d58140-6fc8-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2106RZ6SM2023130510', '2023-10-21', '60eaae1d-6f4c-11ee-8d63-93f0fa14750d', '25bc13f971bb32c6563ecf9ae59fb5ec.pdf', 1, '2023-10-21'),
('29a80511-6fb2-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2103GUNA82023354110', '2023-10-21', '46a261d9-6f57-11ee-8d63-93f0fa14750d', 'd6498df15caeace09d1a3148b874201d.pdf', 4, '2023-10-21'),
('388ce021-6fd7-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2108M2N7E2023005310', '2023-10-21', '4225aafb-6fc8-11ee-8d63-93f0fa14750d', '549c8462fa5cff2338f78a1aaf7c56aa.pdf', 1, '2023-10-20'),
('507e07bb-6fc8-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2106DJQCX2023141110', '2023-10-21', '4225aafb-6fc8-11ee-8d63-93f0fa14750d', '6d011733fe3776996c018dfd3160a731.pdf', 1, '2023-10-20'),
('85742409-9efd-11ee-a091-e8f40802874d', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS2007QYMPI2023033912', '2023-12-20', '2497f041-91ed-11ee-a7c1-704d7b67aaac', NULL, 0, '2023-12-21'),
('a1db837b-98e7-11ee-8f1d-704d7b67aaac', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS1201U6A4J2023115112', '2023-12-12', '01e6459d-91eb-11ee-a7c1-704d7b67aaac', '4fe78f1188c37c3ba3d234aaf7e4fe13.jpg', 2, '2023-12-16'),
('fd7fcaaa-9a81-11ee-8a70-704d7b67aaac', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS1402KANUV2023091812', '2023-12-14', '17979044-91ee-11ee-a7c1-704d7b67aaac', NULL, 0, '2023-12-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
