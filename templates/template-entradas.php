<?php
/**
 * Template Name: Página de Entradas
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
    <?php if($activar_titulo_pagina) { ?>
      <!-- Titulo -->
      <?php get_template_part('template-parts/componentes/componente', 'titulo-fondo') ?>
      <!-- Fin Titulo -->
    <?php } ?>

    <?php get_template_part('template-parts/componentes/componente', 'blog-loop') ?>

    <?php if($activar_proyecto_destacado) { ?>
      <!-- Proyecto Destacado -->
      <?php get_template_part('template-parts/componentes/componente', 'proyecto-destacado') ?>
      <!-- Fin Proyecto Destacado -->
    <?php } ?>
  </main>
<?php 
get_footer();
?>