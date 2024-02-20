-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2024 at 08:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `id` int NOT NULL,
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
  `id_detail` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `id_produk` int NOT NULL,
  `tinggi_dipesan` decimal(10,2) NOT NULL,
  `lebar_dipesan` decimal(10,2) NOT NULL,
  `kuantitas` int DEFAULT NULL,
  `harga_satuan` varchar(20) DEFAULT NULL,
  `rak` int DEFAULT NULL,
  `laci` int DEFAULT NULL,
  `jml_pintu` int DEFAULT NULL,
  `jenis_pintu` enum('Pintu Geser','Pintu Biasa') DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `jml_gantungan` int DEFAULT NULL,
  `deskripsi_dipesan` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `subtotal` varchar(20) DEFAULT NULL,
  `status_pemesanan` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_detailpemesanan`
--

INSERT INTO `tb_detailpemesanan` (`id_detail`, `id_pemesanan`, `id_produk`, `tinggi_dipesan`, `lebar_dipesan`, `kuantitas`, `harga_satuan`, `rak`, `laci`, `jml_pintu`, `jenis_pintu`, `warna`, `jml_gantungan`, `deskripsi_dipesan`, `subtotal`, `status_pemesanan`) VALUES
(82, 62, 36, 2.40, 2.00, 1, '10.560.000', 2, 3, 2, 'Pintu Biasa', 'Merah', 2, 'deskripsi pesan', '10560000', 'Pengiriman'),
(83, 63, 36, 2.40, 2.00, 3, '10.560.000', 2, 3, 2, 'Pintu Biasa', 'Merah', 2, '', '21120000', 'proses'),
(84, 64, 36, 2.40, 2.00, 1, '10.560.000', 2, 3, 2, 'Pintu Biasa', '1', 2, 'Palangkaraya', '10560000', 'proses'),
(85, 65, 36, 2.40, 2.00, 1, '10.560.000', 2, 3, 2, 'Pintu Biasa', '1', 2, 'adwdad', '10560000', 'Selesai Pengerjaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int NOT NULL,
  `id_produk` int NOT NULL,
  `nama_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id_keranjang` int NOT NULL,
  `id` int NOT NULL,
  `id_produk` int NOT NULL,
  `tinggi_dipesan` decimal(10,2) NOT NULL,
  `lebar_dipesan` decimal(10,2) NOT NULL,
  `rak` int DEFAULT NULL,
  `laci` int DEFAULT NULL,
  `jml_pintu` int DEFAULT NULL,
  `jenis_pintu` enum('Pintu Geser','Pintu Biasa') DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `jml_gantungan` int DEFAULT NULL,
  `deskripsi_dipesan` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `harga_dipesan` varchar(20) NOT NULL,
  `kuantitas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `tgl_pemesanan` datetime DEFAULT NULL,
  `total_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_pelanggan`, `tgl_pemesanan`, `total_bayar`) VALUES
(62, 3, '2024-02-19 18:00:28', '10.860.000'),
(63, 3, '2024-02-19 21:31:01', '21.420.000'),
(64, 3, '2024-02-20 09:25:35', '10.860.000'),
(65, 3, '2024-02-20 15:34:51', '10.860.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `harga` varchar(20) DEFAULT NULL,
  `harga_permeter` decimal(10,2) DEFAULT NULL,
  `tinggi` decimal(10,2) DEFAULT NULL,
  `lebar` decimal(10,2) DEFAULT NULL,
  `rak` int DEFAULT NULL,
  `laci` int DEFAULT NULL,
  `jml_pintu` int DEFAULT NULL,
  `jenis_pintu` enum('Pintu Geser','Pintu Biasa') DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `jml_gantungan` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `foto_brg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_brg`, `jenis_brg`, `deskripsi`, `harga`, `harga_permeter`, `tinggi`, `lebar`, `rak`, `laci`, `jml_pintu`, `jenis_pintu`, `warna`, `jml_gantungan`, `stok`, `foto_brg`) VALUES
(36, 'Lemari', 'Kitchen Set', 'warnakjwnda', '10.560.000', 2200000.00, 2.40, 2.00, 2, 3, 2, 'Pintu Biasa', '1', 2, 1, 'ZtKSbWAPpM8aYVGk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_warna`
--

CREATE TABLE `tb_warna` (
  `id_warna` int NOT NULL,
  `nama_warna` varchar(100) DEFAULT NULL,
  `foto_warna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_warna`
--

INSERT INTO `tb_warna` (`id_warna`, `nama_warna`, `foto_warna`) VALUES
(1, 'Serat Kayu Motif Gelapp', 'H8QUXhwOBNkDs3YI.jpeg'),
(2, 'Serat Kayu Motif Cerah', '1xyJiOjUsmPlG9qD.jpeg'),
(3, 'Serat Kayu Motif Netral', '6DSEHt85WkJavQlX.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `alamat` text,
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
(1, 'admin@gmail.com', 'Admin', 'Admin', '-', '0', '1', 'sha256:1000:UJxHaaFpM44Bj1ka7U58GiSHUx3zRWid:Hq86/PHYj0utJLz2ciHzSehsidHAZX+A', '2024-02-20 08:37:48 AM', 'approved', 'unban'),
(3, 'putra', 'putra', NULL, 'pky', '081351678870', '2', 'sha256:1000:yhkLETgVloUWIpKaHxnCrMHBpVpihy5k:/iuqzVDoZELQ0h1+/DQ8rjUk6ry2mkVn', '2024-02-20 08:38:21 AM', 'approved', 'unban'),
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
-- Indexes for table `tb_warna`
--
ALTER TABLE `tb_warna`
  ADD PRIMARY KEY (`id_warna`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_detailpemesanan`
--
ALTER TABLE `tb_detailpemesanan`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_warna`
--
ALTER TABLE `tb_warna`
  MODIFY `id_warna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
