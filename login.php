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

            header("location:index.php");
        }
    }
}

ob_start();
?>
<link rel="stylesheet" href="assets/css/user.css">
<link rel="stylesheet" href="assets/css/reset.css">

<div class="login-content">
    <div class="login-box">
        <div class="login-box-content">
        <h2>Login Form</h2>
        <form action="login.php" method="post">
        <div class="form-group-login">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group-login">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <a href="forget.php">Forgot Password?</a>
            </div>
            <div class="btn-container-login">
                <input type="submit" value="Login" name="login">
                <input type="submit" value="Registration" formaction="register.php">
            </div>
        </form>
        </div>  
    </div>
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