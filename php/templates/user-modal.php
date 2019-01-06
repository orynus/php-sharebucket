<!-- User Modal -->
<form id="LoginForm" method="post" action="">
    <div class="modal fade" id="ModalUserData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hello, <?php echo $_SESSION['user']['username']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Firstname: <?php echo $_SESSION['user']['firstname']?></p>
                    <p>Lastname: <?php echo $_SESSION['user']['lastname']?></p> 
                </div>
                <input type="hidden" name="logout">
                <div class="modal-footer">
                    <?php if($_SESSION['loggedIn'] && $_SESSION['user']['isAdmin']) { ?>
                    <a href="administration.php"><button type="button" class="btn btn-primary">Adminbereich</button></a>
                    <?php } ?>
                    <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">Abbrechen</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </div>
            </div>
        </div>
    </div>
</form>