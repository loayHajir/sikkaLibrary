<?php

include "core/connect.php";
// include "core/admin.php";
$title = 'Description';
$sqldesc = "select BookName,Description,Language,author,pageNum,dop,image from `books` where ID = " . $_GET['ID'] . "";
$resultdesc = mysqli_query($conn, $sqldesc);
if ($resultdesc) {
    while ($row = mysqli_fetch_assoc($resultdesc)) {
        $bookname = $row['BookName'];
        $dop = $row['dop'];
        $lang = $row['Language'];
        $img = $row['image'];
        $des = $row['Description'];
        $page = $row['pageNum'];
        $author = $row['author'];
    }
}

ob_start();
?>

<link rel="stylesheet" href="assets/css/books.css">
<div class="describtion-content">
    <div class="header-description">
        <h2 class="book-name-description">Book Name: <?php echo $bookname?></h2>
    </div>
    <div class="body-description">
        <div class="img-description">
            <img src="<?php echo $img ?>" alt="">
        </div>
        <div class="info-description">
            <ul>
                <li>Author: <?php echo $author ?></li>
                <li>Language: <?php echo $lang ?></li>
                <li>Page Number: <?php echo $page?></li>
                <li>Date of Publication: <?php echo $dop?></li>
            </ul>
        </div>
    </div>
    <div class="footer-description">
        <p id="description" lang="<?php echo $lang ?>"><?php echo $des ?></p>
    </div>

</div>


<?php
$page = ob_get_clean();

include 'templates/html.php';