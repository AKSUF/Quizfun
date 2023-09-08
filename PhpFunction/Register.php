<?php
include('../Common/Connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['First_Name'];
    $lastname = $_POST['Last_Name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_id = uniqid();
    $rule = 'user';

    $checkQuery = "SELECT * FROM user WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Email already registered";
    } else {
        $query = "INSERT INTO user (`userId`, `First_Name`, `Last_Name`, `password`, `email`, `rule`)
                  VALUES ('$user_id', '$firstname', '$lastname', '$password', '$email', '$rule')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
?>
