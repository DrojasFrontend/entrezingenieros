<?php
/**
 * Template Name: Página de Servicios
 * 
 * @package ThemeEntrezingenieros
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$activar_titulo_pagina      = get_field('activar_titulo_pagina');
$activar_proyecto_destacado = get_field('activar_proyecto_destacado');

?>
  <main>
    <?php if ($activar_titulo_pagina) : ?>
      <?php get_template_part('template-parts/componentes/componente', 'titulo-fondo') ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/secciones/seccion', 'etapas') ?>

    <?php if ($activar_proyecto_destacado) : ?>
      <?php get_template_part('template-parts/componentes/componente', 'proyecto-destacado') ?>
    <?php endif; ?>

  </main>
<?php 
get_footer();
?>