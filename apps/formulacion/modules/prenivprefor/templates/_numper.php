<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('fordefniv[numper]', options_for_select(Constantes::ListaNumPeriodos(),$fordefniv->getNumper()),array(
					  'onchange' => "javascript: cargargridper()",
)); ?>
