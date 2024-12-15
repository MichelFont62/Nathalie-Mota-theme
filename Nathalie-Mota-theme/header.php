<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
</head>

<header>
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Logo.png" alt="Logo">
            </a>
        </div>

        <!-- Menu de navigation -->
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'menu' => 'primary',
                'theme_location' => 'primary',  // L'emplacement enregistré pour le menu
                'container' => 'ul',             // Utilisez une balise <ul> comme conteneur
                'menu_class' => 'menu-list',     // Classe CSS pour le <ul>
                'fallback_cb' => false,          // Pas de menu par défaut si aucun menu assigné
            ));
            ?>
        </nav>
    </div>
</header>
