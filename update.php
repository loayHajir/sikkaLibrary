<?php
include "connect.php";

session_start(); // Start the PHP session

// Check if the user is logged in and is an admin
if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'Admin') {
    // If the user is not an admin, redirect them to the login page or show an error message
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}

$id = $_GET['updateid'];
$mySql = "select * from `books` where id='$id'";
$myResult = mysqli_query($conn, $mySql);
$myRow = mysqli_fetch_assoc($myResult);
$myName = $myRow['BookName'];
$mydes = $myRow['Description'];
$mylang = $myRow['Language'];
$myavai = $myRow['Available'];
$mypdf = $myRow['PDF'];
if (isset($_POST['update'])) {
    $bookName = $_POST['bookName'];
    $des = $_POST['description'];
    $lang = $_POST['language'];
    $available = $_POST['availability'];
    $pdf = $_POST['upload'];
    // var_dump($_POST);
    $sql = "update `books`set id='$id',Bookname='$bookName',Description='$des',Language='$lang',Available='$available',PDF='$pdf'where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Data update Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Update the book</h1>
    <form method="post">
        <div class="form-group">
           <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required>
        </div>
        <div class="form-group">
            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <option value="English">English</option>
                <option value="Arabic">Arabic</option>
                <option value="French">French</option>
                <option value="Spanish">Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="pageNo">Number Of Page:</label>
            <input type="number" id="pageNo" name="pageNO" required>
        </div>
        <div class="form-group">
            <label for="dop">Date Of Publication:</label>
            <input type="date" id="dop" name="dop" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="availability">Availability:</label>
            <input type="checkbox" id="availability" name="availability" value="1">
        </div>
        <div>
            <label for="pdf">Upload:</label>
            <input type="file" id="pdf" name="pdf">
            <input type="file" id="image" name="image">
        </div>
        <br>
           
        </div>
        <br>
        <button name=" update">Update</button>
    </form>
</body>

</html>