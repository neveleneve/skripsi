# SQL-Front 5.1  (Build 4.16)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: db_skripsi
# ------------------------------------------------------
# Server version 5.5.5-10.1.19-MariaDB

#
# Source for table tb_admin
#

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Dumping data for table tb_admin
#

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'suyamto widodo','admin','1234','superadmin');
INSERT INTO `tb_admin` VALUES (2,'abdul','admin','harijumat','admin');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tb_brg
#

DROP TABLE IF EXISTS `tb_brg`;
CREATE TABLE `tb_brg` (
  `id_brg` int(11) NOT NULL AUTO_INCREMENT,
  `nama_brg` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `no_stand` varchar(10) NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Dumping data for table tb_brg
#

LOCK TABLES `tb_brg` WRITE;
/*!40000 ALTER TABLE `tb_brg` DISABLE KEYS */;
INSERT INTO `tb_brg` VALUES (1,'Tahu',12000,1,'002');
INSERT INTO `tb_brg` VALUES (3,'Tempe',12000,1,'002');
INSERT INTO `tb_brg` VALUES (4,'Bakso',1000,1,'001');
INSERT INTO `tb_brg` VALUES (5,'Bakwan',2000,1,'001');
INSERT INTO `tb_brg` VALUES (6,'Teh Obeng',5000,1,'021');
INSERT INTO `tb_brg` VALUES (7,'jagung',15000,1,'019');
/*!40000 ALTER TABLE `tb_brg` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tb_pembeli
#

DROP TABLE IF EXISTS `tb_pembeli`;
CREATE TABLE `tb_pembeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Dumping data for table tb_pembeli
#

LOCK TABLES `tb_pembeli` WRITE;
/*!40000 ALTER TABLE `tb_pembeli` DISABLE KEYS */;
INSERT INTO `tb_pembeli` VALUES (1,'Suyamto','Jalan In Aja Dulu','089983748273','suyamtododo','dodoyamto',1000000);
INSERT INTO `tb_pembeli` VALUES (3,'Andi','pemuda','08614251251','al_teknisi','1234',1000000);
INSERT INTO `tb_pembeli` VALUES (4,'fariq','sembarang','081921212','fariq11','1234',0);
/*!40000 ALTER TABLE `tb_pembeli` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tb_penjual
#

DROP TABLE IF EXISTS `tb_penjual`;
CREATE TABLE `tb_penjual` (
  `id_penjual` int(11) NOT NULL AUTO_INCREMENT,
  `no_stand` varchar(11) NOT NULL,
  `nama_stand` varchar(50) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id_penjual`),
  KEY `id_penjual` (`id_penjual`),
  KEY `id_penjual_2` (`id_penjual`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Dumping data for table tb_penjual
#

LOCK TABLES `tb_penjual` WRITE;
/*!40000 ALTER TABLE `tb_penjual` DISABLE KEYS */;
INSERT INTO `tb_penjual` VALUES (1,'001','Tahu Chimenx','M. Fachrizan','cimeng','cimeng123',0);
INSERT INTO `tb_penjual` VALUES (2,'002','Bakar-bakar','Lolita','cimengkuy','manusia',180000);
INSERT INTO `tb_penjual` VALUES (3,'021','kuykuy','irfan','irfan12','12345',0);
INSERT INTO `tb_penjual` VALUES (4,'010','apala engkau','sudah pun ada','pengganti diriku','1234',0);
INSERT INTO `tb_penjual` VALUES (5,'019','Bakar-bakar','lisa','lisa11','1234',0);
/*!40000 ALTER TABLE `tb_penjual` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tb_trans
#

DROP TABLE IF EXISTS `tb_trans`;
CREATE TABLE `tb_trans` (
  `id_transaksi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_stand` varchar(10) NOT NULL,
  `id_brg` int(11) NOT NULL DEFAULT '0',
  `jumlah_brg` int(11) NOT NULL DEFAULT '0',
  `sub_total` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table tb_trans
#

LOCK TABLES `tb_trans` WRITE;
/*!40000 ALTER TABLE `tb_trans` DISABLE KEYS */;
INSERT INTO `tb_trans` VALUES (1,1,'002',1,3,36000,1);
INSERT INTO `tb_trans` VALUES (1,1,'002',3,12,144000,1);
INSERT INTO `tb_trans` VALUES (2,1,'001',4,10,10000,0);
INSERT INTO `tb_trans` VALUES (2,1,'001',5,10,20000,0);
INSERT INTO `tb_trans` VALUES (3,1,'021',6,10,50000,0);
INSERT INTO `tb_trans` VALUES (4,1,'001',4,20,20000,0);
INSERT INTO `tb_trans` VALUES (5,4,'019',7,12,180000,0);
/*!40000 ALTER TABLE `tb_trans` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
