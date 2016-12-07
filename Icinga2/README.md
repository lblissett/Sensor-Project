# Icinga2

Alles im Icinga2-Container:

- "check_sensor_mariadb.py" und "integrate_all_sensors.py" müssen nach: "/usr/lib/nagios/plugins/"

- "graphite.conf" muss nach: "/etc/icinga2/features-available/"

- "config.ini" muss nach: "/usr/share/icingaweb2/modules/graphite/"

- "Grapher.php" muss nach: "/usr/share/icingaweb2/modules/graphite/library/Graphite/"

- Dann muss Folgendes ausgeführt werden: (Achtung: Python2 nicht Python3)

`python /usr/lib/nagios/plugins/integrate_all_sensors.py`

`icinga2 feature enable graphite`

`service icinga2 restart`

`service icinga2 checkconfig`

`service icinga2 reload`

## Erreichbarkeit

Das Icinga2-Frontend ist dann erreichbar unter 127.0.0.1:60000 (siehe docker-compose.yml). Unter "Configuration -> Modules -> graphite -> enable" muss das Graphit-Plugin aktiviert werden (Das erfordert, dass die obenstehenden Schritte ausgeführt wurden.). Credentials:

- Login: "icingaadmin"
- Passwort: "icinga"

Die Credentials sollten bei Produktivbetrieb geändert werden.

## Graphite

Wenn Bedarf besteht, kann das Graphite-Frontend unter 127.0.0.1:9090 erreicht werden. Es werden keine Zugangsdaten benötigt.
