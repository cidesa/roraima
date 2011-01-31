<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php if ($tipo=='P')
{
 echo select_tag('caordcom[codedo]', options_for_select($estados,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update'   => 'divMunicipios',
 'url'      => 'almordcom/combosnc?par=2',
 'with' => "'pais='+document.getElementById('caordcom_codpai').value+'&estado='+this.value"
  ))));
}
else if ($tipo=='E')
{
	echo select_tag('caordcom[codmun]', options_for_select($municipio,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
	'update'   => 'divParroquia',
	'url'      => 'almordcom/combosnc?par=3',
	'with' => "'pais='+document.getElementById('caordcom_codpai').value+'&estado='+document.getElementById('caordcom_codedo').value+'&municipio='+this.value"
  ))));
}
?>