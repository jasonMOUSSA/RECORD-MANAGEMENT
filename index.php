<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include "_inc/header.php";
if (empty($_SESSION['user'])):?>
    <div class="row header">
        <div class="col-xs-4 col-lg-4">
                    <h3 style="color:black;font-family: 'Showcard Gothic',sans-serif" >COMMUNE KAMPEMBA
                        <img src="img/Drapeau.gif" width="58px"></h3>
        </div>
        <div class="col-xs-6 col-xs-offset-2 col-lg-6">
            <blockquote>
                <p>Connectez-vous tout en restant calme, Jason Archiver s'occupe de tout
                </p>
                <small>
                    Jason MOUSSA
                </small>
            </blockquote>
        </div>
    </div><!--row header-->
    <div class="row content block1">
        <div class="col-xs-6 col-lg-6" >
            <form >
                <img src="img/lo.gif" class="padlock img-responsive">
            </form>
        </div>
        <div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    AUTHENTIFICATION
                </div>
                <div class="panel-body">
                    <form action="_app/formValidator.php" method="POST" autocomplete="off">
                        <div class="col-xs-12">
                            <input type="text" class="form-control"  id="pseudonyme" name="login" placeholder="Identifiant" required>
                        </div>
                        <br>
                        <div class="col-xs-12">
                            <input type="password" class="form-control" id="motdepasse" name="mdp" placeholder="Mot de passe" required>
                        </div>
                        <br>
                        <div class="btn-group btn-group-lg" style="padding-top: 12px">
                            <button class="btn btn-primary" type="submit" id="connecter" name="connecter">Connexion</button>
                            <button class="btn btn-warning" type="reset">Annuler</button>
                        </div>

                    </form>
                    <div class="text-center">
                        <a href="register.php">Creer un compte</a>
                    </div>
                </div>

            </div>
        </div>
    </div><!--row content block1-->
<?php else:
    include "_inc/menu.php";?>
            <div class="col-xs-7 col2">
                <div class="jumbotron">
                    <h2>Archiver en toute securite</h2>
                    <p>
                        Dans le dictionnaire de l’information, l’archivage est defini comme: l’ensemble des méthodes, processus et outils mis en œuvre pour gérer et conserver les documents qui ont cessé d’être d’utilité courante, cette definition, aujourd’hui, est presque obsolete car l’archivage touche l’ensemble des documents, les trois âges. Marie-Anne CHABIN, archiviste française, présente l’archivage comme étant "la démarche d’organisation qui a pour objectif d’identifier, de mettre en securite et de maintenir disponibles l’ensemble des documents qui engagent une entreprise ou un organisme vis-à-vis des tiers ou de son activité future et dont le défaut représenterait un risque .
                    </p>
                    <a href="archiver.php" class="btn btn-success">Archiver maintenant</a>
                </div>
            </div><!--fin col2-->
            <div class="col-xs-3 col3">
                <form id="search" method="get" action="consulter.php">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span>
                        </div>
                        <input type="search" name="search" class="form-control" placeholder="Rechercher...">
                    </div>
                    <button class="btn btn-toolbar">Aller</button>
                </form>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        La simplicté
                    </div>
                    <img src="img/archivage.jpg " class="img-responsive">
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        La rapidité
                    </div>
                    <img src="img/images.jpg " class="img-responsive">
                </div>
            </div><!--fin col3-->
        </div><!--row content block1-->
<?php endif; include "_inc/footer.php"?>