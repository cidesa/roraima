  <?php $value = object_input_tag($fcreginm, 'getNroinm', array (
  'readonly'  =>  $fcreginm->getId()!='' ? true : false ,
  'size' => 15,
  'maxlength' => 15,
  'control_name' => 'fcreginm[nroinm]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(15,'#',0);document.getElementById('fcreginm_nroinm').value=valor;document.getElementById('fcreginm_nroinm').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>


