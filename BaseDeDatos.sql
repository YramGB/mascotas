/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `sistema_mascotas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sistema_mascotas`;

CREATE TABLE IF NOT EXISTS `mascotas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Especie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Raza` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Enfermedades` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `mascotas`;
INSERT INTO `mascotas` (`id`, `Nombre`, `Especie`, `Raza`, `Sexo`, `Edad`, `Color`, `Enfermedades`, `created_at`, `updated_at`) VALUES
	(5, 'Baxter', 'Canino', 'PitBox', 'Macho', '3 años', 'café', 'ningúna', NULL, '2022-07-11 02:27:39'),
	(7, 'Bruce', 'Canino', 'PitBox', 'Macho', '3 años', 'Blanco con café', 'ningúna', NULL, '2022-07-11 02:27:46'),
	(8, 'Bella', 'Felino', 'Gato', 'Hembra', '1 año', 'Blanco con negro', 'Ningúna', NULL, NULL),
	(9, 'Muñeca', 'Canino', 'Chihuahua', 'Hembra', '8 años', 'Café', 'Ningúna', NULL, NULL),
	(10, 'Aika', 'Canino', 'Chihuahua', 'Hembra', '6 años', 'Negro', 'Ningúna', NULL, NULL),
	(11, 'Polo', 'Felino', 'Gato', 'Macho', '3 años', 'Blanco', 'Ningúna', NULL, NULL);

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_07_08_200120_create_mascotas_table', 2);

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'ejemplo', 'ejemplo@gmail.com', NULL, '$2y$10$mq2U0wBFsceIGkY2PC7Ve.Yl7Wl/tl60tKCmlNbxGWa6A7odKthme', 'B6KQTvmmAFDh2MvD3NoQxWBA2JNWkGCuGp0FWOTtBrylj2liiHnXZqWK7knh', '2022-07-11 02:23:47', '2022-07-11 02:23:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
