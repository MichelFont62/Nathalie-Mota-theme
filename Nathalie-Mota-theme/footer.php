<?php wp_footer() ?>
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
<?php get_template_part('templates_part/modale-contact'); ?>
<?php wp_footer(); ?> <!-- Indispensable pour charger les scripts du footer -->
</body>
</html>