<?php 
$grupo_titulo_pagina  = get_field("grupo_titulo_pagina");
$activar_fondo        = !empty($grupo_titulo_pagina['activar_fondo']) ? $grupo_titulo_pagina['activar_fondo'] : '';
$titulo               = !empty($grupo_titulo_pagina['titulo']) ? esc_html($grupo_titulo_pagina['titulo']) : '';
$descripcion          = !empty($grupo_titulo_pagina['descripcion']) ? $grupo_titulo_pagina['descripcion'] : '';
?>
<section class="px-lg-18">
  <div class="container px-0">
    <div class="d-flex flex-column align-center py-lg-42 py-36 rounded-lg wow fadeInUp <?php if($activar_fondo) { ?> customFondoAzul <?php } ?>" data-wow-delay="1s">
      <div class="col-lg-7 col-12 text-lg-center text-start px-lg-42 px-24 mb-6">
        <?php if($titulo) { ?>
          <h1 class="fs-lg-1 fs-2 wow fadeInUp" data-wow-delay="1.1s"><?php echo $titulo; ?></h1>
        <?php } ?>
      </div>
      <?php if($descripcion) { ?>
        <div class="col-9">
          <div class="font-poppins fs-p text-lg-center fw-regular wow fadeInUp" data-wow-delay="1.2s">
            <?php echo $descripcion; ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>