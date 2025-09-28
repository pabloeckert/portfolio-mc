<?php
function photonic_mc_admin_menu() {
    add_options_page('Photonic-MC', 'Photonic-MC', 'manage_options', 'photonic-mc', 'photonic_mc_options_page');
}
add_action('admin_menu', 'photonic_mc_admin_menu');

function photonic_mc_options_page() {
    ?>
    <div class="wrap">
        <h1>Configuración de Photonic-MC</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('photonic_mc_settings');
            do_settings_sections('photonic-mc');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function photonic_mc_settings_init() {
    register_setting('photonic_mc_settings', 'photonic_mc_settings');

    add_settings_section('photonic_mc_lightbox', 'Lightbox', null, 'photonic-mc');

    add_settings_field('lightbox_choice', 'Elegí el lightbox', 'photonic_mc_lightbox_field', 'photonic-mc', 'photonic_mc_lightbox');
}
add_action('admin_init', 'photonic_mc_settings_init');

function photonic_mc_lightbox_field() {
    $options = get_option('photonic_mc_settings');
    $selected = $options['lightbox_choice'] ?? 'photoswipe5';
    ?>
    <select name="photonic_mc_settings[lightbox_choice]">
        <option value="photoswipe5" <?php selected($selected, 'photoswipe5'); ?>>PhotoSwipe v5</option>
        <option value="lightgallery3" <?php selected($selected, 'lightgallery3'); ?>>LightGallery 3</option>
    </select>
    <?php
}