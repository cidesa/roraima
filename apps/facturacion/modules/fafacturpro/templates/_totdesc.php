  <?php $value = object_input_tag($fafacturpro, 'getTotdesc', array (
  'readOnly' => true,
  'control_name' => 'fafacturpro[totdesc]',
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;

<?php echo link_to_function(image_tag('/images/salir.gif'), "ocultar('divgrid_fadescartpro','divtotdesc')") ?>