-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2024 年 10 月 09 日 00:21
-- 伺服器版本： 10.10.2-MariaDB
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pet_hospital`
--

-- --------------------------------------------------------

--
-- 資料表結構 `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(30) DEFAULT NULL COMMENT '會員編號',
  `doctorId` int(11) DEFAULT NULL COMMENT '醫師編號',
  `dates` date DEFAULT NULL COMMENT '日期',
  `timeId` tinyint(2) DEFAULT NULL COMMENT '早1 午2 晚3',
  `petName` varchar(30) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_timeId` (`timeId`),
  KEY `fk_doctorId` (`doctorId`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `booking`
--

INSERT INTO `booking` (`id`, `userId`, `doctorId`, `dates`, `timeId`, `petName`, `createTime`) VALUES
(9, 'avam14', 2, '2024-09-25', 2, NULL, '2024-09-20 00:50:32'),
(11, 'lilyn28', 1, '2024-09-23', 1, NULL, '2024-09-20 02:36:33'),
(12, 'chrisj5', 1, '2024-09-22', 1, NULL, '2024-09-20 03:18:45'),
(13, 'fo', 1, '2024-09-24', 1, NULL, '2024-09-23 01:09:22'),
(14, 'emap18', 1, '2024-09-23', 1, NULL, '2024-09-23 01:09:22'),
(36, NULL, 2, '2024-10-02', 2, NULL, '2024-09-30 07:09:15'),
(37, NULL, 2, '2024-10-03', 2, NULL, '2024-09-30 07:09:19'),
(38, NULL, 2, '2024-10-04', 2, NULL, '2024-09-30 07:09:22'),
(39, NULL, 2, '2024-10-05', 2, NULL, '2024-09-30 07:09:23'),
(40, NULL, 1, '2024-10-02', 1, NULL, '2024-09-30 07:51:56'),
(41, NULL, 1, '2024-10-04', 1, NULL, '2024-09-30 07:52:00'),
(42, NULL, 1, '2024-10-04', 1, NULL, '2024-09-30 07:52:10');

-- --------------------------------------------------------

--
-- 資料表結構 `dates`
--

DROP TABLE IF EXISTS `dates`;
CREATE TABLE IF NOT EXISTS `dates` (
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `dates`
--

INSERT INTO `dates` (`date`) VALUES
('2024-12-01'),
('2024-12-02'),
('2024-12-03'),
('2024-12-04'),
('2024-12-05'),
('2024-12-06'),
('2024-12-07'),
('2024-12-08'),
('2024-12-09'),
('2024-12-10'),
('2024-12-11'),
('2024-12-12'),
('2024-12-13'),
('2024-12-14'),
('2024-12-15'),
('2024-12-16'),
('2024-12-17'),
('2024-12-18'),
('2024-12-19'),
('2024-12-20'),
('2024-12-21'),
('2024-12-22'),
('2024-12-23'),
('2024-12-24'),
('2024-12-25'),
('2024-12-26'),
('2024-12-27'),
('2024-12-28'),
('2024-12-29'),
('2024-12-30'),
('2024-12-31');

-- --------------------------------------------------------

--
-- 資料表結構 `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctorId` int(11) NOT NULL AUTO_INCREMENT COMMENT '醫師編號',
  `doctorName` varchar(30) DEFAULT NULL COMMENT '醫師姓名',
  `position` char(20) DEFAULT NULL COMMENT '職稱',
  `edu` varchar(50) DEFAULT NULL COMMENT '學歷',
  `typeId` int(11) DEFAULT NULL COMMENT '專業科別',
  `content` varchar(1000) DEFAULT NULL COMMENT '內文',
  `photo` varchar(50) DEFAULT NULL COMMENT '照片',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`doctorId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `doctor`
--

INSERT INTO `doctor` (`doctorId`, `doctorName`, `position`, `edu`, `typeId`, `content`, `photo`, `createTime`) VALUES
(1, '華陀', '院長', '國立中興大學獸醫學士學位、美國獲得獸醫內科專業認證', 1, '<p>擔任知名獸醫院的院長，擁有豐富的臨床經驗。他主要負責診斷和治療各類內科疾病，特別是在心臟病、腎臟病、糖尿病等慢性病的管理上展現了出色的專業技能。華佗強調個性化醫療，為每隻動物制定專屬的診療計畫，並積極推動預防醫學，以提升動物的整體健康。他的專業態度與親切溝通深受飼主信賴，領導醫療團隊提供高品質的醫療服務，致力於提升動物的生活品質</p>', '2024_10_02_15_36_35_458.jpg', '2024-09-30 05:42:02'),
(2, '張基義', '副院長', '國立中興大學獸醫學士學位、美國獲得獸醫外科專業認證', 2, '<p>張基義是一位專業的外科獸醫師，擁有豐富的臨床經驗和高度專業的手術技巧。他專注於各類動物的外科手術，包括常見的軟組織手術、骨科手術，以及複雜的腫瘤切除和重建手術。無論是寵物的健康問題還是急性創傷，張基義獸醫師都能以精湛的醫術和嚴謹的態度提供精確的診斷和治療。</p><p>在每個手術過程中，他都確保手術的安全性和效果，並重視術後的康復護理，為動物提供全程的照顧和關懷。張基義不僅在技術上追求卓越，還在與飼主的溝通中展現出耐心與同理心，讓飼主能安心地將愛寵交託於他。他以高度的責任感和使命感，致力於提升動物的生活質量，並持續在外科領域中不斷進步，成為業界深受推崇的獸醫師。</p>', '2024_10_02_15_36_55_818.jpg', '2024-09-30 03:54:20'),
(3, '陳醫師', '獸醫牙科主任', '國立台灣大學獸醫學士學位、美國獲得獸醫牙科專業認證', 3, '<p>陳醫生擁有十年以上的臨床經驗，專注於動物的口腔健康，特別是小型犬和貓的牙齒問題。她深知口腔健康對整體健康的重要性，致力於推廣定期口腔檢查的必要性。陳醫生不僅專業技術精湛，還經常舉辦講座，教育寵物主人如何正確清潔寵物的牙齒，並分享飲食對牙齒健康的影響。她以耐心和關懷的態度贏得了許多飼主的信任，並鼓勵他們在家中建立良好的牙齒護理習慣。陳醫生希望透過教育和專業服務，提升寵物的生活品質。</p>', '2024_10_02_15_37_37_674.jpg', '2024-10-02 07:02:16'),
(4, '李醫生', '獸醫骨科副主任', '國立中興大學獸醫學士學位、國外獲得骨科專科醫師認證', 4, '<p>李醫生專注於動物骨科，特別是關節手術和骨折治療。他擁有超過十五年的臨床經驗，並且是多個骨科學會的成員。李醫生了解動物的運動能力對其生活質量的重要性，因此致力於提供最先進的診斷和治療技術。他經常參加國內外的專業研討會，以確保掌握最新的醫療知識和技術。每當面對複雜的骨科病例，李醫生都會耐心分析並制定個性化的治療計劃。他的專業知識和對動物的關懷，使許多飼主感到安心，並能重拾與愛寵的美好生活。</p>', '2024_10_02_15_36_20_921.jpg', '2024-10-02 07:03:57'),
(5, '張醫師', '獸醫皮膚科專家', '國立陽明大學獸醫學士學位、歐洲進修皮膚科專業', 5, '<p>張醫生是一位經驗豐富的獸醫皮膚科醫師，擁有超過十年的專業經歷，專注於各類動物皮膚病的診斷和治療，包括過敏、感染和寄生蟲問題。他對待每位患者都充滿耐心，會根據每隻動物的獨特情況制定個性化的治療方案。張醫生不僅關注病症本身，也重視預防保健，經常舉辦社區健康宣導活動，提高大眾對動物皮膚健康的重視。他的專業能力和熱心服務，使每位來診的寵物及其主人都感到安心和信賴，並獲得有效的治療和建議。</p>', '2024_10_02_15_05_09_483.jpg', '2024-10-02 07:05:09'),
(6, '林醫師', '獸醫貓科主任', '國立屏東科技大學獸醫學士學位、美國獲得貓科專業認證', 6, '<p>林醫生專注於貓咪的健康問題，尤其是貓並病的診斷與治療。他在動物醫療領域有著深厚的知識，致力於提升貓主人對貓健康的認識。林醫生經常舉辦講座，分享貓咪日常護理及疾病預防的知識，並強調早期發現病症的重要性。他深愛貓咪，並以患者的健康為首要任務，經常與飼主溝通，提供個性化的護理建議。林醫生的熱情和專業，使每位貓咪及其主人都感受到無微不至的關懷與支持，並共同努力提升貓咪的生活質量。</p>', '2024_10_02_15_37_18_174.jpg', '2024-10-02 07:06:40');

-- --------------------------------------------------------

--
-- 資料表結構 `doctor_rest`
--

DROP TABLE IF EXISTS `doctor_rest`;
CREATE TABLE IF NOT EXISTS `doctor_rest` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '休假用',
  `doctorId` int(11) NOT NULL COMMENT '醫師編號',
  `dates` date NOT NULL COMMENT '日期',
  `timeId` tinyint(4) NOT NULL COMMENT '時間',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `doctor_rest`
--

INSERT INTO `doctor_rest` (`id`, `doctorId`, `dates`, `timeId`) VALUES
(1, 1, '2024-09-21', 1),
(7, 1, '2024-09-26', 3),
(8, 2, '2024-09-25', 2),
(9, 1, '2024-09-25', 1),
(10, 1, '2024-09-26', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `meeting`
--

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE IF NOT EXISTS `meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meetingId` varchar(50) DEFAULT NULL COMMENT '就診編號',
  `petId` tinyint(11) DEFAULT NULL COMMENT '寵物編號',
  `itemId` int(10) DEFAULT NULL COMMENT '治療項目代碼',
  `hsp` int(11) DEFAULT NULL COMMENT '住院0:沒有 1:有',
  `content` varchar(100) DEFAULT NULL COMMENT '病況描述 ',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` char(30) DEFAULT NULL COMMENT '姓名',
  `email` varchar(50) DEFAULT NULL COMMENT '信箱',
  `phone` varchar(30) DEFAULT NULL COMMENT '電話',
  `adr` varchar(50) DEFAULT NULL COMMENT '地址',
  `bir` date DEFAULT NULL COMMENT '生日',
  `userId` varchar(11) DEFAULT NULL COMMENT '帳號',
  `pwd` varchar(20) DEFAULT NULL COMMENT '密碼',
  `petId` varchar(20) DEFAULT NULL COMMENT '寵物編號',
  `prm` tinyint(10) NOT NULL DEFAULT 10 COMMENT '會員權限\r\n0:封鎖 10:開放 20:管理者',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `userName`, `email`, `phone`, `adr`, `bir`, `userId`, `pwd`, `petId`, `prm`, `createTime`) VALUES
(1, '吳咚咚', 'anyway@gmail.com', '0978545236', '台中市豐原區', '2024-09-11', 'fo', '123', NULL, 20, '2024-09-08 04:06:44'),
(3, 'FIG9', 'ironfofo36@gmail.com', '091235458', '0548446416', '2024-09-27', '11111111', '11111111', NULL, 10, '2024-09-10 07:56:33'),
(6, 'FIG8', 'ironfofo36@gmail.com', '84', '151151515151513555556', '2024-09-06', '111', '888', NULL, 20, '2024-09-20 00:11:34'),
(7, 'John Doe', 'johndoe1@example.com', '123-456-7890', '123 Main St', '1990-01-01', 'johndoe1', 'password123', NULL, 10, '2024-09-20 00:25:33'),
(8, 'Jane Smith', 'janesmith2@example.com', '987-654-3210', '456 Oak St', '1985-05-12', 'janesmith2', 'securepwd456', NULL, 10, '2024-09-20 00:25:33'),
(9, 'Tom Lee', 'tomlee3@example.com', '555-666-7777', '789 Pine Ave', '1992-07-23', 'tomlee3', 'mypassword789', NULL, 10, '2024-09-20 00:25:33'),
(10, 'Lisa Wong', 'lisawong4@example.com', '333-444-5555', '321 Maple Dr', '1994-09-15', 'lisawong4', 'lisa@password', NULL, 10, '2024-09-20 00:25:33'),
(11, 'Chris Johnson', 'chrisj5@example.com', '222-333-4444', '654 Elm St', '1988-11-11', 'chrisj5', 'password111', NULL, 10, '2024-09-20 00:25:33'),
(12, 'Emily Davis', 'emilyd6@example.com', '111-222-3333', '987 Cedar St', '1993-02-25', 'emilyd6', 'emily123', NULL, 20, '2024-09-20 00:25:33'),
(13, 'James Brown', 'jamesb7@example.com', '444-555-6666', '159 Birch St', '1991-06-30', 'jamesb7', 'jamespass', NULL, 10, '2024-09-20 00:25:33'),
(14, 'Sophia White', 'sophiaw8@example.com', '777-888-9999', '753 Willow Ave', '1987-08-14', 'sophiaw8', 'white456', NULL, 10, '2024-09-20 00:25:33'),
(15, 'Michael Green', 'michaelg9@example.com', '999-888-7777', '951 Palm Dr', '1995-04-10', 'michaelg9', 'green123', NULL, 10, '2024-09-20 00:25:33'),
(16, 'Olivia Black', 'oliviab10@example.com', '666-555-4444', '852 Cherry Ln', '1986-12-19', 'oliviab10', 'black987', NULL, 20, '2024-09-20 00:25:33'),
(17, 'Daniel Garcia', 'danielg11@example.com', '555-444-3333', '123 Oakwood St', '1990-03-22', 'danielg11', 'garciapass', NULL, 20, '2024-09-20 00:25:33'),
(18, 'Mia Clark', 'miac12@example.com', '333-222-1111', '456 Sycamore Ave', '1989-09-30', 'miac12', 'clarkpass', NULL, 10, '2024-09-20 00:25:33'),
(19, 'Robert Harris', 'roberth13@example.com', '111-000-9999', '789 Juniper Dr', '1993-11-21', 'roberth13', 'harris789', NULL, 10, '2024-09-20 00:25:33'),
(20, 'Ava Martinez', 'avam14@example.com', '999-000-8888', '321 Fir Ln', '1992-02-15', 'avam14', 'martinezava', NULL, 10, '2024-09-20 00:25:33'),
(21, 'David Lopez', 'davidl15@example.com', '888-777-6666', '654 Redwood Blvd', '1987-04-26', 'davidl15', 'lopez456', NULL, 10, '2024-09-20 00:25:33'),
(22, 'Isabella Wilson', 'isabellaw16@example.com', '666-555-4444', '987 Aspen Way', '1990-08-10', 'isabellaw16', 'wilsonpass', NULL, 10, '2024-09-20 00:25:33'),
(23, 'Jacob King', 'jacobk17@example.com', '444-333-2222', '159 Spruce Dr', '1991-01-17', 'jacobk17', 'kingpass123', NULL, 10, '2024-09-20 00:25:33'),
(24, 'Emma Perez', 'emap18@example.com', '222-111-0000', '753 Dogwood Ct', '1995-07-25', 'emap18', 'perezemma', NULL, 10, '2024-09-20 00:25:33'),
(25, 'William Scott', 'williams19@example.com', '111-222-3333', '951 Hemlock St', '1986-06-05', 'williams19', 'scottwill', NULL, 10, '2024-09-20 00:25:33'),
(26, 'Grace Adams', 'gracea20@example.com', '333-444-5555', '852 Magnolia Rd', '1989-10-12', 'gracea20', 'adamsgrace', NULL, 10, '2024-09-20 00:25:33'),
(27, 'Henry Reed', 'henryr21@example.com', '555-666-7777', '123 Cypress Dr', '1993-03-14', 'henryr21', 'reedpass', NULL, 10, '2024-09-20 00:25:33'),
(28, 'Charlotte Baker', 'charlotteb22@example.com', '987-654-3210', '456 Hickory St', '1992-05-09', 'charlotteb2', 'bakercharlotte', NULL, 10, '2024-09-20 00:25:33'),
(29, 'Jack Hill', 'jackh23@example.com', '777-888-9999', '789 Pecan Dr', '1990-12-18', 'jackh23', 'hilljack', NULL, 10, '2024-09-20 00:25:33'),
(30, 'Sophie Turner', 'sophiet24@example.com', '666-777-8888', '321 Alder Ln', '1991-07-01', 'sophiet24', 'turnersophie', NULL, 10, '2024-09-20 00:25:33'),
(31, 'George Carter', 'georgec25@example.com', '444-555-6666', '654 Holly Dr', '1988-11-20', 'georgec25', 'cartergeorge', NULL, 10, '2024-09-20 00:25:33'),
(32, 'Amelia Russell', 'ameliar26@example.com', '999-888-7777', '987 Maple St', '1994-08-03', 'ameliar26', 'russellamelia', NULL, 10, '2024-09-20 00:25:33'),
(33, 'Thomas Evans', 'thomase27@example.com', '888-777-6666', '159 Beech St', '1989-09-27', 'thomase27', 'evansthomas', NULL, 10, '2024-09-20 00:25:33'),
(34, 'Lily Nelson', 'lilyn28@example.com', '555-444-3333', '753 Oak Ln', '1995-02-10', 'lilyn28', 'nelsonlily1', NULL, 10, '2024-09-20 00:25:33'),
(35, 'Ethan Diaz', 'ethand29@example.com', '333-222-1111', '951 Poplar St', '1987-06-15', 'ethand29', 'diazethan', NULL, 10, '2024-09-20 00:25:33'),
(36, 'Zoe Bennett', 'zoeb30@example.com', '222-111-0000', '852 Birch Ln', '1993-01-05', 'zoeb30', 'bennettzoe', NULL, 10, '2024-09-20 00:25:33'),
(37, 'Leo Phillips', 'leop31@example.com', '444-555-6666', '123 Linden St', '1991-05-14', 'leop31', 'phillipsleo', NULL, 10, '2024-09-20 00:25:33'),
(38, 'Harper Collins', 'harperc32@example.com', '555-666-7777', '456 Cedar Ln', '1990-09-24', 'harperc32', 'collinsharper', NULL, 10, '2024-09-20 00:25:33'),
(39, 'Alexander Morris', 'alexm33@example.com', '987-654-3210', '789 Ash Ct', '1988-04-19', 'alexm33', 'morrisalex', NULL, 20, '2024-09-20 00:25:33'),
(40, 'Ella Jenkins', 'ellaj34@example.com', '666-777-8888', '321 Spruce Ln', '1995-12-12', 'ellaj34', 'jenkinssophia', NULL, 20, '2024-09-20 00:25:33'),
(41, 'Matthew Kelly', 'matthewk35@example.com', '999-888-7777', '654 Elm Dr', '1992-02-18', 'matthewk35', 'kellymatthew', NULL, 20, '2024-09-20 00:25:33'),
(42, 'Avery Murphy', 'averym36@example.com', '888-777-6666', '987 Dogwood Rd', '1991-09-30', 'averym36', 'murphyavery', NULL, 10, '2024-09-20 00:25:33'),
(43, 'Jackson Foster', 'jacksonf37@example.com', '777-888-9999', '159 Hickory Ave', '1990-03-23', 'jacksonf37', 'fosterjackson', NULL, 10, '2024-09-20 00:25:33'),
(44, 'Scarlett Ward', 'scarlettw38@example.com', '555-444-3333', '753 Maple Dr', '1986-07-19', 'scarlettw38', 'wardscarlett', NULL, 20, '2024-09-20 00:25:33'),
(45, 'Benjamin Brooks', 'benjaminb39@example.com', '333-222-1111', '951 Oakwood Blvd', '1987-01-11', 'benjaminb39', 'brooksbenjamin', NULL, 20, '2024-09-20 00:25:33'),
(46, 'Madison Gray', 'madisong40@example.com', '222-111-0000', '852 Pine St', '1994-11-21', 'madisong40', 'graymadison', NULL, 20, '2024-09-20 00:25:33'),
(47, 'Lucas Simmons', 'lucass41@example.com', '444-555-6666', '123 Ash Blvd', '1993-08-31', 'lucass41', 'simmonslucas', NULL, 20, '2024-09-20 00:25:33'),
(48, 'Chloe Bryant', 'chloeb42@example.com', '555-666-7777', '456 Birch Blvd', '1992-01-25', 'chloeb42', 'bryantchloe', NULL, 20, '2024-09-20 00:25:33');

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `petlist`
--

DROP TABLE IF EXISTS `petlist`;
CREATE TABLE IF NOT EXISTS `petlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '寵物編號',
  `petName` varchar(10) DEFAULT NULL COMMENT '寵物名稱',
  `petType` tinyint(4) DEFAULT NULL COMMENT '1:貓 2:狗 3:其他',
  `vrtId` tinyint(10) DEFAULT NULL COMMENT '品種分狗類和貓類',
  `bir` date DEFAULT NULL COMMENT '生日',
  `vac` tinyint(4) DEFAULT NULL COMMENT '疫苗',
  `photo` varchar(50) DEFAULT NULL COMMENT '照片',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `petlist`
--

INSERT INTO `petlist` (`id`, `petName`, `petType`, `vrtId`, `bir`, `vac`, `photo`, `createTime`) VALUES
(1, 'Fluffy', 2, NULL, '2022-01-15', 1, NULL, '2024-09-09 10:40:33'),
(2, 'Whiskers', 1, NULL, '2021-02-22', 0, NULL, '2024-09-09 10:40:33'),
(3, 'Buddy', 2, NULL, '2020-11-11', 1, NULL, '2024-09-09 10:40:33'),
(4, 'Mittens', 1, NULL, '2023-05-30', 0, NULL, '2024-09-09 10:40:33'),
(5, 'Rex', 2, NULL, '2019-07-19', 0, NULL, '2024-09-09 10:40:33'),
(6, 'Socks', 1, NULL, '2018-09-25', 0, NULL, '2024-09-09 10:40:33'),
(7, 'Bella', 2, NULL, '2021-12-10', 1, NULL, '2024-09-09 10:40:33'),
(8, 'Oliver', 1, NULL, '2022-03-15', 0, NULL, '2024-09-09 10:40:33'),
(9, 'Max', 2, NULL, '2020-06-22', 1, NULL, '2024-09-09 10:40:33'),
(10, 'Luna', 1, NULL, '2023-08-04', 0, NULL, '2024-09-09 10:40:33'),
(11, 'Charlie', 2, NULL, '2021-04-14', 1, NULL, '2024-09-09 10:40:33'),
(12, 'Lucy', 1, NULL, '2020-12-12', 0, NULL, '2024-09-09 10:40:33'),
(13, 'Cooper', 2, NULL, '2019-10-05', 0, NULL, '2024-09-09 10:40:33'),
(14, 'Daisy', 1, NULL, '2022-07-21', 0, NULL, '2024-09-09 10:40:33'),
(15, 'Toby', 2, NULL, '2022-09-30', 1, NULL, '2024-09-09 10:40:33'),
(16, 'Simba', 1, NULL, '2021-01-07', 0, NULL, '2024-09-09 10:40:33'),
(17, 'Rocky', 2, NULL, '2020-08-14', 0, NULL, '2024-09-09 10:40:33'),
(18, 'Chloe', 1, NULL, '2019-11-22', 0, NULL, '2024-09-09 10:40:33'),
(19, 'Duke', 2, NULL, '2021-03-16', 1, NULL, '2024-09-09 10:40:33'),
(20, 'Nala', 1, NULL, '2022-10-11', 0, NULL, '2024-09-09 10:40:33'),
(21, 'Teddy', 2, NULL, '2018-12-25', 1, NULL, '2024-09-09 10:40:33'),
(22, 'Kitty', 1, NULL, '2020-04-09', 0, NULL, '2024-09-09 10:40:33'),
(23, 'Riley', 2, NULL, '2019-05-20', 0, NULL, '2024-09-09 10:40:33'),
(24, 'Sophie', 1, NULL, '2022-01-18', 0, NULL, '2024-09-09 10:40:33'),
(25, 'Bentley', 2, NULL, '2021-06-23', 1, NULL, '2024-09-09 10:40:33'),
(26, 'Milo', 1, NULL, '2018-08-16', 0, NULL, '2024-09-09 10:40:33'),
(27, 'Jackson', 2, NULL, '2020-02-13', 0, NULL, '2024-09-09 10:40:33'),
(28, 'Ginger', 1, NULL, '2021-07-29', 0, NULL, '2024-09-09 10:40:33'),
(29, 'Oscar', 2, NULL, '2022-04-12', 1, NULL, '2024-09-09 10:40:33'),
(30, 'Maggie', 1, NULL, '2019-03-04', 0, NULL, '2024-09-09 10:40:33'),
(31, 'Bear', 2, NULL, '2021-11-19', 0, NULL, '2024-09-09 10:40:33'),
(32, 'Lily', 1, NULL, '2020-10-31', 0, NULL, '2024-09-09 10:40:33'),
(33, 'Leo', 2, NULL, '2022-06-05', 1, NULL, '2024-09-09 10:40:33'),
(34, 'Misty', 1, NULL, '2018-04-22', 0, NULL, '2024-09-09 10:40:33'),
(35, 'Holly', 2, NULL, '2019-12-27', 0, NULL, '2024-09-09 10:40:33'),
(36, 'Molly', 1, NULL, '2021-05-14', 0, NULL, '2024-09-09 10:40:33'),
(37, 'Rusty', 2, NULL, '2020-09-13', 1, NULL, '2024-09-09 10:40:33'),
(38, 'Zoe', 1, NULL, '2022-11-30', 0, NULL, '2024-09-09 10:40:33'),
(39, 'Bailey', 2, NULL, '2021-02-07', 1, NULL, '2024-09-09 10:40:33'),
(40, 'Princess', 1, NULL, '2019-06-09', 0, NULL, '2024-09-09 10:40:33'),
(41, 'Jasper', 2, NULL, '2020-01-23', 0, NULL, '2024-09-09 10:40:33'),
(42, 'Poppy', 1, NULL, '2022-04-06', 0, NULL, '2024-09-09 10:40:33'),
(43, 'Shadow', 2, NULL, '2021-08-12', 1, NULL, '2024-09-09 10:40:33'),
(44, 'Mimi', 1, NULL, '2018-07-14', 0, NULL, '2024-09-09 10:40:33'),
(45, 'Thor', 2, NULL, '2019-11-01', 0, NULL, '2024-09-09 10:40:33'),
(46, 'Cleo', 1, NULL, '2022-03-23', 0, NULL, '2024-09-09 10:40:33'),
(47, 'Rexy', 2, NULL, '2020-12-18', 1, NULL, '2024-09-09 10:40:33'),
(48, 'Sasha', 1, NULL, '2021-09-05', 0, NULL, '2024-09-09 10:40:33'),
(49, 'Buster', 2, NULL, '2022-07-30', 0, NULL, '2024-09-09 10:40:33'),
(50, 'Tina', 1, NULL, '2019-04-11', 0, NULL, '2024-09-09 10:40:33'),
(51, 'Finn', 2, NULL, '2021-10-19', 1, NULL, '2024-09-09 10:40:33'),
(52, 'Nina', 1, NULL, '2020-05-25', 0, NULL, '2024-09-09 10:40:33'),
(53, 'Chester', 2, NULL, '2019-08-06', 0, NULL, '2024-09-09 10:40:33'),
(54, 'Peanut', 1, NULL, '2022-12-15', 0, NULL, '2024-09-09 10:40:33'),
(55, 'Gus', 2, NULL, '2020-03-17', 1, NULL, '2024-09-09 10:40:33'),
(56, 'Lola', 1, NULL, '2021-06-01', 0, NULL, '2024-09-09 10:40:33'),
(57, 'Archie', 2, NULL, '2022-01-09', 0, NULL, '2024-09-09 10:40:33'),
(58, 'Kiki', 1, NULL, '2019-02-13', 0, NULL, '2024-09-09 10:40:33'),
(59, 'Monty', 2, NULL, '2021-05-21', 1, NULL, '2024-09-09 10:40:33'),
(60, 'Angel', 1, NULL, '2020-11-29', 0, NULL, '2024-09-09 10:40:33'),
(61, 'Ziggy', 2, NULL, '2022-08-17', 1, NULL, '2024-09-09 10:40:33'),
(62, 'Nero', 1, NULL, '2019-07-23', 0, NULL, '2024-09-09 10:40:33'),
(63, 'Zeus', 2, NULL, '2020-10-03', 0, NULL, '2024-09-09 10:40:33'),
(64, 'Pepper', 1, NULL, '2021-03-08', 0, NULL, '2024-09-09 10:40:33'),
(65, 'Sandy', 2, NULL, '2019-01-14', 0, NULL, '2024-09-09 10:40:33'),
(66, 'Cinnamon', 1, NULL, '2022-06-27', 0, NULL, '2024-09-09 10:40:33'),
(67, 'Dolly', 2, NULL, '2021-07-11', 1, NULL, '2024-09-09 10:40:33'),
(68, 'Lulu', 1, NULL, '2019-10-20', 0, NULL, '2024-09-09 10:40:33'),
(69, 'Rocky', 2, NULL, '2022-09-09', 0, NULL, '2024-09-09 10:40:33'),
(70, 'Tilly', 1, NULL, '2020-02-21', 0, NULL, '2024-09-09 10:40:33'),
(71, 'Ollie', 2, NULL, '2019-04-16', 1, NULL, '2024-09-09 10:40:33'),
(72, 'Rosie', 1, NULL, '2021-11-02', 0, NULL, '2024-09-09 10:40:33'),
(73, 'Harley', 2, NULL, '2022-05-08', 1, NULL, '2024-09-09 10:40:33'),
(74, 'Bella', 1, NULL, '2019-08-19', 0, NULL, '2024-09-09 10:40:33'),
(75, 'Jack', 2, NULL, '2020-06-30', 0, NULL, '2024-09-09 10:40:33'),
(76, 'Lola', 1, NULL, '2022-02-17', 0, NULL, '2024-09-09 10:40:33'),
(77, 'Oscar', 2, NULL, '2019-12-09', 1, NULL, '2024-09-09 10:40:33'),
(78, 'Maggie', 1, NULL, '2021-12-20', 0, NULL, '2024-09-09 10:40:33'),
(79, 'Sam', 2, NULL, '2020-07-23', 1, NULL, '2024-09-09 10:40:33'),
(80, 'Luna', 1, NULL, '2022-09-15', 0, NULL, '2024-09-09 10:40:33'),
(81, 'Daisy', 2, NULL, '2019-03-29', 1, NULL, '2024-09-09 10:40:33'),
(82, 'Lily', 1, NULL, '2021-04-22', 0, NULL, '2024-09-09 10:40:33'),
(83, 'Benny', 2, NULL, '2020-10-14', 1, NULL, '2024-09-09 10:40:33'),
(84, 'Chloe', 1, NULL, '2022-07-12', 0, NULL, '2024-09-09 10:40:33'),
(85, 'Zara', 2, NULL, '2019-05-19', 0, NULL, '2024-09-09 10:40:33'),
(86, 'Milo', 1, NULL, '2021-10-01', 0, NULL, '2024-09-09 10:40:33'),
(87, 'Buddy', 2, NULL, '2020-01-08', 1, NULL, '2024-09-09 10:40:33'),
(88, 'Misty', 1, NULL, '2022-03-04', 0, NULL, '2024-09-09 10:40:33'),
(89, 'Jake', 2, NULL, '2019-09-28', 0, NULL, '2024-09-09 10:40:33'),
(90, 'Sophie', 1, NULL, '2021-08-11', 0, NULL, '2024-09-09 10:40:33'),
(91, 'Teddy', 2, NULL, '2022-06-18', 1, NULL, '2024-09-09 10:40:33'),
(92, 'Zoe', 1, NULL, '2019-12-03', 0, NULL, '2024-09-09 10:40:33');

-- --------------------------------------------------------

--
-- 資料表結構 `petmedical`
--

DROP TABLE IF EXISTS `petmedical`;
CREATE TABLE IF NOT EXISTS `petmedical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) DEFAULT NULL COMMENT '治療項目',
  `cost` int(11) DEFAULT NULL COMMENT '費用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `petmedical`
--

INSERT INTO `petmedical` (`id`, `item`, `cost`) VALUES
(1, '疫苗接種 - 基本', 1500),
(2, '疫苗接種 - 高級', 2300),
(3, '牙齒清潔 - 小型', 3600),
(4, '牙齒清潔 - 大型', 5400),
(5, '一般檢查 - 基本', 2100),
(6, '一般檢查 - 全面', 2700),
(7, '手術 - 小型', 7500),
(8, '手術 - 大型', 15000),
(9, 'X光檢查 - 單視圖', 1800),
(10, 'X光檢查 - 多視圖', 3000),
(11, '血液檢查 - 基本', 1200),
(12, '血液檢查 - 全面', 2700),
(13, '腹部超聲波', 4500),
(14, '全身超聲波', 7500),
(15, '跳蚤治療 - 小型', 900),
(16, '跳蚤治療 - 大型', 1500),
(17, '驅蟲治療', 1350),
(18, '晶片植入', 1700),
(19, '絕育手術 - 小型', 4500),
(20, '絕育手術 - 大型', 7500),
(21, '緊急就診', 6000),
(22, '皮膚過敏治療', 2400),
(23, '心絲蟲檢查', 1800),
(24, '皮膚科諮詢', 2100),
(25, '骨科評估', 3000),
(26, '疼痛管理諮詢', 2600),
(27, '水療療程', 3600),
(28, '行為諮詢', 2900),
(29, '營養諮詢', 2000),
(30, '激光療程', 3000),
(31, '脊椎矯正', 3300),
(32, '安樂死服務', 4500),
(33, '旅行健康證明', 2300),
(34, '傳染病檢查', 3000),
(35, '傷口護理', 2600),
(36, '眼科諮詢', 2700),
(37, '康復療程', 3600),
(38, '老年健康檢查', 2600),
(39, '腫瘤切除', 8000),
(40, '心臟病檢查', 2800),
(41, '內分泌疾病檢查', 3200),
(42, '尿液檢查', 1500),
(43, '便便檢查', 1400),
(44, '頸部脊椎檢查', 2900);

-- --------------------------------------------------------

--
-- 資料表結構 `pettype`
--

DROP TABLE IF EXISTS `pettype`;
CREATE TABLE IF NOT EXISTS `pettype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petTypeName` char(10) DEFAULT NULL COMMENT '1:貓 2:狗 3:其他',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `pettype`
--

INSERT INTO `pettype` (`id`, `petTypeName`) VALUES
(1, '貓'),
(2, '狗'),
(3, '其他');

-- --------------------------------------------------------

--
-- 資料表結構 `prm_list`
--

DROP TABLE IF EXISTS `prm_list`;
CREATE TABLE IF NOT EXISTS `prm_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prm` int(11) DEFAULT NULL COMMENT '會員等級',
  `prmTitle` varchar(30) DEFAULT NULL COMMENT '會員分數',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建立時間',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prm_list`
--

INSERT INTO `prm_list` (`id`, `prm`, `prmTitle`, `createTime`) VALUES
(1, 0, '限制', '2024-10-08 12:55:47'),
(2, 10, '普通', '2024-10-08 12:55:47'),
(3, 20, 'VIP', '2024-10-08 12:55:47');

-- --------------------------------------------------------

--
-- 資料表結構 `professional`
--

DROP TABLE IF EXISTS `professional`;
CREATE TABLE IF NOT EXISTS `professional` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(10) DEFAULT NULL COMMENT '醫學科別',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `professional`
--

INSERT INTO `professional` (`typeId`, `department`, `createTime`) VALUES
(1, '內科', '2024-09-05 15:02:40'),
(2, '外科', '2024-09-05 15:02:40'),
(3, '牙科', '2024-09-05 15:02:40'),
(4, '骨科', '2024-09-05 15:02:40'),
(5, '皮膚科', '2024-09-05 15:02:40'),
(6, '貓病專科', '2024-09-05 15:02:40'),
(7, '住院部', '2024-09-05 15:02:40');

-- --------------------------------------------------------

--
-- 資料表結構 `professional_layer1`
--

DROP TABLE IF EXISTS `professional_layer1`;
CREATE TABLE IF NOT EXISTS `professional_layer1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeId` int(11) DEFAULT NULL COMMENT '科別ID',
  `layer1_name` varchar(50) DEFAULT NULL COMMENT '項目',
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `professional_layer1`
--

INSERT INTO `professional_layer1` (`id`, `typeId`, `layer1_name`, `createTime`) VALUES
(1, 1, '肝膽胃腸： 肝炎、胰臟炎、腸炎', '2024-09-05 15:05:32'),
(2, 1, '腎臟泌尿 ：急性慢性腎病、腎衰竭、自發性膀胱炎、膀胱結石', '2024-09-05 15:05:32'),
(3, 1, '新陳代謝 ：內分泌、甲狀腺疾病、庫欣氏症、艾迪森氏症', '2024-09-05 15:05:32'),
(4, 1, '血液感染 ：內寄生蟲驅蟲、焦蟲感染、傳染性疾病', '2024-09-05 15:05:32'),
(5, 1, '影像評估 ：X光、超音波檢查、內視鏡胃鏡檢查', '2024-09-05 15:05:32'),
(6, 2, '狗貓小傷口微創結紮手術', '2024-09-05 15:07:27'),
(7, 2, '皮膚增生物切除', '2024-09-05 15:07:27'),
(8, 2, '腹腔腫瘤切除', '2024-09-05 15:07:27'),
(9, 2, '膀胱結石手術', '2024-09-05 15:07:27'),
(10, 2, '腸胃異物取出暨縫合手術', '2024-09-05 15:07:27'),
(11, 3, '牙結石清除', '2024-09-05 15:08:48'),
(12, 3, '洗牙拋光', '2024-09-05 15:08:48'),
(13, 3, '斷齒手術拔除', '2024-09-05 15:08:48'),
(14, 3, '牙齦切開術', '2024-09-05 15:08:48'),
(15, 4, '膝關節固定術', '2024-09-05 15:10:29'),
(16, 4, '骨折手術復位', '2024-09-05 15:10:29'),
(17, 4, '脊椎骨刺評估', '2024-09-05 15:10:29'),
(18, 4, '髖關節退化評估', '2024-09-05 15:10:29'),
(19, 4, '感染創傷性截肢', '2024-09-05 15:10:29'),
(20, 5, '膿皮症', '2024-09-05 15:11:26'),
(21, 5, '皮黴菌感染', '2024-09-05 15:11:26'),
(22, 5, '長期慢性皮膚疾病', '2024-09-05 15:11:26'),
(23, 5, '異位性皮膚炎中西藥療程', '2024-09-05 15:11:26'),
(24, 6, '貓腫瘤專科', '2024-09-05 15:12:33'),
(25, 6, '貓咪內分泌疾病診療', '2024-09-05 15:12:33'),
(26, 6, '貓微創小傷口結紮手術', '2024-09-05 15:12:33');

-- --------------------------------------------------------

--
-- 資料表結構 `times`
--

DROP TABLE IF EXISTS `times`;
CREATE TABLE IF NOT EXISTS `times` (
  `timeId` tinyint(11) NOT NULL AUTO_INCREMENT,
  `time_period` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`timeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `times`
--

INSERT INTO `times` (`timeId`, `time_period`) VALUES
(1, '早'),
(2, '中'),
(3, '晚');

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_doctorId` FOREIGN KEY (`doctorId`) REFERENCES `doctor` (`doctorId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_timeId` FOREIGN KEY (`timeId`) REFERENCES `times` (`timeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
