-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2020 at 06:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CyberDuck`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `comment_text` text NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment_text`, `name`) VALUES
(1, 54, 'nice pic though', 'muteen'),
(3, 58, 'already done!!', 'muteen'),
(12, 61, 'mast photo...hahaha', 'Muteen');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(200) DEFAULT NULL,
  `feature_image` varchar(200) DEFAULT NULL,
  `views` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `feature_image`, `views`) VALUES
(44, 'Welcome to CyberDuck', 'CyberDuck welcomes everyone! This is a simple blogging website.....\r\nOur main purpose is to secure the world from cyber crimes.\r\n\r\nThis site is made for people to interact with each other and bring out their ideas and thoughts....\r\n\r\nso there you go, enjoy our facilites:)', 'Muteen Kundangar', 'Me0Zt6c-plain-desktop-backgrounds.jpg', 1),
(46, 'hello2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit tenetur, ipsum id accusantium sed molestiae? Velit possimus recusandae beatae quasi magnam dolores sunt adipisci dignissimos sit itaque quibusdam suscipit, dolorem minima laudantium. Corporis, unde consequatur maiores obcaecati quidem dolorem quia suscipit provident a. Quidem, saepe suscipit! Officiis corporis voluptatibus possimus aspernatur obcaecati provident dolore illo sunt accusantium impedit error temporibus nisi, saepe repellendus voluptates corrupti esse voluptate nulla consequatur pariatur similique. Cum aliquid quisquam veniam ipsam odit aspernatur dicta consequatur ab quasi minus veritatis eum deserunt modi hic tempore, suscipit accusantium, quod animi! Nisi, commodi ipsam. Nam, ipsam suscipit!', 'Muteen Kundangar', '499787.png', 1),
(48, 'hello4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit tenetur, ipsum id accusantium sed molestiae? Velit possimus recusandae beatae quasi magnam dolores sunt adipisci dignissimos sit itaque quibusdam suscipit, dolorem minima laudantium. Corporis, unde consequatur maiores obcaecati quidem dolorem quia suscipit provident a. Quidem, saepe suscipit! Officiis corporis voluptatibus possimus aspernatur obcaecati provident dolore illo sunt accusantium impedit error temporibus nisi, saepe repellendus voluptates corrupti esse voluptate nulla consequatur pariatur similique. Cum aliquid quisquam veniam ipsam odit aspernatur dicta consequatur ab quasi minus veritatis eum deserunt modi hic tempore, suscipit accusantium, quod animi! Nisi, commodi ipsam. Nam, ipsam suscipit!', 'Muteen Kundangar', 'trust ur pc.jpg', 1),
(49, 'hello5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit tenetur, ipsum id accusantium sed molestiae? Velit possimus recusandae beatae quasi magnam dolores sunt adipisci dignissimos sit itaque quibusdam suscipit, dolorem minima laudantium. Corporis, unde consequatur maiores obcaecati quidem dolorem quia suscipit provident a. Quidem, saepe suscipit! Officiis corporis voluptatibus possimus aspernatur obcaecati provident dolore illo sunt accusantium impedit error temporibus nisi, saepe repellendus voluptates corrupti esse voluptate nulla consequatur pariatur similique. Cum aliquid quisquam veniam ipsam odit aspernatur dicta consequatur ab quasi minus veritatis eum deserunt modi hic tempore, suscipit accusantium, quod animi! Nisi, commodi ipsam. Nam, ipsam suscipit!', 'Muteen Kundangar', '499786.png', 1),
(52, 'Um CEO Bitch..', 'Here i welcome every user on this blogg site. I am Muteen Kundangar the CEO of CyberDuck. Feel free to share your thoughts and creativity. Their are no restrictions here..... Thank you', 'Muteen Kundangar', 'oePE9lU-plain-desktop-backgrounds.jpg', 19),
(53, 'OS for Hackers', 'For hackers its recommended to use Kali Linux OS which is a debian based linux os or you can also choose Parrot OS which is exactly same as Kali Linux. The only difference is that Parrot OS is lighter and supports in low end pcs too and Kali prefers high end pcs...', 'Muteen Kundangar', 'kali2.jpg', 2),
(54, 'hello', 'hello this for testing purposes', 'Muteen Kundangar', 'work2.jpg', 2),
(55, 'I drew the image', 'I drew this recently but i didn\'t liked it so i threw it away', 'Muteen Kundangar', 'IMG_20200330_205718.jpg', 2),
(57, 'motivation', '.....', 'Knock knock', 'inbound2107317536.jpg', 7),
(58, 'Bulletin Gaming', 'Subscribe bulletin gaming', 'Knock knock', 'inbound1851616853.jpg', 5),
(59, '....', 'laptop mast h', 'Muteen Kundangar', 'awesomelap.jpeg', 1),
(60, 'Tools', 'There is really small difference a hacker and a script kiddie and the difference is using tools', 'Muteen Kundangar', 'IMG_20200320_131857.jpg', 2),
(61, 'Nature ', 'Beauty of nature ', 'iffat', 'Aqua HD 5.5_20180412_211749(0).png', 5),
(62, 'Nature ', 'Beauty of nature ', 'iffat', 'Aqua HD 5.5_20180412_211749(0).png', 0),
(63, 'good going', 'um happy after completing the website, the picture is just for testing purpose', 'Muteen Kundangar', 'human.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'no_profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`) VALUES
(2, 'Muteen Kundangar', 'kundangarmuteen@protonmail.com', '$2y$10$KvdSGeqHP.1ApCwt.Ep9HudOhY6F6GorX5MmFQA09z0H3DyB7s4gu', 'me.jpg'),
(3, 'Asmat Nabi ', 'asmat@gmail.com', '$2y$10$MybcyxtPn.etvk/oK7PuUO5wQEv3U4yrCyIvoivrt3r94z5c3T1iC', 'no_profile.png'),
(4, 'Knock knock', 'terabaap@aya.com', '$2y$10$G3Uf8AdqI1GgC/q0KaAvXegorM1648T52OeXkPInaLTJEri4U6I72', 'no_profile.png'),
(5, 'iffat', 'iffi@gmail.com', '$2y$10$.0n7YZexj/t6lJg63zajKeZckuVR.T52nbKGdFOELu1MpT4FnMMN6', 'no_profile.png'),
(6, 'fake id', 'fake@gmail.com', '$2y$10$vWOkvclQEwLHHx54ESbRGefxU3gsgXJPiQtjObu7AZJ.fnujCaZPS', 'no_profile.png'),
(7, 'Aarush ', 'aarushmagotra@protonmail.ch', '$2y$10$WXzkFELrfA8Er7D8gMnVPOARQw6IE81Ed4sEGIsi6.iS1NsgCobr.', 'no_profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
