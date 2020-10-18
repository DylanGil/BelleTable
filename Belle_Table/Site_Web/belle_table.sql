-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 18 oct. 2020 à 02:44
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `belle_table`
--

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `admin` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `nom`, `prenom`, `telephone`, `mdp`, `email`, `admin`) VALUES
(1, 'admin', 'admin', 651206977, 'admin', 'natsu2paris@yopmail.com', 1),
(5, 'test', 'test', 651206977, 'test', 'qwerty@gmail.com', 0),
(7, 'Partouche', 'Nathan', 606060606, 'nathan', 'nathanpartouche@hotmail.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `fk_utilisateur` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `fk_utilisateur`, `message`) VALUES
(69, 5, 'oh cool  sa marche'),
(65, 7, 'salut !'),
(70, 1, 'oh cool  sa marche');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `label` varchar(200) CHARACTER SET utf8 NOT NULL,
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `niveau` int(50) NOT NULL,
  PRIMARY KEY (`label`),
  UNIQUE KEY `idq` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`label`, `id`, `niveau`) VALUES
('Pourquoi on ne peut pas ramener de ballon dans le studio de \"Question pour un Champion \" ?', 1, 1),
('Qu\'est ce qui est jaune et qui attend ?', 2, 0),
('Qu\'est-ce qui est vert, qui monte et qui descend ?', 3, 1),
('Quel est le meilleur prénom d’Europe ?', 4, 0),
('Quel est le pire prénom d’Europe ?', 5, 1),
('Quel est la meilleure spécialité ?', 6, 0),
('Qu’est-ce qu’un chameau à trois bosses ?', 7, 1),
('Comment appelle-t-on un chat dans l’espace ?', 8, 0),
('Pourquoi le lapin est bleu ?', 9, 1),
('Quel est la date de la fête des fumeurs ?', 10, 0),
('Que dit Pinocchio quand il pète devant tout le monde ?', 11, 1),
('Que font les dinosaures quand ils n’arrivent pas à se mettre d’accord ?', 12, 0),
('Quelle est la ville la plus proche de l’eau ?', 13, 1),
('Quel est le comble du comble ?', 14, 0),
('Combien font 10 + 8', 15, 1),
('Combien font 10 * 4', 16, 0),
('Quel est la bonne réponse ?', 17, 1),
('Quel est la capital de l\'Europe ?', 18, 0),
('Qui est le president de France de 2020 ?', 19, 1),
('Quel note dois avoir Dylan GIL AMARO ?', 20, 0),
('Quel est la meilleure marque ?', 21, 1),
('Qui est le meilleur super-heros ?', 22, 0),
('Vrai ou faux ?', 23, 1),
('Oui ou Non ?', 24, 0),
('Pourquoi ?', 25, 1),
('Pourquoi les chrétiens sont-ils sourds ?', 26, 0),
('Comment on appel un oiseau qui se gratte que d’un coté ?', 27, 1),
('Qu’est-ce qu’une luciole qui a pris du viagra ?', 28, 0),
('Qui a une couronne et vit dans un palais ?', 29, 1),
('Pourquoi un agriculteur ne peut se marier avec une fille prenommee claire ?', 30, 0),
('sdsdd', 38, 1),
('azeaze', 39, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `idr` int(50) NOT NULL AUTO_INCREMENT,
  `idq` int(50) NOT NULL,
  `reponse` varchar(200) NOT NULL,
  `verif` int(50) NOT NULL,
  PRIMARY KEY (`idr`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idr`, `idq`, `reponse`, `verif`) VALUES
(1, 1, 'Parce que c\'est interdit', 0),
(2, 1, 'Parce que Julien Lepers', 1),
(3, 1, 'Parce que c\'est dangereux', 0),
(4, 1, 'La réponse D', 0),
(5, 2, 'Une banane', 0),
(6, 2, 'Jonathan', 1),
(7, 2, 'Un citron pressé ', 0),
(8, 2, 'La réponse D ', 0),
(9, 3, 'Un petit pois dans un ascenseur', 1),
(10, 3, 'Jonathan', 0),
(11, 3, 'Un Homme malade dans un ascenseur ', 0),
(12, 3, 'La réponse D', 0),
(13, 4, 'Esteban', 0),
(14, 4, 'Jean Eudes', 0),
(15, 4, 'Dylan', 1),
(16, 4, 'La réponse D', 0),
(17, 5, 'Esteban', 0),
(18, 5, 'Jean Eudes', 1),
(19, 5, 'Dylan', 0),
(20, 5, 'La réponse D', 0),
(21, 6, 'SLAM', 1),
(22, 6, 'SISR', 0),
(23, 6, 'STMG', 0),
(24, 6, 'L', 0),
(25, 7, 'Un chameau qui s’est cogné', 1),
(26, 7, 'Sa n\'existe pas', 0),
(27, 7, 'Un dromadaire ', 0),
(29, 8, 'On l\'appelle pas on va le chercher', 0),
(30, 8, 'Un chatellite', 1),
(31, 8, 'Je sais pas frere', 0),
(33, 9, 'Parce qu’on l’a peint', 1),
(34, 9, 'Parce que je suis daltonien', 0),
(35, 9, 'Parce que c\'est un schtroumpf', 0),
(37, 10, 'Le 14 février', 0),
(38, 10, 'Le 1 Juin', 1),
(39, 10, 'Le 2 Juin', 0),
(28, 7, 'La reponse D', 0),
(32, 8, 'La reponse D', 0),
(36, 9, 'La reponse D', 0),
(40, 10, 'La reponse D', 0),
(41, 11, 'Desole, Gepetto', 1),
(42, 11, 'Pardon', 0),
(43, 11, 'C\'est pas moi !', 0),
(44, 11, 'La reponse D', 0),
(45, 12, 'Un tirajosor', 1),
(46, 12, 'Un pierre papier ciseaux', 0),
(47, 12, 'Il mange', 0),
(48, 12, 'La reponse D', 0),
(49, 13, 'Bordeaux', 1),
(50, 13, 'La France', 0),
(51, 13, 'Paris', 0),
(52, 13, 'La reponse D', 0),
(53, 14, 'c koi 1 comble ?', 0),
(54, 14, 'Le comble du comble c’est qu’un muet dise à un sourd qu’un aveugle les espionne', 1),
(55, 14, 'oui', 0),
(56, 14, 'La reponse D', 0),
(57, 15, '10 + 8', 0),
(58, 15, '08', 0),
(59, 15, '18', 1),
(60, 15, 'La reponse D', 0),
(61, 16, '10 * 4', 0),
(62, 16, '0.4', 0),
(63, 16, '40', 1),
(64, 16, 'La reponse D', 0),
(65, 17, 'La reponse A', 0),
(66, 17, 'La reponse B', 0),
(67, 17, 'La reponse C', 0),
(68, 17, 'La reponse D', 1),
(69, 18, 'Bruxelles', 1),
(70, 18, 'Sa existe pas', 0),
(71, 18, 'Paris', 0),
(72, 18, 'La reponse D', 0),
(73, 19, 'Sarkozy', 0),
(74, 19, 'Macron', 1),
(75, 19, 'Hollande', 0),
(76, 19, 'La reponse D', 0),
(77, 20, '20', 1),
(78, 20, '0', 0),
(79, 20, '10 (je merite plus)', 0),
(80, 20, 'La reponse D', 0),
(81, 21, 'Samsung', 1),
(82, 21, 'Apple', 0),
(83, 21, 'Nokia', 0),
(84, 21, 'La reponse D', 0),
(85, 22, 'Green Lantern', 1),
(86, 22, 'Iron Man', 0),
(87, 22, 'Captain America', 0),
(88, 22, 'La reponse D', 0),
(89, 23, 'Vrai', 1),
(90, 23, 'Faux', 0),
(91, 23, 'Je sais pas', 0),
(92, 23, 'La reponse D', 0),
(93, 24, 'Oui', 1),
(94, 24, 'Non', 0),
(95, 24, 'Oui ou Non', 0),
(96, 24, 'La reponse D', 0),
(97, 25, 'Hein ?', 0),
(98, 25, 'Deux ?', 0),
(99, 25, 'Parceque', 1),
(100, 25, 'La reponse D', 0),
(101, 26, 'Parceque Jesus Crie', 1),
(102, 26, 'Et pourquoi pas ?', 0),
(103, 26, 'Parceque', 0),
(104, 26, 'La reponse D', 0),
(105, 27, 'On l\'appel pas on va le chercher', 0),
(106, 27, 'Un oiseau mi-gratteur', 1),
(107, 27, 'Un oiseau qui se gratte que d\'un cote', 0),
(108, 27, 'La reponse D', 0),
(109, 28, 'Une ampoule', 0),
(110, 28, 'Un néon', 1),
(111, 28, 'Sa existe ??', 0),
(112, 28, 'La reponse D', 0),
(113, 29, 'Un roi', 0),
(114, 29, 'Une reine', 0),
(115, 29, 'Une dent', 1),
(116, 29, 'La reponse D', 0),
(117, 30, 'Bah si il peut', 0),
(118, 30, 'Parce que la ferme tuerait Claire', 1),
(119, 30, 'Mdrrr pas mal la blague', 0),
(120, 30, 'La reponse D', 0),
(121, 39, 'sdcsdc', 1),
(122, 39, 'qd', 0),
(123, 39, 'sdvdvvdsdcdsvcvcv', 0),
(124, 39, 'sdvs', 0),
(125, 39, 'Sidney', 1),
(126, 39, 'Paris', 0),
(127, 39, 'Londre', 0),
(128, 39, 'Deauville', 0),
(129, 39, 'Sidney', 1),
(130, 39, 'Paris', 0),
(131, 39, 'Londre', 0),
(132, 39, 'Deauville', 0);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `idqcm` int(50) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `note` int(50) NOT NULL,
  `niveau` int(50) NOT NULL,
  PRIMARY KEY (`idqcm`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`idqcm`, `login`, `date`, `note`, `niveau`) VALUES
(1, 'prof', '2020-01-31 12:21:57', 2, 1),
(2, 'prof', '2020-02-05 22:38:29', 2, 1),
(3, 'prof', '2020-02-11 22:24:54', 10, 0),
(4, 'prof', '2020-03-13 12:08:06', 6, 1),
(5, '', '2020-03-13 12:15:59', 5, 1),
(6, 'natsu2paris@yopmail.com', '2020-03-13 12:16:15', 5, 1),
(7, 'natsu2paris@yopmail.com', '2020-03-13 12:18:36', 5, 0),
(8, 'prof', '2020-09-14 22:20:30', 1, 1),
(9, 'prof', '2020-09-14 22:21:40', 0, 1),
(10, 'prof', '2020-10-01 23:14:27', 0, 0),
(11, 'prof', '2020-10-01 23:15:19', 0, 0),
(12, 'prof', '2020-10-01 23:15:24', 0, 0),
(13, 'prof', '2020-10-01 23:15:24', 0, 0),
(14, 'prof', '2020-10-01 23:15:25', 0, 0),
(15, 'prof', '2020-10-01 23:15:35', 0, 0),
(16, 'prof', '2020-10-01 23:15:46', 0, 0),
(17, 'prof', '2020-10-01 23:15:49', 0, 0),
(18, 'prof', '2020-10-01 23:15:55', 0, 0),
(19, 'prof', '2020-10-01 23:16:43', 0, 0),
(20, 'prof', '2020-10-01 23:16:43', 0, 0),
(21, 'prof', '2020-10-01 23:16:43', 0, 0),
(22, 'prof', '2020-10-01 23:16:43', 0, 0),
(23, 'prof', '2020-10-01 23:16:52', 0, 0),
(24, 'prof', '2020-10-01 23:17:04', 0, 0),
(25, 'prof', '2020-10-01 23:17:13', 0, 0),
(26, 'prof', '2020-10-01 23:17:19', 0, 0),
(27, 'prof', '2020-10-01 23:17:38', 0, 0),
(28, 'prof', '2020-10-01 23:17:46', 0, 0),
(29, 'prof', '2020-10-01 23:17:53', 0, 0),
(30, 'prof', '2020-10-01 23:20:16', 0, 1),
(31, 'prof', '2020-10-01 23:20:33', 0, 1),
(32, 'prof', '2020-10-01 23:20:37', 0, 1),
(33, 'prof', '2020-10-01 23:20:39', 0, 1),
(34, 'prof', '2020-10-01 23:20:59', 0, 1),
(35, 'prof', '2020-10-01 23:24:02', 0, 1),
(36, 'prof', '2020-10-01 23:24:18', 0, 1),
(37, 'prof', '2020-10-01 23:24:22', 0, 1),
(38, 'prof', '2020-10-01 23:24:33', 0, 1),
(39, 'prof', '2020-10-01 23:24:54', 0, 1),
(40, 'prof', '2020-10-01 23:25:01', 0, 1),
(41, 'prof', '2020-10-01 23:26:11', 0, 1),
(42, 'prof', '2020-10-01 23:26:52', 0, 1),
(43, 'prof', '2020-10-01 23:27:02', 0, 1),
(44, 'prof', '2020-10-01 23:27:07', 0, 1),
(45, 'prof', '2020-10-01 23:27:43', 0, 1),
(46, 'prof', '2020-10-01 23:27:47', 0, 1),
(47, 'prof', '2020-10-01 23:27:57', 0, 1),
(48, 'prof', '2020-10-01 23:28:31', 5, 1),
(49, 'prof', '2020-10-01 23:29:01', 5, 1),
(50, 'prof', '2020-10-01 23:29:09', 5, 1),
(51, 'prof', '2020-10-01 23:29:16', 5, 1),
(52, 'prof', '2020-10-01 23:31:49', 5, 1),
(53, 'prof', '2020-10-01 23:31:54', 5, 1),
(54, 'prof', '2020-10-01 23:32:14', 5, 1),
(55, 'prof', '2020-10-01 23:32:20', 5, 1),
(56, 'prof', '2020-10-01 23:32:32', 5, 1),
(57, 'prof', '2020-10-01 23:32:40', 5, 1),
(58, 'prof', '2020-10-01 23:32:46', 5, 1),
(59, 'prof', '2020-10-01 23:32:49', 5, 1),
(60, 'prof', '2020-10-01 23:32:54', 5, 1),
(61, 'prof', '2020-10-01 23:34:50', 5, 1),
(62, 'prof', '2020-10-01 23:34:57', 5, 1),
(63, 'prof', '2020-10-01 23:35:19', 5, 1),
(64, 'prof', '2020-10-01 23:36:20', 5, 1),
(65, 'prof', '2020-10-01 23:36:29', 5, 1),
(66, 'prof', '2020-10-01 23:36:46', 5, 1),
(67, 'prof', '2020-10-01 23:37:00', 5, 1),
(68, 'prof', '2020-10-01 23:39:08', 5, 1),
(69, 'prof', '2020-10-01 23:39:30', 5, 1),
(70, 'prof', '2020-10-01 23:39:36', 5, 1),
(71, 'prof', '2020-10-01 23:39:48', 5, 1),
(72, 'prof', '2020-10-01 23:40:02', 5, 1),
(73, 'prof', '2020-10-01 23:40:09', 5, 1),
(74, 'prof', '2020-10-01 23:40:18', 5, 1),
(75, 'prof', '2020-10-01 23:40:32', 5, 1),
(76, 'prof', '2020-10-01 23:40:39', 5, 1),
(77, 'prof', '2020-10-01 23:41:53', 5, 1),
(78, 'prof', '2020-10-01 23:42:34', 5, 1),
(79, 'prof', '2020-10-01 23:43:04', 5, 1),
(80, 'prof', '2020-10-01 23:43:12', 5, 1),
(81, 'prof', '2020-10-01 23:43:42', 5, 1),
(82, 'prof', '2020-10-01 23:44:02', 5, 1),
(83, 'prof', '2020-10-01 23:45:31', 5, 1),
(84, 'prof', '2020-10-01 23:45:39', 5, 1),
(85, 'prof', '2020-10-01 23:45:47', 5, 1),
(86, 'prof', '2020-10-01 23:45:52', 5, 1),
(87, 'prof', '2020-10-01 23:46:00', 5, 1),
(88, 'prof', '2020-10-01 23:46:19', 5, 1),
(89, 'prof', '2020-10-01 23:46:24', 5, 1),
(90, 'prof', '2020-10-01 23:46:33', 5, 1),
(91, 'prof', '2020-10-01 23:46:40', 5, 1),
(92, 'prof', '2020-10-01 23:48:41', 5, 1),
(93, 'prof', '2020-10-01 23:48:54', 5, 1),
(94, 'prof', '2020-10-01 23:49:12', 5, 1),
(95, 'prof', '2020-10-01 23:49:22', 5, 1),
(96, 'prof', '2020-10-01 23:54:42', 5, 1),
(97, 'prof', '2020-10-01 23:55:01', 5, 1),
(98, 'prof', '2020-10-01 23:55:07', 5, 1),
(99, 'prof', '2020-10-01 23:55:18', 5, 1),
(100, 'prof', '2020-10-01 23:55:36', 5, 1),
(101, 'a@a.a', '2020-10-12 00:21:32', 0, 1),
(102, 'a@a.a', '2020-10-12 00:22:31', 3, 1),
(103, 'a@a.a', '2020-10-12 00:22:47', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `to_do_list`
--

DROP TABLE IF EXISTS `to_do_list`;
CREATE TABLE IF NOT EXISTS `to_do_list` (
  `id_tdl` int(11) NOT NULL AUTO_INCREMENT,
  `fk_utilisateur` int(11) NOT NULL,
  `tache` varchar(255) NOT NULL,
  `realiser` int(1) NOT NULL,
  PRIMARY KEY (`id_tdl`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `to_do_list`
--

INSERT INTO `to_do_list` (`id_tdl`, `fk_utilisateur`, `tache`, `realiser`) VALUES
(1, 7, 'rajouter le lot des 5 fourchette blanche', 0),
(2, 7, 'rajouter les nouvelle tables en bois', 2),
(3, 7, 'faire l\'inventaire des stocks', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
