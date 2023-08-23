<?php

if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'Admin') {
    // If the user is not an admin, redirect them to the login page
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}