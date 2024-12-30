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
    <div id="lightbox-overlay" class="lightbox-overlay">
    <div class="lightbox-container">
        <span id="lightbox-close" class="lightbox-close">&times;</span>
        <img id="lightbox-image" class="lightbox-image" src="" alt="">
        <div class="lightbox-info">
            <h2 id="lightbox-title" class="lightbox-title"></h2>
            <div class="lightbox-navigation">
                <button id="lightbox-prev" class="lightbox-nav-btn">Précédent</button>
                <button id="lightbox-next" class="lightbox-nav-btn">Suivant</button>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('templates_part/modale-contact'); ?>
<?php wp_footer(); ?> <!-- Indispensable pour charger les scripts du footer -->
</body>
</html>