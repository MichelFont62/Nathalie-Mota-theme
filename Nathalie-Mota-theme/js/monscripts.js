console.log('Le fichier scripts.js est chargé!');

document.addEventListener("DOMContentLoaded", function () {
    console.log("Script chargé et DOM prêt !");
    // Sélectionner la modale et les éléments nécessaires
    const modal = document.getElementById("contact-modal"); // Pas de #
    if (!modal) {
        console.error("Modale introuvable : vérifiez votre HTML.");
        return;
    }

    const closeModalButton = modal.querySelector(".close-button");

    // Vérifiez si le bouton de fermeture existe
    if (!closeModalButton) {
        console.error("Bouton de fermeture introuvable dans la modale.");
        return;
    }

    // Fonction pour ouvrir la modale
    function openModal() {
        console.log("Ouverture de la modale");
        modal.classList.add("is-visible");
    }

    // Fonction pour fermer la modale
    function closeModal() {
        console.log("Fermeture de la modale");
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

//////////////////////////////////////////////////////
                //menu burger

document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.getElementById('burger-menu');
    const mainNavigation = document.getElementById('main-navigation');
    
    // Vérifiez si burgerMenu et mainNavigation existent avant d'ajouter l'écouteur d'événement
    if (burgerMenu && mainNavigation) {
        burgerMenu.addEventListener('click', function() {
            mainNavigation.classList.toggle('open');
        });
    }

// contact responsive

    // Cibler le dernier lien du menu (le lien Contact)
    const lastMenuItem = document.querySelector('.menu-list li:last-child a');
    
    // Vérifiez si lastMenuItem existe avant d'ajouter l'écouteur d'événement
    if (lastMenuItem) {
        lastMenuItem.addEventListener('click', function() {
            // Fermer le menu burger lorsqu'on clique sur le lien Contact
            mainNavigation.classList.remove('open');
        });
    }
});
