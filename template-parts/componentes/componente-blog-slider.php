<?php 
$blog_slider = array(
  'post_type'       => 'post',
  'posts_per_page'  => 10,
  'orderby'         => 'date',
  'order'           => 'DESC',
  'post_status'     => 'publish'
);
$query_blog_slider = new WP_Query($blog_slider);

$grupo_novedades_actualidad = get_field("grupo_novedades_actualidad");
$titulo                     = !empty($grupo_novedades_actualidad['titulo']) ? esc_html($grupo_novedades_actualidad['titulo']) : "";
?>

<?php if ($query_blog_slider->have_posts()) : ?>
  <section class="py-lg-54 py-36 px-lg-18 ps-18 bg-gray-100">
    <div class="container px-0">
      <?php if($titulo) { ?>
        <h2 class="fs-lg-2 fs-4 mb-24 wow fadeInUp" data-wow-delay="1s"><?php echo $titulo; ?></h2>
      <?php } ?>
      <div class="swiper blogSwiper">
        <div class="swiper-wrapper">
          <?php
            $i = 1;
            while ($query_blog_slider->have_posts()) :
              $query_blog_slider->the_post();
              $categories     = get_the_category();
              $first_category = !empty($categories) ? $categories[0]->name : '';
              $category_ids   = wp_list_pluck($categories, 'term_id');
              
              $delay = "1." . $i;
          ?>
            <div class="swiper-slide customImgHover wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
              <?php get_template_part('template-parts/componentes/componente', 'blog-tarjeta', array('first_category' => $first_category)); ?>
            </div>
          <?php 
              $i++;
            endwhile;
            wp_reset_postdata();
          ?>
        </div>
      </div>
      <div class="d-flex align-center justify-center mt-24 gap-12">
        <div class="customButtonSwiper swiper-button-prev-blog">
          <i class="customIcono customIcono-arrow"></i>
        </div>
        <div class="customPaginacionSwiper swiper-pagination-blog"></div>
        <div class="customButtonSwiper swiper-button-next-blog">
          <i class="customIcono customIcono-arrow customIcono-invertido"></i>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>