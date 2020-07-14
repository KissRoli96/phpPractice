/*
Megnézed van e olyan email
Magyarul lekerdezed db-bol ahol email =$email
Ha üres, akkor nincs user, nem jó email cím, kooratod hogy. email vagy jelszó nem megfelelo
Ha kaptál vissza valamit db-bol akkor van user, tehát email valid, nem iratsz semmit, hanem mész tovább.
Validalod jelszót ahogy regen CryptVagy hash-validate
És ha ez is jó, akkor belepteted
Ha nem, visszatérsz hogy email vagy pw nem jo
*/

<?php
session_start();
include "db.php";
include "users_functions.php";

//mi van üres? => visszaküldjük hogy adjon meg valamit.
if (empty($_POST['email'] || $_POST['password'])) {
    $_SESSION['flash']['error'] = "Adjon meg bejelentkezési adatokat!";
    header('Location: http://localhost/phpPractice/login.php');

}
// itt tuti van mindkett
$email = $_POST['email'];
$password = $_POST['password'];

function loginFormValidate($email,$password)
{


    if (empty($email )) {
        header('Location: http://localhost/phpPractice/login.php');
        $_SESSION['flash']['error'] = "Nem sikerult a bejelentkezes. Nincs email !";
    }

    if(empty($password)){
        header('Location: http://localhost/phpPractice/login.php');
        $_SESSION['flash']['error'] = "Nem sikerult a bejelentkezes. Nincs jelszo !";
    }

    if (loginUser($email,$password)) {
                return true;
        header('Location: http://localhost/phpPractice/');
        $_SESSION['flash']['success'] = 'bejelentkezés sikeres';
     } else {
                return false;
        header('Location: http://localhost/phpPractice/login.php');
        $_SESSION['flash']['error'] = "Nem sikerult a bejelentkezes. Nincs jelszo !";
             }
 }

loginFormValidate($email,$password);


