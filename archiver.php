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
}
include "_inc/header.php";
include "_inc/menu.php";
?>
    <div class="col-xs-8 col2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>Remplissez le formulaire </h1>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="_app/fileUpload.php" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-4">
                            <input id="intitule" class="form-control" type="text" placeholder="Entrer nom Archive" name="nom_fic">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="domaine" class="col-sm-2 control-label">Domaine</label>
                        <div class="col-sm-4">
                        <select class="form-control" id="domaine" name="domaine">
                            <?php $q = $db->query("SELECT * FROM domaine ORDER BY id_dom");
                            while ($domaine = $q->fetch()): ?>
                                <option value="<?= $domaine["nom_domaine"] ?>"><?= $domaine["nom_domaine"] ?></option>
                            <?php endwhile; ?>
                        </select>
                        </div>
                        <label for="Type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-4">
                            <select id="Type" class="form-control" name="type">
                                <option value="input">Input</option>
                                <option value="output">Output</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Document</label>
                        <div class="col-sm-4">
                            <input id="fichier" class="form-control" type="file" name="fileName">
                        </div>
                    </div>
                    <!--f-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Traitement</label>
                        <div class="col-sm-10">
                            <textarea id="traitement" class="form-control input-xlarge" name="details" rows="3" placeholder="Traiment"></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button Type="submit" class="btn btn-primary" name="envoyer">Enregistrer</button>
                            <button Type="reset" class="btn btn-primary col-sm-offset-1">Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!--div panel-->
    </div><!--fin col2-->
    <div class="col-xs-2 col3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ajouter
            </div>
            <ul class="nav nav-staked">
                <li><a href="addCategorie.php">Ajouter Categorie</a></li>
                <li><a href="addservice.php">Ajouter Service</a></li>
            </ul>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Factures
            </div>
            <a href="#"><img src="img/index.jpg" class="img-responsive"></a>
        </div>
    </div><!--fin col3-->
<?php include "_inc/footer.php";?>