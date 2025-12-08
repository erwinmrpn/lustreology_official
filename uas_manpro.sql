-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Des 2025 pada 15.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_manpro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `judul_panjang` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_us`
--

INSERT INTO `about_us` (`id`, `id_kategori`, `judul`, `judul_panjang`, `deskripsi`, `gambar`) VALUES
(2, 1, 'SIEGA', 'Sistem Informasi, E-Commerce, Game Technology, AKSI', 'SIEGA merupakan sebuah singkatan dari beberapa konsentrasi yang ada di Program Studi Sistem Informasi Unika Soegijapranata Semarang yaitu, Sistem Informasi, E-Commerce, Game Technology, dan Akuntansi + Sistem Informasi.\r\n\r\nSIEGA berdiri sejak 11 November 2011 yang didirikan oleh Prof. Dr. Ridwan Sanjaya S.E., S.Kom., MS.IEC. Program Studi Sistem Informasi mendapatkan ijin penyelenggaraan serta akreditasinya melalui SK Menteri Pendidikan dan Kebudayaan RI No. 235/E/O/2013 pada tanggal 25 Juni 2013 dengan akreditasi pertama yaitu C.', NULL),
(4, 1, 'AKREDITASI', 'Sistem Informasi E-Commerce Game Technology AKSI', NULL, 0x313736353039303035335f736572746966696b61745f616b72656469746173692e706e67),
(5, 1, 'testing', 'testing testing', 'asdjasdasdasdasd', NULL),
(7, 3, 'VISI', '', 'Menjadi komunitas akademik yang unggul dalam pendidikan, penelitian dan pengabdian dengan dilandasi nilai-nilai Kristiani: cinta kasih, keadilan dan kejujuran', NULL),
(8, 3, 'MISI', '', '- Menyelenggarakan pendidikan yang berkualitas secara akademik dengan didukung pengembangan kepribadian yang utuh dan potensi kepemimpinan.\r\n- Melakukan penelitian untuk pengembangan ilmu dan teknologi demi meningkatkan kesejahteraan manusia.\r\n- Melakukan pengabdian kepada masyarakat sebagai penerapan ilmu dan teknologi yang telah dikembangkan dalam penelitian dan kesejahteraan manusia.\r\n- Memberikan perhatian dan mencari pemecahan terhadap berbagai masalah sosial budaya masyarakat melalui komunitas akademik.\r\n- Mengembangkan jaringan Kerjasama dengan berbagai institusi pendidikan, penelitian dan pengabdian lokal, nasional dan internasional untuk meningkatkan kualitas pendidikan dan penelitian.\r\n- Memperbaiki dan mengembangkan universitas secara terus menerus, sehingga dapat mendukung segala upaya untuk mencapai keunggulan.', NULL),
(11, 4, 'Prof. Dr. Ridwan Sanjaya S.E., S.Kom., MS.IEC.', 'Dekan Fakultas Ilmu Komputer', NULL, 0x313736353230333635325f53637265656e73686f7420323032352d31322d30382061742032302e35382e31392d6d696e2e706e67),
(12, 4, 'Prof. Dr. Ridwan Sanjaya S.E., S.Kom., MS.IEC.', 'Sistem Informasi, E-Commerce, Game Technology, AKSI', NULL, 0x313736353230333934385f53637265656e73686f7420323032352d31322d30382061742032302e35382e31392e706e67),
(13, 4, 'SIEGA', 'Dekan Fakultas Ilmu Komputer', NULL, 0x313736353230343030385f53637265656e73686f7420323032352d31322d30382061742032302e35382e31392d6d696e2e706e67),
(17, 3, 'tes gambar', 'tes', NULL, 0x313736353230343731395f72696477616e2e706e67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `fullname`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'evan', 'evan@gmail.com', '082138539834', 'selamat pagi testing', '2025-12-06 12:55:29'),
(2, 'Friend Ship', 'evansantoso138@gmail.com', '+62 821 3853 9834', 'testing', '2025-12-06 13:11:15'),
(3, 'Evan SSANTOSO', 'evansantoso138@gmail.com', '+62 821 3853 9834', 'testing dulu', '2025-12-06 13:12:29'),
(4, 'Richard Ariyanto Saputra', 'richardariyanto30@gmail.com', '081234567890', 'kerja sama yuk', '2025-12-08 10:01:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori_about_us`
--

CREATE TABLE `tabel_kategori_about_us` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_kategori_about_us`
--

INSERT INTO `tabel_kategori_about_us` (`id_kategori`, `kategori`, `time_stamp`) VALUES
(1, 'sejarah SIEGA', '2025-12-07 06:02:29'),
(3, 'Visi & Misi SIEGA', '2025-12-07 06:18:02'),
(4, 'dosen', '2025-12-08 09:50:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `timestamp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2025-12-06 12:39:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_kategori_about_us`
--
ALTER TABLE `tabel_kategori_about_us`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_kategori_about_us`
--
ALTER TABLE `tabel_kategori_about_us`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
