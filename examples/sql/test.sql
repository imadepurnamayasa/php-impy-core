-- ----------------------------
-- Table structure for crud
-- ----------------------------
DROP TABLE IF EXISTS `crud`;
CREATE TABLE `crud`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
);

-- ----------------------------
-- Records of crud
-- ----------------------------
INSERT INTO `crud` VALUES (1, NULL);
INSERT INTO `crud` VALUES (2, '2024-02-08 01:04:18');
INSERT INTO `crud` VALUES (3, '2024-02-08 01:05:33');
INSERT INTO `crud` VALUES (4, '2024-02-08 01:05:55');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NULL DEFAULT NULL,
  `password` varchar(255) NULL DEFAULT NULL,
  `email` varchar(255) NULL DEFAULT NULL,
  `token` varchar(255) NULL DEFAULT NULL,
  `token_expired` datetime NULL DEFAULT NULL,
  `secret_key` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
);

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'johndoe', '$2y$10$swYHWOkOSp/5LDPALRmw7.55bz1a63efKFv51EbDFcq4Mxrp/x.ve', 'johndoe@example.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6ImpvaG5kb2UiLCJleHAiOjE3MTgyNDk2NjV9.3QXuCM2WbEiWQ2Sbqa136nP2p8k_ZqC8kw2jYrBaPWQ', '2024-06-13 04:34:25', NULL);
