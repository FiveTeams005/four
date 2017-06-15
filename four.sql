/*
Navicat MySQL Data Transfer

Source Server         : four
Source Server Version : 50554
Source Host           : 112.74.189.240:3306
Source Database       : four

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2017-06-15 13:19:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for f_address
-- ----------------------------
DROP TABLE IF EXISTS `f_address`;
CREATE TABLE `f_address` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_address` varchar(255) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL,
  `d_tel` char(32) DEFAULT NULL,
  `d_name` varchar(255) DEFAULT NULL,
  `d_status` int(4) NOT NULL DEFAULT '1',
  `d_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_address
-- ----------------------------
INSERT INTO `f_address` VALUES ('1', '厦门软件学院', '137', '1560695252', '冯诗凯', '2', '361000');
INSERT INTO `f_address` VALUES ('2', '厦门软件学院', '137', '1560695252', '冯诗凯', '1', '361000');
INSERT INTO `f_address` VALUES ('3', '厦门软件学院', '137', '1560695252', '冯诗凯', '1', '361000');
INSERT INTO `f_address` VALUES ('5', '厦门XXXXXX,我', '1', '1234567899', '陈大大', '2', '361000');
INSERT INTO `f_address` VALUES ('6', '厦门XXXXXX,好', '1', '1234567899', '陈大大', '1', '361000');
INSERT INTO `f_address` VALUES ('8', '厦门软件学院', '128', '1560695252', '冯诗凯', '1', '361000');
INSERT INTO `f_address` VALUES ('9', '厦门软件学院', '128', '1560695252', '冯诗凯', '1', '361000');
INSERT INTO `f_address` VALUES ('10', '厦门软件学院', '128', '1560695252', '冯诗凯', '1', '361000');
INSERT INTO `f_address` VALUES ('11', '厦门软件学院', '128', '1560695252', '冯诗凯', '2', '361000');
INSERT INTO `f_address` VALUES ('35', '北京市 东城区,传艺科技', '1', '18750590206', '刘梽', '1', null);
INSERT INTO `f_address` VALUES ('36', '福建省 福州市 鼓楼区,份', '1', '123', '放放风', '1', null);
INSERT INTO `f_address` VALUES ('37', '福建省 泉州市 洛江区,yeu', '129', '13405056666', '刘梽', '1', null);
INSERT INTO `f_address` VALUES ('38', '福建省 厦门市 思明区,软件园二期望海路56号传一科技', '129', '18750590206', '刘梽', '2', null);

-- ----------------------------
-- Table structure for f_auser
-- ----------------------------
DROP TABLE IF EXISTS `f_auser`;
CREATE TABLE `f_auser` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_account` varchar(32) DEFAULT NULL,
  `a_pwd` varchar(32) DEFAULT NULL,
  `a_nick` varchar(255) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `a_status` int(4) DEFAULT '1',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_auser
-- ----------------------------
INSERT INTO `f_auser` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '随风', '1', '1');
INSERT INTO `f_auser` VALUES ('2', 'zhangsan', '123', null, '2', '1');
INSERT INTO `f_auser` VALUES ('7', 'lisi', '123', null, '7', '1');
INSERT INTO `f_auser` VALUES ('10', 'zhouqi', 'e10adc3949ba59abbe56e057f20f883e', '周期', '7', '1');
INSERT INTO `f_auser` VALUES ('26', 'qqqqqq', 'e10adc3949ba59abbe56e057f20f883e', 'sssss', '9', '1');

-- ----------------------------
-- Table structure for f_bail
-- ----------------------------
DROP TABLE IF EXISTS `f_bail`;
CREATE TABLE `f_bail` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL,
  `j_status` int(4) DEFAULT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_bail
-- ----------------------------
INSERT INTO `f_bail` VALUES ('1', '41', '128', '1');
INSERT INTO `f_bail` VALUES ('2', '40', '1', '1');
INSERT INTO `f_bail` VALUES ('3', '40', '129', '1');
INSERT INTO `f_bail` VALUES ('4', '41', '1', '1');
INSERT INTO `f_bail` VALUES ('5', '40', '132', '1');

-- ----------------------------
-- Table structure for f_banner
-- ----------------------------
DROP TABLE IF EXISTS `f_banner`;
CREATE TABLE `f_banner` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_src` varchar(255) DEFAULT NULL,
  `g_status` int(4) DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_banner
-- ----------------------------

-- ----------------------------
-- Table structure for f_chat
-- ----------------------------
DROP TABLE IF EXISTS `f_chat`;
CREATE TABLE `f_chat` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_h_id` int(11) DEFAULT NULL,
  `t_h_id` int(11) DEFAULT NULL,
  `l_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `l_message` varchar(255) DEFAULT NULL,
  `l_status` int(4) DEFAULT NULL,
  `n_id` int(4) DEFAULT '0',
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_chat
-- ----------------------------
INSERT INTO `f_chat` VALUES ('170', '129', '128', '2017-06-07 11:30:48', '&lt;img src=&quot;/Public/Home/img/face/mr/2.gif&quot;&gt;', '1', '100');
INSERT INTO `f_chat` VALUES ('171', '128', '129', '2017-06-07 11:31:58', '。。。。', '1', '100');
INSERT INTO `f_chat` VALUES ('172', '129', '128', '2017-06-07 14:11:49', '&lt;img src=&quot;/Public/Home/img/face/mr/9.gif&quot;&gt;', '1', '100');
INSERT INTO `f_chat` VALUES ('173', '129', '128', '2017-06-07 14:11:50', '&lt;img src=&quot;/Public/Home/img/face/mr/9.gif&quot;&gt;', '1', '100');
INSERT INTO `f_chat` VALUES ('174', '129', '128', '2017-06-07 14:12:07', '在吗', '1', '100');
INSERT INTO `f_chat` VALUES ('175', '129', '128', '2017-06-07 14:12:08', '在吗', '1', '100');
INSERT INTO `f_chat` VALUES ('176', '129', '128', '2017-06-07 14:12:18', '在', '1', '100');
INSERT INTO `f_chat` VALUES ('177', '128', '129', '2017-06-07 14:12:41', '就是你回电话', '1', '100');
INSERT INTO `f_chat` VALUES ('178', '1', '129', '2017-06-07 14:25:10', '你好', '1', '96');
INSERT INTO `f_chat` VALUES ('179', '129', '1', '2017-06-07 14:25:46', '好', '1', '96');
INSERT INTO `f_chat` VALUES ('180', '129', '1', '2017-06-07 14:25:54', '&lt;img src=&quot;/Public/Home/img/face/mr/0.gif&quot;&gt;', '1', '96');
INSERT INTO `f_chat` VALUES ('181', '1', '129', '2017-06-07 14:26:05', '&lt;img src=&quot;/Public/Home/img/face/mr/2.gif&quot; style=&quot;-webkit-touch-callout: none; -webkit-user-select: none;&quot;&gt;东西不错', '1', '96');

-- ----------------------------
-- Table structure for f_classify
-- ----------------------------
DROP TABLE IF EXISTS `f_classify`;
CREATE TABLE `f_classify` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(20) NOT NULL DEFAULT '' COMMENT '商品分类名称',
  `c_pId` int(11) NOT NULL DEFAULT '0',
  `c_disable` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_classify
-- ----------------------------
INSERT INTO `f_classify` VALUES ('1', '数码', '0', '0');
INSERT INTO `f_classify` VALUES ('2', '户外', '0', '0');
INSERT INTO `f_classify` VALUES ('3', '服饰', '0', '0');
INSERT INTO `f_classify` VALUES ('4', '家具', '0', '0');
INSERT INTO `f_classify` VALUES ('5', '手表', '0', '0');
INSERT INTO `f_classify` VALUES ('6', '箱包', '0', '0');
INSERT INTO `f_classify` VALUES ('7', '家电', '0', '0');
INSERT INTO `f_classify` VALUES ('8', '玩具', '0', '0');

-- ----------------------------
-- Table structure for f_huser
-- ----------------------------
DROP TABLE IF EXISTS `f_huser`;
CREATE TABLE `f_huser` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_account` varchar(32) NOT NULL DEFAULT '',
  `h_pwd` varchar(32) NOT NULL DEFAULT '',
  `h_nick` varchar(255) NOT NULL DEFAULT '',
  `h_head` varchar(255) NOT NULL DEFAULT '',
  `h_sex` int(4) NOT NULL DEFAULT '1',
  `h_tel` bigint(13) NOT NULL DEFAULT '0',
  `h_email` varchar(80) NOT NULL DEFAULT '',
  `openid` varchar(32) NOT NULL DEFAULT '',
  `h_regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `h_money` double NOT NULL DEFAULT '0',
  `h_status` int(4) NOT NULL DEFAULT '1',
  `h_paypwd` varchar(32) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `h_grade` int(4) NOT NULL DEFAULT '1',
  `h_honor` int(4) NOT NULL DEFAULT '5',
  `h_loginlasttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `h_loginlongitude` varchar(255) NOT NULL DEFAULT '',
  `h_loginlatitude` varchar(255) NOT NULL DEFAULT '',
  `h_add` varchar(255) NOT NULL DEFAULT '',
  `h_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_huser
-- ----------------------------
INSERT INTO `f_huser` VALUES ('1', '', '', '黑牛', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJBDRPQP0grMbelxibjdFmXKKd0JKLgJacuv0OMUeibAcVP070pfD1Ynaib1Zzq8NUQiaGttht2hhpcBA/0', '1', '18659598549', '111111@qq.com', 'or_nQwbl83fSgnYV_6vIXhrv348E', '2017-05-31 18:45:50', '320', '1', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', '2017-06-13 18:25:14', '118.9097', '25.13081', '泉州市', '0');
INSERT INTO `f_huser` VALUES ('22', '', '', 'JP', 'http://wx.qlogo.cn/mmopen/IJdPq631CVHyW4uk0vLzWwvTDLrrfXwiaOLlwU3n3y1IUDMgueueGDRNWclQgich74bbOdtIYLL9UgeDoCC8EqME4VWgHibt408/0', '1', '0', '', 'or_nQwdGCdL2g1P7DP881DmV62kc', '2017-05-28 14:21:14', '1000', '1', 'e10adc3949ba59abbe56e057f20f883e', '2', '5', '2017-05-25 22:38:18', '', '', '', '0');
INSERT INTO `f_huser` VALUES ('128', '', '', '志伟', 'http://wx.qlogo.cn/mmopen/VvTjjPmqIwpDEtLuGnjgn638oc8aOnWPNibBO9HmCia3sOQITTgqlpfEWA9q2hiaxQsIoCFL7AFYTKPsranhBbe2IhNPaL9BUjU/0', '1', '111', '', 'or_nQweP0AgLc1chQZ5EoVcKuhpk', '2017-05-31 08:13:20', '950', '1', 'e10adc3949ba59abbe56e057f20f883e', '3', '5', '2017-06-14 20:30:23', '118.08305', '24.60385', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('129', '', '', '刘梽', 'http://wx.qlogo.cn/mmopen/R81vymQVzOnictXnsoGZTf5ZicROCKcgqS5z5FI9Ou7q7IkWJzRZUsq7nh5q5bqHvNVU90xwSahh16cQN2Uq4OIg/0', '1', '18750590206', '727751846@qq.com', 'or_nQwRDYiW8P17gCJAS6k31G1S4', '2017-05-28 14:21:14', '471', '0', 'e10adc3949ba59abbe56e057f20f883e', '2', '5', '2017-06-12 14:45:02', '118.04015', '24.485676', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('132', '', '', 'KLSXSY', 'http://wx.qlogo.cn/mmopen/VvTjjPmqIwpDEtLuGnjgn3kYpNGfMkbUJb8xe791oeQbibV5B053icuAMkznU6EOPIkXAQ440REHnypPu6PCeDaJFY8LJBoxfs/0', '1', '0', '', 'or_nQwWI-atOZWSAI3aE9_9Q8XJQ', '2017-05-31 16:56:41', '500', '1', 'e10adc3949ba59abbe56e057f20f883e', '5', '5', '2017-06-11 21:10:22', '118.911', '25.18908', '泉州市', '0');
INSERT INTO `f_huser` VALUES ('137', '', '', '世人皆醒唔独醉', 'http://wx.qlogo.cn/mmopen/IJdPq631CVHyW4uk0vLzW6znKyFAw8YjnjUPB4EedpjPmtELOXSNQbTF7fr3zUd294icDleprjdqSCrs4BXhggmHsVfj6baS8/0', '1', '0', '', 'or_nQwfA8BwI88M-07ArwumwgbKU', '2017-05-31 16:08:36', '1000', '1', 'e10adc3949ba59abbe56e057f20f883e', '6', '5', '2017-06-13 15:07:43', '118.1038', '24.51041', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('141', '', '', 'zb', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLCu9giaHe8fe4xMfDiavQTViaBXwEoHtNcfqe4tgzaDatPXhpVCouE5jrpm3hbbwFGk4jKkfIGqRAIIg/0', '1', '13252547896', '', 'or_nQwY_9o9wcr0EEoVBJcwbI0SI', '2017-05-31 17:29:58', '1000', '1', 'e10adc3949ba59abbe56e057f20f883e', '9', '5', '2017-06-07 16:23:08', '118.1814', '24.48546', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('144', '', '', '陈一鸣', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJFI5oa3AiabFK0pmCbrRjqibnjxohckuB4fJyJblgjyKM8BkCQWYONgnjAdPsUwvzC3EHw5y25bWwg/0', '1', '1111111111', '', 'or_nQwamSN6HbRfzjFztUpeJWJNk', '2017-06-03 17:05:57', '1000', '1', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', '2017-06-07 15:22:50', '118.18257', '24.485514', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('145', '', '', '大白菜', 'http://wx.qlogo.cn/mmopen/fIdOxmAOhccCrsAy8OjBOysa6pI1QqMhDAddCGmajlSHE82Xt0Kwj7etBJ6L62O3YFniaCBB1YRtZuVW5hbmIf9u98qqUoL7a/0', '2', '15080449305', '', 'or_nQwVvZttVz0MVF27Jukj3tgCo', '2017-06-07 10:26:41', '1000', '1', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', '2017-06-07 16:21:51', '118.1816', '24.48537', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('146', '', '', 'WingTse', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLAuCLKn26LsDDLBcXKNQibPMNG1yLhnwFntOA5f3ewlvs9C2mTjYTKgWcSDqUw89Zu2uc4nMl6SX9A/0', '1', '15960018684', '', 'or_nQwdLfKoxAQVxw5HYxgMBwMwg', '2017-06-07 11:55:25', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', '2017-06-13 18:25:48', '118.14956', '24.496967', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('147', '', '', '华熠', 'http://wx.qlogo.cn/mmopen/VvTjjPmqIwpDEtLuGnjgn4ALkgs0U5Dwhc9whWy4j7pUp94bY9cJbKjgoa2JNKJ6QiaEKpWJBlC0qlWzjwwUfJ7gwNcEibaGIc/0', '1', '0', '', 'or_nQwUxz-PFYIW4ZUciVKxUD6dE', '2017-06-07 16:25:01', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', '2017-06-07 16:25:46', '118.1826', '24.48523', '厦门市', '0');
INSERT INTO `f_huser` VALUES ('148', '', '', 'Osu', 'http://wx.qlogo.cn/mmopen/R81vymQVzOm09XR87hic588vlEib4hW0YCzrLm2sUvefWKxDicKiaJSoB5q2SbzgattNSpHhnHeGdfG8w6s8lS6RbQ/0', '1', '0', '', 'or_nQwReiCLDUapvUS3MGgJu4z88', '2017-06-09 14:20:48', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', '2017-06-09 14:20:48', '', '', '', '0');
INSERT INTO `f_huser` VALUES ('149', '', '', '崇庆培', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBb6lOMx4Ny98OcuzH1v912xek8Gib1WH8EQrPPlBQLEPDq6JNFGaXmI0mUwZibNKNTSb1ymHxABuibw/0', '1', '0', '', 'or_nQwRRv9cVRZJW234m1WeKPFPo', '2017-06-14 10:08:19', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', '1', '5', '2017-06-14 10:08:19', '121.3794', '31.17798', '上海市', '0');

-- ----------------------------
-- Table structure for f_images
-- ----------------------------
DROP TABLE IF EXISTS `f_images`;
CREATE TABLE `f_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_id` int(11) DEFAULT '0',
  `n_img` varchar(255) DEFAULT '1',
  `p_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_images
-- ----------------------------
INSERT INTO `f_images` VALUES ('89', '91', 'http://eh.liuzhi66.top/upimg/ET2Jz2kvaa1zV4Gm-x37e1tXMhP-7Sis4fwahHUH_qau7g3kmZBFn8E3EqO8Kyo2.jpg', '0');
INSERT INTO `f_images` VALUES ('90', '91', 'http://eh.liuzhi66.top/upimg/AAvE8N7dGh8fkmYi5EH9mh_6qUE_tPhALHvckiXmy2YIjHcMcI85Vca5qjenemyG.jpg', '0');
INSERT INTO `f_images` VALUES ('91', '91', 'http://eh.liuzhi66.top/upimg/SdFPoU-r1tNHOL6YFUNaK5ku8kZzLw80NNu4FYPqeAbpj7KsqojtL_wpsQS2V_yM.jpg', '0');
INSERT INTO `f_images` VALUES ('92', '91', 'http://eh.liuzhi66.top/upimg/v-q82PpvS_KhMw6VUcof_OL36eDPI8d9XuPDnpVA39Il5DNa0XOH8ZRWNEmbMKVR.jpg', '0');
INSERT INTO `f_images` VALUES ('93', '92', 'http://eh.liuzhi66.top/upimg/LgTaoGRlfvwotnGHKJrDPhgjYOvVk0qSIJa_7315hzSy0NlJBJDLA1bcTotr6Z-m.jpg', '0');
INSERT INTO `f_images` VALUES ('94', '92', 'http://eh.liuzhi66.top/upimg/OP17J0PMl2sBvYcqNxBQsVpc0AzvwkUdpvYe56hj0ly9swZrVaFXftvG0Ph0nJ6V.jpg', '0');
INSERT INTO `f_images` VALUES ('95', '92', 'http://eh.liuzhi66.top/upimg/-gBp_1X-2SfQZhwrclt6B7XtD6ya3pUWfsVlSktMO0HmFOs8FZrP3bbGbskdjIyL.jpg', '0');
INSERT INTO `f_images` VALUES ('96', '92', 'http://eh.liuzhi66.top/upimg/L6-x1kgigqrlonDnO1qEb6XyGxmT1hiX6FHni6i03bL5GndTsKxl8QUAa2vyz8lf.jpg', '0');
INSERT INTO `f_images` VALUES ('97', '93', 'http://eh.liuzhi66.top/upimg/FVo9lNDxd9C2Xtbo-NuFT-Nx-pzpPj3zlDENheWrV22ywi3rwoaIUlqlpnUNCfxH.jpg', '0');
INSERT INTO `f_images` VALUES ('98', '93', 'http://eh.liuzhi66.top/upimg/SeBf0jf-dAGfmUnGRHJhZSg118djNTATD2v55Ha-v8b2HhdvQq7fk29IVkU4LY09.jpg', '0');
INSERT INTO `f_images` VALUES ('99', '93', 'http://eh.liuzhi66.top/upimg/eaugk_5vmm3fQxSbXIIljt2_xAJBHJCauAhs3kdAqfFuqVsOlKoeLvLMrURYwlML.jpg', '0');
INSERT INTO `f_images` VALUES ('100', '94', 'http://eh.liuzhi66.top/upimg/SYVZHlBYnuyEIWHq7Mi_lr98AeZgy5FFKfboGNbePJVZwoLpWzi_QWY_cnriskyP.jpg', '0');
INSERT INTO `f_images` VALUES ('101', '95', 'http://eh.liuzhi66.top/upimg/hXG-p5yc6aF6yPB06I7b0cdhlnXWuywCbeOyA5990gFplgJ8xpfRg5ZKiCq_6JRG.jpg', '0');
INSERT INTO `f_images` VALUES ('102', '95', 'http://eh.liuzhi66.top/upimg/wSti36eCximuncajtQrKtEi1aLaXICVa2sqDWaNTfIcKQQilDXX4z8sJd491w8h-.jpg', '0');
INSERT INTO `f_images` VALUES ('103', '95', 'http://eh.liuzhi66.top/upimg/4AiMlkAbzMIeYpxh5kMyS-NCGWDEip9MS-7tnz-cOT4nbBafYxrGS163u2MOaIp4.jpg', '0');
INSERT INTO `f_images` VALUES ('104', '95', 'http://eh.liuzhi66.top/upimg/qRGtqCWyIOlYpQeKU2wD3rvtgUDhYQSflFoNMjQRiGuyyk-3ZQcbDrMuhZjH0GNr.jpg', '0');
INSERT INTO `f_images` VALUES ('105', '96', 'http://eh.liuzhi66.top/upimg/YEwGWoyt5E5aMB5a7cH01-kPTbfqbls0dDTsXO_pHfAZVifXeALNuKrIdkrDixZI.jpg', '0');
INSERT INTO `f_images` VALUES ('106', '96', 'http://eh.liuzhi66.top/upimg/JzVA2NY28xTnAkPQ3oeuIqwz-zAQ2sBa3iJ87Zi4s1runtvAW4rOuDXtCKqV8lpZ.jpg', '0');
INSERT INTO `f_images` VALUES ('107', '97', 'http://eh.liuzhi66.top/upimg/rK1ZEZjUksYY3wdoDa_QbjUB6vGkNdwUxX6vRLEqIXolWM32gFCDAyjQe3R3XyeL.jpg', '0');
INSERT INTO `f_images` VALUES ('108', '97', 'http://eh.liuzhi66.top/upimg/M5HbCY-uU6EMB16iWEeDT8jf-KiA_JtN3teeOT85d9PxHx1dps4_5nxPPy61KzXZ.jpg', '0');
INSERT INTO `f_images` VALUES ('109', '97', 'http://eh.liuzhi66.top/upimg/bkJt8phUGQyH4xgPM83nONzbbWUObuv-E3Zt_UixbYCq88pIWLIcuDrhi7EXst3F.jpg', '0');
INSERT INTO `f_images` VALUES ('110', '98', 'http://eh.liuzhi66.top/upimg/-gBp_1X-2SfQZhwrclt6B4PvqGI4-LalQDtp_RShjHzJLgAdaTNNOHa3P-JCtfXD.jpg', '0');
INSERT INTO `f_images` VALUES ('111', '98', 'http://eh.liuzhi66.top/upimg/UvEWgjU7Zqim5KYfVCLF3Hg_DXqLUZHEgu6u7wg1Oi4KBWPdz80eXXx0rmjsUjA0.jpg', '0');
INSERT INTO `f_images` VALUES ('112', '99', 'http://eh.liuzhi66.top/upimg/D_35JSfCgawgzad8u3Q6KjXdjOOFK-nk8JWH8IkCZ95S1VyaZjVEagKZz5WpGCOv.jpg', '0');
INSERT INTO `f_images` VALUES ('113', '99', 'http://eh.liuzhi66.top/upimg/3z91Xr9ATyy0r39qB1JiRKDSYKKAV3jDotg5n5bU_gACFhW8UBlLr275Kg7PPLZv.jpg', '0');
INSERT INTO `f_images` VALUES ('114', '99', 'http://eh.liuzhi66.top/upimg/IYXIEUy8t0Gafrlmu6ciD0VPWcb0IcwYJ03py2M2Cv9McJU99y9F54h27HpVdPuN.jpg', '0');
INSERT INTO `f_images` VALUES ('115', '100', 'http://eh.liuzhi66.top/upimg/Wtc8oFFVC5ZTEQCKNdVHrUTyMlS46ogogb0vH6QmXoJcbjPNunHSrtgioEABJz_R.jpg', '0');
INSERT INTO `f_images` VALUES ('116', '100', 'http://eh.liuzhi66.top/upimg/WVblX5Qx0jiEwG86zMZ9iyKqHC3By-Gq6QbBkShF8vkcM_xB2kNWHboptZAJ9lH2.jpg', '0');
INSERT INTO `f_images` VALUES ('117', '100', 'http://eh.liuzhi66.top/upimg/llLCbLbOwa_gviZkPa2n2fkGN_ou0GEh2z9DbCj3eZAWwMvXdU70xKl7ftyT1WD1.jpg', '0');
INSERT INTO `f_images` VALUES ('118', '101', 'http://eh.liuzhi66.top/upimg/tHmmJswCQqJmKxtY7ehDzcM46a6gZsJxprdH81ACYLgdgL9ljv-RfKX2PuImqpe1.jpg', '0');
INSERT INTO `f_images` VALUES ('119', '101', 'http://eh.liuzhi66.top/upimg/XekIjLvQH_Qb6DRKdd4xCqoUli3MTyKKaSuifcnqnbtBQb5Kj-Y12kVcMMdKSMX4.jpg', '0');
INSERT INTO `f_images` VALUES ('120', '101', 'http://eh.liuzhi66.top/upimg/GBjX9C6vTbkopZAwY7xfnt4J_UTutbCl1C-Ml7zIuocun6bH1qdMGdF6PaKOHB6M.jpg', '0');
INSERT INTO `f_images` VALUES ('121', '102', 'http://eh.liuzhi66.top/upimg/1UrhCwH0I1-xX2j-W8MbP5xRmTotdDeBDjQb3S8BN73e0hhMomK-rOiaDiZSGc3F.jpg', '0');
INSERT INTO `f_images` VALUES ('122', '102', 'http://eh.liuzhi66.top/upimg/8ust3tBzKNmqmn8xdj8D6wRfOcX15RZGBVG1MuNdcqPfV3wLnJ8XfpOBbNZJrpgc.jpg', '0');
INSERT INTO `f_images` VALUES ('123', '102', 'http://eh.liuzhi66.top/upimg/RFIj9Ia9rupu94s25vQMSJRlS-aZXBvQmcBenWFU4Y61snBCjm_bOzioFQ5BsB4T.jpg', '0');
INSERT INTO `f_images` VALUES ('124', '0', 'http://eh.liuzhi66.top/upimg/WNVhMt7L5oepTGlNAaZzcEBxJDKXY_WYqL6ixeU8vQ9W5HccY2oDorXR_Xct5Ds3.jpg', '39');
INSERT INTO `f_images` VALUES ('125', '103', 'http://eh.liuzhi66.top/upimg/3yUl5p67KVxVSVpvRDFakAQCAr2ad30UJ9bS3ghCg34r87bM6a8CAKrd09K6_NcK.jpg', '0');
INSERT INTO `f_images` VALUES ('126', '104', 'http://eh.liuzhi66.top/upimg/9uj6mUbbhPwrQvx7JsGCke_vIR63N3zhynf-k1bbxcM9vOBOV7h8Qd6gKEyIQ7Xj.jpg', '0');
INSERT INTO `f_images` VALUES ('127', '0', 'http://eh.liuzhi66.top/upimg/FB10r8a57d96PX6E1R60JkHBkKCkxlAHkQ69jYZM1q8bCpm79UBjveO27RPpDvub.jpg', '40');
INSERT INTO `f_images` VALUES ('128', '105', 'http://eh.liuzhi66.top/upimg/meNE2A6w-ti7qGYo9IzFaVWlq6SKCvZqyTX6jtuJyC9YPfM4KiLavp1dSObH52bi.jpg', '0');
INSERT INTO `f_images` VALUES ('129', '0', 'http://eh.liuzhi66.top/upimg/jLPcKKmHhph7yItOsORlocJIhFyT7wGnWo8khqrysflFhteg2YiHoUom-ytAoWgP.jpg', '41');
INSERT INTO `f_images` VALUES ('130', '106', 'http://eh.liuzhi66.top/upimg/QxwWi3Hz-QaKHt8BzrnjRkwVetKNiyaMSTYboHAkHvlmQXm586kFARfn7cFFd6ZM.jpg', '0');
INSERT INTO `f_images` VALUES ('131', '106', 'http://eh.liuzhi66.top/upimg/nxOMH_9zWfH-hcIgmPN61KwL-w8KF3g99nDGmDkkwOVPE3Jm5T72DoT4EPkfORYs.jpg', '0');
INSERT INTO `f_images` VALUES ('132', '106', 'http://eh.liuzhi66.top/upimg/LA2TR-a-3mNvbi5S1wtymTQypSpF9BmnkVtmjXrKv9MtIW5W-rUpvfJU8TVovmWW.jpg', '0');

-- ----------------------------
-- Table structure for f_log
-- ----------------------------
DROP TABLE IF EXISTS `f_log`;
CREATE TABLE `f_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL DEFAULT '0' COMMENT '操作用户',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '操作时间',
  `manipulation` varchar(255) NOT NULL DEFAULT '' COMMENT '操作行为',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_log
-- ----------------------------
INSERT INTO `f_log` VALUES ('86', '1', '2017-06-07 13:46:48', '登录了后台管理系统');
INSERT INTO `f_log` VALUES ('87', '1', '2017-06-07 14:05:44', '登录了后台管理系统');
INSERT INTO `f_log` VALUES ('88', '1', '2017-06-07 14:09:59', '登录了后台管理系统');
INSERT INTO `f_log` VALUES ('89', '1', '2017-06-07 15:26:53', '审核通过了普通商品:你好');
INSERT INTO `f_log` VALUES ('90', '1', '2017-06-08 12:11:36', '登录了后台管理系统');

-- ----------------------------
-- Table structure for f_menu
-- ----------------------------
DROP TABLE IF EXISTS `f_menu`;
CREATE TABLE `f_menu` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) DEFAULT NULL,
  `b_pid` int(11) DEFAULT NULL,
  `b_path` varchar(255) DEFAULT NULL,
  `b_disable` int(4) DEFAULT '1',
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_menu
-- ----------------------------
INSERT INTO `f_menu` VALUES ('1', '商品管理', '0', '', '1');
INSERT INTO `f_menu` VALUES ('2', '订单管理', '0', null, '1');
INSERT INTO `f_menu` VALUES ('3', '用户管理', '0', null, '1');
INSERT INTO `f_menu` VALUES ('4', '信息通知', '0', null, '1');
INSERT INTO `f_menu` VALUES ('5', '系统设置', '0', null, '1');
INSERT INTO `f_menu` VALUES ('6', '普通商品列表', '1', '/index.php?m=Admin&c=Ngoods&a=ngoods', '1');
INSERT INTO `f_menu` VALUES ('7', '拍卖商品列表', '1', '/index.php?m=Admin&c=Pgoods&a=pgoods', '1');
INSERT INTO `f_menu` VALUES ('8', '角色列表', '5', '/index.php?m=Admin&c=Role&a=roleList', '1');
INSERT INTO `f_menu` VALUES ('9', '前台用户管理', '3', '/index.php?m=Admin&c=Huser&a=huser', '1');
INSERT INTO `f_menu` VALUES ('10', '后台用户管理', '3', '/index.php?m=Admin&c=Auser&a=auser', '1');
INSERT INTO `f_menu` VALUES ('11', '订单列表', '2', '/index.php?m=Admin&c=Order&a=order', '1');
INSERT INTO `f_menu` VALUES ('12', '普通商品审核', '1', '/index.php?m=Admin&c=PendGoods&a=nPendGoods', '1');
INSERT INTO `f_menu` VALUES ('13', '拍卖商品审核', '1', '/index.php?m=Admin&c=PendGoods&a=pPendGoods', '1');
INSERT INTO `f_menu` VALUES ('14', '客服', '4', '/index.php/Admin/Chat/chat', '1');
INSERT INTO `f_menu` VALUES ('15', '日志', '5', '/index.php?m=Admin&c=Log&a=log', '1');
INSERT INTO `f_menu` VALUES ('16', '报表', '5', '/index.php?m=Admin&c=Report&a=report', '1');

-- ----------------------------
-- Table structure for f_message
-- ----------------------------
DROP TABLE IF EXISTS `f_message`;
CREATE TABLE `f_message` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_id` int(11) DEFAULT '0',
  `p_id` int(11) DEFAULT '0',
  `m_message` varchar(255) DEFAULT NULL,
  `m_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `h_id` int(11) DEFAULT NULL COMMENT '发送人的id',
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_message
-- ----------------------------
INSERT INTO `f_message` VALUES ('10', '100', '0', '在吗', '2017-06-07 11:23:11', '1');
INSERT INTO `f_message` VALUES ('11', '100', '0', '能便宜点吗', '2017-06-07 11:30:23', '129');
INSERT INTO `f_message` VALUES ('12', '98', '0', '很赞额，便宜点吧', '2017-06-07 12:32:04', '1');
INSERT INTO `f_message` VALUES ('13', '98', '0', '凤飞飞', '2017-06-07 13:45:54', '128');
INSERT INTO `f_message` VALUES ('14', '105', '0', '在吗', '2017-06-07 14:25:13', '129');
INSERT INTO `f_message` VALUES ('15', '0', '41', '真枪吗', '2017-06-07 14:42:08', '129');
INSERT INTO `f_message` VALUES ('16', '0', '41', '给我来一只', '2017-06-07 14:42:42', '128');
INSERT INTO `f_message` VALUES ('17', '0', '41', '给你来一发', '2017-06-07 14:42:55', '128');
INSERT INTO `f_message` VALUES ('18', '0', '40', '你好', '2017-06-07 15:13:58', '1');
INSERT INTO `f_message` VALUES ('19', '0', '41', '给我来十个', '2017-06-07 16:27:37', '147');
INSERT INTO `f_message` VALUES ('20', '0', '41', '给我来一打', '2017-06-13 13:41:51', '137');

-- ----------------------------
-- Table structure for f_msglist
-- ----------------------------
DROP TABLE IF EXISTS `f_msglist`;
CREATE TABLE `f_msglist` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id1` int(5) DEFAULT NULL,
  `h_id2` int(5) DEFAULT NULL,
  `n_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_msglist
-- ----------------------------
INSERT INTO `f_msglist` VALUES ('23', '1', '128', '100');
INSERT INTO `f_msglist` VALUES ('24', '129', '128', '100');
INSERT INTO `f_msglist` VALUES ('25', '1', '128', '98');
INSERT INTO `f_msglist` VALUES ('26', '1', '129', '95');
INSERT INTO `f_msglist` VALUES ('27', '1', '129', '96');
INSERT INTO `f_msglist` VALUES ('28', '1', '144', '104');

-- ----------------------------
-- Table structure for f_ngoods
-- ----------------------------
DROP TABLE IF EXISTS `f_ngoods`;
CREATE TABLE `f_ngoods` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_name` varchar(255) DEFAULT NULL,
  `n_info` varchar(255) DEFAULT NULL,
  `n_status` int(4) DEFAULT '2',
  `n_price` double DEFAULT NULL,
  `n_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `n_praise` int(11) DEFAULT '0',
  `h_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lng` varchar(15) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_ngoods
-- ----------------------------
INSERT INTO `f_ngoods` VALUES ('91', '儿童小熊温暖的狗熊居家旅行好伙伴', '毛茸茸', '1', '90', '2017-06-07 10:20:40', '0', '129', '8', '24.335065', '118.251625', '厦门市');
INSERT INTO `f_ngoods` VALUES ('92', '95新洗衣机海尔耐用八百出', '非常4好用的一款洗衣机', '1', '800', '2017-06-07 10:25:49', '0', '129', '7', '24.495079', '118.18163', '厦门市');
INSERT INTO `f_ngoods` VALUES ('93', '出售闲置格兰仕微波炉', '出售闲置格兰仕微波炉，从到手到现在一直闲置着，同城可面交', '1', '399', '2017-06-07 10:32:28', '0', '129', '7', '24.485079', '118.18163', '厦门市');
INSERT INTO `f_ngoods` VALUES ('94', '闲置积木玩具', '很好玩的哦', '1', '30', '2017-06-07 10:39:06', '0', '129', '8', '24.485079', '118.18163', '厦门市');
INSERT INTO `f_ngoods` VALUES ('95', '小孩都爱玩的摇摇木马，童年的快乐回忆摇摇更健康', '很好玩的木马，多种颜色', '4', '80', '2017-06-07 10:41:59', '0', '129', '8', '24.485079', '118.18163', '厦门市');
INSERT INTO `f_ngoods` VALUES ('96', '卡西欧TR150手表95新时尚时尚最时尚', '拒绝小刀', '1', '950', '2017-06-07 10:47:59', '0', '129', '5', '24.48508', '118.18177', '厦门市');
INSERT INTO `f_ngoods` VALUES ('97', '华为/Huawei P10', '华为/Huawei P10  9.9成新低价出售（●—●），预购从速！！！', '1', '1200', '2017-06-07 11:00:00', '0', '128', '1', '24.485079', '118.18163', '厦门市');
INSERT INTO `f_ngoods` VALUES ('98', 'MacBook Pro/苹果 商务笔记本电脑', 'MacBook Pro/苹果 13英寸商务笔记本电脑', '1', '6000', '2017-06-07 11:02:46', '0', '128', '1', '24.48508', '118.18162', '厦门市');
INSERT INTO `f_ngoods` VALUES ('99', 'The North Face北面男女户外登山包', 'The North Face北面男女户外登山包双肩背包CF05/A2UB/CHJ4/CLJ5 ', '1', '280', '2017-06-07 11:07:27', '0', '128', '2', '24.485079', '118.18163', '厦门市');
INSERT INTO `f_ngoods` VALUES ('100', '原始人烧烤架户外烧烤炉子碳烤炉木炭全套家用烧烤工具', '原始人烧烤架户外烧烤炉子碳烤炉木炭全套家用烧烤工具。实惠实用 适合一家人或者3、5好友出游家里使用，折叠便携，科学设计，使用简单，收纳携带很方便 冲量促销', '4', '30', '2017-06-07 11:15:53', '0', '128', '2', '24.485073', '118.18153', '厦门市');
INSERT INTO `f_ngoods` VALUES ('101', '新买牛仔裤', '新买的，一次都没穿。低价出售', '1', '50', '2017-06-07 12:09:36', '0', '1', '3', '24.48628', '118.1829', '厦门市');
INSERT INTO `f_ngoods` VALUES ('102', '新买裤子', '刚买的，太大了，穿不下，低价甩了！！', '1', '69', '2017-06-07 12:17:26', '0', '1', '3', '24.48623', '118.1829', '厦门市');
INSERT INTO `f_ngoods` VALUES ('104', 'NAVIE  iPhone 6s 手机壳', 'too young too navie!!', '4', '50', '2017-06-07 12:21:55', '0', '144', '1', '24.487082', '118.1833', '厦门市');
INSERT INTO `f_ngoods` VALUES ('105', '椅子甩卖', '办公椅子，疯狂甩卖', '0', '28', '2017-06-07 12:55:45', '0', '1', '4', '24.48522', '118.182', '厦门市');
INSERT INTO `f_ngoods` VALUES ('106', '你好', '哦Jul', '1', '25', '2017-06-07 15:23:24', '0', '1', '1', '24.48522', '118.1817', '厦门市');

-- ----------------------------
-- Table structure for f_order
-- ----------------------------
DROP TABLE IF EXISTS `f_order`;
CREATE TABLE `f_order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `n_id` int(11) DEFAULT '0' COMMENT '普通商品id',
  `p_id` int(11) DEFAULT '0' COMMENT '拍卖商品id',
  `d_id` int(11) DEFAULT '0' COMMENT '地址id',
  `h_id` int(11) DEFAULT '0' COMMENT '用户id',
  `o_money` double DEFAULT '0' COMMENT '支付金额',
  `o_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '下单时间',
  `o_ptime` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '购买时间',
  `o_status` int(4) DEFAULT '1' COMMENT '订单状态(0:订单失效 1:未支付 2:已支付 3:已发货 4:已收货 5:交易成功)',
  `o_stime` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发货时间',
  `o_rtime` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '确认收货时间',
  `o_number` bigint(18) DEFAULT '0' COMMENT '订单编号',
  `o_count` int(4) DEFAULT '0' COMMENT '购买数量',
  `h_id_m` varchar(4) DEFAULT '0',
  `o_add` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_order
-- ----------------------------
INSERT INTO `f_order` VALUES ('46', '100', '0', '1', '129', '30', '2017-06-07 11:31:45', '0000-00-00 00:00:00', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201706071131455739', '0', '128', '福建省&amp;nbsp;厦门市&amp;nbsp;思明区,软件园二期望海路56号传一科技 18750590206 刘梽');
INSERT INTO `f_order` VALUES ('47', '95', '0', '1', '1', '80', '2017-06-07 12:40:10', '0000-00-00 00:00:00', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201706071240102114', '0', '129', '厦门XXXXXX,我 1234567899 陈大大');
INSERT INTO `f_order` VALUES ('48', '104', '0', '0', '1', '50', '2017-06-07 15:20:46', '0000-00-00 00:00:00', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201706070320465413', '0', '144', '厦门XXXXXX,我 1234567899 陈大大');

-- ----------------------------
-- Table structure for f_pgoods
-- ----------------------------
DROP TABLE IF EXISTS `f_pgoods`;
CREATE TABLE `f_pgoods` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) DEFAULT NULL,
  `p_info` varchar(255) DEFAULT NULL,
  `p_status` int(4) DEFAULT '3',
  `p_bprice` double DEFAULT NULL,
  `p_eprice` double DEFAULT '0',
  `p_btime` timestamp NULL DEFAULT NULL,
  `p_etime` timestamp NULL DEFAULT NULL,
  `p_step` int(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL,
  `p_procedure` double DEFAULT '0',
  `c_id` int(11) DEFAULT NULL,
  `p_bail` double DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lng` varchar(15) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `p_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '拍卖商品发布时间',
  `p_hid` int(11) DEFAULT '0' COMMENT '参与拍卖 用户 的id',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_pgoods
-- ----------------------------
INSERT INTO `f_pgoods` VALUES ('40', '奔驰 300', '奔驰 300', '1', '10000', '10500', '2017-06-08 12:00:00', '2017-06-08 18:00:00', '100', '128', '0', '2', '500', '24.485079', '118.18163', '厦门市', '2017-06-07 12:33:30', '132');
INSERT INTO `f_pgoods` VALUES ('41', '索尼冲锋枪', '该商品实属罕见，速度拍下', '1', '1000', '1250', '2017-06-08 12:00:00', '2017-06-08 18:00:00', '50', '1', '0', '1', '50', '24.48553', '118.1816', '厦门市', '2017-06-07 13:04:33', '1');

-- ----------------------------
-- Table structure for f_praise
-- ----------------------------
DROP TABLE IF EXISTS `f_praise`;
CREATE TABLE `f_praise` (
  `z_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(11) DEFAULT NULL,
  `n_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`z_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_praise
-- ----------------------------
INSERT INTO `f_praise` VALUES ('14', '145', '91', null);
INSERT INTO `f_praise` VALUES ('15', '145', '92', null);
INSERT INTO `f_praise` VALUES ('18', '129', '100', null);
INSERT INTO `f_praise` VALUES ('19', '1', '98', null);
INSERT INTO `f_praise` VALUES ('22', '129', null, '40');
INSERT INTO `f_praise` VALUES ('23', '129', null, '41');
INSERT INTO `f_praise` VALUES ('25', '147', null, '41');

-- ----------------------------
-- Table structure for f_role
-- ----------------------------
DROP TABLE IF EXISTS `f_role`;
CREATE TABLE `f_role` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) DEFAULT NULL,
  `r_authority` varchar(255) DEFAULT NULL,
  `r_decribe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_role
-- ----------------------------
INSERT INTO `f_role` VALUES ('1', '超级管理员', '1,6,7,12,13,2,11,3,9,10,4,14,5,8,15,16', '拥有所有权限');
INSERT INTO `f_role` VALUES ('2', '经理', '1,6,7,2,3,9,10,4,5,8', '基本拥有所有权限');
INSERT INTO `f_role` VALUES ('7', '工作人员', '1,6,7,2', '拥有较少的权限');
INSERT INTO `f_role` VALUES ('9', '测试', '1,6,7,2,3,9,10,4,5,8', '拥有所有权限');

-- ----------------------------
-- Table structure for f_send
-- ----------------------------
DROP TABLE IF EXISTS `f_send`;
CREATE TABLE `f_send` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(11) DEFAULT NULL,
  `n_id` int(11) DEFAULT NULL,
  `s_money` double DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_send
-- ----------------------------

-- ----------------------------
-- Table structure for f_service
-- ----------------------------
DROP TABLE IF EXISTS `f_service`;
CREATE TABLE `f_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(4) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `falg` int(1) DEFAULT '2',
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of f_service
-- ----------------------------
INSERT INTO `f_service` VALUES ('33', '129', '&lt;img src=&quot;/Public/Home/img/face/mr/7.gif&quot;&gt;', '2017-06-07 10:18:09', '1', '2');
INSERT INTO `f_service` VALUES ('34', '129', '&lt;img src=&quot;/Public/Home/img/face/mr/0.gif&quot;&gt;', '2017-06-07 10:18:18', '1', '2');
INSERT INTO `f_service` VALUES ('35', '129', '\n					&lt;img src=&quot;/Public/Home/img/face/mr/10.gif&quot;&gt;', '2017-06-07 10:18:22', '1', '1');
INSERT INTO `f_service` VALUES ('36', '144', '\n					&lt;img src=&quot;/Public/Home/img/face/mr/5.gif&quot;&gt;', '2017-06-07 12:25:01', '2', '1');
INSERT INTO `f_service` VALUES ('37', '146', '\n					&lt;img src=&quot;/Public/Home/img/face/mr/1.gif&quot;&gt;', '2017-06-07 12:32:06', '2', '1');
INSERT INTO `f_service` VALUES ('38', '1', '111', '2017-06-07 13:41:09', '1', '2');
INSERT INTO `f_service` VALUES ('39', '128', '&lt;img src=&quot;/Public/Home/img/face/mr/16.gif&quot;&gt;', '2017-06-07 13:41:24', '1', '2');
INSERT INTO `f_service` VALUES ('40', '1', '快乐\n					', '2017-06-07 14:42:50', '1', '1');
INSERT INTO `f_service` VALUES ('41', '1', '你好', '2017-06-07 14:43:22', '1', '2');
INSERT INTO `f_service` VALUES ('42', '1', '就结', '2017-06-07 15:18:31', '1', '1');
INSERT INTO `f_service` VALUES ('43', '1', '你好&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '2017-06-07 15:18:41', '1', '2');
INSERT INTO `f_service` VALUES ('44', '137', '？？', '2017-06-13 15:09:28', '2', '1');
INSERT INTO `f_service` VALUES ('45', '137', '？？', '2017-06-13 15:09:35', '2', '1');
