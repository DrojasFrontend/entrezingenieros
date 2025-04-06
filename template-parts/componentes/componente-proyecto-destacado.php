<?php
$sitename                   = get_bloginfo('name');
$grupo_proyecto_destacado   = get_field("grupo_proyecto_destacado");
$titulo                     = !empty($grupo_proyecto_destacado['titulo']) ? esc_html($grupo_proyecto_destacado['titulo']) : '';
$detalle                    = !empty($grupo_proyecto_destacado['detalle']) ? esc_html($grupo_proyecto_destacado['detalle']) : '';
$area                       = !empty($grupo_proyecto_destacado['area']) ? esc_html($grupo_proyecto_destacado['area']) : '';
$ubicacion                  = !empty($grupo_proyecto_destacado['ubicacion']) ? esc_html($grupo_proyecto_destacado['ubicacion']) : '';
$cta                        = !empty($grupo_proyecto_destacado['cta']) ? $grupo_proyecto_destacado['cta'] : '';
$cta_url                    = !empty($cta['url']) ? esc_url($cta['url']) : '#';
$cta_titulo                 = !empty($cta['title']) ? esc_html($cta['title']) : 'Conocer proyecto';
$cta_target                 = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
$imagen_desktop             = !empty($grupo_proyecto_destacado['imagen_desktop']['ID']) ? intval($grupo_proyecto_destacado['imagen_desktop']['ID']) : '';
$imagen_mobile              = !empty($grupo_proyecto_destacado['imagen_mobile']['ID']) ? intval($grupo_proyecto_destacado['imagen_mobile']['ID']) : '';

?>

<section class="px-18 py-lg-54 py-36 wow fadeInUp" data-wow-delay="1s">
  <div class="container px-lg-68 px-0">
    <div class="position-relative rounded overflow-hidden">
      <div class="d-lg-block d-none position-absolute top-0 left-0">
        <?php echo generar_image_responsive($imagen_desktop, 'custom-size', 'd-block w-100 h-100', $titulo); ?>
      </div>
      <div class="row flex-column-reverse">
        <div class="customProyectoDestacado col-lg-9">
          <div class="position-relative p-lg-42 p-24 z-1">
            <p class="fs-p mb-4">Proyecto destacado</p>
              <?php if ($titulo) : ?>
                <h2 class="fs-lg-2 fs-4 mb-4 col-lg-7 col-12"><?php echo $titulo; ?></h2>
              <?php endif; ?>
              
              <?php if ($detalle) : ?>
                <p class="font-poppins fs-p mb-30 col-lg-7 col-12"><?php echo $detalle; ?></p>
              <?php endif; ?>
              
              <?php if ($area) : ?>
                <p class="font-poppins fs-p"><strong>Área:</strong> <?php echo $area; ?></p>
              <?php endif; ?>
              
              <?php if ($ubicacion) : ?>
                <p class="font-poppins fs-p mb-30"><strong>Ubicación:</strong> <?php echo $ubicacion; ?></p>
              <?php endif; ?>
              
              <?php if (!empty($cta_url) && !empty($cta_titulo)) : ?>
                <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary" target="<?php echo esc_attr($cta_target); ?>"><?php echo esc_html($cta_titulo); ?></a>
              <?php endif; ?>
          </div>
        </div>
        <div class="d-lg-none col-12">
          <?php echo generar_image_responsive($imagen_mobile, 'custom-size', 'd-block w-100 h-100', $titulo); ?>
        </div>
      </div>
    </div>
  </div>
</section>