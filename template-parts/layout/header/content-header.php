<?php
/**
 * Header principal del sitio
 */
?>
<header class="position-fixed w-100 px-xl-24 px-10 pt-24 z-1056 wow fadeInDown">
    <div class="shadow-card py-lg-18 py-12 px-xl-36 px-18 rounded bg-white">
      <div class="d-flex justify-between align-center">
            <!-- Logo Principal -->
            <?php get_template_part('template-parts/layout/header/content', 'logo') ?>
            <!-- Fin Logo Principal -->

            <!-- Menu Desktop -->
            <?php get_template_part('template-parts/layout/header/content', 'nav') ?>
            <!-- Fin Menu Desktop -->

            <!-- Búsqueda -->
             <div class="d-none d-lg-block">
                 <?php get_template_part('template-parts/layout/header/content', 'search') ?>
             </div>
            <!-- Fin Búsqueda -->

            <!-- Acciones del Header -->
            <?php get_template_part('template-parts/layout/header/content', 'actions') ?>
            <!-- Fin Acciones del Header -->

            <!-- Botón Menú Móvil -->
            <button class="hamburger-btn d-lg-none" data-toggle-menu>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
</header>