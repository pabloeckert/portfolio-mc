<?php
class Photonic_Flickr_Module {
    public function render_gallery($atts) {
        $type = $atts['view'] ?? 'photosets';
        if (!in_array($type, ['photosets', 'collections', 'videos'])) return '';

        // Aquí iría la lógica de autenticación y llamada a la API de Flickr
        return "<div class='photonic-flickr-gallery'>Galería de tipo: $type</div>";
    }
}