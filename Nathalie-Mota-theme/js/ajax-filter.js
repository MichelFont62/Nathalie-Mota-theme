jQuery(document).ready(function ($) {
    let page = 1;

    // Fonction pour charger les photos
    function loadPhotos() {
        const category = $('.custom-select#category-filter .select-trigger').data('value');
        const format = $('.custom-select#format-filter .select-trigger').data('value');
        const sort = $('.custom-select#sort-filter .select-trigger').data('value');

        $.ajax({
            url: ajaxurl, // 'ajaxurl' est une variable globale de WordPress
            method: 'GET',
            data: {
                action: 'load_photos', // Action personnalisée définie dans functions.php
                page: page,
                category: category,
                format: format,
                sort: sort
            },
            success: function (response) {
                if (response) {
                    $('#photo-list').append(response); // Ajouter les photos à la liste
                    page++; // Incrémenter la page pour la prochaine requête
                }
            },
            error: function (xhr, status, error) {
                console.error('Erreur lors du chargement des photos : ', error);
            }
        });
    }

    // Charger les photos au démarrage
    loadPhotos();

    // Gestion des clics sur les options des filtres personnalisés
    $('.custom-select .option').on('click', function () {
        const parent = $(this).closest('.custom-select');
        const trigger = parent.find('.select-trigger');

        // Mettre à jour le texte et la valeur du trigger
        trigger.text($(this).text());
        trigger.data('value', $(this).data('value'));

        // Réinitialiser la liste et recharger les photos
        $('#photo-list').empty(); // Vider la liste actuelle
        page = 1; // Réinitialiser la page
        loadPhotos(); // Recharger les photos avec les nouveaux filtres
    });

    // Charger plus de photos au clic
    $('#load-more').on('click', function () {
        loadPhotos(); // Charger les prochaines photos
    });
});
