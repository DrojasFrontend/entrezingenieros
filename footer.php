<?php 
$sitename         = get_bloginfo('name');
$grupo_logo_redes = get_field('grupo_logo_redes', 'option');
$grupo_menus      = get_field('grupo_menus', 'option');
$grupo_newsletter = get_field('grupo_newsletter', 'option');

/* Logo */        $logo_footer              = !empty($grupo_logo_redes['logo_footer']) ? $grupo_logo_redes['logo_footer'] : '';
/* Redes */       $redes                    = !empty($grupo_logo_redes['redes']) ? $grupo_logo_redes['redes'] : [];
/* Menus */       $menus                    = !empty($grupo_menus['menus']) ? $grupo_menus['menus'] : [];
/* Newsletter */  $newsletter_titulo        = !empty($grupo_newsletter['titulo']) ? esc_html($grupo_newsletter['titulo']) : '';
/* Newsletter */  $newsletter_descripcion   = !empty($grupo_newsletter['descripcion']) ? $grupo_newsletter['descripcion'] : '';
/* Newsletter */  $newsletter_shortcode     = !empty($grupo_newsletter['shortcode_formulario']) ? $grupo_newsletter['shortcode_formulario'] : [];
/* Newsletter */  $newsletter_contactos     = !empty($grupo_newsletter['contactos']) ? $grupo_newsletter['contactos'] : [];
?>

<footer class="footer w-100 px-lg-24 pt-24">
    <div class="bg-primary px-lg-36 px-24 rounded">
      <div class="row flex-lg-row flex-column-reverse">
        <div class="col-lg-7 col-12 pt-lg-42 pb-12 pe-lg-80">
          <div class="row flex-lg-row flex-column-reverse">
            <!-- Logo y Redes -->
            <div class="col-lg-3 col-12 pt-lg-0 pt-18 text-center text-lg-start">
              <img class="mb-24" src="<?php echo $logo_footer; ?>" alt="Logo Footer Entrez Ingenieros Civiles - <?php echo $sitename; ?>" title="logo footer entrez ingenieros civiles">
              <?php if (!empty($redes)) { ?>
                <ul class="d-flex justify-center justify-lg-start gap-12">
                  <?php foreach ($redes as $red) { 
                    $icono      = !empty($red['imagen']) ? $red['imagen'] : '';
                    $cta        = !empty($red['enlace']) ? $red['enlace'] : '';
                    $cta_url    = !empty($cta['url']) ? esc_url($cta['url']) : '';
                    $cta_titulo = !empty($cta['title']) ? esc_html($cta['title']) : '';
                    $cta_target = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
                  ?>
                    <li>
                      <a href="<?php echo esc_url($cta_url); ?>" class="d-block" title="<?php echo $cta_titulo; ?>" target="<?php echo esc_attr($cta_target); ?>">
                        <span class="visually-hidden"><?php echo $cta_titulo; ?></span>
                        <img class="" src="<?php echo $icono; ?>" alt="">
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </div>
            <!-- Menus -->
            <div class="col-lg-9 col-12 d-grid grid-cols-lg-2 gap-lg-36 gap-24">
              <?php if (!empty($menus)) : ?>
                <?php foreach ($menus as $menu) : 
                  $titulo_menu = !empty($menu['titulo']) ? esc_html($menu['titulo']) : '';
                  $menu_items = !empty($menu['menu_item']) ? $menu['menu_item'] : [];
                ?>
                  <div class="menu-column">
                    <?php if ($titulo_menu) : ?>
                      <h3 class="font-poppins p text-gray fw-semibold mb-6"><?php echo $titulo_menu; ?></h3>
                    <?php endif; ?>
                    
                    <div class="line"></div>
                    
                    <?php if (!empty($menu_items)) : ?>
                      <ul class="mt-12 menu-list p-0">
                        <?php foreach ($menu_items as $menu_item) : 
                          $cta        = !empty($menu_item['link']) ? $menu_item['link'] : [];
                          $cta_url    = !empty($cta['url']) ? esc_url($cta['url']) : '#';
                          $cta_titulo = !empty($cta['title']) ? esc_html($cta['title']) : '';
                          $cta_target = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
                          
                          if (empty($cta_titulo)) continue;
                        ?>
                          <li class="py-2">
                            <a href="<?php echo $cta_url; ?>" 
                              class="position-relative font-poppins fs-p-small text-white fw-regular customHoverLink customHoverLink-blanco" 
                              <?php if ($cta_target !== '_self') : ?>target="<?php echo $cta_target; ?>"<?php endif; ?>
                              <?php if ($cta_target === '_blank') : ?>rel="noopener"<?php endif; ?>>
                              <?php echo $cta_titulo; ?>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-xl-6 m-xl-auto">
            <p class="pt-lg-72 pt-12 ps-xl-12 font-poppins fs-p-small text-gray text-center text-xl-start">
              Todos los derechos reservados Entrez <?php echo date('Y'); ?>
            </p>
          </div>
        </div>
        <div class="col-lg-5 col-12 pt-lg-42 pt-24 pb-12 ps-lg-36 customNewsletterFooter">
          <div>
            <?php if($newsletter_titulo) : ?>
              <h2 class="fs-3 text-white mb-6"><?php echo $newsletter_titulo; ?></h2>
            <?php endif; ?>
            <?php if($newsletter_descripcion) : ?>
              <div class="font-poppins fs-p-small text-white mb-12"><?php echo $newsletter_descripcion; ?></div>
            <?php endif; ?>
            <div class="customInputEmail mb-12">
              <?php 
                if (!empty($newsletter_shortcode)) {
                  echo do_shortcode($newsletter_shortcode);
                }
              ?>
            </div>
            <div class="d-xxl-flex gap-36">
              <?php if (!empty($newsletter_contactos)) { ?>
                <?php foreach ($newsletter_contactos as $contacto) { 
                  $cta              = !empty($contacto['link']) ? $contacto['link'] : '';
                  $cta_url          = !empty($cta['url']) ? esc_url($cta['url']) : '';
                  $cta_titulo       = !empty($cta['title']) ? esc_html($cta['title']) : '';
                  $cta_target       = !empty($cta['target']) ? esc_attr($cta['target']) : '_self';
                ?>
                  <?php if ($cta_url && $cta_titulo) : 
                    $icon_class = 'customIcono-flecha';
                    
                    if (strpos($cta_url, 'tel:') === 0) {
                      $icon_class = 'customIcono-telefono';
                    } elseif (strpos($cta_url, 'mailto:') === 0) {
                      $icon_class = 'customIcono-mail';
                    }
                  ?>
                    <a href="<?php echo esc_url($cta_url); ?>" class="font-poppins d-flex align-center gap-10 fs-p-small text-white fw-regular customHoverLink customHoverLink-blanco" target="<?php echo esc_attr($cta_target); ?>">
                      <i class="customIcono <?php echo esc_attr($icon_class); ?>"></i>
                      <?php echo esc_html($cta_titulo); ?>
                    </a>
                  <?php endif; ?>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
  <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css">
  <!-- <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script> -->
</body>
</html>