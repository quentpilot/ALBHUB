-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 16 mars 2018 à 14:20
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
-- Structure de la table `albi_categories`
--

CREATE TABLE `albi_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `albi_categories`
--

INSERT INTO `albi_categories` (`id`, `name`, `alias`, `status_id`) VALUES
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
-- Structure de la table `albi_items`
--

CREATE TABLE `albi_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
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
  `tags` varchar(255) DEFAULT NULL
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
('0ebaehctbcgo1q8orisr8l8jlsk60va7', '::1', 1521070822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037303832323b),
('0ii5s3ue4i7npobnsni2dq2r0197aes6', '::1', 1521152374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135323337343b),
('0rq3h18ctia5u87c2hogf7gb9jqhkjni', '::1', 1521070495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037303439353b),
('0vtd7t5mlug412jo4jin0s03a37ljms6', '::1', 1521131207, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133313230373b),
('11jkiqsdsvoi1nd5c1sup72f57paocdu', '::1', 1521089647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038393634373b),
('1aoov361176g6422ruag994vr70u3jeu', '::1', 1521090266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039303236363b),
('1do5h11ksd6rbtstcagfph3o2u5rg602', '::1', 1521202913, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230323931333b),
('1i9cu4bdp4qrho3aggjr4epond7ih9t7', '::1', 1521138610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133383631303b),
('1mcekctkl1icdpbs5n4gknbl0ohshbmh', '::1', 1521064721, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036343732313b),
('1mro08daqtp964obshm1jodtjefed7vu', '::1', 1521203337, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230333333373b),
('21nl63a95v2egd6rm619tdjkqite8ful', '::1', 1521088238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038383233383b),
('2545kkjbtlc6tseb572je6jbkgap3ed1', '::1', 1521071319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037313133333b),
('28nq7dic40t4lai1f74q6p9asrs7b6eu', '::1', 1521091774, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039313737343b),
('2d9t8c6ocfera8q57kbdr2rrt46dkik3', '::1', 1521152755, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135323735353b),
('32l1tofai42e66geefq675btc8kdd3ig', '::1', 1521208100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230383130303b),
('332rhqti7ettdkt59a9mmnkt4cg8b580', '::1', 1521056995, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035363939353b),
('378g3sdj42q5k74s0v1gq40qc400t586', '::1', 1521203692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230333639323b),
('3i9ivh8n6bfi4goo8khdkkgo7g3bhn1c', '::1', 1521058589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035383538393b),
('3oeoh0oeq478a1rmhjpg5vlbp66bck8q', '::1', 1521207777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230373737373b),
('3ruil7pkagbcvp0mt4n6jkdtmjle9beh', '::1', 1521205112, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230353131323b),
('3tvu72jj9bchfgig83ltjhtiflseh5te', '::1', 1521063792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036333739323b),
('41ec8ip18m87al3hqd7mvikjngjb9b1q', '::1', 1521134456, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133343435363b),
('45e4mi85vdsj5e196r8paitqmgi45qd9', '::1', 1521204397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230343339373b),
('4on3p7tshlattj9koh05qlv0h4p8sgcj', '::1', 1521146815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313134363831353b),
('4uitu47kbr4senvtk01673apnoasu9ui', '::1', 1521085080, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038353038303b),
('578ii74fuiihgbbi2d1safrl0kdbatc5', '::1', 1521059206, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035393230363b),
('5iplk1l415b97fi0p3u4e4i5gh29qlqc', '::1', 1521095108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039353130383b),
('5mljamg7tarhhvrh9amt2292tmg1ipa3', '::1', 1521129945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313132393934353b),
('5ouk0mmbuh6vqt3j4lin8qnhcphj70ke', '::1', 1521142382, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313134323338323b),
('5srb2un7pv05kqt596gsai9afpmosh9l', '::1', 1521081924, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038313932343b),
('6igs0usbedsnte1gpe716unbroi8g56h', '::1', 1521155791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135353739313b),
('6j68a0lhdati8f5k3nk3icqlmk68rv4q', '::1', 1521087262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038373236323b),
('783amlji51rqct1jveu33u179tbjucp5', '::1', 1521096050, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039363035303b),
('7dlhertu07e763vp5eteovj7k9vkk2pn', '::1', 1521138991, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133383939313b),
('8dad9nh2o3l9h6631nk5lsagn53uhl43', '::1', 1521059575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035393537353b),
('8gt914s477j3a506b7e561ban8mmd54d', '::1', 1521062557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036323535373b),
('91048rk4csq5uq4bsulbfkta10fpm02t', '::1', 1521065737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036353733373b),
('9ak9kc098les5pq745h687dbpdtrdojn', '::1', 1521093956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039333935363b),
('9kghdajn4rlr7d4n856f4s6nahh448i9', '::1', 1521094383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039343338333b),
('9t8rm2uhq9de9ot01q21cpklphnrdkhk', '::1', 1521061381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036313338313b),
('ahlqodi2s3set3u3oss7p5pnbk6ic1f3', '::1', 1521082459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038323435393b),
('bkhf52nda5mqq6lj828dj7nqqcrko3pf', '::1', 1521053548, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035333534383b),
('c9242mc899euvke73laia73j580mopto', '::1', 1521092917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039323931373b),
('d3s1u04r59fucu65n2t1k23s6oii1vhi', '::1', 1521066113, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036363131333b),
('d6st3dc9hm5hc46etmki99j2nn18urs8', '::1', 1521131896, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133313839363b),
('dl6phrmn1ln93i8ltb3g9045go6um07e', '::1', 1521204809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230343830393b),
('dvo1hqvm2avifgq5muefb9peqjdt7qaf', '::1', 1521058899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035383839393b),
('e8nvoavfacbal11tcg937k93h5q040ci', '::1', 1521137383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133373338333b),
('elblig6n5af7pf6hdbhknkrrd4g47354', '::1', 1521132231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133323233313b),
('f48supla6pi5q7p0vn0dnrt8gnsftgdf', '::1', 1521064098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036343039383b),
('f63le4e1vcjcbke75nd7a0o5m07gdmo3', '::1', 1521079236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037393233363b),
('f9t1od82r1o4djrk1e8ppfhg6lou2rtu', '::1', 1521089962, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038393936323b),
('fj8gg86rbe5d5ot6pqjed1vm9jpo7oua', '::1', 1521067843, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036373834333b),
('fti7muhrd16turedp638f6aa1vbbrv8c', '::1', 1521206587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230363538373b),
('ga5o6c3qqhnpq5stp8kicniuenu9pj45', '::1', 1521149579, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313134393537393b),
('gj2nvbfcuronou74hbafg53t2ec684oh', '::1', 1521130277, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133303237373b),
('gr87o47h22uqi3tqosenile8unpl8l79', '::1', 1521157648, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135373634383b),
('h154coknse4nool6s6lq8r0rqnng6vdn', '::1', 1521052261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035323236313b),
('h3nopnavfbfgfb01j9kad40de2d7fuin', '::1', 1521056265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035363236353b),
('hcofafgghl4ttd8pfnulc636ep656nu4', '::1', 1521060333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303333333b),
('ih9depbg8uqgh6mn0i8fhbdc3mitebpa', '::1', 1521092584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039323538343b),
('inf6rh4c7gn20i5tk6hsi6bu8op69v1m', '::1', 1521064399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036343339393b),
('irvlrvrqb33c3o4tfmivvn2570o5vcuj', '::1', 1521149883, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313134393838333b),
('j0bufgmmns2pnbfg5oeb13ft00ul1uet', '::1', 1521132689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133323638393b),
('j3utinffuu1085dt92a6aamrllgq5etp', '::1', 1521159254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135393235333b),
('k9sqndi67e0c6003o98foma9p048sstp', '::1', 1521159253, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135393235333b),
('kdklald01amg1c4nq4vaisluentq6d8l', '::1', 1521130811, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133303831313b),
('kdm85lb2rng0de3vm3hjn6918849a2b6', '::1', 1521088658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038383635383b),
('kjh68vhtdad4rbrjvk3h5qkebqdu33es', '::1', 1521209378, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230393337373b),
('luq7r5jmslk9kcu779e43lbdub821jk6', '::1', 1521060806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303830363b),
('lvq1nii0k6fmvuc9s3bumd1398qlp984', '::1', 1521071133, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313037313133333b),
('m9ps7uqk65pchl81f61rojtlroic7t7r', '::1', 1521204088, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230343038383b),
('mirg37htt7f5p9rh12vg37j66o6k2fgi', '::1', 1521087720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038373732303b),
('mp4qkhai5na1m8lf04cfuhcl0npnjn97', '::1', 1521065391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036353339313b),
('msm5vcpuqpssa4p2lts3v0ak8bka9akv', '::1', 1521206157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230363135373b),
('mv7b1fp8iia00pto45g9vmd1ll900kur', '::1', 1521133724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133333732343b),
('nqs3ulgmbbmealm3rdqbe9fd6avhgmmt', '::1', 1521063358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036333335383b),
('o4ragcs0v4mpccbspcsqj66t3vtoapec', '::1', 1521058207, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035383230373b),
('o8t7bcpahi7cc5lqgv1kmiho5paj2n8j', '::1', 1521097225, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039373232353b),
('p7g9b6ln8nsimtij67d0ajci4tcv6pc8', '::1', 1521082834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038323833343b),
('pc8a5f6c4mbggqj29pahufer7av3dqrm', '::1', 1521057388, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035373338383b),
('pgprktr0tt4p497gpnm1tm661pdn6gu8', '::1', 1521095608, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039353630383b),
('pll734o453q712016p45jb14ui7m8els', '::1', 1521133078, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133333037383b),
('pu01co073r54ur5dsprf81m8jqrpsju9', '::1', 1521050973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035303937333b),
('qduh1b6jij938drvikovr79r16s399nl', '::1', 1521208930, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230383933303b),
('r27bv68kplbtfion6r9t2sv2b94lkeep', '::1', 1521066482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036363438323b),
('r7c4r90nqvtdj3uu5vpnmiv7pvrsqa07', '::1', 1521097230, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039373232353b),
('r7s13c2oi8o23sdv951rbb8pbli14i7k', '::1', 1521205461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230353436313b),
('rbgo8ncjiuq2qfvva51p3sdcqmefnsjt', '::1', 1521208466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230383436363b),
('re245tgoujg5r5d3t8qffog674i4p8t3', '::1', 1521133413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133333431333b),
('rfpoudgk8slnp5oot2v5gpgvjqftipqi', '::1', 1521209377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230393337373b),
('rg07jl4u54aanmafoeuvus5qc7h52m4n', '::1', 1521153116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135333131363b),
('rp05401lj16tugstqs230b8fjb801lqa', '::1', 1521060031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036303033313b),
('rql30bm446022bt8e1pnq5q6fukhpde3', '::1', 1521205789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313230353738393b),
('rqsaaj6l86uv78l7t3bbdvctuojsgspg', '::1', 1521150635, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135303633353b),
('rv9gp9vfo8or4fh7l4bq8lahfjl3hgpg', '::1', 1521084767, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038343736373b),
('sfea1k7noo58q098bkgkqa675uhfl1p7', '::1', 1521131575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313133313537353b),
('sqn7i8grp8tcq3qsodhjcrvcdoj82f04', '::1', 1521129112, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313132393131323b),
('trm63psuqfc29af3lvrdlqee57jn8afr', '::1', 1521083245, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038333234353b),
('urfo8a60u0qfdo7066uklf2rei4mirm8', '::1', 1521149161, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313134393136313b),
('urma39aetr3r6cnv7c4tcpu63i8p1jca', '::1', 1521158737, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313135383733373b),
('us2ce7iq74ncsg4oiagajk8vf7eree28', '::1', 1521083562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313038333536323b),
('v7hg2kpu265gnlqo26q1tg91m84jtfbj', '::1', 1521057901, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313035373930313b),
('vceevjaktn0g5bcl7i8fcgatsqs2q27h', '::1', 1521065034, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313036353033343b),
('vdq7qve5qveb6s2g7ccdfr57puqh0avi', '::1', 1521096768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313039363736383b);

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
-- Index pour la table `albi_categories`
--
ALTER TABLE `albi_categories`
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
-- AUTO_INCREMENT pour la table `albi_categories`
--
ALTER TABLE `albi_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
