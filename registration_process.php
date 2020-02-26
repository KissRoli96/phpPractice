<?php

include "db.php";
session_start();


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
            $hash = crypt($password);
            $query = "INSERT INTO registration (name, email, address, password)";
            $query .= "VALUES('$name','$email','$address','$hash')";
            $select_user = mysqli_query($conn, $query);
            if (!$select_user) {
                die("QUERY FAILED" . mysqli_error($conn));
            } else {
                echo "RECORD CREATE";

            }
            header('Location: http://localhost/car/registration.php');
        }
        header('Location: http://localhost/car/registration.php');
    }



?>




