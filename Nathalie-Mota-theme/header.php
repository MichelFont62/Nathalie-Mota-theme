<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <?php wp_head(); ?> <!-- Indispensable pour charger les scripts et styles de WordPress -->
</head>

<body>
<header>
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Logo.png" alt="Logo">
            </a>
        </div>

    <!-- Bouton Burger (visible sur les petits écrans) -->
    <div class="burger-menu" id="burger-menu">
        <div class="burger-line"></div>
        <div class="burger-line"></div>
        <div class="burger-line"></div>
    </div>

        <!-- Menu de navigation -->
        <nav id="main-navigation" class="main-navigation">
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
