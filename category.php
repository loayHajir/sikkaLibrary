<?php

include "core/connect.php";
$title = 'Categories';

ob_start();
?>
<link rel="stylesheet" href="assets/css/categories.css">
<link rel="stylesheet" href="assets/css/header.css">
<div class="category-content">
    <h1>Browse Book Categories</h1>
    <div class="category-selector">
        <?php
        $sqlCat = "select catagoryName from `catagory`";
        $resultCat = mysqli_query($conn, $sqlCat);
        echo '<select onchange="showBooks(this.value)">';
        echo '<option value="">Select a Category</option>';
        if ($resultCat) {
            while ($row = mysqli_fetch_assoc($resultCat)) {
                $catNameSelect = $row['catagoryName'];
                echo '<option value=' . $catNameSelect . '>' . $catNameSelect . '</option>';
            }
        }
        echo '</select>'
            ?>
    </div>
    <div class="container-card">
        <?php
        
        $SQL = "select * from `catagory`";
        $result = mysqli_query($conn, $SQL);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $catName = $row['catagoryName'];
                $catimg = $row['catagoryImg'];
                echo ' 
                    <div class="category-grid">
                        <div class="category-card">
                            <a href="category_books.php?category=history">
                                <img src='.$catimg.' alt='.$catName.'>
                                <h3>' . $catName . '</h3>
                            </a>
                    </div>
                        </div>';
            }
        }
        ?>
    </div>
</div>

<?php

$page = ob_get_clean();
include 'templates/header.php';
include 'templates/html.php';