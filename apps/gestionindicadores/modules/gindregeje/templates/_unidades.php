<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arruni=$params['unidades']?>

 <?php echo select_tag('giproanu[unidades]', options_for_select($arruni,$giproanu->getUnidades()), array (
			'onChange'=> remote_function(array(
			  'update'   => 'divgridtri',
			  'url'      => 'gindregeje/ajax',
			  'condition'=> "  $('giproanu_unidades').value!=''",
			  'complete' => 'AjaxJSON(request, json)',
			  'with' => "'ajax=1&codigo='+this.value+'&anoindg='+$('giproanu_anoindg').value+'&revanoindg='+$('giproanu_revanoindg').value+'&numtrim='+$('giproanu_numtrim').value",
			        )),
)); ?>