

  <?php $value = object_checkbox_tag($npcestatickets, 'getDiahab', array (
  'control_name' => 'npcestatickets[diahab]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo __('Dias Habiles'); ?>


  <?php $value = object_checkbox_tag($npcestatickets, 'getSabado', array (
  'control_name' => 'npcestatickets[sabado]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo __('Sabados'); ?>

  <?php $value = object_checkbox_tag($npcestatickets, 'getDoming', array (
  'control_name' => 'npcestatickets[doming]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo __('Domingos'); ?>

  <?php $value = object_checkbox_tag($npcestatickets, 'getDiafer', array (
  'control_name' => 'npcestatickets[diafer]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo __('Dias Feriados'); ?>


<script>
  tippagoticket();
</script>