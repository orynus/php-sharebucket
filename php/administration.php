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

        $navbar_title = "Adminbereich";
        include "templates/navbar.php";
        include "templates/user-modal.php";
    ?>
    <div class="container-fluid" id="adminbereich">
        <div class="">
        </div>
        <div class="col-md-4 col-lg-2">
            <ul class="list-group">
                <?php 
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
</body>
</html>

