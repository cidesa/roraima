<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('cpdefniv[rupcat]', options_for_select(Array(''=>'','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8'),$cpdefniv->getRupcat()),array(
					  'onchange' => "javascript: nivelDisponibilidad()")); ?>