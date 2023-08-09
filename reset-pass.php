<?php
include "core/connect.php";
// include "core/admin.php";
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

<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('assets/img/library.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .reset-container {
        width: 300px;
        padding: 20px;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 20px;
        color: #FFDEAD;
    }

    .reset-container h2 {
        margin-bottom: 20px;
    }

    .reset-container input[type="text"],
    .reset-container input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #FFDEAD;
        color: #000;
        /* Text color on input fields */
    }

    .reset-container .btn-container {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .reset-container .btn-container input[type="submit"] {
        width: 48%;
        background-color: #A0522D;
        padding: 14px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: #FFF;
        /* Text color on buttons */
    }

    .reset-container .btn-container input[type="submit"]:hover {
        background-color: #FFDEAD;
        color: #000;
        /* Text color on buttons when hovering */
    }

    .reset-container a {
        color: #FFDEAD;
        text-decoration: none;
        font-size: 14px;
    }

    .reset-container a:hover {
        color: #666;
    }
</style>
<link rel="stylesheet" href="assets/css/admin.css">

<div class="reset-container">
    <form action="resetpass.php" method="post">
        <h2>Reset Password</h2>
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <label for="confirmPassword">Confirm New Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <div class="btn-container">
            <input type="submit" value="Reset Password" name="submit">
            <a href="login.php">Back to Login</a>
        </div>
    </form>
</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';