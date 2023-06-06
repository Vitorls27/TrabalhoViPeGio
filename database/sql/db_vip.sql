-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_aula
CREATE DATABASE IF NOT EXISTS `db_aula` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_aula`;

-- Copiando estrutura para tabela db_aula.cardapio
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(20,2) NOT NULL,
  `descriçao` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgprod` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cardapio_tipo_id_foreign` (`tipo_id`),
  CONSTRAINT `cardapio_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.cardapio: ~7 rows (aproximadamente)
INSERT INTO `cardapio` (`id`, `nome`, `valor`, `descriçao`, `imgprod`, `created_at`, `updated_at`, `tipo_id`) VALUES
	(4, 'Café Carioca', 4.00, 'o café é bom, tipo muito bom. \r\nVocê tem que provar esse café maravilhoso, \r\numa das melhores coisas que já provei.', 'imagem/20230604232456.jpg', '2023-06-05 02:24:56', '2023-06-05 02:24:56', 3),
	(5, 'Capuccino Vip Etiópia', 9.50, 'Café direto da origem. Sabor original. Não tem igual.', 'imagem/20230605004132.jpg', '2023-06-05 03:41:32', '2023-06-05 03:41:32', 3),
	(6, 'Café Flamengo', 10.00, 'Café que não tem comparação. Pare de perder tempo e compre logo um.', 'imagem/20230605004307.jpg', '2023-06-05 03:43:07', '2023-06-05 03:43:07', 3),
	(7, 'Café curto sulista extra forte', 7.00, 'Café rápido porém esplendido, com um sabor de levar ao céu.', 'imagem/20230605004441.jpg', '2023-06-05 03:44:41', '2023-06-05 03:44:41', 3),
	(8, 'Café Mineiro (com Leite)', 6.00, 'Para quem quer relaxar do melhor modo possível. Tenha bons momentos bebendo esse café.', 'imagem/20230605004602.jpg', '2023-06-05 03:46:02', '2023-06-05 03:49:42', 3),
	(9, 'Pão de queijo mineiro', 5.00, 'Pão de queijo clássico, traz o melhor do sabor e qualidade.', 'imagem/20230605004658.jpg', '2023-06-05 03:46:59', '2023-06-05 03:46:59', 1),
	(10, 'Croissant doce', 22.90, 'Croissant que pode te levar ao paraíso. O sabor mais doce. Tenha doces momentos saboreando nosso croissant.', 'imagem/20230605004906.jpg', '2023-06-05 03:49:06', '2023-06-05 03:49:06', 2);

-- Copiando estrutura para tabela db_aula.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.categoria: ~10 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Sabrina Tainara de Souza Sobrinho', NULL, NULL),
	(2, 'Vanessa Vasques Pedrosa Sobrinho', NULL, NULL),
	(3, 'Sra. Juliane Alexa Amaral', NULL, NULL),
	(4, 'Luan Galvão Neto', NULL, NULL),
	(5, 'Sr. Augusto Moisés Espinoza Jr.', NULL, NULL),
	(6, 'Srta. Hosana Barreto Sandoval', NULL, NULL),
	(7, 'Camilo Kevin Molina Sobrinho', NULL, NULL),
	(8, 'Beatriz Lia Saraiva Filho', NULL, NULL),
	(9, 'Srta. Violeta Campos Galvão Jr.', NULL, NULL),
	(10, 'Adriana Soares', NULL, NULL);

-- Copiando estrutura para tabela db_aula.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` double(10,2) NOT NULL,
  `custo` double(8,2) NOT NULL,
  `quantidade` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.estoque: ~3 rows (aproximadamente)
INSERT INTO `estoque` (`id`, `nome`, `peso`, `custo`, `quantidade`, `created_at`, `updated_at`) VALUES
	(2, 'Café', 7.00, 14.49, 25, '2023-05-24 20:23:34', '2023-05-30 21:07:58'),
	(3, 'Açúcar', 5.00, 19.99, 20, '2023-05-30 21:05:33', '2023-05-30 21:05:33'),
	(4, 'Adoçante Orgânico', 2.00, 14.99, 20, '2023-06-05 03:36:15', '2023-06-05 03:36:27');

-- Copiando estrutura para tabela db_aula.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_aula.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgfun` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `setor_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `funcionario_setor_id_foreign` (`setor_id`),
  CONSTRAINT `funcionario_setor_id_foreign` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.funcionario: ~3 rows (aproximadamente)
INSERT INTO `funcionario` (`id`, `nome`, `telefone`, `email`, `imgfun`, `created_at`, `updated_at`, `setor_id`) VALUES
	(1, 'Ramos', '9869678', 'ramos@gmail.com', 'imagem/20230530162844.jpg', '2023-05-24 21:56:06', '2023-06-05 02:06:46', 4),
	(8, 'Vasco', '752051434223', 'vasco@gmail.com', 'imagem/20230530162913.jpg', '2023-05-24 22:23:21', '2023-05-30 19:29:13', 1),
	(11, 'Fernanda Maroni', '(49)98388-4755', 'FernandaM@gmail.com', 'imagem/20230604225704.jpg', '2023-06-05 01:57:04', '2023-06-05 02:06:38', 2);

-- Copiando estrutura para tabela db_aula.leitura
CREATE TABLE IF NOT EXISTS `leitura` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data_leitura` date NOT NULL,
  `hora_leitura` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_sensor` double(8,2) NOT NULL,
  `sensor_id` bigint unsigned DEFAULT NULL,
  `mac_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leitura_sensor_id_foreign` (`sensor_id`),
  KEY `leitura_mac_id_foreign` (`mac_id`),
  CONSTRAINT `leitura_mac_id_foreign` FOREIGN KEY (`mac_id`) REFERENCES `mac` (`id`),
  CONSTRAINT `leitura_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.leitura: ~4 rows (aproximadamente)
INSERT INTO `leitura` (`id`, `data_leitura`, `hora_leitura`, `valor_sensor`, `sensor_id`, `mac_id`, `created_at`, `updated_at`) VALUES
	(1, '2023-05-08', '19:15', 32.00, 25, 1, '2023-05-31 04:44:08', '2023-06-04 21:30:34'),
	(3, '2023-06-01', '19:05', 53.00, 24, 1, '2023-05-31 04:47:22', '2023-06-04 19:30:01'),
	(4, '2023-06-07', '15:32', 23.00, 21, 7, '2023-06-04 21:30:51', '2023-06-04 21:30:51'),
	(5, '2024-02-06', '00:54', 20.00, 25, 1, '2023-06-05 03:51:26', '2023-06-05 18:49:44');

-- Copiando estrutura para tabela db_aula.mac
CREATE TABLE IF NOT EXISTS `mac` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.mac: ~17 rows (aproximadamente)
INSERT INTO `mac` (`id`, `nome`, `contador`, `created_at`, `updated_at`) VALUES
	(1, '08:3A:F2:50:BD:1C', 26, NULL, NULL),
	(2, '38:2B:78:03:A6:32', 27, NULL, NULL),
	(3, '38:2B:78:03:A8:38', 75, NULL, NULL),
	(4, '48:3F:DA:0D:C6:B6', 78, NULL, NULL),
	(5, '68:C6:3A:E1:63:48', 34, NULL, NULL),
	(6, '84:0D:8E:B0:68:8E', 17, NULL, NULL),
	(7, '84:0D:8E:B0:82:5C', 41, NULL, NULL),
	(8, 'CC:50:E3:05:12:97', 62, NULL, NULL),
	(9, 'CC:50:E3:05:18:79', 40, NULL, NULL),
	(10, 'CC:50:E3:05:19:BA', 40, NULL, NULL),
	(11, 'CC:50:E3:3B:FE:E9', 51, NULL, NULL),
	(12, 'CC:50:E3:3C:0C:99', 86, NULL, NULL),
	(13, 'CC:50:E3:3C:1B:40', 35, NULL, NULL),
	(14, 'CC:50:E3:3C:1E:52', 91, NULL, NULL),
	(15, 'DC:4F:22:11:05:A7', 37, NULL, NULL),
	(16, 'E8:DB:84:98:B5:DA', 75, NULL, NULL),
	(17, 'E8:DB:84:DD:DB:80', 2, NULL, NULL);

-- Copiando estrutura para tabela db_aula.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.migrations: ~17 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_14_165129_create_usuario', 1),
	(6, '2023_04_28_175149_create_categorias_table', 1),
	(7, '2023_05_12_170844_mac', 1),
	(8, '2023_05_12_170845_sensor', 1),
	(9, '2023_05_12_170856_leitura', 1),
	(10, '2023_05_22_235520_cardapio', 1),
	(11, '2023_05_22_235540_estoque', 1),
	(12, '2023_05_23_190140_create_funcionarios_table', 1),
	(13, '2023_05_23_190317_create_setors_table', 1),
	(14, '2023_05_23_192322_create_tipos_table', 1),
	(15, '2023_05_30_182949_create_macs_table', 2),
	(16, '2023_05_30_183037_create_leituras_table', 2),
	(17, '2023_05_30_183115_create_sensors_table', 2);

-- Copiando estrutura para tabela db_aula.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.password_resets: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_aula.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_aula.sensor
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.sensor: ~5 rows (aproximadamente)
INSERT INTO `sensor` (`id`, `nome`, `contador`, `created_at`, `updated_at`) VALUES
	(21, 'Sensor Um', 1, NULL, NULL),
	(22, 'Sensor Dois', 66, NULL, NULL),
	(23, 'Sensor três', 70, NULL, NULL),
	(24, 'Sensor Quatro', 66, NULL, NULL),
	(25, 'Sensor Cinco', 15, NULL, NULL);

-- Copiando estrutura para tabela db_aula.setor
CREATE TABLE IF NOT EXISTS `setor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.setor: ~5 rows (aproximadamente)
INSERT INTO `setor` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Atendente', NULL, NULL),
	(2, 'Garçom', NULL, NULL),
	(3, 'Estoque', NULL, NULL),
	(4, 'Administração', NULL, NULL),
	(5, 'Cozinha', NULL, NULL);

-- Copiando estrutura para tabela db_aula.tipo
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.tipo: ~3 rows (aproximadamente)
INSERT INTO `tipo` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Salgado', NULL, NULL),
	(2, 'Doce', NULL, NULL),
	(3, 'Bebida', NULL, NULL);

-- Copiando estrutura para tabela db_aula.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'admin', 'admin@admin.com', NULL, '$2y$10$NPrymKRNbARDHg6AkvNYmeWgRW19yog2DLQUu7X1xthCc0lorOURe', NULL, '2023-06-06 05:27:30', '2023-06-06 05:27:30');

-- Copiando estrutura para tabela db_aula.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `usuario_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_aula.usuario: ~3 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`) VALUES
	(1, 'daniel', '049922552435', 'daniel@gmail.com', 'imagem/20230530162622.jpg', '2023-05-24 21:54:26', '2023-06-05 01:54:55', 10),
	(2, 'roberto', '7393759582', 'roberto@gmail.com', 'imagem/20230530162646.jpg', '2023-05-24 22:19:14', '2023-05-30 19:26:46', 10),
	(3, 'Félix Max', '(49)99954-0264', 'FelixM@gmail.com', 'imagem/20230604225407.jpg', '2023-06-05 01:54:07', '2023-06-05 01:54:07', 6);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
