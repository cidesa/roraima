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
 echo select_tag('ocestado[codedo]', options_for_select($estados,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update'   => 'divMunicipios',
 'url'      => 'oycdefdivest/combo?par=2',
 'with' => "'pais='+document.getElementById('ocestado_codpai').value+'&estado='+this.value"
  ))));
}
?>