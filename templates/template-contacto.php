<?php
/**
 * Template Name: Página de Contacto
 * 
 * @package ThemeEntrezingenieros
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

$grupo_contacto         = get_field('grupo_contacto');
$titulo                 = !empty($grupo_contacto['titulo']) ? esc_html($grupo_contacto['titulo']) : '';
$descripcion            = !empty($grupo_contacto['descripcion']) ? $grupo_contacto['descripcion'] : '';
$shortcode_formualrio   = !empty($grupo_contacto['shortcode_formualrio']) ? $grupo_contacto['shortcode_formualrio'] : '';

$grupo_ubicacion        = get_field('grupo_ubicacion');
$titulo_ubicacion       = !empty($grupo_ubicacion['titulo']) ? esc_html($grupo_ubicacion['titulo']) : '';
$mapa                   = !empty($grupo_ubicacion['mapa']) ? $grupo_ubicacion['mapa'] : '';
$direcciones            = !empty($grupo_ubicacion['direcciones']) ? $grupo_ubicacion['direcciones'] : [];
?>
  <main>
    <!-- <?php get_template_part('template-parts/componentes/componente', 'titulo-fondo') ?> -->
    <section class="px-lg-18 px-36 pt-lg-0 pt-36">
        <div class="container px-0">
            <div class="row">
                <!-- Formulario de contacto -->
                <div class="col-12 col-lg-6 mb-lg-0 mb-24">
                    <div class="shadow-card rounded p-24 pt-42 pb-18 px-lg-36 px-18">
                        <?php if ($titulo) : ?>
                            <h1 class="fs-lg-2 fs-4 fw-semibold mb-6 wow fadeInUp" data-wow-delay="1s">
                                <?php echo $titulo; ?>
                            </h1>
                        <?php endif; ?>
                        <?php if ($descripcion) : ?>
                            <div class="font-poppins fs-p fw-regular mb-36 wow fadeInUp" data-wow-delay="1.1s">
                                <?php echo $descripcion; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($shortcode_formualrio) : ?>
                            <div class="wow fadeInUp" data-wow-delay="1.2s"">
                                <?php echo do_shortcode($shortcode_formualrio); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Visítanos -->
                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="1s">
                    <?php if ($titulo_ubicacion) : ?>
                        <h2 class="fs-lg-3 fs-4 fw-semibold mb-12"><?php echo $titulo_ubicacion; ?></h2>
                    <?php endif; ?>
                    <div>
                        <div class="row">
                            <?php foreach ($direcciones as $direccion) : 
                            $detalle    = !empty($direccion['detalle']) ? $direccion['detalle'] : '';
                            $waze       = !empty($direccion['waze']) ? $direccion['waze'] : '';
                            $google_map = !empty($direccion['google_map']) ? $direccion['google_map'] : '';
                            ?>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-7">
                                            <?php if ($detalle) : ?>
                                                <div class="font-poppins mb-12">
                                                    <?php echo $detalle; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <?php if ($waze) : ?>
                                                <div class="d-flex align-center gap-12 mb-12">
                                                    <i class="customIcono customIcono-waze"></i>
                                                    <a href="<?php echo $waze; ?>" class="fs-p fw-regular text-primary">
                                                    Ir con Waze
                                                </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($google_map) : ?>
                                                <div class="d-flex align-center gap-12">
                                                    <i class="customIcono customIcono-ubicacion"></i>
                                                    <a href="<?php echo $google_map; ?>" class="fs-p fw-regular text-primary">
                                                    Ver en Google Maps
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if ($mapa) : ?>
                        <div class="row">
                            <div class="col-12 pt-36">
                                <?php echo $mapa; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
  </main>
<?php 
get_footer();
?>