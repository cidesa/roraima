<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div id='divTipoNorte'>
<?php
//$catparams="/param1/'+$('catman_catdivgeo').value+'";
//$array=array($catparams);
echo $codigo;
	echo
	select_tag('catman[cattramosur_id]', options_for_select(
	$catman->ListCattramo($array),
	$catman->getCattramosurid(),'include_custom=Seleccione'),
	array('onChange'=> remote_function(array(
		'update'   => 'divTipoNorte',
		'url'      => 'catdefman/combo?opcion=1',
		'with' => "'codigo='+this.value+'&catdivgeo='+$('catman_catdivgeo_id').value"
		)))
	);

?>


</div>

