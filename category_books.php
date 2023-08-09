<!DOCTYPE html>
<html>

<head>
    <title>Category Books</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Your styles for this page */
    </style>
</head>

<body>
    <?php include 'templates/header.php';?>

    <div class="content">
        <?php
        include 'connect.php';

        // Check if the category is provided in the URL
        if (isset($_GET['category'])) {
            $category = $_GET['category'];

            // Fetch and display books for the selected category
            $query = "SELECT * FROM books WHERE category = '$category'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $bookname = $row['BookName'];
                    $img = $row['image'];

                    echo '
                    <div class="book-card">
                        <img src="' . $img . '" alt="' . $bookname . '">
                        <h3>' . $bookname . '</h3>
                    </div>';
                }
            } else {
                echo '<p>No books found for this category.</p>';
            }
        } else {
            echo '<p>No category selected.</p>';
        }
        ?>
    </div>
</body>

</html>