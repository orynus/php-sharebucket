<?php
/**
 * Author: Noah Grun
 * Date: 04.12.2018
 */






?>


<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="author" content="Noah Grun, Linus Degen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Tag -->
    <title>Sharebucket | Index</title>

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

    <!-- Ausgabe von Meldungen -->
    <?php
    if(!empty($error)){
        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
    } else if (!empty($message)){
        echo "<div class=\"alert alert-success\" role=\"alert\">" . $message . "</div>";
    }
    ?>

    <!-- Navbar with Login -->
    <nav class="navbar navbar-light bg-dark fixed-top">
        <a class="navbar-brand" href="#">
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

                    <!-- Login Form -->
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
                            <span id="LoginText">Noch kein Mitglied? Klicke jetzt auf den "Registrieren"-Button</span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Abbrechen</button>
                    <a href="registration.php"><button type="button" class="btn btn-secondary">Registrieren</button></a>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Jumbotron (Title, subtitle, project button) -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Sharebucket</h1>
            <p class="lead">
                Hast du keine Idee für Dein nächstes Software-Projekt?<br>
                Sharebucket ist eine Webseite, die es Dir ermöglicht, Dich von Projektideen andere inspirieren zu lassen und eigene Ideen mit anderen zu teilen.. </p>

            <hr>

            <!-- Projekt hinzufügen -->
            <div class="addProject" >
                <p><span>Füge jetzt deine Projektidee hinzu..</span></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewProject">Neues Projekt</button>
            </div>

                <!-- Modal Project -->
            <form>
            <div class="modal fade" id="ModalNewProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Neues Projekt hinzufügen..</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- Projekt Form -->
                                <div class="form-row align-items-center">
                                    <!-- Projekt-Name -->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fa fa-briefcase"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="ProjektName" placeholder="Projekt Name" maxlength="50" required="true">
                                    </div>

                                    <!-- Kurzbeschreibung -->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fa fa-pencil"></span>
                                            </div>
                                        </div>
                                        <textarea class="form-control" id="ProjektKurzbeschreibung" placeholder="Kurzbeschreibung" rows="3" maxlenght="100" required="true"></textarea>
                                    </div>

                                    <!-- Beschreibung -->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fa fa-pencil"></span>
                                            </div>
                                        </div>
                                        <textarea class="form-control" id="ProjektBeschreibung" placeholder="Beschreibung" rows="5" maxlenght="10000" required="true"></textarea>
                                    </div>

                                    <!-- Kategorie -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">
                                                <span class="fa fa-folder-open"></span>
                                            </label>
                                        </div>
                                        <select class="custom-select" id="inputSelectCategory" required>
                                            <option selected disabled hidden>Wähle eine Kategorie...</option>
                                            <option value="1">First</option>
                                        </select>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Abbrechen</button>
                            <button type="submit" class="btn btn-primary">Projekt hinzufügen</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
        </div>
    </div>



    <!-- JavaScript import -->
    <script src="js/frontend.js"></script>
</body>
</html>

