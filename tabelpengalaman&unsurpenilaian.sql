/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sedan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-02-23 18:10:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_pengalaman_prs
-- ----------------------------
DROP TABLE IF EXISTS `t_pengalaman_prs`;
CREATE TABLE `t_pengalaman_prs` (
`pnp_id`  bigint(20) NULL DEFAULT NULL ,
`pnp_kd_sub`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pnp_nm_sub`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pnp_jml_sub`  decimal(65,0) NULL DEFAULT NULL ,
`pnp_bobot`  decimal(65,0) NULL DEFAULT NULL ,
`pnp_nilai`  decimal(65,0) NULL DEFAULT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_pengalaman_prs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_unsur_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `t_unsur_penilaian`;
CREATE TABLE `t_unsur_penilaian` (
`unp_id`  bigint(255) NULL DEFAULT NULL ,
`unp_bobot_png_prs`  decimal(65,0) NULL DEFAULT NULL COMMENT 'bobot pengalaman perusahaan' ,
`unp_nilai_png_prs`  decimal(65,0) NULL DEFAULT NULL ,
`unp_jml_png_prs`  decimal(65,0) NULL DEFAULT NULL ,
`unp_bobot_pnd_mtd`  decimal(65,0) NULL DEFAULT NULL ,
`unp_nilai_pnd_mtd`  decimal(65,0) NULL DEFAULT NULL ,
`unp_jml_pnd_mtd`  decimal(65,0) NULL DEFAULT NULL ,
`unp_bobot_kua_tna`  decimal(65,0) NULL DEFAULT NULL ,
`unp_nilai_kua_tna`  decimal(65,0) NULL DEFAULT NULL ,
`unp_jml_kua_tna`  decimal(65,0) NULL DEFAULT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_unsur_penilaian
-- ----------------------------
BEGIN;
COMMIT;
