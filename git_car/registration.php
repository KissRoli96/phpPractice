<?php

include "db.php";
include "head.php";
include  "navigation.php";
//include "registration_process.php";
session_start();


function registrationCreate($conn)
{
    //megnezzuk, jott e post-ban amit szeretnenk
    if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];

        $isValid = true;


        //validaljuk a nevet. egeszitsd ki igeny szerinti szabalyokkal
        if (empty($name)) {
            $isValid = false;
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;

        }

        if (empty($password) || strlen($password) > 6) {
            $isValid = false;

        }

        if (empty($address)) {
            $isValid = false;
        }


        if ($isValid) {
            var_dump($isValid);
            var_dump($name);
            var_dump($email);
            var_dump($password);
            var_dump($address);
            $hash = crypt($password);
            $query = "INSERT INTO registration (name, email, address, password)";
            $query .= "VALUES('$name','$email','$address','$hash')";
            $select_user = mysqli_query($conn, $query);
            if (!$select_user) {
                die("QUERY FAILED" . mysqli_error($conn));
            } else {
                echo "RECORD CREATE";
            }
            header('Location: http://localhost/car');
        }
        var_dump($isValid);
        var_dump($name);
        var_dump($email);
        var_dump($password);
        var_dump($address);

header('Location: http://localhost/car/registration.php');

    }
}

registrationCreate($conn);

function listOfUsers($conn){
    $query = "SELECT * FROM registration";
    $select_user = mysqli_query($conn,$query);
    $allUser = [];
    while($row = mysqli_fetch_assoc($select_user)) {
        $allUser[$row['id']] =[
            'name' => $row['name'],
            'email' => $row['email'],
            'address' => $row['address'],
            'password' => $row['password']
        ];
    }
    return $allUser;
}

$allUser =listOfUsers($conn);

?>
<form method="post"action="registration.php" >
    <div class="form-group">
        <label for="name">Nev</label>

        <input type="text" class="form-control" name="name" id="name" placeholder="Nevet kerlek add meg..">
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
    foreach ($allUser as $key => $user){
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


