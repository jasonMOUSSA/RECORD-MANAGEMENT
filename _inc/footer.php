<?php
include_once "_app/isConnect.php";
if (is_connect()){
    include "_inc/edit_profil.php";
}
     ?>
<div class="row footer text-center">
        <ul class="list-inline">
            <li class="li"><a href="#" class="a"><span class="glyphicon glyphicon-certificate"></span> Copyright &copy; Jason MOUSSA <?= Date("Y") ?></a> </li>
        </ul>
    </div><!--row footer-->
</div><!--container footer-->
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.js"></script>
</body>
</html>