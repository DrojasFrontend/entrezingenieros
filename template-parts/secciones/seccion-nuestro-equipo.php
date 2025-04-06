<?php
$sitename             = get_bloginfo('name');
$grupo_nuestro_equipo = get_field("grupo_nuestro_equipo");
$titulo               = !empty($grupo_nuestro_equipo['titulo']) ? esc_html($grupo_nuestro_equipo['titulo']) : '';
$descripcion          = !empty($grupo_nuestro_equipo['descripcion']) ? $grupo_nuestro_equipo['descripcion'] : '';
$equipo               = !empty($grupo_nuestro_equipo['equipo']) ? $grupo_nuestro_equipo['equipo'] : [];
$total_items          = count($equipo);
?>

<section class="py-lg-54 py-36 bg-gray-100">
  <div class="px-18">
    <div class="container px-0">
      <div class="text-lg-center">
        <?php if ($titulo) : ?>
          <h2 class="fs-lg-2 fs-4 mb-12 wow fadeInUp" data-wow-delay="1s"><?php echo $titulo; ?></h2>
        <?php endif; ?>
  
        <?php if ($descripcion) : ?>
          <div class="d-flex justify-center">
            <div class="col-lg-10 col-12 px-lg-24 mb-lg-42 mb-24">
              <div class="font-poppins fs-p wow fadeInUp" data-wow-delay="1.1s">
                <?php echo $descripcion; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="px-sm-18 ps-18">
    <div class="container px-0">
      <?php if (!empty($equipo)) { ?>
        <div class="swiper equipoSwiper">
          <div class="swiper-wrapper">
            <?php foreach ($equipo as $key => $item) { 
              $imagen_id  = !empty($item['imagen']['ID']) ? intval($item['imagen']['ID']) : '';
              $nombre     = !empty($item['nombre']) ? esc_html($item['nombre']) : '';
              $rol        = !empty($item['rol']) ? esc_html($item['rol']) : '';
              $cta        = !empty($item['link']) ? $item['link'] : '';
              $cta_url    = !empty($cta['url']) ? esc_url($cta['url']) : '';
              $cta_titulo = !empty($cta['title']) ? esc_html($cta['title']) : '';
              $cta_target = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
            ?>
              <div class="swiper-slide">
                <div class="position-relative clickeable customHoverTarjetaAzul wow fadeInUp" data-wow-delay="1.<?php echo $key; ?>s">
                  <?php echo generar_image_responsive($imagen_id, 'custom-size', 'd-flex rounded img-fluid', $titulo); ?>
                  <div class="position-xl-absolute top-0 d-flex flex-column justify-end h-100 p-xl-24 px-0 py-12 customHoverTarjetaAzulVisible">
                    <?php if ($nombre) : ?>
                      <h3 class="fs-3 text-xl-white text-xl-start text-center"><?php echo $nombre; ?></h3>
                    <?php endif; ?>

                    <?php if ($rol) : ?>
                      <p class="font-poppins fs-p-small text-xl-white text-xl-start text-center mb-12"><?php echo $rol; ?></p>
                    <?php endif; ?>

                    <div class="d-none d-xl-block">
                      <span class="line line-blanca mb-12"></span>
                    </div>
                    <div class="d-xl-none">
                      <span class="line line-negra mb-12"></span>
                    </div>
                    <div class="d-flex gap-12 justify-xl-start justify-center">
                      <img class="d-none d-xl-block" width="24" height="24" src="<?php echo THEME_IMG . 'iconos/icono-linkedin.svg'?>" alt="linkedin">
                      <img class="d-xl-none" width="24" height="24" src="<?php echo THEME_IMG . 'iconos/icono-linkedin-azul.svg'?>" alt="linkedin">

                      <?php if ($cta_url && $cta_titulo) : ?>
                        <a href="<?php echo $cta_url; ?>" class="d-flex align-center justify-xl-start justify-center text-xl-white text-primary text-xl-start text-center gap-12 fs-3" target="<?php echo $cta_target; ?>" title="<?php echo $cta_titulo; ?>">
                          <?php echo $cta_titulo; ?>
                          <div class="d-none d-xl-block">
                            <i class="customIcono customIcono-flecha-blanca"></i>
                          </div>
                          <div class="d-xl-none">
                            <i class="customIcono customIcono-flecha"></i>
                          </div>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="<?php if ($total_items > 4) echo 'd-flex'; else echo 'd-flex d-xl-none'; ?> align-center justify-center mt-24 gap-12">
          <div class="customButtonSwiper swiper-button-prev-equipo">
            <i class="customIcono customIcono-arrow"></i>
          </div>
          <div class="customPaginacionSwiper swiper-pagination-equipo"></div>
          <div class="customButtonSwiper swiper-button-next-equipo">
            <i class="customIcono customIcono-arrow customIcono-invertido"></i>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<div class="line"></div>