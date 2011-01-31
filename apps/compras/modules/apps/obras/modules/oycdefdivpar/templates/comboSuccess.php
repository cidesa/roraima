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
 echo select_tag('ocparroq[codedo]', options_for_select($estados,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update'   => 'divMunicipio',
 'url'      => 'oycdefdivpar/combo?par=2',
 'with' => "'pais='+document.getElementById('ocparroq_codpai').value+'&estado='+this.value"
  ))));
}
else if ($tipo=='E')
{
	echo select_tag('ocparroq[codmun]', options_for_select($municipios,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divOtro',
	'url'      => 'oycdefdivpar/combo?par=3',
	'with' => "'pais='+document.getElementById('ocparroq_codpai').value+'&estado='+document.getElementById('ocparroq_codedo').value+'&municipio='+this.value"
  ))));
}