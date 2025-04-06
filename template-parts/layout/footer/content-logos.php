<?php 
    $sitename         = get_bloginfo('name');
    $contentGlobal    = get_page_by_path('contenido-heade-footer')->ID;
    $grupo_footer     = ($contentGlobal) ? get_field('grupo_footer', $contentGlobal) : null;
    $logos            = !empty($grupo_footer['logos']) ? $grupo_footer['logos'] : [];
    ?>
<div class="col-lg-2 mb-lg-0 mb-12 text-lg-start text-center iso">
   <div class="row justify-center">
        <?php foreach ($logos as $key => $logo) { ?>
            <a class="col-2 col-lg-4 ps-0" href="<?php echo $logo['cta']; ?>">
                <img class="" src="<?php echo $logo['imagen']; ?>" alt="">
            </a>
        <?php } ?>
   </div>
</div>