<?php
$catparams="/param1/'+$('catman_tiplinest').value+'/param2/'+$('catman_catdivgeo_id').value+'";

	echo
	select_tag('catman[tiplinest]', options_for_select(
	$catman->ListCattipvia(),
	$catman->getTiplinest(),'include_custom=Seleccione Uno'),
	array('onChange'=> remote_function(array(
		'update'   => 'divTipoEste',
		'url'      => 'catdefman/combo?opcion=3',
		'with' => "'codigo='+this.value+'&catdivgeo='+$('catman_catdivgeo_id').value"
		)))
	);

?>
