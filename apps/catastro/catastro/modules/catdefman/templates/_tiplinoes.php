<?php
$catparams="/param1/'+$('catman_tiplinoes').value+'/param2/'+$('catman_catdivgeo_id').value+'";

	echo
	select_tag('catman[tiplinoes]', options_for_select(
	$catman->ListCattipvia(),
	$catman->getTiplinoes(),'include_custom=Seleccione Uno'),
	array('onChange'=> remote_function(array(
		'update'   => 'divTipoOeste',
		'url'      => 'catdefman/combo?opcion=4',
		'with' => "'codigo='+this.value+'&catdivgeo='+$('catman_catdivgeo_id').value"
		)))
	);

?>
