<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php
//echo "tipmov > ".$sf_params->get('tipmov')."<br>";
//H::printR($sf_params);

	echo  select_tag('cpmovfuefin[tipmov]',
	options_for_select(Constantes::TipoMovimiento(),$cpmovfuefin->getTipmov(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update' => 'divCatalogo',
 'url'      => 'predisfuefinmov/ajax',
 'complete' => 'AjaxJSON(request, json)',
 'with' => "'ajax=1&codigo='+this.value",
  ))));

//, 'with' => "'pais='+document.getElementById('occiudad_codpai').value+'&estado='+this.value"
?>
