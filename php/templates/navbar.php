<?php
    if(!empty($error)){
        echo "<div class=\"alert alert-danger\" role=\"alert\">" . $error . "</div>";
    } else if (!empty($message)){
        echo "<div class=\"alert alert-success\" role=\"alert\">" . $message . "</div>";
    }
?>

<!-- Navbar with Login -->
<nav class="navbar navbar-light bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">
        <img src="img/sb_logo.png" width="32" height="32" alt="">
        <span>Sharebucket</span>
    </a>

    <!-- Login-Button -->
    <?php if($_SESSION['loggedIn']) { ?>
        <div class="user" align="right" data-toggle="modal" data-target="#ModalUserData">
            <span class="right"><?php echo "Hello, " . $_SESSION['user']['username'];?></span>
            <img src="img/sb_user.png" align="right" sizes="32x32" />
        </div>
    <?php } else { ?>
        <div class="user" align="right" data-toggle="modal" data-target="#ModalUser">
            <span class="right">Login</span>
            <img src="img/sb_user.png" align="right" sizes="32x32" />
        </div>
    <?php } ?>
</nav>