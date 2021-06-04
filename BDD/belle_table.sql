-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 juin 2021 à 07:55
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
-- Base de données : `belle_table`
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
(1, 'Dupont', 'Jean', 'jeandupont@gmail.com', 'Cherche emploie', 'Bonjour je suis a la recherche d\'un emploie pour une alternance pour la rentree 2021-2022', '2020-10-20 14:41:34', 'Nouveau'),
(2, 'Rodriguez', 'Michel', 'michelrodiguez@gmail.com', 'Remboursement', 'Bonjour je souhaiterais obtenir un remboursement ou un avoir car je ne suis pas satisfait de mes produits !', '2020-10-22 23:14:21', 'Repondu');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `nom`, `prenom`, `telephone`, `mdp`, `email`, `admin`, `noteqcm`) VALUES
(1, 'admin', 'admin', NULL, 'admin', 'admin@gmail.com', 1, NULL),
(5, 'utilisateur', 'utilisateur', 606060606, 'utilisateur', 'utilisateur@gmail.com', 0, NULL),
(3, 'Partouche', 'Nathan', 684171272, 'nathan', 'nathanpartouche@hotmail.fr', 1, 20),
(4, 'Nicolle', 'Dylan', 612345678, 'Dylan', 'dylan@gmail.com', 1, 16),
(2, 'Gil Amaro', 'Dylan', 651206977, 'dylan', 'natsu2paris@yopmail.com', 1, NULL),
(6, 'correcteur', 'correcteur', 651206977, 'Correcteur20', 'correcteur20@gmail.com', 1, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
  `description` text,
  `image` text,
  PRIMARY KEY (`idproduit`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idproduit`, `titre`, `old_prix`, `prix`, `description`, `image`) VALUES
(25, 'CuillÃ¨re x3', 25, 15, 'lot de 3 cuillÃ¨re en acier inoxydable', 'lot2.png'),
(23, 'Fourchette x3', 12, 10, 'lot de 3 fourchette en acier inoxydable', 'lot.png'),
(24, 'CuillÃ¨re', 90, 4, 'CuillÃ¨re en acier inoxydable (vendu par unitÃ©)', 'cuillere.png'),
(26, 'Table basse', NULL, 470, 'Table basse ronde marron', 'table.jpg'),
(22, 'Fourchette', 5, 4, 'Fourchette en acier inoxydable (vendu par unitÃ©)', 'fourchette.png'),
(27, 'Verre', 24, 15, 'Beau verre en verre ', '1845261.jpg'),
(28, 'Assiettes', NULL, 19, 'assiettes blanches', 'assiette.png');

--
-- Déclencheurs `produit`
--
DROP TRIGGER IF EXISTS `ancienPrix`;
DELIMITER $$
CREATE TRIGGER `ancienPrix` BEFORE UPDATE ON `produit` FOR EACH ROW begin
if new.prix > old.prix then
set new.old_prix = NULL;
ELSE
set new.old_prix = old.prix;
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
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `label` varchar(200) CHARACTER SET utf8 NOT NULL,
  `niveau` int(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `label`, `niveau`) VALUES
(14, 'Lequel des énoncés suivants est faux?', 0),
(13, 'Lequel des circuits suivants est utilisé comme « Périphériques de mémoire » sur les ordinateurs?', 0),
(12, 'Le temps pendant lequel une tâche est traitée par l’ordinateur est appelé _______?', 0),
(11, 'Toute donnée ou instruction entrée dans la mémoire d’un ordinateur est considérée comme _____?', 0),
(10, 'GUI signifie _______?', 0),
(8, 'ASCII signifie _______?', 0),
(9, 'Laquelle des mémoires suivantes est non volatile?', 0),
(7, 'Lequel des langages suivants est mieux adapté au programmation structuré?', 0),
(6, 'Le système binaire utilise la base ______?', 0),
(5, 'Un programme qui convertit le langage assembleur en langage machine est appelé _______?', 0),
(4, 'Le microprocesseur a été introduit dans quelle génération d’ordinateur?', 0),
(3, 'Quel protocole fournit un service de messagerie entre différents hôtes?', 0),
(2, 'Le cerveau de tout système informatique est _________?', 0),
(1, 'Lequel des langages informatiques suivants est utilisé pour l’intelligence artificielle?', 0),
(15, 'Pour indiquer à Excel que nous voulons entré une formule dans une cellule, nous devons commencer par un opérateur tel que _______?', 0),
(16, 'Une erreur est aussi appelée _________?', 1),
(17, 'Lequel des éléments suivants n’est pas un package d’application?', 1),
(18, 'Microsoft Word est un exemple de _________?', 1),
(19, 'La taille du mémoire des ordinateurs mainframe et de technologie avancée s’exprime en _________?', 1),
(20, 'La communication offerte par TCP est _________?', 1),
(21, 'Lequel des éléments suivants est le complément à 1 de 10?', 1),
(22, 'Quelle partie interprète les instructions du programme et lance les opérations de contrôle?', 1),
(23, 'Les pistes d’un disque accessibles sans repositionner les têtes R/W sont appelés ______?', 1),
(24, 'HTTP est un protocole situé dans la ________?', 1),
(25, 'Le temps pendant lequel une pièce d’équipement fonctionne est appelé ________?', 1),
(26, 'Dans un réseau, les ressources HTTP sont localisées par______?', 1),
(27, 'Le nom appliqué par Intel corp. à la technologie haute vitesse MOS est appelée______?', 1),
(28, 'Le client DNS s’appelle______?', 1),
(29, 'DHCP est utilisé dans______?', 1);

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
(79, 20, 'Semi-duplex', 0),
(78, 20, 'Half-duplex\r\n\r\n', 0),
(77, 20, 'Full-duplex', 1),
(76, 19, 'Mega Octets', 1),
(75, 19, 'Bits', 0),
(74, 19, 'Kilo Octets', 0),
(73, 19, 'Octets', 0),
(72, 18, 'Périphérique d’entrée', 0),
(71, 18, 'Logiciel applicatif', 1),
(70, 18, 'Dispositif de traitement', 0),
(69, 18, 'Système d’exploitation', 0),
(68, 17, 'Red Hat Linux', 1),
(67, 17, 'Microsoft Office', 0),
(66, 17, 'Adobe Pagemaker', 0),
(65, 17, 'Open Office', 0),
(64, 16, 'Icon', 0),
(63, 16, 'Curseur', 0),
(62, 16, 'Debug', 0),
(61, 16, 'Bug', 1),
(60, 15, '+', 0),
(59, 15, '=', 1),
(58, 15, '#', 0),
(57, 15, '$', 0),
(56, 14, 'Windows XP est un système d’exploitation', 0),
(55, 14, 'Linux est vendu par Microsoft', 1),
(54, 14, 'Linux est un logiciel libre et open source', 0),
(53, 14, 'Photoshop est un outil de conception graphique par Adobe', 0),
(52, 13, 'Aucune de ces réponses n’est vraie.', 0),
(51, 13, 'Attenuator', 0),
(50, 13, 'Comparator', 0),
(49, 13, 'Flip Flop', 1),
(48, 12, 'Temps d’attente', 0),
(47, 12, 'Temps réel', 0),
(46, 12, 'Temporisation', 0),
(45, 12, 'Temps d’exécution', 1),
(44, 11, 'Information', 0),
(43, 11, 'Entrée', 1),
(42, 11, 'Sortie', 0),
(41, 11, 'Stockage', 0),
(40, 10, 'Graphical Unique Interface', 0),
(39, 10, 'Graphical User Interface', 1),
(38, 10, 'Graphical Universal Interface', 0),
(37, 10, 'Graph Use Interface', 0),
(36, 9, 'Tout les réponses sont vraies', 0),
(35, 9, 'ROM', 1),
(34, 9, 'DRAM\r\n\r\n', 0),
(33, 9, 'SRAM', 0),
(32, 8, 'American Scientific code for information interchange', 0),
(31, 8, 'American security code for information interchange', 0),
(30, 8, 'All purpose scientific code for information interchange', 0),
(29, 8, 'American standard code for information interchange', 1),
(28, 7, 'PROLOG', 0),
(27, 7, 'PASCAL', 1),
(26, 7, 'FORTRAN', 0),
(25, 7, 'PL/SQL', 0),
(24, 6, '16', 0),
(23, 6, '8', 0),
(22, 6, '10', 0),
(21, 6, '2', 1),
(20, 5, 'Comparateur', 0),
(19, 5, 'Compilateur', 0),
(18, 5, 'Interprèteur', 0),
(17, 5, 'Assembleur', 1),
(16, 4, 'Troisième génération', 0),
(15, 4, 'les deux A et B sont vrais', 0),
(14, 4, 'Quatrième génération', 1),
(13, 4, 'Deuxième génération', 0),
(12, 3, 'SNMP', 0),
(11, 3, 'SMTP', 1),
(10, 3, 'TELNET', 0),
(9, 3, 'FTP', 0),
(8, 2, 'Unité arithmétique et logique – UAL', 0),
(7, 2, 'Unité de contrôle', 0),
(6, 2, 'Mémoire', 0),
(5, 2, 'CPU', 1),
(4, 1, 'FORTRAN', 0),
(3, 1, 'PROLOG', 1),
(2, 1, 'COBOL', 0),
(1, 1, 'C', 0),
(80, 20, 'Octet par octet', 0),
(81, 21, '01', 1),
(82, 21, '110', 0),
(83, 21, '11', 0),
(84, 21, '10', 0),
(85, 22, 'Unité de stockage', 0),
(86, 22, 'Unité logique', 0),
(87, 22, 'Unité de contrôle', 1),
(88, 22, 'Aucune de ces réponses n’est vraie.', 0),
(89, 23, 'Surface', 0),
(90, 23, 'Cylindre', 1),
(91, 23, 'Cluster', 0),
(92, 23, 'Tout les réponses sont vraies.', 0),
(93, 24, 'Couche d’application', 1),
(94, 24, 'Couche de transport', 0),
(95, 24, 'Couche réseau', 0),
(96, 24, 'Aucune de ces réponses n’est vraie.', 0),
(97, 25, 'Temps de recherche', 0),
(98, 25, 'Temps effectif', 1),
(99, 25, 'Temps d’accès', 0),
(100, 25, 'Temps réel', 0),
(101, 26, 'Identificateur de Ressource Uniforme (URI)', 1),
(102, 26, 'Localisateur de Ressources Unique (LRU)', 0),
(103, 26, 'Identifiant Unique de Ressource (IUR)', 0),
(104, 26, 'Aucune de ces réponses n’est vraie.', 0),
(105, 27, 'HDLC', 0),
(106, 27, 'LAP', 0),
(107, 27, 'HMOS', 1),
(108, 27, 'SDLC', 0),
(109, 28, 'DNS updater', 0),
(110, 28, 'DNS resolver', 1),
(111, 28, 'DNS handler', 0),
(112, 28, 'Aucune de ces réponses n’est vraie.', 0),
(113, 29, 'IPv6', 0),
(114, 29, 'IPv4', 0),
(115, 29, 'IPv6 et IPv4', 1),
(116, 29, 'Aucune de ces réponses n’est vraie.', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse_contact`
--

INSERT INTO `reponse_contact` (`id_rep`, `fk_contact`, `nom`, `prenom`, `message`, `date_rep`) VALUES
(1, 1, 'Partouche', 'Nathan', 'bonjour, nous somme dÃ©soler mais nous ne recrutons pas d\'alternant.\r\n\r\nCordialement', '2020-10-22 23:06:38'),
(2, 2, 'Partouche', 'Nathan', 'Bonjour, aucun remboursement n\'est disponible sur notre site.\r\n\r\nCordialement,\r\nNathan PARTOUCHE', '2021-02-09 17:13:52');

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `idqcm` int(50) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `note` int(50) NOT NULL,
  `niveau` int(50) NOT NULL,
  PRIMARY KEY (`idqcm`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`idqcm`, `login`, `date`, `note`, `niveau`) VALUES
(134, '3', '2021-05-02 09:32:29', 20, 2);

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
