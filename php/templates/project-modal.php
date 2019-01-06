<!-- Modal Project -->
<form method="post" action="">
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
                                <input type="text" class="form-control" name="title" placeholder="Projekt Name" maxlength="50" required="true">
                            </div>

                            <!-- Kurzbeschreibung -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-pencil"></span>
                                    </div>
                                </div>
                                <textarea class="form-control" name="short_description" placeholder="Kurzbeschreibung" rows="3" maxlenght="100" required="true"></textarea>
                            </div>

                            <!-- Beschreibung -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-pencil"></span>
                                    </div>
                                </div>
                                <textarea class="form-control" name="description" placeholder="Beschreibung" rows="5" maxlenght="10000" required="true"></textarea>
                            </div>

                            <!-- Kategorie -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">
                                        <span class="fa fa-folder-open"></span>
                                    </label>
                                </div>
                                <select class="custom-select" name="idCategory" required>
                                    <option selected disabled hidden>Wähle eine Kategorie...</option>
                                    <option value="1">First</option>
                                </select>
                            </div>
                        </div>

                        <!-- Kennzeichnung der Project Form -->
                        <input type="hidden" name="project">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">Projekt hinzufügen</button>
                </div>
            </div>
        </div>
    </div>
</form>