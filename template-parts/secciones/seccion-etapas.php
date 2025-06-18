<?php
$sitename   = get_bloginfo('name');


$args = array(
  'post_type' => 'servicios',
  'posts_per_page' => -1,
  'order' => 'DESC'
);

$servicios_query = new WP_Query($args);
?>

<?php if ($servicios_query->have_posts()) { ?>
  <?php while ($servicios_query->have_posts()) { ?>
    <?php $servicios_query->the_post(); 
      $grupo_descripcion  = get_field("grupo_descripcion");
      $descripcion        = !empty($grupo_descripcion['descripcion']) ? $grupo_descripcion['descripcion'] : '';

      $grupo_tabs         = get_field("grupo_tabs");
      $tabs               = !empty($grupo_tabs['tabs']) ? $grupo_tabs['tabs'] : [];
      $post_id            = get_the_ID();
    ?>
      <section class="customSeccionEtapas py-42 px-18 bg-gray-100" id="<?php echo get_the_title(); ?>">
        <div class="container px-0">
          <div class="text-center">
            <p class="fs-p-small mb-2 wow fadeInUp" data-wow-delay="1s">Etapa</p>
            <h2 class="fs-lg-2 fs-4 mb-12 wow fadeInUp" data-wow-delay="1.1s"><?php echo get_the_title(); ?></h2>
            <?php if ($descripcion) : ?>
              <div class="col-lg-6 col-12 px-lg-12 m-auto mb-30">
                <div class="font-poppins fs-p wow fadeInUp" data-wow-delay="1.2s">
                  <?php echo $descripcion; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
      
          <div class="px-lg-100">
            <?php if (!empty($tabs)) : ?>
              <!-- Navegación de tabs -->
              <ul class="nav nav-pills d-flex flex-lg-row flex-column justify-center gap-12 mb-lg-30" id="pills-tab-<?php echo $post_id; ?>" role="tablist">
                <?php foreach ($tabs as $key => $tab) : 
                  $tab_id = "tab-{$post_id}-{$key}";
                ?>
                  <li class="customTab__link wow fadeInUp" data-wow-delay="1.3s" role="presentation">
                    <button class="font-poppins fs-lg-p fs-p-small text-primary w-100 py-16 px-lg-24 px-12 bg-transparent shadow-lg-none shadow-card" 
                            id="<?php echo $tab_id; ?>-button" 
                            data-bs-toggle="pill" 
                            data-bs-target="#<?php echo $tab_id; ?>-content" 
                            type="button" 
                            role="tab" 
                            aria-controls="<?php echo $tab_id; ?>-content" 
                            aria-selected="false">
                      <?php echo $tab['titulo_tab']; ?>
                    </button>
                  </li>
                <?php endforeach; ?>
              </ul>

              <!-- Contenido de tabs -->
              <div class="tab-content" id="pills-tabContent-<?php echo $post_id; ?>">
                <?php foreach ($tabs as $key => $tab) : 
                  $tab_id = "tab-{$post_id}-{$key}";
                ?>
                  <div class="tab-pane fade" 
                       id="<?php echo $tab_id; ?>-content" 
                       role="tabpanel" 
                       aria-labelledby="<?php echo $tab_id; ?>-button">
                    <div class="d-lg-grid d-flex grid-cols-lg-2 flex-column gap-lg-36 pt-lg-0 pt-24">
                      <div class="col-12 text-start">
                        <h3 class="fs-3 mb-12"><?php echo $tab['titulo']; ?></h3>
                        <div class="font-poppins fs-p mb-30">
                          <?php echo $tab['descripcion']; ?>
                        </div>
                      </div>
                      <div class="col-12">
                        <?php if (!empty($tab['titulo_2'])) : ?>
                          <h3 class="fs-3 mb-12"><?php echo $tab['titulo_2']; ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($tab['descripcion_2'])) : ?>
                          <div class="font-poppins fs-p mb-30">
                            <?php echo $tab['descripcion_2']; ?>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php if (!empty($tab['cta'])) : ?>
                      <a href="<?php echo $tab['cta']['url']; ?>" class="btn btn-primary m-auto" target="<?php echo $tab['cta']['target']; ?>" title="<?php echo $tab['cta']['title']; ?>">
                        <?php echo $tab['cta']['title']; ?>
                      </a>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section>
      <div class="line wow fadeInUp" data-wow-delay="1s"></div>
  <?php } ?>
<?php } ?>

<?php wp_reset_postdata(); ?>



