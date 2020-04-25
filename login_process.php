<?php
session_start();
include "db.php";
include "users_functions.php";

//mi van üres? => visszaküldjük hogy adjon meg valamit.
if (empty($_POST['email'] || $_POST['password'])) {
    $_SESSION['flash']['error'] = "Adjon meg bejelentkezési adatokat!";
    header('Location: http://localhost/phpPractice/login.php');
    exit;
}

// itt tuti van mindkett
$email = $_POST['email'];
$password = $_POST['password'];

$row = findUserByEmail($email,$conn);

if ($row == NULL) {
    $_SESSION['flash']['error'] = "Nem letezik ilyen email!";
    header('Location: http://localhost/phpPractice/login.php');
    exit();
}

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
