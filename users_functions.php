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
