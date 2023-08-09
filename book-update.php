<?php
include "connect.php";

session_start(); // Start the PHP session

// Check if the user is logged in and is an admin
if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'Admin') {
    // If the user is not an admin, redirect them to the login page or show an error message
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}

$id = $_GET['updateid'];
$mySql = "select * from `books` where id='$id'";
$myResult = mysqli_query($conn, $mySql);
$myRow = mysqli_fetch_assoc($myResult);
$myName = $myRow['BookName'];
$mydes = $myRow['Description'];
$mylang = $myRow['Language'];
$myavai = $myRow['Available'];
$mypdf = $myRow['PDF'];
$mytitle = $myRow['title'];
$myauthor = $myRow['author'];
$mydop = $myRow['dop'];
$myno = $myRow['pageNum'];
if (isset($_POST['update'])) {
    $bookName = $_POST['bookName'];
    $des = $_POST['description'];
    $lang = $_POST['language'];
    $available = $_POST['availability'];
    $pdf = $_POST['upload'];
    $title = $_POST['title'];
    $auhtor = $_POST['author'];
    $pagenum = $_POST['pageNO'];
    $dop = $_POST['dop'];
    $img = $_POST['image'];
    // var_dump($_POST);
    $sql = "update `books`set id='$id',Bookname='$bookName',Description='$des',Language='$lang',Available='$available',PDF='$pdf',title ='$title',author='$auhtor',pageNum='$pagenum',dop='$dop',image='$img' where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Data update Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        height: 100vh;
        background-image: url('assets/img/library.jpg');
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
        background-color: #A0522D;
    }
    </style>
</head>

<body>
    <button class="back-button" onclick="history.back()"><a href="display.php">Back</a></button>
    <h1>Update the book</h1>
    <form method="post">
        <div class="form-group">
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required value=<?php echo $myName;;?>>
        </div>
        <div class="form-group">
            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <option value="lang"> <?php echo $mylang;?></option>
                <option value="English">English</option>
                <option value="Arabic">Arabic</option>
                <option value="French">French</option>
                <option value="Spanish">Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required value=<?php echo $mytitle;?>>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required value=<?php echo $myauthor;?>>
        </div>
        <div class="form-group">
            <label for="pageNo">Number Of Page:</label>
            <input type="number" id="pageNo" name="pageNO" required value=<?php echo $myno;?>>
        </div>
        <div class="form-group">
            <label for="dop">Date Of Publication:</label>
            <input type="date" id="dop" name="dop" required value=<?php echo $mydop;?>>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required><?php echo $mydes;?></textarea>
        </div>
        <div class="form-group">
            Availability:
            <input type="checkbox" id="availability" name="availability"
                <?php if ($myavai == "1" ) echo 'checked=checked"';?>value="1">
        </div>
        <div class="form-group">
            pdf:
            <input type="file" id="pdf" name="pdf">
            img:
            <input type="file" id="image" name="image">
        </div>
        <br>
        <button name="update" class="back-button" style="margin-left:47%;">Update</button>
    </form>
</body>

</html>