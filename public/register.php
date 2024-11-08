<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('config.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $identity = $_POST['identity'];
    $course = $_POST['course'];
    $plate_number = $_POST['Plate_Number']; // Ensure 'Plate Number' is renamed to 'Plate_Number' in HTML

    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database, including all fields
        $sql = "INSERT INTO users (username, password, select_identity, course, plate_number) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $hashed_password, $identity, $course, $plate_number);

        if ($stmt->execute()) {
            $success = "Registration successful! You can now <a href='index.php'>login</a>.";
        } else {
            $error = "Error registering the user. Please try again.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <center>
    <h2>Create a New Account</h2>
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    <?php if (isset($success)) { echo "<p style='color: green;'>$success</p>"; } ?>
    <form method="POST" action="register.php">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div class="form-group">
            <label for="regSelect">Select Identity</label>
            <select id="regSelect" name="identity" required>
                <option value="" disabled selected>Choose an identity</option>
                <option value="Faculty">Faculty</option>
                <option value="Staff">Staff</option>
                <option value="Student">Student</option>
            </select>
        </div>

        <div class="form-group">
            <label for="regCourse">Course</label>
            <select id="regCourse" name="course" required>
                <option value="" disabled selected>Choose a course</option>
                <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                <option value="Bachelor of Science in Marine Biology">Bachelor of Science in Marine Biology</option>
                <option value="Bachelor of Science in Fisheries">Bachelor of Science in Fisheries</option>
                <option value="Bachelor of Science in Agriculture">Bachelor of Science in Agriculture</option>
            </select>
        </div>
        
        <div>
            <label for="Plate_Number">Plate Number:</label>
            <input type="text" id="Plate_Number" name="Plate_Number" required>
        </div>
        
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
    <p>Already have an account? <a href="index.php">Login here</a></p>
</center>
</body>
</html>
