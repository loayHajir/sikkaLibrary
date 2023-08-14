<?php
include "core/connect.php";
$title = 'Reset Password';

if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in or doesn't have the required session data, redirect to the forget password page
    $_SESSION['resetpass_error'] = "Please enter correct information to reset your password.";
    header('Location: forget.php');
    exit();
}

if (isset($_POST['submit'])) {
    $Npass = $_POST['newPassword'];
    $Cpass = $_POST['confirmPassword'];

    if ($Npass === $Cpass) {
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE `login` SET password = '$Npass' WHERE ID = '$user_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Password updated successfully";
            // Redirect to the login page after successful password update  

            header('Location: login.php');
            exit();
        } else {
            echo "Error updating password";
        }
    } else {
        // Passwords do not match, redirect back to forget password page with an error message
        $_SESSION['resetpass_error'] = "The passwords do not match. Please try again.";
        header('Location: forgetpassword.php');
        exit();
    }
}

ob_start();
?>
<link rel="stylesheet" href="assets/css/user.css">

<div class="reset-container">
    <div class="reset-box">
        <form action="resetpass.php" method="post">
            <h1>Reset Password</h1>
            <div class="form-group-forget">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" required>
            </div>
            <div class="form-group-forget">
                <label for="confirmPassword">Confirm New Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="btn-container-forget">
                <input type="submit" value="Reset Password" name="submit">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </div>
</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';