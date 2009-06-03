<?php
$catparams="/param1/'+$('catman_tiplinnor').value+'/param2/'+$('catman_catdivgeo_id').value+'";


	echo
	select_tag('catman[tiplinnor]', options_for_select(
	$catman->ListCattipvia(),
	$catman->getTiplinnor(),'include_custom=Seleccione Uno'),
	array('onChange'=> remote_function(array(
		'update'   => 'divTipoNorte',
		'url'      => 'catdefman/combo?opcion=1',
		'with' => "'codigo='+this.value+'&catdivgeo='+$('catman_catdivgeo_id').value"
		)))
	);

?>
