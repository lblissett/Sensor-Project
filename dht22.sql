Use tempdb;
Drop table if exists temphumi;

CREATE TABLE IF NOT EXISTS `temphumi` (
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chipid` varchar(20) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `humidity` varchar(255) NOT NULL)
ENGINE=InnoDB DEFAULT CHARSET=latin1;

Select * from temphumi
