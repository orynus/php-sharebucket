<?php

include "connectors/db-frontend.inc.php";

// SELECT Query um alle Projects zu holen
$query = "SELECT * FROM Project";

// Query ausführen
$result = $mysqli->query($query);

// Projects Array initialisieren
$projects = [];

// Alle Projects hinzufügen
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       array_push($projects, $row);
    }
}

// Verbindung schliessen
$mysqli->close();

?>