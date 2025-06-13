<?php
/**
 * Template Name: Página de Estilos
 * 
 * @package ThemeEntrezingenieros
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

?>

<section>
  <?php 
    get_template_part('template-parts/componentes/componente', 'titulo', array(
      'titulo' => '¿Qué deseas hacer hoy?', 
      'alinear' => 'text-lg-center'))
    ?>
</section>

<div class="container">
  <div class="row">
    <div class="col-md-4">1</div>
    <div class="col-md-4">2</div>
    <div class="col-md-4">2</div>
  </div>

  <div class="mt-0">0</div>
	<div class="mt-6">6</diV>
	<div class="mt-12">12</diV>
	<div class="mt-18">18</diV>
	<div class="mt-24">24</diV>
	<div class="mt-38">38</diV>
	<div class="mt-42">42</diV>
	<div class="mt-50">50</diV>
	<div class="mt-52">52</diV>
	<div class="mt-60">60</diV>
	<div class="mt-72">72</diV>
	<div class="mt-90">90</diV>

  <h1 class="h1 text-primary">H1 color primario</h1>
  <h2 class="h2 text-secondary">H2 color secondary</h2>
  <h3 class="text-purple">H3 color purple</h3>
  <h4 class="h4 text-purple">H4 color purple</h4>
  <h5 class="h5 text-purple">H5 color purple</h5>


  <div class="bg-primary text-white">Background primary</div>
  <div class="bg-secondary text-white">Background secondary</div>
  <div class="bg-purple text-white">Background purple</div>
  
</div>
<?php 
get_footer();
?>