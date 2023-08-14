<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Add Category';

if (isset($_POST['submit'])) {
    sanitizeXSS();
    $CategoryName = $_POST['CategoryName'];
    $sql = "insert into `catagory` (catagoryNo,catagoryName) values('','$CategoryName')";
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
        <button name="submit" class="back-button" style="margin-left:47%;">Submit</button>
    </form>

</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';