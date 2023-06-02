-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 12:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `dokterid` int(10) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`dokterid`, `nama_lengkap`, `no_telp`) VALUES
(1, 'dr. Alisya Rahma Safitra', '082222222222'),
(3, 'dr. zuzu', '088888888888');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `waktu` time NOT NULL,
  `nama_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `hari`, `waktu`, `nama_dokter`) VALUES
(1, 'Senin', '10:00:00', 'dr. Alisya Rahma Safitra'),
(5, 'Senin', '13:00:00', 'dr. Hilma');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `idkonsultasi` int(10) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `idjadwal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1664645316, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `pasienid` int(10) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `umur` int(2) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`pasienid`, `nama_lengkap`, `umur`, `alamat`, `no_telp`, `email`, `userid`) VALUES
(1, 'Chaerani Eristyawati', 19, 'jl. tembalang', '082124610068', 'chaerani.eristya@gmail.com', 1),
(15, 'Nurul Uswatun H.', 19, 'jl. ngesrep', '088888888888', 'nurul@gmail.com', 0),
(16, 'Septiana Eka Putri', 20, 'smg bawah', '088888888888', 'septiii@gmail.com', 0),
(21, 'p', 0, 'a', 'a', 'a', 0),
(22, 'p', 0, 'a', 'a', 'a', 0),
(23, 'p', 0, 'a', 'a', 'a', 0),
(24, 'p', 0, 'a', 'a', 'a', 0),
(43, 'p', 0, 'a', 'a', 'a', 0),
(44, 'p', 0, 'a', 'a', 'a', 0),
(46, 'p', 0, 'a', 'a', 'a', 0),
(47, 'p', 0, 'a', 'a', 'a', 0),
(48, 'p', 0, 'a', 'a', 'a', 0),
(49, 'p', 0, 'a', 'a', 'a', 0),
(50, 'p', 0, 'a', 'a', 'a', 0),
(51, 'p', 0, 'a', 'a', 'a', 0),
(52, 'p', 0, 'a', 'a', 'a', 0),
(61, 'p', 0, 'a', 'a', 'a', 0),
(62, 'p', 0, 'a', 'a', 'a', 0),
(63, 'p', 0, 'a', 'a', 'a', 0),
(64, 'p', 0, 'a', 'a', 'a', 0),
(65, 'p', 0, 'a', 'a', 'a', 0),
(66, 'p', 0, 'a', 'a', 'a', 0),
(67, 'p', 0, 'a', 'a', 'a', 0),
(68, 'p', 0, 'a', 'a', 'a', 0),
(69, 'p', 0, 'a', 'a', 'a', 0),
(70, 'p', 0, 'a', 'a', 'a', 0),
(71, 'p', 0, 'a', 'a', 'a', 0),
(72, 'p', 0, 'a', 'a', 'a', 0),
(73, 'p', 0, 'a', 'a', 'a', 0),
(74, 'p', 0, 'a', 'a', 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `level` enum('admin','pasien') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(1, 'ranieristya', 'ranicantik', 'Chaerani Eristyawati', 'admin'),
(2, 'alisya123', 'gatauapaya', 'Alisya Rahma Safitra', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Mrs. Vella Kassulke IV', 'phoeger@example.net', 'Female', '2020-10-21 11:22:23', '2020-10-21 11:22:23'),
(2, 'Dr. Herbert Abernathy MD', 'fluettgen@example.net', 'Male', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(3, 'Glenna Murphy', 'pkuhic@example.org', 'Male', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(4, 'Ines Fadel', 'eveline.mante@example.com', 'Female', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(5, 'Audreanne Wolf V', 'maryse.cartwright@example.net', 'Female', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(6, 'Mrs. Sydni Emard', 'hills.evalyn@example.org', 'Male', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(7, 'Imelda Prosacco', 'colton55@example.net', 'Female', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(8, 'Mr. Alec Hansen', 'casey.wehner@example.com', 'Male', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(9, 'Shanny O\'Connell PhD', 'kirlin.leopoldo@example.org', 'Male', '2020-10-21 11:22:24', '2020-10-21 11:22:24'),
(10, 'Elouise Hand IV', 'phaley@example.org', 'Female', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(11, 'Augustus Denesik', 'rhammes@example.net', 'Female', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(12, 'Emiliano Schaden Sr.', 'selena.jakubowski@example.com', 'Female', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(13, 'Fabiola Bartoletti DDS', 'bonita.donnelly@example.org', 'Female', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(14, 'Jaiden Farrell', 'hermann.ida@example.com', 'Female', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(15, 'Neha Kunde I', 'langosh.colton@example.com', 'Male', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(16, 'Dr. Troy Schamberger', 'gparker@example.org', 'Male', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(17, 'Kadin Wolf', 'cwhite@example.net', 'Male', '2020-10-21 11:22:25', '2020-10-21 11:22:25'),
(18, 'Timothy Schneider', 'jaylin62@example.net', 'Female', '2020-10-21 11:22:26', '2020-10-21 11:22:26'),
(19, 'Miss Viviane Gleichner', 'efren.lang@example.com', 'Male', '2020-10-21 11:22:26', '2020-10-21 11:22:26'),
(20, 'Nya Harber', 'tkutch@example.net', 'Female', '2020-10-21 11:22:26', '2020-10-21 11:22:26'),
(21, 'Emmanuelle Zieme', 'gustave.kemmer@example.com', 'Male', '2020-10-21 11:22:26', '2020-10-21 11:22:26'),
(22, 'Mrs. Cheyanne Schroeder', 'ahmed.friesen@example.org', 'Female', '2020-10-21 11:22:26', '2020-10-21 11:22:26'),
(23, 'Raleigh Upton', 'temmerich@example.org', 'Female', '2020-10-21 11:22:26', '2020-10-21 11:22:26'),
(24, 'Carey Blick', 'haley.elinore@example.org', 'Female', '2020-10-21 11:22:26', '2020-10-21 11:22:26'),
(25, 'Lennie Lind', 'barton.jazmin@example.com', 'Female', '2020-10-21 11:22:27', '2020-10-21 11:22:27'),
(26, 'Riley Gibson', 'vhayes@example.com', 'Female', '2020-10-21 11:22:27', '2020-10-21 11:22:27'),
(27, 'Mario Toy', 'justen.nienow@example.org', 'Female', '2020-10-21 11:22:27', '2020-10-21 11:22:27'),
(28, 'Tatum Tromp', 'wisozk.celia@example.org', 'Female', '2020-10-21 11:22:27', '2020-10-21 11:22:27'),
(29, 'Prof. Rosendo O\'Connell II', 'chad69@example.com', 'Female', '2020-10-21 11:22:27', '2020-10-21 11:22:27'),
(30, 'Donald Paucek', 'mertz.gerhard@example.org', 'Female', '2020-10-21 11:22:27', '2020-10-21 11:22:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokterid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`idkonsultasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasienid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_table_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `dokterid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `idkonsultasi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `pasienid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
