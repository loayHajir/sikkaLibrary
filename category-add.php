<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Add Category';

if (isset($_POST['submit'])) {
    sanitizeXSS();
    $CategoryName = $_POST['CategoryName'];
    $categoryimg = $_FILES['CategoryImg']['name'];
    // Upload image for category
    $categorydir = "uploads/catg/";
    // Check if the file is a png or jpg or jpeg
    $fileTypeImg = strtolower(pathinfo($categoryimg, PATHINFO_EXTENSION));
    // var_dump($fileTypeImg);
    if ($fileTypeImg !== "png" && $fileTypeImg !== "jpg" && $fileTypeImg !== "jpeg") {
        die("Only png and jpg files are allowed.");
    }
    // Move the uploaded file to the catg 
    $targetFileImg = $categorydir . rand() . '-' . str_replace(' ', '-', strtolower(basename($categoryimg)));
    $rowcatg = '';
    if ($categoryimg && move_uploaded_file($_FILES["CategoryImg"]["tmp_name"], $targetFileImg)) {
        $rowcatg = $targetFileImg;
    } else {
        die("Error uploading the file.");
    }
    $sql = "insert into `catagory` (catagoryNo,catagoryName,catagoryImg) values('','$CategoryName','$rowcatg')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Data Insert Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }

}

ob_start();
?>
<link rel="stylesheet" href="assets/css/categories.css">

<div class="add-category-content">
    <a href="display.php" class="back-button">Back</a>
    <h1 class="h1-add">Add a Category</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="CategoryName">Category Name:</label>
            <input type="text" id="CategoryName" name="CategoryName" required>
        </div>
        <div class="form-group">
            <label for="CategoryImg">Category Image:</label>
            <input type="file" id="CategoryImg" name="CategoryImg" required>
        </div>
        <button name="submit" class="back-button" style="margin-left:47%;">Submit</button>
    </form>

</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';