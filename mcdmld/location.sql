DROP DATABASE IF EXISTS location;

CREATE DATABASE IF NOT EXISTS location;

USE location;


DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `idAgence` int(11) NOT NULL AUTO_INCREMENT,
  `NomAgence` varchar(50) NOT NULL,
  `AdresseAgence` varchar(50) NOT NULL,
  `idVille` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAgence`),
  KEY `Agence_Ville_FK` (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `idMarque` int(11) NOT NULL AUTO_INCREMENT,
  `NomMarque` varchar(50) NOT NULL,
  PRIMARY KEY (`idMarque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `idModel` int(11) NOT NULL AUTO_INCREMENT,
  `NomModel` varchar(50) NOT NULL,
  `idMarque` int(11) NOT NULL,
  `idVoiture` int(11) NOT NULL,
  PRIMARY KEY (`idModel`),
  KEY `model_MARQUE_FK` (`idMarque`),
  KEY `model_Voiture0_FK` (`idVoiture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `idRegion` int(11) NOT NULL AUTO_INCREMENT,
  `nomRegion` varchar(50) NOT NULL,
  PRIMARY KEY (`idRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `idUser` int(11) NOT NULL,
  `idVoiture` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  `dateReservation` date NOT NULL,
  `dateDebutReservation` date NOT NULL,
  `dateFinReservation` date NOT NULL,
  `Quantite` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idVoiture`,`idAgence`),
  KEY `Reserver_Voiture0_FK` (`idVoiture`),
  KEY `Reserver_Agence1_FK` (`idAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(50) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



INSERT INTO `role` (`idRole`, `nomRole`) VALUES
(1, 'admin'),
(2, 'user');



DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `PrenomUser` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `NomUser` varchar(50) NOT NULL,
  `MailUser` varchar(50) NOT NULL,
  `numTel` varchar(50) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `User_Role_FK` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO `user` (`idUser`, `PrenomUser`, `password`, `NomUser`, `MailUser`, `numTel`, `idRole`) VALUES
(3, 'admin', '66009c4fc388c3326c50f8677d6af203', 'admin', 'admin', 'admin', 1),
(5, 'toto', '2c4d05d77f83e14ed979165ce32a4a86', 'tata', 'toto@gmail.com', '1111111', 2);



DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `NomVille` varchar(50) NOT NULL,
  `CodePostal` varchar(50) NOT NULL,
  `idRegion` int(11) NOT NULL,
  PRIMARY KEY (`idVille`),
  KEY `Ville_Region_FK` (`idRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `idVoiture` int(11) NOT NULL AUTO_INCREMENT,
  `ModelVoiture` varchar(50) NOT NULL,
  `MarqueVoiture` varchar(50) NOT NULL,
  `TypeCarburant` varchar(50) NOT NULL,
  `NbPlace` int(11) NOT NULL,
  PRIMARY KEY (`idVoiture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `agence`
  ADD CONSTRAINT `Agence_Ville_FK` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);


ALTER TABLE `model`
  ADD CONSTRAINT `model_MARQUE_FK` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`idMarque`),
  ADD CONSTRAINT `model_Voiture0_FK` FOREIGN KEY (`idVoiture`) REFERENCES `voiture` (`idVoiture`);


ALTER TABLE `reserver`
  ADD CONSTRAINT `Reserver_Agence1_FK` FOREIGN KEY (`idAgence`) REFERENCES `agence` (`idAgence`),
  ADD CONSTRAINT `Reserver_User_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `Reserver_Voiture0_FK` FOREIGN KEY (`idVoiture`) REFERENCES `voiture` (`idVoiture`);


ALTER TABLE `user`
  ADD CONSTRAINT `User_Role_FK` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);


ALTER TABLE `ville`
  ADD CONSTRAINT `Ville_Region_FK` FOREIGN KEY (`idRegion`) REFERENCES `region` (`idRegion`);

