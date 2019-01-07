<?php

// Wurden Daten mit "POST" gesendet und ist es ein Project lösch Request?
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_project'])){

    // Initialisierung
    $error = $message =  '';
    $new_password = '';

    // Datenbank Verbindung importieren
    include "connectors/db-frontend.inc.php";

    // DELETE Query welche Project löscht
    $query = "DELETE FROM Project WHERE idProject = ?;";

    // Query vorbereiten mit prepare();
    $stmt = $mysqli->prepare($query);

    // Parameter an Query binden mit bind_param();
    $stmt->bind_param("i", $_POST['delete_project']);

    // Query ausführen mit execute();
    $stmt->execute();

    // Verbindung schliessen
    $mysqli->close();

    $message .= "Das Project wurde erfolgreich gelöscht.<br />";
}
?>