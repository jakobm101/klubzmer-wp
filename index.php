<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <?php get_header(); ?>
    <main>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail('medium'); ?>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; endif; ?>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>
