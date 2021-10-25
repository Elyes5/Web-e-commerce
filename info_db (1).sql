-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 mai 2021 à 10:40
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `info+db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(50) NOT NULL,
  `adminpass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminid`, `adminpass`) VALUES
('ahmed', 'ahmed123');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `fullname` varchar(30) NOT NULL,
  `adr` varchar(40) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `Dness` date NOT NULL,
  `uss` varchar(20) NOT NULL,
  `sexe` int(11) NOT NULL,
  `statue` varchar(15) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`uss`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`fullname`, `adr`, `mail`, `pass`, `Dness`, `uss`, `sexe`, `statue`) VALUES
('aaaa', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '0000-00-00', 'aaaaa', 0, 'active'),
('clearclouds', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '0000-00-00', 'aaaaaaaaaaaaaaaaa', 0, 'active'),
('aaaa', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '0000-00-00', 'abc', 0, 'active'),
('ahmed amine welhazi', 'ARIANA', 'ahmed@gmail.com', '12345678', '2021-04-01', 'ahme', 0, 'active'),
('ahmed amine welhazi', 'ARIANA cite tadhamen', 'ahmed.welhazir8@gmail.com', '12345678', '2000-11-30', 'ahmed', 1, 'active'),
('jalloulibrahim', 'Sfax', 'jallloulibrahim@gmail.com', '12345678', '2000-05-05', 'barhoum', 1, 'active'),
('ahmed amine welhazi', 'tadhamen ariana', 'ahmed@gmail.com', '11111111', '2021-03-30', 'bouhmid', 1, 'active'),
('Elyes Saddem', 'Ariana', 'saddemelyes67@gmail.com', '12345678', '2001-03-24', 'elyes', 1, 'active'),
('fffffffffffffff', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '2021-04-11', 'ffffffffffffffffffff', 0, 'active'),
('ahmed amine welhazi', 'ARIANA', 'ahmed@gmail.com', '12345678', '2021-04-01', 'ilhgrsbdolichkfdn', 0, 'active'),
('sefsefse', 'zrgdrg', 'fefsef@sefse.com', '12345678', '2021-05-08', 'jkkdjfqejfbs', 0, 'active'),
('clearcloudsa', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '2021-04-02', 'jobrane23', 0, 'active'),
('Jobdog', 'Ariana', 'jobbs.bs@gmail.com', '12345678', '2001-03-24', 'Jobrane70', 1, 'active'),
('JobiJobi', 'Ariana', 'jobbs.bs@gmail.com', '12345678', '2000-03-03', 'jobrane90', 1, 'active'),
('clearclouds', 'ariana', 'jobjob.bs2@gmail.com', '11111111', '2021-04-17', 'kkkkkkkk', 0, 'active'),
('aaazdesf', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '0000-00-00', 'pppppppppppppfefesfs', 0, 'active'),
('Seifallah Jami', 'Hay El Khadhra', 'seifallah.jami@etudiant-isi.utm.tn', '12345678', '1999-08-12', 'Romex Fortrex', 2, 'active'),
('test', 'test', 'test', '12345678', '2021-04-06', 'test', 0, 'active'),
('clearclouds', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '0000-00-00', 'test6', 0, 'active'),
('clearclouds', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '0000-00-00', 'test78787878787', 0, 'active'),
('aaaaaaaaa', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '2021-04-21', 'test87878', 0, 'active'),
('clearclouds', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '2021-04-01', 'test888', 0, 'active'),
('clearclouds', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '2021-04-11', 'testaa', 0, 'active'),
('aaaaaaaa', 'ariana', 'jobjob.bs2@gmail.com', '12345678', '0000-00-00', 'wadia', 0, 'active');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `uss` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `prixtot` int(11) NOT NULL,
  `idcommande` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`idcommande`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`uss`, `prixtot`, `idcommande`, `date`, `statut`) VALUES
('bouhmid', 2700, 35, '2021-05-09 02:06:40', 'annulee'),
('bouhmid', 2100, 36, '2021-05-09 02:11:16', 'validee'),
('bouhmid', 2750, 37, '2021-05-09 02:15:26', 'validee'),
('ahmed', 6300, 38, '2021-05-10 22:27:32', 'validee'),
('bouhmid', 1900, 39, '2021-05-11 14:54:50', 'validee'),
('bouhmid', 2700, 40, '2021-05-11 14:55:49', 'validee'),
('bouhmid', 2700, 41, '2021-05-11 14:56:07', 'validee'),
('bouhmid', 2900, 42, '2021-05-12 14:55:08', 'en cours'),
('jobrane23', 1300, 43, '2021-05-13 04:03:24', 'annulee'),
('jobrane23', 550, 47, '2021-05-15 10:43:31', 'annulee'),
('jobrane23', 4660, 48, '2021-05-16 11:53:55', 'annulee'),
('jobrane23', 250, 49, '2021-05-16 12:00:26', 'annulee'),
('jobrane23', 800, 50, '2021-05-16 12:01:48', 'validee'),
('jobrane23', 2229, 51, '2021-05-16 17:15:28', 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `ctategorie`
--

DROP TABLE IF EXISTS `ctategorie`;
CREATE TABLE IF NOT EXISTS `ctategorie` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `nomcat` text NOT NULL,
  `nomtype` varchar(50) NOT NULL,
  PRIMARY KEY (`idcat`),
  KEY `fg18` (`nomtype`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ctategorie`
--

INSERT INTO `ctategorie` (`idcat`, `nomcat`, `nomtype`) VALUES
(1, 'RAM', 'HAEDWARE'),
(2, 'MOTHERBOARD', 'HAEDWARE'),
(3, 'CPU', 'HAEDWARE'),
(4, 'GPU', 'HAEDWARE'),
(5, 'HARD DISK', 'HAEDWARE'),
(6, 'DESKTOP COMPUTEERS', 'COMPUTERS'),
(7, 'GAMING COMPUTERS', 'COMPUTERS'),
(8, 'CURVED MONITORS', 'SCREEN'),
(9, 'GAMING MONITORS', 'SCREEN'),
(10, 'PRO MONITORS', 'SCREEN'),
(11, 'MOUSE', 'PC PERIPHERALS'),
(12, 'KEY BOARD', 'PC PERIPHERALS'),
(13, 'HEADSET', 'PC PERIPHERALS'),
(14, 'COOLER', 'PC PERIPHERALS');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `idfact` int(11) NOT NULL AUTO_INCREMENT,
  `idcommande` int(11) NOT NULL,
  `idprod` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`idfact`),
  KEY `fact1` (`idcommande`),
  KEY `fact2` (`idprod`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`idfact`, `idcommande`, `idprod`, `qte`) VALUES
(2, 35, 1118, 1),
(3, 36, 1120, 1),
(4, 37, 1120, 1),
(5, 37, 1121, 1),
(6, 38, 1115, 1),
(7, 39, 1116, 1),
(8, 40, 1118, 1),
(9, 41, 1118, 1),
(10, 42, 1118, 1),
(11, 42, 1128, 1),
(12, 43, 1129, 1),
(13, 47, 1131, 1),
(14, 48, 1116, 1),
(15, 48, 1117, 1),
(16, 48, 4871, 1),
(17, 49, 1119, 1),
(18, 50, 1124, 1),
(19, 51, 1116, 1),
(20, 51, 5614, 1);

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(30) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `problem` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `subject`, `mail`, `problem`) VALUES
(2, 'Problem Ordinateur', 'jobbs.bs@gmail.com', 'PC hatit aalih el mé maach iheb yekhdem');

-- --------------------------------------------------------

--
-- Structure de la table `feedbackstar`
--

DROP TABLE IF EXISTS `feedbackstar`;
CREATE TABLE IF NOT EXISTS `feedbackstar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `feedbackstar`
--

INSERT INTO `feedbackstar` (`id`, `feedback`) VALUES
(1, 1),
(9, 5),
(8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `uss` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `idprod` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`uss`,`idprod`),
  KEY `fg7` (`uss`),
  KEY `fg9` (`idprod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`uss`, `idprod`, `qte`) VALUES
('ahmed', 1115, 1),
('jobrane23', 1116, 1),
('jobrane23', 1117, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idprod` int(11) NOT NULL AUTO_INCREMENT,
  `nomprod` text NOT NULL,
  `idcat` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `qte` int(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `desc` varchar(600) CHARACTER SET utf8 NOT NULL,
  `Marque` varchar(60) DEFAULT NULL,
  `imagemarque` varchar(255) DEFAULT NULL,
  `fiche` varchar(70) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idprod`),
  KEY `fg 5` (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=65723 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idprod`, `nomprod`, `idcat`, `prix`, `qte`, `image`, `desc`, `Marque`, `imagemarque`, `fiche`, `video`) VALUES
(1115, 'PC DE BUREAU MSI GAMING AEGIS TI3 8RD / I7 8È GÉN / 8 GO', 7, '6300', 0, 'pcmsi.jpg', 'rocesseur Intel Core i7-8700K 7è Génération, up to 4.7 GHz, 12 Mo de mémoire cache - Mémoire 8 Go - Disque 2 To + 512 Go SSD - Carte Nvidia GeForce GTX 1070, 8 Go de mémoire GDDR5 SLI ARMOR dédiée - Wifi - Bluetooth - USB 3.1 Type-C - 8x USB 3.1 - 3x HDMI - RJ45 - Windows 10 - Garantie 2 ans', 'MSI', 'MSI.jpg', 'TABMSIAEGIS.png', NULL),
(1116, 'PC Gamer Vento i5 10400F GTX1650 6GO SSD240G', 7, '1900', 5, 'PCVento.jpg', 'Processeur: Intel Core i5-10400F (2.9 GHz / 4.3 GHz) - Carte mère: MSI B460M-A PRO - Carte Graphique: Palit GeForce GTX 1650 Gaming Pro - Disque Dur: SSD HP S600 2.5 240GB - Barrettes mémoires: 2 x 8 GB DDR4 3200 MHZ- BOITIER: FSP VENTO VG08FE - Alimentation: Redragon RGPS GC-PS001 500W Certifiée Bronze', 'VENTO', 'VENTO.jfif', NULL, NULL),
(1117, 'PC GAMER DHALSIM I5 9600KF 9 GEN 16G GTX 2060 SUPER GAMING X 240 GO SSD', 7, '2400', 3, 'PCGamer.jpg', 'Boitier : Aerocool PLAYA RGB\r\nProcesseur : Intel I5 9600KF \r\nCarte mère :   Gigabyte  B365 HD3\r\nCarte graphique : MSI GEFORCE RTX 2060 SUPER GAMING X GDDR6\r\nMémoire RAM : 16GB (2x8GB) DDR4 2666MHZ \r\nAlimentation :  AERO COOL 750W 80+ BRONZE\r\nDisque dur :  SSD 240 GB\r\nMontage : gratuit \r\nGarantie : 1 an ', 'DHALSIM', 'DHALSIM.jpg', 'TABDHALSIM.png', NULL),
(1118, 'PC GAMER VAMPYR 51066-1', 7, '2700', 7, 'PCGamer2.jpg', 'Boitier : DEATHMATCH7 GAMING ATX RGB\r\nProcesseur : Intel Core i5-8400 (up to 4.0 GHz) \r\nCarte mère : ASUS PRIME H310M-K \r\nCarte graphique : MSI GTX 1060 AERO ITX 6G\r\nMémoire RAM : 8Go DDR4 2400\r\nAlimentation : 500W 80+\r\nDisque dur : 1To \r\nMontage : gratuit \r\nGarantie : 1 ans', 'VAMPYR', 'VAMPYR.jpg', 'TABVAMPYR.png', NULL),
(1119, 'Samsung SSD 860 EVO 500 Go', 5, '250', 10, 'ssd.jpg', 'Disque Dur SSD 2.5\" - Capacité 500 Go - Interface SATA 6Gb/s (SATA 3) - Taux de transfert des données: 6 Gbit/s - Vitesse de Lecture: 550 Mo/s - Vitesse d\'écriture: 520 Mo/s - Dimensions: 69.85 x 6.8 x 100 mm - Poids: 50 g - Garantie 1 an', 'SAMSUNG', 'samsung.gif', 'TABSamsungSSD.png', 'https://www.youtube.com/embed/xP8VQ37BVjM'),
(1120, 'GPU MSI GEFORCE GTX 1080 TI GAMING X 11G', 4, '2100', 2, 'GTX1080.jpg', 'Modèle : GTX 1080 TI GAMING X\r\nFréquence Processeur 1683 MHz\r\nFréquence Mémoire 7008 MHz\r\nSorties HDMI / DVI-D\r\nConnectivité : 2 x DisplayPort (Version 1.4) / 2 x HDMI(Version 2.0b) / DVI-D dual link\r\nDimensions : 320 x 140 x 61 mm\r\nConfiguration système requise : Slot d’extension : la carte mère doit disposer d’un slot d’extension (ou plus) PCI Express x16 / Moniteur : la sortie doit être identique à celle de la carte graphique / Système d’exploitation : Windows 7 ou version suivante. (dépend du produit) / Lecteur optique.', 'INTEL', 'INTEL.jpg', 'TABGTX1080TI.png', 'https://www.youtube.com/embed/0dPGFBCwbA4'),
(1121, 'Intel Core i7-7700K Processor 4 Cores 8 Threads 4.20GHz', 3, '650', 0, 'i7-7700k.jpg', 'Type de produit : Intel Core i7-7700K Processeur 4,20 GHz\r\nNon compatible avec les systèmes d\'exploitation Microsoft antérieurs à Windows 10\r\nRapide & réactif\r\nMultitâche.Graphics Max Fréquence Dynamique: 1.15 GHz\r\nSécurité renforcée\r\nJeu d\'instructions: 64-bit\r\nFréquence de base graphique: 350 MHz', 'INTEL', 'INTEL.jpg', 'TABCOREi7.png', NULL),
(1122, 'HYPERX - PC RAM - FURY DDR4 RGB - 16Go', 1, '450', 9, 'Ram16GoHyperX.jpg', '16 Go: 2 x 8 Go - 1.35 V\r\nTechnologie : DDR4 SDRAM\r\nVitesse : 3733 MHz (PC4-29800)\r\nTemps de latence : CL19 (19-23-23)\r\nMémoire Ram', 'HYPERX', 'HYPERX.jpg', 'TABRAMHYPERX.png', 'https://www.youtube.com/embed/8-PcVsm6-_E'),
(1123, 'ECRAN MSI OPTIX MAG241C CURVED 24 FHD', 8, '700', 6, 'MSISCREEN.jpg', 'ECRAN OPTIX - Taille de l\'écran : 23.6  FULL HD Dalle incurvée - VA  - Résolution: 1920 x 1080  pixels - Fréquence : 144 Hz-  Luminosité: 300 cd/m²  - Temps de réponse: 1 ms  -  Connecteurs: HDM 1.04 I- DisplayPort  - DVI  - Couleur: Noir -Garantie: 1 an', 'MSI', 'MSI.jpg', 'TABECRANMSI.png', 'https://www.youtube.com/embed/EVwDuUc5j68'),
(1124, 'ASUS ROG XG27VQ - Ecran PC gaming eSport 27 - Dalle VA incurvée 1800R - 16:9 - 144Hz - 1ms - 1920x1080 - Display Port, HDMI et DVI - Haut-parleurs - AMD FreeSync - Aura RGB', 9, '800', 4, 'ASUSROG.jpg', 'Moniteur incurvé 1800R de 27 pouces avec une fréquence de rafraîchissement de 144 Hz, conçu pour les joueurs professionnels et les adeptes de MOBA\r\nASUS Extreme Low Motion Blur pour des graphismes nets et Adaptive Sync (FreeSync) qui élimine les déchirures de l\'image\r\nLes moniteurs gaming ROG Strix XG intègrent l\'éclairage ASUS Aura à l\'arrière et une projection lumineuse à personnaliser pour laisser parler votre inspiration\r\nUn support ergonomique fait pour régler la rotation, l\'inclinaison et la hauteur\r\nGarantie 3 ans', 'ASUS', 'ASUS.jpg', 'TABECRANROG.png', 'https://www.youtube.com/embed/7tBrv04am94'),
(1125, 'ECRAN GAMING INCURVÉ REDRAGON MIRROR 24 WLED FULL HD / 144 HZ / NOIR', 9, '500', 0, 'REDDRAGON.jpg', 'Ecran Gaming REDRAGON Mirror Incurvé - Taille de l\'ecran: 24\" FULL HD WLED - Résolution: (1920 x 1080 pixels) - Luminosité: 250 cd/m² - Contraste: 3 000:1 - Angle de vision: 178 °/178 °(H/V) - Temps de réponse: 1 ms - Fréquence de Balayage: 144 Hz - Surface du panneau: antireflet - Connecteurs: 1x DVI, 1x HDMI, 1x DP - Garantie: 1 an', 'REDRAGON', 'REDRAGON.jpg', 'TABEcranRedDragon.png', NULL),
(1126, 'Dell Professional P2317H 23 Screen LED-Lit Monitor,Black', 10, '1800', 0, 'PCDELL.jpg', '23- Inch LED - Backlit LCD Monitor, Widescreen 16:9 Aspect Ratio\r\nFull HD (1080P) 1920x1080 at 60Hz, 6ms Response Time\r\n1000 to 1 (typical) / 4 Million to 1 (Dynamic) Contrast Ratio\r\nHDMI, VGA, 2x USB 3.0, 2x USB 2.0, and 1x USB Upstream Port\r\nIncludes Power, VGA, DP, and USB 3.0 Upstream Cables', 'DELL', 'DELL.jpg', 'TABECRANDELL.png', 'https://www.youtube.com/embed/NEmrBqkHIT0'),
(1127, 'GTX 1060', 4, '929', 0, 'GTX.jpg', 'Taille mémoire vidéo 3Go - Type de mémoire GDDR5 - Fréquence boostée 1809 MHz - Bus PCI Express 3.0 16x - Sorties vidéo : 3 x DisplayPort Femelle, 1 x DVI Femelle, 1 x HDMI Femelle - Connecteur(s) alimentation : 1 x PCI Express 8 Broches', 'INTEL', 'INTEL.jpg', 'TABGTX1060.png', NULL),
(1128, 'Souris Razer Deathadder V2', 11, '200', 1, 'razer.png', 'FORME Droitier - CONNECTIVITÉ Filaire - Câble Razer™ Speedflex - ÉCLAIRAGE RGB Razer Chroma™ RGB - CAPTEUR Optique - SENSIBILITÉ MAX (DPI) 20000 - VITESSE MAX (IPS) 650 - ACCÉLÉRATION MAX (G) 50 - BOUTONS PROGRAMMABLES 8 - TYPE DE SWITCH Optique - CYCLE DE VIE DES SWITCHS 70 millions de clics - PROFILS DE MÉMOIRE INTÉGRÉS 5 - PIEDS DE SOURIS Pieds de souris 100 % en PTFE - CÂBLE Câble Razer™ Speedflex - MOLETTE DE SOURIS INCLINABLE Non - TAILLES 127,0 mm x 61,7 mm x 42,7 mm - POIDS 0,18 lbs / 82 g', 'RAZER', 'RAZER.gif', 'TABSourisDeathAdderElite.png', 'https://www.youtube.com/embed/mana0sGU3DU'),
(1129, 'Processeur Intel Core I7-10700 (2.9 GHz / 4.8 GHz)', 3, '1300', 0, 'corei7.jpg', 'Intel Core i7-10700 (2.9 GHz / 4.8 GHz) - Modèle de processeur: Intel Core i7 - Support du processeur: Intel 1200 - Fréquence CPU: 2.9 GHz - Fréquence en mode Turbo: 4.8 GHz - Fréquence du bus: DMI 8.0 GT/s - Nombre de core: 8 - Nombre de Threads: 16 - Plateforme (Proc.): Intel Comet Lake-S - Nom du core: Comet Lake - Finesse de gravure: 0.014 Micron - TDP: 65 W - Cache L3: 12 Mo - Compatibilité chipset carte mère: Intel B460 Express / Intel H410 Express / Intel H470 Express / Intel Q470 Express / Intel Z490 Express - Chipset graphique: ', 'INTEL', 'INTEL.jpg', 'TABi710700k.png', 'https://www.youtube.com/embed/zhQSrR0Mdwo'),
(1130, 'Ecrans Gaming MSI OPTIX CURVED MAG241CR', 8, '1499', 1, 'ecranpc.png', 'Plongez au coeur de l\'action avec le moniteur incurvé MSI Optix MAG241CR ! Taillé pour le divertissement numérique, cet écran incurvé Full HD de 23.6 pouces, avec dalle VA, offre une image de haute qualité et un confort visuel optimisé.', 'MSI', 'MSI.jpg', 'TABMSIECRAN.png', NULL),
(1131, 'CLAVIER GAMER STEELSERIES APEX M750 NOIR', 12, '550', 0, 'apexpro.jpg', 'Clavier Gamer Mécanique STEELSERIES Apex M750 - Clavier rétroéclairé RGB - Interface avec l\'ordinateur: USB - Technologie de Connectivité: Filaire - Norme du clavier: AZERTY - Nombre de Touches: 104 - Pavé Numérique - Longueur du câble: 2 mètres - Rétro-éclairage personnalisable (jusqu\'à 16.8 millions de couleurs) - Fonction anti-ghosting avancé permettant d\'actionner plusieurs touches en même temps - Type de touches: Switch SteelSeries QX2 - Nouveaux switches QX2 pour une rapidité accrue - Châssis conçu en aluminium - Dimension: 454 x 46.7 x 153.5 mm - Couleur: Noir', 'STEELSERIES', 'STEELSERIES.jpg', 'TABM750.png', 'https://www.youtube.com/embed/Ue5Eb47O7cY'),
(4871, 'Casque Micro Gaming HyperX Cloud II', 13, '360', 1, 'hyperxc.jpg', 'Casque Micro Gaming HyperX Cloud II - Type de transducteur : dynamique Ø 53mm avec aimants Neodynium - Principe d\'utilisation: Fermé - Réponse en fréquence: 15Hz–25 000 Hz - Impédance nominale: 60 Ω - Niveau de pression acoustique nominal (SPL): 98±3dB - Puissance: 150mW - Réduction de bruit ambiant: 20 dBa - Poids : 320g - Poids du microphone et du câble: 350 g - Type et longueur du câble: rallonge 1 m + 2 m - Connexion: Une prise casque mini stéréo (3,5 mm) - Microphone Principe d\'utilisation: Niveau de pression - Diagramme polaire: cardioïde - Alimentation: AB - Tension d\'alimentation: 2V -', 'HYPERX', 'HYPERX.jpg', 'TABCASQUEHYPERX.png', 'https://www.youtube.com/embed/ZJVqKVU0wWw'),
(5147, 'CARTE MÈRE ASROCK Z490 TAICHI / WI-FI AX', 2, '1200', 1, 'asusm2.jpg', 'Carte mère ASRock Z490 Taichi- Format ATX - Support des processeurs Intel Core de 10ème et 11ème génération sur socket LGA 1200 - 4x Slots RAM jusqu\'à 4666 MHz (OC) - 3x PCIe 3.0 x16 + 2x PCIe 3.0 x1 - 8x ports SATA 6 Gb/s + 2x Ultra M.2 - Wi-Fi 6 AX + Bluetooth 5.1 + LAN 2.5 GbE - Multi-GPU AMD CrossFireX et NVIDIA SLI - Audio 7.1 (Realtek ALC1200 Audio Codec) + Nahimic Audio - 1x USB 3.2 Type C - 2x USB 3.1 - 5x USB 3.0 - 2x RJ45 - 1x HDMI - 1x DisplayPort - 2x Connecteurs RGB - 2x Connecteurs ARGB (RGB Adressable) - Dimensions 305 x 244 mm - Garantie 2 ans', 'ASROCK', 'ASROCK.jpg', NULL, 'https://www.youtube.com/embed/mc-RsSjNREo'),
(5165, 'SOURIS GAMING CORSAIR CORSAIR SCIMITAR PRO RGB / 16 000 DPI', 11, '350', 2, 'scimitar.jpg', 'Souris Gaming Corsair Corsair Scimitar Pro RGB - Résolution 16 000 dpi - 17x Boutons programmables dont 12 à position ajustable - Rétroéclairage RGB 4 zones - 3 profils embarqués - Taux d\'interrogations : 125/250/500/1000 Hz - Dimensions : 119.8 x 77.2 x 42.4mm - Poids : 122 g - Garantie 1 an', 'CORSAIR', 'CORSAIRS.jpg', 'TABSourisCorsair.png', 'https://www.youtube.com/embed/JUooyUn_HWw'),
(5614, 'MICRO CASQUE RAZER KRAKEN PRO V2 / VERT RGB', 13, '329', 5, 'kraken.gif', 'Micro Casque Kraken Pro V2 - Réponse en fréquence : 12 - 28 000 Hz - Impédance : 32 Ω à 1 kHz - Sensibilité : 118 - Haut-parleurs : 50 mm - Longueur du câble : 1,3 m + adaptateur séparateur 2 m - Poids : 322 g - Connecteur : prise jack combinée analogique 3,5 mm (casque et micro) - Compatible PC / Mac / PlayStation 4 / Xbox One - Garantie 1 an', 'RAZER', 'RAZER.gif', 'TABCASQUERAZER.png', 'https://www.youtube.com/embed/EerI8DPogkE'),
(6584, 'CARTE MÈRE ASROCK Z490 STEEL LEGEND', 2, '700', 3, 'asusm.jpg', 'Carte mère ASRock Z490 Steel Legend - Format ATX - Support des processeurs Intel Core de 10ème et 11ème génération sur socket LGA 1200 - 4x Slots RAM jusqu\'à 4266 MHz (OC) - 2x PCIe 3.0 x16 + 3x PCIe 3.0 x1 - 6x ports SATA 6 Gb/s + 2x Ports Ultra M.2 -  1x Port Réseau RJ45 LAN 2.5 GbE - Multi-GPU AMD CrossFireX - 10 Phase Dr.MOS Power Design - 1x USB 3.1 Type C - 1x USB 3.1 - 2x USB 3.0 - 2x USB 2.0 - 1x HDMI - 1x DisplayPort - 2x Connecteurs RGB - 2x Connecteurs ARGB (RGB Adressable) - Dimensions 305 x 244 mm - Garantie 2 ans', 'ASROCK', 'ASROCK.jpg', NULL, 'https://www.youtube.com/embed/UAbqr75MAqA'),
(8941, 'CASQUE MICRO HP PAVILION GAMING 600', 13, '201', 6, 'hppv.jpg', 'Casque Micro HP Pavilion Gaming 600 - Son surround virtuel 7.1: expérience acoustique immersive - Coussinets doux en cuir synthétique - Bandeau léger et confortable - Commandes sur l\'écouteur: volume et fonction muet - Éclairage LED vertes - Microphone réglable: devant le visage ou replié vers le haut - Dimensions: 18 x 21.8 x 11.4 cm - Poids: 0.36 Kg - Longeur de Cable: 200 cm - Couleur: Noir & Vert - Garantie 1 an', 'HP', 'HP.jpg', 'TABCASQUEHP.png', NULL),
(65715, 'CARTE MÈRE MSI B460M-A PRO', 2, '255', 7, 'msim.jpg', 'Carte mère MSI B460M-A Pro - Format Micro ATX - Support des processeurs Intel Core de 10ème génération sur socket LGA 1200 - 2x Slots mémoires Jusqu\'à 2933 MHz - Slot Turbo M.2 fonctionnant en PCI-E Gen3 x4 pour améliorer les performances des SSD NVMe - Audio Boost - 1X PCI Express 3.0 16x - 2X PCI Express 3.0 1x - Réseau Gigabit Realtek RTL8111H - 4x USB 3.0 - 1x HDMI - 1x DVI - Dimensions 226 x 203 mm - Garantie 1 an', 'MSI', 'MSI.jpg', NULL, NULL),
(65717, 'PC Gamer VENTO - Ryzen 5 1600AF * 1650 * 16Go * 240Go', 7, '1869', 5, 'PCVento2.jpg', 'Pc de Bureau Gamer Vento : Processeur : AMD RYZEN™ 5 1600, 6 CŒURS, 3.2GHZ - Mémoire RAM : 8 Go DDR4 3200 Mhz - Disque Dur interne : 240 SSD - Carte Graphique : PALIT GTX 1660 SUPER GAMINGPRO 6GB - Carte mère : MSI B450M-A PRO MAX - Boitier : FSP VENTO GLASS 3 (VG04F) -', 'VENTO', 'VENTO.jfif', 'TABPCVENTO.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typecat`
--

DROP TABLE IF EXISTS `typecat`;
CREATE TABLE IF NOT EXISTS `typecat` (
  `nomtype` varchar(50) NOT NULL,
  PRIMARY KEY (`nomtype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typecat`
--

INSERT INTO `typecat` (`nomtype`) VALUES
('COMPUTERS'),
('HAEDWARE'),
('PC PERIPHERALS'),
('SCREEN');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ctategorie`
--
ALTER TABLE `ctategorie`
  ADD CONSTRAINT `fg18` FOREIGN KEY (`nomtype`) REFERENCES `typecat` (`nomtype`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fact1` FOREIGN KEY (`idcommande`) REFERENCES `commande` (`idcommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact2` FOREIGN KEY (`idprod`) REFERENCES `produit` (`idprod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fg7` FOREIGN KEY (`uss`) REFERENCES `clients` (`uss`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fg9` FOREIGN KEY (`idprod`) REFERENCES `produit` (`idprod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `ctategorie` (`idcat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
