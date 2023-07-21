<?php
include 'connect.php';
if (isset($_POST['Register'])) {

    $name = $_POST['username'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $mail = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
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
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        text-align: center;
    }

    .registration-container {
        margin: 50px auto;
        width: 400px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .registration-container h2 {
        margin-bottom: 20px;
    }

    .registration-container input[type="text"],
    .registration-container input[type="password"],
    .registration-container input[type="date"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .registration-container input[type="email"],
    .registration-container input[type="tel"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .registration-container label {
        display: block;
        margin-bottom: 5px;
        text-align: left;
    }

    .registration-container .gender-container {
        text-align: left;
    }

    .registration-container .gender-container label {
        display: inline-block;
        margin-right: 10px;
    }

    .registration-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .registration-container input[type="submit"]:hover {
        background-color: #45a049;
    }
     #back{
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin-top: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        
    }
    #back a {
        color: white;
        text-decoration: none;
    }
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