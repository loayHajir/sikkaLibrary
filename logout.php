<?php
session_start();
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit();
?>