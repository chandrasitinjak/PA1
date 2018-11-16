-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Nov 2018 pada 09.38
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pa1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_akun`
--

CREATE TABLE `t_akun` (
  `id` int(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_akun`
--

INSERT INTO `t_akun` (`id`, `nama`, `email`, `password`, `alamat`, `role`) VALUES
(1, 'Dedi Chandra sitinjak', 'admin@admin.com', 'admin', 'jl.admindekat', 1),
(2, 'andre', 'admin2@admin.com', '1', 'jl.admin2', 1),
(4, 'Apriyanti Sijabat', 'user2@auser.com', 'user', 'Samosir', 2),
(5, 'ucok', 'ucok@ucok.com', 'ucok', 'medan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bookmeja`
--

CREATE TABLE `t_bookmeja` (
  `id_book` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_meja` int(20) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `waktu_berakhir` datetime NOT NULL,
  `jumlah` int(40) DEFAULT NULL,
  `keterangan` text,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_galeri`
--

CREATE TABLE `t_galeri` (
  `id_gambar` int(20) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_galeri`
--

INSERT INTO `t_galeri` (`id_gambar`, `gambar`, `deskripsi`) VALUES
(3, 'pegawai.jpg', 'Salah Satu Pegawai Sedang Memasak Pesanan Di Dallas Fried Chicken'),
(4, 'panggangan.jpg', 'Tempat Menyimpan Ayam Yang Telah Digoreng Di Dallas Fried Chicken,dapat dilihat dari pinggir Jalan'),
(5, 'pamplet.jpg', 'Pamplet Dallas Fried Chicken Dapat Dilihat Jelas Ketika Berada di Jalan'),
(6, 'TV.jpg', 'Fasilitas Ini Didapatkan Ketika Berada Didalam ruangan,Sangat Enak Ketika Menikmati Makanan Dan Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_items`
--

CREATE TABLE `t_items` (
  `id_items` int(20) NOT NULL,
  `id_keranjang` int(20) DEFAULT NULL,
  `id_produk` int(20) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `id_transaksi` int(20) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_items`
--

INSERT INTO `t_items` (`id_items`, `id_keranjang`, `id_produk`, `id_user`, `id_transaksi`, `total_harga`, `status`, `jumlah`) VALUES
(22, 4, 12, 4, 15, 60000, 'Accepted', 3),
(23, 4, 12, 4, 16, 60000, 'Accepted', 3),
(24, 4, 14, 4, 17, 120000, 'Accepted', 10),
(25, 4, 16, 4, 17, 800000, 'Accepted', 80),
(26, 4, 16, 4, 17, 80000, 'Accepted', 8),
(27, 4, 14, 4, 18, 48000, 'Accepted', 4),
(28, 4, 14, 4, 19, 36000, 'Accepted', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karyawan`
--

CREATE TABLE `t_karyawan` (
  `id_karyawan` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_karyawan`
--

INSERT INTO `t_karyawan` (`id_karyawan`, `nama`, `gambar`, `alamat`, `no_telp`, `deskripsi`) VALUES
(1, ' Elphi p', ' Elphi p.jpg', ' Balige', ' 0852775585660', 'Sudah Lama Bekerja Di Dallas Fried Chicken'),
(2, 'Budi', 'Budi.jpg', 'Balige', '089675632231', 'Berasal Dari Lubuk Pakam,Mulai Bekerja Pada 2017'),
(3, 'Agung', 'Agung.jpg', 'Balige', '081376345562', 'Mulai Bekerja Pada Tahun 2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kat_produk`
--

CREATE TABLE `t_kat_produk` (
  `id_kategori` int(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kat_produk`
--

INSERT INTO `t_kat_produk` (`id_kategori`, `keterangan`) VALUES
(1, 'makanan'),
(2, 'minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_keranjang`
--

CREATE TABLE `t_keranjang` (
  `id_keranjang` int(20) NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_keranjang`
--

INSERT INTO `t_keranjang` (`id_keranjang`, `id_user`) VALUES
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_komentar`
--

CREATE TABLE `t_komentar` (
  `id_komentar` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `tanggapan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_meja`
--

CREATE TABLE `t_meja` (
  `id_meja` int(20) NOT NULL,
  `jumlah_kursi` int(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_meja`
--

INSERT INTO `t_meja` (`id_meja`, `jumlah_kursi`, `gambar`, `Deskripsi`) VALUES
(4, 4, 'IMG-20180626-WA0006.jpg', 'Berada diluar Ruangan,Sehingga Jalan Raya Dapat dilihat Dengan Jelas'),
(5, 2, 'IMG_20180621_162531.jpg', 'Ini terdapat didalam ruangan,sangat cocok bersama teman'),
(6, 2, 'IMG_20180621_162604.jpg', 'Sangat Cocok Untuk Bagi Pasangan'),
(7, 2, 'IMG_20180621_162641.jpg', 'Berada Dalam Ruangan,Sangat di Rekomendasikan Untuk Pasangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(20) NOT NULL,
  `nama_prod` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi_prod` varchar(100) NOT NULL,
  `kategori` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `nama_prod`, `harga`, `stok`, `gambar`, `deskripsi_prod`, `kategori`) VALUES
(12, '  Chicken Tsunami', 20000, 1, '  Chicken Tsunami.jpg', 'Ini Adalah Menu Andalan Di Dallas Fried Chicken', 1),
(14, 'French Fries', 12000, 1, 'French Fries.jpg', 'Makanan Ini Langsung Dimasak Ditempat,Anda Dapat Menikmatinya Dalam Keadaan Hangat.', 1),
(16, 'Jus Jeruk', 10000, 1, 'Jus Jeruk.jpg', 'Sangat Segar,Cocok Diminum Ketika Suasana Gerah Dan Selesai Makan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rating`
--

CREATE TABLE `t_rating` (
  `id_rating` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rating`
--

INSERT INTO `t_rating` (`id_rating`, `id_user`, `id_produk`, `keterangan`) VALUES
(1, 4, 12, 'suka'),
(2, 4, 14, 'tidak suka'),
(3, 4, 16, 'suka'),
(4, 5, 12, 'suka'),
(5, 5, 14, 'suka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(20) NOT NULL,
  `keterangan` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_role`
--

INSERT INTO `t_role` (`id_role`, `keterangan`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` int(20) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `tanggal_transaksi`, `jam`, `id_user`, `status`) VALUES
(15, '2018-06-29', '20:07:16', 4, 'Accepted'),
(16, '2018-06-29', '20:30:54', 4, 'Accepted'),
(17, '2018-06-29', '20:44:47', 4, 'Accepted'),
(18, '2018-07-02', '14:56:52', 4, 'Accepted'),
(19, '2018-07-30', '20:10:59', 4, 'Accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_akun`
--
ALTER TABLE `t_akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `t_bookmeja`
--
ALTER TABLE `t_bookmeja`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indexes for table `t_galeri`
--
ALTER TABLE `t_galeri`
  ADD KEY `id_gambar` (`id_gambar`);

--
-- Indexes for table `t_items`
--
ALTER TABLE `t_items`
  ADD PRIMARY KEY (`id_items`),
  ADD KEY `id_keranjang` (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `t_karyawan`
--
ALTER TABLE `t_karyawan`
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `t_kat_produk`
--
ALTER TABLE `t_kat_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_keranjang`
--
ALTER TABLE `t_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_komentar`
--
ALTER TABLE `t_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_meja`
--
ALTER TABLE `t_meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `t_rating`
--
ALTER TABLE `t_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_akun`
--
ALTER TABLE `t_akun`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_bookmeja`
--
ALTER TABLE `t_bookmeja`
  MODIFY `id_book` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_galeri`
--
ALTER TABLE `t_galeri`
  MODIFY `id_gambar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_items`
--
ALTER TABLE `t_items`
  MODIFY `id_items` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `t_karyawan`
--
ALTER TABLE `t_karyawan`
  MODIFY `id_karyawan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_kat_produk`
--
ALTER TABLE `t_kat_produk`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_keranjang`
--
ALTER TABLE `t_keranjang`
  MODIFY `id_keranjang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_komentar`
--
ALTER TABLE `t_komentar`
  MODIFY `id_komentar` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_meja`
--
ALTER TABLE `t_meja`
  MODIFY `id_meja` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_rating`
--
ALTER TABLE `t_rating`
  MODIFY `id_rating` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id_transaksi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_akun`
--
ALTER TABLE `t_akun`
  ADD CONSTRAINT `t_akun_ibfk_1` FOREIGN KEY (`role`) REFERENCES `t_role` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `t_bookmeja`
--
ALTER TABLE `t_bookmeja`
  ADD CONSTRAINT `t_bookmeja_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_akun` (`id`),
  ADD CONSTRAINT `t_bookmeja_ibfk_2` FOREIGN KEY (`id_meja`) REFERENCES `t_meja` (`id_meja`);

--
-- Ketidakleluasaan untuk tabel `t_items`
--
ALTER TABLE `t_items`
  ADD CONSTRAINT `t_items_ibfk_1` FOREIGN KEY (`id_keranjang`) REFERENCES `t_keranjang` (`id_keranjang`),
  ADD CONSTRAINT `t_items_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`),
  ADD CONSTRAINT `t_items_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `t_transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  ADD CONSTRAINT `t_keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_akun` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_komentar`
--
ALTER TABLE `t_komentar`
  ADD CONSTRAINT `t_komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_akun` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD CONSTRAINT `t_produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `t_kat_produk` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `t_rating`
--
ALTER TABLE `t_rating`
  ADD CONSTRAINT `t_rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_akun` (`id`),
  ADD CONSTRAINT `t_rating_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `t_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
