  <?php $value = object_input_tag($forregart, array('getMonto',true), array (
  'size' => 10,
  'control_name' => 'forregart[monto]',
  'onBlur'=> "javascript:event.keyCode=13;entermontootro(event, this.id); "
)); echo $value ? $value : '&nbsp;' ?>