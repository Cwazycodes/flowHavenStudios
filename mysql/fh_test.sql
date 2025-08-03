-- -- -------------------------------------------------------------
-- -- TablePlus 6.6.8(632)
-- --
-- -- https://tableplus.com/
-- --
-- -- Database: fh_test
-- -- Generation Time: 2025-08-03 13:56:16.2140
-- -- -------------------------------------------------------------


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;
-- /*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
-- /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
-- /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- /*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- CREATE TABLE `email_verification_tokens` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `user_id` int NOT NULL,
--   `token` varchar(255) NOT NULL,
--   `expires_at` timestamp NOT NULL,
--   `used` tinyint(1) DEFAULT '0',
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`),
--   KEY `user_id` (`user_id`),
--   CONSTRAINT `email_verification_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `instructor_profiles` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `user_id` int NOT NULL,
--   `bio` text,
--   `specializations` text,
--   `certifications` text,
--   `profile_image` varchar(255) DEFAULT NULL,
--   `instagram_handle` varchar(100) DEFAULT NULL,
--   `is_featured` tinyint(1) DEFAULT '0',
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`),
--   KEY `user_id` (`user_id`),
--   CONSTRAINT `instructor_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `locations` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `name` varchar(100) NOT NULL,
--   `address` text,
--   `phone` varchar(20) DEFAULT NULL,
--   `email` varchar(255) DEFAULT NULL,
--   `status` enum('active','inactive') NOT NULL DEFAULT 'active',
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `password_reset_tokens` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `user_id` int NOT NULL,
--   `token` varchar(255) NOT NULL,
--   `expires_at` timestamp NOT NULL,
--   `used` tinyint(1) DEFAULT '0',
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`),
--   KEY `user_id` (`user_id`),
--   CONSTRAINT `password_reset_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `student_profiles` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `user_id` int NOT NULL,
--   `preferred_location_id` int DEFAULT NULL,
--   `date_of_birth` date DEFAULT NULL,
--   `emergency_contact_name` varchar(100) DEFAULT NULL,
--   `emergency_contact_phone` varchar(20) DEFAULT NULL,
--   `medical_conditions` text,
--   `fitness_level` enum('beginner','intermediate','advanced') DEFAULT 'beginner',
--   `marketing_consent` tinyint(1) DEFAULT '0',
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`),
--   KEY `user_id` (`user_id`),
--   KEY `preferred_location_id` (`preferred_location_id`),
--   CONSTRAINT `student_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
--   CONSTRAINT `student_profiles_ibfk_2` FOREIGN KEY (`preferred_location_id`) REFERENCES `locations` (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- CREATE TABLE `users` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `email` varchar(255) NOT NULL,
--   `password` varchar(255) NOT NULL,
--   `first_name` varchar(100) NOT NULL,
--   `last_name` varchar(100) NOT NULL,
--   `phone` varchar(20) DEFAULT NULL,
--   `role` enum('admin','instructor','student') NOT NULL DEFAULT 'student',
--   `location_id` int DEFAULT NULL,
--   `status` enum('active','inactive','pending') NOT NULL DEFAULT 'active',
--   `email_verified` tinyint(1) DEFAULT '0',
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   `reset_requested_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   UNIQUE KEY `email` (`email`),
--   KEY `location_id` (`location_id`),
--   CONSTRAINT `users_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- INSERT INTO `instructor_profiles` (`id`, `user_id`, `bio`, `specializations`, `certifications`, `profile_image`, `instagram_handle`, `is_featured`, `created_at`, `updated_at`) VALUES
-- (1, 2, 'Certified Pilates instructor with over 5 years of experience in reformer pilates.', 'Reformer Pilates, Mat Pilates, Injury Rehabilitation', 'BASI Pilates Comprehensive, Anatomy & Physiology Certified', NULL, NULL, 1, '2025-07-31 23:19:55', '2025-07-31 23:19:55');

-- INSERT INTO `locations` (`id`, `name`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
-- (1, 'bethnal green', '115 Coventry Road, London, E2 6GB', '+44 20 7946 0958', 'bethnalgreen@flowhaven.com', 'active', '2025-08-02 19:48:25', '2025-08-02 19:49:44');

-- INSERT INTO `student_profiles` (`id`, `user_id`, `preferred_location_id`, `date_of_birth`, `emergency_contact_name`, `emergency_contact_phone`, `medical_conditions`, `fitness_level`, `marketing_consent`, `created_at`, `updated_at`) VALUES
-- (1, 3, 1, NULL, NULL, NULL, NULL, 'beginner', 1, '2025-07-31 23:19:55', '2025-08-02 23:22:09'),
-- (2, 4, 1, NULL, 'test', '07972537885', 'test', 'beginner', 1, '2025-07-31 23:23:28', '2025-08-02 23:22:09');

-- INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `phone`, `role`, `location_id`, `status`, `email_verified`, `created_at`, `updated_at`, `reset_requested_at`) VALUES
-- (1, 'admin@flowhaven.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Flow', 'Admin', NULL, 'admin', 1, 'active', 1, '2025-07-31 23:19:55', '2025-08-02 19:48:25', NULL),
-- (2, 'instructor@flowhaven.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Sarah', 'Johnson', NULL, 'instructor', 1, 'active', 1, '2025-07-31 23:19:55', '2025-08-02 19:48:25', NULL),
-- (3, 'student@flowhaven.com', '$2y$10$E9P8.5GkOgYYgUF6M4Hx.ej.NjEYpJ7vK7KjPl4nZbYYgcvxB5JOC', 'Emma', 'Wilson', NULL, 'student', 1, 'active', 1, '2025-07-31 23:19:55', '2025-08-02 19:48:25', NULL),
-- (4, 'mhussain2002@icloud.com', '$2y$12$RmFLKShjGUOtPOzRMrhpQuYwoRTBIbYFmosd4MM1TbKBMXPHItave', 'Muhammad', 'Hussain', '07907868997', 'student', 1, 'active', 0, '2025-07-31 23:23:28', '2025-08-02 19:48:25', NULL);



-- /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
-- /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
-- /*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;