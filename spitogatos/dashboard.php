<?php
session_start();

// Έλεγχος αυθεντικοποίησης χρήστη
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Εδώ μπορείς να προσθέσεις τυχόν κώδικα για ανάκτηση και εμφάνιση των αγγελιών του χρήστη από τη βάση δεδομένων
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Σύστημα Διαχείρισης Αγγελιών</title>
</head>
<body>
    <h1>Σύστημα Διαχείρισης Αγγελιών</h1>
    <h2>Καλώς ήρθατε, <?php echo $_SESSION['username']; ?>!</h2>

    <!-- Φόρμα για προσθήκη νέας αγγελίας -->
    <h3>Προσθήκη Νέας Αγγελίας</h3>
    <form action="add_listing.php" method="POST">
        <label for="area">Περιοχή:</label>
        <select name="area" id="area">
            <option value="Αθήνα">Αθήνα</option>
            <option value="Θεσσαλονίκη">Θεσσαλονίκη</option>
            <option value="Πάτρα">Πάτρα</option>
            <option value="Ηράκλειο">Ηράκλειο</option>
        </select><br>
        <label for="price">Τιμή (€):</label>
        <input type="number" id="price" name="price" min="50" max="5000000"><br>
        <label for="availability">Διαθεσιμότητα:</label>
        <select name="availability" id="availability">
            <option value="ενοικίαση">Ενοικίαση</option>
            <option value="πώληση">Πώληση</option>
        </select><br>
        <label for="area">Εμβαδόν (τ.μ.):</label>
        <input type="number" id="area" name="area" min="20" max="1000"><br>
        <button type="submit">Υποβολή</button>
    </form>

    <!-- Λίστα αγγελιών του χρήστη -->
    <h3>Οι Αγγελίες Σας</h3>
    <?php
    // Εδώ μπορείς να προσθέσεις κώδικα για την εμφάνιση των αγγελιών του χρήστη
    ?>

    <!-- Κουμπί αποσύνδεσης -->
    <a href="logout.php">Αποσύνδεση</a>
</body>
</html>
