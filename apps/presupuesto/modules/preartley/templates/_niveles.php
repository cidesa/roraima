
  <?php $value = object_checkbox_tag($cpartley, 'getStacon', array (
  'control_name' => 'cpartley[stacon]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo __('Nivel I (Dirección de Presupuesto)'); ?>


  <?php $value = object_checkbox_tag($cpartley, 'getStagob', array (
  'control_name' => 'cpartley[stagob]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo __('Nivel II (Despacho de Alcalde)'); ?>

  <?php $value = object_checkbox_tag($cpartley, 'getStapre', array (
  'control_name' => 'cpartley[stapre]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo __('Nivel III (Camara Municipal)'); ?>
