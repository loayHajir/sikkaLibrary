<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Categories';

ob_start();
?>
<link rel="stylesheet" href="assets/css/categories.css">
<link rel="stylesheet" href="assets/css/header.css">
<div class="content">
    <h2>Browse Book Categories</h2>
    <div class="category-selector">
        <select onchange="showBooks(this.value)">
            <option value="">Select a Category</option>
            <option value="history">History</option>
            <option value="romantic">Romantic</option>
            <option value="movies">Movies</option>
            <!-- Add more categories as needed -->
        </select>
    </div>
    <div class="category-grid">
        <a href="category_books.php?category=history" class="category-card">
            <img src="assets/img/history.jpg" alt="History">
            <h3>History</h3>
        </a>
        <a href="category_books.php?category=romantic" class="category-card">
            <img src="assets/img/history.jpg" alt="Romantic">
            <h3>Romantic</h3>
        </a>
        <a href="category_books.php?category=movies" class="category-card">
            <img src="assets/img/history.jpg" alt="Movies">
            <h3>Movies</h3>
        </a>
        <a href="category_books.php?category=literature" class="category-card">
            <img src="assets/img/history.jpg" alt="Literature">
            <h3>Movies</h3>
        </a>
        <!-- Add more category links -->
    </div>
</div>

<script>
function showBooks(category) {
    // Redirect to a page where you display books for the selected category
    window.location.href = "category-books.php?category=" + category;
}
</script>
<?php

$page = ob_get_clean();
include 'templates/header.php';
include 'templates/html.php';