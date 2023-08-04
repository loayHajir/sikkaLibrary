<nav>
<div class="lgo">
    <img src="logo.jpg" alt="">
    <h1 style="width: 20%;">Welcome to Sikka</h1>

    <ul>
    <?php
       
            if ($isLoggedIn) {
                echo '<li><a href="home.php?logout">Logout</a></li>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="Home.php">Home</a></li>
        </ul>
</div>
</nav>