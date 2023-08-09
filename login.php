<?php
include "core/connect.php";
// include "core/admin.php";
$title = 'Login';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to fetch the hashed password associated with the provided username
    $query = mysqli_query($conn, "select * from login where username = '$username' && password = '$password'");
    $result = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    if (!$result) {
        // Username not found in the database
        echo "<p style='color: white;font-size:25px;'>Invalid username or password.</p>";
    } else {

        $_SESSION['Type'] = $row['Type'];
        $_SESSION['user_id'] = $row['ID'];

        if ($_SESSION['Type'] == "Admin") {
            header("location:display.php");
        } else {
            header("location:Home.php");
        }
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
</style>
<link rel="stylesheet" href="assets/css/admin.css">

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
            <input type="submit" value="Registration" formaction="register.php">
        </div>
    </form>
</div>

<script>
    var a;

    function pass() {
        if (a == 1) {
            document.getElementById('password').type = 'password';
            document.getElementById('pass-icon').src = 'assets/img/download.png';
            a = 0;
        } else {
            document.getElementById('password').type = 'text';
            document.getElementById('pass-icon').src = 'assets/img/download.png';
            a = 1;
        }
    }
</script>
<?php

$page = ob_get_clean();

include 'templates/html.php';
