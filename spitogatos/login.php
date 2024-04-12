<?php
session_start();

// Σύνδεση στη βάση δεδομένων
include 'database.php';

// Ελέγχουμε αν έχουν υποβληθεί δεδομένα στη φόρμα
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username_login'];
    $password = $_POST['password_login'];

    // Εκτέλεση ερωτήματος SQL για επαλήθευση στη βάση δεδομένων
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);

    $username = $_POST['username_login'];
    $password = $_POST['password_login'];

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
    // Επιτυχής σύνδεση
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit;
    }   else {
        $error = "Λάθος στοιχεία.";
    }

    $stmt->close();
    $conn->close();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Επιτυχής σύνδεση
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Λάθος στοιχεία.";
    }
}

// Κλείσιμο σύνδεσης με τη βάση δεδομένων
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Φόρμα Σύνδεσης</h2>
    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username_login">Όνομα Χρήστη:</label><br>
        <input type="text" id="username_login" name="username_login"><br>
        <label for="password_login">Κωδικός:</label><br>
        <input type="password" id="password_login" name="password_login"><br><br>
        <input type="submit" value="Σύνδεση">
    </form>
</body>
</html>
