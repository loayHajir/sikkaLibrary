<!DOCTYPE html>
<html>

<head>
    <title>Splash Page</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <!-- Your splash page content goes here -->
    <div class="splash-content">
        <h1>Welcome to Sikka library!</h1>
        <img src="96606910-library-logo-with-building-and-books (1).webp" alt="Logo" class="logo">
        <p>Loading...</p>
    </div>
    <!-- JavaScript code to handle the loading effect and redirect to the main page -->
    <script>
    // Simulate a delay before redirecting to the main page (in milliseconds)
    const splashDelay = 3000; // 3 seconds
    // Wait for the specified delay and then redirect to another page
    setTimeout(() => {
        window.location.href = "home.php"; // Replace with the path to your main page
    }, splashDelay);
    </script>
</body>

</html>