<?php
$catparams="/param1/'+$('catman_tiplinsur').value+'/param2/'+$('catman_catdivgeo_id').value+'";

	echo
	select_tag('catman[tiplinsur]', options_for_select(
	$catman->ListCattipvia(),
	$catman->getTiplinsur(),'include_custom=Seleccione Uno'),
	array('onChange'=> remote_function(array(
		'update'   => 'divTipoSur',
		'url'      => 'catdefman/combo?opcion=2',
		'with' => "'codigo='+this.value+'&catdivgeo='+$('catman_catdivgeo_id').value"
		)))
	);
?>
