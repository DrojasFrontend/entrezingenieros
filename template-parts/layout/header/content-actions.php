<?php
/**
 * Acciones del header (búsqueda y traducción)
 */
?>
<div class="customHeaderActions d-none d-lg-flex align-center justify-end gap-24">
    <!-- Botón de búsqueda -->
    <button type="button" class="font-poppins fs-xl-p fs-p-small btn btn-secundary btn-secundary-small" data-toggle-search>
        Búsqueda
    </button>

    <!-- Selector de idioma -->
    <div class="customLanguageSelector">
        <?php echo do_shortcode('[language-switcher]'); ?>
    </div>
</div> 