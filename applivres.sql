-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 26 Septembre 2016 à 21:24
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `applivres`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `sexe` set('m','f') COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `courant_litteraire` set('humanisme','romantisme','realisme') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `dod` date DEFAULT NULL,
  `biographie` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `sexe`, `nom`, `prenom`, `age`, `image`, `ville`, `courant_litteraire`, `dob`, `dod`, `biographie`, `created_at`, `updated_at`) VALUES
(1, 'm', 'Trebilcox', 'Paul', 33, 'data:image/jpeg;base64,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', 'Broomfield, CO', 'realisme', '1983-06-24', NULL, 'I\'m an Android developer out of Denver, Colorado in the USA. Currently I work for Tack Mobile (http://tackmobile.com/), and have previously worked for Sphero, a company that is best known for their work on the BB-8 droid toy from the new Star Wars movie. I have also recently published a book on Android TV development (http://www.apress.com/9781484217832). Outside of work and development, I have a passion for building Star Wars LEGO sets, playing Ingress and reading. I also use to work as a zookeeper, so if you have any burning questions about giraffes, I\'m the guy to ask.', '2016-09-24 00:00:00', '2016-09-24 00:00:00'),
(2, 'm', 'Tolkien', 'J.R.', 81, 'http://static.fnac-static.com/multimedia/images_intervenants/Portraits/Grand/3/8/290583_Jrr%20Tolkien.gif', 'Bloemfontein', 'romantisme', '1892-01-03', '1973-09-27', 'John Ronald Reuel Tolkien est né le 3 janvier 1892, à Bloemfontein en Afrique du Sud. En 1895, sa mère, Mabel, décide de revenir à Birmingham, berceau familial, avec ses deux fils : John et Hilary Arthur Reuel. Leur père malade, ne pouvant les suivre, décède le 15 février 1896. A son tour, Mabel meurt prématurément en décembre 1904, à l\'âge de 34 ans. Le père Francis Morgan devient alors son tuteur et l\'élève dans la foi catholique. J.R.R. Tolkien est heureux d\'avoir pour terrain de jeux un village des environs de Birmingham, dont il dessine et peint les paysages. La voie ferrée voisine menait à des gares du Pays de Galles aux noms étranges, ce qui l’amène tout naturellement à apprendre le Gallois, puis à s\'apercevoir que tous les noms propres ont un sens dans la langue qui les produit. De là découle notamment sa passion pour les langues imaginaires comme le Sindarin, inspiré du Gallois, et le Quenya, dérivé du vieux Finnois. Voué à devenir philologue et poète épique, il déteste Shakespeare et adore Beowulf, poème vieil anglais dont il fait plus tard une analyse et une critique reconnues, et qui influença sans nul doute son œuvre. En 1905, lui et Hilary sont hébergés chez une tante. C’est là que Tolkien rencontre Edith Bratt, dont il devient très proche. Vers 1909, le père Francis Morgan, s\'aperçoit de leur amour et refuse tout compromis. En 1910, soucieux d’éloigner Edith et Ronald, il ordonne aux deux frères de déménager. Tolkien devient ensuite boursier à Oxford en 1911, et voit la parution de ses premiers vers cette même année. Il passe avec succès ses derniers examens, avant d\'être enrôlé dans l\'armée. En 1916, il épouse Edith Bratt. Revenu du front malade, il passe le reste de la guerre à amorcer l\'Histoire de la Terre du Milieu. Son premier fils, John, est né peu après son retour en Angleterre. Ronald participe à l\'élaboration du dictionnaire d\'Oxford en tant que lexicographe. Michael, son deuxième fils, nait en 1921. En 1923, le Livre des Contes Perdus est pratiquement terminé. Tolkien le rebaptise alors le Silmarillion. Il enseigne l\'Anglais à l\'université de Leeds (1920) puis à celle d\'Oxford (en 1925 : année de naissance de son troisième fils, Christopher), où commence sa longue amitié avec C.S. Lewis. Sa fille, Priscillia, nait en 1929. Pour l’anecdote, en corrigeant les copies de ses élèves que Tolkien tombe sur une feuille blanche et y rédige les premières lignes de Bilbo le Hobbit. Tolkien écrit ensuite l\'histoire jusqu\'à la mort du dragon Smaug, et la raconte à ses enfants. Mais les enfants grandissent, et le roman inachevé tomba dans l\'oubli. Heureusement, l’une de ses étudiantes le découvre avec enthousiasme, ce qui incite alors Tolkien à en achever le récit. Ce roman, publié en 1937, est devenu instantanément un classique, et a conquis nombre de lecteurs, avides d\'une suite. Encouragé par le succès que rencontre l’œuvre, Tolkien travaille ensuite pendant 12 années sur le Seigneur des Anneaux, (publié en 1954-1955). L\'édition américaine de cette grande épopée a fait de Tolkien un auteur « culte » sur les campus. Après avoir quitté son poste de professeur en 1959, Tolkien consacre le reste sa vie aux textes du Silmarillion, un cycle de mythes complexes ayant trait à la Terre du Milieu. Il déménage au bord de la mer pour rester auprès de sa femme gravement malade. J.R.R. Tolkien est mort en 1973. Son fils, Christopher rassembla et organisa les notes afin d\'achever l\'Histoire de la Terre du Milieu.', '2016-09-24 09:21:19', '2016-09-24 14:40:47');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resume` text COLLATE utf8_unicode_ci NOT NULL,
  `prix` smallint(6) NOT NULL,
  `ISBN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ean` bigint(20) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `editeur` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parution` year(4) NOT NULL,
  `magasin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numerique` tinyint(1) NOT NULL,
  `vue` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `resume`, `prix`, `ISBN`, `image`, `ean`, `auteur_id`, `editeur`, `parution`, `magasin`, `numerique`, `vue`, `created_at`, `updated_at`) VALUES
(1, 'Google Play Services: Google Cast v3 and Media', 'Google Cast is a technology that allows users to send online content to a device, such as a Chromecast or Android TV, connected to a television. Once the content is available on the television, users can control it from their mobile device or computer.   In this tutorial, you will learn how to create a basic Cast-enabled application for Android using the Cast SDK v3, which was announced during the 2016 Google I/O conference.', 49, '978-3-16-148410-0', 'https://thumbsplus.tutsplus.com/uploads/users/798/posts/26893/preview_image/android.jpg?height=300&width=300', 9783161484100, 1, 'Tutsplus', 2016, 'Tutsplus', 1, 17, '2016-09-23 23:56:54', '2016-09-25 15:00:21'),
(2, 'Bilbo le Hobbit - : Bilbo le Hobbit', 'Bilbo, comme tous les hobbits, est un petit être paisible qui n\'aime pas être dérangé quand il est à table. L\'aventure lui tombe dessus comme la foudre, quand le magicien Gandalf et treize nains barbus viennent lui parler de trésor, d\'expédition périlleuse, et du dragon Smaug... qu\'il va affronter. Car Bilbo doit partir avec eux ! Et le plus extraordinaire, c\'est que le hobbit affrontera tous les dangers, sans jamais perdre son humour, même s\'il tremblera plus d\'une fois.', 6, '978-2013971362', 'http://static.fnac-static.com/multimedia/Images/FR/NR/f3/71/51/5337587/1540-1.jpg', 9782013971362, 2, 'Le Livre de Poche', 2014, 'Fnac', 0, 999999901, '2016-09-24 07:24:29', '2016-09-24 13:40:39'),
(3, 'Le Seigneur des anneaux - Tome 1 : La communauté de l\'anneau', 'Aux temps reculés qu\'évoque le récit, la Terre est peuplée d\'innombrables créatures étranges. Les Hobbits, apparentés à l\'Homme, mais proches également des Elfes et des Nains, vivent en paix au nord-ouest de l\'Ancien Monde, dans la Comté. Paix précaire et menacée, cependant, depuis que Bilbon Sacquet a dérobé au monstre Gollum l\'Anneau de Puissance jadis forgé par Sauron de Mordor. Car cet anneau est doté d\'un pouvoir immense et maléfique. Il permet à son détenteur de se rendre invisible et lui confère une autorité sans limites sur les possesseurs des autres Anneaux. Bref, il fait de lui le Maître du Monde. C\'est pourquoi Sauron s\'est juré de reconquérir l\'Anneau par tous les moyens. Déjà ses Cavaliers Noirs rôdent aux frontières de la Comté.\r\nLe Seigneur des anneaux - Le Seigneur des anneaux, Tome 1', 7, '978-2266154116', 'http://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/6/1/1/9782266154116.jpg', 2266154117, 2, 'Pocket', 2014, 'Fnac', 0, 999999901, '2016-09-25 07:24:29', '2016-09-25 13:40:39'),
(4, 'Google Play Services: Google Cast v3 and Media 2', 'Google Cast is a technology that allows users to send online content to a device, such as a Chromecast or Android TV, connected to a television. Once the content is available on the television, users can control it from their mobile device or computer.   In this tutorial, you will learn how to create a basic Cast-enabled application for Android using the Cast SDK v3, which was announced during the 2016 Google I/O conference.', 22, '978-3-16-148110-0', 'https://thumbsplus.tutsplus.com/uploads/users/798/posts/26893/preview_image/android.jpg?height=300&width=300', 9783161184100, 1, 'Tutsplus', 2016, 'Tutsplus', 0, 129, '2016-09-23 23:56:54', '2016-09-25 15:00:21'),
(5, 'Bilbo le Hobbit - : Bilbo le Hobbit 2', 'Bilbo, comme tous les hobbits, est un petit être paisible qui n\'aime pas être dérangé quand il est à table. L\'aventure lui tombe dessus comme la foudre, quand le magicien Gandalf et treize nains barbus viennent lui parler de trésor, d\'expédition périlleuse, et du dragon Smaug... qu\'il va affronter. Car Bilbo doit partir avec eux ! Et le plus extraordinaire, c\'est que le hobbit affrontera tous les dangers, sans jamais perdre son humour, même s\'il tremblera plus d\'une fois.', 7, '978-2011971362', 'http://static.fnac-static.com/multimedia/Images/FR/NR/f3/71/51/5337587/1540-1.jpg', 9782013921362, 2, 'Pocket', 2014, 'Fnac', 0, 99901, '2017-09-24 07:24:29', '2017-09-24 13:40:39'),
(7, 'La carte de la terre du milieu', 'Suivez les traces de frodo et de Sam dans leur épopée à travers les monts Brumeux et les Marais des Morts vers Orodruin. Accompagné Aragorn dans son périple vers la grande cité de minas Tirith. Découvrez l\'endroit ou Gandalf livra bataille aux Balrog sur le Pic de Zirak Zigil.', 50, '978-2267012736', 'http://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/6/3/7/9782267012736.jpg', 9782267012736, 1, 'Bourgois', 1995, 'Fnac', 0, 0, '2016-09-26 14:50:16', '2016-09-26 14:50:16'),
(8, 'La carte de la terre du milieu2', 'Suivez les traces de frodo et de Sam dans leur épopée à travers les monts Brumeux et les Marais des Morts vers Orodruin. Accompagné Aragorn dans son périple vers la grande cité de minas Tirith. Découvrez l\'endroit ou Gandalf livra bataille aux Balrog sur le Pic de Zirak Zigil.', 50, '978-2267012736', 'http://static.fnac-static.com/multimedia/FR/Images_Produits/FR/fnac.com/Visual_Principal_340/6/3/7/9782267012736.jpg', 9782267012736, 2, 'Bourgois', 1995, 'Fnac', 1, 0, '2016-09-26 14:51:10', '2016-09-26 14:51:10');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;