<?php
/**
 * The template for displaying archive pages for proyectos custom post type
 */

get_header(); 
?>

<section class="pt-140 pb-42 px-18">
  <div class="container px-0">
    <header>
      <h1 class="fs-lg-1 fs-2 fw-regular text-center wow fadeInUp" data-wow-delay="1s">Explora todos nuestros proyectos</h1>
    </header>
  </div>
</section>

<!-- Filtros -->
<section class="px-18 wow fadeInUp" data-wow-delay="1.1s">
  <div class="container px-0">
    <div class="row mb-36">
      <div class="col-12 col-lg-4 d-flex align-center justify-lg-end">
        <h2 class="font-poppins fs-5 fw-regular mb-lg-0 mb-24 text-lg-start text-center">Filtros</h2>
      </div>
      <!-- Filtro por sector -->
      <div class="col-12 col-lg-4">
        <select name="sector-filter" id="sector-filter" class="form-select w-100 rounded-6 font-poppins fs-p fw-regular">
          <option value="">Selecciona el tipo de proyecto</option>
          <?php 
            $sectors = get_terms(array(
              'taxonomy' => 'sector',
              'hide_empty' => false
            ));
            
            if (!is_wp_error($sectors) && !empty($sectors)) {
              foreach ($sectors as $sector) {
                echo '<option value="' . esc_attr($sector->slug) . '">' . esc_html($sector->name) . '</option>';
              }
            }
          ?>
        </select>
      </div>

      <!-- Filtro por año -->
      <div class="col-12 col-lg-4">
        <select name="year-filter" id="year-filter" class="form-select w-100 rounded-6 font-poppins fs-p fw-regular">
          <option value="">Selecciona la etapa</option>
          <?php 
          $years = get_terms(array(
            'taxonomy' => 'etapa',
            'hide_empty' => false
          ));
          
          if (!is_wp_error($years) && !empty($years)) {
            foreach ($years as $year) {
              echo '<option value="' . esc_attr($year->slug) . '">' . esc_html($year->name) . '</option>';
            }
          }
          ?>
        </select>
      </div>
    </div>
  </div>
</section>

<section id="customProyectos" class="px-18">
  <div class="container px-0">
    <div class="row">
      <!-- Los proyectos se cargarán dinámicamente a través de AJAX -->
    </div>
  </div>
</section>

<?php get_footer(); ?>