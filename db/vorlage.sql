-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: vorlage
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `vorlage`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `vorlage` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `vorlage`;

CREATE TABLE `sensor` (
  `pkid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `userID` varchar(40) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sensor_datas` (
  `pkid` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `temperature` double NOT NULL,
  `humidity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `pkid` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `sensor`
  ADD PRIMARY KEY (`pkid`);
ALTER TABLE `sensor_datas`
  ADD PRIMARY KEY (`pkid`);
ALTER TABLE `user`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `pkid` (`pkid`);
ALTER TABLE `sensor`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `sensor_datas`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `user`
  MODIFY `pkid` int(11) NOT NULL AUTO_INCREMENT;