#!/usr/bin/python
# -*- coding: utf-8 -*-

import os, sys

#Ein Custom-Check-Command für Icinga2.
#Aus einer Mariadb des Containers "MariaDB" im Dockerverbund werden Daten ausgelesen und an Icinga2 weitergegeben.

#Als Argument wird die ID des Sensors übergeben, für den die Daten übertragen werden sollen.
Argument = sys.argv[2]

#Hier wird die Temperatur ausgelesen, die die höchste ID hat.
Temperatur=float(os.popen("mysql -h mariadb -u root -pmypass vorlage -s -N -e '"'select temperature from sensor_datas where id_sensor = '"'" + str(Argument) + "'"' order by pkid desc limit 1;'"'").readline().strip())

#Hier wird die Luftfeuchte ausgelesen, die die höchste ID hat.
Luftfeuchte=float(os.popen("mysql -h mariadb -u root -pmypass vorlage -s -N -e '"'select humidity from sensor_datas where id_sensor = '"'" + str(Argument) + "'"' order by pkid desc limit 1;'"'").readline().strip())

#Hier wird der Name des Sensors ausgelesen.
Sensorname=(os.popen("mysql -h mariadb -u root -pmypass vorlage -s -N -e '"'select name from sensor where pkid = '"'" + Argument + "'"' limit 1;'"'").readline().strip())

#Hier wird der Ort des Sensors ausgelesen.
Location=(os.popen("mysql -h mariadb -u root -pmypass vorlage -s -N -e '"'select location from sensor where pkid = '"'" + Argument + "'"' limit 1;'"'").readline().strip())

#Jetzt folgen die Exit-Werte für Icinga2. Hier wird definiert, bei welchen Werten, welche Statusmeldung ausgegeben wird und die Performancedaten werden übermittelt (mit "|" abgegrenzt.).

#Erster Fall: Alles OK!
if ((Temperatur > 0) and (Temperatur < 25)):
  print "OK - Temperature: " + str(Temperatur) + "°C. Humidity: " + str(Luftfeuchte) + "%. Sensorname: " + Sensorname + ". Location: " + Location + ".|Temperature=" + str(Temperatur) + ";;;; Humidity=" + str(Luftfeuchte) + ";;;;"
  sys.exit(0)

#Zweiter Fall: Warnung!
elif ((Temperatur > 25.01) and (Temperatur < 35)):
  print "WARNING - Temperature: " + str(Temperatur) + "°C. Humidity: " + str(Luftfeuchte) + "%. Sensorname: " + Sensorname + ". Location: " + Location + ".|Temperature=" + str(Temperatur) + ";;;; Humidity=" + str(Luftfeuchte) + ";;;;"
  sys.exit(1)

#Dritter Fall: Problem!
elif (Temperatur > 35.01):
  print "CRITICAL - Temperature: " + str(Temperatur) + "°C. Humidity: " + str(Luftfeuchte) + "%. Sensorname: " + Sensorname + ". Location: " + Location + ".|Temperature=" + str(Temperatur) + ";;;; Humidity=" + str(Luftfeuchte) + ";;;;"
  sys.exit(2)

#Vierter Fall: Status unbekannt!
else:
  print "UNKNOWN - Temperature: " + str(Temperatur) + "°C. Humidity: " + str(Luftfeuchte) + "%. Sensorname: " + Sensorname + ". Location: " + Location + ".|Temperature=" + str(Temperatur) + ";;;; Humidity=" + str(Luftfeuchte) + ";;;;"
  sys.exit(3)

