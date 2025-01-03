<div class="photo-item" 
     data-reference="<?php echo esc_attr(get_post_meta(get_the_ID(), 'reference', true)); ?>" 
     data-category="<?php echo esc_attr(strip_tags(get_the_term_list(get_the_ID(), 'categorie', '', ', ', ''))); ?>">
    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
    <div class="overlay">
        <!-- Lien pour la page d'information de la photo -->
        <a href="<?php the_permalink(); ?>" class="icon">
            <i class="fa-regular fa-eye"></i>
        </a>

        <!-- Icône de plein écran avec la lightbox -->
        <span class="icon lightbox-trigger" 
              data-image="<?php the_post_thumbnail_url('full'); ?>" 
              data-title="<?php the_title(); ?>">
            <i class="fa-solid fa-expand"></i>
        </span>
    </div>
</div>
