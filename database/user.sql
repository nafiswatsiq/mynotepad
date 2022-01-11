-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql306.epizy.com
-- Waktu pembuatan: 21 Okt 2021 pada 16.26
-- Versi server: 5.7.35-38
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29414174_notepad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_user`, `nama`, `username`, `password`) VALUES
(4, 'hBe5LUC', 'nafis watsiq', 'admin', '$2y$10$fx8Otsxlp8btkYWd20DuBeF80tfqwaOFTllKRL3VZ3JJi2nf2Ql32'),
(10, '3LaZymD', 'NAFIS AMRULLOH', 'admin1', '$2y$10$uo/DWCpZehxgTfrmtkT1LOOZNpR89gy8C3zUgTBaMpSb4WWKa7igS'),
(9, 'ehJdyeV', 'Nafis watsiq', 'amrullohnafis@gmail.com', '$2y$10$k/MLq.bf//Y2GGuC2ebOvubYoG1sgHfkbW9VqIM7EqAyjTQY8jPVG'),
(11, '5AIs604', 'admin nafis', 'adminnafis', '$2y$10$WPMjFlK948Th14ZO/NBLSuNcg7IkYlNiPcaSPdUbvRPrrWZJXgSxe');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
