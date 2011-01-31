<?php
/*
 * Created on 28/06/2008
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php if ($tipo=='P')
{
 echo select_tag('ocsector[codedo]', options_for_select($estados,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update'   => 'divMunicipio',
 'url'      => 'oycdefdivsec/combo?par=2',
 'with' => "'pais='+document.getElementById('ocsector_codpai').value+'&estado='+this.value"
  ))));
}
else if ($tipo=='E')
{
	echo select_tag('ocsector[codmun]', options_for_select($municipios,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divParroquia',
	'url'      => 'oycdefdivsec/combo?par=3',
	'with' => "'pais='+document.getElementById('ocsector_codpai').value+'&estado='+document.getElementById('ocsector_codedo').value+'&municipio='+this.value"
  ))));
}
else if ($tipo=='M')
{
	echo select_tag('ocsector[codpar]', options_for_select($parroquias,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divOtro',
	'url'      => 'oycdefdivsec/combo?par=4',
	'with' => "'pais='+document.getElementById('ocsector_codpai').value+'&estado='+document.getElementById('ocsector_codedo').value+'&municipio='+document.getElementById('ocsector_codmun').value+'&parroquia='+this.value"
  ))));
}