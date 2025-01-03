console.log('Le fichier scripts.js est chargé!');

document.addEventListener("DOMContentLoaded", function () {
    console.log("Script chargé et DOM prêt !");
    
    // Sélectionner la modale et les éléments nécessaires
    const modal = document.getElementById("contact-modal");
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
    function openModal(photoRef = "") {
        console.log("Ouverture de la modale avec la Réf. Photo : " + photoRef);
        modal.classList.add("is-visible");

        // Remplir le champ "RÉF. PHOTO" avec la référence fournie (ou vider si aucune référence)
        const photoRefField = document.getElementById("photo-ref");
        if (photoRefField) {
            photoRefField.value = photoRef; // Remplir ou vider le champ
        } else {
            console.error("Champ RÉF. PHOTO introuvable.");
        }
    }

    // Fonction pour fermer la modale
    function closeModal() {
        console.log("Fermeture de la modale");
        modal.classList.remove("is-visible");
    }

    // Gérer le clic sur le lien "Contact"
    document.querySelectorAll('a[href="#contact-modal"]').forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            // Obtenir la référence de la photo depuis l'attribut "data-photo-ref"
            const photoRef = this.getAttribute("data-photo-ref") || ""; // Par défaut, vide
            openModal(photoRef); // Ouvrir la modale avec la référence de la photo (ou sans)
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

/////////////////////////////////////////////////////////////////
                //flèche de navigation
                document.addEventListener("DOMContentLoaded", function () {
                    // Sélectionnez les liens de navigation
                    const navigationLinks = document.querySelectorAll(".navigation a");
                    const thumbnailPreview = document.querySelector(".thumbnail-preview");
                
                    navigationLinks.forEach((link) => {
                        link.addEventListener("mouseover", function () {
                            const thumbnailUrl = this.getAttribute("data-thumbnail");
                            if (thumbnailUrl) {
                                thumbnailPreview.style.backgroundImage = `url(${thumbnailUrl})`;
                                thumbnailPreview.style.opacity = "1";
                                thumbnailPreview.style.transform = "translateX(-50%) translateY(-10px)";
                            }
                        });
                
                        link.addEventListener("mouseout", function () {
                            thumbnailPreview.style.opacity = "0";
                            thumbnailPreview.style.transform = "translateX(-50%) translateY(0)";
                        });
                    });
                });
///////////////////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', () => {
    // Trouver toutes les listes déroulantes personnalisées
    const customSelects = document.querySelectorAll('.custom-select');

    customSelects.forEach(select => {
        const trigger = select.querySelector('.select-trigger');
        const options = select.querySelector('.select-options');
        const optionItems = select.querySelectorAll('.option');

        // Afficher/Masquer les options quand on clique sur le trigger
        trigger.addEventListener('click', () => {
            const isOpen = options.style.display === 'block';

            // Ferme les autres listes si nécessaire
            document.querySelectorAll('.select-options').forEach(opt => opt.style.display = 'none');
            // Affiche ou masque la liste en fonction de l'état actuel
            options.style.display = isOpen ? 'none' : 'block';

            // Basculer la classe 'open' pour gérer l'animation de la flèche
            select.classList.toggle('open', !isOpen);
        });

        // Gérer le clic sur une option
        optionItems.forEach(option => {
            option.addEventListener('click', () => {
                // Supprimer la classe active des autres options
                optionItems.forEach(opt => opt.classList.remove('active'));
                // Ajouter la classe active à l'option cliquée
                option.classList.add('active');
                // Mettre à jour le texte du trigger
                trigger.textContent = option.textContent;
                // Masquer les options
                options.style.display = 'none';
                // Ferme la liste déroulante après sélection
                select.classList.remove('open'); // Assure que la flèche revient vers le bas
            });
        });
    });

    // Fermer la liste si on clique en dehors
    document.addEventListener('click', e => {
        customSelects.forEach(select => {
            if (!select.contains(e.target)) {
                const options = select.querySelector('.select-options');
                options.style.display = 'none';
                select.classList.remove('open'); // Revenir à l'état fermé
            }
        });
    });
});
