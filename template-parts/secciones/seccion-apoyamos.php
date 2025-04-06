<?php
$sitename       = get_bloginfo('name');
$grupo_apoyamos = get_field("grupo_apoyamos");
$slides         = !empty($grupo_apoyamos['slides']) ? $grupo_apoyamos['slides'] : [];
?>

<section class="py-lg-54 py-36 px-18">
  <div class="container px-0">
    <div class="px-lg-68">
      <div class="swiper apoyamosSwiper">
        <div class="swiper-wrapper">
          <?php if (!empty($slides)) { ?>
            <?php foreach ($slides as $slide) { 
                $titulo      = !empty($slide['titulo']) ? esc_html($slide['titulo']) : '';
                $subtitulo   = !empty($slide['subtitulo']) ? esc_html($slide['subtitulo']) : '';
                $descripcion = !empty($slide['descripcion']) ? $slide['descripcion'] : '';
                $cta         = !empty($slide['cta']) ? $slide['cta'] : '';
                $cta_url     = !empty($cta['url']) ? esc_url($cta['url']) : '';
                $cta_target  = !empty($cta['target']) ? esc_attr($cta['target']) : '_self'; 
                $cta_texto   = !empty($cta['title']) ? esc_html($cta['title']) : '';

                $imagen_id        = !empty($slide['imagen']['ID']) ? intval($slide['imagen']['ID']) : '';
              ?>
                <div class="swiper-slide">
                  <div class="d-grid grid-cols-lg-2 grid-cols-1 gap-lg-36 gap-18">
                    <div class="pe-38  wow fadeInUp" data-wow-delay="1s">
                      <a href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>" title="<?php echo $cta_texto; ?>">
                        <?php echo generar_image_responsive($imagen_id, 'custom-size', 'rounded-6 img-fluid',  $titulo); ?>
                      </a>
                    </div>
                    <div class="d-flex flex-column justify-center wow fadeInUp" data-wow-delay="1.1s">
                      <?php if ($subtitulo) : ?>
                        <p class="fs-p-small mb-6"><?php echo $subtitulo; ?></p>
                      <?php endif; ?>

                      <?php if ($titulo) : ?>
                        <h2 class="fs-lg-2 fs-4 mb-6"><?php echo $titulo; ?></h2>
                      <?php endif; ?>

                      <?php if ($descripcion) : ?>
                        <div class="font-poppins fs-p"><?php echo $descripcion; ?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
        </div>
      </div>

      <div class="d-flex align-center justify-center mt-24 gap-12">
        <div class="customButtonSwiper swiper-button-prev-apoyamos">
          <i class="customIcono customIcono-arrow"></i>
        </div>
        <div class="customPaginacionSwiper swiper-pagination-apoyamos"></div>
        <div class="customButtonSwiper swiper-button-next-apoyamos">
          <i class="customIcono customIcono-arrow customIcono-invertido"></i>
        </div>
      </div>
    </div>
  </div>
</section>