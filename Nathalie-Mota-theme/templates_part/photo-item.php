<div class="photo-item">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                <div class="overlay">
                    <!-- Lien pour la page d'information de la photo -->
                    <a href="<?php the_permalink(); ?>" class="icon">
                        <i class="fa-regular fa-eye"></i>
                    </a>
    
                    <!-- Icône de plein écran avec la lightbox -->
                    <span class="icon lightbox-trigger" data-image="<?php the_post_thumbnail_url('full'); ?>" data-title="<?php the_title(); ?>">
                        <i class="fa-solid fa-expand"></i>
                    </span>
                </div>
            </div>