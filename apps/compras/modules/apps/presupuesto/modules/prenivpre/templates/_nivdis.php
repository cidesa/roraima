<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('cpdefniv[nivdis]', options_for_select(Array(''=>'','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16'),$cpdefniv->getNivdis()),array(
					  'onchange' => "javascript: validarNivel()")); ?>

