-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 20 Nis 2026, 11:36:27
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `employee_management`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone`, `position`, `salary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tommy', 'Developer', 'tommy@example.com', '050-111-22-33', 'Full-stack Developer', 2500.00, '2026-04-20 09:31:14', NULL, NULL),
(2, 'Tural', 'Zamanov', 'tural@example.com', '055-222-33-44', 'Project Manager', 2200.00, '2026-04-20 09:31:14', NULL, NULL),
(3, 'Ali', 'Mammadov', 'ali@example.com', '070-333-44-55', 'Backend Dev', 1800.00, '2026-04-20 09:31:14', NULL, NULL),
(4, 'Isabella', 'Walker', 'isabella@example.com', '+1 (119) 501-8016', 'UX Designer', 2100.00, '2026-04-20 09:31:14', NULL, NULL),
(5, 'Leyla', 'Aliyeva', 'leyla@example.com', '051-555-66-77', 'UI/UX Designer', 1600.00, '2026-04-20 09:31:14', NULL, NULL),
(6, 'Murad', 'Quliyev', 'murad@example.com', '050-777-88-99', 'DevOps', 2100.00, '2026-04-20 09:31:14', NULL, NULL),
(7, 'Fidan', 'Ismayilova', 'fidan@example.com', '055-888-99-00', 'HR Manager', 1500.00, '2026-04-20 09:31:14', NULL, NULL),
(8, 'Kenan', 'Bagirov', 'kenan@example.com', '070-999-00-11', 'System Admin', 1900.00, '2026-04-20 09:31:14', NULL, NULL),
(9, 'Nigar', 'Huseynova', 'nigar.h@example.com', '051-123-45-67', 'Data Analyst', 2000.00, '2026-04-20 09:31:14', NULL, NULL),
(10, 'Orxan', 'Sadiqov', 'orxan.s@example.com', '050-765-43-21', 'Mobile Dev', 2300.00, '2026-04-20 09:31:14', NULL, NULL),
(11, 'Anar', 'Məmmədov', 'anar.m@example.com', '050-123-45-67', 'Senior Developer', 3200.00, '2026-04-20 09:31:14', NULL, NULL),
(12, 'Rashad', 'Hasanov', 'reshad.h@example.com', '055-345-67-89', 'Project Manager', 2800.00, '2026-04-20 09:31:14', NULL, NULL),
(13, 'Gunel', 'Aliyeva', 'gunel.e@example.com', '070-456-78-90', 'QA Engineer', 1500.00, '2026-04-20 09:31:14', NULL, NULL),
(14, 'Vuqar', 'Rzayev', 'vuqar.r@example.com', '050-567-89-01', 'DevOps Architect', 3500.00, '2026-04-20 09:31:14', NULL, NULL),
(15, 'Aysel', 'Ismayilova', 'aysel.i@example.com', '051-678-90-12', 'Frontend Developer', 1900.00, '2026-04-20 09:31:14', NULL, NULL),
(16, 'Emin', 'Cafarov', 'emin.c@example.com', '055-789-01-23', 'Backend Lead', 3100.00, '2026-04-20 09:31:14', NULL, NULL),
(17, 'Fərid', 'Mehdiyev', 'farid.m@example.com', '055-901-22-33', 'IT Support', 1300.00, '2026-04-20 09:31:14', NULL, NULL),
(18, 'Samir', 'Abbasov', 'samir.a@example.com', '055-567-88-99', 'Business Analyst', 2400.00, '2026-04-20 09:31:14', NULL, NULL),
(19, 'Zaur', 'Pashayev', 'zaur.p@example.com', '055-321-65-43', 'Security Specialist', 2400.00, '2026-04-20 09:31:14', '2026-04-20 09:35:38', '2026-04-20 09:35:38'),
(20, 'Lala123', 'Nazarova', 'lala.n@example.com', '051-456-77-88', 'Office Manager', 1100.00, '2026-04-20 09:31:14', '2026-04-20 09:35:35', NULL),
(21, 'Quyn', 'Nguyen', 'raxop@mailinator.com', '+1 (614) 364-5563', 'Saepe eum quam est e', 20.00, '2026-04-20 09:36:01', NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
