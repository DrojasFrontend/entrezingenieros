<?php
/**
 * Componente de búsqueda
 */
?>
<div class="customSearch mb-36 mb-lg-0">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="d-block d-lg-flex">
            <input type="search" class="form-control py-lg-6 py-12 mb-6 mb-lg-0 font-poppins fs-p-small text-gray-200 text-center rounded-6" placeholder="¿Qué estás buscando hoy?" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="btn btn-primary btn-primary-small fs-xl-p fs-p-small text-white">
                Buscar
            </button>
        </div>
    </form>
</div> 