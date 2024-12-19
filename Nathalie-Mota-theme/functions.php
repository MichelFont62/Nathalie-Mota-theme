<?php
function nathalie_mota_enqueue_styles() {

    wp_enqueue_style('nathalie-mota-style', get_template_directory_uri() . '/style.css');

}

add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_styles');
function nathalie_mota_enqueue_scripts() {

    wp_register_script( 'scripts',get_template_directory_uri().'/js/monscripts.js');
    wp_enqueue_script( 'scripts'); 
}

add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_scripts');

// Enregistrer le menu principal
function register_my_menus() {
    register_nav_menus(
        array(
            'primary' => "Menu principal"
        )
    );
}
add_action('init', 'register_my_menus');

