-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client:  db550163213.db.1and1.com
-- Généré le: Jeu 30 Octobre 2014 à 11:22
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db550163213`
--
CREATE DATABASE IF NOT EXISTS `db550163213` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db550163213`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(520) NOT NULL,
  `image_location` varchar(125) NOT NULL,
  `email` varchar(70) NOT NULL,
  `generated_string` varchar(35) NOT NULL,
  `level` int(3) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`username`, `password`, `image_location`, `email`, `generated_string`, `level`) VALUES
( 'pain', '$2y$12$0113742836537bb8288d5u4D/slDQumpN76GdMWRvWb1dlKNLESQG', '', 'subtonix@voila.fr', '1234', 1),
( 'arvopart', 'agnusdei', '', 'p.arvo@yahoo.fr', '2325', 2);


-- --------------------------------------------------------


--
-- Structure de la table `order_hist`
--

CREATE TABLE IF NOT EXISTS `order_hist` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` int(10) NOT NULL,
  `price_subtotal` int(10) NOT NULL,
  `final_price` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `billing_address` varchar(200) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `order_hist`
--

INSERT INTO `order_hist` (`id_order`, `id_user`, `id_product`, `quantity`, `price`, `price_subtotal`, `final_price`, `order_date`, `billing_address`, `state`) VALUES
(1, 4, '3', 0, 632, 2654, 128, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(2, 4, '5', 0, 530, 636, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(3, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(4, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(5, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(6, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(7, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(8, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(9, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(10, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(11, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(12, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(13, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(14, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(15, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(16, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(17, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(18, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(19, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(20, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(21, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(22, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(23, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(24, 4, '3', 23, 632, 2528, 129, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(25, 4, '4', 5, 220, 220, 47, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(26, 4, '5', 5, 530, 530, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(27, 4, 'Array', 0, 0, 0, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(28, 4, 'Array', 0, 0, 0, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(29, 4, 'Array', 0, 0, 0, 109, '2014-10-09 22:00:00', '45 rue dunois 75013 Paris', 1),
(30, 66, '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 0),
(31, 67, '', 0, 0, 0, 0, '0000-00-00 00:00:00', '', 0),
(32, 67, '', 0, 0, 0, 0, '2014-10-15 15:06:10', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
  `id_order` int(100) NOT NULL AUTO_INCREMENT,
  `id_users` int(100) NOT NULL,
  `id_product1` varchar(100) NOT NULL,
  `amount1` int(50) NOT NULL,
  `price1` int(20) NOT NULL,
  `subtotalprice1` int(8) DEFAULT NULL,
  `id_product2` varchar(100) NOT NULL,
  `amount2` int(50) NOT NULL,
  `price2` int(50) NOT NULL,
  `subtotalprice2` int(8) DEFAULT NULL,
  `id_product3` varchar(100) NOT NULL,
  `amount3` int(50) NOT NULL,
  `price3` int(50) NOT NULL,
  `subtotalprice3` int(8) DEFAULT NULL,
  `id_product4` varchar(100) NOT NULL,
  `amount4` int(50) NOT NULL,
  `price4` int(50) NOT NULL,
  `subtotalprice4` int(8) DEFAULT NULL,
  `id_product5` varchar(100) NOT NULL,
  `amount5` int(50) NOT NULL,
  `price5` int(50) NOT NULL,
  `subtotalprice5` int(8) DEFAULT NULL,
  `id_product6` varchar(100) NOT NULL,
  `amount6` int(50) NOT NULL,
  `price6` int(50) NOT NULL,
  `subtotalprice6` int(8) DEFAULT NULL,
  `id_product7` varchar(100) NOT NULL,
  `amount7` int(50) NOT NULL,
  `price7` int(50) NOT NULL,
  `subtotalprice7` int(8) DEFAULT NULL,
  `total_price` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `billing_address` text NOT NULL,
  `state` int(3) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

--
-- Contenu de la table `order_history`
--

INSERT INTO `order_history` (`id_order`, `id_users`, `id_product1`, `amount1`, `price1`, `subtotalprice1`, `id_product2`, `amount2`, `price2`, `subtotalprice2`, `id_product3`, `amount3`, `price3`, `subtotalprice3`, `id_product4`, `amount4`, `price4`, `subtotalprice4`, `id_product5`, `amount5`, `price5`, `subtotalprice5`, `id_product6`, `amount6`, `price6`, `subtotalprice6`, `id_product7`, `amount7`, `price7`, `subtotalprice7`, `total_price`, `order_date`, `billing_address`, `state`) VALUES
(78, 4, '5', 1, 530, 530, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 530, '2014-03-09 23:00:00', '', 4),
(149, 4, '14', 10, 50, 500, '', 1, 896, 896, '', 1, 500, 500, '', 1, 500, 500, '', 1, 500, 500, '', 0, 0, NULL, '', 0, 0, NULL, 2896, '2014-07-11 00:49:58', '45 rue dunois 75013 Paris', 3),
(152, 4, '1', 1, 20, 20, '2', 1, 20, 20, '3', 2, 632, 1264, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 1304, '2014-09-11 10:14:36', '45 rue dunois 75013 Paris', 4),
(153, 4, '1', 1, 20, 20, '2', 1, 20, 20, '3', 1, 632, 632, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 672, '2014-09-11 14:31:08', '45 rue dunois 75013 Paris', 2),
(154, 4, '21', 1, 590, 590, '22', 1, 500, 500, '23', 1, 600, 600, '24', 5, 25, 125, '26', 1, 500, 500, '32', 10, 630, 6300, '', 0, 0, NULL, 8615, '2014-10-11 14:35:18', '45 rue dunois 75013 Paris', 2),
(155, 5, '1', 1, 20, 20, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 20, '2014-10-13 09:11:44', '', 3),
(156, 4, '1', 1, 20, 20, '31', 1, 200, 200, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 220, '2014-10-24 23:17:45', '45 rue dunois 75013 Paris', 1),
(157, 4, '1', 1, 20, 20, '31', 1, 200, 200, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 220, '2014-10-27 13:15:36', '45 rue dunois 75013 Paris', 1),
(158, 4, '31', 7, 200, 1400, '80', 1, 200, 200, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 1600, '2014-10-27 19:31:05', '45 rue dunois 75013 Paris', 1),
(159, 7, '2', 3, 20, 60, '20', 2, 150, 300, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, 360, '2014-10-27 20:45:55', '', 1),
(160, 7, '1', 3, 20, 60, '2', 2, 20, 40, '9', 1, 50, 50, '20', 1, 150, 150, '21', 1, 590, 590, '57', 1, 50, 50, '80', 1, 200, 200, 1140, '2014-10-29 22:38:15', '43 23 rue de konoha', 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(20) NOT NULL,
  `date` date NOT NULL,
  `amount` int(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(125) NOT NULL,
  `generated_string` varchar(255) DEFAULT NULL,
  `special_price` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id_product`, `title`, `description`, `price`, `date`, `amount`, `category`, `image`, `generated_string`, `special_price`) VALUES
(1, 'Poster Geinoh Yamashirogumi', 'Poster Geinoh Yamashirogumi, 445/222cm3 grand format', 20, '2014-08-06', 50, 'graphic', 'pjpjpoj', 'japanese', 10),
(2, 'naruto shipuden Poster ', 'Poster Kagebushin no jutsu', 20, '2014-07-30', 50, 'manga, anime', 'pjpjpoj', 'manga, naruto', 10),
(3, 'Deathnote poster', 'Poster L & Kira - 38x52cm\r\n\r\nIls sont enfin réunis sur un même poster L & Light, les deux meilleurs ennemis ! Idéal pour les fans de ce manga, que doit-on demander de plus, les deux ennemis réuni sur ces fameuses règles. Laissez vous entrainer dans un univers ou seule une règle compte. Celle du Death Note !', 632, '2014-07-02', 23, 'manga,death note', '512356', 'manga', 580),
(4, 'Poster Akira/testuo anime', 'Poster de l''inoubliable animé tiré du mange de Katsuhiro Otomo.', 220, '2014-07-21', 5, 'manga, anime', 'graphic/23455', 'manga', 180),
(5, 'Ghost In the Shell Poster ', 'Poster igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. .', 530, '2014-07-22', 5, 'manga, anime', 'graphic/25467', 'manga', 480),
(6, 'Gaia', 'Poster owned a home and office in Tokyo, out of which he ran the Kashiwagi Shoji Company. He stated that he was the sole principal of his real estate and investment business.', 50, '2013-12-11', 502, 'graphic', 'jphpih', 'manga', 35),
(7, 'entrecote frites Poster ', 'Poster \nElle raconte l''histoire des dernières années de la République romaine, depuis la fin de la Série télévisée au budget le plus élevé de l''histoire à l''époque de sa production', 20, '2014-07-24', 10, 'illustration', '', 'goya', NULL),
(8, 'games of thrones Poster ', 'Poster quaeso miretur, si post exsudatos labores itinerum longos congestosque adfatim commeatus fiducia vestri ductante barbaricos pagos adventans velut mutato repente consilio ad placidiora deverti.', 250, '2014-07-18', 50, 'picture', 'picture/45123', NULL, NULL),
(9, 'Poster Rome HBO', 'Rome est une série télévisée américano-britannico-italienne en 22 épisodes répartis en deux saisons, créée par John Milius, William J. MacDonald et Bruno Heller. Elle raconte l''histoire des dernières années de la République romaine, depuis la fin de la guerre des Gaules jusqu''à l''avènement d''Auguste, mais ses deux personnages principaux sont deux soldats romains qui se retrouvent pris dans la tourmente des événements1. Série télévisée au budget le plus élevé de l''histoire à l''époque de sa production', 50, '2014-07-17', 50, 'illustration', 'l', 'pictures', NULL),
(10, 'Poster  Macross ', 'Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.', 63, '2014-06-17', 20, 'manga, macross', 'picture/56789', 'manga', 50),
(11, 'Poster  kebab', 'Salades tomates oignons, sauce samouraï !!!', 632, '2014-07-02', 23, 'graphic', '512356', NULL, 0),
(12, 'Poster  Robocop CPC', 'le petit ourson', 50, '2014-04-17', 23, 'games', '512356', NULL, 0),
(13, 'Poster  cloverfield', 'Dernier né d''une famille de quatre enfants, son père Jules Xavier Faivre, est originaire de la Haute-Saône et l''époux de Marie Félicité Faivre née Régnier, cette famille arriva en Algérie dans les années 1845. Il a quinze ans à la mort de son père et a déjà écrit ses premiers poèmes qui sont publiés dans les : Annales Africaines e', 0, '2014-07-04', 41, 'table', ',', NULL, NULL),
(14, 'Poster gladiator', 'Ami de son compatriote, le peintre Augustin Ferrando,(1880-1957) avec lequel, il va planter son chevalet dans la campagne algéroise Il part à Paris en 1909 et y passera deux années, il compte parmi ses amis : le compositeur Charles Berlandier, le sculpteur Emile Gaudissard (1872-1956), l''écrivain Robert Migot, Jean Pomier un des fondateurs du courant Algérianisme et Directeur de la revueAfrique, le peintre André Thomas Rouault (1899-1949), les poètes Alfred Rousse et Albert Tustes.', 50, '2014-07-20', 50, 'movies, peplum, gladiator, russel crowe', 'k', 'goya', 0),
(15, 'Poster canada', 'lol', 896, '2014-07-21', 56, 'table', 'l', 'goya', NULL),
(16, 'lapin sauce moutarde', 'Dernier né d''une famille de quatre enfants, son père Jules Xavier Faivre, est originaire de la Haute-Saône et l''époux de Marie Félicité Faivre née Régnier, cette famille arriva en Algérie dans les années 1845. Il a quinze ans à la mort de son père et a déjà écrit ses premiers poèmes qui sont publiés dans les : Annales Africaines et dans la nouvelle revue : L''Echo d''Alger. Cette même année il entre dans l''Administration de la Poste pour avoir son indépendance.', 520, '2014-07-04', 50, 'illustration', 'jpjpij', NULL, NULL),
(17, 'Poster caféine', 'izrgfaeifaeifugezviuvcgadivagzdvipazegvpazegvpaezyvgazevygzevgzaeupvezgyug', 632, '2014-07-02', 23, 'graphic', '512356', NULL, NULL),
(18, 'Poster couscous', 'izrgfaeifaeifugezviuvcgadivagzdvipazegvpazegvpaezyvgazevygzevgzaeupvezgyug', 632, '2014-07-02', 23, 'graphic', '512356', NULL, NULL),
(19, 'Poster  poulet frites', 'Collection du Musée national d''art moderne / Centre de création industrielle', 632, '2014-07-02', 23, 'graphic', '512356', NULL, NULL),
(20, 'Poster  Evangelion poster  anime', 'Poster de l''anime Neon Genesis Evangelion', 150, '2014-07-31', 10, 'manga, anime', 'graphic/25569', 'manga, evangelion', 100),
(21, 'Poster transformers 4', 'Nunc vero inanes flatus quorundam vile ', 590, '2014-07-17', 20, 'table', 'picture/56789', NULL, NULL),
(22, 'porte des enfers', 'Collection du Musée national d''art moderne / Centre de création industrielle', 500, '0000-00-00', 10, 'illustration', '', NULL, NULL),
(23, 'Marcel-Henri Faivre', 'En 1915, il épouse Geneviève Germain, musicienne et femme de lettres ayant pour nom de plume Jacques Duvaldizier ; ils auront ensemble cinq enfants : Gérard, Marcel-Henri(Mario) qui deviendra compositeur de musique, Genevieve, Lionel et Monique. Ils s''installent à Paris en 1919 et Marcello fonde : La Revue de l''Époque.', 600, '0000-00-00', 150, 'table', '', NULL, NULL),
(24, 'postal vancouver', 'Source : Institut de recherche et de coordination acoustique / musique ', 25, '0000-00-00', 200, 'divers', '', NULL, NULL),
(25, 'poster the north remember', 'L''exposition « Man Ray, Picabia et la revue Littérature (1922-1924) » éclaire une période cruciale de l''histoire de l''art moderne, entre la fin du mouvement Dada et l''avènement du surréalisme, en s''appuyant sur les vingt-six projets de couvertures conçues par Francis Picabia pour la revue Littérature au début des années 1920.\nJusqu''à une date récente, seule leur version imprimée était connue. En 2008, les dessins originaux de Francis Picabia, dont quinze restaient inédits, étaient révélés par la galerie 1900-2000 à qui Aube Elléouët-Breton avait confié les œuvres retrouvées dans une simple ...', 350, '0000-00-00', 41, 'autres', '', NULL, NULL),
(26, 'porte des enfers', 'Collection du Musée national d''art moderne / Centre de création industrielle', 500, '0000-00-00', 10, 'illustration', '', NULL, NULL),
(27, 'porte du Paradis', 'Collection du Musée national d''art moderne / Centre de création industrielle', 500, '0000-00-00', 10, 'illustration', '', NULL, NULL),
(28, 'porte du Tartare', 'Collection du Musée national d''art moderne / Centre de création industrielle', 500, '0000-00-00', 10, 'illustration', '', NULL, NULL),
(29, 'Les lymmbes', 'Collection du Musée national d''art moderne / Centre de création industrielle', 500, '0000-00-00', 10, 'illustration', '', NULL, NULL),
(31, 'Poster Suspension', 'Poster Geinoh Yamashirogumi, 445/222cm3 grand format', 26, '2014-08-06', 50, 'graphic', 'pjpjpoj', 'japanese', 10),
(32, 'Poster  bleach', 'Nunc vero inanes flatus quorundam vile esse quicquid extra urbis pomerium nascitur aestimant praeter orbos et caelibes, nec credi potest qua obsequiorum diversitate coluntur homines sine liberis Romae.', 30, '2014-06-17', 20, 'manga, bleach', 'picture/56789', 'manga', 500),
(56, 'mousquetaires', 'Le corps des mousquetaires de la maison militaire du roi de France est créé en 1622 lorsque Louis XIII dote de mousquets, arme plus puissante que l''arquebuse, une compagnie de chevau-légers de la Garde1, créée par Henri IV.', 30, '0000-00-00', 10, 'art, history, dumas', '', NULL, 20),
(57, 'Les Gardiens de la Galaxie', 'Peter Quill est un aventurier traqu&eacute; par tous les chasseurs de primes pour avoir vol&eacute; un myst&eacute;rieux globe convoit&eacute; par le puissant Ronan, dont les agissements menacent l&rsquo;univers tout entier. Lorsqu&rsquo;il d&eacute;couvre le v&eacute;ritable pouvoir de ce globe et la menace qui p&egrave;se sur la galaxie, il conclut une alliance fragile avec quatre aliens disparates : Rocket, un raton laveur fin tireur, Groot, un humano&iuml;de semblable &agrave; un arbre, l&rsquo;&eacute;nigmatique et mortelle Gamora, et Drax le Destructeur, qui ne r&ecirc;ve que de vengeance.', 50, '0000-00-00', 10, 'film, s-f, marvel, groot, comics', '', NULL, 45),
(58, 'darkseed', 'Dark Seed is a psychological horror point-and-click adventure game developed and published by Cyberdreams in 1992. It exhibits a normal world and a dark world counterpart, which is based on the artwork by H. R. Giger. It was one of the first point-and-click adventure games to use high-resolution (640 x 400 pixels) graphics, to Giger''s demand. A sequel, Dark Seed II, was released in 1995.', 25, '0000-00-00', 2, 'game, abandonware, giger', '', NULL, 0),
(59, 'galano terra', 'The original game was released for Amiga, DOS, Amiga CD32, Macintosh, Sega Saturn and PlayStation. The PlayStation and Saturn versions were released only in Japan; however, the Saturn version is not dubbed in Japanese, only subtitled,[3] making the game''s story still accessible to English speakers. However, these ports have been criticized for doubling the speed that time flows in the game, as well as speeding up the soundtrack. The Saturn version is compatible with the Sega Saturn Netlink Mouse.', 60, '0000-00-00', 21, 'art, history, galano, terra', '', NULL, 15),
(65, 'gemo', 'I was going to do 3 separate JOINs. This is much better. And even without CTE we can have UNION as sub-query with the same logic.', 200, '0000-00-00', 12, 'art, history, gemo, terra', '', NULL, 20),
(80, 'Metal mutant', 'Metal Mutant is a side-scrolling action-adventure game developed and published for MS-DOS, Amiga and Atari ST by Silmarils and released in 1991. It is similar to Game Arts'' Thexder in that it allows you to transform at any time into three different robot forms', 200, '0000-00-00', 12, 'game, abandonware, giger', '', NULL, 45),
(83, 'odilon redon', 'It is similar to Game Arts'' Thexder in that it allows you to transform at any time into three different robot forms', 40, '0000-00-00', 0, 'art', '', NULL, 30),
(84, 'Inception', 'Poster Inception de christopher Nolan 2007', 30, '0000-00-00', 20, 'movies,inception, leonardo', '', NULL, 25),
(85, 'Noah', 'Poster Noah r&eacute;alis&eacute; par Darren Anorovsky avec russel crow', 50, '0000-00-00', 20, 'noah, darren anorovsky, russel crow', '', NULL, 30),
(86, 'Poster I,robot', 'Le terme français « science-fiction » a pour origine le terme anglais science fiction qui est apparu pour la première fois en 1853 sous la plume de William Wilson dans un essai intitulé A Little Earnest Book Upon A Great Old Subject1. Mais il ne s''agissait alors que d''un usage isolé. En janvier 1927, on trouve dans les colonnes du courrier de Amazing Stories la phrase suivante : « Remember that Jules Verne was a sort of Shakespeare in science fiction. »2 Mais c''est en 1929, à la suite de l''éditorial d''Hugo Gernsback dans le premier numéro du pulp magazine intitulé Science Wonder Stories, que le terme commence à s''imposer aux États-Unis, aussi bien dans les milieux professionnels que chez les lecteurs, remplaçant de facto d''autres vocables alors en usage dans la presse spécialisée comme « scientific romance » ou « scientifiction »3.', 35, '0000-00-00', 30, 'movies, sci-fi, sf, i,robot, science,fiction', '', NULL, 25),
(87, 'No pain no gain', 'Dans son essai intitulé On The Writing of Speculative Fiction, publié en 1947 dans Of Worlds Beyond, l''auteur américain Robert A. Heinlein plaida en faveur du concept de « speculative fiction »4, ou fiction spéculative réaliste5 pour se démarquer des récits de fantasy qui paraissaient encore à l''époque sous l''étiquette générale de science fiction. Si le néologisme de Robert A. Heinlein connut un grand succès jusque dans les années 1960, le terme de science fiction s''est toujours maintenu comme référence. Exemple : Le Meilleur des mondes d''Aldous Huxley est un roman de type science-fiction.', 50, '0000-00-00', 20, 'marc whalberg, the rock, movies', '', NULL, 45),
(88, 'lizzie mcguire movie', 'Dans le monde francophone, le terme de science-fiction s''impose &agrave; partir des ann&eacute;es 19506 avec pour synonyme et concurrent direct le mot anticipation. Pr&eacute;c&eacute;demment, il s''agissait plut&ocirc;t de &laquo; merveilleux scientifique &raquo; ou de voyages &laquo; extraordinaires &raquo;. Si le mot anglais original s''&eacute;crit le plus souvent science fiction, le mot fran&ccedil;ais s''orthographie avec un trait d''union : science-fiction. L''abr&eacute;viation fran&ccedil;aise S.F., ou SF, est devenue courante &agrave; partir des ann&eacute;es 19706.', 66, '2014-11-30', 20, 'movies, hilary duff, romance', '', NULL, 45),
(89, 'Ranma 1/2', 'Il raconte l''histoire pleine en rebondissements et quiproquos de Ranma Saotome et de sa fianc&eacute;e Akane Tend&ocirc;. Beaucoup de personnages sont en effet capables de se transformer en animaux au contact de l''eau froide ce qui provoque de nombreux gags et p&eacute;rip&eacute;ties.', 62, '2014-11-30', 23, 'manga, ranma', '', NULL, 20),
(90, 'Maleficient 2014', 'Une repr&eacute;sentation r&eacute;pandue que l''on trouve dans les dictionnaires7 d&eacute;peint la science-fiction comme un genre narratif qui met en sc&egrave;ne des univers o&ugrave; se d&eacute;roulent des faits impossibles ou non av&eacute;r&eacute;s en l&rsquo;&eacute;tat actuel de la civilisation, des techniques ou de la science, et qui correspondent g&eacute;n&eacute;ralement &agrave; des d&eacute;couvertes scientifiques et techniques &agrave; venir. Cette description g&eacute;n&eacute;rale recouvre de nombreux sous-genres', 36, '2014-10-25', 23, 'movies, angelina jolie, fantastic', '', NULL, 22),
(91, 'Sci-Fi-High-The-Movie-Musical', 'L''exp&eacute;rience de pens&eacute;e : le r&eacute;cit de science-fiction est toujours un que se passe-t-il si... ? C''est une fiction sp&eacute;culative qui place les id&eacute;es au m&ecirc;me plan que les personnages.\r\n\r\nLa distanciation cognitive : le lecteur doit &ecirc;tre embarqu&eacute; dans un monde inhabituel.', 50, '2014-11-30', 23, 'movies, sci-fi, sf, i,robot, science,fiction', '', NULL, 45),
(92, 'butterfly', 'C&rsquo;est notre monde disloqu&eacute; par un certain genre d&rsquo;effort mental de l&rsquo;auteur, c&rsquo;est notre monde transform&eacute; en ce qu&rsquo;il n&rsquo;est pas ou pas encore.', 65, '2014-11-30', 20, 'graphic, art', '', NULL, 45),
(93, 'brushwork-color', 'Ce monde doit se distinguer au moins d&rsquo;une fa&ccedil;on de celui qui nous est donn&eacute;, et cette fa&ccedil;on doit &ecirc;tre suffisante pour permettre des &eacute;v&eacute;nements qui ne peu', 65, '2014-11-30', 23, 'graphic, art', '', NULL, 45),
(94, 'landscape graphic', 'Il doit y avoir une id&eacute;e coh&eacute;rente impliqu&eacute;e dans cette dislocation ; c&rsquo;est-&agrave;-dire que la dislocation doit &ecirc;tre conceptuelle', 50, '2014-11-30', 20, 'graphic, art', '', NULL, 20),
(96, 'Say what ?', 'Et non simplement triviale ou &eacute;trange - c&rsquo;est l&agrave; l&rsquo;essence de la science-fiction, une dislocation conceptuelle dans la soci&eacute;t&eacute; en sorte qu&rsquo;une nouvelle soci&eacute;t&eacute; est produite dans l&rsquo;esprit de l&rsquo;auteur, couch&eacute;e sur le papier, et &agrave; partir du papier elle produit un choc convulsif dans l&rsquo;esprit du lecteur, le choc produit par un trouble de la reconnaissance. Il sait qu&rsquo;il ne lit pas un texte sur le monde v&eacute;ritable.', 35, '2014-11-30', 30, 'graphic, art', '', NULL, 25),
(97, 'Mask-Graphic-Artwork', 'L''activit&eacute; de compr&eacute;hension du lecteur : elle fait suite &agrave; la distanciation. Le lecteur doit reconstruire un monde imaginaire &agrave; partir de connaissances qui ne rel&egrave;vent ni du merveilleux ni du religieux, mais de th&eacute;ories ou de sp&eacute;culations scientifiques', 65, '2014-11-30', 23, 'graphic, art, mask', '', NULL, 45),
(98, 'hunger games', 'Il est narr&eacute; par la jeune Katniss, 16 ans, qui vit dans la nation post-apocalyptique de Panem (&laquo; Pain &raquo; en latin), construite sur les ruines de ce qui constituait l''Am&eacute;rique du Nord. Le Capitole, une m&eacute;tropole technologiquement avanc&eacute;e, exerce un contr&ocirc;le politique total sur le reste des douze districts constitutifs de Panem. Il organise chaque ann&eacute;e les &laquo; Hunger Games &raquo; (&laquo; Jeux de la Faim &raquo;), un jeu t&eacute;l&eacute;vis&eacute; o&ugrave; un gar&ccedil;on et une fille entre douze et dix-huit ans de chaque district sont tir&eacute;s au sort pour s''affronter.', 36, '2014-11-30', 45, 'movies, hunger,games', '', NULL, 45),
(99, 'expendables 3', 'Expendables 3 ou Les Sacrifi&eacute;s 3 au Qu&eacute;bec (The Expendables 3) est un film d''action am&eacute;ricain r&eacute;alis&eacute; par Patrick Hughes et sorti en 2014.\r\n\r\nLe film a &eacute;t&eacute; pr&eacute;sent&eacute; hors comp&eacute;tition au 67e Festival de Cannes. La plupart des acteurs &eacute;taient pr&eacute;sents pour l''occasion1.', 50, '2014-11-30', 56, 'movies, expendables', '', NULL, 49);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `id_promotion` int(11) NOT NULL AUTO_INCREMENT,
  `code_promo` varchar(50) NOT NULL,
  `reduction` int(10) NOT NULL,
  PRIMARY KEY (`id_promotion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4257 ;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `code_promo`, `reduction`) VALUES
(4256, '5688', 10);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `generated_string` varchar(35) NOT NULL,
  `email` varchar(200) NOT NULL,
  `email_code` varchar(200) NOT NULL,
  `image_location` varchar(150) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `bio` text NOT NULL,
  `postal_code` varchar(40) NOT NULL,
  `town` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `confirmed` int(2) NOT NULL,
  `time` int(11) NOT NULL,
  `newsletter` int(2) NOT NULL,
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `generated_string`, `email`, `email_code`, `image_location`, `first_name`, `last_name`, `gender`, `address`, `bio`, `postal_code`, `town`, `country`, `phone_number`, `confirmed`, `time`, `newsletter`, `ip`) VALUES
(4, 'naruto', '$2y$12$76844359454419f3d11d1OJDI2Li9FiNp2mUlRaIpUALhZdptOBJ6', '1', 'esatie55@yahoo.fr', 'code_54355b047c00f3.04257082', 'views/img/avatars/naruto_0.jpg', 'naruto', 'uzumaki', 'Male', '45 rue dunois 75013 Paris', 'mdp: uzumaki\r\n\r\nNaruto est pr&eacute;sent dans l''ensemble des produits d&eacute;riv&eacute;s de la s&eacute;rie comme les films et les OAV et fait l''objet d''un merchandising important. Il fait des apparitions dans tous les g&eacute;n&eacute;riques d''ouverture et de fin de Naruto Shippuden.', '75013', 'Konoha', 'pays du feu', '06 45 86 22 14', 1, 1412782852, 1, '127.0.0.1'),
(6, 'Siouxsie', '$2y$12$1937483193543c5f1d0f1u0Sxnxsk7C0SrOiVSwjknzFp1MD09reO', '0', 'p.arvo@yahoo.fr', 'code_543c5f1d0f1600.47904701', 'views/img/avatars/27738828445c33fb5e6b24.gif', 'Sioux', 'Jessamine', 'Female', '45 bolton streets N.Y', 'mdp: slowdive  Siouxsie Sioux, (prononcez « Sou-zie Sou »), de son vrai nom Susan Janet Ballion, née le 27 mai 1957 à Chislehurst, est une chanteuse britannique, connue pour avoir cofondé les groupes de rock Siouxsie and the Banshees (1976–1996) et The Creatures (1981–2004). Elle a aussi chanté avec d''autres artistes comme Morrissey2 ou John Cale3. Depuis 2004, elle officie en solo. Son premier album sous le seul nom de Siouxsie, Mantaray, est sorti en 2007.', '', '', '', '', 1, 1413242653, 1, '127.0.0.1'),
(7, 'sasuke', '$2y$12$681982311543fcf6f539fu4OhnZrk7NJnbeBXn6cmnP4uvzRBplbm', '0', 'xxymox@hotmail.com', 'code_543fcf6f539f66.91313325', 'views/img/avatars/sasuke.png', 'Sasuke', 'Uchiwa', 'Male', '43 23 rue de konoha', 'Sasuke Uchiwa (??????, Uchiha Sasuke) est un personnage principal dans la s&eacute;rie. Il a &eacute;t&eacute; initialement pr&eacute;sent&eacute; comme un protagoniste, un membre de Konoha appartenant &agrave; l&rsquo;&eacute;quipe Kakashi. Au cours de la s&eacute;rie, il devint de plus en plus sombre, aboutissant &agrave; une alliance avec l&rsquo;Akatsuki, devenant l&rsquo;un des personnages les plus dynamiques de la s&eacute;rie. Sasuke est &eacute;galement l&rsquo;un des membres survivants du clan Uchiwa, avec Tobi.', '94800', 'villejuif', 'pays du feu', '', 1, 1413468015, 0, '127.0.0.1'),
(8, 'skirmish', '$2y$12$188710138054401a46647uAr29ASLRWEbXmocB2LvpAicO9mGxtei', '0', 'ok@gmail.com', 'code_54401a46647561.89586890', 'views/img/avatars/kakashi.jpg', 'norman', 'bates', 'Male', '56-78 rue de la peur96500 bourgonde', 'mdp: horrorgore\r\n\r\nHorror Rules Mini-Games provide all the fun and mayhem of the original pencil and paper roleplaying game, but make it even easier and quicker to play. Plus, it''s cheaper. A LOT cheaper! Included in this Mini-Game is everything you need to play, including Paper Forge Minis, maps, weapons and item counters and more - just print and go! Use the more than 60 Horror Markers to simulate the challenges, dangers, perils and scares of a monster-infested woods/city/cemetery/playground, and change the mix to make a different game every time.', '', '', '', '', 0, 1413487174, 0, '127.0.0.1'),
(22, 'lovecraft', '$2y$12$9573561205442943833caujlm2fnEtFg/5BjrPf7a4kPPydc/MBrO', '0', 'cthulhu@yahoo.fr', 'code_5442943833ca56.46416271', 'views/img/avatars/lovecraft.jpg', 'phillips', 'Howard', 'Male', '47&deg; 09&prime; S 126&deg; 43&prime; O r''lyeh', 'mdp: cthulhu\r\n\r\nBien que le lectorat de Lovecraft f&ucirc;t limit&eacute; de son vivant, sa r&eacute;putation &eacute;volue au fil des d&eacute;cennies et il est &agrave; pr&eacute;sent consid&eacute;r&eacute; comme l''un des &eacute;crivains d''horreur les plus influents du XXe si&egrave;cle ; avec Edgar Allan Poe, il a &laquo; une influence consid&eacute;rable sur les g&eacute;n&eacute;rations suivantes d''&eacute;crivains d''horreur &raquo;', '66666', 'r''lyeh', 'Hearth', '06 56 52 23 20', 1, 1413649464, 1, '127.0.0.1'),
(23, 'Eldergod', '$2y$12$74821660655451ff49d50uW4k5X76XK2700d2KpSrn8Nz1Gi8ieWy', '0', 'shunigurat@hotmail.com', 'code_5451ff49d50717.70860796', 'views/img/avatars/elder_god.gif', 'ancient', 'shubnigurat', 'undisclosed', 'beyond betelgeus 203 206', 'mdp: lovecraft\r\nShub-Niggurath est une créature fantastique fictive, dieu maléfique et extraterrestre tiré de l''œuvre de l''écrivain américain Howard Phillips Lovecraft.', '965422', 'betelgeus', 'nowhere', '01 47 95 62 30', 0, 1414659913, 0, '127.0.0.1'),
(24, 'Ladygaga', '$2y$12$6521530327545215bc1d2OqwI9odgbEVlPWHMn4fjAM7uEypPM//S', '0', 'ladygaga@yahoo.fr', 'code_545215bc1d2c80.88409747', 'views/img/avatars/P1010654_(13737679975).jpg', 'StefaniJoanne', 'Germanotta', 'undisclosed', '10736 Jefferson Blvd. Suite 525', 'mdp: MotherMonster\r\n\r\nStefani Joanne Angelina Germanotta, dite Lady Gaga, née le 28 mars 1987, à New York, aux États-Unis, est une auteure-compositrice-interprète américaine. Née et élevée à New York, elle étudie au couvent du Sacré-Cœur et fréquente brièvement la Tisch School of the Arts de l’université de New York avant de quitter le milieu scolaire pour se concentrer sur sa carrière musicale.', '90230', 'Culver City', 'USA', '03 42 56 78 47', 0, 1414665660, 0, '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
