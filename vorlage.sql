standart(){
drop database vorlage;
create database vorlage;
use vorlage;
CREATE TABLE `sensor` (
  `pkid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `userID` varchar(40) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(100) NOT NULL
)

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
)

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


}

