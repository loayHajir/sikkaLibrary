<?php
    include "connect.php";
    $id = $_GET['updateid'];
    $mySql = "select * from `books` where id='$id'";
    $myResult = mysqli_query($conn, $mySql);
    $myRow = mysqli_fetch_assoc($myResult);
    $myName = $myRow['BookName'];
    $mydes = $myRow['Description'];
    $mylang = $myRow['Language'];
    $myavai = $myRow['Avilable'];
    if (isset($_POST['update'])) {
        $bookName = $_POST['bookName'];
        $des = $_POST['description'];
        $lang = $_POST['language'];
        $available = $_POST['availability'];
        // var_dump($_POST);
        $sql = "update `books`set id='$id',BookName='$bookName',Description='$des',Language='$lang',Avilable='$available'where id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Data update Successfully";
            // header('location:display.php');
        } else {
            die(mysqli_error($conn));
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Update the book</h1>
    <form method="post">
        <div class="form-group">
            <label for="bookName">Book Name:</label>
            <input type="text" id="bookName" name="bookName" value=<?php echo $myName;?>>
        </div>
        <div class=" form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5"><?php echo $mydes;?></textarea>
        </div>
        <div class=" form-group">
            <label for="language">Language:</label>
            <select id="language" name="language">
                <option value="lang"><?php echo $mylang;?></option>
                <option value="English">English</option>
                <option value="Arabic">Arabic</option>
                <option value="French">French</option>
                <option value="Spanish">Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="availability">Availability:</label>
            <input type="checkbox" id="availability" name="availability" value=<?php echo $myavai;?>>
        </div>
        <button name="update">Update</button>
    </form>
</body>

</html>