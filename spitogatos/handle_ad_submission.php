<?php
// Σύνδεση στη βάση δεδομένων (αντικαταστήστε τις παραμέτρους με τα δικά σας)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Αποτυχία σύνδεσης: " . $conn->connect_error);
}

// Λήψη των δεδομένων από τη φόρμα
$location = $_POST['location'];
$price = $_POST['price'];
$availability = $_POST['availability'];
$area = $_POST['area'];

// Προετοιμασία του SQL ερωτήματος για εισαγωγή δεδομένων
$sql = "INSERT INTO ads (location, price, availability, area) VALUES ('$location', $price, '$availability', $area)";

if ($conn->query($sql) === TRUE) {
    echo "Η αγγελία προστέθηκε με επιτυχία.";
} else {
    echo "Σφάλμα κατά την προσθήκη της αγγελίας: " . $conn->error;
}

// Κλείσιμο σύνδεσης
$conn->close();

