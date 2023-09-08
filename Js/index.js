$(document).ready(function() {
    $('#uploadfile').on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            url: "PhpFunction/uploadfile.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) { // Check if data is equal to 1 (success)
                    $("#success-message")
                        .html("File uploaded successfully")
                        .removeClass("d-none");

                    $("#uploadfile")[0].reset();
                    setTimeout(function() {
                        $("#success-message").addClass("d-none");
                        // Redirect or perform actions after successful upload
                    }, 4000);
                } else {
                    $("#error-message")
                        .html("File upload was not successful")
                        .removeClass("d-none");
                    $("#uploadfile")[0].reset();
                    setTimeout(function() {
                        $("#error-message").addClass("d-none");
                    }, 3000);
                }
            }
        });
    });
});