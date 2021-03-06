<?php
/**
 * Author: Noah Grun, Linus Degen
 * Date: 04.12.2018
 */

// Session starten
session_start();

// Actions einbinden
include "actions/create_project.php";
include "actions/login_user.php";
include "actions/logout_user.php";
include "actions/change_password.php";

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

    <?php
        // Actions einbinden
        include "actions/get_categorys.php";
        include "actions/get_projects.php";
        include "actions/get_users.php";

        // Templates einbinden
        $navbar_title = "Projektübersicht";
        include "templates/navbar.php"; 
        include "templates/login-modal.php";
        include "templates/project-modal.php";
        include "templates/user-modal.php";
    ?>

    <!-- Jumbotron (Title, subtitle, project button) -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Sharebucket</h1>
            <p class="lead">
                Hast du keine Idee für Dein nächstes Software-Projekt?<br>
                Sharebucket ist eine Webseite, die es Dir ermöglicht, Dich von Projektideen andere inspirieren zu lassen und eigene Ideen mit anderen zu teilen.. </p>
            <hr>

            <!-- Projekt hinzufügen -->
            <?php
            if($_SESSION['loggedIn']) {
            ?>
            <div class="addProject" >
                <p><span>Füge jetzt deine Projektidee hinzu..</span></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNewProject">Neues Projekt</button>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="container">
        <div class="card-columns">
            <?php
            foreach($projects AS $project) {
                $title = $project['title'];
                $short_description = $project['short_description'];
                $description = $project['description'];
                $name = "Anonymous";
                $topic = "No Topic";
                $color = "#FFFFFF";

                foreach($users AS $user) {
                    if($user['idUser'] == $project['idUser']) {
                        $name = $user['firstname'] . " " . $user['lastname'];
                    }
                }

                foreach($categorys AS $category) {
                    if($category['idCategory'] == $project['idCategory']) {
                        $color = $category['color'];
                        $topic = $category['topic'];
                    }
                }

                include "templates/project-card.php";
            }
            ?>
        </div>
    </div>
</body>
</html>

