<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once "_app/isConnect.php";
if (!is_connect()){
    $_SESSION['msg']['type'] = "danger";
    $_SESSION['msg']["txt"] = "veuillez vous connecter svp";
    header("location:index.php");
    exit();
}?>
<div class="modal fade" id="editProfil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modifier votre profil</h4>
            </div>
            <form action="_app/formValidator.php" method="POST" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="login" class="control-label text-info">Nom d'utilisateur :</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="<?=$_SESSION['user']['login']?>">
                    </div>
                    <div class="form-group">
                        <label for="details" class="control-label text-info">Brève description :</label>
                        <input type="text" class="form-control" name="details" id="details" placeholder="<?=$_SESSION['user']['details']?>">
                    </div>
                    <div class="form-group">
                        <label for="mdp" class="control-label text-info">Mot de passe :</label>
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Ancien mot de passe">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newMdp" id="mdp" placeholder="Nouveau mot de passe">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newMdp2" id="mdp" placeholder="Confirmer mot de passe">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <input type="submit" name="editProfil" class="btn btn-primary" value="Save changes">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <hr/>
                    <div class="text-muted">Vous pouvez modifier un des trois champs requis</div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
