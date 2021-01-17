-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 jan. 2021 à 11:33
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
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `sujet` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `etat` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `sujet`, `message`, `date_creation`, `etat`) VALUES
(1, 'Dupont', 'Jean', 'jeandupont@gmail.com', 'Cherche emploie', 'Bonjour je suis a la recherche d\'un emploie pour une alternance pour la rentree 2021-2022', '2020-10-20 14:41:34', 'Repondu'),
(2, 'Rodriguez', 'Michel', 'michelrodiguez@gmail.com', 'Remboursement', 'Bonjour je souhaiterais obtenir un remboursement ou un avoir car je ne suis pas satisfait de mes produits !', '2020-10-22 23:14:21', 'Nouveau');

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

DROP TABLE IF EXISTS `emploi`;
CREATE TABLE IF NOT EXISTS `emploi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `note` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`id`, `libelle`, `description`, `note`) VALUES
(1, 'Boulanger', 'Faire du pain', 5),
(2, 'Menuisier', 'Tailler du bois', 4),
(3, 'Fermier', 'Elever le bÃ©tail', 10),
(4, 'Coursier', 'Coursir', 15);

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
  `noteqcm` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `nom`, `prenom`, `telephone`, `mdp`, `email`, `admin`, `noteqcm`) VALUES
(1, 'admin', 'admin', NULL, 'admin', 'admin@gmail.com', 1, NULL),
(5, 'test', 'test', 606060606, 'test', 'test@gmail.com', 0, 10),
(3, 'Partouche', 'Nathan', 684171272, 'nathan', 'nathanpartouche@hotmail.fr', 1, 20),
(4, 'Nicolle', 'Dylan', 612345678, 'Dylan', 'dylan@gmail.com', 1, 16),
(2, 'Gil Amaro', 'Dylan', 651206977, 'dylan', 'natsu2paris@yopmail.com', 1, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `fk_utilisateur`, `message`) VALUES
(1, 3, 'salut j\'ai rajouter des nouveau truc dans la to do list'),
(2, 1, 'sa marche je vais voir ;)');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `idproduit` int(50) NOT NULL,
  `iduser` text NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `idproduit`, `iduser`, `quantite`) VALUES
(1, 26, '4', 7),
(10, 25, '3', 4),
(11, 23, '3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idproduit` int(50) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `old_prix` int(11) DEFAULT NULL,
  `prix` float NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  UNIQUE KEY `idannonce` (`idproduit`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idproduit`, `titre`, `old_prix`, `prix`, `description`, `image`) VALUES
(25, 'CuillÃ¨re x3', 25, 15, 'lot de 3 cuillÃ¨re en acier inoxydable', 'lot2.png'),
(23, 'Fourchette x3', 12, 10, 'lot de 3 fourchette en acier inoxydable', 'lot.png'),
(24, 'CuillÃ¨re', 7, 4, 'CuillÃ¨re en acier inoxydable (vendu par unitÃ©)', 'cuillere.png'),
(26, 'Table basse', NULL, 470, 'Table basse ronde marron', 'table.jpg'),
(22, 'Fourchette', 5, 4, 'Fourchette en acier inoxydable (vendu par unitÃ©)', 'fourchette.png');

--
-- Déclencheurs `produit`
--
DROP TRIGGER IF EXISTS `ancienPrix`;
DELIMITER $$
CREATE TRIGGER `ancienPrix` BEFORE UPDATE ON `produit` FOR EACH ROW begin
set new.old_prix = old.prix;
if old.old_prix = old.prix or 
old.old_prix < old.prix then
set new.old_prix = NULL;
end if;
end
$$
DELIMITER ;

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
('Pourquoi un agriculteur ne peut se marier avec une fille prenommee claire ?', 30, 0);

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
-- Structure de la table `reponse_contact`
--

DROP TABLE IF EXISTS `reponse_contact`;
CREATE TABLE IF NOT EXISTS `reponse_contact` (
  `id_rep` int(11) NOT NULL AUTO_INCREMENT,
  `fk_contact` int(11) DEFAULT NULL,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `date_rep` datetime NOT NULL,
  PRIMARY KEY (`id_rep`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse_contact`
--

INSERT INTO `reponse_contact` (`id_rep`, `fk_contact`, `nom`, `prenom`, `message`, `date_rep`) VALUES
(1, 1, 'Partouche', 'Nathan', 'bonjour, nous somme dÃ©soler mais nous ne recrutons pas d\'alternant.\r\n\r\nCordialement', '2020-10-22 23:06:38');

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
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

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
(3, 3, 'rajouter la nouvelle table basse ', 2),
(1, 3, 'rajouter le nouveaux lot de fourchette en bois', 0),
(2, 3, 'repondre au ticket', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
