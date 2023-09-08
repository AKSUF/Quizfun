<?php
$conn = mysqli_connect('localhost', 'root','', 'quizfun');
if ($conn) {
    // echo "Connection Successful"; 
} else {
    die("Connection failed: " . mysqli_connect_error());
}
?>