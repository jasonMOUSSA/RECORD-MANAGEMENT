    <nav class="navbar navbar-default" style="background-color: #00254A;padding: 0;margin: 0" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Jason Archiver</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="about.php">A propos</a></li>
                    <?php if (!empty($_SESSION['user'])):?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= ucfirst($_SESSION['user']["prenom"])." ".strtoupper($_SESSION['user']['nom']) ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="user.php">Voir mon profil</a></li>
                            <li><a data-toggle="modal" href="#editProfil">Modifier profil</a></li>
                            <li><a href="logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>