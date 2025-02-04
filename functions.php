<?php
// Add Klubzmer Settings Page
function klubzmer_settings_page() {
    add_menu_page(
        'Klubzmer Settings', 'Klubzmer Settings', 'manage_options',
        'klubzmer-settings', 'klubzmer_admin_page', 'dashicons-calendar', 20
    );
}
add_action('admin_menu', 'klubzmer_settings_page');

// Display the Klubzmer Settings Page
function klubzmer_admin_page() {
?>
    <div class="wrap">
        <h1>Klubzmer Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('klubzmer_group');
            do_settings_sections('klubzmer-settings');
            submit_button();
            ?>
        </form>
    </div>
<?php }

// Register Settings
function klubzmer_register_settings() {
    register_setting('klubzmer_group', 'klubzmer_gigs');
    register_setting('klubzmer_group', 'klubzmer_media');

    add_settings_section('klubzmer_section', '', null, 'klubzmer-settings');

    add_settings_field('klubzmer_gigs_field', 'Upcoming Gigs:', 'klubzmer_gigs_callback', 'klubzmer-settings', 'klubzmer_section');
    add_settings_field('klubzmer_media_field', 'Media Embed Code:', 'klubzmer_media_callback', 'klubzmer-settings', 'klubzmer_section');
}
add_action('admin_init', 'klubzmer_register_settings');

// Input Fields
function klubzmer_gigs_callback() {
    $gigs = get_option('klubzmer_gigs', '');
    echo '<textarea name="klubzmer_gigs" rows="5" cols="50" class="large-text">' . esc_textarea($gigs) . '</textarea>';
}

function klubzmer_media_callback() {
    $media = get_option('klubzmer_media', '');
    echo '<textarea name="klubzmer_media" rows="5" cols="50" class="large-text">' . esc_textarea($media) . '</textarea>';
}

function klubzmer_past_gigs() {
    $args = array(
        'labels'      => array(
            'name' => 'Past Gigs',
            'singular_name' => 'Past Gig'
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor'),
    );
    register_post_type('past_gigs', $args);
}
add_action('init', 'klubzmer_past_gigs');

