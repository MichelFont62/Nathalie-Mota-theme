<?php get_header(); ?>

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
        <a href="#contact-modal" class="contact-button" data-photo-ref="<?php echo esc_attr(get_post_meta(get_the_ID(), 'référence', true)); ?>">Contact</a>
        <div class="navigation">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();

            if ($prev_post) {
                $prev_thumb = get_the_post_thumbnail($prev_post->ID, 'thumbnail');
                echo '<a href="' . get_permalink($prev_post) . '" class="nav-prev" data-tooltip="' . esc_attr($prev_post->post_title) . '">' . $prev_thumb . '</a>';
            }

            if ($next_post) {
                $next_thumb = get_the_post_thumbnail($next_post->ID, 'thumbnail');
                echo '<a href="' . get_permalink($next_post) . '" class="nav-next" data-tooltip="' . esc_attr($next_post->post_title) . '">' . $next_thumb . '</a>';
            }
            ?>
        </div>
    </div>
</div>

<!-- Photos apparentées -->
<div id="related-photos" class="related-photos">
    <h2>Photos apparentées</h2>
    <div class="related-photos-grid">
        <?php
        $current_id = get_the_ID();
        $categories = wp_get_post_terms($current_id, 'catégorie', ['fields' => 'ids']);

        $related_query = new WP_Query([
            'post_type' => 'photo',
            'posts_per_page' => 2,
            'post__not_in' => [$current_id],
            'tax_query' => [
                [
                    'taxonomy' => 'catégorie',
                    'field' => 'term_id',
                    'terms' => $categories,
                ],
            ],
        ]);

        if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
                get_template_part('template-parts/photo-block'); // Bloc photo réutilisable
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <div id="lightbox" class="lightbox">
    <span class="close-lightbox">&times;</span>
    <img class="lightbox-image" src="" alt="">
</div>
</div>

<?php get_footer(); ?>
