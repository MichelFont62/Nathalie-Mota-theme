        <!-- Menu du footer -->
    <nav class="footer-navigation">
        <?php
        wp_nav_menu(array(
            'menu' => 'footer', // Indique le menu "footer"
            'theme_location' => 'footer', // L'emplacement enregistré dans functions.php
            'container' => 'ul', // Le conteneur utilisé pour le menu
            'menu_class' => 'footer-menu-list', // Classe CSS pour le <ul>
            'fallback_cb' => false, // Pas de menu par défaut
        ));
        ?>
    </nav>
<!-- lightbox -->
<div id="lightbox" class="lightbox">
    <div class="lightbox-content">
        <div class="lightbox-navigation">
            <button class="prev-photo">
                <span class="arrow">&#8592;</span> <!-- Flèche gauche -->
                <span>Précédent</span>
            </button>
            <button class="next-photo">
                <span>Suivante</span>
                <span class="arrow">&#8594;</span> <!-- Flèche droite -->
            </button>
        </div>
        <img id="lightbox-image" src="" alt="">
        <div class="lightbox-info">
            <span id="lightbox-title" class="lightbox-title"></span>
            <span id="lightbox-category" class="lightbox-category"></span>
        </div>
    </div>
</div>

<?php get_template_part('templates_part/modale-contact'); ?>
<?php wp_footer(); ?> <!-- Indispensable pour charger les scripts du footer -->
</body>
</html>