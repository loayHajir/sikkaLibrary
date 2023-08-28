<?php
include "core/connect.php";
$title = 'Forgot your password?';

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $query = mysqli_query($conn, "SELECT * FROM `login` WHERE username = '$name' AND questions = '$question' AND answer = '$answer'");
    $result = mysqli_num_rows($query);

    if (!$result) {
        echo "<p style='color: black;font-size:55px;'>incorrect name or password or answer. </p>";
    } else {
        header("location:reset-pass.php");
        // var_dump($result);
        if ($result > 0) {
            // Username, question, and answer are correct, store user ID in the session
            $user_data = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $user_data['ID'];
            header("location:reset-pass.php");
            exit();
        } else {
            $_SESSION['resetpass_error'];
        }
    }
}

ob_start();
?>
<link rel="stylesheet" href="assets/css/user.css">

<div class="forget-content">
    <div class="forget-box">
        <form action="forget.php" method="post">
            <h2>Forgot Password</h2>
            <div class="form-group-forget">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group-forget">
                <label for="question">Security Question:</label>
                <input type="text" id="question" name="question" required>
            </div>
            <div class="form-group-forget">
                <label for="answer">Answer:</label><br>
                <input type="text" id="answer" name="answer" required>
            </div>

            <div class="btn-container-forget">
                <input type="submit" value="Submit" name="submit">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </div>
</div>
<?php

$page = ob_get_clean();

include 'templates/html.php';