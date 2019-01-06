<!-- User Modal -->
<div class="modal fade" id="ModalUserData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hallo, <?php echo $_SESSION['user']['username']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Firstname: <?php echo $_SESSION['user']['firstname']?></p>
                <p>Lastname: <?php echo $_SESSION['user']['lastname']?></p> 
                <p>Email: <?php echo $_SESSION['user']['email']?></p>
                <form id="neueKategorie" method="post" action="">
                    <h6>Passwort ändern:</h6>
                    <div class="form-row">
                        <div class="col-5">
                            <input type="password" class="form-control" placeholder="Altes Passwort" name="old_password">
                        </div>
                        <div class="col-5">
                            <input type="password" class="form-control" placeholder="Neues Passwort" name="new_password">
                        </div>
                        <div class="col-2">
                            <input type="hidden" name="change_password">
                            <button type="submit" class="form-control btn btn-info"> Ändern </button>
                        </div>
                    </div>   
                </form> 
            </div>
            <div class="modal-footer">
                <?php if($_SESSION['loggedIn'] && $_SESSION['user']['isAdmin']) { ?>
                <a href="administration.php"><button type="button" class="btn btn-primary">Adminbereich</button></a>
                <?php } ?>
                <form id="LoginForm" method="post" action="">
                    <input type="hidden" name="logout">
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
             </div>
        </div>
    </div>
</div>
