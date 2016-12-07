Alles im Icinga2-Container:

"check_sensor_mariadb.py" und "integrate_all_sensors.py" müssen nach:
"/usr/lib/nagios/plugins/"

"graphite.conf" muss nach:
"/etc/icinga2/features-available/"

"config.ini" muss nach:
"/usr/share/icingaweb2/modules/graphite/"

"Grapher.php" muss nach:
"/usr/share/icingaweb2/modules/graphite/library/Graphite/"

Dann muss Folgendes ausgeführt werden: (Achtung: Python2 nicht Python3)
`python /usr/lib/nagios/plugins/integrate_all_sensors.py`

`icinga2 feature enable graphite`

`service icinga2 restart`

`service icinga2 checkconfig`

`service icinga2 reload`
