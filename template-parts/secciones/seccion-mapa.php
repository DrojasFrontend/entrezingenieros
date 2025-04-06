<?php
$sitename         = get_bloginfo('name');
$grupo_mapa       = get_field("grupo_mapa");
$titulo           = !empty($grupo_mapa['titulo']) ? esc_html($grupo_mapa['titulo']) : '';
$descripcion      = !empty($grupo_mapa['descripcion']) ? $grupo_mapa['descripcion'] : '';
$cta              = !empty($grupo_mapa['cta']) ? $grupo_mapa['cta'] : '';
$cta_url          = !empty($cta['url']) ? esc_url($cta['url']) : '';
$cta_titulo       = !empty($cta['title']) ? esc_html($cta['title']) : '';
$cta_target       = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
$items            = !empty($grupo_mapa['items']) ? $grupo_mapa['items'] : [];
$imagen_id        = !empty($grupo_mapa['imagen']['ID']) ? intval($grupo_mapa['imagen']['ID']) : '';
$imagen_id_mobile = !empty($grupo_mapa['imagen_mobile']['ID']) ? intval($grupo_mapa['imagen_mobile']['ID']) : '';
?>

<section class="position-relative d-flex flex-column-reverse px-18 pt-xl-60 pb-xl-100 py-36 gapxl-0 gap-24 bg-white overflow-hidden">
  <div class="container position-relative px-0">
    <div class="row">
      <div class="col-lg-6 col-12 position-relative z-1">
        <?php if($titulo) : ?>
          <h2 class="col-lg-9 col-12 fs-lg-2 fs-4 mb-6 wow fadeInUp" data-wow-delay="1.1s"><?php echo $titulo; ?></h2>
        <?php endif; ?>

        <?php if($descripcion) : ?>
          <div class="col-lg-8 col-12 pe-lg-18">
            <div class="font-poppins fs-p mb-18 wow fadeInUp" data-wow-delay="1.2s">
              <?php echo $descripcion; ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="d-flex flex-lg-row flex-column gap-lg-36 gap-18 mb-24">
          <?php if (!empty($items)) { ?>
            <?php foreach ($items as $item) { 
              $texto      = !empty($item['texto']) ? esc_html($item['texto']) : '';
              $detalle    = !empty($item['detalle']) ? $item['detalle'] : '';
            ?>
              <div class="wow fadeInUp" data-wow-delay="1.3s">
                <?php if (!empty($texto)) : ?>
                  <p class="font-poppins fs-p-small"><?php echo $texto; ?></p>
                <?php endif; ?>

                <?php if (!empty($detalle)) : ?>
                  <p class="fs-lg-2 fs-4 fw-medium">
                    +
                    <span class="customContador">
                      <?php echo $detalle; ?>
                    </span>
                  </p>
                <?php endif; ?>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
        <?php if (!empty($cta_url) && !empty($cta_titulo)) : ?>
          <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary wow fadeInUp" data-wow-delay="1.6s" target="<?php echo esc_attr($cta_target); ?>"><?php echo esc_html($cta_titulo); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="customMapaMask position-xl-absolute top-0 right-0 w-100 h-100 d-flex justify-xl-end justify-center align-start py-xl-36 wow fadeInUp" data-wow-delay="1.7s">
    <?php echo generar_image_responsive($imagen_id, 'custom-size', 'd-none d-lg-block w-auto wow fadeInUp', $titulo); ?>
    <?php echo generar_image_responsive($imagen_id_mobile, 'custom-size', 'd-lg-none w-auto wow fadeInUp', $titulo); ?>
  </div>
</section>