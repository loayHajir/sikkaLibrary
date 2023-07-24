<?php
include 'connect.php';
if (isset($_POST['Submit'])) {
$name = $_POST['username'];
$question = $_POST['question'];
$answer = $_POST['answer'];

$query = mysqli_query($conn, "select * from login where username = '$name' && questions = '$question' && answer =$'$answer'");
$result = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);
if (!$resutl) {
    echo "username or question or answer incorrect";
} else {
    header("Location: resetpass.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      padding: 20px;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label, select {
      display: block;
      margin-bottom: 10px;
    }

    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <form action="#" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="question">Select a question:</label>
    <select id="question" name="question" required>
      <option value="" disabled selected>Select a question</option>
      <option value="q1">What is your favorite color</option>
      <option value="q2">What is your favorite movie</option>
      <option value="q3">What city were you born in</option>
      <!-- Add more options as needed -->
    </select>

    <label for="answer">Answer:</label>
    <input type="text" id="answer" name="answer" required>

    <input type="submit" value="Submit" formaction="resetpass.php">
  </form>
</body>
</html>
