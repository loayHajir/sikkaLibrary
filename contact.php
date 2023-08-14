<?php

include "core/connect.php";
$title = 'Contact Us';
ob_start();
?>


<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="assets/css/user.css">

<div class="contact-content">
    <div class="contact-header">
        <h1>Contact Us</h1>
    </div>

    <section>
        <div class="contact-form">
            <form action="#" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
                <br>
                <label for="message">Message:</label>
                <textarea type="text" name="message" rows="4" required></textarea>
                <br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
</div>
<?php

$page = ob_get_clean();

include 'templates/header.php';
include 'templates/html.php';