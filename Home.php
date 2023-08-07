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

    </style>

</head>

<body>

    <?php include 'templates/header.php';?>

    <div class="content">
        <div class="history catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="romantic catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="movies catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="stories catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="comedy catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="drama catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="science catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="sport catagories">
            <img src="history.jpg" alt="">
        </div>
        <div class="horror catagories">
            <img src="history.jpg" alt="">
        </div>
    </div>

    <!-- <table>
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
    </table> -->
</body>

</html>