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
            header("location:Home.php");

        }

    }
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
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

    .login-container {
        width: 300px;
        padding: 20px;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 20px;
        color: #FFDEAD;
        
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
        background-color: #FFDEAD;
    
       
    } 
    .login-container .btn-container {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        
    }

    .login-container .btn-container input[type="submit"] {
        width: 48%;
            background-color: #A0522D;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #FFF;
    }

    .login-container .btn-container input[type="submit"]:hover {
        background-color: #FFDEAD;
            color: #000; /* Text color on buttons when hovering */
    }

    .login-container a {
        color: #FFDEAD;
        text-decoration: none;
        font-size: 14px;
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

