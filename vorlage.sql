standart(){
drop database vorlage;
create database vorlage;
use vorlage;
create table User(
ID integer primary key,
Name varchar(30),
Password varchar(50),
Email varchar(70)
);
create table Sensor(
ID integer primary key,
Sensor_Name varchar(20),
User_ID integer,
foreign key (User_ID) references User(ID)
);
}

wennNeuerSensorErkanntWurde(){
use sensor;
create table #sensorID(
Sensor_ID varchar(20),
temp float,
humidity float
foreign key (Sensor_ID) references Sensor(ID)
);
}

