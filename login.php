<?php
include 'connect.php';

session_start();

if(isset($_POST['login'])){

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
        
        $_SESSION['Type'] = $row['Type'];
        
        if ( $_SESSION['Type'] == "Admin") {
            header("location:display.php");
        } else {
            header("location:userDisplay.php");

        }

    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Login </title>
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
    .pass-icon{
        position: absolute;
        width:25px;
        cursor:pointer;
        top:350px;
        margin-left:180px;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"> 
            <img src="1159224-200.png" onclick="pass()" class="pass-icon" id="pass-icon">

                <a href="forget.php">Forgot Password?</a>

            <br>
            <div class="btn-container">
                <input type="submit" value="Login" name="login">
                <input type="submit" value="Registration" formaction="regestration.php">

            </div>
        </form>
    </div>

    <script>
        var a ;
        function pass() {
            if (a==1) {
           document.getElementById('password').type='password';
           document.getElementById('pass-icon').src='1159224-200.png';
           a=0;
            }
            else {
            document.getElementById('password').type='text';
           document.getElementById('pass-icon').src='download.png';
           a=1;
            }
        }
    </script>
</body>
</html>