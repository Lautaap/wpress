<?php
function sfp_handle_form_submission() {
    if (isset($_POST['registrar'])) {
        global $wpdb;
        $table = $wpdb->prefix . 'usuarios';

        $nombre = sanitize_text_field($_POST['nombre']);
        $email = sanitize_email($_POST['email']);
        $edad = isset($_POST['edad']) ? intval($_POST['edad']) : null;
        $institucion = isset($_POST['institucion']) ? sanitize_text_field($_POST['institucion']) : '';
        $proyecto = isset($_POST['proyecto']) ? sanitize_text_field($_POST['proyecto']) : '';

        $wpdb->insert(
            $table,
            array(
                'nombre' => $nombre,
                'email' => $email,
                'edad' => $edad,
                'institucion' => $institucion,
                'proyecto' => $proyecto
            ),
            array('%s', '%s', '%d', '%s', '%s')
        );
    }
}
add_action('init', 'sfp_handle_form_submission');
?>