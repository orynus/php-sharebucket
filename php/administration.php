<?php
/**
 * Author: Linus Degen
 * Date: 06.01.2019
 */
session_start();

if(!$_SESSION['user']['isAdmin']) {
    header("Location: index.php");
}

include "actions/logout_user.php";
include "actions/add_category.php";
include "actions/delete_project.php";

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="author" content="Noah Grun, Linus Degen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Tag -->
    <title>Sharebucket | Adminbereich</title>

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
        include "actions/get_users.php";
        include "actions/get_categorys.php";
        include "actions/get_projects.php";

        $navbar_title = "Adminbereich";
        include "templates/navbar.php";
        include "templates/user-modal.php";
    ?>
    <div class="container-fluid" id="adminbereich">
    <div class="row">
        <div class="col-md-8 col-lg-10">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h3>Projekte</h3>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titel</th>
                            <th scope="col">Kategorie</th>
                            <th scope="col">Benutzer</th>
                            <th scope="col">Auswählen</th>
                            <th scope="col">Löschen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($projects AS $project) {
                                // Projektattribute
                                $id = $project['idProject'];
                                $title = $project['title'];
                                foreach($users AS $user) {
                                    if($user['idUser'] == $project['idUser']) {
                                        $project_user = $user['username'];
                                    }
                                }
                                foreach($categorys AS $category) {
                                    if($category['idCategory'] == $project['idCategory']) {
                                        $project_category = $category['topic'];
                                        $category_color = $category['color'];
                                    }
                                }?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $title ?></td>
                                    <td><span style="color: <?php echo $category_color ?>;"><?php echo $project_category ?><span></td>
                                    <td><?php echo $project_user ?></td>
                                    <td>
                                        <form action="" method="get">
                                            <input type="hidden" name="id" value=<?php echo $id?>>
                                            <button class="btn btn-info" type="submit">Auswählen</button>
                                        </form>
                                    </td>    
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="delete_project" value=<?php echo $id?>>
                                            <button class="btn btn-danger" type="submit">Löschen</button>
                                        </form>
                                    <td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class=" col-md-12 col-lg-4">
                    <?php
                    // Wenn eine Projekt id vorhanden ist und kein Projekt gelöscht wurde
                    if(isset($_GET['id']) && !isset($_POST['delete_project'])){
                        foreach($projects AS $project){
                            if($project['idProject'] == $_GET['id']) {
                                // Attribute setzen
                                $title = $project['title'];
                                $short_description = $project['short_description'];
                                $description = $project['description'];
                            }
                        }

                        // Template um Details darzustellen
                        include "templates/project-detail.php";
                    }
                    
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2">
            <h3>Kategorien</h3>
            <ul class="list-group">
                <?php
                // Alle Kategorien auflisten mit Farbe
                foreach($categorys as $category) {
                    echo "<li class='list-group-item' style='background-color: " . $category['color'] . ";'>" . $category['topic'] . "</li>";
                }
                ?>
            </ul>
            <form id="neueKategorie" method="post" action="">
                <h6>Neue Kategorie</h6>
                <div class="form-row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Topic" name="topic">
                    </div>
                    <div class="col-4">
                        <input type="color" class="form-control" name="color">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="form-control"> + </button>
                    </div>
                </div>   
            </form>
        </div>
    </div>
    </div>
</body>
</html>

