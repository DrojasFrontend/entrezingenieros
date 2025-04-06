<?php
  $first_category = $args['first_category'] ?? '';
?>
<div class="px-lg-150 px-18 py-lg-60 py-36">
    <article class="row d-flex flex-lg-row flex-column-reverse gap-lg-0 gap-24 clickeable">  
        <div class="col-12 col-lg-6">
            <?php if ($first_category) : ?>
              <span class="customCategoria d-inline-block fs-p-small text-primary-200 fw-regular border-1 rounded-6 px-12 py-6 mb-12">
                <?php echo $first_category; ?>
              </span>
            <?php endif; ?>
            <h2 class="fs-lg-2 fs-3 mb-6"><?php echo esc_html(get_the_title()); ?></h3>
            <p class="font-poppins fs-p mb-12"><?php echo esc_html(get_the_excerpt()); ?></p>
            <!-- <p class="font-poppins fs-p-small mb-24">
                Publicado el: <?php echo get_the_date('j \d\e F'); ?> - 6 minutos de lectura
            </p> -->
            <a href="<?php the_permalink(); ?>" class="d-flex align-center gap-12 text-primary" title="Leer noticia">
              <span class="customHoverLink">
                Leer noticia
              </span>
              <i class="customIcono customIcono-flecha"></i>
            </a>
        </div>
        <div class="col-12 col-lg-6">
          <div class="d-flex rounded overflow-hidden shadow-card">
            <?php if (has_post_thumbnail()) : ?>
              <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php else : ?>
              <img class="img-fluid" src="<?php echo THEME_IMG . 'image-placeholder.webp'?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php endif; ?>
          </div>
        </div>
    </article>
</div>