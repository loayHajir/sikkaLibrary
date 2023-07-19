<?php

include "connect.php";
if (isset($_POST['submit'])) {
    $bookName = $_POST['bookName'];
    $des = $_POST['description'];
    $lang = $_POST['language'];
    $available =$_POST['availability'];
    // var_dump($_POST);

    $sql = "insert into `books` (ID,BookName,Description,Language,Avilable) values('','$bookName','$des','$lang','$available')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        // echo "Data Insert Successfully";
        header ('location:display.php');
    }else {
        die (mysqli_error($conn));
    }
} 

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../SikkaLibrary/style.css">
    <style>
        #back-button{
        padding: 0.5rem 1rem;
        background-color:green;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }
        #back-button a{
            color:white;
            text-decoration:none;
        }
    </style>
</head>

<body>
<button id="back-button" onclick="history.back()"><a href="display.php">Back</a></button>
    <h1>Add a Book</h1>
    <form method="post">
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
        <button name="submit">Submit</button>
    </form>
</body>

</html>
<script>

</script>