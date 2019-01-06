<?php
// Initialisierung
$error = $message =  '';
$title = $short_description = $description = '';


// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['project'])){

    // Titel vorhanden und maximal 50 Zeichen lang
    if(isset($_POST['title']) && !empty(trim($_POST['title'])) && strlen(trim($_POST['title'])) <= 50){
        // Spezielle Zeichen Escapen > Script Injection verhindern
        $title = htmlspecialchars(trim($_POST['title']));
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte einen korrekten Titel ein.<br />";
    }

    // Kurze Beschreibung vorhanden und maximal 100 Zeichen lang
    if(isset($_POST['short_description']) && !empty(trim($_POST['short_description'])) && strlen(trim($_POST['short_description'])) <= 100){
        // Spezielle Zeichen Escapen > Script Injection verhindern
        $short_description = htmlspecialchars(trim($_POST['short_description']));
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte eine korrekte kurze Beschreibung ein.<br />";
    }

    // Kurze Beschreibung vorhanden und maximal 100 Zeichen lang
    if(isset($_POST['description']) && !empty(trim($_POST['description'])) && strlen(trim($_POST['description'])) <= 1000){
        // Spezielle Zeichen Escapen > Script Injection verhindern
        $description = htmlspecialchars(trim($_POST['description']));
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte eine korrekte Beschreibung ein.<br />";
    }

    // wenn kein Fehler vorhanden ist, schreiben der Daten in die Datenbank
    if(empty($error)){
        // Datenbank Verbindung importieren
        include "connectors/db-frontend.inc.php";

        // INPUT Query erstellen, welches firstname, lastname, username, password, email in die Datenbank schreibt
        $query = "INSERT INTO Project (idUser, idCategory, title, short_description, description, public, created) VALUES (?,?,?,?,?,?,?)";

        // Query vorbereiten mit prepare();
        $stmt = $mysqli->prepare($query);

        // Password hashing
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // TODO Id des aktuellen Users
        $idUser = 1;

        // Ausgewählte Category
        $idCategory = $_POST['idCategory'];

        // TODO Sichtbarkeit des Projekts
        $public = 1;

        // Timestamp der Erstellung
        $date = date('Y-m-d H:i:s');

        // Parameter an Query binden mit bind_param();
        $stmt->bind_param("iisssis", $idUser, $idCategory, $title, $short_description, $description, $public, $date);

        // Query ausführen mit execute();
        $stmt->execute();

        // Verbindung schliessen
        $mysqli->close();

        // Weiterleitung auf login.php
        header('Location: index.php');
    }
}
?>