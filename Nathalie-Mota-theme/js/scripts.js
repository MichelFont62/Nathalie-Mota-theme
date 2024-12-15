document.addEventListener("DOMContentLoaded", function () {
    // Sélectionner la modale et les éléments nécessaires
    const modal = document.getElementById("contact-modal");
    const closeModalButton = modal.querySelector(".close-button");

    // Vérifie si la modale existe
    if (!modal) {
        console.error("Modale introuvable : vérifiez votre HTML.");
        return;
    }

    // Fonction pour ouvrir la modale
    function openModal() {
        modal.classList.add("is-visible");
    }

    // Fonction pour fermer la modale
    function closeModal() {
        modal.classList.remove("is-visible");
    }

    // Gérer le clic sur le lien "Contact" du menu
    document.querySelectorAll('a[href="#contact-modal"]').forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien
            openModal();
        });
    });

    // Gérer la fermeture de la modale via le bouton de fermeture
    closeModalButton.addEventListener("click", closeModal);

    // Fermer la modale si l'utilisateur clique à l'extérieur de son contenu
    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});
