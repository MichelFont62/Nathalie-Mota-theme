<?php get_header(); ?>

<div class="page-info">
<div id="photo-info" class="photo-info">
    <div class="photo-content">
        <!-- Zone de gauche -->
        <div class="photo-details">
            <h1><?php the_title(); ?></h1>
            <ul>
                <li>RÉFÉRENCE&nbsp;&nbsp; :&nbsp;&nbsp; <?php echo esc_html(get_post_meta(get_the_ID(), 'reference', true)); ?></li>
                <li>CATÉGORIE&nbsp;&nbsp; :&nbsp;&nbsp; <?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie', '', ', ', '')); ?></li>
                <li>FORMAT&nbsp;&nbsp; :&nbsp;&nbsp; <?php echo strip_tags(get_the_term_list(get_the_ID(), 'format', '', ', ', '')); ?></li>
                <li>TYPE&nbsp;&nbsp; :&nbsp;&nbsp; <?php echo esc_html(get_post_meta(get_the_ID(), 'type', true)); ?></li>
                <li>ANNÉE&nbsp;&nbsp; :&nbsp;&nbsp; <?php echo get_the_date(); ?></li>
            </ul>
        </div>

        <!-- Zone de droite -->
        <div class="photo-display">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', ['class' => 'photo-image']);
            }
            ?>
        </div>
    </div>

    <!-- Zone en dessous -->
    <div class="photo-actions">
        <div class="texte">
        <p>Cette photo vous intéresse ?</p>
        </div>
        <a href="#contact-modal" class="contact-button" data-photo-ref="<?php echo esc_attr(get_post_meta(get_the_ID(), 'reference', true)); ?>">Contact</a>
        <div class="navigation">
    <?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if ($prev_post) {
        $prev_thumb = get_the_post_thumbnail($prev_post->ID, 'thumbnail');
        echo '<a href="' . get_permalink($prev_post) . '" class="nav-prev" data-thumbnail="' . get_the_post_thumbnail_url($prev_post->ID, 'thumbnail') . '">
                <i class="fa-solid fa-arrow-left"></i>
              </a>';
    }

    if ($next_post) {
        $next_thumb = get_the_post_thumbnail($next_post->ID, 'thumbnail');
        echo '<a href="' . get_permalink($next_post) . '" class="nav-next" data-thumbnail="' . get_the_post_thumbnail_url($next_post->ID, 'thumbnail') . '">
                <i class="fa-solid fa-arrow-right"></i>
              </a>';
    }
    ?>
    <div class="thumbnail-preview"></div>
</div>


    </div>
</div>

<!-- Photos apparentées -->
<div id="related-photos" class="related-photos">
    <h2>VOUS AIMEREZ AUSSI</h2>
    <div class="related-photos-grid">
        <?php
        $current_id = get_the_ID();

        // Récupérer les catégories associées à la photo
        $categories = get_the_terms($current_id, 'categorie'); // Utilisez 'categorie' ici pour récupérer les termes de la taxonomie

        // Vérifier si des catégories existent
        if ($categories && !is_wp_error($categories)) :
            // Extraire les IDs des catégories
            $category_ids = wp_list_pluck($categories, 'term_id');

            // Query pour récupérer les articles de la même catégorie
            $related_query = new WP_Query([
                'post_type' => 'photos', // Assurez-vous que le type est 'photo'
                'posts_per_page' => 2, // Limite à 2 photos
                'post__not_in' => [$current_id], // Exclut l'article actuel
                'tax_query' => [
                    [
                        'taxonomy' => 'categorie', // Utilisez 'categorie' ici
                        'field'    => 'term_id',
                        'terms'    => $category_ids, // Utilisez les ID des catégories
                    ],
                ],
            ]);

            // Afficher les photos liées
            if ($related_query->have_posts()) :
                while ($related_query->have_posts()) : $related_query->the_post();
                    // Vérifiez si l'article a une image à la une
                    if (has_post_thumbnail()) :
                        the_post_thumbnail('large'); // Utilisez une taille d'image appropriée
                    else :
                        // Affichez une image par défaut si aucune image n'est définie
                        echo '<img src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="Image par défaut">';
                    endif;
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune photo liée trouvée.</p>';
            endif;
        else :
            echo '<p>Aucune catégorie associée à cette photo.</p>';
        endif;
        ?>
    </div>
</div>

    <!-- <div id="lightbox" class="lightbox">
    <span class="close-lightbox">&times;</span>
    <img class="lightbox-image" src="" alt="">
</div> -->
</div>
</div>
<?php get_footer(); ?>
