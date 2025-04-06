<?php
$sitename      = get_bloginfo('name');
$grupo_galeria = get_field("grupo_galeria");
$titulo        = !empty($grupo_galeria['titulo']) ? esc_html($grupo_galeria['titulo']) : "";
$itmes          = !empty($grupo_galeria['items']) ? $grupo_galeria['items'] : [];
?>
<section class="py-54">
  <div class="px-18">
    <div class="container px-0">
      <?php if($titulo) { ?>
        <h2 class="fs-lg-2 fs-4 mb-24 wow fadeInUp" data-wow-delay="1s"><?php echo $titulo; ?></h2>
      <?php } ?>
    </div>
  </div>
  <?php if($itmes) { ?>
    <div class="swiper clientesSwiper">
      <div class="swiper-wrapper">
        <?php foreach ($itmes as $key => $item) { 
          $imagen_id = !empty($item['imagen']['ID']) ? intval($item['imagen']['ID']) : '';
        ?>
          <div class="swiper-slide wow fadeInUp bg-primary-50 rounded" data-wow-delay="1.1s">
            <?php echo generar_image_responsive($imagen_id, 'custom-size', 'img-fluid',  $titulo); ?>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="d-flex align-center justify-center mt-24 gap-12  wow fadeInUp" data-wow-delay="1.7s">
      <div class="customButtonSwiper swiper-button-prev-clientes">
        <i class="customIcono customIcono-arrow"></i>
      </div>
      <div class="customPaginacionSwiper swiper-pagination-clientes"></div>
      <div class="customButtonSwiper swiper-button-next-clientes">
        <i class="customIcono customIcono-arrow customIcono-invertido"></i>
      </div>
    </div>
  <?php } ?>
</section>
<div class="line wow fadeInUp" data-wow-delay="1.8s"></div>