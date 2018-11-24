<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include "_app/isConnect.php";
if (!is_connect()){
    $_SESSION['msg']['type'] = "danger";
    $_SESSION['msg']["txt"] = "veuillez vous connecter svp";
    header("location:index.php");
    exit();
}
include "_inc/header.php";
include "_inc/menu.php";
?>
        <div class="col-xs-8">

            <form id="search" method="get" action="consulter.php">
                <div class="row">
                    <div class="col-xs-10">
                        <input type="search" class="form-control" name="<?= sha1("nom") ?>" placeholder="Rechercher..." >
                    </div>
                    <div class="col-xs-2">
                        <button class="btn btn-success" type="submit" name="envoyer" style="margin: inherit;">ALLER</button>
                    </div>
                </div>
            </form>
    <br/>
            <div class="row">

                <div class="col-xs-8">
                    <div class="row">
            <?php
            if (!$_SERVER['REQUEST_METHOD'] == "GET"){
                $q = $db->query("SELECT * FROM fichiers");
            }else{
                if (isset($_GET[sha1("nom")])){
                    $nom = $_GET[sha1("nom")];
                    $q = $db->query("SELECT * FROM fichiers WHERE nom_fic = '"."$nom'");
                }else{
                    $q = $db->query("SELECT * FROM fichiers");
                }
            }
            while ($fichier=$q->fetch()):
            ?>
                <div class="col-xs-4">
                    <a href="consulter.php?<?=sha1('nom')."=".$fichier['nom_fic']?>"><img class="avatar2 mini img-responsive"/></a>
                </div>
                    <div class="col-xs-8 text-left">
                        <address>
                            <b><?=$fichier['nom_fic']?></b><br/>
                            <strong><?= $fichier['domaine']." <br/>".$fichier['service']." <br/>".$fichier['date_entre']?>, par <?= $fichier['nom_user'] ?></strong><br/>
                            Type de fichier : <?=$fichier['type']?>
                        </address>
                        <a href="archives/<?=$fichier['service']?>/<?=$fichier['nom_fic']?>" class="btn btn-success">TELECHARGER</a>
                    </div>
<?php endwhile; ?>


                </div>
            </div>
            <div class="col-xs-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Rechercher.....
                        </div>

                        <a href="#"><img src="img/images2.jpg" class="img-responsive"></a>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Archiver rapidement
                        </div>

                        <a href="#"><img src="img/index.jpg" class="img-responsive"></a>
                    </div>
                </div><!--fin col3-->
    </div><!--Resultat 1-->
<?php include "_inc/footer.php"?>