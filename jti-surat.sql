-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2024 at 07:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jti-surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uuid` varchar(50) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` enum('L','P') NOT NULL DEFAULT 'L',
  `role_id` int NOT NULL,
  `prodi_id` int NOT NULL,
  `change_password` enum('true','false') NOT NULL DEFAULT 'false',
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uuid`, `username`, `nama`, `jk`, `role_id`, `prodi_id`, `change_password`, `password`, `no_hp`, `created_at`, `updated_at`) VALUES
('142322ce-b561-4389-a857-f902313411b0', 'super2', 'SuperAdmin2', 'L', 2, 2, 'false', '$2y$10$C9ziu2LcnEX.ZKIW/ySPm.oAiJ3c/fXeSqqgQk64/SpGt7KjbZ2hu', '6208122255966', '2023-08-12 19:24:03', '2023-08-12 19:24:03'),
('f0938b9a-038d-4f28-9da5-d90e1a2cda62', 'adminjti2', 'Indriana Rahmawati', 'P', 1, 1, 'false', '$2y$10$u79vP/nwWyzo4DSjpaJs2O5mFXGwm.SjWFxrPlLPJn027.ZsVr6pe', '6208122255966', '2023-08-12 19:25:11', '2023-08-12 19:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `surat_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nim` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ketua` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'true' COMMENT 'kolom untuk menentukan apakah anggota tersebut ketua dalam kelompok atau tidak\r\n',
  `individu` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'false' COMMENT 'kolom untuk menentukan apakah mahasiswa tersebut berkelompok atau individu\r\n',
  `prodi_id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`surat_id`, `nim`, `ketua`, `individu`, `prodi_id`, `nama`, `no_hp`, `created_at`, `updated_at`) VALUES
('354c629d-1998-4f81-983e-b2c5fc9bc8de', 'E41210759', 'false', 'true', 1, 'Muhammad Adi Saputro', '+6285748314069', '2023-11-06 06:37:45', '2023-11-06 06:37:45'),
('09d91c45-5d1d-4074-9665-026862d3ab33', 'E41210759', 'false', 'true', 1, 'Muhammad Adi Saputro', '+6285748314069', '2023-11-06 06:37:54', '2023-11-06 06:37:54'),
('f2713f02-3d86-4b04-b93d-fada7d35e86e', 'E41210759', 'false', 'true', 1, 'Muhammad Adi Saputro', '+6285748314069', '2023-11-11 10:46:44', '2023-11-11 10:46:44'),
('0c90ab10-6fb0-42ec-9f17-18110ea6773b', 'E41210759', 'false', 'true', 1, 'Muhammad Adi Saputro', '+6285748314069', '2023-11-18 03:56:55', '2023-11-18 03:56:55'),
('d3816373-78e3-429b-9913-35ba598e46a9', 'E41210759', 'false', 'true', 1, 'Muhammad Adi Saputro', '+6285748314069', '2023-11-18 03:58:17', '2023-11-18 03:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nip` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`uuid`, `nip`, `no_hp`, `nama`, `prodi_id`, `created_at`, `updated_at`) VALUES
('004e4b91-1ce4-42de-9ea4-0cb20d49bfb7', '197405192003121002', '0852-3632-9999', 'Nugroho Setyo Wibowo, ST. MT', 1, '2023-07-22 22:43:17', '2023-07-22 22:43:17'),
('0fa2e847-ce9a-441b-80b4-dfb6ce2d3d8e', '199212272022031007', '0812-1753-9834', 'Choirul Huda, S.Kom., M.Kom.', 1, '2023-09-14 10:35:16', '2023-09-14 10:35:16'),
('1752aca5-2e53-43c0-859d-61cdafea5f24', '198801172019031008', '0857-5213-1817', 'I Gede Wiryawan, S.Kom., M.Kom.', 1, '2023-08-04 04:49:00', '2023-08-04 04:49:00'),
('21abce6a-f428-40fb-bc2e-e2ffdaac157e', '199112112018031001', '0856-4641-8027', 'Khafidurrohman Agustianto, S.Pd, M.Eng', 1, '2023-08-04 04:54:31', '2023-08-04 04:54:31'),
('21b5c582-3dff-4c92-9e58-7d8169710ce5', '197110092003121001', '0813-3660-8000', 'Denny Trias Utomo, S.Si, MT', 1, '2023-07-22 22:39:41', '2023-07-22 22:39:41'),
('26ac10d0-102d-4e2d-878a-baab747a2ae8', 'D199308312021032', '0813-3055-8918', 'Arvita Agus Kurniasari, S.ST.,M.Tr.Kom', 1, '2023-09-14 10:35:16', '2023-09-14 10:35:16'),
('2a3dcddf-4da2-4572-8e3a-8df36be45480', '197011282003121001', '0852-0498-0161', 'Hariyono Rakhmad, S.Pd, M.Kom', 6, '2023-07-22 22:37:28', '2023-07-22 22:37:28'),
('306ab467-4706-4378-a1bb-765669e3c89b', '197808192005012001', '0812-4979-4912', 'Ika Widiastuti, S.ST, MT', 5, '2023-07-22 22:45:44', '2023-07-22 22:45:44'),
('36e92e8b-cfd8-4d15-80cf-448e3e2b79ab', '198012122005011001', '0852-3609-0999', 'Prawidya Destarianto, S.Kom, M.T', 1, '2023-08-04 04:42:24', '2023-08-04 04:42:24'),
('3756c138-614a-4570-984c-9480954ba7cc', '198406252015041004', '0822-3690-9384', 'Bekti Maryuni Susanto, S.Pd.T, M.Kom', 6, '2023-08-04 04:45:28', '2023-08-04 04:45:28'),
('388a0b40-3348-448f-a2c8-83e456c23938', '198005172008121002', '0856-4150-0007', 'Dwi Putro Sarwo Setyohadi, S.Kom, M.Kom', 5, '2023-08-04 04:41:45', '2023-08-04 04:41:45'),
('391adc92-2b42-42d1-ad12-469523d22a80', '199304252022032008', '0813-3665-6744', 'Shabrina Choirunnisa, S.Kom., M.Kom.', 6, '2023-09-14 10:35:16', '2023-09-14 10:35:16'),
('3c298711-5232-4148-bafd-c7f254b550bb', '198301092018031001', '0812-5246-5655', 'Hermawan Arief Putranto, ST, MT', 5, '2023-08-04 04:44:22', '2023-08-04 04:44:22'),
('3fc4bcbc-3e6d-44cb-8cf6-5adda5544a95', '198603192014031001', '-', 'Fendik Eko Purnomo, S.Pd, MT', 6, '2023-08-04 04:47:22', '2023-08-04 04:47:22'),
('407d9906-13a5-4a72-84c3-ff05148511c7', '197909212005011001', '0812-3118-8900', 'I Putu Dody Lesmana, ST, MT', 1, '2023-08-04 04:41:05', '2023-08-04 04:41:05'),
('442d1e7e-d7f4-46a4-964b-b34ac23abcee', '197104082001121003', '-', 'Wahyu Kurnia Dewanto, S.Kom, MT', 5, '2023-07-22 22:38:54', '2023-07-22 22:38:54'),
('595f2d77-82f4-4705-bc8e-e19cb7970db9', '198101152005011011', '-', 'Nurul Zainal Fanani, S.ST, MT', 1, '2023-08-04 04:43:02', '2023-08-04 04:43:02'),
('5b09e3ea-0e04-4fc3-9e43-a91f72b52393', '198907102019031010', '0856-4880-7492', 'Ery Setiyawan Jullev Atmadji, S.Kom, M.Cs', 1, '2023-08-04 04:52:13', '2023-08-04 04:52:13'),
('5ca75274-78bb-4c81-976a-e019219e152c', '199408122019031013', '0851-5616-8675', 'Mukhamad Angga Gumilang, S. Pd., M. Eng.', 1, '2023-04-07 09:34:55', '2023-04-07 09:34:55'),
('5d5e4d7d-de52-4e84-80cf-f2756aac1a12', '199411232020122010', '0822-4590-0094', 'Lalitya Nindita Sahenda, S.Pd., M.T', 6, '2023-09-14 10:35:16', '2023-09-14 10:35:16'),
('63386338-620b-45b7-a612-3a326c7858e7', '199205282018032001', '0852-3397-5628', 'Bety Etikasari, S.Pd, M.Pd', 1, '2023-08-04 04:55:56', '2023-08-04 04:55:56'),
('69da9818-8960-43e4-aced-82d43a77f187', '197008311998031001', '0812-3307-506', 'Moch. Munih Dian W, S.Kom, M.T', 1, '2023-07-22 21:08:36', '2023-07-22 21:08:36'),
('6eded9b8-09b7-4aaa-9032-d1e31b24cd7d', '197907032003121001', '0852-3675-2542', 'Surateno, S.Kom., M.Kom', 6, '2023-08-04 04:40:12', '2023-08-04 04:40:12'),
('77c6f1d4-d312-4fd7-bb57-0afa2a234ea0', '198302032006041003', '0856-4922-2290', 'Hendra Yufit Riskiawan, S.Kom, M.Cs', 5, '2023-08-04 04:44:55', '2023-08-04 04:44:55'),
('7c2d25bc-f3dc-11ed-a05b-0242ac120003', '-', '', '-', 2, NULL, NULL),
('8ba4b0d8-b0d0-413d-9f1f-5002b1a36bfe', '198903292019031007', '0813-3201-0455', 'Taufiq Rizaldi, S.ST., MT', 5, '2023-08-04 04:50:36', '2023-08-04 04:50:36'),
('8fe2633e-f1d7-42c6-82e1-d10365723701', '199305082022032013', '0813-3413-2140', 'Dia Bitari Mei Yuana, S.ST., M.Tr.Kom.', 1, '2023-09-14 10:35:16', '2023-09-14 10:35:16'),
('a734c173-00f6-401f-9a0a-310c41f32d43', '197810112005012002', '0812-4946-073', 'Elly Antika, ST, M.Kom', 1, '2023-04-08 17:35:56', '2023-04-08 17:35:56'),
('a801dad0-75e9-4a93-9a91-e7df8c97ca28', '198606092008122004', '-', 'Nanik Anita Mukhlisoh, S.ST, MT', 5, '2023-08-04 04:47:57', '2023-08-04 04:47:57'),
('ad0fba65-693e-4308-adec-50d1ea0e08f3', '198608022015042002', '0856-5115-2881', 'Ratih Ayuninghemi, S.ST, M.Kom', 1, '2023-08-04 04:48:30', '2023-08-04 04:48:30'),
('b401bc3f-00d1-436d-a35b-147e556d0bfa', '197808172003121005', '0852-3698-6278', 'Agus Hariyanto, ST, M.Kom', 6, '2023-07-22 22:45:21', '2023-07-22 22:45:21'),
('b9d3b6ea-21b9-49a5-9bc8-25c84303e980', '198807022016101001', '0813-3833-8833', 'Husin, S.Kom, M.MT', 5, '2023-08-04 04:49:55', '2023-08-04 04:49:55'),
('bd485cb2-db24-4bb1-86f7-75832c56a32a', '199103152017031001', '-', 'Syamsiar Kautsar, S.ST, MT', 6, '2023-08-04 04:53:23', '2023-08-04 04:53:23'),
('c7d2b800-8b34-4666-9ad7-02bd105ac4bf', '197809082005011001', '0823-3441-7777', 'Denny Wijanarko, ST, MT', 6, '2023-07-22 22:46:27', '2023-07-22 22:46:27'),
('ccb48ad7-2e56-4bd8-9d48-eebca92c4492', '199203022018032001', '0813-3695-9394', 'Zilvanhisna Emka Fitri, ST. MT', 1, '2023-08-04 04:55:13', '2023-08-04 04:55:13'),
('cdf576d1-8f28-4a5e-852d-26b3bc87ee50', '199104292019031011', '0811-3620-500', 'Faisal Lutfi Afriansyah, S.Kom, MT', 5, '2023-08-04 04:53:55', '2023-08-04 04:53:55'),
('d7316c09-44a8-4ee2-97a6-4d2b78859f0d', '197306172018051001', '0812-5246-3763', 'Ely Mulyadi, SE, M.Kom', 5, '2023-07-22 22:41:49', '2023-07-22 22:41:49'),
('d9c13a07-da24-421c-a17d-77cde7dfa36f', '197709292005011003', '0852-3460-9168', 'Didit Rahmat Hartadi, S.Kom, MT', 5, '2023-07-22 22:43:41', '2023-07-22 22:43:41'),
('db4b27f2-cbec-485e-8775-40fda7f965ee', '197308312008011003', '0812-4914-740', 'Agus Purwadi, ST.MT', 6, '2023-07-22 22:42:39', '2023-07-22 22:42:39'),
('e6811769-74c2-475b-8507-304f1b9415ad', '198804042020122013', '0857-4604-4448', 'Pramuditha Shinta Dewi Puspitasari, S.Kom., M.Kom.', 5, '2023-09-14 10:35:16', '2023-09-14 10:35:16'),
('e6b7a838-5cc7-4261-831b-17cc6be872b9', '198511282008121002', '0812-1622-323', 'Aji Seto Arifianto, S.ST., M.T.', 1, '2023-08-04 04:46:50', '2023-08-04 04:46:50'),
('ec21652f-27d3-4fc2-b98f-e9d4383c7731', '198106152006041002', '0812-4951-5151', 'Syamsul Arifin, S.Kom, M.Cs', 5, '2023-08-04 04:43:42', '2023-08-04 04:43:42'),
('edc5731d-f15c-4f8c-86d9-1d8888a21e84', '198510312018031001', '-', 'Victor Phoa, S.Si, M.Cs', 6, '2023-08-04 04:46:16', '2023-08-04 04:46:16'),
('edce27c6-cfad-4ef6-acf2-d82b983bbef3', '197111151998021001', '0852-3601-0820', 'Adi Heru Utomo, S.Kom, M.Kom', 1, '2023-07-22 22:40:46', '2023-07-22 22:40:46'),
('f191ad47-80d5-426b-ac9e-6f80701fddd7', '197808162005011002', '-', 'Beni Widiawan, S.ST, MT', 6, '2023-07-22 22:44:17', '2023-07-22 22:44:17'),
('f6c9d9b4-cc7f-4790-abb4-35cc4f07745c', '197009292003121001', '0812-4973-5955', 'Yogiswara, ST, MT', 6, '2023-07-22 21:09:38', '2023-07-22 21:09:38'),
('f6e4646e-9b9c-4555-978d-a5f39cefaa94', '199002272018032001', '0858-5918-4555', 'Trismayanti Dwi P, S.Kom, M.Cs', 1, '2023-08-04 04:52:45', '2023-08-04 04:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `kode` varchar(8) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `template` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`kode`, `keterangan`, `template`, `created_at`, `updated_at`) VALUES
('DASH', '-', '-', NULL, NULL),
('MK', 'Mata Kuliah', '', '2023-04-09 00:12:46', '2023-04-09 00:12:46'),
('OBS', 'Observasi Penelitian', '', '2023-04-09 00:15:11', '2023-04-09 00:15:11'),
('PK', 'Pengajuan PKL', '', '2023-04-09 00:14:10', '2023-04-09 00:14:10'),
('TA', 'Tugas Akhir', '', '2023-04-08 01:28:31', '2023-04-08 01:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(7, 'default', '{\"uuid\":\"5de11b48-3d56-4af4-8aab-4ee525df2670\",\"displayName\":\"App\\\\Jobs\\\\sendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\sendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\sendEmailJob\\\":1:{s:27:\\\"\\u0000App\\\\Jobs\\\\sendEmailJob\\u0000data\\\";a:2:{s:5:\\\"email\\\";s:22:\\\"muhammadxxz7@gmail.com\\\";s:16:\\\"alasan_penolakan\\\";s:14:\\\"Ditolak ya ges\\\";}}\"}}', 0, NULL, 1685298229, 1685298229),
(8, 'default', '{\"uuid\":\"ecf906d2-7095-4940-85b6-3843df852490\",\"displayName\":\"App\\\\Jobs\\\\sendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\sendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\sendEmailJob\\\":1:{s:27:\\\"\\u0000App\\\\Jobs\\\\sendEmailJob\\u0000data\\\";a:2:{s:5:\\\"email\\\";s:16:\\\"ayunda@gmail.com\\\";s:16:\\\"alasan_penolakan\\\";s:16:\\\"Alasan Penolakan\\\";}}\"}}', 0, NULL, 1686723850, 1686723850);

-- --------------------------------------------------------

--
-- Table structure for table `koordinator`
--

CREATE TABLE `koordinator` (
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `kode_surat` varchar(8) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `prodi_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `koordinator`
--

INSERT INTO `koordinator` (`uuid`, `nama`, `no_hp`, `kode_surat`, `email`, `prodi_id`, `created_at`, `updated_at`) VALUES
('386412f4-96a9-4b17-bf8d-e12b1aecb515', 'Lalitya Nindita Sahenda, S.Pd., M.T', '082245900094', 'PK', 'tkk@polije.ac.id', 6, '2023-08-04 07:11:47', '2023-08-04 07:11:47'),
('4beda2a7-207b-49ed-8271-7ce79ce1b892', 'Mukhamad Angga Gumilang, S. Pd., M. Eng.', '089677119009', 'TA', 'plj@polije.ac.id', 9, '2023-08-04 07:40:20', '2023-08-04 07:40:20'),
('590248c2-f45e-4d62-a213-f42cd07bd3e8', 'Bekti Maryuni Susanto, S.Pd.T, M.Kom', '082236909384', 'TA', 'tkk@polije.ac.id', 6, '2023-08-04 07:12:51', '2023-08-04 07:12:51'),
('ab1adde2-f3dc-11ed-a05b-0242ac120003', '-', '-', 'DASH', '-', 2, NULL, NULL),
('b69ba7c7-d860-4c0e-8352-7c781ef0f142', 'Faisal Lutfi Afriansyah, S.Kom, MT', '08113620500', 'TA', 'Faisal@gmail.com', 5, '2023-08-04 07:10:51', '2023-08-04 07:10:51'),
('be9a90b6-a05d-4aa1-9b83-e996eec564af', 'Taufiq Rizaldi, S.ST., MT', '081332010455', 'PK', 'Taufiq@gmail.com', 5, '2023-08-04 07:09:03', '2023-08-04 07:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `uuid` varchar(50) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prodi_id` int NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`uuid`, `nim`, `nama`, `email`, `prodi_id`, `password`, `alamat`, `no_hp`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
('c9833c88-6234-4559-a198-c67d22cfc693', 'E41210759', 'Muhammad Adi Saputro', 'e41210759@student.polije.ac.id', 1, '$2y$10$OTEbXQ15yWW0lAxlb8XHAuT0REs.ot/bMDxlfvEFFFooERyhcFTGC', 'Jl kamboja', '+6285748314069', '2003-05-21', '2023-08-10 17:20:43', '2023-08-10 17:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_04_16_074741_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'muhammadxxz7@gmail.com', '1b1da816-908a-48e1-861f-302c483b0dc7', '2023-04-11 16:39:27'),
(2, 'muhammadxxz7@gmail.com', '84838b51-6cff-4c95-b300-50f97a75649e', '2023-04-11 16:41:15'),
(3, 'muhammadxxz7@gmail.com', 'f6bb864d-a275-48b8-9c66-c399a1b4f825', '2023-04-11 16:42:42'),
(4, 'muhammadxxz7@gmail.com', '8bf5ef62-6f3d-489c-8f54-73cb36c77ac8', '2023-04-11 16:45:54'),
(5, 'muhammadxxz7@gmail.com', '6a6abb17-ba2c-4e5f-a05a-61995419749b', '2023-04-11 17:11:29'),
(6, 'muhammadxxz7@gmail.com', '2080af12-9d63-4ea0-ba54-6b4c30b8faad', '2023-04-11 17:12:25'),
(7, 'muhammadxxz7@gmail.com', 'a766d20a-d320-4262-9bc5-09a6050048fa', '2023-04-13 10:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_anjungan`
--

CREATE TABLE `pengajuan_anjungan` (
  `kode` varchar(9) NOT NULL,
  `kode_surat` varchar(8) NOT NULL,
  `surat_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int NOT NULL,
  `keterangan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `note` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `keterangan`, `note`, `created_at`, `updated_at`) VALUES
(1, 'TIF Reguler', 'D4 Teknik Informatika Reguler', '2023-04-07 08:43:57', '2023-04-07 08:43:57'),
(2, 'All', '', '2023-04-07 19:23:10', '2023-04-07 19:23:10'),
(3, 'TIF Inter', 'D4 Teknik Informatika Internasional', '2023-04-19 06:43:35', '2023-04-19 06:43:35'),
(4, 'MIF Inter', 'D3 Manajemen Informatika Internasional', NULL, NULL),
(5, 'MIF ', 'D3 Manajemen Informatika Reguler', NULL, NULL),
(6, 'TKK ', 'D3 Teknik Informatika', NULL, NULL),
(7, 'TIF NGANJUK', 'D4 Teknik Informatika PSDKU Nganjuk', NULL, NULL),
(8, 'TIF SIDOARJO', 'D4 Teknik Informatika PSDKU Sidoarjo', NULL, NULL),
(9, 'PLJTIF', 'Program Lintas Jenjang Teknik Informatika', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `keterangan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-04-06 23:41:34', '2023-04-06 23:41:34'),
(2, 'Super Admin', '2023-04-06 23:42:43', '2023-04-06 23:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Menunggu', NULL, NULL),
(2, 'Diproses', NULL, NULL),
(3, 'Dapat Diambil', NULL, NULL),
(4, 'Selesai', NULL, NULL),
(5, 'Ditolak', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `uuid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kode_surat` varchar(8) NOT NULL,
  `status_id` int DEFAULT '2',
  `mata_kuliah` varchar(50) DEFAULT NULL,
  `dosen_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '7c2d25bc-f3dc-11ed-a05b-0242ac120003',
  `kode_koordinator` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'ab1adde2-f3dc-11ed-a05b-0242ac120003',
  `prodi_id` int NOT NULL COMMENT 'prodi mahasiswa yang melakukan pengajuan surat\r\n',
  `metode_pengajuan` enum('Admin','Anjungan') NOT NULL DEFAULT 'Admin',
  `nama_mitra` varchar(100) DEFAULT NULL,
  `alamat_mitra` text,
  `tanggal_dibuat` date DEFAULT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `judul_ta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kebutuhan` enum('Eksternal','Internal') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alasan_penolakan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `keterangan` text,
  `softfile_scan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`uuid`, `kode_surat`, `status_id`, `mata_kuliah`, `dosen_id`, `kode_koordinator`, `prodi_id`, `metode_pengajuan`, `nama_mitra`, `alamat_mitra`, `tanggal_dibuat`, `tanggal_pelaksanaan`, `tanggal_selesai`, `judul_ta`, `kebutuhan`, `alasan_penolakan`, `keterangan`, `softfile_scan`, `created_at`, `updated_at`) VALUES
('09d91c45-5d1d-4074-9665-026862d3ab33', 'TA', 4, NULL, '7c2d25bc-f3dc-11ed-a05b-0242ac120003', 'be9a90b6-a05d-4aa1-9b83-e996eec564af', 1, 'Anjungan', 'Politeknik Negeri Jember Jurusan Teknologi Informasi', 'Jl. Mastrip', '2023-11-06', '2023-11-06', '2023-11-21', 'Pengenalan dan Pendeteksian Huruf Hanacaraka Untuk Anak Usia Dini ', 'Internal', NULL, NULL, 'TA_10-11-2023_E41210759.pdf', '2023-11-06 06:37:54', '2023-11-10 06:26:54'),
('0c90ab10-6fb0-42ec-9f17-18110ea6773b', 'TA', 1, '', '7c2d25bc-f3dc-11ed-a05b-0242ac120003', '590248c2-f45e-4d62-a213-f42cd07bd3e8', 1, 'Anjungan', 'PT. Mutiara Indah Sejahtera', 'Jember', '2023-11-18', '2023-11-12', '2023-11-23', 'Pembuatan Aplikasi berbasis Website', 'Eksternal', NULL, NULL, NULL, '2023-11-18 03:56:55', '2023-11-18 03:56:55'),
('354c629d-1998-4f81-983e-b2c5fc9bc8de', 'TA', 1, NULL, '7c2d25bc-f3dc-11ed-a05b-0242ac120003', 'be9a90b6-a05d-4aa1-9b83-e996eec564af', 1, 'Anjungan', 'Politeknik Negeri Jember Jurusan Teknologi Informasi', 'Jl. Mastrip', '2023-11-06', '2023-11-06', '2023-11-21', 'Pembuatan Aplikasi berbasis Website', 'Internal', NULL, NULL, 'TA_10-11-2023_E41210759.pdf', '2023-11-06 06:37:45', '2023-11-06 06:37:45'),
('d3816373-78e3-429b-9913-35ba598e46a9', 'TA', 1, '', '7c2d25bc-f3dc-11ed-a05b-0242ac120003', '386412f4-96a9-4b17-bf8d-e12b1aecb515', 1, 'Anjungan', 'PT. Mutiara Indah Sejahtera', 'Jember', '2023-11-18', '2023-11-12', '2023-11-23', 'Pembuatan Aplikasi berbasis Website', 'Internal', NULL, NULL, NULL, '2023-11-18 03:58:17', '2023-11-18 03:58:17'),
('f2713f02-3d86-4b04-b93d-fada7d35e86e', 'PK', 2, NULL, '7c2d25bc-f3dc-11ed-a05b-0242ac120003', '590248c2-f45e-4d62-a213-f42cd07bd3e8', 1, 'Anjungan', 'Politeknik Negeri Jember Jurusan Teknologi Informasi', 'Jl. Mastrip', '2023-11-11', '2023-11-17', '2023-11-30', NULL, 'Internal', NULL, NULL, NULL, '2023-11-11 10:46:44', '2023-11-15 13:26:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `id` (`surat_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `koordinator`
--
ALTER TABLE `koordinator`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `kode_surat` (`kode_surat`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`uuid`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_anjungan`
--
ALTER TABLE `pengajuan_anjungan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_surat` (`kode_surat`,`surat_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `kode_surat` (`kode_surat`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `kode_koordinator` (`kode_koordinator`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKadmin63973` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `FKdosen407387` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `koordinator`
--
ALTER TABLE `koordinator`
  ADD CONSTRAINT `FKkoordinato968822` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `koordinator_ibfk_1` FOREIGN KEY (`kode_surat`) REFERENCES `jenis_surat` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FKmahasiswa236992` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `FKsurat482557` FOREIGN KEY (`kode_surat`) REFERENCES `jenis_surat` (`kode`),
  ADD CONSTRAINT `FKsurat94522` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `prodi_fk` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`kode_koordinator`) REFERENCES `koordinator` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_ibfk_3` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
