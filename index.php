<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Home';
ob_start();
?>
<link rel="stylesheet" href="assets/css/user.css">
<div class="header-content">
    <div class="info">
        <p>This is a place where you can find and explore various books in our library collection. Feel free to browse and download any book you like!</p>
        <a class="learn-more-button" href="about.php">Learn More</a>
    </div>
</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';
