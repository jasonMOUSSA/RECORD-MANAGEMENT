<?php
include_once "_app/func.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nom_fic = e($_GET[sha1("files")]);
    $q = $db->query("DELETE FROM fichiers WHERE nom_fic = $nom_fic");
    $_SESSION['msg']['type'] = "info";
    $_SESSION['msg']['txt'] = "fichier supprimer avec succes";
    header("location:gerer.php");
    exit();
}else{
    $_SESSION['msg']['type'] = "warning";
    $_SESSION['msg']['txt'] = "Erreur inconnu !";
    header("location:gerer.php");
    exit();
}