-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour redpoint_db
CREATE DATABASE IF NOT EXISTS `id12976800_redpoint` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `id12976800_redpoint`;

-- Listage de la structure de la table redpoint_db. allergie_alimentaires
CREATE TABLE IF NOT EXISTS `allergie_alimentaires` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.allergie_alimentaires : ~1 rows (environ)
DELETE FROM `allergie_alimentaires`;
/*!40000 ALTER TABLE `allergie_alimentaires` DISABLE KEYS */;
INSERT INTO `allergie_alimentaires` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'carottes', '2021-03-26 17:23:17', '2021-03-26 17:23:18');
/*!40000 ALTER TABLE `allergie_alimentaires` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. allergie_medicaments
CREATE TABLE IF NOT EXISTS `allergie_medicaments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.allergie_medicaments : ~1 rows (environ)
DELETE FROM `allergie_medicaments`;
/*!40000 ALTER TABLE `allergie_medicaments` DISABLE KEYS */;
INSERT INTO `allergie_medicaments` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'Peniciline', '2021-03-26 17:23:10', '2021-03-26 17:23:10');
/*!40000 ALTER TABLE `allergie_medicaments` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. certifications
CREATE TABLE IF NOT EXISTS `certifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.certifications : ~0 rows (environ)
DELETE FROM `certifications`;
/*!40000 ALTER TABLE `certifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `certifications` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. code_postaux
CREATE TABLE IF NOT EXISTS `code_postaux` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.code_postaux : ~2 rows (environ)
DELETE FROM `code_postaux`;
/*!40000 ALTER TABLE `code_postaux` DISABLE KEYS */;
INSERT INTO `code_postaux` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, '21000', '2021-03-26 17:19:43', '2021-03-26 17:19:43'),
	(2, '69007', '2021-03-26 17:19:41', '2021-03-26 17:19:41');
/*!40000 ALTER TABLE `code_postaux` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. contact_urgences
CREATE TABLE IF NOT EXISTS `contact_urgences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` tinyint(1) NOT NULL,
  `adresse` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_urgences_user_id_foreign` (`user_id`),
  KEY `contact_urgences_ville_id_id_foreign` (`ville_id`),
  CONSTRAINT `contact_urgences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `contact_urgences_ville_id_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.contact_urgences : ~0 rows (environ)
DELETE FROM `contact_urgences`;
/*!40000 ALTER TABLE `contact_urgences` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_urgences` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. dossier_medicals
CREATE TABLE IF NOT EXISTS `dossier_medicals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sport` tinyint(1) NOT NULL DEFAULT '0',
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupe_sanguin_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dossier_medicals_groupe_sanguin_id_foreign` (`groupe_sanguin_id`),
  CONSTRAINT `dossier_medicals_groupe_sanguin_id_foreign` FOREIGN KEY (`groupe_sanguin_id`) REFERENCES `groupe_sanguins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.dossier_medicals : ~7 rows (environ)
DELETE FROM `dossier_medicals`;
/*!40000 ALTER TABLE `dossier_medicals` DISABLE KEYS */;
INSERT INTO `dossier_medicals` (`id`, `sport`, `commentaire`, `groupe_sanguin_id`, `created_at`, `updated_at`) VALUES
	(1, 0, '/', 1, '2021-03-26 17:23:34', '2021-03-26 17:23:34'),
	(2, 0, '/', 1, '2021-03-26 17:24:36', '2021-03-26 17:24:36'),
	(3, 0, '/', 1, '2021-03-26 17:26:50', '2021-03-26 17:26:50'),
	(4, 0, '/', 1, '2021-03-26 17:27:39', '2021-03-26 17:27:39'),
	(5, 0, '/', 1, '2021-03-26 17:28:40', '2021-03-26 17:28:40'),
	(6, 0, '/', 1, '2021-03-26 17:29:06', '2021-03-26 17:29:06'),
	(7, 0, '/', 1, '2021-04-01 11:39:09', '2021-04-01 11:39:09');
/*!40000 ALTER TABLE `dossier_medicals` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. droits
CREATE TABLE IF NOT EXISTS `droits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.droits : ~3 rows (environ)
DELETE FROM `droits`;
/*!40000 ALTER TABLE `droits` DISABLE KEYS */;
INSERT INTO `droits` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'Superadmin', '2021-03-26 17:22:38', '2021-03-26 17:22:38'),
	(2, 'Admin', '2021-03-26 17:22:43', '2021-03-26 17:22:44'),
	(3, 'Utilisateur', '2021-03-26 17:22:50', '2021-03-26 17:22:51');
/*!40000 ALTER TABLE `droits` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.failed_jobs : ~0 rows (environ)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. groupe_sanguins
CREATE TABLE IF NOT EXISTS `groupe_sanguins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.groupe_sanguins : ~7 rows (environ)
DELETE FROM `groupe_sanguins`;
/*!40000 ALTER TABLE `groupe_sanguins` DISABLE KEYS */;
INSERT INTO `groupe_sanguins` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'Inconnu', '2021-03-26 17:21:46', '2021-03-26 17:21:47'),
	(2, 'A-', '2021-03-26 17:21:51', '2021-03-26 17:21:51'),
	(3, 'B+', '2021-03-26 17:21:56', '2021-03-26 17:21:56'),
	(4, 'B-', '2021-03-26 17:22:02', '2021-03-26 17:22:02'),
	(5, 'AB+', '2021-03-26 17:22:08', '2021-03-26 17:22:08'),
	(6, 'AB-', '2021-03-26 17:22:14', '2021-03-26 17:22:15'),
	(7, 'A+', '2021-03-26 17:22:24', '2021-03-26 17:22:24');
/*!40000 ALTER TABLE `groupe_sanguins` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. interventions
CREATE TABLE IF NOT EXISTS `interventions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `position` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned NOT NULL,
  `type_intervention_id` bigint(20) unsigned NOT NULL,
  `fin_intervention_at` datetime NOT NULL,
  `nb_intervenant` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `interventions_user_id_foreign` (`user_id`),
  KEY `interventions_type_intervention_id_foreign` (`type_intervention_id`),
  CONSTRAINT `interventions_type_intervention_id_foreign` FOREIGN KEY (`type_intervention_id`) REFERENCES `type_interventions` (`id`),
  CONSTRAINT `interventions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.interventions : ~3 rows (environ)
DELETE FROM `interventions`;
/*!40000 ALTER TABLE `interventions` DISABLE KEYS */;
INSERT INTO `interventions` (`id`, `position`, `user_id`, `type_intervention_id`, `fin_intervention_at`, `nb_intervenant`, `created_at`, `updated_at`) VALUES
	(1, '47.20145,3.2358', 3, 1, '2021-04-01 11:57:41', 1, '2021-04-01 11:57:45', '2021-04-01 11:57:45'),
	(2, '47.20145,3.2358', 3, 3, '2021-04-01 11:57:41', 1, '2021-04-01 11:57:45', '2021-04-01 11:57:45'),
	(3, '47.20145,3.2358', 3, 2, '2021-04-01 11:57:41', 1, '2021-04-01 11:57:45', '2021-04-01 11:57:45');
/*!40000 ALTER TABLE `interventions` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.migrations : ~22 rows (environ)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2021_02_12_121654_create_groupe_sanguins_table', 1),
	(4, '2021_02_15_065016_create_code_postaux_table', 1),
	(5, '2021_02_15_065048_create_villes_table', 1),
	(6, '2021_02_15_065250_create_droits_table', 1),
	(7, '2021_02_15_114330_create_rayon_interventions_table', 1),
	(8, '2021_02_15_120356_create_dossier_medicals_table', 1),
	(9, '2021_02_16_000000_create_users_table', 1),
	(10, '2021_02_22_162504_create_sessions_table', 1),
	(11, '2021_03_26_113456_create_type_interventions_table', 1),
	(12, '2021_03_26_113458_create_interventions_table', 1),
	(13, '2021_03_26_113459_create_statut_interventions_table', 1),
	(14, '2021_03_26_121255_create_contact_urgences_table', 1),
	(15, '2021_03_26_121803_create_allergie_alimentaires_table', 1),
	(16, '2021_03_26_121817_create_allergie_medicaments_table', 1),
	(17, '2021_03_26_121818_create_user_alimentaires_table', 1),
	(18, '2021_03_26_121819_create_user_medicaments_table', 1),
	(19, '2021_03_26_131538_create_substances_table', 1),
	(20, '2021_03_26_131539_create_user_substances_table', 1),
	(21, '2021_03_26_133255_create_certifications_table', 1),
	(22, '2021_03_26_133321_create_user_certifications_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.password_resets : ~0 rows (environ)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. rayon_interventions
CREATE TABLE IF NOT EXISTS `rayon_interventions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rayon` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.rayon_interventions : ~3 rows (environ)
DELETE FROM `rayon_interventions`;
/*!40000 ALTER TABLE `rayon_interventions` DISABLE KEYS */;
INSERT INTO `rayon_interventions` (`id`, `libelle`, `rayon`, `created_at`, `updated_at`) VALUES
	(1, '100 mètres', 100, '2021-03-26 17:21:16', '2021-03-26 17:21:16'),
	(2, '200 mètres', 200, '2021-03-26 17:21:26', '2021-03-26 17:21:26'),
	(3, '500 mètres', 500, '2021-03-26 17:21:35', '2021-03-26 17:21:35');
/*!40000 ALTER TABLE `rayon_interventions` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.sessions : ~3 rows (environ)
DELETE FROM `sessions`;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('76kW1NB12l9hFcSQ7DMfaPPapKTmO91IA84sVbP6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic09ZQzBLY1RYOUZ3b25IQ2hUWVZrbktPY3E3ajhCWm5uenExa1ZJMyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovL3JlZHBvaW50LnRlc3Q6ODA4MC9hdXRoL21hcCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vcmVkcG9pbnQudGVzdDo4MDgwL2F1dGgvbWFwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1617293673),
	('f6dc5ehUQA4anX4ePdJd73pIGTTFFaiDUG5LsdNp', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVFZQNm1DSG9TUW91T2x1NjR4ak1MRmZGZXJEbHB0YVdBN1pCczA0dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9yZWRwb2ludC50ZXN0OjgwODAvYXV0aC9tYXAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1617294604),
	('uh3DHCH7AlIW3M19vpcq9wF5gx2EaXF0TmkLnwCc', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamJQMTBwaEwyMmo0TnkwTkI3eWVVYVhvUXZDY09oZUJzbzlkVDk5VSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovL3JlZHBvaW50LnRlc3Q6ODA4MC9hdXRoL2ludGVydmVudGlvbnMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cDovL3JlZHBvaW50LnRlc3Q6ODA4MC9hdXRoL21hcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1617368686);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. statut_interventions
CREATE TABLE IF NOT EXISTS `statut_interventions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `intervention_id` bigint(20) unsigned NOT NULL,
  `intervention_ack` tinyint(1) NOT NULL DEFAULT '1',
  `debut_intervention_at` datetime NOT NULL,
  `fin_intervention_at` datetime NOT NULL,
  `commentaire` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statut_interventions_user_id_foreign` (`user_id`),
  KEY `statut_interventions_intervention_id_foreign` (`intervention_id`),
  CONSTRAINT `statut_interventions_intervention_id_foreign` FOREIGN KEY (`intervention_id`) REFERENCES `interventions` (`id`),
  CONSTRAINT `statut_interventions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.statut_interventions : ~5 rows (environ)
DELETE FROM `statut_interventions`;
/*!40000 ALTER TABLE `statut_interventions` DISABLE KEYS */;
INSERT INTO `statut_interventions` (`id`, `user_id`, `intervention_id`, `intervention_ack`, `debut_intervention_at`, `fin_intervention_at`, `commentaire`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 1, '2020-04-01 11:59:04', '2020-04-01 12:59:05', 'JH 27 ans tombé dans un puit.', '2020-04-01 11:59:10', '2021-04-01 17:38:55'),
	(2, 3, 1, 1, '2021-04-01 11:59:04', '2021-04-01 12:59:05', 'rapport', '2021-04-01 11:59:10', '2021-04-01 17:39:13'),
	(3, 3, 1, 1, '2021-04-01 11:59:04', '2021-04-01 12:59:05', NULL, '2021-04-01 11:59:10', '2021-04-01 11:59:11'),
	(4, 3, 3, 1, '2021-04-01 11:59:04', '2021-04-01 12:59:05', NULL, '2021-04-01 11:59:10', '2021-04-01 11:59:11'),
	(5, 3, 2, 1, '2021-04-01 17:03:47', '2021-04-01 17:03:48', NULL, '2021-04-01 17:03:50', '2021-04-01 17:03:50');
/*!40000 ALTER TABLE `statut_interventions` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. substances
CREATE TABLE IF NOT EXISTS `substances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.substances : ~2 rows (environ)
DELETE FROM `substances`;
/*!40000 ALTER TABLE `substances` DISABLE KEYS */;
INSERT INTO `substances` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'Alcool', '2021-03-26 17:20:52', '2021-03-26 17:20:52'),
	(2, 'Drogue', '2021-03-26 17:20:58', '2021-03-26 17:20:58');
/*!40000 ALTER TABLE `substances` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. type_interventions
CREATE TABLE IF NOT EXISTS `type_interventions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.type_interventions : ~3 rows (environ)
DELETE FROM `type_interventions`;
/*!40000 ALTER TABLE `type_interventions` DISABLE KEYS */;
INSERT INTO `type_interventions` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
	(1, 'Médicale', '2021-03-26 17:20:39', '2021-03-26 17:20:40'),
	(2, 'Police', '2021-04-01 11:56:21', '2021-04-01 11:56:21'),
	(3, 'Attentat', '2021-04-01 11:56:29', '2021-04-01 11:56:29');
/*!40000 ALTER TABLE `type_interventions` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `identifiant_unique` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` tinyint(1) NOT NULL,
  `connecte` tinyint(1) NOT NULL DEFAULT '0',
  `disponible` tinyint(1) NOT NULL DEFAULT '1',
  `shadowban` tinyint(1) NOT NULL DEFAULT '0',
  `position` text COLLATE utf8mb4_unicode_ci,
  `adresse` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_id` bigint(20) unsigned NOT NULL,
  `droit_id` bigint(20) unsigned NOT NULL DEFAULT '3',
  `dossier_id` bigint(20) unsigned NOT NULL,
  `rayon_intervention_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_identifiant_unique_unique` (`identifiant_unique`),
  KEY `users_droit_id_foreign` (`droit_id`),
  KEY `users_ville_id_foreign` (`ville_id`),
  KEY `users_dossier_id_foreign` (`dossier_id`),
  KEY `users_rayon_intervention_id_foreign` (`rayon_intervention_id`),
  CONSTRAINT `users_dossier_id_foreign` FOREIGN KEY (`dossier_id`) REFERENCES `dossier_medicals` (`id`),
  CONSTRAINT `users_droit_id_foreign` FOREIGN KEY (`droit_id`) REFERENCES `droits` (`id`),
  CONSTRAINT `users_rayon_intervention_id_foreign` FOREIGN KEY (`rayon_intervention_id`) REFERENCES `rayon_interventions` (`id`),
  CONSTRAINT `users_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.users : ~1 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `identifiant_unique`, `password`, `email`, `email_verified_at`, `telephone`, `nom`, `prenom`, `civilite`, `connecte`, `disponible`, `shadowban`, `position`, `adresse`, `ville_id`, `droit_id`, `dossier_id`, `rayon_intervention_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'root', '$2y$10$KnmKi24Ahnx6Gguoq9ZdpeZNST5kSxk5jiIccH4eUBOh09gKkqAhS', 'maxime.larroze.francezat@gmail.com', NULL, '0102030405', 'Larroze', 'Maxime', 1, 0, 1, 0, '47.317822, 5.052467', '13b bld v', 1, 3, 7, 3, 'HVYW7KJm7QL2B3zH0bH68MJJ21DaGY9KC0xnU2OhmA7KkVuZdd2TLeLiSjUo', '2021-04-01 11:39:09', '2021-04-01 17:10:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. user_alimentaires
CREATE TABLE IF NOT EXISTS `user_alimentaires` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `allergie_alimentaire_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_alimentaires_user_id_foreign` (`user_id`),
  KEY `user_alimentaires_allergie_alimentaire_id_foreign` (`allergie_alimentaire_id`),
  CONSTRAINT `user_alimentaires_allergie_alimentaire_id_foreign` FOREIGN KEY (`allergie_alimentaire_id`) REFERENCES `allergie_alimentaires` (`id`),
  CONSTRAINT `user_alimentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.user_alimentaires : ~0 rows (environ)
DELETE FROM `user_alimentaires`;
/*!40000 ALTER TABLE `user_alimentaires` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_alimentaires` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. user_certifications
CREATE TABLE IF NOT EXISTS `user_certifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `certification_id` bigint(20) unsigned NOT NULL,
  `justificatif` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_certifications_user_id_foreign` (`user_id`),
  KEY `user_certifications_certification_id_foreign` (`certification_id`),
  CONSTRAINT `user_certifications_certification_id_foreign` FOREIGN KEY (`certification_id`) REFERENCES `certifications` (`id`),
  CONSTRAINT `user_certifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.user_certifications : ~0 rows (environ)
DELETE FROM `user_certifications`;
/*!40000 ALTER TABLE `user_certifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_certifications` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. user_medicaments
CREATE TABLE IF NOT EXISTS `user_medicaments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `allergie_medicament_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_medicaments_user_id_foreign` (`user_id`),
  KEY `user_medicaments_allergie_medicament_id_foreign` (`allergie_medicament_id`),
  CONSTRAINT `user_medicaments_allergie_medicament_id_foreign` FOREIGN KEY (`allergie_medicament_id`) REFERENCES `allergie_medicaments` (`id`),
  CONSTRAINT `user_medicaments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.user_medicaments : ~0 rows (environ)
DELETE FROM `user_medicaments`;
/*!40000 ALTER TABLE `user_medicaments` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_medicaments` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. user_substances
CREATE TABLE IF NOT EXISTS `user_substances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `substance_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_substances_user_id_foreign` (`user_id`),
  KEY `user_substances_substance_id_foreign` (`substance_id`),
  CONSTRAINT `user_substances_substance_id_foreign` FOREIGN KEY (`substance_id`) REFERENCES `substances` (`id`),
  CONSTRAINT `user_substances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.user_substances : ~0 rows (environ)
DELETE FROM `user_substances`;
/*!40000 ALTER TABLE `user_substances` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_substances` ENABLE KEYS */;

-- Listage de la structure de la table redpoint_db. villes
CREATE TABLE IF NOT EXISTS `villes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `villes_code_postal_id_foreign` (`code_postal_id`),
  CONSTRAINT `villes_code_postal_id_foreign` FOREIGN KEY (`code_postal_id`) REFERENCES `code_postaux` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table redpoint_db.villes : ~2 rows (environ)
DELETE FROM `villes`;
/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` (`id`, `libelle`, `code_postal_id`, `created_at`, `updated_at`) VALUES
	(1, 'Dijon', 1, '2021-03-26 17:19:56', '2021-03-26 17:19:57'),
	(2, 'Lyon 7', 2, '2021-03-26 17:20:10', '2021-03-26 17:20:10');
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
