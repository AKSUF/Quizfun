$(document).ready(function() {
    $("#adduser").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "PhpFunction/Register.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {

                if (data === "Email already registered") {
                    $("#error-message")
                        .html("Email is already registered")
                        .removeClass("d-none");
                    $("#success-message").addClass("d-none");
                    $("#adduser")[0].reset();
                    setTimeout(function() {
                        $("#error-message").addClass("d-none");
                    }, 3000);
                } else if (data == 1) {
                    $("#success-message")
                        .html("Data inserted successfully")
                        .removeClass("d-none");
                    $("#error-message").addClass("d-none");
                    $("#adduser")[0].reset();
                    setTimeout(function() {
                        $("#success-message").addClass("d-none");
                    }, 4000);
                } else {
                    $("#error-message")
                        .html("Data was not inserted successfully")
                        .removeClass("d-none");
                    $("#success-message").addClass("d-none");
                    $("#adduser")[0].reset();
                    setTimeout(function() {
                        $("#error-message").addClass("d-none");
                    }, 3000);
                }
            },
        });
    });

    $("#loginuser").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "PhpFunction/Login.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json', // Add this line to indicate JSON response
            success: function(data) {
                if (data.status === "success") {
                    localStorage.setItem('userId', data.userId);
                    localStorage.setItem('user_role', data.role);
                    $("#success-message")
                        .html("Login successfully")
                        .removeClass("d-none");
                    $("#error-message").addClass("d-none");
                    $("#loginuser")[0].reset();
                    setTimeout(function() {
                        $("#success-message").addClass("d-none");
                        if (data.role === "user") {
                            window.location.href = "http://localhost/Quiz/index.php?features";
                        } else if (data.role === "admin") {
                            window.location.href = "http://localhost/Quiz/index.php?adminpanel";
                        }
                    }, 4000);
                } else {
                    $("#error-message")
                        .html("Login was not successful")
                        .removeClass("d-none");
                    $("#loginuser")[0].reset();
                    setTimeout(function() {
                        $("#error-message").addClass("d-none");
                    }, 3000);
                }
            }
        });
    });

    $("#updateUserForm").submit(function(e) {
        e.preventDefault();
        console.log("hello user");
        var formData = $(this).serialize();

        $.ajax({
            url: "../phpfunction/update/usedetailsupdate.php",
            type: "POST",
            data: formData,
            success: function(response) {
                $("#success-message")
                    .html("Update inserted successfully")
                    .removeClass("d-none");
                $("#error-message").addClass("d-none");
                console.log(response);
            },
            error: function() {
                $("#success-message").addClass("d-none");
                $("#error-message").html("Update was not successful").removeClass("d-none");
                console.log("An error occurred while updating user.");
            }
        });
    });




})