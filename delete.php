<?php
include 'connect.php';
if (isset($_POST['book_id'])){
    $id = $_POST['book_id'];

    $sql = "DELETE FROM `books` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result){
        header('Location: delete.php');
        exit();
    } else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
    <link rel="stylesheet" href="../SikkaLibrary/style.css">
</head>
<body>
    <h1>Delete Book</h1>
    <form action="delete_book.php" method="POST">
        <label for="book_id">Book ID:</label>
        <input type="text" id="book_id" name="book_id" required>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
