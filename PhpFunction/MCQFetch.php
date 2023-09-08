<?php
include('../Common/Connection.php');

if(isset($_GET['$fileId'])){
$fileId=$_GET['fileId'];
$query="Select * from file where `fileId`='$fileId'";
$result=mysqli_query($conn,$query);


if($result && mysqli_num_rows($result)==1){
    $file=mysqli_fetch_assoc($result);
    $topicDescription = $row['topicDescription'];
$data='
<p class="card-text">' . $topicDescription . '</p>

';

}else{
    
}
}
?>