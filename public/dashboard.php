<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Parking Management System</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
    <center>
    <div class="container">
        <header>
            <h1>Welcome, <?php echo $username; ?>!</h1>
            <p class="welcome-message">You are successfully logged in to the Parking Management System.</p>
        </header>

        <main>
            <section>
                <h2>Dashboard</h2>
                <p>Here you can manage your parking spots, view available spaces, or make reservations.</p>
                <div class="dashboard-links">
                    <a href="#">View Parking Spots</a>
                    <a href="#">Make Reservation</a>
                    <a href="#">Payment History</a>
                    <a href="logout.php">Logout</a>
                </div>
            </section>
        </main>
    </div>
</center>
</body>
</html>
