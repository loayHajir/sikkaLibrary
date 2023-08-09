<?php

include 'config.php';

session_start();

// Check if the user is logged in or not
$isLoggedIn = isset($_SESSION['user_id']);

$conn = mysqli_connect($serverName, $userName, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* Prevent XSS input */
function sanitizeXSS()
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $_REQUEST = (array) $_POST + (array) $_GET + (array) $_REQUEST;
}