  <?php $value = object_input_tag($ciasiini, array('getMonasi',true), array (
  <?php $value = object_input_tag($ciasiini, array('getMonasi',true), array (
  'size' => 20,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id), cargarasignacion()',
  //'onBlur' => "javascript: cargarasignacion()",
  'control_name' => 'ciasiini[monasi]',
)); echo $value ? $value : '&nbsp;' ?>  'size' => 20,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id), cargarasignacion()',
  //'onBlur' => "javascript: cargarasignacion()",
  'control_name' => 'ciasiini[monasi]',
)); echo $value ? $value : '&nbsp;' ?>