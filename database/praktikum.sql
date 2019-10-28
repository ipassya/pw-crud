-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2019 pada 07.49
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `nama`, `telepon`, `email`, `alamat`, `gambar`) VALUES
(1, 'Ihza Luckyan Passya', '082291578165', 'ipassya@gmail.com', 'Jl Pugeran', '5dadb41242d9d.jpg'),
(2, 'Zaenal Abidin', '088866245212', 'zaenalabidin@gmail.com', 'Jl Sawit', '5dadb41cae240.jpg'),
(4, 'Nadiem Makarim', '02150233200', 'nadiemmakarim@gmail.com', 'Jl Raya', '5dadb427bb984.jpg'),
(5, 'Dominic Toretto', '08987654321', 'dominictoretto@gmail.com', 'Jl Dewa', '5dadb431cff59.jpg'),
(22, 'Hananto', '082293945456', 'hananto@gmail.com', 'Jl Solo', '5dadad03cba08.jpg'),
(31, 'Indonesia', '1234567890', 'indonesia@indonesia.id', 'Jl Indonesia', '5dadcdad169ed.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(2, 'ipassya@gmail.com', '$2y$10$P7KxPoq8AGDBAlDUjHIxWuCMvvMO4QuWEimt9f..rfa/wMot13wHW'),
(3, '123180046@localhost.', '$2y$10$ouAw3zybRz.imyyFaHIOVOoeR9mr0DZtfkcXpljDYip0DjCqH7HSS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
