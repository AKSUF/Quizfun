<?php
include('../common/connection.php'); // Include your database connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform user authentication
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['userId'] = $user['userId']; // Create/update session with user_id
        $_SESSION['user_role'] = $user['rule'];

        echo json_encode(array('status' => 'success', 'role' => $user['rule'], 'userId' => $user['userId']));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}
?>
