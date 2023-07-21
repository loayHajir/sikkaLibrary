<?php
include 'connect.php';

session_start(); // Start the PHP session

// Check if the user is logged in and is an admin
if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'admin') {
    // If the user is not an admin, redirect them to the login page or show an error message
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}

if (isset ($_GET['deleteid'])){
    $id= $_GET['deleteid'];
    $sql = "delete from  `books` where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result){
        // echo "Delete successful";
        header ('location:display.php');
            $message = "Book with ID $id has been successfully deleted.";
    } else{
        die(mysqli_error($conn));
    }
}
?>