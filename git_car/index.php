<?php

include "db.php";
include "head.php";
include "navigation.php";
session_start();
?>

<body>
<main role="main" class="container">
    <div class="starter-template">
        <h1>Autoszalon</h1>
        <p class="lead">Ez a kezdőoldal<br> </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <img src="images/bugatti_kezdolap.jpg">
            </div>
            <div class="col-sm">
                <?php
                if(isset($_SESSION['email'])){
                    echo  "<h5>Fiok Email: </h5>";
                    echo $_SESSION['email'];
                }else{
                    echo "<p>Nem vagy bejelentkezve kerlek jelenkezbe </p>";
                    echo "<a href='login.php'>bejelentkezes </a>";
                }

                if(isset($_SESSION['name'])){
                    echo  "<h5>Fiok Neve: </h5>";
                    echo $_SESSION['email'];

                }

                if(isset($_SESSION['password'])){
                    echo  "<h5>Fiok Jelszo: </h5>";
                    echo $_SESSION['password'];

                }
                if(isset($_SESSION['address'])){
                    echo  "<h5>Fiok Cime: </h5>";
                    echo $_SESSION['address'];
                }
                ?>
            </div>
            <div class="col-sm">
                <img src="images/bmw_kezdolap.jpg" width="1250">
            </div>
        </div>
    </div>

</main><!-- /.container -->
<script src="./index_files/jquery-3.4.1.slim.min.js.letöltés" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="./index_files/bootstrap.bundle.min.js.letöltés" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

<?PHP

include "footer.php";

?>
