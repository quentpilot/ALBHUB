-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 15 mars 2018 à 05:18
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pw_albi`
--

-- --------------------------------------------------------

--
-- Structure de la table `albi_settings`
--

CREATE TABLE `albi_settings` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '/',
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `fonts` varchar(255) DEFAULT NULL,
  `fg_color` varchar(255) NOT NULL DEFAULT '#000000',
  `bg_color` varchar(2555) NOT NULL DEFAULT '#FFFFFF',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0ebaehctbcgo1q8orisr8l8jlsk60va7', '::1', 1521070822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037303832323b),
('0rq3h18ctia5u87c2hogf7gb9jqhkjni', '::1', 1521070495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037303439353b),
('11jkiqsdsvoi1nd5c1sup72f57paocdu', '::1', 1521089647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038393634373b),
('1aoov361176g6422ruag994vr70u3jeu', '::1', 1521090266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039303236363b),
('1mcekctkl1icdpbs5n4gknbl0ohshbmh', '::1', 1521064721, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036343732313b),
('21nl63a95v2egd6rm619tdjkqite8ful', '::1', 1521088238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038383233383b),
('2545kkjbtlc6tseb572je6jbkgap3ed1', '::1', 1521071319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037313133333b),
('28nq7dic40t4lai1f74q6p9asrs7b6eu', '::1', 1521090372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039303236363b),
('332rhqti7ettdkt59a9mmnkt4cg8b580', '::1', 1521056995, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035363939353b),
('3i9ivh8n6bfi4goo8khdkkgo7g3bhn1c', '::1', 1521058589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035383538393b),
('3tvu72jj9bchfgig83ltjhtiflseh5te', '::1', 1521063792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036333739323b),
('4uitu47kbr4senvtk01673apnoasu9ui', '::1', 1521085080, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038353038303b),
('578ii74fuiihgbbi2d1safrl0kdbatc5', '::1', 1521059206, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035393230363b),
('5srb2un7pv05kqt596gsai9afpmosh9l', '::1', 1521081924, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038313932343b),
('6j68a0lhdati8f5k3nk3icqlmk68rv4q', '::1', 1521087262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038373236323b),
('8dad9nh2o3l9h6631nk5lsagn53uhl43', '::1', 1521059575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035393537353b),
('8gt914s477j3a506b7e561ban8mmd54d', '::1', 1521062557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036323535373b),
('91048rk4csq5uq4bsulbfkta10fpm02t', '::1', 1521065737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036353733373b),
('9t8rm2uhq9de9ot01q21cpklphnrdkhk', '::1', 1521061381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036313338313b),
('ahlqodi2s3set3u3oss7p5pnbk6ic1f3', '::1', 1521082459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038323435393b),
('bkhf52nda5mqq6lj828dj7nqqcrko3pf', '::1', 1521053548, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035333534383b),
('d3s1u04r59fucu65n2t1k23s6oii1vhi', '::1', 1521066113, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036363131333b),
('dvo1hqvm2avifgq5muefb9peqjdt7qaf', '::1', 1521058899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035383839393b),
('f48supla6pi5q7p0vn0dnrt8gnsftgdf', '::1', 1521064098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036343039383b),
('f63le4e1vcjcbke75nd7a0o5m07gdmo3', '::1', 1521079236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037393233363b),
('f9t1od82r1o4djrk1e8ppfhg6lou2rtu', '::1', 1521089962, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038393936323b),
('fj8gg86rbe5d5ot6pqjed1vm9jpo7oua', '::1', 1521067843, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036373834333b),
('h154coknse4nool6s6lq8r0rqnng6vdn', '::1', 1521052261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035323236313b),
('h3nopnavfbfgfb01j9kad40de2d7fuin', '::1', 1521056265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035363236353b),
('hcofafgghl4ttd8pfnulc636ep656nu4', '::1', 1521060333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303333333b),
('inf6rh4c7gn20i5tk6hsi6bu8op69v1m', '::1', 1521064399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036343339393b),
('kdm85lb2rng0de3vm3hjn6918849a2b6', '::1', 1521088658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038383635383b),
('luq7r5jmslk9kcu779e43lbdub821jk6', '::1', 1521060806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303830363b),
('lvq1nii0k6fmvuc9s3bumd1398qlp984', '::1', 1521071133, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037313133333b),
('mirg37htt7f5p9rh12vg37j66o6k2fgi', '::1', 1521087720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038373732303b),
('mp4qkhai5na1m8lf04cfuhcl0npnjn97', '::1', 1521065391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036353339313b),
('nqs3ulgmbbmealm3rdqbe9fd6avhgmmt', '::1', 1521063358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036333335383b),
('o4ragcs0v4mpccbspcsqj66t3vtoapec', '::1', 1521058207, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035383230373b),
('p7g9b6ln8nsimtij67d0ajci4tcv6pc8', '::1', 1521082834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038323833343b),
('pc8a5f6c4mbggqj29pahufer7av3dqrm', '::1', 1521057388, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035373338383b),
('pu01co073r54ur5dsprf81m8jqrpsju9', '::1', 1521050973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035303937333b),
('r27bv68kplbtfion6r9t2sv2b94lkeep', '::1', 1521066482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036363438323b),
('rp05401lj16tugstqs230b8fjb801lqa', '::1', 1521060031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303033313b),
('rv9gp9vfo8or4fh7l4bq8lahfjl3hgpg', '::1', 1521084767, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038343736373b),
('trm63psuqfc29af3lvrdlqee57jn8afr', '::1', 1521083245, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038333234353b),
('us2ce7iq74ncsg4oiagajk8vf7eree28', '::1', 1521083562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038333536323b),
('v7hg2kpu265gnlqo26q1tg91m84jtfbj', '::1', 1521057901, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035373930313b),
('vceevjaktn0g5bcl7i8fcgatsqs2q27h', '::1', 1521065034, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036353033343b);

-- --------------------------------------------------------

--
-- Structure de la table `tpl_templates`
--

CREATE TABLE `tpl_templates` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tpl_types`
--

CREATE TABLE `tpl_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'One Page',
  `slug` varchar(255) NOT NULL DEFAULT 'onepage'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `usr_advanded_infos`
--

CREATE TABLE `usr_advanded_infos` (
  `user_id` int(11) NOT NULL,
  `firstame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `usr_groups`
--

CREATE TABLE `usr_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `usr_settings`
--

CREATE TABLE `usr_settings` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `usr_status`
--

CREATE TABLE `usr_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `usr_users`
--

CREATE TABLE `usr_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Anonymous',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_email` int(11) NOT NULL DEFAULT '0',
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_log` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='main users infos';

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `albi_settings`
--
ALTER TABLE `albi_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Index pour la table `tpl_templates`
--
ALTER TABLE `tpl_templates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tpl_types`
--
ALTER TABLE `tpl_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usr_advanded_infos`
--
ALTER TABLE `usr_advanded_infos`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Index pour la table `usr_groups`
--
ALTER TABLE `usr_groups`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `usr_settings`
--
ALTER TABLE `usr_settings`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `usr_status`
--
ALTER TABLE `usr_status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usr_users`
--
ALTER TABLE `usr_users`
  ADD UNIQUE KEY `user_id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `albi_settings`
--
ALTER TABLE `albi_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tpl_templates`
--
ALTER TABLE `tpl_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tpl_types`
--
ALTER TABLE `tpl_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `usr_groups`
--
ALTER TABLE `usr_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `usr_status`
--
ALTER TABLE `usr_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `usr_users`
--
ALTER TABLE `usr_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
