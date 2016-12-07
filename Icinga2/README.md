Die Dateien "check_sensor_mariadb.py" und "integrate_all_sensors.py" müssen auf dem Icinga2-Container nach (Sie sind dort normalerweise schon vorhanden.):
"/usr/lib/nagios/plugins/"

Dann muss Folgendes im Icinga2-Container ausgeführt werden: (Achtung: Python2 nicht Python3)
`python /usr/lib/nagios/plugins/integrate_all_sensors.py`
`service icinga2 checkconfig`
`service icinga2 reload`