<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('cpasiini[asiper]', options_for_select(Array(''=>'Seleccione..','S'=>'Si','N'=>'No'),$cpasiini->getAsiper()),array(
 					  'onchange' => "javascript: activaSaldoActual()",
 					  'onclick' => "javascript: activaSaldoActual()")); ?>

