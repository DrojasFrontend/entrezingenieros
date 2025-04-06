<?php 
$sitename         = get_bloginfo('name');
$grupo_logo_redes = get_field('grupo_logo_redes', 'option');

/* Redes */$redes = !empty($grupo_logo_redes['redes']) ? $grupo_logo_redes['redes'] : [];
?>
<!-- Menú Móvil -->
<div class="customMobileMenu d-lg-none position-fixed top-0 left-0 w-100 h-100 p-24 pt-120 pb-100 z-100" data-menu-mobile>
    <div class="mobile-menu-content bg-white rounded p-24 pb-12">
        <!-- Buscador -->
        <?php get_template_part('template-parts/layout/header/content', 'search') ?>

        <!-- Menú -->
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-principal',
            'container_class' => 'mobile-nav',
            'menu_class' => 'mobile-menu-list',
            'walker' => new Menu_Simple_Personalizado()
        ));
        ?>
    </div>

    <!-- Redes -->
    <?php if (!empty($redes)) { ?>
        <div class="bg-primary rounded py-24 px-6 mt-12">
            <ul class="d-flex justify-center justify-lg-start gap-12">
                <?php foreach ($redes as $red) { 
                $icono      = !empty($red['imagen']) ? $red['imagen'] : '';
                $cta        = !empty($red['enlace']) ? $red['enlace'] : '';
                $cta_url    = !empty($cta['url']) ? esc_url($cta['url']) : '';
                $cta_titulo = !empty($cta['title']) ? esc_html($cta['title']) : '';
                $cta_target = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
                ?>
                <li>
                    <a href="<?php echo esc_url($cta_url); ?>" class="d-block" title="<?php echo $cta_titulo; ?>" target="<?php echo esc_attr($cta_target); ?>">
                    <span class="visually-hidden"><?php echo $cta_titulo; ?></span>
                    <img width="38" height="38" alt="<?php echo $cta_titulo . ' - ' . $sitename; ?>" title="<?php echo $cta_titulo; ?>" src="<?php echo $icono; ?>" alt="">
                    </a>
                </li>
                <?php } ?>
            </ul>
            <p class="font-poppins fs-p-small pt-18 text-gray text-center">
                Todos los derechos reservados Entrez <?php echo date('Y'); ?>
            </p>
        </div>
    <?php } ?>
</div>