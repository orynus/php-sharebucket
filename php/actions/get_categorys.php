<?php

include "connectors/db-frontend.inc.php";

// SELECT Query um alle Categorys zu holen
$query = "SELECT * FROM Category";

// Query ausführen
$result = $mysqli->query($query);

// Category Array initialisieren
$categorys = [];

// Alle Categorys hinzufügen
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       array_push($categorys, $row);
    }
}

// Verbindung schliessen
$mysqli->close();

?>