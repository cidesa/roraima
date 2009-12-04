  <?php $value = object_input_tag($cpcausad, 'getRefcau', array (
  'size' => 20,
  'readonly'  =>  $cpcausad->getId()!='' ? true : false ,
  'control_name' => 'cpcausad[refcau]',
  'onblur' => 'rellenar()',
  'readonly'  =>  $cpcausad->getId()!='' ? true : false ,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>