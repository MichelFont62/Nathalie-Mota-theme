<?php
function nathalie_mota_enqueue_styles() {
    // Charger le fichier CSS principal du thème
    wp_enqueue_style('nathalie-mota-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_script('nathalie-mota-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true); // Charge le script dans le footer
}

add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_styles');

// Enregistrer le menu principal
function register_my_menus() {
    register_nav_menus(
        array(
            'primary' => "Menu principal"
        )
    );
}
add_action('init', 'register_my_menus');

