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
$id = $_SESSION['user']['id_serv'];
include '_inc/header.php';
include '_inc/menu.php';
$q = $db->query("SELECT nom_serv FROM service WHERE id_serv = $id");
$service = $q->fetch();
?>
<div class="col-xs-10">
    <h1>Identité :</h1><br/>
    <div class="row">
        <div class="col-xs-2">
            <img src="img/user.png" class="img-circle" alt="" width="125px">
        </div>
        <div class="col-xs-8">
            Nom : <?= strtoupper($_SESSION['user']['nom'])?><br/>
            Prenom : <?= ucfirst($_SESSION['user']['prenom']) ?><br/>
            Details : <?= ucfirst($_SESSION['user']['details'])?><br/>
            Service : <?= ucfirst($service['nom_serv'])?><br/>
        </div>
        <hr/>
    </div>
</div>
</div>
<?php include '_inc/footer.php';?>