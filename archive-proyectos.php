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
          <option value="">Selecciona un sector</option>
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
          <option value="">Selecciona el año</option>
          <?php 
          $years = get_terms(array(
            'taxonomy' => 'ano',
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

<!-- Modales-->
<?php rewind_posts(); if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <section class="customModal modal fade bg-primary" id="modalProyecto-<?php the_ID(); ?>" tabindex="-1" aria-labelledby="modalLabel-<?php the_ID(); ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="pt-100 pb-lg-80 pb-40">
              <div class="container px-0">
                <div class="row d-flex flex-lg-row flex-column-reverse">
                  <div class="col-12 col-lg-6 mb-lg-0 mb-24">
                    <h2 class="fs-lg-2 fs-4 text-white mb-24"><?php the_title(); ?></h2>
                    <p class="font-poppins fs-p text-white fw-semibold">Objetivo del proyecto:</p>
                    <span class="line line-blanca my-12"></span>
                    <?php 
                      $grupo_modal = get_field('grupo_modal'); 
                      $objetivo_proyecto = !empty($grupo_modal['objetivo_proyecto']) ? $grupo_modal['objetivo_proyecto'] : "";
                      $tipo_proyecto     = !empty($grupo_modal['tipo_proyecto']) ? esc_html($grupo_modal['tipo_proyecto']) : "";
                      $area              = !empty($grupo_modal['area']) ? $grupo_modal['area'] : "";
                      $ubicacion         = !empty($grupo_modal['ubicacion']) ? esc_html($grupo_modal['ubicacion']) : "";
                      $google_maps       = !empty($grupo_modal['google_maps']) ? $grupo_modal['google_maps'] : "";
                      $estado            = !empty($grupo_modal['estado']) ? esc_html($grupo_modal['estado']) : "";
                      $galeria           = !empty($grupo_modal['galeria']) ? $grupo_modal['galeria'] : [];
                    ?>

                    <?php if($objetivo_proyecto) { ?>
                      <div class="font-poppins fs-p text-white fw-regular mb-18">
                        <?php echo $objetivo_proyecto; ?>
                      </div>
                    <?php } ?>
                    
                    <div class="row mb-18">
                      <div class="col">
                        <p class="font-poppins fs-p text-white fw-semibold">Tipo de proyecto:</p>
                        <span class="line line-blanca my-6"></span>
                        <?php if($tipo_proyecto) { ?>
                          <div class="font-poppins fs-p text-white fw-regular"><?php echo $tipo_proyecto; ?></div>
                        <?php } ?>
                      </div>
                      <div class="col">
                        <p class="font-poppins fs-p text-white fw-semibold">Área</p>
                        <span class="line line-blanca my-6"></span>
                        <?php if($area) { ?>
                          <p class="font-poppins fs-p text-white fw-regular"><?php echo $area; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="row mb-18">
                      <div class="col">
                        <p class="font-poppins fs-p text-white fw-semibold">Ubicación:</p>
                        <span class="line line-blanca my-6"></span>

                        <div class="d-flex flex-lg-row flex-column gap-lg-42 gap-18">
                          <?php if($ubicacion) { ?>
                            <p class="font-poppins fs-p text-white fw-regular"><?php echo $ubicacion; ?></p>
                          <?php } ?>

                          <?php if($google_maps) { ?>
                            <a href="<?php echo $google_maps; ?>" class="fs-p d-flex align-center gap-12 text-white fw-regular" target="_blank">
                              <i class="customIcono customIcono-ubicacion"></i>
                              <span class="customHoverLink customHoverLink-blanco">
                              Ver en Google Maps
                            </span>
                              <i class="customIcono customIcono-arrow-blanco"></i>
                            </a>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="row gap-36 mb-18">
                      <div class="col">
                        <p class="font-poppins fs-p text-white fw-semibold">Estado:</p>
                        <span class="line line-blanca my-6"></span>
                        <?php if($estado) { ?>
                          <p class="font-poppins fs-p text-white fw-regular"><?php echo $estado; ?></p>
                        <?php } ?>
                      </div>
                    </div>
                    <button type="button" class="btn btn-blanco" data-bs-dismiss="modal">Regresar</button>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="swiper galeriaSwiper">
                      <div class="swiper-wrapper">
                        <?php foreach($galeria as $imagen) { 
                          $imagen_id = !empty($imagen['ID']) ? intval($imagen['ID']) : '';
                        ?>
                          <div class="swiper-slide">
                            <?php echo generar_image_responsive($imagen_id, 'custom-size', 'd-flex rounded-6 img-fluid', get_the_title()); ?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="d-flex align-center justify-center gap-12 my-24">
                      <div class="customButtonSwiper swiper-button-prev-galeria-<?php the_ID(); ?>">
                        <i class="customIcono customIcono-arrow-blanco customIcono-invertido"></i>
                      </div>
                      <div class="customPaginacionSwiper swiper-pagination-blanco swiper-pagination-galeria-<?php the_ID(); ?>"></div>
                      <div class="customButtonSwiper swiper-button-next-galeria-<?php the_ID(); ?>">
                        <i class="customIcono customIcono-arrow-blanco"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>