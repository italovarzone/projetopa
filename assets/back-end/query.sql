SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `banco_memory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `banco_memory`;

CREATE TABLE `score` (
  `codigo_user` int(11) NOT NULL,
  `psw_user` varchar(20) NOT NULL, 
  `score` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `score`
  ADD PRIMARY KEY (`codigo_user`);

ALTER TABLE `score`
  MODIFY `codigo_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `users` (
  `codigo_user` int(11) NOT NULL,
  `psw_user` varchar(20) NOT NULL, 
  `score` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;