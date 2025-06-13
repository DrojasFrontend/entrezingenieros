<?php
/**
 * Template Name: Página de Inicio
 * 
 * @package ThemeEntrezingenieros
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$activar                        = get_field('activar');
$activar_nuestros_servicios     = get_field('activar_nuestros_servicios');
$activar_mapa                   = get_field('activar_mapa');
$activar_novedades_actualidad   = get_field('activar_novedades_actualidad');
$activar_proyecto_destacado     = get_field('activar_proyecto_destacado');
$activar_nuestros_clientes      = get_field('activar_nuestros_clientes');
$activar_apoyamos               = get_field('activar_apoyamos');

?>
  <main>
    
    <?php if ($activar){ ?>
      
    <?php get_template_part('template-parts/componentes/componente', 'slider') ?>
    <?php } ?>

    <?php if($activar_nuestros_servicios) { ?>
    <?php get_template_part('template-parts/secciones/seccion', 'servicios') ?>
    <?php } ?>

    <?php if($activar_mapa) { ?>
    <?php get_template_part('template-parts/secciones/seccion', 'mapa') ?>
    <?php } ?>

    <?php if($activar_novedades_actualidad) { ?>
    <?php get_template_part('template-parts/componentes/componente', 'blog-slider')?>
    <?php } ?>

    <?php if($activar_proyecto_destacado) { ?>
    <?php get_template_part('template-parts/componentes/componente', 'proyecto-destacado') ?>
    <?php } ?>

    <span class="line wow fadeInUp" data-wow-delay="1.1s"></span>

    <?php if($activar_nuestros_clientes) { ?>
    <?php get_template_part('template-parts/componentes/componente', 'clientes') ?>
    <?php } ?>

    <?php if($activar_apoyamos) { ?>
    <?php get_template_part('template-parts/secciones/seccion', 'apoyamos') ?>
    <?php } ?>
  </main>
<?php 
get_footer();
?>