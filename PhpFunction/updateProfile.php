<?php
include('../../common/connection.php');

if (isset($_GET['userId'])) {
    $user_id = $_GET['userId'];

    // Use prepared statement to safely handle user input
    $query = "SELECT * FROM user_table WHERE `User Id` = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Generate HTML form with user information pre-filled
        echo '
        <form id="updateUserForm">
        <div class="form-group hidden">
        <label for="User Id">User Id</label>
        <input type="text" class="form-control" id="userId" name="userId" value="' . $user['User Id'] . '">
    </div>
       
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="' . $user['First Name'] . '">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="' . $user['Last Name'] . '">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="' . $user['Email'] . '">
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select class="form-control" id="sex" name="sex">
                    <option value="Male" ' . ($user['Sex'] === 'Male' ? 'selected' : '') . '>Male</option>
                    <option value="Female" ' . ($user['Sex'] === 'Female' ? 'selected' : '') . '>Female</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        ';
    } else {
        echo '<p>User not found.</p>';
    }
} else {
    echo '<p>User ID not provided.</p>';
}
?>
<script src="../ajaxfunction/updateajax.js"></script>

