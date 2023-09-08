<?php
// Include the database connection parameters
include('../Common/Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Generate a unique fileId
    $fileId = uniqid();
    $topicName = $_POST['topicName'];
    $topicDescription = $_POST['topicDescription'];
    $photoName = $_FILES['photoName']['name'];
    $fileName = $_FILES['fileName']['name'];
    $is_deleted = 0;
    $temp_photoName = $_FILES['photoName']['tmp_name'];
    $temp_fileName = $_FILES['fileName']['tmp_name'];

    move_uploaded_file($temp_photoName, "http://localhost/Quiz/image/$photoName");
    move_uploaded_file($temp_fileName, "../FilePath/$fileName");

    $insert_file = "INSERT INTO `file` (fileId, topicName, topicDescription, photoName, fileName,is_deleted) VALUES ('$fileId', '$topicName', '$topicDescription', '$photoName', '$fileName','$is_deleted')";
    $result = mysqli_query($conn, $insert_file);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}
