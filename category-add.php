<?php
include "connect.php";

session_start(); // Start the PHP session

// Check if the user is logged in and is an admin
if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'Admin') {
    // If the user is not an admin, redirect them to the login page or show an error message
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}
if (isset($_POST['submit'])) {
    sanitizeXSS();
    $CategoryName = $_POST['CategoryName'];
    $sql = "insert into `catagory` (catagoryNo,catagoryName) values('','$CategoryName')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Data Insert Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        padding: 0;
        margin: 0;
        background-image: url('assets/img/library.jpg');
    }
    
    .back-button {
        padding: 0.5rem 1rem;
        background-color:  #A0522D;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .back-button a {
        color: white;
        text-decoration: none;
    }

    h1 {
        text-align: center;
        color:white;
    }

    .form-group {
        margin-bottom: 1rem;
        margin-left: 35%;
    }

    label {
        display: block;
        font-weight: bold;
        color:white;
        font-size:25px;
    }
    button[type="submit"] {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color:  #A0522D;
    }
    
    input[type="text"]{
        width: 50%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
</head>
<body>
<button class="back-button" onclick="history.back()"><a href="display.php">Back</a></button>
    <h1>Add a Category</h1>
    <form method="post" enctype="multipart/form-data">
<div class="form-group">
            <label for="CategoryName">Category Name:</label>
            <input type="text" id="CategoryName" name="CategoryName" required>
        </div>
        <button name="submit" class="back-button" style="margin-left:47%;">Submit</button>
</form>
</body>
</html>