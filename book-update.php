<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Update Book';

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

ob_start();
?>
<link rel="stylesheet" href="assets/css/books.css">
<link rel="stylesheet" href="assets/css/reset.css">
<div class="book-content">
    <a href="display.php" class="back-button">Back</a>
    <h1 class="h1-update">Update the book</h1>
    <form method="post">
        <div class="form-group">
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" required value=<?php echo $myName; ?>>
        </div>
        <div class="form-group">
            <label for="language">Language:</label>
            <select id="language" name="language" required>
                <option value="lang">
                    <?php echo $mylang; ?>
                </option>
                <option value="English">English</option>
                <option value="Arabic">Arabic</option>
                <option value="French">French</option>
                <option value="Spanish">Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <!-- <label for="title">Title:</label> -->
            <!-- <input type="text" id="title" name="title" required value=<?php echo $mytitle; ?>> -->
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required value=<?php echo $myauthor; ?>>
        </div>
        <div class="form-group">
            <label for="pageNo">Number Of Page:</label>
            <input type="number" id="pageNo" name="pageNO" required value=<?php echo $myno; ?>>
        </div>
        <div class="form-group">
            <label for="dop">Date Of Publication:</label>
            <input type="date" id="dop" name="dop" required value=<?php echo $mydop; ?>>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required><?php echo $mydes; ?></textarea>
        </div>
        <div class="form-group">
            Availability:
            <input type="checkbox" id="availability" name="availability" <?php if ($myavai == "1")
                echo 'checked=checked"'; ?>value="1">
        </div>
        <div class="form-group">
            pdf:
            <input type="file" id="pdf" name="pdf">
            img:
            <input type="file" id="image" name="image">
        </div>
        <br>
        <button name="update" class="update-button" >Update</button>
</div>
</form>
<?php

$page = ob_get_clean();

include 'templates/html.php';