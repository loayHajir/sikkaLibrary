<?php

$serverName = 'localhost';
$userName = 'root';
$password = '';
$db = 'sikka library';
$conn = mysqli_connect($serverName, $userName, $password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

<<<<<<< HEAD
/* Prevent XSS input */
function sanitizeXSS () {
    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $_REQUEST = (array)$_POST + (array)$_GET + (array)$_REQUEST;
}
=======
<<<<<<< HEAD
?>
=======

?>
>>>>>>> 47344cb3b5ca2f3717949eb5cc901e8a529c39db
>>>>>>> cae9cc550ab51f1836339cf5c1671465d674c409
