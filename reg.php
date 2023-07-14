<?php
require_once 'db/connect.php';

if (isset($_POST['signUpBtn'])) {
    $fN = $_POST['fname'];
    $uN = $_POST['uname'];
    $pass = $_POST['passw'];
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    $gen = $_POST['gender'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `usertbl`
    (`fullName`, `userName`, `passWord`, `gender`, `email`)
     VALUES('$fN', '$uN', '$hashedPass', '$gen', '$email')";
    
    try {
        $result = $conn->query($sql);
        if ($result) {
            header("Location: index.php?signUp=1");
            exit();
        } else {
            header("Location: index.php?signUp=0");
            exit();
        }
    } catch (Throwable $e) {
        header("Location: index.php?signUp=0");
        exit();
    };
    
}

if (isset($_POST['logInBtn'])) {
    $uN = $_POST['uname'];
    $pass = $_POST['passw'];

    if (empty($uN) || empty($pass)) {
        header("Location: index.php?error=1");
        exit();
    }

    $sql = "SELECT * FROM `usertbl` WHERE `userName` = '$uN'";

    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPass = $row['passWord'];

        if (password_verify($pass, $hashedPass)) {
            echo "Pass";
            print_r($_POST);

        } else {
            echo "Fail";
            header("Location: index.php?error=2");
            exit();

        };
        
    } else {
        echo "Fail";
        header("Location: index.php?error=2");
        exit();

    }
}

$conn->close();



?>