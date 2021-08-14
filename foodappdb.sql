-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2021 pada 12.33
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodappdb`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDataByTanggal` (IN `tanggalAwal` DATETIME, IN `tanggalAkhir` DATETIME)  BEGIN
    SELECT SUM(totalHarga) 
     FROM transaksi
    WHERE created_at >= tanggalAwal && created_at <= DATE(DATE_ADD(tanggalAkhir, INTERVAL 1 DAY));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambarmakanan` varchar(255) NOT NULL,
  `kuliner` varchar(255) NOT NULL,
  `jenismakanan` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `hargabahan` int(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `terjual` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `slug`, `deskripsi`, `gambarmakanan`, `kuliner`, `jenismakanan`, `quantity`, `harga`, `hargabahan`, `rating`, `terjual`, `created_at`, `updated_at`) VALUES
(1, 'BaksoAyam', 'baksoayam', 'tes', '1621021694_555fcf0ad0c49f39089e.jpg', 'Indonesian', 'Appetizers', 2, 25000, 10000, 0, 5, '2021-05-14 14:48:14', '2021-07-01 04:02:22'),
(3, 'Bubur', 'bubur', 'hai', '1624524346_e17302c2ed99acf35a3f.jpg', 'Chinese', 'Appetizers', 2, 50000, 20000, 0, 6, '2021-05-28 14:16:07', '2021-06-25 16:01:54'),
(4, 'Sirloin Steak', 'sirloin-steak', 'Steak dengan paduan saus jamur', '1622798772_c896707307901d0fab85.jpg', 'Western Food', 'Main Course', 5, 75000, 30000, 0, 7, '2021-06-04 04:26:12', '2021-06-06 04:26:12');

--
-- Trigger `makanan`
--
DELIMITER $$
CREATE TRIGGER `newTimeZone` BEFORE INSERT ON `makanan` FOR EACH ROW BEGIN
    SET NEW.created_at = DATE_ADD(NEW.created_at, INTERVAL 12 HOUR);
    SET NEW.updated_at = DATE_ADD(NEW.updated_at, INTERVAL 12 HOUR);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `newTimeZoneUpdate` BEFORE UPDATE ON `makanan` FOR EACH ROW BEGIN
    SET NEW.updated_at= DATE_ADD(NEW.updated_at, INTERVAL 12 HOUR);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `makanandesc`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `makanandesc` (
`id` int(11)
,`nama` varchar(255)
,`slug` varchar(255)
,`deskripsi` varchar(255)
,`gambarmakanan` varchar(255)
,`kuliner` varchar(255)
,`jenismakanan` varchar(255)
,`quantity` int(255)
,`harga` int(255)
,`hargabahan` int(255)
,`rating` int(255)
,`terjual` int(255)
,`created_at` datetime
,`updated_at` datetime
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembukuan`
--

CREATE TABLE `pembukuan` (
  `id` int(255) NOT NULL,
  `pendapatan` int(255) NOT NULL,
  `pengeluaran` int(255) NOT NULL,
  `profit` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_makanan` int(255) NOT NULL,
  `jumlah_order` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tempat` tinyint(1) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `kode_promo` varchar(255) NOT NULL,
  `diskon` int(255) NOT NULL,
  `max` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `durasi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `totalharga` int(255) NOT NULL,
  `kodetransaksi` varchar(255) NOT NULL,
  `promo` varchar(255) NOT NULL,
  `promoharga` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `slug`, `quantity`, `harga`, `totalharga`, `kodetransaksi`, `promo`, `promoharga`, `created_at`, `updated_at`) VALUES
(45, 'Sirloin Steak', 'sirloin-steak', 3, 25000, 75000, 'TR202108130001', 'No Diskon', 0, '2021-08-13 17:23:36', '2021-08-13 17:23:36');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `GenerateCode` BEFORE INSERT ON `transaksi` FOR EACH ROW IF (SELECT COUNT(*) FROM transaksi) < 1 THEN
SET NEW.kodetransaksi = CONCAT(CONCAT(CONCAT(CONCAT("TR",YEAR(NOW())),LPAD(MONTH(NOW()), 2, 0)),LPAD(DAY(NOW()), 2, 0)),LPAD(1, 4, 0));
ELSE
SET NEW.kodetransaksi = CONCAT(CONCAT(CONCAT(CONCAT("TR",YEAR(NOW())),LPAD(MONTH(NOW()), 2, 0)),LPAD(DAY(NOW()), 2, 0)),LPAD(IfNull((SELECT RIGHT(kodetransaksi,4)+1 FROM transaksi Where SUBSTRING(kodetransaksi,3,4) = YEAR(NOW()) AND SUBSTRING(kodetransaksi,7,2) = MONTH(NOW()) AND SUBSTRING(kodetransaksi,9,2) = DAY(NOW()) 
                                                                                                                                     ORDER BY RIGHT(kodetransaksi,4) DESC
                                                                                                                                  LIMIT 1 
),"1"),4,0));
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TimeZone` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
    SET NEW.created_at = DATE_ADD(NEW.created_at, INTERVAL 12 HOUR);
    SET NEW.updated_at = DATE_ADD(NEW.updated_at, INTERVAL 12 HOUR);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TimeZoneUpdate` BEFORE UPDATE ON `transaksi` FOR EACH ROW BEGIN
    SET NEW.updated_at= DATE_ADD(NEW.updated_at, INTERVAL 12 HOUR);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`, `user_phone`, `user_created_at`) VALUES
(1, 'Hansen', 'hansenreizo@gmail.com', '$2y$10$o8OHLNcZ3i5ptQ6KbIrVUeCTymjVmTpN/OFmDOqH7yhd/aHXR6WKm', 'admin', '', NULL),
(2, 'Ahbong', 'sorareizo@gmail.com', '$2y$10$sK1hc8gwnZGQ0sueC5gO2ed0JVJ/DfZ4x9DJE3YMnFRM.X2jU2pPO', 'kasir', '', NULL),
(4, 'Sange', '54170279@student.kwikkiangie.ac.id', '$2y$10$egd9a7PPjdUY7symA.FELuZDWWZ69Ll9FmV2CM21/54y.eT1.Iv/S', 'user', '', NULL),
(5, 'tes', 'tes@gmail.com', '$2y$10$t9pwDkppzIQsKa9sNTu8eeBXdIS0BYpp.SW7CZKrdku.GZ3o4YHkC', 'user', '', NULL),
(6, 'tes', 'a@gmail.com', '$2y$10$5N2noNGU7p1mkNoA7zaFLOlaXll3.9Bx9FzxIW4NEPhFpCvx0xzOe', 'user', '', NULL),
(7, 'bonggod', 'bong@gmail.com', '$2y$10$3qbXfC2w5PuXgJ31dwdEwu2Sp9wvWexRvyhzd6okEtLeX4Qg9/hzG', 'user', '', NULL),
(8, 'aaa', 'aaaa@gmail.com', '$2y$10$qMpLLIZLkGA/iUeqpfOMT.3E8aHyndvt7vR4UCM4Tmbhw0R/vr41e', 'user', '', NULL),
(9, 'gila', 'gila@gmail.com', '$2y$10$ksdxHygolh1kKgqek2If3uNkUe81UjuDqeFNFaR.JGzxI183j7f8K', 'user', '', NULL),
(10, 'Hansen', 'asdas@gmail.com', '$2y$10$tFhHXM7NxkMbSfrhZrLr/uMg2KpQdCIFQThcijCzHG9on/4vPdY8i', 'user', '', NULL),
(11, 'gilabanget', 'banget@gmail.com', '$2y$10$Bgd2l6/rAC46Z9b60Xg7wuiiN7PMwVu0OEflY3ax95IQq4D7fzywa', 'user', '', NULL),
(12, 'bca', 'bca@gmail.com', '$2y$10$4Vfs/zedZ3gJwSBB18RW3.0J5YGNGcprO3QSLJCKu34Tv3qIe8BF6', 'user', '', NULL),
(13, 'asd', 'das@gmail.com', '$2y$10$i/wdtJK5McZ6WUkuJybR2Ox0vpRcoUM5uByISpDXyto8FFiifdupy', 'user', '085940664306', NULL),
(14, 'Akazen', 'Akazen@gmail.com', '$2y$10$W8IQqxTH7jmID6iwQy9.VOBAXVC01kLlXND/SIybxqMLR5i/WACbK', 'kasir', '123123123', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_mobile`
--

CREATE TABLE `users_mobile` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_mobile`
--

INSERT INTO `users_mobile` (`id`, `username`, `phone`, `email`, `password`) VALUES
(1, 'sorareizo', '085940664306', 'sorareizo@gmail.com', '89012345'),
(2, 'abong', '081218321289', 'hansenreizo@gmail.com', '89012345'),
(3, 'tamu1', '123456789', '54170279@student.kwikkiangie.ac.id', '89012345');

-- --------------------------------------------------------

--
-- Struktur untuk view `makanandesc`
--
DROP TABLE IF EXISTS `makanandesc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `makanandesc`  AS SELECT `makanan`.`id` AS `id`, `makanan`.`nama` AS `nama`, `makanan`.`slug` AS `slug`, `makanan`.`deskripsi` AS `deskripsi`, `makanan`.`gambarmakanan` AS `gambarmakanan`, `makanan`.`kuliner` AS `kuliner`, `makanan`.`jenismakanan` AS `jenismakanan`, `makanan`.`quantity` AS `quantity`, `makanan`.`harga` AS `harga`, `makanan`.`hargabahan` AS `hargabahan`, `makanan`.`rating` AS `rating`, `makanan`.`terjual` AS `terjual`, `makanan`.`created_at` AS `created_at`, `makanan`.`updated_at` AS `updated_at` FROM `makanan` ORDER BY `makanan`.`terjual` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `users_mobile`
--
ALTER TABLE `users_mobile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users_mobile`
--
ALTER TABLE `users_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
