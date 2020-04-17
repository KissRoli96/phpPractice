<?php

session_start();
include  "users_functions.php";

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
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr ="Ellenorizze, hogy a nev csak betuket és szokozt tartalmaz-e! ";
            }
        }

        if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
        }

        if (empty($password) && (strlen($password) > 6)) {
            $isValid = false;

        }

        if (empty($address)) {
            $isValid = false;
        }

    }

    if (!registerUser($email,$password,$name,$address)) {
        $_SESSION['flash']['error'] = 'A regisztráció nem sikerült, belső hiba történt!';
        header('Location: http://localhost/phpPractice/registration.php');
    }






