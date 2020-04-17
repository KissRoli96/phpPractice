<?php

session_start();
include "db.php";
include "head.php";
include  "navigation.php";


if (isset($_SESSION['flash'])) {

    if (isset($_SESSION['flash']['success'])) {
     echo "<div class='list-group-item list-group-item-action list-group-item-success'>" . $_SESSION['flash']['success'] . "</div>";
    }

    if (isset($_SESSION['flash']['error'])) {
        echo "<div class='list-group-item list-group-item-action list-group-item-danger'>" .  $_SESSION['flash']['error'] . "</div>";
    }

    unset($_SESSION['flash']);
}

?>

<div class="container">
    <div class="row">
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Add meg az emailed...">
            </div>
            <br>
            <div class="form-group">
                <label for="password">Jelszo</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Kerlek adj egy jelszot...">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Bejelentkezes</button>
        </form>

        <br>
        <br>
    </div>
</div>

<?php
include "footer.php";




