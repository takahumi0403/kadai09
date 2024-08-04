-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-06-30 12:24:19
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_php02_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `bookname` varchar(64) NOT NULL,
  `bookURL` text NOT NULL,
  `bookcomment` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookname`, `bookURL`, `bookcomment`, `datetime`) VALUES
(1, '終わりなき夜に生まれつく', 'endlessnight@test.jp', '名作。', '2024-06-15 05:49:51'),
(2, 'アルジャーノンに花束を', 'flower@test.jp', '泣いた', '2024-06-30 06:08:43'),
(3, 'なぜ働いていると本が読めなくなるのか', 'dontreadwhy@test.jp', 'この本を読みたい。', '2024-06-30 06:14:50'),
(4, '成瀬は天下を取りにいく', 'nrise@topofworld.jp', '人気あるけど面白いのかな？', '2024-06-30 06:18:18'),
(5, 'わたしが「わたし」を助けに行こう', 'ihelpme@test.jp', '題名が好き', '2024-06-30 06:21:34'),
(6, 'この道', '', '', '2024-06-30 09:00:15'),
(7, '祈願成就', 'kowai@test.jp', '結構怖そう', '2024-06-30 15:35:09');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
