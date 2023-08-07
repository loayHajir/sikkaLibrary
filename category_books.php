<?php
include "connect.php";

$category = $_GET['category'];

// Retrieve books for the selected category from the database
$SQL = "SELECT * FROM `books` WHERE category = '$category'";
$result = mysqli_query($conn, $SQL);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo ucfirst($category); ?> Books</title>
    <!-- Add your stylesheets and additional styles here -->
</head>

<body>
    <?php include 'templates/header.php';?>

    <h2><?php echo ucfirst($category); ?> Books</h2>

    <div class="book-list">
        <?php foreach ($books as $book) { ?>
            <div class="book">
                <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['BookName']; ?>">
                <h3><?php echo $book['BookName']; ?></h3>
                <p><?php echo $book['Description']; ?></p>
                <!-- Add more book details here -->
            </div>
        <?php } ?>
    </div>

    <!-- Add your scripts and additional content here -->
</body>

</html>