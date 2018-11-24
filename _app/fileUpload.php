<?php
include_once "func.php";
if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['envoyer'])){
        if (!empty($_POST['domaine']) || !empty($_POST['nom_fic']) || !empty($_POST['type']) || !empty($_POST['details'])){
            $nom_fic = htmlspecialchars($_POST['nom_fic']);
            $domaine = e($_POST['domaine']);
            $type = e($_POST['type']);
            $details = e($_POST['details']);
            $nom_user = e($_SESSION['user']["prenom"]. " ".$_SESSION['user']["nom"]);

            $id_serv = $_SESSION['user']['id_serv'];
            $q = $db->query("SELECT * FROM service WHERE id_serv = $id_serv");
            $serv = $q->fetch();
            $service = $serv['nom_serv'];

            $target_dir = "../archives/".$service."/";
            $uploadOk = 1;
            $extension = explode(".",$_FILES['fileName']['name']);
            $extension = array_pop($extension);
            $nom_fic = $nom_fic.".".$extension;
            $target_file = $target_dir .$nom_fic;
            if (is_numeric($domaine)){
                $uploadOk = 0;
            }
// Check if file already exists
            if (file_exists($target_file)) {
                $_SESSION['msg']['type'] = "danger";
                $_SESSION['msg']['txt'] = "Sorry, file already exists.";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["fileName"]["size"] > 5000000 || $_FILES["fileName"]["size"] == 0) {
                $_SESSION['msg']['type'] = "danger";
                $_SESSION['msg']['txt'] = "Sorry, your file is too large : ".$_FILES["fileName"]["size"];
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                header("location:../archiver.php");
                exit();
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
                    $q = $db->prepare("INSERT INTO fichiers(nom_fic, details, date_entre, nom_user, domaine, service, type) VALUES(:nom,:details,NOW(),:nom_user,:domaine,:service,:type) ");
                    $q->execute([
                        "nom" => $nom_fic,
                        "details" => $details,
                        "nom_user" => $nom_user,
                        "domaine" => $domaine,
                        "service" => $service,
                        "type" => $type,
                    ]);
                    $_SESSION['msg']['type'] = "info";
                    $_SESSION['msg']['txt'] = "Le fichier ".$nom_fic." a ete uploader avec succes";
                    header("location:../consulter.php");
                } else {
                    var_dump($_FILES);
                    var_dump($_POST);

                    echo $target_file."<br/>";
                    echo "Sorry, there was an error uploading your file.";
                }
            }
           }
    }
}
//header("location:archiver.php");
//exit();