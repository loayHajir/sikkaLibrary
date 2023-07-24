<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Reset Password</h1>
    <form action="login.php" method="post">
        <label for="npass">New Password</label>
        <input type="text" id="npass" name="npass" required><br><br>

        <label for="cpass">Confirm Password</label>
        <input type="text" id="cpass" name="cpass" required><br><br>

        <button type="submit" ><a  href="login.php">submit </a></button>
</body>
</html>
<?php
$password = $_POST['password'];
    $sql = "update `login`set password='$password'where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Data update Successfully";
        header('location:login.php');
    } else {
        die(mysqli_error($conn));
    }
