<header>
    <nav>
        <div class="lgo">
            <img src="assets/img/96606910-library-logo-with-building-and-books.webp" alt="" class="logo">
            <h1 style="width: 20%;">Welcome to Sikka</h1>

            <ul>
                <?php

                if ($isLoggedIn) {
                    echo '<li><a href="login.php?logout">Logout</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
                <li><a href="display.php">Books</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="index.php">Home</a></li>

            </ul>
        </div>
    </nav>
</header>