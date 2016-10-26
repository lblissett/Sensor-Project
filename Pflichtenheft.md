# 1 Zielbestimmung(Richard)
Dieses Kapitel dient der Bestimmung von Zielen und nicht für deren Verwendung
notwendige Funktionen.
 
## Musskriterien
Musskriterien: Für das Produkt unabdingbare Leistungen, die in jedem Fall
erfüllt werden müssen. Das System ist ohne diese Funktionen für seinen
gedachten Zweck nicht einsetzbar.
 
## Kannkriterien
Kannkriterien: Die Erfüllung der Kannkriterien ist erwünscht, jedoch nicht
unbedingt notwendig. Sie sollten nur angestrebt werden, falls noch ausreichend
Kapazitäten vorhanden sind.
 
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
 
# 3 Umgebung (Richard)
 
## Software
Software: Gibt an, welche Software zum Betrieb vorhanden sein muss. Eine
Aufteilung für Server und Client ist ggf. sinnvoll. Weiterhin sind unbedingt die
kleinsten benötigten Versionsnummern anzugeben.
 
## Hardware
Hardware: Hardware-Anforderungen des Systems.
 
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
 
# 7 Aufbau des Webfrontends

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
