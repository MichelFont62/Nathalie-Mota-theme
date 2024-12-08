<?php get_header(); ?>

<div id="content" class="site-content">
    <main id="main" class="main-content">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            echo '<p>Aucune page trouvée.</p>';
        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>
