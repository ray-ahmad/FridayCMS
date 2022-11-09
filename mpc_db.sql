-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 04:03 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mpc_languange`
--

CREATE TABLE `mpc_languange` (
  `id` int NOT NULL,
  `name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='This table used for save languange data';

--
-- Dumping data for table `mpc_languange`
--

INSERT INTO `mpc_languange` (`id`, `name`, `folder_name`, `active`) VALUES
(1, 'Bahasa Indonesia', 'indonesia', 'Y'),
(2, 'English', 'english', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_menu`
--

CREATE TABLE `mpc_menu` (
  `id` int NOT NULL,
  `position` varchar(250) NOT NULL,
  `nama` varchar(350) NOT NULL,
  `class` varchar(350) DEFAULT NULL,
  `fa_icon` varchar(350) DEFAULT NULL,
  `ion_icon` varchar(350) DEFAULT NULL,
  `to_url` varchar(350) DEFAULT NULL,
  `apps` varchar(350) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpc_menu`
--

INSERT INTO `mpc_menu` (`id`, `position`, `nama`, `class`, `fa_icon`, `ion_icon`, `to_url`, `apps`, `aktif`) VALUES
(1, 'admin_backend', 'Post', NULL, 'fa-book', NULL, '#', 'post', 'Y'),
(2, 'admin_backend', 'Post Category', NULL, 'fa-folder-o', NULL, '#', 'post_cat', 'Y'),
(3, 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa', NULL, NULL, NULL, NULL, 'zzzzzzzzzzzzzzzzzzz', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_modules`
--

CREATE TABLE `mpc_modules` (
  `id` int NOT NULL,
  `name` varchar(350) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alias` varchar(350) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `author` varchar(350) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `active_front_end` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_modules`
--

INSERT INTO `mpc_modules` (`id`, `name`, `alias`, `description`, `author`, `active`, `active_front_end`) VALUES
(1, 'Post', 'post', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'Y'),
(2, 'Post Category', 'post_category', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'Y'),
(3, 'Post Tag', 'post_tag', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'Y'),
(4, 'Post Comment', 'post_comment', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'Y'),
(5, 'Page', 'page', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'Y'),
(6, 'File Manager', 'file_manager', 'Responsive Filemanager 9 by : Alberto Peripolli', 'Rayhan Ahmad Rizalullah', 'Y', 'N'),
(7, 'User', 'user', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'N'),
(8, 'Themes', 'themes', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'Y'),
(9, 'Settings', 'settings', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'Y'),
(10, 'User Roles', 'user_roles', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'N'),
(11, 'User Privileges', 'user_privileges', NULL, 'Rayhan Ahmad Rizalullah', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_pages`
--

CREATE TABLE `mpc_pages` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keywords` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `content` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sef_url` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_day` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_date` date NOT NULL,
  `make_time` time NOT NULL,
  `custom_js` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_pages`
--

INSERT INTO `mpc_pages` (`id`, `user_id`, `title`, `keywords`, `description`, `content`, `sef_url`, `make_day`, `make_date`, `make_time`, `custom_js`, `active`) VALUES
(1, 1, 'Privacy Policy (Kebijakan Privasi)', 'tes, tes', NULL, '<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>\r\n<h3>Kelebihan PopojiCMS</h3>\r\n<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>\r\n<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>\r\n<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>', 'privacy-policy', 'Thu', '2016-07-07', '18:02:50', NULL, 'Y'),
(2, 1, 'Disclaimer', NULL, NULL, '<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>\r\n<h3>Kelebihan PopojiCMS</h3>\r\n<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>\r\n<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>\r\n<p>PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.PopojiCMS telah berkembang menjadi CMS besar selama 2 tahun terakhir ini, berbagai masukan dan perbaikan sana sini telah menjadikan PopojiCMS siap menjawab kebutuhan web Anda, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.<br /><br />Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.<br /><br />PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.<br />PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.<br />PopojiCMS dibuat dengan konsep OOP dengan rasa native sehingga developer awampun bisa mengcustom dengan mudah rasa webnya.</p>', 'disclaimer', 'Sun', '2016-07-10', '02:32:37', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_posts`
--

CREATE TABLE `mpc_posts` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tag_id` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `keywords` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `title` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sef_url` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `day_posted` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_posted` date NOT NULL,
  `time_posted` time NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `hot_post` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N',
  `comment` enum('allow','disallow') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'allow',
  `hits` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_posts`
--

INSERT INTO `mpc_posts` (`id`, `category_id`, `user_id`, `tag_id`, `keywords`, `description`, `title`, `image`, `content`, `sef_url`, `day_posted`, `date_posted`, `time_posted`, `active`, `hot_post`, `comment`, `hits`) VALUES
(1, 1, 1, '4, 5', NULL, 'Pokoknya sekarang, kamu harus jadi programmer deh!', 'Kalau Mau Kaya Tanpa Jadi Pengusaha, Belajar Coding Bisa Jadi Jawabannya', 'jadi-programmer-kaya_1.jpg', '<p>Mengapa jadi programmer? Bukankah menulis kode di depan komputer adalah pekerjaan yang gak keren? Barangkali bagimu pekerjaan ini terlihat membosankan, tapi tunggu sampai kamu tahu berapa pendapatan seorang programmer dalam satu bulan.</p>\r\n<p>Seorang entry-level programmer (pemula) di Jakarta bisa memperoleh gaji sebesar 4 juta Rupiah sebulannya. Sementara analyst programmer di perusahaan top bisa meraup gaji sebesar 28,5 juta Rupiah per bulan. Jika itu belum cukup menggiurkan buat kamu, lihatlah programmer di Amerika yang rata-rata bisa membawa pulang gaji USD 66,000/bulan atau kurang lebih senilai dengan 64 juta Rupiah/bulan.<br /><br />Dan jangan lupa, para pendiri Google, Facebook atau Twitter semuanya adalah programmer. Lihat kesuksesan mereka sekarang.<br /><br />Forbes memproyeksikan gaji yang diterima dari pekerjaan tulis-menulis kode seperti web developer, software developer, programmer dan lain-lain akan meningkat hingga 8% per tahun.<br /><br />Walaupun begitu, mempelajari kode komputer masih terlihat menyeramkan bagi orang awam. Tapi kamu gak perlu takut lagi, berkat banyaknya situs gratis yang menawarkan pelajaran menulis kode. Kamu gak akan kekurangan sumber dan belajar menulis kode gak pernah semudah ini sebelumnya. Bahkan kalau kamu serius, kamu bisa menciptakan sebuah purwarupa web atau software dalam dua bulan. Yuk kita belajar sama-sama!<br /><br /><strong>1. Pertama, Pahamilah Istilah-Istilah Pemrograman</strong><br /><br />Keberadaan terminologi aneh dan membingungkan dalam dunia programming barangkali jadi alasan kenapa selama ini kamu menjauh. Ada baiknya kalau kamu mulai dari mempelajari istilah sederhana lebih dulu. Kenali istilah komputer yang sering kamu simak namun entah apa maksudnya seperti PHP, HTML, Java atau API.<br /><br />Pahami juga perbedaan antara Server dengan Web Server. Dari situs ini kamu bisa mempelajari istilah-istilah penting dalam pemrograman yang dijelaskan dengan bahasa yang mudah dipahami. Dalam 10 menit kamu udah bisa memahaminya.<br /><br /><strong>2. Bulatkan Tekad; Berkenalanlah Dengan Teknik Dasar Programming dan&hellip; Python</strong><br /><br />Python adalah bahasa pemrograman level tinggi yang sangat lumrah digunakan untuk belajar menulis kode. Python bebas digunakan dan bisa di didapatkan secara gratis. Untuk mempelajari Python, ada dua situs yang bisa menjadi tempat &lsquo;kursus&rsquo; kamu:<br /><br /><strong><em>Learn Python The Hard Way</em></strong>, walau nama situsnya seram, mempelajari dasar-dasar Phyton lebih mudah dalam situs ini. Sangat cocok buat pemula.<br /><strong><em>Google&rsquo;s Python Class</em></strong>, kalau kamu lebih familiar dengan tampilan antar-muka Google, maka inilah situs pilihan kamu. Kelebihannya, Google menyediakan video tutorial dan latihan untuk mengetes sejauh mana kemampuan kamu.<br /><br />Kedua sumber di atas cukup lengkap dan saling menutupi kekurangan masing-masing. Coba aja kedua-duanya lalu seiring waktu kamu akan tahu situs mana yang paling cocok buat kamu. Jangan lupa terus mencoba dan berlatih.<br /><br /><strong>3. Ikuti Kelas Pengantar Django</strong><br /><br />Django adalah web frameworks yang ditulis dalam bahasa Python. Peran web frameworks sangat penting dalam jalur pertukaran data melalui internet. Frameworks bertanggung jawab menerima dan mengolah request dari pengguna internet lalu mengirimkan kembali respond yang tepat ke browser pengguna.<br /><br />Jadi alurnya begini: ketika kamu membuka laman Facebook kamu langsung diarahkan ke laman &lsquo;Home&rsquo;, ketika kamu klik akun seorang teman, request itu dikirim browser ke server Facebook yang menyimpan data teman tersebut. Tapi karena browser tiap orang beda-beda, di sinilah peran Django bermain. Frameworks ini menerjemahkan dan mengirim data si teman kembali ke komputer kamu sebagi respon.<br /><br />Ikuti petunjuk dan instruksi dari tutorial Django. Setelah tutorial selesai, hapus semua kode yang sudah kamu tulis. Kemudian tulislah ulang kode-kode itu tanpa mengintip tutorial. Dengan cara itu kamu bisa lebih paham soal Django.<br /><br /><strong>4. Perdalam Lagi Pemahaman Kamu Soal Python. Caranya, Putarlah Video Berkualitas dari Kelas Komputer Udacity</strong><br /><br />Saatnya meningkatkan level kamu dalam penulisan kode. Dalam 2-4 minggu kamu harus step up dan mendapat pemahaman yang lebih dalam soal bahasa Python dan konsep-konsep programming. Kamu bisa memanfaatkan kelas ilmu komputer dari Udacity, kelas ini terdiri dari 7 sesi dengan durasi 2-3 jam tiap sesi. Materi disampaikan melalui video berkualitas.<br /><br />Massachusetts Institute of Technology juga menawarkan kelas terbuka yang bisa kamu hadiri secara vitual. Materi ini disampaikan dengan gaya kuliah anak-anak MIT. Lumayan, jadi tahu rasanya kuliah di sana &lsquo;kan?<br /><br /><strong>5. Waktunya Praktik! Mulai Bangun Sebuah Situs Sederhana dengan Tema Apa Saja</strong><br /><br />Mulailah membangun sebuah situs sederhana dalam 1 minggu, temanya apa aja asal gak melanggar UU ITE dan gak mengandung unsur SARA.<br /><br />Amannya kamu mulai dengan membuat web yang isinya cuma data pribadi, foto, atau lagu kesukaan. Jangan malu dibilang terlalu sederhana, namanya juga belajar. Kalau kamu masih butuh contoh gunakan bantuan dari Django by Example ini.<br /><br /><strong>6. Buatlah Purwarupa dan Berpikirlah Untuk Mendirikan Start-Up</strong><br /><br />Setelah coba-coba dengan situs sederhana tadi, waktunya kamu lebih serius. Kalau kamu punya ide yang brilian dan teman-teman yang sepaham, ajak mereka mendirikan perusahaan startup.<br /><br />Dropbox, Air Bnb, Twitter, Evernote, LinkedIn dan macam-macam situs lain di mulai dari kegigihan pendirinya membangun startup. Satu-satunya cara agar bisa meraih penghasilan dari perusahaan startup-mu, kamu harus segera membuat prototype.<br /><br />Kalau pada akhirnya startups kamu kandas, prototype produk yang sudah kamu kerjakan masih bisa dijadikan contoh karya atau portofolio yang sangat berguna ketika melamar perkerjaan. Dan seperti yang diungkap di awal artikel tadi, pekerjaan tulis menulis kode ini bergaji puluhan juta rupiah!</p>', 'belajar-coding-bikin-kaya', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 65),
(4, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 89),
(5, 1, 1, NULL, NULL, NULL, 'qwwwwwwwwwwww', 'jadi-programmer-kaya.jpg', '<p><img src=\"http://localhost:8080/playcms_ci/play-assets/file/PHP_weapon.jpg?1472735237419\" alt=\"\" width=\"1024\" height=\"768\" /></p>', 'qwwwwwwwwwwww', 'Thu', '2016-09-01', '15:07:36', 'N', 'N', 'allow', 8),
(6, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(7, 1, 1, '4, 5', NULL, 'Pokoknya sekarang, kamu harus jadi programmer deh!', 'Kalau Mau Kaya Tanpa Jadi Pengusaha, Belajar Coding Bisa Jadi Jawabannya', 'jadi-programmer-kaya_1.jpg', '<p>Mengapa jadi programmer? Bukankah menulis kode di depan komputer adalah pekerjaan yang gak keren? Barangkali bagimu pekerjaan ini terlihat membosankan, tapi tunggu sampai kamu tahu berapa pendapatan seorang programmer dalam satu bulan.</p>\r\n<p>Seorang entry-level programmer (pemula) di Jakarta bisa memperoleh gaji sebesar 4 juta Rupiah sebulannya. Sementara analyst programmer di perusahaan top bisa meraup gaji sebesar 28,5 juta Rupiah per bulan. Jika itu belum cukup menggiurkan buat kamu, lihatlah programmer di Amerika yang rata-rata bisa membawa pulang gaji USD 66,000/bulan atau kurang lebih senilai dengan 64 juta Rupiah/bulan.<br /><br />Dan jangan lupa, para pendiri Google, Facebook atau Twitter semuanya adalah programmer. Lihat kesuksesan mereka sekarang.<br /><br />Forbes memproyeksikan gaji yang diterima dari pekerjaan tulis-menulis kode seperti web developer, software developer, programmer dan lain-lain akan meningkat hingga 8% per tahun.<br /><br />Walaupun begitu, mempelajari kode komputer masih terlihat menyeramkan bagi orang awam. Tapi kamu gak perlu takut lagi, berkat banyaknya situs gratis yang menawarkan pelajaran menulis kode. Kamu gak akan kekurangan sumber dan belajar menulis kode gak pernah semudah ini sebelumnya. Bahkan kalau kamu serius, kamu bisa menciptakan sebuah purwarupa web atau software dalam dua bulan. Yuk kita belajar sama-sama!<br /><br /><strong>1. Pertama, Pahamilah Istilah-Istilah Pemrograman</strong><br /><br />Keberadaan terminologi aneh dan membingungkan dalam dunia programming barangkali jadi alasan kenapa selama ini kamu menjauh. Ada baiknya kalau kamu mulai dari mempelajari istilah sederhana lebih dulu. Kenali istilah komputer yang sering kamu simak namun entah apa maksudnya seperti PHP, HTML, Java atau API.<br /><br />Pahami juga perbedaan antara Server dengan Web Server. Dari situs ini kamu bisa mempelajari istilah-istilah penting dalam pemrograman yang dijelaskan dengan bahasa yang mudah dipahami. Dalam 10 menit kamu udah bisa memahaminya.<br /><br /><strong>2. Bulatkan Tekad; Berkenalanlah Dengan Teknik Dasar Programming dan&hellip; Python</strong><br /><br />Python adalah bahasa pemrograman level tinggi yang sangat lumrah digunakan untuk belajar menulis kode. Python bebas digunakan dan bisa di didapatkan secara gratis. Untuk mempelajari Python, ada dua situs yang bisa menjadi tempat &lsquo;kursus&rsquo; kamu:<br /><br /><strong><em>Learn Python The Hard Way</em></strong>, walau nama situsnya seram, mempelajari dasar-dasar Phyton lebih mudah dalam situs ini. Sangat cocok buat pemula.<br /><strong><em>Google&rsquo;s Python Class</em></strong>, kalau kamu lebih familiar dengan tampilan antar-muka Google, maka inilah situs pilihan kamu. Kelebihannya, Google menyediakan video tutorial dan latihan untuk mengetes sejauh mana kemampuan kamu.<br /><br />Kedua sumber di atas cukup lengkap dan saling menutupi kekurangan masing-masing. Coba aja kedua-duanya lalu seiring waktu kamu akan tahu situs mana yang paling cocok buat kamu. Jangan lupa terus mencoba dan berlatih.<br /><br /><strong>3. Ikuti Kelas Pengantar Django</strong><br /><br />Django adalah web frameworks yang ditulis dalam bahasa Python. Peran web frameworks sangat penting dalam jalur pertukaran data melalui internet. Frameworks bertanggung jawab menerima dan mengolah request dari pengguna internet lalu mengirimkan kembali respond yang tepat ke browser pengguna.<br /><br />Jadi alurnya begini: ketika kamu membuka laman Facebook kamu langsung diarahkan ke laman &lsquo;Home&rsquo;, ketika kamu klik akun seorang teman, request itu dikirim browser ke server Facebook yang menyimpan data teman tersebut. Tapi karena browser tiap orang beda-beda, di sinilah peran Django bermain. Frameworks ini menerjemahkan dan mengirim data si teman kembali ke komputer kamu sebagi respon.<br /><br />Ikuti petunjuk dan instruksi dari tutorial Django. Setelah tutorial selesai, hapus semua kode yang sudah kamu tulis. Kemudian tulislah ulang kode-kode itu tanpa mengintip tutorial. Dengan cara itu kamu bisa lebih paham soal Django.<br /><br /><strong>4. Perdalam Lagi Pemahaman Kamu Soal Python. Caranya, Putarlah Video Berkualitas dari Kelas Komputer Udacity</strong><br /><br />Saatnya meningkatkan level kamu dalam penulisan kode. Dalam 2-4 minggu kamu harus step up dan mendapat pemahaman yang lebih dalam soal bahasa Python dan konsep-konsep programming. Kamu bisa memanfaatkan kelas ilmu komputer dari Udacity, kelas ini terdiri dari 7 sesi dengan durasi 2-3 jam tiap sesi. Materi disampaikan melalui video berkualitas.<br /><br />Massachusetts Institute of Technology juga menawarkan kelas terbuka yang bisa kamu hadiri secara vitual. Materi ini disampaikan dengan gaya kuliah anak-anak MIT. Lumayan, jadi tahu rasanya kuliah di sana &lsquo;kan?<br /><br /><strong>5. Waktunya Praktik! Mulai Bangun Sebuah Situs Sederhana dengan Tema Apa Saja</strong><br /><br />Mulailah membangun sebuah situs sederhana dalam 1 minggu, temanya apa aja asal gak melanggar UU ITE dan gak mengandung unsur SARA.<br /><br />Amannya kamu mulai dengan membuat web yang isinya cuma data pribadi, foto, atau lagu kesukaan. Jangan malu dibilang terlalu sederhana, namanya juga belajar. Kalau kamu masih butuh contoh gunakan bantuan dari Django by Example ini.<br /><br /><strong>6. Buatlah Purwarupa dan Berpikirlah Untuk Mendirikan Start-Up</strong><br /><br />Setelah coba-coba dengan situs sederhana tadi, waktunya kamu lebih serius. Kalau kamu punya ide yang brilian dan teman-teman yang sepaham, ajak mereka mendirikan perusahaan startup.<br /><br />Dropbox, Air Bnb, Twitter, Evernote, LinkedIn dan macam-macam situs lain di mulai dari kegigihan pendirinya membangun startup. Satu-satunya cara agar bisa meraih penghasilan dari perusahaan startup-mu, kamu harus segera membuat prototype.<br /><br />Kalau pada akhirnya startups kamu kandas, prototype produk yang sudah kamu kerjakan masih bisa dijadikan contoh karya atau portofolio yang sangat berguna ketika melamar perkerjaan. Dan seperti yang diungkap di awal artikel tadi, pekerjaan tulis menulis kode ini bergaji puluhan juta rupiah!</p>', 'belajar-coding-bikin-kaya', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 43),
(8, 1, 1, NULL, NULL, NULL, 'qwwwwwwwwwwww', 'jadi-programmer-kaya.jpg', '<p><img src=\"http://localhost:8080/playcms_ci/play-assets/file/PHP_weapon.jpg?1472735237419\" alt=\"\" width=\"1024\" height=\"768\" /></p>', 'qwwwwwwwwwwww', 'Thu', '2016-09-01', '15:07:36', 'N', 'N', 'allow', 0),
(9, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(10, 1, 1, '4, 5', NULL, 'Pokoknya sekarang, kamu harus jadi programmer deh!', 'Kalau Mau Kaya Tanpa Jadi Pengusaha, Belajar Coding Bisa Jadi Jawabannya', 'jadi-programmer-kaya_1.jpg', '<p>Mengapa jadi programmer? Bukankah menulis kode di depan komputer adalah pekerjaan yang gak keren? Barangkali bagimu pekerjaan ini terlihat membosankan, tapi tunggu sampai kamu tahu berapa pendapatan seorang programmer dalam satu bulan.</p>\r\n<p>Seorang entry-level programmer (pemula) di Jakarta bisa memperoleh gaji sebesar 4 juta Rupiah sebulannya. Sementara analyst programmer di perusahaan top bisa meraup gaji sebesar 28,5 juta Rupiah per bulan. Jika itu belum cukup menggiurkan buat kamu, lihatlah programmer di Amerika yang rata-rata bisa membawa pulang gaji USD 66,000/bulan atau kurang lebih senilai dengan 64 juta Rupiah/bulan.<br /><br />Dan jangan lupa, para pendiri Google, Facebook atau Twitter semuanya adalah programmer. Lihat kesuksesan mereka sekarang.<br /><br />Forbes memproyeksikan gaji yang diterima dari pekerjaan tulis-menulis kode seperti web developer, software developer, programmer dan lain-lain akan meningkat hingga 8% per tahun.<br /><br />Walaupun begitu, mempelajari kode komputer masih terlihat menyeramkan bagi orang awam. Tapi kamu gak perlu takut lagi, berkat banyaknya situs gratis yang menawarkan pelajaran menulis kode. Kamu gak akan kekurangan sumber dan belajar menulis kode gak pernah semudah ini sebelumnya. Bahkan kalau kamu serius, kamu bisa menciptakan sebuah purwarupa web atau software dalam dua bulan. Yuk kita belajar sama-sama!<br /><br /><strong>1. Pertama, Pahamilah Istilah-Istilah Pemrograman</strong><br /><br />Keberadaan terminologi aneh dan membingungkan dalam dunia programming barangkali jadi alasan kenapa selama ini kamu menjauh. Ada baiknya kalau kamu mulai dari mempelajari istilah sederhana lebih dulu. Kenali istilah komputer yang sering kamu simak namun entah apa maksudnya seperti PHP, HTML, Java atau API.<br /><br />Pahami juga perbedaan antara Server dengan Web Server. Dari situs ini kamu bisa mempelajari istilah-istilah penting dalam pemrograman yang dijelaskan dengan bahasa yang mudah dipahami. Dalam 10 menit kamu udah bisa memahaminya.<br /><br /><strong>2. Bulatkan Tekad; Berkenalanlah Dengan Teknik Dasar Programming dan&hellip; Python</strong><br /><br />Python adalah bahasa pemrograman level tinggi yang sangat lumrah digunakan untuk belajar menulis kode. Python bebas digunakan dan bisa di didapatkan secara gratis. Untuk mempelajari Python, ada dua situs yang bisa menjadi tempat &lsquo;kursus&rsquo; kamu:<br /><br /><strong><em>Learn Python The Hard Way</em></strong>, walau nama situsnya seram, mempelajari dasar-dasar Phyton lebih mudah dalam situs ini. Sangat cocok buat pemula.<br /><strong><em>Google&rsquo;s Python Class</em></strong>, kalau kamu lebih familiar dengan tampilan antar-muka Google, maka inilah situs pilihan kamu. Kelebihannya, Google menyediakan video tutorial dan latihan untuk mengetes sejauh mana kemampuan kamu.<br /><br />Kedua sumber di atas cukup lengkap dan saling menutupi kekurangan masing-masing. Coba aja kedua-duanya lalu seiring waktu kamu akan tahu situs mana yang paling cocok buat kamu. Jangan lupa terus mencoba dan berlatih.<br /><br /><strong>3. Ikuti Kelas Pengantar Django</strong><br /><br />Django adalah web frameworks yang ditulis dalam bahasa Python. Peran web frameworks sangat penting dalam jalur pertukaran data melalui internet. Frameworks bertanggung jawab menerima dan mengolah request dari pengguna internet lalu mengirimkan kembali respond yang tepat ke browser pengguna.<br /><br />Jadi alurnya begini: ketika kamu membuka laman Facebook kamu langsung diarahkan ke laman &lsquo;Home&rsquo;, ketika kamu klik akun seorang teman, request itu dikirim browser ke server Facebook yang menyimpan data teman tersebut. Tapi karena browser tiap orang beda-beda, di sinilah peran Django bermain. Frameworks ini menerjemahkan dan mengirim data si teman kembali ke komputer kamu sebagi respon.<br /><br />Ikuti petunjuk dan instruksi dari tutorial Django. Setelah tutorial selesai, hapus semua kode yang sudah kamu tulis. Kemudian tulislah ulang kode-kode itu tanpa mengintip tutorial. Dengan cara itu kamu bisa lebih paham soal Django.<br /><br /><strong>4. Perdalam Lagi Pemahaman Kamu Soal Python. Caranya, Putarlah Video Berkualitas dari Kelas Komputer Udacity</strong><br /><br />Saatnya meningkatkan level kamu dalam penulisan kode. Dalam 2-4 minggu kamu harus step up dan mendapat pemahaman yang lebih dalam soal bahasa Python dan konsep-konsep programming. Kamu bisa memanfaatkan kelas ilmu komputer dari Udacity, kelas ini terdiri dari 7 sesi dengan durasi 2-3 jam tiap sesi. Materi disampaikan melalui video berkualitas.<br /><br />Massachusetts Institute of Technology juga menawarkan kelas terbuka yang bisa kamu hadiri secara vitual. Materi ini disampaikan dengan gaya kuliah anak-anak MIT. Lumayan, jadi tahu rasanya kuliah di sana &lsquo;kan?<br /><br /><strong>5. Waktunya Praktik! Mulai Bangun Sebuah Situs Sederhana dengan Tema Apa Saja</strong><br /><br />Mulailah membangun sebuah situs sederhana dalam 1 minggu, temanya apa aja asal gak melanggar UU ITE dan gak mengandung unsur SARA.<br /><br />Amannya kamu mulai dengan membuat web yang isinya cuma data pribadi, foto, atau lagu kesukaan. Jangan malu dibilang terlalu sederhana, namanya juga belajar. Kalau kamu masih butuh contoh gunakan bantuan dari Django by Example ini.<br /><br /><strong>6. Buatlah Purwarupa dan Berpikirlah Untuk Mendirikan Start-Up</strong><br /><br />Setelah coba-coba dengan situs sederhana tadi, waktunya kamu lebih serius. Kalau kamu punya ide yang brilian dan teman-teman yang sepaham, ajak mereka mendirikan perusahaan startup.<br /><br />Dropbox, Air Bnb, Twitter, Evernote, LinkedIn dan macam-macam situs lain di mulai dari kegigihan pendirinya membangun startup. Satu-satunya cara agar bisa meraih penghasilan dari perusahaan startup-mu, kamu harus segera membuat prototype.<br /><br />Kalau pada akhirnya startups kamu kandas, prototype produk yang sudah kamu kerjakan masih bisa dijadikan contoh karya atau portofolio yang sangat berguna ketika melamar perkerjaan. Dan seperti yang diungkap di awal artikel tadi, pekerjaan tulis menulis kode ini bergaji puluhan juta rupiah!</p>', 'belajar-coding-bikin-kaya', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 43),
(11, 2, 1, NULL, NULL, NULL, 'qwwwwwwwwwwww', 'jadi-programmer-kaya.jpg', '<p><img src=\"http://localhost:8080/playcms_ci/play-assets/file/PHP_weapon.jpg?1472735237419\" alt=\"\" width=\"1024\" height=\"768\" /></p>', 'qwwwwwwwwwwww', 'Thu', '2016-09-01', '15:07:36', 'Y', 'N', 'allow', 11),
(12, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(13, 1, 1, '4, 5', NULL, 'Pokoknya sekarang, kamu harus jadi programmer deh!', 'Kalau Mau Kaya Tanpa Jadi Pengusaha, Belajar Coding Bisa Jadi Jawabannya', 'jadi-programmer-kaya_1.jpg', '<p>Mengapa jadi programmer? Bukankah menulis kode di depan komputer adalah pekerjaan yang gak keren? Barangkali bagimu pekerjaan ini terlihat membosankan, tapi tunggu sampai kamu tahu berapa pendapatan seorang programmer dalam satu bulan.</p>\r\n<p>Seorang entry-level programmer (pemula) di Jakarta bisa memperoleh gaji sebesar 4 juta Rupiah sebulannya. Sementara analyst programmer di perusahaan top bisa meraup gaji sebesar 28,5 juta Rupiah per bulan. Jika itu belum cukup menggiurkan buat kamu, lihatlah programmer di Amerika yang rata-rata bisa membawa pulang gaji USD 66,000/bulan atau kurang lebih senilai dengan 64 juta Rupiah/bulan.<br /><br />Dan jangan lupa, para pendiri Google, Facebook atau Twitter semuanya adalah programmer. Lihat kesuksesan mereka sekarang.<br /><br />Forbes memproyeksikan gaji yang diterima dari pekerjaan tulis-menulis kode seperti web developer, software developer, programmer dan lain-lain akan meningkat hingga 8% per tahun.<br /><br />Walaupun begitu, mempelajari kode komputer masih terlihat menyeramkan bagi orang awam. Tapi kamu gak perlu takut lagi, berkat banyaknya situs gratis yang menawarkan pelajaran menulis kode. Kamu gak akan kekurangan sumber dan belajar menulis kode gak pernah semudah ini sebelumnya. Bahkan kalau kamu serius, kamu bisa menciptakan sebuah purwarupa web atau software dalam dua bulan. Yuk kita belajar sama-sama!<br /><br /><strong>1. Pertama, Pahamilah Istilah-Istilah Pemrograman</strong><br /><br />Keberadaan terminologi aneh dan membingungkan dalam dunia programming barangkali jadi alasan kenapa selama ini kamu menjauh. Ada baiknya kalau kamu mulai dari mempelajari istilah sederhana lebih dulu. Kenali istilah komputer yang sering kamu simak namun entah apa maksudnya seperti PHP, HTML, Java atau API.<br /><br />Pahami juga perbedaan antara Server dengan Web Server. Dari situs ini kamu bisa mempelajari istilah-istilah penting dalam pemrograman yang dijelaskan dengan bahasa yang mudah dipahami. Dalam 10 menit kamu udah bisa memahaminya.<br /><br /><strong>2. Bulatkan Tekad; Berkenalanlah Dengan Teknik Dasar Programming dan&hellip; Python</strong><br /><br />Python adalah bahasa pemrograman level tinggi yang sangat lumrah digunakan untuk belajar menulis kode. Python bebas digunakan dan bisa di didapatkan secara gratis. Untuk mempelajari Python, ada dua situs yang bisa menjadi tempat &lsquo;kursus&rsquo; kamu:<br /><br /><strong><em>Learn Python The Hard Way</em></strong>, walau nama situsnya seram, mempelajari dasar-dasar Phyton lebih mudah dalam situs ini. Sangat cocok buat pemula.<br /><strong><em>Google&rsquo;s Python Class</em></strong>, kalau kamu lebih familiar dengan tampilan antar-muka Google, maka inilah situs pilihan kamu. Kelebihannya, Google menyediakan video tutorial dan latihan untuk mengetes sejauh mana kemampuan kamu.<br /><br />Kedua sumber di atas cukup lengkap dan saling menutupi kekurangan masing-masing. Coba aja kedua-duanya lalu seiring waktu kamu akan tahu situs mana yang paling cocok buat kamu. Jangan lupa terus mencoba dan berlatih.<br /><br /><strong>3. Ikuti Kelas Pengantar Django</strong><br /><br />Django adalah web frameworks yang ditulis dalam bahasa Python. Peran web frameworks sangat penting dalam jalur pertukaran data melalui internet. Frameworks bertanggung jawab menerima dan mengolah request dari pengguna internet lalu mengirimkan kembali respond yang tepat ke browser pengguna.<br /><br />Jadi alurnya begini: ketika kamu membuka laman Facebook kamu langsung diarahkan ke laman &lsquo;Home&rsquo;, ketika kamu klik akun seorang teman, request itu dikirim browser ke server Facebook yang menyimpan data teman tersebut. Tapi karena browser tiap orang beda-beda, di sinilah peran Django bermain. Frameworks ini menerjemahkan dan mengirim data si teman kembali ke komputer kamu sebagi respon.<br /><br />Ikuti petunjuk dan instruksi dari tutorial Django. Setelah tutorial selesai, hapus semua kode yang sudah kamu tulis. Kemudian tulislah ulang kode-kode itu tanpa mengintip tutorial. Dengan cara itu kamu bisa lebih paham soal Django.<br /><br /><strong>4. Perdalam Lagi Pemahaman Kamu Soal Python. Caranya, Putarlah Video Berkualitas dari Kelas Komputer Udacity</strong><br /><br />Saatnya meningkatkan level kamu dalam penulisan kode. Dalam 2-4 minggu kamu harus step up dan mendapat pemahaman yang lebih dalam soal bahasa Python dan konsep-konsep programming. Kamu bisa memanfaatkan kelas ilmu komputer dari Udacity, kelas ini terdiri dari 7 sesi dengan durasi 2-3 jam tiap sesi. Materi disampaikan melalui video berkualitas.<br /><br />Massachusetts Institute of Technology juga menawarkan kelas terbuka yang bisa kamu hadiri secara vitual. Materi ini disampaikan dengan gaya kuliah anak-anak MIT. Lumayan, jadi tahu rasanya kuliah di sana &lsquo;kan?<br /><br /><strong>5. Waktunya Praktik! Mulai Bangun Sebuah Situs Sederhana dengan Tema Apa Saja</strong><br /><br />Mulailah membangun sebuah situs sederhana dalam 1 minggu, temanya apa aja asal gak melanggar UU ITE dan gak mengandung unsur SARA.<br /><br />Amannya kamu mulai dengan membuat web yang isinya cuma data pribadi, foto, atau lagu kesukaan. Jangan malu dibilang terlalu sederhana, namanya juga belajar. Kalau kamu masih butuh contoh gunakan bantuan dari Django by Example ini.<br /><br /><strong>6. Buatlah Purwarupa dan Berpikirlah Untuk Mendirikan Start-Up</strong><br /><br />Setelah coba-coba dengan situs sederhana tadi, waktunya kamu lebih serius. Kalau kamu punya ide yang brilian dan teman-teman yang sepaham, ajak mereka mendirikan perusahaan startup.<br /><br />Dropbox, Air Bnb, Twitter, Evernote, LinkedIn dan macam-macam situs lain di mulai dari kegigihan pendirinya membangun startup. Satu-satunya cara agar bisa meraih penghasilan dari perusahaan startup-mu, kamu harus segera membuat prototype.<br /><br />Kalau pada akhirnya startups kamu kandas, prototype produk yang sudah kamu kerjakan masih bisa dijadikan contoh karya atau portofolio yang sangat berguna ketika melamar perkerjaan. Dan seperti yang diungkap di awal artikel tadi, pekerjaan tulis menulis kode ini bergaji puluhan juta rupiah!</p>', 'belajar-coding-bikin-kaya', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 43),
(14, 1, 1, NULL, NULL, NULL, 'qwwwwwwwwwwww', 'jadi-programmer-kaya.jpg', '<p><img src=\"http://localhost:8080/playcms_ci/play-assets/file/PHP_weapon.jpg?1472735237419\" alt=\"\" width=\"1024\" height=\"768\" /></p>', 'qwwwwwwwwwwww', 'Thu', '2016-09-01', '15:07:36', 'N', 'N', 'allow', 0),
(15, 1, 1, NULL, NULL, NULL, 'qwwwwwwwwwwww', 'jadi-programmer-kaya.jpg', '<p><img src=\"http://localhost:8080/playcms_ci/play-assets/file/PHP_weapon.jpg?1472735237419\" alt=\"\" width=\"1024\" height=\"768\" /></p>', 'qwwwwwwwwwwww', 'Thu', '2016-09-01', '15:07:36', 'N', 'N', 'allow', 0);
INSERT INTO `mpc_posts` (`id`, `category_id`, `user_id`, `tag_id`, `keywords`, `description`, `title`, `image`, `content`, `sef_url`, `day_posted`, `date_posted`, `time_posted`, `active`, `hot_post`, `comment`, `hits`) VALUES
(16, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(17, 1, 1, '4, 5', NULL, 'Pokoknya sekarang, kamu harus jadi programmer deh!', 'Kalau Mau Kaya Tanpa Jadi Pengusaha, Belajar Coding Bisa Jadi Jawabannya', 'jadi-programmer-kaya_1.jpg', '<p>Mengapa jadi programmer? Bukankah menulis kode di depan komputer adalah pekerjaan yang gak keren? Barangkali bagimu pekerjaan ini terlihat membosankan, tapi tunggu sampai kamu tahu berapa pendapatan seorang programmer dalam satu bulan.</p>\r\n<p>Seorang entry-level programmer (pemula) di Jakarta bisa memperoleh gaji sebesar 4 juta Rupiah sebulannya. Sementara analyst programmer di perusahaan top bisa meraup gaji sebesar 28,5 juta Rupiah per bulan. Jika itu belum cukup menggiurkan buat kamu, lihatlah programmer di Amerika yang rata-rata bisa membawa pulang gaji USD 66,000/bulan atau kurang lebih senilai dengan 64 juta Rupiah/bulan.<br /><br />Dan jangan lupa, para pendiri Google, Facebook atau Twitter semuanya adalah programmer. Lihat kesuksesan mereka sekarang.<br /><br />Forbes memproyeksikan gaji yang diterima dari pekerjaan tulis-menulis kode seperti web developer, software developer, programmer dan lain-lain akan meningkat hingga 8% per tahun.<br /><br />Walaupun begitu, mempelajari kode komputer masih terlihat menyeramkan bagi orang awam. Tapi kamu gak perlu takut lagi, berkat banyaknya situs gratis yang menawarkan pelajaran menulis kode. Kamu gak akan kekurangan sumber dan belajar menulis kode gak pernah semudah ini sebelumnya. Bahkan kalau kamu serius, kamu bisa menciptakan sebuah purwarupa web atau software dalam dua bulan. Yuk kita belajar sama-sama!<br /><br /><strong>1. Pertama, Pahamilah Istilah-Istilah Pemrograman</strong><br /><br />Keberadaan terminologi aneh dan membingungkan dalam dunia programming barangkali jadi alasan kenapa selama ini kamu menjauh. Ada baiknya kalau kamu mulai dari mempelajari istilah sederhana lebih dulu. Kenali istilah komputer yang sering kamu simak namun entah apa maksudnya seperti PHP, HTML, Java atau API.<br /><br />Pahami juga perbedaan antara Server dengan Web Server. Dari situs ini kamu bisa mempelajari istilah-istilah penting dalam pemrograman yang dijelaskan dengan bahasa yang mudah dipahami. Dalam 10 menit kamu udah bisa memahaminya.<br /><br /><strong>2. Bulatkan Tekad; Berkenalanlah Dengan Teknik Dasar Programming dan&hellip; Python</strong><br /><br />Python adalah bahasa pemrograman level tinggi yang sangat lumrah digunakan untuk belajar menulis kode. Python bebas digunakan dan bisa di didapatkan secara gratis. Untuk mempelajari Python, ada dua situs yang bisa menjadi tempat &lsquo;kursus&rsquo; kamu:<br /><br /><strong><em>Learn Python The Hard Way</em></strong>, walau nama situsnya seram, mempelajari dasar-dasar Phyton lebih mudah dalam situs ini. Sangat cocok buat pemula.<br /><strong><em>Google&rsquo;s Python Class</em></strong>, kalau kamu lebih familiar dengan tampilan antar-muka Google, maka inilah situs pilihan kamu. Kelebihannya, Google menyediakan video tutorial dan latihan untuk mengetes sejauh mana kemampuan kamu.<br /><br />Kedua sumber di atas cukup lengkap dan saling menutupi kekurangan masing-masing. Coba aja kedua-duanya lalu seiring waktu kamu akan tahu situs mana yang paling cocok buat kamu. Jangan lupa terus mencoba dan berlatih.<br /><br /><strong>3. Ikuti Kelas Pengantar Django</strong><br /><br />Django adalah web frameworks yang ditulis dalam bahasa Python. Peran web frameworks sangat penting dalam jalur pertukaran data melalui internet. Frameworks bertanggung jawab menerima dan mengolah request dari pengguna internet lalu mengirimkan kembali respond yang tepat ke browser pengguna.<br /><br />Jadi alurnya begini: ketika kamu membuka laman Facebook kamu langsung diarahkan ke laman &lsquo;Home&rsquo;, ketika kamu klik akun seorang teman, request itu dikirim browser ke server Facebook yang menyimpan data teman tersebut. Tapi karena browser tiap orang beda-beda, di sinilah peran Django bermain. Frameworks ini menerjemahkan dan mengirim data si teman kembali ke komputer kamu sebagi respon.<br /><br />Ikuti petunjuk dan instruksi dari tutorial Django. Setelah tutorial selesai, hapus semua kode yang sudah kamu tulis. Kemudian tulislah ulang kode-kode itu tanpa mengintip tutorial. Dengan cara itu kamu bisa lebih paham soal Django.<br /><br /><strong>4. Perdalam Lagi Pemahaman Kamu Soal Python. Caranya, Putarlah Video Berkualitas dari Kelas Komputer Udacity</strong><br /><br />Saatnya meningkatkan level kamu dalam penulisan kode. Dalam 2-4 minggu kamu harus step up dan mendapat pemahaman yang lebih dalam soal bahasa Python dan konsep-konsep programming. Kamu bisa memanfaatkan kelas ilmu komputer dari Udacity, kelas ini terdiri dari 7 sesi dengan durasi 2-3 jam tiap sesi. Materi disampaikan melalui video berkualitas.<br /><br />Massachusetts Institute of Technology juga menawarkan kelas terbuka yang bisa kamu hadiri secara vitual. Materi ini disampaikan dengan gaya kuliah anak-anak MIT. Lumayan, jadi tahu rasanya kuliah di sana &lsquo;kan?<br /><br /><strong>5. Waktunya Praktik! Mulai Bangun Sebuah Situs Sederhana dengan Tema Apa Saja</strong><br /><br />Mulailah membangun sebuah situs sederhana dalam 1 minggu, temanya apa aja asal gak melanggar UU ITE dan gak mengandung unsur SARA.<br /><br />Amannya kamu mulai dengan membuat web yang isinya cuma data pribadi, foto, atau lagu kesukaan. Jangan malu dibilang terlalu sederhana, namanya juga belajar. Kalau kamu masih butuh contoh gunakan bantuan dari Django by Example ini.<br /><br /><strong>6. Buatlah Purwarupa dan Berpikirlah Untuk Mendirikan Start-Up</strong><br /><br />Setelah coba-coba dengan situs sederhana tadi, waktunya kamu lebih serius. Kalau kamu punya ide yang brilian dan teman-teman yang sepaham, ajak mereka mendirikan perusahaan startup.<br /><br />Dropbox, Air Bnb, Twitter, Evernote, LinkedIn dan macam-macam situs lain di mulai dari kegigihan pendirinya membangun startup. Satu-satunya cara agar bisa meraih penghasilan dari perusahaan startup-mu, kamu harus segera membuat prototype.<br /><br />Kalau pada akhirnya startups kamu kandas, prototype produk yang sudah kamu kerjakan masih bisa dijadikan contoh karya atau portofolio yang sangat berguna ketika melamar perkerjaan. Dan seperti yang diungkap di awal artikel tadi, pekerjaan tulis menulis kode ini bergaji puluhan juta rupiah!</p>', 'belajar-coding-bikin-kaya', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 43),
(18, 1, 1, NULL, NULL, NULL, 'qwwwwwwwwwwww', 'jadi-programmer-kaya.jpg', '<p><img src=\"http://localhost:8080/playcms_ci/play-assets/file/PHP_weapon.jpg?1472735237419\" alt=\"\" width=\"1024\" height=\"768\" /></p>', 'qwwwwwwwwwwww', 'Thu', '2016-09-01', '15:07:36', 'N', 'N', 'allow', 0),
(19, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(20, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(21, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(22, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(23, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(24, 1, 1, '4, 5', NULL, 'Pokoknya sekarang, kamu harus jadi programmer deh!', 'Kalau Mau Kaya Tanpa Jadi Pengusaha, Belajar Coding Bisa Jadi Jawabannya', 'jadi-programmer-kaya_1.jpg', '<p>Mengapa jadi programmer? Bukankah menulis kode di depan komputer adalah pekerjaan yang gak keren? Barangkali bagimu pekerjaan ini terlihat membosankan, tapi tunggu sampai kamu tahu berapa pendapatan seorang programmer dalam satu bulan.</p>\r\n<p>Seorang entry-level programmer (pemula) di Jakarta bisa memperoleh gaji sebesar 4 juta Rupiah sebulannya. Sementara analyst programmer di perusahaan top bisa meraup gaji sebesar 28,5 juta Rupiah per bulan. Jika itu belum cukup menggiurkan buat kamu, lihatlah programmer di Amerika yang rata-rata bisa membawa pulang gaji USD 66,000/bulan atau kurang lebih senilai dengan 64 juta Rupiah/bulan.<br /><br />Dan jangan lupa, para pendiri Google, Facebook atau Twitter semuanya adalah programmer. Lihat kesuksesan mereka sekarang.<br /><br />Forbes memproyeksikan gaji yang diterima dari pekerjaan tulis-menulis kode seperti web developer, software developer, programmer dan lain-lain akan meningkat hingga 8% per tahun.<br /><br />Walaupun begitu, mempelajari kode komputer masih terlihat menyeramkan bagi orang awam. Tapi kamu gak perlu takut lagi, berkat banyaknya situs gratis yang menawarkan pelajaran menulis kode. Kamu gak akan kekurangan sumber dan belajar menulis kode gak pernah semudah ini sebelumnya. Bahkan kalau kamu serius, kamu bisa menciptakan sebuah purwarupa web atau software dalam dua bulan. Yuk kita belajar sama-sama!<br /><br /><strong>1. Pertama, Pahamilah Istilah-Istilah Pemrograman</strong><br /><br />Keberadaan terminologi aneh dan membingungkan dalam dunia programming barangkali jadi alasan kenapa selama ini kamu menjauh. Ada baiknya kalau kamu mulai dari mempelajari istilah sederhana lebih dulu. Kenali istilah komputer yang sering kamu simak namun entah apa maksudnya seperti PHP, HTML, Java atau API.<br /><br />Pahami juga perbedaan antara Server dengan Web Server. Dari situs ini kamu bisa mempelajari istilah-istilah penting dalam pemrograman yang dijelaskan dengan bahasa yang mudah dipahami. Dalam 10 menit kamu udah bisa memahaminya.<br /><br /><strong>2. Bulatkan Tekad; Berkenalanlah Dengan Teknik Dasar Programming dan&hellip; Python</strong><br /><br />Python adalah bahasa pemrograman level tinggi yang sangat lumrah digunakan untuk belajar menulis kode. Python bebas digunakan dan bisa di didapatkan secara gratis. Untuk mempelajari Python, ada dua situs yang bisa menjadi tempat &lsquo;kursus&rsquo; kamu:<br /><br /><strong><em>Learn Python The Hard Way</em></strong>, walau nama situsnya seram, mempelajari dasar-dasar Phyton lebih mudah dalam situs ini. Sangat cocok buat pemula.<br /><strong><em>Google&rsquo;s Python Class</em></strong>, kalau kamu lebih familiar dengan tampilan antar-muka Google, maka inilah situs pilihan kamu. Kelebihannya, Google menyediakan video tutorial dan latihan untuk mengetes sejauh mana kemampuan kamu.<br /><br />Kedua sumber di atas cukup lengkap dan saling menutupi kekurangan masing-masing. Coba aja kedua-duanya lalu seiring waktu kamu akan tahu situs mana yang paling cocok buat kamu. Jangan lupa terus mencoba dan berlatih.<br /><br /><strong>3. Ikuti Kelas Pengantar Django</strong><br /><br />Django adalah web frameworks yang ditulis dalam bahasa Python. Peran web frameworks sangat penting dalam jalur pertukaran data melalui internet. Frameworks bertanggung jawab menerima dan mengolah request dari pengguna internet lalu mengirimkan kembali respond yang tepat ke browser pengguna.<br /><br />Jadi alurnya begini: ketika kamu membuka laman Facebook kamu langsung diarahkan ke laman &lsquo;Home&rsquo;, ketika kamu klik akun seorang teman, request itu dikirim browser ke server Facebook yang menyimpan data teman tersebut. Tapi karena browser tiap orang beda-beda, di sinilah peran Django bermain. Frameworks ini menerjemahkan dan mengirim data si teman kembali ke komputer kamu sebagi respon.<br /><br />Ikuti petunjuk dan instruksi dari tutorial Django. Setelah tutorial selesai, hapus semua kode yang sudah kamu tulis. Kemudian tulislah ulang kode-kode itu tanpa mengintip tutorial. Dengan cara itu kamu bisa lebih paham soal Django.<br /><br /><strong>4. Perdalam Lagi Pemahaman Kamu Soal Python. Caranya, Putarlah Video Berkualitas dari Kelas Komputer Udacity</strong><br /><br />Saatnya meningkatkan level kamu dalam penulisan kode. Dalam 2-4 minggu kamu harus step up dan mendapat pemahaman yang lebih dalam soal bahasa Python dan konsep-konsep programming. Kamu bisa memanfaatkan kelas ilmu komputer dari Udacity, kelas ini terdiri dari 7 sesi dengan durasi 2-3 jam tiap sesi. Materi disampaikan melalui video berkualitas.<br /><br />Massachusetts Institute of Technology juga menawarkan kelas terbuka yang bisa kamu hadiri secara vitual. Materi ini disampaikan dengan gaya kuliah anak-anak MIT. Lumayan, jadi tahu rasanya kuliah di sana &lsquo;kan?<br /><br /><strong>5. Waktunya Praktik! Mulai Bangun Sebuah Situs Sederhana dengan Tema Apa Saja</strong><br /><br />Mulailah membangun sebuah situs sederhana dalam 1 minggu, temanya apa aja asal gak melanggar UU ITE dan gak mengandung unsur SARA.<br /><br />Amannya kamu mulai dengan membuat web yang isinya cuma data pribadi, foto, atau lagu kesukaan. Jangan malu dibilang terlalu sederhana, namanya juga belajar. Kalau kamu masih butuh contoh gunakan bantuan dari Django by Example ini.<br /><br /><strong>6. Buatlah Purwarupa dan Berpikirlah Untuk Mendirikan Start-Up</strong><br /><br />Setelah coba-coba dengan situs sederhana tadi, waktunya kamu lebih serius. Kalau kamu punya ide yang brilian dan teman-teman yang sepaham, ajak mereka mendirikan perusahaan startup.<br /><br />Dropbox, Air Bnb, Twitter, Evernote, LinkedIn dan macam-macam situs lain di mulai dari kegigihan pendirinya membangun startup. Satu-satunya cara agar bisa meraih penghasilan dari perusahaan startup-mu, kamu harus segera membuat prototype.<br /><br />Kalau pada akhirnya startups kamu kandas, prototype produk yang sudah kamu kerjakan masih bisa dijadikan contoh karya atau portofolio yang sangat berguna ketika melamar perkerjaan. Dan seperti yang diungkap di awal artikel tadi, pekerjaan tulis menulis kode ini bergaji puluhan juta rupiah!</p>', 'belajar-coding-bikin-kaya', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 47),
(25, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51);
INSERT INTO `mpc_posts` (`id`, `category_id`, `user_id`, `tag_id`, `keywords`, `description`, `title`, `image`, `content`, `sef_url`, `day_posted`, `date_posted`, `time_posted`, `active`, `hot_post`, `comment`, `hits`) VALUES
(26, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(27, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(28, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(29, 1, 1, NULL, NULL, NULL, '7 Ide Beri Edukasi Keuangan Kepada Anak', 'edukasi-anak.jpg', '<p>Orangtua merupakan sosok utama yang dapat mengenalkan edukasi keuangan kepada anak. Bila dilihat dari segi waktu yang tepat dalam mengedukasi anak adalah ketika anak sudah masuk usia Sekolah dasar atau SD. Cara ini dilakukan agar ketika anak mulai beranjak dewasa, ia akan bisa membuat keputusan yang baik mengenai keuangan. Sebab di usia tersebut anak akan belajar matematika dasar seperti penambahan dan pengurangan angka yang dapat dilatih dan diterapkan dalam keseharian dengan cara menabung.<br /><br />Apabila di sekolahnya diajarkan menabung dengan dibuatkan buku tabungan, maka tugasnya orang tua hanya mengontrol saja agar pengeluarannya dari uang saku tetap ada, namun menabungnya pun juga tetap ada. Tentu sebagai orang tua tidak dapat mengandalkan sepenuhnya dalam pengajaran pendidikan khususnya untuk mendidik anak tentang keuangan sejak kecil.<br /><br />Oleh karena itu orang tua juga dapat mengajarkan pada anak usia dini untuk dapat mengelola keuangan yang dimiliki anak sejak dini, dengan cara berikut di antaranya<br /><br /></p>\r\n<h3>1. Kenalkan dan Ajarkan Tentang Konsep Uang</h3>\r\n<p>Ketika anak sudah mulai mampu berhitung, maka tidak ada salahnya mengajarkan atau mengenalkan anak tentang uang, misalnya dari pecahan kecil seperti uang lima ratus rupiah dan sejenisnya. Ajak anak berhitung selisih uang yang diberikan orang tua dan yang telah ia gunakan untuk jajan.<br /><br /></p>\r\n<h3>2. Beri Pengajaran dengan Memberikan Uang Saku</h3>\r\n<p>Dengan memberikannya uang saku, itu akan mengajak anak Anda untuk belajar dewasa mengatur keuangan. Sehingga secara perlahan ia akan mulai untuk mengelola keuangan yang dimilikinya.<br /><br /></p>\r\n<h3>3. Ajarkan Anak untuk Terbiasa Menabung</h3>\r\n<p>Dengan mengajarkan anak menabung, maka anak akan lebih disiplin dalam mengontrol keuangan yang telah diberikan oleh orang tuanya.<br /><br />Berikanlah penjelasan sederhana dengan menabung anak akan mendapatkan sesuatu yang berharga di masa mendatang, serta ajarkan manfaat dari menyisihkan uang jajannya setiap hari dengan dimasukkan ke celengan terlebih dulu.<br /><br />Kemudian ketika beranjak dewasa, anak diajarkan untuk berinvestasi secara perlahan-lahan dengan mengajarkannya membeli reksa dana dan sejenisnya.<br /><br /></p>\r\n<h3>4. Ajarkan Anak untuk Berbagi Pada Sesamanya</h3>\r\n<p>Dengan mengajarkan konsep berbagi dengan saudaranya, secara perlahan itu akan mengajarkan anak mengenai beramal yang identik dengan kegiatan keagamaan sehingga diharapkan ia akan menjadi lebih saleh.<br /><br />Dengan pemahaman mendasar tersebut mengajarkan anak agar dapat tetap berbagi dengan sesamanya di sekolah walaupun orang tuanya sedang tidak di dekatnya.<br /><br />Selain itu ajarkan pula nilai kemanusiaan bahwa tidak semua manusia memiliki nasib yang sama. Sehingga anak menyadari betapa pentingnya berbagi dengan sesama khususnya bagi mereka yang membutuhkan.<br /><br /></p>\r\n<h3>5. Diajarkan Melalui Konsep Game atau Permainan</h3>\r\n<p>Melalui permainan anak tanpa sadar sedang diajarkan tentang mengelola keuangan. Sebagai contoh dalam memainkan permainan monopoli, cashflow 101, dan masih banyak lagi.<br /><br />Manfaatkan permainan tersebut dengan lebih menyenangkan sehingga perlahan anak dapat menerapkannya dalam kehidupan sehari-harinya.<br /><br /></p>\r\n<h3>6. Ajak Anak Ketika Belanja Bulanan</h3>\r\n<p>Dengan mengajak anak berbelanja, secara tidak langsung itu akan mengenalkan angka secara riil di lapangan.<br /><br />Dengan begitu anak akan dapat secara otomatis berhitung jumlah barang yang dibeli orang tuanya dan jumlah uang yang dikeluarkannya.<br /><br />Selain itu anak pun menyaksikan langsung terjadinya transaksi jual beli mulai dari menanyakan harga, tawar menawar, hingga terjadinya pembelian.<br /><br /></p>\r\n<h3>7. Ajarkan Mengenai Prioritas</h3>\r\n<p>Bila secara langsung mengajarkan secara definisi dan teori memang anak tidak langsung dapat memahaminya. Namun bila diberikan pertanyaan terbuka seperti mau mainan atau jalan-jalan, maka anak akan memilih keduanya.<br /><br />Namun ajarkan anak untuk memilih salah satunya mana yang lebih didahulukan. Dengan begitu anak secara perlahan diajarkan untuk mana yang lebih prioritas untuk didahulukan tanpa harus mengajarkan secara formal.<br /><br /></p>\r\n<h3>Biasakan Anak Anda Dalam Mengatur Keuangan</h3>\r\n<p>Harapannya dengan menerapkan cara tersebut anak dapat segera memahami bagaimana cara mengelola keuangan yang baik sehingga tidak perlu lagi repot mengajarkannya secara khusus karena lebih tepat serta efisien bila mengajarkannya dengan membiasakan diri mengatur keuangan mulai dari uang sakunya di kehidupan sehari-harinya.<br /><br />Jadi tidak ada lagi anak yang hanya mampu menghamburkan uang yang diberikan oleh orang tuanya saja tanpa dikelola dengan baik karena orang tuanya telah mengajarkannya sejak dini.<br /><br /><br />Diambil dari <a href=\"http://liputan6.com\" target=\"_blank\">Liputan 6</a> Oleh Agustina Melani</p>', '7-ide-beri-edukasi-keuangan-kepada-anak', 'Sat', '2016-07-16', '14:48:54', 'Y', 'Y', 'allow', 51),
(30, 1, 1, NULL, NULL, NULL, 'ffffffffffff', NULL, '<p>rrrrrrr</p>', 'ffffffffffff', 'Tue', '2016-11-08', '13:31:24', 'Y', 'N', 'allow', 8),
(31, 2, 1, '2', NULL, NULL, 'dddddddd', NULL, '<p>dddddddddddddd</p>', 'dddddddd', 'Thu', '2019-04-11', '14:56:09', 'Y', 'N', 'allow', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpc_post_categories`
--

CREATE TABLE `mpc_post_categories` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(350) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keywords` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `sefurl` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_day` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_date` date NOT NULL,
  `make_time` time NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_post_categories`
--

INSERT INTO `mpc_post_categories` (`id`, `user_id`, `name`, `keywords`, `description`, `sefurl`, `make_day`, `make_date`, `make_time`, `active`) VALUES
(1, 1, 'Sukses', '', 'dddd', 'sukses', 'Thu', '2016-06-02', '09:46:28', 'Y'),
(2, 1, 'ddddssssss', '', '', 'ddddssssss', 'Thu', '2016-06-09', '11:57:10', 'Y'),
(3, 1, 'sssss', NULL, NULL, 'sssss', 'Sun', '2016-06-26', '05:28:12', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_post_comment`
--

CREATE TABLE `mpc_post_comment` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `commentator_name` varchar(350) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `commentator_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `commentator_web` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `comment` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_day` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_date` date NOT NULL,
  `make_time` time NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_post_comment`
--

INSERT INTO `mpc_post_comment` (`id`, `parent_id`, `post_id`, `user_id`, `commentator_name`, `commentator_email`, `commentator_web`, `comment`, `make_day`, `make_date`, `make_time`, `active`) VALUES
(1, 0, 1, 1, 'Rayhan Ahmad Rizalullah', 'rayhanhui@gmail.com', 'http://rayhanblog.com', 'keren', 'Thu', '2016-07-14', '09:19:49', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_post_tags`
--

CREATE TABLE `mpc_post_tags` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `sef_url` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_day` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `make_date` date NOT NULL,
  `make_time` time NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_post_tags`
--

INSERT INTO `mpc_post_tags` (`id`, `user_id`, `title`, `description`, `sef_url`, `make_day`, `make_date`, `make_time`, `active`) VALUES
(1, 1, 'FridayCMS', NULL, 'fridaycms', 'Fri', '2016-06-24', '06:48:15', 'Y'),
(2, 1, 'PHP', NULL, 'php', 'Sat', '2016-06-25', '03:26:14', 'Y'),
(3, 1, 'Codeigniter', NULL, 'codeigniter', 'Sat', '2016-06-25', '03:26:23', 'Y'),
(4, 1, 'Coding Bikin Kaya', NULL, 'coding-bikin-kaya', 'Thu', '2016-06-30', '06:46:42', 'Y'),
(5, 1, 'Coding', NULL, 'coding', 'Mon', '2016-07-04', '16:02:51', 'Y'),
(6, 1, 'tes', NULL, 'tes', 'Sat', '2016-10-15', '12:35:07', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_settings`
--

CREATE TABLE `mpc_settings` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_settings`
--

INSERT INTO `mpc_settings` (`id`, `name`, `value`) VALUES
(1, 'site_name', 'FridayCMS'),
(2, 'site_motto', 'Fri For All and You!'),
(3, 'site_email', 'contact.fridaycms@gmail.com'),
(4, 'meta_keywords', 'cms indonesia, codeigniter, cms indonesia codeigniter, cms indonesia terbaik'),
(5, 'meta_description', 'FridayCMS adalah CMS Indonesia yang dibuat dengan Framework PHP CodeIgniter. FridayCMS menggunakan konsep yang sangat mudah dipahami bagi setiap orang yang baru mengenal CodeIgniter.'),
(6, 'caching', 'N'),
(7, 'maintenance', 'N'),
(8, 'user_registration', 'Y'),
(9, 'user_reg_confirm', 'email'),
(10, 'moderate_comment', 'Y'),
(11, 'metatag_file', 'meta_tag.txt'),
(12, 'site_favicon', 'favicon.ico'),
(13, 'site_logo', 'logo.png'),
(14, 'cache_expiration', '2'),
(15, 'sitemap_priority', '1.0'),
(16, 'sitemap_changefreq', 'always'),
(17, 'comment_message', 'Untuk mencegah hal-hal yang tidak dinginkan, komentar akan di moderasi terlebih dahulu. Komentarmu bisa saja diubah.'),
(18, 'comment', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_submenu`
--

CREATE TABLE `mpc_submenu` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `position` varchar(250) NOT NULL,
  `nama` varchar(350) NOT NULL,
  `class` varchar(350) DEFAULT NULL,
  `fa_icon` varchar(350) DEFAULT NULL,
  `ion_icon` varchar(350) DEFAULT NULL,
  `to_url` varchar(350) DEFAULT NULL,
  `apps` varchar(350) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpc_submenu`
--

INSERT INTO `mpc_submenu` (`id`, `parent_id`, `position`, `nama`, `class`, `fa_icon`, `ion_icon`, `to_url`, `apps`, `aktif`) VALUES
(1, 1, 'admin_backend', 'All Post', NULL, 'fa-tasks', NULL, '?app=post&aksi=list', 'post', 'Y'),
(2, 1, 'admin_backend', 'Create New Post', NULL, 'fa-edit', NULL, '?app=post&aksi=buat', 'post', 'Y'),
(3, 2, 'admin_backend', 'All Post Category', NULL, 'fa-tasks', NULL, '?app=post_cat&aksi=list', 'post_cat', 'Y'),
(4, 2, 'admin_backend', 'Create New Post Category', NULL, 'fa-edit', NULL, '?app=post_cat&aksi=buat', 'post', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_subscriber`
--

CREATE TABLE `mpc_subscriber` (
  `id` int NOT NULL,
  `email` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_subscriber`
--

INSERT INTO `mpc_subscriber` (`id`, `email`, `active`) VALUES
(1, 'rayhan', 'Y'),
(2, 'rayhanhui@gmail.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_tes`
--

CREATE TABLE `mpc_tes` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `contents` mediumtext NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `make_date` datetime NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mpc_themes`
--

CREATE TABLE `mpc_themes` (
  `id` int NOT NULL,
  `position` enum('frontend','backend') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_web` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `version` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_themes`
--

INSERT INTO `mpc_themes` (`id`, `position`, `name`, `author`, `author_web`, `version`, `folder`, `active`) VALUES
(1, 'frontend', 'Renda', 'MoozThemes', 'http://www.moozthemes.com', '1.0.0', 'renda', 'Y'),
(2, 'backend', 'AdminLTE', 'Almsaeed Studio', 'http://almsaeedstudio.com', '2.3.0', 'AdminLTE', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_traffic`
--

CREATE TABLE `mpc_traffic` (
  `id` int NOT NULL,
  `ip` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` int DEFAULT NULL,
  `browser` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `referrer_site` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `platform` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_traffic`
--

INSERT INTO `mpc_traffic` (`id`, `ip`, `hits`, `browser`, `user_agent`, `referrer_site`, `platform`, `day`, `date`, `time`) VALUES
(1, '::1', 40, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', 'https://www.google.com', 'Windows 7', 'Mon', '2016-06-27', '06:21:58'),
(2, '::1', 11, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', 'https://www.google.com', 'Windows 7', 'Tue', '2016-06-28', '06:21:58'),
(3, '::1', 3, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', 'https://www.google.com', 'Windows 7', 'Wed', '2016-06-29', '00:48:06'),
(4, '::1', 1, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', 'https://www.google.com', 'Windows 7', 'Thu', '2016-06-30', '14:55:39'),
(5, '::1', 4, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-07-01', '01:41:34'),
(6, '::1', 1, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-07-02', '17:48:51'),
(7, '::1', 11, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Sun', '2016-07-03', '04:19:24'),
(8, '::1', 209, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Mon', '2016-07-11', '04:57:02'),
(9, '::1', 412, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Tue', '2016-07-12', '03:30:09'),
(10, '::1', 33, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-07-13', '14:21:15'),
(11, '::1', 27, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Thu', '2016-07-14', '09:17:48'),
(12, '::1', 339, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-07-15', '09:34:49'),
(13, '::1', 111, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-07-16', '14:48:58'),
(14, '::1', 18, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Sun', '2016-07-17', '03:15:55'),
(15, '::1', 60, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.19 Safari/537.36', NULL, 'Windows 7', 'Mon', '2016-07-18', '15:14:07'),
(16, '::1', 50, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.8 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-07-20', '16:21:43'),
(17, '::1', 2, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.21 Safari/537.36', NULL, 'Windows 7', 'Tue', '2016-07-26', '18:06:42'),
(18, '::1', 77, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.21 Safari/537.36', NULL, 'Windows 7', 'Thu', '2016-07-28', '14:15:20'),
(19, '::1', 7, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2810.2 Safari/537.36', NULL, 'Windows 7', 'Sun', '2016-07-31', '10:17:07'),
(20, '::1', 2, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2810.2 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-08-03', '15:36:49'),
(21, '::1', 2, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2816.0 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-08-06', '13:31:50'),
(22, '::1', 12, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2816.0 Safari/537.36', NULL, 'Windows 7', 'Sun', '2016-08-07', '12:05:01'),
(23, '::1', 2, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2816.0 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-08-10', '09:43:40'),
(24, '::1', 4, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2816.0 Safari/537.36', NULL, 'Windows 7', 'Thu', '2016-08-11', '15:24:03'),
(25, '::1', 192, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2816.0 Safari/537.36', NULL, 'Windows 7', 'Sun', '2016-08-14', '09:49:53'),
(26, '::1', 60, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2816.0 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-08-17', '11:47:13'),
(27, '::1', 99, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2832.2 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-08-26', '15:46:48'),
(28, '::1', 20, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2832.2 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-08-27', '14:27:54'),
(29, '::1', 21, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.6 Safari/537.36', NULL, 'Windows 7', 'Thu', '2016-09-01', '14:45:17'),
(30, '::1', 3, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.8 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-09-03', '06:39:54'),
(31, '::1', 29, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.8 Safari/537.36', NULL, 'Windows 7', 'Tue', '2016-09-13', '07:26:56'),
(32, '::1', 15, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2859.0 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-09-23', '13:56:14'),
(33, '::1', 8, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2859.0 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-09-24', '03:41:56'),
(34, '::1', 2, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2868.3 Safari/537.36', NULL, 'Windows 7', 'Sun', '2016-09-25', '02:41:50'),
(35, '::1', 8, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2873.0 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-10-07', '17:06:49'),
(36, '::1', 10, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.9 Safari/537.36', NULL, 'Windows 7', 'Thu', '2016-10-13', '15:29:30'),
(37, '::1', 61, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.11 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-10-14', '14:53:14'),
(38, '::1', 34, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.11 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-10-15', '04:12:21'),
(39, '::1', 189, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.11 Safari/537.36', NULL, 'Windows 7', 'Sun', '2016-10-16', '01:32:49'),
(40, '::1', 127, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.11 Safari/537.36', NULL, 'Windows 7', 'Mon', '2016-10-17', '15:14:43'),
(41, '::1', 16, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.11 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-10-19', '16:10:53'),
(42, '::1', 14, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2896.3 Safari/537.36', NULL, 'Windows 7', 'Mon', '2016-10-24', '14:50:29'),
(43, '::1', 16, 'Firefox', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', NULL, 'Windows 7', 'Thu', '2016-11-03', '13:33:11'),
(44, '::1', 3, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2906.0 Safari/537.36', NULL, 'Windows 7', 'Tue', '2016-11-08', '13:21:28'),
(45, '::1', 8, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2906.0 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-11-09', '12:46:39'),
(46, '::1', 37, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2914.3 Safari/537.36', NULL, 'Windows 7', 'Thu', '2016-11-17', '15:12:59'),
(47, '::1', 67, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2914.3 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-11-18', '14:52:31'),
(48, '::1', 117, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2914.3 Safari/537.36', NULL, 'Windows 7', 'Sat', '2016-11-19', '02:56:10'),
(49, '::1', 8, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.3 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-11-25', '14:38:41'),
(50, '::1', 51, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2950.4 Safari/537.36', NULL, 'Windows 7', 'Wed', '2016-12-21', '10:26:35'),
(51, '::1', 13, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2950.4 Safari/537.36', NULL, 'Windows 7', 'Fri', '2016-12-23', '00:10:01'),
(52, '::1', 10, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2950.4 Safari/537.36', NULL, 'Windows 7', 'Tue', '2016-12-27', '16:12:38'),
(53, '::1', 3, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2970.0 Safari/537.36', NULL, 'Windows 7', 'Sun', '2017-01-08', '14:21:32'),
(54, '::1', 1, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.16 Safari/537.36', NULL, 'Windows 7', 'Mon', '2017-04-24', '04:59:42'),
(55, '::1', 5, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3371.0 Safari/537.36', NULL, 'Windows 7', 'Wed', '2018-04-04', '02:45:20'),
(56, '::1', 11, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3371.0 Safari/537.36', NULL, 'Windows 7', 'Mon', '2018-04-09', '10:29:25'),
(57, '::1', 1, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', NULL, 'Windows 7', 'Sun', '2019-01-13', '13:42:37'),
(58, '::1', 3, 'Chrome', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', NULL, 'Windows 7', 'Thu', '2019-04-11', '14:52:04'),
(59, '127.0.0.1', 2, 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', NULL, 'Windows 10', 'Tue', '2022-10-25', '09:41:49'),
(60, '::1', 1, 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', NULL, 'Windows 10', 'Tue', '2022-10-25', '13:58:42'),
(61, '::1', 7, 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', NULL, 'Windows 10', 'Fri', '2022-10-28', '02:02:55'),
(62, '::1', 1, 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', NULL, 'Windows 10', 'Tue', '2022-11-08', '04:23:36'),
(63, '::1', 4, 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', NULL, 'Windows 10', 'Wed', '2022-11-09', '03:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_user`
--

CREATE TABLE `mpc_user` (
  `id` int NOT NULL,
  `level_id` int NOT NULL,
  `languange_id` int NOT NULL,
  `full_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_nmbr` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `join_date` date NOT NULL,
  `join_time` time NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `logout_date` datetime DEFAULT NULL,
  `activation_code` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgot_pass_code` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `online` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_user`
--

INSERT INTO `mpc_user` (`id`, `level_id`, `languange_id`, `full_name`, `email`, `username`, `password`, `phone_nmbr`, `birth_date`, `join_date`, `join_time`, `login_date`, `logout_date`, `activation_code`, `forgot_pass_code`, `active`, `online`) VALUES
(1, 1, 2, 'Super Administrator', 'superadmin@fridaycms.com', 'superadmin', '$2y$10$i88eGdjQaiUBGDlApkJGl.fBEu63ZlRZjX2vCwO7F1vbotWs3JQAC', '081234567890', '1979-11-09', '2022-11-09', '00:00:00', '2022-11-09 03:57:26', NULL, NULL, NULL, 'Y', 'Y'),
(7, 2, 1, 'ssssssssssss', 'sss@sss.com', 'ssssssssssss', '$2y$10$TPW.MDuo4lfKK/FmJiuW.eO4jJvjZczFwTg5k6uIiNv2UE4XDHwrS', '222222222222222', '2022-02-22', '2016-06-30', '15:55:58', '2016-12-27 16:18:01', '2016-12-27 16:20:55', NULL, NULL, 'Y', 'N'),
(8, 3, 1, 'rrrrrrrr', 'rrrrrrrrr@rrrrrr.com', 'rrrrrrrrr', '$2y$10$v4kg.fe9YCiXMnn0R23DlOTSzfvYsWagmWYtQ1oR6YtniPnIGCESK', '33333333', '2022-12-31', '2016-07-26', '17:55:44', '2016-08-06 15:01:05', '2016-07-31 06:22:21', NULL, NULL, 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_user_access`
--

CREATE TABLE `mpc_user_access` (
  `id` int NOT NULL,
  `level_id` int NOT NULL,
  `app` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_access` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_all_access` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `write_access` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `write_moderate` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_access` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_moderate` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_access` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_selected_access` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_all_access` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_user_access`
--

INSERT INTO `mpc_user_access` (`id`, `level_id`, `app`, `read_access`, `read_all_access`, `write_access`, `write_moderate`, `edit_access`, `edit_moderate`, `delete_access`, `delete_selected_access`, `delete_all_access`, `active`) VALUES
(1, 1, 'post', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'N', 'Y'),
(2, 1, 'post_category', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(3, 1, 'post_comment', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(4, 1, 'page', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(5, 1, 'user', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(6, 1, 'file_manager', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(7, 1, 'themes', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(9, 1, 'app', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(10, 1, 'app_file', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(11, 1, 'post_tag', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(12, 1, 'setting', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(37, 1, 'theme_file', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(38, 2, 'post', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(39, 2, 'post_category', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(40, 2, 'post_comment', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(41, 2, 'page', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(42, 2, 'user', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(43, 2, 'file_manager', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(44, 2, 'themes', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(45, 2, 'app', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(46, 2, 'app_file', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(47, 2, 'post_tag', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(48, 2, 'setting', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y'),
(49, 2, 'theme_file', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_user_activities`
--

CREATE TABLE `mpc_user_activities` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `from_uid` int DEFAULT NULL,
  `to_aid` int DEFAULT NULL,
  `shared_aid` int DEFAULT NULL,
  `type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `json` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_published` date NOT NULL,
  `time_published` time NOT NULL,
  `private` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_user_activities`
--

INSERT INTO `mpc_user_activities` (`id`, `user_id`, `from_uid`, `to_aid`, `shared_aid`, `type`, `json`, `date_published`, `time_published`, `private`) VALUES
(1, 1, NULL, NULL, NULL, 'publish_status', '{\"contain_photo\":\"Y\",\"content\":\"semangat coding gans!\",\"photos\":\"\"}', '2016-10-19', '20:00:00', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_user_levels`
--

CREATE TABLE `mpc_user_levels` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `privileges` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpc_user_levels`
--

INSERT INTO `mpc_user_levels` (`id`, `name`, `privileges`) VALUES
(1, 'Super Administrator', '[{\"app\":\"post\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"post_category\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"post_tag\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"post_comment\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"page\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"file_manager\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"user\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"N\",\"delete_all\":\"Y\"},{\"app\":\"themes\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"theme_file\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"app\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"app_file\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"settings\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"}]'),
(2, 'Administrator', '[{\"app\":\"post\",\"read\":\"Y\",\"read_all\":\"N\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"post_category\",\"read\":\"Y\",\"read_all\":\"N\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"N\",\"delete_all\":\"Y\"},{\"app\":\"post_tag\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"post_comment\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"page\",\"read\":\"Y\",\"read_all\":\"N\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"file_manager\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"user\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"themes\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"theme_file\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"app\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"app_file\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"},{\"app\":\"settings\",\"read\":\"Y\",\"read_all\":\"Y\",\"write\":\"Y\",\"write_moderate\":\"N\",\"edit\":\"Y\",\"edit_moderate\":\"N\",\"activate\":\"Y\",\"delete\":\"Y\",\"delete_selected\":\"Y\",\"delete_all\":\"Y\"}]'),
(3, 'Author', ''),
(4, 'User', '');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_user_privileges`
--

CREATE TABLE `mpc_user_privileges` (
  `id` int NOT NULL,
  `module_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mpc_user_privileges`
--

INSERT INTO `mpc_user_privileges` (`id`, `module_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'read_posts', '2022-10-25 13:51:39', '2022-10-25 13:51:39'),
(2, 1, 'read_others_posts', '2022-10-25 13:51:39', '2022-10-25 13:51:39'),
(3, 1, 'create_posts', '2022-10-25 13:53:55', '2022-10-25 13:53:55'),
(4, 10, 'read_user_roles', '2022-10-25 13:53:55', '2022-10-25 13:53:55'),
(5, 11, 'read_user_privileges', '2022-10-25 13:56:45', '2022-10-25 13:56:45'),
(6, 1, 'update_posts_status', '2022-10-25 13:59:38', '2022-10-25 13:59:38'),
(7, 7, 'read_users', '2022-11-09 03:38:35', '2022-11-09 03:38:35'),
(8, 7, 'create_users', '2022-11-09 03:38:35', '2022-11-09 03:38:35'),
(9, 7, 'delete_users', '2022-11-09 03:38:35', '2022-11-09 03:38:35'),
(10, 7, 'update_users', '2022-11-09 03:38:35', '2022-11-09 03:38:35'),
(11, 7, 'update_users_status', '2022-11-09 03:38:35', '2022-11-09 03:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_user_roles`
--

CREATE TABLE `mpc_user_roles` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mpc_user_roles`
--

INSERT INTO `mpc_user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', '2022-10-25 13:50:30', '2022-10-25 13:50:30'),
(2, 'Administrator', '2022-10-25 13:50:30', '2022-10-25 13:50:30'),
(3, 'Author', '2022-10-25 13:51:14', '2022-10-25 13:51:14'),
(4, 'User', '2022-10-25 13:51:14', '2022-10-25 13:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `mpc_user_roles_privileges`
--

CREATE TABLE `mpc_user_roles_privileges` (
  `role_id` int NOT NULL,
  `privilege_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mpc_user_roles_privileges`
--

INSERT INTO `mpc_user_roles_privileges` (`role_id`, `privilege_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 6),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mpc_languange`
--
ALTER TABLE `mpc_languange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_menu`
--
ALTER TABLE `mpc_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_modules`
--
ALTER TABLE `mpc_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_pages`
--
ALTER TABLE `mpc_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_posts`
--
ALTER TABLE `mpc_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_post_categories`
--
ALTER TABLE `mpc_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_post_comment`
--
ALTER TABLE `mpc_post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_post_tags`
--
ALTER TABLE `mpc_post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_settings`
--
ALTER TABLE `mpc_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_submenu`
--
ALTER TABLE `mpc_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_subscriber`
--
ALTER TABLE `mpc_subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_tes`
--
ALTER TABLE `mpc_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_themes`
--
ALTER TABLE `mpc_themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_traffic`
--
ALTER TABLE `mpc_traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_user`
--
ALTER TABLE `mpc_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_user_access`
--
ALTER TABLE `mpc_user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_user_activities`
--
ALTER TABLE `mpc_user_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_user_levels`
--
ALTER TABLE `mpc_user_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpc_user_privileges`
--
ALTER TABLE `mpc_user_privileges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_id` (`module_id`);

--
-- Indexes for table `mpc_user_roles`
--
ALTER TABLE `mpc_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mpc_languange`
--
ALTER TABLE `mpc_languange`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mpc_menu`
--
ALTER TABLE `mpc_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mpc_modules`
--
ALTER TABLE `mpc_modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mpc_pages`
--
ALTER TABLE `mpc_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mpc_posts`
--
ALTER TABLE `mpc_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mpc_post_categories`
--
ALTER TABLE `mpc_post_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mpc_post_comment`
--
ALTER TABLE `mpc_post_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mpc_post_tags`
--
ALTER TABLE `mpc_post_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mpc_settings`
--
ALTER TABLE `mpc_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mpc_submenu`
--
ALTER TABLE `mpc_submenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mpc_subscriber`
--
ALTER TABLE `mpc_subscriber`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mpc_tes`
--
ALTER TABLE `mpc_tes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mpc_themes`
--
ALTER TABLE `mpc_themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mpc_traffic`
--
ALTER TABLE `mpc_traffic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `mpc_user`
--
ALTER TABLE `mpc_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mpc_user_access`
--
ALTER TABLE `mpc_user_access`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `mpc_user_activities`
--
ALTER TABLE `mpc_user_activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mpc_user_levels`
--
ALTER TABLE `mpc_user_levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mpc_user_privileges`
--
ALTER TABLE `mpc_user_privileges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mpc_user_roles`
--
ALTER TABLE `mpc_user_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
