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
<div class="col-xs-6">
    <?php
$a = $db->query("SELECT * FROM service");
while ($service = $a->fetch()):?>
    <h1><?=strtoupper($service['nom_serv'])?></h1>
    Le nombre d'enregistrement est : <?php
    $q = $db->query("SELECT count(*) FROM fichiers WHERE service = '".$service['nom_serv']."'");
    $nb = $q->fetch();
    echo $nb[0]."<br/>";
    ?>
    Supprimer un fichier :
    <br/>
    <?php
    $q = $db->query("SELECT * FROM fichiers WHERE service = '".$service['nom_serv']."'");
    while ($fic = $q->fetch()):
        ?>
        <form action="delete.php" method="post">
            <label for="" style="font-size:larger;color: #3F51B5"><?=$fic['nom_fic']?></label>
            <input type="hidden" id="" name="nom_fic" />
            <input type="submit" value="supprimer" class="btn btn-danger"/>
            <br/>
        </form>
    <?php
    endwhile;
    endwhile;?>
</div>
    <div class="col-xs-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ajouter
            </div>
            <ul class="nav nav-staked">
                <li><a href="addCategorie.php">Ajouter Categorie</a></li>
                <li><a href="addService.php">Ajouter Service</a></li>
            </ul>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Factures
            </div>
            <a href="#"><img src="img/index.jpg" class="img-responsive" width="100%"></a>
        </div>
    </div><!--fin col3-->
</div>
<?php include "_inc/footer.php";?>