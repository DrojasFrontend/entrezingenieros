<?php
/**
 * Navegación principal del sitio
 */
?>
<nav class="customMenu d-none d-lg-flex align-center">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-principal',
        'container_class' => 'nav-container',
        'menu_class' => 'd-flex gap-xl-36 gap-18',
        'walker' => new Menu_Simple_Personalizado()
    ));
    ?>
</nav>