-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 22 jan. 2019 à 21:03
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecosystem`
--

-- --------------------------------------------------------

--
-- Structure de la table `communication`
--

CREATE TABLE `communication` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `valeur` varchar(2500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(2500) NOT NULL,
  `reponse` varchar(2500) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valeur` int(11) NOT NULL,
  `id_objet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `complement_adresse` varchar(250) DEFAULT NULL,
  `nbr_habitant` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `annee_construction` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mentionslegales`
--

CREATE TABLE `mentionslegales` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `mentionslegales`
--

INSERT INTO `mentionslegales` (`id`, `message`) VALUES
(15, '<h3>Limitation de responsabilit&eacute;</h3>\r\n\r\n<p>Les informations contenues sur ce site sont aussi pr&eacute;cises que possibles et le site est p&eacute;riodiquement remis &agrave; jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes. Si vous constatez une lacune, erreur ou ce qui parait &ecirc;tre un dysfonctionnement, merci de bien vouloir le signaler par <a href=\\\"https://www.site-internet-qualite.fr/nos-coordonnees.html\\\">email</a> en d&eacute;crivant le probl&egrave;me de la mani&egrave;re la plus pr&eacute;cise possible (page posant probl&egrave;me, action d&eacute;clenchante, type d&rsquo;ordinateur et de navigateur utilis&eacute;, &hellip;).<br />\r\n<br />\r\nTout contenu t&eacute;l&eacute;charg&eacute; se fait aux risques et p&eacute;rils de l&#39;utilisateur et sous sa seule responsabilit&eacute;. En cons&eacute;quence, Natural-net ne saurait &ecirc;tre tenu responsable d&#39;un quelconque dommage subi par l&#39;ordinateur de l&#39;utilisateur ou d&#39;une quelconque perte de donn&eacute;es cons&eacute;cutives au t&eacute;l&eacute;chargement.<a href=\\\"https://www.site-internet-qualite.fr/\\\">&nbsp;</a> <a href=\\\"http://www.natural-net.fr/\\\">&nbsp;</a><br />\r\n<br />\r\nLes photos sont non contractuelles.<br />\r\n<br />\r\nLes liens hypertextes mis en place dans le cadre du pr&eacute;sent site internet en direction d&#39;autres ressources pr&eacute;sentes sur le r&eacute;seau Internet ne sauraient engager la responsabilit&eacute; de Natural-net.</p>\r\n\r\n<h3>Litiges</h3>\r\n\r\n<p>Les pr&eacute;sentes conditions sont r&eacute;gies par les lois fran&ccedil;aises et toute contestation ou litiges qui pourraient na&icirc;tre de l&#39;interpr&eacute;tation ou de l&#39;ex&eacute;cution de celles-ci seront de la comp&eacute;tence exclusive des tribunaux dont d&eacute;pend le si&egrave;ge social de la soci&eacute;t&eacute; Natural-net. La langue de r&eacute;f&eacute;rence, pour le r&egrave;glement de contentieux &eacute;ventuels, est le fran&ccedil;ais.</p>\r\n\r\n<h3>D&eacute;claration &agrave; la CNIL</h3>\r\n\r\n<p>Conform&eacute;ment &agrave; la loi 78-17 du 6 janvier 1978 (modifi&eacute;e par la loi 2004-801 du 6 ao&ucirc;t 2004 relative &agrave; la protection des personnes physiques &agrave; l&#39;&eacute;gard des traitements de donn&eacute;es &agrave; caract&egrave;re personnel) relative &agrave; l&#39;informatique, aux fichiers et aux libert&eacute;s, le site a fait l&#39;objet d&#39;une d&eacute;claration aupr&egrave;s de la Commission nationale de l&#39;informatique et des libert&eacute;s (<a href=\\\"http://www.cnil.fr/\\\" target=\\\"_blank\\\">www.cnil.fr</a>).&nbsp;</p>\r\n\r\n<h3>Droit d&#39;acc&egrave;s</h3>\r\n\r\n<p>En application de cette loi, les internautes disposent d&rsquo;un droit d&rsquo;acc&egrave;s, de rectification, de modification et de suppression concernant les donn&eacute;es qui les concernent personnellement. Ce droit peut &ecirc;tre exerc&eacute; par voie postale aupr&egrave;s de Natural-net 49 Boulevard Antoine Gautier 33000 Bordeaux ou par voie &eacute;lectronique &agrave; l&rsquo;adresse email suivante : <a href=\\\"mailto:%7BSOCIETE.contact_email%7D\\\">contact@natural-net.fr</a>.<br />\r\nLes informations personnelles collect&eacute;es ne sont en aucun cas confi&eacute;es &agrave; des tiers hormis pour l&rsquo;&eacute;ventuelle bonne ex&eacute;cution de la prestation command&eacute;e par l&rsquo;internaute.</p>\r\n\r\n<h3>Confidentialit&eacute;</h3>\r\n\r\n<p>Vos donn&eacute;es personnelles sont confidentielles et ne seront en aucun cas communiqu&eacute;es &agrave; des tiers hormis pour la bonne ex&eacute;cution de la prestation.</p>\r\n\r\n<h3>Propri&eacute;t&eacute; intellectuelle</h3>\r\n\r\n<p>Tout le contenu du pr&eacute;sent site, incluant, de fa&ccedil;on non limitative, les graphismes, images, textes, vid&eacute;os, animations, sons, logos, gifs et ic&ocirc;nes ainsi que leur mise en forme sont la propri&eacute;t&eacute; exclusive de la soci&eacute;t&eacute; Natural-net &agrave; l&#39;exception des marques, logos ou contenus appartenant &agrave; d&#39;autres soci&eacute;t&eacute;s partenaires ou auteurs.<br />\r\nToute reproduction, distribution, modification, adaptation, retransmission ou publication, m&ecirc;me partielle, de ces diff&eacute;rents &eacute;l&eacute;ments est strictement interdite sans l&#39;accord expr&egrave;s par &eacute;crit de Natural-net. Cette repr&eacute;sentation ou reproduction, par quelque proc&eacute;d&eacute; que ce soit, constitue une contrefa&ccedil;on sanctionn&eacute;e par les articles L.3335-2 et suivants du Code de la propri&eacute;t&eacute; intellectuelle. Le non-respect de cette interdiction constitue une contrefa&ccedil;on pouvant engager la responsabilit&eacute; civile et p&eacute;nale du contrefacteur. En outre, les propri&eacute;taires des Contenus copi&eacute;s pourraient intenter une action en justice &agrave; votre encontre.<br />\r\n<br />\r\nNatural-net est identiquement propri&eacute;taire des &quot;droits des producteurs de bases de donn&eacute;es&quot; vis&eacute;s au Livre III, Titre IV, du Code de la Propri&eacute;t&eacute; Intellectuelle (loi n&deg; 98-536 du 1er juillet 1998) relative aux droits d&#39;auteur et aux bases de donn&eacute;es. <a href=\\\"https://www.site-internet-qualite.fr/\\\"> </a> <a href=\\\"http://www.natural-net.fr/\\\"> </a><br />\r\n<br />\r\nLes utilisateurs et visiteurs du site internet peuvent mettre en place un hyperlien en direction de ce site, mais uniquement en direction de la page d&rsquo;accueil, accessible &agrave; l&rsquo;URL suivante : www.site-internet-qualite.fr, &agrave; condition que ce lien s&rsquo;ouvre dans une nouvelle fen&ecirc;tre. En particulier un lien vers une sous page (&laquo; lien profond &raquo;) est interdit, ainsi que l&rsquo;ouverture du pr&eacute;sent site au sein d&rsquo;un cadre (&laquo; framing &raquo;), sauf l&#39;autorisation expresse et pr&eacute;alable de Natural-net.<br />\r\n<br />\r\nPour toute demande d&#39;autorisation ou d&#39;information, veuillez nous contacter par email : <a href=\\\"mailto:%7BSOCIETE.contact_email%7D\\\">contact@natural-net.fr</a>. Des conditions sp&eacute;cifiques sont pr&eacute;vues pour la presse.</p>\r\n\r\n<p>Par ailleurs, la mise en forme de ce site a n&eacute;cessit&eacute; le recours &agrave; des sources externes dont nous avons acquis les droits ou dont les droits d&#39;utilisation sont ouverts : Pioneer - Multi-Purpose HTML 5 / CSS 3 Corporate Template.<a href=\\\"https://www.site-internet-qualite.fr/\\\">&nbsp;</a> <a href=\\\"http://www.natural-net.fr/\\\">&nbsp;</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Cr&eacute;&eacute; le : 24/05/2016</li>\r\n	<li>Auteur :&nbsp;<a href=\\\"http://themeforest.net/user/Dankov\\\" target=\\\"_blank\\\">Dankov</a></li>\r\n	<li>E-mail de l&#39;auteur :&nbsp;<a href=\\\"mailto:dankov.theme@gmail.com\\\">dankov.theme@gmail.com</a></li>\r\n</ul>\r\n\r\n<h3>H&eacute;bergeur</h3>\r\n\r\n<p><strong>Kiubi</strong><br />\r\nPlateforme de gestion et cr&eacute;ation de sites internet<br />\r\n<a href=\\\"http://www.kiubi.com/\\\" target=\\\"_blank\\\">www.kiubi.com</a><br />\r\n<a href=\\\"mailto:contact@kiubi.com?subject=%7BSOCIETE.societe_nom%7D\\\">contact@kiubi.com</a></p>\r\n\r\n<h2>Conditions de service</h2>\r\n\r\n<p>Ce site est propos&eacute; en langages <strong>HTML5 </strong>et <strong>CSS3</strong>, pour un meilleur confort d&#39;utilisation et un graphisme plus agr&eacute;able, nous vous recommandons de recourir &agrave; des navigateurs modernes comme Safari, Firefox, Chrome,...<a href=\\\"https://www.site-internet-qualite.fr/\\\"> </a> <a href=\\\"http://www.natural-net.fr/\\\"> </a></p>\r\n\r\n<h3>Informations et exclusion</h3>\r\n\r\n<p>Natural-net met en &oelig;uvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise &agrave; jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L&#39;internaute devra donc s&#39;assurer de l&#39;exactitude des informations aupr&egrave;s de Natural-net, et signaler toutes modifications du site qu&#39;il jugerait utile. Natural-net n&#39;est en aucun cas responsable de l&#39;utilisation faite de ces informations, et de tout pr&eacute;judice direct ou indirect pouvant en d&eacute;couler.</p>\r\n\r\n<h3>Cookies</h3>\r\n\r\n<p>Pour des besoins de statistiques et d&#39;affichage, le pr&eacute;sent site utilise des cookies. Il s&#39;agit de petits fichiers textes stock&eacute;s sur votre disque dur afin d&#39;enregistrer des donn&eacute;es techniques sur votre navigation. Certaines parties de ce site ne peuvent &ecirc;tre fonctionnelle sans l&rsquo;acceptation de cookies.</p>\r\n\r\n<h3>Liens hypertextes</h3>\r\n\r\n<p>Les sites internet de Natural-net peuvent offrir des liens vers d&rsquo;autres sites internet ou d&rsquo;autres ressources disponibles sur Internet.<br />\r\n<br />\r\nNatural-net ne dispose d&#39;aucun moyen pour contr&ocirc;ler les sites en connexion avec ses sites internet. Natural-net ne r&eacute;pond pas de la disponibilit&eacute; de tels sites et sources externes, ni ne la garantit. Elle ne peut &ecirc;tre tenue pour responsable de tout dommage, de quelque nature que ce soit, r&eacute;sultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu&rsquo;ils proposent, ou de tout usage qui peut &ecirc;tre fait de ces &eacute;l&eacute;ments. Les risques li&eacute;s &agrave; cette utilisation incombent pleinement &agrave; l&#39;internaute, qui doit se conformer &agrave; leurs conditions d&#39;utilisation.<br />\r\n<br />\r\nLes utilisateurs, les abonn&eacute;s et les visiteurs des sites internet de Natural-net ne peuvent mettre en place un hyperlien en direction de ce site sans l&#39;autorisation expresse et pr&eacute;alable de Natural-net.<br />\r\n<br />\r\nDans l&#39;hypoth&egrave;se o&ugrave; un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d&rsquo;un des sites internet de Natural-net, il lui appartiendra d&#39;adresser un email accessible sur le site afin de formuler sa demande de mise en place d&#39;un hyperlien. Natural-net se r&eacute;serve le droit d&rsquo;accepter ou de refuser un hyperlien sans avoir &agrave; en justifier sa d&eacute;cision.</p>\r\n\r\n<h3>Recherche</h3>\r\n\r\n<p>En outre, le renvoi sur un site internet pour compl&eacute;ter une information recherch&eacute;e ne signifie en aucune fa&ccedil;on que Natural-net reconna&icirc;t ou accepte quelque responsabilit&eacute; quant &agrave; la teneur ou &agrave; l&#39;utilisation dudit site.</p>\r\n\r\n<h3>Pr&eacute;cautions d&#39;usage</h3>\r\n\r\n<p>Il vous incombe par cons&eacute;quent de prendre les pr&eacute;cautions d&#39;usage n&eacute;cessaires pour vous assurer que ce que vous choisissez d&#39;utiliser ne soit pas entach&eacute; d&#39;erreurs voire d&#39;&eacute;l&eacute;ments de nature destructrice tels que virus, trojans, etc....</p>\r\n\r\n<h3>Responsabilit&eacute;</h3>\r\n\r\n<p>Aucune autre garantie n&#39;est accord&eacute;e au client, auquel incombe l&#39;obligation de formuler clairement ses besoins et le devoir de s&#39;informer. Si des informations fournies par Natural-net apparaissent inexactes, il appartiendra au client de proc&eacute;der lui-m&ecirc;me &agrave; toutes v&eacute;rifications de la coh&eacute;rence ou de la vraisemblance des r&eacute;sultats obtenus. Natural-net ne sera en aucune fa&ccedil;on responsable vis &agrave; vis des tiers de l&#39;utilisation par le client des informations ou de leur absence contenues dans ses produits y compris un de ses sites Internet.<a href=\\\"https://www.site-internet-qualite.fr/\\\">&nbsp;</a> <a href=\\\"http://www.natural-net.fr/\\\">&nbsp;</a></p>\r\n\r\n<h3>Contactez-nous</h3>\r\n\r\n<p>Natural-net est &agrave; votre disposition pour tous vos commentaires ou suggestions. Vous pouvez nous &eacute;crire en fran&ccedil;ais par courrier &eacute;lectronique &agrave; : ecosystem.admin@gmail.com</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `texte` varchar(2500) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) COLLATE utf8_bin NOT NULL,
  `valeur` int(11) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE `objet` (
  `id` int(11) NOT NULL,
  `numero_ref` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `id_type_objet` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partagelogement`
--

CREATE TABLE `partagelogement` (
  `id` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partagepiece`
--

CREATE TABLE `partagepiece` (
  `id` int(11) NOT NULL,
  `lien` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `id_piece` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `surface` int(11) NOT NULL,
  `etage` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `programmationhoraire`
--

CREATE TABLE `programmationhoraire` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `id_objet` int(11) NOT NULL,
  `id_mode` int(11) NOT NULL,
  `etat` varchar(11) DEFAULT NULL,
  `etat_second` varchar(5) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typeobjet`
--

CREATE TABLE `typeobjet` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `unite_mesure` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `tel_portable` int(11) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `question_securite` varchar(250) DEFAULT NULL,
  `reponse_securite` varchar(250) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `photo`, `tel_portable`, `mail`, `mot_de_passe`, `question_securite`, `reponse_securite`, `type`) VALUES
(16, 'admin', 'admin', '2019-01-22', NULL, NULL, 'ecosystem.admin@gmail.com', 'adminadmin', NULL, NULL, 'administrateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `mentionslegales`
--
ALTER TABLE `mentionslegales`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_expediteur`),
  ADD KEY `destinataire` (`id_destinataire`);

--
-- Index pour la table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type_objet`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Index pour la table `partagelogement`
--
ALTER TABLE `partagelogement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partagepiece`
--
ALTER TABLE `partagepiece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_piece` (`id_piece`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Index pour la table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeobjet`
--
ALTER TABLE `typeobjet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `communication`
--
ALTER TABLE `communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `mentionslegales`
--
ALTER TABLE `mentionslegales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `partagelogement`
--
ALTER TABLE `partagelogement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `partagepiece`
--
ALTER TABLE `partagepiece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `typeobjet`
--
ALTER TABLE `typeobjet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_expediteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_destinataire`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_1` FOREIGN KEY (`id_type_objet`) REFERENCES `typeobjet` (`id`),
  ADD CONSTRAINT `objet_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `partagepiece`
--
ALTER TABLE `partagepiece`
  ADD CONSTRAINT `partagepiece_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`),
  ADD CONSTRAINT `partagepiece_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
