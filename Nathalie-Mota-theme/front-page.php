<?php get_header() ?>
    <!-- Le hero header -->
    <div class="hero-header-container">
        <img class="hero-header" src="<?php echo get_template_directory_uri(); ?>/images/nathalie-2.jpeg" alt="hero header">
        <h1 class="titre-hero-header">PHOTOGRAPHE EVENT</h1>
    </div>
    
    <div class="catalogue-filters">
    <!-- Filtre Catégorie -->
    <select id="category-filter">
        <option value="">Catégories</option>
        <?php
        // Récupérer toutes les catégories de photos (taxonomie 'categorie')
        $categories = get_terms(array(
            'taxonomy' => 'categorie',
            'hide_empty' => false,
        ));
        foreach ($categories as $category) {
            echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
        }
        ?>
    </select>

    <!-- Filtre Format -->
    <select id="format-filter">
        <option value="">Formats</option>
        <?php
        // Récupérer tous les formats de photos (taxonomie 'format')
        $formats = get_terms(array(
            'taxonomy' => 'format',
            'hide_empty' => false,
        ));
        foreach ($formats as $format) {
            echo '<option value="' . esc_attr($format->term_id) . '">' . esc_html($format->name) . '</option>';
        }
        ?>
    </select>

    <!-- Filtre de tri -->
    <select id="sort-filter">
        <option value="date_desc">Trier par date (Récentes)</option>
        <option value="date_asc">Trier par date (Anciennes)</option>
    </select>
</div>

<!-- Liste des photos -->
<div id="photo-list" class="photo-list">
    <!-- Les photos seront chargées ici dynamiquement -->
</div>

<!-- Bouton Charger plus -->
<button id="load-more" class="load-more">Charger plus</button>


<?php get_footer() ?>