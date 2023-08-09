<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Home';
ob_start();
?>
<style>
    .header-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 50px;
        background-image: url('assets/img/library.jpg');
        background-size: cover;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height: 449px;
    }

    .header-content .info {
        max-width: 70%;
        background-color: rgba(0, 0, 0, 0.6);
        padding: 100px;
        font-size: 25px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        grid-area: text;
        margin: 25px;

    }

    .header-content p {
        margin-top: 20px;
        margin-right: 20px;
        font-size: 30x;
        font-family: "Times New Roman";
    }

    .learn-more-button {
        background-color: #A0522D;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
    }
</style>
<link rel="stylesheet" href="css/style.css">
<div class="header-content">
    <div class="info">
        <p>This is a place where you can find and explore various books in our library collection. Feel free to browse and download any book you like!</p>
        <a class="learn-more-button" href="about.php">Learn More</a>
    </div>
</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';
