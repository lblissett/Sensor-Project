#!/usr/bin/python
# -*- coding: utf-8 -*-

import os, sys

#Erstellt in einer Datei "/etc/icinga2/conf.d/check_sensor_mariadb.conf" die noetigen Eintraege, um die Sensoren zu Icinga2 hinzuzufuegen.

#Hohle alle IDs für Sensoren aus der MariaDB des Containers "MariaDB" im Dockerverbund.
SensorIDsString=(os.popen("mysql -h mariadb -u root -pmypass vorlage -s -N -e '"'select pkid from sensor;'"'").read().strip())

SensorIDs = []

for j in SensorIDsString:
  if (j != "\n"):
    SensorIDs.append(int(j))

#Im Folgenden wird die Datei "/etc/icinga2/conf.d/check_sensor_mariadb.conf" überschrieben.

#Schreibe ein Objekt "CheckCommand" hinein (nur eins nötig).
file = open("/etc/icinga2/conf.d/check_sensor_mariadb.conf","w")
file.write("object CheckCommand \"check_sensor_mariadb\" {\n")
file.write("import \"plugin-check-command\"\n")
file.write("command = [\"/usr/bin/python\", PluginDir + \"/check_sensor_mariadb.py\"]\n")
file.write("arguments = {\"-i\" = \"$ID_Sensor$\"}\n}\n\n")

#Schreibe so viele Objekte "Service" hinein, wie es Sensoren gibt.
for i in SensorIDs:
  file.write("object Service \"check_sensor_mariadb_" + str(i) + "\" {\n")
  file.write("     import \"generic-service\"\n")
  file.write("     host_name = \"0c287328041c\" #Der Hostname für den Server findet sich in\"/etc/icinga2/constants.conf\" unter \"NodeName=...\"\n")
  file.write("     check_command = \"check_sensor_mariadb\"\n")
  file.write("     vars.ID_Sensor = \"" + str(i) + "\" #Die ID des Sensors muss hier eingetragen werden.\n")
  file.write("     vars.sla = \"24x7\"\n}\n")

file.close()

print "Success. Integrated " + str(len(SensorIDs)) + " Sensors in Icinga."

