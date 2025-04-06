<?php
/**
 * Template para mostrar posts individuales
 */

get_header();
?>
<main>
    <?php while (have_posts()) : the_post(); 
        $grupo_informacion_adicional = get_field("grupo_informacion_adicional");
        $imagen_principal            = !empty($grupo_informacion_adicional['imagen_principal']['ID']) ? intval($grupo_informacion_adicional['imagen_principal']['ID']) : '';
        $imagen_principal_mobile     = !empty($grupo_informacion_adicional['imagen_principal_mobile']['ID']) ? intval($grupo_informacion_adicional['imagen_principal_mobile']['ID']) : '';

        $grupo_descripcion = get_field("grupo_descripcion");
        $descripcion = $grupo_descripcion['descripcion'];
    ?>
        <!-- Hero -->
        <section class="px-24" id="top">
            <div class="customFondoTarjeta py-lg-42 px-lg-36 p-24 rounded mt-lg-0 my-24">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) : ?>
                    <span class="customCategoria d-inline-block fs-p-small text-primary-200 fw-regular border-1 rounded-6 px-12 py-6 mb-12">
                        <?php echo esc_html($categories[0]->name); ?>
                    </span>
                <?php endif; ?>
                <h1 class="fs-lg-1 fs-2 fw-semibold py-lg-24 py-12"><?php echo the_title(); ?></h1>
                <p class="font-poppins fs-p">
                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                </p>
            </div>
            <?php if ($imagen_principal_mobile) : ?>
                <?php echo generar_image_responsive($imagen_principal_mobile, 'custom-size', 'd-lg-none rounded img-fluid shadow-card', get_the_title()); ?>
                <?php echo generar_image_responsive($imagen_principal, 'custom-size-2x', 'd-none d-lg-block rounded img-fluid shadow-card', get_the_title()); ?>
            <?php else : ?>
                <?php echo generar_image_responsive($imagen_principal, 'custom-size-2x', 'rounded img-fluid shadow-card', get_the_title()); ?>
            <?php endif; ?>
        </section>

        <section class="customBlogDescripcion">
            <div class="container">
                <div class="px-xl-120 pt-36 pb-12">
                    <?php echo $descripcion; ?>
                </div>
            </div>
        </section>

        <section class="py-42">
            <div class="container">
                <div class="px-xl-120 px-md-36">
                    <div class="row d-flex flex-lg-row flex-column-reverse gap-lg-0 gap-36">
                        <div class="col-12 col-lg-6">
                            <a href="#top" class="btn btn-blanco">
                                <i class="fa-solid fa-arrow-left"></i>
                                Volver arriba
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 d-flex flex-lg-row flex-column align-center justify-lg-end justify-center gap-18">
                            <p class="font-poppins fs-p fw-regular text-primary">Compartir en:</p>
                            <div class="d-flex justify-end gap-18">
                                <?php
                                $current_url = urlencode(get_permalink());
                                $title = urlencode(get_the_title());
                                ?>
                                <!-- Email -->
                                <a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $current_url; ?>" class="" target="_blank">
                                    <i class="customIcono customIcono-mail-circulo-azul"></i>
                                </a>

                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" class="" target="_blank">
                                    <i class="customIcono customIcono-facebook-circulo-azul"></i>
                                </a>

                                <!-- LinkedIn -->
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url; ?>&title=<?php echo $title; ?>" class="" target="_blank">
                                    <i class="customIcono customIcono-linkedin-circulo-azul"></i>
                                </a>

                                <!-- WhatsApp -->
                                <a href="https://api.whatsapp.com/send?text=<?php echo $title . ' ' . $current_url; ?>" class="" target="_blank">
                                    <i class="customIcono customIcono-whatsapp-circulo-azul"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<?php
get_footer();
?>
