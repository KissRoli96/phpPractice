<?php

include "db.php";
include "head.php";
include  "navigation.php";
session_start();

?>


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

<?php
include "footer.php";




