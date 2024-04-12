<?php
session_start();

// Έλεγχος αυθεντικοποίησης χρήστη
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Καλώς ήρθατε, <?php echo $_SESSION['username']; ?>!</h2>
    <!-- Περιεχόμενο της σελίδας εδώ -->
    <a href="logout.php">Αποσύνδεση</a>
</body>
</html>
