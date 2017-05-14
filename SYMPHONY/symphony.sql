-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 07:24 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symphony`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--
CREATE TABLE `album` (
  `albumID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `artistName` varchar(100) DEFAULT NULL,
  `publishDate` varchar(45) DEFAULT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumID`, `name`, `desc`, `price`, `url`, `artistName`, `publishDate`, `Category_id`) VALUES
(1, 'X', 'X is the sixth studio album by American recording artist Chris Brown; it was released on September 16, 2014, by RCA Records. The album serves as the follow-up to his fifth album Fortune.', 14.99, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/CB_zpsqwx0cels.png', 'CHRIS BROWN', 'September 16, 2014', 2),
(2, 'NINE TRACK MIND', 'Nine Track Mind is the debut studio album by American singer Charlie Puth. It was released on January 29, 2016, by Atlantic Records, after being scheduled to be released on November 6, 2015. Puth has produced throughout the album.', 9.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/CP_zpsyhfqi0br.png', 'CHARLIE PUTH ', 'January 29, 2016', 2),
(3, 'SEX AND LOVE', 'Sex and Love is the tenth studio album by Spanish recording artist Enrique Iglesias. It was released on 14 March 2014 by Republic Records.', 6.99, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/EL_zpsohzvh05o.png', 'ENRIQUE IGLESIAS ', 'March 18, 2014', 3),
(4, 'PURPOSE', 'Purpose is the fourth studio album by Canadian singer and songwriter Justin Bieber. It was released on November 13, 2015, by Def Jam Recordings and School Boy Records. ', 13.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/JB_zpsx4j2tut5.png', 'JUSTIN BIEBER ', 'November 13, 2015', 3),
(5, 'TALK DIRTY', '"Talk Dirty" is a song by American recording artist Jason Derulo, released as the second single from his third studio album, Tattoos (2013) in Europe and Oceania. Derulo''s third album was retitled Talk Dirty for its US release, featuring an alternative track listing.', 9.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/JD_zpsvsz6p0h5.png', 'JASON DERULO ', 'August 2, 2013', 5),
(6, 'A.K.A\r\n', 'A.K.A. is the eighth studio album by American entertainer Jennifer Lopez. It was released on June 13, 2014, by Capitol Records.', 11.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/JL_zpsws3voop7.png', 'JENNIFER LOPEZ ', 'June 13, 2014', 3),
(7, 'BORN TO DIE', 'Born to Die is the second studio album and major-label debut by American singer and songwriter Lana Del Rey.', 10.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/LD_zpswp01x2mx.png', 'LANA DEL REY ', 'January 27, 2012', 5),
(8, 'PINK PRINT', 'The Pinkprint is the third studio album by Trinidadian-born American recording artist Nicki Minaj. It was released on December 12, 2014, by Young Money Entertainment, Cash Money Records and Republic Records.', 14.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/NM_zpshpqsuagl.png', 'NICKI MINAJ ', 'December 12, 2014', 5),
(9, 'DALE', 'Dale is the ninth studio album by American rapper Pitbull. It was released July 17, 2015, through Mr. 305, Polo Grounds Music, RCA Records and Sony Music Latin.', 9.99, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/PB_zpshttvrzja.png', 'PITBULL ', 'July 17, 2015', 4),
(10, 'STARS DANCE', 'Stars Dance is the debut studio album by American singer Selena Gomez. It was released on July 19, 2013, by Hollywood Records.', 9.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/SG_zpsbhlacwow.png', 'SELENA GOMEZ ', 'July 19, 2013', 6),
(11, 'SMOKE + MIRRORS', 'Smoke + Mirrors is the second studio album by American rock band Imagine Dragons. The album was recorded during 2014 at the band''s home studio in Las Vegas, Nevada.', 10.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/SM_zpsdicqdhxl.png', 'IMAGINE DREAGONS ', 'February 13, 2015', 1),
(12, '1989', '1989 is the fifth studio album by American singer-songwriter Taylor Swift. It was released on October 27, 2014, through Big Machine Records.', 12.49, 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Albums/TS_zpst0hxd8nc.png', 'TAYLOR SWIFT ', 'October 27, 2014', 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `url`) VALUES
(1, 'Rock', 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Categories/rock_zpscpzfidxk.png'),
(2, 'RnB', 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Categories/rnb_zpsijqapsr6.png'),
(3, 'Pop', 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Categories/pop_zpsttd64dh0.png'),
(4, 'Latino', 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Categories/latino_zpsshcniaa5.png'),
(5, 'Hip Hop', 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Categories/hippop_zpsxpae70mc.png'),
(6, 'EMD/Dance', 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Categories/edm_zpsmi7qfmfy.png'),
(7, 'Classical', 'http://i40.photobucket.com/albums/e226/sahanvijaya/SYMPHONY/Categories/classical_zpsr8fupzeu.png');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `Order_id` int(11) NOT NULL,
  `Album_albumID` int(11) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `polluserratingdetail`
--

CREATE TABLE `polluserratingdetail` (
  `Poll_id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registereduser`
--

CREATE TABLE `registereduser` (
  `userName` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contactNo` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registereduser`
--

INSERT INTO `registereduser` (`userName`, `password`, `contactNo`, `email`) VALUES
('sahan', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', '+94710452620', 'sahanvijaya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `userName` varchar(50) NOT NULL,
  `albumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `Album_albumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `name`, `duration`, `Album_albumID`) VALUES
(1, 'X', '4:21', 1),
(2, 'Add Me In', '3:13', 1),
(3, 'Loya', '14:22', 1),
(4, 'New Flame[Explicit]', '4:04', 1),
(5, 'Songs On 12 Play', '3:49', 1),
(6, '101[interlude]', '1:16', 1),
(7, 'Drown In It', '3:42', 1),
(8, 'Came To Do', '3:48', 1),
(9, 'Stereotype', '3:51', 1),
(10, 'Time For Love', '3:45', 1),
(11, 'Lady In Glass Dress[Interlude]', '1:18', 1),
(12, 'Autumn Leaves', '4:29', 1),
(13, 'Do better', '3:48', 1),
(14, 'See You Around', '3:42', 1),
(15, 'Don''t Be Gone Too Long', '3:22', 1),
(16, 'Body Shots', '3:42', 1),
(17, 'Drunk Texting', '3:48', 1),
(18, 'Lost In Ya Love', '3:50', 1),
(19, 'Love More', '3:08', 1),
(20, 'Don''t Think They Know', '3:58', 1),
(21, 'Find China', '3:30', 1),
(22, 'One Call Away', '4:21', 2),
(23, 'Dangerously', '3:13', 2),
(24, 'Marvin Gaye', '3:08', 2),
(25, 'Loosing My Mind', '4:04', 2),
(26, 'We Don''t Talk Anymore', '3:49', 2),
(27, 'My Gospel', '3:10', 2),
(28, 'Up All Night', '3:42', 2),
(29, 'Left Right Left', '3:48', 2),
(30, 'Then There''s You', '3:51', 2),
(31, 'Suffer', '3:45', 2),
(32, 'As You Are', '3:55', 2),
(33, 'Some Type Of Love', '3:07', 2),
(34, 'I''m a Freak(featuring Pitbull)	', '3:35 ', 3),
(35, 'There Goes My Baby(featuring Flo Rida)	', '3:18 ', 3),
(36, 'Bailando - English Version(featuring Sean paul)	', '4:03 ', 3),
(37, 'Beautifull(featuring Kylie Minogue)	', '3:25 ', 3),
(38, 'Heart Attact	', '2:49 ', 3),
(39, 'Let Me Be Your Lover(featuring Pitbull)	', '3:58 ', 3),
(40, 'You and I	', '3:05 ', 3),
(41, 'Still Your King	', '2:50 ', 3),
(42, 'Only a Women	', '4:03 ', 3),
(43, 'Physical(featuring Jennifer Lopez)	', '3:48 ', 3),
(44, 'Turn The Night Up	', '3:16 ', 3),
(45, 'Loco(featuring India Martinez)	', '3:13 ', 3),
(46, 'Finally Found You(featuring Sammy Adams)	', '3:40 ', 3),
(47, 'I Like How It Feels(featuring Ptibull)	', '3:39 ', 3),
(48, 'El Perdedor(featuring Marco Antonio)	', '3:11 ', 3),
(49, 'Mark My Words', '2:14 ', 4),
(50, 'I''ll Show You', '3:19', 4),
(51, 'What Do You Mean	', '3:25 ', 4),
(52, 'Sorry', '3:25 ', 4),
(53, 'Love Yourself	', '3:20 ', 4),
(54, 'Company', '3:53 ', 4),
(55, 'No Pressure	', '3:28 ', 4),
(56, 'No Sense	', '4:46 ', 4),
(57, 'The Feeling	', '4:35', 4),
(58, 'Life is Worth Living	', '3:04 ', 4),
(59, 'Where Are U Now	', '4:03 ', 4),
(60, 'Children	', '3:43 ', 4),
(61, 'Purpose', '3:30 ', 4),
(62, 'Been You	', '3:19', 4),
(63, 'Get Used to Me	', '3:22', 4),
(64, 'We are	', '3:23', 4),
(65, 'Trust', '3:11', 4),
(66, 'All In It	', '3:51 ', 4),
(67, 'Talk Dirty ft 2 Chainz	', '2:57 ', 5),
(68, 'Wiggle ft Snoop Dogg	', '3:13 ', 5),
(69, 'Trumpets	', '3:37 ', 5),
(70, 'Bubblegum ft Tyga	', '3:25 ', 5),
(71, 'Vertigo ft Jordin Sparks	', '3:53 ', 5),
(72, 'Kama Sutra ft Kid Ink	', '3:36 ', 5),
(73, 'Zipper	', '2:58 ', 5),
(74, 'The Other Side	', '3:46 ', 5),
(75, 'With The Lights On	', '3:11 ', 5),
(76, 'Stupid Love	', '3:34 ', 5),
(77, 'Marry Me	', '3:45 ', 5),
(78, 'A.K.A ft T.I.', '2:57', 6),
(79, 'First Love', '3:13', 6),
(80, 'Never Satisfied', '3:37', 6),
(81, 'I Luh Ya Papi[Explicit] ft French Montana', '3:25', 6),
(82, 'Acting Like That ft Iggy Azalea', '3:53', 6),
(83, 'Emotions', '3:36', 6),
(84, 'So Good', '2:58', 6),
(85, 'Let It Be Me', '3:46', 6),
(86, 'Worry No More ft Rick Ross', '3:11', 6),
(87, 'Booty ft pitbull', '3:34', 6),
(88, 'Tens ft Jack Mizrahi', '3:45', 6),
(89, 'Troubeaux ft Nas', '3:45', 6),
(90, 'Expertease(Ready Set Go)', '3:45', 6),
(91, 'Same Girl ft French Montana', '3:45', 6),
(92, 'Charadas', '3:45', 6),
(93, 'Girls ft Tyga', '3:45', 6),
(94, 'Born To die', '4:46', 7),
(95, 'Off To The Races', '5:00', 7),
(96, 'Blue Jeans', '3:30', 7),
(97, 'Video Games', '4:42', 7),
(98, 'Diet Mountan Dew', '3:43', 7),
(99, 'National Anthem', '3:51', 7),
(100, 'Dark Paradise', '4:03', 7),
(101, 'Radio', '3:34', 7),
(102, 'Carmen', '4:08', 7),
(103, 'Million Doller Man', '3:51', 7),
(104, 'Summertime Sadness', '4:25', 7),
(105, 'This is What Makes us Girls', '3:58', 7),
(106, 'Without You', '3:49', 7),
(107, 'Lolita', '3:40', 7),
(108, 'Lucky Ones', '3:45', 7),
(109, 'All Things Go', '4:54', 8),
(110, 'I Lied', '5:04', 8),
(111, 'The Crime Game ft Jessie Ware', '4:25', 8),
(112, 'Get On Your Knees ft Ariana Grande', '3:37', 8),
(113, 'Feeling Myself ft Beyonce', '3:58', 8),
(114, 'Only ft Drake, Lil Wayne & Chris Brown', '5:12', 8),
(115, 'Want Some More', '3:50', 8),
(116, 'Four Door Aventador', '3:03', 8),
(117, 'Favorite ft jeremih', '4:03', 8),
(118, 'By a Heart ft Meek Mill', '4:15', 8),
(119, 'Trini Dem Girls ft LunchMoney Lewis', '3:15', 8),
(120, 'Anaconda', '4:20', 8),
(121, 'The Night is Still Young', '3:48', 8),
(122, 'Pills n Potions', '4:28', 8),
(123, 'Bed of Lies ft skylar grey', '4:30', 8),
(124, 'Grand Piano', '3:19', 8),
(125, 'Piensas(Dile La Verdad) ft Gente de Zona', '3:47', 9),
(126, 'Como Yo Le Doy(Spanglish Version) ft Don Miguelo', '4:23', 9),
(127, 'El Taxi ft Sensato & Osmani Garcia', '4:10', 9),
(128, 'Yo Quiero(Si Tu Te Enamoras) ft Pitbull', '3:28', 9),
(129, 'El Party ft Micha', '3:56', 9),
(130, 'Mami Mami ft Fuego', '3:32 ', 9),
(131, 'Baddest Girl in Town ft Mohombi & Wisin', '3:04', 9),
(132, 'Chi Chi Bon Bon ft Osmani Gracia', '3:37', 9),
(133, 'Haciendo Ruido ft Ricky Martin', '3:09', 9),
(134, 'Hoy Se Bebe ft Farruko', '3:37', 9),
(135, 'No Puedo Mas ft Yandel', '3:46', 9),
(136, 'Que Lo Que ft Pitbull, Papayo & El Chevo', '3:44 ', 9),
(137, 'Birthday', '3:21', 10),
(138, 'Slow Down', '3:30', 10),
(139, 'Stars Dance', '3:37', 10),
(140, 'Like a Champion', '2:56', 10),
(141, 'Come & get It', '3:52', 10),
(142, 'Forget Forever', '4:12', 10),
(143, 'Save the Day', '3:53', 10),
(144, 'B.E.A.T', '3:05', 10),
(145, 'Write Your Name', '3:17', 10),
(146, 'Undercover', '3:53', 10),
(147, 'Love Will Remember', '3:30', 10),
(148, 'Nobody Does It Like You	', '3:56', 10),
(149, 'Music Feels Better', '3:10', 10),
(150, 'Shots', '3:52', 11),
(151, 'Gold', '3:36', 11),
(152, 'Smoke and Mirrors', '4:20', 11),
(153, 'I''m So Sorry', '3:50', 11),
(154, 'I bet My Life', '3:14', 11),
(155, 'Polaroid', '3:51', 11),
(156, 'Friction', '3:21', 11),
(157, 'It Comes Back To You', '3:37', 11),
(158, 'Dream', '4:18', 11),
(159, 'Trouble', '3:12', 11),
(160, 'Summer', '3:38', 11),
(161, 'Hopeless Opus', '4:01', 11),
(162, 'The Fall', '6:01', 11),
(163, 'Welcome To NewYork', '3:26', 12),
(164, 'Blank Space', '3:52 ', 12),
(165, 'Style', '3:46 ', 12),
(166, 'Out Of the Woods', '3:51', 12),
(167, 'All You Had toDo Was Stay', '3:11', 12),
(168, 'Sake It Off', '3:37', 12),
(169, 'I Wish You Would', '3:27', 12),
(170, 'Bad Blood', '3:30', 12),
(171, 'Wildest Dreams', '3:38', 12),
(172, 'How You Get the Girl	', '4:06', 12),
(173, 'This Love', '4:07', 12),
(174, 'I know Places', '3:14', 12),
(175, 'Clean', '4:30', 12),
(176, 'Wonderland', '4:04', 12),
(177, 'You Are in Love', '4:25', 12),
(178, 'New Romantics', '3:47', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `fName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `fName`, `lName`) VALUES
('sahanvijaya@gmail.com', 'Sahan', 'Thinusha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumID`),
  ADD KEY `fk_Item_Category1_idx` (`Category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Forum_User1_idx` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Order_registerdUser1_idx` (`userName`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`Order_id`,`Album_albumID`),
  ADD KEY `fk_Order_has_Item_Item1_idx` (`Album_albumID`),
  ADD KEY `fk_Order_has_Item_Order1_idx` (`Order_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polluserratingdetail`
--
ALTER TABLE `polluserratingdetail`
  ADD PRIMARY KEY (`Poll_id`,`userName`),
  ADD KEY `fk_Poll_has_registerdUser_registerdUser1_idx` (`userName`),
  ADD KEY `fk_Poll_has_registerdUser_Poll1_idx` (`Poll_id`);

--
-- Indexes for table `registereduser`
--
ALTER TABLE `registereduser`
  ADD PRIMARY KEY (`userName`,`email`),
  ADD KEY `fk_registerdUser_User_idx` (`email`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`userName`,`albumID`),
  ADD KEY `fk_registerdUser_has_Item_Item1_idx` (`albumID`),
  ADD KEY `fk_registerdUser_has_Item_registerdUser1_idx` (`userName`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Song_Album1_idx` (`Album_albumID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_Item_Category1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_Forum_User1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_Order_registerdUser1` FOREIGN KEY (`userName`) REFERENCES `registereduser` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_Order_has_Item_Item1` FOREIGN KEY (`Album_albumID`) REFERENCES `album` (`albumID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Order_has_Item_Order1` FOREIGN KEY (`Order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `polluserratingdetail`
--
ALTER TABLE `polluserratingdetail`
  ADD CONSTRAINT `fk_Poll_has_registerdUser_Poll1` FOREIGN KEY (`Poll_id`) REFERENCES `poll` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Poll_has_registerdUser_registerdUser1` FOREIGN KEY (`userName`) REFERENCES `registereduser` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registereduser`
--
ALTER TABLE `registereduser`
  ADD CONSTRAINT `fk_registerdUser_User` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `fk_registerdUser_has_Item_Item1` FOREIGN KEY (`albumID`) REFERENCES `album` (`albumID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registerdUser_has_Item_registerdUser1` FOREIGN KEY (`userName`) REFERENCES `registereduser` (`userName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `fk_Song_Album1` FOREIGN KEY (`Album_albumID`) REFERENCES `album` (`albumID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
