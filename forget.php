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
        echo "incorrect name or password or answer";
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
        background-image: url('library.jpg');
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

    .forget-container {
        width: 300px;
        padding: 20px;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 20px;
        color: #FFDEAD;
    }

    .forget-container h2 {
        margin-bottom: 20px;
    }

    .forget-container input[type="text"],
    .forget-container input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #FFDEAD;
        color: #000;
        /* Text color on input fields */
    }

    .forget-container .btn-container {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .forget-container .btn-container input[type="submit"] {
        width: 48%;
        background-color: #A0522D;
        padding: 14px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: #FFF;
        /* Text color on buttons */
    }

    .forget-container .btn-container input[type="submit"]:hover {
        background-color: #FFDEAD;
        color: #000;
        /* Text color on buttons when hovering */
    }

    .forget-container a {
        color: #FFDEAD;
        text-decoration: none;
        font-size: 14px;
    }

    .forget-container a:hover {
        color: #666;
    }
    </style>
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