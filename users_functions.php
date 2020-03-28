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
