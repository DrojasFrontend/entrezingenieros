<?php
$sitename         = get_bloginfo('name');
$grupo_miembros   = get_field("grupo_miembros");
$titulo           = !empty($grupo_miembros['titulo']) ? esc_html($grupo_miembros['titulo']) : '';
$items            = !empty($grupo_miembros['items']) ? $grupo_miembros['items'] : [];

?>

<section class="py-lg-54 py-36 px-18">
  <div class="container px-0">
    <?php if ($titulo) : ?>
      <div class="text-center mb-lg-36 mb-12">
        <h2 class="fs-lg-2 fs-4 wow fadeInUp" data-wow-delay="1s"><?php echo $titulo; ?></h2>
      </div>
    <?php endif; ?>

    <?php if (!empty($items)) { ?>
      <div class="px-lg-120">
        <div class="row">
          <?php foreach ($items as $key => $item) { 
            $imagen_id  = !empty($item['imagen']['ID']) ? intval($item['imagen']['ID']) : '';
            $cta        = !empty($item['cta']) ? $item['cta'] : '';
            $cta_url    = !empty($cta['url']) ? esc_url($cta['url']) : '';
            $cta_target = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
            $cta_texto  = !empty($cta['title']) ? esc_html($cta['title']) : '';
          ?>
            <div class="col-12 col-lg-6">
              <a href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>" title="<?php echo $cta_texto; ?>" class="d-flex justify-center align-center h-100 wow fadeInUp" data-wow-delay="1.<?php echo $key; ?>s">
                <?php echo generar_image_responsive($imagen_id, 'custom-size', 'd-flex img-fluid', $titulo); ?>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
</section>