  <?php $value = object_input_tag($fctiplic, 'getCodtiplic', array (
  'readonly'  =>  $fctiplic->getId()!='' ? true : false ,
  'size' => 12,
  'maxlength' => 6,
  'control_name' => 'fctiplic[codtiplic]',
  //'onKeyPress'  => "javascript: enter(event,this.value);",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(6,'0',0);document.getElementById('fctiplic_codtiplic').value=valor;document.getElementById('fctiplic_codtiplic').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>