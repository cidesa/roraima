  <?php $value = object_input_tag($ciasiini, array('getMonasi',true), array (
  'size' => 10,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id), cargarasignacion()',
  'control_name' => 'ciasiini[monasi]',
)); echo $value ? $value : '&nbsp;' ?>