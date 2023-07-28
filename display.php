<?php
include "connect.php";
session_start();

if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'Admin') {
    // If the user is not an admin, redirect them to the login page
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Table</title>
    <style>
    body {
        padding: 0;
        margin: 0;
        background-image: url('library.jpg');
    }

    .btn {
        padding: 0.5rem 1rem;
        background-color: #A0522D;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
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
        color:white;
    }

    th {
        background-color:#A0522D;
    }

    .button-container {
        text-align: left;
    }

    .button-container button {
        padding: 0.5rem 1rem;
        background-color: #A0522D;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        position: absolute;
        bottom: 20px;
        right: 150px;
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
        background-color:#A0522D;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        position: absolute;
        bottom: 20px;
        right: 50px;
        
    }

    ul {

        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #A0522D;

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
    </style>
</head>

<body>

    <nav>

        <ul>
            <img src="96606910-library-logo-with-building-and-books (1).webp" alt="">
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="location.php">Location</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="display.php">Home</a></li>
        </ul>
    </nav>
    <div class="button-container">
        <button id="add-button"><a href="add.php">Add</a></button>
        <a id="logout" href="logout.php? logout=' . $id . '" class="text-light">Logout</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Description</th>
                <th>Language</th>
                <th>Available</th>
                <th></th>
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
                    echo ' 
    <tr> 
    <th scope="row">' . $id . '</th>
    <td>' . $bookname . '</td>
    <td>' . $desc . '</td>
    <td>' . $lang . '</td>
    <td>' . $available . '</td>
    <td> 
    <a class="btn btn-primary" href="update.php? updateid=' . $id . '" class="text-light">Update</a>

    <a class="btn btn-danger" onclick="return msg()" href="delete.php? deleteid=' . $id . '"
    class="text-light">delete</a>
    </td>
    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<script>
function msg() {

    var confirmation = confirm("Are you want to delete?");
    if (confirmation) {
        alert("deleted successfully!");
    } else {
        return false;
    }

}
</script>