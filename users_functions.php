<?php


function listOfUsers()
{
    $conn = require "db.php";

    $query = "SELECT * FROM registration";
    $select_user = mysqli_query($conn,$query);
    $allUser = [];
    while ($row = mysqli_fetch_assoc($select_user)) {
        $allUser[$row['id']] = [
            'name' => $row['name'],
            'email' => $row['email'],
            'address' => $row['address'],
            'password' => $row['password']
        ];
    }
    return $allUser;
}

function registerUser($email, $password, $name, $address)
{
    $conn = require "db.php";

    $hash = crypt(" ",$password);
    $query = "INSERT INTO registration (name, email, address, password)";
    $query .= "VALUES('$name','$email','$address','$hash')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return false;
    }
        return true;
}

function loginUser($email,$password)
{
    $conn = require "db.php";

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

        header('Location: http://localhost/phpPractice/');
        $_SESSION['flash']['success'] = 'bejelentkezés sikeres';
        echo  $_SESSION['email'];
        echo "<br>";
        echo  $_SESSION['password'];
        return true;
    }else{

        return false;
        header('Location: http://localhost/phpPractice/login.php');
        $_SESSION['flash']['error'] = "Nem sikerult a bejelentkezes. Nem megfelelo adatok !";
    }

}
