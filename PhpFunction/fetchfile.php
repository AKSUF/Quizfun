<style>
    .hover-card {
        background-color: #f2f2f2; /* Default background color */
        transition: background-color 0.3s ease-in-out; /* Smooth transition effect */
    }

    .hover-card:hover {
        background-color: #e0e0e0; /* Background color on hover */
    }
    a {
    text-decoration: none; /* Removes the underline */
    color: inherit; /* Inherits the color from its parent, usually black or the default color */
}

/* If you want to specify a specific color for unvisited and visited links */
a:link, a:visited {
    color: inherit;
}

</style>

<?php
include('../Common/Connection.php');
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 4;
$offset = ($page - 1) * $limit;

// Fetching the keyword from the URL
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

// Construct the WHERE clause based on the keyword
$whereClause = "";
if (!empty($keyword)) {
    $whereClause = "WHERE (`topicName` LIKE '%$keyword%' OR `topicDescription` LIKE '%$keyword%' OR photoName LIKE '%$keyword%' OR fileName LIKE '%$keyword%')";
} else {
    $whereClause = "WHERE `is_deleted` = 0";
}

$query = "SELECT * FROM file $whereClause LIMIT $offset, $limit";
$result = $conn->query($query);
$data = "";
while ($row = $result->fetch_assoc()) {
    $fileId=$row['fileId'];
    $topicName = $row['topicName'];
    $topicDescription = $row['topicDescription'];
    $photoName = $row['photoName'];
    $fileName = $row['fileName'];
    $imagePath = "../image/" . $photoName;

    $data .= '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">' . $topicName . ' </h5>
                    <img src="' . $imagePath . '" class="card-img-top " style="height:100px" alt="Image">
                    <p class="card-text">' . $topicDescription . '</p>
                    <a href="index.php?mcq=' . $fileId . '" class="btn btn-primary text-center ">Participate</a>
                </div>
            </div>
        </div>';
}
echo $data;
?>
