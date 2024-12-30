jQuery(document).ready(function ($) {
    // Quand on clique sur l'icône "plein écran"
    jQuery(document).on('click', '.lightbox-trigger', function () {
        // Récupérer l'URL de l'image et le titre depuis les attributs data
        const imageUrl = $(this).data('image');
        const imageTitle = $(this).data('title');

        // Créer la lightbox si elle n'existe pas déjà
        if ($('#lightbox').length === 0) {
            $('body').append(`
                <div id="lightbox" class="lightbox-overlay">
                    <div class="lightbox-content">
                        <span class="lightbox-close">&times;</span>
                        <img src="" alt="">
                        <div class="lightbox-title"></div>
                    </div>
                </div>
            `);
        }

        // Ajouter l'image et le titre dans la lightbox
        $('#lightbox img').attr('src', imageUrl);
        $('#lightbox .lightbox-title').text(imageTitle);

        // Afficher la lightbox
        $('#lightbox').fadeIn();
    });

    // Fermer la lightbox quand on clique sur le bouton ou en dehors
    $(document).on('click', '#lightbox, .lightbox-close', function () {
        $('#lightbox').fadeOut(function () {
            $(this).remove(); // Supprime la lightbox après fermeture
        });
    });

    // Empêcher la fermeture en cliquant sur le contenu de la lightbox
    $(document).on('click', '.lightbox-content', function (e) {
        e.stopPropagation();
    });
});
