document.addEventListener('DOMContentLoaded', function () {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCategory = document.getElementById('lightbox-category');
    const closeBtn = document.querySelector('.lightbox-close');
    const prevBtn = document.querySelector('.prev-photo');
    const nextBtn = document.querySelector('.next-photo');
    const photoItems = document.querySelectorAll('.photo-item');
    let currentIndex = 0;

    // Open lightbox
    document.querySelectorAll('.lightbox-trigger').forEach((trigger, index) => {
        trigger.addEventListener('click', function () {
            currentIndex = index;

            // Récupération des données pour la photo actuelle
            const photoItem = this.closest('.photo-item');
            const imageSrc = this.getAttribute('data-image');
            const imageTitle = photoItem.getAttribute('data-reference'); // Référence
            const imageCategory = photoItem.getAttribute('data-category'); // Catégorie

            // Mise à jour des éléments de la lightbox
            lightboxImage.src = imageSrc;
            lightboxTitle.textContent = `Référence : ${imageTitle}`;
            lightboxCategory.textContent = `Catégorie : ${imageCategory}`;
            lightbox.style.display = 'flex';
        });
    });

    // Close lightbox when clicking on the background (gray area)
    lightbox.addEventListener('click', function (e) {
        // Si le clic vient de la lightbox elle-même (pas des éléments internes)
        if (e.target === lightbox) {
            lightbox.style.display = 'none';
        }
    });

    // Navigate to previous photo
    prevBtn.addEventListener('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = photoItems.length - 1; // Boucle vers la dernière photo
        }
        updateLightbox();
    });

    // Navigate to next photo
    nextBtn.addEventListener('click', function () {
        if (currentIndex < photoItems.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; // Boucle vers la première photo
        }
        updateLightbox();
    });

    // Update lightbox content
    function updateLightbox() {
        const photoItem = photoItems[currentIndex];
        const imageSrc = photoItem.querySelector('.lightbox-trigger').getAttribute('data-image');
        const imageTitle = photoItem.getAttribute('data-reference'); // Référence
        const imageCategory = photoItem.getAttribute('data-category'); // Catégorie

        // Mise à jour des éléments de la lightbox
        lightboxImage.src = imageSrc;
        lightboxTitle.textContent = `Référence : ${imageTitle}`;
        lightboxCategory.textContent = `Catégorie : ${imageCategory}`;
    }
});
