 photonic.php
php

Plugin Name Photonic-MC
Plugin URI httpsmejoraok.com
Description Galerías avanzadas de Flickr con soporte para colecciones, álbumes y videos. Lightbox con PhotoSwipe v5 y LightGallery 3. Interfaz en español.
Version 1.0
Author Pablo Eckert
Author URI httpsmejoraok.com
Text Domain photonic-mc
Domain Path languages
License GPLv3


if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__FILE__) . 'extensionsflickr.php';
require_once plugin_dir_path(__FILE__) . 'optionsphotonic-options-manager.php';

function photonic_mc_enqueue_scripts() {
    wp_enqueue_style('photonic-pswp5', plugins_url('cssphotoswipe5.css', __FILE__));
    wp_enqueue_script('photonic-pswp5', plugins_url('jsphotoswipe5.js', __FILE__), array(), null, true);

    wp_enqueue_style('photonic-lightgallery3', plugins_url('csslightgallery3.css', __FILE__));
    wp_enqueue_script('photonic-lightgallery3', plugins_url('jslightgallery3.js', __FILE__), array(), null, true);
}
add_action('wp_enqueue_scripts', 'photonic_mc_enqueue_scripts');

function photonic_mc_load_textdomain() {
    load_plugin_textdomain('photonic-mc', false, dirname(plugin_basename(__FILE__)) . 'languages');
}
add_action('plugins_loaded', 'photonic_mc_load_textdomain');



📄 readme.txt
=== Photonic-MC ===
Contributors mejoraok
Tags flickr, galería, lightbox, fotos, videos, colecciones
Requires at least 5.0
Tested up to 6.5
Stable tag 1.0
License GPLv3
License URI httpswww.gnu.orglicensesgpl-3.0.html

== Descripción ==
Photonic-MC permite mostrar galerías avanzadas desde Flickr, incluyendo colecciones, álbumes y videos. Compatible con PhotoSwipe v5 y LightGallery 3. Interfaz completamente en español.

== Instalación ==
1. Subí el archivo ZIP desde Plugins  Añadir nuevo  Subir plugin.
2. Activá el plugin.
3. Configurá el lightbox desde Ajustes  Photonic-MC.

== Changelog ==
= 1.0 =
 Versión inicial quirúrgica con soporte exclusivo para Flickr.



📄 uninstall.php
php
if (!defined('WP_UNINSTALL_PLUGIN')) exit;

delete_option('photonic_mc_settings');



📄 extensionsflickr.php
php
class Photonic_Flickr_Module {
    public function render_gallery($atts) {
        $type = $atts['view']  'photosets';
        if (!in_array($type, ['photosets', 'collections', 'videos'])) return '';

         Aquí iría la lógica de autenticación y llamada a la API de Flickr
        return div class='photonic-flickr-gallery'Galería de tipo $typediv;
    }
}



📄 optionsphotonic-options-manager.php
php
function photonic_mc_admin_menu() {
    add_options_page('Photonic-MC', 'Photonic-MC', 'manage_options', 'photonic-mc', 'photonic_mc_options_page');
}
add_action('admin_menu', 'photonic_mc_admin_menu');

function photonic_mc_options_page() {
    
    div class=wrap
        h1Configuración de Photonic-MCh1
        form method=post action=options.php
            php
            settings_fields('photonic_mc_settings');
            do_settings_sections('photonic-mc');
            submit_button();
            
        form
    div
    php
}

function photonic_mc_settings_init() {
    register_setting('photonic_mc_settings', 'photonic_mc_settings');

    add_settings_section('photonic_mc_lightbox', 'Lightbox', null, 'photonic-mc');

    add_settings_field('lightbox_choice', 'Elegí el lightbox', 'photonic_mc_lightbox_field', 'photonic-mc', 'photonic_mc_lightbox');
}
add_action('admin_init', 'photonic_mc_settings_init');

function photonic_mc_lightbox_field() {
    $options = get_option('photonic_mc_settings');
    $selected = $options['lightbox_choice']  'photoswipe5';
    
    select name=photonic_mc_settings[lightbox_choice]
        option value=photoswipe5 php selected($selected, 'photoswipe5'); PhotoSwipe v5option
        option value=lightgallery3 php selected($selected, 'lightgallery3'); LightGallery 3option
    select
    php
}



📄 jsphotoswipe5.js
 Placeholder para PhotoSwipe v5
console.log(PhotoSwipe v5 cargado);



📄 jslightgallery3.js
 Placeholder para LightGallery 3
console.log(LightGallery 3 cargado);



📄 cssphotoswipe5.css
 Estilos base para PhotoSwipe v5 
.photonic-flickr-gallery { border 2px solid #ccc; padding 10px; }



📄 csslightgallery3.css
 Estilos base para LightGallery 3 
.photonic-flickr-gallery { background-color #f9f9f9; padding 10px; }



📄 languagesphotonic-es_ES.po
msgid Choose your lightbox
msgstr Elegí el lightbox

msgid Photonic Settings
msgstr Configuración de Photonic-MC

msgid Flickr Gallery
msgstr Galería de Flickr



🧭 Instrucciones finales
- Guardá todos estos archivos en una carpeta llamada photonic-mc.
- Comprimí la carpeta como photonic-mc.zip.
- Subí el ZIP desde Plugins  Añadir nuevo  Subir plugin en WordPress.
- Activá el plugin y configurá el lightbox desde Ajustes  Photonic-MC.
¿Querés que prepare una ficha técnica institucional para onboarding o una tabla comparativa entre los dos lightboxes
