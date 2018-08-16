-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2018 at 09:18 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `howldpst_bcofficial`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblAnnouncement`
--

CREATE TABLE `tblAnnouncement` (
  `announcement_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  `date_added` varchar(30) NOT NULL,
  `message` varchar(4096) NOT NULL,
  `thumbnail_message` varchar(200) NOT NULL,
  `min_rank` varchar(11) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblAnnouncement`
--

INSERT INTO `tblAnnouncement` (`announcement_id`, `student_id`, `name`, `date`, `date_added`, `message`, `thumbnail_message`, `min_rank`, `active`) VALUES
(1, 1, 'Hostel Notice', '2018-01-25', '2018-01-03', 'Hostel Notice\r\n\r\nPlease send this through to all classes. \r\n\r\nThe final day in which yu can accommodate your room is 8th December. This means that the 8th is the final day in which you must move out.\r\n\r\nUpon moving out, please return your key to the security house. You need to ask for an envelope. The envelope must have the following information (you need to write it on the envelope): \r\n1. Name + Last name\r\n2. Residence Name\r\n3. Room number\r\n\r\nThank you and sorry for the notice during the exam block.', 'The final day in which yu can accommodate your room is 8th December. This means that the 8th is the final day in which you must move out.', '4', '-1'),
(4, 1, 'Beta testers for app', '2018-01-20', '2018-01-03', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed porta libero, quis porta leo. In hac habitasse platea dictumst. Quisque vel mi a turpis molestie lacinia. Vivamus varius vehicula convallis. Maecenas gravida orci eu nisl lacinia dapibus. Phasellus maximus pharetra congue. Duis vitae sodales ipsum, ut faucibus felis. Etiam iaculis id ipsum sit amet tempus. Aliquam lobortis est sed justo malesuada tempus. Aliquam ut convallis orci, at gravida sapien. Pellentesque in purus tempor, aliquet magna non, sagittis ex. Cras congue libero sed orci ornare, sit amet feugiat arcu aliquam. Curabitur congue euismod turpis, eu bibendum lectus. Etiam tempus lectus eget lacinia maximus. Etiam at mauris vitae dolor tempus finibus. Pellentesque pulvinar velit at justo sodales sagittis.\r\n\r\nMaecenas efficitur commodo lorem, eget consequat justo placerat et. Donec at ornare felis, eget commodo leo. Ut auctor vel nulla ut porta. Suspendisse at est libero. Maecenas quis facilisis sem. Nam quis laoreet nunc, ut elementum felis. Integer luctus lacus nisi, vel porttitor risus aliquam ut. Donec ullamcorper nibh at est eleifend ultricies. Cras commodo congue tincidunt. Suspendisse sollicitudin sapien sit amet eros fringilla posuere. Nam venenatis quis mauris eget maximus. Phasellus sagittis magna in sapien pellentesque, eu aliquam metus pulvinar. Nullam tempor at leo eu fermentum. Vestibulum eleifend scelerisque metus, vehicula ornare ex maximus at. In dignissim, erat non eleifend blandit, elit tellus vulputate nisi, eget imperdiet massa augue eu ipsum.\r\n\r\nPraesent ut metus pharetra nisl placerat dapibus a at urna. Donec in elementum metus, ac lobortis turpis. Fusce pharetra, neque at fringilla sollicitudin, erat massa sodales erat, ac blandit ante eros ac metus. Cras sagittis faucibus tempus. Praesent porttitor magna ac neque bibendum, ut rutrum lectus bibendum. Suspendisse ante quam, pharetra vel eros in, bibendum finibus nisl. Sed pellentesque dignissim ante, sed tempor neque tempus quis. Vivamus elementum lacus sed ex mollis tincidunt. Vestibulum ullamcorper erat quam, in porttitor ante eleifend nec. Fusce vel augue sed justo rhoncus malesuada eu ornare elit. Aliquam erat volutpat. ', 'Hi Everyone, including the guest users. I am opening the BCOfficial app open for beta testing the app. I must make this perfect. ', '0', '-1'),
(3, 1, 'Need Newspapers ', '2018-02-22', '2018-02-18', 'Hi, Natasja asked our help to collect full newspapers for the technical challenge on the 1st of February, she needs at least 60.\r\n\r\nSo can I ask that everyone please get at least 4 full newspapers each, but if you can get more it will be wonderful. It can be any newspaper that you or your family bought, it doesn\'t have be new, as long as it is a whole newspaper..\r\n\r\nPlease bring them on our first meeting.\r\n\r\nThank you.', 'Hi, Natasja asked our help to collect full newspapers for the technical challenge on the 1st of February, she needs at least 60.', '8', '-1'),
(5, 11, 'General Announcement', '2018-01-26', '2018-01-15', 'Good afternoon, I spoke to the Admin personnel today, we have to help with registrations next week. It will be Monday - Wednesday 7:30 - 17:00. So please meet me at the lawn in front of the Admin Office at 7:20. Everyone must please be there.\n\nFurthermore, Natasja wants the proposal for the Fun day activities as soon as possible, so please post your ideas on the group for activities we can do, before tomorrow evening. Then we will take a vote on which to do. Remember, it can&#39;t take too long, +- 10 mins per activity, it should accommodate students of all shapes and sizes, also the deaf students. And must not be expensive...', 'Good afternoon, I spoke to the Admin personnel today, we have to help with registrations next week. It will be Monday - Wednesday 7:30 - 17:00. So please meet me at the lawn in front of the Admin Offi', '8', '-1'),
(12, 1, 'Die announcement is vir Renier, Tanya ', '2018-01-27', '2018-01-26', 'Testing students announcements', 'Testing students announcements', '4', '0'),
(13, 1, 'Testing New Announcement Dialog', '2018-01-27', '2018-01-26', 'What whaatttt', 'What whaatttt', '4', '0'),
(14, 1, 'Testing Ban', '2018-01-29', '2018-01-28', 'Fucking announced ', 'Fucking announced ', '0', '0'),
(15, 1, 'Testing Ban ', '2018-01-28', '2018-01-28', 'Fucking announcement', 'Fucking announcement', '4', '0'),
(16, 1, 'Heyyyyy', '2018-01-30', '2018-01-29', 'This event is going to be fucking epic', 'This event is going to be fucking epic', '4', '0'),
(17, 21, 'Casino Night Details', '2018-02-14', '2018-02-08', 'As Tanya mentioned in the meeting, for the Valentine&#39;s Casino night each student is allowed to order 2 alcoholic drinks for the evening.\n\nOne SRC member from each class needs to come and get an alcoholic beverage order form from me tomorrow. \n\nYou can find me at the following locations on the following time intervals:\nâ€¢ Infront of Zeta in the morning from 07:30 to 08:00\nâ€¢ Infront/Inside Zeta in the 15 minute break time (from 10:00 to 10:15)\nâ€¢ At the tuckshop from 12:00 to 13:00\n\nPlease note the students must pay for their order before or on the 12th of February (next monday) in order to receive their drinks at the event. All of you need to hand in your forms on the 13th of February (at next Tuesdays meeting) even if you did not collect any orders from your class, I still need the forms back.\n\nJust inform your class that this pre-order is just for alcoholic drinks. They can still buy normal softdrinks and Dragons at the event itself without a pre-order.\n\nPlease everyone it&#39;s important to get these forms from me tomorrow otherwise your class won&#39;t get the opportunity to order drinks.', 'As Tanya mentioned in the meeting, for the Valentine&#39;s Casino night each student is allowed to order 2 alcoholic drinks for the evening.', '7', '-1'),
(19, 21, 'Tuck Shop Menu', '2018-02-23', '2018-02-18', 'The lady at the tuckshop will be selling Muffins from tomorrow @ R10, and Milk tart from Wednesday, but she will still confirm the price.\r\n\r\nAlso, if you want to buy Bunny Chows for Friday, you must please place your order with her at the tuck shop, before/on Wednesday.\r\n\r\nFrom now on she&#39;ll let us know about anything special she&#39;s selling.', 'The lady at the tuckshop will be selling Muffins from tomorrow @ R10, and Milk tart from Wednesday, but she will still confirm the price.', '4', '-1'),
(18, 21, 'New App Update Available', '2018-02-09', '2018-02-08', 'Changes:\r\n~ New app icon. \r\n~ Special Character fix on names and descriptions.\r\n~ Removed location marker card in event dails.\r\n~ Added changes tracker table on name and surname. \r\n~ Removed Road map menu item and Added Survey menu item.\r\n~ Fixed spelling mistake from Signout to sign out. ', 'Changes:\n~ New app icon. \n~ Special Character fix on names and descriptions.\n~ Removed location marker card in event dails.\n~ Added changes tracker table on name and surname. ', '0', '-1'),
(20, 21, 'New App Update Available', '2018-02-15', '2018-02-13', 'Changes:\n~ Minor fixes to Admin area\n~ Minor fixes to Student Area', 'Changes:\n~ Minor fixes to Admin area\n~ Minor fixes to Student Area', '0', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `tblAppSettings`
--

CREATE TABLE `tblAppSettings` (
  `app_id` int(11) NOT NULL,
  `item_belgium_map` bit(1) NOT NULL,
  `item_mark_tracker` bit(1) NOT NULL,
  `item_mr_miss_bc` bit(1) NOT NULL,
  `item_talent_show` bit(1) NOT NULL,
  `item_communicate` bit(1) NOT NULL,
  `item_administration` bit(1) NOT NULL,
  `auto_update` varchar(2) NOT NULL,
  `item_survey` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblAppSettings`
--

INSERT INTO `tblAppSettings` (`app_id`, `item_belgium_map`, `item_mark_tracker`, `item_mr_miss_bc`, `item_talent_show`, `item_communicate`, `item_administration`, `auto_update`, `item_survey`) VALUES
(1, b'1', b'1', b'0', b'0', b'1', b'1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblBadWords`
--

CREATE TABLE `tblBadWords` (
  `word_id` int(11) NOT NULL,
  `word` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblBadWords`
--

INSERT INTO `tblBadWords` (`word_id`, `word`) VALUES
(2, '$#!+'),
(3, '$1ut'),
(4, '$h1t'),
(5, '$hit'),
(6, '$lut'),
(7, '\'ho'),
(8, '\'hobag'),
(9, 'a$$'),
(10, 'anal'),
(11, 'anus'),
(12, 'ass'),
(13, 'assmunch'),
(14, 'b1tch'),
(15, 'ballsack'),
(16, 'bastard'),
(17, 'beaner'),
(18, 'beastiality'),
(19, 'biatch'),
(20, 'beeyotch'),
(21, 'bitch'),
(22, 'bitchy'),
(23, 'blow job'),
(24, 'blow me'),
(25, 'blowjob'),
(26, 'bollock'),
(27, 'bollocks'),
(28, 'bollok'),
(29, 'boner'),
(30, 'boob'),
(31, 'bugger'),
(32, 'buttplug'),
(33, 'c-0-c-k'),
(34, 'c-o-c-k'),
(35, 'c-u-n-t'),
(36, 'c.0.c.k'),
(37, 'c.o.c.k.'),
(38, 'c.u.n.t'),
(39, 'jerk'),
(40, 'jackoff'),
(41, 'jackhole'),
(42, 'j3rk0ff'),
(43, 'homo'),
(44, 'hom0'),
(45, 'hobag'),
(47, 'h0mo'),
(48, 'h0m0'),
(49, 'goddamn'),
(50, 'goddammit'),
(51, 'godamnit'),
(52, 'god damn'),
(53, 'ghey'),
(54, 'ghay'),
(55, 'gfy'),
(56, 'gay'),
(57, 'fudgepacker'),
(58, 'fudge packer'),
(59, 'fuckwad'),
(60, 'fucktard'),
(61, 'fuckoff'),
(62, 'fucker'),
(63, 'fuck-tard'),
(64, 'fuck off'),
(65, 'fuck'),
(66, 'fellatio'),
(67, 'fellate'),
(68, 'felching'),
(69, 'felcher'),
(70, 'felch'),
(71, 'fartknocker'),
(72, 'fart'),
(73, 'fannybandit'),
(74, 'fanny bandit'),
(75, 'faggot'),
(76, 'fagg'),
(77, 'fag'),
(78, 'f.u.c.k'),
(79, 'f-u-c-k'),
(80, 'f u c k'),
(81, 'dyke'),
(82, 'douchebag'),
(83, 'douche'),
(84, 'douch3'),
(85, 'doosh'),
(86, 'dildo'),
(87, 'dike'),
(88, 'dick'),
(92, 'd1ldo'),
(93, 'd1ld0'),
(94, 'd1ck'),
(95, 'd0uche'),
(96, 'd0uch3'),
(97, 'cunt'),
(98, 'cumstain'),
(99, 'cum'),
(100, 'crap'),
(101, 'coon'),
(102, 'cock'),
(103, 'clitoris'),
(104, 'clit'),
(105, 'cl1t'),
(106, 'cawk'),
(107, 'c0ck'),
(108, 'jerk0ff'),
(109, 'jerkoff'),
(110, 'jizz'),
(111, 'knob end'),
(112, 'knobend'),
(113, 'labia'),
(114, 'lmfao'),
(115, 'moolie'),
(116, 'muff'),
(117, 'nigga'),
(118, 'nigger'),
(119, 'p.u.s.s.y.'),
(120, 'penis'),
(121, 'piss'),
(122, 'piss-off'),
(123, 'pissoff'),
(124, 'prick'),
(125, 'pube'),
(126, 'pussy'),
(127, 'queer'),
(128, 'retard'),
(129, 'retarded'),
(130, 's hit'),
(131, 's-h-1-t'),
(132, 's-h-i-t'),
(133, 's.h.i.t.'),
(134, 'scrotum'),
(135, 'sex'),
(136, 'sh1t'),
(137, 'shit'),
(138, 'slut'),
(139, 'smegma'),
(140, 't1t'),
(141, 'tard'),
(142, 'terd'),
(143, 'tit'),
(144, 'tits'),
(145, 'titties'),
(146, 'turd'),
(147, 'twat'),
(148, 'vag'),
(149, 'vagina'),
(150, 'wank'),
(151, 'wetback'),
(152, 'whore'),
(153, 'whoreface'),
(154, 'F*ck'),
(155, 'sh*t'),
(156, 'pu$$y'),
(157, 'p*ssy'),
(158, 'diligaf'),
(159, 'wtf'),
(160, 'stfu'),
(161, 'fu*ck'),
(162, 'fack'),
(163, 'shite'),
(164, 'fxck'),
(165, 'sh!t'),
(166, '@sshole'),
(167, 'assh0le'),
(168, 'assho!e'),
(169, 'a$$hole'),
(170, 'a$$h0le'),
(171, 'a$$h0!e'),
(172, 'a$$h01e'),
(173, 'assho1e'),
(174, 'wh0re'),
(175, 'f@g'),
(176, 'f@gg0t'),
(177, 'f@ggot'),
(178, 'motherf*cker'),
(179, 'mofo'),
(180, 'cuntlicker'),
(181, 'cuntface'),
(182, 'dickbag'),
(183, 'douche waffle'),
(184, 'jizz bag'),
(185, 'cockknocker'),
(186, 'beatch'),
(187, 'fucknut'),
(188, 'nucking futs'),
(189, 'mams'),
(190, 'carpet muncher'),
(191, 'ass munch'),
(192, 'ass hat'),
(193, 'cunny'),
(194, 'quim'),
(195, 'clitty'),
(196, 'fuck wad'),
(197, 'kike'),
(198, 'spic'),
(199, 'wop'),
(200, 'chink'),
(201, 'wet back'),
(202, 'mother humper'),
(203, 'feltch'),
(204, 'feltcher'),
(205, 'FvCk'),
(206, 'ahole'),
(207, 'nads'),
(208, 'spick'),
(209, 'douchey'),
(210, 'Bullturds'),
(211, 'gonads'),
(212, 'bitch'),
(213, 'butt'),
(214, 'fellatio'),
(215, 'lmao'),
(216, 's-o-b'),
(217, 'spunk'),
(218, 'he11'),
(219, 'jizm'),
(220, 'jism'),
(221, 'bukkake'),
(222, 'shiz'),
(223, 'wigger'),
(224, 'gook'),
(225, 'ritard'),
(226, 'reetard'),
(227, 'masterbate'),
(228, 'masturbate'),
(229, 'goatse'),
(230, 'masterbating'),
(231, 'masturbating'),
(232, 'hitler'),
(233, 'nazi'),
(234, 'tubgirl'),
(235, 'GTFO'),
(236, 'FOAD'),
(237, 'r-tard'),
(238, 'rtard'),
(239, 'hoor'),
(240, 'g-spot'),
(241, 'gspot'),
(242, 'vulva'),
(243, 'assmaster'),
(244, 'viagra'),
(245, 'Phuck'),
(246, 'frack'),
(247, 'fuckwit'),
(248, 'assbang'),
(249, 'assbanged'),
(250, 'assbangs'),
(251, 'asshole'),
(252, 'assholes'),
(253, 'asswipe'),
(254, 'asswipes'),
(255, 'b1tch'),
(256, 'bastards'),
(257, 'bitched'),
(258, 'bitches'),
(259, 'blow jobs'),
(260, 'boners'),
(261, 'bullshit'),
(262, 'bullshits'),
(263, 'bullshitted'),
(264, 'cameltoe'),
(265, 'camel toe'),
(266, 'camel toes'),
(267, 'chinc'),
(268, 'chincs'),
(269, 'chink'),
(270, 'chode'),
(271, 'chodes'),
(272, 'clit'),
(273, 'clits'),
(274, 'cocks'),
(275, 'coons'),
(276, 'cumming'),
(277, 'cunts'),
(278, 'd1ck'),
(279, 'dickhead'),
(280, 'dickheads'),
(281, 'doggie-style'),
(282, 'dildos'),
(283, 'douchebags'),
(284, 'dumass'),
(285, 'dumb ass'),
(286, 'dumbasses'),
(287, 'dykes'),
(288, 'f-u-c-k'),
(289, 'faggit'),
(290, 'fags'),
(291, 'fucked'),
(292, 'fucker'),
(293, 'fuckface'),
(294, 'fucks'),
(295, 'godamnit'),
(296, 'gooks'),
(297, 'humped'),
(298, 'humping'),
(299, 'jackass'),
(300, 'jap'),
(301, 'japs'),
(302, 'jerk off'),
(303, 'jizzed'),
(304, 'kikes'),
(305, 'knobend'),
(306, 'kooch'),
(307, 'kooches'),
(308, 'kootch'),
(309, 'mother fucker'),
(310, 'mother fuckers'),
(311, 'motherfucking'),
(312, 'niggah'),
(313, 'niggas'),
(314, 'niggers'),
(315, 'p.u.s.s.y.'),
(316, 'porch monkey'),
(317, 'porch monkeys'),
(318, 'pussies'),
(319, 'queers'),
(320, 'rim job'),
(321, 'rim jobs'),
(322, 'sand nigger'),
(323, 'sand niggers'),
(324, 's0b'),
(325, 'shitface'),
(326, 'shithead'),
(327, 'shits'),
(328, 'shitted'),
(329, 's.o.b.'),
(330, 'spik'),
(331, 'spiks'),
(332, 'twats'),
(333, 'whack off'),
(334, 'whores'),
(335, 'zoophile'),
(336, 'm-fucking'),
(337, 'mthrfucking'),
(338, 'muthrfucking'),
(339, 'mutherfucking'),
(340, 'mutherfucker'),
(341, 'mtherfucker'),
(342, 'mthrfucker'),
(343, 'mthrf*cker'),
(344, 'whorehopper'),
(345, 'maternal copulator'),
(347, 'whoralicious'),
(348, 'whorealicious'),
(350, '(@ Y @)'),
(351, '(. Y .)'),
(352, 'aeolus'),
(353, 'Analprobe'),
(354, 'Areola'),
(355, 'areole'),
(356, 'aryan'),
(357, 'arian'),
(358, 'asses'),
(359, 'assfuck'),
(360, 'azazel'),
(361, 'baal'),
(362, 'Babes'),
(363, 'bang'),
(364, 'banger'),
(365, 'Barf'),
(366, 'bawdy'),
(367, 'Beardedclam'),
(368, 'beater'),
(369, 'Beaver'),
(370, 'beer'),
(371, 'bigtits'),
(372, 'bimbo'),
(373, 'Blew'),
(374, 'blow'),
(375, 'blowjobs'),
(376, 'blowup'),
(377, 'bod'),
(378, 'bodily'),
(379, 'boink'),
(380, 'Bone'),
(381, 'boned'),
(382, 'bong'),
(383, 'Boobies'),
(384, 'Boobs'),
(385, 'booby'),
(386, 'booger'),
(387, 'Bookie'),
(388, 'Booky'),
(389, 'bootee'),
(390, 'bootie'),
(391, 'Booty'),
(392, 'Booze'),
(393, 'boozer'),
(394, 'boozy'),
(395, 'bosom'),
(396, 'bosomy'),
(397, 'bowel'),
(398, 'bowels'),
(399, 'bra'),
(400, 'Brassiere'),
(401, 'breast'),
(402, 'breasts'),
(403, 'bung'),
(404, 'babe'),
(405, 'bush'),
(406, 'buttfuck'),
(407, 'cocaine'),
(408, 'kinky'),
(409, 'klan'),
(410, 'panties'),
(411, 'pedophile'),
(412, 'pedophilia'),
(413, 'pedophiliac'),
(414, 'punkass'),
(415, 'queaf'),
(416, 'rape'),
(417, 'scantily'),
(418, 'essohbee'),
(419, 'shithouse'),
(420, 'smut'),
(421, 'snatch'),
(422, 'toots'),
(423, 'doggie style'),
(424, 'anorexia'),
(425, 'bulimia'),
(426, 'bulimiic'),
(427, 'burp'),
(428, 'busty'),
(429, 'Buttfucker'),
(430, 'caca'),
(431, 'cahone'),
(432, 'Carnal'),
(433, 'Carpetmuncher'),
(434, 'cervix'),
(435, 'climax'),
(436, 'Cocain'),
(437, 'Cocksucker'),
(438, 'Coital'),
(440, 'commie'),
(441, 'condom'),
(445, 'crack'),
(446, 'Crackwhore'),
(447, 'crappy'),
(448, 'cuervo'),
(449, 'Cummin'),
(450, 'Cumshot'),
(451, 'cumshots'),
(452, 'Cunnilingus'),
(453, 'dago'),
(454, 'dagos'),
(455, 'damned'),
(456, 'dick-ish'),
(457, 'dickish'),
(458, 'Dickweed'),
(459, 'anorexic'),
(460, 'prostitute'),
(461, 'marijuana'),
(462, 'LSD'),
(463, 'PCP'),
(464, 'diddle'),
(465, 'dawgie-style'),
(466, 'dimwit'),
(467, 'dingle'),
(468, 'doofus'),
(469, 'dopey'),
(470, 'douche'),
(471, 'Drunk'),
(472, 'Dummy'),
(473, 'Ejaculate'),
(474, 'enlargement'),
(475, 'erect'),
(476, 'erotic'),
(477, 'exotic'),
(478, 'extacy'),
(479, 'Extasy'),
(480, 'faerie'),
(481, 'faery'),
(482, 'fagged'),
(483, 'fagot'),
(484, 'Fairy'),
(485, 'fisted'),
(486, 'fisting'),
(487, 'Fisty'),
(488, 'floozy'),
(489, 'fondle'),
(490, 'foobar'),
(491, 'foreskin'),
(492, 'frigg'),
(493, 'frigga'),
(494, 'fubar'),
(495, 'Fucking'),
(496, 'fuckup'),
(497, 'ganja'),
(498, 'gays'),
(499, 'glans'),
(500, 'godamn'),
(501, 'goddam'),
(502, 'Goldenshower'),
(503, 'gonad'),
(504, 'gonads'),
(505, 'Handjob'),
(506, 'hebe'),
(507, 'hemp'),
(508, 'heroin'),
(509, 'herpes'),
(510, 'hijack'),
(511, 'Hiv'),
(512, 'Homey'),
(513, 'Honky'),
(514, 'hooch'),
(515, 'hookah'),
(516, 'Hooker'),
(517, 'Hootch'),
(518, 'hooter'),
(519, 'hooters'),
(520, 'hump'),
(521, 'hussy'),
(522, 'hymen'),
(523, 'inbred'),
(524, 'incest'),
(525, 'injun'),
(526, 'jerked'),
(527, 'Jiz'),
(528, 'Jizm'),
(529, 'horny'),
(530, 'junkie'),
(531, 'junky'),
(532, 'kill'),
(533, 'kkk'),
(534, 'kraut'),
(535, 'kyke'),
(536, 'lech'),
(537, 'leper'),
(538, 'lesbians'),
(539, 'lesbos'),
(540, 'Lez'),
(541, 'Lezbian'),
(542, 'lezbians'),
(543, 'Lezbo'),
(544, 'Lezbos'),
(545, 'Lezzie'),
(546, 'Lezzies'),
(547, 'Lezzy'),
(548, 'loin'),
(549, 'loins'),
(550, 'lube'),
(551, 'Lust'),
(552, 'lusty'),
(553, 'Massa'),
(554, 'Masterbation'),
(555, 'Masturbation'),
(556, 'maxi'),
(557, 'Menses'),
(558, 'Menstruate'),
(559, 'Menstruation'),
(560, 'meth'),
(561, 'molest'),
(562, 'moron'),
(563, 'Motherfucka'),
(564, 'Motherfucker'),
(565, 'murder'),
(566, 'Muthafucker'),
(567, 'nad'),
(568, 'naked'),
(569, 'napalm'),
(570, 'Nappy'),
(571, 'nazism'),
(572, 'negro'),
(573, 'niggle'),
(574, 'nimrod'),
(575, 'ninny'),
(576, 'Nipple'),
(577, 'nooky'),
(578, 'Nympho'),
(579, 'Opiate'),
(580, 'opium'),
(581, 'oral'),
(582, 'orally'),
(583, 'organ'),
(584, 'orgasm'),
(585, 'orgies'),
(586, 'orgy'),
(587, 'ovary'),
(588, 'ovum'),
(589, 'ovums'),
(590, 'Paddy'),
(591, 'pantie'),
(592, 'panty'),
(593, 'Pastie'),
(594, 'pasty'),
(595, 'Pecker'),
(596, 'pedo'),
(597, 'pee'),
(598, 'Peepee'),
(599, 'Penetrate'),
(600, 'Penetration'),
(601, 'penial'),
(602, 'penile'),
(603, 'perversion'),
(604, 'peyote'),
(605, 'phalli'),
(606, 'Phallic'),
(607, 'Pillowbiter'),
(608, 'pimp'),
(609, 'pinko'),
(610, 'pissed'),
(611, 'pms'),
(612, 'polack'),
(614, 'porno'),
(615, 'pornography'),
(616, 'pot'),
(617, 'potty'),
(618, 'prig'),
(619, 'prude'),
(620, 'pubic'),
(621, 'pubis'),
(622, 'punky'),
(623, 'puss'),
(624, 'Queef'),
(625, 'quicky'),
(626, 'Racist'),
(627, 'racy'),
(628, 'raped'),
(629, 'Raper'),
(631, 'raunch'),
(632, 'rectal'),
(633, 'rectum'),
(634, 'rectus'),
(635, 'reefer'),
(636, 'reich'),
(637, 'revue'),
(638, 'risque'),
(639, 'rum'),
(640, 'rump'),
(641, 'sadism'),
(642, 'sadist'),
(643, 'satan'),
(644, 'scag'),
(645, 'schizo'),
(646, 'screw'),
(647, 'Screwed'),
(648, 'scrog'),
(649, 'Scrot'),
(650, 'Scrote'),
(651, 'scrud'),
(652, 'scum'),
(653, 'seaman'),
(654, 'seamen'),
(656, 'semen'),
(657, 'sex_story'),
(658, 'sexual'),
(659, 'Shithole'),
(660, 'Shitter'),
(661, 'shitty'),
(662, 's*o*b'),
(663, 'sissy'),
(664, 'skag'),
(665, 'slave'),
(666, 'sleaze'),
(667, 'sleazy'),
(668, 'sluts'),
(669, 'smutty'),
(670, 'sniper'),
(671, 'snuff'),
(672, 'sodom'),
(673, 'souse'),
(674, 'soused'),
(675, 'sperm'),
(676, 'spooge'),
(677, 'Stab'),
(678, 'steamy'),
(679, 'Stiffy'),
(680, 'stoned'),
(681, 'strip'),
(682, 'Stroke'),
(683, 'whacking off'),
(684, 'suck'),
(685, 'sucked'),
(686, 'sucking'),
(687, 'tampon'),
(688, 'tawdry'),
(689, 'teat'),
(690, 'teste'),
(691, 'testee'),
(692, 'testes'),
(693, 'Testis'),
(694, 'thrust'),
(695, 'thug'),
(696, 'tinkle'),
(697, 'Titfuck'),
(698, 'titi'),
(699, 'titty'),
(700, 'whacked off'),
(701, 'toke'),
(702, 'tramp'),
(703, 'trashy'),
(704, 'tush'),
(705, 'undies'),
(706, 'unwed'),
(707, 'urinal'),
(708, 'urine'),
(709, 'uterus'),
(710, 'uzi'),
(711, 'valium'),
(712, 'virgin'),
(713, 'vixen'),
(714, 'vodka'),
(716, 'voyeur'),
(717, 'vulgar'),
(718, 'wad'),
(719, 'wazoo'),
(720, 'wedgie'),
(721, 'weed'),
(722, 'weenie'),
(723, 'weewee'),
(724, 'weiner'),
(725, 'weirdo'),
(726, 'wench'),
(727, 'whitey'),
(728, 'whiz'),
(729, 'Whored'),
(730, 'Whorehouse'),
(731, 'Whoring'),
(732, 'womb'),
(733, 'woody'),
(734, 'x-rated'),
(735, 'xxx'),
(736, 'B@lls'),
(737, 'yeasty'),
(738, 'yobbo'),
(739, 'sumofabiatch'),
(740, 'doggy-style'),
(741, 'doggy style'),
(742, 'wang'),
(743, 'dong'),
(744, 'd0ng'),
(745, 'w@ng'),
(746, 'wh0reface'),
(747, 'wh0ref@ce'),
(748, 'wh0r3f@ce'),
(749, 'tittyfuck'),
(750, 'tittyfucker'),
(751, 'tittiefucker'),
(752, 'cockholster'),
(753, 'cockblock'),
(754, 'gai'),
(755, 'gey'),
(756, 'faig'),
(757, 'faigt'),
(758, 'a55'),
(759, 'a55hole'),
(760, 'gae'),
(761, 'corksucker'),
(762, 'rumprammer'),
(763, 'slutdumper'),
(764, 'niggaz'),
(765, 'muthafuckaz'),
(766, 'gigolo'),
(767, 'pussypounder'),
(768, 'herp'),
(769, 'herpy'),
(770, 'transsexual'),
(771, 'gender dysphoria'),
(772, 'orgasmic'),
(773, 'cunilingus'),
(774, 'anilingus'),
(775, 'dickdipper'),
(776, 'dickwhipper'),
(777, 'dicksipper'),
(778, 'dickripper'),
(779, 'dickflipper'),
(780, 'dickzipper'),
(781, 'homoey'),
(782, 'queero'),
(783, 'freex'),
(784, 'cunthunter'),
(785, 'shamedame'),
(786, 'slutkiss'),
(787, 'shiteater'),
(788, 'slut devil'),
(789, 'fuckass'),
(790, 'fucka$$'),
(791, 'clitorus'),
(792, 'assfucker'),
(793, 'dillweed'),
(794, 'cracker'),
(795, 'teabagging'),
(796, 'shitt'),
(797, 'azz'),
(798, 'fuk'),
(799, 'fucknugget'),
(800, 'cuntlick'),
(801, 'g@y'),
(802, '@ss'),
(803, 'beotch');

-- --------------------------------------------------------

--
-- Table structure for table `tblCalendarDates`
--

CREATE TABLE `tblCalendarDates` (
  `calendar_date_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `rank` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblCalendarDates`
--

INSERT INTO `tblCalendarDates` (`calendar_date_id`, `student_id`, `title`, `description`, `location`, `date`, `rank`) VALUES
(1, 21, 'Lecturer Appreciation Day', 'Show your appreciation for your lecturer', 'The Belgium Campus', '2018-05-08', '4'),
(2, 21, 'LAN Compitition', 'Compete at a before LAN event', 'Sigma', '2018-03-09', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tblClub`
--

CREATE TABLE `tblClub` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblComment`
--

CREATE TABLE `tblComment` (
  `comment_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `content` varchar(254) NOT NULL,
  `active` varchar(5) NOT NULL,
  `deleted` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblComment`
--

INSERT INTO `tblComment` (`comment_id`, `event_id`, `student_id`, `date`, `time`, `content`, `active`, `deleted`) VALUES
(30, 28, 25, '9 February, 2018', '14:40', 'I want to know, why not full weekend LAN and it will be fun! ', '-1', '0'),
(29, 27, 21, '2 February, 2018', '19:41', 'testing this comment', '0', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `tblCommunicate`
--

CREATE TABLE `tblCommunicate` (
  `communicate_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `resolved` varchar(5) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblCommunicate`
--

INSERT INTO `tblCommunicate` (`communicate_id`, `student_id`, `category`, `message`, `resolved`, `phone_number`, `date`) VALUES
(2, 3, 'Question', 'When will the app be ready?', '-1', '0719908072', '2018-01-20'),
(3, 12, 'Complaint', 'tesr 2', '-1', '0719908072', '2018-01-26'),
(4, 3, 'Complaint', 'fucking complaint', '-1', '0719908072', '2018-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblDatabaseReset`
--

CREATE TABLE `tblDatabaseReset` (
  `reset_id` int(11) NOT NULL,
  `president_id` varchar(10) NOT NULL,
  `vice_president_id` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblEvent`
--

CREATE TABLE `tblEvent` (
  `event_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  `date_added` varchar(50) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `erank` varchar(10) NOT NULL,
  `access` varchar(30) NOT NULL,
  `more_details` text NOT NULL,
  `place` varchar(50) NOT NULL,
  `interested` varchar(20) NOT NULL,
  `picture` text NOT NULL,
  `postprocessing` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblEvent`
--

INSERT INTO `tblEvent` (`event_id`, `name`, `date`, `date_added`, `cost`, `time`, `type`, `erank`, `access`, `more_details`, `place`, `interested`, `picture`, `postprocessing`) VALUES
(27, 'Academic Opening', '2018-02-01', '2018-01-30', '0', '17:00', 'official', '0', 'public', 'Yearly academic opening that is held at the NG Wonderpark church.', 'NG Church Wonderpark', '0', '744AFB23-EF2D-4838-87E4-5B424F935B00.jpg', '0'),
(28, 'Quarterly LAN', '2018-02-24', '2018-01-30', '10', '18:00', 'sport', '0', 'public', 'Bring you and your friends and come enjoy a whole night of LAN with us.\nBring you PC, Xbox or Playstation and lots of food and cold drinks for the evening..\n\nThe event will be from 18:00 to 06:00 the next morning..\nAmong the games thst will be played is Counter strike: Global Offensive (CS:GO), Call of duty and many other games.\nThere will also be tournaments for each type of game during the evening. ', 'Omega, Sigma And Ypsilon', '0', 'DAB73CF0-A747-4527-A70F-F0CC42E9F978.jpg', '0'),
(26, 'Quiz Night', '2018-03-20', '2018-01-30', '10', '17:00', 'sport', '4', 'private', 'Bring your team and enter the quiz night.\nThere will be a prize for the team that wins the night.\n\nQuestions that will be asked will be in the line of Anime, TV series, Games, Movies, etc. ', 'In the Cafeteria', '0', '1DCC8557-0A37-48A7-8087-8ABD8F227C6E.jpg', '0'),
(29, 'Casino Murder Mystery', '2018-02-23', '2018-02-08', '0', '18:00', 'social', '4', 'private', 'A 1 hour extension of the curfew has been approved for hostel students and each student will be allowed 2 alcoholic drinks, pre ordered.\nThe drink lists will be sent to all src&#39;s to give to their classes tomorrow.\n\nSnacks and drinks will be sold at the event.\nPoker chips will be sold to play with during the event and returned afterwards.\n\nDuring the night there will be a special event where each time a student beats one of the dealers he or she will be rewarded a hint regarding a mysterious murder. The first student to collect all the hints and correctly guesses the killer will receive a prize. \n\nFor those who have no intention of playing Sherlock can let loose on the dancefloor and mingle with friends.', 'The Cafeteria', '0', '74575FD5-4243-4954-954A-3FA1CC52A4C6.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblEventPictures`
--

CREATE TABLE `tblEventPictures` (
  `picture_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `picture` varchar(128) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblHouse`
--

CREATE TABLE `tblHouse` (
  `house_id` int(11) NOT NULL,
  `house_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblHouse`
--

INSERT INTO `tblHouse` (`house_id`, `house_name`) VALUES
(1, 'House Adrastos'),
(2, 'House Ignis Lupus'),
(3, 'House Veris Animis'),
(4, 'House Kenshin'),
(5, 'House Orenitas'),
(6, 'House Vividus');

-- --------------------------------------------------------

--
-- Table structure for table `tblLectors`
--

CREATE TABLE `tblLectors` (
  `lector_id` int(11) NOT NULL,
  `lector_first_name` varchar(50) NOT NULL,
  `lector_last_name` varchar(50) NOT NULL,
  `lector_active` bit(1) NOT NULL,
  `lector_email` varchar(60) NOT NULL,
  `lector_department` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblMapPosition`
--

CREATE TABLE `tblMapPosition` (
  `map_position_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `langtitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblMapPosition`
--

INSERT INTO `tblMapPosition` (`map_position_id`, `event_id`, `langtitude`, `latitude`) VALUES
(24, 29, '0.0', '0.0'),
(23, 28, '0.0', '0.0'),
(22, 27, '0.0', '0.0'),
(21, 26, '0.0', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `tblNotification`
--

CREATE TABLE `tblNotification` (
  `notification_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `social` varchar(10) NOT NULL,
  `sport` varchar(10) NOT NULL,
  `official` varchar(10) NOT NULL,
  `annoucements` varchar(10) NOT NULL,
  `clubs` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblStudent`
--

CREATE TABLE `tblStudent` (
  `student_id` int(11) NOT NULL,
  `identification_number` varchar(13) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `google_services_id` varchar(1024) NOT NULL,
  `department` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `session_id` varchar(128) NOT NULL,
  `browser_password` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `session_token` varchar(32) NOT NULL,
  `current_app_version` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblStudent`
--

INSERT INTO `tblStudent` (`student_id`, `identification_number`, `first_name`, `last_name`, `google_services_id`, `department`, `rank`, `session_id`, `browser_password`, `active`, `session_token`, `current_app_version`) VALUES
(3, '9706245031086', 'Andre', 'Nel', 'f9rJd4iB8f0:APA91bFSvssAY-cvANYnRspyWn19xFkaD2gZQo_AXMkituLLhA5GPrrXfWmbQON3foy6uht-c3-edVpTvUNCif4xwFDPnfebEVcTypChpFEp8y-jRgpqZrh_WempvjQVScgLzySQUUok', 'STUDENT', '4', '', '', 0, '', '8'),
(12, '9709265017084', 'Renier', 'le Roux', 'cEsrM46MiJs:APA91bHKZsBzDB_nIrOk5ubGSrCxfKRj4r7q9HfolLz4dYe0kmXiqcPisK5QsvZ4HApTQdjjTsJzFTYK1CFhwMQY4lCkfWWkiXDmQx0_vDZ30Y5ytZlVNZmha_0ndzQXfokHWz4-zlX5', 'SRC_BOARD_MEMBER', '8', '', '', -1, 'if9ryuo6r0d8x53bu6aufwj0690uuvbr', '15'),
(13, '9711160103084', 'Tanya', 'de Jager', 'cej_J8-jxhM:APA91bFOWYmSuv8wEltqX84A3JAQYDu0dH4DrTVlXn0awXnRDNbKu3aMWpbh14MJ-icjnydjDlshukLYkpTveezvlF1KohWxPGRB7hirXUOFuGtgUeEUT919Q5oJnhlQ6lj1tcJoAjur', 'SRC_PRESIDENT', '10', '', '', -1, 'vrzoyqwqwrbvdw229vqmfpxhpwoheyox', '14'),
(22, 'DN920424', 'Robyn', 'Musandu', 'd7rdP9zN6Bo:APA91bHnI2LCKI3GRqkhIBM-CT_Lxx5ZleDbL_v5wUauMwKJqu5gvcBV3kX1GsvFn2xMfRZP2umhrzqqs72X_e30r09Wf_qarSTdnwMD-psneiXtInfw5B94jEbz3fm2vhJmy5OAHnDt', 'SRC_BOARD_MEMBER', '8', '', '', -1, '', '9'),
(15, '9705075034087', 'Michael ', 'Coombe', 'cEb14YdVars:APA91bHjYeDc2SNrjTaTUbWesf_Nq7Zt6O_1ICAkLsRBQzslCyIIjqH5j8MC95RBiO4PvvuzCfWrOvkpKv14agghrxvOpVdIEa9PqN0b_r5q7xQ1hrYXaOiQ1QezZgt14CZ4THS4xJ6K', 'SRC_VICE_PRESIDENT', '9', '', '', -1, 'b0tfjl4qn0n13a274a9r2q620y5wuk0e', '15'),
(14, '9707285091089', 'Marko', 'Coetzee', 'cz-naK4ojrY:APA91bHoUYBgV-0ZoeXldqzcQTl4diZBGmncm3QfEqQ7mtUh-6k_ZEnKgUIYCnEKmnAfSL1qXgMHi6dcsgajpzRqlWM1Uwm2W88DIcDiX3gbFApURii_1HDHo_KnIqtzMn4r_zwLj0M0', 'SRC_BOARD_MEMBER', '8', '', '', -1, 'uznkba59tmaw7p3u6yr5mgyxcno3la4e', '13'),
(16, '9704145077085', 'Ruan', 'Loftie-Eaton', 'd7rdP9zN6Bo:APA91bHnI2LCKI3GRqkhIBM-CT_Lxx5ZleDbL_v5wUauMwKJqu5gvcBV3kX1GsvFn2xMfRZP2umhrzqqs72X_e30r09Wf_qarSTdnwMD-psneiXtInfw5B94jEbz3fm2vhJmy5OAHnDt', 'STUDENT', '4', '', '', -1, '', '14'),
(17, '9710130022085', 'EldanÃ© ', 'Ferreira ', 'd5YQ6zMWTrE:APA91bFL3q-9qKqJ1mxSKRmPuat0GReS-2Uc_Pzf6SDgTrHBdjxgnMgvBY8unBbF6bCzqWzMI5v2RfkwaBJXqsCsXYmzRkCmZfhWs5FpyZNGzsWijaL-8Z5jHggF2YayGATuJSpyJkpL', 'SRC_BOARD_MEMBER', '8', '', '', -1, 'ft90z1u6n23tr6progzda7sg156brz9f', '13'),
(21, '9702065134084', 'Marno', 'Van Niekerk', 'd7rdP9zN6Bo:APA91bHnI2LCKI3GRqkhIBM-CT_Lxx5ZleDbL_v5wUauMwKJqu5gvcBV3kX1GsvFn2xMfRZP2umhrzqqs72X_e30r09Wf_qarSTdnwMD-psneiXtInfw5B94jEbz3fm2vhJmy5OAHnDt', 'SRC_BOARD_MEMBER', '8', '', '', -1, 'c13v3wurganx8g0bm4utt1iv4yj7tawb', '15'),
(23, '9906245081087', 'Herco', 'Bezuidenhout', 'enrvrkKGZ7A:APA91bFNAqxGXrNsyzDRG3iC2-novGyZjYkklnJIhnfyuX1kxxJ1EWIWn-ROA7B_vsqY55C-6K1IwlBlgd4vyEL63SpW0GmqbhFZH-QkD3A5ceYF9hiHT5LM9lxgy30ksTMr83vN0gP4', 'SRC_MEMBER', '7', '', '', -1, 'th9x4i6oak7gcozogjfu5v1iagjlvff5', '14'),
(24, '9906015122087', 'Tristen', 'Smallman', 'cZE7uOQOgi0:APA91bGcBDcm3qioo6SDwggCGLcyGPJIyBhWLuVCdrCzPyy_3oRdib6-rmVY2n3ZoXN0ef9dSNvUIyriKLVhfsH7awgdz1CRA-QtYLy-wg2NCAkIGB49DoKmza_p8fy94fF9OhfnrE33', 'SRC_MEMBER', '7', '', '', -1, 'cfnr2djn46qnprvdiwtt1yyxq9j35hs9', '15'),
(25, '9807275193083', 'Jean-Claude ', 'Smit', 'eU_qMtQgQwA:APA91bGh328bpEeFGARGyO6ZA9yPi5b0Y8tO7R_1Lld49xHsl0hKXoaFIINwD9s5DPNEr8-kGVsxFxUnM7S2dBDLyDmZlsOgyVS9aC5rnqXBLUWx2f8Z61BFS5V6EZLTlRw4rSJlFsnq', 'SRC_MEMBER', '7', '', '', -1, '8h4lek2l9rwtrbmdvbn3obyrhvrb2i3u', '15'),
(26, '9905315117086', 'Wilhelm', 'Bodemer', 'fJEvYkh3wGs:APA91bEY8qHs6UvEoSeNKDlCJj6HlZvosGd3X9FDXd3c14UT3GMk0__8HyzHKZV9gyncx4u_vGCKT680tBppc-1fPgYcNtNuWLVGIQk1tXprcA0AoFrbqur6IZ5JN4TqoB4hxKjjXVdI', 'SRC_MEMBER', '7', '', '', -1, 'ywb9u74f4j4hbzq7wvnll8a3nsxkscmd', '15'),
(27, '9705125039086', 'Mathhew', 'James', 'eDNi7juG1tY:APA91bFHRdzcOOgPltTIC3G-QSq0tLtWFTxYhwhJMGzbi2maxIXeU_lxllaDpKVYVM-c0nw0wylaiuVOLnT-WOM9fR504AjpmL_LNtGGCPryNW-CHHKAXzuyRFV6SF7JbRYdCZwIt78g', 'SRC_MEMBER', '7', '', '', -1, '4t9jzmgwo5himshrhy5l0kvmuy3ntdms', '14'),
(28, '9807065080086', 'Richter', 'Blom', 'dQfurplR8o0:APA91bH49ezj3omESId7PamQbw4aFtYDATfRkfU70fqcGdYPXfeHjU3ahBGuDoi6FaON_ACWnbyJL0xsfEJEn29W4p1zB8chO-jpFEKvYz6eIrWb25j_WVPenEb6oMlCOnEdm70yBfL7', 'SRC_MEMBER', '7', '', '', -1, '0zk7rdz0znh6ye8h4fvegycajrg5brvw', '15'),
(29, '9803135081089', 'Jaques', 'Celliers', 'f9UCchCDiPI:APA91bFCSP9RAgl_SFu4pF7MlPdMSJzKvclMn8u64PGVy963tJhQGqsDpHpK0i5qtFzpinCzsRuSS2Rhme6nHqyQ_8qrL4cyQ119FTmnHtvPCFn4EllSh8w4NECwdEFee-4gI9o1rJ4n', 'SRC_MEMBER', '7', '', '', -1, 'lol1omhg30mb6hwrwqe8l21zvxi4oaga', '14'),
(30, '9904120091081', 'Belinda ', 'Venter ', 'dNHbRPWbe34:APA91bGY_E0Rngq7vjfYEp5fakSbXF_Ljr_fao7N-_gXTXW-dY4onNPg9xxZIPeHEm2wm3TsWEuTVbI88__nlNmoippn2joV0-FUImx9BJudM1nl768SmymeoK0eQ1yQdtqwE3koHPJA', 'SRC_MEMBER', '7', '', '', -1, 'k49661d2s8ti15raknfnqh2rljmc8duw', '13'),
(31, '9306170053088', 'Elizabeth ', 'Van Staden ', 'fojJE_zlFSo:APA91bE0TeoKEzPBB3rBBU3upMRqdVZRK_fEfp98MRSjQcDDj3gpxrKpv3YD6lwr_CqjQT7qjjDlSgbyRL6btN9sbW7uqNO5TfoWGru0gWfWl3F4EQrgUDJhMqzxii_PHvTjTwetFi7A', 'SRC_MEMBER', '7', '', '', -1, 'r197oeh9151gsok1gvnqtrkbpu0vqjam', '13'),
(32, '9703275383081', 'James', 'Hiscock', 'c4e89GGWI1w:APA91bEI-YEwY4FfdRTv0j5zVe8Ge4sCSfW-WzSDK0-mwoViBDZrMqqSYP1yKSlW2WvwXMqhRgmQ2WI88Uu-HxzVmRUeHlfrH_Rwmi4aG5IWncV5-FfpT-S6UVIAuDG8SMLph-fuOOSG', 'SRC_MEMBER', '7', '', '', -1, 'iflift8amyrg7w08q0g9sb7jrh185khb', '15');

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentAnnouncement`
--

CREATE TABLE `tblStudentAnnouncement` (
  `student_announcement_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `announcement_id` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblStudentAnnouncement`
--

INSERT INTO `tblStudentAnnouncement` (`student_announcement_id`, `student_id`, `announcement_id`) VALUES
(32, '23', '17'),
(31, '23', '18'),
(30, '21', '18'),
(29, '25', '18'),
(28, '13', '17'),
(27, '12', '17'),
(26, '25', '17'),
(25, '17', '17'),
(24, '27', '17'),
(23, '28', '17'),
(21, '12', '13'),
(22, '21', '17'),
(19, '12', '12'),
(18, '13', '1'),
(33, '24', '17'),
(34, '24', '18'),
(35, '12', '18'),
(36, '17', '19'),
(37, '27', '19'),
(38, '28', '19'),
(39, '12', '19'),
(40, '30', '19'),
(41, '21', '19'),
(42, '21', '20'),
(43, '15', '17'),
(44, '15', '20'),
(45, '26', '17'),
(46, '13', '19'),
(47, '25', '20'),
(48, '25', '19'),
(49, '28', '20'),
(50, '21', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentBanned`
--

CREATE TABLE `tblStudentBanned` (
  `banned_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `reason` varchar(2049) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblStudentBanned`
--

INSERT INTO `tblStudentBanned` (`banned_id`, `student_id`, `reason`) VALUES
(44, 3, 'Manually banned on app');

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentChanges`
--

CREATE TABLE `tblStudentChanges` (
  `student_change_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `previous_name_surname` varchar(105) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblStudentChanges`
--

INSERT INTO `tblStudentChanges` (`student_change_id`, `student_id`, `previous_name_surname`, `name`, `surname`) VALUES
(4, 21, 'Marnoss Van Niekerk', 'Marno', 'Van Niekerk');

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentClub`
--

CREATE TABLE `tblStudentClub` (
  `student_club_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentComment`
--

CREATE TABLE `tblStudentComment` (
  `student_comment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblStudentComment`
--

INSERT INTO `tblStudentComment` (`student_comment_id`, `student_id`, `comment_id`) VALUES
(35, 17, 21),
(34, 21, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentEvent`
--

CREATE TABLE `tblStudentEvent` (
  `student_event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblStudentEvent`
--

INSERT INTO `tblStudentEvent` (`student_event_id`, `student_id`, `event_id`) VALUES
(57, 14, 28),
(41, 3, 1),
(52, 17, 26),
(47, 15, 2),
(48, 12, 2),
(49, 12, 3),
(54, 12, 27),
(55, 21, 28),
(56, 16, 28),
(59, 21, 27),
(60, 25, 28),
(61, 23, 28),
(62, 24, 28),
(63, 24, 26),
(106, 32, 26),
(65, 30, 29),
(66, 12, 29),
(67, 28, 29),
(68, 27, 26),
(69, 25, 29),
(70, 23, 29),
(71, 24, 29),
(105, 13, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentHouse`
--

CREATE TABLE `tblStudentHouse` (
  `student_house_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblVersion`
--

CREATE TABLE `tblVersion` (
  `version` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblVersion`
--

INSERT INTO `tblVersion` (`version`) VALUES
('15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblAnnouncement`
--
ALTER TABLE `tblAnnouncement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `tblAppSettings`
--
ALTER TABLE `tblAppSettings`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `tblBadWords`
--
ALTER TABLE `tblBadWords`
  ADD PRIMARY KEY (`word_id`);

--
-- Indexes for table `tblCalendarDates`
--
ALTER TABLE `tblCalendarDates`
  ADD PRIMARY KEY (`calendar_date_id`);

--
-- Indexes for table `tblClub`
--
ALTER TABLE `tblClub`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `tblComment`
--
ALTER TABLE `tblComment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tblCommunicate`
--
ALTER TABLE `tblCommunicate`
  ADD PRIMARY KEY (`communicate_id`);

--
-- Indexes for table `tblDatabaseReset`
--
ALTER TABLE `tblDatabaseReset`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `tblEvent`
--
ALTER TABLE `tblEvent`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tblEventPictures`
--
ALTER TABLE `tblEventPictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `tblHouse`
--
ALTER TABLE `tblHouse`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `tblLectors`
--
ALTER TABLE `tblLectors`
  ADD PRIMARY KEY (`lector_id`);

--
-- Indexes for table `tblMapPosition`
--
ALTER TABLE `tblMapPosition`
  ADD PRIMARY KEY (`map_position_id`);

--
-- Indexes for table `tblNotification`
--
ALTER TABLE `tblNotification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tblStudent`
--
ALTER TABLE `tblStudent`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `identification_number` (`identification_number`);

--
-- Indexes for table `tblStudentAnnouncement`
--
ALTER TABLE `tblStudentAnnouncement`
  ADD PRIMARY KEY (`student_announcement_id`);

--
-- Indexes for table `tblStudentBanned`
--
ALTER TABLE `tblStudentBanned`
  ADD PRIMARY KEY (`banned_id`);

--
-- Indexes for table `tblStudentChanges`
--
ALTER TABLE `tblStudentChanges`
  ADD PRIMARY KEY (`student_change_id`);

--
-- Indexes for table `tblStudentClub`
--
ALTER TABLE `tblStudentClub`
  ADD PRIMARY KEY (`student_club_id`);

--
-- Indexes for table `tblStudentComment`
--
ALTER TABLE `tblStudentComment`
  ADD PRIMARY KEY (`student_comment_id`);

--
-- Indexes for table `tblStudentEvent`
--
ALTER TABLE `tblStudentEvent`
  ADD PRIMARY KEY (`event_id`,`student_id`),
  ADD UNIQUE KEY `student_event_id` (`student_event_id`);

--
-- Indexes for table `tblVersion`
--
ALTER TABLE `tblVersion`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblAnnouncement`
--
ALTER TABLE `tblAnnouncement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblAppSettings`
--
ALTER TABLE `tblAppSettings`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblBadWords`
--
ALTER TABLE `tblBadWords`
  MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=804;

--
-- AUTO_INCREMENT for table `tblCalendarDates`
--
ALTER TABLE `tblCalendarDates`
  MODIFY `calendar_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblClub`
--
ALTER TABLE `tblClub`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblComment`
--
ALTER TABLE `tblComment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblCommunicate`
--
ALTER TABLE `tblCommunicate`
  MODIFY `communicate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblDatabaseReset`
--
ALTER TABLE `tblDatabaseReset`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblEvent`
--
ALTER TABLE `tblEvent`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblEventPictures`
--
ALTER TABLE `tblEventPictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblHouse`
--
ALTER TABLE `tblHouse`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblLectors`
--
ALTER TABLE `tblLectors`
  MODIFY `lector_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblMapPosition`
--
ALTER TABLE `tblMapPosition`
  MODIFY `map_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblNotification`
--
ALTER TABLE `tblNotification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblStudent`
--
ALTER TABLE `tblStudent`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblStudentAnnouncement`
--
ALTER TABLE `tblStudentAnnouncement`
  MODIFY `student_announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tblStudentBanned`
--
ALTER TABLE `tblStudentBanned`
  MODIFY `banned_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tblStudentChanges`
--
ALTER TABLE `tblStudentChanges`
  MODIFY `student_change_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblStudentClub`
--
ALTER TABLE `tblStudentClub`
  MODIFY `student_club_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblStudentComment`
--
ALTER TABLE `tblStudentComment`
  MODIFY `student_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblStudentEvent`
--
ALTER TABLE `tblStudentEvent`
  MODIFY `student_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
