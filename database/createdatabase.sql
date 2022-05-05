CREATE DATABASE IF NOT EXISTS `ictkursm307` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ictkursm307`;

DROP TABLE IF EXISTS `auftrag`;
CREATE TABLE `auftrag` (
  `auftragId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `auftragDate` smalldatetime DEFAULT GETDATE() NOT NULL,
  `returndate` smalldatetime NOT NULL,
  `fk_fruitId` int(11) FOREIGN KEY REFERENCES fruit(id) NOT NULL
);

INSERT INTO `auftrag` (`name`, `phone`, `email`, `returndate`, `fk_fruitId`) VALUES
('Benny', '0797814214', 'jk@gmail.com', '04-04-2005', 1);
