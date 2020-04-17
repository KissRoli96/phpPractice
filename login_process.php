<?php
session_start();
include "db.php";


//mi van üres? => visszaküldjük hogy adjon meg valamit.
if (empty($_POST['email'] || $_POST['password'])) {
    $_SESSION['flash']['error'] = "Adjon meg bejelentkezési adatokat!";
    header('Location: http://localhost/phpPractice/login.php');
    exit;
}

// itt tuti van mindkett
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM registration WHERE email = '$email'";
$select_login = mysqli_query($conn, $query);

if (!$select_login) {
    die("QUERY FAILED" . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($select_login);
$hash = $row['password'];

if (crypt($password, $hash) == $hash) {

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $name = $row['name'];

    $_SESSION['flash']['success'] = "Sikeres bejelentkezes";
    header('Location: http://localhost/phpPractice');
    exit();
}


$_SESSION['flash']['error'] = "Nem sikerult a bejelentkezes";
header('Location: http://localhost/phpPractice/login.php');
exit();
