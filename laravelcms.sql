-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Fev-2020 às 01:16
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelcms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'suporte', 'suporte@gmail.com', 'teste', 'ddasdsadnsaldnadjk'),
(2, 'Renan Lopes de Almeida', 'renan_lopes_almeida@hotmail.com', '$2y$10$LQefhoE.4yyXqZqWMV94KuQY9S8.lnMFvz77ebV6YakZyGjtLpgse', 'C8usbZnxFA2sGqZwsulYN2IOcWiczbhubMjnUpRe1gll4192rD8Ka6ugeYlp'),
(3, 'teste', 'teste@gmail.com', '$2y$10$.OSMJOOL.QPMmKbi8OPs4OjFQ0pVO8mp/D0FPlMeM9PjhxDGjU9Ue', NULL),
(4, 'Lara', 'lara@hotmail.com', '$2y$10$p8FL9yK3aTKy5VyXNI0/E..okNJvdMmGCgkMU1pLWQK1UA2Rt0mXK', NULL),
(5, 'Emma', 'emma@hotmail.com', '$2y$10$Dead98ktVkxIH/VJFU1fmeQTY8qLldynKuvU.pSihUkNe9uxd.gee', NULL),
(6, 'Novo', 'novo@gmail.com', '$2y$10$saUkjXeXYsLtbGdd7Zk5H.9gvip4N7Hr/0uS2xg/sqYg0r98Bsx4O', NULL),
(7, 'Renan', 'renan_lopes_almeida@hotmail.com', '$2y$10$YNHAivWttGtQmF8BOjzv8.PudLDZgLFdCw9l7EDxLebxVSVtlLdTa', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
