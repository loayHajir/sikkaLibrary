<?php
include 'connect.php';

if (isset($_POST['login'])) {

    // Assuming you have a database connection established
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to fetch the hashed password associated with the provided username
    $query = mysqli_query($conn, "select * from login where username = '$username' && password = '$password'");
    $result = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    if (!$result) {
        // Username not found in the database
        echo "Invalid username or password.";
    } else {
            header("location:display.php");
    
    }



}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Login and Registration Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        text-align: center;
    }

    .login-container {
        margin: 150px auto;
        width: 300px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .login-container .btn-container {
        display: flex;
        justify-content: space-between;
    }

    .login-container .btn-container input[type="submit"] {
        width: 48%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .login-container .btn-container input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login and Registration</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br>
            <div class="btn-container">
                <input type="submit" value="Login" name="login">
                <input type="submit" value="Registration" formaction="regestration.php">
           
            </div>
        </form>
    </div>
</body>

</html>