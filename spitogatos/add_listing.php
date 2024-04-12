<?php
// Σύνδεση με τη βάση δεδομένων
// Υποθέτουμε ότι έχεις ήδη το σύστημα σύνδεσης με τη βάση δεδομένων
// Προσαρμόστε ανάλογα με τη δομή της βάσης σας
require_once 'database_connection.php';

// Ελέγχουμε αν έχει γίνει σωστά το αίτημα AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['area']) && isset($_POST['price']) && isset($_POST['availability']) && isset($_POST['area_size'])) {
    // Παίρνουμε τα δεδομένα από το αίτημα AJAX
    $title = $_POST['title'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    $area_size = $_POST['area_size'];

    // Εισάγουμε τα δεδομένα στη βάση δεδομένων
    // Υποθέτουμε ότι έχετε μια βάση δεδομένων με πίνακα "listings" και τις κατάλληλες στήλες
    // Προσαρμόστε ανάλογα με τη δομή της βάσης σας
    $sql = "INSERT INTO listings (title, area, price, availability, area_size) VALUES ('$title', '$area', '$price', '$availability', '$area_size')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("success" => true, "message" => "Η αγγελία προστέθηκε με επιτυχία."));
    } else {
        echo json_encode(array("success" => false, "message" => "Προέκυψε σφάλμα κατά την εισαγωγή της αγγελίας: " . mysqli_error($conn)));
    }
} else {
    // Αν τα απαιτούμενα δεδομένα δεν υποβλήθηκαν μέσω AJAX
    echo json_encode(array("success" => false, "message" => "Λάθος αίτημα."));
}
