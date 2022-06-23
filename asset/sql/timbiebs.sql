-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2022 pada 11.25
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timbiebs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`) VALUES
(1, 'Justin Bieber'),
(2, 'Billie Eilish'),
(3, 'Ariana Grande'),
(4, 'Dewa 19'),
(5, 'Raisa'),
(6, 'Isyana Sarasvati'),
(7, 'Harry Styles'),
(8, 'Eminem'),
(9, 'Bring Me The Horizon'),
(10, 'Queen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `concert`
--

CREATE TABLE `concert` (
  `concert_id` int(11) NOT NULL,
  `concert_name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `artist_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `concert`
--

INSERT INTO `concert` (`concert_id`, `concert_name`, `description`, `artist_id`, `date`, `venue`, `country`) VALUES
(1, 'Justice World Tour', 'The Justice World Tour, formerly known as The Changes Tour and The Justin Bieber World Tour, is the ongoing fourth concert tour by Canadian singer Justin Bieber. The tour is in support of his fifth and sixth studio albums, Changes and Justice.', 1, '2022-06-30', 'Istora Senayan', 'Indonesia'),
(2, '\"Where Do We Go?\" World Tour\r\n', 'The Where Do We Go? World Tour was the fifth concert tour by American singer Billie Eilish, in support of her debut studio album When We All Fall Asleep, Where Do We Go?', 2, '2022-07-15', 'Gedung Fasilkom Universitas Jember', 'Indonesia'),
(3, 'Purpose World Tour', 'The Purpose World Tour was the third concert tour by Canadian singer Justin Bieber, in support of his fourth studio album Purpose.', 1, '2022-07-30', 'Stadion Blambangan Banyuwangi', 'Indonesia'),
(4, 'The Eminem Show', 'Marshall Bruce Mathers III, known by the world as Eminem, was born in Saint Joseph, Missouri in 1972. Raised by a single mother, Eminem struggled in school but found passion through his rhyming skills. In 1996, Eminem released his first solo album, “Infinite”, on the local Web Entertainment label. While that album didn’t draw much attention, the “Slim Shady EP” caught the attention of famous producer, Dr. Dre – he quickly signed Eminem to his Interscope imprint, Aftermath.', 8, '2022-08-12', 'Stadium Nasional Bukit Jalil', 'Malaysia'),
(5, 'DEWA 19: 30th Anniversary Concert', '30 Tahun berkarya menjadi sebuah catatan sejarah yang panjang. Berbeda masa, berbeda generasi, melewati berbagai era. Pastikan diri anda menjadi saksi sejarah.', 4, '2022-09-08', 'The House Convention Hall', 'Singapura'),
(6, 'One Love Manchester', 'One Love Manchester was a benefit concert and British television special, which was organised by American singer Ariana Grande, Simon Moran, Melvin Benn and Scooter Braun in response to the bombing after Grande\'s concert at Manchester Arena two weeks earlier.', 3, '2023-01-18', 'Old Trafford Cricket Ground', 'Inggris'),
(7, 'Good Things 2022 - BMTH', 'Bring Me the Horizon are a British rock band formed in Sheffield in 2004. The group consists of lead vocalist Oliver Sykes, guitarist Lee Malia, bassist Matt Kean, drummer Matt Nicholls and keyboardist Jordan Fish. They are signed to RCA Records globally and Columbia Records exclusively in the United States.', 9, '2023-02-15', 'VIC Melbourne', 'Australia'),
(8, 'LEXICONCERT', 'Isyana Sarasvati siap menyapa penggemarnya lewat Lexiconcert Live on Tour yang akan digelar di lima kota. Konser ini akan dimulai dari tanggal 3 Juni sampai 22 Juli 2022 mendatang dengan Jakarta sebagai kota pembukanya.', 6, '2022-06-17', 'Hall Basket Gelora Bung Karno Senayan', 'Indonesia'),
(9, 'Raisa It\'s Personal Showcase 2022', 'Raisa akhirnya kembali menyapa para penggemarnya melalui konsernya yang bertajuk Raisa It\'s Personal Showcase 2022', 5, '2022-12-23', 'Stadion Tenis Indoor Gelora Bung Karno', 'Indonesia'),
(10, 'Live Aid Concert', 'The performance at Live Aid at Wembley Stadium is Queen\'s greatest single live performance. Their set consisted of a version of \"Bohemian Rhapsody\" (ballad section and guitar solo) slightly speeded up in lyrics, \"Radio Ga Ga\", a crowd singalong, \"Hammer to Fall\", \"Crazy Little Thing Called Love \", \"We Will Rock You\" (1st verse), and \"We Are the Champions\".', 10, '2023-04-11', 'Wembley Stadium', 'Inggris'),
(11, 'Coachella Valley Music and Arts Festival', 'Harry Edward Styles is an English singer, songwriter and actor. His musical career began in 2010 as a solo contestant on the British music competition series The X Factor.', 7, '2023-06-14', 'Coachella Empire Polo Club', 'Amerika Serikat'),
(12, 'Changes World Tour', 'Changes is the fifth studio album by Canadian singer Justin Bieber. It was released through Def Jam Recordings and RBMG on February 14, 2020. The album features guest appearances from Quavo, Post Malone, Clever, Lil Dicky, Travis Scott, Kehlani, and Summer Walker.', 1, '2023-06-21', 'SMAN 1 Genteng Banyuwangi', 'Indonesia'),
(13, 'Happier Than Ever, The World Tour', 'Happier Than Ever, The World Tour is the ongoing sixth concert tour by American singer Billie Eilish, in support of her second studio album Happier Than Ever (2021)', 2, '2023-07-08', 'Gedung Fasilkom UNEJ', 'Indonesia'),
(14, 'Sweetener World Tour', 'The Sweetener World Tour also known as The Sweetener/Thank U Next World Tour was the fourth concert tour and third arena tour by American singer Ariana Grande in support of her fourth and fifth studio albums, Sweetener and Thank U, Next.', 3, '2023-09-06', 'Lapangan Universitas Jember', 'Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indeks untuk tabel `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`concert_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `concert`
--
ALTER TABLE `concert`
  MODIFY `concert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_idfk` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
