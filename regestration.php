<?php
include 'connect.php';
if (isset($_POST['Register'])) {

    $name = $_POST['username'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $mail = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $Type = $_POST['Type'];
    $sql = "insert into `login` (username,password,phoneno,email,dob,gender,Type) values('$name','$pass','$phone','$mail','$dob','$gender','Admin')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "data insert succssefully";
        header('location:login.php');
        } else {
        die(mysqli_error($conn));
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="../SikkaLibrary/style.css">
    <style>
    </style>
</head>

<body>
    <div class="registration-container">
        <h2>Registration Form</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            <div class="gender-container">
                <label>Gender:</label>
                <label for="male">Male</label>
                <input type="radio" id="male" name="gender" value="Male">
                <label for="female">Female</label>
                <input type="radio" id="female" name="gender" value="Female">
            </div>
            <input type="submit" value="Register" name="Register">
            <button id="back" onclick="history.back()"><a href="login.php">Back</a></button>

        </form>
    </div>
</body>

</html>