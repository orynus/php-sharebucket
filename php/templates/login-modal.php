<!-- Login Modal -->
<form id="LoginForm" method="post" action="">
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
                                <input type="text" class="form-control" name="username" placeholder="Username" required="true">
                            </div>

                            <!-- Passwort -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Passwort" required="true">
                            </div>
                            <span id="LoginText">Noch kein Mitglied? Klicke jetzt auf den "Registrieren"-Button</span>
                        </div>
                </div>
                <input type="hidden" name="login">
                <div class="modal-footer">
                    <a href="registration.php"><button type="button" class="btn btn-secondary">Registrieren</button></a>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
</form>