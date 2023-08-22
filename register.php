<?php
include "core/connect.php";
// include "core/admin.php";
$title = 'Register';
if (isset($_POST['Register'])) {

    $name = $_POST['username'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $mail = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $sql = "insert into `login` (username,password,phoneno,email,dob,gender,questions,answer) values('$name','$pass','$phone','$mail','$dob','$gender','$question','$answer')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "data insert succssefully";
        header('location:login.php');
    } else {
        die(mysqli_error($conn));
    }
}
ob_start();
?>
<link rel="stylesheet" href="assets/css/user.css">
<div class="registration-content">
    <div class="registration-box">
        <h2>Registration Form</h2>
        <form method="post" onsubmit="return chkPassword() && checkNum() && age();">
            <div class="form-group-forget">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group-forget">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group-forget">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group-forget">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group-forget">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group-forget">
                <label for="question">Select a question:</label>
                <select id="question" name="question" required>
                    <option value="" disabled selected>Select a question</option>
                    <option value="What is your favorite color">What is your favorite color</option>
                    <option value="What is your favorite movie">What is your favorite movie</option>
                    <option value="What city were you born in">What city were you born in</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group-forget">

                <label for="answer">Answer:</label>
                <input type="text" id="answer" name="answer" required>
            </div>
            <div class="form-group-forget">
                <div class="gender-container">
                    <label>Gender:</label>
                    <label for="male">Male</label>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="female">Female</label>
                    <input type="radio" id="female" name="gender" value="Female">
                </div>
            </div>
            <div class="btn-container-forget">
                <input type="submit" value="Register" name="Register">
                <a href="login.php">Back to login</a>
            </div>
        </form>
    </div>
</div>


<script>
var pass = document.getElementById("password");

function chkPassword() {
    if (pass.value.length < 6) {
        alert("To be secure! pleaase enter at least 6 chracters");
        pass.focus();
        return false;
    }
}
var numInput = document.getElementById("phone");

function checkNum() {
    if (isNaN(numInput.value)) {
        alert("numeric input only");
        numInput.focus();
        return false;
    }
    if (numInput.value.length < 8 || numInput.value.length > 8) {
        alert("Please enter 8 number");
        numInput.focus();
        return false;
    }
}

function age() {
    var dateField = document.getElementById("dob").value;
    var inputDate = new Date(dateField);
    var currentDate = new Date();
    var age = currentDate.getFullYear() - inputDate.getFullYear();
    if (inputDate > currentDate) {
        alert("Invalid Date, Please Enter a valid date");
        dateField.focus();
        return false;
    }
}
</script>
<?php

$page = ob_get_clean();

include 'templates/html.php';