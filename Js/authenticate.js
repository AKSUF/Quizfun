$(document).ready(function() {
    var userId = localStorage.getItem("userId");
    console.log("firstname" + userId);
    $.ajax({
        url: "PhpFunction/authentication.php",
        type: "GET",
        data: { userId: userId },
        dataType: "json",
        success: function(data) {
            if (data.status === "success") {
                $("#userName").text(data.first_name);
            }
            console.log(data);
        },
        error: function() {
            console.log("An error occurred while fetching user's first name.");
        },
    });

    $("#logoutButton").on("click", function() {
        // Clear local storage
        localStorage.removeItem("userId");
        localStorage.removeItem("user_role");

        // Clear session with AJAX
        $.ajax({
            url: "PhpFunction/clearsession.php",
            type: "POST",
            success: function(response) {
                console.log("Session cleared successfully.");

                if (response.role === "user") {
                    window.location.href = "http://localhost/Quiz/index.php?features";
                } else if (response.role === "admin") {
                    window.location.href = "http://localhost/Quiz/admin.php?adminpanel";
                }
                // Redirect to login page
            },
            error: function() {
                console.log("An error occurred while clearing session.");
            },
        });
    });



    var userRole = localStorage.getItem('user_role');


    $(".admin").each(function() {
        var $link = $(this);
        if (userRole === "admin") {
            $link.show();
        } else {
            $link.hide();
        }
    });
});