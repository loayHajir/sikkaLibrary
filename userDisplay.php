<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Table</title>

    <style>
    /* // CSS styling for the  */
    body {
        padding: 0;
        margin: 0;
    }
    table button {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
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
        background-color: #f2f2f2;
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

    #logout {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        position: absolute;
        bottom: 20px;
        right: 50px;
    }
    ul,.lgo {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
width:100%;
background-color: #333;
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
    
}
.header-content {
        display: flex;
        justify-content: space-between;
        text-align: center;
        padding:100px;
        background-image: url('library.jpg'); /* Replace 'header_image.jpg' with the actual path to your image */
        background-size: cover;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
    }

    .header-content .info {
        max-width: 70%;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 50px;
        font-size:25px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        grid-area: text;
        margin: 25px;     
    }

    .header-content p {
        margin-top:20px;
        margin-bottom: 10px;
        margin-right:20px;
        font-size:30x;
        font-family: "Times New Roman";
    }

    .learn-more-button {
        background-color: #A0522D;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size:20px;
    }
    
</style>
</head>

<body>

<nav>
<div class="lgo">
    <img src="logo.jpg" alt="">
    <h1 style="width: 20%;">Welcome to Sikka</h1>

<ul>
    <li><a href="contactUs.php">Contact Us</a></li>
    <li><a href="location.php">Location</a></li>
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="aboutUs.php">About Us</a></li>
    <li><a href="display.php">Home</a></li>
</ul>
</div>
</nav>

<div class="header-content">
        <div class="info">
           <p>This is a place where you can find and explore various books in our library collection. Feel free to browse and download any book you like!</p>
           <a class="learn-more-button" href="aboutUs.php">Learn More</a>
        </div>
    </div>

    <td>
        <a id="logout" href="logout.php? logout=' . $id . '" class="text-light">Logout</a>
    </td>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Language</th>
                <th>Available</th>
                <th>PDF</th>
            </tr>
        </thead>

        <tbody id="table-body">
            <?php
            $SQL = "select * from `books`";
            $result = mysqli_query($conn, $SQL);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['ID'];
                    $bookname = $row['BookName'];
                    $desc = $row['Description'];
                    $lang = $row['Language'];
                    $available = $row['Available'];
                    $pdf = $row['PDF'];
                    $img = $row['image'];
                    echo ' 
    <tr> 
    <th scope="row">' . $id . '</th>
    <td>' . $bookname . '</td>
    <td>' . ($img? '<img src="' . $img . '"/>' : 'No Image') .'</td>
    <td>' . $desc . '</td>
    <td>' . $lang . '</td>
    <td>' . $available . '</td>
    <td> <a id="down" href="download.php?file=' . urlencode($pdf) . '">Download PDF</a></td>
    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>