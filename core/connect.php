<?php

include 'config.php';

session_start();

// Check if the user is logged in or not
$isLoggedIn = isset($_SESSION['user_id']);

$conn = mysqli_connect($serverName, $userName, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* Prevent XSS input */
function sanitizeXSS()
{
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $_REQUEST = (array) $_POST + (array) $_GET + (array) $_REQUEST;
}

function isAdmin()
{
    return isset($_SESSION['Type']) && $_SESSION['Type'] == 'Admin';
}

function crop_and_resize_image_gd($orig_path, $new_path, $new_width, $new_height)
{
    $image_data = getimagesize($orig_path); // Get image data
    $orig_width = $image_data[0]; // Image width
    $orig_height = $image_data[1]; // Image height

    $media_type = $image_data['mime']; // Media type
    $orig_ratio = $orig_width / $orig_height; // Ratio of original
    $new_ratio = $new_width / $new_height; // Ratio of crop

    // Calculate new size
    if ($new_ratio < $orig_ratio) { // If new ratio < orig
        $select_width = $orig_height * $new_ratio; // Calculate width
        $select_height = $orig_height; // Height stays same
        $x_offset = ($orig_width - $select_width) / 2; // Calculate X Offset
        $y_offset = 0; // Y offset = 0 (top)
    } else { // Otherwise
        $select_width = $orig_width; // Width stays same
        $select_height = $orig_width * $new_ratio; // Calculate height
        $x_offset = 0; // X-offset = 0 (left)
        $y_offset = ($orig_height - $select_height) / 2; // Calculate Y Offset
    }

    switch ($media_type) { // If media type is
        case 'image/gif': // GIF
            $orig = imagecreatefromgif($orig_path); // Open GIF
            break; // End of switch
        case 'image/jpeg': // JPEG
            $orig = imagecreatefromjpeg($orig_path); // Open JPEG
            break; // End of switch
        case 'image/png': // PNG
            $orig = imagecreatefrompng($orig_path); // Open PNG
            break; // End of switch
    }

    $new = imagecreatetruecolor($new_width, $new_height); // New blank image
    imagecopyresampled(
        $new,
        $orig,
        0,
        0,
        $x_offset,
        $y_offset,
        $new_width,
        $new_height,
        $select_width,
        $select_height
    ); // Crop and resize

    // Save the image in the correct format
    switch ($media_type) { // If media type is
        case 'image/gif': // GIF 
            $result = imagegif($new, $new_path); // Save GIF  
            break; // End of switch
        case 'image/jpeg': // JPEG
            $result = imagejpeg($new, $new_path); // Open JPEG 
            break; // End of switch
        case 'image/png': // PNG 
            $result = imagepng($new, $new_path); // Open PNG  
            break; // End of switch
    }
    return $result; // Return resized image
}