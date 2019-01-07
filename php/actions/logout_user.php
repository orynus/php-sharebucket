<?php

// Wurden Daten mit "POST" gesendet und handelt es sich um logout Request?
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])){

    // Initialisierung
    $error = $message =  '';

    $_SESSION = array();
    session_destroy();
    $message .= 'Du wurdest erfolgreich ausgeloggt!';
}
?>