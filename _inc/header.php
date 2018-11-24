<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include "_app/func.php"?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? $title. ' | Jason Archiver' : 'Jason Archiver. | Archiveur electronique'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mdb.css">
    <link href="css/style.css" rel="stylesheet">

    <link rel="icon" href="img/logoM.png">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.js"></script>
    <![endif]-->
</head>
<body>
<?php include "navbar.php";

if (!empty($_SESSION['msg'])):?>
    <div class="alert alert-<?=$_SESSION['msg']['type']?> alert-dismissable fade in" style="text-align: center;text-transform: uppercase;font-size: large">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?= $_SESSION['msg']['txt']?>
    </div>
<?php  unset($_SESSION['msg']); endif;?>
    <div class="container" style="margin-top: 2%">
