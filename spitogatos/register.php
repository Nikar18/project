<?php
// Λήψη των δεδομένων από τη φόρμα
$username = $_POST['username'];
$password = $_POST['password'];

// Κάνε κάποια επεξεργασία των δεδομένων αν χρειάζεται

// Αποθήκευση των δεδομένων σε ένα αρχείο κειμένου ή σε μια βάση δεδομένων
$file = fopen("users.txt", "a");
fwrite($file, "Username: " . $username . ", Password: " . $password . "\n");
fclose($file);

// Επιστροφή κάποιου μηνύματος στον χρήστη για να επιβεβαιώσει την εγγραφή
echo "Επιτυχής εγγραφή!";

