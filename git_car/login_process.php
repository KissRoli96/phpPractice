<?php


include "db.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$isValid = true;

//if (!isset ($session['password']) && empty($session['password'])) {
//    $isValid = false;
//
//}
//
//if (!isset ($session['email']) && empty($session['email'])) {
//    $isValid = false;
//
//}
//




if($isValid == true) {
    $query = "SELECT * FROM user WHERE email = '$email'";
    $select_login = mysqli_query($conn, $query);
    if (!$select_login) {
        die("QUERY FAILED" . mysqli_connect_error($conn));
    } else {
        $row = mysqli_fetch_assoc($select_login);
        $hash = $row['password'];

        if (crypt($password, $hash) == $hash) {
            echo "Sikerult a bejelentkezes";
            $_SESSION['email'] = $email;
            header('Location: http://localhost/car');
        } else {
            echo "Nem sikerult a bejelentkezes";
            die();
        }
    }
}

