<?php


include "db.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$isValid = true;

if (!isset ($password) && empty($password)) {
    $isValid = false;
}
if (!isset ($email) && empty($email)) {
    $isValid = false;
}



if($isValid) {
    $query = "SELECT * FROM registration WHERE email = '$email'";
    $select_login = mysqli_query($conn, $query);
    if (!$select_login) {
        die("QUERY FAILED" . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($select_login);
        $hash = $row['password'];

        if (crypt($password, $hash) == $hash) {
            echo "Sikerult a bejelentkezes";
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $name = $row['name'];
            header('Location: http://localhost/car');
        } else {
            header('Location: http://localhost/car/login.php');
            echo "<h5>Rosszul adtad meg az adataid kerlek javitsd ki ! </h5>";

        }
    }
}

