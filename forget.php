<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <form action="resetpass.php" method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="security_question">Select your security question:</label>
        <select id="security_question" name="security_question" required><br><br>
            <option value="">Select a security question</option>
            <option value="q1">What is your favorite color?</option>
            <option value="q2">What is your favorite movie?</option>
            <option value="q3">What city were you born in?</option>
            <!-- Add more security questions here -->
        </select> 
        <br>
        <label for="security_answer">Enter your answer:</label>
        <input type="text" id="security_answer" name="security_answer" required><br>
        <br>
        <button type="submit" ><a  href="resetpass.php">Reset Password </a></button>
    </form>
</body>
</html>


