-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 12:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `recaptcha` varchar(5) NOT NULL,
  `theme` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `timezone`, `recaptcha`, `theme`) VALUES
(1, 'Dnato System Login', 'Asia/Makassar', 'no', 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailpemesanan`
--

CREATE TABLE `tb_detailpemesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tinggi_dipesan` decimal(10,2) NOT NULL,
  `lebar_dipesan` decimal(10,2) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga_satuan` varchar(20) DEFAULT NULL,
  `subtotal` varchar(20) DEFAULT NULL,
  `status_pemesanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detailpemesanan`
--

INSERT INTO `tb_detailpemesanan` (`id_detail`, `id_pemesanan`, `id_produk`, `tinggi_dipesan`, `lebar_dipesan`, `kuantitas`, `harga_satuan`, `subtotal`, `status_pemesanan`) VALUES
(78, 60, 34, '2.40', '2.00', 1, '10.560.000', '16260000', 'proses'),
(79, 60, 35, '1.00', '3.00', 1, '5.700.000', '16260000', 'proses'),
(80, 61, 34, '2.40', '2.00', 4, '10.560.000', '53640000', 'selesai'),
(81, 61, 35, '1.00', '3.00', 2, '5.700.000', '53640000', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `id_produk`, `nama_foto`) VALUES
(20, 24, '4cfbsnBLw3oFqpuO.jpg'),
(21, 25, 'NuJv6FQiDlM8rLZo.jpg'),
(22, 26, 'JK9irs5uCyEQIYDd.jpg'),
(23, 26, 'WmaD2j1FHzxv4S6T.jpg'),
(24, 28, 'zA3wimj8LQ2WonsY.jpg'),
(25, 28, '8DVdpgoURG1enqJ2.jpg'),
(26, 28, '2z6OGN4ZBbFiqY0s.jpg'),
(27, 29, '86BMdEIruvc0nNHi.jpg'),
(28, 29, 'c49rfsxSt7i3g0pq.jpg'),
(29, 29, 'G2DlY5oQfOtWL93U.jpg'),
(30, 30, '7TmDlnO1kJ0bNRVA.jpg'),
(31, 30, 'Gy8u5VOH27Ihtrxa.jpg'),
(32, 31, 'rMaPbWxVkKoS5j0Y.jpg'),
(33, 31, 'CArWzl7ZPBXOw2DU.jpg'),
(34, 31, 'fFkX6JIy5csl8vue.jpg'),
(35, 31, 'PDTajJvH3QfNlCI4.jpg'),
(36, 31, '6ecNCVFIjpwBHAKb.jpg'),
(37, 31, 'gdh9bJ04LCoTWwma.jpg'),
(38, 31, '6Pho2LgCdx3v5MSR.jpg'),
(39, 31, 'orIPMbNTcy4AS83i.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tinggi_dipesan` decimal(10,2) NOT NULL,
  `lebar_dipesan` decimal(10,2) NOT NULL,
  `harga_dipesan` varchar(20) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_pemesanan` datetime DEFAULT NULL,
  `total_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_pelanggan`, `tgl_pemesanan`, `total_bayar`) VALUES
(60, 8, '2024-02-15 11:37:21', '16.560.000'),
(61, 8, '2024-02-15 12:27:30', '53.940.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `harga_permeter` decimal(10,2) DEFAULT NULL,
  `tinggi` decimal(10,2) DEFAULT NULL,
  `lebar` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto_brg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_brg`, `jenis_brg`, `deskripsi`, `harga`, `harga_permeter`, `tinggi`, `lebar`, `stok`, `foto_brg`) VALUES
(34, 'Lemari Pakaian', 'Lemari', 'awdawd', '10.560.000', '2200000.00', '2.40', '2.00', 1, 'q2lteum0bK3XNJ5H.jpg'),
(35, 'Kitchen Set', 'kitchen set', 'wwda', '5.700.000', '1900000.00', '1.00', '3.00', 1, 'kgC93TjZf8lvwy7p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `banned_users` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `alamat`, `no_hp`, `role`, `password`, `last_login`, `status`, `banned_users`) VALUES
(1, 'admin@gmail.com', 'Admin', 'Admin', '-', '0', '1', 'sha256:1000:UJxHaaFpM44Bj1ka7U58GiSHUx3zRWid:Hq86/PHYj0utJLz2ciHzSehsidHAZX+A', '2024-02-15 06:29:01 AM', 'approved', 'unban'),
(3, 'putra', 'putra', NULL, 'pky', '081351678870', '2', 'sha256:1000:yhkLETgVloUWIpKaHxnCrMHBpVpihy5k:/iuqzVDoZELQ0h1+/DQ8rjUk6ry2mkVn', '2024-02-14 06:13:15 PM', 'approved', 'unban'),
(4, 'odoi', 'odoii', NULL, 'pky', '082128481981', '2', 'sha256:1000:YjqXWUf4f6wzCaMgC59NI33x22DSaR3n:cn/No+IN2kMO7g9iBAORikqI8/m5GsMG', '2024-01-28 05:49:47 PM', 'approved', 'unban'),
(8, 'odoiboi', 'odoiboi', NULL, 'palangka', '081298371947821', '2', 'sha256:1000:9/NWOJdaRh41+GrrqVlQ8MAX7QtN6yas:GG9oi3J0FxsWBF+27kJHuBYFIkTnwcRW', '2024-02-15 06:34:46 AM', 'approved', 'unban');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detailpemesanan`
--
ALTER TABLE `tb_detailpemesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_detailpemesanan`
--
ALTER TABLE `tb_detailpemesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
