<?php
/**
 * Template para mostrar resultados de búsqueda
 */

get_header();
?>

<main class="customSearchResults">
    <section class="py-lg-0 py-50">
        <h1 class="fs-lg-1 fs-2 text-center mb-lg-42 mb-24">Resultados de búsqueda</h1>
        <span class="line"></span>
    </section>

    <section class="py-lg-60 px-lg-120 px-18">
        <div class="container px-0 pb-lg-0 pb-50">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a class="d-block text-primary fw-medium py-lg-24 py-12" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <span class="d-block mb-6 fs-3"><?php the_title(); ?></span>
                        <span class="d-flex gap-6 align-center fw-light fs-p">
                            Visitar
                            <i class="customIcono customIcono-flecha"></i>
                        </span>
                    </a>
                    <span class="line"></span>
                <?php endwhile; ?>
    
                <?php the_posts_pagination(); ?>
    
            <?php else : ?>
                <div class="customSearchResultsNoResults">
                    <p>No se encontraron resultados para tu búsqueda.</p>
                    <p>Intenta con otros términos o navega por nuestras categorías.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-lg-60 px-lg-60">
            <a class="btn btn-primary px-50" href="<?php echo home_url(); ?>" title="Regresar">
                Regresar
            </a>
        </div>
    </section>

    
    
</main>

<?php
get_footer(); 