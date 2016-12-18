-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-15 13:57:45
-- 服务器版本： 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seasonal_life`
--

-- --------------------------------------------------------

--
-- 表的结构 `slsh_address`
--

CREATE TABLE `slsh_address` (
  `slsh_addressid` int(11) NOT NULL,
  `slsh_thegood_name` varchar(50) NOT NULL COMMENT '收货人',
  `slsh_detailed_address` varchar(150) NOT NULL COMMENT '收货人详细地址',
  `slsh_phone` varchar(11) NOT NULL COMMENT '手机号',
  `slsh_postcode` int(11) NOT NULL COMMENT '邮编',
  `slsh_default` int(5) NOT NULL DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `slsh_address`
--

INSERT INTO `slsh_address` (`slsh_addressid`, `slsh_thegood_name`, `slsh_detailed_address`, `slsh_phone`, `slsh_postcode`, `slsh_default`, `slsh_userid`) VALUES
(1, '张泽平', '北京市海淀区西三旗', '18801084842', 100000, 0, 7),
(6, 'zzp', 'ytghoiuy', '34567', 234, 0, 7),
(7, 'ewq', 'wewq', '123', 213, 0, 7),
(8, 'song', 'tianfenli', '13355277889', 5433, 0, 7),
(9, '其实我的', '是的撒', '123213', 213, 0, 9),
(11, 'zzp', 'sdefdfds', '13218497321', 100000, 1, 19),
(12, 'qwe', 'ewfdscdsf', '3453343', 132432, 0, 19);

-- --------------------------------------------------------

--
-- 表的结构 `slsh_bigplate`
--

CREATE TABLE `slsh_bigplate` (
  `slsh_bid` int(11) NOT NULL,
  `slsh_bname` varchar(50) NOT NULL COMMENT '版块名字'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='大板块';

-- --------------------------------------------------------

--
-- 表的结构 `slsh_comment`
--

CREATE TABLE `slsh_comment` (
  `slsh_cid` int(11) NOT NULL,
  `slsh_content` varchar(200) NOT NULL COMMENT '评论内容',
  `slsh_picture` varchar(255) DEFAULT NULL COMMENT AS `评论照片`,
  `slsh_comment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT AS `评论时间`,
  `slsh_comment_goodid` int(11) NOT NULL COMMENT '关联物品表',
  `slsh_comment_uid` int(11) NOT NULL COMMENT '关联用户表',
  `slsh_itemsid` int(11) DEFAULT NULL COMMENT AS `关联第三方物品`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论';

--
-- 转存表中的数据 `slsh_comment`
--

INSERT INTO `slsh_comment` (`slsh_cid`, `slsh_content`, `slsh_picture`, `slsh_comment_time`, `slsh_comment_goodid`, `slsh_comment_uid`, `slsh_itemsid`) VALUES
(10, '斯蒂芬斯蒂芬收水电费', NULL, '2016-12-15 15:47:04', 85, 75, NULL),
(9, '盛大飒飒方法倒萨', NULL, '2016-12-15 15:46:17', 96, 75, NULL),
(8, '爱上大声地', NULL, '2016-12-15 15:46:07', 85, 75, NULL),
(11, '撒旦', NULL, '2016-12-15 20:11:51', 74, 19, NULL),
(12, '撒旦', NULL, '2016-12-15 20:12:03', 74, 19, NULL),
(13, 'DSA', NULL, '2016-12-15 20:14:14', 74, 19, NULL),
(14, 'sad ', '/static/goodimg/20161215/2288dcb9dad492ee22088244c266bba7.png', '2016-12-15 20:18:51', 74, 19, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `slsh_goods`
--

CREATE TABLE `slsh_goods` (
  `slsh_goodid` int(11) NOT NULL,
  `slsh_goodname` varchar(255) NOT NULL COMMENT '商品名称',
  `slsh_goodprice` decimal(50,0) NOT NULL COMMENT '商品价格',
  `slsh_spec` varchar(255) NOT NULL COMMENT '商品规格',
  `slsh_discount` decimal(50,0) DEFAULT NULL COMMENT AS `商品折扣价格`,
  `slsh_category` varchar(50) NOT NULL COMMENT '商品品类',
  `slsh_orign` varchar(255) NOT NULL COMMENT '商品产地',
  `slsh_picture` varchar(255) DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品照片',
  `slsh_picture1` varchar(255) DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品照片',
  `slsh_picture2` varchar(255) DEFAULT NULL COMMENT AS `商品照片`,
  `slsh_picture3` varchar(255) DEFAULT NULL COMMENT AS `商品照片`,
  `slsh_photo` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '详情照片',
  `slsh_photo1` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '详情照片',
  `slsh_photo2` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '详情照片',
  `slsh_photo3` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '详情照片',
  `slsh_shelf` int(3) NOT NULL DEFAULT '1' COMMENT '商品上架为1下架为0折扣2',
  `slsh_show` int(11) NOT NULL DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `slsh_goods`
--

INSERT INTO `slsh_goods` (`slsh_goodid`, `slsh_goodname`, `slsh_goodprice`, `slsh_spec`, `slsh_discount`, `slsh_category`, `slsh_orign`, `slsh_picture`, `slsh_picture1`, `slsh_picture2`, `slsh_picture3`, `slsh_photo`, `slsh_photo1`, `slsh_photo2`, `slsh_photo3`, `slsh_shelf`, `slsh_show`) VALUES
(68, '新疆库尔勒香梨', '30', '5斤', '22', '13', '新疆库尔勒', '/static/goodimg/20161210/83c5594bf94a33dbd8368a27fcb704b4.jpg', '/static/goodimg/20161210/8b447be34744a2d78fb2b8dda7b8e14b.jpg', '/static/goodimg/20161210/3bcd4e3c70befc2d566f189f20f0b09a.jpg', '/static/goodimg/20161210/ecca040da96f37a1bc166176f0cd21f8.png', '/static/goodimg/20161210/f512151904adbee8e842ed982b8e3e1b.png', '/static/goodimg/20161210/2ef3b4cf0c931ec4afbe9ab4873ed0f7.png', '/static/goodimg/20161210/65929d682edae53dc190de5fc2092b20.png', '/static/Reception/Picture/default.png', 1, 0),
(69, '美国西洋梨（绿安琪）', '49', '6个', NULL, '13', '美国', '/static/goodimg/20161210/d456f6d47c41232bfba8e4640a8d095d.jpg', '/static/goodimg/20161210/a6f1369120f7b66eab2d07ca0d174bb1.jpg', '/static/goodimg/20161210/64a400c883fb3d2c24aede2bae427094.jpg', '/static/goodimg/20161210/ff10127a72a096f81d93e8fe36dfdb93.png', '/static/goodimg/20161210/28878dffa0a66926b90fe88efb4abb27.png', '/static/goodimg/20161210/ec49bed94bd2c9e91e409ea10bba0b8a.png', '/static/goodimg/20161210/b81c648f51ee1a12240ff5fcbdbe491d.png', '/static/goodimg/20161210/28fc227c7f109e5c4dd223a72cd8b6c0.png', 0, 0),
(70, '新疆雪梨', '39', '4斤', NULL, '13', '新疆', '/static/goodimg/20161210/6a579fa5da0129365c606de6dfa64a69.jpg', '/static/goodimg/20161210/5e4a60219daa6189687a56c2dde7a607.jpg', '/static/goodimg/20161210/61ed1c2875aae4dd05bbcc9da3840d82.jpg', '/static/goodimg/20161210/d06129c97a3dc9cd5f07aa74b82eefed.png', '/static/goodimg/20161210/48d548608b86327b1b5070715e81be4a.png', '/static/goodimg/20161210/5d0a2e54f161ee1d87e8ac75e29e7679.png', '/static/goodimg/20161210/b11145548018fdf6c73164b7225562da.png', '/static/Reception/Picture/default.png', 0, 1),
(71, '美国西洋梨（红安琪）', '58', '5个', '55', '13', '美国', '/static/goodimg/20161210/ff1ab477ca16592d0f3f112922a058f4.jpg', '/static/goodimg/20161210/25315adcf939127a992b040adbe356c6.jpg', '/static/goodimg/20161210/6d9d1d1673f2fedc7d3176dae2051cb1.jpg', '/static/goodimg/20161210/39bc24e99f1c9bf9abd6c3c5c79b14f6.png', '/static/goodimg/20161210/fadc18592d4f8802ca7f494a4941d03a.png', '/static/goodimg/20161210/b2e791971444006dc932601c173e96dd.png', '/static/goodimg/20161210/5e3a5f09322d8899d960372201d206e9.png', '/static/goodimg/20161210/6da7c8c249afed58edb0f11f56315d7e.png', 2, 1),
(72, '隰县玉露香梨', '50', '3斤', NULL, '13', '中国隰县', '/static/goodimg/20161210/b0ce9dc12865f768d292437e5c7674ea.jpg', '/static/goodimg/20161210/6be320967c27cf782683903d9936eb50.jpg', '/static/goodimg/20161210/6f55fafd74f4b43d2fae0d0a26d53d71.jpg', '/static/goodimg/20161210/3422d9cdd42e93a0fe804733eecde589.png', '/static/goodimg/20161210/b7c03dfed0b30fef92f12a1bc4993cb1.png', '/static/goodimg/20161210/99a9fed52626bff3e4ce6ecef736e3d5.png', '/static/goodimg/20161210/fef9f0cf5ba0a3dfc9a0ddf24f48d398.png', '/static/goodimg/20161210/c5641f2b8afc4415a568d17be831ab18.png', 1, 0),
(73, ' 精选闻京梨', '40', '3个', '35', '13', '韩国', '/static/goodimg/20161210/57256b182bca146a7088a81831341074.jpg', '/static/goodimg/20161210/c86672e7b73d37d6408d1a4977b85985.jpg', '/static/goodimg/20161210/6bcb81b77ef134567954617f176669ae.jpg', '/static/goodimg/20161210/d3d5714d2f8ce07372fb96c2aa1ec262.png', '/static/goodimg/20161210/1e2f393e630e58c263c445625c2320c4.png', '/static/goodimg/20161210/2f771b745a6b88b58acfaf9df6d517fd.png', '/static/goodimg/20161210/6c03be21ea1e8752ab0187f651f647ae.png', '/static/Reception/Picture/default.png', 2, 0),
(74, '智利甜心樱桃 J', '148', '2斤', NULL, '61', '智利', '/static/goodimg/20161210/29f0aba112fdd0a182a5c1cacaafae4b.jpg', '/static/goodimg/20161210/6c3c8febd9f5894eb5119123ae540823.jpg', '/static/goodimg/20161210/f4f5b8230d6cbb150c08573c883b98b3.jpg', '/static/goodimg/20161210/6cd9f7359d7e91c67c9c19c866e47a3c.jpg', '/static/goodimg/20161210/97605186bd698048c098eace8ed6a6b5.png', '/static/goodimg/20161210/d44a0ebcd9e60d5c9579378b79d7136d.png', '/static/goodimg/20161210/7f4247ddaaf1091f341078b93120962e.png', '/static/goodimg/20161210/9a700c63c184d0cae6024ee8214122b3.png', 1, 1),
(75, '智利樱桃双子星组合', '228', '1斤+1斤', NULL, '61', '智利', '/static/goodimg/20161210/881a56f85e43cd649382fd150cf82980.jpg', '/static/goodimg/20161210/068fc973963f1cd806d1bb5e11c6fba3.jpg', '/static/goodimg/20161210/91f366b7ee5495018a957b02f5b9cfcd.jpg', '/static/goodimg/20161210/c0445f72d0294204bfb44103f6a74cd8.png', '/static/goodimg/20161210/7f6e8030f62b4503cd4fff856a175643.png', '/static/goodimg/20161210/eba1651b6ec8c86ce09b3f65158cc4e2.png', '/static/goodimg/20161210/1e4ffc3664896a6dd30d0fa876264e4c.png', '/static/Reception/Picture/default.png', 1, 0),
(76, ' 大个智利蕾妮樱桃 JJ', '148', '1斤', NULL, '61', '智利', '/static/goodimg/20161210/106e898a2ae120492b2395faf910ab91.jpg', '/static/goodimg/20161210/181b8b2d4664c6893cf6c68368e18faf.jpg', '/static/goodimg/20161210/0044161d91df5e22018ff5ea96db15dc.jpg', '/static/goodimg/20161210/c0368c5bbdf5422cb996505f4d8442f0.jpg', '/static/goodimg/20161210/353c7eb6b59d600fbae2e8fd4a94af86.png', '/static/goodimg/20161210/ce38fca97a6400bfc1871c5aa9d4553f.png', '/static/goodimg/20161210/e18189eaadf1d2c499fa803bc8caac02.png', '/static/goodimg/20161210/37ed7700614d051b1403d5e8113730fd.png', 1, 1),
(77, '超大智利甜心樱桃 JJJ', '118', '1斤', NULL, '61', '智利', '/static/goodimg/20161210/c4d12fd6fe81d25111cbf28a95d82869.jpg', '/static/goodimg/20161210/de6e4ea36c6dc4cb6eb8e7534553d953.jpg', '/static/goodimg/20161210/9713532404ac53ebb7ba26f7489c4ba0.png', '/static/goodimg/20161210/d5aa9870222ec3466e1f4e9715e4e281.jpg', '/static/goodimg/20161210/ee46aed19333456a96df40093ee52dec.png', '/static/goodimg/20161210/4bad2559a5b9326f7ac6d63ae99ca727.png', '/static/goodimg/20161210/faa6709c616145b2ee9bb258abbc46b0.png', '/static/goodimg/20161210/44823e0fbf2c3216169e4ea3ea5bfa63.png', 1, 1),
(78, '马来西亚冷冻榴莲金凤', '358', '400g', '0', '5', '马来西亚', '/static/goodimg/20161210/7c1b6746338a7d781473893b4c2f016c.jpg', '/static/goodimg/20161210/666ad1733d3e010a73a0d2ffa30fba7e.jpg', '/static/goodimg/20161210/3a7a5d22d8cbfb2631c0978261ba8228.jpg', '/static/goodimg/20161210/c7877c3218823da29bcc3fe8bf7705a0.jpg', '/static/goodimg/20161210/e5eb13c100a612c04bac9705df39cfd9.png', '/static/goodimg/20161210/edef1dac929defca59cbfc3cd75a5bed.png', '/static/goodimg/20161210/af8d99a96361d117d5b1cbca09b6f271.png', '/static/goodimg/20161210/5412b48fa2391cdf47c9dd6c4a6f0e3e.png', 1, 0),
(79, '马来西亚冷冻榴莲红虾', '338', '400g', '0', '5', '马来西亚', '/static/goodimg/20161210/627cd6dc8ff23d9c4fe0306e34ee7b28.jpg', '/static/goodimg/20161210/2c15bbff655d9d0916508b3ed2aa68a7.jpg', '/static/goodimg/20161210/0f551bd8a436e403d2d38b3c016d1481.jpg', '/static/goodimg/20161210/f67ef28f155a1d75856ba6c06deb5096.jpg', '/static/goodimg/20161210/205b66adea5d22ef581d8df048e95393.png', '/static/goodimg/20161210/fa63e7872e94572a2f2e52bb301e90e4.png', '/static/goodimg/20161210/f52589e8d8ed46fa6482933f4b96705f.png', '/static/goodimg/20161210/3fc0b54a59cfb85e2ca9ad59f6607acb.png', 1, 0),
(80, ' 马来西亚冷冻榴莲苏丹王', '99', '400g', '0', '5', '马来西亚', '/static/goodimg/20161210/1897ec4f786ab972b298f006273f2a1d.jpg', '/static/goodimg/20161210/986be4da41528c10d19a99ed25f2e3e2.jpg', '/static/goodimg/20161210/167e43935a07c1edff9f9ecf932504d4.jpg', '/static/goodimg/20161210/1f8c032fbf97303a8c31e69d555108be.jpg', '/static/goodimg/20161210/727974f277ebcb82244cdb2d1974b3a4.png', '/static/goodimg/20161210/7fbf02235dda78772f619e2f234ec35e.png', '/static/goodimg/20161210/e65c25ffa2dd3a9a635d08499a7b031c.png', '/static/goodimg/20161210/772f5986a4ffa3bd76017be68e7cf65f.png', 1, 0),
(81, '马来西亚冷冻榴莲猫山王', '198', '400g', '0', '5', '马来西亚', '/static/goodimg/20161210/57efa894786bbfee2a9b3ae6394cfc4f.jpg', '/static/goodimg/20161210/866ee42c1f8a9ef741c8a6257c6c6b15.jpg', '/static/goodimg/20161210/f2753f4eb75af8ca45b0295fcf04f023.jpg', '/static/goodimg/20161210/081c4684881253b3a4467e325148e02d.jpg', '/static/goodimg/20161210/c5230a898ab1924b9b9552b9c6bfa048.png', '/static/goodimg/20161210/d301d092a86d0f8b692682ea778efd06.png', '/static/goodimg/20161210/7d005d3c5a3d8b99b9932b9ad98327f2.png', '/static/goodimg/20161210/428606dcc8d3a87cba80eaa37a8730e9.png', 1, 0),
(82, '阳光小番茄', '20', '800g', NULL, '20', '中国海南', '/static/goodimg/20161210/d042d75a741040598efbf5f2ce487520.jpg', '/static/goodimg/20161210/78b2f4ce903e72d60a8d8b825cc42819.jpg', '/static/goodimg/20161210/102fdb72d486b9b6f3b51f626a6940a8.jpg', '/static/goodimg/20161210/af501d1609cbca5a197560728971887e.png', '/static/goodimg/20161210/8a73a6d8a4cb283dfdfcddff78c37ba7.png', '/static/goodimg/20161210/476796dfc45f03989f1d1028ad152732.png', '/static/goodimg/20161210/9b5a3c408f9a461a3f5cc46d78884670.png', '/static/goodimg/20161210/5f9f7021933c3b571257959e8f881b03.png', 1, 1),
(83, '佳沛新西兰绿奇异果', '118', '36个', NULL, '7', '新西兰', '/static/goodimg/20161210/f665fb5091a14e5547eafb6b1cef766a.jpg', '/static/goodimg/20161210/4c0cac7818caa5c6f6da47d9208f5bd2.jpg', '/static/goodimg/20161210/8d4067ec77684c3280ecdc15b6c84399.jpg', '/static/goodimg/20161210/42592c0b2be7f3cbc5376bad2b23429e.jpg', '/static/goodimg/20161210/3defe859ad6e9b64a085683e46295623.png', '/static/goodimg/20161210/05c4db28ea43fa08ce33790f3daeb5e7.png', '/static/goodimg/20161210/25c1d947cd6f1fbed8ef55ea41c79bf3.png', '/static/goodimg/20161210/b42cbd7db48a5943d4789bf2ec566d08.png', 1, 0),
(84, '佳沛新西兰阳光金奇异果', '99', '6个', '0', '7', '新西兰', '/static/goodimg/20161210/59053bed39f1b20f124e134cd744a783.jpg', '/static/goodimg/20161210/cccdc504417e1887698117d8c66b829d.jpg', '/static/goodimg/20161210/7e587d311652b92b5ef87594a18e534b.jpg', '/static/goodimg/20161210/f24919769a047f2cd31dd59eafafb5af.jpg', '/static/goodimg/20161210/d147afa410eaab3564b08e2a5239c38d.png', '/static/goodimg/20161210/7c8bc331ecea091cdbd7aba9af0b2c3a.png', '/static/goodimg/20161210/13460bc9df673433e0b1afa2e6124105.png', '/static/goodimg/20161210/5b06b4283888ecd2eeaeee278b03c12b.png', 1, 0),
(85, '智利蓝莓', '78', '2+2盒/每盒125g', NULL, '8', '智利', '/static/goodimg/20161210/68be8c8bcf713031d1f1d7c5a106d72b.jpg', '/static/goodimg/20161210/a52ab86183d97fabe9ab0f2f7ec6db4e.jpg', '/static/goodimg/20161210/823b3834423d092bf4d0360e6f12f559.jpg', '/static/goodimg/20161210/7a01820995f93a59a0c6e1fa40df0fdc.jpg', '/static/goodimg/20161210/89dfb86216c025641d5dc79b85716896.png', '/static/goodimg/20161210/e079358cb8355574c939cfad6b77d62a.png', '/static/goodimg/20161210/c5f156db72d849ca2e0d39c2393e089f.png', '/static/goodimg/20161210/49f61b5ad38743e053b10a3faa09771f.png', 1, 1),
(86, '美国华盛顿甜脆红地厘蛇果', '50', '6个', NULL, '9', '美国', '/static/goodimg/20161210/18bc67249d82a0ba964cdf6342acbb64.jpg', '/static/goodimg/20161210/77752f83a2dd11014915ac6f4e0c1c1b.jpg', '/static/goodimg/20161210/ad60eb26c23c56c415c6604721d20913.jpg', '/static/goodimg/20161210/aa191a4af8c945dea374eab335ed6f9f.png', '/static/goodimg/20161210/e930d3642eb4850d414587c333a50763.png', '/static/goodimg/20161210/1d3f307db36ecde95dab039407359fb4.png', '/static/goodimg/20161210/d5b10c064056c5838e0f7edbd2857bd1.png', '/static/Reception/Picture/default.png', 1, 0),
(87, '有点害羞的苹果', '78', '2个', NULL, '9', '日本', '/static/goodimg/20161210/f4a11071bf50277a61e1fd5af09d2742.jpg', '/static/goodimg/20161210/8afb96b5c7dd52aa91cfe102eea44d31.jpg', '/static/goodimg/20161210/1b455ef9fb25b6259de26c91d4f3dea5.jpg', '/static/goodimg/20161210/a2c529ef3f371f879c2e01aeceb2fc5f.jpg', '/static/goodimg/20161210/e957413bdc27dc2b5268076e03c3da01.png', '/static/goodimg/20161210/af5ca4377de78e591787c27e1098f7e9.png', '/static/goodimg/20161210/a2175944bfa7cfdc142f0df26b7abf89.png', '/static/goodimg/20161210/d28731915fc8c07dcca699a9e2f1beac.jpg', 1, 0),
(89, ' 美国青苹果', '22', '3个', NULL, '9', '美国', '/static/goodimg/20161210/6e2bf2ff275af5cbfe0edbf2e27f3529.jpg', '/static/goodimg/20161210/18e5cde5a81aa101c53b75d102f1d4b8.jpg', '/static/goodimg/20161210/4f83c1743992779033fffbf01a4f966a.jpg', '/static/goodimg/20161210/0a786b3035f432fef6b73e2dbfd0588c.png', '/static/goodimg/20161210/df8597d3e0b1a65febea9f1f6fec1763.png', '/static/goodimg/20161210/e7701738b0b4df8d57ec2fe6224efcbc.png', '/static/goodimg/20161210/3c926594121d93905d1944dab11ef469.png', '/static/Reception/Picture/default.png', 1, 0),
(90, '新疆红旗坡冰糖心苹果', '59', '5斤', '0', '9', '新疆阿克苏', '/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '/static/goodimg/20161210/3c1010b493882f6289ef0474f4543758.jpg', '/static/goodimg/20161210/41651f8f3535c39cb1c60c043443bdc3.jpg', '/static/goodimg/20161210/18c2754b6c1a5d92172dd556947807f5.jpg', '/static/goodimg/20161210/8ab07fc9fe1da99e09d456bb2d94f420.png', '/static/goodimg/20161210/243f1ad7ca1d9ccf4bd19f43eb02921d.png', '/static/goodimg/20161210/2bf6fb01b7738971cf11676fc0a912cf.png', '/static/goodimg/20161210/be4c0e2238d7d1829c8bb331e6505732.png', 1, 1),
(91, '长柄玫瑰草莓', '39', '1盒/399克', NULL, '10', '中国', '/static/goodimg/20161210/2eb0236e3436ca1b1429ee8d8df0f7b5.jpg', '/static/goodimg/20161210/d555547d7e0f8a7d8db181f1834a0aaf.jpg', '/static/goodimg/20161210/6473bdae205eb7495ea1d6a33454728b.jpg', '/static/goodimg/20161210/50a1ab597c7d343ee9cec4e93af6c3fb.png', '/static/goodimg/20161210/12ada10f59e1f05de05844f16dcfc311.png', '/static/goodimg/20161210/7268261f4b91980d661d9b4d887f81e2.png', '/static/goodimg/20161210/265cc4eb670103787093469289ddb72a.png', '/static/Reception/Picture/default.png', 1, 0),
(92, '红颊草莓', '49', '1斤', NULL, '10', '中国四川双流', '/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '/static/goodimg/20161210/3ac77b35ce10df529b787481d473e0f2.jpg', '/static/goodimg/20161210/e3139a4a944d9e5ea985a2ad3a668e63.jpg', '/static/goodimg/20161210/4f5e3e1797657432c1e0b03bcdd89889.jpg', '/static/goodimg/20161210/4fa7449283044b9f8c82b54f789b68a5.png', '/static/goodimg/20161210/a3c0274cc211806b0f8b9f28cd598ad8.png', '/static/goodimg/20161210/b207b40d9c1a6d07d33794e6e955ff12.png', '/static/goodimg/20161210/bedf4328a4f1723a9370d4d39b846d4c.png', 1, 1),
(93, ' 进口香蕉', '29', '2斤', NULL, '11', '菲律宾', '/static/goodimg/20161210/874b71738ce098d2839512c03bf7cb0b.jpg', '/static/goodimg/20161210/0da9ad0564b5155cc11c177c6a415bc3.jpg', '/static/goodimg/20161210/87d60771c13cb68221dfb41077035084.jpg', '/static/goodimg/20161210/252c5c46aa6946a1f478769903e5564f.jpg', '/static/goodimg/20161210/1c4c6b118af2e3b731726e736887ef9c.png', '/static/goodimg/20161210/1f801a222b8ed08422ca85b97d3b300d.png', '/static/goodimg/20161210/11d4cc7e79a3deb128a0818d0fd21c8a.png', '/static/goodimg/20161210/10caf0fe113be77c4c5fa8879a0dfa40.png', 1, 0),
(94, '野生丑蕉', '29', '2斤', NULL, '11', '海南', '/static/goodimg/20161210/40e7e3433e9fa5b510ff238a9e658a4a.jpg', '/static/goodimg/20161210/cf53315babe2028b40164fcc2110a2d5.jpg', '/static/goodimg/20161210/6a3252018ee61b835b555be5aea6b4e9.jpg', '/static/goodimg/20161210/3aa967be088b49df2623ef943c1485ae.jpg', '/static/goodimg/20161210/bdd295d0e9c3282f5b511a00fee809b6.png', '/static/goodimg/20161210/e035abcc15dbee6f3426a8a0ddd400e9.png', '/static/goodimg/20161210/8a49158416f695dca34d402ec22e3512.png', '/static/goodimg/20161210/d8167baa11c320c58976b119397eb1f0.png', 1, 0),
(95, ' 新奇士美国脐橙mini', '58', '12个', NULL, '12', '美国', '/static/goodimg/20161210/f2a027d872ebf02f8434eb52aa2259ae.jpg', '/static/goodimg/20161210/4b655bb953d069a45c90879e0567d993.jpg', '/static/goodimg/20161210/7bb9ced75abd3dd061289ae167194774.jpg', '/static/goodimg/20161210/a21b7e51146b26aefef52800d7f8cff9.png', '/static/goodimg/20161210/a0d96a889e168411ada6b90b37b7dd7c.png', '/static/goodimg/20161210/130064a8ee6a9dca10391076c1d45d54.png', '/static/goodimg/20161210/0669c1f8b460315850968be7ad8c8df4.png', '/static/Reception/Picture/default.png', 1, 0),
(96, '赣南脐橙', '68', '5斤', NULL, '12', '江西赣南县', '/static/goodimg/20161210/9f904614c6fe40c8aa3d3f452608f2ea.jpg', '/static/goodimg/20161210/22829acbd22f16cee0e1464803eb1116.jpg', '/static/goodimg/20161210/ecb36948e1c6b049412ec3897e3f4654.jpg', '/static/goodimg/20161210/7e38e1ef0db2ed858161b11942d35f72.png', '/static/goodimg/20161210/f9f0613e10d3a1e894380041282b92d0.png', '/static/goodimg/20161210/722e8b0fda65a082456759ad97100d99.png', '/static/goodimg/20161210/1dcd8b581497eadd9000e89971c28e77.png', '/static/goodimg/20161210/4f9be07526b7469220870ba2c3e46faa.png', 1, 0),
(97, '新品 琼中绿橙', '49', '2斤', NULL, '12', '中国', '/static/goodimg/20161210/56acd2ea345405683a6d17695f8b6e22.jpg', '/static/goodimg/20161210/2f0a92561d7c42ff32c136b79cac61c7.jpg', '/static/goodimg/20161210/d60bf7ae8551e5c92296930724d17617.jpg', '/static/goodimg/20161210/fb9e8b492b9050e363faf551ddffb3a2.png', '/static/goodimg/20161210/c828223343332d32692efe843aa0280f.png', '/static/goodimg/20161210/6255c7e8d6280d9adf16740fe850a49a.png', '/static/goodimg/20161210/27bdb027a0c66f77898ee76039f5d6f2.jpg', '/static/goodimg/20161210/15a0190fb4da6a2fd4ce046bcf14aab5.png', 1, 0),
(98, '赣南红心脐橙', '79', '四斤', NULL, '12', '中国江西赣南县', '/static/goodimg/20161210/7cde46f3364d14aa2434310524e44162.jpg', '/static/goodimg/20161210/cf93b845b1f00f60fef5035a83bc1c22.jpg', '/static/goodimg/20161210/4786efe66a702dec4aa52b1b312e2c13.jpg', '/static/goodimg/20161210/28b6acda8881bf4fcf05ef7ca1ff551e.png', '/static/goodimg/20161210/c34b6a7bbadbb07d00f4b230b9d95e26.png', '/static/goodimg/20161210/f86157a86f0759e316a460c3d5f290d0.png', '/static/goodimg/20161210/d61c7081aee6f7a40cba124051b06dfb.png', '/static/Reception/Picture/default.png', 1, 0),
(99, '桂林脆皮金桔', '40', '2斤', NULL, '14', '中国桂林', '/static/goodimg/20161210/7ada39e50b093fe57bac9de1c1252baa.jpg', '/static/goodimg/20161210/3d456454e04a8f9f3e74ae9a32416bfb.jpg', '/static/goodimg/20161210/d5399347196ce7f56f31ccfe65580cd2.jpg', '/static/goodimg/20161210/e40f34586c307540e6dd091260ea885a.png', '/static/goodimg/20161210/675d3ca9ef5470d9665fcaaf2f007d00.png', '/static/goodimg/20161210/560ff8d3cf76e800ba50a003cb0c2cf8.png', '/static/goodimg/20161210/4537eb71b52886c74c4484cd5f799778.png', '/static/goodimg/20161210/5dba498a50a04f3acc44f50187cfa9ef.png', 1, 0),
(100, '浙江蜜桔', '40', '4斤', NULL, '14', '中国浙江', '/static/goodimg/20161210/b4ea4af10cb4367fff4c824a9cd556c5.jpg', '/static/goodimg/20161210/1ebfcd5d7519231a462d4d036c41167d.jpg', '/static/goodimg/20161210/85686b3632f99f3168f0c51209575c99.jpg', '/static/goodimg/20161210/3a502bd411848b68959133aca94e963e.png', '/static/goodimg/20161210/f12425443c92a9df758d8232fdee0bbd.png', '/static/goodimg/20161210/4d092a512f46c9ab226397f03b7b1240.png', '/static/goodimg/20161210/89859e69543ce5ef4e0639526fb8e744.png', '/static/goodimg/20161210/11763004d7387a741fab77724834685e.png', 1, 0),
(101, '桂林金桔', '40', '2斤', NULL, '14', '中国桂林', '/static/goodimg/20161210/ff44bf530968853a9bb9495005dcf301.jpg', '/static/goodimg/20161210/6cba6e10623a899fa959ef098d6fa17b.jpg', '/static/goodimg/20161210/5591baad81ab7a035d9ef79ade73e51e.jpg', '/static/goodimg/20161210/68d509ba1f3f34f54b57e11f1073b2e7.png', '/static/goodimg/20161210/3952a125818d17219b65efc29b3f841c.png', '/static/goodimg/20161210/9573b9842cd2f083749394b4eead255f.png', '/static/goodimg/20161210/b9a38cf02b7eaa04097c95aaf733703d.png', '/static/Reception/Picture/default.png', 1, 0),
(102, ' 越南火龙果', '49', '5斤', NULL, '15', '越南', '/static/goodimg/20161210/10454328f8e27146b7834ed41768657e.jpg', '/static/goodimg/20161210/1f9eebd6e4c9961977f8be4094d08774.jpg', '/static/goodimg/20161210/afc3eb4332495a0ee0d61dcf5812619e.jpg', '/static/goodimg/20161210/27950757106abd8f40e46ec968386400.jpg', '/static/goodimg/20161210/51d5f08ef34443e22cadb6e0d39caf7f.png', '/static/goodimg/20161210/9f5620f03b9b4f987afa0dcf0c264a53.png', '/static/goodimg/20161210/6b0da916c582247a7c40e620f7c89122.png', '/static/goodimg/20161210/da8b631b42b145c42749773c471c1421.png', 1, 0),
(103, '越南红心火龙果', '39', '2斤', NULL, '15', '越南', '/static/goodimg/20161210/8670b523cec3a0f952bad8189102d66e.jpg', '/static/goodimg/20161210/f04e20d8dfdf8eacb247f350329cc798.jpg', '/static/goodimg/20161210/d20aa094e3cd0e69374b7d41fffec7de.jpg', '/static/goodimg/20161210/1902b8cc8b6f28def39bb1010e8c3f21.jpg', '/static/goodimg/20161210/a2d1c920062e45b518a15520a68e1d4a.png', '/static/goodimg/20161210/6d1921f11e207b0fa152050eee4bceff.png', '/static/goodimg/20161210/b12805f0243f0ad7ea7eb83f625d1232.png', '/static/goodimg/20161210/431748df1f82d47f002d20a7fb6299de.png', 1, 1),
(104, '精选百香果', '20', '6个', NULL, '16', '中国广西', '/static/goodimg/20161210/0ac6daff519f58d1c57788558b54bbfb.jpg', '/static/goodimg/20161210/30c983a755f0f18d3825d582705927ae.jpg', '/static/goodimg/20161210/12ee32bf463968365b6709f43e3654df.jpg', '/static/goodimg/20161210/b799910cfd84584db1e849958bd42264.jpg', '/static/goodimg/20161210/6569dc5a605250906642c77bf90e8510.png', '/static/goodimg/20161210/01e35e11af3fdcd71f30ac1bf98d5ed4.png', '/static/goodimg/20161210/9b59643016722f486a7eaac1ce52f779.png', '/static/goodimg/20161210/56c43f7e1c5a99d99a2e16fb23711357.png', 1, 0),
(105, '琯溪白玉蜜柚', '30', '2个', NULL, '17', '中国福建', '/static/goodimg/20161210/425a4052cb53d2405c0828e71942d545.jpg', '/static/goodimg/20161210/9f772811591cb64339faf4d846d0ed32.jpg', '/static/goodimg/20161210/8c625d59f32716b50391a19ceacbede3.jpg', '/static/goodimg/20161210/8992c9cab3a35bb8573f8cb4021380eb.jpg', '/static/goodimg/20161210/b82e206c05b350ee842c38cc33c61019.png', '/static/goodimg/20161210/542e20b3f8f21b23d5b443cf91165d4c.png', '/static/goodimg/20161210/501a114cff86d26e55f11ad8516d3c3c.png', '/static/goodimg/20161210/981542070d56f62018fc9bc3e7aa5a3c.png', 1, 0),
(106, '琯溪红玉蜜柚', '40', '2个', NULL, '17', '中国福建', '/static/goodimg/20161210/ed1458afd523403646b497be56f2c98b.jpg', '/static/goodimg/20161210/ee42174dd8bd3b2e2dedfc80985fc0d1.jpg', '/static/goodimg/20161210/27aa53ee972070ffa11c4cedd7beee86.jpg', '/static/goodimg/20161210/151489997104addbbab818a7bc6906c9.jpg', '/static/goodimg/20161210/55de76c9dc09d76d15dcb4205f0ddcbf.png', '/static/goodimg/20161210/1fcaaf901f5ef9feaf9a37c97b711831.png', '/static/goodimg/20161210/c0f9569c1cd53b11e1d7f27625bfd909.png', '/static/goodimg/20161210/266b4c998620b40c575ee5b868e25a5a.png', 1, 0),
(107, '越南青皮香芒果', '50', '5斤', NULL, '18', '越南', '/static/goodimg/20161210/4bdf3a6cee5e226a9109e372f7e7f10e.jpg', '/static/goodimg/20161210/2d421c4760d95d8a2226be80772c09a0.jpg', '/static/goodimg/20161210/7b419e1f227cd1058f77203d50c6f0c6.jpg', '/static/goodimg/20161210/d36885dbe1fe8caed8b15deae2affdff.jpg', '/static/goodimg/20161210/e334b483ce2be76db0aa65e974607ce7.png', '/static/goodimg/20161210/4a35a457078109f293ad763ba5cbca01.png', '/static/goodimg/20161210/829b9a8d54a1e2a0ab7fd222961b8663.png', '/static/goodimg/20161210/e72235d68b3568e6e029ed57c4a528d9.png', 1, 0),
(108, ' 澳大利亚芒果', '78', '1个/1斤', NULL, '18', '澳大利亚', '/static/goodimg/20161210/f369c0a4a58b778b2ff398ddb661adb7.jpg', '/static/goodimg/20161210/2dff504e1af66440882e82a764c34b8b.jpg', '/static/goodimg/20161210/edccbac7b37b975ca796818fa24ac622.jpg', '/static/goodimg/20161210/b382cc1f64531d5dae0558940e224d14.png', '/static/goodimg/20161210/6f71854f5e40fc7012a71c681ff68986.png', '/static/goodimg/20161210/91c5227e0b129eef0321efdb08bae2c1.png', '/static/goodimg/20161210/3fabb969bffcc66fe7bc55ac3efbbbcd.png', '/static/Reception/Picture/default.png', 1, 0),
(109, '泰国龙眼', '30', '2斤', NULL, '19', '泰国', '/static/goodimg/20161210/29f03b2daf578578ebb19ec7c302bfa8.jpg', '/static/goodimg/20161210/b6f596dcb5772f74380c10b6181e1e18.jpg', '/static/goodimg/20161210/970d853c41fa60777787ee646164a1ae.jpg', '/static/goodimg/20161210/1d5f2a03868f330fc2bb78ba19fd6727.jpg', '/static/goodimg/20161210/0047940b48d11c235c63b7a23f5830b4.png', '/static/goodimg/20161210/91a066893583eb238d3d2d9cde97d43d.png', '/static/goodimg/20161210/37d159b92d3c31ccc49f01870da5c418.png', '/static/goodimg/20161210/1e0a484385c5b5ef1cf4bb4ce48e6cc7.png', 1, 0),
(110, '真心祝福水果礼篮', '358', '礼品果篮', NULL, '22', '中国', '/static/goodimg/20161210/61afdcec8b60287554477715388ac4b0.jpg', '/static/goodimg/20161210/8070f1112136168b5239e7307bb4f786.png', '/static/goodimg/20161210/baa2a8d707b60eaf25dc0477fdbcd9c2.png', '/static/goodimg/20161210/9447af4330237a148dee5350a2437ba5.png', '/static/goodimg/20161210/f327b1c806b84a130f9f921939f79f56.png', '/static/goodimg/20161210/477955c115f4a441971f9c0e2c9b4059.png', '/static/Reception/Picture/default.png', '/static/Reception/Picture/default.png', 1, 0),
(111, '福聚礼篮', '680', '礼品果篮', NULL, '23', '中国', '/static/goodimg/20161210/ec0c734e5fc9dd3fbb99b664179cb0e1.jpg', '/static/goodimg/20161210/60d637a5cf1e68734fc79775b3659b34.png', '/static/goodimg/20161210/578a00c4db6c317578f915ff19048937.png', '/static/goodimg/20161210/bf84f0dd8777cb14fc1198f1b55ca85f.png', '/static/goodimg/20161210/461a152a6f7f5e4ac1d9e3d4bff1c63b.png', '/static/goodimg/20161210/56f643624d904e6aa49fccf91e8fd37b.png', '/static/Reception/Picture/default.png', '/static/Reception/Picture/default.png', 1, 1),
(112, '欢乐时光水果礼篮', '188', '礼品果篮', NULL, '23', '中国', '/static/goodimg/20161210/487f1b76d4e3716a2cd7f9292f102232.jpg', '/static/goodimg/20161210/21f7cf8a4b69ba99a1815b17cf7459b0.png', '/static/goodimg/20161210/d3139a23a61fc86c4295b206cdb0d2d9.png', '/static/goodimg/20161210/0fe8cdd66a5dd6681a20f64db6186519.png', '/static/goodimg/20161210/9102be477f6be18ece46ad70779eebe6.png', '/static/goodimg/20161210/cfe493720904537bf787f41442cc03b2.png', '/static/Reception/Picture/default.png', '/static/Reception/Picture/default.png', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `slsh_items`
--

CREATE TABLE `slsh_items` (
  `slsh_goodid` int(11) NOT NULL,
  `slsh_goodname` varchar(50) NOT NULL COMMENT '商品名字',
  `slsh_goodprice` float NOT NULL COMMENT '商品价格',
  `slsh_discount` float DEFAULT NULL COMMENT AS `商品折扣价格`,
  `slsh_category` varchar(50) NOT NULL COMMENT '商品品类',
  `slsh_spec` varchar(50) NOT NULL COMMENT '商品规格kg',
  `slsh_orign` varchar(50) NOT NULL COMMENT '商品产地',
  `slsh_picture` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品照片',
  `slsh_picture1` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品照片',
  `slsh_picture2` varchar(255) DEFAULT NULL COMMENT AS `商品照片`,
  `slsh_picture3` varchar(255) DEFAULT NULL COMMENT AS `商品照片`,
  `slsh_photo` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品详情照片',
  `slsh_photo1` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品详情照片',
  `slsh_photo2` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品详情照片',
  `slsh_photo3` varchar(255) NOT NULL DEFAULT '/static/Reception/Picture/default.png' COMMENT '商品详情照片',
  `slsh_shelf` int(5) NOT NULL DEFAULT '1' COMMENT '商品1上架0下架2折扣',
  `slsh_uid` int(11) DEFAULT NULL COMMENT AS `供应商连接`,
  `slsh_show` int(3) NOT NULL DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `slsh_items`
--

INSERT INTO `slsh_items` (`slsh_goodid`, `slsh_goodname`, `slsh_goodprice`, `slsh_discount`, `slsh_category`, `slsh_spec`, `slsh_orign`, `slsh_picture`, `slsh_picture1`, `slsh_picture2`, `slsh_picture3`, `slsh_photo`, `slsh_photo1`, `slsh_photo2`, `slsh_photo3`, `slsh_shelf`, `slsh_uid`, `slsh_show`) VALUES
(4, '碧根果', 21.9, 12, '25', '225g/袋', '浙江省', '/static/thirdgoodimg/20161210/5fad508e70a10d9ca890191c867316dd.jpg', '/static/thirdgoodimg/20161210/a2aae08a74c0e5419d0cc29da7c1c76b.png', '/static/thirdgoodimg/20161210/81c17418a0241d7a7c37ff3eb8aab9ee.png', '/static/thirdgoodimg/20161210/62135d9c229c9c575494bb2f7569b14e.png', '/static/thirdgoodimg/20161210/0c22ae4d5b2dba045026aba954058581.png', '/static/thirdgoodimg/20161210/2f171814eb87e6964f497a509ee33fae.png', '/static/thirdgoodimg/20161210/ea7032b9199143ae09a552fc2f532ec2.png', '/static/thirdgoodimg/20161210/36bb9b8b2f82fcb8e47121e6f7617331.png', 0, NULL, 1),
(5, '炭烧腰果', 19.9, 33, '25', '185g/袋', '浙江省', '/static/thirdgoodimg/20161210/94d778b9747f5a7c0a41b07dbfc55ef4.jpg', '/static/thirdgoodimg/20161210/fdb44aab143f5ed84600d58ca7606d59.png', '/static/thirdgoodimg/20161210/9db24d78f7ba4042606b135a1dea3d24.png', '/static/thirdgoodimg/20161210/c9452d7d4d6305780925d2f24b6d4f51.png', '/static/thirdgoodimg/20161210/2e53addb41835dadaae5f62ef22175c4.png', '/static/thirdgoodimg/20161210/9c6fb6da603577576bd0dce761552408.png', '/static/thirdgoodimg/20161210/e4676ea8a94ef7b354a9eea85d2d4420.png', '/static/thirdgoodimg/20161210/9d54b6beb9a5ce06d8b53ff7734dd297.png', 1, NULL, 0),
(6, ' 夏威夷果', 24.9, NULL, '25', '265g/袋', '浙江省', '/static/thirdgoodimg/20161210/f5fc0b5ac66f275c31aa9277d52c0cd8.png', '/static/thirdgoodimg/20161210/f702f22c64bc974c6ea9d71296e47a26.png', '/static/thirdgoodimg/20161210/210e03047dd52d44e69edf5e9a2e92a3.png', '/static/thirdgoodimg/20161210/0b2b952bde277b8302f8f6ab81d77abe.png', '/static/thirdgoodimg/20161210/a026b101ccae0f23a1dbee73f9f39056.png', '/static/thirdgoodimg/20161210/4e6f91499cb1e19225743cd085c19c93.png', '/static/thirdgoodimg/20161210/56b4a1c9d3437ba4cad7c8758b719678.png', '/static/thirdgoodimg/20161210/7c793b3d7334b1a45405232049976056.png', 1, NULL, 1),
(7, '开心果', 26.9, NULL, '25', '225g/袋', '浙江省', '/static/thirdgoodimg/20161210/998e00006ea1a4783a4129f077f79319.png', '/static/thirdgoodimg/20161210/7bfcf72b0551069dbd74eee793e41598.png', '/static/thirdgoodimg/20161210/c6db48dca023185792398aacb202dc56.png', '/static/thirdgoodimg/20161210/443d00aa818a33563d16bf24a725b99f.png', '/static/thirdgoodimg/20161210/8470d1058bdc94ad6fb3750f4e8c37fa.png', '/static/thirdgoodimg/20161210/c8b4af366df8b2895b3e65d75228535d.png', '/static/thirdgoodimg/20161210/d497420b295fce9cec2bf2dadc8449dd.png', '/static/thirdgoodimg/20161210/7e8cfee31a61c1b1e5257d7d4b5c5b6c.png', 1, NULL, 0),
(8, '黄桃干', 19.9, NULL, '26', '106g/袋', '浙江省', '/static/thirdgoodimg/20161210/fdbf91ce0b239cbdca4b4b905f9c7e81.png', '/static/thirdgoodimg/20161210/1525833c74aa8e873e8f0cbcc2fbebed.png', '/static/thirdgoodimg/20161210/e38d1b735d4e335558c1b5dc2f246124.png', '/static/thirdgoodimg/20161210/4fe59482f7e1e1a06705f5dd5de14b6a.png', '/static/thirdgoodimg/20161210/76423e6dc919e28c72ef78b46af20ead.png', '/static/thirdgoodimg/20161210/8e1a28be8a85f9cea69100cb8771cf69.png', '/static/thirdgoodimg/20161210/c4429398431709e7675fbd9a162464d6.png', '/static/thirdgoodimg/20161210/bbc3a9874b0673c9a50ace4085a1fe90.png', 1, NULL, 0),
(9, '芒果干', 32.9, NULL, '26', '116gx3袋', '浙江省', '/static/thirdgoodimg/20161210/69576be919568c8eb934ae208fd8dfc7.png', '/static/thirdgoodimg/20161210/e9969f2119c9bd6a8c6cf8888a009087.png', '/static/thirdgoodimg/20161210/70c99ced337ad16c9ccff8e311f8ae21.png', '/static/thirdgoodimg/20161210/c8f244041f4272630186fc80678a0411.png', '/static/thirdgoodimg/20161210/f95874d5f3832df03350cd97ec1643f2.png', '/static/thirdgoodimg/20161210/f289ce3b96f35313e5e6fc44b3b0eff0.png', '/static/thirdgoodimg/20161210/77f2584b73208571a8fc6cb5fb3c6ec9.png', '/static/thirdgoodimg/20161210/ec6d4cc929c2ce5558ded61d3d86f03f.png', 1, NULL, 0),
(10, ' 草莓干', 19.9, NULL, '26', '106g/袋', '浙江省', '/static/thirdgoodimg/20161210/0220919b33c120486333c4a1bc4fb70a.png', '/static/thirdgoodimg/20161210/a3406ab2c19b8f4d6aafe7064f4d70f5.png', '/static/thirdgoodimg/20161210/ab7c671c8cf9767cf3bcae84cc92896d.png', '/static/thirdgoodimg/20161210/aa75df176165b02f8206746990e53400.png', '/static/thirdgoodimg/20161210/6b800e7a23cf6bf9d1d2c3551ae02c84.png', '/static/thirdgoodimg/20161210/353b228e591155ff9a41a85fe38ccf15.png', '/static/thirdgoodimg/20161210/c7fc21625b864fcbf27bd5ec94ff51b5.png', '/static/thirdgoodimg/20161210/b3560af4426e3763ce52915283f77a41.png', 1, NULL, 0),
(11, '猪肉脯自然片', 26.9, NULL, '27', '150g/袋子', '浙江省', '/static/thirdgoodimg/20161210/be0d9c0b32a38fb9e1f0a87d6a5b6337.png', '/static/thirdgoodimg/20161210/0ef6c00ce3fbe3613e1182e98166061c.png', '/static/thirdgoodimg/20161210/9a321bf624256c7e0674172ddf71d8a3.png', '/static/thirdgoodimg/20161210/199c40dff6bf061f92a71f354c8dc169.png', '/static/thirdgoodimg/20161210/5e2d252a6c125ebb0a1f39e3f7aa9919.png', '/static/thirdgoodimg/20161210/84b68c89a05d8c92d022e7271160b4c6.png', '/static/thirdgoodimg/20161210/26d8dd32ee1eaa2cd2223c143f0fc9b4.png', '/static/thirdgoodimg/20161210/aa4ef5b496f3164cd7f1b54650ccb364.png', 1, NULL, 0),
(12, '大亨果茶山楂果汁果肉饮料', 130, NULL, '30', ' 235ml*24瓶整箱', '河北', '/static/thirdgoodimg/20161210/0af912c0856f84edfc51d468dab0e699.png', '/static/thirdgoodimg/20161210/dd6f3f4e97c8b073578a83c07eab4d2f.png', '/static/thirdgoodimg/20161210/5f7e08d1f52724380b0f9abecabcfda8.png', '/static/thirdgoodimg/20161210/e93e616648d3762cba9734077f974a79.png', '/static/thirdgoodimg/20161210/c46748221c9255afdfa22076c1764976.png', '/static/thirdgoodimg/20161210/9a5be9c892dbc6ce32a681819beb86d2.png', '/static/thirdgoodimg/20161210/c070a3ac987f6cb90635c106990c15c1.png', '/static/Reception/Picture/default.png', 1, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `slsh_money`
--

CREATE TABLE `slsh_money` (
  `slsh_mid` int(11) NOT NULL,
  `slsh_toup` decimal(50,0) DEFAULT NULL COMMENT AS `充值`,
  `slsh_spending` decimal(50,0) DEFAULT NULL COMMENT AS `支出`,
  `slsh_balance` decimal(50,0) DEFAULT NULL COMMENT AS `余额`,
  `slsh_trading_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT AS `交易时间`,
  `slsh_userid` int(11) DEFAULT NULL COMMENT AS `关联用户`
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `slsh_money`
--

INSERT INTO `slsh_money` (`slsh_mid`, `slsh_toup`, `slsh_spending`, `slsh_balance`, `slsh_trading_time`, `slsh_userid`) VALUES
(65, NULL, '39', '10778', '2016-12-14 09:51:28', 7),
(64, NULL, '59', '10817', '2016-12-14 09:44:47', 7),
(63, NULL, '59', '10876', '2016-12-14 09:43:42', 7),
(62, NULL, '49', '10935', '2016-12-14 09:41:02', 7),
(61, NULL, '59', '10984', '2016-12-14 09:36:56', 7),
(60, NULL, '59', '11043', '2016-12-14 09:33:13', 7),
(59, NULL, '59', '11102', '2016-12-14 09:29:45', 7),
(58, NULL, '49', '11161', '2016-12-14 09:26:13', 7),
(57, NULL, '49', '11161', '2016-12-14 09:25:26', 7),
(56, '11111', NULL, '11210', '2016-12-14 09:25:01', 7),
(55, NULL, '118', '99', '2016-12-13 22:32:56', 7),
(54, '111', NULL, '217', '2016-12-13 22:32:16', 7),
(53, NULL, '39', '106', '2016-12-13 22:05:01', 7),
(52, NULL, '78', '145', '2016-12-13 21:16:24', 7),
(51, '222', NULL, '223', '2016-12-13 20:13:27', 7),
(66, NULL, '20', '10758', '2016-12-14 09:52:51', 7),
(67, NULL, '148', '10610', '2016-12-14 09:53:25', 7),
(50, '1', NULL, '1', '2016-12-13 20:04:06', 7),
(68, NULL, '88', '10522', '2016-12-14 10:43:26', 7),
(69, '1111', NULL, '1111', '2016-12-14 13:02:27', 9),
(70, NULL, '49', '1062', '2016-12-14 13:26:13', 9),
(71, '22', NULL, '1084', '2016-12-14 13:34:42', 9),
(72, NULL, '198', '886', '2016-12-14 14:06:28', 9),
(73, NULL, '338', '10184', '2016-12-14 14:19:48', 7),
(74, '2345', NULL, '2345', '2016-12-14 14:36:05', 19),
(75, NULL, '29', '2316', '2016-12-14 14:37:32', 19),
(76, NULL, '437', '1879', '2016-12-14 17:07:15', 19),
(77, NULL, '49', '1830', '2016-12-14 19:59:06', 19),
(78, NULL, '99', '1731', '2016-12-15 10:09:03', 19),
(79, NULL, '473', '9711', '2016-12-15 16:54:11', 7),
(80, NULL, '49', '9662', '2016-12-15 16:57:30', 7),
(81, NULL, '148', '1583', '2016-12-15 19:17:32', 19);

-- --------------------------------------------------------

--
-- 表的结构 `slsh_order`
--

CREATE TABLE `slsh_order` (
  `slsh_oid` int(11) NOT NULL,
  `slsh_order` varchar(90) NOT NULL,
  `slsh_creat_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT AS `交易时间`,
  `slsh_address` varchar(255) NOT NULL COMMENT '收货地址',
  `slsh_pic` varchar(255) NOT NULL COMMENT '商品照片',
  `slsh_spec` varchar(100) NOT NULL COMMENT '商品规格',
  `slsh_num` varchar(50) NOT NULL COMMENT '商品数量',
  `slsh_price` varchar(50) NOT NULL COMMENT '商品价格',
  `slsh_good` varchar(255) NOT NULL COMMENT '商品名称',
  `slsh_tel` bigint(11) NOT NULL COMMENT '用户',
  `slsh_state` int(11) NOT NULL DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `slsh_order`
--

INSERT INTO `slsh_order` (`slsh_oid`, `slsh_order`, `slsh_creat_time`, `slsh_address`, `slsh_pic`, `slsh_spec`, `slsh_num`, `slsh_price`, `slsh_good`, `slsh_tel`, `slsh_state`) VALUES
(47, '20161213200253 ', '2016-12-13 20:02:54', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 0),
(46, '20161213200112 ', '2016-12-13 20:01:12', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/106e898a2ae120492b2395faf910ab91.jpg', '1斤', '1', '￥148', ' 大个智利蕾妮樱桃 JJ', 18801084842, 0),
(45, '20161213200057 ', '2016-12-13 20:00:57', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/106e898a2ae120492b2395faf910ab91.jpg', '1斤', '1', '￥148', ' 大个智利蕾妮樱桃 JJ', 18801084842, 3),
(48, '20161213200253 ', '2016-12-13 20:02:54', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c4d12fd6fe81d25111cbf28a95d82869.jpg', '1斤', '1', '￥118', '超大智利甜心樱桃 JJJ', 18801084842, 0),
(49, '20161213200448 ', '2016-12-13 20:04:48', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/487f1b76d4e3716a2cd7f9292f102232.jpg', '礼品果篮', '1', '￥188', '欢乐时光水果礼篮', 18801084842, 0),
(50, '20161213205050 ', '2016-12-13 20:50:50', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 0),
(51, '20161213205124 ', '2016-12-13 20:51:24', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 0),
(52, '20161213210112 ', '2016-12-13 21:01:12', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 0),
(53, '20161213211620 ', '2016-12-13 21:16:20', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/68be8c8bcf713031d1f1d7c5a106d72b.jpg', '2+2盒/每盒125g', '1', '￥78', '智利蓝莓', 18801084842, 0),
(54, '201612132203 ', '2016-12-13 22:03:14', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 0),
(55, '201612132204 ', '2016-12-13 22:04:59', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/2eb0236e3436ca1b1429ee8d8df0f7b5.jpg', '1盒/399克', '1', '￥39', '长柄玫瑰草莓', 18801084842, 0),
(56, '201612132232 ', '2016-12-13 22:32:05', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/29f0aba112fdd0a182a5c1cacaafae4b.jpg', '2斤', '1', '￥148', '智利甜心樱桃 J', 18801084842, 0),
(57, '201612132232 ', '2016-12-13 22:32:54', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c4d12fd6fe81d25111cbf28a95d82869.jpg', '1斤', '1', '￥118', '超大智利甜心樱桃 JJJ', 18801084842, 0),
(58, '201612140925 ', '2016-12-14 09:25:21', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 0),
(59, '201612140929 ', '2016-12-14 09:29:43', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '5斤', '1', '￥59', '新疆红旗坡冰糖心苹果', 18801084842, 0),
(60, '201612140933 ', '2016-12-14 09:33:09', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '5斤', '1', '￥59', '新疆红旗坡冰糖心苹果', 18801084842, 0),
(61, '201612140936 ', '2016-12-14 09:36:54', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '5斤', '1', '￥59', '新疆红旗坡冰糖心苹果', 18801084842, 0),
(62, '201612140940 ', '2016-12-14 09:40:57', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 1),
(63, '201612140943 ', '2016-12-14 09:43:29', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '5斤', '1', '￥59', '新疆红旗坡冰糖心苹果', 18801084842, 0),
(64, '201612140943 ', '2016-12-14 09:43:40', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '5斤', '1', '￥59', '新疆红旗坡冰糖心苹果', 18801084842, 0),
(65, '201612140944 ', '2016-12-14 09:44:45', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '5斤', '1', '￥59', '新疆红旗坡冰糖心苹果', 18801084842, 3),
(66, '201612140951 ', '2016-12-14 09:51:26', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/8670b523cec3a0f952bad8189102d66e.jpg', '2斤', '1', '￥39', '越南红心火龙果', 18801084842, 0),
(67, '201612140952 ', '2016-12-14 09:52:46', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/d042d75a741040598efbf5f2ce487520.jpg', '800g', '1', '￥20', '阳光小番茄', 18801084842, 3),
(68, '201612140953 ', '2016-12-14 09:53:23', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/29f0aba112fdd0a182a5c1cacaafae4b.jpg', '2斤', '1', '￥148', '智利甜心樱桃 J', 18801084842, 1),
(69, '201612141043 ', '2016-12-14 10:43:20', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/8670b523cec3a0f952bad8189102d66e.jpg', '2斤', '1', '￥39', '越南红心火龙果', 18801084842, 1),
(70, '201612141043 ', '2016-12-14 10:43:20', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18801084842, 1),
(71, '201612141312 ', '2016-12-14 13:12:41', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(72, '201612141312 ', '2016-12-14 13:12:49', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(73, '201612141312 ', '2016-12-14 13:12:51', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(74, '201612141312 ', '2016-12-14 13:12:52', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(75, '201612141317 ', '2016-12-14 13:17:41', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(76, '201612141318 ', '2016-12-14 13:18:05', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(77, '201612141319 ', '2016-12-14 13:19:04', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(78, '201612141319 ', '2016-12-14 13:19:23', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(79, '201612141320 ', '2016-12-14 13:20:51', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(80, '201612141321 ', '2016-12-14 13:21:21', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(81, '201612141321 ', '2016-12-14 13:21:36', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(82, '201612141321 ', '2016-12-14 13:21:46', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(83, '201612141322 ', '2016-12-14 13:22:04', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(84, '201612141322 ', '2016-12-14 13:22:30', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(85, '201612141322 ', '2016-12-14 13:22:41', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(86, '201612141323 ', '2016-12-14 13:23:17', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(87, '201612141323 ', '2016-12-14 13:23:27', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(88, '201612141323 ', '2016-12-14 13:23:49', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(89, '201612141324 ', '2016-12-14 13:24:05', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(90, '201612141324 ', '2016-12-14 13:24:36', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(91, '201612141325 ', '2016-12-14 13:25:11', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(92, '201612141325 ', '2016-12-14 13:25:18', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(93, '201612141325 ', '2016-12-14 13:25:23', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(94, '201612141325 ', '2016-12-14 13:25:28', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 0),
(95, '201612141326 ', '2016-12-14 13:26:00', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 18363835295, 1),
(96, '201612141404 ', '2016-12-14 14:04:34', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/1897ec4f786ab972b298f006273f2a1d.jpg', '400g', '1', '￥99', ' 马来西亚冷冻榴莲苏丹王', 18363835295, 0),
(97, '201612141404 ', '2016-12-14 14:04:34', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/1897ec4f786ab972b298f006273f2a1d.jpg', '400g', '1', '￥99', ' 马来西亚冷冻榴莲苏丹王', 18363835295, 0),
(98, '201612141406 ', '2016-12-14 14:06:14', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/1897ec4f786ab972b298f006273f2a1d.jpg', '400g', '1', '￥99', ' 马来西亚冷冻榴莲苏丹王', 18363835295, 1),
(99, '201612141406 ', '2016-12-14 14:06:14', '是的撒', 'http://www.slshengxian.cn/static/goodimg/20161210/1897ec4f786ab972b298f006273f2a1d.jpg', '400g', '1', '￥99', ' 马来西亚冷冻榴莲苏丹王', 18363835295, 1),
(100, '201612141419 ', '2016-12-14 14:19:42', 'ytghoiuy', 'http://www.slshengxian.cn/static/goodimg/20161210/627cd6dc8ff23d9c4fe0306e34ee7b28.jpg', '400g', '1', '￥338', '马来西亚冷冻榴莲红虾', 18801084842, 1),
(101, '201612141437 ', '2016-12-14 14:37:31', 'sdefdfds', 'http://www.slshengxian.cn/static/goodimg/20161210/40e7e3433e9fa5b510ff238a9e658a4a.jpg', '2斤', '1', '￥29', '野生丑蕉', 13153673253, 4),
(102, '201612141441 ', '2016-12-14 14:41:59', 'sdefdfds', 'http://www.slshengxian.cn/static/goodimg/20161210/68be8c8bcf713031d1f1d7c5a106d72b.jpg', '2+2盒/每盒125g', '1', '￥78', '智利蓝莓', 13153673253, 0),
(103, '201612141707 ', '2016-12-14 17:07:13', 'sdefdfds', 'http://www.slshengxian.cn/static/goodimg/20161210/59053bed39f1b20f124e134cd744a783.jpg', '6个', '1', '￥99', '佳沛新西兰阳光金奇异果', 13153673253, 1),
(104, '201612141707 ', '2016-12-14 17:07:13', 'sdefdfds', 'http://www.slshengxian.cn/static/goodimg/20161210/627cd6dc8ff23d9c4fe0306e34ee7b28.jpg', '400g', '1', '￥338', '马来西亚冷冻榴莲红虾', 13153673253, 4),
(105, '201612141959 ', '2016-12-14 19:59:04', 'sdefdfds', 'http://www.slshengxian.cn/static/goodimg/20161210/c6f7260405e0f2e00740d36c2cc45d97.jpg', '1斤', '1', '￥49', '红颊草莓', 13153673253, 1),
(106, '201612151008 ', '2016-12-15 10:08:42', 'sdefdfds', 'http://www.slshengxian.cn/static/goodimg/20161210/59053bed39f1b20f124e134cd744a783.jpg', '6个', '1', '￥99', '佳沛新西兰阳光金奇异果', 13153673253, 1),
(107, '201612151654', '2016-12-15 16:54:08', '北京市海淀区西三旗', 'http://www.slshengxian.cn/static/goodimg/20161210/8670b523cec3a0f952bad8189102d66e.jpg', '2斤', '1', '￥39', '越南红心火龙果', 18801084842, 1),
(108, '201612151654', '2016-12-15 16:54:08', '北京市海淀区西三旗', 'http://www.slshengxian.cn/static/goodimg/20161210/59053bed39f1b20f124e134cd744a783.jpg', '6个', '1', '￥99', '佳沛新西兰阳光金奇异果', 18801084842, 1),
(109, '201612151654', '2016-12-15 16:54:08', '北京市海淀区西三旗', 'http://www.slshengxian.cn/static/goodimg/20161210/7e0850e6ec9acaad4d0ac25068e32dc7.jpg', '5斤', '1', '￥59', '新疆红旗坡冰糖心苹果', 18801084842, 1),
(110, '201612151654', '2016-12-15 16:54:08', '北京市海淀区西三旗', 'http://www.slshengxian.cn/static/goodimg/20161210/68be8c8bcf713031d1f1d7c5a106d72b.jpg', '2+2盒/每盒125g', '1', '￥78', '智利蓝莓', 18801084842, 1),
(111, '201612151654', '2016-12-15 16:54:08', '北京市海淀区西三旗', 'http://www.slshengxian.cn/static/goodimg/20161210/59053bed39f1b20f124e134cd744a783.jpg', '6个', '1', '￥99', '佳沛新西兰阳光金奇异果', 18801084842, 1),
(112, '201612151654', '2016-12-15 16:54:08', '北京市海淀区西三旗', 'http://www.slshengxian.cn/static/goodimg/20161210/59053bed39f1b20f124e134cd744a783.jpg', '6个', '1', '￥99', '佳沛新西兰阳光金奇异果', 18801084842, 1),
(113, '201612151917', '2016-12-15 19:17:30', 'sdefdfds', 'http://www.slshengxian.cn/static/goodimg/20161210/29f0aba112fdd0a182a5c1cacaafae4b.jpg', '2斤', '1', '￥148', '智利甜心樱桃 J', 13153673253, 4);

-- --------------------------------------------------------

--
-- 表的结构 `slsh_plate`
--

CREATE TABLE `slsh_plate` (
  `slsh_plateid` int(11) NOT NULL,
  `slsh_class` varchar(50) NOT NULL COMMENT '商品品类',
  `slsh_english` varchar(20) DEFAULT NULL,
  `slsh_bigid` int(11) NOT NULL COMMENT '关联大版块'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `slsh_plate`
--

INSERT INTO `slsh_plate` (`slsh_plateid`, `slsh_class`, `slsh_english`, `slsh_bigid`) VALUES
(1, '首页', 'Home', 0),
(2, '鲜果', 'Fruit', 0),
(3, '坚果', 'Nut', 0),
(4, '礼品中心', 'Gift', 0),
(5, '榴莲', NULL, 2),
(7, '奇异果', NULL, 2),
(8, '蓝莓', NULL, 2),
(9, '苹果', NULL, 2),
(10, '草莓', NULL, 2),
(11, '香蕉', NULL, 2),
(12, '橙子', NULL, 2),
(13, '梨', NULL, 2),
(14, '桔子', NULL, 2),
(15, '火龙果', NULL, 2),
(16, '百香果', NULL, 2),
(17, '柚子', NULL, 2),
(18, '芒果', NULL, 2),
(19, '龙眼', NULL, 2),
(20, '黄金圣女果', NULL, 2),
(22, '早日康复', NULL, 4),
(23, '走亲访友', NULL, 4),
(25, '坚果/炒货', NULL, 3),
(26, '果干/蜜饯', NULL, 3),
(27, '肉类/熟食', NULL, 3),
(30, '花茶/果茶', NULL, 3),
(61, '樱桃', NULL, 2);

-- --------------------------------------------------------

--
-- 表的结构 `slsh_shopcar`
--

CREATE TABLE `slsh_shopcar` (
  `slsh_sid` int(11) NOT NULL,
  `slsh_shopgood` varchar(50) DEFAULT NULL COMMENT AS `购物商品名称`,
  `slsh_pirce` varchar(50) DEFAULT NULL COMMENT AS `商品价格`,
  `slsh_num` int(11) DEFAULT NULL COMMENT AS `购物商品数量`,
  `slsh_goodid` int(11) DEFAULT NULL COMMENT AS `关联物品`,
  `slsh_itemsid` int(11) DEFAULT NULL COMMENT AS `关联第三方物品`,
  `slsh_shopcar_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT AS `购物时间`,
  `slsh_picture` varchar(255) DEFAULT NULL,
  `slsh_spec` varchar(500) DEFAULT NULL COMMENT AS `规格`,
  `slsh_tel` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购物车';

-- --------------------------------------------------------

--
-- 表的结构 `slsh_user`
--

CREATE TABLE `slsh_user` (
  `slsh_userid` int(11) NOT NULL,
  `slsh_username` varchar(50) DEFAULT NULL COMMENT AS `用户名`,
  `slsh_password` char(32) NOT NULL COMMENT '密码',
  `slsh_type` int(3) NOT NULL DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `slsh_user`
--

INSERT INTO `slsh_user` (`slsh_userid`, `slsh_username`, `slsh_password`, `slsh_type`, `slsh_tel`, `slsh_permissions`, `slsh_grade`, `slsh_level`, `slsh_sex`, `slsh_brithday`, `slsh_email`, `slsh_regtime`, `slsh_lasttime`, `slsh_ip`, `slsh_picture`, `slsh_goodid`, `slsh_addressid`, `slsh_shopcarid`, `slsh_moneyid`, `slsh_itemsid`) VALUES
(7, '刺溜刺溜', 'e10adc3949ba59abbe56e057f20f883e', 1, '18801084842', 2, 0, '1', '0', '1992-04-27', 'zhangzeping01@163.com', '2016-12-08 09:20:29', NULL, 2130706433, '/static/goodimg/20161215/068040d9759cc1ec90ec0864b3ccd3a4.jpg', NULL, NULL, NULL, NULL, NULL),
(8, '哧溜哧溜', 'e10adc3949ba59abbe56e057f20f883e', 1, '15762575070', 1, 0, '1', '3', '1992-04-27', '23333', '2016-12-08 13:33:40', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(9, '18363835295', 'e10adc3949ba59abbe56e057f20f883e', 1, '18363835295', 1, 0, '1', '3', NULL, NULL, '2016-12-08 14:37:28', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(10, '18363835285', 'e10adc3949ba59abbe56e057f20f883e', 0, '18363835285', 1, 0, '1', '3', NULL, NULL, '2016-12-08 15:40:27', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(11, '13355277889', 'e10adc3949ba59abbe56e057f20f883e', 1, '13355277889', 1, 0, '1', '3', NULL, NULL, '2016-12-08 16:21:03', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(13, '13655555555', 'e10adc3949ba59abbe56e057f20f883e', 0, '13655555555', 1, 0, '1', '3', NULL, NULL, '2016-12-09 11:12:58', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(16, '15633333333', 'e10adc3949ba59abbe56e057f20f883e', 0, '15633333333', 1, 0, '1', '3', NULL, NULL, '2016-12-09 11:36:31', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(17, '13311111111', 'e10adc3949ba59abbe56e057f20f883e', 0, '13311111111', 1, 0, '1', '3', NULL, NULL, '2016-12-09 11:37:42', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(18, '18953318077', 'e10adc3949ba59abbe56e057f20f883e', 0, '18953318077', 1, 0, '1', '3', NULL, NULL, '2016-12-13 14:51:30', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL),
(19, '13153673253', 'e10adc3949ba59abbe56e057f20f883e', 0, '13153673253', 1, 0, '1', '3', NULL, NULL, '2016-12-14 14:15:17', NULL, 2130706433, '/static/Reception/Picture/head.png', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slsh_bigplate`
--
ALTER TABLE `slsh_bigplate`
  ADD PRIMARY KEY (`slsh_bid`);

--
-- Indexes for table `slsh_comment`
--
ALTER TABLE `slsh_comment`
  ADD PRIMARY KEY (`slsh_cid`);

--
-- Indexes for table `slsh_money`
--
ALTER TABLE `slsh_money`
  ADD PRIMARY KEY (`slsh_mid`);

--
-- Indexes for table `slsh_plate`
--
ALTER TABLE `slsh_plate`
  ADD PRIMARY KEY (`slsh_plateid`);

--
-- Indexes for table `slsh_shopcar`
--
ALTER TABLE `slsh_shopcar`
  ADD PRIMARY KEY (`slsh_sid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `slsh_address`
--
ALTER TABLE `slsh_address`
  MODIFY `slsh_addressid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `slsh_bigplate`
--
ALTER TABLE `slsh_bigplate`
  MODIFY `slsh_bid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `slsh_comment`
--
ALTER TABLE `slsh_comment`
  MODIFY `slsh_cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `slsh_goods`
--
ALTER TABLE `slsh_goods`
  MODIFY `slsh_goodid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `slsh_items`
--
ALTER TABLE `slsh_items`
  MODIFY `slsh_goodid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `slsh_money`
--
ALTER TABLE `slsh_money`
  MODIFY `slsh_mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- 使用表AUTO_INCREMENT `slsh_order`
--
ALTER TABLE `slsh_order`
  MODIFY `slsh_oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `slsh_plate`
--
ALTER TABLE `slsh_plate`
  MODIFY `slsh_plateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- 使用表AUTO_INCREMENT `slsh_shopcar`
--
ALTER TABLE `slsh_shopcar`
  MODIFY `slsh_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1250;
--
-- 使用表AUTO_INCREMENT `slsh_user`
--
ALTER TABLE `slsh_user`
  MODIFY `slsh_userid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
