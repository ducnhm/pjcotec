-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Août 2016 à 21:41
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `coteccons`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `alias` text NOT NULL,
  `image` text NOT NULL,
  `parent_id` int(15) NOT NULL,
  `active` int(1) NOT NULL,
  `pos` int(10) NOT NULL,
  `created_id` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`category_id`, `name`, `desc`, `alias`, `image`, `parent_id`, `active`, `pos`, `created_id`, `updated_at`) VALUES
(1, 'Trang chủ', 'Trang chủ', 'trang-chu', '', 0, 1, 0, NULL, NULL),
(2, 'Giới thiệu', 'Giới thiệu', 'gioi-thieu', '', 0, 1, 0, NULL, NULL),
(3, 'Tin tức', 'Giới thiệu', 'tin-tuc', '', 0, 1, 0, NULL, NULL),
(4, 'Dự án', 'Dự án', 'du-an', '', 0, 1, 0, NULL, NULL),
(5, 'Tuyển dụng', 'Tuyển dụng', 'tuyen-dung', '', 0, 1, 0, NULL, NULL),
(6, 'Liên hệ', 'Liên hệ', 'lien-he', '', 0, 1, 0, NULL, NULL),
(7, 'Tổng quan công ty', '', 'tong-quan-cong-ty', '', 2, 1, 0, NULL, NULL),
(8, 'Cán bộ chủ chốt', 'Cán bộ chủ chốt', 'can-bo-chu-chot', '', 2, 1, 0, NULL, NULL),
(9, 'hahaha', '', 'hahaha', '', 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cate_project`
--

CREATE TABLE `cate_project` (
  `catepro_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `alias` text NOT NULL,
  `image` text NOT NULL,
  `active` int(1) NOT NULL,
  `pos` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cate_project`
--

INSERT INTO `cate_project` (`catepro_id`, `name`, `desc`, `alias`, `image`, `active`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'Đang thi công', 'Đang thi công', 'dang-thi-cong', '', 1, 0, '2016-08-14 06:42:26', '2016-08-14 06:42:30'),
(2, 'Dân dụng', 'Đang thi công', 'dan-dung', '', 0, 0, '2016-08-14 06:42:44', '2016-08-14 06:42:44');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` text NOT NULL,
  `desc` text NOT NULL,
  `active` text NOT NULL,
  `pos` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`location_id`, `name`, `alias`, `desc`, `active`, `pos`, `created_at`, `updated_at`) VALUES
(1, 'Miền Namm', 'mien-namm', 'Miền Namm', '1', 0, '2016-08-15 23:03:21', '2016-08-15 23:18:52');

-- --------------------------------------------------------

--
-- Structure de la table `months`
--

CREATE TABLE `months` (
  `month_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `months`
--

INSERT INTO `months` (`month_id`, `name`, `alias`, `active`, `created_at`, `updated_at`) VALUES
(1, '2016', '2016', 0, NULL, NULL),
(2, '2017', '2017', 1, NULL, NULL),
(4, '2018', '2018', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `alias` text NOT NULL,
  `images` text NOT NULL,
  `desc` text NOT NULL,
  `address` text NOT NULL,
  `content` text NOT NULL,
  `catepro_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`project_id`, `title`, `alias`, `images`, `desc`, `address`, `content`, `catepro_id`, `month_id`, `location_id`, `view`, `active`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BTM - Đăclac', 'btm-daclac', '', '<p>&aacute;dasdasdasd<img alt="" src="http://localhost/myproject/coteccons/public/upload/upload/files/49517f1e0217dd5a_0335-w383-h207-b0-p0--home-design.jpg" style="height:207px; width:383px" /></p>\r\n', '', '<p>&aacute;dasdasd<img alt="" src="http://localhost/myproject/coteccons/public/upload/upload/files/cdc1a07605fc2061_4484-w383-h207-b0-p0--home-design.jpg" style="height:207px; width:383px" /></p>\r\n', 1, 4, 1, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avt` text COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `address`, `level`, `avt`, `phonenumber`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(102, 'ducnguyen', 'Minh Duc Hihi', 'ddddduc@gmail.com', '$2y$10$T8q4iJajJOShPkVdusox/.l2rd/gcAXEABjrB/55NQbPi2cjsIdve', '03 Nguyen Kiem, Phu Nhuan, HCM', 'Admintrator', 'a0XMPC_Koala.jpg', '9057200298', '1', 0, '2016-08-02 17:00:00', '2016-08-13 10:33:38'),
(103, 'minhduc', 'Minh Duc', 'minhduc@gmail.com', '$2y$10$NupsT6H9zhOGiJJpOKLZUuWurwlr1HtwbbxLdJ5dUSZzOERY1cwue', 'Phu Nhuan', 'Customer', '0rObgy_5a71e1be050ef022_3515-w383-h207-b0-p0--home-design.jpg', '123123123', NULL, 0, '2016-08-06 10:36:22', '2016-08-09 03:39:39'),
(105, 'uytutyu', 'tyutyu', 'tyutyu@gmail.com', '$2y$10$csae3b9gmZ4S/UraaGVyWeXe0kRlcRwFsqM5LYv60CL50O44ENjxO', '45654657hfghfgh', 'Customer', 'T3tkKH_Koala.jpg', '456456', NULL, 0, '2016-08-06 10:37:08', '2016-08-09 03:39:41'),
(106, 'ducnhm', 'Hoang Duc', 'ducnhmm@gmail.com', '$2y$10$3DwMUJNPf/lDUldabikVMuzJfOXGIDtWXxWdDFv1Rsz2TFN27/DH2', 'mmmmmmmmmmmmm', 'Admintrator', 'O21Csm_10365732_549700905176753_6987504242754257717_n (1).jpg', '888888888888', NULL, 0, '2016-08-07 08:28:57', '2016-08-09 03:39:45');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `cate_project`
--
ALTER TABLE `cate_project`
  ADD PRIMARY KEY (`catepro_id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Index pour la table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`month_id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `cate_project`
--
ALTER TABLE `cate_project`
  MODIFY `catepro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `months`
--
ALTER TABLE `months`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
