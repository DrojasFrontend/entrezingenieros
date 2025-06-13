<?php 
    $sitename         = get_bloginfo('name');
    $contentGlobal    = get_page_by_path('contenido-heade-footer')->ID;
    $grupo_footer     = ($contentGlobal) ? get_field('grupo_footer', $contentGlobal) : null;
    $logo             = !empty($grupo_footer['imagen']) ? $grupo_footer['imagen'] : '';
    ?>
<div class="col-lg-3 mb-lg-0 mb-42">
    <img class="w-auto" src="<?php echo $logo; ?>" alt="logo clinica sanrafael - <?php echo $sitename; ?>" title="logo clinica sanrafael - ">
</div>