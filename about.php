<?php

include "core/connect.php";
$title = 'About Us';
ob_start();
?>

<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="assets/css/user.css">

<div class="about-content">
    
    <!-- About Us Section -->
<div class="about-us">
    <h2>About Us</h2>
    <div class="description">
        <p>Write a brief description about your organization or library here.</p>
    </div>
</div>

<!-- Team Members Section -->
<div class="team-members">
    <div class="team-member">
        <h3>Layal Khatib</h3>
        <p> Role = ( Project Manager )</p>
        <br>Mail-ID : layalkhatib@gmail.com<br />
    </div>
    <div class="team-member">
        <h3>Dana Allouche</h3>
        <p> Role = ( Full Stack Developer )</p>
        <br>Mail-ID : dana@gmail.com<br />
    </div>

    <div class="team-member">
        <h3>Loay Hajir</h3>
        <p> Role = ( Full Stack Developer )</p>
        <br>Mail-ID : loay@gmail.com<br />
    </div>

    <div class="team-member">
        <h3>Zeinab Miari</h3>
        <p> Role = ( Full Stack Developer )</p>
        <br>Mail-ID : zeina6@gmail.com<br />
    </div>


</div>

<!-- Thank You Section -->
<div class="thank-you">
    <h3>Thank You for visiting our library and website!</h3>
    <p>We hope you find the books you're looking for and enjoy your reading experience. If you have any
        questions or feedback, please feel free to contact us.</p>
</div>
</div>
<?php

$page = ob_get_clean();

include 'templates/header.php';
include 'templates/html.php';
