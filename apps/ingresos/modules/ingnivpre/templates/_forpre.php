  <?php $value = object_input_tag($cidefniv, 'getForpre', array (
  'readonly' => $cidefniv->getId()!='' ? true : false ,
  'size' => '40,',
  'control_name' => 'cidefniv[forpre]',
  'maxlength' => 32,
)); echo $value ? $value : '&nbsp;' ?>