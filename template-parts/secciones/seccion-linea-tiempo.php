<?php
$sitename       = get_bloginfo('name');
$grupo_historia = get_field("grupo_historia");
$titulo         = !empty($grupo_historia['titulo']) ? esc_html($grupo_historia['titulo']) : '';
$items          = !empty($grupo_historia['items']) ? $grupo_historia['items'] : [];
?>

<section class="py-54 px-18 customLineaTiempo fadeInUp">
  <i class="customIcono customIcono-triangulo wow fadeInUp" data-wow-delay="1.1s"></i>
  <span class="customLineaTiempoLinea wow fadeInUp" data-wow-delay="1.2s"></span>
  <div class="container px-0">
    <?php if ($titulo) : ?>
      <div class="px-36">
        <h2 class="fs-lg-2 fs-4 mb-36 wow fadeInUp"><?php echo $titulo; ?></h2>
      </div>
    <?php endif; ?>

    <div class="d-grid grid-cols-lg-2 gap-100 row-gap-0 ps-lg-0 ps-42">
      <?php if (!empty($items)) { ?>
        <?php foreach ($items as $index => $item) { 
           $titulo         = !empty($item['titulo']) ? esc_html($item['titulo']) : '';
           $descripcion    = !empty($item['descripcion']) ? $item['descripcion'] : '';
           $isEven         = ($index + 1) % 2 === 0;
           $textAlign      = $isEven ? 'text-lg-start' : 'text-lg-end';
           $justifyContent = $isEven ? 'justify-lg-start' : 'justify-lg-end';
           $paddingTop     = $isEven ? 'pt-lg-100 pb-lg-0 py-36' : '';
           $circlePosition = !$isEven ? 'customIconoCirculoRight' : 'customIconoCirculoLeft';
        ?>
          <div class="col-12 <?php echo $paddingTop; ?>">
            <div class="<?php echo $textAlign; ?>">
              <p class="fs-lg-1 fs-2 text-primary-150 mb-12 wow fadeInUp customContador"><?php echo $titulo; ?></p>
              <div class="d-flex <?php echo $justifyContent; ?>">
                <div class="col-lg-8 col-12 position-relative">
                  <div class="line line-azul py-6 wow fadeInUp"></div>
                  <span class="customIcono customIconoCirculo <?php echo $circlePosition; ?> wow fadeInUp" data-wow-delay="1.2s"></span>
                  <div class="font-poppins fs-p wow fadeInUp"><?php echo $descripcion; ?></div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</section>
<div class="line"></div>