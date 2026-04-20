-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 14 avr. 2026 à 18:21
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `RetroShelf`
--

-- --------------------------------------------------------

--
-- Structure de la table `Ajouter`
--

CREATE TABLE `Ajouter` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_Jeu` int(11) NOT NULL,
  `Statut` enum('possede','souhait') DEFAULT 'possede'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `Id_Categorie` int(11) NOT NULL,
  `Nom_categorie` varchar(50) DEFAULT NULL,
  `id_externe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`Id_Categorie`, `Nom_categorie`, `id_externe`) VALUES
(7, 'RPG', 5),
(8, 'Adventure', 3),
(9, 'Action', 4),
(10, 'Puzzle', 7),
(11, 'Strategy', 10),
(12, 'Arcade', 11),
(13, 'Casual', 40),
(14, 'Card', 17),
(15, 'Board Games', 28),
(16, 'Platformer', 83),
(17, 'Indie', 51),
(18, 'Racing', 1),
(19, 'Family', 19),
(20, 'Simulation', 14),
(21, 'Massively Multiplayer', 59),
(22, 'Shooter', 2),
(23, 'Sports', 15);

-- --------------------------------------------------------

--
-- Structure de la table `Classer`
--

CREATE TABLE `Classer` (
  `Id_Jeu` int(11) NOT NULL,
  `Id_Categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Classer`
--

INSERT INTO `Classer` (`Id_Jeu`, `Id_Categorie`) VALUES
(65, 7),
(66, 8),
(67, 8),
(67, 9),
(68, 7),
(68, 9),
(69, 8),
(69, 9),
(70, 8),
(70, 9),
(71, 8),
(71, 9),
(71, 10),
(72, 8),
(72, 9),
(73, 8),
(73, 9),
(74, 7),
(74, 8),
(74, 9),
(75, 7),
(75, 8),
(75, 9),
(76, 8),
(76, 9),
(77, 9),
(78, 8),
(78, 9),
(79, 8),
(79, 9),
(80, 8),
(80, 9),
(81, 7),
(81, 8),
(81, 9),
(82, 7),
(82, 8),
(82, 9),
(83, 8),
(84, 7),
(84, 8),
(84, 9),
(85, 11),
(86, 12),
(87, 11),
(87, 13),
(87, 14),
(87, 15),
(88, 12),
(89, 12),
(90, 16),
(91, 8),
(91, 9),
(91, 10),
(92, 12),
(93, 12),
(94, 11),
(94, 13),
(94, 17),
(95, 12),
(96, 9),
(96, 11),
(96, 16),
(96, 18),
(97, 12),
(98, 12),
(99, 12),
(100, 12),
(101, 12),
(102, 18),
(105, 12),
(105, 13),
(105, 19),
(106, 8),
(106, 9),
(107, 8),
(107, 9),
(109, 10),
(109, 12),
(109, 13),
(110, 9),
(110, 10),
(110, 12),
(111, 12),
(112, 12),
(113, 9),
(115, 15),
(117, 10),
(117, 12),
(118, 12),
(118, 18),
(119, 12),
(120, 8),
(120, 9),
(121, 9),
(121, 16),
(123, 10),
(124, 9),
(124, 16),
(125, 9),
(125, 12),
(125, 17),
(125, 20),
(125, 21),
(126, 8),
(126, 9),
(127, 8),
(127, 9),
(128, 10),
(128, 16),
(129, 9),
(129, 16),
(130, 16),
(131, 16),
(132, 16),
(133, 16),
(134, 22),
(135, 8),
(135, 9),
(135, 16),
(136, 16),
(137, 10),
(138, 10),
(138, 16),
(139, 9),
(139, 16),
(139, 22),
(140, 18),
(141, 16),
(143, 8),
(143, 19),
(144, 8),
(145, 8),
(145, 9),
(147, 12),
(148, 8),
(148, 9),
(148, 16),
(149, 8),
(149, 9),
(149, 16),
(150, 23),
(151, 23),
(152, 23),
(153, 23),
(154, 18),
(155, 23),
(156, 18),
(157, 18),
(158, 7),
(160, 7),
(161, 7),
(162, 15),
(164, 23),
(165, 10),
(166, 15),
(167, 22),
(168, 9),
(168, 22),
(169, 9),
(169, 22),
(170, 8),
(170, 9),
(170, 22),
(171, 9),
(171, 22),
(172, 9),
(172, 22),
(173, 9),
(173, 22),
(174, 22),
(175, 9),
(175, 22),
(176, 22),
(177, 9),
(177, 22),
(178, 22),
(179, 9),
(179, 13),
(179, 22),
(180, 22),
(181, 9),
(181, 22),
(182, 9),
(182, 22),
(183, 9),
(183, 22),
(184, 22),
(185, 22),
(186, 22),
(187, 9),
(187, 10),
(187, 12),
(188, 7),
(188, 11),
(188, 13),
(188, 17),
(189, 12),
(190, 9),
(191, 9),
(192, 9),
(193, 9),
(193, 10),
(193, 11),
(193, 12),
(194, 10),
(195, 9),
(195, 10),
(195, 12),
(196, 8),
(196, 9),
(197, 10),
(197, 13),
(198, 8),
(198, 16),
(199, 9),
(199, 10),
(199, 11),
(199, 12),
(200, 9),
(201, 9),
(202, 9),
(202, 10),
(202, 12),
(203, 18),
(204, 9),
(204, 10),
(204, 11),
(205, 9),
(205, 10);

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `Id_Commentaire` int(11) NOT NULL,
  `Contenu` text DEFAULT NULL,
  `Date_` datetime DEFAULT NULL,
  `Id_Jeu` int(11) NOT NULL,
  `Id_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Jeu`
--

CREATE TABLE `Jeu` (
  `Id_Jeu` int(11) NOT NULL,
  `Titre` varchar(50) DEFAULT NULL,
  `Date_Sortie` date DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `RefExterne` varchar(50) DEFAULT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Jeu`
--

INSERT INTO `Jeu` (`Id_Jeu`, `Titre`, `Date_Sortie`, `Image`, `RefExterne`, `Description`) VALUES
(65, 'Zelda II: The Adventure of Link', '1987-01-14', 'https://media.rawg.io/media/screenshots/2dc/2dcc5b76de63a99799364f962334525f.jpg', '53205', 'Zelda II: The Adventure of Link is an action role-playing video game with platforming elements. The second installment in The Legend of Zelda series, it was developed and published by Nintendo for the Family Computer Disk System on January 14, 1987, less than a year after the original The Legend of Zelda was released and seven months before North America saw the release of the first Zelda title. The game was released in North America and the PAL region for the Nintendo Entertainment System in late 1988, almost two years after its initial release in Japan.\nThe Adventure of Link is a direct sequel to the original The Legend of Zelda, again involving the protagonist, Link, on a quest to save Princess Zelda, who has fallen under a sleeping spell. The Adventure of Link\'s emphasis on side-scrolling and role-playing elements, however, was a significant departure from its predecessor. As of 2016, the game remains the only technical sequel to the original title, as all other entries in the series either are prequels or take place in an alternative reality, according to the official Zelda timeline.\nThe game was a critical and financial success, and introduced elements such as Link\'s \"magic meter\" and the Dark Link character that would become commonplace in future Zelda games, although the role-playing elements, such as experience points, and the platform-style side-scrolling and limited lives have not been used since in canonical games. The Adventure of Link was followed by The Legend of Zelda: A Link to the Past for the Super Nintendo Entertainment System in 1992.'),
(66, 'The Legend of Zelda: Skyward Sword', '2011-11-20', 'https://media.rawg.io/media/games/884/884d12f527a9a12b5e486ee1b79ecf7f.jpeg', '26824', ''),
(67, 'Zelda\'s Adventure', '2020-07-12', 'https://media.rawg.io/media/games/856/85636bf9dd34778beb20adb5ba651017.jpg', '466577', ''),
(68, 'The Legend of Zelda: Twilight Princess', '2006-11-19', 'https://media.rawg.io/media/games/dd1/dd167cf8753db3748a975d61cc926e54.jpg', '27015', ''),
(69, 'The Legend of Zelda: Four Swords', '2002-12-02', 'https://media.rawg.io/media/screenshots/063/063e24eb22d69c8d4febc5b938a50b57.jpg', '290864', ''),
(70, 'The Legend of Zelda: Majora\'s Mask', '2000-04-27', 'https://media.rawg.io/media/games/b3c/b3c209cd49aae8a469a59b79b54dc599.jpg', '25924', ''),
(71, 'The Legend of Zelda: Phantom Hourglass', '2007-10-01', 'https://media.rawg.io/media/screenshots/b23/b23b3b0f25b10123c0338cf9f5c8bc12.jpg', '27023', ''),
(72, 'The Legend of Zelda: Spirit Tracks', '2009-12-07', 'https://media.rawg.io/media/games/4a1/4a1ed758c53873d6442562f0c772b640.jpeg', '23850', 'Spirit Tracks have long protected the kingdom from evil. But when they\nstart disappearing mysteriously, Link and Zelda must travel together to\nrestore them and keep the dark forces at bay. Fight enemies and explore\nthe world as you travel by train and take control of a hulking suit of\narmor!\nThis classic game is part of the Virtual Console service, which brings you great games created for consoles such as NES™, Super NES™ and Game Boy™ Advance. We hope you\'ll enjoy the new features (including off-TV play) that have been added to this title. See more Virtual Console games for Wii U.'),
(73, 'The Legend of Zelda: Oracle of Ages', '2001-02-27', 'https://media.rawg.io/media/screenshots/0e0/0e02b3c6aaf4bf6d7a59f8c001bb3fac.jpg', '27256', 'Transcend the very fabric of time with the Harp of Ages. Rescue Nayru, \n      the Oracle of Ages, to save the Land of Labrynna from Veran, Sorceress \n      of Shadows, who will pitch the world into an endless night.\n    \n      Travelling through time presents Link with unique challenges. If a river \n      blocks Link\'s path in the present, he can travel to the past and move a \n      stone, redirecting the flow of water. If he plants seeds in the past, \n      he\'ll find full-grown trees and vines when he returns to the present.\n    \n      SAVE THE ORACLES\n    \n      Released on the Game Boy™ Color system in 2001, The Legend of Zelda™: \n      Oracle of Ages™ and The Legend of Zelda™: Oracle of Seasons™ represent \n      the pinnacle of classic 2D Zelda gameplay. Now you can play these \n      classics on your Nintendo 3DS™ system!\n    \n      When played together, these two games offer an ultimate adventure not \n      possible when each game is experienced on its own. The games feature a \n      link system that unlocks access to additional content that you can\'t \n      access any other way.\n    This game is only playable in 2D.This classic game is part of the Virtual Console service, which brings you great games created for consoles such as NES™, Super NES™ and Game Boy™ Advance. See more Virtual Console games for Nintendo 3DS.'),
(74, 'The Legend of Zelda: The Minish Cap', '2004-11-04', 'https://media.rawg.io/media/games/25d/25d9592abbd02dccd67d83108ae79582.jpg', '27418', ''),
(75, 'The Legend of Zelda: Ocarina of Time', '1998-11-21', 'https://media.rawg.io/media/games/3a0/3a0c8e9ed3a711c542218831b893a0fa.jpg', '25097', ''),
(76, 'The Legend of Zelda: Oracle of Seasons', '2001-02-27', 'https://media.rawg.io/media/screenshots/8ab/8ab43c6316d0b5bf16039345867e025a.jpg', '27255', ''),
(77, 'The Legend of Zelda: The Wind Waker', '2002-12-13', 'https://media.rawg.io/media/games/45f/45f6d31b0fcefe029e33d258a7beb6a2.jpg', '56092', ''),
(78, 'The Legend of Zelda: Link\'s Awakening (1993)', '1993-06-06', 'https://media.rawg.io/media/games/a1b/a1b2af4caa3c61f9922431baf1fca447.jpg', '27057', ''),
(79, 'The Legend of Zelda: Four Swords Adventures', '2004-03-18', 'https://media.rawg.io/media/screenshots/336/336e29b524e0e4f17ac2d2b9339baea4.jpg', '56093', ''),
(80, 'The Legend of Zelda: A Link to the Past', '1991-11-21', 'https://media.rawg.io/media/games/087/08727beb32c364d30e8b2a1aa8595f8e.jpg', '25096', ''),
(81, 'The Legend of Zelda', '1986-02-21', 'https://media.rawg.io/media/games/f87/f87de0e93f02007fd044e4bf04d453d8.jpg', '24072', ''),
(82, 'The Legend of Zelda: Collector\'s Edition', '2003-11-07', 'https://media.rawg.io/media/screenshots/253/253167e239ab310805c10d41e9fecbbe.jpg', '364800', ''),
(83, 'The Legend of Zelda: Parallel Worlds', '2006-12-31', 'https://media.rawg.io/media/screenshots/2ca/2caee36c5de270503190caf028d5628b.jpg', '734625', ''),
(84, 'BS The Legend of Zelda', '1995-04-06', 'https://media.rawg.io/media/screenshots/533/5333b5363b2bd96d5830031b12db5729.jpg', '379447', ''),
(85, 'RISK: Factions', '2010-06-23', 'https://media.rawg.io/media/screenshots/a8e/a8ec97125fa2ef326abb57e7ea6fcbe6.jpg', '19607', ''),
(86, 'The Beatles: Rock Band', '2009-09-09', 'https://media.rawg.io/media/games/633/6336fa12fffe38dde84b880763390f4d.jpg', '5675', 'Experience The Beatles™ music and legacy like never before, utilizing the core Rock Band™ game play. Follow the legendary career of The Beatles™ from Liverpool to Shea Stadium to Abbey Road.  Play drums, lead guitar, and bass guitar and sing three-part harmony with up to three microphones.  Feel what it’s like to perform The Beatles’ classic songs, on stage and in the studio.'),
(87, 'RISK', '2013-06-10', 'https://media.rawg.io/media/screenshots/534/5345169c91df296b2c8611bf39ebed6a.jpg', '3353', ''),
(88, 'Green Day: Rock Band', '2010-06-04', 'https://media.rawg.io/media/games/c89/c89d98435e3ff94624370c996ef7bf63.jpg', '26410', ''),
(89, 'Guitar Hero: Warriors of Rock', '2010-09-24', 'https://media.rawg.io/media/games/800/80081e1e39de018f19c35fd18c6a8cd8.jpg', '24353', ''),
(90, 'Boogerman: A Pick and Flick Adventure', '1996-01-25', 'https://media.rawg.io/media/screenshots/2c5/2c5f76b7b7f79dccf9957b11cc350745.jpg', '56949', ''),
(91, 'GHOST TRICK: Phantom Detective', '2010-08-16', 'https://media.rawg.io/media/games/7fa/7fae1e3e5c0d7838c403f3f1168b860e.jpg', '1317', ''),
(92, 'AC/DC LIVE: Rock Band', '2008-11-02', 'https://media.rawg.io/media/screenshots/7e5/7e5f0b145ae0e41bb2226a4540b0cfcb.jpg', '28695', ''),
(93, 'Asterix & Obelix XXL - Kick Buttix!', '2004-03-19', 'https://media.rawg.io/media/screenshots/1fe/1fe849ccc53a434e8b36e4bee486e655.jpg', '35949', ''),
(94, 'Brick Breaker', '2011-06-21', 'https://media.rawg.io/media/screenshots/6cf/6cfaae40017dc01a6d1989fbae7b88f8.jpg', '2497', ''),
(95, 'Rock Band', '2007-11-20', 'https://media.rawg.io/media/games/42f/42f453581ca2c932505888a67e1280b4.jpg', '5644', ''),
(96, 'Rock of Ages', '2011-08-31', 'https://media.rawg.io/media/screenshots/e5f/e5fc584aefc66dec235715908eb2316b.jpg', '4380', ''),
(97, 'Guitar Hero III: Legends of Rock', '2007-10-28', 'https://media.rawg.io/media/games/444/444d319b3156101aeef3d1a8df219f3f.jpg', '38283', ''),
(98, 'Rock Band Blitz', '2012-08-28', 'https://media.rawg.io/media/screenshots/391/391698220e7b09846a03c278bce542c9.jpg', '4287', ''),
(99, 'Rock Band 3', '2010-08-11', 'https://media.rawg.io/media/games/ba5/ba540779f7e66fb166e692b9e0768824.jpg', '5645', ''),
(100, 'Rock Band 2', '2008-09-14', 'https://media.rawg.io/media/games/5d7/5d77fff81db59ec441584e655318937d.jpg', '25778', ''),
(101, 'Lego Rock Band', '2009-11-03', 'https://media.rawg.io/media/games/924/9240fb1508840c692b7ca60ddb24173a.jpg', '26154', ''),
(102, 'Rock n\' Roll Racing', '1993-06-04', 'https://media.rawg.io/media/games/c42/c424d1344fa0ad3c24e7ad384a1f8192.jpg', '53506', ''),
(103, 'Rock Band Music Store', '2010-02-03', '', '28624', ''),
(104, 'Escape Trick: The Secret of Rock City Prison', '2011-04-11', 'https://media.rawg.io/media/screenshots/c0e/c0ee14e355bf21ae6dfff02895766394.jpg', '26667', ''),
(105, 'Pac-Man', '1980-05-22', 'https://media.rawg.io/media/games/ef3/ef3d2c3fe94361a3a3ef2dab06daa144.jpg', '24881', 'You control everyone\'s favorite iconic Pac-Man as you navigate through\nmazes, eating Power Dots while simultaneously avoiding the devious\nGhosts. Warp from one edge of the maze to the other using the Warp\nTunnels, or eat a Power Pellet to turn the tables and make the Ghosts\nvulnerable! In order to clear the stage, you\'ll need to eat all the\nPac-Dots! See just how far you can get through the stages before losing\nall your lives! Fruits, such as cherries and strawberries, will give you\nextra points to help you reach the highest score!\nThis classic game is part of the Virtual Console service, which brings you great games created for consoles such as NES™, Super NES™ and Game Boy™ Advance. We hope you\'ll enjoy the new features (including off-TV play) that have been added to this title. See more Virtual Console games for Wii U.'),
(106, 'Pac-Man C.E.', '2007-06-06', 'https://media.rawg.io/media/screenshots/cc0/cc035b82249521dbd232b975b80a1b95.jpg', '28462', ''),
(107, 'PAC-MAN MUSEUM', '2014-02-25', 'https://media.rawg.io/media/screenshots/ba5/ba54ae1f28bcc1164c777e87ffd185c0.jpg', '3762', ''),
(108, 'Pac-Man World', '1999-08-30', 'https://media.rawg.io/media/screenshots/e9e/e9e8679edcc8ff7ddca7b2e5d98b8bd3.jpg', '53465', ''),
(109, 'PAC-MAN CE DX', '2010-11-17', 'https://media.rawg.io/media/screenshots/452/45212651232aa13fbed24a6a925bf1f5.jpg', '47772', ''),
(110, 'PAC-MAN Championship Edition DX+', '2013-09-24', 'https://media.rawg.io/media/screenshots/7c9/7c9cc67546859e02d2d9cd815407b468.jpeg', '20000', ''),
(111, 'Pac-Man World 2 (2002)', '2002-02-24', 'https://media.rawg.io/media/screenshots/656/6565cd1f859e5a946c6781d20fc9af53.jpg', '53466', ''),
(112, 'Ms. Pac-Man', '1981-01-12', 'https://media.rawg.io/media/screenshots/f9a/f9ac59bb4af2ca2193ee9ffb979577cf.jpg', '52438', ''),
(113, 'PAC-MAN and the Ghostly Adventures', '2013-06-19', 'https://media.rawg.io/media/screenshots/0de/0deab3704c61315f9bc43a091c33dc15.jpg', '3870', ''),
(114, 'Pac-Man Vs.', '2003-11-27', 'https://media.rawg.io/media/screenshots/e32/e32fd429e2ece502edc081645a291475.jpg', '56164', ''),
(115, 'PAC-MAN Party', '2010-11-16', 'https://media.rawg.io/media/screenshots/f9c/f9c22937b09de7bc71a9b0f5951fde49.jpg', '26564', ''),
(116, 'Pac-Man Fever', '2002-09-03', '', '56162', ''),
(117, 'Pac-Man Collection (2001)', '2001-07-12', 'https://media.rawg.io/media/screenshots/c2b/c2bbf5363e07e1a4128cc32b63a40076.jpg', '53459', ''),
(118, 'Pac-Man World Rally', '2006-08-22', 'https://media.rawg.io/media/screenshots/655/6554109c9718c0422f2d96776560e319.jpg', '37039', ''),
(119, 'Pac-Man World 3', '2005-11-15', 'https://media.rawg.io/media/screenshots/fb4/fb43c938ca855e9048f60ec11e53b58e.jpg', '36647', ''),
(120, 'PAC-MAN CE DX+', '2010-11-17', 'https://media.rawg.io/media/screenshots/1e0/1e0703f2de81664a3c68a301ddddc339.jpg', '28251', ''),
(121, 'PAC-MAN GHOSTLY ADV', '2013-10-29', 'https://media.rawg.io/media/screenshots/e9b/e9bfc015798c81a1e41e4354e99b72a5.jpg', '29078', ''),
(122, 'Pac-Man Pinball Advance', '2005-05-02', 'https://media.rawg.io/media/screenshots/181/1811ea9fa13e8e98ca431449b8266594.jpg', '53464', ''),
(123, 'Pac-Man World 20th Anniversary', '2014-02-11', '', '3781', ''),
(124, 'PAC-MAN GHOSTLY ADV 2', '2014-10-14', 'https://media.rawg.io/media/screenshots/de2/de2a457e475ea1bc32419034091c6b56.jpg', '28813', ''),
(125, 'Minecraft', '2009-05-10', 'https://media.rawg.io/media/games/b4e/b4e4c73d5aa4ec66bbf75375c4847a2b.jpg', '22509', 'One of the most popular games of the 2010s, Minecraft allows you to rebuild the environment around you. The world of the game is open, infinitely wide, and procedurally generated. It is composed of small 3D cubes that represent specific types of materials or terrain. The gameplay is centered on mining and building various structures of your choice. You can also craft items like tools, weapons, and armor. There\'s an option to shift to the first or the third person view.\nMinecraft includes multiple modes that dramatically change the focus of the game. Survival and Adventure modes require the player to gather resources, hunt for food and fight monsters to survive. In the Hardcore mode, there’s even permanent death. Creative mode, by contrast, offers you to freely explore the world and construct whatever you want with unlimited resources. There’s also a multiplayer mode that allows the players to share their worlds and engage in the traditional MMO activities, such as player-vs-player combat.\nMinecraft’s crude visual style, reminiscent of Lego cubes, became an iconic part of the popular culture. There are many myths and fan fiction surrounding the game, such as the legend of Herobrine, a rumored character that officially doesn’t exist.'),
(126, 'Minecraft: Story Mode', '2015-10-13', 'https://media.rawg.io/media/games/a5e/a5e718412ecc9fc7008b59b2e2a29da1.jpg', '15916', 'Minecraft: Story Mode is an action-adventure game developed by TellTale. The title revolves around the episodic series-like narrative and puts the importance of the player\'s choices forward.\n\n###Gameplay\nThe game resembles the genre of the point-and-click adventures. The players can talk with non-mandatory characters and choose the dialogue options out of four or five alternatives. There is a heavy focus on the QTE — the sequences where one must mash buttons in time accordingly with the pictograms depicted on the screen. At the end of each chapter, the player is presented with the choice diagram — his of her picks are compared to those of the other players across the world.  \nIt is not to be forgotten — Minecraft: Story Mode is the TellTale adaptation of another video game. Fingerprints of this are clear: the crafting mode essential to the original has been added to the game, and the title has become more friendly all in all. That is the contrast with the previous TellTale installments — they were mainly targeting mature audience. \n \n###Story\nThe Story Mode created the narrative from the start — the original game does not feature it. The story centers around Jesse — the protagonist and the player at the same time — who travel around the in-game world in searches for The Order of the Stone.'),
(127, 'Minecraft: Story Mode — Season Two', '2017-07-10', 'https://media.rawg.io/media/games/5eb/5ebb2eff31f782b5ca986353dbfb8694.jpg', '28039', 'Now that Jesse and the gang have vanquished the Wither Storm, saved the world, and become totally super famous heroes, life has gotten a bit more...complicated. With more responsibilities and less time for adventure, old friendships have started to fade -- at least until Jesse’s hand gets stuck in a creepy gauntlet that belongs to an ancient underwater temple. Together with old pals and new comrades alike, Jesse embarks on a brand new journey filled with tough choices, good times, and at least one temperamental llama.\nIncludes access to all 5 episodes (Episode 1-2 available now, Episodes 3-5 as they release) in this brand new season from the award-winning studio, Telltale Games.'),
(128, 'Donkey Kong', '1981-07-09', 'https://media.rawg.io/media/games/23e/23eecccb588a4a9c97f35ebf8f9f00ef.jpg', '52512', 'Donkey Kong (Japanese: ドンキーコング, Hepburn: Donkī Kongu) is an arcade game released by Nintendo in 1981. An early example of the platform game genre, the gameplay focuses on maneuvering the main character across a series of platforms while dodging and jumping over obstacles. In the game, Mario (originally named Mr. Video and then Jumpman) must rescue a damsel in distress named Pauline (originally named Lady), from a giant ape named Donkey Kong. The hero and ape later became two of Nintendo\'s most popular and recognizable characters. Donkey Kong is one of the most important games from the golden age of arcade video games, and is one of the most popular arcade games of all time.\nThe game was the latest in a series of efforts by Nintendo to break into the North American market. Hiroshi Yamauchi, Nintendo\'s president at the time, assigned the project to a first-time video game designer named Shigeru Miyamoto. Drawing from a wide range of inspirations, including Popeye, Beauty and the Beast, and King Kong, Miyamoto developed the scenario and designed the game alongside Nintendo\'s chief engineer, Gunpei Yokoi. The two men broke new ground by using graphics as a means of characterization, including cutscenes to advance the game\'s plot, and integrating multiple stages into the gameplay.\nDespite initial doubts by Nintendo\'s American staff, Donkey Kong succeeded commercially and critically in North America and Japan. Nintendo licensed the game to Coleco, who developed home console versions for numerous platforms. Other companies cloned Nintendo\'s hit and avoided royalties altogether. Miyamoto\'s characters appeared on cereal boxes, television cartoons, and dozens of other places. A lawsuit brought on by Universal City Studios, alleging Donkey Kong violated their trademark of King Kong, ultimately failed. The success of Donkey Kong and Nintendo\'s victory in the courtroom helped to position the company for video game market dominance from its release in 1981 until the late 1990s (1996–1999).'),
(129, 'Donkey Kong Jr.', '1982-01-01', 'https://media.rawg.io/media/screenshots/c0c/c0cbd6e03a304ba617afe3d3d593e55f.jpg', '52513', ''),
(130, 'Donkey Kong Country', '1994-11-21', 'https://media.rawg.io/media/screenshots/6df/6df71f3ff0f6d6bbac306cb9adf935ee.jpg', '27571', ''),
(131, 'Donkey Kong Jungle Beat', '2004-12-16', 'https://media.rawg.io/media/screenshots/c46/c46f08905fbe81c2fafd6b6469856f1b.jpg', '56029', ''),
(132, 'Donkey Kong Country 2: Diddy\'s Kong Quest', '1995-11-20', 'https://media.rawg.io/media/screenshots/1b2/1b2b82bd26350d64c3d057c0206010ae.jpg', '53251', ''),
(133, 'Donkey Kong Country 3: Dixie Kong\'s Double Trouble', '1996-11-23', 'https://media.rawg.io/media/screenshots/89e/89e8e75cfae65a24b478e0382a841b9d.jpg', '27564', ''),
(134, 'Donkey Kong 3', '1984-07-04', 'https://media.rawg.io/media/screenshots/66a/66ade5302de761bcb5d15e8393f267cb.jpg', '53790', ''),
(135, 'Donkey Kong 64', '1999-11-22', 'https://media.rawg.io/media/games/458/4589f9727a1b8bcc0109e5a33a4ea944.jpg', '54380', ''),
(136, 'Donkey Kong Country Returns', '2010-11-21', 'https://media.rawg.io/media/games/ccd/ccd36642cee0cbb95681a6e3b7715381.jpg', '24170', ''),
(137, 'Mario vs. Donkey Kong (2004)', '2004-05-24', 'https://media.rawg.io/media/screenshots/e2f/e2fea0a0b7d38d85133980dc2a1b0202.jpg', '53397', 'Mario vs. Donkey Kong (Japanese: マリオVSドンキーコング, Hepburn: Mario tai Donkī Kongu) is a sub-series of the Mario and Donkey Kong series, based on puzzle video games, making the return of Donkey Kong, Pauline, and the former\'s rivalry with Mario.\nMario vs. Donkey Kong, released in 2004 for the Game Boy Advance, was followed by March of the Minis for the Nintendo DS, Minis March Again on DSiWare, Mini-Land Mayhem in 2010 for the DS, Minis on the Move for the Nintendo 3DS in 2013, Tipping Stars for the Wii U and 3DS in 2015. The latest title centered on amiibo, titled Mini Mario & Friends: Amiibo Challenge was released in 2016.'),
(138, 'Donkey Kong (1994)', '1994-06-14', 'https://media.rawg.io/media/screenshots/435/4355c4059c2ad9f3208dd34940ea63a9.jpg', '307153', ''),
(139, 'Conker: Live and Reloaded', '2005-06-21', 'https://media.rawg.io/media/games/36f/36f732ee705f23d6a0c3f1950a84dd77.jpg', '475076', ''),
(140, 'Donkey Kong: Barrel Blast', '2007-10-08', 'https://media.rawg.io/media/screenshots/477/47790fb15a5ce9c18f1854090eef2622.jpg', '25242', ''),
(141, 'Donkey Kong: Jungle Climber', '2007-09-10', '', '246469', ''),
(142, 'Donkey Kong Jr. Math', '1983-12-12', 'https://media.rawg.io/media/screenshots/3d7/3d74d9240eaa6c2d1655945861ece05b.jpg', '53791', ''),
(143, 'The Secret of Monkey Island: Special Edition', '2009-07-15', 'https://media.rawg.io/media/screenshots/656/65654f69256420c0126eb506c1a72d7f.jpg', '12073', ''),
(144, 'Tales of Monkey Island: Chapter 1', '2009-07-27', 'https://media.rawg.io/media/screenshots/931/9313e8a49bfaf3b13e8e48f5740db487.jpg', '26005', ''),
(145, 'Monkey Island 2 Special Edition: LeChuck’s Revenge', '2010-07-07', 'https://media.rawg.io/media/screenshots/89c/89c786468e50fab24d6859b7edaf91c0.jpg', '12074', ''),
(146, 'Super Monkey Ball', '2001-01-02', 'https://media.rawg.io/media/screenshots/934/934b7b9814f59292afc2fb0b90fc6be2.jpg', '56229', ''),
(147, 'Donkey Xote', '2007-12-01', 'https://media.rawg.io/media/screenshots/722/7224665c41e05e5a665918ff397312f3.jpg', '38560', ''),
(148, 'Mario Bros.', '2006-11-19', 'https://media.rawg.io/media/screenshots/f22/f22857f426275f7a09d865a2ad2376b9.jpg', '24919', ''),
(149, 'Mario Bros. (1983)', '1983-01-01', 'https://media.rawg.io/media/games/8ef/8efa90f72b466c632d7f95dd02be5e50.jpg', '52434', ''),
(150, 'Mario Tennis (2000)', '2000-07-21', 'https://media.rawg.io/media/games/426/42694e52597024bb7f444dd966ce2878.jpg', '54439', ''),
(151, 'Mario Golf (1999)', '1999-06-11', 'https://media.rawg.io/media/screenshots/aba/aba305582ea5fdd51451788ee43077f0.jpg', '54433', ''),
(152, 'Mario Strikers Charged', '2007-05-25', 'https://media.rawg.io/media/screenshots/bb9/bb9a34f9b3e192e89b5bf8dffd7f2367.jpg', '24868', ''),
(153, 'Mario Power Tennis', '2004-10-28', 'https://media.rawg.io/media/screenshots/5a2/5a2a41c745ae3120ce01399094b5b5d4.jpg', '27138', ''),
(154, 'Mario Kart 64 (1996)', '1996-12-14', 'https://media.rawg.io/media/screenshots/b19/b196fdca25e4df755f6fafd02df158d9.jpg', '54435', ''),
(155, 'Mario Golf: Toadstool Tour', '2003-07-28', 'https://media.rawg.io/media/screenshots/117/117c06f744ca4d9b6076030eb9d0ea52.jpg', '56099', ''),
(156, 'Mario Kart: Double Dash', '2003-11-07', 'https://media.rawg.io/media/games/379/379d8862e9dfccb12bfba3a131d99dd8.png', '56097', ''),
(157, 'Mario Kart: Super Circuit (2001)', '2001-07-21', 'https://media.rawg.io/media/games/243/243ffd01d85cf3db7da6bdeea8f17459.jpg', '53392', ''),
(158, 'Mario & Luigi: Superstar Saga', '2003-11-17', 'https://media.rawg.io/media/games/c48/c488b166259e38d942478c59b7508cdf.jpg', '27392', ''),
(159, 'Wario Land: Super Mario Land 3', '1994-01-21', 'https://media.rawg.io/media/screenshots/497/497c61d332ad52995c00d027bc9bea72.jpg', '27150', ''),
(160, 'Mario & Luigi: Partners in Time', '2005-11-28', 'https://media.rawg.io/media/screenshots/572/572483eed674fcda46e3d0cb2fe07719.jpg', '27620', ''),
(161, 'Mario and Luigi: Bowser\'s Inside Story', '2009-09-14', 'https://media.rawg.io/media/screenshots/57a/57a1551d54b04f08962a11c5a8f9083d.jpg', '26055', ''),
(162, 'Mario Party', '1998-12-18', 'https://media.rawg.io/media/games/576/576759570d5f9e67d4f1398e73a79bef.jpg', '53394', ''),
(163, 'Mario Paint', '1992-07-14', 'https://media.rawg.io/media/screenshots/c26/c265462a91197e68166cfe1bf2c2cf9c.jpg', '57414', ''),
(164, 'Mario & Sonic at the Olympic Games', '2007-11-06', 'https://media.rawg.io/media/screenshots/3ee/3eeb1b95603db8a965f82b43cd2a6fcb.jpg', '244724', ''),
(165, 'Dr. Mario', '1990-07-27', 'https://media.rawg.io/media/screenshots/05f/05f7d385e48f9f384cd4d496855029cd.jpg', '27168', ''),
(166, 'Mario Party 9', '2012-03-11', 'https://media.rawg.io/media/screenshots/5e0/5e0d253e92a500e1b27efd20f7172ae1.jpg', '24247', ''),
(167, 'Call of Duty', '2003-10-29', 'https://media.rawg.io/media/games/9c5/9c5bc0b6e67102bc96dcf1ba41509e42.jpg', '19369', ''),
(168, 'Call of Juarez', '2006-09-06', 'https://media.rawg.io/media/games/a41/a4126f8dc70a3e664b18b983722ed082.jpg', '19572', ''),
(169, 'Call of Juarez: Gunslinger', '2013-05-14', 'https://media.rawg.io/media/games/a86/a86ce0afaf2d5ec2b0f048989f01795e.jpg', '4013', ''),
(170, 'Call of Juarez: The Cartel', '2011-05-20', 'https://media.rawg.io/media/games/32a/32a1a382602c31015e6a6828c82e10be.jpg', '19524', ''),
(171, 'Call of Duty: Black Ops', '2010-11-09', 'https://media.rawg.io/media/games/410/41033a495ce8f7fd4b0934bdb975f12a.jpg', '865', ''),
(172, 'Call of Duty: Advanced Warfare', '2014-11-03', 'https://media.rawg.io/media/games/e05/e053aae547e0978ad90280a1a3d8f177.jpg', '842', ''),
(173, 'Call of Juarez: Bound in Blood', '2009-01-29', 'https://media.rawg.io/media/games/f43/f43c9742f8e8300e5a4d22ffa2d7ac08.jpg', '4521', ''),
(174, 'Call of Duty: Finest Hour', '2004-11-16', 'https://media.rawg.io/media/screenshots/620/62090243f90cade14f89281eceb9400f.jpg', '56000', ''),
(175, 'Call of Duty: Ghosts', '2013-11-05', 'https://media.rawg.io/media/games/eb2/eb24800b4491701eca481e7c990bce4a.jpg', '7439', ''),
(176, 'Call of Duty: World at War', '2008-11-11', 'https://media.rawg.io/media/games/da1/da15524e850ee9791b32973b748e08d5.jpg', '5528', ''),
(177, 'Call of Duty: Modern Warfare 3', '2011-11-08', 'https://media.rawg.io/media/games/e9c/e9c042d14515eb3ff7cb4db9fe78e435.jpg', '11276', ''),
(178, 'Call of Cthulhu: Dark Corners of the Earth', '2005-10-24', 'https://media.rawg.io/media/games/69a/69ac3aa05502fd854b73e55443e7f7ba.jpg', '19355', ''),
(179, 'Call of Duty: Roads to Victory', '2007-03-13', 'https://media.rawg.io/media/games/14b/14b181fc3ce0a2e4999646064c42660a.jpg', '316816', ''),
(180, 'Call of Duty 2: Big Red One', '2005-11-01', 'https://media.rawg.io/media/screenshots/46d/46dffc5eb7d84cf393aa939eddc43cd2.jpg', '49866', ''),
(181, 'Call of Duty 4: Modern Warfare', '2007-11-05', 'https://media.rawg.io/media/games/9fb/9fbaea2168caea1f806546dfdaaeb1da.jpg', '4535', ''),
(182, 'Call of Duty: Black Ops III', '2015-11-06', 'https://media.rawg.io/media/games/fd6/fd6a1eecd3ec0f875f1924f3656b7dd9.jpg', '906', ''),
(183, 'Call of Duty: Black Ops II', '2012-11-13', 'https://media.rawg.io/media/games/8ee/8eed88e297441ef9202b5d1d35d7d86f.jpg', '14446', ''),
(184, 'Call of Duty: Modern Warfare 2', '2009-11-10', 'https://media.rawg.io/media/games/9af/9af24c1886e2c7b52a4a2c65aa874638.jpg', '4527', ''),
(185, 'Call of Duty 2', '2005-10-25', 'https://media.rawg.io/media/games/50c/50c69996b917ae50d8d319f6ce9bed37.jpg', '14331', ''),
(186, 'Call of Duty 3', '2006-11-07', 'https://media.rawg.io/media/games/8fa/8fa1dd3783c7c3042ca704b76c95dfa8.jpg', '25064', ''),
(187, 'Bomberman (1983)', '1983-07-01', 'https://media.rawg.io/media/screenshots/797/797791e8fe14e5af187d2cdd401c6da9.jpg', '53196', ''),
(188, 'Bomberman', '2005-06-25', 'https://media.rawg.io/media/screenshots/c77/c774358d95575a5a2699798ec117f82e.jpg', '24964', ''),
(189, 'Bomberman Live: Battlefest', '2010-12-08', 'https://media.rawg.io/media/games/158/158d429b0d79811265d2153cea957c7b.jpg', '39757', ''),
(190, 'Bomberman 64 (1997)', '1997-11-30', 'https://media.rawg.io/media/screenshots/208/2085aa591542e4e8621528e2ce629374.jpg', '54359', ''),
(191, 'Bomberman: Bakufuu Sentai Bombermen', '2009-08-06', 'https://media.rawg.io/media/games/ae5/ae5380f1e0ef6432d12da2988201f4cc.jpg', '357859', ''),
(192, 'Bomberman Live', '2007-01-14', 'https://media.rawg.io/media/screenshots/630/630fddb97af6db303f28baf7f65ff4f2.jpg', '288664', ''),
(193, 'Bomberman ULTRA', '2009-06-11', 'https://media.rawg.io/media/screenshots/950/950d3c4296bf4a3cb7b561c44fe9afb5.jpg', '5327', ''),
(194, 'Bomberman II', '1991-06-28', 'https://media.rawg.io/media/screenshots/fff/fff418ae98761a2ccd438843238785bc.jpg', '53727', ''),
(195, 'Bomberman (2006)', '2006-09-12', 'https://media.rawg.io/media/games/fcf/fcf1e4e7b11c09a039f71e0754134832.jpg', '357860', ''),
(196, 'BOMBERMAN Act:Zero', '2010-05-19', 'https://media.rawg.io/media/screenshots/fdd/fddf7595ec2a9bf7e725eded01a4263d.jpg', '28812', ''),
(197, 'Bomberman Land (PSone)', '2000-12-21', 'https://media.rawg.io/media/screenshots/799/79952334135d354dd4bf2c5ea509f9cd.jpg', '52741', ''),
(198, 'Bomberman Hero (1998)', '1998-04-30', 'https://media.rawg.io/media/screenshots/934/9342ac893c97742ad51186503cea9468.jpg', '54362', ''),
(199, 'Bomberman Land Portable', '2007-03-21', 'https://media.rawg.io/media/screenshots/806/80605a74622b3ec32ce7a70f40fe032f.jpg', '5103', ''),
(200, 'Bomberman: Act Zero', '2011-12-19', 'https://media.rawg.io/media/screenshots/9f5/9f5532d4fed145f2807031e448c6a70e.jpg', '288663', ''),
(201, 'Bomberman B-Danman', NULL, '', '454534', ''),
(202, 'Super Bomberman', '1993-04-28', 'https://media.rawg.io/media/screenshots/49c/49c27b43cf23ff3a63ac577c78d8c60b.jpg', '57507', ''),
(203, 'Bomberman Fantasy Race (1998)', '1998-08-06', 'https://media.rawg.io/media/screenshots/2e5/2e5bcdf44c1cdff5aeaef2bd57090a90.jpg', '52738', ''),
(204, 'Bomberman 64: The Second Attack', '2000-05-28', 'https://media.rawg.io/media/screenshots/0f3/0f369dee74c0488b51b1c27036477e88.jpg', '54361', ''),
(205, 'Super Bomberman 2', '1994-04-28', 'https://media.rawg.io/media/screenshots/7eb/7eb694b8e9fd74a139183b24f7ffa118.jpg', '57508', '');

-- --------------------------------------------------------

--
-- Structure de la table `Noter`
--

CREATE TABLE `Noter` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Id_Jeu` int(11) NOT NULL,
  `note` tinyint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Plateforme`
--

CREATE TABLE `Plateforme` (
  `Id_Plateforme` int(11) NOT NULL,
  `Nom_plateforme` varchar(50) DEFAULT NULL,
  `Fabricant` varchar(50) DEFAULT NULL,
  `api_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Plateforme`
--

INSERT INTO `Plateforme` (`Id_Plateforme`, `Nom_plateforme`, `Fabricant`, `api_id`) VALUES
(47, 'Nintendo 3DS', NULL, 8),
(48, 'Wii U', NULL, 10),
(49, 'Wii', NULL, 11),
(50, 'GameCube', NULL, 105),
(51, 'Game Boy Advance', NULL, 24),
(52, 'NES', NULL, 49),
(53, 'Nintendo Switch', NULL, 7),
(54, 'Game Boy', NULL, 26),
(55, 'Nintendo DS', NULL, 9),
(56, 'Nintendo 64', NULL, 83),
(57, 'Game Boy Color', NULL, 43),
(58, 'SNES', NULL, 79),
(59, 'PC', NULL, 4),
(60, 'Xbox 360', NULL, 14),
(61, 'PlayStation 3', NULL, 16),
(62, 'Xbox One', NULL, 1),
(63, 'PlayStation 4', NULL, 18),
(64, 'PlayStation 2', NULL, 15),
(65, 'Genesis', NULL, 167),
(66, 'iOS', NULL, 3),
(67, 'PS Vita', NULL, 19),
(68, 'PSP', NULL, 17),
(69, 'macOS', NULL, 5),
(70, 'PlayStation', NULL, 27),
(71, 'Android', NULL, 21),
(72, 'Apple II', NULL, 41),
(73, 'Commodore / Amiga', NULL, 166),
(74, 'Atari 5200', NULL, 31),
(75, 'Atari 2600', NULL, 23),
(76, 'Atari 8-bit', NULL, 25),
(77, 'Game Gear', NULL, 77),
(78, 'Neo Geo', NULL, 12),
(79, 'Xbox', NULL, 80),
(80, 'Atari 7800', NULL, 28),
(81, 'Atari Lynx', NULL, 46),
(82, 'SEGA Master System', NULL, 74),
(83, 'Linux', NULL, 6),
(84, 'Atari XEGS', NULL, 50);

-- --------------------------------------------------------

--
-- Structure de la table `Publier`
--

CREATE TABLE `Publier` (
  `Id_Jeu` int(11) NOT NULL,
  `Id_Plateforme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Publier`
--

INSERT INTO `Publier` (`Id_Jeu`, `Id_Plateforme`) VALUES
(65, 47),
(65, 48),
(65, 49),
(65, 50),
(65, 51),
(65, 52),
(66, 48),
(66, 49),
(66, 53),
(67, 54),
(68, 48),
(68, 49),
(68, 50),
(69, 47),
(69, 51),
(69, 55),
(70, 53),
(70, 56),
(71, 48),
(71, 55),
(72, 48),
(72, 55),
(73, 47),
(73, 57),
(74, 47),
(74, 48),
(74, 51),
(75, 53),
(75, 56),
(76, 47),
(76, 57),
(77, 50),
(78, 47),
(78, 54),
(78, 57),
(79, 50),
(80, 47),
(80, 48),
(80, 49),
(80, 51),
(80, 53),
(80, 58),
(81, 47),
(81, 48),
(81, 49),
(81, 51),
(81, 52),
(81, 53),
(82, 50),
(83, 58),
(83, 59),
(84, 52),
(84, 58),
(85, 59),
(85, 60),
(86, 49),
(86, 60),
(86, 61),
(87, 53),
(87, 59),
(87, 60),
(87, 61),
(87, 62),
(87, 63),
(88, 49),
(88, 60),
(88, 61),
(89, 49),
(89, 60),
(89, 61),
(89, 64),
(90, 58),
(90, 65),
(91, 55),
(91, 66),
(92, 49),
(92, 60),
(92, 61),
(92, 64),
(93, 50),
(93, 51),
(93, 59),
(93, 64),
(94, 48),
(94, 53),
(94, 59),
(94, 61),
(94, 62),
(94, 63),
(94, 67),
(94, 68),
(95, 49),
(95, 60),
(95, 61),
(95, 64),
(96, 59),
(96, 60),
(96, 61),
(97, 49),
(97, 59),
(97, 60),
(97, 61),
(97, 64),
(97, 69),
(98, 60),
(98, 61),
(99, 49),
(99, 55),
(99, 60),
(99, 61),
(100, 49),
(100, 60),
(100, 61),
(100, 64),
(101, 49),
(101, 55),
(101, 60),
(101, 61),
(102, 51),
(102, 58),
(102, 59),
(102, 65),
(102, 70),
(103, 60),
(104, 55),
(105, 47),
(105, 48),
(105, 49),
(105, 51),
(105, 52),
(105, 53),
(105, 54),
(105, 57),
(105, 59),
(105, 60),
(105, 62),
(105, 63),
(105, 66),
(105, 69),
(105, 71),
(105, 72),
(105, 73),
(105, 74),
(105, 75),
(105, 76),
(105, 77),
(105, 78),
(106, 60),
(106, 62),
(107, 59),
(107, 60),
(107, 61),
(108, 51),
(108, 70),
(109, 59),
(109, 60),
(109, 61),
(109, 66),
(109, 71),
(110, 59),
(110, 60),
(110, 61),
(110, 66),
(110, 71),
(111, 50),
(111, 51),
(111, 59),
(111, 64),
(111, 79),
(112, 52),
(112, 54),
(112, 58),
(112, 59),
(112, 60),
(112, 62),
(112, 63),
(112, 65),
(112, 66),
(112, 71),
(112, 72),
(112, 73),
(112, 74),
(112, 75),
(112, 76),
(112, 77),
(112, 79),
(112, 80),
(112, 81),
(112, 82),
(113, 47),
(113, 48),
(113, 59),
(113, 60),
(113, 61),
(114, 50),
(115, 49),
(116, 50),
(116, 64),
(117, 48),
(117, 51),
(117, 80),
(118, 50),
(118, 59),
(118, 64),
(118, 68),
(119, 50),
(119, 55),
(119, 59),
(119, 64),
(119, 68),
(119, 79),
(120, 60),
(120, 62),
(121, 60),
(122, 51),
(123, 61),
(123, 67),
(123, 68),
(124, 60),
(125, 47),
(125, 48),
(125, 53),
(125, 59),
(125, 60),
(125, 61),
(125, 62),
(125, 63),
(125, 66),
(125, 67),
(125, 69),
(125, 71),
(125, 83),
(126, 48),
(126, 53),
(126, 59),
(126, 60),
(126, 61),
(126, 62),
(126, 63),
(126, 66),
(126, 69),
(126, 71),
(127, 53),
(127, 59),
(127, 60),
(127, 62),
(127, 63),
(127, 66),
(127, 69),
(127, 71),
(128, 47),
(128, 48),
(128, 49),
(128, 51),
(128, 52),
(128, 53),
(128, 54),
(128, 72),
(128, 73),
(128, 75),
(128, 76),
(128, 80),
(128, 84),
(129, 47),
(129, 48),
(129, 49),
(129, 51),
(129, 52),
(129, 53),
(129, 75),
(129, 76),
(129, 80),
(130, 47),
(130, 48),
(130, 49),
(130, 51),
(130, 57),
(130, 58),
(131, 48),
(131, 49),
(131, 50),
(132, 47),
(132, 48),
(132, 49),
(132, 51),
(132, 58),
(133, 47),
(133, 48),
(133, 51),
(133, 58),
(134, 47),
(134, 48),
(134, 49),
(134, 51),
(134, 52),
(135, 56),
(136, 48),
(136, 49),
(137, 47),
(137, 48),
(137, 51),
(138, 54),
(139, 79),
(140, 49),
(141, 55),
(142, 48),
(142, 49),
(142, 52),
(143, 59),
(143, 60),
(143, 69),
(144, 49),
(144, 59),
(144, 61),
(145, 59),
(145, 60),
(145, 61),
(146, 50),
(147, 55),
(147, 59),
(147, 64),
(147, 68),
(148, 47),
(148, 48),
(148, 49),
(148, 53),
(149, 51),
(149, 52),
(149, 73),
(149, 74),
(149, 75),
(149, 76),
(149, 80),
(149, 84),
(150, 56),
(151, 48),
(151, 49),
(151, 56),
(151, 57),
(152, 48),
(152, 49),
(153, 49),
(153, 50),
(154, 48),
(154, 49),
(154, 56),
(155, 50),
(156, 50),
(157, 51),
(158, 51),
(159, 47),
(159, 54),
(160, 48),
(160, 55),
(161, 55),
(162, 51),
(162, 56),
(163, 58),
(164, 49),
(164, 55),
(165, 47),
(165, 48),
(165, 51),
(165, 52),
(165, 54),
(165, 58),
(166, 49),
(167, 59),
(167, 60),
(167, 61),
(167, 69),
(168, 59),
(168, 60),
(169, 53),
(169, 59),
(169, 60),
(169, 61),
(169, 62),
(170, 59),
(170, 60),
(170, 62),
(171, 49),
(171, 55),
(171, 59),
(171, 60),
(171, 61),
(171, 62),
(171, 66),
(171, 69),
(172, 59),
(172, 60),
(172, 61),
(172, 62),
(172, 63),
(173, 59),
(173, 60),
(173, 61),
(173, 62),
(174, 50),
(174, 64),
(174, 79),
(175, 48),
(175, 59),
(175, 60),
(175, 61),
(175, 62),
(175, 63),
(176, 49),
(176, 55),
(176, 59),
(176, 60),
(176, 61),
(176, 62),
(177, 49),
(177, 59),
(177, 60),
(177, 61),
(177, 62),
(177, 66),
(177, 69),
(178, 59),
(178, 79),
(179, 68),
(180, 50),
(180, 64),
(180, 79),
(181, 49),
(181, 55),
(181, 59),
(181, 60),
(181, 61),
(181, 62),
(181, 63),
(181, 69),
(182, 59),
(182, 60),
(182, 61),
(182, 62),
(182, 63),
(183, 48),
(183, 59),
(183, 60),
(183, 61),
(183, 62),
(184, 59),
(184, 60),
(184, 61),
(184, 62),
(184, 69),
(185, 59),
(185, 60),
(185, 62),
(185, 66),
(185, 69),
(186, 49),
(186, 60),
(186, 61),
(186, 64),
(186, 79),
(187, 51),
(187, 52),
(187, 59),
(188, 55),
(188, 59),
(189, 49),
(189, 60),
(189, 61),
(190, 48),
(190, 56),
(191, 68),
(192, 60),
(193, 61),
(194, 52),
(195, 68),
(196, 60),
(197, 70),
(198, 49),
(198, 56),
(199, 68),
(200, 60),
(201, 58),
(202, 58),
(203, 61),
(203, 68),
(203, 70),
(204, 56),
(205, 58);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `Id_Utilisateur` int(11) NOT NULL,
  `Pseudonyme` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Motdepasse` varchar(255) DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Id_Utilisateur`, `Pseudonyme`, `Email`, `Motdepasse`, `role`) VALUES
(2, 'Utilisateur supprimé', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Ajouter`
--
ALTER TABLE `Ajouter`
  ADD PRIMARY KEY (`Id_Utilisateur`,`Id_Jeu`),
  ADD KEY `Id_Jeu` (`Id_Jeu`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`Id_Categorie`);

--
-- Index pour la table `Classer`
--
ALTER TABLE `Classer`
  ADD PRIMARY KEY (`Id_Jeu`,`Id_Categorie`),
  ADD KEY `Classer_ibfk_2` (`Id_Categorie`);

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`Id_Commentaire`),
  ADD KEY `Id_Jeu` (`Id_Jeu`),
  ADD KEY `Id_Utilisateur` (`Id_Utilisateur`);

--
-- Index pour la table `Jeu`
--
ALTER TABLE `Jeu`
  ADD PRIMARY KEY (`Id_Jeu`);

--
-- Index pour la table `Noter`
--
ALTER TABLE `Noter`
  ADD PRIMARY KEY (`Id_Utilisateur`,`Id_Jeu`),
  ADD KEY `Id_Jeu` (`Id_Jeu`);

--
-- Index pour la table `Plateforme`
--
ALTER TABLE `Plateforme`
  ADD PRIMARY KEY (`Id_Plateforme`);

--
-- Index pour la table `Publier`
--
ALTER TABLE `Publier`
  ADD PRIMARY KEY (`Id_Jeu`,`Id_Plateforme`),
  ADD KEY `Id_Plateforme` (`Id_Plateforme`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`Id_Utilisateur`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `Id_Categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `Id_Commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Jeu`
--
ALTER TABLE `Jeu`
  MODIFY `Id_Jeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT pour la table `Plateforme`
--
ALTER TABLE `Plateforme`
  MODIFY `Id_Plateforme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Id_Utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Ajouter`
--
ALTER TABLE `Ajouter`
  ADD CONSTRAINT `Ajouter_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `Utilisateur` (`Id_Utilisateur`),
  ADD CONSTRAINT `Ajouter_ibfk_2` FOREIGN KEY (`Id_Jeu`) REFERENCES `Jeu` (`Id_Jeu`);

--
-- Contraintes pour la table `Classer`
--
ALTER TABLE `Classer`
  ADD CONSTRAINT `Classer_ibfk_1` FOREIGN KEY (`Id_Jeu`) REFERENCES `Jeu` (`Id_Jeu`),
  ADD CONSTRAINT `Classer_ibfk_2` FOREIGN KEY (`Id_Categorie`) REFERENCES `Categorie` (`Id_Categorie`);

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `Commentaire_ibfk_1` FOREIGN KEY (`Id_Jeu`) REFERENCES `Jeu` (`Id_Jeu`),
  ADD CONSTRAINT `Commentaire_ibfk_2` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `Utilisateur` (`Id_Utilisateur`);

--
-- Contraintes pour la table `Noter`
--
ALTER TABLE `Noter`
  ADD CONSTRAINT `Noter_ibfk_1` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `Utilisateur` (`Id_Utilisateur`),
  ADD CONSTRAINT `Noter_ibfk_2` FOREIGN KEY (`Id_Jeu`) REFERENCES `Jeu` (`Id_Jeu`);

--
-- Contraintes pour la table `Publier`
--
ALTER TABLE `Publier`
  ADD CONSTRAINT `Publier_ibfk_1` FOREIGN KEY (`Id_Jeu`) REFERENCES `Jeu` (`Id_Jeu`),
  ADD CONSTRAINT `Publier_ibfk_2` FOREIGN KEY (`Id_Plateforme`) REFERENCES `Plateforme` (`Id_Plateforme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
