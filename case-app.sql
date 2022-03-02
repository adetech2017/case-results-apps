-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2022 at 11:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `case-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `antigen_test_results`
--

CREATE TABLE `antigen_test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_sex` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_nationality` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antigen_test_results`
--

INSERT INTO `antigen_test_results` (`id`, `patient_name`, `patient_sex`, `patient_dob`, `patient_phone`, `patient_email`, `patient_nationality`, `passport_number`, `lab_code`, `collection_date`, `collection_time`, `result_date`, `final_result`, `sample_type`, `patient_location`, `created_at`, `updated_at`) VALUES
(1, 'Mark James', 'eyJpdiI6IjZHS1RSbWt5RHQrVSsycXUzKzR4TFE9PSIsInZhbHVlIjoiam5yaWhJMUJyeU9JeW5JL20xSzVPdz09IiwibWFjIjoiOTI0NGQ4ODQ4YTY2NjhkZWEyMjExNmNiZTk1ZWVlMzhhYzU3NGVkMWU5MDZjOGNjNGJmZTc1MWVhYmM4OWIzYyIsInRhZyI6IiJ9', 'eyJpdiI6InJIOUp1TGVGSEJvQ3pGZnZML1NwaVE9PSIsInZhbHVlIjoiNTA1VThoYmRHcjdGK2NId2RYZ3NmQT09IiwibWFjIjoiYTc2NmFhMzg3ODYxZWNlZTgxYjMxZGM0NGVlM2JkMTZjNDJiMDRkZmZlYzBhYzQyOTI5ZDNhOWMzMGY2OTRiOSIsInRhZyI6IiJ9', 'eyJpdiI6ImpvTmxibGxQbytMeEJqNXZUUHhSa1E9PSIsInZhbHVlIjoiWVZWY010TnpqamdQTXlESytIdVFLUT09IiwibWFjIjoiZGZhNGVkYmEyYTQxNmQxNjM3N2IzMTYxNWRjY2ZkYTdjOTRkNmQ3MmMwYTExNGRjMDhlYzVlZmYzMDc5MGQ5MSIsInRhZyI6IiJ9', 'eyJpdiI6Im1WR21ZaHJUMHFWc0Irc3hrL0tlSUE9PSIsInZhbHVlIjoidnVyT2trRzdsMC96dHNKaVRUa2pwZz09IiwibWFjIjoiZmZhZTlmNmNjNTI4MTFmMDM1MDk2NjU3NDNhZjg1ZGRkMmMzNDgxYzQzNzYzNGQ1YmFlNGM2ZDJhNWFmODg0OSIsInRhZyI6IiJ9', 'eyJpdiI6InNrU2FIdmNXM0JCVzFselZqZE5PUWc9PSIsInZhbHVlIjoia1dxZkNSNzhaT01wa0pzVUx3cG82dz09IiwibWFjIjoiNDllMjlkYmY3ZjAxNmMyNjhmMTZlYzc2MWE0Y2MzYjA2MjE1MGM1M2E1MzM3ZmEyMGE5ZmY0MDc4Y2ZlNmI3YyIsInRhZyI6IiJ9', 'eyJpdiI6IjM4cWNhemdqTG9MT0lzZWptNVBOTGc9PSIsInZhbHVlIjoiKzRqNzdNNWtBam1sLzhHVCt6ZmtYZz09IiwibWFjIjoiOTAzMmIyYjIzNDU4MTBmNDZhODc4NjA3YjhjMTNmNGRlMzY0ZmQ4ZmFiMDg3YzQ5M2M0MmMzZTcxZGVlOGRjNiIsInRhZyI6IiJ9', 'eyJpdiI6InVPZ29DSk80VHJsVGdEUkFGeWxFL3c9PSIsInZhbHVlIjoiZ1RjaUsrMExOM2V5RjhoMDAxb0xYZz09IiwibWFjIjoiYmI1ZTVmNTZmNWZlOGJjOWM0ZDE4ZjU2NzE5ZjRmOTI2YzNmMTlkZGE5NmRhOGM2NjQ0NTE4ODgyZDE2ZmU5MyIsInRhZyI6IiJ9', 'eyJpdiI6Ik1CMkoyanUzUlE3c2QzYlpCSndDWmc9PSIsInZhbHVlIjoiNEEyZGM2MzRESkRuN001YUErbUJUQT09IiwibWFjIjoiN2FjNjBjOTZjNWQxMWU5ZDFmNzI4NDZlNTQ2MDhmNTBjZmRjNzA5NjhmZTU2YjMwOWZkNmI0MzE0NzJiODUyZSIsInRhZyI6IiJ9', 'eyJpdiI6InZEWHRzV1FqSFFqWWE1SGpKSmJadFE9PSIsInZhbHVlIjoiNnFBS0p5eTNRVDRZVlEwMEM5WXY2QT09IiwibWFjIjoiODJiMTMyYTBhOWU1MWU5ODhlYzk3NGZkZWNlNGZlMzdhZjM0NmE0MmVlMGE2ZTJkNjE2OGRhY2U3MTg0OWMwNCIsInRhZyI6IiJ9', 'eyJpdiI6Ik5tUkJ1YjBodlNndGdGc0tVSm5zMkE9PSIsInZhbHVlIjoiZHh6emdhM3dDZElHWUFMdnVyYjJGZz09IiwibWFjIjoiNzFmNWZmZWMzN2M4YzkzYzNjODBmNjRlODUwNDc0ZTJjNzYyMjI2MWIxNzA0ZjI0YTYzZTAzOGYzOWI0OTEzNyIsInRhZyI6IiJ9', 'eyJpdiI6IkxzNG9qQms5L21hWnQ5eXhOZWhubVE9PSIsInZhbHVlIjoiL3VRdEFLLzFrVldHOWdBNkFmUzRvQT09IiwibWFjIjoiZTAyNGQ0MzYzOGVkMzU4OTg4NTNhYzdmMWRjYTZmNWRjZDA4MmY4ZjI4Y2UxZmRmOWIyZDk4Njk5Y2FmMDhhNCIsInRhZyI6IiJ9', 'eyJpdiI6IkJYSWhOL29HR2JFY3FHd0k4ZjZiblE9PSIsInZhbHVlIjoiTEd6b1RpZ0xpRzM2Y2FQRWJ1VU45QT09IiwibWFjIjoiODgxN2U3MzZhZTM3OGE5ZTNmYjk1MDY1M2M1MjczMTg0YTJhMGNkOGNjNzY2YmIzMmQ3YzQyN2EzNjE3MDNjMyIsInRhZyI6IiJ9', 'Abuja', '2022-02-08 09:22:19', '2022-02-08 09:22:19'),
(2, 'John Zack', 'eyJpdiI6IlhKcERPRkxpKys1VDI3elRTQitLOUE9PSIsInZhbHVlIjoibmd0Z21RdEJXMkd2SS9qNTQ3NFpsdz09IiwibWFjIjoiMjdmMTUxZWQyZjI2M2FkOWVjYzYwZmFiZjg4MmY1ZGM5ZjY0MmEyNzViNWYyZjk5NjU3NTVjMTA2ZTgzZjc5ZiIsInRhZyI6IiJ9', 'eyJpdiI6InBWL25QM0RrSHpzVENldlZKNjRrWUE9PSIsInZhbHVlIjoiZmJKd0hwTUxteWJtREszelVFNnErdz09IiwibWFjIjoiYmRmNmJhZjIwZmJkNDA0YjRlMzk4YTUxOTY5YmE0NTUyNzg1YzNmNGQ0NmY0MDZmNmQ1MmRlMjZmNjc3OGIwZiIsInRhZyI6IiJ9', 'eyJpdiI6ImJYRzlTSFBmSUZuMTcrMVljMWJJRXc9PSIsInZhbHVlIjoiVDNIb3hPampKa2JWK1IzVU1WdHpoUT09IiwibWFjIjoiYmU4OWJhMTM2MTIwN2I3N2Y5NDNmOTgxMmJmYTRlYjZlNjBkOGU5N2FlNjMxZGNkMTU2NGUyYjJjYjY2Y2JiOSIsInRhZyI6IiJ9', 'eyJpdiI6IlFrcTNOT2YySTdDNzR4ZE5uK29OZ2c9PSIsInZhbHVlIjoiM3RleXZJWGprZFNQU1R3dzZCbXVZMEdxYkhmbUx2SExkc0QwVHZPbzRwYz0iLCJtYWMiOiJhNjcxNjRmYzhiM2IxN2Q3MzkzOTEyZjIyMDVkNTI5MjkzZTM3ODVjZTE4YmYxYzY5ZGFmMDQ5NzA0ZDRjY2I1IiwidGFnIjoiIn0=', 'eyJpdiI6Ikorc1VYOCtpbTUra2ZSMFlmamk3ZEE9PSIsInZhbHVlIjoiRW01eEw2K2hRVy8yL2tGbWx1V2N3QT09IiwibWFjIjoiOGQ2YTgzMDA5YTk0NTMxYjc5Mzk4YjU2YTI5Y2U1YTMyZDMyYzdhOTgwMjI0N2IxYzBmNjJjYzM5NDI3MDQyZSIsInRhZyI6IiJ9', 'eyJpdiI6IlVveUgwa1BBaDk0cmo4KzRLaVZMd3c9PSIsInZhbHVlIjoiQTdpb2R0ZDFqZ3ZyOGR3NzNoT1dGZz09IiwibWFjIjoiZWU4MGJlZGJiZjQ0MmJjMGJlMGRhNjRkN2FkNWVkNGUxYWU4YWZhN2Y1NjM0YWM5YjM4NDlhYmE3ODQyMGIwMSIsInRhZyI6IiJ9', 'eyJpdiI6IlNXOEltM2dxZU94ckJXU1I3MWg5d3c9PSIsInZhbHVlIjoieEE3Ri94dWd2ZUh0UG5ia21NZG8ydz09IiwibWFjIjoiY2U1NWU3NDFiODU5NDkyN2E4YTgyZjIwNTg5ODBlNjEyMGJkN2MyYjdlZDFjOTAwZGZhMGViZjJhYzg4Zjk1MyIsInRhZyI6IiJ9', 'eyJpdiI6InNpaXVINjM0dkZYV1ZhRWd5ZWtOaWc9PSIsInZhbHVlIjoiS2FTZ1RDRXNsM2UxaFE2Ym1yZ2QrQT09IiwibWFjIjoiYjM4NWY0ZmQyODE5OTkzNWI0YTllNjM2MzIwMTM0MDNmZTcwMzM3OGFkYTAyMGQ1Mjc1NjlmYWFiN2ViN2MzNSIsInRhZyI6IiJ9', 'eyJpdiI6IkprL3JUN3lxWlNmOUl4VEtidWhrYkE9PSIsInZhbHVlIjoiR2ZYK2xpME44cDlydklZYmlWMDBZZz09IiwibWFjIjoiYWE0NTJhNDM4OTJkMWI0N2FhNDU1ZGY1ZGM5OWRlNzQ2YmRkYTJkNDgzMGU2NzBiYTdlODRlNDk0ZjYwOTc1OSIsInRhZyI6IiJ9', 'eyJpdiI6InUrTlBkeFIwT2k3eXFUMmNabERKRFE9PSIsInZhbHVlIjoibTBmYUFqN3BtVWVwdmdNWlJVK3VKUT09IiwibWFjIjoiYTViMDk2MmY1NTY3MTFlZTBkNmJjMWI3YjgwNTI2MTliZjA2ZDhlZjVmZGI5ODVmMzJjZTQzZTlmOTkzN2IyZiIsInRhZyI6IiJ9', 'eyJpdiI6IjZOemJaZkptQklETVkwTlR2NGpJSFE9PSIsInZhbHVlIjoiTFBOTDBSUUxZVU9ubW9IM2RSYVRPQT09IiwibWFjIjoiODdiYjllMjI4Nzk4ZmFjNGZlMzRiZTAyNmUxZTQ2MzUzZjhlNzBhYTFhM2UzMTE3NGJiZDM1NzUxZDYyZjQ5NCIsInRhZyI6IiJ9', 'eyJpdiI6IlQxTE5yK2xMNVFhQ3dJZGxKQi9OL1E9PSIsInZhbHVlIjoiYnhQZDBiM3NiemFpN3VDdUtIT0NqQT09IiwibWFjIjoiMzE5MmU4YTMzMWY0OTNmM2VhMjQwNzMyNDBjY2RmODIzOTFjNWEyNzIxN2M0YWI1YmQyMDgyNWQ0MWJmMjM5NiIsInRhZyI6IiJ9', 'Lagos', '2022-02-08 09:22:19', '2022-02-08 09:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_upload_logs`
--

CREATE TABLE `file_upload_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `log_date` datetime NOT NULL,
  `table_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `log_date`, `table_name`, `log_type`, `data`) VALUES
(1, 51, '2022-02-19 13:08:59', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(2, 52, '2022-02-19 13:10:41', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(3, 52, '2022-02-21 12:36:48', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(4, 52, '2022-02-22 08:17:24', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(5, 52, '2022-02-22 08:42:07', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(6, 52, '2022-02-22 08:53:23', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(7, 52, '2022-02-22 09:18:19', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(8, 52, '2022-02-23 09:42:39', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(9, 52, '2022-02-23 18:11:01', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(10, 52, '2022-02-24 09:40:06', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(11, 52, '2022-02-24 09:48:37', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(12, 52, '2022-02-24 10:01:34', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(13, 52, '2022-02-24 10:04:58', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko\\/20100101 Firefox\\/97.0\"}'),
(14, 52, '2022-02-24 11:46:49', 'users', 'edit', '{\"id\":52,\"name\":\"Admin Ade\",\"email\":\"admin@admin.com\",\"email_verified_at\":null,\"password\":\"$2y$10$cwH57kgfixWneBpENsEQ6.2ZECh7Z1UwvTM.YXzkbJ12bGOOQFThy\",\"remember_token\":null,\"created_at\":\"2022-02-19 13:10:03\",\"updated_at\":\"2022-02-19 13:10:03\"}'),
(15, 52, '2022-02-24 11:47:27', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(16, 52, '2022-02-24 11:47:49', 'users', 'edit', '{\"id\":52,\"name\":\"Admin Ade\",\"email\":\"admin@admin.com\",\"email_verified_at\":null,\"password\":\"$2y$10$Kg.aDsw.6JpFCPbKuNpU3e.k0vGLGpWrGB5mvw23n29GPObPD2BmG\",\"remember_token\":null,\"created_at\":\"2022-02-19 13:10:03\",\"updated_at\":\"2022-02-24 11:46:49\"}'),
(17, 52, '2022-02-24 11:49:15', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(18, 52, '2022-02-25 12:22:13', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(19, 52, '2022-02-25 16:18:11', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(20, 52, '2022-02-25 17:00:44', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(21, 52, '2022-02-26 14:12:33', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(22, 53, '2022-02-26 15:24:45', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(23, 52, '2022-02-27 15:20:01', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64; rv:97.0) Gecko\\/20100101 Firefox\\/97.0\"}'),
(24, 52, '2022-02-28 10:19:39', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(25, 52, '2022-03-01 10:09:02', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(26, 52, '2022-03-01 20:20:16', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}'),
(27, 52, '2022-03-02 10:31:38', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/98.0.4758.102 Safari\\/537.36\"}');

-- --------------------------------------------------------

--
-- Table structure for table `mail_logs`
--

CREATE TABLE `mail_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_logs`
--

INSERT INTO `mail_logs` (`id`, `patient_id`, `email`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'john@gmail.com', 'Success', '2022-02-24 15:24:18', '2022-02-24 15:24:18'),
(2, 1, 'sample@gmail.com', 'Success', '2022-02-24 15:30:41', '2022-02-24 15:30:41'),
(3, 12, 'john@gmail.com', 'Success', '2022-03-01 10:12:15', '2022-03-01 10:12:15'),
(4, 8, 'aadeyemi@qistang.com', 'Success', '2022-03-02 09:56:01', '2022-03-02 09:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_02_07_162603_create_antigen_test_results_table', 2),
(13, '2022_02_07_171022_create_test_categories_table', 2),
(14, '2022_02_18_145458_laratrust_setup_tables', 3),
(15, '2020_11_20_100001_create_log_table', 4),
(17, '2022_02_24_152438_create_mail_logs_table', 6),
(19, '2022_02_07_151843_create_test_results_table', 7),
(20, '2022_02_25_133801_create_file_upload_logs_table', 8),
(21, '2022_03_01_185312_create_patient_doc_numbers_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_doc_numbers`
--

CREATE TABLE `patient_doc_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_doc_num` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_doc_numbers`
--

INSERT INTO `patient_doc_numbers` (`id`, `patient_doc_num`, `created_at`, `updated_at`) VALUES
(1, 'BIX-034705', '2022-03-01 19:24:05', '2022-03-01 19:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2022-02-18 14:07:05', '2022-02-18 14:07:05'),
(2, 'users-read', 'Read Users', 'Read Users', '2022-02-18 14:07:06', '2022-02-18 14:07:06'),
(3, 'users-update', 'Update Users', 'Update Users', '2022-02-18 14:07:06', '2022-02-18 14:07:06'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2022-02-18 14:07:06', '2022-02-18 14:07:06'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2022-02-18 14:07:07', '2022-02-18 14:07:07'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2022-02-18 14:07:07', '2022-02-18 14:07:07'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2022-02-18 14:07:07', '2022-02-18 14:07:07'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2022-02-18 14:07:07', '2022-02-18 14:07:07'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2022-02-18 14:07:08', '2022-02-18 14:07:08'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2022-02-18 14:07:08', '2022-02-18 14:07:08'),
(11, 'test-result-create', 'Create Test-result', 'Create Test-result', '2022-02-18 14:07:08', '2022-02-18 14:07:08'),
(12, 'test-result-read', 'Read Test-result', 'Read Test-result', '2022-02-18 14:07:09', '2022-02-18 14:07:09'),
(13, 'test-result-update', 'Update Test-result', 'Update Test-result', '2022-02-18 14:07:09', '2022-02-18 14:07:09'),
(14, 'test-result-delete', 'Delete Test-result', 'Delete Test-result', '2022-02-18 14:07:09', '2022-02-18 14:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(13, 1),
(13, 2),
(14, 1),
(14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2022-02-18 14:07:04', '2022-02-18 14:07:04'),
(2, 'administrator', 'Administrator', 'Administrator', '2022-02-18 14:07:14', '2022-02-18 14:07:14'),
(3, 'user', 'User', 'User', '2022-02-18 14:07:18', '2022-02-18 14:07:18'),
(4, 'front-desk', 'Front-desk', 'Front-desk', '2022-02-18 14:07:19', '2022-02-18 14:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 51, 'App\\Models\\User'),
(2, 52, 'App\\Models\\User'),
(2, 53, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `test_categories`
--

CREATE TABLE `test_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_categories`
--

INSERT INTO `test_categories` (`id`, `test_name`, `created_at`, `updated_at`) VALUES
(1, 'Covid-19 Antigen Test Result', '2022-02-07 19:29:45', '2022-02-07 19:29:45'),
(2, 'Covid-19 PCR Test Result', '2022-02-07 19:29:45', '2022-02-07 19:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_sex` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_nationality` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nasopharyngeal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `oropharyngeal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sputum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_samples` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_collection_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_collection_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_timer` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `patient_name`, `patient_sex`, `patient_dob`, `patient_phone`, `patient_email`, `patient_nationality`, `patient_address`, `nasopharyngeal`, `oropharyngeal`, `sputum`, `blood`, `other_samples`, `lab_code`, `result`, `result_date`, `sample_collection_date`, `sample_collection_time`, `passport_number`, `patient_location`, `document_number`, `patient_type`, `result_timer`, `created_at`, `updated_at`) VALUES
(1, 'Omo Thompson', 'eyJpdiI6Im1xVHY3dFVlb1pMUkgwcEYxQUNiT3c9PSIsInZhbHVlIjoiM01mbm1peHpvTy9TdUQyVGxjNWdPZz09IiwibWFjIjoiZmI2NTVjMTdmNDdjMzVlNmM3ZDY4MDZhZTg0ZDIwYzgzM2Y2ZGYzYzNkZjBkZWIzNWI2YWVjY2U4MmI3NzhjYiIsInRhZyI6IiJ9', 'eyJpdiI6IkVZaU5kS0IzSnE1RDQ1MjBYOVpoQ1E9PSIsInZhbHVlIjoieUtZaDQ0R0NoVHBOQ0tobU96dzdMUT09IiwibWFjIjoiZTE3NjVkNzRlNGE1YTljY2M2YTQzZDVhMzYzYTRlNmFmMGE5NjEyMjhjNTVkZTI3MTJlNzA1ZDEyMTk2Yjk5YyIsInRhZyI6IiJ9', 'eyJpdiI6Ikh6RmtQZ1dBQS8wTXBQQUp5WjhKclE9PSIsInZhbHVlIjoiWlhyamJBVU5xNW1QS1lzUWN1SmpkZz09IiwibWFjIjoiNjJiOTEzMGZlZGJlNjdlNzkzMDVlZTRkYTg2ZjlhZTI4OThmZmU1YzhlNGZjNzRkMzg4NGZlOTZiNGZkZTk1NCIsInRhZyI6IiJ9', 'eyJpdiI6IjhMRUdlMjhvVXpZRGZVaGVycTloMWc9PSIsInZhbHVlIjoiYlRqY0E4NjdOZEZDOHRxdU9tRDVEMzBYY0xjZ2lkZ1Z4K2U2VzBwVXFWdz0iLCJtYWMiOiI5MmRiZDY5ZDFiMGIzZTJkZWY2MzE3M2E5MDVhZmZiYWIwZTFhY2JiNDVlYjFmOTE1MmIxZTg1ZWIwMGNmYjdhIiwidGFnIjoiIn0=', 'eyJpdiI6ImdCMUFzenNyT2QvaGhRV21RM2RvOFE9PSIsInZhbHVlIjoiamU4S0w4QjdseEZVdlF1N1YzV28zdz09IiwibWFjIjoiMzViN2VlODQ1OTM2ZWE0NDRlNzBkOGZhOTM0ZWM1Y2Y2NjU2ZDQxNmIxNzdiZjFlYzdjN2YwYWY3YTU1YWU4NCIsInRhZyI6IiJ9', 'eyJpdiI6ImRUeG56bDZra3czQWUyb3RmYjVnL3c9PSIsInZhbHVlIjoidG1sQmpQNUEyQ0R3OGtxVXI2WCtRVng1eXRFVG0wNEQ3cnAyVFZFTTdOdz0iLCJtYWMiOiI2OGYwNmE3NTcxZjU2NTk3OGJjZDVmM2NiNDAyYTA0ZWQwZTE3NDFkOGJmYzdjZmI5NTNjODEzYjE4OWZhMzdlIiwidGFnIjoiIn0=', 'eyJpdiI6ImVud0ZXL3ZtMnlyeWRsZWxqemYvc1E9PSIsInZhbHVlIjoiM2hlM2MzT2RHT3NiWmpRU0lZR3ZqUT09IiwibWFjIjoiZGRjMWY1NzM0ZmFlZTc2YjA0NWY2N2ExZjg1ODQzZjBhY2ViYjMwMTk5MjcwZDNhMTg5YTZhMWEyMDVkMmUxNyIsInRhZyI6IiJ9', 'eyJpdiI6IlFvNU5QU2h5QjFuaXkzb25CeXNLV0E9PSIsInZhbHVlIjoiOE8rWFlMcVN3aXdxb1BqWkhnMC9vdz09IiwibWFjIjoiZTMxNzZkNzM3YzRiMDM5Zjk5MDFmZmE1ZWNjOGU5M2VmZmUxMjNkNGEwNmU0NWUzOTQ4ZmFkNjg0ZDFkMzBkOCIsInRhZyI6IiJ9', 'eyJpdiI6ImxBV0dVUisva0h0Y1ZBOHBPVWJNZHc9PSIsInZhbHVlIjoiTktWZnNUQUkxM2llRzR0WWZnQ3JBdz09IiwibWFjIjoiM2M2Zjk2ZmRmMTQyNGU1MDg2MmMwMGIwMDliMGI0ZTBmMGZjM2M0OWJiZTdmNGExYTFmYmU3ZmU0YzI2ZDZmZCIsInRhZyI6IiJ9', 'eyJpdiI6ImJaYkN4R0haQ2RhdzFZZzFGQmpRZVE9PSIsInZhbHVlIjoiTllqRi8ydkFwanJldU5NYVpERjNsdz09IiwibWFjIjoiNjZiMTFkNTE3MTA5NjEzOWVmOTk0MjM2OGU2YTcxZmNjMzBiMmQ3NjQ1MzI1ZjAxZGQzYmU3YzQ2YWY3MWZkNiIsInRhZyI6IiJ9', 'eyJpdiI6IkVKNUg4bDNqdXM4a2N1YU56dnFmOEE9PSIsInZhbHVlIjoiVnh2RmltK3gxaUoydENJTGlYcExtUT09IiwibWFjIjoiMDllNjA3OGVkOGUzNzcyNjY1MGIzYzIzMmJiZDJiMjJhY2IzNWM5OGYxOTQ2MGNkN2U4ODg3MzRhMzU2NWFlYiIsInRhZyI6IiJ9', 'eyJpdiI6Ik1nY29tcnozK2xIMmxWdnA3dGtFUmc9PSIsInZhbHVlIjoiN1FaRFRPNXcxVGxZWjlVamRUSktTQT09IiwibWFjIjoiMDE1NTg3ODcxYjEwMzAwMzYxMGNkMGNkODE4ZmI3NDlhNzU4NjI5YWVmNjk4ZjZlZjdiYmQxNDM2MzI1NGFlOSIsInRhZyI6IiJ9', 'eyJpdiI6IjdKUUUxeFZ0UW13MDRLUFplR2U3NEE9PSIsInZhbHVlIjoiU2IwOFA0c3VYS3gydHdtMWxFN2tqUT09IiwibWFjIjoiMTdlMDYyNjRmMGVkYmJiYzdlMGQ4NDI3NDIwOTZiNmEyY2FkMzlmMjQyMGY0MmQ2ODU2MzM5NDIxZDRlZDE5YiIsInRhZyI6IiJ9', 'eyJpdiI6IjA0K0hKbFpTSXJNU2thbDc0aUwzY1E9PSIsInZhbHVlIjoiM3VwMXR1UGUraENYcytyS3ljbFIwdz09IiwibWFjIjoiMTczNGQ4MWIyNmI3Njg2OWU0MGMyN2VkZDczM2I2OTI1YjkxN2JjYzhmN2VlMDEwYzI2NWRjYmM1N2E1NjRjYyIsInRhZyI6IiJ9', 'eyJpdiI6Ik1BVWFpL3Rrb24xbDlmRkYreEpTVEE9PSIsInZhbHVlIjoiWTJkMGRWcC93eCtwMiszcFRkTG9PZz09IiwibWFjIjoiZDA3NWZjN2QxYzhkMjRiNDVhMWM3ZDBhMjI1NmIwZjNiYmFhNjZhNjAxOGRjOWJmMmVjNmM4NzU5Y2U1Y2IzYSIsInRhZyI6IiJ9', 'eyJpdiI6IkUyK2l2NGZpbWNJWS9aTktnbXZQeHc9PSIsInZhbHVlIjoibWM4MUExL3dhTktYZ2F1bi93ZGg5UT09IiwibWFjIjoiZjI4MjZhYWU5NDMxMmQyYzBiMmI3YjllZDc4ZTc0YzE3YjhkN2NhMzBhZmVkNjkwZjMwNDhiZTEzMjdmZWExMSIsInRhZyI6IiJ9', 'eyJpdiI6ImtMT0JHbUM3SExRQmpGdHBkMTVXV3c9PSIsInZhbHVlIjoiRzFCZ3l4QUpvaVJ4djdYVjA0bVI1Zz09IiwibWFjIjoiNjQ0OTE2MmJkYWZkMjg5MDRkYTY2OTVmY2RkODAzYWQ3OWQ3N2EwNjJmNmM0YjJjYTI5NDhhYWYxYzVhZWM0YSIsInRhZyI6IiJ9', 'Lagos', 'BIX-34706', 'Express', '2022-02-02 02:19:00', '2022-03-01 19:27:28', '2022-03-01 19:27:28'),
(2, 'Omo John', 'eyJpdiI6InZPWmRMRHNFdit2anp4ejVkYlZhckE9PSIsInZhbHVlIjoiNzBTUzNLTzByblJieUYzK25HVjRkdz09IiwibWFjIjoiNGI3OWVhNTgyNTcyMzNiMzZlOTcwMDMxNmY1NTU3ZjM0NTQ4MTZlN2Y1ODVkYjA3OTUxNDY1YTgxZTVjMjczZiIsInRhZyI6IiJ9', 'eyJpdiI6InhCM1VWSUxyNTk4Nkp4MVNlaU5kckE9PSIsInZhbHVlIjoiYitBY1RCSytpR292d0FOZVVoTDBGZz09IiwibWFjIjoiZDczODQ0ODhhOTE4OTJjNDI2NDdkOTcyMDkyYjE1NjBkMWUyOWUzZjJjNzliNDg0MjA4OWY1YmU2NTM1NGZkYSIsInRhZyI6IiJ9', 'eyJpdiI6ImlxZGNPRS94U2JnZnF1WXJacG1ia0E9PSIsInZhbHVlIjoiZTdrZ21FTDUycEpnUUQ0SjJJdHdpUT09IiwibWFjIjoiZDU1ZGY4MzczMGMxNTcxMmMyYjI5NDc4ODRmYThlZmVmNDNhNTA5ZmQ0MWE4ZTM4YTRiZTljYTc1MDBkMTIxZiIsInRhZyI6IiJ9', 'eyJpdiI6ImdMUmhyUmJmTkt1WnMxRHpvUk1XVkE9PSIsInZhbHVlIjoiR3Y0VTdhcW00MVE4V2dkS3VYR05ZY0J2YklSVm5GamRDcVNYVkFWbmxHND0iLCJtYWMiOiIyNmRlODZlMGRhYzg0MTI3Y2ExOGQxNjNiM2Y5MTFiNDBkMGYzZDIxODA4YTU5YjBiMjFmOTUwM2IzM2NkM2ZjIiwidGFnIjoiIn0=', 'eyJpdiI6IkZOcmoyMzQzZWJMTUt6WGxCcVBkMEE9PSIsInZhbHVlIjoiNk54R1QzaVBxb3RrclRHR3M4c1dIQT09IiwibWFjIjoiOWUzNDIzNTY2NmZkMWEwMDQ4MTEwZmU5YWY2MzczNjE0ZWM0ZTE0MzMwMTVmYTYxOWFmZmM3NTYxOGExOGIzYyIsInRhZyI6IiJ9', 'eyJpdiI6ImEyZTBaWFNlVWlsUnhNaGFTWERMcGc9PSIsInZhbHVlIjoicEJ1Ukw4NWJkeXZUUktDRUhaRVR2cmZsTnRQQkJvbkthQXhjTkJnYmNiOD0iLCJtYWMiOiIwMzk3NmIzYzM2NmM2YjA2OWRiMTRkMzZlZmJlNjkyOTRkMDRkYmY0ODllZmY0NTE0YmI0OGYzNTI5Y2NhZDlhIiwidGFnIjoiIn0=', 'eyJpdiI6InlyWGpqMzdjVUw1VFdKdE1FRGhsMWc9PSIsInZhbHVlIjoiS0k0MEFETWZsSWtuY3oyUjBZYmNzQT09IiwibWFjIjoiMzk1MmIyZDMxNWQwMjI4NWFhM2Y3ZDJkMDVmYTYwOGE3ZWFjZmY3YmM0YWY0ODdlYTE3NTA3YTgwYTUyNWQwNCIsInRhZyI6IiJ9', 'eyJpdiI6ImEwUnFZdS9XYW5nVHBVbmk3bk13M3c9PSIsInZhbHVlIjoiV0grRTJ3Rk5WZnoyN09BTE1iK1crUT09IiwibWFjIjoiNmRmYjMwOTI4NTY2ODE4Yzc4YTMwOTlhNmEzNjU0YmU5ZjQ1OTNhNDk5YTNjNWU2OTg0MDc0NTgxMjY5NDhlYyIsInRhZyI6IiJ9', 'eyJpdiI6IjE1eCtYdWNoSGZlZWlzOU5yVlVWYXc9PSIsInZhbHVlIjoiZkdNL0tIZUMwZ0FaR1lKMXZ5RHRmZz09IiwibWFjIjoiZWNjZDc2ZjhhNzYxMDMwMDZkOTI4NmNkOWExZTIzMjU3ZWE5OTExYzMwMGVhMzBkYWRhZTgwYmU1YWY0MzQyYSIsInRhZyI6IiJ9', 'eyJpdiI6InJzdERMbVNWeWNSNTJ4dGlNeXV3d0E9PSIsInZhbHVlIjoicEJJUDJQUHR5dXVVdWNjSlVUazFBQT09IiwibWFjIjoiYTYwNWQ1OGEzZmUzZGU0OTM4YmFlZjEwMTE5MTUxMmYxOTU4YWQ4Y2EzZmIyOTBjOTBmZTg2OWJhMmM1YTdlOCIsInRhZyI6IiJ9', 'eyJpdiI6Ii84S1h4QUdhWSsrbExKd0QxMjA1dVE9PSIsInZhbHVlIjoiUHpvQkpwZi93MnNCb0FhR3k2VjNGZz09IiwibWFjIjoiODFlYTljMGQyZGVlZDkzMTg1ZjM4OTUwNzhiYWUxMWE0NzFmZWRlYzNmMDZmZGRiNzA0YmZhOTA4MDMwOTIxYSIsInRhZyI6IiJ9', 'eyJpdiI6Ijlhb3BSSFRRYk1OT3lENGwvZzlNU3c9PSIsInZhbHVlIjoiNGJaSzg4OXJNYlNzUnZXWjVBNnRadz09IiwibWFjIjoiYjM5YWVkZjQwYzNiNjY4ZWM2NmYxMGVjZmMwMmQ0MDliMjJhMzFmMTM2OGNhYjcwNDMyMGVlNjMwMzZkNzY3YiIsInRhZyI6IiJ9', 'eyJpdiI6ImlKS01MWFRtUjREVmY1L0xvMVBNdVE9PSIsInZhbHVlIjoiWG1JRm1XOFlNYTZZQWFrdmlWak9Zdz09IiwibWFjIjoiOTc3ZWVhMmI3NWNkZTQ1ZTgxZjFjYTQ2YzNlZDc4YzlmMmU2NjgzYjZhZDNiMDI5OTBjNTljNWIyZDUzNjI2ZSIsInRhZyI6IiJ9', 'eyJpdiI6ImhtOXJjZTN6V0YrSjFUL29TWFRES3c9PSIsInZhbHVlIjoiWm1Ic0tDWDJIL1FVS3MzYTNCZlV1QT09IiwibWFjIjoiZTI4MTE0YTNhN2ZiMGE0MTgzNzU5ZTExYjRkYjljMzBjZTM0OGI3N2UwZWUwNGVjZWMwZDE5NzI0MDMxMDViZCIsInRhZyI6IiJ9', 'eyJpdiI6IjFDL1VTVjRSaDhlcW1DT21JVEV4RFE9PSIsInZhbHVlIjoiNDE2WUcxVjFFY3V1K0FBZWpBVmlJZz09IiwibWFjIjoiMDQ1Y2I0ZGUwMThkNTdhNWMzZDdiZDZhYjdkODlmZWYzM2YzMTMzOGJlNTZkMmE1ZDNlM2ZjMmM2YzQzZTQ1NyIsInRhZyI6IiJ9', 'eyJpdiI6IlBnVVlDQmdVSllwZlBCcHI1WXNJQVE9PSIsInZhbHVlIjoiNDNQaEwwa2pNWTBWK0NER0FOc1Npdz09IiwibWFjIjoiMWY4ZTU0ZWU5ZjE5N2RhZDAwNzhhZDMyYTFlMzYxNzhiZjVhZDIzNmIxODZiN2RjNzJjMWRmNWE0ZDUyYTRhMiIsInRhZyI6IiJ9', 'eyJpdiI6IitqVWhsNnR1bUNoWnU4NUV4OVNrckE9PSIsInZhbHVlIjoicW5vbWxhVEJEdnA5RGdvVmJ2eHA4QT09IiwibWFjIjoiYzA4M2QwNmYxZjEwZmRkMGNjZjdkMWVlNmZiYzI1MTk4ODRmMzg2OTY3OTU4MjFmMGM3MWU1MGM0MDllODNmNCIsInRhZyI6IiJ9', 'Abuja', 'BIX-34706', 'Immediate', '2022-02-02 03:20:00', '2022-03-01 19:27:28', '2022-03-01 19:27:28'),
(3, 'Omo Thompson', 'eyJpdiI6ImtCNktmbldCam5sVzl5ZTFVYXNxSWc9PSIsInZhbHVlIjoiMTJhdXhYU2ZyTnVKY1M0eGw3b3gzZz09IiwibWFjIjoiZjg0NTEwZTRhYmFhYjBlZWQ5ZmUzMDEzYWE4MTA2NDdhYWZmYzFjZDRiNDAyMjUxNWZjM2YxYTJjOGRkNjZmMyIsInRhZyI6IiJ9', 'eyJpdiI6IkNYbmcvallHcERSclM2eEJKT25SUnc9PSIsInZhbHVlIjoielZFcVI0NXgwYTRqcDJsc2p0dURJUT09IiwibWFjIjoiZjk1MjE0NDY2NzcyZDZhNmMyY2I2ZGRiNzk3NzYyYTFjYTA0MDM5NWZlOWVkYTFkNmEyYjZmMjZiMTg1YTIzZiIsInRhZyI6IiJ9', 'eyJpdiI6Ind3NGo3ZmhZb21ZdjFFM1N3RlpiZ1E9PSIsInZhbHVlIjoiNmZ4ZkFXK1VJamd2cWx6R0tnLy95UT09IiwibWFjIjoiOTQyMGJiNzFkMTY0ZmVjMzljNjc3ZWI4ZTJlOGFlMTM1OWQxNjMyNjVhNjA3NTQ0ODk0MGIzYzNlOGYyNzY0OSIsInRhZyI6IiJ9', 'eyJpdiI6InNyamxPSG5SVUhjWXZGdTNURTFoQlE9PSIsInZhbHVlIjoicmVCei9aVURxdjFsMDdSMnlMNCtGNk92dGw4VHVrVE1mWUs2cjJYam9Jaz0iLCJtYWMiOiI3OTcwOTk5M2NmYWZhZjM4NDZmZmUzYjFjMjZhMWM0MGFlNThjYTMzNTlhYTdjNDQ4YTVlZmYxZGMzNzU1M2Y2IiwidGFnIjoiIn0=', 'eyJpdiI6ImFwUTNIZ2lyU0g2aGk1Mzl4MDhpcnc9PSIsInZhbHVlIjoiZVM5VS9nZHJzbjlweU1TMG9RWkVJdz09IiwibWFjIjoiOTFlMDM0N2JkNjBiNGVmYTA1YmVhMmRlOTRiOWE5ZjdiNzI3MTYzMDk0NGI3ZjdiMTg1YjRlN2MxYjU5MTUxMiIsInRhZyI6IiJ9', 'eyJpdiI6IkdIU3lwSUFFVHZRbjlrVFQremRxNEE9PSIsInZhbHVlIjoiYnR4L2F1eDB2NGNsNEpUR1dxaE9pU0N5RjVDQy8rait6RGdYY21CWnVmND0iLCJtYWMiOiI1YmNlNDE0ODY2MTNlOWIxMjZiNGYxZmRmNjFmMjYzYTQ5MTI4YzJlYTQ4ZDA1NTZkNTkwNjMzZTZjMjZhYWQ3IiwidGFnIjoiIn0=', 'eyJpdiI6Ii9JYksxT3c4eHYxbWpvUEVGMHI0WWc9PSIsInZhbHVlIjoiTWhFSitpNjhkTmhSTVNnRHhvNGZJdz09IiwibWFjIjoiNGI4YzczZmViMjAyY2IwNWI2MWVlMDJmNDNlZTBmY2NiODI5MGQ2NzEyOTRjZmUwMzBjZTkyMTllNDhiZjZhNyIsInRhZyI6IiJ9', 'eyJpdiI6ImoxQTVwdWxQMFVkRmdyb0RJTkFYOGc9PSIsInZhbHVlIjoiZUJVaDBLVU9DajBwRzVhMDY1Q1JNQT09IiwibWFjIjoiZGZmMmVkNzMzNTNiNGZjZTY0ZDI5ZDg5YjkyZjI5OTU4MWE5YTIyYWY0MWU3ZDRiMTJiOGEyMmJmZTIwZTVhNCIsInRhZyI6IiJ9', 'eyJpdiI6IjdTaXRuY2pHeERtY0pBTEJKRHljWXc9PSIsInZhbHVlIjoibjV4cmVxclpUK1lYSnFvQzNCa3hhQT09IiwibWFjIjoiMmM0MjBiZDUyZDNkZDJmMDFlOGVlMjI5ZmU4MzlhNDYyYzkzYzM1NDhkNGE2YzEwNjkyY2EwZmVjNGY1OTdlMCIsInRhZyI6IiJ9', 'eyJpdiI6IjFnMkQ3S2VlTGJTc0NMbjdiN2hLbHc9PSIsInZhbHVlIjoiQVkzay9NSmNjMzhyOTJpUTUwMndkUT09IiwibWFjIjoiYWI2NGM0N2YyNjQyMTE1Y2FiNzE1Mjk3Y2FjOTZjMTVmZTBiYWM0NzA5ODIzZDU3NjYwYTVlODM4YmJiNDkwZiIsInRhZyI6IiJ9', 'eyJpdiI6Im1ISVpKK1YvMURjZ054N3pMeEg3dnc9PSIsInZhbHVlIjoiY2RzV3N4M1dUanVKTnQxSGdEc0tLdz09IiwibWFjIjoiYjhjYTUwYWI1Zjc5ZmNhMTM5ZGNmYmY1MDhhNWIyYTE5ZWI5MDA5YjViOGNkNTdmMTBlOGQyY2NiMDdjM2Q2MSIsInRhZyI6IiJ9', 'eyJpdiI6IkhqSHdXRVhEcm1QWExBNEJta0xVU2c9PSIsInZhbHVlIjoiUFU1QU9oeTlrd09Ea3l3VGlycGZsZz09IiwibWFjIjoiZTY2Mjg0Y2E4NDM5ZmU5ZTA1OGFhN2QwMGIzMmNjODEwMzYzY2E1OGY2ZTUxNjAzNjRjMWJkNzI2OWNiOGZlMyIsInRhZyI6IiJ9', 'eyJpdiI6ImtJZjFMMGRXTHJiOUlNUjBBYjV3SlE9PSIsInZhbHVlIjoiNC82bkp6V1R2VFVUU3A5VSt5VHJRQT09IiwibWFjIjoiYmUxOGMxMjE5ODdiZTExMmJlYTI3YjE0YjBjYTEyY2Y5ZjY3MjAwMTU1NjBmNTk5NzFlOTc3YjAzNzcxN2UzYyIsInRhZyI6IiJ9', 'eyJpdiI6IjVDQXAvTncxK2ZCa0h6Wlczdyt2dUE9PSIsInZhbHVlIjoiZ3RHQlJyTnNudTA3MFZqU29Dak1PZz09IiwibWFjIjoiYjM2OWRkMzNlZTFhYWE3YmZjN2E5N2EzNTE2MDU1ZTUyNTdkZTk0OTdjZGI0MDI3Mjg4ZWYyM2M5ZWM3MDU3ZCIsInRhZyI6IiJ9', 'eyJpdiI6IlNOM2xsZHpLdjBjZS93c25lTEFUcGc9PSIsInZhbHVlIjoiZVdLeFlpaFVwcHNsdGdSNjJuUmRBdz09IiwibWFjIjoiN2VhNGZjZmU4NGYyNmMyY2QwM2NkZjkzZjZlYjhjMTY2NzRkYzJmNTE2NzJjMGY0M2EzNGRkOTI4YmM3NDgwOCIsInRhZyI6IiJ9', 'eyJpdiI6ImRPMUVVbElBVVpUbXl3bWY1Ym0yZHc9PSIsInZhbHVlIjoiUUpFbWtXbkV1QVlQRy9hSEQ3R0VNUT09IiwibWFjIjoiODg5NDJkZWRhNjM3YmExMzYyYmIzNjdkMmMwOTlmZGFlMmQ0ZTU1MzU1Nzk4ODgyMzVmMWZjM2VhMjI1M2U2YiIsInRhZyI6IiJ9', 'eyJpdiI6IjNKcGZhRmFXV0NUMnkzRHNZbU1pK1E9PSIsInZhbHVlIjoibndrVGRvWThIdjBPYlcwMS9OcUNvZz09IiwibWFjIjoiN2ZhYjM2NmU5OTEyNDAwMTg0YjQwMDI2ZWQ3MWFiN2VmNWM1NzVjOTk3MWE0OGRiZjljMGJlNTg1NmFkODM0NCIsInRhZyI6IiJ9', 'Lagos', 'BIX-4707', 'Express', '2022-02-02 02:19:00', '2022-03-02 09:33:35', '2022-03-02 09:33:35'),
(4, 'Omo John', 'eyJpdiI6IldOWUFCMGxJTTRtVDFaZHRDQm0yY0E9PSIsInZhbHVlIjoiVGZtSHVCd3RQdmhlQTQ2aHZGUUNpdz09IiwibWFjIjoiMjEzMDBhNDU5NGZkODg0M2RiYmQzNWM5MDY4ZDQ4NTkyZTYwYzg1YTQ4OTZkODZkZjA1ZjJmNDdmMDVmNDQ2OSIsInRhZyI6IiJ9', 'eyJpdiI6Ikc3aVRZQkdkZlkvRWFqamROZENLMVE9PSIsInZhbHVlIjoicXY0NDFSRGFXSmJmeHVBM1lCV0JZUT09IiwibWFjIjoiMWM1ZjA4M2NmNGYzMzEzMDQwMzRiNzQ5ZjYyN2U1M2RkMWJjMGYyYjkzYjBhMjU2NTY1NDliOTAyMDUyYTNiMyIsInRhZyI6IiJ9', 'eyJpdiI6Ii9sSys1Z1QvZEk4KzhxUjh6UFhwQ1E9PSIsInZhbHVlIjoiUnFtRVdpYWZnR2RkYlY5NUNEVWJhUT09IiwibWFjIjoiNGVkN2RlOTY5NTgzNDhkMTBkZTdmZjc3YTQxMDJiMWE3Mjg2MmYyMzIzMjI5YjFhMDJmNjg3Y2FmMTQ2NjQyYSIsInRhZyI6IiJ9', 'eyJpdiI6Im8ra3JiMllSNHozZVJ5OXFjaFh0RWc9PSIsInZhbHVlIjoib3pOOHhwQUE3MzRGaWpUV2pIOUxBN2xrSkp2RkZ6c01aQWEyUzhub1Rhbz0iLCJtYWMiOiI5MDhlNTJjMDY2Nzg1YzMxNDgyYTk4ZjAzNTFmZWFiN2Y3NmI4ZTFjY2Y4YmQ2NzRlMTcyMGQ5YzIyZTBjMTI0IiwidGFnIjoiIn0=', 'eyJpdiI6ImcwZmhoVGk3MXpKTGk0emZjV1BsMHc9PSIsInZhbHVlIjoiTnBvMUxHY1o3QkgyYm96cGhYUExZUT09IiwibWFjIjoiNGI5YjAyNzE1OTg2Y2QzZmU0OWJiNDY1ODQwNTBjNzJjOWRiY2IxMGRmNDZiZGQ0ZTY1NGY3OGMxNDZkNjAwYiIsInRhZyI6IiJ9', 'eyJpdiI6IlNNU2RmdzlQY2FPMkdBRGhtT28wU1E9PSIsInZhbHVlIjoiQVdpOEVOV0tNQXcrRTQxa2Nna0k4ODU1USt6L2tPc2R0QVQzWDRMeWtMaz0iLCJtYWMiOiIwMWQxMjc0NGY5Y2VjZTY1YzMwYjVlZGRjNzQ3NWI4YmQ1NDkwNGQxM2NiMmRhMmJjNDI3MWQ1NDIxYzNjZmQyIiwidGFnIjoiIn0=', 'eyJpdiI6ImFnUlUyUm00S2NZZkRIUWRNSW91a0E9PSIsInZhbHVlIjoiSWcvREplR2lsbkVRZVlZa1BhQjRXdz09IiwibWFjIjoiZWNiZGY3ZWRlNTNiY2U0YWYwMTU3YzhkNTUyNWJmNjYwZTdmMGJiNTc4NDM0NDRlZWQ5MTQ4ZmJiNmFjOGRlYyIsInRhZyI6IiJ9', 'eyJpdiI6ImdFb1ZyK09VME1YMmxSOG5vdmVRNmc9PSIsInZhbHVlIjoiUFBTT2MvVkhFWEcrN1NnRUZDQTd2dz09IiwibWFjIjoiMDMzYzg1ODEzODI2MWEzN2Q5MTRmZDJmOGFhN2E3NjNiMjAyZTg4NTA3MDI4ZWZhOGNlMDkyNjc4MTFjMThmNCIsInRhZyI6IiJ9', 'eyJpdiI6IkVva3FHQXo4ZmYwTUF5dDdVVWlCbGc9PSIsInZhbHVlIjoidEMwWmNadFFqY0Y0OHZyQUduT0IxUT09IiwibWFjIjoiMjFkZGU5MGIwYTQxYjhjYjc5ZWE0MDM4MmFiYjhmMzE2OGY1YWI1ODAyMTgwNWQ0Yzk3N2MzNjk4NWFmYzE1YiIsInRhZyI6IiJ9', 'eyJpdiI6InR2V0IrNkxyV2NabVJBa2g3RGFLbWc9PSIsInZhbHVlIjoiRTM1L3NnNnA0N0YyRmYrSjFoSXVpQT09IiwibWFjIjoiZmY5OWRhMmIwZjhlMzU1NDlmMzJkYWMxZTcwMmY2OWM3Mzc2MWZkOWE1YjkzOTg4OTYzZjExY2Q3YWFlODBlYSIsInRhZyI6IiJ9', 'eyJpdiI6IjdvdTBqbGpBWDdkMkF3S0E4cTVUbmc9PSIsInZhbHVlIjoiQ1hzdENhMXBnM3o5QkNBQkN3ejN6Zz09IiwibWFjIjoiMjk5M2U3NjE2MWYyZmE2NzUxZTcyNDc1NzIwODg5ZGFhYWY1MGE1ODRmZjM3NzU3NDE0NTE0NGZiNTA5OWI1NCIsInRhZyI6IiJ9', 'eyJpdiI6IjlLUG5FbGFEd1dxNUJjcDBmSk5YNEE9PSIsInZhbHVlIjoid21NeWpkcWRiNlVKWkVYRkVvcEZnZz09IiwibWFjIjoiMDY5MzFjOGRiMWY3NmU5Yjg1OGQ4NmZjY2RmNmFkNDI4MDQyZTU2ZGFkOWRmZGIzZmE2MjNhMDYzYWZlM2E0NyIsInRhZyI6IiJ9', 'eyJpdiI6ImxoMElwZDdrUE5zYU5nTVI5UDRvaWc9PSIsInZhbHVlIjoidlhWOTB5MXN3YnYra0xWK2dPeEpwZz09IiwibWFjIjoiZjE3YWRlYWRiZmY0YmNjMDAxZGZlM2Y3MGQ4ZGUwMDlkMDM0MGRlYmEwMTQ0ZTBjY2Q3Mjk3ZWMzMWRhMzkyMiIsInRhZyI6IiJ9', 'eyJpdiI6IlFrbVl0SmlXb1pHWUlybCtGVWpsaEE9PSIsInZhbHVlIjoic0dvVWtYWFdxQ3NRYWpwYWNSZUtWdz09IiwibWFjIjoiN2FjMjk5ZGRmZGZiNzA3MWZiNmFmM2QxYWUxMzU0ZmFlMTIyZWJhOTRlY2VjOTk2M2YzZmRkYmJlMDlkNjkyZiIsInRhZyI6IiJ9', 'eyJpdiI6ImhEZWVSaTRiYzlWdFV4dTFkVlN2YVE9PSIsInZhbHVlIjoicTJjK3IwbVVEQlFyRVVsc2NKY1p0dz09IiwibWFjIjoiOGNlNTZkNWUxYzMxMjlkNzExNThmZWQyOTYwZjE5ZjhiZGRlM2FkYjViYTQ2YjY5ZGM2OWVkNzI0NGQ1NmI1ZSIsInRhZyI6IiJ9', 'eyJpdiI6Ik5vclhiY2wrcElJeE9JeGxTbnZOMUE9PSIsInZhbHVlIjoibnVTVkI5OWtGam5YNHM2WHZ1bmlqQT09IiwibWFjIjoiMDM3YWViNmI0ZWZiOTZlMjcyZWMyZDIwMmJmMzIyM2JlNzMyYzhmZGQ1ZGM3ZjVmZTQ1M2UwYjRhMzRjODAwMCIsInRhZyI6IiJ9', 'eyJpdiI6ImlYZDRZREZiTHU0YkxtQ0ZJaThBZFE9PSIsInZhbHVlIjoickhNL1hjVHVpSlQxcDlVem9yZnpPQT09IiwibWFjIjoiMWY2NjljNmM3YjM3OWNlMWY0YzE5ZTdiYzY5NzA2YTZhZWFiNjUxOGNkYWY4YWE0NGViNmIyMDZmOTY1MjgwOSIsInRhZyI6IiJ9', 'Abuja', 'BIX-708', 'Immediate', '2022-02-02 03:20:00', '2022-03-02 09:33:35', '2022-03-02 09:33:35'),
(5, 'Omo Thompson', 'eyJpdiI6IjhLSmJzelNwejlVUVVnRE9NZFRUd0E9PSIsInZhbHVlIjoielBuY3FFbkYrWUF5TWdVOVI2U0V4Zz09IiwibWFjIjoiM2M5M2Q5YzMxYjY2YmQ2NzJjMWZhZGJhMjUwZDFiMTdlYmUwNGM5MmMwNjUwYjg5ZDhiNDg0NWNkMGI0ZDk3MCIsInRhZyI6IiJ9', 'eyJpdiI6Ik5MUzlET0JHNHpzb2VUTHVJZlBNUHc9PSIsInZhbHVlIjoiSHJRSmpyVVB5NDBXNzJrL3ZQZTMzUT09IiwibWFjIjoiZmViMmYyNjJhM2Q3Y2Q2OWRjODg5MTgxZGJiODMxMzc1NDFmNzczMjlkZjNiMTA0Zjk0OWEwODMzYzk3ZDVjNSIsInRhZyI6IiJ9', 'eyJpdiI6Ims2eEF6OEVBSFU0NGlSZ21nOTFTbEE9PSIsInZhbHVlIjoieDF6UzJ6VXBCUndUMHYxeWw0NHR1UT09IiwibWFjIjoiOTFmMWZkZWUwMzk4MDI3Yjk3OWUyZmYyM2M3ZDdmYTBlYjk4M2NmNGY4NDA1MWE0NTRhMDI3MWU3ODMzMWI2MCIsInRhZyI6IiJ9', 'eyJpdiI6IkFnOFhrM2pBd2hYeTVabTdwOUxHUGc9PSIsInZhbHVlIjoiZXFhdFk3SGo4VTdocU4vRktoU0U1VUpPV0c5TXJpSjlLOWNVMDdGaEZCaz0iLCJtYWMiOiJmYzJlMDk4MWIxM2I4OTU4MjZlNTNkYmVkYTA4N2E0NGZmNzFhMzNhMTBiMTlmYmM4YzgzODA3ZTFmM2QwNThkIiwidGFnIjoiIn0=', 'eyJpdiI6InJwY1RKMEc0K3BNZDZkRnpqZnhQNEE9PSIsInZhbHVlIjoiUkpQVlZHUXl5U1VQcGM5MkxRM0xKZz09IiwibWFjIjoiMmVhYzlmYzY3Mjg2NThhOTkwNjVlYTIwMWU4MmVlOTUzMDNjNGE3MzAyNjEzZmIzZGMzZDczZTllYWU5M2ViYiIsInRhZyI6IiJ9', 'eyJpdiI6IkMrTlpsYWxJdTBwRlRvVTNhd1B0Q2c9PSIsInZhbHVlIjoiMjNQc2lOMnh3dFA5NDZUTWNySTluaEFnRTluUmZzZjZPeXN3MzVXU0E0QT0iLCJtYWMiOiI5MDQxY2FlODFlNTA1YmVmMmVhZmZiYzA0OTAxMzg3OGYwZTMwOTYxNTA4NjdkMzVkOGEwMzA5MmNiZDhhODYzIiwidGFnIjoiIn0=', 'eyJpdiI6Im5lTjFNL2VSZ3BiMEVuOHZlZ1pxeGc9PSIsInZhbHVlIjoiMUJRZ2ZYNkNxeVNlYkl6WG5yQ010UT09IiwibWFjIjoiOTNlN2VjZjg4OGE2YmZmMGM2MmNmZDQyNWRiNGVmZWZiMzlkZjlmYjUxZjJiODMwN2ZmYTZhMmNiOTIzY2E5ZSIsInRhZyI6IiJ9', 'eyJpdiI6IkRDYkl6a0IyN2ZOcWJVUU44aVNCUGc9PSIsInZhbHVlIjoiQmY1dkJESHltV2N4dWhzTklKR0IyZz09IiwibWFjIjoiOWRkOWE4NWUxY2I2YjFkOTE1ZjFkYjYzZWVlZDU3OTc1NTU4NzZlYWE0ZTVmNTliZjQ5YjI0OGYxODEzNjU3YSIsInRhZyI6IiJ9', 'eyJpdiI6Imp4NlhFcGc2TUJXS1ZMOStUaEpKeHc9PSIsInZhbHVlIjoiOTNGZGxhNnAwdFdvMk8wUitjQ1NBUT09IiwibWFjIjoiMTViNDRhNTI5ZGM3MDg2ZTE0ZGU2ZmJkNjU3OTA5M2M2ODEzYTMxYWQzMDI2Njc1MmVjOWNlMTUwZTRmNjMyYSIsInRhZyI6IiJ9', 'eyJpdiI6ImIxWHZwKzFJMnByUGlHYUZaa1g4Q1E9PSIsInZhbHVlIjoiL2NWOE1WVkRtVVhHcU55dmc2NWhvdz09IiwibWFjIjoiMDJkYjcwOGMxOWZhYjdkYmM4ZTk2YmY0ZDFhZTM5ZDQ1OTVhMTA5NzllNWNiMDFmZDRiYWMwMzMyMmRkN2QyMCIsInRhZyI6IiJ9', 'eyJpdiI6IlZ4TXhJNHA0WFE1Z0ppTzd3ZDV5aHc9PSIsInZhbHVlIjoiREVzUWt2L0t4TjZFYVYzb3ArdVI3UT09IiwibWFjIjoiMjViNWI3ZmFjZDNmYTE0YWQ4Yjk5NjEwOWI0NzQ4NzQ0OTdmZGNkYzgyMDg1NDU5MTRjMDE1MzU4NjFlMzEzZiIsInRhZyI6IiJ9', 'eyJpdiI6ImVIY3pKT0ZmOTZmWmVZWDBGbXpKMWc9PSIsInZhbHVlIjoiUjBJMit0eWoyREVqODFsQ2xjUXIxdz09IiwibWFjIjoiYTJiNTU3YTFkMWJhMzRkYzQ5MmZhNmE2OThhZGY0OWYzMTlkNDc3MjU2Y2FjMjQyMWUyYjBlMWFjOTU2ZDE1MCIsInRhZyI6IiJ9', 'eyJpdiI6Ikx3L3gwbmRuTk9vaXdlTTYzSVVSZEE9PSIsInZhbHVlIjoiN0pVaXpQaFpYWE4zS0Vkc1JhN2tFZz09IiwibWFjIjoiZTAwNTFlZjNjYjVjZWIzODRjNTg4ZWRlYTY0MzYzOTQ2ODE2NmU4NTUzNmY1YjlhODMyZTkyYzQ0NzhjMjc4NSIsInRhZyI6IiJ9', 'eyJpdiI6IlEwb3IvY2NhUHQvVWJIWEpEeElmQnc9PSIsInZhbHVlIjoiNEZFM25zV1B5OERBcjZpYVhkcFY5UT09IiwibWFjIjoiMzQwZWY5ZmM4MzJjYmI3NTQyNzJiOWZjNGYyOWQ0ZWVkYWYzNjM5NTI1YTExMDdkOTJmY2FhOGY4N2IxOWM4YSIsInRhZyI6IiJ9', 'eyJpdiI6ImI1SWxQMG8zSEM4T3JTWUo0eHdvV2c9PSIsInZhbHVlIjoiRTB5QzQ4VDIxenZGWmxxbjllTDZDQT09IiwibWFjIjoiNDliOTI3NzE4ZDg3YTMyZDliYWY1ZTU4MGUxN2JlMjM3MmIyMzBhYzg1NjVmNTdjMDk0YjFmYzYxY2YwNjcxZCIsInRhZyI6IiJ9', 'eyJpdiI6IjJQRDZuNzVRWkxEN1BVVW93c2M1b1E9PSIsInZhbHVlIjoiV0RIM2NlbEF1M1RPTFdnR1p6c2c1UT09IiwibWFjIjoiZmU5NDI4NzRiNjZmZmYwZmUxZjZkYmMxZGRlNzZkNTM2NDJlMDNhNmE4ZWMxNjcxZmE1MmM0OWFlNGU4MTk2ZiIsInRhZyI6IiJ9', 'eyJpdiI6ImNrK1V0RE4xZE92UFBJM1N6MGZFZ1E9PSIsInZhbHVlIjoiRUt5dVJzQ3p3V2p3Z1pDeGF5eFY4UT09IiwibWFjIjoiMzFmMGQ3MzdiMDYxNmU5M2E0YjdkOWE0MDc1YTE3NTk2ZGUxOGQyYmM4M2NjZTUwOWU3YTE2NTNkNDE5NjgwMiIsInRhZyI6IiJ9', 'Lagos', 'BIX-00009', 'Express', '2022-02-02 02:19:00', '2022-03-02 09:39:16', '2022-03-02 09:39:16'),
(6, 'Omo John', 'eyJpdiI6IjVTS3ZBcmRXQVlpTC93UmI4blBTNWc9PSIsInZhbHVlIjoibk01TCtzWXZ4RDk1dldqLzV5clVWZz09IiwibWFjIjoiM2QyNTQwMTI2M2NhNTVmYzhlNTk4OWM5ZWMyZDEyODZiMTc5OTRmNDU3M2RiNWY5YzM4OWQ3N2QwOWRmNjU4MyIsInRhZyI6IiJ9', 'eyJpdiI6IlBWaEFFNWJUOVJWRjliWWhLN0k0Q3c9PSIsInZhbHVlIjoia3lqT1BtMUs3Q0FLMEZrb3Q3dncydz09IiwibWFjIjoiYmJmMTNiM2Q1MTE3OTNlZjc4OGExMjRkM2NlOTJlMjgxODQxZDRjZTZjZjFjOWMyNWMzNzk4Njk3MTkyNGM3NyIsInRhZyI6IiJ9', 'eyJpdiI6ImRJYzJ3SEtFbXJSZm1yQlhIb0VvSGc9PSIsInZhbHVlIjoic0k1UW11R3lCaElSeG1WRVF1QUtZdz09IiwibWFjIjoiOTQ3MmY4MmJiOTgxNzdkMDM5ZjkxZWVmODRkNWQ5NGMzZmQ0Y2Q2NzA4NDkzMjlkNjU1ZGMwZmUwYTI2ZGJkZCIsInRhZyI6IiJ9', 'eyJpdiI6IlNsdlBkZ1lmcll0OTMyVUxzQUFzc2c9PSIsInZhbHVlIjoicGV5NTUxdmFNKzNzRndoNDN1ZGtYbnpzRlRqSSsvbjhrMWFGNmFmVUVYRT0iLCJtYWMiOiJkZTY2ZWZiZTkxZTNhM2I0MzY2Mjk3MzRhMjc0YTlhZTNkYmUwYzE4MWE4MzI4YjllNWJkMzExODhlYzMzMjVhIiwidGFnIjoiIn0=', 'eyJpdiI6ImxKQ05rdks2TVVwYlFOUTdwZ0hCZUE9PSIsInZhbHVlIjoiRGxWWlowNlZSNFQzRWxxckhoajBRQT09IiwibWFjIjoiZTNhOGRkOWMwOTlhYTRjY2YxZDI5NmFlOGM2YzdkM2I0MTRiYmJjMDRlZmU1OThmOGM1MzA0OWE1Y2RjY2UyZiIsInRhZyI6IiJ9', 'eyJpdiI6ImlPMW01Q0wxM1FjVXdQYk5hbk9JbkE9PSIsInZhbHVlIjoiVFo3V21wbjFZaHhVT1UxS3RzVkUwQS9CTmdHRkhQNHkwckpqRHN4bUNiZz0iLCJtYWMiOiIxNzc4NjYwMzZiMWY4MmMwMmU5ZDBmZjFkNmQzYzFkN2UyYzU2MDg4M2E1NDcwODY5ZGE2MmVkNTBiZjZjZjdjIiwidGFnIjoiIn0=', 'eyJpdiI6IktMclo2R0ROUkd4bk1PUVRETnRhUXc9PSIsInZhbHVlIjoid1B0dlZtc2cxMGsvQlVQbWNUVE9odz09IiwibWFjIjoiMjIwYWU0NTAwZjk2NTZkYmMyMjczZThjMGE5YWVlYTQ1YTk5MTdhZGFiMDkwNTk1OWQ3ODM5ODk1YzU1ZjliNiIsInRhZyI6IiJ9', 'eyJpdiI6ImJ5T3Znb2RaRTI3dDY4cGxxazM2T0E9PSIsInZhbHVlIjoiK0doSjh4RTBZQytwK2hYMWtwR1RtZz09IiwibWFjIjoiMjY2ZGVmMzI0ODI1NzM4MmE1YjE2YThiY2QyZWVhNGQzOGYwZGMzYTRlMmRjM2FjMGFkYjBhN2JiODk1ZWY3OSIsInRhZyI6IiJ9', 'eyJpdiI6IlJCNnByRG1QLy92djEyMU5SQnEwblE9PSIsInZhbHVlIjoieldRQzdUWWJ6UjhuZ1Jxanp0eW1DUT09IiwibWFjIjoiNGY3MWFmZDgxYzQ4ZTViMjk5MGUzYTQzMmJhYzVjY2E1NzAyZDhiMjcxODcxZDRmNzQ5NTM0NjA2MTI0NWI0NCIsInRhZyI6IiJ9', 'eyJpdiI6IjFqTzh2MFJ2M2pDeEo4SjQxQktIQlE9PSIsInZhbHVlIjoiMUtlNVNEN0R5ZUFlQWFDTm0ySGFiZz09IiwibWFjIjoiNmU3NzhmMTA0ZDRlNWM4NjY3MzQ0NzNlMWVlM2Q0NDAxZGE4YmZmN2QxNTliY2VlM2FlNjI3YWYxZTU5Yjg2YyIsInRhZyI6IiJ9', 'eyJpdiI6IkY2dUVGSUt2dExLVGkxZm9FSmNhbHc9PSIsInZhbHVlIjoiYkZsQ2IwTWRoU05Pb3h5VEFZZFNsZz09IiwibWFjIjoiYTViNmE1MWYyNDQ3MDZlYTk2NGNlNDRlZjc3OGMxZDcyMDlkOGIxMzg0YmRhZjIyNTNkMzY5ZjkyNmMxYTBlYSIsInRhZyI6IiJ9', 'eyJpdiI6Ilk5Sk9vOHplY0dUZHZRUlNYTU8wdHc9PSIsInZhbHVlIjoidEoxc3FqM255REtGeHZwMllqU0pRdz09IiwibWFjIjoiMzRlOWRlMWNiNzUyMTQ5MzgyZTdlMGFjODRkMzQyMTVhY2FjOTZmYjA0ZmNjYTBkZThmM2ZmOGZkMzcwZjQ4NyIsInRhZyI6IiJ9', 'eyJpdiI6InI0M296TC83QjdBSll3SEFmdENQYXc9PSIsInZhbHVlIjoiZS9DOEsvVnR3QVdkWW80TEUrL1c2dz09IiwibWFjIjoiNDEzNmVhMDIzNWVjNGE0OGYzMTA2NGZjZTQyN2I0Y2ZlNmMyZWY3MjllYWFjMTg4MWNjYTBkZjNiYWEwZjk1MiIsInRhZyI6IiJ9', 'eyJpdiI6InFacmpDRW5CLzdTb0lhME5iOUc1VEE9PSIsInZhbHVlIjoibjJqN0hxOXpQTTd0WGRCUUtydCtqUT09IiwibWFjIjoiZTM1Mzk3ZWNhNzNmYTM1MzhmZjAyZjJkMWZlMWYzOTVhMzYyNGRiYTUxZDY4N2I1ZWI5N2MxY2U5NjVlNGExYSIsInRhZyI6IiJ9', 'eyJpdiI6IkJtaTNhRlJtKzA1K3VEQXVqWTZFT0E9PSIsInZhbHVlIjoiNjh3Z0NNN0grNGlYSnVia0ZDNExZUT09IiwibWFjIjoiOTZlMWUyYTRiNGM4MDUyYTkwYWY3MTYzOWYyOGZjMzNmYzE2ZDhiNmVjNmQzMDc3NzI2NTRlYWFhM2NjYzhkMiIsInRhZyI6IiJ9', 'eyJpdiI6ImFiQVJPVGdxTGJHYXA4L0ZDZXR6REE9PSIsInZhbHVlIjoibzVFaTJnVDl1WEl5NjFmeWJqVHA1Zz09IiwibWFjIjoiMDBkYTlmYzkwYjZmZDIzNWUxYjEzZDFhMGFhODVmMzRmNDU2NzFiYmRhYzFkYjkxOGVjZTMzMGI5M2UxYjZlMyIsInRhZyI6IiJ9', 'eyJpdiI6InlLanZiRWwveVlLSDZDZmVrUXhPN1E9PSIsInZhbHVlIjoiQ1drMDh3MEI2MitLcXdzaDRHdGRSZz09IiwibWFjIjoiY2I5YzNiMjEwOWE3ODU0ZWUwMTFhNWQzMzNlOGZkNTkwNTMwOTNmZWVmYTU0YmQ5ZDFmY2QwMmQ2ZWRkZDAyNyIsInRhZyI6IiJ9', 'Abuja', 'BIX-034708', 'Immediate', '2022-02-02 03:20:00', '2022-03-02 09:39:16', '2022-03-02 09:39:16'),
(7, 'Omo Thompson', 'eyJpdiI6ImlyOG1CTjJBOS9XcENjRHEvaVBxNXc9PSIsInZhbHVlIjoiTXJzc2FHRG1JYWJ6Z3Q2ekRLS1BRZz09IiwibWFjIjoiMjYzNzllMzc4ODJhODk2M2I5ZmU5NjliNzFkOTU2YjcyNTVjOTgwMjViOTFjODA3ZmMxY2JkNjEzMDJhYTY2NyIsInRhZyI6IiJ9', 'eyJpdiI6IkMzL1BlTndWQVdZbzhuRmpkaHVld3c9PSIsInZhbHVlIjoiMVRsd0hqNDBmUXlWZU5SS0o0RzFDdz09IiwibWFjIjoiMzJlMmRjY2MxODY4MzZkMzE3ZDM5OGUyOWQzNzdmNTMxOGRkZWMxMmNkNTE4ZTkyMzhhM2I1NGI0ZjRhMzM0ZiIsInRhZyI6IiJ9', 'eyJpdiI6Ijl1NDg4VXhjeWNld0ZQTHk2dUZLUWc9PSIsInZhbHVlIjoiMXZJd0VNSWV6S3NmeERjeXNvbjFuQT09IiwibWFjIjoiYjEzZjQ4MGY3ODZjMTQxZDA1NzcwMDBjOTBjNTIxOTE0YTliM2NjODA3NzZhODZmYTQyMTNiYTY2NmIxNzc3ZiIsInRhZyI6IiJ9', 'eyJpdiI6IlhpQlVUakNVSWZwQmhiR092eGRvRmc9PSIsInZhbHVlIjoiTlVqR2FXRHIyVG9qZklzUitjQ0g1ZGxKcEhQVUc1cHI0bUN4WEdzMzBuYz0iLCJtYWMiOiI2ZjQ1YmYyMmJjMWUwNTM5NmYxZjA1NmZkMmE0MjY2MjEzMTZiZDhjZTE3NDk3YjkzYjhkZDEyNDUxYjg0MzhjIiwidGFnIjoiIn0=', 'eyJpdiI6IkVmOUNGd21EYWxTZkdlbzZaQWg3aGc9PSIsInZhbHVlIjoiVFZvcndDaEdKRFhWNGNRS1BPUE01QT09IiwibWFjIjoiNTcxMTcyZjA3ZmNmMzBkNGM1ODVlYjAwODJmNmIzYjMwNzEwYjhjNDE0MjIxMzIyNWQyYmZlNmVjMTQyYjI3OSIsInRhZyI6IiJ9', 'eyJpdiI6Ik5WWFFuTHN5eXpjYjUwUmNUM2pQUkE9PSIsInZhbHVlIjoiRmJOSnR5NHhyV2psT1Qrc296MVdJbzF4UC9icE53VzNBSExXOWNONlVGbz0iLCJtYWMiOiJjMDlkYjE0ZmNhNTE0ZmY3ZTVjOWIzNGRhMTJlNWQ5YzIwYWRjNjA2MzU0MTRjNWIwMTYxM2ZjYjExY2Y2MTZhIiwidGFnIjoiIn0=', 'eyJpdiI6IlMyS0NqTXNJRzFSb29uMS90YjFzTXc9PSIsInZhbHVlIjoiL0Y2d2VvWlhFZHpyeU96K1dRRVJ6UT09IiwibWFjIjoiMjg2MDFhM2U0MzNjZDA1NTMyYTQ5MWI2ZTU4ZjJlYzgwMzJkZmQ1ZWMzZWNmNjA0N2YyZTMzM2M1ZmMyZWFkNCIsInRhZyI6IiJ9', 'eyJpdiI6IlR4a2JsMmpxVkhrdHRmTmxvYlBTelE9PSIsInZhbHVlIjoiMU9CL1hETUVvdkgveGNFSk1yeWQ2UT09IiwibWFjIjoiYjNhM2U2MjdiN2NiNzUyMjM0NzYzYTk1YmE0YzQ0NmFhOWRlMmE0ZjY1ZDhlNTNjNzM1OThmNWQ4YmU2YmMxZSIsInRhZyI6IiJ9', 'eyJpdiI6InpOT2Rjc0djKzY0dFpDVXpCdk1ROHc9PSIsInZhbHVlIjoiUmNyVzdmczFGTWdMc29LRHcwWktYUT09IiwibWFjIjoiN2NkZmNiNzdiZmJhN2M4N2MwNGQzZWI2ZDk3MjNlYjJkMDZhODdlMmU1MjEwYjFmNDI2NzVmYTNiZjM5M2EyZCIsInRhZyI6IiJ9', 'eyJpdiI6Im9KemxWSDgwdVlGbGlIdlowVllJMHc9PSIsInZhbHVlIjoiM2FBRmxnNEJUNk0zZHFtenBDSVVjdz09IiwibWFjIjoiZGVmYWNlNmQ4MmY1YWQ5N2JjMzBmNjg1YmU3ZTk4M2RkNTcyMzUxNmM0ZGZiNTZhMDhhNjQ3NDU4MGRmMmNlZiIsInRhZyI6IiJ9', 'eyJpdiI6IkFXa2dqblRNZXhHbnU1WlNBVGNVWHc9PSIsInZhbHVlIjoiMHYyUkx1RE1IekV0Yzl0VDZNWlJRUT09IiwibWFjIjoiMjI0MDA1YjVhODVhODQ0NDBjYWMzOTg1ZGE2Y2Y1NDFiMTBlNTliODk1MjQ3NWNkNTkwYTJkODMxYzIwMWU0YiIsInRhZyI6IiJ9', 'eyJpdiI6IkdXb1kxbUlKR2x0MkZGZFcwNnFkT3c9PSIsInZhbHVlIjoiaEN0SjllSlBqdmpQN3dLbkF5WUFJZz09IiwibWFjIjoiNDc0NGZhY2JlMGY0MzljYzliMWZhMWM0MzBiYmRmNzEwNTNkYjA5Njg4NzM3MGVmYmNjM2VmZWQxOGRlMGI3MiIsInRhZyI6IiJ9', 'eyJpdiI6IkhtUDd1b21oUG51Uk51NkZPWkdpREE9PSIsInZhbHVlIjoibU5weWtLVXJmZ2dYUWszM0JqZ2haZz09IiwibWFjIjoiYTA0YmZiNGYwZmY0YTZkMjg5MTFlOTYyOGEzYzAwZjFmZjMxOTQ1ZWNlZTdiOTQ4ZjZlMzQ0ODc3ZmI0YTE1MCIsInRhZyI6IiJ9', 'eyJpdiI6IlF1dlVUY1BTVm1jY05QcnkrOHNJa2c9PSIsInZhbHVlIjoiRmVENHN6VkVrNVhpQ0hPWFRKV3NoZz09IiwibWFjIjoiNzJlNTA1Y2VlOGVlZDIwNDA3NGM1Nzc0YzE2MTVlOTYzYTcyNDE0ODM4Y2IyZTU3Y2JjNzBhNTE5YjQzMjBlZSIsInRhZyI6IiJ9', 'eyJpdiI6IjdhOFB6R2IxeDlZRG9vSEh4S0xwVFE9PSIsInZhbHVlIjoiOXVxRHBPODBEOUxacERWUkxQamVWZz09IiwibWFjIjoiZWQ0MGViZDZlY2NhOGNmMWFlOTVlNzMxODEyNDZhZDI3MGJjZjAzNmI4OGQzNTI1YmU1NmJjNTZiNjY4YzMyOSIsInRhZyI6IiJ9', 'eyJpdiI6IjROR0RMdUZQa0tNRDBxYzNTb3hKdEE9PSIsInZhbHVlIjoiVitUNEd3b24rMHE5RDYvVGRGMmdFUT09IiwibWFjIjoiZWY5YjE4MzE5MTA3NzA1ODA3NzU1ZDU4NDMyYzc2MjNiYmEyMDA2YmUwZGJlNjFlNDc0OTVhYzliZmVkYzI2MCIsInRhZyI6IiJ9', 'eyJpdiI6IllYQmJnYitBNEFCQnB0Zy8xMzV2N2c9PSIsInZhbHVlIjoiM28zSndUa2hzM0lWVnh4amp1Ym9JZz09IiwibWFjIjoiZWJhZjEyNWZlYmRjZDk3YTI3YzA4NzY5NWVmODVlZDExZjU5ZTI3YzBhZDZkZGJlZjY5ZTk0MGM5MGM3YTQ3ZCIsInRhZyI6IiJ9', 'Lagos', 'BIX-034709', 'Express', '2022-02-02 02:19:00', '2022-03-02 09:44:00', '2022-03-02 09:44:00'),
(8, 'Omo John', 'eyJpdiI6Ilhzd1d4OGRCaFdZWGNGdHYySVhoT3c9PSIsInZhbHVlIjoiQ2g4U3UvTENwS0djYktSTzZNcHh2UT09IiwibWFjIjoiOWIxYzNkZDNiN2UxNThhMmI3ZTFlMmNlODI1OGY4NGIyM2Y5NzJjMTUxMWExMTdjN2FmYjkwNmUzY2E1ODYxOSIsInRhZyI6IiJ9', 'eyJpdiI6IkJ3UFdDSVpCZlR6d0F2cXdNM01uaFE9PSIsInZhbHVlIjoiOEZ3c3dBZllTRjVwQXRXQm1HRUVjZz09IiwibWFjIjoiNmZjODIxZDM1M2E2YmJlMjk3M2E5ZTAzNWY5OWM5MzAzMDQ4OGZlMWJiZTU2NzVjOTJhMzVhY2VkMjdmNDk5OSIsInRhZyI6IiJ9', 'eyJpdiI6ImtObndnV2NpT2s0c1pGTklic0JxQkE9PSIsInZhbHVlIjoiL21Cb1pjUmVnbGNJSHlFZ0RUL2k3UT09IiwibWFjIjoiODdmYzI0YTU5YzNmMzdlYTYwMGI5N2NjYWI3YjQxYjNmMjBlZmU2NTdjNmFjMDZmMDRmZmU2Mjc3YThhZWQ1MyIsInRhZyI6IiJ9', 'eyJpdiI6IjNXWWVDRndUZTFtUzQ4UVRCVkNUSXc9PSIsInZhbHVlIjoiSjhUSkRTdWh1NjY3d3JDNkladVg4bjBjYmJWam4vL3Z4TkxNMkl6UmhZWT0iLCJtYWMiOiI5NzkzMzM3NDQ3NjdjMjk4ZTUwYmVhN2U0MzJjY2Y1NDcyYWZmOTFkOGMzMzdjNmRiNDg3OGVjNGMwMzZiZWY5IiwidGFnIjoiIn0=', 'eyJpdiI6Im83SWNKb0ZPcmk3b3p2RzBZeStmcmc9PSIsInZhbHVlIjoicStweW5RWlRWOXdmT0pIZ2E3ZVAxUT09IiwibWFjIjoiYmYxNzg4ZDI5ZTdhNGIzMjZlMDYyZmYyYTZhMzhkOGQ2NDMxYTMxOWVjYzZhNTlkMDNlNzZmOTMzOGU1ZThmMyIsInRhZyI6IiJ9', 'eyJpdiI6Ink3KzJzbmMrNko3UkxKWFNHckJmWkE9PSIsInZhbHVlIjoiQURLWVJYcXFYY05TdWw2cFg0NmRmZ3MwQTloT1NwMS9vY3p4emxYZlN4cz0iLCJtYWMiOiI1YTRhNzJmZTJlMTI2MTA0ZGY3YjhhNTc3NmU3MjY1NjY0YTA0ZWZiNzg3MGNmODhlYzFkZDk1ZTFlZTZjMDMxIiwidGFnIjoiIn0=', 'eyJpdiI6ImgxOXJKdUs1eXEwWGtzbjNveTFRTlE9PSIsInZhbHVlIjoiQW1OQjkrRWYyT0EyYXVqN2pPajRBUT09IiwibWFjIjoiMWZjNGYxZjVmNTZmMmJjZGU4Y2M1ZmQ4MzcxZmUyOTk0ZGViMTI0YzBiNjI2MmI3MjBkMDBiODVjMDVjYmExMiIsInRhZyI6IiJ9', 'eyJpdiI6IlhVWEZhTk90YlQwWU5La2pOY3NwWUE9PSIsInZhbHVlIjoiS2Z2QTdPdjBZZGx2RUlKU2NFeStPUT09IiwibWFjIjoiMzczZjM0NTA1ODVkYmVlN2VkOTBmOGI0NzFhM2ZiZDljNWQxYzYwMTUyMzdkZTQ1MjYwZDY4ZWM2ZWI3ZmMwNSIsInRhZyI6IiJ9', 'eyJpdiI6IkNnODJ3UkhoS3oxc3hHc290anJVeEE9PSIsInZhbHVlIjoiNWRLK0JSUkV6NFNTRGYzRE4yVlR4QT09IiwibWFjIjoiNzY4MzJjM2ZmZTczMjk0MzcyYzc3OWMwN2FkMTJjZDJjNGJkZjAyNzc5ZThhOGU4Njc3NDFmZDgxOWQ0ZmNiNCIsInRhZyI6IiJ9', 'eyJpdiI6IkhYK2FPTHdjUWQrSGs2bTJMSmtkaHc9PSIsInZhbHVlIjoiWlBFb3BIUFdDelRwcExKMjhjTFdiZz09IiwibWFjIjoiMTZkYzMzMmUzNTM4NzNhNTBkOTNkMTM0YWYwMzQyMDRlOWY4MDRlYTY3ZmZhMzgzZTJmMzA5YzNmZDNmMTFhZiIsInRhZyI6IiJ9', 'eyJpdiI6Ii9FTlNzdUVxU3UxMHBkbjBzL2VPYUE9PSIsInZhbHVlIjoia3R3MFVOa1ZmZ2tiNlRkNmZoNWVNUT09IiwibWFjIjoiYzJjNmNkYTVkMmFjYmViODZiYjczNWU4NTg5M2M4MTI0MGQyZThmNTBmODNiYzU1ZGMzYjg1NDUyNjVlODM0YyIsInRhZyI6IiJ9', 'eyJpdiI6IjRWTzJQbnlUQ01HRXRkT1pmenlTNkE9PSIsInZhbHVlIjoiRlZMU1RhUTBRUExxa3lJWW1vQ3Awdz09IiwibWFjIjoiNWJkMWEyODRmZDUyOWU1MTU4ZWE0NjNhNzFlOWRkY2NiMTI5ZjgzODViMjQ1NWRjZDQ2OGQ3NDhmYjg3N2ExNyIsInRhZyI6IiJ9', 'eyJpdiI6Ikh1aEZoMUh1cWtjTVdOUTVUTFZwdXc9PSIsInZhbHVlIjoiYjZpR29pMy9sU0RUZTJ3ZG9CMmNmdz09IiwibWFjIjoiZjRiNTRkNDcxZWM0NzQ1YTYxMTlmMTA4ODViNzg1ODdlYzE3MTZlZWVhZjgwNWVlZTJiOGU1NzM0OTY4YmFjMCIsInRhZyI6IiJ9', 'eyJpdiI6Im1IclZ4aEYrT3B5d2pheWNFdThHMWc9PSIsInZhbHVlIjoiV2dRa1Q2QVFWdGIrak9ZMG5rdGx5dz09IiwibWFjIjoiZmI3ZjUyMWM4OGE0NjRkMjdhNjliOGRmMTE0ZWU0YmUyNGZkZDI3ZDFmMjMzNTA0YTE1YWU2ODVkODJjZDNmZCIsInRhZyI6IiJ9', 'eyJpdiI6Ilp5UGF4YmIvaXhlaXJuM0V1WFFhcmc9PSIsInZhbHVlIjoiaEhvVU9DYzdrSzB3Tkx5c0FHOFM1dz09IiwibWFjIjoiYzRkNzJjYzVmZmFhYTdkZThmOGViNGY1MGQ4MDJjMjJlODMxMGI2YWM0MzcwMGFhMDY4MzAyOGJlMzNhYjE0OCIsInRhZyI6IiJ9', 'eyJpdiI6ImlWL2pUeEhlYTdZZlMvaHRNbEFGcFE9PSIsInZhbHVlIjoidzV0SmhZVjBrSyt1MDh5VG9aUStaUT09IiwibWFjIjoiMDRmOTFiMTliYzBmMTc5MzM0Y2ZkYTJmMDZlNzBkYzQxODhmMzE0YjI5OGFjMzI5MGFlZGY3OTM4MjM1MThlOCIsInRhZyI6IiJ9', 'eyJpdiI6IlU5cEVLcjF2RVJWS2VibkdZNzZZcVE9PSIsInZhbHVlIjoiN09Ld2pxNmR2TXphR29WYnhjbFROUT09IiwibWFjIjoiNzlkMjAyNGQzOTM5NzAzZWM1ODRjY2E3MDE0Mjc3YmNjMDYwMDg5NjBhYjU1MTI2YjE1YWMzZjllMmE2ZTA1ZSIsInRhZyI6IiJ9', 'Abuja', 'BIX-034710', 'Immediate', '2022-02-02 03:20:00', '2022-03-02 09:44:00', '2022-03-02 09:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amelia Trantow', 'darlene.keebler@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '56TFX3fN3p', '2022-02-07 14:11:41', '2022-02-07 14:11:41'),
(2, 'Aurelio Schroeder', 'leuschke.amaya@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r7AC5e5Iyl', '2022-02-07 14:11:41', '2022-02-07 14:11:41'),
(3, 'Mr. Rod McCullough', 'qbauch@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'H7jKSDeR0I', '2022-02-07 14:11:41', '2022-02-07 14:11:41'),
(4, 'Jovani Bernier', 'eusebio.mcclure@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SJCEn9kZPU', '2022-02-07 14:11:41', '2022-02-07 14:11:41'),
(5, 'Mrs. Loyce Cummings', 'jordy.heidenreich@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1q7S2PMKRx', '2022-02-07 14:11:41', '2022-02-07 14:11:41'),
(6, 'Dr. Cloyd Lemke', 'kris.rosie@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fAJMHNcVrb', '2022-02-07 14:11:41', '2022-02-07 14:11:41'),
(7, 'Bryce Barton', 'devon.zieme@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EAUsAQHQPr', '2022-02-07 14:11:41', '2022-02-07 14:11:41'),
(8, 'Kamille Nienow', 'audreanne32@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dq53VQTdri', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(9, 'Dwight Keeling', 'kiehn.jayne@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CfGR7H9Q8d', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(10, 'Nicholas Kling', 'parisian.korbin@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pLsqFXNX2D', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(11, 'Hermann Will Jr.', 'jayne03@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4gItW3kL5j', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(12, 'Daniella Zulauf', 'ozella.price@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Yz6Nvzkgfz', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(13, 'Ford Hettinger', 'zdaniel@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 't7sdOBRoeh', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(14, 'Vickie Bergnaum', 'freida97@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MM1LvH5MhU', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(15, 'Celestine Schamberger', 'gerlach.nia@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QjPrABuWcf', '2022-02-07 14:11:42', '2022-02-07 14:11:42'),
(16, 'Diana DuBuque', 'torp.carrie@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'k8MK5L5yFS', '2022-02-07 14:11:43', '2022-02-07 14:11:43'),
(17, 'Brandy Feeney III', 'alexane.donnelly@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WTQNRdEkBK', '2022-02-07 14:11:43', '2022-02-07 14:11:43'),
(18, 'Mr. Rosario Bogisich II', 'trace.beer@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FTwJcFgJKn', '2022-02-07 14:11:43', '2022-02-07 14:11:43'),
(19, 'Vita Becker DVM', 'favian.stanton@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'btYzIhvOiQ', '2022-02-07 14:11:43', '2022-02-07 14:11:43'),
(20, 'Beaulah Wunsch PhD', 'willis74@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I255RQEuKP', '2022-02-07 14:11:43', '2022-02-07 14:11:43'),
(21, 'Ms. Vivian Casper', 'nheller@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CZEkHb82PS', '2022-02-07 14:11:43', '2022-02-07 14:11:43'),
(22, 'Junior Orn', 'feil.millie@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9MFHZax3mT', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(23, 'Viola Murazik', 'thiel.aileen@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lkKGRoEdMb', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(24, 'Natalie Frami', 'jamel.dooley@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uQpZm2mwas', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(25, 'Lillian Langosh', 'ashleigh.denesik@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QBr7gDLiga', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(26, 'Darren Robel', 'kimberly.wunsch@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tMtGM7Tnp5', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(27, 'Jaren Skiles', 'omccullough@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2tiApZCRdQ', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(28, 'Kelsi Marvin', 'winfield79@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pZkXYUaA8P', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(29, 'Nyah Hickle', 'lemuel44@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SEuXj8DVjf', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(30, 'Marina Lowe', 'watsica.norberto@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4gYZHBEVHp', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(31, 'Ms. Pansy Braun', 'smitham.krista@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AQ4R8EZILv', '2022-02-07 14:11:44', '2022-02-07 14:11:44'),
(32, 'Elbert Little', 'nikki80@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wrVTfGVj1H', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(33, 'Tessie Reilly', 'torey56@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1gDHMVTyG3', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(34, 'Estell Predovic IV', 'raven67@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'A1LEahwrZK', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(35, 'Laury Goodwin', 'veum.deanna@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VOMYHAnS60', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(36, 'Dennis Zulauf', 'rippin.leda@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z7lorsmQDB', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(37, 'Rodrigo Batz', 'sauer.jermain@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WTiUTV5LVJ', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(38, 'Miss Verla Ortiz Sr.', 'barrett89@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NHXyGrXsAR', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(39, 'Daron Moore Jr.', 'kamron.brekke@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lVfOUH6EBg', '2022-02-07 14:11:45', '2022-02-07 14:11:45'),
(40, 'Boris Dach', 'green.raheem@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HPgG5muahz', '2022-02-07 14:11:46', '2022-02-07 14:11:46'),
(41, 'Ansel Kling', 'fjacobson@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RqNMFGifFm', '2022-02-07 14:11:46', '2022-02-07 14:11:46'),
(42, 'Kaley Schaefer', 'gutkowski.reilly@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'a4DSSd4NZk', '2022-02-07 14:11:46', '2022-02-07 14:11:46'),
(43, 'Mohammed Denesik', 'zane28@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VopZYP5kOR', '2022-02-07 14:11:46', '2022-02-07 14:11:46'),
(44, 'Brannon Durgan', 'ruecker.deshaun@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6fRn5ofgOV', '2022-02-07 14:11:47', '2022-02-07 14:11:47'),
(45, 'Mr. Bennie Waters', 'lexi43@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gLXK0Inc4u', '2022-02-07 14:11:47', '2022-02-07 14:11:47'),
(46, 'Sterling Stiedemann MD', 'carmela41@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9r9Zw0rL9s', '2022-02-07 14:11:47', '2022-02-07 14:11:47'),
(47, 'Jailyn Swaniawski', 'jeffery50@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tMKA0dgKy9', '2022-02-07 14:11:47', '2022-02-07 14:11:47'),
(48, 'Stanley Ondricka', 'roman.kling@example.net', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'q3drnOkcAL', '2022-02-07 14:11:47', '2022-02-07 14:11:47'),
(49, 'Dr. Hazle Willms DDS', 'ortiz.diego@example.com', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'to3xzjBOGM', '2022-02-07 14:11:47', '2022-02-07 14:11:47'),
(50, 'Ally Altenwerth', 'veronica82@example.org', '2022-02-07 14:11:41', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yNBxdoVyC4', '2022-02-07 14:11:47', '2022-02-07 14:11:47'),
(51, 'Palomas AdeAbat', 'coxhillprotocol@yahoo.com', NULL, '$2y$10$S2Lc6z9kjgJNGwn9ahdSQeXLzO8RBOCLr3KDTAOLQVgUyCOmVakua', NULL, '2022-02-18 15:20:03', '2022-02-18 16:06:46'),
(52, 'Admin Ade', 'admin@admin.com', NULL, '$2y$10$elm.xO.cywNlJePT.1hZPO6Fbk0bPkbQUzmhRfwwueX.Hwd6gYd9e', NULL, '2022-02-19 12:10:03', '2022-02-24 10:47:48'),
(53, 'Muheeb Tester', 'tester@aol.com', NULL, '$2y$10$8UNgd6XAig7NrZAETw0Ud.Q19rZF0AAix9oFLWICVGtCMu4Trdzu.', NULL, '2022-02-23 17:13:13', '2022-02-23 17:13:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antigen_test_results`
--
ALTER TABLE `antigen_test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_upload_logs`
--
ALTER TABLE `file_upload_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_upload_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_logs`
--
ALTER TABLE `mail_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_logs_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient_doc_numbers`
--
ALTER TABLE `patient_doc_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `test_categories`
--
ALTER TABLE `test_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antigen_test_results`
--
ALTER TABLE `antigen_test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_upload_logs`
--
ALTER TABLE `file_upload_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mail_logs`
--
ALTER TABLE `mail_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient_doc_numbers`
--
ALTER TABLE `patient_doc_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_categories`
--
ALTER TABLE `test_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file_upload_logs`
--
ALTER TABLE `file_upload_logs`
  ADD CONSTRAINT `file_upload_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mail_logs`
--
ALTER TABLE `mail_logs`
  ADD CONSTRAINT `mail_logs_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `test_results` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
