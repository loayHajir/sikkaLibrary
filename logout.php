<?php
session_start();
session_destroy();

// Redirect the user to the login page
header("Location: index.php");
exit();
