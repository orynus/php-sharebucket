<?php

// Wurden Daten mit "POST" gesendet und handelt es sich um logout Request?
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])){

    $_SESSION = array();
    session_destroy();

}
?>