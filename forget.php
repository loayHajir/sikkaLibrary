<?php
include 'connect.php';
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $query = mysqli_query($conn, "SELECT * FROM `login` WHERE username = '$name' AND questions = '$question' AND answer = '$answer'");
    $result = mysqli_num_rows($query);

    if (!$result) {
        echo "<p style='color: white;font-size:25px;'>incorrect name or password or answer. </p>";
    } else {
      header("location: resetpass.php");
          // var_dump($result);
    if ($result > 0) {
        // Username, question, and answer are correct, store user ID in the session
        $user_data = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $user_data['ID'];
        header("location: resetpass.php");
        exit();
    } else {
        $_SESSION['resetpass_error'];
    }
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('myimg/library.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="forget-container">
        <form action="forget.php" method="post">
            <h2>Forgot Password</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="question">Security Question:</label>
            <input type="text" id="question" name="question" required>

            <label for="answer">Answer:</label>
            <input type="text" id="answer" name="answer" required>

            <div class="btn-container">
                <input type="submit" value="Submit" name="submit">
                <a href="login.php">Back to Login</a>
            </div>
        </form>
    </div>
</body>

</html>