-- --------------------------------------------------------
-- 호스트:                          localhost
-- 서버 버전:                        10.4.22-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- db_auth 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `db_auth` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_auth`;

-- 테이블 db_auth.users 구조 내보내기
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 db_auth.users:~5 rows (대략적) 내보내기
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
	(7, '마동근', 'wwe5123213123455@naver.com', '$2y$10$HteJ2SYapRXjZKfIiAefPODvULF9t1Yx79/BRLAQw62c11EPX9Mum'),
	(8, '라동근', 'wwe5455@naver.com', '$2y$10$iUXY29ElxQAi7hAnFlMxw.wktFRnW.i6DpabOARO7TcQiK4TGksQO'),
	(9, '다공근', 'wwe54552@naver.com', '$2y$10$wyGlVAHh8qL/tuYz3HS9tOYzloGSXnSFYSheBPs0H2k15j4cPE/tu'),
	(10, '나동근', 'wwe54552323@naver.com', '$2y$10$CUS7ucWplj8n21I/EAyx5emwcLrdS0TlwankOdBTyY1k9YstjYAi2'),
	(11, '가동근', 'wwe5451231231231325@naver.com', '$2y$10$dXTV5w23/JzRrons.bov4ORF4HCeZN5jnaKJkHYH9abmR3Op9Ib2.');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
