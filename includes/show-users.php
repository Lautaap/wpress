<?php
function sfp_mostrar_usuarios_shortcode() {
    global $wpdb;
    $table = $wpdb->prefix . 'usuarios';
    $usuarios = $wpdb->get_results("SELECT * FROM $table");
    ob_start();
    echo '<style>
    .sfp-usuario-box {
        border:2px solid #1976d2;
        background:#f5faff;
        border-radius:10px;
        padding:15px;
        margin-bottom:15px;
        box-shadow: 0 2px 6px rgba(25,118,210,0.06);
    }
    .sfp-usuario-box strong { color:#1976d2; }
    .sfp-usuario-box .icon { font-size:1.2em; margin-right:4px; }
    </style>';
    if ($usuarios) {
        foreach ($usuarios as $usuario) {
            echo "<div class='sfp-usuario-box'>";
            echo "<span class='icon'>👤</span> <strong>Nombre:</strong> " . esc_html($usuario->nombre) . "<br>";
            echo "<span class='icon'>📧</span> <strong>Email:</strong> " . esc_html($usuario->email) . "<br>";
            echo "<span class='icon'>🎂</span> <strong>Edad:</strong> " . esc_html($usuario->edad) . "<br>";
            echo "<span class='icon'>🏫</span> <strong>Institución:</strong> " . esc_html($usuario->institucion) . "<br>";
            echo "<span class='icon'>💡</span> <strong>Proyecto:</strong> " . esc_html($usuario->proyecto) . "<br>";
            echo "</div>\n";
        }
    } else {
        echo "No hay usuarios registrados.";
    }
    return ob_get_clean();
}
add_shortcode('mostrar_usuarios', 'sfp_mostrar_usuarios_shortcode');
