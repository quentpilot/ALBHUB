-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 17 mars 2018 à 03:28
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
-- Structure de la table `albi_bills`
--

CREATE TABLE `albi_bills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `company_header` text NOT NULL,
  `client_header` text NOT NULL,
  `content` text NOT NULL,
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `albi_bills_categories`
--

CREATE TABLE `albi_bills_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'warning'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `albi_items`
--

CREATE TABLE `albi_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `table_content` varchar(255) NOT NULL DEFAULT 'albi_items_content',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `albi_items_categories`
--

CREATE TABLE `albi_items_categories` (
  `item_id` int(11) NOT NULL,
  `cats_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `albi_items_content`
--

CREATE TABLE `albi_items_content` (
  `item_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_content` text NOT NULL,
  `text_content` text NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `show_title` int(11) NOT NULL DEFAULT '1',
  `url_name` varchar(255) DEFAULT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `url_target` varchar(255) NOT NULL DEFAULT '_self'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('0nc0n6i3a9n070vlckp17s14p4rr9574', '::1', 1521238054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233383035343b),
('0o400v8nm1q3vlfa1bsoki662mm7agqe', '::1', 1521240203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313234303230333b),
('0spea10a6gj903q8klpl0budra6rsrp7', '::1', 1521241452, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313234313435323b),
('10g9cdp8q232uve6i7odb299fpjn3ffo', '::1', 1521216565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231363536353b),
('1gro4hn90r2c9oacln5c8lmemju04im6', '::1', 1521239340, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233393334303b),
('31l936pc0luk4o1pullctqvcguia37fv', '::1', 1521215632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231353633323b),
('32l1tofai42e66geefq675btc8kdd3ig', '::1', 1521208100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230383130303b),
('3oeoh0oeq478a1rmhjpg5vlbp66bck8q', '::1', 1521207777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230373737373b),
('4erf159qilqjnihif1b0nurb1rtkaf1n', '::1', 1521234985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233343938353b),
('4ij7p3gqnr9tkuhujs9lnfnq7dankvrd', '::1', 1521233153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233333135333b),
('4m4lulbb3okllt0np5e11tgranugjj38', '::1', 1521230585, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233303538353b),
('65ktq73ale4raau47185892vbcd3dhin', '::1', 1521249950, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313234393935303b),
('68qom4gj559ngk58c9aiun0qr3opofm4', '::1', 1521221050, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232313035303b),
('6c39ira56os48ql1ab2o6dqlr6qme32b', '::1', 1521226891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232363839313b),
('7oa8p86r5tnpdnf66q4hg6v03kh1gqg8', '::1', 1521214716, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231343731363b),
('7pqmou00maqs1hk8u5re42f1jhvtocf4', '::1', 1521256922, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313235363839313b),
('7q949t8o41ug40hme3ju7r4slb73d3gv', '::1', 1521238679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233383637393b),
('7r2qoa53h6nlo1ua7sjjbbhc7k1qa80g', '::1', 1521214048, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231343034383b),
('907q0op1e8bmo9v4k75imqtuc75hrflf', '::1', 1521232168, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233323136383b),
('9a735io70fbcmemddd2o3k4ijuia2kk1', '::1', 1521216262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231363236323b),
('a4hj11tib7kk7btcdjl81gn5qbip2gdf', '::1', 1521219600, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231393630303b),
('becbgerc06rb0pn02t3lkkh1lsg24gnn', '::1', 1521217602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231373630323b),
('c6f2btrsfpgobd79if1vhe4slkgjpa4b', '::1', 1521218914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231383931333b),
('cvr0bkk2ald49apkekgijs4qri9eb424', '::1', 1521217915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231373931353b),
('dc272gm2jb63nhrb1de8heafce0o47s2', '::1', 1521232792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233323739323b),
('dipi6ki9ohivgt8fia8k2m725b92oir2', '::1', 1521251148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313235313134383b),
('e5dushef2311n073evf20mi1vhu4q1dq', '::1', 1521220569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232303536393b),
('e6jn6b58n8965j3n25ik4m5ibnq1sl83', '::1', 1521215114, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231353131343b),
('eigho35ip41cnen1c6anu1m83g6cle9v', '::1', 1521215959, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231353935393b),
('ektdiai25licpiqll6esv4jdt5dcspst', '::1', 1521212735, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231323733353b),
('eldfphidk2ntt5l9bhsvu0t2vpeco5na', '::1', 1521219908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231393930383b),
('ep94lk4kdhli3ofhg6m1clkip34b8qb2', '::1', 1521240926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313234303932363b),
('eru9j9bkoud8brjha6nk5osobb0cps6f', '::1', 1521212433, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231323433333b),
('fti7muhrd16turedp638f6aa1vbbrv8c', '::1', 1521206587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230363538373b),
('g9ohdf08b34rcdgscpkg3hpaa5slj5hu', '::1', 1521218243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231383234333b),
('h1ji0r655rhtuomi2vhflrn3pebucdel', '::1', 1521218559, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231383535393b),
('hp4g4jduu65ot1ctqtkifjko5jd4dvd7', '::1', 1521234599, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233343539393b),
('ie4clesgu6qp86a3a6al3fe5ukp02k2g', '::1', 1521220210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232303231303b),
('ieeeac67edqca7a8cneokj5m8kpk31pl', '::1', 1521250672, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313235303637323b),
('ighsfa4dibq7v0r5mdcvc644uqtb8r4f', '::1', 1521238997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233383939373b),
('jnb0p0c4bl8ij2295s9vdomtbtnr3qfa', '::1', 1521251565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313235313536353b),
('kjh68vhtdad4rbrjvk3h5qkebqdu33es', '::1', 1521210072, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231303037323b),
('knnitd15vka9ttm3tfj14lg372o723ob', '::1', 1521247695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313234373639353b),
('l2nvdp1a0tjpa161mpgot1kmghl7dcqs', '::1', 1521213682, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231333638323b),
('l4ctifglbkqumhqc5bu3llp39su31jbq', '::1', 1521216877, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231363837373b),
('ljqgcrstmam8mhvmbft38uau9tb09skp', '::1', 1521231818, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233313831383b),
('m2e9h9vvahius5abj1480ttshg8op1v1', '::1', 1521256891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313235363839313b),
('mhnnh11ehabqbuh99nelhu4cashsv55t', '::1', 1521222310, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232323331303b),
('msm5vcpuqpssa4p2lts3v0ak8bka9akv', '::1', 1521206157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230363135373b),
('nag882t5pn86a8srlh2u2ign12ft75f3', '::1', 1521213047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231333034373b),
('o2femcjq7r0n6bf31k4io301b8od5nj2', '::1', 1521211535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231313533353b),
('opl9o9stntui08jlc0t86ujiro20vu8c', '::1', 1521214381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231343338313b),
('qduh1b6jij938drvikovr79r16s399nl', '::1', 1521208930, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230383933303b),
('qj7gg99gv33dfnh7sq4q8h1rje3nfnc9', '::1', 1521213377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231333337373b),
('r7s13c2oi8o23sdv951rbb8pbli14i7k', '::1', 1521205461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230353436313b),
('rbgo8ncjiuq2qfvva51p3sdcqmefnsjt', '::1', 1521208466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230383436363b),
('rd93tatqo5lrmoc33lgrkdnj92c3p9h9', '::1', 1521221639, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232313633393b),
('rfpoudgk8slnp5oot2v5gpgvjqftipqi', '::1', 1521209377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230393337373b),
('rql30bm446022bt8e1pnq5q6fukhpde3', '::1', 1521205789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230353738393b),
('s9dbpdj2i1mv4r6vtmetk4nuvunq7jqc', '::1', 1521219229, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231393232393b),
('sm5itlc37gop3bh9tdk2qpsqgij9nu9j', '::1', 1521237202, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233373230323b),
('sok0257hijtjka3gs2b522ua6d76a4v7', '::1', 1521230275, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233303237353b),
('sp5tmr67o8t33374am8sjre2iomddm87', '::1', 1521210471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231303437313b),
('stnb6fng81r7mupvvgfjdrghbf479e8a', '::1', 1521212059, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231323035393b),
('t6qs54cj31q8u7nabg59e8j9gh8l4rav', '::1', 1521236030, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233363033303b),
('tecf301dkpv36eih692o7b5jkaf32vra', '::1', 1521222008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232323030383b),
('u4aefphv3083m4hit51cvjfq3951s8qk', '::1', 1521232472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313233323437323b),
('ug4kp63gegbbvi3dalaaipbtfbd36j86', '::1', 1521226374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313232363337343b),
('ulm27nbrd0j1r6lr9sjeetm4vdodoj5r', '::1', 1521240513, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313234303531333b),
('vnf4fv3c7omdlej12d3m6rrmm1flbid9', '::1', 1521217287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313231373238373b);

-- --------------------------------------------------------

--
-- Structure de la table `itm_categories`
--

CREATE TABLE `itm_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `itm_categories`
--

INSERT INTO `itm_categories` (`id`, `name`, `alias`, `status_id`) VALUES
(1, 'Page', 'page', 1),
(2, 'Article', 'article', 1),
(3, 'Widget', 'widget', 0),
(4, 'Navigation Menu', 'nav-menu', 1),
(5, 'Side Menu', 'side-menu', 1),
(6, 'Left Side Menu', 'left-side-menu', 1),
(7, 'Right Side Menu', 'right-side-menu', 1),
(8, 'Tag', 'tag', 1);

-- --------------------------------------------------------

--
-- Structure de la table `itm_items_categories`
--

CREATE TABLE `itm_items_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tpl_layouts`
--

CREATE TABLE `tpl_layouts` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `groups_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invite_token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_networks` text COLLATE utf8mb4_unicode_ci NOT NULL
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
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
  `group_id` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='main users infos';

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `albi_bills`
--
ALTER TABLE `albi_bills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `albi_bills_categories`
--
ALTER TABLE `albi_bills_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `albi_items`
--
ALTER TABLE `albi_items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `albi_items_categories`
--
ALTER TABLE `albi_items_categories`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `albi_items_content`
--
ALTER TABLE `albi_items_content`
  ADD PRIMARY KEY (`item_id`);

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
-- Index pour la table `itm_categories`
--
ALTER TABLE `itm_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `itm_items_categories`
--
ALTER TABLE `itm_items_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tpl_layouts`
--
ALTER TABLE `tpl_layouts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `albi_bills`
--
ALTER TABLE `albi_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `albi_bills_categories`
--
ALTER TABLE `albi_bills_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `albi_items`
--
ALTER TABLE `albi_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `albi_settings`
--
ALTER TABLE `albi_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `itm_categories`
--
ALTER TABLE `itm_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `itm_items_categories`
--
ALTER TABLE `itm_items_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tpl_layouts`
--
ALTER TABLE `tpl_layouts`
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
