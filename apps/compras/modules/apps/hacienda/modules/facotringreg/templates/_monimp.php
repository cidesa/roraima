
  <?php $value = object_input_tag($fcotring, array('getMonimp',true), array (
  'size' => 10,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'fcotring[monimp]',
)); echo $value ? $value : '&nbsp;' ?>

<?
  $value = object_input_tag($fcotring, 'getMonimp', array (
  'size' => '10',
  'maxlength' => '20',
  'readonly'  =>  $fcotring->getId()!='' ? true : false ,
  'control_name' => 'fcotring[monimp]',
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur'=> remote_function(array(
        'update' => 'divDist',
        'url'      => 'facotringreg/ajax',
        'script' => true,
        'condition' => "$('fcotring_monimp').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json); event.keyCode=13;return formatoDecimal(event,this.id)',
        'with' => "'ajax=1&cajtexmos2=fcotring_nomcom&cajtexmos=fcotring_desdivgeo&nrocas='+$('fcotring_nrocas').value+'&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
