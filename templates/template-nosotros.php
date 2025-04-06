<?php
/**
 * Template Name: Página de Nosotros
 * 
 * @package ThemeEntrezingenieros
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$activar_titulo_pagina  = get_field('activar_titulo_pagina');
$activar_historia       = get_field('activar_historia');
$activar_nuestro_equipo = get_field('activar_nuestro_equipo');
$activar_miembros       = get_field('activar_miembros');

?>
  <main>
    <?php if ($activar_titulo_pagina) : ?>
    <?php get_template_part('template-parts/componentes/componente', 'titulo-fondo') ?>
    <?php endif; ?>

    <?php if ($activar_historia) : ?>
    <?php get_template_part('template-parts/secciones/seccion', 'linea-tiempo') ?>
    <?php endif; ?>

    <?php if ($activar_nuestro_equipo) : ?>
    <?php get_template_part('template-parts/secciones/seccion', 'nuestro-equipo') ?>
    <?php endif; ?>
    
    <?php if ($activar_miembros) : ?>
    <?php get_template_part('template-parts/secciones/seccion', 'miembros') ?>
    <?php endif; ?>
  </main>
<?php 
get_footer();
?>