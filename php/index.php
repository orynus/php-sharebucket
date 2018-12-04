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
    <title>Sharebucket</title>

    <!-- Icon -->
    <link rel="icon" href="img/sb_icon.gif" type="image/gif" sizes="32x32">

    <!-- JQuery import -->
    <script src="https://code.jquery.com/jquery-3.3.0.slim.min.js"></script>

    <!-- Bootstrap import -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- CSS import -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>

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
    <div class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bitte loggen Sie sich ein!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Login Form -->
                    <form>
                        <div class="form-row align-items-center">
                            <!-- Username -->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fa fa-user"></span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="inputusername" placeholder="Username">
                                </div>

                            <!-- Passwort -->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" id="inputpassword" placeholder="Passwort">
                                </div>
                            <span id="LoginText">Noch kein Mitglied? Klicke jetzt auf den "Registrieren"-Button</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Registrieren</button>
                    <button type="button" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Title, subtitle -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Sharebucket</h1>
            <p class="lead">
                Hast du keine Idee für Dein nächstes Software-Projekt?<br>
                Sharebucket ist eine Webseite, die es Dir ermöglicht, Dich von Projektideen andere inspirieren zu lassen und eigene Ideen mit anderen zu teilen.. </p>

            <hr>

            <!-- Projekt hinzufügen -->
            <div class="addProject" data-toggle="modal" data-target="#ModalNewProject">
                <p><span>Füge jetzt deine Projektidee hinzu..</span></p>
                <button type="button" class="btn btn-primary">Neues Projekt</button>
            </div>

                <!-- Modal Project -->
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

                            <!-- Login Form -->
                            <form>
                                <div class="form-row align-items-center">
                                    <!-- Projekt-Name -->
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fa fa-pencil"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="ProjektName" placeholder="Projekt Name" required="true">
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




                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger">Abbrechen</button>
                            <button type="button" class="btn btn-primary">Projekt hinzufügen</button>
                        </div>
                    </div>
                </div>
                </div>



        </div>
    </div>



    <!-- JavaScript import -->
    <script src="js/frontend.js"></script>
</body>
</html>

