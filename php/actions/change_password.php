<?php

// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['change_password'])){

    // Initialisierung
    $error = $message =  '';
    $new_password = '';

    // Datenbank Verbindung importieren
    include "connectors/db-frontend.inc.php";

    // Query um bestehenden Benutzer zu holen.
    $query = "SELECT * FROM User WHERE username = '" . $_SESSION['user']['username'] . "';";

    // Prüft ob das bestehende Passwort richtig ist
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (!password_verify($_POST['old_password'], $user['password'])) {
            $error .= "Das bestehende Passwort ist falsch.<br />";
        }
    }

    // Passwort vorhanden, mindestens 8 Zeichen
    if(isset($_POST['new_password']) && !empty(trim($_POST['new_password']))){
        $new_password = trim($_POST['new_password']);
        //entspricht das passwort unseren vorgaben? (minimal 8 Zeichen, Zahlen, Buchstaben, keine Zeilenumbrüche, mindestens ein Gross- und ein Kleinbuchstabe)
        if(!preg_match("/(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $new_password)){
            $error .= "Das neue Passwort entspricht nicht dem geforderten Format.<br />";
        }
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte einen korrektes neues Passwort ein.<br />";
    }


    // wenn kein Fehler vorhanden ist, schreiben der Daten in die Datenbank
    if(empty($error)){

        // INPUT Query erstellen, welches firstname, lastname, username, password, email in die Datenbank schreibt
        $query = "UPDATE User SET password = ? WHERE username = ?;";

        // Query vorbereiten mit prepare();
        $stmt = $mysqli->prepare($query);

        // Password hashing
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        // Username für die Query
        $username = $_SESSION['user']['username'];

        // Parameter an Query binden mit bind_param();
        $stmt->bind_param("ss", $password_hash, $username);

        // Query ausführen mit execute();
        $stmt->execute();

        // Verbindung schliessen
        $mysqli->close();

        $message .= "Das Passwort wurde erfolgreich geändert.<br />";
    }
}
?>