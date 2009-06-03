<?php
//echo image_tag('/'.sfConfig::get('sf_upload_dir_name').'/fotos/'.$catreginm->getFotinm(), 'alt=imagen size=80x90');
?>


  <?php  //$value = get_partial('fotemp', array('type' => 'edit', 'nphojint' => $nphojint)); echo $value ? $value : '&nbsp;' ?>


  <?php $value = object_admin_input_file_tag($catreginm, 'getFotinm', array (
  'control_name' => 'catreginm[fotinm]',
  'size' => 10,
  'include_link' => 'fotos',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Tamaño de la foto 90x100 (jpg, gif o png)') ?></div>  </div>
