<?php 
  $titulo = !empty($args['titulo']) ? $args['titulo'] : '';
  $clase  = !empty($args['clase']) ? $args['clase'] : '';
?>
<h1 class="h1 <?php echo $clase; ?>"><?php echo $titulo; ?></h1>