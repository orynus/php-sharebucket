<?php

include "connectors/db-frontend.inc.php";

// SELECT Query um alle Users zu holen
$query = "SELECT * FROM User";

// Query ausführen
$result = $mysqli->query($query);

// Users Array initialisieren
$users = [];

// Alle User hinzufügen
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       array_push($users, $row);
    }
}

// Verbindung schliessen
$mysqli->close();

?>