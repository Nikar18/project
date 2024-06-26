<?php
// Εδώ θα πρέπει να υλοποιηθεί η λογική για τη φόρτωση και την εμφάνιση των αγγελιών του χρήστη
// Ένα παράδειγμα φόρτωσης των αγγελιών από μια βάση δεδομένων ή άλλη πηγή δεδομένων θα μπορούσε να είναι:
$userId = $_SESSION['userId']; // Υποθέτοντας ότι υπάρχει μια μεταβλητή sessionId που αντιστοιχεί στον τρέχοντα χρήστη
// Εδώ θα πρέπει να γίνει σύνδεση με τη βάση δεδομένων και επιλογή των αγγελιών του συγκεκριμένου χρήστη
// Έπειτα, θα πρέπει να εμφανιστούν οι αγγελίες στη σελίδα HTML με τον κατάλληλο κώδικα PHP
?>

<!-- Παράδειγμα εμφάνισης των αγγελιών του χρήστη -->
<div class="ads">
    <?php foreach ($userAds as $ad) : ?>
        <div class="ad">
            <h3><?php echo $ad['title']; ?></h3>
            <p><?php echo $ad['description']; ?></p>
            <!-- Προαιρετικά άλλα χαρακτηριστικά της αγγελίας μπορούν να εμφανιστούν εδώ -->
            <form action="delete_ad.php" method="post">
                <input type="hidden" name="ad_id" value="<?php echo $ad['id']; ?>">
                <button type="submit">Αφαίρεση</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
