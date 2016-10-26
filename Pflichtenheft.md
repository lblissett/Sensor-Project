# 1 Zielbestimmung(Richard)
Die Bereitstellung eines Dockerimages mit einen Webserver + Datenbank, so konfiguriert, dass leicht neue Temperatursensoren in die Weboberfläche integriert werden können und die Daten dazu angezeigt werden.

## Musskriterien
Es soll, ein funktionfähiges Skript für den Microcontroller, zur Verfügung gestellt werden, sodass dieser Daten vom Temperatursensor erhält und an einen Server schickt.

Der Sever der die ermittelten Daten erhält speichert diese in eine Datenbank.

Die Messdaten soll man in der Weboberfläche anschaulich einsehen können.

## Kannkriterien
Für die komplette Infrastruktur soll ein Icinga Plugin zur Verfügung gestellt werden, welches die Bereitschaft überprüft.
 
## Abgrenzungskriterien
Abgrenzungskriterien: Diese Kriterien sollen bewusst nicht erreicht werden.

# 2 Einsatz (Martin)
Der geplante Einsatz des Systems ist die Grundlage für Benutzungsoberfläche und
Qualitätsanforderungen.
 
## Anwendungsbereiche
Ein Pflichtenheft wird bspw. in einer IT-Abteilung genutzt.
 
## Zielgruppen
Die Zielgruppe besteht also aus Informatikern, die mit der Projektplanung
beauftragt wurden.
 
## Betriebsbedingungen
Betriebsbedingungen: Die Betriebsbedingungen spezifiziert die physikalische
Umgebung des Systems, die tägliche Betriebszeit, und ob das System ständiger
Beobachtung durch Bediener ausgesetzt ist, oder ein unbeaufsichtigter Betrieb
beabsichtigt ist.
 
# 3 System Vorraussetzungen
## 3.1 Hardware
### 3.1.1 Sensor und Microcontroller
Um die Werte der Temperatur und der Luftfeuchtigkeit zu ermitteln, wird der Sensor DHT22 benutzt. Dieser wird mit dem Microcontroller "ESP8266 NodeMCU" verbunden. 

Bild dht22 bidl esp8266
![Alternativer Text](/Bilder/dht22.jpg "DHT22")
![Alternativer Text](/Bilder/esp8266.jpg "ESP8266")

Technische Daten des DHT22:
-Digital Temperatur und Luftfeuchtigkeit ermitteln
-Chip Typ DHT22
-Betriebsspannung: DC 3.3-5.5V
-Luftfeuchtigkeitsmessbereich : 0 bis 100% relative Luftfeuchte
-Feuchtemessgenauigkeit: ±2% RH
-Temperaturbereich: -40 bis +80 C
-Temperaturmessgenauigkeit ±0.5
-Single-Bus – Digitalsignalausgang, bidirektionale serielle Daten
-zahlreiche Beispielprogramme für gängige Board im Internet verfügbar
-Maße: 28mm x 12mm x 10mm

Das ESP8266 von dem Hersteller Espressif ist ein programmierbarer WLAN-SoC mit UART- und SPI-Schnittstelle.

Technische Daten des ESP8266
-802.11 b/g/n
-Wi-Fi Direct (P2P), soft-AP
-Integrated TCP/IP protocol stack
-Integrated TR switch, balun, LNA, power amplifier and matching network
-Integrated PLLs, regulators, DCXO and power management units
-+19.5dBm output power in 802.11b mode
-Power down leakage current of <10uA
-Integrated low power 32-bit CPU could be used as application processor
-SDIO 1.1/2.0, SPI, UART
-STBC, 1×1 MIMO, 2×1 MIMO
-A-MPDU & A-MSDU aggregation & 0.4ms guard interval
-Wake up and transmit packets in < 2ms
-Standby power consumption of < 1.0mW (DTIM3)
-VCC: 3,3V (Achtung: Eingänge sind NICHT 5V TOLERANT!)


### 3.1.3 Server Hardware
- Prozessor Architektur x86
- beachte Anforderungen für Betriebssysteme

### 3.1.4 Client Hardware
- Betriebssystem: Windows, Mac OS X, Linux 32bit/64bit


## 3.2 Software
### 3.2.1 Server Software
Betriebssystem: 
-CentOS 7.1/7.2 & RHEL 7.0/7.1/7.2 (YUM-based systems)
-Ubuntu 14.04 LTS
-SUSE Linux Enterprise 12

-Docker Version 1.12.2

### 3.2.2 Client Software

-Arduino IDE Version 1.6.12
-Webbrowser neueste stabile Version(Firefox, Chrome,Opera,...)
 
## Orgware
Orgware: Angabe der organisatorische Rahmenbedingungen, die vor Projektstart
erfüllt sein müssen.
 
# 4 Funktionalität
Funktionalität: Spezifikation der einzelnen Produktfunktionen mit genauer und
detaillierter Beschreibung.
 
* Typische Arbeitsabläufe
* Keine Angabe von typischen Verwaltungsfunktionen (Create, Read, Update, Delete)

 
# 5 Daten (Martin)
Daten: Angabe der Daten, die langfristig aus Benutzersicht zu speichern sind.
 
# 6 Leistungen
Leistungen: Anforderungen bezüglich Zeit und Genauigkeit
 
# 7 Aufbau des Webfrontends (Leo)

Für den grundlegenden Aufbau des Webfrontends wurde sich am MVC (Model View Controller) Muster orientiert. 

![Alternativer Text](/Bilder/Leo_1.png "MVC Muster")

Hierbei kann man auch sagen, dass es bereits viele vorgefertigte Lösungen gibt, welche man einfach verwenden kann, jedoch sind diese meistens zu komplex bzw. schwierig zu verstehen und zu erweitern. Desweiteren ist man mit diesen Lösungen zu eingeschränkt und kann nicht genau nach seinen eigenen Vorstellungen arbeiten. Aus diesen Gründen wurde ein eigenes „Framework“ erstellt, welches sich am MVC orientiert. 

## 7.1 Eigenes Framework

In der Praxis bedeutet dies, dass das Arbeiten möglichst vereinfacht werden soll durch eine gewisse Grundstruktur, die zwar schwierig ist zu erstellen bzw. Zeit benötigt, die dann aber alle nötigen Grundfunktionen bietet, um die Webseite schnell zu erweitern. Alle Anfragen, die an den Webserver kommen, werden auf die index.php umgeleitet, welche die Anfrage auswertet. Über das Format localhost/Controller/Action werden so die einzelnen Funktionen aufgerufen. Um auf die Startseite zu gelangen ist dies zum Beispiel localhost/index/index. (Aufruf bedeutet IndexController und indexAction). 
Model beinhaltet:
- Datenbankverbindungen und Funktionen (PDO zur Realisierung von OOP)
Um dann die Daten darstellen zu können, muss sich hinter dem Controller im Ordner „views“ eine gleichnamige .phtml-Datei befinden, die dem Namen der Action entspricht also im Fall der indexAction die /views/index.phtml

## 7.2 Funktionen der Webseite

### 7.2.1 Workflow

![Alternativer Text](/Bilder/Leo_2.png "Workflow")

### 7.2.2 Login

- Login Funktionalität mit Datenbanküberprüfung der eingegeben Daten
- Auswahl der Sprache (Mehrsprachigkeit)
- Link zum Registrieren

![Alternativer Text](/Bilder/Leo_3.png "Login")

### 7.2.3 Registrieren

- Neuanlegen eines Benutzeraccounts mit verschiedenen Feldern
- RegEx Überprüfung hinter jedem Feld mit Erläuterung im Infofeld jeder Zeile (Frontend und Backend)
- Überprüfung, dass Benutzername nur einmalig ist (Frontend und Backend)

![Alternativer Text](/Bilder/Leo_4.png "Registrieren")

### 7.2.4 Loginseite
- geschützt durch Login, ohne diesen nicht erreichbar
- Menü, um verschiedene Funktionalitäten aufzurufen

![Alternativer Text](/Bilder/Leo_5.png "Menue")

Homebildschirm
- kleine Begrüßung, Übersicht
- Funktionalität bzw. Bild fehlt noch
Tabelle der Sensoren
- Übersicht über alle Sensoren mit zugehörigem Benutzer und zusätzlichen Infos
- Möglichkeit einen neuen Sensor zu erstellen
- Aktualisierung, Suche, Sortierung, Exportieren der Daten
- Kontextmenü über Rechtsklick auf Datensatz:
Informationen: Diagramm mit eingetragenen Daten und die dazu gehörige API
Bearbeiten: Bearbeiten des Sensors z.B. Ort ändern
Löschen: Sensor und dazu gehörige Daten löschen

![Alternativer Text](/Bilder/Leo_6.png "Home")


Benutzereinstellungen
- Funktionalitäten bezüglich des Benutzers z.B. Passwortänderung
- Funktionalität bzw. Bild fehlt noch
Logout
- Ausloggen mit Redirect auf Startseite

## 7.3 API

- API (Programmierschnittstelle) zum Speichern der Sensordaten in der Datenbank. Aufruf der entsprechenden ControllerAction mit den entsprechenden Parametern (ID des Sensors, Temperatur und Luftfeuchtigkeit)
- speichert die Daten in der sensor_datas (beinhaltet Sensordaten von allen Sensoren) mit Zeitstempel

## 7.4 Design der Webseite

Für die Gestaltung der Webseite wurde das öffentlich zugängliche Bootstrap verwendet, welches von Twitter entwickelt wurde. Es ist vor allem darauf konzipiert, Webseiten einfach zu gestalten und ebenfalls optimiert für die Anwendung auf mobilen Endgeräten wie Tablets oder Smartphones. Im allgemeinen wird es als CSS-Framework beschrieben und bietet Gestaltungsvorlagen für verschiedenste Elemente einer Webseite und lässt diese durch wenige Handgriffe bzw. Anpassungen ansehnlich aussehen. Es gibt für Bootstrap mehrere Erweiterungen, so genannte Plugins, die JS beinhalten und speziellere Funktionen bieten, wie die Erstellung von Tabellen, welche dann einige Grundfunktionen bieten, wie interaktive Aktualisierung, Sortierung bzw. Suche, als auch den Export von Daten. Dieses Plugin wurde ebenfalls verwendet für dieses Projekt innerhalb des Frameworks.


 

 
# 8 Qualitätsziele (Martin)
Qualiätsziele: Allgemeine Ziele sind meistens Änderbarkeit und Wartbarkeit.
Ziele sollten jedoch grundsätzlich messbar, spezifisch und relevant sein.
 
# 9 Ergänzungen 
Hier ist Platz für nicht im Pflichtenheft abgedeckte Themengebiete oder ein
Glossar.
