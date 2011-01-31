<?php
/*
 * Created on 28/06/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php if ($tipo=='P')
{
 echo select_tag('ocdeforg[codedo]', options_for_select($estados,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update'   => 'divCiudad',
 'url'      => 'oycdeforg/combo?par=2',
 'with' => "'pais='+document.getElementById('ocdeforg_codpai').value+'&estado='+this.value"
  ))));
}
else if ($tipo=='E')
{
	echo select_tag('ocdeforg[codciu]', options_for_select($ciudades,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divOtro',
	'url'      => 'oycdeforg/combo?par=3',
	'with' => "'pais='+document.getElementById('ocdeforg_codpai').value+'&estado='+document.getElementById('ocdeforg_codedo').value+'&ciudad='+this.value"
  ))));
}