-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2023 pada 08.45
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

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
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` varchar(100) NOT NULL,
  `nama_gallery` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama_gallery`, `ket`, `file`, `tgl_upload`) VALUES
('1e2f7a88-6f53-11ee-8d63-93f0fa14750d', 'Gallery 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', '4bd1b15d8b4de258de29b596b66051c6.jpg', '2023-10-21 06:14:00'),
('2854bf67-6f53-11ee-8d63-93f0fa14750d', 'Gallery 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', 'c83c86a26a3adc376ddc7f98e371ec54.jpeg', '2023-10-20 14:15:44'),
('32007824-6f53-11ee-8d63-93f0fa14750d', 'Gallery 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '683ad0c0698a718b7a800aea77fdeb78.jpg', '2023-10-20 14:16:00'),
('3c26117d-6f53-11ee-8d63-93f0fa14750d', 'Gallery 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '10b7305245ffcce4ed6a771849d7bda1.jpg', '2023-10-20 14:16:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`) VALUES
('f4099419-6f48-11ee-8d63-93f0fa14750d', 'budi s', 'L', 'Tabalonga', '2023-10-20', 'a', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 'Hair Design'),
('bbba07f5-6f55-11ee-8d63-93f0fa14750d', 'Haircut'),
('c16aaf50-6f55-11ee-8d63-93f0fa14750d', 'SPA'),
('c7eda182-6f55-11ee-8d63-93f0fa14750d', 'Nail Service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `no_hp`, `subject`, `pesan`) VALUES
('0a6fdcba-6f94-11ee-8d63-93f0fa14750d', 'hanif', '082157876921', 'aa', 'kk'),
('18631400-6f94-11ee-8d63-93f0fa14750d', 'hanif', '082157876921', 'aa', 'kk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
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
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `username`, `password`, `role`) VALUES
('e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'Syarif Firdaus', 'L', 'Tabalong', '2023-10-21', 'Handil Bakti', '081348286276', 'syarif26', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
('dioqoinda23w12e', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
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
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id_service`, `nama_service`, `id_kategori`, `biaya`, `durasi`, `file`) VALUES
('4225aafb-6fc8-11ee-8d63-93f0fa14750d', 'Service 3', 'c7eda182-6f55-11ee-8d63-93f0fa14750d', 500000, '1 jam', '8ec6722391ba3bb9b8e122e4b6d658a0.jpg'),
('46a261d9-6f57-11ee-8d63-93f0fa14750d', 'Service 2', 'c16aaf50-6f55-11ee-8d63-93f0fa14750d', 500000, '1 jam', '6328f5f31f25e319532993b371eb5493.jpg'),
('60eaae1d-6f4c-11ee-8d63-93f0fa14750d', 'Service 1', '51aea3ab-6f4c-11ee-8d63-93f0fa14750d', 300000, '1 jam', 'e178035b48c888cf0daf9974f71e5112.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` varchar(100) NOT NULL,
  `nama_testimoni` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `tgl_testimoni` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama_testimoni`, `ket`, `tgl_testimoni`) VALUES
('b0c997a6-6f54-11ee-8d63-93f0fa14750d', 'Budi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2023-10-20 14:27:31'),
('d1c3067e-6f54-11ee-8d63-93f0fa14750d', 'Andi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2023-10-20 14:27:38'),
('db3e13b1-6f54-11ee-8d63-93f0fa14750d', 'Zaid', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2023-10-20 14:27:54'),
('deb7f46e-6f54-11ee-8d63-93f0fa14750d', 'Rizal', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2023-10-20 14:27:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_transaksi`, `tgl_transaksi`, `id_service`, `bukti`, `status`, `tgl_booking`) VALUES
('28d58140-6fc8-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2106RZ6SM2023130510', '2023-10-21', '60eaae1d-6f4c-11ee-8d63-93f0fa14750d', '25bc13f971bb32c6563ecf9ae59fb5ec.pdf', 1, '2023-10-21'),
('29a80511-6fb2-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2103GUNA82023354110', '2023-10-21', '46a261d9-6f57-11ee-8d63-93f0fa14750d', 'd6498df15caeace09d1a3148b874201d.pdf', 4, '2023-10-21'),
('388ce021-6fd7-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2108M2N7E2023005310', '2023-10-21', '4225aafb-6fc8-11ee-8d63-93f0fa14750d', '549c8462fa5cff2338f78a1aaf7c56aa.pdf', 1, '2023-10-20'),
('507e07bb-6fc8-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2106DJQCX2023141110', '2023-10-21', '4225aafb-6fc8-11ee-8d63-93f0fa14750d', '6d011733fe3776996c018dfd3160a731.pdf', 1, '2023-10-20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
