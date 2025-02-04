<?php get_header(); ?>

<main>
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
        <?php
            endwhile;
        else :
        ?>
            <p><?php _e('Sorry, no posts matched your criteria.', 'jaki3000'); ?></p>
        <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>