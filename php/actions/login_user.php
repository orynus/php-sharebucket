<?php

// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){

    // Initialisierung
    $error = $message =  '';
    $username = $password = '';

    // Benutzername vorhanden
    if(isset($_POST['username']) && !empty(trim($_POST['username']))){
        // Spezielle Zeichen Escapen > Script Injection verhindern
        $username = htmlspecialchars(trim($_POST['username']));
    } else {
        $error .= "Bitte gib einen Benutzernamen ein.<br />";
    }
    
    // Passwort vorhanden
    if(isset($_POST['password']) && !empty(trim($_POST['password']))){
        $password = trim($_POST['password']);
    } else {
        $error .= "Bitte gib ein Passwort ein.<br />";
    }


    // wenn kein Fehler vorhanden ist, überprüfe die Logindaten
    if(empty($error)){
        // Datenbank Verbindung importieren
        include "connectors/db-frontend.inc.php";
    
        $query = "SELECT * FROM User WHERE username = '$username';";

        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])) {
                $message .= "Du bist nun eingeloggt";
                $_SESSION['loggedIn'] = true;
                $_SESSION['user'] = $user;
                session_regenerate_id(); // Verhindert Session-Hijacking

            } else {
                $error .= "Das Passwort ist falsch";
            }
        } else {
            $error .= "Es existiert kein Benutzer mit diesem Username.<br />";
        }

        // Verbindung schliessen
        $mysqli->close();
    }
}
?>