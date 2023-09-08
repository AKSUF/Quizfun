<?php
include('../Common/Connection.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $userId = $_POST['userId']; // Replace with how you retrieve user ID.
    $mcqId = $_POST['mcq_id'];
    $score = $_POST['score'];
    $id=uniqid();
    $participationDate = $_POST['participation_date'];
    // Get MCQ ID, user's score, and participation date from the POST data
    $mcqId = $_POST['mcq_id'];
    $score = $_POST['score'];
    $participationDate = $_POST['participation_date'];
    $query = "INSERT INTO user_mcq_participation (id, userId, mcq_id, score, participation_date) VALUES ('$id', '$userId', '$mcqId', '$score', '$participationDate')";

$result= mysqli_query($conn, $query);
if ($result) {
    echo 1;
} else {
    echo 0;
}

}


?>