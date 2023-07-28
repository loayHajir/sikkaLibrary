<?php
include 'connect.php';
session_start();

if (isset($_POST['Submit'])) {
    $Npass = $_POST['newPassword'];
    $Cpass = $_POST['confirmPassword'];

    if ($Npass === $Cpass) {
        $user_id = $_SESSION['user_id']; // Replace 'user_id' with the appropriate session variable holding the user ID or username
        $query = "UPDATE `login` SET password = '$Npass' WHERE user_id = '$user_id'";
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
        echo "The passwords do not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
          font-family: Arial, sans-serif;
            background-image: url('library.jpg');
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

        .reset-container  {
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
            color: #000; /* Text color on input fields */
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
            color: #FFF; /* Text color on buttons */
        }

        .reset-container .btn-container input[type="submit"]:hover {
            background-color: #FFDEAD;
            color: #000; /* Text color on buttons when hovering */
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
</head>
<body>
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
</body>

</html>