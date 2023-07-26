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

        section {
            text-align: center;
            background-size: cover;
            padding: 100px 0;
            padding: 2rem;
            text-align: center;
        }

        .contact-form {
            max-width: 500px;
            margin: 0 auto;
        }

        .contact-form label {
            color : black;
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .contact-form textarea {
            resize: vertical;
        }

        .contact-form button {
            background-color: #4CAF50;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Contact Us</h1>
    </header>

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

    <section>
        <div class="contact-form">
            <form action="#" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</body>

</html>