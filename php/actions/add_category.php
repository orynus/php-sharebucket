<?php

// Wurden Daten mit "POST" gesendet und ist es ein Kategorie Request?
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['color'])){

    // Initialisierung
    $error = $message =  '';
    $color = $topic = '';

    if($_SESSION['loggedIn']) {
        // Titel vorhanden und maximal 50 Zeichen lang
        if(isset($_POST['color']) && !empty(trim($_POST['color'])) && strlen(trim($_POST['color'])) == 7){
            // Spezielle Zeichen Escapen > Script Injection verhindern
            $color = (trim($_POST['color']));
        } else {
            // Ausgabe Fehlermeldung
            $error .= "Das ist keine korrekte Farbe.<br />";
        }

        // Kurze Beschreibung vorhanden und maximal 100 Zeichen lang
        if(isset($_POST['topic']) && !empty(trim($_POST['topic'])) && strlen(trim($_POST['topic'])) <= 50){
            // Spezielle Zeichen Escapen > Script Injection verhindern
            $topic = htmlspecialchars(trim($_POST['topic']));
        } else {
            // Ausgabe Fehlermeldung
            $error .= "Gib eine korrekte Topic an.<br />";
        }

        // Datenbank Verbindung importieren
        include "connectors/db-frontend.inc.php";

        // Prüfen ob Category schon existiert
        $query = "SELECT * FROM Category";
        $result = $mysqli->query($query);
        while($row = $result->fetch_assoc()) {
            if($row['topic'] == $topic) {
                $error .= "Diese Topic existiert bereits.<br />";
            }
        }

        // wenn kein Fehler vorhanden ist, schreiben der Daten in die Datenbank
        if(empty($error)){

            // INPUT Query erstellen, welche topic und color in die Datenbank schreibt
            $query = "INSERT INTO Category (topic, color) VALUES (?,?)";

            // Query vorbereiten mit prepare();
            $stmt = $mysqli->prepare($query);

            // Parameter an Query binden mit bind_param();
            $stmt->bind_param("ss", $topic, $color);

            // Query ausführen mit execute();
            $stmt->execute();

            // Verbindung schliessen
            $mysqli->close();
        }
    } else {
        $error .= "Nur eingeloggte User können Kategorien erstellen.<br />";
    }
}
?>