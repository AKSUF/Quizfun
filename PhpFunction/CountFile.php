<?php
// Include the database connection code
include('../Common/Connection.php');

// Query to get the total number of records in the table
$query = "SELECT COUNT(*) AS total_records FROM file";

// Execute the query
$result = $conn->query($query);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    
    // Get the total number of records
    $totalRecords = $row['total_records'];
    
    // Return the total number of records as a JSON response
    echo json_encode($totalRecords);
} else {
    // Return an error message as a JSON response
    echo json_encode("Error fetching total records");
}

// Close the database connection
$conn->close();
?>
