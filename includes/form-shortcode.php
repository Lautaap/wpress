<?php
function sfp_render_form() {
    ob_start();
    ?>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad"><br>
        <label for="institucion">Institución:</label>
        <input type="text" name="institucion"><br>
        <label for="proyecto">Proyecto:</label>
        <input type="text" name="proyecto"><br>
        <input type="submit" name="registrar" value="Registrarse">
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('simple_form', 'sfp_render_form');
?>