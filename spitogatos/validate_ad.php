<?php
function validateAd($location, $price, $availability, $area) {
    $errors = [];

    // Έλεγχος περιοχής
    $valid_locations = array('Αθήνα', 'Θεσσαλονίκη', 'Πάτρα', 'Ηράκλειο');
    if (!in_array($location, $valid_locations)) {
        $errors[] = "Μη έγκυρη περιοχή.";
    }

    // Έλεγχος τιμής
    if ($price < 50 || $price > 5000000 || !is_numeric($price)) {
        $errors[] = "Μη έγκυρη τιμή.";
    }

    // Έλεγχος διαθεσιμότητας
    $valid_availabilities = array('ενοικίαση', 'πώληση');
    if (!in_array($availability, $valid_availabilities)) {
        $errors[] = "Μη έγκυρη διαθεσιμότητα.";
    }

    // Έλεγχος εμβαδού
    if ($area < 20 || $area > 1000 || !is_numeric($area)) {
        $errors[] = "Μη έγκυρο εμβαδόν.";
    }

    return $errors;
}

// Έλεγχος ότι υποβλήθηκε της φόρμας
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    $area = $_POST['area'];

    // Εκτέλεση ελέγχου
    $validation_errors = validateAd($location, $price, $availability, $area);

    // Εκτύπωση τυχόν σφαλμάτων
    if (!empty($validation_errors)) {
        foreach ($validation_errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        echo "Τα δεδομένα είναι έγκυρα και μπορούν να αποθηκευτούν.";
        // Εδώ θα πρέπει να προχωρήσετε στην αποθήκευση της αγγελίας στη βάση δεδομένων
    }
}

