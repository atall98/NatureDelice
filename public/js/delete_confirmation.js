document.addEventListener('DOMContentLoaded', function() {
    let deleteForms = document.querySelectorAll('form[id^="deleteForm"]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche la soumission par défaut du formulaire

            if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
                // Soumet le formulaire si la confirmation est acceptée
                this.submit();
            }
        });
    });
});
