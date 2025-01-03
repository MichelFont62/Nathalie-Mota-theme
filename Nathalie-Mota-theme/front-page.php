<?php get_header() ?>
    <!-- Le hero header -->
    <div class="hero-header-container">
        <img class="hero-header" src="<?php echo get_template_directory_uri(); ?>/images/nathalie-2.jpeg" alt="hero header">
        <h1 class="titre-hero-header">PHOTOGRAPHE EVENT</h1>
    </div>
    
    <div class="catalogue-filters">

<!-- Filtre Catégorie -->
<div class="custom-select" id="category-filter">
    <div class="select-trigger" data-value="">Catégories</div>
    <ul class="select-options">
        <li class="option" data-value="">Catégories</li>
        <?php
        // Récupérer toutes les catégories de photos (taxonomie 'categorie')
        $categories = get_terms(array(
            'taxonomy' => 'categorie',
            'hide_empty' => false,
        ));
        foreach ($categories as $category) {
            echo '<li class="option" data-value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</li>';
        }
        ?>
    </ul>
</div>

<!-- Filtre Format -->
<div class="custom-select" id="format-filter">
    <div class="select-trigger" data-value="">Formats</div>
    <ul class="select-options">
        <li class="option" data-value="">Formats</li>
        <?php
        // Récupérer tous les formats de photos (taxonomie 'format')
        $formats = get_terms(array(
            'taxonomy' => 'format',
            'hide_empty' => false,
        ));
        foreach ($formats as $format) {
            echo '<li class="option" data-value="' . esc_attr($format->term_id) . '">' . esc_html($format->name) . '</li>';
        }
        ?>
    </ul>
</div>

<!-- Filtre de tri -->
<div class="custom-select" id="sort-filter">
    <div class="select-trigger" data-value="">Trier par</div>
    <ul class="select-options">
        <li class="option" data-value="date_desc">Date (Récentes)</li>
        <li class="option" data-value="date_asc">Date (Anciennes)</li>
    </ul>
</div>

</div>

    
<!-- Liste des photos -->
<div id="photo-list" class="photo-list">
<?php
$args = array(
    'post_type' => 'photos', // Type de contenu personnalisé
    'posts_per_page' => 8,   // Nombre de photos à afficher
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('templates_part/photo-item'); // Inclut le fichier template
    endwhile;
    wp_reset_postdata();
else :
    echo '<p>Aucune photo trouvée.</p>';
endif;
?>

    <!-- Les photos seront chargées ici dynamiquement -->
</div>

<!-- Bouton Charger plus -->
<div class="charger-plus">
    <button id="load-more" class="load-more">Charger plus</button>
</div>

<?php get_footer() ?>