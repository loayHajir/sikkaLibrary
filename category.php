<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Categories';

ob_start();
?>
<style>
        .content h2 {
            font-size: 20px;
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            background-color: rgba(0, 0, 0, 0.6);
            position: relative;
            margin: 5px auto;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .category-selector {
            text-align: center;
            margin-bottom: 60px;
        }

        .category-selector select {
            padding: 10px;
            border: 1px solid #A0522D;
            background-color: #A0522D;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .category-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            grid-template-columns: repeat(4, 1fr);
        }

        .category-card {
            border-radius: 4px;
            padding: 10px;
            text-align: center;
            width: 250px;
        }

        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
            height: auto;
        }

        .category-card:hover {
            transform: scale(1.05);
        }
    </style>
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

include 'templates/html.php';
