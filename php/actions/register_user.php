<?php
// Initialisierung
$error = $message =  '';
$username = $firstname = $lastname = $email = $password = '';


// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST"){

    // Benutzername vorhanden, mindestens 6 Zeichen und maximal 25 zeichen lang
    if(isset($_POST['username']) && !empty(trim($_POST['username'])) && strlen(trim($_POST['username'])) <= 25 && strlen(trim($_POST['username'])) >= 6){
        // Spezielle Zeichen Escapen > Script Injection verhindern
        $username = htmlspecialchars(trim($_POST['username']));
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte einen korrekten Benutzernamen ein.<br />";
    }


    // Vorname vorhanden, mindestens 1 Zeichen und maximal 50 Zeichen lang
    if(isset($_POST['firstname']) && !empty(trim($_POST['firstname'])) && strlen(trim($_POST['firstname'])) <= 50){
        // Spezielle Zeichen Escapen > Script Injection verhindern
        $firstname = htmlspecialchars(trim($_POST['firstname']));
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte einen korrekten Vornamen ein.<br />";
    }


    // Nachname vorhanden, mindestens 1 Zeichen und maximal 50 zeichen lang
    if(isset($_POST['lastname']) && !empty(trim($_POST['lastname'])) && strlen(trim($_POST['lastname'])) <= 50){
        // Spezielle Zeichen Escapen > Script Injection verhindern
        $lastname = htmlspecialchars(trim($_POST['lastname']));
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte einen korrekten Nachnamen ein.<br />";
    }


    // Email-Adresse vorhanden, mindestens 1 Zeichen und maximal 255 zeichen lang
    if(isset($_POST['email']) && !empty(trim($_POST['email'])) && strlen(trim($_POST['email'])) <= 255){
        $email = htmlspecialchars(trim($_POST['email']));
        // korrekte Email-Adresse?
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $error .= "Geben Sie bitte eine korrekte Email-Adresse ein<br />";
        }
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Geben Sie bitte eine korrekte Email-Adresse ein.<br />";
    }

    // Passwort vorhanden, mindestens 8 Zeichen
    if(isset($_POST['password']) && !empty(trim($_POST['password']))){
        $password = trim($_POST['password']);
        //entspricht das passwort unseren vorgaben? (minimal 8 Zeichen, Zahlen, Buchstaben, keine Zeilenumbrüche, mindestens ein Gross- und ein Kleinbuchstabe)
        if(!preg_match("/(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
            $error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
        }
    } else {
        // Ausgabe Fehlermeldung
        $error .= "Gebe bitte einen korrektes Passowort ein.<br />";
    }


    // wenn kein Fehler vorhanden ist, schreiben der Daten in die Datenbank
    if(empty($error)){
        // Datenbank Verbindung importieren
        include "connectors/db-frontend.inc.php";

        // INPUT Query erstellen, welches firstname, lastname, username, password, email in die Datenbank schreibt
        $query = "INSERT INTO User (username, firstname, lastname, email, password) VALUES (?,?,?,?,?)";

        // Query vorbereiten mit prepare();
        $stmt = $mysqli->prepare($query);

        // Password hashing
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Parameter an Query binden mit bind_param();
        $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $password_hash);

        // Query ausführen mit execute();
        $stmt->execute();

        // Verbindung schliessen
        $mysqli->close();

        // Weiterleitung auf login.php
        header('Location: index.php');
    }
}
?>