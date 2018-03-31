-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2018 at 12:39 AM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.0.28-1+ubuntu17.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kienvang.dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `cv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(5) NOT NULL DEFAULT '1' COMMENT '1; slide, 2; banner main, 3; banner footer',
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `type`, `avatar`, `description`, `created_at`, `updated_at`) VALUES
(2, '2 slide label', 1, '1520751869.jpg', 'Praesent commodo cursus magna, vel scelerisque nisl consectetur.', '2018-03-17 15:59:05', '2018-03-17 17:04:08'),
(3, '3 slide label', 1, '1521303649.jpg', 'Praesent commodo cursus magna, vel scelerisque nisl consectetur.', '2018-03-17 16:20:49', '2018-03-17 17:04:14'),
(4, NULL, 2, '1521389662.png', NULL, '2018-03-18 08:53:12', '2018-03-20 16:36:15'),
(5, NULL, 3, '1521389702.jpg', NULL, '2018-03-18 09:15:02', '2018-03-18 09:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Du lịch', 'Du lịch', 0, 1, '2017-10-13 09:22:10', '2017-10-13 09:22:10'),
(2, 'Làm đẹp', 'Làm đẹp', 0, 1, '2017-10-13 09:22:20', '2017-10-13 09:22:20'),
(3, 'Chi tiêu', 'Chi tiêu', 0, 1, '2017-10-13 09:22:55', '2017-10-13 09:22:55'),
(4, 'Chợ đò', 'Chợ đò', 0, 1, '2017-10-13 09:23:51', '2017-10-13 09:23:51'),
(5, 'Sửa nhà', 'Sửa nhà', 0, 1, '2017-10-13 09:24:04', '2017-10-13 09:24:04'),
(6, 'Mua sắm', 'Mua sắm', 0, 1, '2017-10-13 09:24:21', '2017-10-13 09:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `scale` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `founding` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1: show, 0: not show',
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_home` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'show bar-right home 1; show, 0; no show',
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `summary`, `scale`, `founding`, `meta_keyword`, `meta_description`, `status`, `avatar`, `is_home`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Tổ hợp Công nghệ Giáo dục TOPICA', '<p>Tổ hợp C&ocirc;ng nghệ Gi&aacute;o dục TOPICA l&agrave; đơn vị đ&agrave;o tạo trực tuyến h&agrave;ng đầu Đ&ocirc;ng Nam &Aacute;, v&agrave; l&agrave; tổ chức Việt Nam đầu ti&ecirc;n xuất khẩu c&ocirc;ng nghệ gi&aacute;o dục ra nước ngo&agrave;i.&nbsp;<br />\r\n<br />\r\nTOPICA UNI cung cấp hạ tầng c&ocirc;ng nghệ v&agrave; dịch vụ cho 8 trường ĐH ở Việt Nam v&agrave; Philippines để triển khai đ&agrave;o tạo Cử nh&acirc;n trực tuyến chất lượng cao.&nbsp;<br />\r\n<br />\r\nTOPICA NATIVE triển khai chương tr&igrave;nh luyện n&oacute;i tiếng Anh trực tuyến cho học vi&ecirc;n tại Th&aacute;i Lan v&agrave; Việt Nam, v&agrave; l&agrave; đơn vị đầu ti&ecirc;n tr&ecirc;n thế giới ph&aacute;t triển ứng dụng luyện n&oacute;i qua Google Glass.&nbsp;<br />\r\n<br />\r\nTOPICA Founder Institute l&agrave; vườn ươm khởi nghiệp duy nhất tại Việt Nam đ&atilde; c&oacute; c&aacute;c startup nhận đầu tư tổng cộng gần 10 triệu USD.&nbsp;<br />\r\n<br />\r\nMột dự &aacute;n giai đoạn đầu của TOPICA do đ&iacute;ch th&acirc;n cựu Chủ tịch Microsoft Bill Gates khởi động. TOPICA hiện c&oacute; hơn 500 nh&acirc;n vi&ecirc;n to&agrave;n thời gian, 1,400 giảng vi&ecirc;n b&aacute;n thời gian ở c&aacute;c văn ph&ograve;ng Manila, Singapore, Bangkok, H&agrave; Nội, TP. HCM v&agrave; Đ&agrave; Nẵng.<br />\r\n<br />\r\nTh&ocirc;ng tin tham khảo về tổ hợp C&ocirc;ng nghệ Gi&aacute;o dục TOPICA:<br />\r\n<br />\r\n&bull; Giới thiệu TOPICA<br />\r\nhttp://www.youtube.com/user/TOPICA VIETNAM<br />\r\n&bull; C&aacute;c th&ocirc;ng tin kh&aacute;c về hoạt động của TOPICA:&nbsp;<br />\r\nhttp://careers.topica.asia</p>', '1000 - 4999', '', 'Tổ Hợp Công Nghệ Giáo Dục Topica tuyển dụng', 'Tổ Hợp Công Nghệ Giáo Dục Topica tuyển dụng lương hấp dẫn, môi trường chuyên nghiệp.', 1, '1521166498.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:22'),
(2, 'Trung tâm kinh doanh VNPT - Tp.Hồ Chí Minh', '<p>Trung t&acirc;m Kinh doanh VNPT TP. Hồ Ch&iacute; Minh l&agrave; đơn vị cung cấp c&aacute;c dịch vụ viễn th&ocirc;ng, c&ocirc;ng nghệ th&ocirc;ng tin h&agrave;ng đầu tại TP.HCM.</p>\r\n\r\n<p>Địa chỉ:&nbsp;Lầu 2 &ndash; 121 Pasteur, P. 6, Q. 3, TP.HCM</p>', '200', '', 'Trung tâm Kinh doanh VNPT TP. Hồ Chí Minh tuyển dụng', 'Trung tâm Kinh doanh VNPT TP. Hồ Chí Minh là đơn vị cung cấp các dịch vụ viễn thông, công nghệ thông tin hàng đầu tại TP.HCM.', 1, '1521166102.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:25'),
(3, 'LG Electronics Vietnam', '<p><strong>LG l&agrave; thương hiệu h&agrave;ng đầu thế giới</strong>&nbsp;trong lĩnh vực điện tử và đi&ecirc;̣n gia dụng. Thành l&acirc;̣p năm 1947 tại Hàn Qu&ocirc;́c, đ&ecirc;́n nay LG đã có hơn 120 chi nhánh và văn phòng đại di&ecirc;̣n tại các nước và sản ph&acirc;̉m LG đ&ecirc;́n tay người ti&ecirc;u dùng tr&ecirc;n toàn th&ecirc;́ giới. Là C&ocirc;ng ty ti&ecirc;n phong v&ecirc;̀ c&ocirc;ng ngh&ecirc;̣ và đ&ocirc;̉i mới, LG với các sản ph&acirc;̉m kỹ thu&acirc;̣t hi&ecirc;̣n đại d&acirc;̀n chi&ecirc;́m lĩnh thị trường và ni&ecirc;̀m tin của khách hàng.<br />\r\n<br />\r\n<strong>Năm 1995 LG chính thức c&oacute; mặt tại Việt Nam</strong>, và trở thành thương hi&ecirc;̣u quen thu&ocirc;̣c với người ti&ecirc;u dùng Vi&ecirc;̣t Nam. Song song với hoạt đ&ocirc;̣ng kinh doanh, C&ocirc;ng ty LG với phương ch&acirc;m &ldquo;con người là ưu ti&ecirc;n hàng đ&acirc;̀u&rdquo;, li&ecirc;n tục tham gia thực hi&ecirc;̣n các chương trình từ thi&ecirc;̣n xã h&ocirc;̣i, trong đó &ldquo;đường l&ecirc;n đỉnh Olympia&rdquo; nổi tiếng của LG su&ocirc;́t 14 năm qua gắn liền với sự nghiệp ph&aacute;t triển gi&aacute;o dục v&agrave; đ&agrave;o tạo nh&acirc;n t&agrave;i của Việt Nam.<br />\r\n<br />\r\nNăm 2013, tổ hợp sản xuất của tập đo&agrave;n LG Electronics tại Hải Ph&ograve;ng (LGEVH) chính thức được c&acirc;́p gi&acirc;́y phép. LGEVH sản xuất c&aacute;c sản phẩm ch&iacute;nh: M&aacute;y giặt, M&aacute;y h&uacute;t bụi, Tivi, Điện thoại, Thiết bị giải tr&iacute; nghe nh&igrave;n cho oto. Nằm tr&ecirc;n diện t&iacute;ch 40 ha tại khu c&ocirc;ng nghiệp Tr&agrave;ng Duệ với vốn đầu tư 1.5 tỉ đ&ocirc; la, dự án nhà máy của LG được coi l&agrave; dự &aacute;n đầu tư nước ngo&agrave;i lớn nhất Hải Ph&ograve;ng hiện nay sẽ tạo ra h&agrave;ng chục ng&agrave;n việc l&agrave;m trong thời gian tới.</p>\r\n\r\n<p><u><strong>Địa chỉ li&ecirc;n hệ:</strong></u></p>\r\n\r\n<p>-&nbsp;<strong><em>H&agrave; Nội:&nbsp;</em></strong>Tầng 35, t&ograve;a nh&agrave; Keangnam Landmark 72, đường Phạm H&ugrave;ng, quận Nam Từ Li&ecirc;m</p>\r\n\r\n<p>SĐT: (04) 3934 5151</p>\r\n\r\n<p>Fax: (04) 3934 5152</p>\r\n\r\n<p>Email:&nbsp;<a href=\"mailto:lgjobs.hn@lgepartner.com\">lgjobs.hn@lgepartner.com</a></p>\r\n\r\n<p>-&nbsp;<strong><em>Đ&agrave; Nẵng:&nbsp;</em></strong>tầng 9, to&agrave; nh&agrave; Indochina, 74 Bạch Đằng</p>\r\n\r\n<p>SĐT: (0511) 369 1307</p>\r\n\r\n<p>Fax: (0511) 369 1309</p>\r\n\r\n<p>Email:&nbsp;<a href=\"mailto:lgjobs.hn@lgepartner.com\">lgjobs.dn@lgepartner.com</a></p>\r\n\r\n<p>-&nbsp;<strong><em>Hồ Ch&iacute; Minh:&nbsp;</em></strong>Tầng 5 To&agrave; nh&agrave; Bảo Việt, 233 Đồng Khởi, Quận 1</p>\r\n\r\n<p>SĐT: (08) 3925 6886</p>\r\n\r\n<p>Fax: (08) 3925 6887</p>\r\n\r\n<p>Email:&nbsp;<a href=\"mailto:lgjobs.hn@lgepartner.com\">lgjobs.hcm@lgepartner.com</a></p>\r\n\r\n<p><em><strong>- Hải Ph&ograve;ng:&nbsp;</strong></em>C&ocirc;ng ty LG Electronics Việt Nam Hải Ph&ograve;ng (LGEVH): L&ocirc; CN2, KCN Tr&agrave;ng Duệ, X&atilde; L&ecirc; Lợi, huyện An Dương, Hải Ph&ograve;ng</p>\r\n\r\n<p>SĐT: 0318 820 700</p>\r\n\r\n<p>Email:&nbsp;<a href=\"mailto:recruitment.02@lge.com\">recruitment.02@lge.com</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Địa Chỉ :</strong>&nbsp;<br />\r\n<strong>Điện Thoại :</strong>&nbsp;<br />\r\n<strong>Fax :</strong>&nbsp;<br />\r\n<strong>Email :</strong>&nbsp;lgejobs.hn@lgepartner.com</p>', '1000', '', 'LG Electronics Vietnam', 'LG là thương hiệu hàng đầu thế giới trong lĩnh vực điện tử và điện gia dụng.', 1, '1521165072.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:27'),
(4, 'Công ty cổ phần cáp điện & hệ thống LS-VINA', '<p>iền th&acirc;n của c&ocirc;ng ty l&agrave; c&ocirc;ng ty LG-VINA Cable được th&agrave;nh lập v&agrave;o ng&agrave;y 25/01/1996. Đến năm 2005, c&ocirc;ng ty ch&iacute;nh thức đổi t&ecirc;n th&agrave;nh C&ocirc;ng ty CP C&aacute;p điện v&agrave; hệ thống LS-VINA l&agrave; c&ocirc;ng ty li&ecirc;n doanh giữa tập đo&agrave;n LS H&agrave;n Quốc v&agrave; UBND th&agrave;nh phố Hải Ph&ograve;ng.@ Sau 20 năm hoạt động tại Việt Nam, LS-VINA Cable được đ&aacute;nh gi&aacute; l&agrave; nh&agrave; sản xuất d&acirc;y c&aacute;p h&agrave;ng đầu Việt Nam m&agrave; c&ograve;n tự h&agrave;o l&agrave; nh&agrave; sản xuất d&acirc;y c&aacute;p điện c&oacute; c&ocirc;ng suất lớn nhất khu vực Đ&ocirc;ng Nam Ch&acirc;u &Aacute; hiện nay. Sản phẩm d&acirc;y v&agrave; c&aacute;p điện của c&ocirc;ng ty được sản xuất tr&ecirc;n d&acirc;y chuyền c&ocirc;ng nghệ hiện đại h&agrave;ng đầu thế giới, dưới sự điều h&agrave;nh của c&aacute;c chuy&ecirc;n gia đầu ng&agrave;nh đến từ H&agrave;n Quốc, kết hợp với đội ngũ c&aacute;n bộ kỹ sư giỏi, c&ocirc;ng nh&acirc;n l&agrave;nh nghề, nhiều năm kinh nghiệm trong nước. C&aacute;p điện của c&ocirc;ng ty được đ&aacute;nh gi&aacute; c&oacute; đặc t&iacute;nh chống thấm, chống ch&aacute;y, kh&oacute;i kh&ocirc;ng độc, chống mối mọt, chịu dầu, điện kế&hellip; đ&aacute;p ứng tốt nhu cầu thị trường trong v&agrave; ngo&agrave;i nước. Hiện tại, LS-VINA Cable &amp; System đang vận h&agrave;nh theo hệ thống quản l&yacute; chất lượng ISO 9001:2008 v&agrave; ti&ecirc;u chuẩn m&ocirc;i trường ISO 14001. Điều đ&oacute; khẳng định rằng, l&atilde;nh đạo C&ocirc;ng ty lu&ocirc;n lu&ocirc;n coi trọng chất lượng sản phẩm v&agrave; ph&aacute;t triển bền vững gắn liền với bảo vệ m&ocirc;i trường.</p>', '1-10', '', 'Công ty cổ phần cáp điện & hệ thống LS-VINA', 'Công ty cổ phần cáp điện & hệ thống LS-VINA', 1, '1521164504.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:30'),
(5, 'Sacomreal - Địa ốc Sài Gòn Thương Tín', '<p>Sacomreal l&agrave; một trong những c&ocirc;ng ty địa ốc với quy m&ocirc; hoạt động v&agrave; số vốn đầu tư h&agrave;ng đầu trong lĩnh vực bất động sản tại Việt Nam. L&agrave; 1 trong những c&ocirc;ng ty tuyển dụng h&agrave;ng đầu Việt Nam. Do nhu cầu ph&aacute;t triển, mở rộng quy m&ocirc; hoạt động đa dạng h&oacute;a hoạt động kinh doanh v&agrave; li&ecirc;n doanh c&aacute;c đối t&aacute;c trong v&agrave; ngo&agrave;i nước để chuẩn bị cho việc triển khai c&aacute;c dự &aacute;n lớn : Khu C&ocirc;ng Nghiệp, S&acirc;n Golf, Dự &Aacute;n Thủy Điện&hellip;<br />\r\nCh&uacute;ng t&ocirc;i đang t&igrave;m kiếm c&aacute;c ứng vi&ecirc;n tiềm năng cho c&aacute;c vị tr&iacute; sau:</p>\r\n\r\n<p>Địa chỉ:&nbsp;278 Nam Ky Khoi Nghia, Ward 8, District 3, Ho Chi Minh City, VN</p>', '100-499', NULL, 'Sacomreal - Địa ốc Sài Gòn Thương Tín tuyển dụng', 'Sacomreal là một trong những công ty địa ốc với quy mô hoạt động và số vốn đầu tư hàng đầu trong lĩnh vực bất động sản tại Việt Nam.', 1, '1521167083.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:33'),
(6, 'Liên hiệp HTX Thương Mại TPHCM (Sài Gòn Co.op)', '<p>* Lịch sử h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển của Saigon Co.op<br />\r\nKhởi nghiệp từ năm 1989, sau đại hội Đảng lần thứ VI, nền kinh tế đất nước chuyển từ cơ chế bao cấp sang nền kinh tế thị trường theo định hướng XHCN, m&ocirc; h&igrave;nh kinh tế HTX kiểu cũ thật sự kh&oacute; khăn v&agrave; l&acirc;m v&agrave;o t&igrave;nh thế khủng hoảng phải giải thể h&agrave;ng loạt. Trong bối cảnh như thế, ng&agrave;y 12/5/1989 - UBND Th&agrave;nh phố Hồ Ch&iacute; Minh c&oacute; chủ trương chuyển đổi Ban Quản l&yacute; HTX Mua B&aacute;n Th&agrave;nh phố trở th&agrave;nh Li&ecirc;n hiệp HTX Mua b&aacute;n Th&agrave;nh phố Hồ Ch&iacute; Minh - Saigon Co.op với 2 chức năng trực tiếp kinh doanh v&agrave; tổ chức vận động phong tr&agrave;o HTX. Saigon Co.op l&agrave; tổ chức kinh tế HTX theo nguy&ecirc;n tắc x&aacute;c lập sở hữu tập thể, hoạt động sản xuất kinh doanh tự chủ v&agrave; tự chịu tr&aacute;ch nhiệm.<br />\r\n<br />\r\n* Nắm bắt cơ hội ph&aacute;t triển<br />\r\nTừ năm 1992 đến 1997, c&ugrave;ng với sự ph&aacute;t triển của nền kinh tế đất nước, c&aacute;c nguồn vốn đầu tư nước ngo&agrave;i v&agrave;o Việt Nam l&agrave;m cho c&aacute;c Doanh nghiệp phải năng động v&agrave; s&aacute;ng tạo để nắm bắt c&aacute;c cơ hội kinh doanh, học hỏi kinh nghiệm quản l&yacute; từ c&aacute;c đối t&aacute;c nước ngo&agrave;i. Saigon Co.op đ&atilde; khởi đầu bằng việc li&ecirc;n doanh li&ecirc;n kết với c&aacute;c c&ocirc;ng ty nước ngo&agrave;i để gia tăng th&ecirc;m nguồn lực cho hướng ph&aacute;t triển của m&igrave;nh. L&agrave; một trong số &iacute;t đơn vị c&oacute; giấy ph&eacute;p XNK trực tiếp của Th&agrave;nh phố, hoạt động XNK ph&aacute;t triển mạnh mẽ mang lại hiệu quả cao, g&oacute;p phần x&aacute;c lập uy t&iacute;n, vị thế của Saigon Co.op tr&ecirc;n thị trường trong v&agrave; ngo&agrave;i nước.<br />\r\nSự kiện nổi bật nhất l&agrave; sự ra đời si&ecirc;u thị đầu ti&ecirc;n của hệ thống si&ecirc;u thị Co.opmart l&agrave; Co.opmart Cống Quỳnh v&agrave;o ng&agrave;y 09/02/1996, với sự gi&uacute;p đỡ của c&aacute;c phong tr&agrave;o HTX quốc tế đến từ Nhật, Singapore v&agrave; Thụy Điển. Từ đấy loại h&igrave;nh kinh doanh b&aacute;n lẻ mới, văn minh ph&ugrave; hợp với xu hướng ph&aacute;t triển của Th&agrave;nh phố Hồ Ch&iacute; Minh đ&aacute;nh dấu chặng đường mới của Saigon Co.op.<br />\r\n<br />\r\n* Khẳng định v&agrave; ph&aacute;t triển<br />\r\nGiai đoạn 1998 đến 2003 ghi dấu ấn một chặng đường ph&aacute;t triển mới của Saigon Co.op.<br />\r\nLuật HTX ra đời th&aacute;ng 01/1997 m&agrave; Saigon Co.op l&agrave; mẫu HTX điển h&igrave;nh minh chứng sống động về sự cần thiết, t&iacute;nh hiệu quả của loại h&igrave;nh kinh tế HTX, g&oacute;p phần tạo ra thuận lợi mới cho phong tr&agrave;o HTX tr&ecirc;n cả nước ph&aacute;t triển.<br />\r\nNhận thức được tầm quan trọng của hoạt động b&aacute;n lẻ theo đ&uacute;ng chức năng, l&atilde;nh đạo Saigon Co.op d&agrave;nh thời gian nghi&ecirc;n cứu học tập kinh nghiệm của hệ thống si&ecirc;u thị KF (Thụy Điển), NTUC Fair Price (Singapore), Co.op (Nhật Bản) để tạo ra một hệ thống si&ecirc;u thị mang n&eacute;t đặc trưng của phương thức HTX tại TpHCM v&agrave; Việt Nam.<br />\r\nNăm 1998, Saigon Co.op đ&atilde; t&aacute;i cấu tr&uacute;c về tổ chức v&agrave; nh&acirc;n sự, tập trung mọi nguồn lực của m&igrave;nh để đầu tư mạnh cho c&ocirc;ng t&aacute;c b&aacute;n lẻ. C&aacute;c si&ecirc;u thị Co.opmart lần lượt ra đời đ&aacute;nh dấu một giai đoạn ph&aacute;t triển quan trọng: h&igrave;nh th&agrave;nh chuỗi si&ecirc;u thị mang thương hiệu Co.opmart.<br />\r\nNăm 2002: Th&agrave;nh lập Co.opmart Cần Thơ - Si&ecirc;u thị tỉnh đầu ti&ecirc;n ra đời.&nbsp;<br />\r\nNăm 2007: Th&agrave;nh lập C&ocirc;ng ty Cổ phần Đầu tư Ph&aacute;t triển Saigon Co.op - SCID.<br />\r\nTh&agrave;nh lập C&ocirc;ng ty Cổ phần Th&agrave;nh C&ocirc;ng - SC IMEX.&nbsp;<br />\r\nTham gia th&agrave;nh lập C&ocirc;ng ty Cổ phần Đầu tư Ph&aacute;t triển hệ thống ph&acirc;n phối Việt Nam - VDA.&nbsp;<br />\r\nNăm 2008: Ra mắt chuỗi cửa h&agrave;ng thực phẩm an to&agrave;n tiện lợi Co.opFood.<br />\r\nNăm 2010: Ph&aacute;t triển m&ocirc; h&igrave;nh b&aacute;n lẻ trực tuyến qua truyền h&igrave;nh HTV Co.op.<br />\r\nHệ thống si&ecirc;u thị Co.opmart ph&aacute;t triển tr&ecirc;n mọi miền đất nước, Co.opmart đạt 50 si&ecirc;u thị tr&ecirc;n to&agrave;n quốc.<br />\r\nCo.opmart S&agrave;i G&ograve;n tại thủ đ&ocirc; H&agrave; Nội - si&ecirc;u thị ph&iacute;a Bắc đầu ti&ecirc;n ra đời.<br />\r\nNăm 2012: Co.opmart thay đổi Bộ nhận diện Thương hiệu mới.<br />\r\nNăm 2013: Khai trương Đại si&ecirc;u thị Co.opXtraplus tại Thủ Đức, TPHCM.<br />\r\nNăm 2014: Khai trương TTTM SenseCity.<br />\r\nNăm 2015: Khai trương Đại si&ecirc;u thị Co.opXtra T&acirc;n Phong tọa lạc tại Tầng 2 &amp; 3 - Trung t&acirc;m thương mại SC VivoCity (Số 1058 Đại Lộ Nguyễn Văn Linh, phường T&acirc;n Phong, Q.7, Tp.HCM).<br />\r\nT&iacute;nh đến 12/2015, hệ thống Co.opmart c&oacute; 79 si&ecirc;u thị bao gồm 31 Co.opmart ở TPHCM v&agrave; 48 Co.opmart tại c&aacute;c tỉnh:&nbsp;<br />\r\nMiền Bắc: H&agrave; Nội, Hải Ph&ograve;ng, Vĩnh Ph&uacute;c, Thanh H&oacute;a, Bắc Giang<br />\r\nMiền Trung: H&agrave; Tĩnh, Kh&aacute;nh H&ograve;a, Đ&agrave; Nẵng, Quảng Trị, Huế, B&igrave;nh Thuận, Quảng Ng&atilde;i, B&igrave;nh Định, Quảng Nam, Ninh Thuận, Ph&uacute; Y&ecirc;n<br />\r\nT&acirc;y Nguy&ecirc;n: L&acirc;m Đồng, Đắklắk, Gia Lai, Đắk N&ocirc;ng<br />\r\nT&acirc;y Nam Bộ: Bạc Li&ecirc;u, Bến Tre, C&agrave; Mau, Cần Thơ, Đồng Th&aacute;p, Ki&ecirc;n Giang, An Giang, Tiền Giang, Hậu Giang, S&oacute;c Trăng, Long An, Tr&agrave; Vinh, Vĩnh Long<br />\r\nĐ&ocirc;ng Nam Bộ: B&agrave; Rịa - Vũng T&agrave;u, Đồng Nai, B&igrave;nh Dương, B&igrave;nh Phước, T&acirc;y Ninh<br />\r\nCo.opmart đ&atilde; trở th&agrave;nh thương hiệu quen thuộc của người d&acirc;n th&agrave;nh phố v&agrave; người ti&ecirc;u d&ugrave;ng cả nước. L&agrave; nơi mua sắm đ&aacute;ng tin cậy của người ti&ecirc;u d&ugrave;ng. Kh&aacute;i niệm chuỗi Co.opmart được bắt đầu x&acirc;y dựng với chiến lược: X&acirc;y dựng Co.opmart trở th&agrave;nh chuỗi si&ecirc;u thị dẫn đầu Việt Nam. Sự th&agrave;nh c&ocirc;ng của chuỗi si&ecirc;u thị Co.opmart đ&atilde; đưa Saigon Co.op đ&oacute;n nhận phần thưởng cao qu&yacute; &quot;Anh h&ugrave;ng lao động thời kỳ đổi mới&quot; do Chủ tịch nước CHXHCNVN trao tặng từ th&aacute;ng 8/2000.</p>', '10000-19999', '1996', 'Liên hiệp HTX Thương Mại TPHCM (Sài Gòn Co.op) tuyển dụng', 'Liên hiệp HTX Thương Mại TPHCM (Sài Gòn Co.op) tuyển dụng lương hấp dẫn, phúc lợi cao', 1, '1521167677.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:36'),
(7, 'ILA - VIETNAM', '<p>ILA Vietnam l&agrave; một c&ocirc;ng ty hoạt động trong lĩnh vực gi&aacute;o dục v&agrave; đ&agrave;o tạo tiếng Anh c&oacute; vốn sở hữu nước ngo&agrave;i, chuy&ecirc;n cung cấp c&aacute;c chương tr&igrave;nh học v&agrave; dịch vụ bao gồm:<br />\r\n&bull; Chương tr&igrave;nh giảng dạy Anh ngữ d&agrave;nh cho trẻ em v&agrave; người lớn<br />\r\n&bull; Chương tr&igrave;nh luyện thi c&aacute;c kỳ thi quốc tế<br />\r\n&bull; Chương tr&igrave;nh đ&agrave;o tạo gi&aacute;o vi&ecirc;n<br />\r\n&bull; Đ&agrave;o tạo doanh nghiệp<br />\r\n&bull; Trung T&acirc;m Du Học ILA<br />\r\nNăm 2014, ILA c&oacute; hơn 35.000 học vi&ecirc;n đang theo học tại tất cả c&aacute;c trung t&acirc;m ở th&agrave;nh phố Hồ Ch&iacute; Minh, H&agrave; Nội, Đ&agrave; Nẵng v&agrave; Vũng T&agrave;u.<br />\r\nILA lu&ocirc;n ch&uacute; trọng đầu tư v&agrave; cập nhật li&ecirc;n tục đối với c&aacute;c chương tr&igrave;nh học, dịch vụ, trang thiết bị dạy v&agrave; học tại tất cả c&aacute;c cơ sở nhằm đảm bảo mỗi học vi&ecirc;n theo học với ILA đều nhận được sự đ&agrave;o tạo theo ti&ecirc;u chuẩn cao v&agrave; chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Địa chỉ:&nbsp;146 Nguyen Dinh Chieu, Ward 6, Dist. 3, HCMC</p>', '1000-4999', NULL, 'ILA - VIETNAM tuyển dụng', 'ILA - VIETNAM tuyển dụng lương hấp dẫn, phúc lợi tốt, môi trường làm việc chuyên nghiệp.', 1, '1521168325.jpg', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:38'),
(8, 'Công Ty Cổ Phần Khoa Học Môi Trường Và Công Nghệ CRM', '<p>C&ocirc;ng Ty Cổ Phần Khoa Học M&ocirc;i Trường V&agrave; C&ocirc;ng Nghệ CRM được th&agrave;nh lập năm 2016, c&oacute; văn ph&ograve;ng l&agrave;m việc tại quận Ph&uacute; Nhuận TPHCM, v&agrave; xưởng sản xuất tại Long An.<br />\r\nC&ocirc;ng Ty CRM l&agrave; một doanh nghiệp c&ocirc;ng nghệ cao c&oacute; vốn đầu tư nước ngo&agrave;i 100%, chuy&ecirc;n sản xuất h&oacute;a chất l&agrave;m giấy, h&oacute;a chất ng&agrave;nh dệt, chất phụ trợ n&ocirc;ng dược, sản lượng mỗi chất đạt 10.000 tấn một năm.</p>', NULL, NULL, 'Công Ty Cổ Phần Khoa Học Môi Trường Và Công Nghệ CRM tuyển dụng', 'Công Ty Cổ Phần Khoa Học Môi Trường Và Công Nghệ CRM tuyển dụng lương hấp dẫn, chế độ tốt.', 1, '1521168546.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 17:02:40'),
(9, 'CÔNG TY TNHH ATEAM VIỆT NAM', '<p>&bull; Ateam l&agrave; một trong những c&ocirc;ng ty về Game lớn nhất Nhật Bản. Đến với Ateam bạn c&oacute; cơ hội trải nghiệm to&agrave;n bộ quy tr&igrave;nh v&agrave; c&ocirc;ng nghệ Game do Ateam ph&aacute;t triển độc lập. Ngo&agrave;i ra, bạn sẽ c&oacute; cơ hội được cử đi học tập tại Nhật v&agrave; ph&aacute;t triển kỹ năng của bản th&acirc;n.<br />\r\n&bull; Tại Việt Nam, Ateam l&agrave; một c&ocirc;ng ty mới th&agrave;nh lập. Do đ&oacute;, ch&uacute;ng t&ocirc;i cần bạn để c&ugrave;ng nhau tạo n&ecirc;n một văn h&oacute;a độc đ&aacute;o cho ri&ecirc;ng Ateam.<br />\r\n&bull; L&agrave; một trong những c&ocirc;ng ty đi đầu trong ng&agrave;nh c&ocirc;ng nghệ Mobile Game tại Nhật Bản, ch&uacute;ng t&ocirc;i tin rằng Ateam sẽ nhanh ch&oacute;ng ph&aacute;t triển lớn mạnh tại Việt Nam. Đ&acirc;y sẽ l&agrave; cơ hội để bạn đ&oacute;ng g&oacute;p cho ch&uacute;ng t&ocirc;i v&agrave; c&oacute; được mức lương đ&aacute;ng ngưỡng mộ.</p>\r\n\r\n<p>Địa chỉ:&nbsp;Ph&ograve;ng số 1, Tầng 18, T&ograve;a nh&agrave; Saigon Centre, Số 67 đường L&ecirc; Lợi, Phường Bến Ngh&eacute;, Quận 1, Th&agrave;nh phố Hồ Ch&iacute; Minh, Việt Nam</p>', NULL, '', 'CÔNG TY TNHH ATEAM VIỆT NAM tuyển dụng', 'CÔNG TY TNHH ATEAM VIỆT NAM tuyển dụng', 1, '1521169096.png', 1, 'http://nongdanit.info', '2018-03-19 15:57:20', '2018-03-20 10:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `status`, `created_at`) VALUES
(1, 'Nguyễn Quốc Sử', 'trantuananh198610@gmail.com', 'dq&#x1B0;d q&#x1B0; d d qwd d q', 1, '2018-03-25 23:39:30'),
(2, 'Kỹ sư Việt Nam', 'add@yahoo.com', '&#x111;á dq&#x1B0; d<br />\r\ndlqpow jq<br />\r\n dqodhoq<br />\r\n q&#x1B0;hdo', 1, '2018-03-25 23:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `major_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '1: hien thi, 0: khong hien thi',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `slug`, `description`, `summary`, `major_id`, `company_id`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tuyển dụng nhân viên kinh doanh (15 người)', 'tuyen-dung-nhan-vien-kinh-doanh-15-nguoi', 'Trung tâm Kinh doanh VNPT TP. Hồ Chí Minh là đơn vị cung cấp các dịch vụ viễn thông, công nghệ thông tin hàng đầu tại TP.HCM', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Được tham gia chế độ ch&iacute;nh s&aacute;ch</p>\r\n\r\n<p>Được l&agrave;m việc trong m&ocirc;i trường chuy&ecirc;n nghiệp</p>\r\n\r\n<p>Trở th&agrave;nh nh&acirc;n vi&ecirc;n ch&iacute;nh thức của VNPT</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Thực hiện c&ocirc;ng t&aacute;c tư vấn, b&aacute;n h&agrave;ng dịch vụ VT-CNTT, chăm s&oacute;c kh&aacute;ch h&agrave;ng cho khối kh&aacute;ch h&agrave;ng doanh nghiệp tr&ecirc;n địa b&agrave;n phụ tr&aacute;ch.<br />\r\n- Tiếp cận kh&aacute;ch h&agrave;ng doanh nghiệp để thu thập th&ocirc;ng tin, cập nhật chương tr&igrave;nh.</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Nam, nữ 22- 35 tuổi.<br />\r\n- Tr&igrave;nh độ: Tốt nghiệp đại học, cao đẳng ng&agrave;nh quản trị kinh doanh, điện tử- viễn th&ocirc;ng, kinh tế, CNTT.<br />\r\n- Đủ sức khỏe l&agrave;m việc , ưu ti&ecirc;n c&oacute; kinh nghiệm về kinh doanh, b&aacute;n h&agrave;ng.<br />\r\n<br />\r\n* Thu nhập theo thỏa thuận.<br />\r\n* Hồ sơ gồm:<br />\r\n1. Bản sơ yếu l&yacute; lịch c&oacute; d&aacute;n ảnh 4x6; Đơn xin việc; 2 h&igrave;nh 3x4 (c&oacute; chứng nhận địa phương).<br />\r\n2. Giấy kh&aacute;m sức khỏe (c&oacute; gi&aacute; trị trong v&ograve;ng 03 th&aacute;ng gần nhất).<br />\r\n3. Bản sao c&ocirc;ng chứng hợp ph&aacute;p c&aacute;c giấy tờ: Hộ khẩu; Giấy tạm tr&uacute; (nếu ở Tỉnh); CMND; Giấy khai sinh; Bằng tốt nghiệp, chứng chỉ đ&agrave;o tạo; kết quả học tập theo c&aacute;c văn bằng.<br />\r\n* Thời gian, địa điểm nhận hồ sơ:<br />\r\nGiờ h&agrave;nh ch&iacute;nh (08h00-12h00, 13h00-16h30).&nbsp;<br />\r\nTại Ph&ograve;ng Nh&acirc;n sự/Trung t&acirc;m Kinh doanh VNPT TP.Hồ Ch&iacute; Minh.<br />\r\nĐịa chỉ: Lầu 2 &ndash; 121 Pasteur, P. 6, Q. 3, TP.HCM,</p>', 2, 2, 'Trung Tâm Kinh Doanh VNPT - Tp. Hồ Chí Minh tuyển dụng Nhân Viên Kinh Doanh', 'Trung Tâm Kinh Doanh VNPT - Tp. Hồ Chí Minh tuyển dụng Nhân Viên Kinh Doanh lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:54'),
(2, 'Kỹ Sư Làm Việc Tại Khối Sản Xuất - Tuyển Gấp!', 'ky-su-lam-viec-tai-khoi-san-xuat-tuyen-gap', 'Công Ty Cổ Phần Cáp Điện & Hệ Thống Ls–vina tuyển dụng Kỹ Sư Làm Việc Tại Khối Sản Xuất - Tuyển Gấp! lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt. Tìm hiểu tại Kiến Vàng JSC!', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Thực hiện tăng lương to&agrave;n thể người lao động một năm 1 lần</p>\r\n\r\n<p>Được tham gia BHXH, BHYT, BHTN v&agrave; bảo hiểm tai nạn 24/7</p>\r\n\r\n<p>H&agrave;ng năm, được nghỉ du lịch 03 ng&agrave;y v&agrave; hưởng tiền du lịch theo chế độ ph&uacute;c lợi của C&ocirc;ng ty</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Chi tiết c&ocirc;ng việc sẽ được trao đổi th&ecirc;m khi phỏng vấn</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>I/ Y&ecirc;u cầu chung<br />\r\n- Nam giới, sức khỏe tốt, tuổi đời từ 22 - 35<br />\r\n- Tốt nghiệp Đại học (hệ ch&iacute;nh quy) trở l&ecirc;n c&aacute;c chuy&ecirc;n ng&agrave;nh điện, hệ thống điện, kỹ thuật điện, cơ kh&iacute;, luyện kim, quản trị sản xuất<br />\r\n- C&oacute; khả năng giao tiếp, đọc, viết bằng tiếng Anh.<br />\r\n- Sử dụng th&agrave;nh thạo tin học văn ph&ograve;ng<br />\r\n- Trung thực, nhanh nhẹn, nhiệt t&igrave;nh với c&ocirc;ng việc, c&oacute; nguyện vọng gắn b&oacute; l&acirc;u d&agrave;i với C&ocirc;ng ty.<br />\r\n<br />\r\nII/ Chế độ đ&atilde;i ngộ đối với người lao động<br />\r\n- Thực hiện tăng lương to&agrave;n thể người lao động một năm 1 lần.</p>', 70, 4, 'Tuyển dụng nhanh Kỹ Sư Làm Việc Tại Khối Sản Xuất - Tuyển Gấp!', 'Công Ty Cổ Phần Cáp Điện & Hệ Thống Ls–vina tuyển dụng Kỹ Sư Làm Việc Tại Khối Sản Xuất - Tuyển Gấp! lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt. Tìm hiểu tại Kiến Vàng JSC!', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:49'),
(3, 'LG Electronics Vietnam Haiphong (sales & Marke', 'lg-electronics-vietnam-haiphong-sales-marke', 'LG Electronics Vietnam Haiphong (sales & Marketing) tuyển dụng Gấp - Nhân Viên Marketing - Ngành Hàng Điện Tử ( He PC ) - Làm Việc Tại Đà Nẵng lương hấp dẫn', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Oversea Training</p>\r\n\r\n<p>Laptop for employees</p>\r\n\r\n<p>Team building activities</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Quản l&iacute;, gi&aacute;m s&aacute;t nh&acirc;n vi&ecirc;n tư vấn &amp; giới thiệu sản phẩm (PC)<br />\r\n- Lập kế hoạch, triển khai v&agrave; gi&aacute;m s&aacute;t c&aacute;c hoạt động b&aacute;n lẻ&nbsp;<br />\r\n- Ph&acirc;n t&iacute;ch t&agrave;i liệu v&agrave; phụ tr&aacute;ch đ&agrave;o tạo sản phẩm&nbsp;<br />\r\n- Ph&acirc;n t&iacute;ch thị trường v&agrave; định hướng ph&aacute;t triển&nbsp;<br />\r\n- Lập c&aacute;c b&aacute;o c&aacute;o theo tuần/ th&aacute;ng/ qu&iacute;.</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Tốt nghiệp Đại học Kinh Tế, Thương mại, Ngoại Ngữ&hellip;<br />\r\n- Tuổi: từ 24 đến 30.<br />\r\n- Tiếng Anh giao tiếp tốt.<br />\r\n- Th&agrave;nh thạo c&aacute;c ứng dụng vi t&iacute;nh văn ph&ograve;ng (Word, Excel, Power point).<br />\r\n- Tự tin, c&oacute; khả năng thương thuyết v&agrave; đ&agrave;m ph&aacute;n.<br />\r\n- &Iacute;t nhất 1 năm kinh nghiệm (Ưu ti&ecirc;n cho những người c&oacute; kinh nghiệm trong lĩnh tương đương).</p>', 70, 3, 'Tuyển dụng nhanh Tuyển Gấp - Nhân Viên Marketing - Ngành Hàng Điện Tử ( He PC )', 'LG Electronics Vietnam Haiphong (sales & Marketing) tuyển dụng Gấp - Nhân Viên Marketing - Ngành Hàng Điện Tử ( He PC ) - Làm Việc Tại Đà Nẵng lương hấp dẫn', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:42'),
(4, 'Giám Đốc Trung Tâm Sales (Senior Director - 22 Fut', 'giam-doc-trung-tam-sales-senior-director-22-fut', 'Tổ hợp Công nghệ Giáo dục TOPICA tuyển giám đốc trung tâm sales', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Được đ&aacute;nh gi&aacute; tăng lương, thăng chức 2 lần/ năm. Nhiều cơ hội tăng lương 50-80%/ năm</p>\r\n\r\n<p>Trải nghiệm 3 vị tr&iacute; l&atilde;nh đạo kh&aacute;c nhau trong 6 th&aacute;ng với 5 sản phẩm cho 6 Quốc gia</p>\r\n\r\n<p>L&agrave;m việc tại m&ocirc;i trường startup trẻ trung, kh&aacute;c biệt, đề cao tranh luận thẳng thắn.</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>Quản L&yacute; Trung T&acirc;m Sales (Senior Manager - 22 Future CEO&#39;s Program) l&agrave; một trong c&aacute;c vị tr&iacute; tuyển dụng quản l&yacute; của Tổ hợp c&ocirc;ng nghệ gi&aacute;o dục Topica nhằm t&igrave;m kiếm c&aacute;c quản l&yacute; cấp cao đảm đương vị tr&iacute; CEO của c&aacute;c sản phẩm mới trong tương lai v&agrave; c&ugrave;ng Topica thực hiện sứ mệnh chiếm lĩnh thị trường c&ocirc;ng nghệ gi&aacute;o dục trực tuyến tại Đ&ocirc;ng Nam &Aacute;.<br />\r\nTrong 6 th&aacute;ng, ứng vi&ecirc;n tham gia chương tr&igrave;nh sẽ trải qua 3 vị tr&iacute; quản l&yacute; ở c&aacute;c lĩnh vực v&agrave; sản phẩm kh&aacute;c nhau của Topica để ho&agrave; nhập v&agrave; thử sức m&igrave;nh.<br />\r\nKhi tốt nghiệp chương tr&igrave;nh, ứng vi&ecirc;n sẽ được chọn vị tr&iacute;/lĩnh vực c&ocirc;ng t&aacute;c, sản phẩm ph&ugrave; hợp nhất theo chuy&ecirc;n m&ocirc;n v&agrave; nguyện vọng để quản l&yacute;.<br />\r\n<br />\r\nI. QUYỀN LỢI<br />\r\n- Đảm nhiệm vị tr&iacute; quản l&yacute; trong c&ocirc;ng ty đa quốc gia với quy m&ocirc; 2000+ nh&acirc;n vi&ecirc;n v&agrave; 1.000.000 kh&aacute;ch h&agrave;ng, mạng lưới hoạt động phủ rộng Đ&ocirc;ng Nam &Aacute;.<br />\r\n- T&iacute;ch lũy cổ phần triệu đ&ocirc; sau 3-7 năm l&agrave;m việc.&nbsp;<br />\r\n- Trở th&agrave;nh quản l&yacute; cấp cao, CEO hoặc tự startup trong 3 năm.<br />\r\n- Mở rộng năng lực quản l&yacute; ở nhiều lĩnh vực.&nbsp;<br />\r\n- Cơ hội triển khai c&aacute;c &yacute; tưởng c&aacute; nh&acirc;n th&agrave;nh c&aacute;c dự &aacute;n với quy m&ocirc; kh&aacute;c nhau dựa v&agrave;o sự cam kết đầu tư từ Tổ hợp.&nbsp;<br />\r\n<br />\r\nII. M&Ocirc; TẢ C&Ocirc;NG VIỆC<br />\r\n<br />\r\n* Hoạt động vận h&agrave;nh<br />\r\n- Đảm bảo mục ti&ecirc;u kinh doanh cho sản phẩm của Tổ hợp h&agrave;ng th&aacute;ng/qu&yacute;/năm.<br />\r\n- Chịu tr&aacute;ch quản l&yacute;, hoạch định kế hoạch, đ&agrave;o tạo n&acirc;ng cao chất lượng nguồn nh&acirc;n lực, tạo động lực v&agrave; ph&aacute;t triển nh&acirc;n sự (quy m&ocirc; 30 - 40 người).<br />\r\n- Ph&acirc;n t&iacute;ch, dự b&aacute;o tiềm năng thị trường v&agrave; c&aacute;c đối thủ cạnh tranh để ph&aacute;t triển c&aacute;c chiến lược b&aacute;n h&agrave;ng ngắn v&agrave; d&agrave;i hạn của Tổ hợp.<br />\r\n- B&aacute;o c&aacute;o trực tiếp kết quả c&ocirc;ng việc với quản l&yacute; c&aacute;c cấp.<br />\r\n- Phối hợp với bộ phận Marketing để đảm bảo triển khai c&aacute;c chiến lược b&aacute;n h&agrave;ng theo đ&uacute;ng mục ti&ecirc;u v&agrave; hiệu quả.<br />\r\n<br />\r\n* Hoạt động ph&aacute;t triển<br />\r\n- Nghi&ecirc;n cứu v&agrave; thử nghiệm c&aacute;c k&ecirc;nh b&aacute;n h&agrave;ng mới (Autosales, outsource&hellip;), ph&aacute;t triển c&aacute;c c&ocirc;ng cụ quản trị b&aacute;n h&agrave;ng (hệ thống CRM, hệ thống quản trị tập trung&hellip;).</p>\r\n\r\n<p>Xem to&agrave;n bộ M&ocirc; Tả C&ocirc;ng Việc</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Độ tuổi 24-30, c&oacute; kinh nghiệm quản l&yacute;.<br />\r\n- Kh&ocirc;ng giới hạn chuy&ecirc;n m&ocirc;n, ng&agrave;nh học.<br />\r\n- Sẵn s&agrave;ng x&oacute;a bỏ tư duy cũ để thực hiện c&aacute;ch l&agrave;m mới.<br />\r\n- C&oacute; tư duy hệ thống v&agrave; kỹ năng ph&aacute;t triển, x&acirc;y dựng hệ thống phức tạp, đa chiều.<br />\r\n- C&oacute; tiếng Anh tốt l&agrave; một lợi thế.<br />\r\n<br />\r\n* QUY TR&Igrave;NH THAM DỰ CHI TIẾT<br />\r\n<br />\r\nB1: Gửi CV ứng tuyển.<br />\r\nB2: Tham dự v&ograve;ng sơ tuyển: Orientation + GTAT + Essay.<br />\r\nB3: Phỏng vấn (Văn h&oacute;a + Chuy&ecirc;n m&ocirc;n).<br />\r\nB4: Trải nghiệm quản l&yacute; tại 03 vị tr&iacute; kh&aacute;c nhau trong v&ograve;ng 06 th&aacute;ng.<br />\r\nB5: Tốt nghiệp 22CEO Tương lai v&agrave; được bổ nhiệm vị tr&iacute; quản l&yacute; tại Topica.</p>', 2, 1, 'Tuyển dụng nhanh Giám Đốc Trung Tâm Sales (Senior Director - 22 Future CEO Program)', 'Tổ Hợp Công Nghệ Giáo Dục Topica tuyển dụng Giám Đốc Trung Tâm Sales (Senior Director - 22 Future CEO Program) lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:37'),
(5, 'Phó Tổng Giám Đốc/ Giám Đốc Phát Triển KD BĐS', 'pho-tong-giam-doc-giam-doc-phat-trien-kd-bds', 'Sacomreal - Địa Ốc Sài Gòn Thương Tín tuyển dụng Phó Tổng Giám Đốc/ Giám Đốc Phát Triển KD BĐS Nghỉ Dưỡng lương hấp dẫn', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Thưởng th&aacute;ng 13 v&agrave; thưởng đ&aacute;nh gi&aacute; th&agrave;nh t&iacute;ch cuối năm</p>\r\n\r\n<p>Chăm s&oacute;c sức khỏe hằng năm tại bệnh vi&ecirc;n uy t&iacute;n; Được cấp bảo l&atilde;nh viện ph&iacute; cho PVI cho cấp quản l&yacute;</p>\r\n\r\n<p>Cấp ph&aacute;t m&aacute;y t&iacute;nh ri&ecirc;ng cho nh&acirc;n sự mới</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>TR&Aacute;CH NHIỆM C&Ocirc;NG VIỆC:<br />\r\n1. Thực hiện c&ocirc;ng việc về chiến lược ph&aacute;t triển mảng BĐS nghỉ dưỡng;<br />\r\n<br />\r\n2. Quản l&yacute; điều h&agrave;nh v&agrave; chịu tr&aacute;ch nhiệm to&agrave;n bộ đối với mảng kinh doanh Bất động sản nghỉ dưỡng của C&ocirc;ng ty;<br />\r\n<br />\r\n3. Nghi&ecirc;n cứu ch&iacute;nh s&aacute;ch b&aacute;n h&agrave;ng của đối thủ tr&ecirc;n thị trường, nhu cầu của kh&aacute;ch h&agrave;ng; Tham mưu, x&acirc;y dựng ch&iacute;nh s&aacute;ch b&aacute;n h&agrave;ng, bao gồm ch&iacute;nh s&aacute;ch về gi&aacute;, khuyến m&atilde;i, chiết khấu &amp; c&aacute;c chương tr&igrave;nh quảng b&aacute;, tiếp cận đến kh&aacute;ch h&agrave;ng;</p>\r\n\r\n<p>4. X&acirc;y dựng v&agrave; triển khai c&oacute; hiệu quả kế hoạch kinh doanh đ&atilde; đề ra, bao gồm: lập mục ti&ecirc;u (Phương hướng, doanh thu, thị trường, kh&aacute;ch h&agrave;ng), kế hoạch b&aacute;n h&agrave;ng (tỷ lệ chiết khấu, phương thức b&aacute;n h&agrave;ng, giảm gi&aacute;m khuyến m&atilde;i, hạch to&aacute;n t&agrave;i ch&iacute;nh.) v&agrave; thực hiện tổ chức triển khai b&aacute;n c&aacute;c sản phẩm bất động sản nghỉ dưỡng trong ngắn, trung v&agrave; d&agrave;i hạn. Ho&agrave;n th&agrave;nh chỉ ti&ecirc;u, doanh số được giao theo từng dự &aacute;n;<br />\r\n<br />\r\n5. T&igrave;m kiếm v&agrave; ph&aacute;t triển quan hệ với c&aacute;c kh&aacute;ch h&agrave;ng &amp; đối t&aacute;c tiềm năng trong lĩnh vực bất động sản nghỉ dưỡng;<br />\r\n<br />\r\n6. Tổ chức thu thập, ph&acirc;n t&iacute;ch, đ&aacute;nh gi&aacute; th&ocirc;ng tin thị trường v&agrave; đưa ra đề xuất, kiến nghị;<br />\r\n<br />\r\n7. X&acirc;y dựng, ph&aacute;t triển đội ngũ kinh doanh v&agrave; quản l&yacute; đội ngũ nh&acirc;n vi&ecirc;n kinh doanh mảng BĐS nghỉ dưỡng; Tuyển dụng v&agrave; tiến h&agrave;nh huấn luyện đội ngũ;<br />\r\n<br />\r\n8. Phối hợp với Ph&ograve;ng/ban li&ecirc;n quan để ph&acirc;n t&iacute;ch v&agrave; đề xuất phương &aacute;n kinh doanh cho phần dự &aacute;n tiền khả thi;<br />\r\n<br />\r\n9. Thực hiện c&ocirc;ng t&aacute;c tham mưu cho TGĐ, HĐQT trong c&ocirc;ng c&aacute;c vấn đề:<br />\r\n<br />\r\na. Xu hướng thị trường BĐS nghĩ dưỡng trong ngắn, trung v&agrave; d&agrave;i hạn;<br />\r\n<br />\r\nb. Xem x&eacute;t, ph&acirc;n t&iacute;ch c&aacute;c b&aacute;o c&aacute;o, thống k&ecirc; để x&acirc;y dựng c&aacute;c dự &aacute;n kinh doanh v&agrave; x&aacute;c định t&iacute;nh hiệu quả của dự &aacute;n;<br />\r\n<br />\r\nc. X&acirc;y dựng phương &aacute;n kinh doanh tiền khả thi phục vụ mục đ&iacute;ch thẩm định đầu tư dự &aacute;n;<br />\r\n<br />\r\nd. Cơ cấu sản phẩm, thiết kế mặt bằng, chọn mẫu vật liệu cho phần thiết kế chi tiết dự &aacute;n&hellip;<br />\r\n<br />\r\ne. Đ&aacute;m ph&aacute;n, k&yacute; hợp đồng với đối t&aacute;c để mở rộng hệ thống ph&acirc;n phối v&agrave; h&igrave;nh th&agrave;nh c&aacute;c đối t&aacute;c chiến lược để ph&aacute;t triển kinh doanh;<br />\r\nThực hiện c&ocirc;ng việc kh&aacute;c theo chỉ đạo của Tổng Gi&aacute;m đốc/ Hội đồng Quản trị;<br />\r\n<br />\r\nQUYỀN HẠN:<br />\r\n1. Đề xuất, tham mưu v&agrave; thực hiện c&aacute;c vấn đề li&ecirc;n quan đến tr&aacute;ch nhiệm c&ocirc;ng việc được giao;<br />\r\n<br />\r\n2. Đề xuất kiến nghị xử l&yacute; với c&aacute;c c&aacute; nh&acirc;n, đơn vị kh&ocirc;ng tu&acirc;n thủ c&aacute;c quy định g&acirc;y ảnh hưởng đến chức năng hoạt động của đơn vị;<br />\r\n<br />\r\n3. Quyết định c&aacute;c vấn đề li&ecirc;n quan đến hoạt động KD BĐS nghỉ dưỡng theo nội dung được ủy quyền từ TGĐ, HĐQT;<br />\r\n<br />\r\n4. Y&ecirc;u cầu c&aacute;c Đơn vị li&ecirc;n quan cung cấp hồ sơ, t&agrave;i liệu để thực hiện c&aacute;c nhiệm vụ tr&ecirc;n;<br />\r\n<br />\r\n5. Y&ecirc;u cầu c&aacute;c Đơn vị li&ecirc;n quan phối hợp thực hiện c&aacute;c c&ocirc;ng việc được giao.<br />\r\n<br />\r\n<br />\r\nQUAN HỆ C&Ocirc;NG T&Aacute;C:<br />\r\n1. Phối hợp t&aacute;c nghiệp nội bộ:<br />\r\n&bull; C&aacute;c ph&ograve;ng ban nội bộ<br />\r\n<br />\r\n2. Phối hợp t&aacute;c nghiệp b&ecirc;n ngo&agrave;i:<br />\r\n&bull; C&aacute;c đối t&aacute;c, nh&agrave; cung cấp<br />\r\n<br />\r\n3. B&aacute;o c&aacute;o cấp tr&ecirc;n trực tiếp:<br />\r\n&bull; HĐQT/ Tổng Gi&aacute;m đốc<br />\r\n<br />\r\n4. Quản l&yacute; cấp dưới trực tiếp:<br />\r\n&bull; CBNV thuộc đơn vị kinh doanh BĐS nghỉ dưỡng</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>1. TR&Igrave;NH ĐỘ, KIẾN THỨC:<br />\r\n- Tr&igrave;nh độ học vấn: Tiến sĩ Thạc sĩ Cử nh&acirc;n Đại học/ Kỹ sư;<br />\r\n- Tr&igrave;nh độ chuy&ecirc;n ng&agrave;nh: C&oacute; bằng Cử nh&acirc;n chuy&ecirc;n ng&agrave;nh: Kinh tế/Ngoại thương &hellip;;<br />\r\n- C&oacute; chứng chỉ chuy&ecirc;n s&acirc;u về ng&agrave;nh nghề li&ecirc;n quan (trường hợp kh&ocirc;ng tốt nghiệp chuy&ecirc;n ng&agrave;nh);<br />\r\n- C&oacute; chứng chỉ bồi dưỡng nghiệp vụ chuy&ecirc;n s&acirc;u về c&aacute;c nguy&ecirc;n tắc quản trị, kinh doanh bao gồm hoạch định chiến lược, ph&acirc;n bổ nguồn lực, phối hợp hoạt động với c&aacute;c đơn vị kh&aacute;c;<br />\r\n- Kiến thức ph&aacute;p luật: C&oacute; kiến thức ph&aacute;p luật về kinh doanh bất động sản.<br />\r\n<br />\r\n2. KỸ NĂNG:<br />\r\n- Ngoại ngữ: Tiếng Anh giao tiếp</p>\r\n\r\n<p>- Tin học: Sử dụng tốt vi t&iacute;nh văn ph&ograve;ng (Word, Excel, Power-point&hellip;) v&agrave; Internet/ c&ocirc;ng cụ t&igrave;m kiếm.<br />\r\n- Kỹ năng mềm<br />\r\n+ C&oacute; kỹ năng giao tiếp với c&aacute;c đối tượng tiếp x&uacute;c;<br />\r\n+ C&oacute; kỹ năng xử l&yacute; t&igrave;nh huống;<br />\r\n+ C&oacute; kỹ năng đ&agrave;m ph&aacute;n, thuyết phục;<br />\r\n+ C&oacute; kỹ năng tr&igrave;nh b&agrave;y.<br />\r\n<br />\r\n3. NĂNG LỰC:<br />\r\n- Kinh nghiệm c&ocirc;ng t&aacute;c:<br />\r\n+ Kinh nghiệm &iacute;t nhất 07 năm trong lĩnh vực kinh doanh BĐS nghỉ dưỡng;<br />\r\n+ &Iacute;t nhất 5 năm trong vị tr&iacute; l&atilde;nh đạo cấp trung (từ Trưởng ph&ograve;ng trở l&ecirc;n) ở C&ocirc;ng ty c&oacute; quy m&ocirc; hoạt động tương đương.<br />\r\n- Năng lực chuy&ecirc;n m&ocirc;n:<br />\r\n+ C&oacute; kiến thức chuy&ecirc;n s&acirc;u về kinh doanh bất động sản nghỉ dưỡng;<br />\r\n+ C&oacute; khả năng thiết lập c&aacute;c quy định, quy tr&igrave;nh, biểu mẫu, c&ocirc;ng cụ quản l&yacute; phục vụ c&ocirc;ng t&aacute;c chiến lược, ph&aacute;t triển kinh doanh bất động sản nghỉ dưỡng.<br />\r\n- Khả năng, kỹ năng:<br />\r\n+ C&oacute; khả năng quản l&yacute;, điều phối, ph&acirc;n c&ocirc;ng c&ocirc;ng việc ph&ugrave; hợp, hiệu quả:<br />\r\n+ C&oacute; khả năng l&agrave;m việc nh&oacute;m v&agrave; l&atilde;nh đạo mọi người đạt được mục ti&ecirc;u đề ra:<br />\r\n+ C&oacute; khả năng thiết lập v&agrave; quản l&yacute; mục ti&ecirc;u c&aacute; nh&acirc;n:<br />\r\n+ C&oacute; khả năng phối hợp c&ocirc;ng việc, tương t&aacute;c với đội nh&oacute;m:<br />\r\n+ C&oacute; khả năng x&acirc;y dựng v&agrave; ph&aacute;t triển c&aacute;c mối quan hệ:<br />\r\n+ C&oacute; khả năng đ&aacute;nh gi&aacute; v&agrave; nhận định về con người.<br />\r\n<br />\r\n4. Y&Ecirc;U CẦU CHUNG:<br />\r\n- Giới t&iacute;nh: Nam/Nữ<br />\r\n- Độ tuổi: 33 &ndash; 50 tuổi<br />\r\n- Giọng n&oacute;i/ giao tiếp<br />\r\n+ Giọng n&oacute;i: r&otilde; r&agrave;ng, dễ nghe (kh&ocirc;ng ph&acirc;n biệt v&ugrave;ng miền):<br />\r\n+ Giao tiếp: tr&igrave;nh b&agrave;y mạch lạc v&agrave; thuyết phục được người nghe, biết lắng nghe v&agrave; phản biện đ&uacute;ng l&uacute;c.<br />\r\n- Ngoại h&igrave;nh/ phong c&aacute;ch<br />\r\n+ Ngoại h&igrave;nh: dễ nh&igrave;n.<br />\r\n+ Phong c&aacute;ch: tự tin, năng động; t&aacute;c phong chuẩn mực<br />\r\n- Phẩm chất c&aacute; nh&acirc;n:<br />\r\n+ Trung thực, năng động, s&aacute;ng tạo<br />\r\n+ H&ograve;a đồng, điềm tĩnh, trung thực.<br />\r\n+ Tinh thần tr&aacute;ch nhiệm cao, tận tụy với c&ocirc;ng việc.<br />\r\n+ Điềm tỉnh, ch&iacute;n chắn trong lời n&oacute;i v&agrave; h&agrave;nh vi.<br />\r\n+ Ki&ecirc;n tr&igrave;, bền bỉ đối mặt với những thử th&aacute;ch<br />\r\n+ Cẩn thận với từng chi tiết nhỏ trong suốt qu&aacute; tr&igrave;nh l&agrave;m việc.<br />\r\n+ Sức khỏe tốt, sẳn s&agrave;ng đi c&ocirc;ng t&aacute;c xa.</p>', 8, 5, 'Tuyển dụng nhanh Phó Tổng Giám Đốc/ Giám Đốc Phát Triển KD BĐS Nghỉ Dưỡng', 'Sacomreal - Địa Ốc Sài Gòn Thương Tín tuyển dụng Phó Tổng Giám Đốc/ Giám Đốc Phát Triển KD BĐS Nghỉ Dưỡng lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:28'),
(6, 'Nhân Viên Kinh Doanh Cho Thuê Mặt Bằng', 'nhan-vien-kinh-doanh-cho-thue-mat-bang', 'Liên hiệp HTX Thương Mại TPHCM (Sài Gòn Co.op) tuyển dụng nhân viên cho thuê mặt bằng', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Được hưởng lương v&agrave; c&aacute;c chế độ ch&iacute;nh s&aacute;ch như: BHYT, BHXH, BHTN ... đầy đủ theo quy định</p>\r\n\r\n<p>Được kh&aacute;m sức khỏe định kỳ</p>\r\n\r\n<p>Tham quan, du lịch h&agrave;ng năm</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- T&igrave;m kiếm, khai th&aacute;c kh&aacute;ch h&agrave;ng tiềm năng.<br />\r\n- Khảo s&aacute;t thị trường, thực hiện b&aacute;o c&aacute;o, đế xuất phương &aacute;n&hellip;.<br />\r\n- Thẩm định, đ&aacute;nh gi&aacute; kh&aacute;ch h&agrave;ng v&agrave; tham mưu cho l&atilde;nh đạo<br />\r\n- Phối hợp, tham gia triển khai kế hoạch cho thu&ecirc; mặt bằng<br />\r\n- Trau dồi kỹ năng tư vấn, đ&agrave;m ph&aacute;n, quảng b&aacute; h&igrave;nh ảnh C&ocirc;ng ty một c&aacute;ch chuy&ecirc;n nghiệp.<br />\r\n- Phối hợp với c&aacute;c bộ phận để xử l&yacute; c&aacute;c vấn đề li&ecirc;n quan đến mặt bằng cho thu&ecirc;<br />\r\n- Li&ecirc;n tục t&igrave;m kiếm c&aacute;c phương thức cải tiến trong c&ocirc;ng việc v&agrave; tham gia v&agrave;o c&aacute;c dự &aacute;n cải tiến chung<br />\r\n- Tham gia sắp xếp lại layout khu tự doanh để đạt hiệu quả kinh doanh cao nhất.</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Tốt nghiệp Đại học ng&agrave;nh Kinh tế, Quản trị kinh doanh, Marketing, T&agrave;i ch&iacute;nh&hellip;&nbsp;<br />\r\n- Tuổi từ 24 - 35. Ngoại ngữ: viết, n&oacute;i tiếng Anh tốt. Vi t&iacute;nh: Văn ph&ograve;ng<br />\r\n- C&oacute; &iacute;t nhất 01 năm kinh nghiệm trong lĩnh vực li&ecirc;n quan tiếp thị b&aacute;n h&agrave;ng, bất động sản thương mại hoặc thị trường b&aacute;n lẻ<br />\r\n- Năng động, hướng ngoại, c&oacute; tinh thần cầu tiến, trung thực<br />\r\n- Giao tiếp kh&eacute;o l&eacute;o, c&oacute; khả năng thuyết phục, thương lượng, đ&agrave;m ph&aacute;n<br />\r\n- Tư duy t&iacute;ch cực<br />\r\n- C&oacute; thể đi c&ocirc;ng t&aacute;c theo y&ecirc;u cầu<br />\r\n<br />\r\nVui l&ograve;ng truy cập mục TUYỂN DỤNG tại www.co-opmart.com.vn để biết th&ecirc;m th&ocirc;ng tin</p>\r\n\r\n<p>Hồ sơ gửi qua đường bưu điện về: BỘ PHẬN TUYỂN DỤNG &ndash; LI&Ecirc;N HIỆP HTX TM TP.HCM<br />\r\n199 - 205 Nguyễn Th&aacute;i Học, P. Phạm Ngũ L&atilde;o, Q1, TP.HCM<br />\r\nHoặc gửi qua VietnamWorks<br />\r\n<br />\r\nB&igrave;a hồ sơ ghi r&otilde;: Chức danh dự tuyển, Số điện thoại li&ecirc;n lạc, Nơi l&agrave;m việc<br />\r\nThời gian nhận hồ sơ: hết ng&agrave;y 15/04/2018</p>', 8, 6, 'Tuyển dụng nhanh Nhân Viên Kinh Doanh Cho Thuê Mặt Bằng', 'Liên Hiệp HTX Thương Mại TPHCM ( Sài Gòn Co-op ) tuyển dụng Nhân Viên Kinh Doanh Cho Thuê Mặt Bằng – P. Không Gian Mua Sắm lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:24'),
(7, 'Marketing Manager (Urgent)', 'marketing-manager-urgent', 'ILA Vietnam tuyển dụng Marketing Manager (Urgent) lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Chương tr&igrave;nh chăm s&oacute;c sức khỏe cho Gia đ&igrave;nh</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p> Translate consumer insights into brand strategy and marketing plans<br />\r\n Build marketing brand plans to create and convert customer interest to purchase<br />\r\n Invest in brand, products and customer target with the best prospects for growth and profitability<br />\r\n Identify new ways to grow the brand/products by educating customers and by increasing usage<br />\r\n Make products, media and promotional investment decisions based on analysis of marketplace opportunities, competitions, brand performance and profitability<br />\r\n Find creative ways to generate new ideas that become commercially viable<br />\r\n Coordinating with departments to organize brand activities [events, competitions, seminars, trips&hellip;]<br />\r\n Coordinating with Communications Manager to run PR campaigns, schools activities, ILA Community Network&hellip;.<br />\r\n Follow up and monitor the project plans<br />\r\n Reporting<br />\r\n Visitor generation per center, per region<br />\r\n Visibility management<br />\r\n Tracking current student stories (best student, testimonial, ESOL performance, loyalty customer).<br />\r\n Centre event planning and execution<br />\r\n Control internal marketing budget per region<br />\r\n Cross department interaction<br />\r\n Coordinate with HO for global event management<br />\r\n Provide raw content per HO instruction<br />\r\n Oversee all POS programs<br />\r\n Tracking live 21st century project based presentation<br />\r\n Responsible for all IM per region (South/North)<br />\r\n Lead the IM executive of each center to work under the overall plan and also the bridge between marketing and CM.</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p> University degree in Economics, Marketing or Business Management.<br />\r\n Knowledge of basic brand management, advertising, media industry.<br />\r\n At least 2 years experience at the same position in foreign invested company<br />\r\n Experience in marketing for customers<br />\r\n Good interpersonal skills (communication, coordination, negotiation and conflict management&hellip;)<br />\r\n Active, open minded, optimistic and creative thinking.<br />\r\n Self-motivated and discipline<br />\r\n Good teamwork and ability to work under high pressure<br />\r\n Understand young people and education<br />\r\n Well organized</p>', 19, 7, 'Tuyển dụng nhanh Marketing Manager (Urgent)', 'ILA Vietnam tuyển dụng Marketing Manager (Urgent) lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:19'),
(8, 'Nhân Viên Kinh Doanh', 'nhan-vien-kinh-doanh', 'Công Ty Cổ Phần Khoa Học Môi Trường Và Công Nghệ CRM tuyển dụng Nhân Viên Kinh Doanh lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Được đ&oacute;ng v&agrave; hưởng c&aacute;c chế độ BHXH, BHYT, BHTN theo quy định</p>\r\n\r\n<p>Được nghỉ c&aacute;c ng&agrave;y Lễ, Tết theo quy định</p>\r\n\r\n<p>Hỗ trợ tiền cơm trưa</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- T&igrave;m kiếm kh&aacute;ch h&agrave;ng tiềm năng, chăm s&oacute;c kh&aacute;ch h&agrave;ng v&agrave; ph&aacute;t triển thị trường.<br />\r\n- Lập kế hoạch v&agrave; b&aacute;o c&aacute;o kết quả kinh doanh.<br />\r\n- Thực hiện c&aacute;c c&ocirc;ng việc theo sự hướng dẫn của cấp quản l&yacute; trực tiếp.</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Kh&ocirc;ng giới hạn giới t&iacute;nh, ngoại h&igrave;nh ưa nh&igrave;n.<br />\r\n- Tốt nghiệp Cao đẳng trở l&ecirc;n, biết tiếng Trung (nghe, n&oacute;i, đọc, viết) l&agrave; một ưu thế.<br />\r\n- Vui t&iacute;nh, h&ograve;a đồng, c&oacute; tinh thần đo&agrave;n kết hợp t&aacute;c, c&oacute; tr&aacute;ch nhiệm trong c&ocirc;ng việc.<br />\r\n- Ưu ti&ecirc;n c&aacute;c ứng vi&ecirc;n c&oacute; kinh nghiệm trong ng&agrave;nh ti&ecirc;u thụ h&oacute;a chất.<br />\r\n<br />\r\n* Quyền lợi đươc hưởng:<br />\r\n- Lương căn bản + phụ cấ p+ hoa hồng, thỏa thuận khi phỏng vấn.<br />\r\n- Nếu l&agrave;m tốt mức lương kh&ocirc;ng giới hạn tủy thuộc v&agrave;o năng lực kinh nghiệm<br />\r\n- Được l&agrave;m việc trong m&ocirc;i trường chuy&ecirc;n nghiệp, năng động, nhiều cơ hội ph&aacute;t triển nghề nghiệp.</p>', 16, 8, 'Tuyển dụng nhanh Nhân Viên Kinh Doanh', 'Công Ty Cổ Phần Khoa Học Môi Trường Và Công Nghệ CRM tuyển dụng Nhân Viên Kinh Doanh lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:15'),
(9, '[ Up to $1600] PHP Developer for Game', 'up-to-1600-php-developer-for-game', 'Chúng tôi đang có nhu cầu tuyển dụng nhiều vị trí PHP Developer cho nhu cầu mở rộng công ty. Vị trí này sẽ phát triển hệ thống và Engine để chạy các game và ứng dụng trên nền di động.', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Lương, thưởng hấp dẫn</p>\r\n\r\n<p>Chế độ BHXH, BHYT theo quy định</p>\r\n\r\n<p>M&ocirc;i trường l&agrave;m việc năng động, chuy&ecirc;n nghiệp</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>A-Team l&agrave; c&ocirc;ng ty vốn 100% của Nhật Bản, c&oacute; hai loại h&igrave;nh kinh doanh ch&iacute;nh: Ph&aacute;t triển game v&agrave; ứng dụng nền di động v&agrave; giải ph&aacute;p website.<br />\r\n<br />\r\nCh&uacute;ng t&ocirc;i đang c&oacute; nhu cầu tuyển dụng nhiều vị tr&iacute; PHP Developer cho nhu cầu mở rộng c&ocirc;ng ty. Vị tr&iacute; n&agrave;y sẽ ph&aacute;t triển hệ thống v&agrave; Engine để chạy c&aacute;c game v&agrave; ứng dụng tr&ecirc;n nền di động.</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>[BẮT BUỘC]<br />\r\n- Kiến thức, kinh nghiệm trong việc ph&aacute;t triển phần mềm tr&ecirc;n nền PHP (Java or C# or Ruby) &amp; HTML/CSS &amp; JavaScript.<br />\r\n- C&ocirc;ng ty muốn tuyển c&aacute;c bạn c&oacute; thể sử dụng c&agrave;ng nhiều ng&ocirc;n ngữ lập tr&igrave;nh c&agrave;ng tốt (b&ecirc;n cạnh PHP).<br />\r\n- C&oacute; kinh nghiệm lập tr&igrave;nh giao tiếp giữa mobile với server qua c&aacute;c giao thức TCP/IP, Websocket, WebService.&nbsp;<br />\r\n<br />\r\n[ƯU TI&Ecirc;N]<br />\r\n- C&oacute; kinh nghiệm ph&aacute;t triển phần mềm, game cho nền di động tr&ecirc;n c&aacute;c hệ điều h&agrave;nh Android, iOS hoặc đa nền tảng.<br />\r\n- Ph&aacute;t triển c&aacute;c game theo chủ đề: X&atilde; Hội, Người d&ugrave;ng v&agrave; H&agrave;nh động nhanh (Arcade)<br />\r\n<br />\r\n[T&iacute;nh c&aacute;ch]<br />\r\n- Đam m&ecirc; lập tr&igrave;nh v&agrave; ph&aacute;t triển game, đặc biệt nền tảng di động<br />\r\n- L&agrave; người đ&oacute;ng g&oacute;p cho team đạt mục ti&ecirc;u chung v&agrave; tạo ra chấn động tr&ecirc;n thế giới<br />\r\n- C&oacute; khả năng kiểm tra ứng dụng v&agrave; game dưới g&oacute;c độ của người d&ugrave;ng<br />\r\n- Năng động, s&aacute;ng tạo v&agrave; lu&ocirc;n học hỏi ph&aacute;t triển kh&ocirc;ng ngừng<br />\r\n<br />\r\nThời gian l&agrave;m việc: Monday &ndash; Friday, From 8:00 &ndash; 17:00. C&aacute;c ng&agrave;y nghỉ lễ kh&aacute;c theo quy định của ph&aacute;p luật. Ngo&agrave;i ra c&ograve;n c&oacute; chế độ nghỉ &quot;ng&agrave;y kỷ niệm ng&agrave;y cưới&quot; , nghỉ sinh nhật gia đ&igrave;nh.<br />\r\n<br />\r\n** Ph&uacute;c lợi:<br />\r\n&bull; Ateam l&agrave; một trong những c&ocirc;ng ty về Game lớn nhất Nhật Bản. Đến với Ateam bạn c&oacute; cơ hội trải nghiệm to&agrave;n bộ quy tr&igrave;nh v&agrave; c&ocirc;ng nghệ Game do Ateam ph&aacute;t triển độc lập. Ngo&agrave;i ra, bạn sẽ c&oacute; cơ hội được cử đi học tập tại Nhật v&agrave; ph&aacute;t triển kỹ năng của bản th&acirc;n.<br />\r\n&bull; Tại Việt Nam, Ateam l&agrave; một c&ocirc;ng ty mới th&agrave;nh lập. Do đ&oacute;, ch&uacute;ng t&ocirc;i cần bạn để c&ugrave;ng nhau tạo n&ecirc;n một văn h&oacute;a độc đ&aacute;o cho ri&ecirc;ng Ateam.<br />\r\n&bull; L&agrave; một trong những c&ocirc;ng ty đi đầu trong ng&agrave;nh c&ocirc;ng nghệ Mobile Game tại Nhật Bản, ch&uacute;ng t&ocirc;i tin rằng Ateam sẽ nhanh ch&oacute;ng ph&aacute;t triển lớn mạnh tại Việt Nam. Đ&acirc;y sẽ l&agrave; cơ hội để bạn đ&oacute;ng g&oacute;p cho ch&uacute;ng t&ocirc;i v&agrave; c&oacute; được mức lương đ&aacute;ng ngưỡng mộ.</p>', 30, 9, 'Tuyển dụng nhanh [ Up to $1600] PHP Developer for Game', 'Công Ty TNHH Ateam Việt Nam tuyển dụng [ Up to $1600] PHP Developer for Game lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:08'),
(10, '[ Up to $1600] iOS Mobile Game Developer', 'up-to-1600-ios-mobile-game-developer', 'Chúng tôi đang có nhu cầu tuyển dụng nhiều vị trí iOS Mobile Game Developer cho nhu cầu  phát triển ứng dụng và Game trên nền tảng di động (điện thoại và máy tính bảng).', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Lương, thưởng hấp dẫn</p>\r\n\r\n<p>Chế độ BHXH, BHYT theo quy định</p>\r\n\r\n<p>M&ocirc;i trường l&agrave;m việc năng động, chuy&ecirc;n nghiệp</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>A-Team l&agrave; c&ocirc;ng ty vốn 100% của Nhật Bản, c&oacute; hai loại h&igrave;nh kinh doanh ch&iacute;nh: Ph&aacute;t triển game v&agrave; ứng dụng nền di động v&agrave; giải ph&aacute;p website.<br />\r\n<br />\r\nCh&uacute;ng t&ocirc;i đang c&oacute; nhu cầu tuyển dụng nhiều vị tr&iacute; iOS Mobile Game Developer cho nhu cầu mở rộng c&ocirc;ng ty Vị tr&iacute; n&agrave;y sẽ đảm nhận việc ph&aacute;t triển ứng dụng v&agrave; Game tr&ecirc;n nền tảng di động (điện thoại v&agrave; m&aacute;y t&iacute;nh bảng).</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>[BẮT BUỘC]<br />\r\nC&oacute; kiến thức v&agrave; kinh nghiệm ở c&aacute;c ng&ocirc;n ngữ lập tr&igrave;nh C/C++, Java, V&agrave; C#<br />\r\n<br />\r\n[ƯU TI&Ecirc;N]<br />\r\n- C&oacute; kinh nghiệm ph&aacute;t triển phần mềm, game cho nền di động tr&ecirc;n c&aacute;c hệ điều h&agrave;nh Android, iOS hoặc đa nền tảng<br />\r\n- Ph&aacute;t triển c&aacute;c game theo chủ đề: X&atilde; Hội, Người d&ugrave;ng v&agrave; H&agrave;nh động nhanh (Arcade)<br />\r\n<br />\r\n[T&iacute;nh c&aacute;ch]<br />\r\n- Đam m&ecirc; lập tr&igrave;nh v&agrave; ph&aacute;t triển game, đặc biệt nền tảng di động<br />\r\n- L&agrave; người đ&oacute;ng g&oacute;p cho team đạt mục ti&ecirc;u chung v&agrave; tạo ra chấn động tr&ecirc;n thế giới<br />\r\n- C&oacute; khả năng kiểm tra ứng dụng v&agrave; game dưới g&oacute;c độ của người d&ugrave;ng<br />\r\n- Năng động, s&aacute;ng tạo v&agrave; lu&ocirc;n học hỏi ph&aacute;t triển kh&ocirc;ng ngừng<br />\r\n<br />\r\nThời gian l&agrave;m việc: Monday &ndash; Friday, From 8:00 &ndash; 17:00. C&aacute;c ng&agrave;y nghỉ lễ kh&aacute;c theo quy định của ph&aacute;p luật. Ngo&agrave;i ra c&ograve;n c&oacute; chế độ nghỉ &quot;ng&agrave;y kỷ niệm ng&agrave;y cưới&quot; , nghỉ sinh nhật gia đ&igrave;nh<br />\r\n<br />\r\n** Ph&uacute;c lợi:<br />\r\n&bull; Ateam l&agrave; một trong những c&ocirc;ng ty về Game lớn nhất Nhật Bản. Đến với Ateam bạn c&oacute; cơ hội trải nghiệm to&agrave;n bộ quy tr&igrave;nh v&agrave; c&ocirc;ng nghệ Game do Ateam ph&aacute;t triển độc lập. Ngo&agrave;i ra, bạn sẽ c&oacute; cơ hội được cử đi học tập tại Nhật v&agrave; ph&aacute;t triển kỹ năng của bản th&acirc;n.<br />\r\n&bull; Tại Việt Nam, Ateam l&agrave; một c&ocirc;ng ty mới th&agrave;nh lập. Do đ&oacute;, ch&uacute;ng t&ocirc;i cần bạn để c&ugrave;ng nhau tạo n&ecirc;n một văn h&oacute;a độc đ&aacute;o cho ri&ecirc;ng Ateam.<br />\r\n&bull; L&agrave; một trong những c&ocirc;ng ty đi đầu trong ng&agrave;nh c&ocirc;ng nghệ Mobile Game tại Nhật Bản, ch&uacute;ng t&ocirc;i tin rằng Ateam sẽ nhanh ch&oacute;ng ph&aacute;t triển lớn mạnh tại Việt Nam. Đ&acirc;y sẽ l&agrave; cơ hội để bạn đ&oacute;ng g&oacute;p cho ch&uacute;ng t&ocirc;i v&agrave; c&oacute; được mức lương đ&aacute;ng ngưỡng mộ.</p>', 30, 9, 'Tuyển dụng nhanh [ Up to $1600] iOS Mobile Game Developer', 'Công Ty TNHH Ateam Việt Nam tuyển dụng lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:55:01'),
(11, 'Up to $1600] Android Mobile Game Developer', 'up-to-1600-android-mobile-game-developer', 'Chúng tôi đang có nhu cầu tuyển dụng nhiều vị trí Android Mobile Game Developer cho nhu cầu phát triển ứng dụng và Game trên nền tảng di động (điện thoại và máy tính bảng).', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Lương, thưởng hấp dẫn</p>\r\n\r\n<p>Chế độ BHXH, BHYT theo quy định</p>\r\n\r\n<p>M&ocirc;i trường l&agrave;m việc năng động, chuy&ecirc;n nghiệp</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>A-Team l&agrave; c&ocirc;ng ty vốn 100% của Nhật Bản, c&oacute; hai loại h&igrave;nh kinh doanh ch&iacute;nh: Ph&aacute;t triển game v&agrave; ứng dụng nền di động v&agrave; giải ph&aacute;p website.<br />\r\n<br />\r\nCh&uacute;ng t&ocirc;i đang c&oacute; nhu cầu tuyển dụng nhiều vị tr&iacute; Android Mobile Game Developer cho nhu cầu mở rộng c&ocirc;ng ty. Vị tr&iacute; n&agrave;y sẽ đảm nhận việc ph&aacute;t triển ứng dụng v&agrave; Game tr&ecirc;n nền tảng di động (điện thoại v&agrave; m&aacute;y t&iacute;nh bảng).</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>[BẮT BUỘC]<br />\r\nC&oacute; kiến thức v&agrave; kinh nghiệm ở c&aacute;c ng&ocirc;n ngữ lập tr&igrave;nh C/C++, Java, V&agrave; C#<br />\r\n<br />\r\n[ƯU TI&Ecirc;N]<br />\r\n- C&oacute; kinh nghiệm ph&aacute;t triển phần mềm, game cho nền di động tr&ecirc;n c&aacute;c hệ điều h&agrave;nh Android, iOS hoặc đa nền tảng<br />\r\n- Ph&aacute;t triển c&aacute;c game theo chủ đề: X&atilde; Hội, Người d&ugrave;ng v&agrave; H&agrave;nh động nhanh (Arcade)<br />\r\n<br />\r\n[T&iacute;nh c&aacute;ch]<br />\r\n- Đam m&ecirc; lập tr&igrave;nh v&agrave; ph&aacute;t triển game, đặc biệt nền tảng di động<br />\r\n- L&agrave; người đ&oacute;ng g&oacute;p cho team đạt mục ti&ecirc;u chung v&agrave; tạo ra chấn động tr&ecirc;n thế giới<br />\r\n- C&oacute; khả năng kiểm tra ứng dụng v&agrave; game dưới g&oacute;c độ của người d&ugrave;ng<br />\r\n- Năng động, s&aacute;ng tạo v&agrave; lu&ocirc;n học hỏi ph&aacute;t triển kh&ocirc;ng ngừng<br />\r\n<br />\r\nWorking Time: Monday &ndash; Friday, From 8:00 &ndash; 17:00. C&aacute;c ng&agrave;y nghỉ lễ kh&aacute;c theo quy định của ph&aacute;p luật. Ngo&agrave;i ra c&ograve;n c&oacute; chế độ nghỉ &quot;ng&agrave;y kỷ niệm ng&agrave;y cưới&quot; , nghỉ sinh nhật gia đ&igrave;nh<br />\r\n<br />\r\n** Ph&uacute;c lợi:<br />\r\n&bull; Ateam l&agrave; một trong những c&ocirc;ng ty về Game lớn nhất Nhật Bản. Đến với Ateam bạn c&oacute; cơ hội trải nghiệm to&agrave;n bộ quy tr&igrave;nh v&agrave; c&ocirc;ng nghệ Game do Ateam ph&aacute;t triển độc lập. Ngo&agrave;i ra, bạn sẽ c&oacute; cơ hội được cử đi học tập tại Nhật v&agrave; ph&aacute;t triển kỹ năng của bản th&acirc;n.<br />\r\n&bull; Tại Việt Nam, Ateam l&agrave; một c&ocirc;ng ty mới th&agrave;nh lập. Do đ&oacute;, ch&uacute;ng t&ocirc;i cần bạn để c&ugrave;ng nhau tạo n&ecirc;n một văn h&oacute;a độc đ&aacute;o cho ri&ecirc;ng Ateam.<br />\r\n&bull; L&agrave; một trong những c&ocirc;ng ty đi đầu trong ng&agrave;nh c&ocirc;ng nghệ Mobile Game tại Nhật Bản, ch&uacute;ng t&ocirc;i tin rằng Ateam sẽ nhanh ch&oacute;ng ph&aacute;t triển lớn mạnh tại Việt Nam. Đ&acirc;y sẽ l&agrave; cơ hội để bạn đ&oacute;ng g&oacute;p cho ch&uacute;ng t&ocirc;i v&agrave; c&oacute; được mức lương đ&aacute;ng ngưỡng mộ.</p>', 30, 9, 'Tuyển dụng nhanh [ Up to $1600] Android Mobile Game Developer', 'Công Ty TNHH Ateam Việt Nam tuyển dụng lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:54:55'),
(12, '[ Up to $1600] Engineer IT Communicator', 'up-to-1600-engineer-it-communicator', 'Chúng tôi đang có nhu cầu tuyển dụng nhiều vị trí Engineer IT Communicator cho nhu cầu mở rộng công ty', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Lương, thưởng hấp dẫn</p>\r\n\r\n<p>Chế độ BHXH, BHYT theo quy định</p>\r\n\r\n<p>M&ocirc;i trường l&agrave;m việc năng động, chuy&ecirc;n nghiệp</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>A-Team l&agrave; c&ocirc;ng ty vốn 100% của Nhật Bản, c&oacute; hai loại h&igrave;nh kinh doanh ch&iacute;nh: Ph&aacute;t triển game v&agrave; ứng dụng nền di động v&agrave; giải ph&aacute;p website.<br />\r\n<br />\r\nCh&uacute;ng t&ocirc;i đang c&oacute; nhu cầu tuyển dụng nhiều vị tr&iacute; Engineer IT Communicator cho nhu cầu mở rộng c&ocirc;ng ty:<br />\r\n<br />\r\n- Vị tr&iacute; n&agrave;y hỗ trợ th&ocirc;ng dịch giữa kỹ sư Việt Nam v&agrave; Nhật Bản.<br />\r\n- Th&ocirc;ng dịch c&aacute;c cuộc họp giữa Việt v&agrave; Nhật v&agrave; dịch t&agrave;i liệu.<br />\r\n- Hỗ trợ th&ocirc;ng dịch giữa quản l&yacute; người Nhật ở Việt Nam v&agrave; kỹ sư người Việt.<br />\r\n- Những người c&oacute; th&agrave;nh t&iacute;ch xuất sắc ưu t&uacute; sẽ c&oacute; cơ hội được học tập tại Nhật.</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>- Tiếng Nhật tr&igrave;nh độ N2 trở l&ecirc;n.<br />\r\n- C&oacute; kiến thức, kỹ năng v&agrave; kinh nghiệm về lập tr&igrave;nh iOS, Android, PHP&hellip;<br />\r\n- Những người c&oacute; kinh nghi&ecirc;m lập tr&igrave;nh l&agrave; một lợi thế<br />\r\n- Y&ecirc;u th&iacute;ch lĩnh vực Game, th&iacute;ch ph&aacute;t triển Game<br />\r\n- C&oacute; thể l&agrave;m việc l&acirc;u d&agrave;i.<br />\r\n<br />\r\nWorking Time: Monday &ndash; Friday, From 8:00 &ndash; 17:00. C&aacute;c ng&agrave;y nghỉ lễ kh&aacute;c theo quy định của ph&aacute;p luật. Ngo&agrave;i ra c&ograve;n c&oacute; chế độ nghỉ &quot;ng&agrave;y kỷ niệm ng&agrave;y cưới&quot; , nghỉ sinh nhật gia đ&igrave;nh<br />\r\n<br />\r\n** Ph&uacute;c lợi:<br />\r\n&bull; Ateam l&agrave; một trong những c&ocirc;ng ty về Game lớn nhất Nhật Bản. Đến với Ateam bạn c&oacute; cơ hội trải nghiệm to&agrave;n bộ quy tr&igrave;nh v&agrave; c&ocirc;ng nghệ Game do Ateam ph&aacute;t triển độc lập. Ngo&agrave;i ra, người c&oacute; th&agrave;nh t&iacute;ch xuất sắc ưu t&uacute; sẽ c&oacute; cơ hội được cử đi học tập tại Nhật v&agrave; ph&aacute;t triển kỹ năng của bản th&acirc;n.<br />\r\n&bull; Tại Việt Nam, Ateam l&agrave; một c&ocirc;ng ty mới th&agrave;nh lập. Do đ&oacute;, ch&uacute;ng t&ocirc;i cần bạn để c&ugrave;ng nhau tạo n&ecirc;n một văn h&oacute;a độc đ&aacute;o cho ri&ecirc;ng Ateam.<br />\r\n&bull; L&agrave; một trong những c&ocirc;ng ty đi đầu trong ng&agrave;nh c&ocirc;ng nghệ Mobile Game tại Nhật Bản, ch&uacute;ng t&ocirc;i tin rằng Ateam sẽ nhanh ch&oacute;ng ph&aacute;t triển lớn mạnh tại Việt Nam. Đ&acirc;y sẽ l&agrave; cơ hội để bạn đ&oacute;ng g&oacute;p cho ch&uacute;ng t&ocirc;i v&agrave; c&oacute; được mức lương đ&aacute;ng ngưỡng mộ.<br />\r\n<br />\r\n(JapanWorks)<br />\r\nn03level, n02level, 170323, 170324, 170325</p>', 30, 9, 'Tuyển dụng nhanh [ Up to $1600] Engineer IT Communicator', 'Công Ty TNHH Ateam Việt Nam tuyển dụng lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:54:48'),
(13, 'Office Manager (Tiếng Nhật N2)', 'office-manager-tieng-nhat-n2', 'Phụ trách công việc thuộc hành chánh, nhân sự, pháp lý và hỗ trợ kế toán.', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Lương thưởng ổn định v&agrave; tương xứng với năng lực của bạn</p>\r\n\r\n<p>Bạn sẽ c&oacute; cơ hội được cử đi học tập tại Nhật v&agrave; ph&aacute;t triển kỹ năng của bản th&acirc;n.</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>バックオフィスの責任者 Quản l&yacute; H&agrave;nh Ch&aacute;nh- Nh&acirc;n Sự<br />\r\n・総務・人事・経理・法務などの管理系業務全般 Phụ tr&aacute;ch c&ocirc;ng việc thuộc h&agrave;nh ch&aacute;nh, nh&acirc;n sự, ph&aacute;p l&yacute; v&agrave; hỗ trợ kế to&aacute;n<br />\r\n・日本本社スタッフとの業務連携 Trao đổi, li&ecirc;n lạc với nh&acirc;n vi&ecirc;n phụ tr&aacute;ch c&ocirc;ng ty Mẹ</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>必須要件&nbsp;<br />\r\n・日本語スキル：N1レベル Tr&igrave;nh độ tiếng Nhật: N1<br />\r\n・オフィスマネージャー：経験2年以上 Kinh nghiệm c&ugrave;ng vị tr&iacute;: tr&ecirc;n 2 năm<br />\r\n<br />\r\n歓迎要件 【歓迎要件】<br />\r\n・スタートアップ企業でのバックオフィスの立ち上げ経験<br />\r\nC&oacute; kinh nghiệm set up văn ph&ograve;ng mới<br />\r\n・IT企業でのオフィスマネージャー経験<br />\r\nC&oacute; kinh nghiệm l&agrave;m việc trong cty IT<br />\r\n【求める人物像】&nbsp;<br />\r\n・自ら考え行動ができる、主体的にチャレンジできる方<br />\r\nC&oacute; khả năng l&agrave;m việc độc lập v&agrave; chủ động trong c&ocirc;ng việc<br />\r\n・成長意欲がある方<br />\r\nMong muốn học hỏi để ph&aacute;t triển bản th&acirc;n<br />\r\n・社内・社外に対しての関係性構築が得意な方<br />\r\nC&oacute; quan hệ tốt với nh&acirc;n vi&ecirc;n v&agrave; đối t&aacute;c ngo&agrave;i c&ocirc;ng ty<br />\r\n・協調性があり、チームワークを大切にする方<br />\r\nC&oacute; khả năng l&agrave;m việc nh&oacute;m tốt<br />\r\n<br />\r\n勤務時間Giờ l&agrave;m: from 8：00 to 17：00<br />\r\n休日休暇Ng&agrave;y l&agrave;m việc: 土日祝日、特別休暇（ファミリー誕生日休暇、結婚記念日休暇、など）Từ Thứ hai ~ Thứ s&aacute;u (thứ bảy &amp; CN nghỉ)<br />\r\n出張の有無 C&ocirc;ng t&aacute;c: なし Kh&ocirc;ng<br />\r\n<br />\r\n**Ứng vi&ecirc;n quan t&acirc;m vui l&ograve;ng gửi CV bằng tiếng Nhật qua n&uacute;t &quot;Nộp đơn&quot; tr&ecirc;n Vietnamworks.<br />\r\n<br />\r\n(Japanworks)</p>', 25, 9, 'Tuyển dụng nhanh Office Manager (Tiếng Nhật N2)', 'Công Ty TNHH Ateam Việt Nam tuyển dụng Office Manager (Tiếng Nhật N2) lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:54:41'),
(14, 'Mobile Game Developer', 'mobile-game-developer', 'Vị trí này sẽ đảm nhận việc phát triển ứng dụng và Game trên nền tảng di động (điện thoại và máy tính bảng)', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\r\n\r\n<p>Chế độ lương, thưởng, ph&uacute;c lợi hấp dẫn</p>\r\n\r\n<p>Cơ hội học hỏi to&agrave;n bộ quy tr&igrave;nh l&agrave;m game v&agrave; trải nghiệm c&ocirc;ng nghệ l&agrave;m game mới</p>\r\n\r\n<p>Training v&agrave; đ&agrave;o tạo b&agrave;i bản để ph&aacute;t triển bản th&acirc;n</p>\r\n\r\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>A-Team l&agrave; c&ocirc;ng ty vốn 100% của Nhật Bản, c&oacute; hai loại h&igrave;nh kinh doanh ch&iacute;nh: Ph&aacute;t triển game v&agrave; ứng dụng nền di động v&agrave; giải ph&aacute;p website.<br />\r\nVị tr&iacute; n&agrave;y sẽ đảm nhận việc ph&aacute;t triển ứng dụng v&agrave; Game tr&ecirc;n nền tảng di động (điện thoại v&agrave; m&aacute;y t&iacute;nh bảng)<br />\r\n<br />\r\nGiờ l&agrave;m việc:<br />\r\nMonday - Friday,<br />\r\nFrom: 8:00 - 17:00<br />\r\n<br />\r\n**SỰ KIỆN LĨNH VỰC GAME MOBILE: Đ&Oacute;N ĐẦU XU HƯỚNG C&Ocirc;NG NGHỆ MỚI Do Ateam v&agrave; Vietnamworks tổ chức ==&gt;Đăng k&iacute; tham dự tại link sau: https://goo.gl/ktYqWs</p>\r\n\r\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\r\n\r\n<p>BẮT BUỘC<br />\r\nC&oacute; kiến thức v&agrave; kinh nghiệm ở c&aacute;c ng&ocirc;n ngữ lập tr&igrave;nh C/C++, Java, v&agrave; C#.<br />\r\n<br />\r\nƯU TI&Ecirc;N<br />\r\n- C&oacute; kinh nghiệm ph&aacute;t triển phần mềm, game cho nền di động tr&ecirc;n c&aacute;c hệ điều h&agrave;nh Android, iOS hoặc đa nền tảng.<br />\r\n- Ph&aacute;t triển c&aacute;c game theo chủ đề: X&atilde; hội, Người d&ugrave;ng v&agrave; H&agrave;nh động nhanh (Arcade).<br />\r\n<br />\r\nT&Iacute;NH C&Aacute;CH<br />\r\n- Đam m&ecirc; lập tr&igrave;nh v&agrave; ph&aacute;t triển game, đặt biệt nền tảng di động.<br />\r\n- L&agrave; người đ&oacute;ng g&oacute;p cho team đạt mục ti&ecirc;u chung v&agrave; tạo ra chấn động tr&ecirc;n to&agrave;n thế giới.<br />\r\n- C&oacute; khả năng kiểm tra ứng dụng v&agrave; game dưới g&oacute;c độ của người d&ugrave;ng.<br />\r\n- Năng động, s&aacute;ng tạo v&agrave; lu&ocirc;n học hỏi ph&aacute;t triển kh&ocirc;ng ngừng.<br />\r\n<br />\r\n**Ph&uacute;c lợi<br />\r\n- C&ocirc;ng ty ph&aacute;t triển nhanh tại Nhật Bản trong ng&agrave;nh nghề hot.<br />\r\n- Cơ hội học hỏi to&agrave;n bộ quy tr&igrave;nh l&agrave;m game v&agrave; trải nghiệm c&ocirc;ng nghệ l&agrave;m game mới do c&ocirc;ng ty thường tự ph&aacute;t triển độc lập.<br />\r\n- Chế độ lương, thưởng, ph&uacute;c lợi hấp dẫn.<br />\r\n- Training v&agrave; đ&agrave;o tạo b&agrave;i bản để ph&aacute;t triển bản th&acirc;n</p>', 30, 9, 'Tuyển dụng nhanh Mobile Game Developer', 'Công Ty TNHH Ateam Việt Nam tuyển dụng Mobile Game Developer lương hấp dẫn, môi trường chuyên nghiệp, phúc lợi tốt.', 1, '2018-03-23 15:50:22', '2018-03-23 08:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '1: hien thi, 0: khong hien thi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bán hàng kĩ thuật', 1, '2018-03-11 16:48:48', '2018-03-15 18:11:15'),
(2, 'Bán hàng', 1, '2018-03-11 09:50:19', '2018-03-15 18:10:53'),
(3, 'Bác sĩ', 1, '2018-03-11 09:51:03', '2018-03-15 18:10:45'),
(4, 'An toàn lao động', 1, '2018-03-11 09:52:16', '2018-03-15 18:10:29'),
(5, 'Bán lẻ/Bán sỉ', 1, '2018-03-15 18:15:49', '2018-03-15 18:15:49'),
(6, 'Bảo hiểm', 1, '2018-03-15 18:16:03', '2018-03-15 18:16:03'),
(7, 'Bảo trì/sửa chữa', 1, '2018-03-15 18:16:16', '2018-03-15 18:16:16'),
(8, 'Bất động sản', 1, '2018-03-15 18:16:31', '2018-03-15 18:16:31'),
(9, 'Biên phiên dịch', 1, '2018-03-15 18:16:43', '2018-03-15 18:16:43'),
(10, 'Cấp quản lí điều hành', 1, '2018-03-15 18:16:57', '2018-03-15 18:16:57'),
(11, 'Chứng khoán', 1, '2018-03-15 18:17:07', '2018-03-15 18:17:07'),
(12, 'Cơ khí', 1, '2018-03-15 18:17:18', '2018-03-15 18:17:18'),
(13, 'Công nghệ cao', 1, '2018-03-15 18:17:27', '2018-03-15 18:17:27'),
(14, 'Dầu khí', 1, '2018-03-15 18:17:37', '2018-03-15 18:17:37'),
(15, 'Dệt may/Da giày', 1, '2018-03-15 18:17:53', '2018-03-15 18:17:53'),
(16, 'Dịch vụ khách hàng', 1, '2018-03-15 18:18:06', '2018-03-15 18:18:06'),
(17, 'Dược phẩm/Công nghệ sinh học', 1, '2018-03-15 18:18:22', '2018-03-15 18:18:22'),
(18, 'Dược sĩ', 1, '2018-03-15 18:18:31', '2018-03-15 18:18:31'),
(19, 'Giáo dục đào tạo', 1, '2018-03-15 18:18:40', '2018-03-15 18:18:40'),
(20, 'Hàng cao cấp', 1, '2018-03-15 18:18:53', '2018-03-15 18:18:53'),
(21, 'Hàng gia dụng', 1, '2018-03-15 18:19:00', '2018-03-15 18:19:00'),
(22, 'Hàng hải', 1, '2018-03-15 18:19:09', '2018-03-15 18:19:09'),
(23, 'Hàng không/Du lịch', 1, '2018-03-15 18:19:20', '2018-03-15 18:19:20'),
(24, 'Hàng tiêu dùng', 1, '2018-03-15 18:19:31', '2018-03-15 18:19:31'),
(25, 'Hành chánh/Thư ký', 1, '2018-03-15 18:19:45', '2018-03-15 18:19:56'),
(26, 'Hóa học/Hóa sinh', 1, '2018-03-15 18:20:09', '2018-03-15 18:20:09'),
(27, 'Hoạch định/Dự án', 1, '2018-03-15 18:20:23', '2018-03-15 18:20:23'),
(28, 'In ấn/Xuất bản', 1, '2018-03-15 18:20:35', '2018-03-15 18:20:35'),
(29, 'Internet/Online media', 1, '2018-03-15 18:20:52', '2018-03-15 18:20:52'),
(30, 'IT - Phần mềm', 1, '2018-03-15 18:21:07', '2018-03-15 18:21:07'),
(31, 'IT - Phần cứng/Mạng', 1, '2018-03-15 18:21:20', '2018-03-15 18:21:31'),
(32, 'Kế toán', 1, '2018-03-15 18:21:44', '2018-03-15 18:21:44'),
(33, 'Khác', 1, '2018-03-15 18:21:48', '2018-03-15 18:21:48'),
(34, 'Kho vận', 1, '2018-03-15 18:21:53', '2018-03-15 18:21:53'),
(35, 'Kiểm toán', 1, '2018-03-15 18:22:03', '2018-03-15 18:22:03'),
(36, 'Kiến trúc/Thiết kế nội thất', 1, '2018-03-15 18:22:11', '2018-03-15 18:22:25'),
(37, 'Marketing', 1, '2018-03-15 18:22:37', '2018-03-15 18:22:37'),
(38, 'Mới tốt nghiệp', 1, '2018-03-15 18:22:52', '2018-03-15 18:22:52'),
(39, 'Môi trường/Xử lý chất thải', 1, '2018-03-15 18:23:03', '2018-03-15 18:23:03'),
(40, 'Mỹ thuật/Nghệ thuật/Thiết kế', 1, '2018-03-15 18:23:24', '2018-03-15 18:23:24'),
(41, 'Ngân hàng', 1, '2018-03-15 18:23:34', '2018-03-15 18:23:34'),
(42, 'Người nước ngoài/Việt Kiều', 1, '2018-03-15 18:23:51', '2018-03-15 18:23:51'),
(43, 'Nhà hàng/Khách sạn', 1, '2018-03-15 18:24:02', '2018-03-15 18:24:02'),
(44, 'Nhân sự', 1, '2018-03-15 18:24:07', '2018-03-15 18:24:07'),
(45, 'Nông nghiệp/Lâm nghiệp', 1, '2018-03-15 18:24:19', '2018-03-15 18:24:19'),
(46, 'Overseas Jobs', 1, '2018-03-15 18:24:35', '2018-03-15 18:24:50'),
(47, 'Pháp lý', 1, '2018-03-15 18:25:03', '2018-03-15 18:25:03'),
(48, 'Phi chính phủ/Phi lợi nhuận', 1, '2018-03-15 18:25:12', '2018-03-15 18:25:12'),
(49, 'QA/QC', 1, '2018-03-15 18:25:23', '2018-03-15 18:25:23'),
(50, 'Quảng cáo/Khuyến mãi/Đối ngoại', 1, '2018-03-15 18:25:39', '2018-03-15 18:25:39'),
(51, 'Sản phẩm công nghiệp', 1, '2018-03-15 18:25:51', '2018-03-15 18:25:51'),
(52, 'Sản xuất', 1, '2018-03-15 18:26:04', '2018-03-15 18:26:04'),
(53, 'Tài chính/Đầu tư', 1, '2018-03-15 18:26:12', '2018-03-15 18:26:12'),
(54, 'Thời trang', 1, '2018-03-15 18:26:21', '2018-03-15 18:26:21'),
(55, 'Thời vụ/Hợp đồng ngắn hạn', 1, '2018-03-15 18:26:34', '2018-03-15 18:26:34'),
(56, 'Thu mua/Vật tư/Cung vận', 1, '2018-03-15 18:26:51', '2018-03-15 18:26:51'),
(57, 'Thực phẩm&Đồ uống', 1, '2018-03-15 18:27:13', '2018-03-15 18:27:13'),
(58, 'Trình dược viên', 1, '2018-03-15 18:27:24', '2018-03-15 18:27:24'),
(59, 'Truyền hình/Truyền thông/Báo chí', 1, '2018-03-15 18:27:49', '2018-03-15 18:27:49'),
(60, 'Tư vấn', 1, '2018-03-15 18:28:01', '2018-03-15 18:28:01'),
(61, 'Tự động hóa/Ô tô', 1, '2018-03-15 18:28:11', '2018-03-15 18:28:11'),
(62, 'Vận chuyển/Giao nhận', 1, '2018-03-15 18:28:24', '2018-03-15 18:28:24'),
(63, 'Viễn thông', 1, '2018-03-15 18:28:33', '2018-03-15 18:28:33'),
(64, 'Xây dựng', 1, '2018-03-15 18:28:41', '2018-03-15 18:28:41'),
(65, 'Xuất nhập khẩu', 1, '2018-03-15 18:28:48', '2018-03-15 18:28:48'),
(66, 'Y sĩ/Hộ lý', 1, '2018-03-15 18:28:59', '2018-03-15 18:29:08'),
(67, 'Y tế/Chăm sóc sức khỏe', 1, '2018-03-15 18:29:24', '2018-03-15 18:29:24'),
(68, 'Địa chất/Khoáng sản', 1, '2018-03-15 18:29:37', '2018-03-15 18:29:37'),
(69, 'Điện lạnh/Nhiệt lạnh', 1, '2018-03-15 18:29:58', '2018-03-15 18:29:58'),
(70, 'Điện/Điện tử', 1, '2018-03-15 18:30:13', '2018-03-15 18:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_06_041908_create_categories_table', 1),
(4, '2017_09_06_071940_create_products_table', 1),
(5, '2017_09_06_085027_create_orders_table', 1),
(6, '2017_09_06_090838_create_order_details_table', 1),
(7, '2017_10_09_035115_create_expenses_table', 1),
(8, '2017_10_12_084201_create_imports_table', 1),
(9, '2017_10_12_084549_create_order__imports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL COMMENT '1: tin tuc, 2: tin nensai',
  `is_hot` smallint(6) NOT NULL COMMENT '0: binh thuong, 1: hot',
  `status` smallint(6) NOT NULL COMMENT '1: hien thi, 0: khong hien thi',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `slug`, `description`, `summary`, `avatar`, `meta_keyword`, `meta_description`, `type`, `is_hot`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kỹ sư Việt Nam', 'ky-su-viet-nam', 'ngày hôm qua', '<p><img alt=\"\" src=\"/content/userfiles/images/tu-ho-so-cat08g_s881.png\" style=\"height:549px; width:550px\" /></p>\r\n\r\n<p>qweqwewq</p>', NULL, '213213', '213213213', 1, 0, 1, '2018-03-18 06:26:01', '2018-03-17 23:47:08'),
(2, 'Hàng ngàn người lao động ghé thăm gian hàng Nhật B', 'hang-ngan-nguoi-lao-dong-ghe-tham-gian-hang-nhat-b', 'Tại chương trình “Tiếp sức người lao động và Ngày hội tuyển dụng việc làm 2018” do Trung tâm Dịch vụ việc làm Thanh Niên TP. Hồ Chí Minh tổ chức vào cuối tuần qua,', '<p>Tất cả những người tham dự chương tr&igrave;nh khi đến với gian h&agrave;ng của Esuhai đều được ăn, được uống, được chụp h&igrave;nh, được c&oacute; qu&agrave; đem về v&agrave; tất cả đều l&agrave; miễn ph&iacute;. Tất cả c&aacute;c m&oacute;n ăn như cơm cuộn, b&aacute;nh bạch tuộc takoyaki hay tr&agrave; matcha đều được chế biến tại chỗ bởi c&aacute;c nh&acirc;n vi&ecirc;n v&agrave; học vi&ecirc;n của Esuhai. Tương tự như vậy, với những ai muốn c&oacute; chữ thư ph&aacute;p cầm về treo trong nh&agrave; hoặc l&agrave;m qu&agrave; tặng cũng sẽ được gi&aacute;o vi&ecirc;n của Esuhai viết tặng tại chỗ. B&ecirc;n cạnh đ&oacute;, Esuhai c&ograve;n tổ chức minigame với c&aacute;c phần qu&agrave; si&ecirc;u dễ thương v&agrave; thiết thực d&agrave;nh tặng những người tham gia như gấu b&ocirc;ng, gối &ocirc;m, kẹo Nhật, quạt cầm tay&hellip; V&agrave; một khu vực kh&ocirc;ng thể thiếu ch&iacute;nh l&agrave; kh&ocirc;ng gian &ldquo;seo phi&rdquo; với đ&ocirc;i trai t&agrave;i g&aacute;i sắc Nhật Bản d&agrave;nh cho c&aacute;c bạn trẻ.</p>', NULL, 'xcxc2222', 'xcxcxc', 1, 0, 1, '2018-03-18 06:26:01', '2018-03-21 08:36:39'),
(3, 'Ngày hội việc làm trường CĐ Nghề số 5', 'ngay-hoi-viec-lam-truong-cd-nghe-so-5', 'Hơn 100 sinh viên năm cuối trường CĐ Nghề số 5 đã tiếp cận và tham gia tư vấn chương trình việc làm Nhật Bản của Esuhai trong ngày hội việc làm do nhà trường tổ chức đầu tháng 3 vừa qua.', '<p>Kh&ocirc;ng kh&iacute; ng&agrave;y hội trở n&ecirc;n n&oacute;ng hơn bao giờ hết khi đ&acirc;y l&agrave; thời điểm c&aacute;c sinh vi&ecirc;n sắp tốt nghiệp. Việc l&agrave;m l&agrave; mối quan t&acirc;m h&agrave;ng đầu của c&aacute;c bạn v&agrave; tại trường CĐ Nghề số 5, việc l&agrave;m Nhật Bản hiện nhận được sự quan t&acirc;m ng&agrave;y c&agrave;ng nhiều từ c&aacute;c bạn sinh vi&ecirc;n. Ngay tại ng&agrave;y hội, đ&atilde; c&oacute; hơn 50 bạn tham gia sơ tuyển chương tr&igrave;nh việc l&agrave;m Nhật Bản của Esuhai. Trong những ng&agrave;y tới, Esuhai tiếp tục ho&agrave;n th&agrave;nh c&aacute;c bước sơ tuyển cho những hồ sơ đạt y&ecirc;u cầu v&agrave; tổ chức khai giảng cho c&aacute;c bạn v&agrave;o ng&agrave;y 30/3 tới.</p>\r\n\r\n<p>H&agrave;ng năm, trường CĐ Nghề số 5 đều đặn tổ chức ng&agrave;y hội việc l&agrave;m nhằm kết nối giữa nh&agrave; trường &ndash; nh&agrave; tuyển dụng - sinh vi&ecirc;n. Trong nhiều năm qua, nhận được sự t&iacute;n nhiệm của nh&agrave; trường, Esuhai lu&ocirc;n c&oacute; mặt tại ng&agrave;y hội để tư vấn định hướng nghề nghiệp cho c&aacute;c bạn sinh vi&ecirc;n v&agrave; tuyển dụng đi l&agrave;m việc tại Nhật Bản với những ứng vi&ecirc;n c&oacute; nhu cầu v&agrave; đạt y&ecirc;u cầu.</p>', NULL, '123', '213', 1, 0, 1, '2018-03-18 06:26:01', '2018-03-21 08:34:49'),
(4, 'Ngôi nhà chung cho chúng ta', 'ngoi-nha-chung-cho-chung-ta', 'Ngôi nhà chung cho chúng ta', '<p>How can I create URLs with slugs (i.e. like on stackoverflow)? I have a table of campaigns with ID and product name. How can I use this product name? So, instead of</p>', NULL, 'acv', 'ad', 1, 0, 1, '2018-03-17 23:59:34', '2018-03-18 00:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `summary`, `slug`, `avatar`, `price`, `category_id`, `info`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm 1', 'Sản phẩm 1', '<p>Sản phẩm 1</p>', '', '1507911960.jpg', 15000, 1, '', 1, '2017-10-13 09:26:00', '2017-10-13 09:26:00'),
(2, 'Sản phẩm 2', 'Sản phẩm 2', '<p>Sản phẩm 2</p>', '', '1507912009.jpg', 20000, 2, '', 1, '2017-10-13 09:26:49', '2017-10-13 09:26:49'),
(3, 'Sản phẩm 3', 'Sản phẩm 3', '<p>Sản phẩm 3</p>', '', '1507912053.jpg', 30000, 3, '', 1, '2017-10-13 09:27:33', '2017-10-13 09:27:33'),
(4, 'Sản phẩm 4', 'Sản phẩm 4', '<p>Sản phẩm 4</p>', '', '1507912082.jpg', 45000, 4, '', 1, '2017-10-13 09:28:02', '2017-10-13 09:28:02'),
(5, 'Sản phẩm 5', 'Sản phẩm 5', '<p>Sản phẩm 5</p>', '', '1507912150.jpg', 50000, 5, '', 1, '2017-10-13 09:29:10', '2017-10-13 09:29:10'),
(6, 'Sản phẩm 6', 'Sản phẩm 6', '<p>Sản phẩm 6</p>', '', '1507912176.jpg', 62000, 6, '', 1, '2017-10-13 09:29:36', '2017-10-13 09:29:36'),
(7, 'Sản phẩm 7', 'Sản phẩm 7', '<p>Sản phẩm 7</p>', '', '1507912201.jpg', 120000, 6, '', 1, '2017-10-13 09:30:01', '2017-10-13 09:30:01'),
(8, 'Sản phẩm 8', 'Sản phẩm 8', '<p>Sản phẩm 8</p>', '', '1507912229.jpg', 230000, 1, '', 1, '2017-10-13 09:30:29', '2017-10-13 09:30:29'),
(9, 'Sản phẩm 9', 'Sản phẩm 9', '<p>Sản phẩm 9</p>', '', '1507912260.jpg', 340000, 2, '', 1, '2017-10-13 09:31:00', '2017-10-13 09:31:00'),
(10, 'Sản phẩm 10', 'Sản phẩm 10', '<p>Sản phẩm 10</p>', '', '1507912307.jpg', 410000, 4, '', 1, '2017-10-13 09:31:47', '2017-10-13 09:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `recruitments`
--

CREATE TABLE `recruitments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '1: admin',
  `birthday` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `couple` tinyint(1) NOT NULL DEFAULT '1',
  `info` text COLLATE utf8_unicode_ci,
  `curriculum_vitae` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `status`, `birthday`, `gender`, `couple`, `info`, `curriculum_vitae`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tuan anh', 'trantuananh198610@gmail.com', '$2y$10$eJTy5S3fhU1K2fLoqP3eIex/HV9vfRyT/yxZAVuiXov3dw0k40V2O', 'day la address', '123123333', 1, NULL, 1, 1, NULL, '', 'v6l4BvRgvQKRfPlOWIh8vaXlKE5rumLf9FQgGaYKYHf9tbIZisME2Ra1yU7K', '2017-10-13 02:17:50', '2017-10-13 02:17:50'),
(2, 'Nguyễn Quốc Sử', 'su.nq@barista.co.jp', '$2y$10$DWeIWfd8VCthCXJwSnmMh.nkR/zRZPZiO3lGCjQ6sdndDZbM/j0GS', '121212', '01674147774', 2, '03/06/2018', 0, 0, '{\"city\":null,\"state\":\"su.nq@barista.co.jp\",\"academiccareer\":\"1\",\"school\":\"cas\",\"major\":\"dasd\",\"qualifications\":\"&#x111;&#x1EA5;\"}', 'nguyen_quoc_su_2018-03-29.docx', 'OXprTJxrCjkDIrslmgnVzqQ18AYi0v1PiFMfSrQf2USwX2emhy5jz6d0WJG6', '2018-03-29 06:38:59', '2018-03-29 06:38:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applies`
--
ALTER TABLE `applies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `applies` ADD `view` TINYINT(1) NOT NULL DEFAULT '0' AFTER `status`;
ALTER TABLE `applies` CHANGE `cv` `cv` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE `users` DROP `remember_token`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
