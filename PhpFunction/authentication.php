<?php
include('../Common/Connection.php');
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $query = "SELECT `First_Name` FROM user WHERE userId = '$userId'"; // Use single quotes here
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        echo json_encode(array('status' => 'success', 'first_name' => $user['First_Name']));
    } else {
        echo json_encode(array('status' => 'error'));
    }
} else {
    echo json_encode(array('status' => 'error'));
}
?>