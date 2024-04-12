<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "real_estate_ads";

// Δημιουργία σύνδεσης
$conn = new mysqli($servername, $username, $password);

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Αποτυχία σύνδεσης: " . $conn->connect_error);
}

// Επιλογή βάσης δεδομένων
$sql = "USE $database";
if ($conn->query($sql) === FALSE) {
    die("Σφάλμα κατά την επιλογή της βάσης δεδομένων: " . $conn->error);
}

// Κώδικας για εκτέλεση ερωτημάτων στη βάση δεδομένων μπορεί να προστεθεί εδώ


