<?php
  $categoria = $args['first_category'];
?>
<article class="clickeable">  
  <div class="d-flex mb-18 overflow-hidden rounded">
    <?php if (has_post_thumbnail()) : ?>
      <img class="rounded-6 img-fluid" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
    <?php else : ?>
      <img class="rounded-6 img-fluid" src="<?php echo THEME_IMG . 'post-1.png'?>" alt="<?php echo esc_attr(get_the_title()); ?>">
    <?php endif; ?>
  </div>
  <?php if ($categoria) : ?>
    <span class="customCategoria d-inline-block fs-p-small text-primary-200 fw-regular border-1 rounded-6 px-12 py-6 mb-12">
      <?php echo $categoria; ?>
    </span>
  <?php endif; ?>
  <h3 class="fs-3 mb-12"><?php echo esc_html(get_the_title()); ?></h3>
  <p class="font-poppins fs-p mb-12"><?php echo esc_html(get_the_excerpt()); ?></p>
  <p class="font-poppins fs-p-small mb-24">
    <span>Publicado el:</span> <?php echo get_the_date('j \d\e F'); ?> - <span>6 minutos de lectura</span>
  </p>
  <a href="<?php the_permalink(); ?>" class="d-flex align-center gap-12 text-primary">
    Leer noticia
    <i class="customIcono customIcono-flecha"></i>
  </a>
</article>