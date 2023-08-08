<?php
include "connect.php";

session_start(); // Start the PHP session

// Check if the user is logged in and is an admin
if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'Admin') {
    // If the user is not an admin, redirect them to the login page or show an error message
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}


if (isset($_POST['submit'])) {
    sanitizeXSS();
    $bookName = $_POST['bookName'];
    $des = $_POST['description'];
    $lang = $_POST['language'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pageno = $_POST['pageNO'];
    $dop = $_POST['dop'];
    $img = $_FILES['image']['name'];
    $available = isset($_POST['availability']) ? $_POST['availability'] : 0;
    $pdf = $_FILES['pdf']['name']; // Get the name of the uploaded pdf file
    // var_dump($_FILES);
    // Upload file for PDF files
    $uploadDir = "uploads/";
    $imagesDir = "images/";
    // Check if the file is a PDF
    $fileType = strtolower(pathinfo($pdf, PATHINFO_EXTENSION));
    if ($fileType !== "pdf") {
        die("Only PDF files are allowed.");
    }
    // Check if the file is a png or jpg or jpeg
    $fileTypeImg = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    var_dump($fileTypeImg);
    if ($fileTypeImg !== "png" && $fileTypeImg !== "jpg" && $fileTypeImg !== "jpeg") {
        die("Only png and jpg files are allowed.");
    }
    // Move the uploaded file to the uploads 
    $targetFile = $uploadDir . rand() . '-' . str_replace(' ', '-', strtolower(basename($pdf)));
    // Move the uploaded file to the images 
    $targetFileImg = $imagesDir . rand() . '-' . str_replace(' ', '-', strtolower(basename($img)));
    // // check if pdf exists
    // if (file_exists($targetFile)) {
    //     $targetFile = $uploadDir . str_replace(' ', '-', strtolower(basename($pdf)));
    // }
    // // check if image exists
    // if (file_exists($targetFileImg)) {
    //     $targetFileImg = $imagesDir . str_replace(' ', '-', strtolower(basename($img)));
    // }
    $rowpdf = $rowimg = '';
    if ($pdf && move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetFile)) {
        $rowpdf = $targetFile;
    } else {
        die("Error uploading the file.");
    }
    if ($img && move_uploaded_file($_FILES["image"]["tmp_name"], $targetFileImg)) {
        $rowimg = $targetFileImg;
    } else {
        die("Error uploading the file.");
    }
    $sql = "insert into `books` (ID,BookName,Description,Language,Available,PDF,title,author,pageNum,dop,image) values('','$bookName','$des','$lang','$available','$rowpdf','$title','$author','$pageno','$dop','$rowimg')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Data Insert Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        height: 100vh;
        background-image: url('myimg/library.jpg');
        color: white;
    }

    .back-button {
        padding: 0.5rem 1rem;
        background-color:  #A0522D;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .back-button a {
        color: white;
        text-decoration: none;
    }

    h1 {
        text-align: center;
    }

    .form-group {
        margin-bottom: 1rem;
        margin-left: 35%;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    textarea,
    input[type="number"],
    input[type="date"] {
        width: 50%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    select {
        width: 52%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button[type="submit"] {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color:  #A0522D;
    }
    </style>
</head>

<body>

    <button class="back-button" onclick="history.back()"><a href="display.php">Back</a></button>
    <h1>Add a Book</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required>
        </div>
        <div class="form-group">
            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <option value="English">English</option>
                <option value="Arabic">Arabic</option>
                <option value="French">French</option>
                <option value="Spanish">Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="pageNo">Number Of Page:</label>
            <input type="number" id="pageNo" name="pageNO" required>
        </div>
        <div class="form-group">
            <label for="dop">Date Of Publication:</label>
            <input type="date" id="dop" name="dop" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            Availability:
            <input type="checkbox" id="availability" name="availability" value="1">
        </div>
        <div class="form-group">
            pdf:
            <input type="file" id="pdf" name="pdf">
            img:
            <input type="file" id="image" name="image">
        </div>
        <br>
        <!-- <div class="form-group"> -->
        <button name="submit" class="back-button" style="margin-left:47%;">Submit</button>
        <!-- </div> -->
    </form>
</body>

</html>