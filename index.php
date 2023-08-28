<?php
include "core/connect.php";
$title = 'Sikka Library';
ob_start();
?>
<link rel="stylesheet" href="assets/css/body.css">
<div class="splash-container">
    <!-- Your splash page content goes here -->
    <div class="splash-content">
        <h1>Welcome to Sikka library!</h1>
        <img src="assets/img/logo.jpg" alt="Logo" class="splash-img">
        <p>Loading...</p>
    </div>
    <!-- JavaScript code to handle the loading effect and redirect to the main page -->
    <script>
    // Simulate a delay before redirecting to the main page (in milliseconds)
    const splashDelay = 2000; // 2 seconds
    // Wait for the specified delay and then redirect to another page
    setTimeout(() => {
        window.location.href = "login.php"; // Replace with the path to your main page
    }, splashDelay);
    </script>
</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';