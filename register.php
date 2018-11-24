<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once "_app/isConnect.php";
if (is_connect()){
    $_SESSION['msg']['type'] = "info";
    $_SESSION['msg']["txt"] = "veuillez vous déconnecter puis réessayer !";
    header("location:index.php");
    exit();
}
include "_inc/header.php";?>
    <div class="row header">
        <div class="col-xs-4">
            <img src="img/logoM.png" class="logoJason img-responsive"/>
        </div>
        <div class="col-xs-6 col-xs-offset-2">
            <blockquote>
                <p>Connectez-vous tout en restant calme, jason Archiver s'occupe de tout
                </p>
                <small>
                    jason MOUSSA
                </small>
            </blockquote>
        </div>
    </div><!--row header-->
    <div class="row content block1">
        <div class="col-xs-6">
            <img src="img/centre.jpeg" class="padlock img-responsive"/><br/>

            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Acceuil
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    CREE UN NOUVEAU COMPTE
                </div>
                <form role="form" action="_app/formValidator.php" method="post" autocomplete="off">
                        <?php
                        if (!empty($_SESSION['error'])){
                            ?>
                        <span style="color: #ff643f"><?= ucfirst($_SESSION['error']) ?></span>
                            <?php
                        }
                        session_destroy();
                        ?>
                    <div class="panel-body">
                            <div class="form-group">
                                <label for="prenom"> </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom"/>
                                </div>
                                <label for="nom"> </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required/>
                                </div>
                                <br/>
                            </div><!--form-group-->
                            <div class="form-group">
                                <br/>
                                <label for="login"></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="login" name="login" placeholder="Exemple: Jasonmoussa@gmail.cd" required/>
                                </div>
                                <br/>
                            </div><!--form-group-->
                            <div class="form-group">
                                <br/>
                                <label for="password"></label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required/>
                                </div>
                                <br/>
                            </div><!--form group-->
                            <div class="form-group">
                                <br/>

                                <div class="col-sm-12">
                                    <input type="password" class="form-control" name="confirmemdp" placeholder="Comfirmer mot de passe" required/>
                                </div>
                                <br/>
                            </div><!--form group-->
                            <br/>
                            <div class="form-group">
                                <label for="serv"></label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="serv" name="service">
                                        <?php $q = $db->query("SELECT * FROM service ORDER BY id_serv");
                                        while ($services = $q->fetch()): ?>
                                            <option value="<?= $services["id_serv"] ?>"><?= $services["nom_serv"] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <label for="attribution"> </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="attribution" name="attribution">
                                        <?php $q = $db->query("SELECT * FROM categorie ORDER BY id_cat");
                                        while ($categories = $q->fetch()): ?>
                                            <option value="<?= $categories["id_cat"] ?>"><?= $categories["nom_cat"] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <br/>
                            </div><!--form-group-->
                            <div class="btn-group-lg text-center">
                                <button class="btn btn-primary" type="submit" id="btnajuter" name="btnajouter">Connexion</button>
                                <button class="btn btn-warning" type="reset">Tout effacer</button>
                            </div>

                        </form>
                        <div class="col-xs-6 text-center">
                            <a href="index.php">Vous avez deja un compte ?</a>
                        </div>
                        <div class="col-xs-6 text-center">
                            <a href="help.php">Besoin d'aide ?</a>
                        </div>
                    </div>

            </div>
        </div>
<?php include "_inc/footer.php";?>