# dht22-nodemcu

Sensorprojekt

Ziel
- Die Bereitstellung eines Dockerimages einen Webserver + Datenbank, so konfiguriert, dass leicht neue Temperatursensoren in die Weboberfläche integriert werden können und die Daten dazu angezeigt werden.

Technologien (Vorschlag)
- Dockerimage mit Apache + MariaDb
- Datenvisualisierung mit D3.js: https://d3js.org/
- responsive WebDesign mit Bootstrap: http://getbootstrap.com/
- PHP-Framework a la Symfony: https://symfony.com/  oder https://framework.zend.com/ 

Features
- Nutzerverwaltung, Login + Rechteabstufung
- (REST)Api um Sensordaten zu integrieren
- Datenvisualisierung: aktuelle Sensordaten, Verlauf über die Zeit, Lage?

More Features
- NagiosPlugin 
- unterschiedliche Loggerdaten integrieren z.B. Feinstaubmessung wie beim OpenData Projekt in Stuttgart https://github.com/opendata-stuttgart/meta/wiki bzw. http://luftdaten.info/
- Android App
- Integration in ein CMS z.B. Drupal, Wordpress


Startpunkt
- DS18B20 Temperature Sensor + Docker + REST: https://github.com/bgulla/hypriot-ds18b20
- Internet of Things, The Open Data platform for the Internet of things (in Cloud): https://thingspeak.com/
- EasyIoT, DIY Cloud for the Internet of Things:  http://iot-playground.com/

ESP8266 / NodeMCU
- ESP8266 + DHT22 + MySQL + HighCharts: http://www.instructables.com/id/ESP8266-DHT22-to-MYSQL/
- ESP8266 + DHT22 https://blog.thesen.eu/wlan-lufttemperatur-und-feuchte-logger-mit-grafischer-darstellung-fuer-esp8266/




// veraltet 

Testeintrag in die Datenbank:
http://cs14.net/info.php?chipid=100&temperature=30&humidity=20

Temperatur Einträge
http://cs14.net/temphumi.php

Chart 1 bei chipid = 200

Chart 2 bei chipid = 2800

// veraltet 

