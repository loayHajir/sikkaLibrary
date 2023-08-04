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
    <title></title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include 'templates/header.php';?>

    <style>
    /* // CSS styling for the  */
    body {
        padding: 0;
        margin: 0;
    }
    
        .header {
            text-align: center;
            background-image: url('library.jpg');
            background-size: cover;
            padding: 100px 0;
            color: white;
        }

        .header h2 {
            font-size: 35px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .description {
            font-size: 20px;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .team-members {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .team-member {
            background-color: #DEB887;
            padding: 30px;
            margin: 20px auto;
            max-width: 800px;
            text-align: center;
        }

        .thank-you {
            background-color: #A0522D; /* Replace with your desired color */
            padding: 30px;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>


    <!-- About Us Section -->
    <div class="header">
        <h2>About Us</h2>
        <div class="description">
            <p>Write a brief description about your organization or library here.</p>
        </div>
    </div>

    <!-- Team Members Section -->
    <div class="team-members">
        <div class="team-member">
            <h3>Layal Khatib</h3>
            <p> Role = ( Project Manager )</p>
            <br>Mail-ID : layalkhatib@gmail.com<br/>
        </div>
        <div class="team-member">
            <h3>Dana Allouche</h3>
            <p> Role = ( Full Stack Developer )</p>
            <br>Mail-ID : dana@gmail.com<br/>
        </div>

        <div class="team-member">
            <h3>Loay Hajir</h3>
            <p> Role = ( Full Stack Developer )</p>
            <br>Mail-ID : loay@gmail.com<br/>
        </div>

        <div class="team-member">
            <h3>Zeinab Miari</h3>
            <p> Role = ( Full Stack Developer )</p>
            <br>Mail-ID : zeina6@gmail.com<br/>
        </div>
    
    
    </div>

    <!-- Thank You Section -->
    <div class="thank-you">
        <h3>Thank You for visiting our library and website!</h3>
        <p>We hope you find the books you're looking for and enjoy your reading experience. If you have any questions or feedback, please feel free to contact us.</p>
    </div>
</body>

</html>