-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019-06-16 09:35:57
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `phpproject`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `li` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `activity`
--

INSERT INTO `activity` (`time`, `li`, `link`) VALUES
('2019/06/03', '國家圖書館「舌尖上的繆思──臺灣飲食文學系列講座」', 'https://actio.ncl.edu.tw/108_summer'),
('2019/05/01', '國立成功大學舉辦「未來教育領航者啟動大會」活動', 'https://w3.iiiedu.org.tw/index.php'),
('2019/06/09', '數位知識殿堂 樂學就是不一樣」', 'https://training.ndc.gov.tw/upload/edm/1050520/'),
('2019/04/29', '新北市立圖書館2019年「我的閱讀我做主」參與式預算活動', 'https://www.library.ntpc.gov.tw/htmlcnt/cc51986fd35045f9ac6c206db52c3782'),
('2019/05/01', '臺中市政府新聞局辦理「2019臺中國際動畫影展」短片競賽徵件活動', 'https://twtiaf.com/2018/'),
('2019/05/25', '高雄市政府「市長推薦 每月好書」活動', 'https://goodbook.ksml.edu.tw/'),
('2019/06/05', '高雄市立圖書館「2019青春逗陣學堂：思辨的探險」活動', 'https://www.ksml.edu.tw/LibNews/Details.aspx?Parser=9,4,33,,,,6759');

-- --------------------------------------------------------

--
-- 資料表結構 `allbooks`
--

CREATE TABLE `allbooks` (
  `allno` int(5) NOT NULL,
  `allname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `allauthor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `allbookfrom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `allurl` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `allbooks`
--

INSERT INTO `allbooks` (`allno`, `allname`, `allauthor`, `allbookfrom`, `allurl`) VALUES
(1, '最後14堂星期二的課', '米奇‧艾爾邦', '大塊文', 'https://basicshop.co/wp-content/uploads/2018/06/01_Tuesday-with-morrie_Chinese-version.jpg'),
(2, '老人與海', '海明威', '方向出版社', 'https://pic.pimg.tw/jerry871103/1547916096-1031418209.jpg\r\n'),
(3, '蒼蠅王', '威廉‧高汀', '志文', 'http://pic.pimg.tw/happywith501304/1381761466-46132376.jpg\r\n'),
(4, '小王子', '聖修伯理', '方向出版社', 'https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/E05/001/70/E050017086.jpg&v=59f15ba5&w=348&h=348\r\n'),
(5, '悲慘世界', '與果', '志文', 'http://im1.book.com.tw/image/getImage?i=http://www.books.com.tw/img/001/057/10/0010571014_b_02.jpg&w=348&h=348\r\n'),
(6, '我的天才夢', '侯文詠', '皇冠', 'http://d.share.photo.xuite.net/shakespeare88888/1d8f267/16685847/898173776_m.jpg\r\n'),
(7, '西遊記', '吳承恩', '時報', 'https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/E05/003/50/E050035010.jpg&v=5bd2d8f9&w=348&h=348\r\n'),
(8, '世說新語', '劉義慶', '時報', 'https://cdn.readmoo.com/cover/mq/pohjtli_460x580.jpg?v=0\r\n'),
(9, '老殘遊記', '劉鶚', '時報', 'https://cdn.readmoo.com/cover/qg/rfievkk_460x580.jpg\r\n'),
(10, '倚天屠龍記 ', '金庸', '遠流', 'https://media.taaze.tw/showLargeImage.html?sc=11100002384&width=340&height=474\r\n'),
(26, 'C語言', 'hanwei', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `ask`
--

CREATE TABLE `ask` (
  `askaccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `askname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `asktitle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `askcontent` varchar(535) COLLATE utf8_unicode_ci NOT NULL,
  `askdate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `replycontent` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `ask`
--

INSERT INTO `ask` (`askaccount`, `askname`, `asktitle`, `askcontent`, `askdate`, `replycontent`) VALUES
('demo1', 'roger', '我在demo', 'sssss', '2019/06/13 01:54:34', '我才是roger');

-- --------------------------------------------------------

--
-- 資料表結構 `bulletin`
--

CREATE TABLE `bulletin` (
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `li` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `bulletin`
--

INSERT INTO `bulletin` (`time`, `li`) VALUES
('2019/06/12', 'testtesttest'),
('2019/05/01', '新貨到看這裡，第52期圖書資訊館通訊發刊摟!!'),
('2019/05/17', '本館已完成更新博碩士學位論文系統，歡迎多加利用!!'),
('2019/04/11', '本館第48期通訊發刊了!!'),
('2019/05/31', '端午節休館1日'),
('2019/06/09', '自修室期末考期間開放時間異動'),
('2019/05/01', '行政院修正「行政院及所屬各機關行動化服務發展作業原則」部分規定，並自即日起生效');

-- --------------------------------------------------------

--
-- 資料表結構 `recommend`
--

CREATE TABLE `recommend` (
  `recommendname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `recommendauthor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `recommendbookfrom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `recommendmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recordname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recordauthor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recordbookfrom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recordurl` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `recorddate` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `record`
--

INSERT INTO `record` (`account`, `recordname`, `recordauthor`, `recordbookfrom`, `recordurl`, `recorddate`) VALUES
('demo1', '最後14堂星期二的課', '米奇‧艾爾邦', '大塊文', 'https://basicshop.co/wp-content/uploads/2018/06/01_Tuesday-with-morrie_Chinese-version.jpg', '2019/06/13 01:48:23'),
('demo1', '老人與海', '海明威', '方向出版社', 'https://pic.pimg.tw/jerry871103/1547916096-1031418209.jpg\r\n', '2019/06/13 01:48:59'),
('demo1', '蒼蠅王', '威廉‧高汀', '志文', 'http://pic.pimg.tw/happywith501304/1381761466-46132376.jpg\r\n', '2019/06/13 01:49:34'),
('demo1', '蒼蠅王', '威廉‧高汀', '志文', 'http://pic.pimg.tw/happywith501304/1381761466-46132376.jpg\r\n', '2019/06/13 01:52:30');

-- --------------------------------------------------------

--
-- 資料表結構 `reserve`
--

CREATE TABLE `reserve` (
  `reserveno` int(5) NOT NULL,
  `reservename` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `reserveauthor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `reservebookfrom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `reserveurl` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reserveaccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reservemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `reserve`
--

INSERT INTO `reserve` (`reserveno`, `reservename`, `reserveauthor`, `reservebookfrom`, `reserveurl`, `reserveaccount`, `reservemail`) VALUES
(2, '老人與海', '海明威', '方向出版社', 'https://pic.pimg.tw/jerry871103/1547916096-1031418209.jpg\r\n', 'demo2', 'a1053333@mail.nuk.edu.tw');

-- --------------------------------------------------------

--
-- 資料表結構 `send`
--

CREATE TABLE `send` (
  `sendno` int(5) NOT NULL,
  `sendname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sendauthor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sendbookfrom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sendurl` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `sendaccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sendmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senddate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sendtime` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `send`
--

INSERT INTO `send` (`sendno`, `sendname`, `sendauthor`, `sendbookfrom`, `sendurl`, `sendaccount`, `sendmail`, `senddate`, `sendtime`) VALUES
(3, '蒼蠅王', '威廉‧高汀', '志文', 'http://pic.pimg.tw/happywith501304/1381761466-46132376.jpg\r\n', 'demo1', 'email', '2019/06/13 01:52:30', 1560405150);

-- --------------------------------------------------------

--
-- 資料表結構 `sign`
--

CREATE TABLE `sign` (
  `signaccount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `signpassword` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `sign`
--

INSERT INTO `sign` (`signaccount`, `signpassword`) VALUES
('dao', '456'),
('demo1', 'demo1'),
('demo2', 'demo2');

-- --------------------------------------------------------

--
-- 資料表結構 `unsend`
--

CREATE TABLE `unsend` (
  `unsendno` int(5) NOT NULL,
  `unsendname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `unsendauthor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `unsendbookfrom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `unsendurl` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `unsend`
--

INSERT INTO `unsend` (`unsendno`, `unsendname`, `unsendauthor`, `unsendbookfrom`, `unsendurl`) VALUES
(0, 'java2', '丁丁', '', ''),
(1, '最後14堂星期二的課', '米奇‧艾爾邦', '大塊文', 'https://basicshop.co/wp-content/uploads/2018/06/01_Tuesday-with-morrie_Chinese-version.jpg'),
(2, '老人與海', '海明威', '方向出版社', 'https://pic.pimg.tw/jerry871103/1547916096-1031418209.jpg\r\n'),
(4, '小王子', '聖修伯理', '方向出版社', 'https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/E05/001/70/E050017086.jpg&v=59f15ba5&w=348&h=348\r\n'),
(5, '悲慘世界', '與果', '志文', 'http://im1.book.com.tw/image/getImage?i=http://www.books.com.tw/img/001/057/10/0010571014_b_02.jpg&w=348&h=348\r\n'),
(6, '我的天才夢', '侯文詠', '皇冠', 'http://d.share.photo.xuite.net/shakespeare88888/1d8f267/16685847/898173776_m.jpg\r\n'),
(7, '西遊記', '吳承恩', '時報', 'https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/E05/003/50/E050035010.jpg&v=5bd2d8f9&w=348&h=348\r\n'),
(8, '世說新語', '劉義慶', '時報', 'https://cdn.readmoo.com/cover/mq/pohjtli_460x580.jpg?v=0\r\n'),
(9, '老殘遊記', '劉鶚', '時報', 'https://cdn.readmoo.com/cover/qg/rfievkk_460x580.jpg\r\n'),
(10, '倚天屠龍記 ', '金庸', '遠流', 'https://media.taaze.tw/showLargeImage.html?sc=11100002384&width=340&height=474\r\n');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`li`);

--
-- 資料表索引 `allbooks`
--
ALTER TABLE `allbooks`
  ADD PRIMARY KEY (`allno`);

--
-- 資料表索引 `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`li`);

--
-- 資料表索引 `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`recommendname`,`recommendauthor`,`recommendbookfrom`,`recommendmail`);

--
-- 資料表索引 `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`sendno`);

--
-- 資料表索引 `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`signaccount`,`signpassword`);

--
-- 資料表索引 `unsend`
--
ALTER TABLE `unsend`
  ADD PRIMARY KEY (`unsendno`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `allbooks`
--
ALTER TABLE `allbooks`
  MODIFY `allno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
