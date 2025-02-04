<?php
/*
Template Name: Klubzmer One-Pager
*/
get_header();
?>

<div class="container">
    <header>
        <h1><?php bloginfo('name'); ?></h1>
        <p>🎵 Handmade Guerilla Klezmer from Hamburg</p>
        <a href="https://www.facebook.com/hamburgerklubzmer/" target="_blank">🌍 Follow us on Facebook</a>
    </header>

    <!-- Gigs Section -->
    <section class="gigs">
        <h2>🎶 Upcoming Gigs</h2>
        <ul>
            <?php echo get_option('klubzmer_gigs'); ?>
        </ul>
        <p>📩 Book us: <a href="mailto:info@klubzmer.de">info@klubzmer.de</a></p>
    </section>

    <!-- About Section (Pulled from WP Page Content) -->
    <section class="about">
        <h2>🧑‍🎤 About Klubzmer</h2>
        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
    </section>

    <!-- Past Shows (Pulled from Custom Post Type) -->
    <section class="past-gigs">
        <h2>🎭 Past Gigs</h2>
        <ul>
            <?php
            $args = array('post_type' => 'past_gigs', 'posts_per_page' => 5);
            $past_gigs = new WP_Query($args);
            while ($past_gigs->have_posts()) : $past_gigs->the_post();
                echo '<li>' . get_the_title() . ' - ' . get_the_content() . '</li>';
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
        <a href="/past-gigs">See all past gigs</a>
    </section>

    <!-- Media Section -->
    <section class="media">
        <h2>📺 Video & Audio</h2>
        <div><?php echo get_option('klubzmer_media'); ?></div>
    </section>

    <!-- Contact Section -->
    <section class="contact">
        <h2>📩 Contact</h2>
        <p>📬 Want us to play at your event? Email: <a href="mailto:info@klubzmer.de">info@klubzmer.de</a></p>
    </section>
</div>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Klubzmer | Handmade Guerilla Klezmer</p>
</footer>

<?php get_footer(); ?>
