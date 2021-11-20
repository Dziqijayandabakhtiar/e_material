-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2020 pada 02.00
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `material-bpbd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(50) NOT NULL,
  `jenis_brg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_brg`) VALUES
('1', 'ATK'),
('2', 'Belanja Cetak'),
('3', 'Alat Kebersihan'),
('4', 'Pantry'),
('5', 'Alat Listrik&Elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `bidang_bagian` varchar(50) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(100) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `bidang_bagian` varchar(50) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `nama_staff`, `bidang_bagian`, `kode_brg`, `id_jenis`, `jumlah`, `tgl_permintaan`, `status`) VALUES
(37, 'Ferry', '', '1', 1, 3, '2020-05-18', 0),
(5, 'Ferry', 'Bidang 2', 'BR008', 3, 3, '2020-05-22', 1),
(38, 'adam', '', '1', 1, 4, '2020-05-19', 0),
(6, 'ferry agustoni', 'Program', 'BR009', 4, 5, '2020-05-23', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementara`
--

CREATE TABLE `sementara` (
  `id_sementara` int(100) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `id_bidang` varchar(50) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokbarang`
--

CREATE TABLE `stokbarang` (
  `kode_brg` varchar(5) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `keluar` int(11) DEFAULT '0',
  `sisa` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stokbarang`
--

INSERT INTO `stokbarang` (`kode_brg`, `id_jenis`, `nama_brg`, `satuan`, `stok`, `keluar`, `sisa`, `tgl_masuk`) VALUES
('BR001', 1, 'Amplop Kabinet (besar)', 'Pack', 12, 0, 12, '2020-05-17'),
('BR002', 1, 'amplop panjang 80gr', 'pack', 11, 0, 11, '2020-05-05'),
('BR003', 1, 'Balpoin boliner', 'pack', 10, 0, 10, '2020-05-13'),
('BR004', 1, 'Binder clip besar', 'Pack', 17, 0, 17, '2020-05-19'),
('BR005', 2, 'spanduk Berbahan Plastik', 'meter', 0, 0, 0, '2020-05-12'),
('BR006', 2, 'umbul-umbul t:4 m', 'buah', 4, 0, 4, '1900-12-13'),
('BR007', 3, 'pengharum ruangan', 'Eco care', 0, 0, 0, '2020-05-18'),
('BR008', 3, 'pewangi mobil cair', 'buah', 19, 0, 19, '2020-05-12'),
('BR009', 4, 'gula pasir', 'kg', 32, 0, 32, '2020-05-13'),
('BR010', 4, 'gula jawa/gula merah', 'kg', 8, 0, 8, '2020-05-12'),
('BR011', 5, 'Lampu LED 23watt', 'unit', 4, 0, 4, '2020-05-14'),
('BR012', 5, 'batu baterai aa', 'unit', 15, 0, 15, '2020-05-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('unit_pelayanan','admin_gudang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'Admin_Bpbd', '202cb962ac59075b964b07152d234b70', 'admin_gudang'),
(2, 'Ferry', 'a3040f90cc20fa672fe31efcae41d2db', 'unit_pelayanan'),
(3, 'adam', 'c3ec0f7b054e729c5a716c8125839829', 'unit_pelayanan'),
(4, 'adam', '81dc9bdb52d04dc20036dbd8313ed055', 'unit_pelayanan'),
(5, 'ferry agustoni', '827ccb0eea8a706c4c34a16891f84e7b', 'unit_pelayanan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indeks untuk tabel `sementara`
--
ALTER TABLE `sementara`
  ADD PRIMARY KEY (`id_sementara`);

--
-- Indeks untuk tabel `stokbarang`
--
ALTER TABLE `stokbarang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `sementara`
--
ALTER TABLE `sementara`
  MODIFY `id_sementara` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
