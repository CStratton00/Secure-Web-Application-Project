-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 09, 2020 at 04:59 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Jokes_table`
--

CREATE TABLE `Jokes_table` (
  `JokeID` int(11) NOT NULL,
  `Joke_question` varchar(500) NOT NULL,
  `Joke_answer` varchar(500) NOT NULL,
  `users_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Jokes_table`
--

INSERT INTO `Jokes_table` (`JokeID`, `Joke_question`, `Joke_answer`, `users_ID`) VALUES
(1, 'What time is it when an elephant sits on your fence?', 'Time to get a new fence', 1),
(2, 'How do you fish with an arguer?', 'You use them as da bait', 2),
(3, 'What did the pepper say to the salt? ', 'Peppered to be amazed', 2),
(4, 'Whats brown and sticky? ', 'A stick', 1),
(5, 'Is this pool safe for diving? ', 'It deep-ends', 2),
(6, 'How do you make holy water? ', 'You burn the hell out of it', 1),
(7, 'Why did the chicken cross the road?', 'To get to the other side', 1),
(8, 'Why did the chicken cross the playground? ', 'To get to the other slide', 1),
(9, 'Why doesn\'t it hurt when you get hit in the head with a can of coke? ', 'Cause it\'s a soft drink', 1),
(10, 'What do you call a guy who never farts in public?', 'A private tutor', 1),
(11, 'Who did the zombie take to the dance?', 'His ghoul-friend', 1),
(12, 'What do you call a fish with no eyes? ', 'Fsh', 1),
(13, 'How does the ocean say hello?', 'It waves.', 1),
(15, 'Why did the math book look so sad?', 'Because of all its problems.', 1),
(17, 'Why was the skeleton afraid of the storm?', 'He didn’t have any guts', 1),
(33, 'Why did the banana go to the hospital?', 'He was peeling really bad.', 16),
(34, 'Did you hear about the actor who fell through the floorboards?', 'He was just going through a stage.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'Collin', '!password0'),
(2, 'Ashlyn', '!password1'),
(14, 'Rylin', '123'),
(16, 'Bruce', '123'),
(17, 'Mitch', '12345'),
(18, 'Aaron', 'AAron'),
(19, 'Nathan', 'Nate'),
(20, 'Stratton', '$2y$10$toNFB5.2GD2LuWdBumOE.uh4CSbQ/fcN8VA/YEQQAq9lF2zNqtzsu'),
(21, 'Abraham', '$2y$10$Nkb5hD4Z30kd3tWNg/eqIOID.hdfnxlfHvWdTyk74JPnvd5/.c5fO'),
(22, 'Shad', '$2y$10$FFRU5wtS2f/C3cFE9loZAO2eAP1qJ.ouw6yigosyHmOFv.gQ6rCTG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Jokes_table`
--
ALTER TABLE `Jokes_table`
  ADD PRIMARY KEY (`JokeID`,`users_ID`),
  ADD KEY `fk_Jokes_table_users_idx` (`users_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Jokes_table`
--
ALTER TABLE `Jokes_table`
  MODIFY `JokeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Jokes_table`
--
ALTER TABLE `Jokes_table`
  ADD CONSTRAINT `fk_Jokes_table_users` FOREIGN KEY (`users_ID`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
