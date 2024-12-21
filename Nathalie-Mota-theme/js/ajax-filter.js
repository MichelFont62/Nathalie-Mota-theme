jQuery(document).ready(function($) {
    let page = 1;

    // Fonction pour charger les photos
    function loadPhotos() {
        const category = $('#category-filter').val();
        const format = $('#format-filter').val();
        const sort = $('#sort-filter').val();

        $.ajax({
            url: ajaxurl,  // 'ajaxurl' est une variable globale de WordPress
            method: 'GET',
            data: {
                action: 'load_photos',  // Action personnalisée définie dans functions.php
                page: page,
                category: category,
                format: format,
                sort: sort
            },
            success: function(response) {
                if (response) {
                    $('#photo-list').append(response);  // Ajouter les photos à la liste
                    page++;  // Incrémenter la page pour la prochaine requête
                }
            }
        });
    }

    // Charger les photos au démarrage
    loadPhotos();

    // Gestion des filtres
    $('#category-filter, #format-filter, #sort-filter').on('change', function() {
        $('#photo-list').empty();  // Vider la liste actuelle
        page = 1;  // Réinitialiser la page
        loadPhotos();  // Recharger les photos avec les nouveaux filtres
    });

    // Charger plus de photos au clic
    $('#load-more').on('click', function() {
        loadPhotos();  // Charger les prochaines photos
    });
});
