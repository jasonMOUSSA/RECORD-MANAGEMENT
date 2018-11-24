<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once "_app/isConnect.php";
if (is_connect() && $_SESSION['user']['id_cat'] == "1"){

}else{
    $_SESSION['msg']['type'] = "danger";
    $_SESSION['msg']["txt"] = "vous n'avez pas le droit d'acceder à cette page";
    header("location:index.php");
    exit();
}
include "_inc/header.php";
include "_inc/menu.php";?>

<div class="col-xs-8 col2">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2>Créé nouvelle catégorie </h2>
        </div>
        <div class="panel-body">
            <form role="form" class="form-horizontal" action="_app/formValidator.php" method="post">
                <div class="form-group row">
                    <label for="name" class="control-label col-sm-2">Nom</label>
                    <div class="col-sm-10">
                        <input id="nomservice" class="form-control" type="text" name="nomcat" placeholder="Entrer nom categorie">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="details" class="input-xlarge form-control" rows="3" placeholder="Description categorie"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button Type="submit" class="btn btn-primary" id="enregistrer" name="addCategorie">Enregistrer</button>
                        <button Type="reset" class="btn btn-warning">Tout effacer</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!--div Panel-->
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
