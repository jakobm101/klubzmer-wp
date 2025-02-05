<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); wp_title('|'); ?></title>
    <?php wp_head(); ?>
    <!-- CSS - broken into chunks for GPT -->
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/menu.css'); ?>"> <!-- Added here -->

</head>
<body <?php body_class(); ?>>
    <header>
        <div class="site-title">
            <h1>
                <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            </h1>
        </div>
        <nav>
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false,
                # <!-- Fake Menu -->
                'fallback_cb'    => function() {
                    echo '<ul class="fallback-menu">';
                    echo '<li><a href="' . home_url() . '">_Home</a></li>';
                    echo '<li><a href="' . home_url('/about/') . '">_About</a></li>';
                    echo '<li><a href="' . home_url('/contact/') . '">_Contact</a></li>';
                    echo '</ul>';
                }
            ]);
            ?>
        </nav>
    </header>