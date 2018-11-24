<?php include "_inc/header.php";
$images = imgFromDir('images');
$x = count($images);
?>
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php for ($i=0;$i<$x;$i++): ?>
            <div class="item <?php if ($i==0){echo "active";}?>">
                <img src="<?= $images[$i]?>" alt="" style="width: 100%;height: 500px">
                <!--<div class="container">
                    <div class="carousel-caption">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                    </div>
                </div>-->
            </div>
            <?php endfor; ?>
        </div>
          </div>
<h1 style="color:red"><b>Jason Archiver</b></h1>
La masse des documents qui ne cesse de croitre fait que l’entreprise éprouve une grande difficulté de disponibiliser  un document quand il est désiré par un autre service de l’entité. La lenteur au service d’archivage constitue un véritable disfonctionnement de l’entité.<br> Jason Archiver est une qpplication qui vient redorer le blason de l$archivage au sein des sociétés en offrant plus de securité à vos documents et  permettant de gagner en temps dans le traitement des archives ainsi de rendre l'entreprise competitive sur le marché....
<?php include "_inc/footer.php";?>