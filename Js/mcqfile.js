$(document).ready(function() {
    $.ajax({
        url: "PhpFunction/fetchfile.php", // Correct the URL to match your file name
        type: "GET",
        success: function(data) {
            if (data.status === "success") {
                // Update the HTML element with the retrieved data
                $("#file_mcq").html(data);
            } else {
                // Handle errors or display a message
                console.log("Error: " + data.message);
            }
        },
        error: function() {
            // Handle AJAX request errors
            console.log("Error fetching file data");
        }
    });
})