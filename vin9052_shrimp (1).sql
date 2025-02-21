-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 05:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vin9052_shrimp`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(7, 'Punam', 'Punam@aol.com', 'I am a supplier of shrimp', 'I want to do bussiness with you', '2024-11-29 02:21:26', '2024-11-29 02:21:26'),
(8, 'vinay', 'vinay.bulusu@gfs.com', 'looking to get associated with GFS', 'Hi I am a suppliers out from India want to associate with GFS', '2025-01-02 23:45:50', '2025-01-02 23:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `cooked_white_shrimp_products`
--

CREATE TABLE `cooked_white_shrimp_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2024_11_03_174921_create_shrimp_products_table', 1),
(14, '2024_11_04_042640_create_cooked_white_shrimp_products_table', 1),
(15, '2024_11_04_051105_create_vendor_form_submissions_table', 1),
(16, '2024_11_12_115531_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'New data submission by Vendor: Vender@gmail.com', 1, '2024-12-20 15:06:01', '2024-12-20 15:06:01'),
(2, 'New data submission by Vendor: Vender@gmail.com', 4, '2024-12-20 15:08:21', '2024-12-20 15:08:21'),
(3, 'New data submission by Vendor: Vender@gmail.com', 2, '2024-12-20 15:24:08', '2024-12-20 15:24:08'),
(4, 'New data submission by Vendor: Punam', 26, '2024-12-20 15:51:50', '2024-12-20 15:51:50'),
(5, 'New data submission by Vendor: Punam', 26, '2024-12-20 15:51:50', '2024-12-20 15:51:50'),
(6, 'New data submission by Vendor: Punam', 26, '2024-12-20 15:51:50', '2024-12-20 15:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'secret', '853dfc0d38833069e36b1b13412f3cbf8458664a7eabbe427774c94d597709e4', '[\"*\"]', NULL, NULL, '2024-12-18 13:22:45', '2024-12-18 13:22:45'),
(2, 'App\\Models\\User', 2, 'secret', 'e66e8f9bbaaff54d9924f99afeb5e43ba81d5012e2769524995426498efa1407', '[\"*\"]', NULL, NULL, '2024-12-18 13:28:52', '2024-12-18 13:28:52'),
(3, 'App\\Models\\User', 1, 'secret', '6ddb658e9fb5618b5a3625893db42f3d24d473990ac5d34dcb74ed7355dd3486', '[\"*\"]', NULL, NULL, '2024-12-20 02:09:57', '2024-12-20 02:09:57'),
(4, 'App\\Models\\User', 2, 'secret', '04f17b278962c37e24e2e976efea3394efecd727e9353c0280d1e7ced4f0290f', '[\"*\"]', NULL, NULL, '2024-12-20 14:51:37', '2024-12-20 14:51:37'),
(5, 'App\\Models\\User', 1, 'secret', 'e160ea12d5695a4dab96fd9ae1bef75fadb7cc883d66a2b3b679ff82e4008e6c', '[\"*\"]', NULL, NULL, '2024-12-20 15:09:20', '2024-12-20 15:09:20'),
(6, 'App\\Models\\User', 2, 'secret', '94ace86fbc54eec41e6da08ec6551cffc395fead5800d2c4c5c82c1bb67170b5', '[\"*\"]', NULL, NULL, '2024-12-20 15:23:50', '2024-12-20 15:23:50'),
(7, 'App\\Models\\User', 1, 'secret', 'e5f7d1238c93dd7ac6d3fca02202b67240bfd1098b22eff1d2e75b6f44a44de8', '[\"*\"]', NULL, NULL, '2024-12-20 15:25:11', '2024-12-20 15:25:11'),
(8, 'App\\Models\\User', 6, 'secret', '33f89d3bef0d4df6da99f21acc2296cf3d17896b1a650ffdab324ebadeac9853', '[\"*\"]', NULL, NULL, '2024-12-20 15:50:56', '2024-12-20 15:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `shrimp_products`
--

CREATE TABLE `shrimp_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `size_range` varchar(255) NOT NULL,
  `freezing_method` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `section` varchar(255) NOT NULL,
  `compliance_statement` text NOT NULL,
  `raw_materials` text NOT NULL,
  `processing` text NOT NULL,
  `freezing` text NOT NULL,
  `glazing` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shrimp_products`
--

INSERT INTO `shrimp_products` (`id`, `name`, `size_range`, `freezing_method`, `brand`, `image_path`, `section`, `compliance_statement`, `raw_materials`, `processing`, `freezing`, `glazing`, `created_at`, `updated_at`) VALUES
(1, 'RAW VANNAMEI HEADLESS, SHELL-ON SHRIMP (HLSO)', '8/12 thru 71/90', 'IQF, Block', 'gold', 'shrimp_products_image/slide-1.jpg', 'Raw vannamei', '', '', '', '', '', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(2, 'RAW VANNAMEI PEELED, DEVEINED, TAIL-ON SHRIMP', '8/12 thru 71/90', 'IQF', 'classic', 'shrimp_products_image/slide-2.jpg', 'Raw vannamei', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous or  foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored shrimp are packed  within the same package.  Shrimp shall be fully peeled with the exception of the tail segment (6th segment)  and tail-fins. The sand vein shall be completely removed by cutting the meat from the backside, from  segments 2 through 5, and pulling out the vein. The shrimp are then soaked in a solution of chemical 2%  Sodium Tripolyphosphate and 1.5% salt for a maximum of 2 hours. During the soaking, the solution must  be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%). ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified. ', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(3, 'RAW VANNAMEI PEELED, DEVEINED, TAIL-OFF SHRIMP', '8/12 thru 110/130', 'IQF, Block', 'classic, gold', 'shrimp_products_image/slide-3.jpg', 'Raw vannamei', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous or  foreign matter, off-odors or off-flavors of any kind.', 'Shell-on shrimp shall be color graded to assure that uniform colored shrimp are packed  within the same package.  Shrimp shall be fully peeled, including the tail segment (6th segment) and tail fins. The sand vein shall be completely removed by cutting the meat from the backside, from segments 2  through 5, and pulling out the vein. The shrimp are then soaked in a solution of chemical 2% Sodium  Tripolyphosphate and 1.5% salt for a maximum of 2 hours. During the soaking, the solution must be kept at  3-5oC.  Final Moisture shall be 83% (+ 0.5%).', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified. ', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(4, 'RAW VANNAMEI EASY PEEL SHRIMP', '13/15 thru 51/60', 'IQF, Block', 'classic, gold', 'shrimp_products_image/slide-4.jpg', 'Raw vannamei', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110).', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei).   Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio.  Product shall  be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous or  foreign matter, off-odors or off-flavors of any kind.', 'Shell-on shrimp shall be color graded to assure that uniform colored tiger shrimp are packed  within the same package.  Shell-on shrimp shall have the backs fully split (cut-open) through segments 1  through 5.  The 6th segment and tail fins shall be left intact.  The sand vein shall be completely removed by  cutting the meat from the backside, from segments 2 through 5, and pulling out the vein. The shrimp are  then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a maximum of 2  hours. During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%).', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified. ', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(5, 'RAW VANNAMEI HEADON, WHOLE SHRIMP (HOSO)', '10/20 thru 60/70', 'IQF', 'gold', 'shrimp_products_image/slide-5.jpg', 'Raw vannamei', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110).', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives, including sulfites. The raw materials shall be free from all forms  of extraneous or foreign matter, off-odors or off-flavors of any kind.', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus  Vannamei). Raw shrimp shall be sized graded to achieve the required finished count/lb.  and uniformity ratio. Product shall be free from any chemical preservatives The shrimp are  then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a maximum of 2  hours. During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%).', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 10-12% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified, for 100% net weight.   ', '2024-11-03 12:32:56', '2024-11-03 12:32:56'),
(6, 'RAW VANNAMEI NOBASHI EBI', '16/20 thru 26/30', 'IQF', 'classic', 'shrimp_products_image/slide-6.jpg', 'Raw vannamei', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and  under strict sanitary conditions in accordance  with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus  Vannamei). Raw shrimp shall be sized graded to achieve the required finished count/lb. and  uniformity ratio. Product shall be free from any chemical preservatives. The raw materials shall  be free from all forms of extraneous or foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored shrimp are  packed within the same package. Shrimp shall be fully peeled with the exception of the tail  segment (6 th segment) and tail-fins. The sand vein shall be completely removed by cutting the  meat from the backside, from segments 2 through 5, and pulling out the vein.  The shrimp are then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5%  salt for a maximum of 2 hours. During the soaking, the solution must be kept at 3-5 oC. Final  Moisture shall be a maximum 83%. 10 shrimp shall be placed on an 8” skewer. ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp skewers, after exiting from the tunnel freezer, shall have an ice chilled potable water spray/bath to allow adequate formation of a glazed ice surface. A  minimum of 8-10% glaze pick-up on the finished product shall be targeted to protect the  product during extended periods of storage. Prior to packing, a minimum packing weight  of 2.0 lbs. net de-glazed weight shall be verified.', '2024-11-03 12:32:56', '2024-11-03 12:32:56'),
(7, 'RAW VANNAMEI HEADLESS, SHELL-ON SHRIMP (HLSO)', '8/12 thru 71/90', 'IQF, Block', 'gold', 'shrimp_products_image/slide-7.jpg', 'Raw vannamei', '', '', '', '', '', '2024-11-03 12:32:56', '2024-11-03 12:32:56'),
(8, 'RAW VANNAMEI PEELED, DEVEINED, TAIL-ON SHRIMP', '8/12 thru 71/90', 'IQF', 'classic', 'shrimp_products_image/slide-8.jpg', 'Raw vannamei', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous or  foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored shrimp are packed  within the same package.  Shrimp shall be fully peeled with the exception of the tail segment (6th segment)  and tail-fins. The sand vein shall be completely removed by cutting the meat from the backside, from  segments 2 through 5, and pulling out the vein. The shrimp are then soaked in a solution of chemical 2%  Sodium Tripolyphosphate and 1.5% salt for a maximum of 2 hours. During the soaking, the solution must  be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%). ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified. ', '2024-11-03 12:35:39', '2024-11-03 12:35:39'),
(9, 'RAW VANNAMEI PEELED, DEVEINED, TAIL-OFF SHRIMP', '8/12 thru 110/130', 'IQF, Block', 'classic, gold', 'shrimp_products_image/slide-9.jpg', 'Raw vannamei', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous or  foreign matter, off-odors or off-flavors of any kind.', 'Shell-on shrimp shall be color graded to assure that uniform colored shrimp are packed  within the same package.  Shrimp shall be fully peeled, including the tail segment (6th segment) and tail fins. The sand vein shall be completely removed by cutting the meat from the backside, from segments 2  through 5, and pulling out the vein. The shrimp are then soaked in a solution of chemical 2% Sodium  Tripolyphosphate and 1.5% salt for a maximum of 2 hours. During the soaking, the solution must be kept at  3-5oC.  Final Moisture shall be 83% (+ 0.5%).', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified. ', '2024-11-03 12:35:39', '2024-11-03 12:35:39'),
(11, 'Cooked Vannamei Peeled, Deveined, Tail-On Shrimp', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-1.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(12, 'Cooked Vannamei Peeled, Deveined, Tail-Off Shrimp', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-2.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(13, 'Cooked Vannamei Easy Peel Shrimp', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-3.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(14, 'Cooked Vannamei Headless, Shell-On Shrimp (HLSO)', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-4.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(15, 'Cooked Vannamei Headon, Whole Shrimp (HOSO)', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-5.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(16, 'Cooked Vannamei Nobashi Ebi', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-6.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(17, 'Cooked Vannamei Peeled, Deveined, Tail-On Shrimp', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-7.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(18, 'Cooked Vannamei Peeled, Deveined, Tail-Off Shrimp', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-8.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(19, 'Cooked Vannamei Easy Peel Shrimp', '13/15 thru 91/110', 'IQF', 'classic', 'cooked_white_shrimp/cooked-9.jpg', 'Cooked White Shrimp', '', '', '', '', '', NULL, NULL),
(20, 'Black Tiger Raw PDTOFF', '8/12 thru 71/90', 'IQF', 'classic', 'black_tiger_cooked/Black Tiger Raw PDTOFF.jpg', 'Raw Tiger Shrimp', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(21, 'Black Tiger Cooked PDTOFF', '8/12 thru 71/90', 'IQF', 'gold', 'black_tiger_cooked/Black Tiger Cooked PDTOFF.jpg', 'Black Tiger Cooked', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(22, 'Black Tiger Cooked PDTO', '10/20 thru 51/60', 'IQF', 'classic', 'black_tiger_cooked/Black Tiger Cooked PDTO.jpg', 'Black Tiger Cooked', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(23, 'Black Tiger HOSO COOKED', '10/20 thru 60/70', 'Block', 'gold', 'black_tiger_cooked/Black-Tiger-HOSO-COOKED.jpg', 'Black Tiger Cooked', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(24, 'Black Tiger Raw PDTO', '10/20 thru 60/70', 'IQF', 'classic', 'black_tiger_cooked/Black Tiger Raw PDTO.jpg', 'Black Tiger Cooked', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(25, 'Black Tiger Easy Peel', '13/15 thru 51/60', 'IQF', 'classic', 'black_tiger_cooked/Black-Tiger_Easy PeeL.jpg', 'Black Tiger Cooked', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(26, 'Black Tiger HOSO IQF', '16/20 thru 26/30', 'IQF', 'gold', 'black_tiger_cooked/Black-Tiger-HOSO-IQF.jpg', 'Black Tiger Cooked', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(27, 'Black Tiger HLSO Block', '13/15 thru 60/70', 'Block', 'classic', 'black_tiger_cooked/Black-Tiger-HLSO-Block.jpg', 'Black Tiger Cooked', '', '', '', '', '', '2024-11-06 07:16:35', '2024-11-06 07:16:35'),
(28, 'Black Tiger Head Less Shell on', '8/12 thru 71/90', 'IQF, Block', 'Buyer Choice', 'carousel_category/1.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110).', 'Fresh, clean, wholesome, farm-raised shell-on Black Tiger Shrimp (Penaeus monodon).  Raw shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product  shall be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous  or foreign matter, off-odors or off-flavors of any kind.', 'Shell-on shrimp shall be color graded to assure that uniform colored tiger shrimp are packed  within the same package (i.e. green-brown tigers not mixed with bright blue tigers).  The head shall and the  sand vein shall be removed by pulling out the vein from the front end of the shrimp.  The shrimp are then  soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a maximum of 2 hours.  During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%). ', 'Shrimp shall be laid into block form and frozen to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.  ', '', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(29, 'Black Tiger Peeled Deveined Tail On', ' 8/12 thru 71/90', 'IQF, Block', 'Buyer Choice', 'carousel_category/2.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on Black Tiger Shrimp (Penaeus monodon).  Raw shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product  shall be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous  or foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored tiger shrimp are packed  within the same package (i.e. green-brown tigers not mixed with bright-blue tigers).  Shrimp shall be fully  peeled with the exception of the tail segment (6th segment) and tail-fins. The sand vein shall be completely  removed by cutting the meat from the backside, from segments 2 through 5, and pulling out the vein. The  shrimp are then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a  maximum of 2 hours. During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83%  (+ 0.5%).', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 1.5 lbs. net de-glazed weight shall be verified.  ', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(30, 'Vannamei Peeled Deveined Tail Off', '8/12 thru 71/90', 'IQF, Block', 'Buyer Choice', 'carousel_category/3.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110).', ' Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous or  foreign matter, off-odors or off-flavors of any kind.', 'Shell-on shrimp shall be color graded to assure that uniform colored shrimp are packed  within the same package.  Shrimp shall be fully peeled, including the tail segment (6th segment) and tail fins. The sand vein shall be completely removed by cutting the meat from the backside, from segments 2  through 5, and pulling out the vein. The shrimp are then soaked in a solution of chemical 2% Sodium  Tripolyphosphate and 1.5% salt for a maximum of 2 hours. During the soaking, the solution must be kept at  3-5oC.  Final Moisture shall be 83% (+ 0.5%). ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified. ', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(31, 'Black Tiger Pulled Vein Tail On\n', '8/12 thru 71/90.', 'IQF, Block', 'Buyer Choice', 'carousel_category/4.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on Black Tiger Shrimp (Penaeus monodon).  Raw shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product  shall be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous  or foreign matter, off-odors or off-flavors of any kind. ', ' Shell-on shrimp shall be color graded to assure that uniform colored tiger shrimp are packed  within the same package (i.e. green-brown tigers not mixed with bright blue tigers).  The head shall and the  sand vein shall be removed by pulling out the vein from the front end of the shrimp.  The shrimp are then  soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a maximum of 2 hours.  During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%).', 'Shrimp shall be laid into block form and frozen to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.  ', '', '2024-11-03 12:32:56', '2024-11-03 12:32:56'),
(32, 'Black Tiger Peeled UN Deveined Tail Of', '8/12 thru 71/90', 'IQF, Block', 'Buyer Choice', 'carousel_category/5.jpg', 'Product Category', ' All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', ' Fresh, clean, wholesome, farm-raised shell-on Black Tiger Shrimp (Penaeus monodon).  Raw shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product  shall be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous  or foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored tiger shrimp are packed  within the same package (i.e. green-brown tigers not mixed with bright blue tigers).  The head shall and the  sand vein shall not be removed .The shrimp are then soaked in a solution of chemical 2% Sodium  Tripolyphosphate and 1.5% salt for a maximum of 2 hours. During the soaking, the solution must be kept at  3-5oC.  Final Moisture shall be 83% (+ 0.5%). ', 'Shrimp shall be laid into block form and frozen to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.  ', '', '2024-11-03 12:32:56', '2024-11-03 12:32:56'),
(33, 'Vannamei Shrimp Butterfly', '8/12 thru 91/110', 'IQF, Block', 'Buyer Choice', 'carousel_category/6.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110).', 'Fresh, clean, wholesome, farm-raised shell-on Black Tiger Shrimp (Penaeus monodon).  Raw shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product  shall be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous  or foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored tiger shrimp are packed  within the same package (i.e. green-brown tigers not mixed with bright-blue tigers).  Shrimp shall be fully  peeled with the exception of the tail segment (6th segment) and tail-fins. The sand vein shall be completely  removed by cutting the meat from the backside, from segments 2 through 5, and pulling out the vein. The  shrimp are then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a  maximum of 2 hours. During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83%  (+ 0.5%). ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 1.5 lbs. net de-glazed weight shall be verified. ', '2024-11-03 12:32:56', '2024-11-03 12:32:56'),
(34, 'Vannamei Shrimp Skewers', '8/12 thru 91/110', 'IQF, Block', 'Buyer Choice', 'carousel_category/7.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and  under strict sanitary conditions in accordance  with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus  Vannamei). Raw shrimp shall be sized graded to achieve the required finished count/lb. and  uniformity ratio. Product shall be free from any chemical preservatives. The raw materials shall  be free from all forms of extraneous or foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored shrimp are  packed within the same package. Shrimp shall be fully peeled with the exception of the tail  segment (6 th segment) and tail-fins. The sand vein shall be completely removed by cutting the  meat from the backside, from segments 2 through 5, and pulling out the vein.  The shrimp are then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5%  salt for a maximum of 2 hours. During the soaking, the solution must be kept at 3-5 oC. Final  Moisture shall be a maximum 83%. 10 shrimp shall be placed on an 8” skewer. ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.  ', 'Frozen shrimp skewers, after exiting from the tunnel freezer, shall have an ice chilled potable water spray/bath to allow adequate formation of a glazed ice surface. A  minimum of 8-10% glaze pick-up on the finished product shall be targeted to protect the  product during extended periods of storage. Prior to packing, a minimum packing weight  of 2.0 lbs. net de-glazed weight shall be verified.', '2024-11-03 12:35:39', '2024-11-03 12:35:39'),
(35, 'Vannamei Cooked Head on Shrimp', '8/12 thru 91/110', 'IQF, Block', 'Buyer Choice', 'carousel_category/8.jpg', 'Product Category', ' All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', ' Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives, including sulfites. The raw materials shall be free from all forms  of extraneous or foreign matter, off-odors or off-flavors of any kind.', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus  Vannamei). Raw shrimp shall be sized graded to achieve the required finished count/lb.  and uniformity ratio. Product shall be free from any chemical preservatives The shrimp are  then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a maximum of 2  hours. During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%).  Prior to cooking, shrimp must be laid on trays in a manner which maintains natural curl (“hook”) after  cooking and freezing. Shrimp must be fully cooked by reaching an internal temperature of 163oF (73oC). ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 10-12% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified, for 100% net weight.   ', '2024-11-03 12:35:39', '2024-11-03 12:35:39'),
(36, 'Vannamei Cooked Head Less Shell on Shrimp\n', '8/12 thru 91/110', 'IQF, Block', 'Buyer Choice', 'carousel_category/9.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110).', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei). Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio. Product shall  be free from any chemical preservatives, including sulfites. The raw materials shall be free from all forms  of extraneous or foreign matter, off-odors or off-flavors of any kind. ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus  Vannamei). Raw shrimp shall be sized graded to achieve the required finished count/lb.  and uniformity ratio. Product shall be free from any chemical preservatives The shrimp are  then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a maximum of 2  hours. During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%).  Prior to cooking, shrimp must be laid on trays in a manner which maintains natural curl (“hook”) after  cooking and freezing. Shrimp must be fully cooked by reaching an internal temperature of 163oF (73oC). ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer. ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 10-12% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified, for 100% net weight.   ', NULL, NULL),
(37, 'Vannamei Cooked HL Easy Peel Shrimp', '8/12 thru 91/110.', 'IQF, Block', 'Buyer Choice', 'carousel_category/10.jpg', 'Product Category', 'All shrimp products shall be processed in accordance with U.S. FDA  Regulations, Title 21 CFR, in compliance with Seafood HACCP Requirements (Part 123) and under strict  sanitary conditions in accordance with the Good Manufacturing Practices (Part 110). ', 'Fresh, clean, wholesome, farm-raised shell-on White Shrimp (Penaeus vannamei).   Raw  shrimp shall be sized graded to achieve the required finished count/lb. and uniformity ratio.  Product shall  be free from any chemical preservatives. The raw materials shall be free from all forms of extraneous or  foreign matter, off-odors or off-flavors of any kind. ', 'Shell-on shrimp shall be color graded to assure that uniform colored tiger shrimp are packed  within the same package.  Shell-on shrimp shall have the backs fully split (cut-open) through segments 1  through 5.  The 6th segment and tail fins shall be left intact.  The sand vein shall be completely removed by  cutting the meat from the backside, from segments 2 through 5, and pulling out the vein. The shrimp are  then soaked in a solution of chemical 2% Sodium Tripolyphosphate and 1.5% salt for a maximum of 2  hours. During the soaking, the solution must be kept at 3-5oC.  Final Moisture shall be 83% (+ 0.5%).  Prior to cooking, shrimp must be laid on trays in a manner which maintains natural curl (“hook”) after  cooking and freezing. Shrimp must be fully cooked by reaching an internal temperature of 163oF (73oC). ', 'Shrimp shall be individually quick-frozen (IQF) to achieve an internal core temperature of at  least 0oF (-18oC) or below upon exiting the freezer.  ', 'Frozen shrimp, after exiting from the IQF tunnel freezer, shall have an ice-chilled potable water  spray/bath to allow adequate formation of a glazed ice surface. A minimum of 8-10% glaze pick-up on the  finished product shall be targeted to protect the product during extended periods of storage.  Prior to  packing, a minimum packing weight of 2.0 lbs. net de-glazed weight shall be verified.  ', '2024-11-03 12:25:39', '2024-11-03 12:25:39'),
(38, 'Vannamei Cooked Peeled Deveined Tail On', '8/12 thru 91/110', 'IQF, Block', 'Buyer Choice', 'carousel_category/11.jpg', 'Product Category', '', '', '', '', '', NULL, NULL),
(39, 'Peeled and un-deveined (PUD) Tail ON', '8/12 thru 71/90', 'IQF, Block', 'gold', 'shrimp_products_image/1.png', 'Raw vannamei', '', '', '', '', '', NULL, NULL),
(40, 'Peeled and un-deveined (PUD) Tail OFF', '8/12 thru 71/90', 'IQF, Block', 'gold', 'shrimp_products_image/2.2.jpg', 'Raw vannamei', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_1` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `email_1`, `company_name`, `password`, `contact_number`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Copretive@gmail.com', 'Prasad', 'Copretive@gmail.com', 'Copretive@gmail.com', NULL, NULL, NULL, '$2y$10$dFCoTm8VKZejg7bd/LHctu0ZwWrudEOL/tROOCmqR72IgTNWd8Pq.', '6236945235', NULL, '2', 'active', NULL, '2024-11-06 14:35:01', '2024-11-06 14:35:01'),
(2, 'Vender@gmail.com', 'Vender@gmail.com', 'Vender@gmail.com', 'Vender@gmail.com', NULL, NULL, 'Vender Company', '$2y$10$N4Mtf.cN47uxbAyG749ERuLkCzkXk/YaJWvTPTqeWFFaL0YpOl7qe', '6236945236', 'Vender@gmail.com', '1', 'active', NULL, '2024-11-06 14:36:40', '2024-11-06 14:38:00'),
(3, 'vinay', 'b', 'vinaybulusu', 'VINAY.CRAZYMEN@GMAIL.COM', NULL, NULL, NULL, '$2y$10$F//uUGbPxuJrsCq3VQYtE.j5zucSV/k/IJjbhR6cC10ISYl7iDrQm', '9052979685', NULL, '2', 'active', NULL, '2024-11-06 17:38:42', '2024-11-06 17:38:42'),
(5, 'Srivalli', 'b', 'srivalli', 'Psrivalli87@gmail.com', NULL, NULL, 'homefoods', '$2y$10$N4Mtf.cN47uxbAyG749ERuLkCzkXk/YaJWvTPTqeWFFaL0YpOl7qe', '09052979685', 'vzm', '1', 'active', NULL, '2024-11-08 11:42:14', '2024-11-08 11:44:34'),
(6, 'vinay', 'b', 'Punam', 'vinaylimson@gmail.com', NULL, NULL, 'Vmarinestar', '$2y$10$MMA12EoUskTawqQzoqn3VOj/eketzTpicYvhQJPdkwiagTjJTkgOO', '09052979685', 'D.NO 1-57/4-37, FLAT NO 306, SECTOR 2, SS GARDENS, MVP COLONY', '1', 'active', NULL, '2024-12-12 05:38:32', '2024-12-12 05:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_form_submissions`
--

CREATE TABLE `vendor_form_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity_range` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `treatment` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `certified` varchar(100) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_form_submissions`
--

INSERT INTO `vendor_form_submissions` (`id`, `product_id`, `quantity_range`, `price`, `currency`, `validity`, `treatment`, `description`, `certified`, `rating`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES
(1, '2', '8 - 12', 80.00, '$USD', '1 Year', 'Phosphate Free', 'ksdfoskf', '', '4', '2', 'Vender@gmail.com', '2025-02-05 22:53:47', '2025-02-05 22:53:47'),
(2, '1', '31 - 40', 220.00, '$USD', '1 Month', 'Chem Free', 'plpl', '', '4', '2', 'Vender@gmail.com', '2025-02-05 22:59:13', '2025-02-05 22:59:13'),
(3, '9', '31 - 40', 20.00, '$USD', '2 Weeks', 'Phosphate Free', 'okokokokokkoko', '', '4', '2', 'Vender@gmail.com', '2025-02-06 23:16:15', '2025-02-06 23:16:15'),
(4, '9', '41 - 50', 40.00, '$CAD', '1 Month', 'Phosphate Free', 'okokokokokkoko', '', '4', '2', 'Vender@gmail.com', '2025-02-06 23:16:15', '2025-02-06 23:16:15'),
(5, '40', '80/100 PUD Tail ON', 12.00, '$CAD', '3 Months', 'Phosphate Free', 'sdfsfsdfsdf', '', '4', '2', 'Vender@gmail.com', '2025-02-19 00:29:02', '2025-02-19 00:29:02'),
(6, '2', '31 - 40', 145.00, '$CAD', '1 Month', 'Phosphate Free', 'sfdsff', '', '4', '2', 'Vender@gmail.com', '2025-02-19 00:29:31', '2025-02-19 00:29:31'),
(7, '40', '91 - 110', 45.00, '$CAD', '1 Month', 'Phosphate Free', 'sdfsfsf', '', '2', '2', 'Vender@gmail.com', '2025-02-19 00:48:37', '2025-02-19 00:48:37'),
(8, '40', '80 - 100', 45.00, '$USD', '6 Months', 'Phosphate Free', 'sdfsfsfdsfsf', '', '5', '2', 'Vender@gmail.com', '2025-02-19 00:50:39', '2025-02-19 00:50:39'),
(9, '39', '91 - 110', 12.00, '$CAD', '1 Week', 'STPP/ NW-NC', '12', '', '0', '2', 'Vender@gmail.com', '2025-02-20 00:52:10', '2025-02-20 00:52:10'),
(10, '39', '41 - 50', 22.00, '$CAD', '1 Week', 'STPP/ NW-NC', '00', '', '4', '2', 'Vender@gmail.com', '2025-02-20 00:52:41', '2025-02-20 00:52:41'),
(11, '39', '91 - 110', 1212.00, '$USD', '1 Week', 'STPP/ NW-NC', '12', '', '0', '2', 'Vender@gmail.com', '2025-02-20 00:52:59', '2025-02-20 00:52:59'),
(12, '39', '91 - 110', 22.00, '$CAD', '1 Week', 'STPP/ NW-NC', '425', 'ASC Certified', '4', '2', 'Vender@gmail.com', '2025-02-20 01:33:39', '2025-02-20 01:33:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooked_white_shrimp_products`
--
ALTER TABLE `cooked_white_shrimp_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `shrimp_products`
--
ALTER TABLE `shrimp_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_form_submissions`
--
ALTER TABLE `vendor_form_submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cooked_white_shrimp_products`
--
ALTER TABLE `cooked_white_shrimp_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shrimp_products`
--
ALTER TABLE `shrimp_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor_form_submissions`
--
ALTER TABLE `vendor_form_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
