<?php
include "core/connect.php";
$title = 'Sikka Library';
ob_start();
?>
<link rel="stylesheet" href="assets/css/body.css">

<!-- Your splash page content goes here -->
<div class="splash-content">
    <h1>Welcome to Sikka library!</h1>
    <img src="assets/img/logo.jpg" alt="Logo" class="logo">
    <p>Loading...</p>
</div>
<!-- JavaScript code to handle the loading effect and redirect to the main page -->
<script>
    // Simulate a delay before redirecting to the main page (in milliseconds)
    const splashDelay = 3000; // 3 seconds
    // Wait for the specified delay and then redirect to another page
    setTimeout(() => {
        window.location.href = "index.php"; // Replace with the path to your main page
    }, splashDelay);
</script>
<?php

$page = ob_get_clean();

include 'templates/html.php';
