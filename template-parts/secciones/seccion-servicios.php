<?php
$args = array(
  'post_type' => 'servicios',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'DESC'
);

$servicios_query = new WP_Query($args);
$grupo_nuestros_servicios = get_field("grupo_nuestros_servicios");
$titulo                   = !empty($grupo_nuestros_servicios['titulo']) ? esc_html($grupo_nuestros_servicios['titulo']) : "";
?>

<section class="py-lg-54 py-36 px-18">
  <div class="container px-0">
    <?php if($titulo) { ?>
      <h2 class="fs-lg-2 fs-4 mb-24 wow fadeInUp" data-wow-delay="1.1s"><?php echo $titulo; ?></h2>
    <?php } ?>
    <div class="d-grid grid-cols-lg-3 grid-cols-1 gap-36">
      <?php if ($servicios_query->have_posts()) : ?>
        <?php while ($servicios_query->have_posts()) : $servicios_query->the_post(); 
          $grupo_informacion_adicional  = get_field("grupo_informacion_adicional");
          $cantidad                     = !empty($grupo_informacion_adicional['cantidad']) ? esc_html($grupo_informacion_adicional['cantidad']) : '';
          $items                        = !empty($grupo_informacion_adicional['items']) ? $grupo_informacion_adicional['items'] : [];
        ?>
          <div class="flip-card wow fadeInUp" data-wow-delay="1.2s">
            <div class="flip-card-inner text-center">
              <div class="flip-card-front d-flex flex-column justify-center shadow-card rounded py-24 customFondoTarjeta">
                <?php if (get_the_title()) : ?>
                  <h3 class="fs-3 mb-6"><?php echo esc_html(get_the_title()); ?></h3>
                <?php endif; ?>
                <div class="px-36 mb-24">
                  <span class="line line-azul"></span>
                </div>
                <p class="font-poppins fs-p-small"><?php echo esc_html__('Hemos alcanzado:', ''); ?></p>
                <?php if (!empty($cantidad)) : ?>
                  <p class="fs-lg-1 fs-2"><?php echo $cantidad; ?></p>
                <?php endif; ?>
              </div>
              <div class="flip-card-back d-flex flex-column justify-start px-18 py-24 shadow-card rounded bg-primary-100">
                <a href="/nuestros-servicios/#<?php echo get_the_title(); ?>" class="d-flex justify-between align-center w-100 mb-12 py-6 px-12 text-start bg-white rounded-6 shadow-card">
                  <span>
                    <span class="d-block font-poppins fs-p-small"><?php echo esc_html__('Etapa:', 'ThemeEntrezingenieros'); ?></span>
                    <span class="fs-3 text-primary"><?php echo esc_html(get_the_title()); ?></span>
                  </span>
                  <i class="customIcono customIcono-arrow customIcono-arrow-scale"></i>
                </a>
                <?php if (!empty($items)) : ?>
                  <?php foreach ($items as $item) : ?>
                    <?php if (!empty($item['titulo']) || !empty($item['detalle'])) : ?>
                      <div class="w-100 mb-12 text-start">
                        <?php if (!empty($item['titulo'])) : ?>
                          <p class="font-poppins fs-p fw-semibold"><?php echo esc_html($item['titulo']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($item['detalle'])) : ?>
                          <p class="font-poppins fs-p-small text-gray-200"><?php echo esc_html($item['detalle']); ?></p>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>