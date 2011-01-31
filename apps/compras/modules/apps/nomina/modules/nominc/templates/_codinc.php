  <?php $value = object_input_tag($npincapa, 'getCodinc', array (
  'size' => 8,
  'control_name' => 'npincapa[codinc]',
  'maxlength' =>  8,
  'readonly'  =>  $npincapa->getId()!='' ? true : false,
  'onBlur'  =>   ' $("npincapa_codinc").value == "" ? $("npincapa_codinc").value="########" : "" ',
)); echo $value ? $value : '&nbsp;' ?>
