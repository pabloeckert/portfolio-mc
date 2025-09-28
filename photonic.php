<?php
/*
Plugin Name: Photonic-MC
Plugin URI: https://mejoraok.com/
Description: Galerías avanzadas de Flickr con soporte para colecciones, álbumes y videos. Lightbox con PhotoSwipe v5 y LightGallery 3. Interfaz en español.
Version: 1.0
Author: Pablo Eckert
Author URI: https://mejoraok.com/
Text Domain: photonic-mc
Domain Path: /languages
License: GPLv3
*/

if (!defined('ABSPATH')) exit;

// Carga de módulos
require_once plugin_dir_path(__FILE__) . 'extensions/flickr.php';
require_once plugin_dir_path(__FILE__) . 'options/photonic-options-manager.php';
require_once plugin_dir_path(__FILE__) . 'admin/shortcode-generator.php';

// Encolado de scripts y estilos
function photonic_mc_enqueue_scripts() {
    wp_enqueue_style('photonic-pswp5', plugins_url('css/photoswipe5.css', __FILE__));
    wp_enqueue_script('photonic-pswp5', plugins_url('js/photoswipe5.js', __FILE__), array(), null, true);

    wp_enqueue_style('photonic-lightgallery3', plugins_url('css/lightgallery3.css', __FILE__));
    wp_enqueue_script('photonic-lightgallery3', plugins_url('js/lightgallery3.js', __FILE__), array(), null, true);
}
add_action('wp_enqueue_scripts', 'photonic_mc_enqueue_scripts');

// Carga de traducciones
function photonic_mc_load_textdomain() {
    load_plugin_textdomain('photonic-mc', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'photonic_mc_load_textdomain');

// Menú de administración
function photonic_mc_admin_menu() {
    add_options_page('Photonic-MC', 'Photonic-MC', 'manage_options', 'photonic-mc', 'photonic_mc_options_page');
    add_menu_page('Generador Photonic-MC', 'Generador Photonic-MC', 'manage_options', 'photonic-mc-generator', 'photonic_mc_shortcode_generator');
}
add_action('admin_menu', 'photonic_mc_admin_menu');