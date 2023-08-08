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
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        text-align: center;
        background-image: url('myimg/library.jpg');
        padding: 0;
        margin: 0;
    }
    
    .contact-form{
        position: relative;
        left: 34%;
        top: 50%;
        width: 400px;
        padding: 20px;

        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 20px;
        color: #FFDEAD;
    }

    .contact-form h2 {
        margin-bottom: 20px;
    }
    .contact-form input[type="name"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #FFDEAD;
    }

    .contact-form input[type="subject"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #FFDEAD;
    }
    .contact-form textarea[type="message"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #FFDEAD;
    }

    .contact-form input[type="email"]
    {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #FFDEAD;
    }


    .contact-form label {
        display: block;
        margin-bottom: 5px;
        text-align: left;
    }

    .contact-form [type="submit"] {
        width: 30%;
        background-color: #A0522D;
        padding: 10px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color : white;
    }

    .contact-form [type="submit"]:hover {
        background-color: #A0522D;
    }
 
    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #A0522D;
    }


    #down {
        color: blue;
        text-decoration: underline;
    }

    
h1{
    margin-left: 40px;
    color: white;
    font-family: "Times New Roman";
    font-size: 25px;
    font-weight: bold;
}
    
        .header {
            font-size: 25px;
            font-family: "Times New Roman";
            margin-bottom: 20px;
            font-weight: bold;
            color: white;
        }
</style>
</head>


<body>
<?php include 'templates/header.php';?>
<div class="header">
        <h2>Contact Us</h2>
    </div>

    <section>
        <div class="contact-form">
            <form action="#" method="post">
                <label for="name">Name:</label>
                <input type="name" id="name" name="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="subject">Subject:</label>
                <input type="subject" id="subject" name="subject" required>
                <br>
                <label for="message">Message:</label>
                <textarea type="message" name="message" rows="4" required></textarea>
                <br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</body>

</html>