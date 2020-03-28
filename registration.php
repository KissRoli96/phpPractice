<?php

include "db.php";
include "head.php";
include  "navigation.php";
include "users_functions.php";
session_start();


$allUser = listOfUsers($conn);

?>

<form method="post"action="registration_process.php" >
<!--    <p><span class="error" c> * required field</span></p>-->
    <div class="form-group">
        <label for="name">Nev</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nevet kerlek add meg..">
        <br><br>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Add meg az emailed...">
    </div>

    <div class="form-group">
        <label for="address">Cim</label>

        <input type="text" name="address" class="form-control" id="address" placeholder="Cimet ide add meg...">
    </div>
    <br>
    <div class="form-group">
        <label for="password">Jelszo</label>

        <input type="password" name="password" class="form-control" id="password" placeholder="Kerlek adj egy jelszot...">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Regisztracio</button>
</form>

<br>

<table class="table table-striped">

    <thead>
    <th scope="col">Id</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Address</th>
    <th scope="col">Password</th>
    </thead>
    <?php
    foreach ($allUser as $key => $user) {
    ?>
    <tbody>
    <tr>
        <th scope="row"><?= $key?></th>
        <td><?= $user['name']?></td>
        <td><?= $user['email']?></td>
        <td><?= $user['address']?> </td>
        <td><?= $user['password']?></td>
        <?php
        }
        ?>
    </tr>
    </tbody>
</table>

<?php
include "footer.php";
?>


