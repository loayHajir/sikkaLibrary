<?php

include "connect.php";

if (isset($_POST['submit'])) {
    sanitizeXSS();
    $bookName = $_POST['bookName'];
    $des = $_POST['description'];
    $lang = $_POST['language'];
    $available = isset($_POST['availability']) ? $_POST['availability'] : 0;
    $pdf = $_FILES['upload']['name']; // Get the name of the uploaded pdf file
    // var_dump($_FILES);
    // Upload file for PDF files
    $uploadDir = "uploads/";
    // Check if the file is a PDF
    $fileType = strtolower(pathinfo($pdf, PATHINFO_EXTENSION));
    if ($fileType !== "pdf") {
        die("Only PDF files are allowed.");
    }
    // Move the uploaded file to the uploads 
    $targetFile = $uploadDir . rand() . '-' . str_replace(' ', '-', strtolower(basename($pdf)));
    // var_dump($targetFile);
    if (file_exists($targetFile)) {
        $targetFile = $uploadDir . str_replace(' ', '-', strtolower(basename($pdf)));
    }
    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
        $sql = "insert into `books` (ID,BookName,Description,Language,Available,PDF) values('','$bookName','$des','$lang','$available','$targetFile')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "Data Insert Successfully";
            header('location:display.php');
        } else {
            die(mysqli_error($conn));
        }
    } else {
        die("Error uploading the file.");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../SikkaLibrary/style.css">
    <style>
    #back-button {
        padding: 0.5rem 1rem;
        background-color: green;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #back-button a {
        color: white;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <button id="back-button" onclick="history.back()"><a href="display.php">Back</a></button>
    <h1>Add a Book</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>
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
            <label for="availability">Availability:</label>
            <input type="checkbox" id="availability" name="availability" value="1">
        </div>
        <div>
            <label for="upload">Upload:</label>
            <input type="file" id="upload" name="upload">
        </div>
        <br>
        <button name="submit">Submit</button>
    </form>
</body>

</html>