<?php

session_start();
include  "users_functions.php";
//megnezzuk, jott e post-ban amit szeretnenk
if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];


    function registerFormValidate($name, $email, $password, $address)
    {
        $isValid = true;

        if (empty($name)) {
            $isValid = false;
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
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

        if ($isValid) {

            registerUser($email, $password, $name, $address);
            header('Location: http://localhost/phpPractice/registration.php');
            $_SESSION['flash']['success'] = 'A regisztráció sikeres';
            return true;
        } else {
            return false;
            header('Location: http://localhost/phpPractice/registration.php');
            $_SESSION['flash']['error'] = 'A regisztráció nem sikerült, belső hiba történt!';
        }
    }

    registerFormValidate($name, $email, $password, $address);
}