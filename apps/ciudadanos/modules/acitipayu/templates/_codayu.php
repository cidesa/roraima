  <?php $value = object_input_tag($attipayu, 'getCodayu', array (
  'size' => 3,
  'readonly' => $attipayu->getId()!='' ? true : false,
  'control_name' => 'attipayu[codayu]',
  'onblur' => "if($('attipayu_codayu').value=='') $('attipayu_codayu').value='###'",
)); echo $value ? $value : '&nbsp;' ?>