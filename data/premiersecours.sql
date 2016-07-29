-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 29 Juillet 2016 à 05:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `premiersecours`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invites_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `etat_cours_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cours_users_id_foreign` (`users_id`),
  KEY `invites_id` (`invites_id`),
  KEY `etat_cours_id` (`etat_cours_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `invites_id`, `users_id`, `etat_cours_id`, `created_at`, `updated_at`) VALUES
(3, 'Deuxième cours', 1, 1, 1, '2016-07-18 12:27:33', '2016-07-18 22:10:57'),
(5, 'trois', 3, 1, 1, '2016-07-20 11:51:24', '2016-07-20 11:51:24'),
(6, 'ASD', 4, 1, 1, '2016-07-21 09:26:09', '2016-07-21 09:26:09'),
(7, 'asd1', 5, 9, 2, '2016-07-21 10:31:28', '2016-07-21 10:36:14'),
(8, 'yee', 6, 10, 1, '2016-07-22 11:39:10', '2016-07-22 11:39:10');

-- --------------------------------------------------------

--
-- Structure de la table `cours_scenario`
--

CREATE TABLE IF NOT EXISTS `cours_scenario` (
  `scenario_id` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  KEY `cours_scenario_scenario_id_foreign` (`scenario_id`),
  KEY `cours_scenario_cours_id_foreign` (`cours_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cours_scenario`
--

INSERT INTO `cours_scenario` (`scenario_id`, `cours_id`, `active`) VALUES
(1, 3, 1),
(2, 3, 1),
(1, 5, 0),
(2, 5, 0),
(1, 6, 1),
(2, 6, 1),
(1, 7, 0),
(2, 7, 1),
(1, 8, 0),
(2, 8, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE IF NOT EXISTS `etapes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `reponse_positive` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `reponse_negative` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `scenario_id` int(10) unsigned NOT NULL,
  `reponse_id` int(10) unsigned NOT NULL,
  `no_etape` int(10) unsigned NOT NULL,
  `types_id` int(10) unsigned NOT NULL,
  `temps` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etapes_scenarios_id_foreign` (`scenario_id`),
  KEY `etapes_reponses_id_foreign` (`reponse_id`),
  KEY `types_id` (`types_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Contenu de la table `etapes`
--

INSERT INTO `etapes` (`id`, `text`, `reponse_positive`, `reponse_negative`, `points`, `scenario_id`, `reponse_id`, `no_etape`, `types_id`, `temps`) VALUES
(3, 'En regardant de l’autre côté de la route, vous remarquez une personne allonger devant l’arrêt de bus, que faites-vous?', 'C''est correcte il faut intervenir sur le lieu de l''accident.', 'Non il faut intervenir !', 1, 1, 5, 1, 2, 15),
(4, 'Que faites-vous maintenant ?', 'Oui il est important d''observer la situation avant d''intervenir afin de ne pas se mettre en danger.', 'Non attention, il y''a des voitures il faut intervenir de façon à ne pas se mettre en danger !', 1, 1, 8, 2, 2, 15),
(5, 'Bob est installé à son bureau et travaille.', '', '', 0, 2, 9, 1, 1, NULL),
(6, 'Vous êtes à côté de la victime que faites-vous ?', 'Oui, il faut vérifier que la victime soit consciente.', 'Non, il faut voir si la victime est consciente ou pas', 1, 1, 12, 3, 2, 15),
(7, 'Comment allez-vous vérifier si la victime est consciente ?', 'Oui, il faut lui serrer la main et voir si elle répond.', 'Non, il faut lui serrer la main et lui parler pour voir si elle est capable de répondre.', 1, 1, 10, 4, 2, 15),
(8, 'On remarque que la victime ne répond pas, que doit-on faire maintenant ?', 'Oui il faut vérifier les voies respiratoires afin de voir si la victime respire.', 'Non, il faut vérifier si la victime respire avant de faire la réanimation cardio pulmonaire.', 1, 1, 15, 5, 2, 15),
(9, 'Comment vérifier la respiration ?', 'Oui, il faut identifier au plus vite si la victime respire ou ne respire plus afin de pouvoir agir au plus vite.', 'Non, 30 secondes c''est beaucoup trop pour pouvoir identifier si une victime respire ou pas.', 1, 1, 16, 6, 2, 15),
(10, 'La victime est inconsciente et ne respire pas que faites-vous ?', 'Oui il faut demander de l''aide pour pouvoir secourir la victime plus efficacement.', 'Non, on doit rester proche de la victime.', 1, 1, 18, 7, 2, 15),
(11, 'Deux passante réagissent à votre demande d’aide que leur demandez-vous de faire ? ', 'Oui, il faut appeler le 144 au plus vite lorsqu''une victime est inconsciente et ne respire plus.', 'Non, vous avez déjà vérifier si la victime respire. Il faut appeler l''ambulance au plus vite.', 1, 1, 20, 8, 2, 15),
(12, 'Après avoir appelé le 144 que demandez-vous à l’autre sauveteur ?', 'Oui, pour faire revenir la personne à la vie il faut un défibrillateur.', 'Non, la police ne va pas vous aidez dans cette situation.', 1, 1, 22, 9, 2, 15),
(13, 'Où peut-il trouver un AED ?', 'Oui, les défibrillateurs se trouvent dans les lieux publics comme les gares, les pharmacies, les centres commerciaux.', 'Non, on ne trouve pas des défibrillateurs chez des particuliers.', 1, 1, 25, 10, 2, 15),
(14, 'Quel est le signe que l''on retrouve sur les défibrillateurs ?', 'Oui, c''est bien ce signe que l''on trouve sur les défibrillateurs', 'Non, on ne trouve pas ce signe sur les défibrillateur mais celui-ci :', 1, 1, 44, 11, 3, 15),
(15, 'Maintenant que faut-il faire ?\r\n', 'Oui, il faut commencer la réanimation cardio pulmonaire.', 'Non, il faut commencer la réanimation cardio pulmonaire.', 1, 1, 26, 12, 2, 15),
(16, 'Où allez-vous appuyer ? ', 'Oui, il faut appuyer entre les mamelons.', 'Non il faut appuyer entre les mamelons.', 1, 1, 28, 13, 2, 15),
(17, 'Comment allez-vous positionner vos mains ?', 'Oui c''est la bonne position à avoir.', 'Non cette position n''est pas correcte.', 1, 1, 45, 14, 3, 15),
(18, 'Quelle est la profondeur optimale pour une compression lors d’un massage cardiaque ?', 'Oui, 5-6 cm c''est la bonne profondeur pour la compression lors d''un massage cardiaque.', 'Non, c''est trop, il faut une compression de 5-6 cm de profondeur.', 1, 1, 31, 15, 2, 15),
(19, 'Après 30 compressions, que faites-vous ?', 'Oui, il faut vérifier si il respire avant de faire les insufflations. S''il ne respire pas alors on fait les deux insufflations.', 'Non, il est important de vérifier que la personne ne respire plus avant de faire les insufflations.', 1, 1, 33, 16, 2, 15),
(20, 'Comment pratiquer les insufflations : \r\n\r\n1. Pencher la tête en arrière\r\n2. Ouvrir la bouche\r\n3. Pincez le nez \r\n4. Appliquez votre bouche, largement ouverte, autour de celle de la victime en appuyant bien pour éviter les fuites. \r\n5. Réalisez une première insufflation : soufflez progressivement dans la bouche de la victime et vérifiez que sa poitrine se soulève bien en même temps\r\n6. Redressez-vous légèrement pour reprendre votre souffle pendant que le patient expire passivement et que son thorax s’affaisse. \r\n7. Effectuez une deuxième insufflation.\r\n8. Reprendre avec les 30 compressions thoraciques. \r\n', '', '', 0, 1, 30, 17, 1, NULL),
(21, 'Le 2ème sauveteur arrive avec l’AED et vous demande que faire ?', 'Oui, il faut utiliser le plus vite possible l''AED.\r\n', 'Non il est important d''envoyer un choc au plus vite.', 1, 1, 36, 18, 2, 15),
(22, 'L’AED est allumé, l’AED vous demande de poser les patchs sur le thorax du patient. Comment allez-vous placer les patchs ?', 'Oui c''est de cette manière qu''il faut placer les patchs.', 'Non, ceci n''est pas la bonne façon de placer les patchs.', 1, 1, 38, 19, 3, 15),
(23, 'Les patchs sont maintenant posés, que faites-vous ?', 'Oui il faut arrêter la réanimation cardio pulmonaire et s’éloigner du patient. ', 'Non il ne faut pas continuer la réanimation cardio pulmonaire.', 1, 1, 40, 20, 2, 15),
(24, 'Que faites-vous ? ', 'Oui, il est important que personne ne touche le patient lorsqu''on délivre un choc.', 'Non, il faut vérifier d''abord que personne touche le patient avant de délivrer le choc.', 1, 1, 41, 21, 2, 15),
(25, 'Dès l’arrivée des secours, laisser la place à ces derniers pour le suivi ', '', '', 0, 1, 23, 22, 1, NULL),
(26, 'Bravo ! Vous avez terminé le scénario sans faire de faute !', '', '', 0, 1, 9, 23, 1, NULL),
(27, 'Ces collègues lui apporte à sa demande un dossier, Bob n’a pas bonne mine.\r\nCes collègues s’inquiètent et lui pose la question si tout va bien. \r\nBob répond, que cela va passer, et précise qu’il a juste un inconfort au niveau de son estomac. Ces collègues le laisse. \r\n', '', '', 0, 2, 24, 2, 1, NULL),
(28, 'Les collègues de Bob partent, mais la douleur à la poitrine de Bob persiste. ', '', '', 0, 2, 3, 3, 1, NULL),
(29, 'Bob se lève pour déposer le classeur aux archives, soudainement il est pris d''une violente douleur dans le bras gauche. Il laisse tomber le classeur. ', '', '', 0, 2, 8, 4, 1, NULL),
(30, 'Vous entendez le bruit de la chute du classeur et vous vous précipitez auprès de Bob. Ce dernier serre son point contre la poitrine. Que faites-vous ? \r\n', 'Oui, il est important d''identifier ou la douleur se situe afin de pouvoir agir.', 'Non, il faut savoir d’où provient sa douleur.', 1, 2, 47, 5, 2, 15),
(31, 'Entre temps votre collègue John vous vient en aide. Bob vous dit qu’il a une douleur dans la poitrine que faites-vous ?\r\n', 'Oui, il faut appeler le 144 le plus vite possible.', 'Non, il faut appeler les urgences le plus vite possible', 1, 2, 48, 6, 2, 15),
(32, 'Au vue des symptômes de Bob, dans quelle position doit-on installer Bob durant l’attente de l’arrivée des secours ? ', 'Oui, le mieux est de le positionner de façon semi-assis.', 'Non, il faut positionner Bob de façon semi-assis.', 1, 2, 51, 7, 2, 15),
(33, 'Que pouvez-vous faire pour que Bob se sent mieux à l''aise en attendant les secours ?', 'Oui, vous pouvez déboutonner sa chemise.', 'Non, il faut lui déboutonner sa chemise.', 1, 2, 53, 8, 2, 15),
(34, 'Suite à ces gestes, les secours arrivent et Bob est sauvé. Quels sont les symptômes d’une crise cardiaque ? Cochez ce qui convient (plusieurs réponses possibles)', 'Oui, vous avez parfaitement trouvé les bons symptômes d''une crise cardiaque.', 'Non, vous avez fait des erreurs pour les symptômes d''une crise cardiaque!', 3, 2, 62, 9, 4, 20),
(35, 'En effet, la crise cardiaque est provoquée par l’obstruction d’une artère, qui empêche le sang d’arriver au muscle du cœur (myocarde). Privées d’oxygène pendant plusieurs heures, des cellules meurent. Au-delà de 4 heures, la portion de tissu cardiaque menacée par le manque d’oxygène est irrémédiablement détruite. Il faut donc déboucher l’artère le plus rapidement possible. Dans la majorité des cas, I''infarctus du myocarde se révèle à travers les signes suivants :', '', '', 0, 2, 3, 10, 1, NULL),
(36, 'Voici les symptômes de l''infarctus du myocarde :\r\n• Violente sensation d’oppression et douleur constrictive (serrement) au milieu de la poitrine, durant au moins 15 minutes, irradiant souvent dans les bras (surtout le gauche) et les épaules, le cou, le maxillaire inférieur et la partie supérieure de l’abdomen.\r\n• Nausée, sensation de faiblesse, sueurs, évt. peau froide et blafarde.\r\n• Sensation d’angoisse, difficultés à respirer.\r\n\r\nAttention: Chez les femmes, les diabétiques et les patients âgés, les symptômes suivants sont souvent les seuls signes d’alarme: difficultés à respirer, nausées inexplicables et vomissements, sensation de pression dans la poitrine, le dos ou l’abdomen.', '', '', 0, 2, 3, 11, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etape_image`
--

CREATE TABLE IF NOT EXISTS `etape_image` (
  `etape_id` int(10) unsigned NOT NULL,
  `image_id` int(10) unsigned NOT NULL,
  `modification` tinyint(1) NOT NULL,
  KEY `etape_image_etape_id_foreign` (`etape_id`),
  KEY `etape_image_image_id_foreign` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etape_image`
--

INSERT INTO `etape_image` (`etape_id`, `image_id`, `modification`) VALUES
(3, 1, 1),
(3, 1, 0),
(4, 1, 0),
(6, 2, 0),
(4, 2, 1),
(7, 3, 0),
(7, 4, 1),
(8, 4, 0),
(9, 4, 0),
(9, 5, 1),
(10, 5, 0),
(10, 6, 1),
(11, 6, 0),
(11, 7, 1),
(12, 7, 0),
(12, 8, 1),
(13, 8, 0),
(15, 8, 0),
(15, 9, 1),
(16, 9, 0),
(16, 10, 1),
(18, 10, 0),
(19, 10, 0),
(20, 11, 0),
(21, 12, 0),
(23, 13, 0),
(24, 13, 0),
(24, 14, 1),
(14, 16, 0),
(17, 17, 0),
(25, 15, 0),
(26, 15, 0),
(22, 18, 0),
(5, 19, 0),
(27, 20, 0),
(28, 21, 0),
(29, 22, 0),
(30, 23, 0),
(31, 24, 0),
(31, 25, 1),
(32, 25, 0),
(33, 28, 0),
(33, 29, 1),
(32, 28, 1),
(34, 30, 0),
(35, 31, 0),
(36, 31, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etat_cours`
--

CREATE TABLE IF NOT EXISTS `etat_cours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `etat_cours`
--

INSERT INTO `etat_cours` (`id`, `nom`) VALUES
(1, 'En cours'),
(2, 'En pause'),
(3, 'Est terminé');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lien_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `lien_image`) VALUES
(1, '1_1.jpg'),
(2, '1_2.jpg'),
(3, '1_3.jpg'),
(4, '1_4.jpg'),
(5, '1_5.jpg'),
(6, '1_6.jpg'),
(7, '1_7.jpg'),
(8, '1_8.jpg'),
(9, '1_9.jpg'),
(10, '1_10.jpg'),
(11, '1_11.jpg'),
(12, '1_12.jpg'),
(13, '1_13.jpg'),
(14, '1_14.jpg'),
(15, '1_15.jpg'),
(16, 'defi.png'),
(17, 'rcp.jpg'),
(18, 'position.jpg'),
(19, '2_1.jpg'),
(20, '2_2.jpg'),
(21, '2_3.jpg'),
(22, '2_4.jpg'),
(23, '2_5.jpg'),
(24, '2_6.jpg'),
(25, '2_7.jpg'),
(28, '2_8.jpg'),
(29, '2_9.jpg'),
(30, '2_10.jpg'),
(31, 'zoneInfarctus.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `invites`
--

CREATE TABLE IF NOT EXISTS `invites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invites_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `invites`
--

INSERT INTO `invites` (`id`, `email`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'invite1@firstmed.ch', '$2y$10$03mw4p6x54qZsTb0qS4SmuFFkdhTLn7FPDRqFN/qAFmb4D9eupNTC', '2016-07-18 12:27:33', '2016-07-19 10:24:47', 'nk0W7QlOVxOeLjxCuEzeoF0v1lClUMmFA3M8SCfbLwCKj18nDt5irticiXEm'),
(3, 'invite3@firstmed.ch', '$2y$10$BkVQ9EuFzHZW3L90Ipyoa.fLEQXyxxQMKNs2CE2mAnYt4HYuSvgFK', '2016-07-20 11:51:24', '2016-07-20 17:07:00', NULL),
(4, 'invite4@firstmed.ch', '$2y$10$TxSZSgeScdn06xJ1iU.oEeNs.A4K7DrR06mhx8fleFAJxgMMqAxve', '2016-07-21 09:26:09', '2016-07-25 13:05:10', 'u39HapkX2geV1JEDEm2A1NacVLQ02zUNzsZKL5jqcCYjPMYctMymk6l3tNm5'),
(5, 'invite5@firstmed.ch', '$2y$10$KRe/blEJI0v.gpkEFNZeAekbRzwG0yobDHMhKPVw/BQQqUQHw5xNa', '2016-07-21 10:31:28', '2016-07-21 10:36:37', 'UlqQ8IwV011Awqxl3EaulNSXwXi9OGUULFhEoDLJz79Qx1eoUBlEhUoRlXnS'),
(6, 'invite6@firstmed.ch', '$2y$10$hVSgdIH1wX6IH6sSunEu1OklFPtbKvCaQpL0wDwDJ2CSnP/FszouG', '2016-07-22 11:39:10', '2016-07-22 11:39:10', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_02_120213_create_posts_table', 1),
('2016_05_23_093039_create_role_table', 1),
('2016_05_23_094011_add_field_to_table', 1),
('2016_05_23_124633_update_table', 1),
('2016_07_05_083122_create_scenarios_table', 1),
('2016_07_05_083233_create_etapes_table', 1),
('2016_06_05_083443_create_reponses_table', 1),
('2016_07_05_115400_add_field_to_table', 2),
('2016_07_05_115519_add_field_to_table', 3),
('2016_07_05_122210_update_table', 4),
('2016_07_05_125109_update_table', 5),
('2016_07_06_093900_add_field_to_table', 6),
('2016_07_06_094837_add_field_to_table', 7),
('2016_07_07_135346_create_scores_table', 8),
('2016_07_08_131920_create_sessions_table', 9),
('2016_07_11_083944_create_type_etapes_table', 10),
('2016_07_11_084059_add_field_to_table', 10),
('2016_07_11_090223_create_types_table', 11),
('2016_07_11_090310_update_table', 12),
('2016_07_11_135316_create_contient_images_table', 13),
('2016_07_11_135322_create_images_table', 13),
('2016_07_12_080846_create_etape_images_table', 14),
('2016_07_12_081208_create_etape_images_table', 15),
('2016_07_12_082320_create_etape_images_table', 16),
('2016_07_14_083225_create_cours_table', 17),
('2016_07_14_084434_create_etat_cours_table', 17),
('2016_07_14_090817_add_paid_to_cours', 18),
('2016_07_14_130328_create_invites_table', 19),
('2016_07_18_121850_create_cours_table', 20),
('2016_07_18_122133_create_cours_table', 21),
('2016_07_18_123806_create_invites_table', 22),
('2016_07_18_132304_create_cours_table', 23),
('2016_07_18_142408_create_invites_table', 24),
('2016_07_19_121251_create_acces_table', 25),
('2016_07_19_124106_create_cours_scenarios_table', 26),
('2016_07_20_185140_create_statistiques_table', 27),
('2016_07_21_130536_create_sessions_table', 28);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reponse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etape_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`id`, `reponse`, `etape_id`) VALUES
(3, 'Vous ignorez la situation', 3),
(5, 'Vous essayez de porter secours ', 3),
(8, 'Je traverse en vérifiant de ne pas me mettre en danger ', 4),
(9, 'Je cours sur la route pour porter secours à la victime ', 4),
(10, 'Je lui tiens les mains et lui demande de me les serrer fortement en lui disant, Monsieur si vous m’entendez serrez-moi les mains', 7),
(11, 'Donner des petites tapes sur le visage et lui demandant si tout va bien ', 7),
(12, 'Vérifier si la victime est consciente.', 6),
(13, 'Couvrir la Victime et la garder au chaud.', 6),
(14, 'Débuter la réanimation cardio pulmonaire.', 8),
(15, 'Vérifier les voies respiratoires de la victime et si il respire.', 8),
(16, 'Pendant 10 secondes, je vérifie si la victime respire : Je place mon visage près de celui de la victime et je regarde sa poitrine et son ventre, mon oreille et ma joue sont au-dessus de la bouche et du nez de la victime.', 9),
(17, 'Pendant 30 secondes je vérifie si la victime respire : Je place mon visage près de celui de la victime et je regarde sa poitrine et son ventre, mon oreille et ma joue sont au-dessus de la bouche et du nez de la victime.', 9),
(18, 'Appeler à l’aide autour de soi.', 10),
(19, 'Laisser la victime et aller chercher de l’aide.', 10),
(20, 'Appeler le 144 pour transmettre les informations et faire venir une ambulance.', 11),
(21, 'De vous aider à vérifier la respiration. ', 11),
(22, 'Demander à l''autre personne d’aller chercher un défibrillateur. \r\n', 12),
(23, 'Demander à l''autre personne d’appeler la Police.', 12),
(24, 'En allant sonner à toutes les portes', 13),
(25, 'Se diriger sur les lieux publics, gare, pharmacie, centre commercial à proximité.', 13),
(26, 'Débuter la réanimation cardio pulmonaire.', 15),
(27, 'Revérifier la respiration.', 15),
(28, 'Au centre, entre les 2 mamelons ', 16),
(29, 'Sur le côté gauche ', 16),
(30, '8-10 cm', 18),
(31, '5-6 cm', 18),
(32, 'Faire 2 insufflations.', 19),
(33, 'S’arrêter et vérifier si il respire.', 19),
(35, 'Vous lui dites d’attendre que vous finissez vos compressions.', 21),
(36, 'Vous lui dites d’ouvrir l’AED de l’allumer et de suivre les consignes de l’AED.', 21),
(37, 'yolo.jpg', 22),
(38, 'position.jpg', 22),
(39, 'Continuer la RCP.', 23),
(40, 'Arrêter la RCP et vous éloigner du patient.', 23),
(41, 'Vérifier que personne ne touche le patient et appuyer ensuite sur le bouton choc.', 24),
(42, 'Appuyer directement sur le bouton délivrer choc.', 24),
(43, 'muta.png', 14),
(44, 'defi.png', 14),
(45, 'rcp.jpg', 17),
(46, 'Vous lui proposer à boire.', 30),
(47, 'Vous lui demandez où se situe sa douleur.', 30),
(48, 'Demande à John d’appeler le 144 pour leur informer de la situation.', 31),
(49, 'Vous proposez à John de le ramener à la maison pour qu’il se repose.', 31),
(50, 'Couché', 32),
(51, 'Semi-assis', 32),
(52, 'Vous lui apportez un verre d''eau.', 33),
(53, 'Vous lui déboutonnez la chemise, ceinture afin de simplifier sa respiration.', 33),
(54, 'Douleur dans la poitrine.', 34),
(55, 'Mal de tête.', 34),
(56, 'Douleur à la jambe.', 34),
(57, 'Douleur à la tête.', 34),
(58, 'Palpitations', 34),
(59, 'Essoufflements', 34),
(60, 'Nausées.', 34),
(61, 'Douleur irradiant souvent dans les bras (surtout le gauche) et les épaules, le cou, le maxillaire inférieur et la partie supérieure de l’abdomen.', 34),
(62, '54,58,59,60,61', 0);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'administrateur'),
(2, 'moniteur'),
(3, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `scenarios`
--

CREATE TABLE IF NOT EXISTS `scenarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nb_etape` int(11) NOT NULL,
  `pts_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `scenarios`
--

INSERT INTO `scenarios` (`id`, `nom`, `nb_etape`, `pts_max`) VALUES
(1, 'Arrêt cardiaque', 23, 20),
(2, 'Crise cardiaque', 11, 7);

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scenarios_id` int(10) unsigned NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `points` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scores_scenarios_id_foreign` (`scenarios_id`),
  KEY `scores_users_id_foreign` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id`, `scenarios_id`, `users_id`, `points`) VALUES
(1, 1, 1, 20),
(2, 2, 1, 7),
(4, 1, 7, 0),
(5, 2, 7, 0),
(6, 1, 8, 3),
(7, 2, 8, 0),
(8, 1, 9, 11),
(9, 2, 9, 7),
(10, 1, 10, 15),
(11, 2, 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE IF NOT EXISTS `statistiques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scenario_id` int(10) unsigned NOT NULL,
  `cours_id` int(10) unsigned NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `statistiques_scenario_id_foreign` (`scenario_id`),
  KEY `statistiques_cours_id_foreign` (`cours_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Contenu de la table `statistiques`
--

INSERT INTO `statistiques` (`id`, `scenario_id`, `cours_id`, `score`) VALUES
(4, 1, 5, 4),
(5, 1, 5, 15),
(6, 2, 5, 7),
(7, 2, 5, 0),
(8, 2, 5, 3),
(9, 1, 5, 0),
(10, 2, 5, 0),
(11, 1, 6, 1),
(12, 1, 6, 1),
(13, 1, 6, 8),
(14, 2, 6, 0),
(15, 2, 6, 7),
(16, 2, 7, 1),
(17, 1, 6, 0),
(18, 1, 6, 1),
(19, 2, 6, 7),
(20, 1, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `nom`) VALUES
(1, 'information'),
(2, 'reponse'),
(3, 'images'),
(4, 'reponsemultiple');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `active`, `role_id`) VALUES
(1, 'yoyoooo', 'yannick.widmer92@gmail.com', '$2y$10$M4OUiI0PjPakkEMC65uMgOPmOs3AfR08cdeldfe3pg6F3DIzYdQk6', '0kKvz4XEnV4uMJGVdhBQotQabfgjHWF4ZOYfj8iJcNDXh5r0rYVqnXZbX7Ht', '2016-07-05 12:16:48', '2016-07-25 12:47:34', 1, 1),
(7, 'test2', 'test2@gmail.com', '$2y$10$twxhrFbl6zuCnWH04r5wyOAZEr00fXYSt4RYofhk/J04xrRcFwDdG', NULL, '2016-07-08 09:32:31', '2016-07-21 05:28:00', 0, 2),
(8, 'yeye', 'test@test.com', '$2y$10$M4OUiI0PjPakkEMC65uMgOPmOs3AfR08cdeldfe3pg6F3DIzYdQk6', '7lheetGVHSmYD8rgPxdpDGWFBstkItUvheice1oshWYkUFNd1N1fKjDU9mM9', '2016-07-18 18:40:24', '2016-07-20 11:01:09', 1, 2),
(9, 'ASD', 'asd@gmail.com', '$2y$10$2P4FTccL2flEKQ4QRWC4je4ufWAywlXO3iki8ZXybkJrpIoFuSUO2', 'vxd8w1ujMrvpp5SNdO3jikUoyQeQS53o25LbeYztNMajZZaDV9nQlFIin1Mf', '2016-07-21 10:22:02', '2016-07-21 11:24:38', 1, 1),
(10, 'youn', 'yountheory@gmail.com', '$2y$10$xOTe2BId7GzkATGNVRyir.mtzkYmYLZEOTO2TZT7SQihnUXgy4Lau', 'm6gQuI1g6oQnSO8HGATo9hpdXnMgfvxAYObo0GKGkdESnM3kItnFWNqrkLY6', '2016-07-22 11:35:27', '2016-07-22 12:41:08', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`etat_cours_id`) REFERENCES `etat_cours` (`id`),
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`invites_id`) REFERENCES `invites` (`id`),
  ADD CONSTRAINT `cours_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cours_scenario`
--
ALTER TABLE `cours_scenario`
  ADD CONSTRAINT `cours_scenario_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `cours_scenario_scenario_id_foreign` FOREIGN KEY (`scenario_id`) REFERENCES `scenarios` (`id`);

--
-- Contraintes pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD CONSTRAINT `etapes_ibfk_1` FOREIGN KEY (`types_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `etapes_reponses_id_foreign` FOREIGN KEY (`reponse_id`) REFERENCES `reponses` (`id`),
  ADD CONSTRAINT `etapes_scenarios_id_foreign` FOREIGN KEY (`scenario_id`) REFERENCES `scenarios` (`id`);

--
-- Contraintes pour la table `etape_image`
--
ALTER TABLE `etape_image`
  ADD CONSTRAINT `etape_image_etape_id_foreign` FOREIGN KEY (`etape_id`) REFERENCES `etapes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `etape_image_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_scenarios_id_foreign` FOREIGN KEY (`scenarios_id`) REFERENCES `scenarios` (`id`),
  ADD CONSTRAINT `scores_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD CONSTRAINT `statistiques_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `statistiques_scenario_id_foreign` FOREIGN KEY (`scenario_id`) REFERENCES `scenarios` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
