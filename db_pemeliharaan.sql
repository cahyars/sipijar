-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2023 pada 11.18
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemeliharaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(255) NOT NULL,
  `id_ruangan` int(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `foto_barang` varchar(255) DEFAULT NULL,
  `jenis` enum('jaringan','komputer_lab','komputer_office') NOT NULL,
  `status_barang` enum('b','rr','rb') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_ruangan`, `nama_barang`, `foto_barang`, `jenis`, `status_barang`) VALUES
(15, 3, 'Lenovo V130-001', 'v130.jpg', 'komputer_lab', 'b'),
(16, 7, 'Komputer Dell Core-i7-001', 'dell-vostro.jpg', 'komputer_office', 'b'),
(18, 7, 'Kabel LAN Uplink (Server)', 'Jasa-Instalasi-Jaringan-Lan-1.jpg', 'jaringan', 'b'),
(19, 8, 'Unifi AP-LR-01', 'Cara Setting Unifi AP LR.jpg', 'jaringan', 'b'),
(20, 9, 'Unifi AP-LR-02', 'Cara Setting Unifi AP LR.jpg', 'jaringan', 'b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(255) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `tgl_mulai`, `tgl_selesai`, `deskripsi`) VALUES
(7, '2023-01-01 08:00:00', '2023-01-02 15:30:00', 'Cek PC LAB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(255) NOT NULL,
  `tanggal_buat` date DEFAULT current_timestamp(),
  `id_user` int(255) NOT NULL,
  `bulan` int(2) NOT NULL,
  `status` enum('menunggu','acc1','acc2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `tanggal_buat`, `id_user`, `bulan`, `status`) VALUES
(1, '2023-01-04', 9, 1, 'acc2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemeliharaan`
--

CREATE TABLE `tb_pemeliharaan` (
  `id_pemeliharaan` int(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `id_ruangan` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `status_pemeliharaan` enum('menunggu','disetujui','pengerjaan','selesai','ditolak') NOT NULL DEFAULT 'menunggu',
  `persentase` int(3) NOT NULL,
  `deskripsi` varchar(1024) NOT NULL,
  `catatan` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemeliharaan`
--

INSERT INTO `tb_pemeliharaan` (`id_pemeliharaan`, `tgl_mulai`, `tgl_selesai`, `id_ruangan`, `id_user`, `status_pemeliharaan`, `persentase`, `deskripsi`, `catatan`) VALUES
(13, '2023-01-04', '2023-01-05', 3, 9, 'menunggu', 0, 'Cek Komputer Ruang Guru', ''),
(14, '2023-01-05', '2023-01-05', 7, 2, 'selesai', 0, 'Cek PC untuk UAS', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemeliharaan_barang`
--

CREATE TABLE `tb_pemeliharaan_barang` (
  `id_pemeliharaan_barang` int(255) NOT NULL,
  `id_pemeliharaan` int(255) NOT NULL,
  `id_barang_pelihara` int(255) NOT NULL,
  `status` enum('b','rr','rb') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `biaya` varchar(255) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemeliharaan_barang`
--

INSERT INTO `tb_pemeliharaan_barang` (`id_pemeliharaan_barang`, `id_pemeliharaan`, `id_barang_pelihara`, `status`, `keterangan`, `biaya`) VALUES
(18, 13, 15, 'b', 'masih layak untuk digunakan', '-'),
(19, 14, 16, 'b', 'Masih dapat digunakan dengan baik', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(255) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `foto`) VALUES
(3, 'LAB Komputer OTKP', 'aula3.PNG'),
(7, 'LAB Komputer DKV', ''),
(8, 'Ruang 1', ''),
(9, 'Ruang 2', ''),
(10, 'Ruang 3', ''),
(11, 'Ruang 4', ''),
(12, 'Ruang 5', ''),
(13, 'Ruang 6', ''),
(14, 'Ruang 7', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(255) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `hak_akses` enum('1','2','3','4') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `foto`, `nama`, `jabatan`, `hak_akses`, `username`, `password`) VALUES
(2, '-', 'cahya.jpg', 'Cahya Ramdan Syah', 'Admin MRC', '1', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, '19860126 202221 1 007', 'rizal_s.jpg', 'Rizal Suyaman, S.Kom', 'Kepala MRC', '3', 'kepala', '1cb9596773d55a2aa7cf5eddc6fbd633'),
(9, '-', 'corporate-user-icon.png', 'Ahmad Hakim Makarim', 'Staff MRC', '2', 'hakim', 'ee11cbb19052e40b07aac0ca060c23ee'),
(10, '19840314 200902 1 004', '219983.png', 'Deni Muliana. S.Pd', 'Waka Sarana dan Prasarana', '4', 'wakasek', '379563d4cc020b27338863c063b9368d');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `tb_barang_id_ruangan_foreign` (`id_ruangan`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tb_pemeliharaan`
--
ALTER TABLE `tb_pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD KEY `tb_pemeliharaan_id_ruangan_foreign` (`id_ruangan`),
  ADD KEY `tb_pemeliharaan_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `tb_pemeliharaan_barang`
--
ALTER TABLE `tb_pemeliharaan_barang`
  ADD PRIMARY KEY (`id_pemeliharaan_barang`),
  ADD KEY `tb_pemeliharaan_barang_id_barang_pelihara_foreign` (`id_barang_pelihara`),
  ADD KEY `id_pemeliharaan` (`id_pemeliharaan`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pemeliharaan`
--
ALTER TABLE `tb_pemeliharaan`
  MODIFY `id_pemeliharaan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_pemeliharaan_barang`
--
ALTER TABLE `tb_pemeliharaan_barang`
  MODIFY `id_pemeliharaan_barang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_id_ruangan_foreign` FOREIGN KEY (`id_ruangan`) REFERENCES `tb_ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemeliharaan`
--
ALTER TABLE `tb_pemeliharaan`
  ADD CONSTRAINT `tb_pemeliharaan_id_ruangan_foreign` FOREIGN KEY (`id_ruangan`) REFERENCES `tb_ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemeliharaan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemeliharaan_barang`
--
ALTER TABLE `tb_pemeliharaan_barang`
  ADD CONSTRAINT `tb_pemeliharaan_barang_id_barang_pelihara_foreign` FOREIGN KEY (`id_barang_pelihara`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
