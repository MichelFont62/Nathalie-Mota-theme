<?php get_header(); ?>

<div id="content" class="site-content">
    <main id="main" class="main-content">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <!-- Titre de l'article -->
                    <h1 class="entry-title"><?php the_title(); ?></h1>

                    <!-- Image mise en avant -->
                    <?php
                    if (has_post_thumbnail()) {
                        ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large'); // Taille de l'image (modifiez si nécessaire) ?>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Contenu de l'article -->
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            echo '<p>Aucun contenu disponible.</p>';
        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>
