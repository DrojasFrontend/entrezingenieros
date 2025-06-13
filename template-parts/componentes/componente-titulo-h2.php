<?php 
  $titulo = !empty($args['titulo']) ? $args['titulo'] : '';
  $clase  = !empty($args['clase']) ? $args['clase'] : '';
?>
<h2 class="h2 text-secondary <?php echo $clase; ?>"><?php echo $titulo; ?></h2>