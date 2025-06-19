<?php
/**
 * Template Name: Single Proyectos
 * Template Post Type: post, proyectos
 * 
 * @package EntreZingenieros
 */

get_header(); 
?>
<!-- Modales-->
<?php rewind_posts(); if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <section class="customModal position-relative bg-primary" id="modalProyecto-<?php the_ID(); ?>" tabindex="-1" aria-labelledby="modalLabel-<?php the_ID(); ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content pt-lg-80 px-18">
          <div class="modal-body">
            <div class="pt-100 pb-lg-80 pb-40">
              <div class="container px-0">
                <div class="row d-flex flex-lg-row flex-column-reverse">
                  <div class="col-12 col-lg-6 mb-lg-0 mb-24">
                    <h2 class="fs-lg-2 fs-4 text-white mb-24"><?php the_title(); ?></h2>
                    <?php 
                      $grupo_modal       = get_field('grupo_modal'); 
                      $etapa             = !empty($grupo_modal['etapa']) ? $grupo_modal['etapa'] : "";
                      $servicios         = !empty($grupo_modal['servicios']) ? $grupo_modal['servicios'] : "";
                      $tipo_proyecto     = !empty($grupo_modal['tipo_proyecto']) ? $grupo_modal['tipo_proyecto'] : "";
                      $area              = !empty($grupo_modal['area']) ? $grupo_modal['area'] : "";
                      $ubicacion         = !empty($grupo_modal['ubicacion']) ? esc_html($grupo_modal['ubicacion']) : "";
                      $google_maps       = !empty($grupo_modal['google_maps']) ? $grupo_modal['google_maps'] : "";
                      $estado            = !empty($grupo_modal['estado']) ? esc_html($grupo_modal['estado']) : "";
                      $galeria           = !empty($grupo_modal['galeria']) ? $grupo_modal['galeria'] : [];
                    ?>
                      <?php if($etapa) { ?>
                        <p class="font-poppins fs-p text-white">
                          <span class="fw-semibold">Etapa:</span>
                          <?php echo $etapa; ?>
                        </p>
                      <?php } ?>

                    <span class="line line-blanca my-12"></span>

                    <?php if($servicios) { ?>
                      <div class="font-poppins fs-p text-white mb-18">
                        <span class="fw-semibold">Servicios prestados:</span>
                        <?php echo $servicios; ?>
                      </div>
                    <?php } ?>
                    
                    <div class="row mb-18">
                        <?php if($tipo_proyecto) { ?>
                          <div class="col">
                            <p class="font-poppins fs-p text-white fw-semibold">Tipo de proyecto:</p>
                            <span class="line line-blanca my-6"></span>
                            <div class="font-poppins fs-p text-white fw-regular"><?php echo $tipo_proyecto; ?></div>
                          </div>
                        <?php } ?>

                      <?php if($area) { ?>
                        <div class="col">
                          <p class="font-poppins fs-p text-white fw-semibold">Área</p>
                          <span class="line line-blanca my-6"></span>
                            <p class="font-poppins fs-p text-white fw-regular"><?php echo $area; ?></p>
                        </div>
                      <?php } ?>
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
                      <?php if($estado) { ?>
                        <div class="col">
                          <p class="font-poppins fs-p text-white fw-semibold">Estado:</p>
                          <span class="line line-blanca my-6"></span>
                            <p class="font-poppins fs-p text-white fw-regular"><?php echo $estado; ?></p>
                        </div>
                      <?php } ?>
                      <!-- Agregar año -->
                      <?php 
                        $anos = get_the_terms(get_the_ID(), 'ano');
                        if ($anos && !is_wp_error($anos)) {
                          $ano_nombre = esc_html($anos[0]->name);
                      ?>
                        <div class="col">
                          <p class="font-poppins fs-p text-white fw-semibold">Año:</p>
                          <span class="line line-blanca my-6"></span>
                          <p class="font-poppins fs-p text-white fw-regular"><?php echo $ano_nombre; ?></p>
                        </div>
                      <?php } ?>
                    </div>
                    <button type="button" class="btn btn-blanco" onclick="window.history.back()">Regresar</button>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="swiper galeriaSwiper">
                      <div class="swiper-wrapper">
                        <?php foreach($galeria as $imagen) :
                          $video           = !empty($imagen['video']) ? $imagen['video'] : '';
                          $imagen_id       = !empty($imagen['imagen']['ID']) ? $imagen['imagen']['ID'] : '';
                          $autor           = !empty($imagen['autor']) ? $imagen['autor'] : [];
                          $nombre_proyecto = !empty($imagen['nombre_proyecto']) ? $imagen['nombre_proyecto'] : [];
                        ?>
                          <div class="swiper-slide">
                            <?php if($video && !empty($video['url'])) { ?>
                              <video class="d-flex rounded-6 img-fluid" controls>
                                <source src="<?php echo esc_url($video['url']); ?>" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                              </video>
                            <?php } else { ?>
                              <?php echo generar_image_responsive($imagen_id, 'custom-size', 'd-flex rounded-6 img-fluid', get_the_title()); ?>
                            <?php } ?>
                              <?php if($autor) { ?>
                                <?php if($autor['title'] != 'Entrez') { ?>
                                  <a href="<?php echo $autor['url']?>" target="<?php echo $autor['target']?>" class="autor position-absolute font-poppins fs-p-small text-white fw-regular text-end">Autor: <?php echo $autor['title']; ?></a>
                                <?php } ?>
                              <?php } ?>
                              <?php if($nombre_proyecto) { ?>
                                <a href="<?php echo $nombre_proyecto['url']?>" target="<?php echo $nombre_proyecto['target']?>" class="nombre-proyecto position-absolute d-block font-poppins fs-p-small text-white fw-regular text-end">Nombre del proyecto: <?php echo $nombre_proyecto['title']; ?></a>
                              <?php } ?>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <div class="d-flex align-center justify-center gap-12 my-24">
                      <div class="customButtonSwiper swiper-button-prev-galeria">
                        <i class="customIcono customIcono-arrow-blanco customIcono-invertido"></i>
                      </div>
                      <div class="customPaginacionSwiper swiper-pagination-blanco swiper-pagination-galeria"></div>
                      <div class="customButtonSwiper swiper-button-next-galeria">
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