-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 06:43 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmc_employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `home_ptcl_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `employee_id`, `home_ptcl_no`, `personal_mobile_no`, `personal_email`, `created_at`, `updated_at`) VALUES
(1, 1, '+1 (614) 813-4432', '+1 (629) 512-9877', 'negilyg@mailinator.com', '2022-06-23 18:59:53', '2022-06-23 18:59:53'),
(2, 2, '+1 (614) 813-4432', '+1 (629) 512-9877', 'negilyg@mailinator.com', '2022-06-23 19:08:49', '2022-06-23 19:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `devision_or_grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `employee_id`, `particular`, `year`, `name_of_institute`, `devision_or_grade`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cooke and Floyd Associates', '+1 (536) 317-9285', 'Ross Pate LLC', 'Sharp and Banks Inc', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(2, 1, 'Baird Boone Inc', '+1 (136) 838-4086', 'Hammond and Travis Associates', 'Frazier Cook Trading', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(3, 1, 'Sharp and Butler Inc', '+1 (654) 457-8552', 'Gallagher Horne Traders', 'Craft Stout LLC', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(5, 2, 'Little and Harrell Traders', '+1 (407) 391-4674', 'Murphy House Plc', 'Nielsen Jefferson Associates', '2022-06-23 19:09:19', '2022-06-23 19:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `name_of_contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residential_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `employee_id`, `name_of_contact_person`, `relationship`, `residential_contact`, `mobile`, `health_condition`, `hobbies`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gonzalez Sharpe Inc', 'other', '+1 (655) 865-5501', '+1 (846) 322-9339', 'Laborum ut voluptas', 'Veniam veritatis co', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(2, 2, 'Mayer and Burt Associates', 'brother', '+1 (702) 952-7276', '+1 (567) 326-9822', 'Culpa aspernatur et', 'Ea consequatur dolor', '2022-06-23 19:09:13', '2022-06-23 19:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_status` tinyint(1) NOT NULL DEFAULT 0,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic_expiry` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `token`, `form_status`, `full_name`, `father_name`, `dob`, `place_of_birth`, `cnic`, `cnic_expiry`, `blood_group`, `religion`, `marital_status`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, '62b5e740a8a00', 0, 'Boris Gay', 'Chancellor Mooney', '2006-11-01', 'Reagan Huber', 'Mikayla Powers', '2004-10-22', 'Tasha Maynard', 'Pamela Aguirre', 1, 1, NULL, '2022-06-23 18:59:53', '2022-06-23 18:59:53'),
(2, 2, '62b5e733c22c3', 0, 'Boris Gay', 'Chancellor Mooney', '2006-11-01', 'Reagan Huber', 'Mikayla Powers', '2004-10-22', 'Tasha Maynard', 'Pamela Aguirre', 1, 1, NULL, '2022-06-23 19:08:49', '2022-06-23 19:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `cnic_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_documents`
--

INSERT INTO `employee_documents` (`id`, `employee_id`, `cnic_front`, `cnic_back`, `passport`, `updated_cv`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '24-06-2022-00010162b4febd86e55.jpg', '24-06-2022-00010162b4febd87506.jpg', '24-06-2022-00010162b4febd8785d.jpg', '24-06-2022-00010162b4febd87b91.jpg', NULL, '2022-06-23 19:01:01', '2022-06-23 19:01:01'),
(2, 2, '24-06-2022-00103462b500fa7393f.jpg', '24-06-2022-00103462b500fa73ebf.jpg', '24-06-2022-00103462b500fa74270.jpg', '24-06-2022-00103462b500fa7459a.jpg', NULL, '2022-06-23 19:10:34', '2022-06-23 19:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_education_documents`
--

CREATE TABLE `employee_education_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_education_documents`
--

INSERT INTO `employee_education_documents` (`id`, `employee_id`, `type`, `name`, `document`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'education', NULL, '24-06-2022-00010162b4febd9315c.jpg', NULL, '2022-06-23 19:01:01', '2022-06-23 19:01:01'),
(2, 1, 'additional', NULL, '24-06-2022-00010162b4febdbfd99.jpg', NULL, '2022-06-23 19:01:01', '2022-06-23 19:01:01'),
(3, 2, 'education', NULL, '24-06-2022-00103462b500fa7f80b.jpg', NULL, '2022-06-23 19:10:34', '2022-06-23 19:10:34'),
(4, 2, 'additional', NULL, '24-06-2022-00103462b500faa228d.jpg', NULL, '2022-06-23 19:10:34', '2022-06-23 19:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_experience_certificates`
--

CREATE TABLE `employee_experience_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_experience_certificates`
--

INSERT INTO `employee_experience_certificates` (`id`, `employee_id`, `name`, `document`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '24-06-2022-00010162b4febdcc17f.jpg', NULL, '2022-06-23 19:01:01', '2022-06-23 19:01:01'),
(2, 2, NULL, '24-06-2022-00103462b500faa82d7.jpg', NULL, '2022-06-23 19:10:34', '2022-06-23 19:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_forms`
--

CREATE TABLE `employee_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_forms`
--

INSERT INTO `employee_forms` (`id`, `employee_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'form-1', 1, '2022-06-23 18:59:53', '2022-06-23 18:59:53'),
(2, 1, 'form-2', 1, '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(3, 1, 'form-3', 1, '2022-06-23 19:00:19', '2022-06-23 19:00:19'),
(4, 1, 'form-4', 1, '2022-06-23 19:01:01', '2022-06-23 19:01:01'),
(5, 1, 'form-5', 1, '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(6, 2, 'form-1', 1, '2022-06-23 19:08:50', '2022-06-23 19:08:50'),
(7, 2, 'form-2', 1, '2022-06-23 19:09:13', '2022-06-23 19:09:13'),
(8, 2, 'form-3', 1, '2022-06-23 19:09:57', '2022-06-23 19:09:57'),
(9, 2, 'form-4', 1, '2022-06-23 19:10:34', '2022-06-23 19:10:34'),
(10, 2, 'form-5', 1, '2022-06-23 19:10:47', '2022-06-23 19:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_slips`
--

CREATE TABLE `employee_salary_slips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_slips`
--

INSERT INTO `employee_salary_slips` (`id`, `employee_id`, `name`, `slip`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '24-06-2022-00010162b4febddda11.jpg', NULL, '2022-06-23 19:01:01', '2022-06-23 19:01:01'),
(2, 2, NULL, '24-06-2022-00103462b500fac08c8.jpg', NULL, '2022-06-23 19:10:34', '2022-06-23 19:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `employment_histories`
--

CREATE TABLE `employment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `name_of_employer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_from` date DEFAULT NULL,
  `employee_to` date DEFAULT NULL,
  `last_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_leaving` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_histories`
--

INSERT INTO `employment_histories` (`id`, `employee_id`, `name_of_employer`, `address`, `contact_person`, `contact_no`, `employee_from`, `employee_to`, `last_designation`, `reason_for_leaving`, `created_at`, `updated_at`) VALUES
(1, 1, '+1 (345) 773-8854', '+1 (696) 563-4205', 'pujirivy@mailinator.com', 'pujirivy@mailinator.com', '1982-02-08', '1972-03-24', 'Hodges Justice Plc', 'Et velit nisi lorem', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(2, 1, '+1 (683) 802-8533', '+1 (361) 392-1121', 'tekyla@mailinator.com', 'tekyla@mailinator.com', '1972-01-15', '2014-07-23', 'Kelley Maldonado Plc', 'Ducimus atque sed n', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(5, 2, '+1 (643) 619-6674', '+1 (988) 633-9749', 'zalado@mailinator.com', 'zalado@mailinator.com', '1978-05-07', '2001-05-22', 'Burke and Cantu Traders', 'Sint fugiat nesciun', '2022-06-23 19:09:19', '2022-06-23 19:09:19'),
(6, 2, '+1 (446) 622-8133', '+1 (797) 297-5822', 'sygyj@mailinator.com', 'sygyj@mailinator.com', '1982-08-06', '1973-08-23', 'Chaney Leonard Inc', 'Quia necessitatibus', '2022-06-23 19:09:19', '2022-06-23 19:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `extended_families`
--

CREATE TABLE `extended_families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `father` tinyint(1) NOT NULL DEFAULT 1,
  `mother` tinyint(1) NOT NULL DEFAULT 1,
  `brother` tinyint(1) NOT NULL,
  `sister` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extended_families`
--

INSERT INTO `extended_families` (`id`, `employee_id`, `father`, `mother`, `brother`, `sister`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, '2022-06-23 18:59:53', '2022-06-23 18:59:53'),
(2, 2, 0, 0, 0, 0, '2022-06-23 19:08:49', '2022-06-23 19:08:49');

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
-- Table structure for table `general_information`
--

CREATE TABLE `general_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_information`
--

INSERT INTO `general_information` (`id`, `employee_id`, `full_name`, `designation`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chantale Macias', 'Oscar Schroeder', '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(2, 1, 'Adele Mcconnell', 'Margaret Gates', '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(3, 2, 'Nina Cummings', 'Lani Mcfadden', '2022-06-23 19:10:46', '2022-06-23 19:10:46'),
(4, 2, 'Kathleen Weaver', 'Olivia Whitley', '2022-06-23 19:10:46', '2022-06-23 19:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_mailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` int(10) UNSIGNED NOT NULL,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from_address`, `mail_from_name`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.gmail.com', 587, 'softwaredeveloper992@gmail.com', 'uftxgddrfvrgtqww', 'tls', NULL, NULL, '2022-06-17 13:46:31', '2022-06-17 13:46:31');

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
(5, '2022_06_14_175748_create_permission_tables', 1),
(6, '2022_02_03_080357_create_settings_table', 2),
(7, '2022_03_14_084656_create_pages_table', 2),
(8, '2022_03_14_143426_create_page_settings_table', 2),
(9, '2022_04_20_064834_create_mail_settings_table', 2),
(13, '2022_06_14_185244_create_contact_details_table', 3),
(14, '2022_06_14_185428_create_residential_addresses_table', 3),
(15, '2022_06_14_185955_create_emergency_contacts_table', 3),
(17, '2022_06_14_190644_create_other_qualifications_table', 3),
(18, '2022_06_14_190939_create_employment_histories_table', 3),
(19, '2022_06_14_191506_create_references_table', 3),
(20, '2022_06_14_191657_create_general_information_table', 3),
(21, '2022_06_14_184056_create_employees_table', 4),
(22, '2022_06_14_201522_create_children_table', 5),
(24, '2022_06_14_184628_create_spouses_table', 7),
(25, '2022_06_15_162525_create_employee_forms_table', 8),
(27, '2022_06_16_185719_create_employee_education_documents_table', 10),
(28, '2022_06_16_185824_create_employee_experience_certificates_table', 11),
(29, '2022_06_16_185907_create_employee_salary_slips_table', 12),
(31, '2022_06_16_185314_create_employee_documents_table', 13),
(33, '2022_06_14_190342_create_education_table', 14),
(34, '2022_06_14_184907_create_extended_families_table', 15),
(35, '2022_06_17_175541_create_notifications_table', 16),
(36, '2022_06_20_184630_create_tick_answers_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('218c637d-d14d-4964-b676-620b197a6084', 'App\\Notifications\\AppNotification', 'App\\Models\\User', 1, '{\"data\":\"Mr\\/Mrs. ASJAD has submited form successfully.\"}', NULL, '2022-06-23 19:10:50', '2022-06-23 19:10:50'),
('7977420a-9908-4416-a6cc-596e137e69eb', 'App\\Notifications\\AppNotification', 'App\\Models\\User', 1, '{\"data\":\"You have shared form with Mr\\/Mrs. ASJADon this email address asjadmmc67@gmail.com\"}', NULL, '2022-06-23 18:58:42', '2022-06-23 18:58:42'),
('8d81b9db-2e66-4739-96d3-47bb4634a4e2', 'App\\Notifications\\AppNotification', 'App\\Models\\User', 1, '{\"data\":\"Mr\\/Mrs. HARDIK SAVANI has submited form successfully.\"}', NULL, '2022-06-23 19:01:24', '2022-06-23 19:01:24'),
('8ef97b29-bf15-4917-95c9-198b472381da', 'App\\Notifications\\AppNotification', 'App\\Models\\User', 2, '{\"data\":\"You have recieved form kindly fill it with correct data.\"}', NULL, '2022-06-23 18:58:45', '2022-06-23 18:58:45'),
('adeb9ca4-f38c-4045-8442-abb569727c62', 'App\\Notifications\\AppNotification', 'App\\Models\\User', 1, '{\"data\":\"You have submitted your form successfully.\"}', NULL, '2022-06-23 19:01:27', '2022-06-23 19:01:27'),
('eb78b834-19d6-48e4-8485-a2cc9e8b68ae', 'App\\Notifications\\AppNotification', 'App\\Models\\User', 2, '{\"data\":\"You have submitted your form successfully.\"}', NULL, '2022-06-23 19:10:53', '2022-06-23 19:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `other_qualifications`
--

CREATE TABLE `other_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_or_percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_qualifications`
--

INSERT INTO `other_qualifications` (`id`, `employee_id`, `course`, `year`, `name_of_institute`, `course_period`, `grade_or_percentage`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sharp and Butler Inc', '+1 (306) 478-7696', 'Owens and Roberts Co', NULL, 'Suarez and Harvey Trading', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(2, 1, 'Sharp and Butler Inc', '+1 (906) 602-3703', 'Morrow Farmer Co', NULL, 'Ortega and Boyer Co', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(3, 1, 'Sharp and Butler Inc', '+1 (427) 553-6549', 'Acosta Riley LLC', NULL, 'Willis Lara Co', '2022-06-23 19:00:08', '2022-06-23 19:00:08'),
(5, 2, 'Little and Harrell Traders', '+1 (992) 393-5908', 'Clarke Burt Inc', NULL, 'Logan Beck Associates', '2022-06-23 19:09:19', '2022-06-23 19:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-06-14 13:04:08', '2022-06-14 13:04:08'),
(2, 'role-create', 'web', '2022-06-14 13:04:08', '2022-06-14 13:04:08'),
(3, 'role-edit', 'web', '2022-06-14 13:04:08', '2022-06-14 13:04:08'),
(4, 'role-delete', 'web', '2022-06-14 13:04:08', '2022-06-14 13:04:08'),
(5, 'product-list', 'web', '2022-06-14 13:04:08', '2022-06-14 13:04:08'),
(6, 'product-create', 'web', '2022-06-14 13:04:09', '2022-06-14 13:04:09'),
(7, 'product-edit', 'web', '2022-06-14 13:04:09', '2022-06-14 13:04:09'),
(8, 'product-delete', 'web', '2022-06-14 13:04:09', '2022-06-14 13:04:09');

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
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `employee_id`, `full_name`, `relationship`, `company_name`, `designation`, `address`, `contact_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'Delgado Jacobson LLC', 'Sanders and Skinner LLC', 'Moss and Dean Inc', 'Beach Joyce Plc', 'Aut neque commodi cu', '+1 (246) 712-2865', '2022-06-23 19:00:19', '2022-06-23 19:00:19'),
(2, 1, 'Stewart Valenzuela Plc', 'Clarke and Pearson Traders', 'Benjamin Mason Inc', 'Meadows and Noel Inc', 'Nobis velit possimu', '+1 (486) 859-9577', '2022-06-23 19:00:19', '2022-06-23 19:00:19'),
(3, 2, 'Holcomb and Estrada Associates', 'Frye Marshall Co', 'Franco Stanton Associates', 'Flynn Nixon Associates', 'Et ipsum velit dolor', '+1 (566) 856-2905', '2022-06-23 19:09:57', '2022-06-23 19:09:57'),
(4, 2, 'Gregory and Lester Traders', 'Jefferson and Nolan Inc', 'Whitfield and Holmes Associates', 'Murray and Meadows Plc', 'Aliquam qui irure cu', '+1 (766) 386-8578', '2022-06-23 19:09:57', '2022-06-23 19:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `residential_addresses`
--

CREATE TABLE `residential_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'current or permanent',
  `living_since` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'year',
  `nearest_landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peroperty_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'own, rental or other',
  `describe_other` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'describe if other',
  `complete_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residential_addresses`
--

INSERT INTO `residential_addresses` (`id`, `employee_id`, `type`, `living_since`, `nearest_landmark`, `peroperty_type`, `describe_other`, `complete_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'current', 'Lyle Owen', 'September Lowery', 'Nathan Sutton', NULL, 'Saepe doloremque ull', '2022-06-23 18:59:53', '2022-06-23 18:59:53'),
(2, 1, 'permanent', 'Kiona Roth', 'Igor Kent', 'Nicholas Mayo', NULL, 'Adipisicing est ipsa', '2022-06-23 18:59:53', '2022-06-23 18:59:53'),
(3, 2, 'current', 'Lyle Owen', 'September Lowery', 'Nathan Sutton', NULL, 'Saepe doloremque ull', '2022-06-23 19:08:49', '2022-06-23 19:08:49'),
(4, 2, 'permanent', 'Kiona Roth', 'Igor Kent', 'Nicholas Mayo', NULL, 'Adipisicing est ipsa', '2022-06-23 19:08:49', '2022-06-23 19:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-06-14 13:04:57', '2022-06-14 13:04:57'),
(2, 'Employee', 'web', '2022-06-17 11:49:18', '2022-06-17 11:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_bar_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_bar_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_col4_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_copyright` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_recent_news_item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_recent_portfolio_item` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsletter_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_button_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_button_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_background_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_email_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo13` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo14` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo15` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_total_recent_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_news_heading_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_news_heading_recent_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_total_upcoming_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_total_past_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_event_heading_upcoming` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_event_heading_past` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_service_heading_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_service_heading_quick_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_portfolio_heading_project_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_portfolio_heading_quick_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_end_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spouses`
--

CREATE TABLE `spouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `spouse_cnic_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tick_answers`
--

CREATE TABLE `tick_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `answer` tinyint(1) NOT NULL DEFAULT 0,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tick_answers`
--

INSERT INTO `tick_answers` (`id`, `employee_id`, `question_id`, `answer`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(2, 1, 2, 1, 'Belle Pope', '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(3, 1, 3, 1, 'Laurel Waters', '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(4, 1, 4, 0, 'Hedda Wilson', '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(5, 1, 5, 0, 'Graiden Joyce', '2022-06-23 19:01:21', '2022-06-23 19:01:21'),
(6, 2, 1, 1, 'Todd Harmon', '2022-06-23 19:10:46', '2022-06-23 19:10:47'),
(7, 2, 2, 0, NULL, '2022-06-23 19:10:46', '2022-06-23 19:10:46'),
(8, 2, 3, 1, 'Gemma Petersen', '2022-06-23 19:10:47', '2022-06-23 19:10:47'),
(9, 2, 4, 0, 'Damon Clarke', '2022-06-23 19:10:47', '2022-06-23 19:10:47'),
(10, 2, 5, 0, 'Buffy Scott', '2022-06-23 19:10:47', '2022-06-23 19:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `tick_questions`
--

CREATE TABLE `tick_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_yes_no` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tick_questions`
--

INSERT INTO `tick_questions` (`id`, `question`, `is_yes_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Any plans for higher education or career development?', 1, 1, '2022-06-20 18:20:35', '2022-06-20 18:20:35'),
(2, 'Any political affiliation?', 1, 1, '2022-06-20 18:20:35', '2022-06-20 18:20:35'),
(3, 'Any affiliation with NGOs?', 1, 1, '2022-06-20 18:21:24', '2022-06-20 18:21:24'),
(4, 'Any membership (club, board, association etc…)?', 0, 1, '2022-06-20 18:21:24', '2022-06-20 18:21:24'),
(5, 'Who referred you for this job?', 0, 1, '2022-06-20 18:21:54', '2022-06-20 18:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_shared` tinyint(1) NOT NULL DEFAULT 0,
  `sent_times` int(11) NOT NULL DEFAULT 0,
  `share_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `form_status`, `is_shared`, `sent_times`, `share_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hardik Savani', 'admin@gmail.com', NULL, '$2y$10$Ek0ULeVFv9J21bnlgHgH3erBRu274c96t29YJ4iQcnogPak2TkML2', NULL, 1, 0, 0, NULL, NULL, '2022-06-14 13:04:57', '2022-06-23 16:17:17'),
(2, 'Asjad', 'asjadmmc67@gmail.com', NULL, NULL, NULL, 1, 1, 3, '62b4fe2aa6de2', NULL, '2022-06-17 12:03:22', '2022-06-23 19:10:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_education_documents`
--
ALTER TABLE `employee_education_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_experience_certificates`
--
ALTER TABLE `employee_experience_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_forms`
--
ALTER TABLE `employee_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_slips`
--
ALTER TABLE `employee_salary_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_histories`
--
ALTER TABLE `employment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extended_families`
--
ALTER TABLE `extended_families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_information`
--
ALTER TABLE `general_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `other_qualifications`
--
ALTER TABLE `other_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residential_addresses`
--
ALTER TABLE `residential_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spouses`
--
ALTER TABLE `spouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tick_answers`
--
ALTER TABLE `tick_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tick_questions`
--
ALTER TABLE `tick_questions`
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
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_education_documents`
--
ALTER TABLE `employee_education_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_experience_certificates`
--
ALTER TABLE `employee_experience_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_forms`
--
ALTER TABLE `employee_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_salary_slips`
--
ALTER TABLE `employee_salary_slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employment_histories`
--
ALTER TABLE `employment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `extended_families`
--
ALTER TABLE `extended_families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_information`
--
ALTER TABLE `general_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `other_qualifications`
--
ALTER TABLE `other_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `residential_addresses`
--
ALTER TABLE `residential_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouses`
--
ALTER TABLE `spouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tick_answers`
--
ALTER TABLE `tick_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tick_questions`
--
ALTER TABLE `tick_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
