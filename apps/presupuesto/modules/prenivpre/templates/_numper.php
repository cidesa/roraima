<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('cpdefniv[numper]', options_for_select(Constantes::ListaNumPeriodos(),$cpdefniv->getNumper()),array(
					  'onchange' => "javascript: cargargridper()",
)); ?>
