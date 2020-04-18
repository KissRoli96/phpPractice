<?php


function listOfUsers($conn)
{
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


function findUserByEmail($email,$conn)
{
    $query = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $result_query = mysqli_fetch_assoc($result);

    if (!$result_query) {
        return NULL;
    }
        return $result_query;
}


