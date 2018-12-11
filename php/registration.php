<?php
/**
 * Author: Noah Grun
 * Date: 04.12.2018
 */


// Initialisierung
$error = $message =  '';
$username = $firstname = $lastname = $email = $password = '';

/*
// Wurden Daten mit "POST" gesendet?
if($_SERVER['REQUEST_METHOD'] == "POST"){
// Ausgabe des gesamten $_POST Arrays
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


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
    // INPUT Query erstellen, welches firstname, lastname, username, password, email in die Datenbank schreibt
    $query = "INSERT INTO users (username, firstname, lastname, email, password) VALUES (?,?,?,?,?)";

    // Query vorbereiten mit prepare();
    $stmt = $mysqli->prepare($query);

    // Password hashing
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Parameter an Query binden mit bind_param();
    $stmt->bind_param("sssss", $firstname, $lastname, $username, $password_hash, $email);

    // Query ausführen mit execute();
    $stmt->execute();

    // Verbindung schliessen
    $mysqli->close();

    // Weiterleitung auf login.php
    header('Location: login.php');
}



?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="author" content="Noah Grun, Linus Degen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Tag -->
    <title>Sharebucket | Registrierung</title>

    <!-- Icon -->
    <link rel="icon" href="img/sb_icon.gif" type="image/gif" sizes="32x32">

    <!-- JQuery import -->
    <script src="https://code.jquery.com/jquery-3.3.0.slim.min.js"></script>

    <!-- Bootstrap import -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS import -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>


    <!-- Navbar with Login -->
    <nav class="navbar navbar-light bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="img/sb_logo.png" width="32" height="32" alt="">
            <span>Sharebucket</span>
        </a>

        <!-- Login-Button -->
        <div class="user" align="right" data-toggle="modal" data-target="#ModalUser">
            <span class="right">Login</span>
            <img src="img/sb_user.png" align="right" sizes="32x32" />
        </div>
    </nav>

    <!-- User Modal -->
    <form id="LoginForm">
    <div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bitte logge Dich ein!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-row align-items-center">

                            <!-- Username -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="inputusername" placeholder="Username" required="true">
                            </div>

                            <!-- Passwort -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="inputpassword" placeholder="Passwort" required="true">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
    </form>


    <!-- Registration Form -->
    <form id="FrmRegistration" action="index.php">
    <div class="container" id="Registration">
        <h2>Registration</h2>
            <div class="form-row align-items-center">

                <!-- Username -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-user"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="inputUsername" placeholder="Username" tabindex="1" required="true" minlength="6" maxlength="25">
                </div>

                <!-- Vorname -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-address-book"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="inputFirstname" placeholder="Vorname" tabindex="2"  required="true" maxlength="50">
                </div>

                <!-- Nachname -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-address-book"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="inputLastname" placeholder="Nachname" tabindex="3" required="true" maxlength="50">
                </div>

                <!-- E-Mail -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-envelope"></span>
                        </div>
                    </div>
                    <input type="email" class="form-control" id="inputEmail" placeholder="E-Mail Adresse" tabindex="4" required="true" maxlength="255">
                </div>

                <!-- Passwort -->
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" id="inputPassword"
                           placeholder="Passwort (Gross- und Kleinbuchstaben, Zahlen, Sonderzeichen, min. 8 Zeichen, keine Umlaute)" tabindex="5"
                           required="true" pattern="(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                           maxlength="255">
                </div>
                <span id="PasswortFormatHinweis">Passwort-Format: Gross- & Kleinbuchstaben, Zahlen, Sonderzeichen, min. 8 Zeichen, keine Umlaute</span>
            </div>
        <div class="buttons" align="right">
            <a href="index.php"><button type="button" class="btn btn-danger" tabindex="7">Abbrechen</button></a>
            <button type="submit" class="btn btn-primary" tabindex="6">Registrieren</button>
        </div>
        </form>
    </div>

    <!-- JavaScript import -->
    <script src="js/frontend.js"></script>
</body>
</html>