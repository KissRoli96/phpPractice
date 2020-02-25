


//function registrationCreate($conn){
//    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//        if (isset($_POST['submit'])) {
//            // primary validate function
//            function validate($str) {
//                return trim(htmlspecialchars($str));
//            }
//
//            if (empty($_POST['name'])) {
//                $nameError = 'Name should be filled';
//            } else {
//                $name = validate($_POST['name']);
//                if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
//                    $nameError = 'Name can only contain letters, numbers and white spaces';
//                }
//            }
//
//            if (empty($_POST['email'])) {
//                $emailError = 'Please enter your email';
//            } else {
//                $email = validate($_POST['email']);
//                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                    $emailError = 'Invalid Email';
//                }
//            }
//
//            if (empty($_POST['address'])) {
//                $addressError = 'Please enter your email';
//            } else {
//                $address = validate($_POST['address']);
//            }
//
//            if (empty($_POST['password'])) {
//                $passwordError = 'Password cannot be empty';
//            } else {
//                $password = validate($_POST['password']);
//                if (strlen($password) < 6) {
//                    $passwordError = 'Please should be longer than 6 characters';
//                }
//                $hash = crypt($password);
//            }
//            $query = "INSERT INTO registration (name, email, address, password)";
//            $query .= "VALUES('$name','$email','$address','$hash')";
//            $select_user = mysqli_query($conn, $query);
//            if (!$select_user) {
//                die("QUERY FAILED" . mysqli_error($conn));
//            } else {
//                echo "RECORD CREATE";
//            }
//        }
//    }else{
//        die('invald request');
//    }
}

