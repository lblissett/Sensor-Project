# dht22-nodemcu

Sensorprojekt

Ziel
- Die Bereitstellung eines Dockerimages einen Webserver + Datenbank, so konfiguriert, dass leicht neue Temperatursensoren in die Weboberfläche integriert werden können und die Daten dazu angezeigt werden.

Technologien (Vorschlag)
- Dockerimage mit Apache + MariaDb
- Datenvisualisierung mit D3.js: https://d3js.org/
- responsive WebDesign mit Bootstrap: http://getbootstrap.com/
- PHP-Framework a la Symfony: https://symfony.com/  oder https://framework.zend.com/ 
- automatisierte Testumgebung für PHP, PHPUnit: https://phpunit.de/ oder https://en.wikipedia.org/wiki/List_of_unit_testing_frameworks#PHP

Features
- Nutzerverwaltung: (sicherer) Login + Rechteabstufung
- Localisation: Englisch/Deutsch
- (REST)Api um Sensordaten zu integrieren
- Datenvisualisierung: aktuelle Sensordaten, Verlauf über die Zeit, geographische Lage?
- Portabilität: Appentwicklung in Dockercontainer

More Features
- Icinga2Plugin: http://moinwikileipzig.ddns.net/wikimain/DockerUndIcinga2PluginTempSensor
- unterschiedliche Loggerdaten integrieren z.B. Feinstaubmessung wie beim OpenData Projekt in Stuttgart https://github.com/opendata-stuttgart/meta/wiki bzw. http://luftdaten.info/
- Android App
- Updates über Wlan, OTA-Updates: http://esp8266.github.io/Arduino/versions/2.0.0/doc/ota_updates/ota_updates.html
- Integration in ein CMS z.B. Drupal, Wordpress


Startpunkt
- DS18B20 Temperature Sensor + Docker + REST: https://github.com/bgulla/hypriot-ds18b20
- Internet of Things, The Open Data platform for the Internet of things (in Cloud): https://thingspeak.com/
- EasyIoT, DIY Cloud for the Internet of Things:  http://iot-playground.com/

ESP8266 / NodeMCU
- ESP8266 + DHT22 + MySQL + HighCharts: http://www.instructables.com/id/ESP8266-DHT22-to-MYSQL/
- ESP8266 + DHT22 https://blog.thesen.eu/wlan-lufttemperatur-und-feuchte-logger-mit-grafischer-darstellung-fuer-esp8266/
- Arduino Reference: https://www.arduino.cc/en/Reference/HomePage und besonders: https://www.arduino.cc/en/Reference/WiFi
- NodeMCU + Lua: https://github.com/nodemcu/nodemcu-firmware
- Esp8266 SDK: https://espressif.com/en/support/download/sdks-demos?keys=&field_type_tid%=14?
- Everything about Esp8266 in a forum: http://www.esp8266.com/

Dockerize your project
- ~~Out-of-the-box LAMP image (PHP+MySQL): https://hub.docker.com/r/tutum/lamp/ und https://github.com/tutumcloud/lamp~~
- Dockerize a PHP Application: https://semaphoreci.com/community/tutorials/dockerizing-a-php-application
- Docker Support in PhpStorm: https://confluence.jetbrains.com/display/PhpStorm/Docker+Support+in+PhpStorm#DockerSupportinPhpStorm-Dockerinstallation

Docker + MariaDB:
- Import SQL: http://stackoverflow.com/questions/29145370/docker-initialize-mysql-database-with-schema
- ~~Tutum/mysql: https://github.com/tutumcloud/mysql~~
- Datenbank transfer: http://www.sysadminslife.com/linux/mysql-datenbank-transferieren-sichern-und-wiederherstellen-kopieren-linux-konsole/

// veraltet 

Testeintrag in die Datenbank:
http://cs14.net/info.php?chipid=100&temperature=30&humidity=20

Temperatur Einträge
http://cs14.net/temphumi.php

Chart 1 bei chipid = 200

Chart 2 bei chipid = 2800

// veraltet 

API:

Aufruf über : 
IPderWebseite/index/returnParameters?sensor_id=..&temperature=..&humidity=..

Erläuterung Parameter:
sensor_id - ID des Sensors aus Tabelle ablesen
temperature - Temperatur im Format 25.5
humidity - Feuchtigkeit im Format 70.9
