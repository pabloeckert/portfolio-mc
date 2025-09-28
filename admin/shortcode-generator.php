<?php
function photonic_mc_shortcode_generator() {
    ?>
    <div class="wrap">
        <h1>Generador de Shortcode Photonic-MC</h1>
        <form id="photonic-mc-generator">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="view">Tipo de vista:</label></th>
                    <td>
                        <select id="view">
                            <option value="photosets">Álbumes</option>
                            <option value="collections">Colecciones</option>
                            <option value="videos">Videos</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="user_id">NSID de Flickr:</label></th>
                    <td><input type="text" id="user_id" placeholder="Ej: 12345678@N00" size="40"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="lightbox">Lightbox:</label></th>
                    <td>
                        <select id="lightbox">
                            <option value="photoswipe5">PhotoSwipe v5</option>
                            <option value="lightgallery3">LightGallery 3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="layout">Layout:</label></th>
                    <td>
                        <select id="layout">
                            <option value="">(por defecto)</option>
                            <option value="square">Cuadrado</option>
                            <option value="masonry">Masonry</option>
                        </select>
                    </td>
                </tr>
            </table>
            <p><button type="button" class="button button-primary" onclick="generateShortcode()">Generar Shortcode</button></p>
            <p><strong>Shortcode generado:</strong></p>
            <textarea id="output" rows="3" cols="80" readonly></textarea>
        </form>

        <script>
        function generateShortcode() {
            const view = document.getElementById('view').value;
            const user_id = document.getElementById('user_id').value;
            const lightbox = document.getElementById('lightbox').value;
            const layout = document.getElementById('layout').value;

            let shortcode = `[photonic-gallery view="${view}" user_id="${user_id}"`;
            if (lightbox) shortcode += ` lightbox="${lightbox}"`;
            if (layout) shortcode += ` layout="${layout}"`;
            shortcode += `]`;

            document.getElementById('output').value = shortcode;
        }
        </script>
    <?php
}