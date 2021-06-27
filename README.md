# rest_api

Der REST API Service übernimmt die Verwaltung der Geräteliste

# Installation:

Zur Zusammenstellung und Launch der zusammen funktionierenden Docker-Container müssen die folgenden Commands nacheinander gelauncht werden 
(dabei muss man sich in dem Root-Ordner des Projekts befinden)

```
sudo docker build -t api ./
sudo docker-compose up -d
```

Selbstverständlich braucht man Docker dazu https://docs.docker.com/

# Usage:

Wenn der Installationsprozess erfolgreich abgeschlossen wurde, kann man in phpMyAdmin (die Zugangsdaten sind in ìnc/config.php) zur Datenbankverwaltung übergehen. 
Die Adresse dazu ist `http://localhost:8000/`

## Verwaltungsmethoden:
1. Rückgabe einer Liste aller enthaltenen Einträge
2. Rückgabe eines einzelnen Eintrags, wenn man eine Gerätenummer übergibt
3. Hinzufügen eines Eintrags
4. Löschen eines Eintrags
5. Bearbeiten eines Eintrags

## Beschreibung für Arbeit mit den oben angeführten Methoden auf Basis von Postman-Arbeit

Alle Requests können auf beliebige Art und Weise geschickt werden. Hauptsache - folgende Regeln zu beachten:

### Rückgabe einer Liste aller enthaltenen Einträge

Um das Resultat zu bekommen, soll ein GET-Request ohne Parameter an ```http://localhost:8080/api/devices``` gesendet werden.
Als Response kommt ein JSON

### Rückgabe eines einzelnen Eintrags, wenn man eine Gerätenummer übergibt

Um das Resultat zu bekommen, soll ein GET-Request ohne Parameter an ```http://localhost:8080/api/devices/{id}``` gesendet werden, wo ```{id}``` die ID des benötigten Geräts
ist.
Als Response kommt ein JSON

### Hinzufügen eines Eintrags

Um das Resultat zu bekommen, soll ein POST-Request mit form-data in Body an ```http://localhost:8080/api/devices``` gesendet werden.
form-data soll folgende Keys ```device_id, device_type, damage_possible``` sowie ihre Werte beinhalten.
Als Response kommt ein JSON mit dem Status der Erfüllung des Requests.

### Löschen eines Eintrags

Um das Resultat zu bekommen, soll ein DELETE-Request mit form-data an ```http://localhost:8080/api/devices/{id}``` gesendet werden, wo ```{id}``` die ID des für die Löschung gewählten Geräts
ist.
Als Response kommt ein JSON mit dem Status der Erfüllung des Requests.


### Bearbeiten eines Eintrags

Um das Resultat zu bekommen, soll ein PUT-Request mit x-www-form-urlencoded in Body an ```http://localhost:8080/api/devices/{id}``` gesendet werden, wo ```{id}``` die ID des für das Update gewählten Geräts
ist.
x-www-form-urlencoded soll folgende Keys ```device_type, damage_possible``` sowie ihre neuen Werte beinhalten.
Als Response kommt ein JSON mit dem Status der Erfüllung des Requests.