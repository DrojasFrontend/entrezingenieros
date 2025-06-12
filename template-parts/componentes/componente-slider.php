<?php
$sitename     = get_bloginfo('name');
$grupo_slider = get_field("grupo_slider");
$titulo       = !empty($grupo_slider['titulo']) ? esc_html($grupo_slider['titulo']) : '';
$descripcion  = !empty($grupo_slider['descripcion']) ? $grupo_slider['descripcion'] : '';
$cta          = !empty($grupo_slider['cta']) ? $grupo_slider['cta'] : '';
$cta_url      = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo   = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target   = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
$slides       = !empty($grupo_slider['slides']) ? $grupo_slider['slides'] : [];
?>

<section class="px-18 pt-lg-0 pt-36 pb-lg-60 pb-36">
  <div class="container px-0">
    <div class="row flex-lg-row flex-column-reverse">
      <div class="col-12 col-lg-6">
        <div class="d-flex flex-column justify-center h-lg-100">
          <?php if ($titulo) : ?>
            <h1 class="fs-lg-1 fs-2 mb-6 wow fadeInUp" data-wow-delay="1.1s"><?php echo $titulo; ?></h1>
          <?php endif; ?>
          
          <?php if ($descripcion) : ?>
            <div class="font-poppins fs-p mb-30 wow fadeInUp" data-wow-delay="1.2s">
              <?php echo $descripcion; ?>
            </div>
          <?php endif; ?>
          
          <?php if ($cta_url && $cta_titulo) : ?>
            <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary wow fadeInUp" data-wow-delay="1.3s" target="<?php echo esc_attr($cta_target); ?>"><?php echo $cta_titulo; ?></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="heroSwiper overflow-hidden">
          <div class="swiper-wrapper">
            <?php if (!empty($slides)) { ?>
              <?php foreach ($slides as $slide) { 
                $imagen_id        = !empty($slide['imagen']['ID']) ? intval($slide['imagen']['ID']) : '';
                $nombre_proyecto  = !empty($slide['nombre_proyecto']) ? $slide['nombre_proyecto'] : '';
              ?>
                <div class="swiper-slide">
                  <div class="row flex-lg-row flex-column-reverse wow fadeInUp" data-wow-delay="1.4s">
                    
                    <div class="ps-lg-84 customImgHover">
                      <div class="d-flex mb-18 overflow-hidden rounded">
                        <?php echo generar_image_responsive($imagen_id, 'custom-size', 'rounded-6 img-fluid',  $titulo); ?>
                      </div>
                      <?php if ($nombre_proyecto) : ?>
                        <p class="font-poppins fs-p-small text-primary text-lg-start text-center mb-lg-0 mb-24"><?php echo $nombre_proyecto; ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex align-center justify-lg-end justify-center mt-lg-0 mt-24 gap-12 wow fadeInUp" data-wow-delay="1.6s" data-wow-offset="10">
      <div class="customButtonSwiper swiper-button-prev">
        <i class="customIcono customIcono-arrow"></i>
      </div>
      <div class="customPaginacionSwiper swiper-pagination"></div>
      <div class="customButtonSwiper swiper-button-next">
        <i class="customIcono customIcono-arrow customIcono-invertido"></i>
      </div>
    </div>
  </div>
</section>
<div class="line wow fadeInUp" data-wow-delay="1.7s"></div>