document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("addListingForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Ακύρωση της συμπεριφοράς προεπιλογής της φόρμας

        // Παίρνουμε τα δεδομένα από τη φόρμα
        var formData = new FormData(this);

        // Κάνουμε την AJAX κλήση
        fetch('add_listing.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message); // Εμφάνιση μηνύματος επιτυχίας
                // Κάποια ενέργεια για ανανέωση της λίστας αγγελιών ή άλλο
            } else {
                alert(data.message); // Εμφάνιση μηνύματος σφάλματος
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
