-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 02:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokotoki`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `productID` varchar(50) NOT NULL,
  `jumlah` int(25) NOT NULL,
  `harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL,
  `nama_ekspedisi` varchar(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `nama_ekspedisi`, `tarif`) VALUES
(1, 'J&T', 15000),
(2, 'JNE', 17000),
(3, 'SiCepat', 16000);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(10) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(2, 'Jakarta', 17000),
(4, 'Bandung', 29000),
(5, 'Medan', 35000),
(7, 'Pontianak', 30000),
(8, 'Pekanbaru', 25000),
(9, 'Bali', 45000),
(10, 'Padang', 38000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'andiraka@gmail.com', 'pelanggan', 'Andi Raka', '085278786565'),
(6, 'julius@gmail.com', 'julius', 'Julius Caesar', '086575432341');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_status` int(2) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `id_ekspedisi` varchar(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL,
  `bukti_transfer` longblob DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_status`, `tanggal_pembelian`, `total_pembelian`, `id_ekspedisi`, `alamat_pengiriman`, `metode_pembayaran`, `bukti_transfer`, `tanggal_pembayaran`, `tanggal_pengiriman`, `tanggal_selesai`) VALUES
(1, 10, 4, '2022-05-07', 61000, '1', 'kk,kk,Jakarta', 'BCA', 0x4e6a49334e6a6b314f5467304e6d45795a6935716347633d, '2022-05-07', '2022-05-07', '2022-05-12'),
(2, 10, 4, '2022-05-07', 118000, '1', 'k,kk,Bandung', 'BNI', 0x4e6a49334e6a6b344f574a695a6a6b794f5335716347633d, '2022-05-07', '2022-05-07', '2022-05-12'),
(3, 8, 3, '2022-05-07', 162000, '2', 'kk,99,Jakarta', 'BRI', 0x4e6a49334e6a6c694f5451794d7a566d5a6935716347633d, '2022-05-07', '2022-05-07', '0000-00-00'),
(4, 10, 6, '2022-05-09', 67000, '1', 'kk,kk,Jakarta', 'BCA', 0x4e6a49334f4456694e6a59784e7a4a6d595335716347633d, '2022-05-09', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 3, 1),
(2, 2, 4, 2),
(3, 3, 6, 2),
(4, 4, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `price` int(8) DEFAULT NULL,
  `stock` int(8) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `animalType` varchar(15) DEFAULT NULL,
  `prodType` varchar(20) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `review` text DEFAULT NULL,
  `favorite` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `price`, `stock`, `unit`, `weight`, `animalType`, `prodType`, `image`, `description`, `rating`, `review`, `favorite`) VALUES
(1, 'Extra Small Size Cat Protective Collar', 33000, 10, '1 item', 1, 'Cat', 'Accessories', 0x363237636636663532386163352e6a7067, 'A secure extra small size protective collar for your cat.', 4.9, 'you can bring rhis everywhere', 'Y'),
(2, 'Small Size Cat Protective Collar', 55000, 10, '1 item', 1, 'Cat', 'Accessories', 0x363237636637303463326630322e6a7067, 'A secure small size protective collar for your cat.', 4.8, 'good for health', 'Y'),
(3, 'Toki Dry Food Adult Mackerel', 30000, 100, '1kg', 1, 'Cat', 'Foods', 0x363237636637313963356161322e6a7067, 'Delicious and nutritious dry food for adult cat with mackerel flavor.', 4.75, 'hygienic and clean', 'N'),
(4, 'Toki Dry Food Adult Ocean Fish', 30000, 100, '1kg', 1, 'Cat', 'Foods', 0x363237636637323830323665662e6a7067, 'Delicious and nutritious dry food for adult cat with ocean fish flavor.', 4.95, 'good for your cat', 'Y'),
(5, 'Large Size Dog Protective Collar', 2000, 100, '1 item', 1, 'Dog', 'Accessories', 0x363237636637333634313837632e6a7067, 'protect your dog at all cost', NULL, 'it\'s very protective', 'Y'),
(6, 'Scabies Cream Dog', 50000, 100, '1 bottle', 1, 'Dog', 'Medicine', 0x363237636637343231326665352e6a7067, 'Scabies Cream for Dog', NULL, NULL, NULL),
(7, 'Dry Food Dog 1kg', 50000, 100, '1 item', 1, 'Dog', 'Foods', 0x363237636637353261363938382e6a7067, 'Dry Food Dog 1kg', NULL, NULL, NULL),
(8, 'Dry Food Dog 2kg', 100000, 100, '1 item', 2, 'Dog', 'Foods', 0x363237636637363061666632382e6a7067, 'Dry Food Dog 2kg', NULL, NULL, NULL),
(9, 'Toki Rabbit Dry Food', 20000, 100, '25g', 1, 'Rabbit', 'Foods', 0x363237636637366532633038362e6a7067, 'Delicious and nutritious rabbit dry food for your bunny.', 4.6, 'you can bring this everywhere', 'Y'),
(10, 'Toki Rabbit JUMBO Dry Food', 50000, 50, '100g', 4, 'Rabbit', 'Foods', 0x363237636637376433623430632e6a7067, 'Delicious and satisfying rabbit dry food for your bunny.', 4.8, 'good for health', 'Y'),
(11, 'Toki Rabbit Wet Food', 30000, 30, '50g', 2, 'Rabbit', 'Foods', 0x363237636637386531643737312e6a7067, 'Delicious rabbit wet food for your bunny.', 4.5, 'hygienic and clean', 'N'),
(12, 'Toki Rabbit JUMBO Wet Food', 60000, 10, '100g', 5, 'Rabbit', 'Foods', 0x363237636637396431396234662e6a7067, 'Delicious and satisfying rabbit wet food for your bunny.', 4.6, 'hygienic and clean', 'N'),
(13, 'Small Size Aquarium', 60000, 10, '1 box', 2, 'Fish', 'Accessories', 0x363237636664363962366536612e6a7067, 'Small size aquarium up to 25 liters. ', 4.9, 'you can put this anywhere', 'Y'),
(14, 'Medium Size Aquarium', 70000, 10, '1 box', 2, 'Fish', 'Accessories', 0x363237636664373364396432612e6a7067, 'Medium size aquarium 25-100 liters.', 4.95, 'good for your aesthetic side', 'Y'),
(15, 'Large Size Aquarium', 80000, 10, '1 box', 2, 'Fish', 'Accessories', 0x363237636664376438363065302e6a7067, 'Large size aquarium up to 100-250 liters.', 4.75, 'clean sight aquarium', 'N'),
(16, 'Toki Fish Pellet', 10000, 90, '200g', 2, 'Fish', 'Foods', 0x363237636664353331346539662e6a7067, 'Nutritious fish pellet suitable for all types of fish.', 4.8, 'good for health', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`typeID`, `typeName`) VALUES
(1, 'Accessories'),
(2, 'Foods'),
(3, 'Medicine'),
(4, 'Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`) VALUES
(10, 'Cat Collar', 22500, 'cat collar.jpg'),
(11, 'Cat Protective Collar', 115000, 'cat protective collar.jpg'),
(13, 'Dog Collar', 75000, 'dog collar.jpg'),
(14, 'Dog Protective Collar', 39000, 'dog protective collar.jpg'),
(15, 'Aquarium', 420000, 'aquarium.jpg'),
(16, 'Pet Cage', 150000, 'pet cage.jpg'),
(17, 'Cat Milk Replacer', 36000, 'cat milk replacer.jpeg'),
(18, 'Creamy Treats', 2300, 'creamy treats.png'),
(19, 'Dry Food', 36000, 'dry food (cat dog rabbit).png'),
(21, 'Fish Pellet', 1500, 'fish pellet.jpg'),
(22, 'Wet Food Cat', 29000, 'wet food can cat.png'),
(23, 'Wet Food Dog', 11000, 'wet food can dog.png'),
(24, 'Food Pouch Cat', 10000, 'wet food pouch cat.png'),
(25, 'Food Pouch Dog', 15000, 'wet food pouch dog.png'),
(26, 'Allium Drops', 22000, 'allium drops.jpg'),
(27, 'Cat Care Vitamin', 100000, 'cat care vitamin.jpg'),
(28, 'Scabies Cream', 15000, 'scabies cream.jpeg'),
(29, 'Terramycim Cream', 18000, 'terramycin cream.jpeg'),
(30, 'Tung Hai', 5000, 'tung hai.jpg'),
(31, 'Plastic Food Bowl', 25000, 'cat plastic food bowl.jpg'),
(32, 'Stainless Food Bowl', 50000, 'cat stainless steel food bowl.jpg'),
(33, 'Double Bowl', 32000, 'dog cat double bowl plastic.jpg'),
(34, 'Dog Bowl Plastic', 20000, 'dog food bowl plastic.jpg'),
(35, 'Dog Bowl Plastic 2', 20000, 'dog food bowl stainless steel2.jpg'),
(36, 'Litter Box', 28000, 'litter box.jpeg'),
(37, 'Scoop', 8000, 'scoop.jpg'),
(38, 'Shampoo', 60000, 'shampoo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id_status` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pesanan`
--

INSERT INTO `status_pesanan` (`id_status`, `status`) VALUES
(1, 'Belum Dibayar'),
(2, 'Dikemas'),
(3, 'Dikirim'),
(4, 'Selesai'),
(5, 'Dibatalkan'),
(6, 'Menunggu Konfirmasi'),
(7, 'Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `level` enum('admin','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `nama`, `telepon`, `level`) VALUES
(1, 'andiraka@gmail.com', 'pelanggan', 'Andi Raka', '085278786565', 'pelanggan'),
(6, 'julius@gmail.com', 'julius', 'Julius Caesar', '086575432341', 'pelanggan'),
(7, 'test@mail.com', 'test', 'test', '08978979797979', 'pelanggan'),
(8, 'admin@gmail.com', 'admin', 'admin', '08999999999999', 'admin'),
(9, 'coba@gmail.com', 'coba', 'coba', '08978979797979', 'pelanggan'),
(10, 'samplebaru@mail.com', 'samplebaru', 'sample', '098766688', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `visit_history`
--

CREATE TABLE `visit_history` (
  `id_visit` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_history`
--

INSERT INTO `visit_history` (`id_visit`, `id_users`, `date`) VALUES
(1, 7, '2022-04-15 08:04:44'),
(2, 8, '2022-04-16 11:04:17'),
(3, 8, '2022-04-16 12:04:40'),
(4, 7, '2022-04-16 12:04:32'),
(5, 8, '2022-04-16 12:04:12'),
(6, 7, '2022-04-16 12:04:22'),
(7, 8, '2022-04-17 07:04:15'),
(8, 7, '2022-04-17 07:04:13'),
(9, 8, '2022-04-17 07:04:59'),
(10, 10, '2022-04-17 01:04:51'),
(11, 8, '2022-04-17 04:04:05'),
(12, 8, '2022-04-17 04:04:21'),
(13, 10, '2022-04-17 04:04:17'),
(14, 10, '2022-04-17 04:04:50'),
(15, 10, '2022-04-17 04:04:03'),
(16, 10, '2022-04-18 02:04:40'),
(17, 8, '2022-04-18 02:04:24'),
(18, 7, '2022-04-22 18:41:00'),
(19, 8, '2022-04-22 18:48:45'),
(20, 7, '2022-04-22 19:38:03'),
(21, 7, '2022-04-22 19:53:20'),
(22, 7, '2022-04-22 20:36:19'),
(23, 7, '2022-04-22 20:41:19'),
(24, 7, '2022-04-22 22:15:48'),
(25, 7, '2022-04-22 22:44:30'),
(26, 7, '2022-04-22 23:03:36'),
(27, 7, '2022-04-23 10:32:31'),
(28, 7, '2022-04-23 10:36:23'),
(29, 7, '2022-04-23 11:35:10'),
(30, 7, '2022-04-23 12:18:25'),
(31, 7, '2022-04-23 12:23:20'),
(32, 7, '2022-05-07 11:46:44'),
(33, 8, '2022-05-07 12:26:54'),
(34, 7, '2022-05-07 13:05:19'),
(35, 8, '2022-05-07 13:19:49'),
(36, 7, '2022-05-07 13:20:09'),
(37, 8, '2022-05-07 13:20:32'),
(38, 7, '2022-05-07 13:36:08'),
(39, 7, '2022-05-07 14:10:29'),
(40, 8, '2022-05-07 14:17:23'),
(41, 7, '2022-05-07 14:19:57'),
(42, 7, '2022-05-07 14:21:02'),
(43, 10, '2022-05-07 22:50:56'),
(44, 8, '2022-05-07 22:52:06'),
(45, 10, '2022-05-07 22:58:38'),
(46, 10, '2022-05-07 22:59:42'),
(47, 8, '2022-05-07 23:00:26'),
(48, 10, '2022-05-07 23:01:19'),
(49, 8, '2022-05-07 23:05:05'),
(50, 10, '2022-05-07 23:07:38'),
(51, 10, '2022-05-07 23:08:54'),
(52, 8, '2022-05-07 23:09:06'),
(53, 8, '2022-05-07 23:11:38'),
(54, 8, '2022-05-07 23:12:15'),
(55, 10, '2022-05-07 23:18:07'),
(56, 8, '2022-05-09 06:54:04'),
(57, 10, '2022-05-09 07:04:09'),
(58, 10, '2022-05-12 18:58:56'),
(59, 8, '2022-05-12 19:00:28'),
(60, 10, '2022-05-12 19:24:44'),
(61, 8, '2022-05-12 19:27:27'),
(62, 10, '2022-05-12 19:29:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_ekspedisi` (`id_ekspedisi`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `pembelian_ibfk_3` (`id_pelanggan`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `visit_history`
--
ALTER TABLE `visit_history`
  ADD PRIMARY KEY (`id_visit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visit_history`
--
ALTER TABLE `visit_history`
  MODIFY `id_visit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
