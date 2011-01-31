<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php echo javascript_include_tag('dFilter') ?>
  <?php
  $mascara=$cideftit->getMascara();
  $value = object_input_tag($cideftit, 'getCodpre', array (
  'size' => 32,
  'readonly'  =>  $cideftit->getId()!='' ? true : false ,
  'control_name' => 'cideftit[codpre]',
  'maxlength' => $cideftit->getLonpre(),
  'onBlur' => 'codigopadre()',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
)); echo $value ? $value : '&nbsp;' ?>
