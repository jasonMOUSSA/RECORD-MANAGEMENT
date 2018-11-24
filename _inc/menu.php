<div class="row content block1">
    <div class="col-xs-2 col1">
        <div class="panel">
            <div class="panel-heading">
                <a href="#"><img src="img/loupe.png" class="img-responsive"></a>
            </div>
            <ul class="nav nav-staked">
                <li><a href="index.php" class="glyphicon glyphicon-home"> Acceuil</a></li>
                <li><a href="consulter.php" class="glyphicon glyphicon-book"> Consulter</a></li>
                <li><a href="archiver.php" class="glyphicon glyphicon-certificate"> Archiver</a></li>
                <?php if ($_SESSION["user"]['id_cat'] == 1):?>
                    <li><a href="gerer.php" class="glyphicon glyphicon-bookmark"> Gerer</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div><!--fin col1-->