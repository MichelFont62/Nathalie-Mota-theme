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

function enqueue_ajax_filter_script() {
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/js/ajax-filter.js');
    wp_localize_script('ajax-filter', 'ajaxurl', admin_url('admin-ajax.php'));  // Pour faire fonctionner l'Ajax
}

add_action('wp_enqueue_scripts', 'enqueue_ajax_filter_script');



// Enregistrer le menu principal
function register_my_menus() {
    register_nav_menus(
        array(
            'primary' => "Menu principal"
        )
    );
}
add_action('init', 'register_my_menus');

// Enregistrer l'action Ajax pour charger les photos
function load_photos_ajax() {
    // Récupérer les paramètres de la requête
    $page = isset($_GET['page']) ? absint($_GET['page']) : 1;
    $category = isset($_GET['category']) ? absint($_GET['category']) : '';
    $format = isset($_GET['format']) ? absint($_GET['format']) : '';
    $sort = isset($_GET['sort']) ? sanitize_text_field($_GET['sort']) : 'date_desc';

    // Argument de la requête WP_Query
    $args = array(
        'post_type' => 'photos',  // Le type de contenu personnalisé
        'posts_per_page' => 8,    // Nombre de photos à afficher
        'paged' => $page,         // Pagination
    );

    // Filtre par catégorie
    if ($category) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categorie',
                'field' => 'term_id',
                'terms' => $category,
                'operator' => 'IN',
            )
        );
    }

    // Filtre par format
    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'term_id',
            'terms' => $format,
            'operator' => 'IN',
        );
    }

    // Tri par date
    if ($sort == 'date_asc') {
        $args['orderby'] = 'date';
        $args['order'] = 'ASC';
    } else {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }

    // Effectuer la requête
    $query = new WP_Query($args);

    // Vérifier si des posts sont trouvés
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('templates_part/photo-item');  // Charger le template photo-item pour chaque photo
        endwhile;
        wp_reset_postdata();  // Réinitialiser les données de la requête
    else :
        echo '<p>Aucune photo trouvée.</p>';  // Si aucune photo n'est trouvée
    endif;

    wp_die();  // Terminer l'exécution de l'Ajax
}

add_action('wp_ajax_load_photos', 'load_photos_ajax');  // Pour les utilisateurs connectés
add_action('wp_ajax_nopriv_load_photos', 'load_photos_ajax');  // Pour les utilisateurs non connectés

//////////////////////////////
//lightbox

function enqueue_lightbox_assets() {
    // Charger le fichier JavaScript
    wp_enqueue_script('lightbox-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_lightbox_assets');
