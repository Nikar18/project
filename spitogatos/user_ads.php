<?php
session_start();

// Έλεγχος αυθεντικοποίησης χρήστη
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Υποθέτουμε ότι έχουμε σύνδεση στη βάση δεδομένων
// Κάντε τις απαραίτητες αλλαγές εδώ για να συμβαδίζει με την πραγματική σύνδεση σας.

// Παράδειγμα ερωτήματος SQL για ανάκτηση των αγγελιών του συγκεκριμένου χρήστη
$username = $_SESSION['username'];
$sql = "SELECT * FROM ads WHERE username='$username'";

// Εκτέλεση του ερωτήματος SQL και εμφάνιση των αγγελιών
// Φανταστική σύνδεση με τη βάση δεδομένων
$results = $mysqli->query($sql);

// Έλεγχος αν υπάρχουν αποτελέσματα
if ($results->num_rows > 0) {
    echo "<h2>Οι αγγελίες σας:</h2>";
    echo "<ul>";
    while ($row = $results->fetch_assoc()) {
        echo "<li>Περιοχή: " . $row['region'] . ", Τιμή: " . $row['price'] . " ευρώ, Διαθεσιμότητα: " . $row['availability'] . ", Εμβαδόν: " . $row['area'] . " τ.μ.</li>";
    }
    echo "</ul>";
} else {
    echo "Δεν υπάρχουν αγγελίες.";
}

// Κλείσιμο της σύνδεσης με τη βάση δεδομένων
$mysqli->close();
