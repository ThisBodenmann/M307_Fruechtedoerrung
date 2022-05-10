CREATE DATABASE IF NOT EXISTS `ictkursm307` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ictkursm307`;

DROP TABLE IF EXISTS `auftrag`;
CREATE TABLE `auftrag` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `orderDate` date DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `returnDate` date NOT NULL,
  `fk_fruitId` int(11) NOT NULL,
  `quantity` varchar(20),
  `completed` boolean DEFAULT false,
  PRIMARY KEY(auftragId),
  CONSTRAINT fk_fruitId FOREIGN KEY (fk_fruitId) REFERENCES fruits(id)
);

INSERT INTO `auftrag` (orderDate, email, fk_fruitId, name, phone, returndate, quantity)
VALUES ('2022-05-10', "example@dejflef.com", 20, "Peter", 83219831831, '2022-05-20', "5kg-10kg"),
('2022-05-10', "example@dejflef.com", 22, "Franz", 83219831831, '2022-05-20', "5kg-10kg"),
('2022-05-10', "example@dejflef.com", 1, "Erika", 83219831831, '2022-05-20', "5kg-10kg"),
('2022-05-10', "example@dejflef.com", 12, "Joachim", 83219831831, '2022-05-20', "5kg-10kg"),
('2022-05-10', "example@dejflef.com", 4, "Kempfy", 83219831831, '2022-05-20', "5kg-10kg");
