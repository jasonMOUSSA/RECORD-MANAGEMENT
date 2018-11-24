<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once "func.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Enregistrement
    if (isset($_POST['btnajouter'])){
        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['login']) && !empty($_POST['motdepasse']) && !empty($_POST['confirmemdp']) && !empty($_POST['service']) && !empty($_POST['attribution'])){
            $nom = e($_POST['nom']);
            $prenom = e($_POST['prenom']);
            $login = e($_POST['login']);
            $mdp = e($_POST['motdepasse']);
            $mdp2 = e($_POST['confirmemdp']);
            $service = e($_POST['service']);
            $attribution = e($_POST['attribution']);
            if ($mdp != $mdp2){
                $_SESSION['msg']['type'] = "warning";
                $_SESSION['msg']['txt'] = "Les mots de passes saisis sont differents";
                header("location:../register.php");
                exit();
            }else{
                $q = $db->prepare("INSERT INTO users(nom,prenom,id_cat,id_serv,mdp,login) VALUES(:nom,:prenom,:id_cat,:id_serv,:mdp,:login)");
                $q->execute([
                    "nom"=>$nom,
                    "prenom"=>$prenom,
                    "id_cat"=>$attribution,
                    "id_serv"=>$service,
                    "mdp"=>sha1($mdp),
                    "login"=>$login
                ]);
                $_SESSION['msg']['type'] = "success";
                $_SESSION['msg']['txt'] = "votre enregistrement a reussi, connectez-vous!";
                header("location:../index.php");
                exit();
            }
        }else{
            $_SESSION['msg']['type'] = "warning";
            $_SESSION['msg']['txt'] = "Veuillez saisir correctement tous les champs requis";
            header("location:../register.php");
            exit();
        }
        //Connection
    }elseif (isset($_POST['connecter'])){
        if (!empty($_POST['login']) && !empty($_POST['mdp'])){
            $login = e($_POST['login']);
            $mdp = e($_POST['mdp']);
            $mdp = sha1($mdp);
            $q = $db->prepare("SELECT * FROM users WHERE login = :login  AND mdp = :mdp ");
            $q->execute([
                "login" => $login,
                "mdp" => $mdp
            ]);
            $user = $q->fetch();
            if (!empty($user)){
                $_SESSION['user'] = $user;
                $_SESSION['msg']['type'] = "info";
                $_SESSION['msg']['txt'] = "bienvenue ".htmlspecialchars_decode($user['prenom'])." ".htmlspecialchars_decode($user['nom']);
                header("location:../index.php");
                exit();
            }else{
                $_SESSION['msg']['type'] = "warning";
                $_SESSION['msg']['txt'] = "mot de passe ou login incorrect";
                header("location:../index.php");
                exit();
            }
        }
    }elseif (isset($_POST['addService'])){
        if (!empty($_POST['nomservice']) && !empty($_POST['details'])){
            $nomService = e($_POST['nomservice']);
            $details = e($_POST['details']);
            $q = $db->prepare("INSERT INTO service(nom_serv, details) VALUES (:nomService,:details)");
            $q->execute([
                "nomService" => $nomService,
                "details" => $details
            ]);
            mkdir("../archives/".$nomService);
            $_SESSION['msg']['type'] = "info";
            $_SESSION['msg']['txt'] = "Service ajouter avec success";
            header("location:../addService.php");
            exit();
        }
    }elseif(isset($_POST['editProfil'])){
        //Login
        if (!empty($_POST['login'])) {
            $login = e($_POST['login']);
            $id = $_SESSION['user']['id'];
            $q = $db->prepare("UPDATE users SET login = :login WHERE id = :id");
            $q->execute([
                "login"=>$login,
                "id"=>$id
                ]);
        }

        //details
        if (!empty($_POST['details'])) {
            $details = e($_POST['details']);
            $id = $_SESSION['user']['id'];
            $q = $db->prepare("UPDATE users SET details = :details WHERE id = :id");
            $q->execute([
                "details"=>$details,
                "id"=>$id
                ]);
        }

        //Motde passe
        if (!empty($_POST['mdp']) && !empty($_POST['newMdp']) && !empty($_POST['newMdp2'])) {
            $mdp = e($_POST['mdp']);
            $newMdp = e($_POST['newMdp']);
            $newMdp2 = e($_POST['newMdp2']);
            $ancienMdp = $_SESSION['user']['mdp'];
            if ($mdp == $ancienMdp) {
                if ($newMdp2 == $newMdp) {
                    $newMdp = sha1($newMdp);
                    $q = $db->prepare("UPDATE users SET mdp = :mdp WHERE id = :id");
                    $q->execute([
                        "mdp"=>$newMdp,
                        "id"=>$id
                    ]);
                }else{
                    $_SESSION['msg']['type'] = "danger";
                    $_SESSION['msg']['txt'] = "les deux mot de passe saisis ne correspondent pas";
                    header("location:../user.php");
                    exit();
                }
            }else{
                $_SESSION['msg']['type'] = "danger";
                $_SESSION['msg']['txt'] = "le mot de passe saisi ne correspond pas à l'ancien mot de passe";
                header("location:../user.php");
                exit();
            }
        }
        if (empty($_POST['mdp']) && empty($_POST['newMdp']) && empty($_POST['newMdp2']) && empty($_POST['login']) && empty($_POST['details'])) {
            $_SESSION['msg']['type'] = "danger";
            $_SESSION['msg']['txt'] = "veuillez remplir un champ minimum";
            header("location:../user.php");
            exit();
        }else{
            $_SESSION['msg']['type'] = "info";
            $_SESSION['msg']['txt'] = "profil modifier avec succes";
            header("location:../user.php");
            exit();
        }
    }elseif (isset($_POST['addCategorie'])){
        if (!empty($_POST['nomcat']) && !empty($_POST['details'])){
            $nomCat = e($_POST['nomcat']);
            $details = e($_POST['details']);
            $q = $db->prepare("INSERT INTO categorie(nom_cat, details) VALUES (:nomcat,:details)");
            $q->execute([
                "nomcat" => $nomCat,
                "details" => $details
            ]);
            $_SESSION['msg']['type'] = "info";
            $_SESSION['msg']['txt'] = "categorie ajouter avec success";
            header("location:../addCategorie.php");
            exit();
        }else{
            $_SESSION['msg']['type'] = "warning";
            $_SESSION['msg']['txt'] = "veuillez remplir tous les champs requis";
            header("location:../addCategorie.php");
            exit();
        }
    } else{
        $_SESSION['msg']['type'] = "danger";
        $_SESSION['msg']['txt'] = "erreur inconnu !";
        header("location:../index.php");
        exit();
    }
}else{
    $_SESSION['msg']['type'] = "danger";
    $_SESSION['msg']['txt'] = "action strictement intgerdit !";
    header("location:../index.php");
    exit();
}