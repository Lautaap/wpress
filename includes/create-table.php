<?php
function sfp_create_custom_table() {
    global $wpdb;

    $table = $wpdb->prefix . 'usuarios';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        edad INT,
        institucion VARCHAR(100),
        proyecto VARCHAR(100),
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'sfp_create_custom_table');
?>