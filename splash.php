<!DOCTYPE html>
<html>
<head>
    <title>Splash Page</title>

    <style>
        /* Add any necessary CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .splash-content {
            text-align: center;
        }

        .logo {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    <!-- Your splash page content goes here -->
    <div class="splash-content">
        <h1>Welcome to Sikka library!</h1>
        <img src="education-logo-open-book-dictionary-textbook-or-notebook-with-sunrice-icon-modern-emblem-idea-concept-design-for-business-libraries-schools-universities-educational-courses-vector.jpg" alt="Logo" class="logo">
        <p>Loading...</p>

      
    </div>

    <!-- JavaScript code to handle the loading effect and redirect to the main page -->
    <script>
        // Simulate a delay before redirecting to the main page (in milliseconds)
        const splashDelay = 3000; // 3 seconds

        // Wait for the specified delay and then redirect to another page
        setTimeout(() => {
            window.location.href = "login.php"; // Replace with the path to your main page
        }, splashDelay);
    </script>
</body>
</html>
