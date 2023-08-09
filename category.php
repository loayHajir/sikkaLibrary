<?php
include "connect.php";
// Start the session
session_start();

// Check if the user is logged in or not
$isLoggedIn = isset($_SESSION['user_id']);
// Logout functionality
if (isset($_GET['logout'])) {
    // Clear the session data and destroy the session
    session_unset();
    session_destroy();
    // Redirect to the home page after logout
    header('Location: logout.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
    .content h2 {
        font-size: 20px;
        max-width: 600px;
        padding: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .category-selector {
        text-align: center;

    }

    .category-selector select {
        padding: 10px;
        border: 1px solid #A0522D;
        background-color: #A0522D;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .category-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        grid-template-columns: repeat(4, 1fr);
    }

    .category-card {
        border-radius: 4px;
        padding: 10px;
        text-align: center;
        width: 250px;
    }

    .category-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
        height: auto;
    }

    .category-card:hover {
        transform: scale(1.05);
    }
    </style>
</head>

<body>

    <?php include 'templates/header.php';?>
    <div class="content">
        <h2>Browse Book Categories</h2>
        <div class="category-selector">
            <select onchange="showBooks(this.value)">
                <option value="">Select a Category</option>
                <option value="history">History</option>
                <option value="romantic">Romantic</option>
                <option value="movies">Movies</option>
                <!-- Add more categories as needed -->
            </select>
        </div>
        <div class="category-grid">
            <div class="category-card">
                <img src="myimg/history.jpg" alt="History">
                <h3>History</h3>
            </div>
    <script>
    function showBooks(category) {
        // Redirect to a page where you display books for the selected category
        window.location.href = "category_books.php?category=" + category;
    }
    </script>
</body>

</html>