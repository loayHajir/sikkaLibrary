
<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <style>
    /* // CSS styling for the  */
    body {
        padding: 0;
        margin: 0;
    }
    table button {
        padding: 0.5rem 1rem;
        background-color: #A0522D;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
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

    .button-container {
        text-align: left;
    }

    .button-container button {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: white;
    }

    #down {
        color: blue;
        text-decoration: underline;
    }

    ul,.lgo {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
width:100%;
background-color: #A0522D;
font-family: "Times New Roman";
font-size: 15px;
}

li {
margin: 10px 30px 0 0;
float: right;
}

li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

li a:hover:not(.active) {
background-color: #111;
}

img {
margin: 5px 0 0 30px;
width: 7%;
height: 55px;
border-radius: 100px;
}

.lgo{
    display : flex;
}

h1{
    margin-left: 40px;
    color: white;
    font-family: "Times New Roman";
    font-size: 25px;
    font-weight: bold;
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
            f
        }

        .team-members {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .team-member {
            background-color: #f2f2f2; /* Replace with your desired color */
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

<nav>
<div class="lgo">
    <img src="logo.jpg" alt="">
    <h1 style="width: 20%;">Welcome to Sikka</h1>

<ul>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="contactUs.php">Contact Us</a></li>
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="aboutUs.php">About Us</a></li>
    <li><a href="Home.php">Home</a></li>
</ul>
</div>
</nav>

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
            <h3>Team Member 1</h3>
            <p>Write some information about the first team member here.</p>
        </div>
        <div class="team-member">
            <h3>Team Member 2</h3>
            <p>Write some information about the second team member here.</p>
        </div>
        <!-- Add more team members as needed -->
    </div>

    <!-- Thank You Section -->
    <div class="thank-you">
        <h3>Thank You for visiting our library and website!</h3>
        <p>We hope you find the books you're looking for and enjoy your reading experience. If you have any questions or feedback, please feel free to contact us.</p>
    </div>
</body>

</html>