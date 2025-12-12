-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2025-12-12 08:21:37
-- 服务器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `yii2advanced`
--
CREATE DATABASE IF NOT EXISTS `yii2advanced` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yii2advanced`;

-- --------------------------------------------------------

--
-- 表的结构 `hero_person`
--

CREATE TABLE `hero_person` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `life_span` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `hero_person`
--

INSERT INTO `hero_person` (`id`, `name`, `life_span`, `avatar`, `biography`, `hometown`) VALUES
(116, '张自忠', '1891-1940', 'https://baike.baidu.com/pic/%E5%BC%A0%E8%87%AA%E5%BF%A0/301363/1/0b7b02087bf40ad162d9ffa6a96506dfa9ec8a136016?fromModule=lemma_top-image&ct=single#aid=1&pic=0b7b02087bf40ad162d9ffa6a96506dfa9ec8a136016', '国民革命军第五战区右翼集团军兼第三十三集团军总司令，在枣宜会战中牺牲，是二战中同盟国牺牲的最高将领。', '山东临清'),
(117, '左权', '1905-1942', 'https://baike.baidu.com/pic/%E5%B7%A6%E6%9D%83/1380/1/9a504fc2d5628535e5dda29cb9b761c6a7efce1bc54c?fromModule=lemma_top-image&ct=single#aid=1&pic=9a504fc2d5628535e5dda29cb9b761c6a7efce1bc54c', '八路军副总参谋长，在反扫荡作战中牺牲，是八路军在抗日战场上牺牲的最高级别将领。', '湖南醴醴陵'),
(118, '杨靖宇', '1905-1940', 'https://baike.baidu.com/pic/%E6%9D%A8%E9%9D%96%E5%AE%87/298347/1/8b82b9014a90f603738d4fea3f49a41bb051f8194750?fromModule=lemma_top-image&ct=single#aid=1&pic=8b82b9014a90f603738d4fea3f49a41bb051f8194750', '东北抗日联军主要创建人和领导人之一，在冰天雪地中与日军周旋战斗，直至壮烈牺牲。', '河南确山'),
(119, '赵尚志', '1908-1942', 'https://baike.baidu.com/pic/%E8%B5%B5%E5%B0%9A%E5%BF%97/73862/5777873174/cf1b9d16fdfaaf51f3de307f7f0e83eef01f3b29cce2?fr=lemma&fromModule=lemma_content-image#aid=5777873174&pic=cf1b9d16fdfaaf51f3de307f7f0e83eef01f3b29cce2', '东北抗日联军创建人和领导人之一，与杨靖宇并称\'南杨北赵\'。', '辽宁朝阳'),
(120, '戴安澜', '1904-1942', 'https://baike.baidu.com/pic/%E6%88%B4%E5%AE%89%E6%BE%9C/1006566/1/a9d3fd1f4134970a304e00c3e287c6c8a786c817f780?fromModule=lemma_top-image&ct=single#aid=1&pic=a9d3fd1f4134970a304e00c3e287c6c8a786c817f780', '中国远征军第200师师长，在缅甸同古保卫战中牺牲，毛泽东为其题写挽诗。', '安徽无为'),
(121, '佟麟阁', '1892-1937', 'https://baike.baidu.com/pic/%E4%BD%9F%E9%BA%9F%E9%98%81/1005725/1/64380cd7912397dda2f0c8425a82b2b7d1a287ee?fromModule=lemma_top-image&ct=single#aid=1&pic=64380cd7912397dda2f0c8425a82b2b7d1a287ee', '国民革命军第29军副军长，是全面抗战爆发后首位殉国的高级将领。', '河北高阳'),
(122, '赵登禹', '1898-1937', 'https://baike.baidu.com/pic/%E8%B5%B5%E7%99%BB%E7%A6%B9/1005672/1/35a85edf8db1cb1340749fbcdd54564e92584b7b?fromModule=lemma_top-image&ct=single#aid=1&pic=35a85edf8db1cb1340749fbcdd54564e92584b7b', '国民革命军第29军132师师长，在卢沟桥事变中英勇抗击日军，壮烈殉国。', '山东菏菏泽'),
(123, '郝梦龄', '1898-1937', 'https://baike.baidu.com/pic/%E9%83%9D%E6%A2%A6%E9%BE%84/4410129/1/4ec2d5628535e5dde7117bc1f28ab0efce1b9d16c4d2?fromModule=lemma_top-image&ct=single#aid=1&pic=4ec2d5628535e5dde7117bc1f28ab0efce1b9d16c4d2', '国民革命军第九军军长，在忻口会战中壮烈殉国，是抗战初期牺牲的第一位军长。', '河北藁藁城'),
(124, '王铭章', '1893-1938', 'https://baike.baidu.com/pic/%E7%8E%8B%E9%93%AD%E7%AB%A0/4144712/1/0824ab18972bd407f486f05171899e510eb309dc?fromModule=lemma_top-image&ct=single#aid=1&pic=0824ab18972bd407f486f05171899e510eb309dc', '国民革命军第122师师长，在台儿庄战役中壮烈牺牲，毛泽东等中共领导人为其题写挽联。', '四川新都'),
(125, '谢晋元', '1905-1941', 'https://baike.baidu.com/pic/%E8%B0%A2%E6%99%8B%E5%85%83/2301679/1/9f2f070828381f30e924fb6617565b086e061c955afe?fromModule=lemma_top-image&ct=single#aid=1&pic=9f2f070828381f30e924fb6617565b086e061c955afe', '国民革命军第88师524团团附，率\'八百壮士\'坚守四行仓库，振奋全国抗战信心。', '广东蕉岭'),
(126, '彭雪枫', '1907-1944', 'https://baike.baidu.com/pic/%E5%BD%AD%E9%9B%AA%E6%9E%AB/2832/1/9358d109b3de9c82cb2746db6f81800a19d84327?fromModule=lemma_top-image&ct=single#aid=1&pic=9358d109b3de9c82cb2746db6f81800a19d84327', '新四军第四师师长兼政委，是抗战中新四军牺牲的最高将领之一。', '河南镇平'),
(127, '狼牙山五壮士', '集体', 'https://baike.baidu.com/pic/%E7%8B%BC%E7%89%99%E5%B1%B1%E4%BA%94%E5%A3%AE%E5%A3%AB/424/1/ca1349540923dd54564ea27e8852a4de9c82d158e228?fromModule=lemma_top-image&ct=single#aid=1&pic=b8389b504fc2d5628535f981b64a87ef76c6a7efc61e', '葛振林、宋学义、胡德林、胡福才、马宝玉五人，为掩护大部队转移，宁死不屈跳下悬崖。', '河北易县'),
(128, '八女投江', '1938', 'https://baike.baidu.com/pic/%E5%85%AB%E5%A5%B3%E6%8A%95%E6%B1%9F/4099/1/0824ab18972bd40735fab6b103c389510fb30f24a36f?fromModule=lemma_top-image&ct=single#aid=1&pic=0824ab18972bd40735fab6b103c389510fb30f24a36f', '冷云、胡秀芝、杨贵珍、郭桂琴、黄桂清、王惠民、李凤善、安顺福八位女战士，为掩护部队突围，集体投江殉国。', '黑龙江林口'),
(129, '吉鸿昌', '1895-1934', 'https://baike.baidu.com/pic/%E5%90%89%E9%B8%BF%E6%98%8C/28366/1/ca1349540923dd5477ffed90d309b3de9d8248bd?fromModule=lemma_top-image&ct=single#aid=1&pic=ca1349540923dd5477ffed90d309b3de9d8248bd', '著名抗日将领，因从事抗日活动被国民党杀害，临刑前写下\'恨不抗日死，留作今日羞\'的绝命诗。', '河南扶沟'),
(130, '高志航', '1907-1937', 'https://baike.baidu.com/pic/%E9%AB%98%E5%BF%97%E8%88%AA/4411029/1/0824ab18972bd40735facd23e6d389510fb30e24a3e1?fromModule=lemma_top-image&ct=single#aid=1&pic=0824ab18972bd40735facd23e6d389510fb30e24a3e1', '中国空军第4航空大队大队长，被誉为\'空军战神\'，在周家口空战中牺牲。', '吉林通化'),
(131, '沈崇诲', '1911-1937', 'https://baike.baidu.com/pic/%E6%B2%88%E5%B4%87%E8%AF%AB/4345032/1/63d9f2d3572c11df5c6ca3ac692762d0f603c284?fromModule=lemma_top-image&ct=single#aid=1&pic=63d9f2d3572c11df5c6ca3ac692762d0f603c284', '中国空军飞行员，在淞淞沪会战中驾机撞向日舰，壮烈殉国。', '江苏南京'),
(132, '阎海文', '1916-1937', 'https://baike.baidu.com/pic/%E9%98%8E%E6%B5%B7%E6%96%87/4282705/1/9f510fb30f2442a766e1d5c9dd43ad4bd01302ea?fromModule=lemma_top-image&ct=single#aid=1&pic=9f510fb30f2442a766e1d5c9dd43ad4bd01302ea', '中国空军飞行员，在淞淞沪会战中被俘后宁死不屈，用最后一颗子弹自尽。', '辽宁北镇'),
(133, '刘粹刚', '1913-1937', 'https://baike.baidu.com/pic/%E5%88%98%E7%B2%B9%E5%88%9A/4346503/1/dbb44aed2e738bd4b31ca1ff73dc90d6277f9f2f53ff?fromModule=lemma_top-image&ct=single#aid=1&pic=dbb44aed2e738bd4b31ca1ff73dc90d6277f9f2f53ff', '中国空军\'四大天王\'之一，击落日机11架，在支援忻口战役时牺牲。', '安徽宿县'),
(134, '陈怀民', '1916-1938', 'https://baike.baidu.com/pic/%E9%99%88%E6%80%80%E6%B0%91/10663892/1/18d8bc3eb13533fa828b65697b84ea1f4134970aed66?fromModule=lemma_top-image&ct=single#aid=1&pic=18d8bc3eb13533fa828b65697b84ea1f4134970aed66', '中国空军飞行员，在武汉空战中与日机相撞，同归于尽。', '江苏镇江'),
(135, '乐以琴', '1914-1937', 'https://baike.baidu.com/pic/%E4%B9%90%E4%BB%A5%E7%90%B4/4409446/1/5882b2b7d0a20cf431ad298a005f5c36acaf2edd3315?fromModule=lemma_top-image&ct=single#aid=1&pic=5882b2b7d0a20cf431ad298a005f5c36acaf2edd3315', '中国空军\'四大天王\'之一，击落日机8架，在南京空战中牺牲。', '四川芦山');

-- --------------------------------------------------------

--
-- 表的结构 `history_timeline`
--

CREATE TABLE `history_timeline` (
  `id` int(11) NOT NULL,
  `event_year` int(11) DEFAULT NULL,
  `event_month_day` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `history_timeline`
--

INSERT INTO `history_timeline` (`id`, `event_year`, `event_month_day`, `title`, `description`, `image`) VALUES
(84, 1931, '09-18', '九一八事变', '日本关东军制造柳条湖事件，进攻沈阳北大营，侵占中国东北', 'https://baike.baidu.com/pic/%E4%B9%9D%C2%B7%E4%B8%80%E5%85%AB%E4%BA%8B%E5%8F%98/2573930/1/2e2eb9389b504fc2d5629201b086f01190ef76c6c726?fromModule=lemma_top-image&ct=single#aid=1&pic=2e2eb9389b504fc2d5629201b086f01190ef76c6c726'),
(85, 1937, '07-07', '七七事变', '卢沟桥事变，全面抗战开始', 'https://baike.baidu.com/pic/%E4%B8%83%E4%B8%83%E4%BA%8B%E5%8F%98/13716/1/b3b7d0a20cf431ad12e0fdd54536acaf2edd9828?fromModule=lemma_top-image&ct=single#aid=1&pic=b3b7d0a20cf431ad12e0fdd54536acaf2edd9828'),
(86, 1937, '08-13', '淞淞沪会战', '中国军队在上海与日军激战三个月', 'https://baike.baidu.com/pic/%E6%B7%9E%E6%B2%AA%E4%BC%9A%E6%88%98/13407/1/50da81cb39dbb6fd85d6d0de0d24ab18962b37bc?fromModule=lemma_top-image&ct=single#aid=1&pic=50da81cb39dbb6fd85d6d0de0d24ab18962b37bc'),
(87, 1937, '12-13', '南京大屠杀', '日军攻陷南京，制造惨绝人寰的大屠杀', 'https://baike.baidu.com/pic/%E5%8D%97%E4%BA%AC%E5%A4%A7%E5%B1%A0%E6%9D%80/26188/1/d53f8794a4c27d1ed21b4066708cba6eddc451da9242?fromModule=lemma_top-image&ct=single#aid=1&pic=024f78f0f736afc379317ed4d840fcc4b74543a9b473'),
(88, 1938, '03-16', '台儿庄战役', '中国军队取得台儿庄大捷', 'https://baike.baidu.com/pic/%E5%8F%B0%E5%84%BF%E5%BA%84%E5%A4%A7%E6%8D%B7/1558905/1/cb8065380cd7912397dd70ef2d784e82b2b7d0a22a51?fromModule=lemma_top-image&ct=single#aid=1&pic=cb8065380cd7912397dd70ef2d784e82b2b7d0a22a51'),
(89, 1940, '08-20', '百团大战', '八路军在华北发动大规模破袭战', 'https://baike.baidu.com/pic/%E7%99%BE%E5%9B%A2%E5%A4%A7%E6%88%98/13411/1/d1a20cf431adcbef8e092458a0af2edda3cc9fab?fromModule=lemma_top-image&ct=single#aid=1&pic=d1a20cf431adcbef8e092458a0af2edda3cc9fab'),
(90, 1945, '08-15', '日本投降', '日本宣布无条件投降', 'https://baike.baidu.com/pic/%E7%99%BE%E5%9B%A2%E5%A4%A7%E6%88%98/13411/1/d1a20cf431adcbef8e092458a0af2edda3cc9fab?fromModule=lemma_top-image&ct=single#aid=1&pic=d1a20cf431adcbef8e092458a0af2edda3cc9fab'),
(91, 1945, '09-02', '正式签署投降书', '日本在东京湾密苏里号上正式投降', 'https://baike.baidu.com/pic/%E6%97%A5%E6%9C%AC%E6%97%A0%E6%9D%A1%E4%BB%B6%E6%8A%95%E9%99%8D%E6%97%A5/10756654/1/a08b87d6277f9e2fe0820ad41130e924b999f3b3?fromModule=lemma_top-image&ct=single#aid=1&pic=a08b87d6277f9e2fe0820ad41130e924b999f3b3'),
(92, 1945, '09-09', '中国战区受降', '中国战区受降仪式在南京举行', 'https://baike.baidu.com/pic/1945%E5%B9%B49%E6%9C%882%E6%97%A5/14447643/1/11385343fbf2b2114faa36a5c88065380dd78e51?fromModule=lemma_top-image&ct=single#aid=1&pic=11385343fbf2b2114faa36a5c88065380dd78e51');

-- --------------------------------------------------------

--
-- 表的结构 `war_map_location`
--

CREATE TABLE `war_map_location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `battle_name` varchar(255) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `intro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `war_map_location`
--

INSERT INTO `war_map_location` (`id`, `name`, `battle_name`, `longitude`, `latitude`, `intro`) VALUES
(144, '卢沟桥', '七七事变', '116.21', '39.843', '1937年7月7日，日军在此制造卢沟桥事变，全面抗战爆发。'),
(145, '平型关', '平型关大捷', '114.233', '39.317', '1937年9月25日，八路军115师在此伏击日军，取得全面抗战以来首次大捷。'),
(146, '四行仓库', '淞淞沪会战', '121.475', '31.242', '1937年10月26日至11月1日，谢晋元率八百壮士在此坚守，振奋全国抗战信心。'),
(147, '台儿庄', '台儿庄大捷', '117.33', '34.567', '1938年3月至4月，中国军队在此歼灭日军万余人，取得抗战以来最大胜利。'),
(148, '南京', '南京保卫战', '118.742', '32.035', '1937年12月，日军攻陷南京，制造了震惊中外的南京大屠杀。'),
(149, '武汉', '武汉会战', '114.305', '30.593', '1938年6月至10月，抗日战争中规模最大的战役。'),
(150, '长沙', '长沙会战', '112.938', '28.228', '1939年至1942年，三次长沙会战沉重打击了日军。'),
(151, '昆仑关', '昆仑关战役', '108.63', '22.87', '1939年12月，中国军队在此重创日军第5师团。'),
(152, '百团大战遗址', '百团大战', '113.57', '37.868', '1940年8月至12月，八路军在华北发动大规模破袭战。'),
(153, '滇缅公路', '滇缅抗战', '98.065', '24.085', '抗战时期的国际援华通道，中国远征军在此与日军血战。'),
(154, '淞淞沪战场', '淞淞沪会战', '121.45', '31.25', '1937年8月13日至11月12日，抗日战争中第一场大型会战。'),
(155, '娘子关', '娘子关战役', '113.783', '37.95', '1937年10月，中国军队在此阻击日军进攻山西。'),
(156, '忻口', '忻口会战', '112.733', '38.4', '1937年10月，抗日战争初期华北战场规模最大、战斗最激烈的战役。'),
(157, '阳明堡', '阳明堡战斗', '112.817', '38.367', '1937年10月19日，八路军129师769团夜袭日军机场，摧毁敌机24架。'),
(158, '万家岭', '万家岭大捷', '115.917', '29.283', '1938年9月至10月，中国军队在江西德安歼灭日军第106师团大部。'),
(159, '上高', '上高会战', '114.913', '28.244', '1941年3月，中国军队在江西上高重创日军。'),
(160, '常德', '常德会战', '111.698', '29.032', '1943年11月至12月，中国军队在湖南常德与日军血战。'),
(161, '衡阳', '衡阳保卫战', '112.617', '26.9', '1944年6月至8月，方先觉率第10军孤军坚守衡阳47天。'),
(162, '腾冲', '滇西反攻', '98.497', '25.03', '1944年5月至9月，中国远征军经过血战收复腾冲。'),
(163, '松山', '松山战役', '98.733', '24.817', '1944年6月至9月，中国远征军经过血战攻克松山。');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `source_url` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `cover_image`, `content`, `author`, `publish_date`, `source_url`, `status`) VALUES
(214, '美国国家二战博物馆的美国视角与中国抗战叙事', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华每日电讯', '2025-12-11 23:33:39', 'https://www.news.cn/politics/20250912/a74eaa54e9d64b649dd0d7a938672866/c.html', 1),
(215, '伟力·文化抗战丨第三集 铮舞', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社', '2025-12-11 23:33:40', 'https://www.news.cn/20251211/ae5a6761a68549d3adf50bf2746413d2/c.html', 1),
(216, '重访抗战地标｜云南畹畹町·筑就"抗战生命线"', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:42', 'https://www.news.cn/video/20250911/694ed5a3d2b043bc80aa6e8955a1147d/c.html', 1),
(217, '丰碑·伟大抗战精神丨第一集 家国', 'http://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社解放军分社', '2025-12-11 23:33:43', 'http://www.news.cn/20251204/74b89d08a5024e1f97cbb92165750861/c.html', 1),
(218, '重访抗战地标｜云南松山·中国远征军的血战', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:44', 'https://www.news.cn/video/20250910/619d3fcdb8f04e059b279adfbb4a42e9/c.html', 1),
(219, '重访抗战地标 | 英雄左权·家书抵万金', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:45', 'https://www.news.cn/politics/20250709/d96b5798ce2c4a73984d9e51b6d2417c/c.html', 1),
(220, '纪念抗战胜利80周年丨纪念中国人民抗日战争暨世界反法西斯战争胜利80周年文艺晚会在京举行', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华网', '2025-09-04 00:00:00', 'https://www.news.cn/photo/20250904/ca7cfeb13a304cdc89d73ca3d57b9853/c.html', 1),
(221, '海外人士谈抗战｜专访："保护历史记忆是我们这一代无法推卸的责任"——访拉贝曾外孙赖因哈特', 'http://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:49', 'http://www.news.cn/20250912/eac71e74129c407f81e221214c80f88a/c.html', 1),
(222, '纪念抗战胜利80周年丨纪念中国人民抗日战争暨世界反法西斯战争胜利80周年大会在京举行（四）', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华网', '2025-09-03 00:00:00', 'https://www.news.cn/photo/20250903/01bd5fbb96e14e3a861d1843c078cce8/c.html?page=12', 1),
(223, '纪念中国人民抗日战争暨世界反法西斯战争胜利80周年招待会在京隆重举行', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华网', '2025-09-03 00:00:00', 'https://www.news.cn/politics/leaders/20250903/c13ca6bee464410695e47b0fb1e96b8a/c.html', 1),
(224, '重访抗战地标丨宝塔山下·胜利的指引', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:53', 'https://www.news.cn/politics/20250728/c34bffa9f96a44a0bc1e38a6db04c149/c.html', 1),
(225, '丰碑·伟大抗战精神丨第三集 血战', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社', '2025-12-11 23:33:54', 'https://www.news.cn/20251206/b8d743850d6643e89745828092b07e42/c.html', 1),
(226, '丰碑·伟大抗战精神丨第一集 家国', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社解放军分社', '2025-12-11 23:33:55', 'https://www.news.cn/20251204/74b89d08a5024e1f97cbb92165750861/c.html', 1),
(227, '英雄赵一曼的牵挂', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:56', 'https://www.news.cn/politics/20250707/478f265a9faf4502a9f505e6be15e97c/c.html', 1),
(228, '重访抗战地标丨白洋淀·"水上奇兵"雁翎队', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:57', 'https://www.news.cn/video/20250806/f34d8a21ce5b473dac7880289d203100/c.html', 1),
(229, '重访抗战地标丨地道战·埋伏下神兵千百万', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:33:59', 'https://www.news.cn/video/20250730/52dfee01ab104deeb6a2f27c02893130/c.html', 1),
(230, '新华社出图 | 带你看胜利日大阅兵这一天！', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华社', '2025-09-03 00:00:00', 'http://www.news.cn/20250903/35cd01dad2054d2fb1f613e2c92d8e21/c.html', 1),
(231, '我们的5098——八路军黄土岭之战取得重大胜利', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:01', 'https://www.news.cn/20251107/ff5413d901b74becb1d2710774bf6a5c/c.html', 1),
(232, '回溯历史，凝聚共识——"全球视野下的中国抗战"国际学术研讨会综述', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:03', 'https://www.news.cn/20251104/a35ec7cd069f43e888607ddaea6dd5bf/c.html', 1),
(233, '重访抗战地标丨南泥湾·自己动手 丰衣足食', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:04', 'https://www.news.cn/politics/20250725/7a97f282be5c476f851f63d950dc67f2/c.html', 1),
(234, '东北抗联：用生命作答', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:05', 'https://www.news.cn/politics/20250704/1ea0a5370ed84ad5bfb419a85a12f195/c.html', 1),
(235, '重访抗战地标 | 江苏刘老庄·松柏无言守忠魂', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:06', 'https://www.news.cn/politics/20250829/cae977083625403fb5bebd665112ecca/c.html', 1),
(236, '重访抗战地标｜重庆万州·跨越山海的国际情谊', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:08', 'https://www.news.cn/video/20250913/58924df52a7a49c88c5ddff1571580fd/c.html', 1),
(237, '伟力·文化抗战丨第一集 光芒', 'http://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社', '2025-12-11 23:34:09', 'http://www.news.cn/20251209/881ce3c0a1c945f0ae765d9d84b6c7b1/c.html', 1),
(238, '我们的5098——你从未远去的每一天（第7期）', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社', '2025-12-11 23:34:10', 'https://www.news.cn/20251104/e0da80f421374094b374599da51543cd/c.html', 1),
(239, '我们的5098——82年前的今天华南抗战主力东江纵队成立', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社', '2025-12-11 23:34:11', 'https://www.news.cn/20251202/8946f174cce841b0967948ecdf00747a/c.html', 1),
(240, '影像故事汇丨尺素渡海 家国同心——抗日家书里的光复记忆', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社', '2025-12-11 23:34:13', 'https://www.news.cn/20251023/4803c6a27e6c458fad524cb7f5cd11b6/c.html', 1),
(241, '"全球视野下的中国抗战"国际学术研讨会在京开幕', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:14', 'https://www.news.cn/20251102/57ca69de22fc4e7388363a97774470e4/c.html', 1),
(242, '纪念中国人民抗日战争暨世界反法西斯战争胜利80周年文艺晚会《正义必胜》在京隆重举行', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华网', '2025-09-04 00:00:00', 'https://www.news.cn/politics/leaders/20250904/181ff7670433407e8267486e75b7a616/c.html', 1),
(243, '国家摄影队的"九三时间"', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华社', '2025-09-05 00:00:00', 'http://www.news.cn/20250905/d59ac8aad1654b53804bdb54bcb90b3a/c.html', 1),
(244, '纪念中国人民抗日战争暨世界反法西斯战争胜利80周年大会在京隆重举行', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华网', '2025-09-03 00:00:00', 'https://www.news.cn/politics/leaders/20250903/56f93eae29624332af9023d336088c88/c.html', 1),
(245, '这些档案里的抗战家书，藏着那些年最有力的文字', 'http://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华社', '2025-12-11 23:34:19', 'http://www.news.cn/20250918/484b8434ec1a45b1839dda08ca00a420/c.html', 1),
(246, '纪念抗战胜利80周年丨听，胜利之声', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华社', '2025-09-05 00:00:00', 'https://www.news.cn/politics/20250905/be595a62f6b34e1697c86a5d62e63dc3/c.html', 1),
(247, '重访抗战地标 | 平型关·威名天下扬', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:21', 'https://www.news.cn/politics/20250714/9c78f9e6ee734bf6a3096398e0911919/c.html', 1),
(248, '专题', 'https://my-h5news.app.xinhuanet.com/h5/images/icon-back-xkt.png', '<p></p>', '新华网', '2025-12-11 23:34:22', 'https://my-h5news.app.xinhuanet.com/h5/specialTopic/index.html?articleId=2dba280df7da4ba2b3aa11de4a92a35f&', 1),
(249, '重访抗战地标 | 鲁南·铁道上的"抗日尖刀"', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:23', 'https://www.news.cn/politics/20250822/9f529bc7060f459fa085073725c8b903/c.html', 1),
(250, '重访抗战地标丨黄土岭·神炮伏击震寇胆', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:25', 'https://www.news.cn/video/20250801/d65dc11a14f942c695d2174bd8ee72d6/c.html', 1),
(251, '第一观察丨胜利纪念日外交，向世界传递信心和力量', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华社', '2025-09-09 00:00:00', 'https://www.news.cn/politics/leaders/20250909/000a64bd7e2546af9a3d1ae55aeeaa8f/c.html', 1),
(252, '重访抗战地标丨威震东江·秘密大营救', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:27', 'https://www.news.cn/politics/20250912/a3a938ace9964315800c94d52e99555e/c.html', 1),
(253, '重访抗战地标｜上海·"八百壮士"守四行', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:29', 'https://www.news.cn/video/20250816/ccc26efdb9214b019f2063bb78eefc6c/c.html', 1),
(254, '重访抗战地标丨湖北宜城·我以我血荐轩辕', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:30', 'https://www.news.cn/video/20250825/28d1d3c76d4546ca88b9e74e2ba9acd6/c.html', 1),
(255, '重访抗战地标 | 太行山上·总部的红星杨', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:31', 'https://www.news.cn/politics/20250716/be77b4af82674ad7b9ec44dcaf3467e0/c.html', 1),
(256, '中国举行盛大阅兵纪念抗战胜利80周年', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华网', '2025-09-03 00:00:00', 'https://www.news.cn/politics/20250903/2f8dc0066b9645ccace7411888ab56fd/c.html', 1),
(257, '重访抗战地标 | 沂蒙山·铸就铜墙铁壁', 'https://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:33', 'https://www.news.cn/politics/20250820/dea98b3dbaa0445ebcdbdf50ff6fef16/c.html', 1),
(258, '独家！国社带你特殊视角感受阅兵震撼现场', 'http://www.news.cn/zt/jnkzsl80zn/images/20250818ffxs80zn_mobBanner_v1.jpg', '<p></p>', '来源：新华社', '2025-09-03 00:00:00', 'https://www.news.cn/politics/20250903/0c0d39c1ece7463a8043cfd0fb29c392/c.html', 1),
(259, '中国公众在抗战起点撞钟鸣警祈愿和平', 'http://www.news.cn/detail2020/images/ewm.png', '<p></p>', '来源：新华网', '2025-12-11 23:34:36', 'http://www.news.cn/20250918/403c4f2d67ca467bba422fc88e9f8097/c.html', 1);

--
-- 转储表的索引
--

--
-- 表的索引 `hero_person`
--
ALTER TABLE `hero_person`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `history_timeline`
--
ALTER TABLE `history_timeline`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `war_map_location`
--
ALTER TABLE `war_map_location`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `hero_person`
--
ALTER TABLE `hero_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- 使用表AUTO_INCREMENT `history_timeline`
--
ALTER TABLE `history_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- 使用表AUTO_INCREMENT `war_map_location`
--
ALTER TABLE `war_map_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
